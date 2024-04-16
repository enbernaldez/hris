<!DOCTYPE html>

<html lang="en">
<?php
include_once ("db_conn.php");
$_SESSION['user_type'] = 'V';
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

        /* kebab menu options */
        .options-container {
            display: none;
            position: absolute;
            margin-top: -30px;
            margin-left: -70px;
            height: 79px;
            width: 129px;
            transform: translateX(-50%);
            background-color: #fff;
            padding: 5px;
            border-radius: 16px;
        }

        .options-container button {
            margin-top: -8px;
        }

        .underline {
            border-top: 2px solid #ccc;
            margin: 4px;
        }

        .btn-link {
            text-decoration: none;
            color: black;
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
                    <div class="row tilerow">
                        <?php
                        for ($i = 0; $i < 12; $i++) {
                            ?>
                            <!-- <div class="col-4 tile mt-3">
                                <a href="pds_form.php?form_section=personal_info"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="images/Bercilla.jpg" alt="Anjanette Bercilla" height="80px" width="auto"
                                                style="border-radius:12px">
                                        </div>
                                        <div class="col-9">
                                            <p style="margin: 0"><strong>APRIL CASSANDRA S. REGALARIO</strong></p>
                                            <p style="margin: 0; font-size: 14px;">Chief Statical Specialist V</p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <div class="col-4 tile mt-3">
                                <a href="pds_form.php?form_section=personal_info"
                                    style="text-decoration: none; color: inherit;">
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
                                </a>
                                <!-- Kebab menu -->
                                <div class="col-1"
                                    style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                                    <button class="btn menu-button" id="menuButton">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="options-container">
                                        <!-- edit action -->
                                        <a href="pds_form.php?form_section=personal_info" method="POST">
                                            <button type="submit" class="btn btn-link">Edit</button>
                                        </a>
                                        <div class="underline"></div>
                                        <!-- delete action -->
                                        <button class="btn btn-link delete-button" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">Delete</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div style="height: 300px; weight: 342px" class="modal-content">
                                        <div class="modal-header d-flex justify-content-end align-items-center">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                style="margin-top: 5px; margin-right: 10px;"></button>
                                        </div>
                                        <div class="modal-header d-flex justify-content-center align-items-center">
                                            <h3 class="modal-title" id="deleteModalLabel"><strong>Are you sure?</strong></h3>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <h5 style="text-align: center; font-weight: normal;">Do you really want to delete
                                                these records?</h5>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-secondary btn-sm me-1" data-bs-dismiss="modal"
                                                style="height: 38px; width: 88px; border-radius: 8px;">Cancel</button>
                                            <span style="margin-right: 40px;"></span>
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
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
                        <a href="pds_form.php?form_section=personal_info">
                            <button type="button" class="btn btn-primary"
                                style="margin-left: 10px; background-color: #283872; border: none;">Add
                                Employee</button></a>
                        <?php
                        echo '
                            <a href="organizational_chart.php?scope=' . $_GET['scope'] . '&office=' . $_GET['office'] . '" style="margin-right: 10px; float: right; color: #283872">View organizational chart</a>
                        ';
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!--Script-->
    <script>
        document.querySelectorAll(".btn.menu-button").forEach(function (button) {
            button.addEventListener("click", function () {
                // Hide all options containers
                document.querySelectorAll(".options-container").forEach(function (container) {
                    container.style.display = "hidden";
                });

                var optionsContainer = this.parentElement.querySelector(".options-container");
                // Toggle the display of the options container
                optionsContainer.style.display = optionsContainer.style.display === "none" ? "block" : "none";
            });
        });


        // function editItem(element) {
        //     // Add your edit logic here
        //     console.log("Edit clicked for menu: " + element.closest(".tile").id);
        // }

        // function deleteItem(element) {
        //     // Add your delete logic here
        //     console.log("Delete clicked for menu: " + element.closest(".tile").id);
        // }

    </script>
</body>

</html>