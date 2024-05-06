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
                <img src="images/PSA banner.jpg" alt="PSA Banner" width="auto" height="128px">

                <?php
                // $sql = "SELECT `ld_title_name`
                //         FROM `ld_titles`
                //         WHERE `ld_title_id` = ?";
                // $filter = array($_GET['title_id']);
                // $result = query($conn, $sql, $filter);
                
                // $row = $result[0];
                
                // $title = $row['ld_title_name'];
                ?>

                <!-- title bar -->
                <div class="row mt-3 px-3"
                    style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
                    <h4 class="titletext auto-fit-text">
                        <strong>
                            <?php // echo $title; ?>
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                            id est laborum.
                        </strong>
                    </h4>
                </div>

                <!-- Table -->
                <div class="row mt-3">
                    <div class="col-1">
                        <i class="bi bi-arrow-left-circle" id="backArrow" style="font-size: 30px; cursor: pointer;"
                            onclick="history.back()"></i>
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
                                <th>
                                    <span>Conducted/Sponsored by</span>
                                    <span>(Write in Full)</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `learning_development` WHERE `ld_title_id` = '3'";
                            // $sql = "SELECT *
                            //         FROM `learning_development`
                            //         WHERE `ld_title_id` = ?";
                            // $filter = array($_GET['title_id']);
                            // $result = query($conn, $sql, $filter);
                            $result = query($conn, $sql);

                            if (empty($result)) {
                            ?>
                            <tr>
                                <td>April Cassandra Sasa Regalario</td>
                                <td>01/27/2021</td>
                                <td>01/27/2021</td>
                                <td>4</td>
                                <td>Managerial</td>
                                <td>PSA-Albay</td>
                            </tr>
                            <tr>
                                <td>José Protasio Rizal Mercado y Alonso Realonda</td>
                                <td>01/27/2021</td>
                                <td>01/27/2021</td>
                                <td>4</td>
                                <td>Managerial</td>
                                <td>PSA-Albay</td>
                            </tr>
                            <tr>
                                <td>José Protasio Rizal Mercado y Alonso Realonda</td>
                                <td>01/27/2021</td>
                                <td>01/29/2021</td>
                                <td>24</td>
                                <td>Managerial</td>
                                <td>PSA-Albay</td>
                            </tr>
                            <?php
                            } else {
                                foreach ($result as $key => $row) {
                                    $employee_id = $row['employee_id'];
                                    $ld_from = $row['ld_from'];
                                    $ld_to = $row['ld_to'];
                                    $ld_hrs = $row['ld_hrs'];
                                    $ld_type = $row['ld_type'];
                                    $sponsor_id = $row['sponsor_id'];

                                    $sql = "SELECT *
                                            FROM `employees`
                                            WHERE `employee_id` = ?";
                                    $filter = array($employee_id);
                                    $result = query($conn, $sql, $filter);

                                    $row = $result[0];

                                    $employee_id = $row['employee_id'];
                                    $firstname = $row['employee_firstname'];
                                    $middlename = $row['employee_middlename'];
                                    $middlename = ($middlename === 'N/A') ? '' : " $middlename";
                                    $lastname = $row['employee_lastname'];
                                    $nameext = $row['employee_nameext'];
                                    $nameext = ($nameext === 'N/A') ? '' : " $nameext";

                                    echo "
                                        <tr>
                                            <td>$firstname$middlename $lastname$nameext</td>
                                            <td>" . $ld_from . "</td>
                                            <td>" . $ld_to . "</td>
                                            <td>" . $ld_hrs . "</td>
                                            <td>" . $ld_type . "</td>
                                            <td>" . $sponsor_id . "</td>
                                        </tr>
                                    ";
                                }
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