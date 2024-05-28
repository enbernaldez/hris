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
                <img src="images/PSA banner.jpg" alt="PSA Banner" class="img-fluid" style="max-height: 128px;">

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
 <?php
                // $sql = "SELECT DISTINCT `ld_title_id` FROM `learning_development` WHERE `ld_id` = '3'";
                $sql = "SELECT DISTINCT `ld_title_id`, `date_added`
                            FROM `learning_development`
                            ORDER BY `date_added` DESC";
                $filter = array();
                $result = query($conn, $sql, $filter);
                if (empty($result)) {
                    ?>
                    <div class="col text-center d-flex flex-column justify-content-center" style="height: 50%;">
                        <p>No trainings yet.</p>
                    </div>
                    <?php
                } else {
                    ?>

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
                            <!-- Trainings will be dynamically added here -->

                            <?php
                                foreach ($result as $key => $row) {
                                    $title_id = $row['ld_title_id'];
                                    $last_updated = $row['date_added'];

                                    $filter = array($row['ld_title_id']);

                                    $sql = "SELECT `ld_title_name`
                                            FROM `ld_titles`
                                            WHERE `ld_title_id` = ?";
                                    $result = query($conn, $sql, $filter);
                                    $row = $result[0];

                                    $title = $row['ld_title_name'];

                                    // write sql to retrieve all ld types for a specific title
                                    $sql = "SELECT `ld_type`
                                            FROM `learning_development`
                                            WHERE `ld_title_id` = ?";
                                    $result = query($conn, $sql, $filter);

                                    $ld_type = "";
                                    foreach ($result as $key => $value) {
                                        if ($key > 0) {
                                            $ld_type .= "/";
                                        }
                                        $retrieved_ld_type = $value['ld_type'];
                                        $types = explode('/', $retrieved_ld_type);
                                        foreach ($types as $key => $type) {
                                            if (!str_contains($ld_type, $type)) {
                                                if ($key > 0) {
                                                    $ld_type .= "/";
                                                }
                                                $ld_type .= $type;
                                            }
                                        }
                                    }

                                    echo "
                                        <tr onclick='redirect(" . $title_id . ")' style='cursor: pointer;'>
                                            <td>" . $title . "</td>
                                            <td>" . $ld_type . "</td>
                                            <td>" . $last_updated . "</td>
                                        </tr>";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>

                <?php
                }
                ?>
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
                        <form id="add_training" action="trainings_new.php" method="POST">
                            <div class="my-3">
                                <label for="titleInput" class="form-label">TITLE:</label>
                                <input type="text" class="form-control uppercase" id="titleInput" name="titleInput"
                                    required>
                            </div>

                            <div class="my-3">
                                <label for="typeOfLdInput" class="form-label">TYPE OF LD:</label>
                                <input type="text" class="form-control uppercase" id="typeOfLdInput"
                                    name="typeOfLdInput" required>
                            </div>

                            <div class="row-container my-3">
                                <label for="employees" class="form-label">Employees</label>
                                <div class="training_employee checkbox-container my-2">
                                    <select name="training_employee[]" id="training_employee" required
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

                                            echo "<option value='" . $employee_id . "'>" . $firstname . $middlename . " " . $lastname . $nameext . "</option>";
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
                                        <input type="date" required name="date_from" id="date_from"
                                            class="form-control uppercase">
                                    </div>
                                    <div class="col-6">
                                        <label for="to" class="form-label">TO:</label>
                                        <input type="date" required name="date_to" id="date_to"
                                            class="form-control uppercase">
                                    </div>
                                </div>
                            </div>

                            <div class="my-3">
                                <label for="numberOfHours" class="form-label">Number of Hours:</label>
                                <input type="number" class="form-control uppercase" id="numberOfHours"
                                    name="numberOfHours" required>
                            </div>

                            <div class="my-3">
                                <label for="conducted_Sponsoredby" class="form-label">Conducted/Sponsored By:</label>
                                <input type="text" class="form-control uppercase" id="conducted_Sponsoredby"
                                    name="conducted_Sponsoredby" required>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <span style="margin-right: 40px;"></span>
                        <button form="add_training" type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if (isset($_GET['add_training'])) {

        switch ($_GET['add_training']) {
            case 'success':
                $id = $_GET['training_added'];

                $sql = "SELECT `ld_title_name`
                        FROM `ld_titles`
                        WHERE `ld_title_id` = ?";
                $filter = array($id);
                $result = query($conn, $sql, $filter);

                $row = $result[0];
                $title = $row['ld_title_name'];

                // Use json_encode to safely escape strings for JavaScript
                $title_js = json_encode($title);

                echo "
                    <script>
                        swal('New training added!', 
                            'Training, {$title_js} , has been added to database.', 
                            'success');
                    </script>
                ";

                break;

            case 'failed':
                echo '
                    <script>
                        swal("", "Failed to add new training.", "error");
                    </script>
                ';

                break;

            default:
                break;
        }
    }
    ?>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.querySelector('input[name="search_input"]');
    const trainingsTableBody = document.querySelector('#trainings tbody');

    // Initial rendering of trainings
    renderTrainings('');

    // Add event listener for search bar input
    searchBar.addEventListener('input', function () {
        const searchQuery = searchBar.value.trim();
        renderTrainings(searchQuery);
    });

    // Function to render trainings based on search input
    function renderTrainings(query) {
        // Fetch trainings data from server
        fetch('search_trainings.php?query=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                // Render trainings
                render(data);
            })
            .catch(error => {
                console.error('Error fetching trainings:', error);
            });
    }

    // Function to render trainings in the table
    function render(trainings) {
        trainingsTableBody.innerHTML = ''; // Clear previous content

        if (trainings.length === 0) {
            trainingsTableBody.innerHTML = '<tr><td colspan="3">No trainings found.</td></tr>';
            return;
        }

        trainings.forEach(training => {
            const row = document.createElement('tr');
            row.onclick = () => redirect(training.ld_title_id);
            row.style.cursor = 'pointer';

            row.innerHTML = `
                <td>${training.ld_title_name}</td>
                <td>${training.ld_type}</td>
                <td>${training.date_added}</td>
            `;

            trainingsTableBody.appendChild(row);
        });
    }
});

function redirect(ld_title_id) {
            window.location = "training_employee.php?title_id=" + ld_title_id;
        }

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

        // <?php
        // switch ($_GET['add_training']) {
        //     case 'success':
        //         $id = $_GET['training_added'];

        //         $sql = "SELECT `ld_title_name`
        //                 FROM `ld_titles`
        //                 WHERE `ld_title_id` = ?";
        //         $filter = array($id);
        //         $result = query($conn, $sql, $filter);

        //         $row = $result[0];
        //         $title = $row['ld_title_name'];

        //         // Use json_encode to safely escape strings for JavaScript
        //         $title_js = json_encode($title);

        //         echo "
        //             swal('New training added!', 
        //                 'Training, {$title_js} , has been added to database.', 
        //                 'success');
        //         ";

        //         break;

        //     case 'failed':
        //         echo '
        //             swal("", "Failed to add new training.", "error");
        //         ';

        //         break;

        //     default:
        //         break;
        // }
        // ?>

</script>

</body>

</html>
