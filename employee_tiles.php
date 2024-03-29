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
                $office = $_GET['office'];

                switch ($office) {
                    case 'ORD':
                        $title_one = 'Office of the Regional Director';
                        break;
                    case 'CRASD':
                        $title_one = 'Civil Registration and Administrative Support Division';
                        break;
                    case 'SOCD':
                        $title_one = 'Statistical Operations and Coordination Division';
                        break;
                    case 'Albay':
                        $title_one = 'PSA - Albay';
                        break;
                    case 'Camarines Norte':
                        $title_one = 'PSA - Camarines Norte';
                        break;
                    case 'Camarines Sur':
                        $title_one = 'PSA - Camarines Sur';
                        break;
                    case 'Catanduanes':
                        $title_one = 'PSA - Catanduanes';
                        break;
                    case 'Masbate':
                        $title_one = 'PSA - Masbate';
                        break;
                    case 'Sorsogon':
                        $title_one = 'PSA - Sorsogon';
                        break;
                }

                if ($office == 'ORD' || $office == 'CRASD' || $office == 'SOCD') {
                    $title_two = 'Regional Statistical Services Office V';
                    $title_three = '(RSSO V - ' . $office . ')';
                } else if ($office == 'Albay' || $office == 'Camarines Norte' || $office == 'Camarines Sur' || $office == 'Catanduanes' || $office == 'Masbate' || $office == 'Sorsogon') {
                    $title_two = 'Provincial Statistical Office';
                    $title_three = '';
                }
                ?>

                <div class="col-10 px-5 pt-3 pb-5">
                    <img src="images/PSA banner.jpg" alt="PSA Banner" width="auto" height="128px">
                    <div class="row mt-3"
                        style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px">
                        <h5 class="titletext uppercase"><?php echo $title_two; ?></h5>
                        <h4 class="titletext uppercase"><strong><?php echo $title_one; ?></strong></h4>
                        <h6 class="titletext uppercase"><?php echo $title_three; ?></h6>
                    </div>
                    <div class="row tilerow">
                        <?php
                        for ($i = 0; $i < 12; $i++) {
                            echo '
                            <div class="col-4 tile mt-3">
                                <a href="pds_form.php?form_section=personal_info" style="text-decoration: none; color: inherit;">
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

                <?php
            }
            ?>
        </div>

    </div>
</body>

</html>