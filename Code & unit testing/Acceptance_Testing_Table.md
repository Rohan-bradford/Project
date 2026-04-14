# Acceptance Testing Table

Total: **46**, Passed: **46**, Failed: **0**

| Test ID | Area | Description | Expected Result | Actual Result | Status |
|---|---|---|---|---|---|
| AT-001 | Startup | Open root URL / | 302 redirect to /page1 | 302 -> /page1 | Pass |
| AT-PG-PAGE1 | Page Route | Open /page1 | 200 response | 200 | Pass |
| AT-PG-PAGE1A | Page Route | Open /page1a | 200 response | 200 | Pass |
| AT-PG-PAGE2 | Page Route | Open /page2 | 200 response | 200 | Pass |
| AT-PG-PAGE3 | Page Route | Open /page3 | 200 response | 200 | Pass |
| AT-PG-PAGE3A | Page Route | Open /page3a | 200 response | 200 | Pass |
| AT-PG-PAGE4 | Page Route | Open /page4 | 200 response | 200 | Pass |
| AT-PG-PAGE4A | Page Route | Open /page4a | 200 response | 200 | Pass |
| AT-PG-PAGE4B | Page Route | Open /page4b | 200 response | 200 | Pass |
| AT-PG-PAGE4C | Page Route | Open /page4c | 200 response | 200 | Pass |
| AT-PG-PAGE4D | Page Route | Open /page4d | 200 response | 200 | Pass |
| AT-PG-PAGE4E | Page Route | Open /page4e | 200 response | 200 | Pass |
| AT-PG-PAGE4F | Page Route | Open /page4f | 200 response | 200 | Pass |
| AT-PG-PAGE4G | Page Route | Open /page4g | 200 response | 200 | Pass |
| AT-PG-PAGE4H | Page Route | Open /page4h | 200 response | 200 | Pass |
| AT-PG-PAGE4I | Page Route | Open /page4i | 200 response | 200 | Pass |
| AT-PG-PAGE4J | Page Route | Open /page4j | 200 response | 200 | Pass |
| AT-PG-PAGE4K | Page Route | Open /page4k | 200 response | 200 | Pass |
| AT-PG-PAGE4L | Page Route | Open /page4l | 200 response | 200 | Pass |
| AT-PG-PAGE4M | Page Route | Open /page4m | 200 response | 200 | Pass |
| AT-PG-PAGE4N | Page Route | Open /page4n | 200 response | 200 | Pass |
| AT-PG-PAGE4O | Page Route | Open /page4o | 200 response | 200 | Pass |
| AT-PG-PAGE4P | Page Route | Open /page4p | 200 response | 200 | Pass |
| AT-PG-PAGE4Q | Page Route | Open /page4q | 200 response | 200 | Pass |
| AT-PG-PAGE4R | Page Route | Open /page4r | 200 response | 200 | Pass |
| AT-PG-PAGE4S | Page Route | Open /page4s | 200 response | 200 | Pass |
| AT-PG-PAGE5 | Page Route | Open /page5 | 200 response | 200 | Pass |
| AT-PG-PAGE6 | Page Route | Open /page6 | 200 response | 200 | Pass |
| AT-002 | Routing Safety | Open invalid route | Redirect safely to /page1 | 302 -> /page1 | Pass |
| AT-NAV-PAGE1 | Navigation | Check global nav labels on /page1 | All 6 labels present | present | Pass |
| AT-NAV-PAGE2 | Navigation | Check global nav labels on /page2 | All 6 labels present | present | Pass |
| AT-NAV-PAGE3 | Navigation | Check global nav labels on /page3 | All 6 labels present | present | Pass |
| AT-NAV-PAGE4 | Navigation | Check global nav labels on /page4 | All 6 labels present | present | Pass |
| AT-NAV-PAGE5 | Navigation | Check global nav labels on /page5 | All 6 labels present | present | Pass |
| AT-NAV-PAGE6 | Navigation | Check global nav labels on /page6 | All 6 labels present | present | Pass |
| AT-FILE-01 | Archive Files | Open /Images/Log%20books/Infant_1877%20-1905.pdf | 200 response | 200 (application/pdf) | Pass |
| AT-FILE-02 | Archive Files | Open /Images/Log%20books/Junior_1877%20-%201910.pdf | 200 response | 200 (application/pdf) | Pass |
| AT-FILE-03 | Archive Files | Open /Images/Log%20books/Church_%20School__%201868%20-%201903.pdf | 200 response | 200 (application/pdf) | Pass |
| AT-FILE-04 | Archive Files | Open /Images/Punishment_Books/Marshfield_Punishment_Book/003%20-%201903%20Oct%20-%201903%20Nov.jpg | 200 response | 200 (image/jpeg) | Pass |
| AT-003 | Reliability | Open missing image file | 404 without app crash | 404 | Pass |
| AT-DB-01 | Staff DB | Filter by school_name on /page5 | Page loads and seeded row visible | status=200, row=yes | Pass |
| AT-DB-02 | Sources DB | Filter by school and source_type on /page6 | Page loads and seeded row visible | status=200, row=yes | Pass |
| AT-DB-03 | Staff DB | Submit /page5/add with missing School Name | Redirect with status=missing | 302 -> /page5?status=missing | Pass |
| AT-DB-04 | Staff DB | Submit valid /page5/add | Redirect status=added and row inserted | 302, count=1 | Pass |
| AT-DB-05 | Sources DB | Submit /page6/add with missing Source Name | Redirect with status=missing | 302 -> /page6?status=missing | Pass |
| AT-DB-06 | Sources DB | Submit valid /page6/add | Redirect status=added and row inserted | 302, row=('Inserted Source', '/Images/Log books/Infant_1877 -1905.pdf') | Pass |