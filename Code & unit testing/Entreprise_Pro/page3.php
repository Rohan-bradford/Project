<!DOCTYPE html>                                                    <!-- Line 1:  Declares this as an HTML5 document -->
<html lang="en">                                                   <!-- Line 2:  Opens the html element -->
<head>                                                             <!-- Line 3:  Opens the head section -->
    <meta charset="UTF-8">                                         <!-- Line 4:  Sets character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Line 5: Mobile display -->
    <title>Marshfield School History – Thornton Lane Board School</title>  <!-- Line 6: Browser tab title -->

    <style>                                                        /*Line 8:  Opens CSS section*/
        * { box-sizing: border-box; margin: 0; padding: 0; }      /* Line 9:  Global reset */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; } /* Line 10: Body styling */
        header { background-color: #1e3a8a; color: white; padding: 15px 30px; display: flex; align-items: center; gap: 20px; } /* Line 11: Header styling */
        header img { height: 70px; width: auto; border-radius: 4px; object-fit: cover; } /* Line 12: Header image */
        header h1 { font-size: 1.6rem; }                           /* Line 13: Header title size */
        nav { background-color: #162d6e; padding: 10px 30px; display: flex; gap: 10px; flex-wrap: wrap; } /* Line 14: Nav bar */
        nav a button { background-color: white; color: #1e3a8a; border: none; padding: 8px 16px; cursor: pointer; font-weight: bold; border-radius: 4px; font-size: 0.9rem; transition: background-color 0.2s; } /* Line 15: Nav buttons */
        nav a button:hover { background-color: #dbeafe; }         /* Line 16: Nav button hover */
        main { padding: 30px; }                                    /* Line 17: Main content spacing */
        .content-wrapper { display: flex; gap: 30px; align-items: flex-start; } /* Line 18: Two-column layout */
        .main-text { flex: 2; background: white; border-radius: 6px; padding: 25px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); } /* Line 19: Left column */
        .main-text h2 { color: #1e3a8a; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #1e3a8a; padding-bottom: 8px; } /* Line 20: Left heading */
        .main-text p { line-height: 1.7; margin-bottom: 14px; font-size: 0.95rem; } /* Line 21: Paragraphs */
        .main-text a { color: #1e3a8a; font-weight: bold; text-decoration: underline; } /* Line 22: Links */
        .sources-box { margin-top: 20px; background: #f0f4ff; border-left: 4px solid #1e3a8a; padding: 15px 20px; border-radius: 4px; font-size: 0.9rem; } /* Line 23: Sources box */
        .sources-box h3 { color: #1e3a8a; margin-bottom: 10px; font-size: 1rem; } /* Line 24: Sources heading */
        .sources-box p { margin-bottom: 6px; line-height: 1.6; }  /* Line 25: Sources paragraphs */
        .sources-box a { color: #1e3a8a; font-weight: bold; text-decoration: underline; } /* Line 26: Sources links */
        .notable-dates { flex: 1; background: white; border-radius: 6px; padding: 25px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); } /* Line 27: Right column */
        .notable-dates h2 { color: #1e3a8a; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #1e3a8a; padding-bottom: 8px; } /* Line 28: Right heading */
        .date-entry { border-bottom: 1px solid #e5e7eb; padding: 10px 0; font-size: 0.9rem; line-height: 1.5; } /* Line 29: Date entries */
        .date-entry:last-child { border-bottom: none; }           /* Line 30: Remove last border */
        .date-entry strong { color: #1e3a8a; }                    /* Line 31: Year label colour */
        footer { text-align: center; padding: 20px; background-color: #1e3a8a; color: white; margin-top: 40px; font-size: 0.9rem; } /* Line 32: Footer */
    </style>                                                       <!-- Line 33: Closes CSS section -->
</head>                                                            <!-- Line 34: Closes head section -->

<body>                                                             <!-- Line 36: Opens page body -->

<!-- ============================================================
     Line 39: PAGE 3 – HEADER SECTION
     ============================================================ -->
<header>                                                           <!-- Line 42: Opens header -->
    <img src="Images/Images/Marshfield_School.jpg" alt="Marshfield School" onerror="this.style.display='none'"> <!-- Line 43: School photo -->
    <h1>Marshfield School History</h1>                             <!-- Line 44: Site title -->
</header>                                                          <!-- Line 45: Closes header -->

<!-- ============================================================
     Line 48: PAGE 3 – NAVIGATION BAR SECTION
     ============================================================ -->
<nav>                                                              <!-- Line 51: Opens nav bar -->
    <a href="index.php"><button>About</button></a>                 <!-- Line 52: Link to Page 1 -->
    <a href="page2.php"><button>Chapel Green Board School</button></a>     <!-- Line 53: Link to Page 2 -->
    <a href="page3.php"><button>Thornton Lane Board School</button></a>    <!-- Line 54: Link to Page 3 (this page) -->
    <a href="page4.php"><button>Marshfield School</button></a>             <!-- Line 55: Link to Page 4 -->
    <a href="staff.php"><button>Staff Database</button></a>                <!-- Line 56: Link to Staff database -->
    <a href="sources.php"><button>Sources Database</button></a>            <!-- Line 57: Link to Sources database -->
</nav>                                                             <!-- Line 58: Closes nav bar -->

<!-- ============================================================
     Line 61: PAGE 3 – MAIN CONTENT SECTION
     ============================================================ -->
<main>                                                             <!-- Line 64: Opens main content -->
    <div class="content-wrapper">                                  <!-- Line 65: Opens two-column wrapper -->

        <!-- --------------------------------------------------------
             Line 68: LEFT COLUMN – Thornton Lane text
             -------------------------------------------------------- -->
        <section class="main-text">                                <!-- Line 71: Opens left column -->
            <h2>Thornton Lane Board School</h2>                    <!-- Line 72: Page sub-header -->

            <!-- Line 74: Paragraph 1 – Opening of the school -->
            <p>The school opened on Mon 5 Nov 1886. The day started with the children marching from their
            former school to their new school a few hundred metres away. What would they have thought about
            their new school? Windows in all classrooms, none of them were broken like in their previous
            school, lots of space in the playground instead of a very small shared playground, freshly
            painted walls instead of peeling plaster and individual classrooms instead of everyone in one
            room, and new desks.</p>                               <!-- Line 80: End of paragraph 1 -->

            <!-- Line 82: Sources box -->
            <div class="sources-box">                              <!-- Line 83: Opens sources box -->
                <h3>Sources</h3>                                   <!-- Line 84: Sources heading -->

                <p><strong>Thornton Lane Board School Logbooks:</strong></p> <!-- Line 86: Logbooks heading -->
                <p>
                    <!-- Line 88: Infant logbook – links to page in the PDF (pages 75-207) -->
                    <a href="Images/Logbooks/Infants_1877-1905.pdf">1877–1905 Infants</a>
                    &nbsp;(pages 75 to 207 cover this school)
                </p>
                <p>
                    <!-- Line 92: Junior logbook link -->
                    <a href="Images/Logbooks/Junior_1877-1910.pdf">1877–1910 Junior</a>
                    &nbsp;(pages 81 to 180 cover this school)
                </p>

                <p><strong>Admission Register:</strong></p>        <!-- Line 97: Admission register heading -->
                <p>Admission_Jan 1894 – Feb 1901</p>               <!-- Line 98: Admission register (link to be added per instruction manual) -->

                <p><strong>Newspapers:</strong></p>                 <!-- Line 100: Newspapers heading -->
                <p>24/4/1884: Erection of new school</p>           <!-- Line 101: Newspaper entry 1 -->
                <p>25/9/1884: Dispute with Church members of School Board</p> <!-- Line 102: Newspaper entry 2 -->

                <!-- Line 104: Link to Page 3a (document table page) -->
                <p>To view document page tables, see <a href="page3a.php">Page 3a</a>.</p>

            </div>                                                  <!-- Line 107: Closes sources box -->

        </section>                                                  <!-- Line 109: Closes left column -->

        <!-- --------------------------------------------------------
             Line 112: RIGHT COLUMN – Notable Dates
             -------------------------------------------------------- -->
        <aside class="notable-dates">                              <!-- Line 115: Opens right column sidebar -->
            <h2>Notable Dates</h2>                                 <!-- Line 116: Sidebar heading -->

            <!-- Line 118: Notable date entry 1 -->
            <div class="date-entry">                               <!-- Line 119: Opens date entry -->
                <strong>1886:</strong> Leaving school allowed if they had attained Standard 6.
            </div>                                                  <!-- Line 121: Closes date entry 1 -->

            <!-- Line 123: Notable date entry 2 -->
            <div class="date-entry">                               <!-- Line 124: Opens date entry -->
                <strong>1886:</strong> Part time schooling allowed if they had attained Standard 3.
            </div>                                                  <!-- Line 126: Closes date entry 2 -->

            <!-- Line 128: Notable date entry 3 -->
            <div class="date-entry">                               <!-- Line 129: Opens date entry -->
                <strong>1893:</strong> Minimum leaving age raised to 11.
            </div>                                                  <!-- Line 131: Closes date entry 3 -->

            <!-- Line 133: Notable date entry 4 -->
            <div class="date-entry">                               <!-- Line 134: Opens date entry -->
                <strong>1893:</strong> Compulsory education for Blind and Deaf children.
            </div>                                                  <!-- Line 136: Closes date entry 4 -->

            <!-- Line 138: Notable date entry 5 -->
            <div class="date-entry">                               <!-- Line 139: Opens date entry -->
                <strong>1899:</strong> Minimum leaving age raised to 12.
            </div>                                                  <!-- Line 141: Closes date entry 5 -->

            <!-- Line 143: Notable date entry 6 -->
            <div class="date-entry">                               <!-- Line 144: Opens date entry -->
                <strong>1899:</strong> Compulsory education for physically impaired children.
            </div>                                                  <!-- Line 146: Closes date entry 6 -->

        </aside>                                                    <!-- Line 148: Closes right column -->

    </div>                                                          <!-- Line 150: Closes two-column wrapper -->
</main>                                                            <!-- Line 151: Closes main content -->

<!-- ============================================================
     Line 154: PAGE 3 – FOOTER SECTION
     ============================================================ -->
<footer>                                                           <!-- Line 157: Opens footer -->
    Community History Research by Ray Greenhough                   <!-- Line 158: Footer text -->
</footer>                                                          <!-- Line 159: Closes footer -->

</body>                                                            <!-- Line 161: Closes page body -->
</html>                                                            <!-- Line 162: Closes html document -->