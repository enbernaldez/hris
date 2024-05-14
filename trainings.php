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
                <img src="images/PSA banner.jpg" alt="PSA Banner" width="auto" height="128px" class="img-fluid">

                <!-- title bar -->
                <div class="row mt-3"
                    style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
                    <h4 class="titletext"><strong>TRAININGS</strong></h4>
                </div>

                <div class="row mt-5">
                    <!-- white space -->
                    <div class="col"></div>
                    <!-- add trainings button -->
                    <div class="col-1 px-5 mx-2">
                        <button class="btn btn-primary" style="float: left; background-color: #283872; border: none;"
                            data-bs-toggle="modal" data-bs-target="#modal_addTraining">ADD</button>
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
                            <?php
                            // $sql = "SELECT DISTINCT `ld_title_id` FROM `learning_development` WHERE `ld_id` = '3'";
                            $sql = "SELECT DISTINCT `ld_title_id`
                                                  FROM `learning_development`
                                                  WHERE (`ld_title_id`, `date_added`) IN (
                                                      SELECT 'ld_title_id', MAX(`date_added`)
                                                      FROM `learning_development`
                                                      GROUP BY `ld_title_id`
                                                  )";
                            $filter = array();
                            $result = query($conn, $sql, $filter);
                            if (empty($result)) {
                                ?>
                                <tr onclick="redirect()">
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
                                <?php
                            }
                            foreach ($result as $key => $row) {
                                $title_id = $row['ld_title_id'];
                                $last_updated = $row['date_added'];

                                // write sql to retrieve all ld types for a specific title
                                $sql = "SELECT `ld_type`
                                        FROM `learning_development`
                                        WHERE `ld_title_id` = ?";
                                $filter = array($row['ld_title_id']);
                                $result = query($conn, $sql, $filter);
                                $ld_type = "";
                                foreach ($result as $key => $value) {
                                    if ($key > 0) {
                                        $ld_type .= "/";
                                    }
                                    $ld_type .= $value['ld_type'];
                                }

                                echo "<tr onclick='redirect(" . $row['ld_title_id'] . ")'>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $ld_type . "</td>";
                                echo "<td>" . $row['last_updated'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
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

                            <div class="row-container my-3">
                                <label for="employees" class="form-label">Employees</label>
                                <div class="training_employee checkbox-container my-2">
                                    <select name="training_employee" id="training_employee" required
                                        class="form-select">
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

                                            echo "<option value='" . $employee_id . "'>" . $firstname . $middlename . $lastname . $nameext . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <!-- Delete Button -->
                                    <button type="button" class="delete-row-button mx-auto"
                                        style="display:none; background-color: transparent; border: none; color: red;">
                                    </button>
                                </div>
                            </div>
                            <!-- Add Row Button -->
                            <div class="row mx-0 my-3">
                                <button type="button" class="btn btn-primary add-row-button mt-1 float-start"
                                    style="width:100px" onclick="addInput()">
                                    ADD ROW
                                </button>
                            </div>

                            <div class="my-3">
                                <label for="inclusiveDatesOfattedance" class="form-label">Inclusive Dates of
                                    Attendance</label><br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="from" class="form-label">FROM:</label>
                                        <input type="date" required name="date_from[]" id="date_from"
                                            class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="to" class="form-label">TO:</label>
                                        <input type="date" required name="date_to[]" id="date_to" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="my-3">
                                <label for="numberOfHours" class="form-label">Number of Hours:</label>
                                <input type="number" class="form-control" id="numberOfHours" required>
                            </div>

                            <div class="my-3">
                                <label for="conducted_Sponsoredby" class="form-label">Conducted/Sponsored By:</label>
                                <input type="text" class="form-control" id="conducted_Sponsoredby" required>
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

        // =================================== Add Row ===================================
        function addInput() {
            var container = document.querySelector('.row-container');

            // Clone the selected employee dropdown
            var selectedEmployee = document.querySelector('.training_employee');
            var clonedEmployee = selectedEmployee.cloneNode(true);
            clonedEmployee.removeAttribute('id');
            clonedEmployee.removeAttribute('required');

            container.appendChild(clonedEmployee);

            // Create delete button
            var deleteButton = clonedEmployee.querySelector('.delete-row-button');
            deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
            deleteButton.addEventListener('click', function () {
                clonedEmployee.parentNode.removeChild(clonedEmployee);
            });
            deleteButton.style.cssText = 'background-color: transparent; border: none; color: red;';
        }
    </script>
</body>

</html>