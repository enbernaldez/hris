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
            height: 300px;
            width: 500px;
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
                    <img src="images/PSA banner.jpg" alt="PSA Banner" width="auto" height="128px">
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
                    $sql = "SELECT * FROM `employees` WHERE `employee_office` = ?";
                    $filter = array($office);
                    $result = query($conn, $sql, $filter);
                    ?>

                    <?php
                    if (empty($result)) {
                        ?>
                        <!-- <div class="col text-center d-flex flex-column justify-content-center" style="height: 50%;">
                            <p>No employees yet.</p> -->
                        <?php
                        // echo ($user_type == 'A') ?
                        //     '<a href="pds_form.php?form_section=personal_info&action=add&office=' . $_GET['office'] . '">
                        //         <button type="button" class="btn btn-primary"
                        //             style="margin-left: 10px; background-color: #283872; border: none;">
                        //             Add Employee
                        //         </button>
                        //     </a>' : '';
                        ?>
                        <!-- </div> -->
                        <!-- test for employee tiles if there's no employees yet -->
                        <div class="row tilerow mt-3">
                            <?php
                            for ($i = 0; $i < 12; $i++) {
                                ?>
                                <div class="col-4 tile mt-3">
                                    <?php echo ($user_type == 'A') ?
                                        '<a href="pds_form.php?form_section=personal_info&employee_id=#&action=view"
                                            style="text-decoration: none; color: inherit;">' : '';
                                    ?>
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="images/Bercilla.jpg" alt="Anjanette Bercilla" height="80px" width="auto"
                                                style="border-radius:12px">
                                        </div>
                                        <div class="col-8">
                                            <p style="margin: 0"><strong>APRIL CASSANDRA S. REGALARIO</strong></p>
                                            <p style="margin: 0; font-size: 14px;">Chief Statical Specialist V</p>
                                        </div>
                                    </div>
                                    <?php echo ($user_type == 'A') ? '</a>' : '' ?>

                                    <!-- Kebab menu -->
                                    <?php
                                    echo ($user_type == 'A') ?
                                        '<div class="col-1"
                                            style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                                            <button class="btn menu-button">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>' : '';
                                    ?>
                                </div>

                                <!-- Context Menu -->
                                <div id="customContextMenu" style="display: none; width: 100px;" <?php echo ($user_type == 'A') ? ' class="admin"' : ''; ?>>
                                    <ul>
                                        <a href="pds_form.php?form_section=personal_info&employee_id=#&action=edit"
                                            style="color: black;">
                                            <li>Edit</li>
                                        </a>
                                        <li data-bs-toggle="modal" data-bs-target="#modal_deleteRecord">Delete</li>
                                    </ul>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal_deleteRecord" tabindex="-1" aria-labelledby="modal_deleteRecordLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-content-style">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="delete">Delete Records</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex align-items-center">
                                                <div class="col text-center">
                                                    <p class="text-center" style="font-size: 1rem; margin-bottom: 0.5rem;">
                                                        Do you really want to delete the records of
                                                    </p>
                                                    <h5>APRIL CASSANDRA SASA REGALARIO?</h5>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <span style="margin-right: 40px;"></span>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="mt-5">
                            <?php
                            echo ($user_type == 'A') ?
                                '<a href="pds_form.php?form_section=personal_info&action=add&office=' . $_GET['office'] . '">
                                    <button type="button" class="btn btn-primary"
                                        style="margin-left: 10px; background-color: #283872; border: none;">
                                        Add Employee
                                    </button>
                                </a>' : '';
                            echo '
                                <a href="organizational_chart.php?scope=' . $_GET['scope'] . '&office=' . $_GET['office'] . '" style="margin-right: 10px; float: right; color: #283872">
                                    View organizational chart
                                </a>
                            ';
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

                                // retrieve position title of an employee
                                $sql = "SELECT `position_title` FROM `positions` WHERE `position_id` = ?";
                                $filter = array($row['position_id']);
                                $row = $result[0];

                                $position = $row['position_id'];
                                ?>
                                <div class="col-4 tile mt-3">
                                    <?php
                                    echo ($user_type == 'A') ?
                                        '<a href="pds_form.php?form_section=personal_info&employee_id=' . $id . '&action=view"
                                            style="text-decoration: none; color: inherit;">' : '';
                                    echo '<div class="row">
                                            <div class="col-3">
                                                <img src="id_pictures/ . $imgdir . "
                                                    alt="' . "$lastname, $firstname$middlename$nameext" . '" height="80px"
                                                    width="auto" style="border-radius:12px;">
                                            </div>
                                            <div class="col-8">
                                                <p style="margin: 0">
                                                    <strong>' . "$firstname$middlename $lastname$nameext" . '</strong>
                                                </p>
                                                <p style="margin: 0; font-size: 14px;">' . $position . '</p>
                                            </div>
                                        </div>';
                                    echo ($user_type == 'A') ?
                                        '</a>
                                        <div class="col-1"
                                            style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                                            <button class="btn menu-button">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>' : '';
                                    ?>
                                </div>

                                <!-- Context Menu -->
                                <div id="customContextMenu" style="display: none; width: 100px;" <?php echo ($user_type == 'A') ? ' class="admin"' : ''; ?>>
                                    <ul>
                                        <a href="pds_form.php?form_section=personal_info&employee_id='<?php echo $id; ?>'&action=edit"
                                            style="color: black;">
                                            <li>Edit</li>
                                        </a>
                                        <li data-bs-toggle="modal" data-bs-target="#modal_deleteRecord">Delete</li>
                                    </ul>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal_deleteRecord" tabindex="-1" aria-labelledby="modal_deleteRecordLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div style="height: 300px; weight: 342px" class="modal-content modal-content-style">
                                            <div class="modal-header d-flex justify-content-end align-items-center">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                    style="margin-top: 5px; margin-right: 10px;"></button>
                                            </div>
                                            <div class="modal-header d-flex justify-content-center align-items-center">
                                                <h3 class="modal-title" id="modal_deleteRecordLabel"><strong>Are you sure?</strong></h3>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center align-items-center">
                                                <h5 style="text-align: center; font-weight: normal;">Do you really want to delete
                                                    these records?</h5>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-secondary btn-sm me-1" data-bs-dismiss="modal"
                                                    style="height: 38px; width: 88px; border-radius: 8px;">Cancel</button>
                                                <span style="margin-right: 40px;"></span>
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    style="height: 38px; width: 88px; background-color: #F90000; border-radius: 8px;">Delete</button>
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
                                '<a href="pds_form.php?form_section=personal_info&action=add&office=' . $_GET['office'] . '">
                                    <button type="button" class="btn btn-primary"
                                        style="margin-left: 10px; background-color: #283872; border: none;">
                                        Add Employee
                                    </button>
                                </a>' : '';
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
                <?php
            }
            ?>
        </div>
    </div>

    <!--Script-->
    <script>

        // Function to display custom context menu
        function showContextMenu(x, y, target) {
            console.log('Show context menu at:', x, y);
            console.log('Target element:', target);
            var menu = document.getElementById('customContextMenu');
            menu.style.display = 'block';
            menu.style.left = x + 'px';
            menu.style.top = y + 'px';
        }

        var tiles = document.querySelectorAll('.tile');
        tiles.forEach(tile => {
            tile.addEventListener('contextmenu', function (e) {
                const menu = document.getElementById('customContextMenu');
                if (menu.classList.contains('admin')) {
                    e.preventDefault();
                    var x = e.clientX; // X-coordinate of mouse pointer
                    var y = e.clientY; // Y-coordinate of mouse pointer
                    showContextMenu(x, y, e.target); // Display custom context menu
                }
            })
        });

        var kebab_menus = document.querySelectorAll('.menu-button');
        kebab_menus.forEach(kebab => {
            kebab.addEventListener('click', function (e) { // Listen for 'click' event instead of 'contextmenu'
                var rect = kebab.getBoundingClientRect();
                var x = rect.left + window.scrollX + 25;
                var y = rect.top + window.scrollY + 18;
                showContextMenu(x, y, kebab); // Display custom context menu at the .tile's position
            });
        });

        // Hide custom context menu when clicking outside of it
        document.addEventListener('click', function (e) {
            var menu = document.getElementById('customContextMenu');
            // Check if the clicked element is not <i> or a descendant of <i>
            var isClickInsideIcon = e.target.closest('.menu-button');

            if (!isClickInsideIcon) {
                // If the click is not inside <i> or its descendants, hide the menu
                if (menu.style.display === 'block') {
                    menu.style.display = 'none';
                }
            }
        });

    </script>
</body>

</html>