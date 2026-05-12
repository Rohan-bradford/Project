# File: app.py
# This file runs the Flask app, loads page templates, and handles database actions.
from pathlib import Path
import sqlite3
from flask import Flask, redirect, render_template, request, send_from_directory, url_for

BASE_DIR = Path(__file__).resolve().parent
DATA_DIR = BASE_DIR / "data"
STAFF_DB = DATA_DIR / "staff.db"
SOURCES_DB = DATA_DIR / "sources.db"
IMAGES_DIR = BASE_DIR / "Images"

app = Flask(__name__)

PAGES = [
    "page1", "page1a", "page2", "page3", "page3a", "page4",
    "page4a", "page4b", "page4c", "page4d", "page4e", "page4f", "page4g", "page4h",
    "page4i", "page4j", "page4k", "page4l", "page4m", "page4n", "page4o", "page4p",
    "page4q", "page4r", "page4s", "page5", "page6"
]

NAV = [
    ("About", "page1"),
    ("Chapel Green Board School", "page2"),
    ("Thornton Lane Board School", "page3"),
    ("Marshfield School", "page4"),
    ("Staff Database", "page5"),
    ("Sources Database", "page6"),
]

CHILD_PAGES = {
    "page1a", "page3a",
    "page4a", "page4b", "page4c", "page4d", "page4e", "page4f", "page4g", "page4h",
    "page4i", "page4j", "page4k", "page4l", "page4m", "page4n", "page4o", "page4p",
    "page4q", "page4r", "page4s",
}

CHAPEL_PAGES = {"page2"}
THORNTON_PAGES = {"page3", "page3a"}
MARSHFIELD_PAGES = {
    "page4", "page4a", "page4b", "page4c", "page4d", "page4e", "page4f", "page4g",
    "page4h", "page4i", "page4j", "page4k", "page4l", "page4m", "page4n", "page4o",
    "page4p", "page4q", "page4r", "page4s"
}


def hero_image_for_page(page):
    # Use images supplied under Images/Images and switch by selected school section.
    if page in CHAPEL_PAGES:
        return "/Images/Images/Hindu_Temple.JPG"
    if page in THORNTON_PAGES:
        return "/Images/Images/Hindu_Temple.JPG"
    if page in MARSHFIELD_PAGES:
        return "/Images/Images/Marshfield_School.jpg"
    return "/Images/Images/Marshfield_School.jpg"


def title_for_page(page):
    # Match wording in the brief: page 1/2 use "Marshfield School History",
    # page 3/4 families use "Marshfield School".
    if page in {"page1", "page1a", "page2", "page5", "page6"}:
        return "Marshfield School History"
    return "Marshfield School"


def viewer_home_for_page(page):
    # Viewer Home should return child pages to their parent section.
    if page == "page1a":
        return "page1"
    if page == "page3a":
        return "page3"
    if page.startswith("page4") and page != "page4":
        return "page4"
    return page


def fetch_staff(filters):
    query = """
    SELECT school_name, dept, title, last_name, first_name, position, address, start_year, left_year, notes
    FROM staff
    WHERE 1=1
    """
    params = []
    for key, column in [
        ("school_name", "school_name"),
        ("dept", "dept"),
        ("last_name", "last_name"),
        ("position", "position"),
    ]:
        value = filters.get(key)
        if value:
            query += f" AND {column} = ?"
            params.append(value)

    start_year = filters.get("start_year")
    if start_year:
        query += " AND start_year = ?"
        params.append(start_year)

    query += " ORDER BY school_name, dept, last_name, first_name"

    with sqlite3.connect(STAFF_DB) as conn:
        rows = conn.execute(query, params).fetchall()
    return rows


def fetch_sources(filters):
    query = """
    SELECT source, source_type, school, department, notes, hyperlink
    FROM sources
    WHERE 1=1
    """
    params = []
    for key, column in [("school", "school"), ("source_type", "source_type"), ("department", "department")]:
        value = filters.get(key)
        if value:
            query += f" AND {column} = ?"
            params.append(value)

    for key, column in [("source", "source"), ("notes", "notes"), ("hyperlink", "hyperlink")]:
        value = filters.get(key)
        if value:
            query += f" AND LOWER({column}) LIKE LOWER(?)"
            params.append(f"%{value}%")

    query += " ORDER BY school, source_type, source"

    with sqlite3.connect(SOURCES_DB) as conn:
        rows = conn.execute(query, params).fetchall()
    return rows


def clean(value):
    if value is None:
        return ""
    return str(value).strip()


def insert_staff_record(form):
    values = (
        clean(form.get("school_name")),
        clean(form.get("dept")),
        clean(form.get("title")),
        clean(form.get("last_name")),
        clean(form.get("first_name")),
        clean(form.get("position")),
        clean(form.get("address")),
        clean(form.get("start_year")),
        clean(form.get("left_year")),
        clean(form.get("notes")),
    )
    if not values[0]:
        return False
    with sqlite3.connect(STAFF_DB) as conn:
        conn.execute(
            """
            INSERT INTO staff (
                school_name, dept, title, last_name, first_name,
                position, address, start_year, left_year, notes
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            """,
            values,
        )
        conn.commit()
    return True


