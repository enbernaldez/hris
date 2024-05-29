<!DOCTYPE html>
<html lang="en">
<?php
include_once ("db_conn.php");
$user_type = $_SESSION['user_type'] ?? 'V';

$search = (isset($_GET['search'])) ? $_GET['search'] : '';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS - Search</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .employees-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .tile {
            width: 450px;
            height: 100px;
            background-color: #80A1F5;
            border-radius: 12px;
            padding: 10px;
            margin: 10px;
            /* Add margin between tiles */
        }

        .titletext {
            color: #E4E9FF;
            text-align: center;
            margin: 0;
        }

        /* context menu */

        #customContextMenu {
            position: absolute;
            background-color: #E4E9FF;
            border: 1px solid #ccc;
            border-radius: 8px;
            ;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            padding: 5px 0;
            z-index: 1000;
        }

        #customContextMenu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #customContextMenu ul li {
            padding: 8px 15px;
            cursor: pointer;
        }

        #customContextMenu ul li:hover {
            background-color: #80A1F5;
        }

        .modal-content-style {
            background-color: #C2CDFF;
            height: auto;
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once ('sidebar1.php');
            ?>
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" class="img-fluid" style="max-height: 128px;">

                <div class="col-4 mt-3">
                    <input type="search" id="searchBar" class="form-control" placeholder="Search by employee name..." value="<?php echo $search; ?>">
                </div>
                <div id="employeesContainer" class="employees-container mt-3">
                    <!-- Employees will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchBar = document.getElementById('searchBar');
            const employeesContainer = document.getElementById('employeesContainer');

            // Initial rendering of employees
            renderEmployees();

            // Add event listener for search bar input
            searchBar.addEventListener('input', function () {
                renderEmployees();
            });

            if (searchBar.value != '') {
                renderEmployees();
            }

            // Function to render employees based on search input
            function renderEmployees() {
                const searchValue = searchBar.value.toLowerCase().trim();

                // Fetch employees data from server (you need to implement this)
                // Example: fetch('fetch_employees.php')
                //     .then(response => response.json())
                //     .then(data => {
                //         // Filter employees based on search value
                //         const filteredEmployees = data.filter(employee => employee.name.toLowerCase().includes(searchValue));
                //         // Render filtered employees
                //         render(filteredEmployees);
                //     });

                // Dummy data and rendering it
                const dummyEmployees = [
                    { name: 'Anjjj Jane', position: 'Manager' },
                    { name: 'Byeon Wooseok', position: 'Developer' },
                    { name: 'Cha Eunwoo', position: 'Designer' }
                ];

                const filteredEmployees = dummyEmployees.filter(employee => employee.name.toLowerCase().includes(searchValue));
                render(filteredEmployees);
            }

            // Function to render employees in the container
            function render(employees) {
                employeesContainer.innerHTML = ''; // Clear previous content

                employees.forEach(employee => {
                    const tile = document.createElement('div');
                    tile.classList.add('tile');

                    tile.innerHTML = `
                    <div class="row">
                        <div class="col-3">
                            <img src="id_pictures/no profile.png" alt="No Profile" height="80px" width="auto" style="border-radius:12px;">
                        </div>
                        <div class="col-8">
                            <p style="margin: 0"><strong>${employee.name}</strong></p>
                            <p style="margin: 0; font-size: 14px;">${employee.position}</p>
                        </div>
                    </div>
                    <div class="col-1" style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                        <button class="btn menu-button">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                    </div>
                `;

                    employeesContainer.appendChild(tile);
                });
            }
        });
    </script>
</body>

</html>