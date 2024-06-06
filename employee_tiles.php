<!DOCTYPE html>
<html lang="en">
<?php
include_once ("db_conn.php");
$user_type = $_SESSION['user_type'] ?? 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS - Employees</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .tilerow {
            display: flex;
            justify-content: space-around;
            border-radius: 12px;
        }

        .tile {
            width: 450px;
            height: 100px;
            background-color: #80A1F5;
            border-radius: 12px;
            padding: 10px;
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

        .image-container {
            overflow: hidden;
            /* Hide overflow to crop the image */
            display: inline-block;
            /* Inline-block to keep the dimensions set in JavaScript */
            width: 80px;
            height: 80px;
        }

        .image-container img {
            display: block;
            /* Ensure the image is treated as a block element */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <?php
            include_once ('sidebar1.php');

            if (isset($_GET['office'])) {
                $scope = $_GET['scope'];
                $office = $_GET['office'];
            }
            if ($scope == 'region') {
                $sql = "SELECT * FROM `rsso_v` WHERE `rsso_acronym` = ?";
                $list_office = query($conn, $sql, array($office));

                if (empty($list_office)) {
                    exit();
                } else {
                    $row = $list_office[0];

                    $acro = $row['rsso_acronym'];
                    $title_one = $row['rsso_name'];
                    $title_two = 'Regional Statistical Services Office V';
                    $title_three = 'RSSO V - ' . $acro;
                }

            } else if ($scope == 'province') {
                $sql = "SELECT * FROM `provinces` WHERE `province_name` = ?";
                $list_office = query($conn, $sql, array($office));

                if (empty($list_office)) {
                    exit();
                } else {
                    $row = $list_office[0];

                    $title_one = $row["province_name"];
                    $title_two = 'Provincial Statistical Office';
                    $title_three = '';
                }
            }
            ?>
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" class="img-fluid" style="max-height: 128px;">
                <div class="row mt-3"
                    style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px">
                    <h5 class="titletext uppercase">
                        <?php echo $title_two; ?>
                    </h5>
                    <h4 class="titletext uppercase"><strong>
                            <?php echo $title_one; ?>
                        </strong></h4>
                    <h6 class="titletext uppercase">
                        <?php echo $title_three; ?>
                    </h6>
                </div>
                <?php
                // retrieve employees in a certain office
                $sql = "SELECT * FROM `employees` WHERE `employee_office` = ? AND `employee_status` = 'A'";
                $filter = array($office);
                $result = query($conn, $sql, $filter);
                ?>

                <?php
                if (empty($result)) {
                    ?>
                    <div class="col text-center d-flex flex-column justify-content-center" style="height: 50%;">
                        <p>No employees yet.</p>
                        <?php
                        echo ($user_type == 'A') ?
                            '<button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#modal_addEmployee"
                                style="margin-left: 10px; background-color: #283872; border: none;">
                                Add Employee
                            </button>' : '';
                        ?>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row tilerow mt-3">
                        <?php
                        foreach ($result as $key => $row) {
                            // transfer database values to local variables
                            $id = $row['employee_id']; // get variable employee_id=$id
                            $lastname = $row['employee_lastname'];
                            $firstname = $row['employee_firstname'];
                            $middlename = ($row['employee_middlename'] == "N/A") ? "" : " " . $row['employee_middlename'];
                            $nameext = ($row['employee_nameext'] == 'N/A') ? "" : " " . $row['employee_nameext'];
                            $imgdir = $row['employee_imgdir'];
                            $position_id = $row['position_id'];

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
                            ?>
                            <div class="col-4 tile mt-3">
                                <?php
                                echo ($user_type == 'A') ?
                                    '<a href="pds_form_carousel.php?action=view&office=' . $_GET['office'] . '&employee_id=' . $id . '"
                                            style="text-decoration: none; color: inherit;">' : '';
                                echo '<div class="row">
                                            <div class="col-2 me-3">
                                                <div class="image-container" style="border-radius:12px;">
                                                    <img src="' . $imgdir . '"
                                                        alt="' . "$lastname, $firstname$middlename$nameext" . '"
                                                        class="image" style="border-radius:12px;">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <p style="margin: 0">
                                                    <strong>' . "$firstname$middlename $lastname$nameext" . '</strong>
                                                </p>
                                                <p style="margin: 0; font-size: 14px;">' . $position . '</p>
                                                <p name="employee_id" hidden>' . $id . '</p>
                                            </div>
                                        </div>';
                                echo ($user_type == 'A') ?
                                    '</a>
                                        <div class="col-1"
                                            style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                                            <button type="button" class="btn menu-button">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>' : '';
                                ?>
                            </div>

                            <!-- Context Menu -->
                            <div id="customContextMenu" style="display: none; width: 100px;" <?php echo ($user_type == 'A') ? ' class="admin"' : ''; ?>>
                                <ul>
                                    <a href="#" style="color: black;">
                                        <li>Edit</li>
                                    </a>
                                    <li class="delete" data-bs-toggle="modal" data-bs-target="#modal_deleteRecord">Delete</li>
                                </ul>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal_deleteRecord" tabindex="-1"
                                aria-labelledby="modal_deleteRecordLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-content-style">

                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete">Delete Record</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                <input hidden name="employee_office" value="<?php echo $_GET['office']; ?>">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                <span style="margin-right: 40px;"></span>
                                                <button type="submit" class="btn"
                                                    style="background-color: #283872; color: white;">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="my-3">
                        <?php
                        echo ($user_type == 'A') ?
                            '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_addEmployee"
                                    style="margin-left: 10px; background-color: #283872; border: none;">
                                    Add Employee
                                </button>' : '';
                        echo '
                                <a href="organizational_chart.php?scope=' . $_GET['scope'] . '&office=' . $_GET['office'] . '" style="margin-right: 10px; float: right; color: #283872">
                                    View organizational chart
                                </a>
                            ';
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!--Add Employee Modal-->
        <div class="modal fade" id="modal_addEmployee" tabindex="-1" aria-labelledby="modal_addEmployeeLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-style">
                    <div class="modal-header">
                        <h6 class="modal-title" id="delete">Add Employee</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4">
                        <form id="add_employee"
                            action="pds_form_carousel.php?action=add&office=<?php echo $_GET['office']; ?>"
                            method="POST">

                            <div class="row">
                                <div class="my-3">
                                    <label for="lastname" class="form-label">LAST NAME: </label>
                                    <input type="text" class="form-control uppercase" id="lastname" name="lastname"
                                        required>
                                </div>
                                <div class="my-3">
                                    <label for="firstname" class="form-label">FIRST NAME: </label>
                                    <input type="text" class="form-control uppercase" id="firstname" name="firstname"
                                        required>
                                </div>
                                <div class="my-3">
                                    <label for="middlename" class="form-label">MIDDLE NAME: </label>
                                    <div class="form-check form-check-inline ms-2">
                                        <input class="form-check-input" type="checkbox" id="na_middlename"
                                            name="na_middlename" onclick="checkNA(this, 'middlename')">
                                        <label class="form-check-label" for="na_middlename">N/A</label>
                                    </div>
                                    <input type="text" class="form-control uppercase" id="middlename" name="middlename"
                                        required oninput="checkNAInput(this, 'na_middlename')">
                                </div>

                                <div class="my-3">
                                    <label for="nameext" class="form-label">NAME EXTENSION: </label>
                                    <div class="form-check form-check-inline ms-2">
                                        <input class="form-check-input" type="checkbox" id="na_nameext"
                                            name="na_nameext" onclick="checkNA(this, 'nameext')">
                                        <label class="form-check-label" for="na_nameext">N/A</label>
                                    </div>
                                    <input type="text" class="form-control uppercase" id="nameext" name="nameext"
                                        oninput="checkNAInput(this, 'na_nameext')" required maxlength="4">
                                </div>


                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <span style="margin-right: 40px;"></span>
                                    <button form="add_employee" type="submit" class="btn btn-primary">Add</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Script-->
    <?php
    if (isset($_GET['add_employee']) || isset($_GET['edit_employee'])) {
        $id = (isset($_GET['add_employee'])) ? $_GET['employee_added'] : $_GET['employee_edited'];

        $sql = "SELECT `employee_lastname`, `employee_firstname`, `employee_middlename`, `employee_nameext`
                FROM `employees`
                WHERE `employee_id` = ?";
        $filter = array($id);
        $result = query($conn, $sql, $filter);

        $row = $result[0];
        $last_name = $row['employee_lastname'];
        $first_name = $row['employee_firstname'];
        $middle_name = ($row['employee_middlename'] == "N/A" ? "" : " " . $row['employee_middlename']);
        $name_ext = ($row['employee_nameext'] == "N/A" ? "" : " " . $row['employee_nameext']);

        // Use json_encode to safely escape strings for JavaScript
        $full_name = $first_name . $middle_name . " " . $last_name . $name_ext;

        if (isset($_GET['add_employee']) || isset($_GET['add_employee']) && isset($_GET['employee_added'])) {
            switch ($_GET['add_employee']) {
                case 'success':
                    echo "
                    <script>
                        swal('New employee added!', 
                            '{$full_name} has been added to database.', 
                            'success',
                            {buttons: {
                                OK: {
                                    text: 'OK',
                                    value: 'true',
                                },
                            }}
                        ).then((value) =>
                            switch (value) {{
                        
                            case 'true':
                                removeQueryParameter(['add_employee', 'employee_added', 'edit_employee', 'employee_edited']);
                                break;
                        
                            default:
                                break;
                            }
                        });
                    </script>
                ";

                    break;

                case 'failed':
                    echo '
                    <script>
                        swal("Uh-oh...", "Failed to add new employee.", "error",
                            {buttons: {
                                OK: {
                                    text: "OK",
                                    value: "true",
                                },
                            }}
                        ).then((value) => {
                            switch (value) {
                        
                            case "true":
                                removeQueryParameter(["add_employee", "employee_added", "edit_employee", "employee_edited"]);
                                break;
                        
                            default:
                                break;
                            }
                        });
                    </script>    
                ';

                    break;

                case 'exists':
                    echo '
                    <script>
                        swal("Oops.", "Employee already exists.", "warning",
                            {buttons: {
                                OK: {
                                    text: "OK",
                                    value: "true",
                                },
                            }}
                        ).then((value) => {
                            switch (value) {
                        
                            case "true":
                                removeQueryParameter(["add_employee", "employee_added", "edit_employee", "employee_edited"]);
                                break;
                        
                            default:
                                break;
                            }
                        });
                    </script>    
                ';

                    break;

                case 'deleted':
                    echo "
                    <script>
                        swal('Employee previously deleted.', 'Would you like to overwrite record?', 'warning', {
                            buttons: {
                                cancel: 'No',
                                overwrite: {
                                    text: 'Yes',
                                    value: 'overwrite',
                                },
                            }    
                        }).then((value) => {
                            switch (value) {
                           
                              case 'overwrite':
                                window.location.href = 'pds_form_carousel.php?action=edit&office=Albay&employee_id={$id}';
                                break;
                           
                              default:
                                break;
                            }
                        });
                    </script>    
                ";

                    break;

                default:
                    echo '
                    <script>
                        swal("", "A problem occured while adding new employee.", "error"",
                            {buttons: {
                                OK: {
                                    text: "OK",
                                    value: "true",
                                },
                            }}
                        ).then((value) => {
                            switch (value) {
                        
                            case "true":
                                removeQueryParameter(["add_employee", "employee_added", "edit_employee", "employee_edited"]);
                                break;
                        
                            default:
                                break;
                            }
                        });
                    </script>    
                ';
                    break;
            }
        }

        if (isset($_GET['edit_employee']) || isset($_GET['edit_employee']) && isset($_GET['employee_edited'])) {
            switch ($_GET['edit_employee']) {
                case 'success':
                    echo "
                    <script>
                        swal('Employee updated!', 
                            '{$full_name}\'s information has been updated.', 
                            'success',
                            {buttons: {
                                OK: {
                                    text: 'OK',
                                    value: 'true',
                                },
                            }}
                        ).then((value) => {
                            switch (value) {
                        
                            case 'true':
                                removeQueryParameter(['add_employee', 'employee_added', 'edit_employee', 'employee_edited']);
                                break;
                        
                            default:
                                break;
                            }
                        });
                    </script>
                    ";

                    break;

                default:
                    # code...
                    break;
            }
        }
    }
    ?>

    <script src="js\jquery-3.7.1.min.js"></script>
    <script>

        // Function to display custom context menu
        function showContextMenu(x, y, target, id, fullName) {
            var menu = document.getElementById('customContextMenu');
            menu.style.display = 'block';
            menu.style.left = x + 'px';
            menu.style.top = y + 'px';

            // edit link of eedit button
            var link = menu.querySelector("a");
            link.href = "pds_form_carousel.php?action=edit&office=<?php echo $_GET['office']; ?>&employee_id=" + id;

            var del = menu.querySelector(".delete");
            del.setAttribute("data-id", id);
            del.setAttribute("data-name", fullName);

            $('#modal_deleteRecord').on('show.bs.modal', function (event) {

                // Extract info from data-* attributes
                var id = del.getAttribute("data-id");
                var name = del.getAttribute("data-name");

                // Update the modal's content
                var modal = $(this);
                modal.find('#employee_id').val(id);
                modal.find('#fullName').text(name);
            });
        }

        var tiles = document.querySelectorAll('.tile');
        tiles.forEach(tile => {
            tile.addEventListener('contextmenu', function (e) {
                const menu = document.getElementById('customContextMenu');
                if (menu.classList.contains('admin')) {
                    e.preventDefault();
                    var x = e.clientX; // X-coordinate of mouse pointer
                    var y = e.clientY; // Y-coordinate of mouse pointer

                    var tile = e.target.closest('.tile');
                    var id = tile.querySelector("p[name='employee_id']").innerText;
                    var fullName = tile.querySelector("strong").innerText;

                    showContextMenu(x, y, e.target, id, fullName); // Display custom context menu
                }
            })
        });

        var kebab_menus = document.querySelectorAll('.menu-button');
        kebab_menus.forEach(kebab => {
            kebab.addEventListener('click', function (e) { // Listen for 'click' event instead of 'contextmenu'
                e.preventDefault();
                var rect = kebab.getBoundingClientRect();
                var x = rect.left + window.scrollX + 25;
                var y = rect.top + window.scrollY + 18;
                var target = this.closest('.menu-button')

                var tile = e.target.closest('.tile');
                var id = tile.querySelector("p[name='employee_id']").innerText;
                var fullName = tile.querySelector("strong").innerText;

                showContextMenu(x, y, target, id, fullName); // Display custom context menu at the .tile's position
            });
        });

        function checkNA(checkbox, inputId) {
            var inputField = document.getElementById(inputId);
            if (checkbox.checked) {
                inputField.value = "N/A";
                inputField.disabled = true;
            } else {
                inputField.value = "";
                inputField.disabled = false;
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            var menuButtons = document.querySelectorAll(".menu-button");
            var customContextMenu = document.getElementById("customContextMenu");

            menuButtons.forEach(function (button) {
                button.addEventListener("click", function (event) {
                    var rect = button.getBoundingClientRect();
                    var top = rect.bottom + window.scrollY;
                    var left = rect.left + window.scrollX;
                    customContextMenu.style.top = top + "px";
                    customContextMenu.style.left = left + "px";
                    customContextMenu.style.display = "block";
                });

                window.addEventListener("click", function (event) {
                    if (!event.target.closest(".menu-button")) {
                        customContextMenu.style.display = "none";
                    }
                });
            });

        });

        function checkNAInput(inputField, checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            if (inputField.value.toUpperCase() === "N/A") {
                checkbox.checked = true;
                inputField.disabled = true;
            } else {
                checkbox.checked = false;
                inputField.disabled = false;
            }
        }

        function removeQueryParameter(parameters) {
            // Get the current URL
            let url = new URL(window.location);

            // Get the URLSearchParams object
            let params = new URLSearchParams(url.search);

            parameters.forEach(param => {
                // Delete the specified parameter
                params.delete(param);
            });

            // Update the URL with the new search parameters
            url.search = params.toString();

            // Update the browser's URL without reloading the page
            window.history.replaceState({}, document.title, url.toString());
        }

        window.onload = function () {
            const images = document.querySelectorAll('.image');

            images.forEach(img => {
                const container = img.parentElement;
                // Ensure the image is fully loaded before getting its dimensions
                img.onload = function () {
                    if (img.naturalWidth > img.naturalHeight) {
                        img.style.height = '80px';
                    } else {
                        img.style.width = '80px';
                    }
                };

                // If the image is already loaded (for example, from cache)
                if (img.complete) {
                    img.onload();
                }
            });
        };

    </script>


</body>

</html>