<!DOCTYPE html>

<html lang="en">

<head>
    <title>Human Resource Inventory System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <style>
        .tile {
            width: 330px;
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

        #file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <?php
            include_once "sidebar1.php";

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
                    <div class="row">
                        <div class="col-2">
                            <div class="mt-3 d-flex justify-content-start align-items-left">
                                <i class="bi bi-arrow-left-circle" id="backArrow" style="font-size: 30px; color: #283872"
                                    onclick="history.back()"></i>
                            </div>
                        </div>
                        <div class="col-8"></div>
                        <div class="col-2">
                            <div class="mt-3 d-flex justify-content-end align-items-right">
                                <a onclick="document.getElementById('file-input').click()" style="color: #283872">
                                    <i class="bi bi-images" id="uploadImage" style="font-size: 16px;"></i>
                                    Change File
                                </a>
                                <form id="update_chart" action="chart_update.php" method="POST" enctype="multipart/form-data">
                                    <!-- The invisible file input -->
                                    <input type="file" accept=".pdf" id="file-input" name="file-input" style="display:none;" onchange="this.form.submit()"/>
                                    <input type="text" name="office" value="<?php echo $office; ?>" hidden>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php
                            $timestamp = time(); // Current timestamp to avoid caching
                            echo '
                                <embed src="org_chart/' . $office . '.pdf?' . $timestamp . '" width="80%" height="1000px"/>
                            ';
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>