<div class="container-fluid section-pi">

    <?php

    if (isset($_GET['action']) && ($_GET['action'] == "view" || $_GET['action'] == "edit")) {
        $employee_id = $_GET['employee_id'];

        // `employees` table
        $sql = "SELECT *
                FROM `employees`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);
        if (!empty($result)) {
            $row = $result[0];

            $emps = array("lastname", "firstname", "middlename", "nameext", "imgdir");
            foreach ($emps as $emp) {
                $$emp = $row['employee_' . $emp];
            }

            // `employee_details` table
            $sql = "SELECT *
                FROM `employee_details`
                WHERE `employee_id` = ?";
            $filter = array($employee_id);
            $result = query($conn, $sql, $filter);
            $row = $result[0];

            $emp_dets = array("bday", "birthplace", "sex", "civilstatus", "height", "weight", "bloodtype", "citizenship");
            foreach ($emp_dets as $dets) {
                $$dets = $row['emp_dets_' . $dets];
            }
            $country = lookup($conn, $row['citizenship_country'], 'countries', 'country_name', 'country_id');

            // `employee_numbers` table
            $sql = "SELECT *
                FROM `employee_numbers`
                WHERE `employee_id` = ?";
            $filter = array($employee_id);
            $result = query($conn, $sql, $filter);
            $row = $result[0];

            $emp_nos = array("gsis", "pagibig", "philhealth", "sss", "tin", "agency");
            foreach ($emp_nos as $nos) {
                $$nos = $row['emp_no_' . $nos];
            }

            // `employee_addresses` table
            $sql = "SELECT *
                FROM `employee_addresses`
                WHERE `employee_id` = ?";
            $filter = array($employee_id);
            $result = query($conn, $sql, $filter);

            $same_add = ($result[0]['emp_add_type'] == "B") ? " checked" : "";

            $address_types = array("residential_", "permanent_");
            $address_parts = array("province", "citymunicipality", "barangay", "subdivisionvillage", "street", "houseblocklot", "zipcode");

            foreach ($address_types as $key => $type) {
                foreach ($address_parts as $part) {

                    $table_name = match ($part) {
                        'province' => 'provinces',
                        'citymunicipality' => 'city_municipality',
                        'barangay' => 'barangays',
                        'subdivisionvillage' => 'subdivision_village',
                        'street' => 'streets',
                        'houseblocklot' => 'house_block_lot',
                        'zipcode' => 'zipcodes',
                    };

                    // for tables with foreign keys
                    $column_fk = '';
                    $data_fk = '';
                    if (in_array($table_name, ['barangays', 'zipcodes'])) {
                        $column_fk = 'citymunicipality_id';
                    } else if ($table_name == 'city_municipality') {
                        $column_fk = 'province_id';
                    }
                    $data_fk = $result[$key][$column_fk] ?? '';
                    $key = (count($result) == 1) ? 0 : $key;
                    $column_pk = (in_array($part, ['houseblocklot', 'zipcode'])) ? "{$part}_no" : "{$part}_name";

                    ${$type . $part} = lookup($conn, $result[$key]["{$part}_id"], $table_name, $column_pk, "{$part}_id", $column_fk, $data_fk);
                    // echo ${$type . $part} . "<br><br>";
                }
            }

            // `employee_contacts` table
            $sql = "SELECT *
                FROM `employee_contacts`
                WHERE `employee_id` = ?";
            $filter = array($employee_id);
            $result = query($conn, $sql, $filter);
            $row = $result[0];

            $emp_conts = array("tel", "mobile", "emailadd");
            foreach ($emp_conts as $cont) {
                $$cont = $row['emp_cont_' . $cont];
            }
        } else {
            echo '
                <script>
                    document.body.innerHTML = "";
                    alert("Error retrieving data. Please try again.");
                    history.back();
                </script>
            ';
            exit();
        }

        $action = $_GET['action'];
        echo '<input required hidden type="text" name="action" value="' . $action . '">';

        $employee_id = $_GET['employee_id'];
        echo '<input required hidden type="text" name="id" value="' . $employee_id . '">';
    } else {
        $pi_dets = array(
            "imgdir",
            "bday",
            "birthplace",
            "height",
            "weight",
            "bloodtype",
            "gsis",
            "pagibig",
            "philhealth",
            "sss",
            "tin",
            "agency",
            "tel",
            "mobile",
            "emailadd"
        );
        $address_types = array("residential_", "permanent_");
        $address_parts = array("barangay", "subdivisionvillage", "street", "houseblocklot", "zipcode");

        foreach ($address_types as $key => $type) {
            foreach ($address_parts as $part) {
                array_push($pi_dets, "{$type}{$part}");
            }
        }

        foreach ($pi_dets as $var) {
            $$var = "";
        }
        $country = "N/A";
        
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var addEmployee = document.querySelectorAll('.add-employee');
                addEmployee.forEach(function (detail) {
                    detail.disabled = true;
                });
            });
        </script>
        ";
    }

    if (isset($_GET['office'])) {
        $office = $_GET['office'];
        echo '<input required hidden type="text" name="office" value="' . $office . '">';
    }
    ?>
    <!-- EMPLOYEE'S FULL NAME -->
    <div class="row mt-5">

        <div class="col mx-2">
            <label for="name_last">SURNAME</label><br>
            <input type="text" required name="name_last" id="name_last"
                class="form-control uppercase input test add-employee" value="<?php echo $lastname; ?>">
        </div>
        <div class="col mx-2">
            <label for="name_first">FIRST NAME</label><br>
            <input type="text" required name="name_first" id="name_first"
                class="form-control uppercase input add-employee" value="<?php echo $firstname; ?>">
        </div>
        <div class="col mx-2">
            <label for="name_middle">MIDDLE NAME</label><br>
            <div class="checkbox-container">
                <input type="text" required name="name_middle" id="name_middle"
                    class="form-control uppercase input add-employee" value="<?php echo $middlename; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input add-employee" type="checkbox" id="null_middle"
                        data-target="null_middle">
                    <label class="form-check-label" for="null_middle">N/A</label>
                </div>
            </div>
        </div>
        <div class="col-2 mx-2">
            <label for="name_ext">NAME EXTENSION</label><br>
            <div class="checkbox-container">
                <input type="text" required name="name_ext" id="name_ext"
                    class="form-control uppercase input add-employee" value="<?php echo $nameext; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input add-employee" type="checkbox" id="null_ext" data-target="null_ext">
                    <label class="form-check-label" for="null_ext">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="birth_date">DATE OF BIRTH</label><br>
            <input type="date" required name="birth_date" id="birth_date" class="form-control uppercase input"
                value="<?php echo $bday; ?>">

        </div>
        <div class="col mx-2">
            <label for="birth_place">PLACE OF BIRTH</label><br>
            <input type="text" required name="birth_place" id="birth_place" class="form-control uppercase input"
                value="<?php echo $birthplace; ?>">
        </div>
        <div class="col mx-2">
            <label for="sex">SEX</label><br>
            <select id="sex" required name="sex" class="form-select input">
                <option value="" disabled<?php echo isset($sex) ? "" : " selected"; ?>>--SELECT--</option>
                <option value='M' <?php echo (isset($sex) && $sex == "M") ? " selected" : ""; ?>>MALE</option>";
                <option value='F' <?php echo (isset($sex) && $sex == "F") ? " selected" : ""; ?>>FEMALE</option>";
            </select>
        </div>
        <div class="col mx-2">
            <label for="civilstatus">CIVIL STATUS</label><br>
            <select id="civilstatus" required name="civilstatus" class="form-select input">
                <option value="" disabled selected value<?php echo isset($civilstatus) ? "" : " selected"; ?>>--SELECT--
                </option>
                <option value='S' <?php echo (isset($civilstatus) && $civilstatus == "S") ? " selected" : ""; ?>>SINGLE
                </option>";
                <option value='M' <?php echo (isset($civilstatus) && $civilstatus == "M") ? " selected" : ""; ?>>MARRIED
                </option>";
                <option value='C' <?php echo (isset($civilstatus) && $civilstatus == "C") ? " selected" : ""; ?>>COMMON
                    LAW</option>";
                <option value='W' <?php echo (isset($civilstatus) && $civilstatus == "W") ? " selected" : ""; ?>>WIDOWED
                </option>";
                <option value='H' <?php echo (isset($civilstatus) && $civilstatus == "H") ? " selected" : ""; ?>>SEPARATED
                </option>";
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="height">HEIGHT (m)</label><br>
            <input type="number" required name="height" id="height" class="form-control input" min="1" step="0.01"
                max="2" value="<?php echo $height; ?>">
        </div>
        <div class="col mx-2">
            <label for="weight">WEIGHT (kg)</label><br>
            <input type="number" required name="weight" id="weight" class="form-control input" maxlength="3"
                value="<?php echo $weight; ?>">
        </div>
        <div class="col mx-2">
            <label for="bloodtype">BLOOD TYPE</label><br>
            <input type="text" required name="bloodtype" id="bloodtype" list="blood_type"
                class="form-control uppercase input" value="<?php echo $bloodtype; ?>">
            <datalist id="blood_type">
                <?php
                $result = query($conn, "SELECT * FROM  `bloodtype`");
                foreach ($result as $value) {
                    echo '<option class="uppercase" value="' . $value['bloodtype_name'] . '">';
                }
                ?>
            </datalist>

        </div>
    </div>

    <!-- EMPLOYEE'S ID'S -->
    <div class="row mt-3">
        <div class="col mx-2">
            <label for="gsis">GSIS ID NO.</label><br>
            <input type="text" required name="id_gsis" id="gsis" class="form-control uppercase input"
                value="<?php echo $gsis; ?>">
        </div>
        <div class="col mx-2">
            <label for="pagibig">PAG-IBIG ID NO.</label><br>
            <input type="text" required name="id_pagibig" id="pagibig" class="form-control uppercase input"
                value="<?php echo $pagibig; ?>">
        </div>
        <div class="col mx-2">
            <label for="philhealth">PHILHEALTH NO.</label><br>
            <input type="text" required name="id_philhealth" id="philhealth"
                class="form-control uppercase input uppercase" value="<?php echo $philhealth; ?>">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="sss">SSS NO.</label><br>
            <input type="text" required name="id_sss" id="sss" class="form-control uppercase input"
                value="<?php echo $sss; ?>">
        </div>
        <div class="col mx-2">
            <label for="tin">TIN NO.</label><br>
            <input type="text" required name="id_tin" id="tin" class="form-control uppercase input"
                value="<?php echo $tin; ?>">
        </div>
        <div class="col mx-2">
            <label for="employee_no">AGENCY EMPLOYEE NO.</label><br>
            <input type="text" required name="id_agency" id="employee_no" class="form-control uppercase input"
                value="<?php echo $agency; ?>">
        </div>
    </div>

    <!-- EMPLOYEE'S CITIZENSHIP -->
    <div class="row mt-3">
        <div class="col mx-2">
            <label for="citizenship">CITIZENSHIP</label><br>
            <select id="citizenship" required name="citizenship" class="form-select input">
                <option value="" disabled<?php echo isset($citizenship) ? "" : " selected"; ?>>--SELECT--</option>
                <option value='F' <?php echo (isset($citizenship) && $citizenship == "F") ? " selected" : ""; ?>>FILIPINO
                </option>";
                <option value='D' <?php echo (isset($citizenship) && $citizenship != "F") ? " selected" : ""; ?>>DUAL
                    CITIZENSHIP</option>";
            </select>
        </div>
        <div class="col mx-2">
            <label for="citizenship_by">CITIZENSHIP BY</label><br>
            <select id="citizenship_by" required name="citizenship_by" class="form-select input" disabled>
                <option value="" disabled>--SELECT--</option>
                <option value="F" hidden<?php echo isset($citizenship) ? "" : " selected"; ?>>N/A</option>
                <option value='B' <?php echo (isset($citizenship) && $citizenship == "B") ? " selected" : ""; ?>>BIRTH
                </option>";
                <option value='N' <?php echo (isset($citizenship) && $citizenship == "N") ? " selected" : ""; ?>>
                    NATURALIZATION</option>";
            </select>
        </div>
        <div class="col mx-2">
            <label for="citizenship_country">If Holder of Dual Citizenship, please indicate
                country</label><br>
            <input type="text" required name="citizenship_country" id="citizenship_country"
                class="form-control uppercase input" value="<?php echo $country; ?>" disabled>
        </div>
    </div>

    <!-- RESIDENTIAL ADDRESS -->
    <h5 class="mt-5">RESIDENTIAL ADDRESS</h5>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="radd_province">PROVINCE</label>
            <select id="radd_province" required name="radd_province" class="form-select uppercase input">
                <option value="" disabled<?php echo isset($residential_province) ? "" : " selected"; ?>>--SELECT--
                </option>
                <?php
                $list_province = query($conn, "SELECT * FROM `provinces`");
                foreach ($list_province as $key => $row) {
                    $prov_id = $row['province_id'];
                    $prov_name = $row['province_name'];
                    $selected = (isset($residential_province) && $residential_province == $prov_name) ? " selected" : "";
                    echo "<option class='uppercase' value='" . $prov_id . "' . $selected>" . $prov_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="radd_citymunicipality">CITY/MUNICIPALITY</label>
            <select id="radd_citymunicipality" required name="radd_citymunicipality"
                class="form-select uppercase input">
                <option value="" disabled<?php echo isset($residential_citymunicipality) ? "" : " selected"; ?>>
                    --SELECT--</option>
                <?php
                $list_citymunicipality = query($conn, "SELECT * FROM `city_municipality` ORDER BY `citymunicipality_name` ASC");
                foreach ($list_citymunicipality as $key => $row) {
                    $cm_id = $row['citymunicipality_id'];
                    $cm_name = $row['citymunicipality_name'];
                    $selected = (isset($residential_citymunicipality) && $residential_citymunicipality == $cm_name) ? " selected" : "";
                    echo "<option class='uppercase' value='" . $cm_id . "' . $selected>" . $cm_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="radd_barangay">BARANGAY</label>
            <input type="text" required name="radd_barangay" id="radd_barangay" list="r_barangays"
                class="form-control uppercase input" value="<?php echo $residential_barangay; ?>">
            <datalist id="r_barangays">
                <?php
                $result = query($conn, "SELECT * FROM  `barangays`");
                foreach ($result as $value) {
                    echo '<option class="uppercase" value="' . $value['barangay_name'] . '">';
                }
                ?>
            </datalist>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="radd_subdivisionvillage">SUBDIVISION/VILLAGE</label><br>
            <div class="checkbox-container">
                <input type="text" required name="radd_subdivisionvillage" id="radd_subdivisionvillage"
                    list="r_subdivision_village" class="form-control uppercase input"
                    value="<?php echo $residential_subdivisionvillage; ?>">
                <datalist id="r_subdivision_village">
                    <?php
                    $result = query($conn, "SELECT * FROM  `subdivision_village`");
                    foreach ($result as $value) {
                        echo '<option class="uppercase" value="' . $value['subdivisionvillage_name'] . '">';
                    }
                    ?>
                </datalist>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_rsv" data-target="null_rsv">
                    <label class="form-check-label" for="null_rsv">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="radd_street">STREET</label><br>
            <div class="checkbox-container">
                <input type="text" required name="radd_street" id="radd_street" list="r_streets"
                    class="form-control uppercase input" value="<?php echo $residential_street; ?>">
                <datalist id="r_streets">
                    <?php
                    $result = query($conn, "SELECT * FROM  `streets`");
                    foreach ($result as $value) {
                        echo '<option class="uppercase" value="' . $value['street_name'] . '">';
                    }
                    ?>
                </datalist>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_rst" data-target="null_rst">
                    <label class="form-check-label" for="null_rst">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="radd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
            <div class="checkbox-container">
                <input type="text" required name="radd_houseblocklot" id="radd_houseblocklot" list="r_house_block_lot"
                    class="form-control uppercase input" value="<?php echo $residential_houseblocklot; ?>">
                <datalist id="r_house_block_lot">
                    <?php
                    $result = query($conn, "SELECT * FROM  `house_block_lot`");
                    foreach ($result as $value) {
                        echo '<option class="uppercase" value="' . $value['houseblocklot_no'] . '">';
                    }
                    ?>
                </datalist>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_rhbl" data-target="null_rhbl">
                    <label class="form-check-label" for="null_rhbl">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3 mx-2">
            <label for="radd_zipcode">ZIPCODE</label>
            <input type="number" required name="radd_zipcode" id="radd_zipcode" list="r_zipcodes"
                class="form-control uppercase input" min="400" max="9900" value="<?php echo $residential_zipcode; ?>">
            <datalist id="r_zipcodes">
                <?php
                $result = query($conn, "SELECT * FROM  `zipcodes`");
                foreach ($result as $value) {
                    echo '<option class="uppercase" value="' . $value['zipcode_no'] . '">';
                }
                ?>
            </datalist>
        </div>
    </div>

    <!-- PERMANENT ADDRESS -->
    <div class="mt-5">
        <h5 style="display: inline">PERMANENT ADDRESS</h5>
        <div class="form-check form-check-inline ms-2">
            <input class="form-check-input" type="checkbox" id="same_add" name="same_add" value="true"
                data-target="same_add" <?php echo (isset($same_add)) ? $same_add : ""; ?>>
            <label class="form-check-label" for="same_add">Same as the Residential Address</label>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="padd_province">PROVINCE</label>
            <select id="padd_province" required name="padd_province" class="form-select uppercase input">
                <option value="" disabled<?php echo isset($permanent_province) ? "" : " selected"; ?>>--SELECT--
                </option>
                <?php
                $list_province = query($conn, "SELECT * FROM `provinces`");
                foreach ($list_province as $key => $row) {
                    $prov_id = $row['province_id'];
                    $prov_name = $row['province_name'];
                    $selected = (isset($permanent_province) && $permanent_province == $prov_name) ? " selected" : "";
                    echo "<option class='uppercase' value='" . $prov_id . "' . $selected>" . $prov_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="padd_citymunicipality">CITY/MUNICIPALITY</label>
            <select id="padd_citymunicipality" required name="padd_citymunicipality"
                class="form-select uppercase input">
                <option value="" disabled<?php echo isset($permanent_citymunicipality) ? "" : " selected"; ?>>--SELECT--
                </option>
                <?php
                $list_citymunicipality = query($conn, "SELECT * FROM `city_municipality` ORDER BY `citymunicipality_name` ASC");
                foreach ($list_citymunicipality as $key => $row) {
                    $cm_id = $row['citymunicipality_id'];
                    $cm_name = $row['citymunicipality_name'];
                    $selected = (isset($permanent_citymunicipality) && $permanent_citymunicipality == $cm_name) ? " selected" : "";
                    echo "<option class='uppercase' value='" . $cm_id . "' . $selected>" . $cm_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="padd_barangay">BARANGAY</label>
            <input type="text" required name="padd_barangay" id="padd_barangay" list="p_barangays"
                class="form-control uppercase input" value="<?php echo $permanent_barangay; ?>">
            <datalist id="p_barangays">
                <?php
                $result = query($conn, "SELECT * FROM  `barangays`");
                foreach ($result as $value) {
                    echo '<option class="uppercase" value="' . $value['barangay_name'] . '">';
                }
                ?>
            </datalist>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="padd_subdivisionvillage">SUBDIVISION/VILLAGE</label><br>
            <div class="checkbox-container">
                <input type="text" required name="padd_subdivisionvillage" id="padd_subdivisionvillage"
                    list="p_subdivision_village" class="form-control uppercase input"
                    value="<?php echo $permanent_subdivisionvillage; ?>">
                <datalist id="p_subdivision_village">
                    <?php
                    $result = query($conn, "SELECT * FROM  `subdivision_village`");
                    foreach ($result as $value) {
                        echo '<option class="uppercase" value="' . $value['subdivisionvillage_name'] . '">';
                    }
                    ?>
                </datalist>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_psv" data-target="null_psv">
                    <label class="form-check-label" for="null_psv">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="padd_street">STREET</label><br>
            <div class="checkbox-container">
                <input type="text" required name="padd_street" id="padd_street" list="p_streets"
                    class="form-control uppercase input" value="<?php echo $permanent_street; ?>">
                <datalist id="p_streets">
                    <?php
                    $result = query($conn, "SELECT * FROM  `streets`");
                    foreach ($result as $value) {
                        echo '<option class="uppercase" value="' . $value['street_name'] . '">';
                    }
                    ?>
                </datalist>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_pst" data-target="null_pst">
                    <label class="form-check-label" for="null_pst">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="padd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
            <div class="checkbox-container">
                <input type="text" required name="padd_houseblocklot" id="padd_houseblocklot" list="p_house_block_lot"
                    class="form-control uppercase input" value="<?php echo $permanent_houseblocklot; ?>">
                <datalist id="p_house_block_lot">
                    <?php
                    $result = query($conn, "SELECT * FROM  `house_block_lot`");
                    foreach ($result as $value) {
                        echo '<option class="uppercase" value="' . $value['houseblocklot_no'] . '">';
                    }
                    ?>
                </datalist>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_phbl" data-target="null_phbl">
                    <label class="form-check-label" for="null_phbl">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3 mx-2">
            <label for="padd_zipcode">ZIPCODE</label>
            <input type="number" required name="padd_zipcode" id="padd_zipcode" list="p_zipcodes"
                class="form-control uppercase input" min="400" max="9900" value="<?php echo $permanent_zipcode; ?>">
            <datalist id="p_zipcodes">
                <?php
                $result = query($conn, "SELECT * FROM  `zipcodes`");
                foreach ($result as $value) {
                    echo '<option class="uppercase" value="' . $value['zipcode_no'] . '">';
                }
                ?>
            </datalist>
        </div>
    </div>

    <!-- CONTACT DETAILS -->
    <div class="row mt-5">
        <div class="col mx-2">
            <label for="no_tel">TELEPHONE NO.</label><br>
            <div class="checkbox-container">
                <input type="tel" required name="no_tel" id="no_tel" class="form-control uppercase input"
                    value="<?php echo $tel; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_telno" data-target="null_telno">
                    <label class="form-check-label" for="null_telno">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="no_mobile">MOBILE NO.</label><br>
            <input type="tel" required name="no_mobile" id="no_mobile" class="form-control uppercase input"
                maxlength="11" value="<?php echo $mobile; ?>">
        </div>
        <div class="col mx-2">
            <label for="emailadd">EMAIL ADDRESS</label><br>
            <div class="checkbox-container">
                <input type="email" required name="emailadd" id="emailadd" class="form-control uppercase input"
                    style="text-transform: lowercase;" value="<?php echo $emailadd; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_emailadd" data-target="null_emailadd">
                    <label class="form-check-label" for="null_emailadd">N/A</label>
                </div>
            </div>
        </div>

    </div>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_pi">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right button-nav" data-bs-slide="next"
        id="nextButton_pi">
        <strong>NEXT</strong>
    </button>

    <!-- SUBMIT BUTTON -->
    <!-- <button type="submit" class="btn btn-primary mt-5 mx-1 button-right">
        <strong>SUBMIT</strong>
    </button> -->

</div>

<script>
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll("#null_middle, #null_ext, #null_rsv, #null_rst, #null_rhbl, #same_add, #null_psv, #null_pst, #null_phbl, #null_telno, #null_emailadd");
        var originalSelectOptions = {};

        //List of specific select elements IDs to be cleared and restored
        var specificSelectIds = ["sex", "civilstatus", "citizenship", "citizenship_by", "radd_province", "radd_citymunicipality", "padd_province", "padd_citymunicipality"];

        // Store the original options of each specific select element
        specificSelectIds.forEach((selectId) => {
            var select = document.getElementById(selectId);
            if (select) {
                originalSelectOptions[selectId] = Array.from(select.options).map((option) => {
                    return { value: option.value, text: option.text };
                });
            }
        });

        document.getElementById('clearButton_pi').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.input');
            inputs.forEach(function (input) {
                // Check if the input id is citizenship_country and its value is "N/A"
                if (!(input.id === 'citizenship_country' && input.value === 'N/A')) {
                    input.value = '';
                    input.disabled = false;
                }
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Restore original select options for specific selects
            specificSelectIds.forEach((selectId) => {
                var select = document.getElementById(selectId);
                if (select) {
                    select.disabled = false;
                    select.innerHTML = '';
                    originalSelectOptions[selectId].forEach((optionData) => {
                        var option = document.createElement('option');
                        option.text = optionData.text;
                        option.value = optionData.value;
                        select.add(option);
                    });
                }
            });
        });
    });

    //========================= Next Button =====================================
    // Document ready function
    document.addEventListener('DOMContentLoaded', function () {
        var carouselElement = document.querySelector('#carouselExample');
        var carousel = new bootstrap.Carousel(carouselElement);


        // Move to the next slide only if the form is filled out
        document.querySelector('#nextButton_pi').addEventListener('click', function () {
            var addEmployee = document.querySelectorAll('.add-employee');
            addEmployee.forEach(function (detail) {
                detail.disabled = false;
            });

            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.input');

            // Check if all input fields in the active slide are filled out
            var allFilled = true;
            inputs.forEach(function (input) {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });

            // If all input fields are filled out, move to the next carousel item
            if (allFilled) {
                carousel.next();
            } else {
                alert("Please fill out all input fields before proceeding.");
            }
        });
    });

    telTypeArray = ["no_tel"];
    emailTypeArray = ["emailadd"];

    // ======================= N/A disable =======================
    function setupNullInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        // if retrieved value is N/A
        if (input.value == "N/A") {
            input.removeAttribute("style");
            checkbox.checked = true;
            input.disabled = true;
        }

        // if checkbox is toggled
        checkbox.addEventListener("change", function () {
            if (this.checked) {

                input.removeAttribute("style");
                input.type = "text";
                input.value = "N/A";
                input.disabled = true;

            } else {

                input.id == "no_tel" ? input.type = "tel" :
                    input.id == "emailadd" ? input.type = "email" :
                        input.type = "text";

                input.type == "email" ? input.setAttribute("style", "text-transform: lowercase;") : '';
                input.value = "";
                input.disabled = false;
            }
        });

        // if N/A is inputted
        input.addEventListener("input", function () {
            if (this.value.trim().toLowerCase() === "n/a") {
                input.removeAttribute("style");
                checkbox.checked = true;
                this.disabled = true;
            }
        });
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
            destination.value = "";
            checkbox.checked = false;
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

    function filter(selectedValue, input_tofilter, tableName, foreignKeyColumn, zipcode = null) {

        const value = input_tofilter.value;

        // Clear current options in input_tofilter
        if (tableName == 'city_municipality') {
            input_tofilter.innerHTML = '<option value="">--SELECT--</option>';
        } else {
            input_tofilter.innerHTML = '<option value="">';
        }

        if (selectedValue) {
            // Make an AJAX request to test.php
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'filter_input.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const suboptions = JSON.parse(xhr.responseText);
                    let correctZipcode = false;

                    // Add new options to input_tofilter
                    suboptions.forEach(function (option) {
                        const newOption = document.createElement('option');
                        newOption.value = option.value;
                        newOption.classList.add("uppercase");
                        if (typeof option.text !== 'undefined') {
                            newOption.text = option.text;
                        }
                        if (value != "" && newOption.value == value) {
                            newOption.selected = true;
                        }
                        if (zipcode != null && newOption.value == zipcode.value) {
                            correctZipcode = true;
                        }
                        input_tofilter.appendChild(newOption);
                    });

                    if (!correctZipcode && zipcode != null) {
                        zipcode.value = "";
                    }

                }
            };

            xhr.send('selectedValue=' + encodeURIComponent(selectedValue) + '&tableName=' + encodeURIComponent(tableName) + '&foreignKeyColumn=' + encodeURIComponent(foreignKeyColumn));
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const radd_province = document.getElementById('radd_province');
        const radd_citymunicipality = document.getElementById('radd_citymunicipality');
        const radd_barangay = document.getElementById('r_barangays');
        const radd_zipcode = document.getElementById('radd_zipcode');
        const r_zipcode = document.getElementById('r_zipcodes');
        const padd_province = document.getElementById('padd_province');
        const padd_citymunicipality = document.getElementById('padd_citymunicipality');
        const padd_barangay = document.getElementById('p_barangays');
        const padd_zipcode = document.getElementById('padd_zipcode');
        const p_zipcode = document.getElementById('p_zipcodes');

        radd_province.addEventListener('change', function () {
            const selectedValue = this.value;
            filter(selectedValue, radd_citymunicipality, 'city_municipality', 'province_id');
        });

        radd_citymunicipality.addEventListener('change', function () {
            const selectedValue = this.value;
            filter(selectedValue, radd_barangay, 'barangays', 'citymunicipality_id');
            filter(selectedValue, r_zipcode, 'zipcodes', 'citymunicipality_id', radd_zipcode);
        });

        padd_province.addEventListener('change', function () {
            const selectedValue = this.value;
            filter(selectedValue, padd_citymunicipality, 'city_municipality', 'province_id');
        });

        padd_citymunicipality.addEventListener('change', function () {
            const selectedValue = this.value;
            filter(selectedValue, padd_barangay, 'barangays', 'citymunicipality_id');
            filter(selectedValue, p_zipcode, 'zipcodes', 'citymunicipality_id', padd_zipcode);
        });
    });
</script>