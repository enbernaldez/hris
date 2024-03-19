<!DOCTYPE html>

<html>
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
    <style>
        .tilerow {
            display: flex;
            justify-content: space-between;
            border-radius: 12px;
        }

        .tile {
            width: 400px;
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
            <div class="col-2" style="background-color: #0F1636;">

            </div>
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" width="auto" height="128px">
                <div class="row mt-3"
                    style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px">
                    <h5 class="titletext">REGIONAL STATISTICAL SERVICES OFFICE V</h5>
                    <h4 class="titletext"><strong>OFFICE OF THE REGIONAL DIRECTOR</strong></h4>
                    <h6 class="titletext">(RSSO V - ORD)</h6>
                </div>
                <div class="row tilerow">
                    <?php
                    for ($i = 0; $i < 12; $i++) {
                        echo '
                            <div class="col-4 tile mt-3">
                                <a href="personal_info.php" style="text-decoration: none; color: inherit;">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="images/Bercilla.jpg" alt="Anjanette Bercilla" height="80px" width="auto" style="border-radius:12px">
                                        </div>
                                        <div class="col-9">
                                            <p style="margin: 0"><strong>APRIL CASSANDRA S. REGALARIO</strong></p>
                                            <p style="margin: 0; font-size: 14px;">Chief Statical Specialist V</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>