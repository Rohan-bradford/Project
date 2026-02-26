<?php
/* ============================================================
   FILE: index.php
   PURPOSE: Page 1 – About page. This is the homepage of the
            Marshfield School History application. It auto-starts
            when the application is opened in a browser.
   AUTHOR:  Community History Research by Ray Greenhough
   ============================================================ */
?>
<!DOCTYPE html>                                                    <!-- Line 9:  Declares this as an HTML5 document -->
<html lang="en">                                                   <!-- Line 10: Opens the html element; lang="en" sets language to English -->
<head>                                                             <!-- Line 11: Opens the head section (settings, not visible on page) -->
    <meta charset="UTF-8">                                         <!-- Line 12: Sets character encoding to UTF-8 (supports all standard characters) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Line 13: Makes page display correctly on mobile devices -->
    <title>Marshfield School History – About</title>               <!-- Line 14: Sets the browser tab title -->

    <style>                                                        /* Line 16: Opens the CSS styling section*/

        /* ---- Line 18: Global reset – removes default browser spacing ---- */
        * {
            box-sizing: border-box;                                /* Line 20: Includes padding/border in element width calculations */
            margin: 0;                                             /* Line 21: Removes default outer spacing */
            padding: 0;                                            /* Line 22: Removes default inner spacing */
        }

        /* ---- Line 25: Body – sets overall page font and background ---- */
        body {
            font-family: Arial, sans-serif;                        /* Line 27: Sets the font for the whole page */
            background-color: #f4f4f4;                             /* Line 28: Sets a light grey background */
            color: #333;                                           /* Line 29: Sets default text colour to dark grey */
        }

        /* ---- Line 32: Header – the top blue banner with the site title ---- */
        header {
            background-color: #1e3a8a;                             /* Line 34: Dark blue background for the header */
            color: white;                                          /* Line 35: White text in the header */
            padding: 15px 30px;                                    /* Line 36: Spacing inside the header (top/bottom 15px, left/right 30px) */
            display: flex;                                         /* Line 37: Uses flexbox to align items side by side */
            align-items: center;                                   /* Line 38: Vertically centres items in the header */
            gap: 20px;                                             /* Line 39: Space between the logo image and the title text */
        }

        /* ---- Line 42: Header image – the school photo in the header ---- */
        header img {
            height: 70px;                                          /* Line 44: Sets the height of the header image */
            width: auto;                                           /* Line 45: Keeps image proportions correct */
            border-radius: 4px;                                    /* Line 46: Slightly rounds the image corners */
            object-fit: cover;                                     /* Line 47: Ensures image fills the space without distortion */
        }

        /* ---- Line 50: Header title text ---- */
        header h1 {
            font-size: 1.6rem;                                     /* Line 52: Sets the size of the main site title */
        }

        /* ---- Line 55: Navigation bar – the row of page buttons below the header ---- */
        nav {
            background-color: #162d6e;                             /* Line 57: Slightly darker blue for the nav bar */
            padding: 10px 30px;                                    /* Line 58: Spacing inside the nav bar */
            display: flex;                                         /* Line 59: Displays nav buttons in a row */
            gap: 10px;                                             /* Line 60: Space between each nav button */
            flex-wrap: wrap;                                       /* Line 61: Allows buttons to wrap to next line on small screens */
        }

        /* ---- Line 64: Nav buttons – styled links that look like buttons ---- */
        nav a button {
            background-color: white;                               /* Line 66: White button background */
            color: #1e3a8a;                                        /* Line 67: Dark blue button text */
            border: none;                                          /* Line 68: Removes the default button border */
            padding: 8px 16px;                                     /* Line 69: Spacing inside each button */
            cursor: pointer;                                       /* Line 70: Shows hand cursor when hovering */
            font-weight: bold;                                     /* Line 71: Makes button text bold */
            border-radius: 4px;                                    /* Line 72: Slightly rounds button corners */
            font-size: 0.9rem;                                     /* Line 73: Sets button text size */
            transition: background-color 0.2s;                     /* Line 74: Smooth colour change on hover */
        }

        /* ---- Line 77: Nav button hover – changes colour when mouse moves over button ---- */
        nav a button:hover {
            background-color: #dbeafe;                             /* Line 79: Light blue highlight on hover */
        }

        /* ---- Line 82: Main content area – wraps the two-column layout ---- */
        main {
            padding: 30px;                                         /* Line 84: Spacing around the main content */
        }

        /* ---- Line 87: Content wrapper – creates the two-column layout ---- */
        .content-wrapper {
            display: flex;                                         /* Line 89: Places columns side by side */
            gap: 30px;                                             /* Line 90: Space between the two columns */
            align-items: flex-start;                               /* Line 91: Aligns columns to the top */
        }

        /* ---- Line 94: Left column – main text area (About section) ---- */
        .main-text {
            flex: 2;                                               /* Line 96: Takes up 2/3 of the available width */
            background: white;                                     /* Line 97: White background for the text area */
            border-radius: 6px;                                    /* Line 98: Rounds the corners of the text box */
            padding: 25px;                                         /* Line 99: Spacing inside the text box */
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);               /* Line 100: Subtle shadow to lift the box off the page */
        }

        /* ---- Line 103: Sub-header inside the left column ---- */
        .main-text h2 {
            color: #1e3a8a;                                        /* Line 105: Dark blue heading colour */
            font-size: 1.3rem;                                     /* Line 106: Sets heading size */
            margin-bottom: 15px;                                   /* Line 107: Space below the heading */
            border-bottom: 2px solid #1e3a8a;                     /* Line 108: Blue underline below the heading */
            padding-bottom: 8px;                                   /* Line 109: Space between heading text and underline */
        }

        /* ---- Line 112: Paragraphs inside the main text area ---- */
        .main-text p {
            line-height: 1.7;                                      /* Line 114: Sets line spacing for readability */
            margin-bottom: 14px;                                   /* Line 115: Space between paragraphs */
            font-size: 0.95rem;                                    /* Line 116: Sets paragraph text size */
        }

        /* ---- Line 119: Hyperlinks inside the main text ---- */
        .main-text a {
            color: #1e3a8a;                                        /* Line 121: Dark blue link colour */
            font-weight: bold;                                     /* Line 122: Bold links to make them stand out */
            text-decoration: underline;                            /* Line 123: Underline to show it is a link */
        }

        /* ---- Line 126: Copyright notice styling ---- */
        .copyright {
            margin-top: 20px;                                      /* Line 128: Space above the copyright box */
            background: #f0f4ff;                                   /* Line 129: Light blue background */
            border-left: 4px solid #1e3a8a;                       /* Line 130: Dark blue left border for emphasis */
            padding: 12px 16px;                                    /* Line 131: Spacing inside the copyright box */
            font-size: 0.85rem;                                    /* Line 132: Slightly smaller text for the copyright */
            color: #555;                                           /* Line 133: Medium grey text colour */
            border-radius: 4px;                                    /* Line 134: Rounds corners of the copyright box */
        }

        /* ---- Line 137: Right column – Notable Dates sidebar ---- */
        .notable-dates {
            flex: 1;                                               /* Line 139: Takes up 1/3 of the available width */
            background: white;                                     /* Line 140: White background */
            border-radius: 6px;                                    /* Line 141: Rounds corners */
            padding: 25px;                                         /* Line 142: Spacing inside */
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);               /* Line 143: Subtle shadow */
        }

        /* ---- Line 146: Notable Dates heading ---- */
        .notable-dates h2 {
            color: #1e3a8a;                                        /* Line 148: Dark blue heading */
            font-size: 1.3rem;                                     /* Line 149: Heading size */
            margin-bottom: 15px;                                   /* Line 150: Space below heading */
            border-bottom: 2px solid #1e3a8a;                     /* Line 151: Blue underline */
            padding-bottom: 8px;                                   /* Line 152: Space between text and underline */
        }

        /* ---- Line 155: Each notable date entry ---- */
        .date-entry {
            border-bottom: 1px solid #e5e7eb;                     /* Line 157: Light grey line between entries */
            padding: 10px 0;                                       /* Line 158: Spacing above and below each entry */
            font-size: 0.9rem;                                     /* Line 159: Text size for date entries */
            line-height: 1.5;                                      /* Line 160: Line spacing */
        }

        /* ---- Line 163: Last date entry – removes the bottom border ---- */
        .date-entry:last-child {
            border-bottom: none;                                   /* Line 165: Removes border from the last entry */
        }

        /* ---- Line 168: Year label in each notable date ---- */
        .date-entry strong {
            color: #1e3a8a;                                        /* Line 170: Dark blue for the year number */
        }

        /* ---- Line 173: Footer – the bottom banner ---- */
        footer {
            text-align: center;                                    /* Line 175: Centres the footer text */
            padding: 20px;                                         /* Line 176: Spacing inside the footer */
            background-color: #1e3a8a;                             /* Line 177: Dark blue background */
            color: white;                                          /* Line 178: White text */
            margin-top: 40px;                                      /* Line 179: Space above the footer */
            font-size: 0.9rem;                                     /* Line 180: Footer text size */
        }

    </style>                                                       <!-- Line 183: Closes the CSS styling section -->
