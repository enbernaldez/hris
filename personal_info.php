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
    <link rel="stylesheet" href="hris_style.css">
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- SIDEBAR -->
            <div class="col-2" style="background-color: #0F1636;">

            </div>

            <!-- CONTENT -->
            <div class="col-10 pb-5">

                <?php include_once 'topnav.php'; ?>

                <form action="pds.php" method="post">
                    <div class="container px-5">

                        <!-- EMPLOYEE'S FULL NAME -->
                        <div class="row mt-3">
                            <div class="col mx-2">
                                <label for="name_last">SURNAME</label><br>
                                <input type="text" required name="name_last" id="name_last" class="form-control">
                            </div>
                            <div class="col mx-2">
                                <label for="name_first">FIRST NAME</label><br>
                                <input type="text" required name="name_first" id="name_first" class="form-control">
                            </div>
                            <div class="col mx-2">
                                <label for="name_middle">MIDDLE NAME</label><br>
                                <div style="display: inline-block; width: 74%">
                                    <input type="text" required name="name_middle" id="name_middle" class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_middle">
                                    <label class="form-check-label" for="null_middle">N/A</label>
                                </div>
                            </div>
                            <div class="col-2 mx-2">
                                <label for="name_ext">NAME EXTENSION</label><br>
                                <div style="display: inline-block; width: 56%">
                                    <input type="text" required name="name_ext" id="name_ext" class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_ext">
                                    <label class="form-check-label" for="null_ext">N/A</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col mx-2">
                                <label for="birth_date">DATE OF BIRTH</label><br>
                                <input type="date" required name="birth_date" id="birth_date" class="form-control">

                            </div>
                            <div class="col mx-2">
                                <label for="birth_place">PLACE OF BIRTH</label><br>
                                <input type="text" required name="birth_place" id="birth_place" class="form-control">
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
                                <input type="number" required name="height" id="height" class="form-control" min="1"
                                    step="0.01" max="2">
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
                                <input type="text" required name="gsis" id="gsis" class="form-control"
                                    style="text-transform:uppercase">
                            </div>
                            <div class="col mx-2">
                                <label for="pagibig">PAG-IBIG ID NO.</label><br>
                                <input type="text" required name="pagibig" id="pagibig" class="form-control"
                                    style="text-transform:uppercase">
                            </div>
                            <div class="col mx-2">
                                <label for="philhealth">PHILHEALTH NO.</label><br>
                                <input type="text" required name="philhealth" id="philhealth" class="form-control"
                                    style="text-transform:uppercase">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col mx-2">
                                <label for="sss">SSS NO.</label><br>
                                <input type="text" required name="sss" id="sss" class="form-control"
                                    style="text-transform:uppercase">
                            </div>
                            <div class="col mx-2">
                                <label for="tin">TIN NO.</label><br>
                                <input type="text" required name="tin" id="tin" class="form-control"
                                    style="text-transform:uppercase">
                            </div>
                            <div class="col mx-2">
                                <label for="employee_no">AGENCY EMPLOYEE NO.</label><br>
                                <input type="text" required name="employee_no" id="employee_no" class="form-control"
                                    style="text-transform:uppercase">
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
                                <select id="citizenship_by" required name="citizenship_by" class="form-select" disabled>
                                    <option value="" disabled selected value>--select--</option>
                                    <option value='B'>Birth</option>";
                                    <option value='N'>Naturalization</option>";
                                </select>
                            </div>
                            <div class="col mx-2">
                                <label for="citizenship_country">If Holder of Dual Citizenship, please indicate
                                    country</label><br>
                                <input type="text" required name="citizenship_country" id="citizenship_country"
                                    class="form-control" disabled>
                            </div>
                        </div>

                        <!-- RESIDENTIAL ADDRESS -->
                        <h5 class="mt-5">RESIDENTIAL ADDRESS</h5>

                        <div class="row mt-3">
                            <div class="col mx-2">
                                <label for="radd_province">PROVINCE</label>
                                <select id="radd_province" required name="radd_province" class="form-select">
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
                                <div style="display: inline-block; width: 79%">
                                    <input type="text" required name="radd_subdivisionvillage"
                                        id="radd_subdivisionvillage" class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_rsv">
                                    <label class="form-check-label" for="null_rsv">N/A</label>
                                </div>
                            </div>
                            <div class="col mx-2">
                                <label for="radd_street">STREET</label><br>
                                <div style="display: inline-block; width: 79%">
                                    <input type="text" required name="radd_street" id="radd_street"
                                        class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_rst">
                                    <label class="form-check-label" for="null_rst">N/A</label>
                                </div>
                            </div>
                            <div class="col mx-2">
                                <label for="radd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
                                <div style="display: inline-block; width: 79%">
                                    <input type="text" required name="radd_houseblocklot" id="radd_houseblocklot"
                                        class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_rhbl">
                                    <label class="form-check-label" for="null_rhbl">N/A</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3 mx-2">
                                <label for="radd_zipcode">ZIPCODE</label>
                                <input type="number" required name="radd_zipcode" id="radd_zipcode" class="form-control"
                                    min="400" max="9900">
                            </div>
                        </div>

                        <!-- PERMANENT ADDRESS -->
                        <div class="mt-5">
                            <h5 style="display: inline">PERMANENT ADDRESS</h5>
                            <div class="form-check form-check-inline ms-3">
                                <input class="form-check-input" type="checkbox" id="same_add">
                                <label class="form-check-label" for="same_add">Same as the Residential Address</label>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col mx-2">
                                <label for="padd_province">PROVINCE</label>
                                <select id="padd_province" required name="padd_province" class="form-select">
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
                                <div style="display: inline-block; width: 79%">
                                    <input type="text" required name="padd_subdivisionvillage"
                                        id="padd_subdivisionvillage" class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_psv">
                                    <label class="form-check-label" for="null_psv">N/A</label>
                                </div>
                            </div>
                            <div class="col mx-2">
                                <label for="padd_street">STREET</label><br>
                                <div style="display: inline-block; width: 79%">
                                    <input type="text" required name="padd_street" id="padd_street"
                                        class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_pst">
                                    <label class="form-check-label" for="null_pst">N/A</label>
                                </div>
                            </div>
                            <div class="col mx-2">
                                <label for="padd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
                                <div style="display: inline-block; width: 79%">
                                    <input type="text" required name="padd_houseblocklot" id="padd_houseblocklot"
                                        class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_phbl">
                                    <label class="form-check-label" for="null_phbl">N/A</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3 mx-2">
                                <label for="padd_zipcode">ZIPCODE</label>
                                <input type="number" required name="padd_zipcode" id="padd_zipcode" class="form-control"
                                    min="400" max="9900">
                            </div>
                        </div>

                        <!-- CONTACT DETAILS -->
                        <div class="row mt-5">
                            <div class="col mx-2">
                                <label for="tel_no">TELEPHONE NO.</label><br>
                                <div style="display: inline-block; width: 79%">
                                    <input type="tel" required name="tel_no" id="tel_no" class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_telno">
                                    <label class="form-check-label" for="null_telno">N/A</label>
                                </div>
                            </div>
                            <div class="col mx-2">
                                <label for="mobile_no">MOBILE NO.</label><br>
                                <input type="tel" required name="mobile_no" id="mobile_no" class="form-control"
                                    placeholder="09##-###-####" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" maxlength="13">
                            </div>
                            <div class="col mx-2">
                                <label for="email_add">EMAIL ADDRESS</label><br>
                                <div style="display: inline-block; width: 79%">
                                    <input type="email" required name="email_add" id="email_add" class="form-control">
                                </div>
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="checkbox" id="null_emailadd">
                                    <label class="form-check-label" for="null_emailadd">N/A</label>
                                </div>
                            </div>

                        </div>

                        <!-- NEXT BUTTON -->
                        <a href="fam_bg.php">
                            <button class="btn btn-primary mt-5 mx-1" style="float: right; width: 100px">
                                <strong>NEXT</strong>
                            </button>
                        </a>

                        <!-- SUBMIT BUTTON -->
                        <a href="fam_bg.php">
                            <button type="submit" class="btn btn-primary mt-5 mx-1" style="float: right; width: 100px">
                                <strong>SUBMIT</strong>
                            </button>
                        </a>

                    </div>
                </form>

            </div>
        </div>

        <script type="text/javascript" src="personal_info_script.js"></script>

</body>

</html>