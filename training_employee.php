<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Inventory System</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>


    <style>
        .tile {
            width: 320px;
            height: 310px;
            background-color: #80A1F5;
            border-radius: 12px;
            padding: 10px;
        }

        .titletext {
            color: #E4E9FF;
            text-align: center;
            margin: 0;
        }

        .auto-fit-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            text-transform: uppercase; /* Capitalize text */
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- SIDEBAR -->
            <?php include_once "sidebar1.php"; ?>

            <!-- CONTENT -->
            <div class="col-10 px-5 pt-3 pb-5">
                <!-- logo -->
                <img src="images/PSA banner.jpg" alt="PSA Banner" class="img-fluid" style="max-height: 128px;">

                <?php
                // retrieve lnd title from db
                $sql = "SELECT `ld_title_name`
                        FROM `ld_titles`
                        WHERE `ld_title_id` = ?";
                $filter = array($_GET['title_id']);
                $result = query($conn, $sql, $filter);

                $row = $result[0];

                // transfers value of retrieved variables to local variables
                $title = $row['ld_title_name'];
                ?>

                <!-- title bar -->
                <div class="row mt-3 px-3"
                    style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
                    <h4 class="titletext uppercase auto-fit-text">
                        <strong>
                            <?php echo htmlspecialchars($title); ?>
                        </strong>
                    </h4>
                </div>

                <!-- Table -->
                <div class="row mt-3">
                    <div class="col-1">
                        <a href="trainings.php">
                            <i class="bi bi-arrow-left-circle" id="backArrow" style="font-size: 30px; color: #283872"></i>
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <table id="data-table">
                        <thead>
                            <tr>
                            <th rowspan="2">Employee</th>
                                <th colspan="2">Inclusive Dates of Attendance (mm/dd/yy)</th>
                                <th rowspan="2">Number of Hours</th>
                                <th rowspan="2">Type of LD</th>
                                <th rowspan="2">Conducted/Sponsored by</th>
                            </tr>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // retrieve all data from learning_development table
                            $sql = "SELECT *
                                    FROM `learning_development` ld
                                    JOIN `employees` e ON ld.`employee_id` = e.`employee_id`
                                    WHERE `ld_title_id` = ? AND e.`employee_status` = 'A'";
                            $filter = array($_GET['title_id']);
                            $result = query($conn, $sql, $filter);

                            if (!empty($result)) {
                                foreach ($result as $row) {
                                    // transfers value of retrieved variables to local variables
                                    $employee_id = $row['employee_id'];
                                    $ld_from = $row['ld_from'];
                                    $ld_to = $row['ld_to'];
                                    $ld_hrs = $row['ld_hrs'];
                                    $ld_type = $row['ld_type'];
                                    $sponsor_id = $row['sponsor_id'];

                                    // retrieve all data from employees table
                                    $sql = "SELECT *
                                            FROM `employees`
                                            WHERE `employee_id` = ?";
                                    $filter = array($employee_id);
                                    $result = query($conn, $sql, $filter);

                                    $row = $result[0];

                                    // transfers value of retrieved variables to local variables
                                    $firstname = $row['employee_firstname'];
                                    $middlename = $row['employee_middlename'];
                                    $middlename = ($middlename === 'N/A') ? '' : " $middlename";
                                    $lastname = $row['employee_lastname'];
                                    $nameext = $row['employee_nameext'];
                                    $nameext = ($nameext === 'N/A') ? '' : " $nameext";

                                    // retrieve all data from sponsors table
                                    $sql = "SELECT *
                                            FROM `sponsors`
                                            WHERE `sponsor_id` = ?";
                                    $filter = array($sponsor_id);
                                    $result = query($conn, $sql, $filter);

                                    $row = $result[0];

                                    // transfers value of retrieved variables to local variables
                                    $sponsor = $row['sponsor_name'];

                                    // Format the dates
                                    $ld_from_date = new DateTime($ld_from);
                                    $ld_to_date = new DateTime($ld_to);
                                    $formatted_ld_from = $ld_from_date->format('F j, Y');
                                    $formatted_ld_to = $ld_to_date->format('F j, Y');

                                    echo "
                                        <tr>
                                            <td>$firstname$middlename $lastname$nameext</td>
                                            <td>" . htmlspecialchars($formatted_ld_from) . "</td>
                                            <td>" . htmlspecialchars($formatted_ld_to) . "</td>
                                            <td>" . htmlspecialchars($ld_hrs) . "</td>
                                            <td>" . htmlspecialchars($ld_type) . "</td>
                                            <td>" . htmlspecialchars($sponsor) . "</td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo '<tr><td colspan="6">No records found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <!-- Add a download button -->
                <button type="button" class="btn btn-primary" id="pdf-download" style="background-color: #283872; border: none;">Download as PDF</button>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('pdf-download').addEventListener('click', () => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const title = "<?php echo htmlspecialchars($title); ?>";
        const pageWidth = doc.internal.pageSize.getWidth();
        const titleWidth = doc.getTextWidth(title);
        const titleX = (pageWidth - titleWidth) / 2;

        doc.setFontSize(18);
        doc.text(title, titleX, 20);

        const table = document.getElementById('data-table');
        const rows = Array.from(table.rows).map(row => Array.from(row.cells).map(cell => cell.innerText));

        // Extract and format the table head and body
        const head = [
            [
                { content: 'Employee', rowSpan: 2 },
                { content: 'Inclusive Dates of Attendance (mm/dd/yy)', colSpan: 2, styles: { halign: 'center' } },
                { content: 'Number of Hours', rowSpan: 2 },
                { content: 'Type of LD', rowSpan: 2 },
                { content: 'Conducted/Sponsored by', rowSpan: 2 }
            ],
            [
                { content: 'From', styles: { halign: 'center' } },
                { content: 'To', styles: { halign: 'center' } }
            ]
        ];
        const body = rows.slice(2);

        // Add table to PDF
        doc.autoTable({
            head: head,
            body: body,
            startY: 30,
            styles: {textColor: 'black', halign: 'center', lineWidth: 0.1, lineColor: [0, 0, 0], fillColor: null, cellPadding: 2},
            headStyles: {textColor: 'black', halign: 'center'},
            bodyStyles: {fontSize: 9, overflow: 'linebreak'},
           
            theme: 'grid',
            tableLineColor: 'black',
            tableLineWidth: 0.1,
            didParseCell: ({ cell, rowSpan, colSpan }) => {
                if (cell.raw.rowSpan) rowSpan = cell.raw.rowSpan;
                if (cell.raw.colSpan) colSpan = cell.raw.colSpan;
            }
        });

        doc.save("HRIS_Report.pdf");
    });
    </script>
</body>

</html>
