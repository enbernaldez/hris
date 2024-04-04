<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Background</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        nav {
            background-color: #283872;
            width: 100%;
            box-shadow: 0px 2px 5px black;
        }

        nav a {
            text-decoration: none;
            color: #E4E9FF;
        }

        nav a:hover {
            color: #FFD644;
        }

        .form-check-input,
        .form-check-label {
            height: 15px;
            width: 15px;
            font-size: 12px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .small {
            font-size: 13px;
        }

        /* Hide the up and down arrows */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .delete-row-button:active {
            outline: none;
            /* Remove the outline */
            border: none;
            /* Remove the border */
        }
    </style>
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- SIDEBAR -->
            <?php include_once "sidebar1.php" ?>

            <!-- CONTENT -->
            <div class="col-10">
                <?php include_once 'topnav.php'; ?>
                <div class="row mt-5">
                    <div class="col-1 text-center">LEVEL</div>
                    <div class="col text-center">NAME OF SCHOOL <br>(Write in full)</div>
                    <div class="col text-center">BASIC EDUCATION/ <br>DEGREE/COURSE <br>(Write in full)</div>
                    <div class="col-2 text-center">PERIOD OF ATTENDANCE
                        <div class="row">
                            <div class="col">FROM</div>
                            <div class="col">TO</div>
                        </div>
                    </div>
                    <div class="col text-center">HIGHEST LEVEL/ <br> UNITS EARNED <br>(if not graduated)</div>
                    <div class="col text-center">YEAR GRADUATED</div>
                    <div class="col text-center">SCHOLARSHIP/ <br>ACADEMIC HONORS RECEIVED</div>
                </div>
                <!-- ELEMENTARY -->
                <div class="row">
                    <div class="col-1">ELEMENTARY</div>
                    <div class="col">
                        <input type="text" class="form-control" id="name_schoolE" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree_E" required>
                    </div>
                    <!-- FROM -->
                    <div class="col-2">
                        <div class="row">
                            <div class="col">
                                <div style="display: inline-block;">
                                <input type="number" class="form-control" id="p_attendance_fromE" name="p_attendance_fromE" required>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

</body>

</html>