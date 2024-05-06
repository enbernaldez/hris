<!DOCTYPE html>
<?php
include_once "db_conn.php";
$user_type = $_SESSION['user_type'] ?? 'V';
?>
<html lang="en">

<head>
    <title>HRIS - Trainings</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">

    <style>
        /* title bar */
        .titletext {
            color: #E4E9FF;
            text-align: center;
            margin: 0;
        }

        /* search box */
        .search-box {
            border: 1px solid #939393;
            background-color: #F5F5F5;
        }

        /* modal */
        .modal-content-style {
            background-color: #80A1F5;
            height: auto;
            width: 500px;
        }

        /* table */

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

                <!-- title bar -->
                <div class="row mt-3"
                    style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
                    <h4 class="titletext"><strong>TRAININGS</strong></h4>
                </div>

                <div class="row mt-5">
                    <!-- white space -->
                    <div class="col"></div>
                    <!-- add trainings button -->
                    <div class="col-1">
                        <button class="btn btn-primary" style="float: left; background-color: #283872; border: none;"
                            data-bs-toggle="modal" data-bs-target="#modal_addTraining">+ ADD</button>
                    </div>
                    <!-- search box -->
                    <div class="col-4">
                        <div class="input-group rounded">
                            <input type="search" name="search_input" class="form-control search-box"
                                placeholder="Search..." aria-label="Search" aria-describedby="search-trainings">
                            <button type="button" class="btn btn-secondary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- table -->
                <div class="row mt-4">
                    <table id="trainings">
                        <thead>
                            <tr>
                                <th class="col-8">Title</th>
                                <th class="col-2">Type of LD</th>
                                <th class="col-2">Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Webinar on Health and Wellness: Recognizing Common Signs and Symptoms and its
                                    Management</td>
                                <td>Managerial</td>
                                <td>02/02/2023</td>
                            </tr>
                            <tr>
                                <td>Data Management in Excel Part 1</td>
                                <td>Managerial</td>
                                <td>04/10/2023</td>
                            </tr>
                            <tr>
                                <td>Data Mangement in Excel Part 2</td>
                                <td>Managerial</td>
                                <td>04/10/2023</td>
                            </tr>
                            <tr>
                                <td>2022 Census Something Something</td>
                                <td>Supervisory</td>
                                <td>04/20/2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Training Modal -->
        <div class="modal fade" id="modal_addTraining" tabindex="-1" aria-labelledby="modal_addTrainingLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-style">

                    <div class="modal-header">
                        <h6 class="modal-title" id="delete">Add Training</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4">
                        <form action="trainings_new.php" method="POST">
                            <div class="my-3">
                                <label for="titleInput" class="form-label">TITLE:</label>
                                <input type="text" class="form-control" id="titleInput" required>
                            </div>
                            <div class="my-3">
                                <label for="typeOfLdInput" class="form-label">TYPE OF LD:</label>
                                <input type="text" class="form-control" id="typeOfLdInput" required>
                            </div>
                            <div class="my-3">
                                <label for="employees" class="form-label">Employees</label>
                                <select name="training_employee" id="training_employee" required class="form-select">
                                    <option value="" disabled selected value>--select--</option>
                                    <?php
                                    $list_employees = query($conn, "SELECT * FROM `employees`");
                                    foreach ($list_employees as $key => $value) {
                                        $employee_id = $value['employee_id'];
                                        $firstname = $value['employee_firstname'];
                                        $middlename = $value['employee_middlename'];
                                        $middlename = ($middlename === 'N/A') ? '' : " $middlename";
                                        $lastname = $value['employee_lastname'];
                                        $nameext = $value['employee_nameext'];
                                        $nameext = ($nameext === 'N/A') ? '' : " $nameext";

                                        echo "<option value='" . $employee_id . "'>" . $firstname . $middlename . $lastname . $nameext ."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="my-3">
                                
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <span style="margin-right: 40px;"></span>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function redirect() {
            window.location = "training_employee.php";
        }
        // function redirect($ld_title_id) {
        //     window.location = "training_employee.php?title_id=" . $ld_title_id;
        // }
    </script>
</body>

</html>