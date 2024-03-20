<!DOCTYPE html>

<html lang="en">

<head>
    <title>Human Resource Inventory System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <?php
            include_once "sidebar1.php";
            ?>
            <!-- Logo and content -->
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" height="auto" width="100%" class="img-fluid">
                <div class="col-10 mt-5px d-none d-sm-inline">
                    <div class="row mt-3"
                        style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
                        <h5 class="titletext">REGIONAL STATISTICAL SERVICES OFFICE V</h5>
                        <h4 class="titletext"><strong>OFFICE OF THE REGIONAL DIRECTOR</strong></h4>
                        <h6 class="titletext">(RSSO V - ORD)</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="mt-3 d-flex justify-content-start align-items-left">
                            <a href="#">
                                <i class="bi bi-arrow-left-circle" id="backArrow" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-8"></div>
                    <div class="col-2">
                        <div class="mt-3 d-flex justify-content-end align-items-right">
                            <a href="#">
                                <i class="bi bi-images" id="uploadImage" style="font-size: 16px;"> Change Photo</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="images/ord.jpg" alt="ORD" height="auto" width="80%" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>