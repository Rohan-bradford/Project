<!DOCTYPE html>                                                    <!-- Line 1:  Declares this as an HTML5 document -->
<html lang="en">                                                   <!-- Line 2:  Opens the html element -->
<head>                                                             <!-- Line 3:  Opens the head section -->
    <meta charset="UTF-8">                                         <!-- Line 4:  Sets character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Line 5: Mobile-friendly display -->
    <title>Marshfield School History – Chapel Green Board School</title> <!-- Line 6: Browser tab title -->

    <style>                                                        /*Line 8:  Opens the CSS styling section*/

        /* ---- Line 10: Global reset ---- */
        * { box-sizing: border-box; margin: 0; padding: 0; }      /* Line 11: Removes default browser spacing */

        /* ---- Line 13: Body ---- */
        body {
            font-family: Arial, sans-serif;                        /* Line 15: Page font */
            background-color: #f4f4f4;                             /* Line 16: Light grey background */
            color: #333;                                           /* Line 17: Dark grey text */
        }

        /* ---- Line 20: Header – top blue banner ---- */
        header {
            background-color: #1e3a8a;                             /* Line 22: Dark blue background */
            color: white;                                          /* Line 23: White text */
            padding: 15px 30px;                                    /* Line 24: Inner spacing */
            display: flex;                                         /* Line 25: Side-by-side layout */
            align-items: center;                                   /* Line 26: Vertical centre */
            gap: 20px;                                             /* Line 27: Space between image and title */
        }
        header img { height: 70px; width: auto; border-radius: 4px; object-fit: cover; } /* Line 29: Header image size */
        header h1 { font-size: 1.6rem; }                           /* Line 30: Header title size */

        /* ---- Line 32: Navigation bar ---- */
        nav {
            background-color: #162d6e;                             /* Line 34: Darker blue nav background */
            padding: 10px 30px;                                    /* Line 35: Nav inner spacing */
            display: flex;                                         /* Line 36: Buttons in a row */
            gap: 10px;                                             /* Line 37: Space between buttons */
            flex-wrap: wrap;                                       /* Line 38: Wrap on small screens */
        }
        nav a button {
            background-color: white;                               /* Line 41: White button */
            color: #1e3a8a;                                        /* Line 42: Dark blue text */
            border: none;                                          /* Line 43: No border */
            padding: 8px 16px;                                     /* Line 44: Button inner spacing */
            cursor: pointer;                                       /* Line 45: Hand cursor on hover */
            font-weight: bold;                                     /* Line 46: Bold text */
            border-radius: 4px;                                    /* Line 47: Rounded corners */
            font-size: 0.9rem;                                     /* Line 48: Button text size */
            transition: background-color 0.2s;                     /* Line 49: Smooth hover colour change */
        }
        nav a button:hover { background-color: #dbeafe; }         /* Line 51: Light blue on hover */

        /* ---- Line 53: Main content area ---- */
        main { padding: 30px; }                                    /* Line 54: Spacing around main content */

        /* ---- Line 56: Two-column wrapper ---- */
        .content-wrapper {
            display: flex;                                         /* Line 58: Side-by-side columns */
            gap: 30px;                                             /* Line 59: Space between columns */
            align-items: flex-start;                               /* Line 60: Align columns to top */
        }

        /* ---- Line 63: Left column – main text ---- */
        .main-text {
            flex: 2;                                               /* Line 65: Takes 2/3 of width */
            background: white;                                     /* Line 66: White background */
            border-radius: 6px;                                    /* Line 67: Rounded corners */
            padding: 25px;                                         /* Line 68: Inner spacing */
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);               /* Line 69: Subtle shadow */
        }
        .main-text h2 {
            color: #1e3a8a;                                        /* Line 72: Dark blue heading */
            font-size: 1.3rem;                                     /* Line 73: Heading size */
            margin-bottom: 15px;                                   /* Line 74: Space below heading */
            border-bottom: 2px solid #1e3a8a;                     /* Line 75: Blue underline */
            padding-bottom: 8px;                                   /* Line 76: Space to underline */
        }
        .main-text p { line-height: 1.7; margin-bottom: 14px; font-size: 0.95rem; } /* Line 78: Paragraph styling */
        .main-text a { color: #1e3a8a; font-weight: bold; text-decoration: underline; } /* Line 79: Link styling */

        /* ---- Line 81: Sources box ---- */
        .sources-box {
            margin-top: 20px;                                      /* Line 83: Space above sources box */
            background: #f0f4ff;                                   /* Line 84: Light blue background */
            border-left: 4px solid #1e3a8a;                       /* Line 85: Dark blue left border */
            padding: 15px 20px;                                    /* Line 86: Inner spacing */
            border-radius: 4px;                                    /* Line 87: Rounded corners */
            font-size: 0.9rem;                                     /* Line 88: Smaller text */
        }
        .sources-box h3 { color: #1e3a8a; margin-bottom: 10px; font-size: 1rem; } /* Line 90: Sources heading */
        .sources-box p { margin-bottom: 6px; line-height: 1.6; }  /* Line 91: Sources paragraph spacing */
        .sources-box a { color: #1e3a8a; font-weight: bold; text-decoration: underline; } /* Line 92: Sources links */

        /* ---- Line 94: Right column – Notable Dates sidebar ---- */
        .notable-dates {
            flex: 1;                                               /* Line 96: Takes 1/3 of width */
            background: white;                                     /* Line 97: White background */
            border-radius: 6px;                                    /* Line 98: Rounded corners */
            padding: 25px;                                         /* Line 99: Inner spacing */
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);               /* Line 100: Subtle shadow */
        }
        .notable-dates h2 {
            color: #1e3a8a;                                        /* Line 103: Dark blue heading */
            font-size: 1.3rem;                                     /* Line 104: Heading size */
            margin-bottom: 15px;                                   /* Line 105: Space below heading */
            border-bottom: 2px solid #1e3a8a;                     /* Line 106: Blue underline */
            padding-bottom: 8px;                                   /* Line 107: Space to underline */
        }
        .date-entry {
            border-bottom: 1px solid #e5e7eb;                     /* Line 110: Line between entries */
            padding: 10px 0;                                       /* Line 111: Spacing around each entry */
            font-size: 0.9rem;                                     /* Line 112: Entry text size */
            line-height: 1.5;                                      /* Line 113: Line spacing */
        }
        .date-entry:last-child { border-bottom: none; }           /* Line 115: Remove border from last entry */
        .date-entry strong { color: #1e3a8a; }                    /* Line 116: Dark blue year labels */

        /* ---- Line 118: Footer ---- */
        footer {
            text-align: center;                                    /* Line 120: Centre footer text */
            padding: 20px;                                         /* Line 121: Footer inner spacing */
            background-color: #1e3a8a;                             /* Line 122: Dark blue background */
            color: white;                                          /* Line 123: White text */
            margin-top: 40px;                                      /* Line 124: Space above footer */
            font-size: 0.9rem;                                     /* Line 125: Footer text size */
        }

    </style>                                                       <!-- Line 128: Closes the CSS section -->
</head>                                                            <!-- Line 129: Closes head section -->

<body>                                                             <!-- Line 131: Opens the page body -->

<!-- ============================================================
     Line 134: PAGE 2 – HEADER SECTION
     ============================================================ -->
<header>                                                           <!-- Line 137: Opens header -->
    <img src="Images/Images/Marshfield_School.jpg"                 <!-- Line 138: School photo -->
         alt="Marshfield School"                                   <!-- Line 139: Alt text if image missing -->
         onerror="this.style.display='none'">                      <!-- Line 140: Hide if image not found -->
    <h1>Marshfield School History</h1>                             <!-- Line 141: Site title -->
</header>                                                          <!-- Line 142: Closes header -->

<!-- ============================================================
     Line 145: PAGE 2 – NAVIGATION BAR SECTION
     ============================================================ -->
<nav>                                                              <!-- Line 148: Opens navigation bar -->
    <a href="index.php"><button>About</button></a>                 <!-- Line 149: Link to Page 1 -->
    <a href="page2.php"><button>Chapel Green Board School</button></a>     <!-- Line 150: Link to Page 2 (this page) -->
    <a href="page3.php"><button>Thornton Lane Board School</button></a>    <!-- Line 151: Link to Page 3 -->
    <a href="page4.php"><button>Marshfield School</button></a>             <!-- Line 152: Link to Page 4 -->
    <a href="staff.php"><button>Staff Database</button></a>                <!-- Line 153: Link to Staff database -->
    <a href="sources.php"><button>Sources Database</button></a>            <!-- Line 154: Link to Sources database -->
</nav>                                                             <!-- Line 155: Closes navigation bar -->

<!-- ============================================================
     Line 158: PAGE 2 – MAIN CONTENT SECTION
     ============================================================ -->
<main>                                                             <!-- Line 161: Opens main content -->
    <div class="content-wrapper">                                  <!-- Line 162: Opens two-column wrapper -->

        <!-- --------------------------------------------------------
             Line 165: LEFT COLUMN – Chapel Green text
             -------------------------------------------------------- -->
        <section class="main-text">                                <!-- Line 168: Opens left column -->
            <h2>Chapel Green Board School</h2>                     <!-- Line 169: Page sub-header -->

            <!-- Line 171: Paragraph 1 – Area description -->
            <p>Chapel Green district was populated largely by people in the textile or mining occupations.
            It could be described as a poor area by today's standards. Education in the immediate area
            consisted of the Chapel Green Church School, which appears to have been overcrowded and
            understaffed. Other schools were about a mile away.</p> <!-- Line 175: End of paragraph 1 -->

            <!-- Line 177: Paragraph 2 – Petition and survey, with hyperlinks -->
            <p>Residents in the area <a href="Images/Bradford_School_Board/Chapel_Green_petition.pdf">petitioned</a>
            the School Board to open another school in the area. A
            <a href="Images/Bradford_School_Board/Chapel_Green_survey.pdf">survey</a> of school
            accommodation in the area identified that there was a deficiency of 370 places.</p> <!-- Line 181: End of paragraph 2 -->

            <!-- Line 183: Paragraph 3 – Opening of the school, with floor plan hyperlinks -->
            <p>Subsequently a new school was opened on Mon 10 Sept 1877 in rented premises within the same
            building as the Church School, which is now a Hindu Temple. The new school was called Chapel
            Green Board School and had an Infants and Junior (Mixed) departments. They occupied the
            <a href="Images/Maps_and_Plans/Plan_Ground_floor.pdf">ground floor</a> (see the plan) whilst
            the Church School had the <a href="Images/Maps_and_Plans/Plan_Upper_floor.pdf">upper floor</a>
            (see the plan).</p>                                     <!-- Line 190: End of paragraph 3 -->

            <!-- Line 192: Paragraph 4 – Growth and closure -->
            <p>The school was to become popular and achieved good attainments. After being open a few
            years the school began to run out of space and soon various lack of space issues were being
            reported in the government annual inspection reports. The School Board started discussions
            about building a new school rather than renting larger premises. Church members on the School
            Board were opposed to building a new school. Eventually building a new school was voted on and
            the search for a site, design and quotes began.</p>     <!-- Line 199: End of paragraph 4 -->

            <!-- Line 201: Paragraph 5 – Closure date -->
            <p><strong>This school closed on 29/10/1886.</strong></p> <!-- Line 202: Closure date in bold -->

            <!-- Line 204: Sources box with logbook hyperlinks -->
            <div class="sources-box">                              <!-- Line 205: Opens sources box -->
                <h3>Sources</h3>                                   <!-- Line 206: Sources heading -->
                <p><strong>Chapel Green Board School Logbooks:</strong></p> <!-- Line 207: Logbooks heading -->
                <p>
                    <!-- Line 209: Infant logbook link – links directly to the PDF in the Images folder -->
                    <a href="Images/Logbooks/Infants_1877-1905.pdf">1877–1905 Infants</a>
                    &nbsp;(pages 1 to 75 cover this school)
                </p>
                <p>
                    <!-- Line 213: Junior logbook link -->
                    <a href="Images/Logbooks/Junior_1877-1910.pdf">1877–1910 Junior</a>
                    &nbsp;(pages 1 to 81 cover this school)
                </p>
                <p><strong>Chapel Green Church School Logbook:</strong></p> <!-- Line 217: Church school heading -->
                <p>
                    <!-- Line 219: Church school logbook link -->
                    <a href="Images/Logbooks/Church_School_1868-1903.pdf">Logbook 1868–1903</a>
                </p>
            </div>                                                  <!-- Line 222: Closes sources box -->

        </section>                                                  <!-- Line 224: Closes left column -->

        <!-- --------------------------------------------------------
             Line 227: RIGHT COLUMN – Notable Dates
             -------------------------------------------------------- -->
        <aside class="notable-dates">                              <!-- Line 230: Opens right column sidebar -->
            <h2>Notable Dates</h2>                                 <!-- Line 231: Sidebar heading -->

            <!-- Line 233: Notable date entry 1 -->
            <div class="date-entry">                               <!-- Line 234: Opens date entry -->
                <strong>1877:</strong> Chapel Green School opened on 10 September 1877.
            </div>                                                  <!-- Line 236: Closes date entry 1 -->

            <!-- Line 238: Notable date entry 2 -->
            <div class="date-entry">                               <!-- Line 239: Opens date entry -->
                <strong>1880:</strong> Elementary education was made compulsory for 5–13 year olds.
            </div>                                                  <!-- Line 241: Closes date entry 2 -->

            <!-- Line 243: Notable date entry 3 -->
            <div class="date-entry">                               <!-- Line 244: Opens date entry -->
                <strong>1880:</strong> Minimum leaving age was 10, providing they had attained Standard 5.
            </div>                                                  <!-- Line 246: Closes date entry 3 -->

            <!-- Line 248: Notable date entry 4 -->
            <div class="date-entry">                               <!-- Line 249: Opens date entry -->
                <strong>1880:</strong> Part time schooling allowed if they had attained Standard 2.
            </div>                                                  <!-- Line 251: Closes date entry 4 -->

        </aside>                                                    <!-- Line 253: Closes right column -->

    </div>                                                          <!-- Line 255: Closes two-column wrapper -->
</main>                                                            <!-- Line 256: Closes main content -->

<!-- ============================================================
     Line 259: PAGE 2 – FOOTER SECTION
     ============================================================ -->
<footer>                                                           <!-- Line 262: Opens footer -->
    Community History Research by Ray Greenhough                   <!-- Line 263: Footer text -->
</footer>                                                          <!-- Line 264: Closes footer -->

</body>                                                            <!-- Line 266: Closes page body -->
</html>                                                            <!-- Line 267: Closes html document -->