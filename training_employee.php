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
                    <table>
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th colspan="2">Inclusive Dates</th>
                                <th>Number of Hours</th>
                                <th>Type of LD</th>
                                <th>Conducted/Sponsored by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // retrieve all data from learning_development table
                            $sql = "SELECT *
                                    FROM `learning_development`
                                    WHERE `ld_title_id` = ?";
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
            </div>
        </div>
    </div>
</body>

</html>