</head>                                                            <!-- Line 184: Closes the head section -->

<body>                                                             <!-- Line 186: Opens the visible page body -->

<!-- ============================================================
     Line 189: PAGE 1 – HEADER SECTION
     Contains the school photo and the site title
     ============================================================ -->
<header>                                                           <!-- Line 193: Opens the header element -->
    <img src="Images/Images/Marshfield_School.jpg"                 <!-- Line 194: School photo – stored in Images/Images/ folder -->
         alt="Marshfield School"                                   <!-- Line 195: Alt text shown if image cannot load -->
         onerror="this.style.display='none'">                      <!-- Line 196: Hides the image tag if the file is not found yet -->
    <h1>Marshfield School History</h1>                             <!-- Line 197: Main site title displayed in the header -->
</header>                                                          <!-- Line 198: Closes the header element -->

<!-- ============================================================
     Line 201: PAGE 1 – NAVIGATION BAR SECTION
     Buttons linking to each main page of the application
     ============================================================ -->
<nav>                                                              <!-- Line 205: Opens the navigation bar -->
    <a href="index.php"><button>About</button></a>                 <!-- Line 206: Button linking to Page 1 (this page) -->
    <a href="page2.php"><button>Chapel Green Board School</button></a>     <!-- Line 207: Button linking to Page 2 -->
    <a href="page3.php"><button>Thornton Lane Board School</button></a>    <!-- Line 208: Button linking to Page 3 -->
    <a href="page4.php"><button>Marshfield School</button></a>             <!-- Line 209: Button linking to Page 4 -->
    <a href="staff.php"><button>Staff Database</button></a>                <!-- Line 210: Button linking to Page 5 (Staff database) -->
    <a href="sources.php"><button>Sources Database</button></a>            <!-- Line 211: Button linking to Page 6 (Sources database) -->
