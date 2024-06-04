<?php
include_once ("db_conn.php");

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

function fetchEmployees($conn, $search)
{
    $search = "%" . $search . "%";
    $stmt = $conn->prepare("SELECT * FROM employees WHERE (employee_firstname LIKE ? OR employee_middlename LIKE ? OR employee_lastname LIKE ?) AND `employee_status` = 'A'");
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$employees = fetchEmployees($conn, $search);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS - Search</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="https://unpkg.com/sweetalert/dist/swal.min.js"></script>
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
        <div class="row vh-100">
            <?php include_once ('sidebar1.php'); ?>
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" class="img-fluid" style="max-height: 128px;">

                <!-- Search bar -->
                <div class="col-4 mt-3">
                    <form action="search_bar.php" method="GET">
                        <input type="search" id="searchBar" name="search" class="form-control"
                            placeholder="Search by employee name..." value="<?php echo htmlspecialchars($search); ?>">
                    </form>
                </div>

                <!-- Display employees based on search results -->
                <div id="employeesContainer" class="employees-container mt-3">
                    <?php
                    if (count($employees) > 0) {
                        foreach ($employees as $employee) {
                            $imgdir = $employee['employee_imgdir'];
                            $lastname = $employee['employee_lastname'];
                            $firstname = $employee['employee_firstname'];
                            $middlename = ($employee['employee_middlename'] == "N/A" ? "" : " " . $employee['employee_middlename']);
                            $nameext = ($employee['employee_nameext'] == "N/A" ? "" : " " . $employee['employee_nameext']);
                            $id = $employee['employee_id']; // Define $id here
                            $position_id = $employee['position_id'];
                            
                            // retrieve position title of an employee
                            $sql = "SELECT `position_title` FROM `positions` WHERE `position_id` = ?";
                            $filter = array($position_id);
                            $result = query($conn, $sql, $filter);

                            if (empty($result)) {
                                $position = '';
                            } else {
                                $row = $result[0];
                                $position = $row['position_title'];
                            }

                            echo '<a href="pds_form_carousel.php?action=edit&employee_id=' . $id . '" style="text-decoration: none; color: inherit;">';
                            echo '<div class="tile">';
                            echo '<div class="row">';
                            echo '<div class="col-3">';
                            echo '<img src="' . $imgdir . '"
                        alt="' . "$lastname, $firstname$middlename $nameext" . '" height="80px"
                        width="auto" style="border-radius:12px;">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<p style="margin: 0"><strong>' . "$firstname$middlename $lastname$nameext" . '</strong></p>';
                            echo '<p style="margin: 0; font-size: 14px;">' . "$position" . '</p>';
                            echo '<p name="employee_id" hidden>' . $id . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="col-1" style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">';
                            echo '<a href="pds_form_carousel.php?action=edit&employee_id=' . $id . '" style="text-decoration: none; color: inherit;">'; // Wrapping the edit button in an anchor tag
                            echo '<button class="btn menu-button"><i class="bi bi-three-dots-vertical"></i></button>';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>'; // Closing anchor tag for the entire tile
                    
                        }

                    } else {
                        echo '<div class="mt-4 text-center"><p>No Employee Record.</p></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Context Menu -->
    <div id="customContextMenu" style="display: none; width: 100px;">
        <ul>
            <a href="pds_form_carousel.php?action=edit&office=<?php echo isset($_GET['office']) ? $_GET['office'] : ''; ?>&employee_id=<?php echo $employee['employee_id']; ?>"
                style="color: black;">
                <li>Edit</li>
            </a>
            <li class="delete" data-bs-toggle="modal" data-bs-target="#modal_deleteRecord">Delete</li>
        </ul>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="modal_deleteRecord" tabindex="-1" aria-labelledby="modal_deleteRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-style">

                <div class="modal-header">
                    <h6 class="modal-title" id="delete">Delete Record</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <p>
                            Are you sure you want to delete<br>
                            <strong>
                                <span id="fullName"></span>
                            </strong>
                            ?
                        </p>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <form action="employee_delete.php" method="POST">
                        <input hidden id="employee_id" name="employee_id">
                        <?php if (isset($_GET['office']) && !empty($_GET['office'])): ?>
                            <input hidden name="employee_office" value="<?php echo $_GET['office']; ?>">
                        <?php endif; ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <span style="margin-right: 40px;"></span>
                        <button type="submit" class="btn" style="background-color: #283872; color: white;">Yes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="js\jquery-3.7.1.min.js"></script>
    <script>
        // Function to display custom context menu
        function showContextMenu(x, y, target, id, fullName) {
            var menu = document.getElementById('customContextMenu');
            menu.style.display = 'block';

            // Get the bounding rectangle of the container
            var containerRect = document.getElementById('employeesContainer').getBoundingClientRect();

            // Adjust menu position to prevent overlap with container boundaries
            var maxX = containerRect.right - menu.offsetWidth;
            var maxY = containerRect.bottom - menu.offsetHeight;
            x = Math.min(x, maxX);
            y = Math.min(y, maxY);

            menu.style.left = x + 'px';
            menu.style.top = y + 'px';

            var link = menu.querySelector("a");
            link.href = "pds_form_carousel.php?action=edit&employee_id=" + id;

            var del = menu.querySelector(".delete");
            del.setAttribute("data-id", id);
            del.setAttribute("data-name", fullName);
        }

        // Event listener for kebab menu button click
        var kebab_menus = document.querySelectorAll('.menu-button');
        kebab_menus.forEach(kebab => {
            kebab.addEventListener('click', function (e) {
                e.preventDefault();
                var rect = kebab.getBoundingClientRect();
                var x = rect.left + window.scrollX + 25;
                var y = rect.top + window.scrollY + 18;
                var target = this.closest('.menu-button');

                var tile = e.target.closest('.tile');
                var id = tile.querySelector("p[name='employee_id']").innerText;
                var fullName = tile.querySelector("strong").innerText;

                showContextMenu(x, y, target, id, fullName);
            });
        });

        // Event listener for delete modal
        $('#modal_deleteRecord').on('show.bs.modal', function (event) {
            // Extract info from data-* attributes
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var name = button.data('name');

            // Update the modal's content
            var modal = $(this);
            modal.find('#employee_id').val(id);
            modal.find('#fullName').text(name);
        });
    </script>
</body>

</html>
