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
            text-transform: uppercase;
            /* Apply uppercase transformation */
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* form labels */
        .form-label {
            text-transform: uppercase;
            /* Apply uppercase transformation to form labels */
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
                        <button type="button" class="btn btn-primary" style="float: left; background-color: #283872; border: none;"
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
                <div class="row mt-3">
                    <div class="col-12">
                        <table>
                            <thead>
                                <tr>
                                    <th class="col-8">Title</th>
                                    <th class="col-2">Type of LD</th>
                                    <th class="col-2">Last Updated</th>
                                </tr>
                            </thead>
                            <tbody id="trainings">
                                <!-- Training rows will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
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
                                <label for="employees" class="form-label">EMPLOYEES</label>
                                <div class="training_employee checkbox-container my-2">
                                    <select name="training_employee[]" id="training_employee" required
                                        class="form-select">
                                        <option value="" disabled selected value>--SELECT--</option>
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
                                <label for="inclusiveDatesOfattedance" class="form-label">INCLUSIVE DATES OF
                                    ATTENDANCE</label><br>
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
                                <label for="numberOfHours" class="form-label">NUMBER OF HOURS:</label>
                                <input type="number" class="form-control uppercase" id="numberOfHours"
                                    name="numberOfHours" required>
                            </div>

                            <div class="my-3">
                                <label for="conducted_Sponsoredby" class="form-label">CONDUCTED/SPONSORED BY:</label>
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
                            'success',
                            {buttons: {
                                OK: {
                                    text: 'OK',
                                    value: 'true',
                                },
                            }}
                        ).then((value) =>
                            switch (value) {
                        
                            case 'true':
                                removeQueryParameter(['add_employee', 'employee_added', 'edit_employee', 'employee_edited']);
                                break;
                        
                            default:
                                break;
                            }
                        );
                    </script>
                ";

                break;

            case 'failed':
                echo '
                    <script>
                        swal("", "Failed to add new training.", "error"",
                            {buttons: {
                                OK: {
                                    text: "OK",
                                    value: "true",
                                },
                            }}
                        ).then((value) =>
                            switch (value) {
                        
                            case "true":
                                removeQueryParameter(["add_employee", "employee_added", "edit_employee", "employee_edited"]);
                                break;
                        
                            default:
                                break;
                            }
                        );
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
            // Select the search bar element
            const searchBar = document.querySelector('input[name="search_input"]');

            // Select the tbody element where the trainings will be displayed
            const trainingsTableBody = document.querySelector('#trainings');

            // Initial rendering of trainings with an empty query (display all trainings)
            renderTrainings('');

            // Add an event listener to the search bar for user input
            searchBar.addEventListener('input', function () {
                // Get the trimmed value from the search bar
                const searchQuery = searchBar.value.trim();
                // Render trainings based on the search query
                renderTrainings(searchQuery);
            });

            // Function to render trainings based on search input
            function renderTrainings(query) {
                // Fetch trainings data from the server using the search query
                fetch('search_trainings.php?query=' + encodeURIComponent(query))
                    .then(response => response.json()) // Convert the response to JSON
                    .then(data => {
                        // Process data to remove duplicates and merge types of LD
                        const processedData = processTrainings(data);
                        // Render the processed trainings data
                        render(processedData);
                    })
                    .catch(error => {
                        console.error('Error fetching trainings:', error);
                    });
            }

            // Function to process trainings data
            function processTrainings(trainings) {
                // Initialize an empty object to store processed trainings
                const trainingMap = {};

                // Loop through each training in the array
                trainings.forEach(training => {
                    const { ld_title_name, ld_types, date_added, ld_title_id } = training;

                    // Check if the title already exists in the map
                    if (!trainingMap[ld_title_name]) {
                        // If not, add a new entry with a Set to store unique types of LD
                        trainingMap[ld_title_name] = {
                            ld_title_name: ld_title_name,
                            ld_types: new Set(ld_types.split('/').map(type => type.toUpperCase())), // Initialize Set with ld_types
                            date_added: date_added,
                            ld_title_id: ld_title_id
                        };
                    } else {
                        // If the title exists, add the types of LD to the Set
                        ld_types.split('/').forEach(type => {
                            trainingMap[ld_title_name].ld_types.add(type.toUpperCase());
                        });
                    }
                });

                // Convert the map back to an array and join the Set of types into a string
                return Object.values(trainingMap).map(training => {
                    training.ld_types = Array.from(training.ld_types).join(', ');
                    return training;
                });
            }

            // Function to format date to a word format 
            function formatDate(dateString) {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                const date = new Date(dateString);
                return date.toLocaleDateString(undefined, options).toUpperCase(); // Convert date to uppercase
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

                    const formattedDate = formatDate(training.date_added);

                    // Ensure types of LD are unique and join them as a string
                    const uniqueTypes = [...new Set(training.ld_types.split(', '))];

                    row.innerHTML = `
                <td>${training.ld_title_name.toUpperCase()}</td>
                <td>${uniqueTypes.join('/ ')}</td>
                <td>${formattedDate}</td>
            `;

                    trainingsTableBody.appendChild(row);
                });
            }

            // Redirect function to navigate to another page
            function redirect(ld_title_id) {
                window.location = "training_employee.php?title_id=" + ld_title_id;
            }
        });

        // Add row functionality
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