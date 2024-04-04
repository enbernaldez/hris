<!DOCTYPE html>

<html lang="en">
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
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
                include_once 'topnav.php';
                ?>

                <!-- FORM -->

                <form action="pds.php" method="post">

                    <?php
                    if (isset ($_GET['form_section'])) {
                        $form_section = $_GET['form_section'];

                        switch ($form_section) {
                            case 'personal_info':
                                ?>
                                <!-- PERSONAL INFORMATION -->
                                <div class="container-fluid">

                                    <!-- EMPLOYEE'S FULL NAME -->
                                    <div class="row my-5">
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
                                                <input type="text" required name="name_ext" id="name_ext" class="form-control">
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
                                            <input type="text" required name="gsis" id="gsis" class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="pagibig">PAG-IBIG ID NO.</label><br>
                                            <input type="text" required name="pagibig" id="pagibig" class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="philhealth">PHILHEALTH NO.</label><br>
                                            <input type="text" required name="philhealth" id="philhealth"
                                                class="form-control uppercase">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col mx-2">
                                            <label for="sss">SSS NO.</label><br>
                                            <input type="text" required name="sss" id="sss" class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="tin">TIN NO.</label><br>
                                            <input type="text" required name="tin" id="tin" class="form-control uppercase">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="employee_no">AGENCY EMPLOYEE NO.</label><br>
                                            <input type="text" required name="employee_no" id="employee_no"
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
                                                <input type="text" required name="radd_houseblocklot" id="radd_houseblocklot"
                                                    class="form-control">
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
                                            <input type="number" required name="radd_zipcode" id="radd_zipcode" class="form-control"
                                                min="400" max="9900">
                                        </div>
                                    </div>

                                    <!-- PERMANENT ADDRESS -->
                                    <div class="mt-5">
                                        <h5 style="display: inline">PERMANENT ADDRESS</h5>
                                        <div class="form-check form-check-inline ms-2">
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
                                                <input type="text" required name="padd_houseblocklot" id="padd_houseblocklot"
                                                    class="form-control">
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
                                            <input type="number" required name="padd_zipcode" id="padd_zipcode" class="form-control"
                                                min="400" max="9900">
                                        </div>
                                    </div>

                                    <!-- CONTACT DETAILS -->
                                    <div class="row mt-5">
                                        <div class="col mx-2">
                                            <label for="tel_no">TELEPHONE NO.</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="tel_no" id="tel_no" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_telno">
                                                    <label class="form-check-label" for="null_telno">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-2">
                                            <label for="mobile_no">MOBILE NO.</label><br>
                                            <input type="tel" required name="mobile_no" id="mobile_no" class="form-control"
                                                maxlength="11">
                                        </div>
                                        <div class="col mx-2">
                                            <label for="email_add">EMAIL ADDRESS</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="email_add" id="email_add" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_emailadd">
                                                    <label class="form-check-label" for="null_emailadd">N/A</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- NEXT BUTTON -->
                                    <a href="pds_form.php?form_section=fam_bg">
                                        <button type="button" class="btn btn-primary mt-5 mx-1 button-right">
                                            <strong>NEXT</strong>
                                        </button>
                                    </a>

                                </div>
                                <?php
                                break;
                            case "fam_bg":
                                ?>
                                <!-- FAMILY BACKGROUND -->
                                <div class="container-fluid">

                                    <!-- SPOUSE'S FULL NAME -->
                                    <div class="row mt-5">
                                        <div class="col mx-1">
                                            <label for="spousename_last">SPOUSE'S SURNAME</label>
                                            <div class="form-check form-check-inline ms-2">
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
                                            <div class="checkbox-container">
                                                <input type="text" required name="spousename_middle" id="spousename_middle"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_spouse_mi">
                                                    <label class="form-check-label" for="null_spouse_mi">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 mx-1">
                                            <label for="spousename_extension">NAME EXTENSION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="spousename_extension" id="spousename_extension"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_spouse_nameext">
                                                    <label class="form-check-label" for="null_spouse_nameext">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SPOUSE'S OCCUPATION -->
                                    <div class="row mt-3">
                                        <div class="col mx-1">
                                            <label for="occupation">OCCUPATION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="occupation" id="occupation" class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_occupation">
                                                    <label class="form-check-label" for="null_occupation">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-1">
                                            <label for="business_name">EMPLOYEER/BUSINESS NAME</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="business_name" id="business_name"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_bus">
                                                    <label class="form-check-label" for="null_bus">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mx-1">
                                            <label for="business_address">BUSINESS ADDRESS</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="business_address" id="business_address"
                                                    class="form-control">
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
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_spouse_telno">
                                                    <label class="form-check-label" for="null_spouse_telno">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FATHER'S FULL NAME -->
                                    <div class="row mt-3">
                                        <div class="col mx-1">
                                            <label for="fathername_last">FATHER'S SURNAME</label>
                                            <div class="form-check form-check-inline ms-2">
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
                                            <div class="checkbox-container">
                                                <input type="text" required name="fathername_middle" id="fathername_middle"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_father_mi">
                                                    <label class="form-check-label" for="null_father_mi">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 mx-1">
                                            <label for="fathername_extension">NAME EXTENSION</label><br>
                                            <div class="checkbox-container">
                                                <input type="text" required name="fathername_extension" id="fathername_extension"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_father_nameext">
                                                    <label class="form-check-label" for="null_father_nameext">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MOTHER'S FULL NAME -->
                                    <div class="row mt-3">
                                        <div class="col mx-1">
                                            <label for="mothername_last">MOTHER'S SURNAME</label>
                                            <div class="form-check form-check-inline ms-2">
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
                                            <div class="checkbox-container">
                                                <input type="text" required name="mothername_middle" id="mothername_middle"
                                                    class="form-control">
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="checkbox" id="null_mother_mi">
                                                    <label class="form-check-label" for="null_mother_mi">N/A</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-8 mx-1">
                                            <label for="child_name">NAME OF CHILDREN</label>
                                            <div class="form-check form-check-inline ms-2">
                                                <input class="form-check-input" type="checkbox" id="null_children">
                                                <label class="form-check-label" for="null_children">N/A</label>
                                            </div>
                                            <input type="text" name="child_name" id="child_name" class="form-control">

                                        </div>
                                        <div class="col mx-1">
                                            <label for="child_dob">DATE OF BIRTH</label><br>
                                            <input type="date" name="child_dob" id="child_dob" class="form-control">
                                        </div>
                                    </div>

                                    <!-- NEXT BUTTON -->
                                    <a href="pds_form.php?form_section=educ_bg">
                                        <button class="btn btn-primary mt-5 mx-1 button-right">
                                            <strong>NEXT</strong>
                                        </button>
                                    </a>

                                    <!-- SUBMIT BUTTON -->
                                    <button type="submit" class="btn btn-primary mt-5 mx-1 button-right">
                                        <strong>SUBMIT</strong>
                                    </button>

                                </div>
                                <?php
                                break;
                            case "educ_bg":
                                ?>
                                <!-- EDUCATIONAL BACKGROUND -->
                                <?php
                                break;
                            case "cs_eligibility":
                                ?>
                                <!-- CIVIL SERVICE ELIGIBILITY -->
                                <div class="container-fluid">
                                    <div class="row mt-4 text-center align-items-end">
                                        <div class="col-4">
                                            <p>CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES CSEE
                                                BARANGAY ELIGIBILITY/DRIVER'S LICENSE
                                            </p>
                                        </div>
                                        <div class="col-1">
                                            <p>RATING<br>(if applicable)</p>
                                        </div>
                                        <div class="col-2">
                                            <p>DATE OF EXAMINATION/CONFERMENT</p>
                                        </div>
                                        <div class="col-2">
                                            <p>PLACE OF EXAMINATION/CONFERMENT</p>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <p>LICENSE (if applicable)</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>NUMBER</p>
                                                </div>
                                                <div class="col-6">
                                                    <p>DATE OF VALIDITY</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-container">
                                        <div class="row row-row mt-3">
                                            <div class="col-4">
                                                <div class="checkbox-container">
                                                    <div class="form-check me-2">
                                                        <input class="form-check-input" type="checkbox" id="null_cse"
                                                            onclick="checkNA(this)">
                                                        <label class="form-check-label">N/A</label>
                                                    </div>
                                                    <input type="text" name="careerservice" id="careerservice"
                                                        class="form-control group-na">
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <input type="text" name="rating" id="rating" class="form-control group-na">
                                            </div>
                                            <div class="col-2">
                                                <input type="date" name="dateofexamination" id="dateofexamination"
                                                    class="form-control group-na">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="placeofexamination" id="placeofexamination"
                                                    class="form-control group-na">
                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="number" name="number" id="number"
                                                            class="form-control group-na">
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="date" name="dateofvalidity" id="dateofvalidity"
                                                            class="form-control group-na">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <br><button type="button" class="btn btn-primary add-row-button" id="cse_addrow"
                                                name="cse_addrow" onclick="addRow()">ADD ROW</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                break;
                            case "work_exp":
                                ?>
                                <!-- WORK EXPERIENCE -->
                                <div class="container-fluid">
                                    <div class="row mt-4 text-center align-items-end">
                                        <div class="col-3">
                                            <div class="row ms-5">
                                                <p class="mb-0">INCLUSIVE DATES</p>
                                                <p>(mm/dd/yy)</p>
                                            </div>
                                            <div class="row ms-5">
                                                <div class="col">
                                                    <p>FROM</p>
                                                </div>
                                                <div class="col">
                                                    <p>TO</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <p>
                                                POSITION TITLE<br>
                                                (Write in full / Do not abbreviate)
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p>
                                                DEPARTMENT/AGENCY/<br>OFFICE/COMPANY<br>(Write in full / Do not abbreviate)
                                            </p>
                                        </div>
                                        <div class="col-1">
                                            <p>MONTHLY SALARY</p>
                                        </div>
                                        <div class="col-1">
                                            <p>
                                                SALARY/JOB/PAY GRADE (if applicable) & STEP (Format "00-0")/<br>INCREMENT
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p>STATUS OF APPOINTMENT</p>
                                        </div>
                                        <div class="col-1">
                                            <p>GOV'T SERVICE (Y/N)</p>
                                        </div>
                                    </div>

                                    <div class="row-container text-center">
                                        <div class="row row-row mt-3">
                                            <div class="col-3">
                                                <div class="checkbox-container">
                                                    <div class="form-check me-2">
                                                        <input class="form-check-input" type="checkbox" id="null_work_exp">
                                                        <label class="form-check-label">N/A</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="date" required name="we_from" id="we_from"
                                                                class="form-control group_na">
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="date" required name="we_to" id="we_to"
                                                                class="form-control group_na">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="we_position_title" id="we_position_title"
                                                    class="form-control group_na">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="we_dept_agency" id="we_dept_agency"
                                                    class="form-control group_na">
                                            </div>
                                            <div class="col-1">
                                                <input type="text" name="we_mo_salary" id="we_mo_salary"
                                                    class="form-control group_na">
                                            </div>
                                            <div class="col-1">
                                                <input type="text" name="we_sg" id="we_sg" class="form-control group_na">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="we_appointment_status" id="we_appointment_status"
                                                    class="form-control group_na">
                                            </div>
                                            <div class="col-1">
                                                <select id="we_govt_service" required name="we_govt_service"
                                                    class="form-select group_na">
                                                    <option value="" disabled selected value>--select--</option>
                                                    <option value='Y'>Yes</option>
                                                    <option value='N'>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="row">
                                        <div class="col-3">
                                            <br><button type="button" class="btn btn-primary add-row-button" name="we_addrow"
                                                id="we_addrow" onclick="addRow()">ADD ROW</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                break;
                            case "voluntary_work":
                                ?>
                                <!-- VOLUNTARY WORK -->
                                <div class="container-fluid">
                                    <div class="row mt-4 text-center align-items-end">
                                        <div class="col-4">
                                            <p class="ms-5">NAME & ADDRESS OF ORGANIZATION</p>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <p>INCLUSIVE DATES <br>(mm/dd/yy)</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>FROM</p>
                                                </div>
                                                <div class="col-6">
                                                    <p>TO</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <p>NUMBER OF HOURS</p>
                                        </div>
                                        <div class="col-4">
                                            <p>POSITION/NATURE OF WORK</p>
                                        </div>
                                    </div>
                                    <div class="row-container text-center">
                                        <div class="row row-row mt-3">
                                            <div class="col-4">
                                                <div class="checkbox-container">
                                                <div class="form-check me-2">
                                                        <input class="form-check-input" type="checkbox" id="null_vw"
                                                            onclick="checkNA(this)">
                                                        <label class="form-check-label">N/A</label>
                                                    </div>
                                                    <input type="text" name="vw_nameaddress" id="vw_nameaddress"
                                                        class="form-control group_na">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-6 px-1 mx-0">
                                                        <input type="date" required name="vw_from" id="vw_from"
                                                            class="form-control group_na">
                                                    </div>
                                                    <div class="col-6 px-1 mx-0">
                                                        <input type="date" required name="vw_to" id="vw_to"
                                                            class="form-control group_na">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <input type="number" name="vw_hrs" id="vw_hrs"
                                                    class="form-control group_na">
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="vw_position" id="vw_position"
                                                    class="form-control group_na">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <br><button type="button" class="btn btn-primary add-row-button" name="vw_addrow"
                                                id="vw_addrow" onclick="addRow()">ADD ROW</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                break;
                            case "lnd":
                                ?>
                                <!-- LEARNING AND DEVELOPMENT -->
                                <div class="container-fluid">
                                    <div class="row mt-4 text-center align-items-end">
                                        <div class="col-3">
                                            <p>
                                                TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>
                                                (Write in full)
                                            </p>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <p>INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>FROM</p>
                                                </div>
                                                <div class="col-6">
                                                    <p">TO</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <p>NUMBER OF HOURS</p>
                                        </div>
                                        <div class="col-3">
                                            <p>
                                                TYPE OF LD<br>(Managerial / Supervisory / Technical / etc.)
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p>CONDUCTED/SPONSORED BY (Write in full)</p>
                                        </div>

                                    </div>

                                    <div class="row-container">
                                        <div class="row row-row mt-3">
                                            <div class="col-3">
                                                <div class="checkbox-container">
                                                    <div class="form-check me-2">
                                                        <input class="form-check-input" type="checkbox" id="null_lnd"
                                                            onclick="checkNA(this)">
                                                        <label class="form-check-label">N/A</label>
                                                    </div>
                                                    <input type="text" name="lnd_title" id="lnd_title"
                                                        class="form-control group-na">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="date" required name="lnd_from" id="lnd_from"
                                                            class="form-control group-na">
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="date" required name="lnd_to" id="lnd_to"
                                                            class="form-control group-na">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <input type="number" name="lnd_hrs" id="lnd_hrs" class="form-control group-na">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" name="lnd_type" id="lnd_type" class="form-control group-na">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="lnd_conducted" id="lnd_conducted"
                                                    class="form-control group-na">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3 mt-4">
                                            <button type="button" class="btn btn-primary add-row-button" id="lnd_addrow"
                                                name="lnd_addrow" onclick="addRow()">ADD ROW</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                break;
                            case "other_info":
                                ?>
                                <!-- OTHER INFORMATION -->
                                <?php
                                break;
                            case "references":
                                ?>
                                <!-- REFERENCES -->
                                <?php
                                break;
                        }
                    }
                    ?>
                </form>

            </div>
        </div>

        <!-- <script type="text/javascript" src="pds_form_script.js"></script> -->
        <script type="text/javascript" src="personal_info_script.js"></script>
        <script type="text/javascript" src="fam_bg_script.js"></script>
        <script type="text/javascript" src="cs_eligibility_script.js"></script>
        <script type="text/javascript" src="work_exp_script.js"></script>
        <script type="text/javascript" src="voluntary_work_script.js"></script>
        <script type="text/javascript" src="lnd_script.js"></script>

</body>

</html>