</nav>                                                             <!-- Line 212: Closes the navigation bar -->

<!-- ============================================================
     Line 215: PAGE 1 – MAIN CONTENT SECTION
     Two-column layout: About text (left) and Notable Dates (right)
     ============================================================ -->
<main>                                                             <!-- Line 219: Opens the main content area -->
    <div class="content-wrapper">                                  <!-- Line 220: Opens the two-column wrapper div -->

        <!-- --------------------------------------------------------
             Line 223: LEFT COLUMN – About text
             -------------------------------------------------------- -->
        <section class="main-text">                                <!-- Line 226: Opens the left column text section -->
            <h2>About</h2>                                         <!-- Line 227: Sub-header for the left column -->

            <!-- Line 229: Paragraph 1 – Introduction -->
            <p>This application is a Community Research project focusing on the history of Marshfield School
            (Little Horton District) which is part of Bradford's educational history. It is intended as a
            resource for anyone researching Bradford's educational history or just interested in the history
            of Marshfield School.</p>                              <!-- Line 233: End of paragraph 1 -->

            <!-- Line 235: Paragraph 2 – Copyright warning -->
            <p>It should be noted that all the information available in this application was provided under
            a personal, research and educational copy write. Therefore, it is likely to be covered by some
            other form of other copy-right restrictions. See copy-write statement at the end of this text.
            If you ignore this warning on copy-right infringement's, then as the person carrying out the
            infringement you will be solely responsible for any repercussions.</p> <!-- Line 240: End of paragraph 2 -->

            <!-- Line 242: Paragraph 3 – What information is available -->
            <p>The information available to users shows the school through the lens of School Log Books,
            Admission Books, Punishment Books, Images and other sources. Using these sources enables the
            school history to be viewed from its conception as Chapel Green Board School through to the
            present Marshfield School.</p>                         <!-- Line 246: End of paragraph 3 -->

            <!-- Line 248: Paragraph 4 – Acknowledgement of D Craven -->
            <p>Some of the resources included here have been collected and published (though not widely)
            by Mr D Craven in 2004. Many thanks to D Craven for allowing me to merge my research with
            that of his own.</p>                                   <!-- Line 251: End of paragraph 4 -->

            <!-- Line 253: Paragraph 5 – Value of the logbooks -->
            <p>Major resources like the School Logbooks offer a unique window into the past from which
            general information on the day to day running of the school can be seen. From these comments
            many social aspects, of the time, can be seen and occasionally the head teacher's private
            thoughts or frustrations are expressed. Admission books show when a person entered the school,
            their father's name, Standards attained and when they left school. Once again, another source
            full of social and societal information just waiting to be analysed.</p> <!-- Line 259: End of paragraph 5 -->

            <!-- Line 261: Paragraph 6 – Purpose of notable dates -->
            <p>Notable dates are intended to show key dates for researchers / interested parties to
            note.</p>                                              <!-- Line 263: End of paragraph 6 -->

            <!-- Line 265: Paragraph 7 – Booklets, with hyperlink to Page 1a -->
            <p>Two booklets that have been published about Marshfield School are included in the sources.
            The first is the 'Historical Sketch' of Marshfield School written by J Jackson. The second is
            'Marshfield School: Our Heroes of World War 1' written by Ray Greenhough. To read the two
            booklets click <a href="page1a.php">here</a>.</p>      <!-- Line 269: 'here' links to Page 1a (booklets page) -->

            <!-- Line 271: Copyright notice box -->
            <div class="copyright">                                <!-- Line 272: Opens the copyright box -->
                <strong>Copyright:</strong> Permission is granted for personal and educational use only.
                Commercial copying, hiring or lending is strictly prohibited. All rights reserved.
            </div>                                                  <!-- Line 275: Closes the copyright box -->

        </section>                                                  <!-- Line 277: Closes the left column -->

        <!-- --------------------------------------------------------
             Line 280: RIGHT COLUMN – Notable Dates sidebar
             -------------------------------------------------------- -->
        <aside class="notable-dates">                              <!-- Line 283: Opens the right column (sidebar) -->
            <h2>Notable Dates</h2>                                 <!-- Line 284: Sidebar heading -->

            <!-- Line 286: Notable date entry 1 -->
            <div class="date-entry">                               <!-- Line 287: Opens a date entry block -->
                <strong>1870:</strong> Education Act enables local councils to open, operate and fund
                elementary education through the public purse.
            </div>                                                  <!-- Line 290: Closes date entry 1 -->

            <!-- Line 292: Notable date entry 2 -->
            <div class="date-entry">                               <!-- Line 293: Opens a date entry block -->
                <strong>1870:</strong> The purpose of the Act was to provide education where there were
                insufficient Church School provisions. Often called "Filling the Gaps".
            </div>                                                  <!-- Line 296: Closes date entry 2 -->

            <!-- Line 298: Notable date entry 3 -->
            <div class="date-entry">                               <!-- Line 299: Opens a date entry block -->
                <strong>1870:</strong> Bradford set up its School Board in November.
            </div>                                                  <!-- Line 301: Closes date entry 3 -->

            <!-- Line 303: Notable date entry 4 -->
            <div class="date-entry">                               <!-- Line 304: Opens a date entry block -->
                <strong>1873:</strong> The School Board opened its first schools in rented buildings.
            </div>                                                  <!-- Line 306: Closes date entry 4 -->

            <!-- Line 308: Notable date entry 5 -->
            <div class="date-entry">                               <!-- Line 309: Opens a date entry block -->
                <strong>1874:</strong> Eight School Board schools were built and opened.
            </div>                                                  <!-- Line 311: Closes date entry 5 -->

            <!-- Line 313: Notable date entry 6 -->
            <div class="date-entry">                               <!-- Line 314: Opens a date entry block -->
                <strong>1876:</strong> Parents became responsible for ensuring their children learnt
                the 3 R's.
            </div>                                                  <!-- Line 317: Closes date entry 6 -->

            <!-- Line 319: Notable date entry 7 -->
            <div class="date-entry">                               <!-- Line 320: Opens a date entry block -->
                <strong>1876:</strong> Bradford School Board created an attendance committee.
            </div>                                                  <!-- Line 322: Closes date entry 7 -->

            <!-- Line 324: Notable date entry 8 -->
            <div class="date-entry">                               <!-- Line 325: Opens a date entry block -->
                <strong>1876:</strong> Restricted child labour by linking it to passing certain
                school standards.
            </div>                                                  <!-- Line 328: Closes date entry 8 -->

        </aside>                                                    <!-- Line 330: Closes the right column sidebar -->

    </div>                                                          <!-- Line 332: Closes the two-column wrapper -->
</main>                                                            <!-- Line 333: Closes the main content area -->

<!-- ============================================================
     Line 336: PAGE 1 – FOOTER SECTION
     ============================================================ -->
<footer>                                                           <!-- Line 339: Opens the footer -->
    Community History Research by Ray Greenhough                   <!-- Line 340: Footer text -->
</footer>                                                          <!-- Line 341: Closes the footer -->

</body>                                                            <!-- Line 343: Closes the page body -->
</html>                                                            <!-- Line 344: Closes the html document -->