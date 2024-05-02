<!DOCTYPE html>

<html lang="en">
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Sheet</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="js/bootstrap.js"></script>


    <style>
        /* educational background */
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

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .small-font {
            font-size: 13px;
        }

        .delete-row-button:active {
            outline: none;
            border: none;
        }

        .add-row-text:active {
            outline: none;
            border: none;
            color: blue;
        }

        .add-row-text {
            margin-top: -26px;
        }

        /* --------------- */
        hr {
            color: antiquewhite;
            margin: 2em;
        }

        .ref-prepend {
            width: 200px;
        }
    </style>
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- SIDEBAR -->
            <?php
            include_once 'sidebar1.php';
            ?>

            <!-- CONTENT -->
            <div class="col-10 pb-5">
                <!-- PROFILE -->

                <?php
                include_once 'profile.php';
                ?>

                <!-- FORM -->

                <form action="new_pds.php" method="post" enctype="multipart/form-data">
                    <div id="carousel" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-inner">
                            <!-- PERSONAL INFORMATION -->
                            <div class="carousel-item active">
                                <div class="container-fluid">

                                    <!-- EMPLOYEE'S FULL NAME -->
                                    <div class="row mt-5">
                                        <div class="col mx-2">
                                            <label for="name_last">SURNAME</label><br>
                                            <input type="text" required name="name_last" id="name_last"
                                                class="form-control">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="name_first">FIRST NAME</label><br>
                                            <input type="text" required name="name_first" id="name_first"
                                                class="form-control">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="name_middle">MIDDLE NAME</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="name_middle" id="name_middle"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_middle">
                                                    <label class="form-check-label" for="null_middle">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 mx-2">
                                            <label for="name_ext">NAME EXTENSION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="name_ext" id="name_ext"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_ext">
                                                    <label class="form-check-label" for="null_ext">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="birth_date">DATE OF BIRTH</label><br>
                                            <input type="date" required name="birth_date" id="birth_date"
                                                class="form-control">

                                        </div>
                                        <div class="col mx-2">
                                            <label for="birth_place">PLACE OF BIRTH</label><br>
                                            <input type="text" required name="birth_place" id="birth_place"
                                                class="form-control">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="sex">SEX</label><br>
                                            <select id="sex" required name="sex" class="form-select">
                                                <option value="" disabled selected value>--select--</option>
                                                <option value='M'>Male</option>";
                                                <option value='F'>Female</option>";
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="civilstatus">CIVIL STATUS</label><br>
                                            <select id="civilstatus" required name="civilstatus" class="form-select">
                                                <option value="" disabled selected value>--select--</option>
                                                <option value='S'>Single</option>";
                                                <option value='M'>Married</option>";
                                                <option value='C'>Common law</option>";
                                                <option value='W'>Widowed</option>";
                                                <option value='H'>Separated</option>";
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="height">HEIGHT (m)</label><br>
                                            <input type="number" required name="height" id="height" class="form-control"
                                                min="1" step="0.01" max="2">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="weight">WEIGHT (kg)</label><br>
                                            <input type="text" required name="weight" id="weight" class="form-control">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="bloodtype">BLOOD TYPE</label><br>
                                            <select id="bloodtype" required name="bloodtype" class="form-select">
                                                <option value="" disabled selected value>--select--</option>
                                                <option value='O+'>O+</option>";
                                                <option value='O-'>O-</option>";
                                                <option value='A+'>A+</option>";
                                                <option value='A-'>A-</option>";
                                                <option value='B+'>B+</option>";
                                                <option value='B-'>B-</option>";
                                                <option value='AB+'>AB+</option>";
                                                <option value='AB-'>AB-</option>";
                                            </select>
                                        </div>
                                    </div>

                                    <!-- EMPLOYEE'S ID'S -->
                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="gsis">GSIS ID NO.</label><br>
                                            <input type="text" required name="id_gsis" id="gsis"
                                                class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="pagibig">PAG-IBIG ID NO.</label><br>
                                            <input type="text" required name="id_pagibig" id="pagibig"
                                                class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="philhealth">PHILHEALTH NO.</label><br>
                                            <input type="text" required name="id_philhealth" id="philhealth"
                                                class="form-control uppercase">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="sss">SSS NO.</label><br>
                                            <input type="text" required name="id_sss" id="sss"
                                                class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="tin">TIN NO.</label><br>
                                            <input type="text" required name="id_tin" id="tin"
                                                class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="employee_no">AGENCY EMPLOYEE NO.</label><br>
                                            <input type="text" required name="id_agency" id="employee_no"
                                                class="form-control uppercase">
                                        </div>
                                    </div>

                                    <!-- EMPLOYEE'S CITIZENSHIP -->
                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="citizenship">CITIZENSHIP</label><br>
                                            <select id="citizenship" required name="citizenship" class="form-select">
                                                <option value="" disabled selected value>--select--</option>
                                                <option value='F'>Filipino</option>";
                                                <option value='D'>Dual Citizenship</option>";
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="citizenship_by">CITIZENSHIP BY</label><br>
                                            <select id="citizenship_by" required name="citizenship_by"
                                                class="form-select" disabled>
                                                <option value="" disabled>--select--</option>
                                                <option value="F" selected value hidden>N/A</option>
                                                <option value='B'>Birth</option>";
                                                <option value='N'>Naturalization</option>";
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="citizenship_country">If Holder of Dual Citizenship, please
                                                indicate
                                                country</label><br>
                                            <input type="text" required name="citizenship_country"
                                                id="citizenship_country" class="form-control" value="N/A" disabled>
                                        </div>
                                    </div>

                                    <!-- RESIDENTIAL ADDRESS -->
                                    <h5 class="mt-5">RESIDENTIAL ADDRESS</h5>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="radd_province">PROVINCE</label>
                                            <select id="radd_province" required name="radd_province"
                                                class="form-select">
                                                <?php
                                                $list_province = query($conn, "SELECT * FROM `provinces`");
                                                echo '<option value="" disabled selected value>--select--</option>';
                                                foreach ($list_province as $key => $row) {
                                                    $prov_id = $row['province_id'];
                                                    $prov_name = $row['province_name'];
                                                    echo "<option value='" . $prov_name . "'>" . $prov_name . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="radd_citymunicipality">CITY/MUNICIPALITY</label>
                                            <select id="radd_citymunicipality" required name="radd_citymunicipality"
                                                class="form-select">
                                                <?php
                                                $list_citymunicipality = query($conn, "SELECT * FROM `city_municipality`");
                                                echo '<option value="" disabled selected value>--select--</option>';
                                                foreach ($list_citymunicipality as $key => $row) {
                                                    $cm_id = $row['citymunicipality_id'];
                                                    $cm_name = $row['citymunicipality_name'];
                                                    echo "<option value='" . $cm_name . "'>" . $cm_name . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="radd_barangay">BARANGAY</label>
                                            <input type="text" required name="radd_barangay" id="radd_barangay"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="radd_subdivisionvillage">SUBDIVISION/VILLAGE</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="radd_subdivisionvillage"
                                                    id="radd_subdivisionvillage" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_rsv">
                                                    <label class="form-check-label" for="null_rsv">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="radd_street">STREET</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="radd_street" id="radd_street"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_rst">
                                                    <label class="form-check-label" for="null_rst">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="radd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="radd_houseblocklot"
                                                    id="radd_houseblocklot" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_rhbl">
                                                    <label class="form-check-label" for="null_rhbl">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3 mx-2">
                                            <label for="radd_zipcode">ZIPCODE</label>
                                            <input type="number" required name="radd_zipcode" id="radd_zipcode"
                                                class="form-control" min="400" max="9900">
                                        </div>
                                    </div>

                                    <!-- PERMANENT ADDRESS -->
                                    <div class="mt-5">
                                        <h5 style="display: inline">PERMANENT ADDRESS</h5>
                                        <div class="form-check form-check-inline ms-2">
                                            <input class="form-check-input" type="checkbox" id="same_add"
                                                name="same_add" value="true">
                                            <label class="form-check-label" for="same_add">Same as the Residential
                                                Address</label>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="padd_province">PROVINCE</label>
                                            <select id="padd_province" required name="padd_province"
                                                class="form-select">
                                                <?php
                                                $list_province = query($conn, "SELECT * FROM `provinces`");
                                                echo '<option value="" disabled selected value>--select--</option>';
                                                foreach ($list_province as $key => $row) {
                                                    $prov_id = $row['province_id'];
                                                    $prov_name = $row['province_name'];
                                                    echo "<option value='" . $prov_name . "'>" . $prov_name . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="padd_citymunicipality">CITY/MUNICIPALITY</label>
                                            <select id="padd_citymunicipality" required name="padd_citymunicipality"
                                                class="form-select">
                                                <?php
                                                $list_citymunicipality = query($conn, "SELECT * FROM `city_municipality`");
                                                echo '<option value="" disabled selected value>--select--</option>';
                                                foreach ($list_citymunicipality as $key => $row) {
                                                    $cm_id = $row['citymunicipality_id'];
                                                    $cm_name = $row['citymunicipality_name'];
                                                    echo "<option value='" . $cm_name . "'>" . $cm_name . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="padd_barangay">BARANGAY</label>
                                            <input type="text" required name="padd_barangay" id="padd_barangay"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="padd_subdivisionvillage">SUBDIVISION/VILLAGE</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="padd_subdivisionvillage"
                                                    id="padd_subdivisionvillage" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_psv">
                                                    <label class="form-check-label" for="null_psv">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="padd_street">STREET</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="padd_street" id="padd_street"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_pst">
                                                    <label class="form-check-label" for="null_pst">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="padd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="padd_houseblocklot"
                                                    id="padd_houseblocklot" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_phbl">
                                                    <label class="form-check-label" for="null_phbl">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3 mx-2">
                                            <label for="padd_zipcode">ZIPCODE</label>
                                            <input type="number" required name="padd_zipcode" id="padd_zipcode"
                                                class="form-control" min="400" max="9900">
                                        </div>
                                    </div>

                                    <!-- CONTACT DETAILS -->
                                    <div class="row mt-5">
                                        <div class="col mx-2">
                                            <label for="no_tel">TELEPHONE NO.</label><br>
                                            <div class="checkbox-container">
                                                <input type="tel" required name="no_tel" id="no_tel"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_telno">
                                                    <label class="form-check-label" for="null_telno">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="no_mobile">MOBILE NO.</label><br>
                                            <input type="tel" required name="no_mobile" id="no_mobile"
                                                class="form-control" maxlength="11">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="emailadd">EMAIL ADDRESS</label><br>
                                            <div class="checkbox-container">
                                                <input type="email" required name="emailadd" id="emailadd"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_emailadd">
                                                    <label class="form-check-label" for="null_emailadd">N/A</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- NEXT BUTTON -->
                                    <button type="button" class="btn btn-primary mt-5 mx-1 button-right"
                                        data-bs-target="#carousel" data-bs-slide="next">
                                        <strong>NEXT</strong>
                                    </button>

                                </div>
                            </div>
                            <!-- FAMILY BACKGROUND -->
                            <div class="carousel-item">
                                <div class="container-fluid">

                                    <!-- SPOUSE'S FULL NAME -->
                                    <div class="row mt-5">
                                        <div class="col mx-1">
                                            <label for="spouse_name_last">SPOUSE'S SURNAME</label>
                                            <div class="form-check form-check-inline ms-2">
                                                <input class="form-check-input" type="checkbox" id="null_spouse">
                                                <label class="form-check-label" for="null_spouse">N/A</label>
                                            </div>
                                            <input type="text" name="spouse_name_last" id="spouse_name_last"
                                                class="form-control group-na">
                                        </div>
                                        <div class="col mx-1">
                                            <label for="spouse_name_first">FIRST NAME</label><br>
                                            <input type="text" name="spouse_name_first" id="spouse_name_first"
                                                class="form-control group-na">
                                        </div>
                                        <div class="col mx-1">
                                            <label for="spouse_name_middle">MIDDLE NAME</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spouse_name_middle"
                                                    id="spouse_name_middle" class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_spouse_mi">
                                                    <label class="form-check-label" for="null_spouse_mi">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 mx-1">
                                            <label for="spouse_name_ext">NAME EXTENSION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spouse_name_ext" id="spouse_name_ext"
                                                    class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_spouse_nameext">
                                                    <label class="form-check-label"
                                                        for="null_spouse_nameext">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SPOUSE'S OCCUPATION -->
                                    <div class="row mt-3">
                                        <div class="col mx-1">
                                            <label for="spouse_occupation">OCCUPATION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spouse_occupation"
                                                    id="spouse_occupation" class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_occupation">
                                                    <label class="form-check-label" for="null_occupation">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-1">
                                            <label for="spouse_bus_name">EMPLOYEER/BUSINESS NAME</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spouse_bus_name" id="spouse_bus_name"
                                                    class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_bus">
                                                    <label class="form-check-label" for="null_bus">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-1">
                                            <label for="spouse_bus_add">BUSINESS ADDRESS</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spouse_bus_add" id="spouse_bus_add"
                                                    class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_busadd">
                                                    <label class="form-check-label" for="null_busadd">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-1">
                                            <label for="spouse_telno">TELEPHONE NO.</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spouse_telno" id="spouse_telno"
                                                    class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_spouse_telno">
                                                    <label class="form-check-label" for="null_spouse_telno">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FATHER'S FULL NAME -->
                                    <div class="row mt-3">
                                        <div class="col mx-1">
                                            <label for="father_name_last">FATHER'S SURNAME</label>
                                            <div class="form-check form-check-inline ms-2">
                                                <input class="form-check-input" type="checkbox" id="null_father">
                                                <label class="form-check-label" for="null_father">N/A</label>
                                            </div>
                                            <input type="text" name="father_name_last" id="father_name_last"
                                                class="form-control group-na">

                                        </div>
                                        <div class="col mx-1">
                                            <label for="father_name_first">FIRST NAME</label><br>
                                            <input type="text" name="father_name_first" id="father_name_first"
                                                class="form-control group-na">
                                        </div>
                                        <div class="col mx-1">
                                            <label for="father_name_middle">MIDDLE NAME</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="father_name_middle"
                                                    id="father_name_middle" class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_father_mi">
                                                    <label class="form-check-label" for="null_father_mi">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 mx-1">
                                            <label for="father_name_ext">NAME EXTENSION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="father_name_ext" id="father_name_ext"
                                                    class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_father_nameext">
                                                    <label class="form-check-label"
                                                        for="null_father_nameext">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MOTHER'S FULL NAME -->
                                    <div class="row mt-3">
                                        <div class="col mx-1">
                                            <label for="mother_name_last">MOTHER'S SURNAME</label>
                                            <div class="form-check form-check-inline ms-2">
                                                <input class="form-check-input" type="checkbox" id="null_mother">
                                                <label class="form-check-label" for="null_mother">N/A</label>
                                            </div>
                                            <input type="text" name="mother_name_last" id="mother_name_last"
                                                class="form-control group-na">

                                        </div>
                                        <div class="col mx-1">
                                            <label for="mother_name_first">FIRST NAME</label><br>
                                            <input type="text" name="mother_name_first" id="mother_name_first"
                                                class="form-control group-na">
                                        </div>
                                        <div class="col mx-1">
                                            <label for="mother_name_middle">MIDDLE NAME</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="mother_name_middle"
                                                    id="mother_name_middle" class="form-control group-na">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_mother_mi">
                                                    <label class="form-check-label" for="null_mother_mi">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-container">
                                        <div class="row mt-3">
                                            <div class="col-8 mx-1">
                                                <label for="child_name">NAME OF CHILDREN</label>
                                                <div class="form-check form-check-inline ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_children">
                                                    <label class="form-check-label" for="null_children">N/A</label>
                                                </div>
                                            </div>
                                            <div class="col mx-1">
                                                <label for="child_dob">DATE OF BIRTH</label>
                                            </div>
                                        </div>
                                        <div class="row row-row mb-3">
                                            <div class="col-8 mx-1">
                                                <input type="text" name="child_fullname[]" id="child_name"
                                                    class="form-control group-na">
                                            </div>
                                            <div class="col mx-1">
                                                <div class="checkbox-container">
                                                    <input type="date" name="child_birthdate[]" id="child_dob"
                                                        class="form-control group-na">
                                                    <button type="button" class="delete-row-button mx-2"
                                                        style="display:none; background-color: transparent; border: none; color: red;">
                                                    </button>
                                                    <!-- <i class="bi bi-x-square-fill" style="color: #283872; font-size: 24px;" onclick="deleteRow(this)"></i> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <br /><button type="button" class="btn btn-primary" id="fb_addrow"
                                                name="fb_addrow" onclick="addRow()">
                                                ADD ROW
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BACK BUTTON -->
                                    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left"
                                        data-bs-target="#carousel" data-bs-slide="prev">
                                        <strong>BACK</strong>
                                    </button>

                                    <!-- NEXT BUTTON -->
                                    <button type="button" class="btn btn-primary mt-5 mx-1 button-right"
                                        data-bs-target="#carousel" data-bs-slide="next">
                                        <strong>NEXT</strong>
                                    </button>

                                </div>
                            </div>
                            <!-- EDUCATIONAL BACKGROUND -->
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <!-- COLUMN TILES -->
                                    <div class="row mt-5 text-center align-items-center">
                                        <div class="col-1">LEVEL</div>
                                        <div class="col">NAME OF SCHOOL <br>(Write in full)</div>
                                        <div class="col">BASIC EDUCATION/ <br>DEGREE/COURSE <br>(Write in full)</div>
                                        <div class="col-2">PERIOD OF ATTENDANCE <br>
                                            <div class="row mt-2">
                                                <div class="col">FROM</div>
                                                <div class="col">TO</div>
                                            </div>
                                        </div>
                                        <div class="col">HIGHEST LEVEL/ <br> UNITS EARNED <br>(if not graduated)</div>
                                        <div class="col">YEAR GRADUATED</div>
                                        <div class="col">SCHOLARSHIP/ <br>ACADEMIC HONORS <br>RECEIVED </div>
                                    </div>

                                    <!-- ELEMENTARY -->
                                    <div class="row mt-3 ms-1 ">
                                        <div class="row align-items-center">
                                            <div class="col-sm-1 p-2">ELEMENTARY</div>
                                            <!-- Name of school -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button sample"
                                                    id="name_schoolE" name="elem_school" required>
                                            </div>
                                            <!-- basic education/degree/course -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button sample" id="degree_E"
                                                    name="elem_degree" required>
                                            </div>
                                            <!-- period of attendance -->
                                            <div class="col-2">
                                                <div class="row">
                                                    <!-- FROM -->
                                                    <div class="col na checkbox-container pe-1 small-font">
                                                        <select class="form-select year-select next_button sample"
                                                            name="elem_attendance_from" id="p_attendance_fromE"
                                                            required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_fromE" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_fromE">N/A</label>
                                                        </div>
                                                    </div>
                                                    <!-- TO -->
                                                    <div class="col na checkbox-container ps-1 small-font">
                                                        <select class="form-select year-select next_button sample"
                                                            name="elem_attendance_to" id="p_attendance_toE" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_toE" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_toE">N/A</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Highest level / units earned -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button sample" id="h_levelE"
                                                    name="elem_level" required>
                                            </div>
                                            <!-- YEAR GRADUATED -->
                                            <div class="col na checkbox-container small-font">
                                                <select class="form-select year-select next_button sample"
                                                    name="elem_year" id="year_graduateE" required>
                                                    <option value=""></option>
                                                </select>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_yearE"
                                                        onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_yearE">N/A</label>
                                                </div>
                                            </div>
                                            <!-- SCHOLARSHIP/ACADEMIC HONORS RECEIVED -->
                                            <div class="col na checkbox-container small-font">
                                                <input type="text" class="form-control next_button sample"
                                                    id="e_scholarship" name="elem_scholarship" required>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_scholarshipE" onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_scholarshipE">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SECONDARY -->
                                    <div class="row mt-3 ms-1">
                                        <div class="row align-items-center">
                                            <div class="col-sm-1 p-2">SECONDARY</div>
                                            <!-- name of school -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="name_schoolS"
                                                    name="sec_school" required>
                                            </div>
                                            <!-- basic education/degree/course -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="degree_S"
                                                    name="sec_degree" required>
                                            </div>
                                            <!-- period of attendance -->
                                            <div class="col-2">
                                                <div class="row">
                                                    <!-- FROM -->
                                                    <div class="col na checkbox-container pe-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="sec_attendance_from" id="p_attendance_fromS" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_fromS" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_fromS">N/A</label>
                                                        </div>
                                                    </div>
                                                    <!-- TO -->
                                                    <div class="col na checkbox-container ps-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="sec_attendance_to" id="p_attendance_toS" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_toS" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_toS">N/A</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- highest level / units earned -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="h_levelS"
                                                    name="sec_level" required>
                                            </div>
                                            <!-- YEAR GRADUATED -->
                                            <div class="col na checkbox-container small-font">
                                                <select class="form-select year-select next_button" name="sec_year"
                                                    id="year_graduatedS" required>
                                                    <option value=""></option>
                                                </select>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_yearS"
                                                        onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_yearS">N/A</label>
                                                </div>
                                            </div>
                                            <!-- SCHOLARSHIP -->
                                            <div class="col na checkbox-container small-font">
                                                <input type="text" class="form-control next_button" id="s_scholarship"
                                                    name="sec_scholarship" required />
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_scholarshipS" onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_scholarshipS">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- VOCATIONAL/ TRADE COURSE -->
                                    <div class="row mt-3 ms-1 parent-row">
                                        <div class="row null_vocational align-items-start">
                                            <div
                                                class="col-1 text-center d-flex align-items-center justify-content-center">
                                                <p class="level" style="font-size: 13px;">VOCATIONAL / TRADE COURSE</p>
                                                <div class="form-check remove_na small-font">
                                                    <input class="form-check-input not_app" type="checkbox"
                                                        id="null_vocational">
                                                    <label class="form-check-label na-text"
                                                        for="null_vocational">N/A</label>
                                                </div>
                                                <button type="button" class="delete-row-button mb-4 mt-2"
                                                    style="display:none; background-color: transparent; border: none; color: red;">
                                                </button>
                                            </div>
                                            <!-- name of school -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="name_schoolV"
                                                    name="voc_school" required>
                                            </div>
                                            <!-- basic education/degree/course -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="degree_v"
                                                    name="voc_degree" required>
                                            </div>
                                            <!-- period of attendance -->
                                            <div class="col-2">
                                                <div class="row">
                                                    <!-- FROM -->
                                                    <div class="col na checkbox-container pe-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="voc_attendance_from" id="p_attendance_fromV" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_fromV" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_fromV">N/A</label>
                                                        </div>
                                                    </div>
                                                    <!-- TO -->
                                                    <div class="col na checkbox-container ps-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="voc_attendance_to" id="p_attendance_toV" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_toV" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_toV">N/A</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- highest level earned -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="h_levelV"
                                                    name="voc_level" required>
                                            </div>
                                            <!-- YEAR GRADUATED -->
                                            <div class="col na checkbox-container small-font">
                                                <select class="form-select year-select next_button" name="voc_year"
                                                    id="year_graduatedV" required>
                                                    <option value=""></option>
                                                </select>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_yearV"
                                                        onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_yearV">N/A</label>
                                                </div>
                                            </div>
                                            <!-- SCHOLARSHIP/ ACADEMIC HONORS RECEIVED -->
                                            <div class="col na checkbox-container small-font">
                                                <input type="text" class="form-control next_button" id="v_scholarship"
                                                    name="voc_scholarship" required />
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_scholarshipV" onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_scholarshipV">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- button  -->
                                        <button type="button" class="add-row-text"
                                            style="outline: none; width: 300px; height: 40px; background: none; border: none;  text-align: left; padding: 0; margin-left: 150px;"><i
                                                class="bi bi-plus-lg me-2" id="v_addrow" name="v_addrow"></i>Add new
                                            Vocational
                                            row</button>
                                    </div>
                                    <!-- COLLEGE -->
                                    <div class="row mt-3 ms-1  parent-row">
                                        <div class="row align-items-start">
                                            <div class="col-1 text-center d-flex mb-4 ms-0">
                                                <p class="level">COLLEGE</p>
                                                <button type="button" class=" delete-row-button ms-5 mt-2"
                                                    style="display:none; background-color: transparent; border: none; color: red;">
                                                </button>
                                            </div>
                                            <!-- name of school -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="name_schoolC"
                                                    name="coll_school" required>
                                            </div>
                                            <!-- basic education/degree/course -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="degree_C"
                                                    name="coll_degree" required>
                                            </div>
                                            <!-- period of attendance -->
                                            <div class="col-2">
                                                <div class="row">
                                                    <!-- FROM -->
                                                    <div class="col na checkbox-container pe-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="coll_attendance_from" id="p_attendance_fromC"
                                                            required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_fromC" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_fromC">N/A</label>
                                                        </div>
                                                    </div>
                                                    <!-- TO -->
                                                    <div class="col na checkbox-container ps-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="coll_attendance_to" id="p_attendance_toC" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_toC" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_toC">N/A</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- highest level earned -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="h_levelC"
                                                    name="coll_level" required>
                                            </div>
                                            <!-- YEAR GRADUATED -->
                                            <div class="col na checkbox-container small-font">
                                                <select class="form-select year-select next_button" name="coll_year"
                                                    id="year_graduatedC" required>
                                                    <option value=""></option>
                                                </select>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_yearC"
                                                        onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_yearC">N/A</label>
                                                </div>
                                            </div>
                                            <!-- scholarship/academic honors received -->
                                            <div class="col na checkbox-container small-font">
                                                <input type="text" class="form-control next_button" id="c_scholarship"
                                                    name="coll_scholarship" required />
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_scholarshipC" onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_scholarshipC">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="add-row-text"
                                            style="outline: none; border: none; width: 300px; height: 40px; background: none; text-align: left; padding: 0; margin-left: 150px;">
                                            <i class="bi bi-plus-lg me-2" id="c_addrow" name="c_addrow"></i>Add new
                                            College row
                                        </button>
                                    </div>

                                    <!-- GRADUATE STUDIES -->
                                    <div class="row mt-3 ms-1 parent-row">
                                        <div class="row null_graduate align-items-start ">
                                            <div
                                                class="col-1 text-center d-flex align-items-center justify-content-center">
                                                <div class="col">
                                                    <p class="level">GRADUATE STUDIES</p>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check remove_na ms-2 small-font mt-2">
                                                        <input class="form-check-input not_app" type="checkbox"
                                                            id="null_graduate">
                                                        <label class="form-check-label na-text"
                                                            for="null_graduate">N/A</label>
                                                    </div>
                                                    <button type="button" class="delete-row-button mb-4 mt-2"
                                                        style="display:none; background-color: transparent; border: none; color: red;">
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- name of school -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="name_schoolG"
                                                    name="grad_school" required>
                                            </div>
                                            <!-- basic education/degree/course -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="degree_g"
                                                    name="grad_degree" required>
                                            </div>
                                            <div class="col-2">
                                                <div class="row">
                                                    <!-- FROM -->
                                                    <div class="col na checkbox-container pe-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="grad_attendance_from" id="p_attendance_fromG"
                                                            required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_fromG" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_fromG">N/A</label>
                                                        </div>
                                                    </div>
                                                    <!-- TO -->
                                                    <div class="col na checkbox-container ps-1 small-font">
                                                        <select class="form-select year-select next_button"
                                                            name="grad_attendance_to" id="p_attendance_toG" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="null_toG" onchange="checkNA(this)">
                                                            <label class="form-check-label" for="null_toG">N/A</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- highest level earned -->
                                            <div class="col">
                                                <input type="text" class="form-control next_button" id="h_levelG"
                                                    name="grad_level" required>
                                            </div>
                                            <!-- YEAR GRADUATED -->
                                            <div class="col na checkbox-container small-font">
                                                <select class="form-select year-select next_button" name="grad_year"
                                                    id="year_graduatedG" required>
                                                    <option value=""></option>
                                                </select>
                                                <div class="form-check ms-2">
                                                    <input type="checkbox" class="form-check-input" id="null_yearG"
                                                        onchange="checkNA(this)">
                                                    <label for="null_yearG" class="form-check-label">N/A</label>
                                                </div>
                                            </div>
                                            <!-- SCHOLARSHIP -->
                                            <div class="col na checkbox-container small-font">
                                                <input type="text" class="form-control next_button" id="g_scholarship"
                                                    name="grad_scholarship" required />
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="null_scholarshipG" onchange="checkNA(this)">
                                                    <label class="form-check-label" for="null_scholarshipG">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="add-row-text"
                                            style="outline: none; border: none; width: 300px; height: 40px; background: none; text-align: left; padding: 0; margin-left: 150px;">
                                            <i class="bi bi-plus-lg me-2" id="g_addrow" name="g_addrow"></i>Add new
                                            Graduate Studies row
                                        </button>
                                    </div>
                                    <!-- BACK BUTTON -->
                                    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left"
                                        data-bs-target="#carousel" data-bs-slide="prev">
                                        <strong>BACK</strong>
                                    </button>

                                    <!-- NEXT BUTTON -->
                                    <!-- <button type="button" class="btn btn-primary mt-5 mx-1 button-right"
                                        onclick="submitForm()">
                                        <strong>NEXT</strong>
                                    </button> -->

                                    <!-- SUBMIT BUTTON -->
                                    <button type="submit" class="btn btn-primary mt-5 mx-1 button-right">
                                        <strong>SUBMIT</strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        telTypeArray = ["no_tel"];
        emailTypeArray = ["emailadd"];

        // ======================= N/A disable =======================
        function setupNullInput(checkboxId, inputId) {
            const checkbox = document.getElementById(checkboxId);
            const input = document.getElementById(inputId);

            checkbox.addEventListener("change", function () {
                if (this.checked) {

                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;

                } else {

                    (input.id == "no_tel" || input.id == "spouse_telno") ? input.type = "tel" :
                        input.id == "emailadd" ? input.type = "email" :
                            input.type = "text";

                    input.value = "";
                    input.disabled = false;
                }
            });

            input.addEventListener("input", function () {
                if (this.value === "N/A") {
                    checkbox.checked = true;
                    this.disabled = true;
                }
            })
        }

        // Call the function for each pair of checkbox and input
        // PERSONAL INFORMATION
        setupNullInput("null_middle", "name_middle");
        setupNullInput("null_ext", "name_ext");
        setupNullInput("null_rhbl", "radd_houseblocklot");
        setupNullInput("null_rst", "radd_street");
        setupNullInput("null_rsv", "radd_subdivisionvillage");
        setupNullInput("null_phbl", "padd_houseblocklot");
        setupNullInput("null_pst", "padd_street");
        setupNullInput("null_psv", "padd_subdivisionvillage");
        setupNullInput("null_telno", "no_tel");
        setupNullInput("null_emailadd", "emailadd");

        // FAMILY BACKGROUND
        setupNullInput("null_spouse_mi", "spouse_name_middle");
        setupNullInput("null_spouse_nameext", "spouse_name_ext");
        setupNullInput("null_occupation", "spouse_occupation");
        setupNullInput("null_bus", "spouse_bus_name");
        setupNullInput("null_busadd", "spouse_bus_add");
        setupNullInput("null_spouse_telno", "spouse_telno");
        setupNullInput("null_father_mi", "father_name_middle");
        setupNullInput("null_father_nameext", "father_name_ext");
        setupNullInput("null_mother_mi", "mother_name_middle");

        // ============================ N/A Array Disable ============================
        function setupNullInputArray(checkboxId, inputIds, chkboxIds) {
            const checkbox = document.getElementById(checkboxId);
            const inputs = inputIds.map((id) => document.getElementById(id));
            const checkboxes = chkboxIds.map((id) => document.getElementById(id));

            checkbox.addEventListener("change", function () {
                if (this.checked) {
                    inputs.forEach((input) => {

                        input.type = "text";
                        input.value = "N/A";
                        input.disabled = true;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = true;
                        chkbx.disabled = true;
                    });
                } else {
                    inputs.forEach((input) => {

                        input.id == "spouse_telno" ? input.type = "tel" :
                            input.id == "child_dob" ? input.type = "date" :
                                input.type = "text";

                        input.value = "";
                        input.disabled = false;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = false;
                        chkbx.disabled = false;
                    });
                }
            });
        }

        // ARRAYS
        // FAMILY BACKGROUND
        setupNullInputArray(
            "null_spouse",
            [
                "spouse_name_last",
                "spouse_name_first",
                "spouse_name_middle",
                "spouse_name_ext",
                "spouse_occupation",
                "spouse_bus_name",
                "spouse_bus_add",
                "spouse_telno",
            ],
            [
                "null_spouse_mi",
                "null_spouse_nameext",
                "null_occupation",
                "null_bus",
                "null_busadd",
                "null_spouse_telno",
            ]
        );
        setupNullInputArray(
            "null_father",
            [
                "father_name_last",
                "father_name_first",
                "father_name_middle",
                "father_name_ext",
            ],
            ["null_father_mi", "null_father_nameext"]
        );
        setupNullInputArray(
            "null_mother",
            ["mother_name_last", "mother_name_first", "mother_name_middle"],
            ["null_mother_mi"]
        );
        setupNullInputArray("null_children", ["child_name", "child_dob"], []);

        // ================================= Citizenship =================================
        const citizenshipSelect = document.getElementById("citizenship");
        const citizenshipBySelect = document.getElementById("citizenship_by");
        const citizenshipCountryInput = document.getElementById("citizenship_country");

        citizenshipSelect.addEventListener("change", function () {
            if (this.value === "D") {
                // If Dual Citizenship is selected, enable Citizenship By and Citizenship Country
                citizenshipBySelect.disabled = false;
                citizenshipCountryInput.disabled = false;
                citizenshipBySelect.value = "";
                citizenshipCountryInput.value = "";
            } else {
                // Reset Citizenship By and Citizenship Country values when Citizenship changes
                citizenshipBySelect.value = "F";
                citizenshipCountryInput.value = "N/A";
                // Otherwise, disable them
                citizenshipBySelect.disabled = true;
                citizenshipCountryInput.disabled = true;
            }
        });

        // ============ Same as the Residential Address Checkbox ============
        function copyValues(source, destination, isChecked, checkbox) {
            // destination.value = isChecked ? source.value : '';
            if (chk_same.checked) {
                destination.value = source.value;
                destination.disabled = true;
                checkbox.disabled = true;

                // If source is null, input is disabled and N/A checkbox is checked
                if (source.value == "N/A") {
                    checkbox.checked = true;
                }
            } else {
                destination.disabled = false;
                checkbox.disabled = false;
            }
        }

        // Get references to the checkbox and input text elements
        const chk_same = document.getElementById("same_add");
        const sourceInputs = [
            document.getElementById("radd_zipcode"),
            document.getElementById("radd_province"),
            document.getElementById("radd_citymunicipality"),
            document.getElementById("radd_barangay"),
            document.getElementById("radd_subdivisionvillage"),
            document.getElementById("radd_street"),
            document.getElementById("radd_houseblocklot"),
        ];
        const destinationInputs = [
            document.getElementById("padd_zipcode"),
            document.getElementById("padd_province"),
            document.getElementById("padd_citymunicipality"),
            document.getElementById("padd_barangay"),
            document.getElementById("padd_subdivisionvillage"),
            document.getElementById("padd_street"),
            document.getElementById("padd_houseblocklot"),
        ];
        const naCheckboxes = [
            "", "", "", "",
            document.getElementById("null_psv"),
            document.getElementById("null_pst"),
            document.getElementById("null_phbl"),
        ];

        // Add event listener to the checkbox
        chk_same.addEventListener("change", function () {
            // Iterate over source and destination inputs, copying values accordingly
            sourceInputs.forEach((source, index) => {
                copyValues(
                    source,
                    destinationInputs[index],
                    chk_same.checked,
                    naCheckboxes[index]
                );
            });
        });

        // =================================== Add Row ===================================
        function addRow() {
            // Check if the original row is set to "N/A"
            const nullChildrenCheckbox = document.getElementById("null_children");
            if (nullChildrenCheckbox.checked) {
                return; // Do nothing if original row is "N/A"
            }

            // Clone the input-row element
            const newRow = document.querySelector(".row-row").cloneNode(true);

            // Clear input values in the cloned row
            newRow.querySelectorAll("input").forEach((input) => {
                input.value = "";
            });

            // Find the delete button in the cloned row and enable it 
            const deleteButton = newRow.querySelector(".delete-row-button");
            if (deleteButton) {
                deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
                deleteButton.style.display = "inline-block";
                deleteButton.addEventListener("click", function () {
                    newRow.parentNode.removeChild(newRow);
                });
            }

            // Set inputs to "N/A" if corresponding checkbox is checked
            const checkboxes = newRow.querySelectorAll(".form-check-input");
            checkboxes.forEach((checkbox, index) => {
                const input = newRow.querySelectorAll("input")[index];
                if (checkbox.checked) {
                    input.value = "N/A";
                    input.disabled = true;
                }
            });

            // Append the cloned row to the container
            document.querySelector(".row-container").appendChild(newRow);

            // Set inputs to "N/A" when "N/A" checkbox is clicked and remove the cloned row
            const childNameInput = newRow.querySelector("input[name='child_fullname[]']");
            const childDobInput = newRow.querySelector("input[name='child_birthdate[]']");
            nullChildrenCheckbox.addEventListener("change", function () {
                if (this.checked) {
                    newRow.parentNode.removeChild(newRow);
                } else {
                    childNameInput.value = "";
                    childNameInput.disabled = false;
                    childDobInput.value = "";
                    childDobInput.disabled = false;
                }
            });

            // Disable the "Add Row" button if the original row is "N/A"
            const addButton = document.getElementById("fb_addrow");
            if (nullChildrenCheckbox.checked) {
                addButton.disabled = true;
            } else {
                addButton.disabled = false;
            }
        }

        // Year Picker 
        function populateYearDropdowns(select) {
            const currentYear = new Date().getFullYear();

            for (let year = currentYear; year >= 1900; year--) {
                const option = document.createElement('option');
                option.text = year;
                option.value = year;
                select.add(option);
            }
        }

        const selectElements = document.querySelectorAll('.year-select');
        // Call the function to populate the year dropdowns
        selectElements.forEach(selectElement => {
            populateYearDropdowns(selectElement);
        })

        function checkNA(checkbox) {
            var chk_col = checkbox.closest('.na');
            var chk_input = chk_col.querySelector("input[type='text']");
            var chk_select = chk_col.querySelector("select");

            if (checkbox.checked) {
                if (chk_select) {
                    chk_select.innerHTML = "";
                    var option = document.createElement("option");
                    option.text = "N/A";
                    option.value = "N/A";
                    chk_select.add(option);
                    chk_select.disabled = true;
                }
                if (chk_input) {
                    chk_input.value = "N/A";
                    chk_input.disabled = true;
                }
            } else {
                if (chk_select) {
                    chk_select.disabled = false;
                    chk_select.innerHTML = ""; // Clear previous options
                    var option = document.createElement("option");
                    option.text = ""; // Empty option
                    option.value = ""; // Modify as needed
                    chk_select.add(option);
                    // If it's the "Year Graduated" or "Period of Attendance" field
                    if (checkbox.id.includes("_year") || checkbox.id.includes("_from") || checkbox.id.includes("_to")) {
                        populateYearDropdowns(chk_select); // Populate year options
                    } else {
                        var scholarshipIDs = ["e_scholarship", "s_scholarship", "v_scholarship", "c_scholarship", "g_scholarship"];
                        if (scholarshipIDs.includes(checkbox.id)) {
                            var option = document.createElement("option");
                            option.text = "Enter Scholarship"; // Modify as needed
                            option.value = ""; // Modify as needed
                            chk_select.add(option);
                        }
                    }
                }
                if (chk_input) {
                    chk_input.value = "";
                    chk_input.disabled = false;
                }
            }
        }

        // Define an object to store the original options of each select element
        const originalOptions = {};

        function handleNAArray(checkboxId, inputIds, selectIds, chkboxIds) {
            const checkbox = document.getElementById(checkboxId);
            const inputs = inputIds.map((id) => document.getElementById(id));
            const selects = selectIds.map((id) => document.getElementById(id));
            const checkboxes = chkboxIds.map((id) => document.getElementById(id));

            // Store the original options of each select element
            selects.forEach((select) => {
                originalOptions[select.id] = Array.from(select.options).map((option) => {
                    return { value: option.value, text: option.text };
                });
            });

            checkbox.addEventListener("change", function () {
                if (this.checked) {
                    inputs.forEach((input) => {
                        input.value = "N/A";
                        input.disabled = true;
                    });
                    selects.forEach((select) => {
                        // Clear existing options
                        select.innerHTML = "";
                        // Create new option with "N/A" value
                        const optionNA = document.createElement("option");
                        optionNA.text = "N/A";
                        optionNA.value = "N/A";
                        // Append option to select
                        select.appendChild(optionNA);
                        select.disabled = true;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = true;
                        chkbx.disabled = true;
                    });
                    // Remove cloned rows if they exist
                    const clonedRows = document.querySelectorAll("." + checkboxId + ".new-row");
                    clonedRows.forEach((clonedRow) => {
                        clonedRow.remove();
                    });
                } else {
                    inputs.forEach((input) => {
                        input.value = "";
                        input.disabled = false;
                    });
                    selects.forEach((select) => {
                        // Restore original options
                        select.innerHTML = "";
                        originalOptions[select.id].forEach((optionData) => {
                            const option = document.createElement("option");
                            option.text = optionData.text;
                            option.value = optionData.value;
                            select.appendChild(option);
                        });
                        select.disabled = false;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = false;
                        chkbx.disabled = false;
                    });
                }
            });
        }

        //ARRAYS
        handleNAArray(
            "null_vocational",
            [
                "name_schoolV",
                "degree_v",
                "h_levelV",
                "p_attendance_fromV",
                "p_attendance_toV",
                "year_graduatedV",
                "v_scholarship"
            ],
            [
                "p_attendance_fromV",
                "p_attendance_toV",
                "year_graduatedV",
            ],
            [
                "null_fromV",
                "null_toV",
                "null_yearV",
                "null_scholarshipV"
            ]
        );
        handleNAArray(
            "null_graduate",
            [
                "name_schoolG",
                "degree_g",
                "p_attendance_fromG",
                "p_attendance_toG",
                "h_levelG",
                "year_graduatedG",
                "g_scholarship"
            ],
            [
                "p_attendance_fromG",
                "p_attendance_toG",
                "year_graduatedG",
            ],
            [
                "null_fromG",
                "null_toG",
                "null_yearG",
                "null_scholarshipG"
            ]
        );

        document.addEventListener("DOMContentLoaded", function () {
            // Find the "button"
            const plusButtons = document.querySelectorAll("button");

            // Iterate over each "plus" icon
            plusButtons.forEach(function (button) {
                // Attach a click event listener to each "plus" icon
                button.addEventListener("click", function () {
                    // Find the parent row of the clicked icon
                    const parentRow = button.closest(".parent-row");
                    const row = parentRow.querySelector(".row");

                    //Find the n/a checkbox within the parent row 
                    const naCheckbox = row.querySelector(".not_app");

                    //Check if the n/a checkbox is checked
                    if (naCheckbox && naCheckbox.checked) {
                        return;
                    }

                    // Clone the row
                    const clonedRow = row.cloneNode(true);
                    //Add the new-row class to the cloned row 
                    clonedRow.classList.add('new-row');

                    const level = clonedRow.querySelector('.level');
                    level.hidden = true;

                    // Clear select values and enable select boxes in the cloned row
                    const checkboxes = clonedRow.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(function (checkbox) {
                        if (checkbox.checked) {
                            checkbox.checked = false; // Uncheck the checkbox if it's checked
                        }
                    });

                    // Find all select elements in the cloned row
                    const selects = clonedRow.querySelectorAll('select');

                    // Iterate over each select element and set its value to an empty string or to the default selected option
                    selects.forEach(function (select) {
                        // Clear the value of the select box 

                        select.disabled = false;
                        select.innerHTML = "";

                        var option = document.createElement("option");
                        option.text = ""; // Empty option
                        option.value = ""; // Modify as needed
                        select.add(option);

                        select.value = ''; // Set the value to an empty string

                        populateYearDropdowns(select);
                    });



                    //Remove the n/a checkbox and its associated text from the cloned row
                    const clonedNaCheckbox = clonedRow.querySelector(".remove_na");
                    if (clonedNaCheckbox) {
                        clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
                    }

                    //find the delete button in the cloned row and enable it 
                    const deleteButton = clonedRow.querySelector(".delete-row-button");
                    if (deleteButton) {
                        deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
                        deleteButton.style.display = "inline-block";
                        deleteButton.addEventListener("click", function () {
                            clonedRow.parentNode.removeChild(clonedRow);
                        });
                    }

                    // Update IDs of cloned elements to make them unique
                    const inputFields = clonedRow.querySelectorAll("input");
                    inputFields.forEach(function (input) {
                        const oldId = input.getAttribute("id");
                        const newId = generateUniqueId(oldId); // Generate a unique id 
                        input.setAttribute("id", newId);

                        //Update corresponding label ID
                        const labelFor = input.getAttribute("id");
                        const label = clonedRow.querySelector(`label[for="${oldId}"]`);
                        if (label) {
                            label.setAttribute("for", newId);
                        }

                        // Optionally, clear input values in cloned row
                        input.value = "";
                        input.disabled = false;
                    });

                    // Generate unique IDs for select elements
                    const selectFields = clonedRow.querySelectorAll("select");
                    selectFields.forEach(function (select) {
                        const oldId = select.getAttribute("id");
                        const newId = generateUniqueId(oldId); // Generate a unique id 
                        select.setAttribute("id", newId);
                    });

                    // Append the cloned row before the "Add new row" text 
                    button.insertAdjacentElement("beforebegin", clonedRow);
                });
            });
        });

        //Function to generate a unique ID based on the old ID
        function generateUniqueId(oldId) {
            return oldId + "_" + Date.now();
        }
    </script>
</body>

</html>