def insert_source_record(form):
    source_name = clean(form.get("source"))
    if not source_name:
        return False

    hyperlink = clean(form.get("hyperlink"))
    if hyperlink and not hyperlink.startswith("/"):
        hyperlink = "/" + hyperlink

    values = (
        source_name,
        clean(form.get("source_type")),
        clean(form.get("school")),
        clean(form.get("department")),
        clean(form.get("notes")),
        hyperlink,
    )
    with sqlite3.connect(SOURCES_DB) as conn:
        conn.execute(
            """
            INSERT INTO sources (
                source, source_type, school, department, notes, hyperlink
            )
            VALUES (?, ?, ?, ?, ?, ?)
            """,
            values,
        )
        conn.commit()
    return True


@app.route("/")
def index():
    return redirect(url_for("render_page", page="page1"))


@app.route("/Images/<path:filename>")
def images_file(filename):
    return send_from_directory(IMAGES_DIR, filename)


@app.route("/page5/add", methods=["POST"])
def add_staff_record():
    ok = insert_staff_record(request.form)
    status = "added" if ok else "missing"
    return redirect(url_for("render_page", page="page5", status=status))


@app.route("/page6/add", methods=["POST"])
def add_source_record():
    ok = insert_source_record(request.form)
    status = "added" if ok else "missing"
    return redirect(url_for("render_page", page="page6", status=status))


@app.route("/<page>")
def render_page(page):
    if page not in PAGES:
        return redirect(url_for("render_page", page="page1"))
    hero_image_url = hero_image_for_page(page)
    page_title = title_for_page(page)
    is_child_page = page in CHILD_PAGES
    home_target = page if is_child_page else "page1"
    viewer_home_target = viewer_home_for_page(page)

    if page == "page5":
        filters = {
            "school_name": request.args.get("school_name", ""),
            "dept": request.args.get("dept", ""),
            "last_name": request.args.get("last_name", ""),
            "position": request.args.get("position", ""),
            "start_year": request.args.get("start_year", ""),
        }
        rows = fetch_staff(filters)
        with sqlite3.connect(STAFF_DB) as conn:
            schools = [r[0] for r in conn.execute("SELECT DISTINCT school_name FROM staff WHERE school_name IS NOT NULL AND TRIM(school_name) <> '' ORDER BY school_name")]
            depts = [r[0] for r in conn.execute("SELECT DISTINCT dept FROM staff WHERE dept IS NOT NULL AND TRIM(dept) <> '' ORDER BY dept")]
            positions = [r[0] for r in conn.execute("SELECT DISTINCT position FROM staff WHERE position IS NOT NULL AND TRIM(position) <> '' ORDER BY position")]
        return render_template(
            "pages/page5.html",
            nav=NAV,
            current_page=page,
            hero_image_url=hero_image_url,
            page_title=page_title,
            is_child_page=is_child_page,
            home_target=home_target,
            viewer_home_target=viewer_home_target,
            filters=filters,
            rows=rows,
            schools=schools,
            depts=depts,
            positions=positions,
            status=request.args.get("status", ""),
        )

    if page == "page6":
        filters = {
            "source": request.args.get("source", ""),
            "school": request.args.get("school", ""),
            "source_type": request.args.get("source_type", ""),
            "department": request.args.get("department", ""),
            "notes": request.args.get("notes", ""),
            "hyperlink": request.args.get("hyperlink", ""),
        }
        rows = fetch_sources(filters)
        with sqlite3.connect(SOURCES_DB) as conn:
            schools = [r[0] for r in conn.execute("SELECT DISTINCT school FROM sources WHERE school IS NOT NULL AND TRIM(school) <> '' ORDER BY school")]
            source_types = [r[0] for r in conn.execute("SELECT DISTINCT source_type FROM sources WHERE source_type IS NOT NULL AND TRIM(source_type) <> '' ORDER BY source_type")]
            departments = [r[0] for r in conn.execute("SELECT DISTINCT department FROM sources WHERE department IS NOT NULL AND TRIM(department) <> '' ORDER BY department")]
        return render_template(
            "pages/page6.html",
            nav=NAV,
            current_page=page,
            hero_image_url=hero_image_url,
            page_title=page_title,
            is_child_page=is_child_page,
            home_target=home_target,
            viewer_home_target=viewer_home_target,
            filters=filters,
            rows=rows,
            schools=schools,
            source_types=source_types,
            departments=departments,
            status=request.args.get("status", ""),
        )

    return render_template(
        f"pages/{page}.html",
        nav=NAV,
        current_page=page,
        hero_image_url=hero_image_url,
        page_title=page_title,
        is_child_page=is_child_page,
        home_target=home_target,
        viewer_home_target=viewer_home_target,
    )


if __name__ == "__main__":
    app.run(debug=True)
