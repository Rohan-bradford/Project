<!DOCTYPE html>                                                    <!-- Line 1:  Declares this as an HTML5 document -->
<html lang="en">                                                   <!-- Line 2:  Opens the html element -->
<head>                                                             <!-- Line 3:  Opens the head section -->
    <meta charset="UTF-8">                                         <!-- Line 4:  Sets character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Line 5: Mobile display -->
    <title>Marshfield School History – Marshfield School</title>   <!-- Line 6: Browser tab title -->

    <style>                                                        /*-- Line 8:  Opens CSS section*/
        * { box-sizing: border-box; margin: 0; padding: 0; }      /* Line 9:  Global reset */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; } /* Line 10: Body */
        header { background-color: #1e3a8a; color: white; padding: 15px 30px; display: flex; align-items: center; gap: 20px; } /* Line 11: Header */
        header img { height: 70px; width: auto; border-radius: 4px; object-fit: cover; } /* Line 12: Header image */
        header h1 { font-size: 1.6rem; }                           /* Line 13: Header title */
        nav { background-color: #162d6e; padding: 10px 30px; display: flex; gap: 10px; flex-wrap: wrap; } /* Line 14: Nav bar */
        nav a button { background-color: white; color: #1e3a8a; border: none; padding: 8px 16px; cursor: pointer; font-weight: bold; border-radius: 4px; font-size: 0.9rem; transition: background-color 0.2s; } /* Line 15: Nav buttons */
        nav a button:hover { background-color: #dbeafe; }         /* Line 16: Hover colour */
        main { padding: 30px; }                                    /* Line 17: Main spacing */
        .content-wrapper { display: flex; gap: 30px; align-items: flex-start; } /* Line 18: Two columns */
        .main-text { flex: 2; background: white; border-radius: 6px; padding: 25px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); } /* Line 19: Left column */
        .main-text h2 { color: #1e3a8a; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #1e3a8a; padding-bottom: 8px; } /* Line 20: Left heading */
        .main-text h3 { color: #1e3a8a; font-size: 1rem; margin: 18px 0 8px 0; } /* Line 21: Sub-headings in sources */
        .main-text p { line-height: 1.7; margin-bottom: 14px; font-size: 0.95rem; } /* Line 22: Paragraphs */
        .main-text a { color: #1e3a8a; font-weight: bold; text-decoration: underline; } /* Line 23: Links */
        .sources-box { margin-top: 20px; background: #f0f4ff; border-left: 4px solid #1e3a8a; padding: 15px 20px; border-radius: 4px; font-size: 0.9rem; } /* Line 24: Sources box */
        .sources-box h3 { color: #1e3a8a; margin-bottom: 10px; margin-top: 14px; font-size: 1rem; } /* Line 25: Sources headings */
        .sources-box h3:first-child { margin-top: 0; }            /* Line 26: Remove top margin from first heading */
        .sources-box p { margin-bottom: 5px; line-height: 1.7; }  /* Line 27: Sources paragraph spacing */
        .sources-box a { color: #1e3a8a; font-weight: bold; text-decoration: underline; } /* Line 28: Sources links */
        .notable-dates { flex: 1; background: white; border-radius: 6px; padding: 25px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); } /* Line 29: Right column */
        .notable-dates h2 { color: #1e3a8a; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #1e3a8a; padding-bottom: 8px; } /* Line 30: Right heading */
        .date-entry { border-bottom: 1px solid #e5e7eb; padding: 10px 0; font-size: 0.9rem; line-height: 1.5; } /* Line 31: Date entries */
        .date-entry:last-child { border-bottom: none; }           /* Line 32: Remove last border */
        .date-entry strong { color: #1e3a8a; }                    /* Line 33: Year label colour */
        footer { text-align: center; padding: 20px; background-color: #1e3a8a; color: white; margin-top: 40px; font-size: 0.9rem; } /* Line 34: Footer */
    </style>                                                       <!-- Line 35: Closes CSS section -->
</head>                                                            <!-- Line 36: Closes head section -->

<body>                                                             <!-- Line 38: Opens page body -->

<!-- ============================================================
     Line 41: PAGE 4 – HEADER SECTION
     ============================================================ -->
<header>                                                           <!-- Line 44: Opens header -->
    <img src="Images/Images/Marshfield_School.jpg" alt="Marshfield School" onerror="this.style.display='none'"> <!-- Line 45: School photo -->
    <h1>Marshfield School History</h1>                             <!-- Line 46: Site title -->
</header>                                                          <!-- Line 47: Closes header -->

<!-- ============================================================
     Line 50: PAGE 4 – NAVIGATION BAR SECTION
     ============================================================ -->
<nav>                                                              <!-- Line 53: Opens nav bar -->
    <a href="index.php"><button>About</button></a>                 <!-- Line 54: Link to Page 1 -->
    <a href="page2.php"><button>Chapel Green Board School</button></a>     <!-- Line 55: Link to Page 2 -->
    <a href="page3.php"><button>Thornton Lane Board School</button></a>    <!-- Line 56: Link to Page 3 -->
    <a href="page4.php"><button>Marshfield School</button></a>             <!-- Line 57: Link to Page 4 (this page) -->
    <a href="staff.php"><button>Staff Database</button></a>                <!-- Line 58: Link to Staff database -->
    <a href="sources.php"><button>Sources Database</button></a>            <!-- Line 59: Link to Sources database -->
</nav>                                                             <!-- Line 60: Closes nav bar -->

<!-- ============================================================
     Line 63: PAGE 4 – MAIN CONTENT SECTION
     ============================================================ -->
<main>                                                             <!-- Line 66: Opens main content -->
    <div class="content-wrapper">                                  <!-- Line 67: Opens two-column wrapper -->

        <!-- --------------------------------------------------------
             Line 70: LEFT COLUMN – Marshfield School text and sources
             -------------------------------------------------------- -->
        <section class="main-text">                                <!-- Line 73: Opens left column -->
            <h2>Marshfield School</h2>                             <!-- Line 74: Page sub-header -->

            <!-- Line 76: Paragraph 1 – Name change explanation -->
            <p>With the incorporation of Thornton into the Bradford Borough, the Thornton School Board
            identified that there would be confusion with two Thornton School names and two Bradford School
            names. The Thornton Board changed the name of James Street School (to avoid confusion with
            St James School in Bradford) to Thornton Board School. The Board also recommended that
            Thornton Lane Board School be changed to <strong>Marshfield School</strong> to avoid confusion
            with the newly named Thornton Board School.</p>        <!-- Line 82: End of paragraph 1 -->

            <!-- Line 84: Sources box with all logbook, register and punishment book links -->
            <div class="sources-box">                              <!-- Line 85: Opens sources box -->

                <!-- Line 87: Logbooks section -->
                <h3>Marshfield School Logbooks</h3>               <!-- Line 88: Logbooks heading -->

                <!-- Line 90: Logbook links – each links to its child table page (page4a, 4b etc.) -->
                <p><a href="page4r.php">Logbook 1877–1905 Infant</a></p>          <!-- Line 91: Links to Page 4r -->
                <p><a href="page4a.php">Logbook (Infants) 1905–1939</a></p>       <!-- Line 92: Links to Page 4a -->
                <p><a href="page4b.php">Logbook (Infants) 1939–1966</a></p>       <!-- Line 93: Links to Page 4b -->
                <p><a href="page4c.php">Logbook (Infants) 1966–1973</a></p>       <!-- Line 94: Links to Page 4c -->
                <p><a href="page4s.php">Logbook 1877–1910 Junior</a></p>          <!-- Line 95: Links to Page 4s -->
                <p><a href="page4d.php">Logbook (Junior) 1910–1933</a></p>        <!-- Line 96: Links to Page 4d -->
                <p><a href="page4e.php">Logbook 1933–1964 Junior</a></p>          <!-- Line 97: Links to Page 4e -->

                <!-- Line 99: Admission Registers section -->
                <h3>Admission Registers</h3>                      <!-- Line 100: Registers heading -->
                <p><a href="page4f.php">Infant Sep 1943 – Jan 1954</a></p>        <!-- Line 101: Links to Page 4f -->
                <p><a href="page4g.php">Infant Sep 1954 – Jul 1965</a></p>        <!-- Line 102: Links to Page 4g -->
                <p><a href="page4h.php">Infant Sep 1965 – Jan 1973</a></p>        <!-- Line 103: Links to Page 4h -->
                <p><a href="page4i.php">Junior Apr 1906 – Jul 1911</a></p>        <!-- Line 104: Links to Page 4i -->
                <p><a href="page4j.php">Junior Aug 1911 – Jul 1917</a></p>        <!-- Line 105: Links to Page 4j -->
                <p><a href="page4k.php">Junior Aug 1928 – Jan 1944</a></p>        <!-- Line 106: Links to Page 4k -->
                <p><a href="page4l.php">Junior Mar 1944 – Feb 1954</a></p>        <!-- Line 107: Links to Page 4l -->
                <p><a href="page4m.php">Junior Mar 1954 – Jan 1963</a></p>        <!-- Line 108: Links to Page 4m -->
                <p><a href="page4n.php">Junior Oct 1963 – Sep 1971</a></p>        <!-- Line 109: Links to Page 4n -->
                <p><a href="page4o.php">Junior Sep 1971 – Sep 1973</a></p>        <!-- Line 110: Links to Page 4o -->
                <p><a href="page4p.php">Senior 1901 – 1928</a></p>                <!-- Line 111: Links to Page 4p -->

                <!-- Line 113: Punishment Book section -->
                <h3>Punishment Book</h3>                          <!-- Line 114: Punishment book heading -->
                <p><a href="page4q.php">Punishment 1903 – 1965</a></p>            <!-- Line 115: Links to Page 4q -->

                <!-- Line 117: Photographs section -->
                <h3>Photographs</h3>                              <!-- Line 118: Photographs heading -->
                <p>Miss Teal's scrapbook of school activities 1931–1952</p>        <!-- Line 119: Photo entry (link to be added) -->
                <p>Miss Teal's scrapbook of Northern Ireland tour 1949</p>         <!-- Line 120: Photo entry -->
                <p>Miss Teal's scrapbook of tours to London 1950, Bournemouth 1951</p> <!-- Line 121: Photo entry -->
                <p>Miss Teal's scrapbook of tours to Oban and Western Isles 1953</p>   <!-- Line 122: Photo entry -->
                <p>Photograph album circa 1955–56</p>             <!-- Line 123: Photo entry -->
                <p>Miss Leach / Mrs Emmerson's album</p>          <!-- Line 124: Photo entry -->
                <p>Miscellaneous pictures</p>                     <!-- Line 125: Photo entry -->
                <p>Mayday celebrations</p>                        <!-- Line 126: Photo entry -->

            </div>                                                  <!-- Line 128: Closes sources box -->

        </section>                                                  <!-- Line 130: Closes left column -->

        <!-- --------------------------------------------------------
             Line 133: RIGHT COLUMN – Notable Dates
             -------------------------------------------------------- -->
        <aside class="notable-dates">                              <!-- Line 136: Opens right column sidebar -->
            <h2>Notable Dates</h2>                                 <!-- Line 137: Sidebar heading -->

            <!-- Line 139: Notable date entries for Marshfield School -->
            <div class="date-entry">                               <!-- Line 140: Opens date entry -->
                <strong>1900:</strong> Thornton Lane Board School renamed Marshfield School.
            </div>                                                  <!-- Line 142: Closes date entry 1 -->

            <div class="date-entry">                               <!-- Line 144: Opens date entry -->
                <strong>1902:</strong> Education Act abolished School Boards; replaced by Local Education
                Authorities.
            </div>                                                  <!-- Line 147: Closes date entry 2 -->

            <div class="date-entry">                               <!-- Line 149: Opens date entry -->
                <strong>1918:</strong> School leaving age raised to 14.
            </div>                                                  <!-- Line 151: Closes date entry 3 -->

            <div class="date-entry">                               <!-- Line 153: Opens date entry -->
                <strong>1944:</strong> Education Act made secondary education free and compulsory.
            </div>                                                  <!-- Line 155: Closes date entry 4 -->

            <div class="date-entry">                               <!-- Line 157: Opens date entry -->
                <strong>1947:</strong> School leaving age raised to 15.
            </div>                                                  <!-- Line 159: Closes date entry 5 -->

            <div class="date-entry">                               <!-- Line 161: Opens date entry -->
                <strong>1972:</strong> School leaving age raised to 16.
            </div>                                                  <!-- Line 163: Closes date entry 6 -->

        </aside>                                                    <!-- Line 165: Closes right column -->

    </div>                                                          <!-- Line 167: Closes two-column wrapper -->
</main>                                                            <!-- Line 168: Closes main content -->

<!-- ============================================================
     Line 171: PAGE 4 – FOOTER SECTION
     ============================================================ -->
<footer>                                                           <!-- Line 174: Opens footer -->
    Community History Research by Ray Greenhough                   <!-- Line 175: Footer text -->
</footer>                                                          <!-- Line 176: Closes footer -->

</body>                                                            <!-- Line 178: Closes page body -->
</html>                                                            <!-- Line 179: Closes html document -->