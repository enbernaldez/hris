<!DOCTYPE html>

<html lang="en">
<?php
include_once ("db_conn.php");
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS - RSSO V (ORD)</title>
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <?php
            include_once ('sidebar1.php');

            if (isset ($_GET['office'])) {
                $scope = $_GET['scope'];
                $office = $_GET['office'];

                if ($scope == 'region') {
                    $sql = "SELECT * FROM `rsso_v` WHERE `rsso_acronym` = ?";
                    $list_office = query($conn, $sql, array($office));

                    if (empty ($list_office)) {
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

                    if (empty ($list_office)) {
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
                            <div class="col-4 tile mt-3">
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
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="my-3">
                        <a href="pds_form.php?form_section=personal_info">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Add
                                Employee</button></a>
                        <?php
                        echo '
                            <a href="organizational_chart.php?scope=' . $_GET['scope'] . '&office=' . $_GET['office'] . '" style="margin-right: 10px; float: right">View organization chart</a>
                        ';
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</body>

</html>