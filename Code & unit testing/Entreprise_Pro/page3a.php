<!DOCTYPE html>                                                    <!-- Line 1:  Declares this as an HTML5 document -->
<html lang="en">                                                   <!-- Line 2:  Opens the html element -->
<head>                                                             <!-- Line 3:  Opens the head section -->
    <meta charset="UTF-8">                                         <!-- Line 4:  Sets character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Line 5: Mobile display -->
    <title>Marshfield School History â Thornton Lane – Admission Register 1894–1901</title>             <!-- Line 6:  Browser tab title -->
    <style>                                                        /* Line 7:  Opens CSS section */
        * { box-sizing: border-box; margin: 0; padding: 0; }     /* Line 8:  Global reset */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; } /* Line 9: Body */
        header { background-color: #1e3a8a; color: white; padding: 15px 30px; display: flex; align-items: center; gap: 20px; } /* Line 10: Header */
        header img { height: 70px; width: auto; border-radius: 4px; object-fit: cover; } /* Line 11: Header image */
        header h1 { font-size: 1.6rem; }                         /* Line 12: Header title */
        nav { background-color: #162d6e; padding: 10px 30px; display: flex; gap: 10px; flex-wrap: wrap; } /* Line 13: Nav bar */
        nav a button { background-color: white; color: #1e3a8a; border: none; padding: 8px 16px; cursor: pointer; font-weight: bold; border-radius: 4px; font-size: 0.9rem; transition: background-color 0.2s; } /* Line 14: Nav buttons */
        nav a button:hover { background-color: #dbeafe; }        /* Line 15: Hover colour */
        main { padding: 30px; }                                  /* Line 16: Main spacing */

        /* ---- Line 18: Page heading ---- */
        .page-heading {
            color: #1e3a8a;                                        /* Line 20: Dark blue heading */
            font-size: 1.3rem;                                     /* Line 21: Heading size */
            margin-bottom: 20px;                                   /* Line 22: Space below heading */
            border-bottom: 2px solid #1e3a8a;                     /* Line 23: Blue underline */
            padding-bottom: 8px;                                   /* Line 24: Space to underline */
        }

        /* ---- Line 27: PDF viewer container ---- */
        .pdf-container {
            width: 100%;                                           /* Line 29: Full width */
            height: 80vh;                                          /* Line 30: Takes up 80% of the screen height */
            border: 2px solid #1e3a8a;                             /* Line 31: Dark blue border around the PDF */
            border-radius: 6px;                                    /* Line 32: Rounded corners */
            background: white;                                     /* Line 33: White background */
        }

        /* ---- Line 36: Message shown if PDF cannot be displayed ---- */
        .pdf-fallback {
            text-align: center;                                    /* Line 38: Centred text */
            padding: 40px;                                         /* Line 39: Inner spacing */
            font-size: 0.95rem;                                    /* Line 40: Text size */
        }
        .pdf-fallback a {
            color: #1e3a8a;                                        /* Line 43: Dark blue link */
            font-weight: bold;                                     /* Line 44: Bold link */
            text-decoration: underline;                            /* Line 45: Underlined link */
        }

        /* ---- Line 48: Back button row ---- */
        .back-bar {
            margin-bottom: 20px;                                   /* Line 50: Space below back button */
        }
        .btn-back {
            background-color: #1e3a8a;                             /* Line 53: Dark blue button */
            color: white;                                          /* Line 54: White text */
            border: none;                                          /* Line 55: No border */
            padding: 9px 22px;                                     /* Line 56: Button spacing */
            border-radius: 4px;                                    /* Line 57: Rounded corners */
            cursor: pointer;                                       /* Line 58: Hand cursor */
            font-weight: bold;                                     /* Line 59: Bold text */
            font-size: 0.9rem;                                     /* Line 60: Text size */
            text-decoration: none;                                 /* Line 61: No underline on the link */
            display: inline-block;                                 /* Line 62: Allows padding to work on a link */
            transition: background-color 0.2s;                     /* Line 63: Smooth hover change */
        }
        .btn-back:hover { background-color: #162d6e; }           /* Line 65: Darker blue on hover */

        footer { text-align: center; padding: 20px; background-color: #1e3a8a; color: white; margin-top: 30px; font-size: 0.9rem; } /* Line 67: Footer */
    </style>                                                       <!-- Line 68: Closes CSS section -->
</head>                                                            <!-- Line 69: Closes head section -->

<body>                                                             <!-- Line 71: Opens page body -->

<!-- ============================================================
     Line 74: HEADER SECTION
     ============================================================ -->
<header>                                                           <!-- Line 77: Opens header -->
    <img src="Images/Images/Marshfield_School.jpg" alt="Marshfield School" onerror="this.style.display='none'"> <!-- Line 78: School photo -->
    <h1>Marshfield School History</h1>                             <!-- Line 79: Site title -->
</header>                                                          <!-- Line 80: Closes header -->

<!-- ============================================================
     Line 83: NAVIGATION BAR
     ============================================================ -->
<nav>                                                              <!-- Line 86: Opens nav bar -->
    <a href="index.php"><button>About</button></a>                 <!-- Line 87: Link to Page 1 -->
    <a href="page2.php"><button>Chapel Green Board School</button></a>     <!-- Line 88: Link to Page 2 -->
    <a href="page3.php"><button>Thornton Lane Board School</button></a>    <!-- Line 89: Link to Page 3 -->
    <a href="page4.php"><button>Marshfield School</button></a>             <!-- Line 90: Link to Page 4 -->
    <a href="staff.php"><button>Staff Database</button></a>                <!-- Line 91: Link to Staff database -->
    <a href="sources.php"><button>Sources Database</button></a>            <!-- Line 92: Link to Sources database -->
</nav>                                                             <!-- Line 93: Closes nav bar -->

<!-- ============================================================
     Line 96: MAIN CONTENT – PDF viewer
     ============================================================ -->
<main>                                                             <!-- Line 99: Opens main content -->

    <!-- Line 101: Back button – returns user to the parent page -->
    <div class="back-bar">                                         <!-- Line 102: Opens back button row -->
        <a href="page3.php" class="btn-back">&#8592; Back to Thornton Lane Board School</a> <!-- Line 103: Back button link -->
    </div>                                                         <!-- Line 104: Closes back button row -->

    <h2 class="page-heading">Thornton Lane – Admission Register 1894–1901</h2>                         <!-- Line 106: Page heading showing document name -->

    <!-- Line 108: PDF VIEWER
         The <object> tag tells the browser to display the PDF file directly
         on the page. The browser uses its built-in PDF viewer which includes
         its own controls for scrolling, zooming and navigating pages.
         If the browser cannot display the PDF, the fallback message is shown. -->
    <object class="pdf-container"                                  <!-- Line 114: Opens the PDF viewer element -->
            data="Images/Admission_Registers/Admission_Jan1894-Feb1901.pdf"                                           <!-- Line 115: Points to the PDF file location -->
            type="application/pdf">                                <!-- Line 116: Tells the browser this is a PDF -->
        <div class="pdf-fallback">                                 <!-- Line 117: Opens fallback message (shown if PDF viewer fails) -->
            <p>Your browser cannot display this PDF directly.</p>  <!-- Line 118: Fallback message line 1 -->
            <p><a href="Images/Admission_Registers/Admission_Jan1894-Feb1901.pdf">Click here to download and open the document</a></p> <!-- Line 119: Direct download link -->
        </div>                                                     <!-- Line 120: Closes fallback message -->
    </object>                                                      <!-- Line 121: Closes the PDF viewer element -->

</main>                                                            <!-- Line 123: Closes main content -->

<!-- ============================================================
     Line 126: FOOTER
     ============================================================ -->
<footer>                                                           <!-- Line 129: Opens footer -->
    Community History Research by Ray Greenhough                   <!-- Line 130: Footer text -->
</footer>                                                          <!-- Line 131: Closes footer -->

</body>                                                            <!-- Line 133: Closes page body -->
</html>                                                            <!-- Line 134: Closes html document -->