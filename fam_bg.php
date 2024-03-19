<!DOCTYPE html>

<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <style>
        nav {
            background-color: #283872;
            width: 100%;
        }

        nav a {
            text-decoration: none;
            color: #E4E9FF;
        }

        nav a:hover {
            color: #0F1636;
        }
    </style>
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <div class="col-2" style="background-color: #0F1636;">

            </div>

            <div class="col-10 pb-5">
                <?php include_once 'topnav.php'; ?>

                <div class="container px-5">

                    <div class="row mt-3">
                        <div class="col mx-1">
                            <label for="spousename_last">SPOUSE'S SURNAME</label>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_spouse">
                                <label class="form-check-label" for="null_spouse">N/A</label>
                            </div>
                            <input type="text" name="spousename_last" id="spousename_last" class="form-control">

                        </div>
                        <div class="col mx-1">
                            <label for="spousename_first">FIRST NAME</label><br>
                            <input type="text" name="spousename_first" id="spousename_first" class="form-control">
                        </div>
                        <div class="col mx-1">
                            <label for="spousename_middle">MIDDLE NAME</label><br>
                            <div style="display: inline-block; width: 74%">
                                <input type="text" name="spousename_middle" id="spousename_middle" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_spouse_mi">
                                <label class="form-check-label" for="null_spouse_mi">N/A</label>
                            </div>
                        </div>
                        <div class="col-2 mx-1">
                            <label for="spousename_extension">NAME EXTENSION</label><br>
                            <div style="display: inline-block; width: 56%">
                                <input type="text" name="spousename_extension" id="spousename_extension"
                                    class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_spouse_nameext">
                                <label class="form-check-label" for="null_spouse_nameext">N/A</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col mx-1">
                            <label for="occupation">OCCUPATION</label><br>
                            <div style="display: inline-block; width: 71%">
                                <input type="text" name="occupation" id="occupation" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_occupation">
                                <label class="form-check-label" for="null_occupation">N/A</label>
                            </div>
                        </div>
                        <div class="col mx-1">
                            <label for="business_name">EMPLOYEER/BUSINESS NAME</label><br>
                            <div style="display: inline-block; width: 71%">
                                <input type="text" name="business_name" id="business_name" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_bus">
                                <label class="form-check-label" for="null_bus">N/A</label>
                            </div>
                        </div>
                        <div class="col mx-1">
                            <label for="business_address">BUSINESS ADDRESS</label><br>
                            <div style="display: inline-block; width: 71%">
                                <input type="text" name="business_address" id="business_address" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_busadd">
                                <label class="form-check-label" for="null_busadd">N/A</label>
                            </div>
                        </div>
                        <div class="col mx-1">
                            <label for="telno">TELEPHONE NO.</label><br>
                            <div style="display: inline-block; width: 71%">
                                <input type="text" name="telno" id="telno" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_telno">
                                <label class="form-check-label" for="null_telno">N/A</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col mx-1">
                            <label for="fathername_last">FATHER'S SURNAME</label>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_father">
                                <label class="form-check-label" for="null_father">N/A</label>
                            </div>
                            <input type="text" name="fathername_last" id="fathername_last" class="form-control">

                        </div>
                        <div class="col mx-1">
                            <label for="fathername_first">FIRST NAME</label><br>
                            <input type="text" name="fathername_first" id="fathername_first" class="form-control">
                        </div>
                        <div class="col mx-1">
                            <label for="fathername_middle">MIDDLE NAME</label><br>
                            <div style="display: inline-block; width: 74%">
                                <input type="text" name="fathername_middle" id="fathername_middle" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_father_mi">
                                <label class="form-check-label" for="null_father_mi">N/A</label>
                            </div>
                        </div>
                        <div class="col-2 mx-1">
                            <label for="fathername_extension">NAME EXTENSION</label><br>
                            <div style="display: inline-block; width: 56%">
                                <input type="text" name="fathername_extension" id="fathername_extension"
                                    class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_father_nameext">
                                <label class="form-check-label" for="null_father_nameext">N/A</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col mx-1">
                            <label for="mothername_last">MOTHER'S SURNAME</label>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_mother">
                                <label class="form-check-label" for="null_mother">N/A</label>
                            </div>
                            <input type="text" name="mothername_last" id="mothername_last" class="form-control">

                        </div>
                        <div class="col mx-1">
                            <label for="mothername_first">FIRST NAME</label><br>
                            <input type="text" name="mothername_first" id="mothername_first" class="form-control">
                        </div>
                        <div class="col mx-1">
                            <label for="mothername_middle">MIDDLE NAME</label><br>
                            <div style="display: inline-block; width: 79%">
                                <input type="text" name="mothername_middle" id="mothername_middle" class="form-control">
                            </div>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_mother_mi">
                                <label class="form-check-label" for="null_mother_mi">N/A</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-8 mx-1">
                            <label for="children_names">NAME OF CHILDREN</label>
                            <div class="form-check form-check-inline ms-1">
                                <input class="form-check-input" type="checkbox" id="null_children">
                                <label class="form-check-label" for="null_children">N/A</label>
                            </div>
                            <input type="text" name="children_names" id="children_names" class="form-control">

                        </div>
                        <div class="col mx-1">
                            <label for="child_dob">DATE OF BIRTH</label><br>
                            <input type="text" name="child_dob" id="child_dob" class="form-control">
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3 mx-1" style="width: 100px">ADD ROW</button><br>

                    <a href="personal_info.php"><button class="btn btn-secondary mx-1 mt-5" style="width: 100px"><strong>BACK</strong></button></a>
                    <button class="btn btn-primary mx-1 mt-5" style="float: right; width: 100px">NEXT</button>

                </div>

            </div>
        </div>
    </div>
</body>

</html>