<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Inventory System</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">

    <style>
        .tile {
            width: 320px;
            height: 310px;
            background-color: #80A1F5;
            border-radius: 12px;
            padding: 10px;
        }

        .titletext {
            color: #E4E9FF;
            text-align: center;
            margin: 0;
        }

        .auto-fit-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            font-size: 20px;
        }

        .auto-fit-container {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .auto-fit-inner {
            position: absolute;
            width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <?php include_once "sidebar1.php"; ?>
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" height="auto" width="100%" class="img-fluid">
                <div class="col-10 mt-5px d-none d-sm-inline" style="margin-top: 20px;">
                    <div class="row mt-3 px-3"
                        style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
                        <div class="auto-fit-container">
                            <div class="auto-fit-inner">
                                <h4 class="titletext auto-fit-text"><strong> Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                                        id est laborum.</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="row">
                    <div class="col-2">
                        <div class="mt-3 d-flex justify-content-start align-items-left">
                            <a href="#">
                                <i class="bi bi-arrow-left-circle" id="backArrow" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-10"></div>
                    <div class="mt-3">
                        <table>
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th colspan="2">Inclusive Dates</th>
                                    <th>Number of Hours</th>
                                    <th>
                                        <span>Conducted/Sponsored by</span>
                                        <span>(Write in Full)</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>April Cassandra Sasa Regalario</td>
                                    <td>01/27/2021</td>
                                    <td>01/27/2021</td>
                                    <td>4</td>
                                    <td>PSA-Albay</td>
                                </tr>
                                <tr>
                                    <td>José Protasio Rizal Mercado y Alonso Realonda</td>
                                    <td>01/27/2021</td>
                                    <td>01/27/2021</td>
                                    <td>4</td>
                                    <td>PSA-Albay</td>
                                </tr>
                                <tr>
                                    <td>José Protasio Rizal Mercado y Alonso Realonda</td>
                                    <td>01/27/2021</td>
                                    <td>01/28/2021</td>
                                    <td>24</td>
                                    <td>PSA-Albay</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>