<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Background</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
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
                    <div class="col text-center">LEVEL</div>
                    <div class="col text-center">NAME OF SCHOOL <br>(Write in full)</div>
                    <div class="col text-center">BACHELORS EDUCATION/ <br>DEGREE/COURSE <br>(Write in full)</div>
                    <div class="col text-center">PERIOD OF <br> ATTENDANCE <br>
                    <div class="row">
                        <div class="col">FROM</div>
                        <div class="col">TO</div>
                    </div>
                </div>
                    <div class="col text-center">HIGHEST LEVEL/ <br> UNITS EARNED <br>(if not graduated)</div>
                    <div class="col text-center">YEAR <br>GRADUATED</div>
                    <div class="col text-center">SCHOLARSHIP/ <br>ACADEMIC HONORS <br>RECEIVED </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-center">ELEMENTARY</div>
                    <div class="col">
                        <input type="text" class="form-control" id="name_school" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree" required>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="p_attendance_from" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="p_attendance_to">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="h_level" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="year_graduated" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="scholarship" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>