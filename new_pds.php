<?php
include_once "db_conn.php";

if (isset($_POST["name_last"]) || isset($_POST["spouse_name_last"])) {

    echo "PERSONAL INFORMATION<br>";
    //transfers value of posted variables to local variables
    $n_pi_name_last = $_POST['name_last'];
    $n_pi_name_first = $_POST['name_first'];
    $n_pi_name_middle = $_POST['name_middle'] ?? "N/A";
    $n_pi_name_ext = $_POST['name_ext'] ?? "N/A";

    echo "Employee: $n_pi_name_first $n_pi_name_middle $n_pi_name_last $n_pi_name_ext<br>";

    // prepare arguments for insert function
    $table = 'employees';
    $fields = array(
        // position_id should be added anywhere after work experience
        // position_id can be null, but make sure to update it after work experience
        'employee_lastname' => $n_pi_name_last,
        'employee_firstname' => $n_pi_name_first,
        'employee_middlename' => $n_pi_name_middle,
        'employee_nameext' => $n_pi_name_ext,
    );

    // insert($conn, $table, $fields);

    // // retrieve employee ID from db
    $sql = "SELECT `employee_id` 
            FROM `employees` 
            WHERE `employee_lastname` = '{$n_pi_name_last}'
            AND `employee_firstname` = '{$n_pi_name_first}'
            AND `employee_middlename` = '{$n_pi_name_middle}'
            AND `employee_nameext` = '{$n_pi_name_ext}'"; //change {$n_pi_name} to ? once finished
    // $filter = array($n_pi_name_last, $n_pi_name_first, $n_pi_name_middle,$n_pi_name_ext) 
    // $result = query($conn, $sql, $filter);
    // $row = $result[0];
    // $employee_id = $row['employee_id'];
    $employee_id = $sql;

    //transfers value of posted variables to local variables
    $n_pi_birth_date = $_POST['birth_date'];
    $n_pi_birth_place = $_POST['birth_place'];
    $n_pi_sex = $_POST['sex'] ?? "N/A";
    $n_pi_civilstatus = $_POST['civilstatus'] ?? "N/A";
    $n_pi_height = $_POST['height'];
    $n_pi_weight = $_POST['weight'];
    $n_pi_bloodtype = $_POST['bloodtype'] ?? "N/A";
    // $n_pi_citizenship = $_POST['citizenship'];
    $n_pi_citizenship_by = $_POST['citizenship_by'] ?? "F";
    $n_pi_citizenship_country = $_POST['citizenship_country'] ?? "N/A";

    function lookupId($conn, $name, $table, $column_pk, $column_name, $column_fk, $column_fk_idData)
    {
        // =============================== GLOSSARY OF ARGUMENTS ===============================
        // $name is the posted value (ex: `4503`)
        // $table is the name of the table (ex: `zipcodes` table)
        // $column_pk is the column name of the IDs (ex: `zipcode_id` column)
        // $column_name is the column name of the names (ex: `zipcode_no` column)
        // $column_fk is the column name of the foreign key (ex: `citymunicipality_id` column)
        // $column_fk_idData is the data inside the column name of the foreign key (ex: `4`)
        // =====================================================================================

        $finished = false;
        while ($finished == false) {
            // see if $name exists in $table table
            $keys = "`{$column_pk}`";
            if ($column_fk != "") {
                $keys .= ", `{$column_fk}`";
            }
            $sql = "SELECT {$keys}
                FROM `{$table}`
                WHERE `{$column_name}` = '{$name}'"; //change {$name} to ? once finished
            return $sql;
            // $filter = array($name);
            // $result = query($conn, $sql, $filter);

            // if (!empty($result)) {
            //     $row = $result[0];
            //     $finished = true;
            //     return $row[$column_pk];
            // } else {
            //     // insert $name to $table table
            //     // $table = $table;
            //     $fields = array($column_name => $name);
            //     if (in_array($column_fk, ['citymunicipality_id', 'province_id'])) {
            //         $fields[$column_fk] = $column_fk_idData;
            //     }
            //     insert($conn, $table, $fields);
            // }
        }
    }

    if ($n_pi_citizenship_country == "N/A") {
        $citizenship_country = $n_pi_citizenship_country;
    } else {
        $citizenship_country = lookupId($conn, $n_pi_citizenship_country, 'countries', 'country_id', 'country_name', '', '');
    }

    echo "<br>
        Employee ID: $employee_id<br>
        Date of Birth: $n_pi_birth_date<br>
        Place of Birth: $n_pi_birth_place<br>
        Sex: $n_pi_sex<br>
        Civilstatus: $n_pi_civilstatus<br>
        Height: $n_pi_height m.<br>
        Weight: $n_pi_weight kg.<br>
        Bloodtype: $n_pi_bloodtype<br>
        Citizenship: $n_pi_citizenship_by ($citizenship_country)<br>
    ";

    // prepare arguments for insert function
    $table = 'employee_details';
    $fields = array(
        // 'employee_id' => $employee_id,
        'emp_dets_bday' => $n_pi_birth_date,
        'emp_dets_birthplace' => $n_pi_birth_place,
        'emp_dets_sex' => $n_pi_sex,
        'emp_dets_civilstatus' => $n_pi_civilstatus,
        'emp_dets_height' => $n_pi_height,
        'emp_dets_weight' => $n_pi_weight,
        'emp_dets_bloodtype' => $n_pi_bloodtype,
        'emp_dets_citizenship' => $n_pi_citizenship_by,
        'citizenship_country' => $citizenship_country,
    );
    // insert($conn, $table, $fields);

    //transfers value of posted variables to local variables
    $n_pi_id_gsis = strtoupper($_POST['id_gsis']);
    $n_pi_id_pagibig = strtoupper($_POST['id_pagibig']);
    $n_pi_id_philhealth = strtoupper($_POST['id_philhealth']);
    $n_pi_id_sss = strtoupper($_POST['id_sss']);
    $n_pi_id_tin = strtoupper($_POST['id_tin']);
    $n_pi_id_agency = strtoupper($_POST['id_agency']);

    echo "<br>
        Employee ID: $employee_id<br>
        GSIS ID No.: $n_pi_id_gsis<br>
        PAGIBIG ID No.: $n_pi_id_pagibig<br>
        PhilHealth No.: $n_pi_id_philhealth<br>
        SSS No.: $n_pi_id_sss<br>
        TIN No.: $n_pi_id_tin<br>
        Agency Employee No.: $n_pi_id_agency<br>
    ";

    // prepare arguments for insert function
    $table = 'employee_numbers';
    $fields = array(
        // 'employee_id' => $employee_id,
        'emp_no_gsis' => $n_pi_id_gsis,
        'emp_no_pagibig' => $n_pi_id_pagibig,
        'emp_no_philhealth' => $n_pi_id_philhealth,
        'emp_no_sss' => $n_pi_id_sss,
        'emp_no_tin' => $n_pi_id_tin,
        'emp_no_agency' => $n_pi_id_agency,
    );
    // insert($conn, $table, $fields);

    //transfers value of posted variables to local variables
    $n_pi_radd_province = $_POST['radd_province'];
    $n_pi_radd_citymunicipality = $_POST['radd_citymunicipality'];
    $n_pi_radd_barangay = $_POST['radd_barangay'];
    $n_pi_radd_subdivisionvillage = $_POST['radd_subdivisionvillage'] ?? "N/A";
    $n_pi_radd_street = $_POST['radd_street'] ?? "N/A";
    $n_pi_radd_houseblocklot = $_POST['radd_houseblocklot'] ?? "N/A";
    $n_pi_radd_zipcode = $_POST['radd_zipcode'];

    $residential_province = '';
    $residential_citymunicipality = '';

    $both_province = '';
    $both_citymunicipality = '';
    $both_barangay = '';
    $both_subdivisionvillage = '';
    $both_street = '';
    $both_houseblocklot = '';
    $both_zipcode = '';

    $residential_province = '';
    $residential_citymunicipality = '';
    $residential_barangay = '';
    $residential_subdivisionvillage = '';
    $residential_street = '';
    $residential_houseblocklot = '';
    $residential_zipcode = '';

    $permanent_province = '';
    $permanent_citymunicipality = '';
    $permanent_barangay = '';
    $permanent_subdivisionvillage = '';
    $permanent_street = '';
    $permanent_houseblocklot = '';
    $permanent_zipcode = '';


    function lookupEachArea($conn, $add_type, $posted_areas, $residential_citymunicipality, $residential_province)
    {
        $areas = array('province', 'citymunicipality', 'barangay', 'subdivisionvillage', 'street', 'houseblocklot', 'zipcode');

        foreach ($areas as $index => $area) {

            $var_name = match ($add_type) {
                'B' => "both_{$area}",
                'R' => "residential_{$area}",
                'P' => "permanent_{$area}",
            };

            global $$var_name;

            $table_name = match ($area) {
                'province' => 'provinces',
                'citymunicipality' => 'city_municipality',
                'barangay' => 'barangays',
                'subdivisionvillage' => 'subdivision_village',
                'street' => 'streets',
                'houseblocklot' => 'house_block_lot',
                'zipcode' => 'zipcodes',
            };

            $column_name = (in_array($area, ['houseblocklot', 'zipcode'])) ? "{$area}_no" : "{$area}_name";

            // if barangays table and zipcode table, citymunicipality then may foreign keys
            if (in_array($table_name, ['barangays', 'zipcodes'])) {
                $column_fk = 'citymunicipality_id';
                $data_fk = $residential_citymunicipality ?? '';
            } else if ($table_name == 'city_municipality') {
                $column_fk = 'province_id';
                $data_fk = $residential_province ?? '';
            } else {
                $column_fk = '';
                $data_fk = '';
            }

            $$var_name = lookupId($conn, $posted_areas[$index], $table_name, "{$area}_id", $column_name, $column_fk, $data_fk);
        }
    }

    $same_add = $_POST['same_add'] ?? "false";
    $posted_areas = array($n_pi_radd_province, $n_pi_radd_citymunicipality, $n_pi_radd_barangay, $n_pi_radd_subdivisionvillage, $n_pi_radd_street, $n_pi_radd_houseblocklot, $n_pi_radd_zipcode);

    // if same add checkbox is checked then change emp_add_type of R to B, otherwise P
    if ($same_add == "true") {

        $add_type = "B";
        lookupEachArea($conn, $add_type, $posted_areas, $residential_citymunicipality, $residential_province);

        echo "<br>
            Employee ID: $employee_id<br>
            RESIDENTIAL & PERMANENT ADDRESS<br>
            Province: $both_province<br>
            City/Municipality: $both_citymunicipality<br>
            Barangay: $both_barangay<br>
            Subdivision/Village: $both_subdivisionvillage<br>
            Street: $both_street<br>
            House/Block/Lot No.: $both_houseblocklot<br>
            Zipcode: $both_zipcode<br>
        ";

        // prepare arguments for insert function
        $table = 'employee_addresses';
        $fields = array(
            // 'employee_id' => $employee_id,
            'province_id' => $both_province,
            'citymunicipality_id' => $both_citymunicipality,
            'barangay_id' => $both_barangay,
            'subdivisionvillage_id' => $both_subdivisionvillage,
            'street_id' => $both_street,
            'houseblocklot_id' => $both_houseblocklot,
            'zipcode_id' => $both_zipcode,
            'emp_add_type' => $add_type,
        );
        // insert($conn, $table, $fields);
    } else {

        $add_type = "R";
        lookupEachArea($conn, $add_type, $posted_areas, $residential_citymunicipality, $residential_province);

        echo "<br>
            Employee ID: $employee_id<br>
            RESIDENTIAL ADDRESS<br>
            Province: $residential_province<br>
            City/Municipality: $residential_citymunicipality<br>
            Barangay: $residential_barangay<br>
            Subdivision/Village: $residential_subdivisionvillage<br>
            Street: $residential_street<br>
            House/Block/Lot No.: $residential_houseblocklot<br>
            Zipcode: $residential_zipcode<br>
        ";

        // prepare arguments for insert function
        $table = 'employee_addresses';
        $fields = array(
            // 'employee_id' => $employee_id,
            'province_id' => $residential_province,
            'citymunicipality_id' => $residential_citymunicipality,
            'barangay_id' => $residential_barangay,
            'subdivisionvillage_id' => $residential_subdivisionvillage,
            'street_id' => $residential_street,
            'houseblocklot_id' => $residential_houseblocklot,
            'zipcode_id' => $residential_zipcode,
            'emp_add_type' => $add_type,
        );
        // insert($conn, $table, $fields);

        //transfers value of posted variables to local variables
        $n_pi_padd_province = $_POST['padd_province'];
        $n_pi_padd_citymunicipality = $_POST['padd_citymunicipality'];
        $n_pi_padd_barangay = $_POST['padd_barangay'];
        $n_pi_padd_subdivisionvillage = $_POST['padd_subdivisionvillage'] ?? "N/A";
        $n_pi_padd_street = $_POST['padd_street'] ?? "N/A";
        $n_pi_padd_houseblocklot = $_POST['padd_houseblocklot'] ?? "N/A";
        $n_pi_padd_zipcode = $_POST['padd_zipcode'];

        $posted_areas = array($n_pi_padd_province, $n_pi_padd_citymunicipality, $n_pi_padd_barangay, $n_pi_padd_subdivisionvillage, $n_pi_padd_street, $n_pi_padd_houseblocklot, $n_pi_padd_zipcode);
        $add_type = "P";
        lookupEachArea($conn, $add_type, $posted_areas, $residential_citymunicipality, $residential_province);

        echo "<br>
            Employee ID: $employee_id<br>
            PERMANENT ADDRESS<br>
            Province: $permanent_province<br>
            City/Municipality: $permanent_citymunicipality<br>
            Barangay: $permanent_barangay<br>
            Subdivision/Village: $permanent_subdivisionvillage<br>
            Street: $permanent_street<br>
            House/Block/Lot No.: $permanent_houseblocklot<br>
            Zipcode: $permanent_zipcode<br>
        ";

        // prepare arguments for insert function
        $table = 'employee_addresses';
        $fields = array(
            // 'employee_id' => $employee_id,
            'province_id' => $permanent_province,
            'citymunicipality_id' => $permanent_citymunicipality,
            'barangay_id' => $permanent_barangay,
            'subdivisionvillage_id' => $permanent_subdivisionvillage,
            'street_id' => $permanent_street,
            'houseblocklot_id' => $permanent_houseblocklot,
            'zipcode_id' => $permanent_zipcode,
            'emp_add_type' => $add_type,
        );
        // insert($conn, $table, $fields);
    }

    //transfers value of posted variables to local variables
    $n_pi_no_tel = $_POST['no_tel'] ?? "N/A";
    $n_pi_no_mobile = $_POST['no_mobile'];
    $n_pi_emailadd = $_POST['emailadd'] ?? "N/A";

    echo "<br>
        Employee ID: $employee_id<br>
        Telephone No.: $n_pi_no_tel<br>
        Mobile No.: $n_pi_no_mobile<br>
        Email Address: $n_pi_emailadd<br>
    ";

    // prepare arguments for insert function
    $table = 'employee_contacts';
    $filter = array(
        // 'employee_id' => $employee_id,
        'emp_cont_tel' => $n_pi_no_tel,
        'emp_cont_mobile' => $n_pi_no_mobile,
        'emp_cont_emailadd' => $n_pi_emailadd,
    );
    // insert($conn, $table, $filter);

    echo "<br><br><br>FAMILY BACKGROUND<br>";
    //transfers value of posted variables to local variables
    $n_fb_spouse_name_last = $_POST['spouse_name_last'];
    $n_fb_spouse_name_first = $_POST['spouse_name_first'];
    $n_fb_spouse_name_middle = $_POST['spouse_name_middle'];
    $n_fb_spouse_name_ext = $_POST['spouse_name_ext'] ?? "N/A";
    $n_fb_spouse_occupation = $_POST['spouse_occupation'] ?? "N/A";
    $n_fb_spouse_bus_name = $_POST['spouse_bus_name'] ?? "N/A";
    $n_fb_spouse_bus_add = $_POST['spouse_bus_add'] ?? "N/A";
    $n_fb_spouse_telno = $_POST['spouse_telno'] ?? "N/A";

    // lookup occupation_id
    if ($n_fb_spouse_occupation == "N/A") {
        $occupation = $n_fb_spouse_occupation;
    } else {
        $occupation = lookupId($conn, $n_fb_spouse_occupation, 'occupations', 'occupation_id', 'occupation_name', '', '');
    }

    // lookup employer_business_id
    if ($n_fb_spouse_bus_name == "N/A") {
        $employer_business = $n_fb_spouse_bus_name;
    } else {
        $employer_business = lookupId($conn, $n_fb_spouse_bus_name, 'employer_business', 'employer_business_id', 'employer_business_name', '', '');
    }

    echo "<br>
        SPOUSE<br>
        Employee ID: $employee_id<br>
        Last Name:: $n_fb_spouse_name_last<br>
        First Name: $n_fb_spouse_name_first<br>
        Middle Name: $n_fb_spouse_name_middle<br>
        Name Extension: $n_fb_spouse_name_ext<br>
        Occupation: $occupation<br>
        Employer/Business Name: $employer_business<br>
        Business Address: $n_fb_spouse_bus_add<br>
        Telephone No.: $n_fb_spouse_telno<br>
    ";

    // prepare arguments for insert function
    $table = 'spouses';
    $fields = array(
        'employee_id' => $employee_id,
        'spouse_lastname' => $n_fb_spouse_name_last,
        'spouse_firstname' => $n_fb_spouse_name_first,
        'spouse_middlename' => $n_fb_spouse_name_middle,
        'spouse_nameext' => $n_fb_spouse_name_ext,
        'occupation_id' => $occupation,
        'employer_business_id' => $employer_business,
        'spouse_busadd' => $n_fb_spouse_bus_add,
        'spouse_telno' => $n_fb_spouse_telno,
    );
    // insert($conn, $table, $fields);

    //transfers value of posted variables to local variables
    $n_fb_father_name_last = $_POST['father_name_last'];
    $n_fb_father_name_first = $_POST['father_name_first'];
    $n_fb_father_name_middle = $_POST['father_name_middle'] ?? "N/A";
    $n_fb_father_name_ext = $_POST['father_name_ext'] ?? "N/A";

    echo "<br>
        FATHER<br>
        Employee ID: $employee_id<br>
        Last Name:: $n_fb_father_name_last<br>
        First Name: $n_fb_father_name_first<br>
        Middle Name: $n_fb_father_name_middle<br>
        Name Extension: $n_fb_father_name_ext<br>
    ";

    // prepare arguments for insert function
    $table = 'parents';
    $fields = array(
        // 'employee_id' => $employee_id,
        'parent_lastname' => $n_fb_father_name_last,
        'parent_firstname' => $n_fb_father_name_first,
        'parent_middlename' => $n_fb_father_name_middle,
        'parent_nameext' => $n_fb_father_name_ext,
        'parent_type' => "F",
    );
    // insert($conn, $table, $fields);

    //transfers value of posted variables to local variables
    $n_fb_mother_name_last = $_POST['mother_name_last'];
    $n_fb_mother_name_first = $_POST['mother_name_first'];
    $n_fb_mother_name_middle = $_POST['mother_name_middle'] ?? "N/A";

    echo "<br>
        MOTHER<br>
        Employee ID: $employee_id<br>
        Last Name: $n_fb_mother_name_last<br>
        First Name: $n_fb_mother_name_first<br>
        Middle Name: $n_fb_mother_name_middle<br>
    ";

    // prepare arguments for insert function
    $table = 'parents';
    $fields = array(
        // 'employee_id' => $employee_id,
        'parent_lastname' => $n_fb_mother_name_last,
        'parent_firstname' => $n_fb_mother_name_first,
        'parent_middlename' => $n_fb_mother_name_middle,
        'parent_type' => "M",
    );
    // insert($conn, $table, $fields);

    //transfers value of posted variables to local variables
    $n_fb_child_fullname = $_POST['child_fullname'] ?? NULL;
    $n_fb_child_birthdate = $_POST['child_birthdate'] ?? NULL;

    if ($n_fb_child_fullname != NULL && $n_fb_child_fullname != NULL) {
        $children = array(
            $n_fb_child_fullname, // First inner array
            $n_fb_child_birthdate,     // Second inner array
        );
        // Ensure both inner arrays have the same number of elements
        $numElements = count($children[0]); // Number of elements in each inner array
        // Iterate through each index to combine corresponding elements
        echo "<br>CHILDREN<br>";
        for ($i = 0; $i < $numElements; $i++) {
            $fullName = $children[0][$i];   // Get fullName from the first inner array
            $bday = $children[1][$i];   // Get bday from the second inner array

            echo "$fullName ($bday)<br>"; // Output the formatted element
        }

        // prepare arguments for insert function
        $table = 'children';
        $fields = array(
            // 'employee_id' => $employee_id,
            'child_fullname' => $n_fb_child_fullname,
            'child_bday' => $n_fb_child_birthdate,
        );
        // insert($conn, $table, $fields);
    }

    // // EDUCATIONAL BACKGROUND

    // // CIVIL SERVICE ELIGBILITY
    // $n_cse_careerservice = $_POST['careerservice[]'];
    // $n_cse_rating = $_POST['rating[]'];
    // $n_cse_exam_date = $_POST['exam_date[]'];
    // $n_cse_exam_place = $_POST['exam_place[]'];
    // $n_cse_license_number = $_POST['license_number[]'];
    // $n_cse_license_dateofvalidity = $_POST['license_dateofvalidity[]'];

    // // WORK EXPERIENCE
    // $n_we_date_from = $_POST['we_date_from[]'];
    // $n_we_date_to = $_POST['we_date_to[]'];
    // $n_we_position = $_POST['we_position[]'];
    // $n_we_agency = $_POST['we_agency[]'];
    // $n_we_salary = $_POST['we_salary[]'];
    // $n_we_sg = $_POST['we_sg[]'];
    // $n_we_status = $_POST['we_status[]'];
    // $n_we_govtsvcs = $_POST['we_govtsvcs[]'];

    // // VOLUNTARY WORK
    // $n_vw_nameaddress = $_POST['vw_nameaddress[]'];
    // $n_vw_date_from = $_POST['vw_date_from[]'];
    // $n_vw_date_to = $_POST['vw_date_to[]'];
    // $n_vw_hrs = $_POST['vw_hrs[]'];
    // $n_vw_position = $_POST['vw_position[]'];

    // // LEARNING AND DEVELOPMENT
    // $n_lnd_title = $_POST['lnd_title[]'];
    // $n_lnd_date_from = $_POST['lnd_date_from[]'];
    // $n_lnd_date_to = $_POST['lnd_date_to[]'];
    // $n_lnd_hrs = $_POST['lnd_hrs[]'];
    // $n_lnd_type = $_POST['lnd_type[]'];
    // $n_lnd_sponsor = $_POST['lnd_sponsor[]'];

    // // OTHER INFORMATION
    // $n_skills = $_POST['skills[]'];
    // $n_distinctions = $_POST['distinctions[]'];
    // $n_membership = $_POST['membership[]'];

    // $n_radio_degree_3rd = $_POST['radio_degree_3rd'];

    // $n_radio_degree_4th = $_POST['radio_degree_4th'];
    // $n_input_degree_4th = $_POST['input_degree_4th'];

    // $n_radio_guilty = $_POST['radio_guilty'];
    // $n_input_guilty = $_POST['input_guilty'];

    // $n_radio_charged = $_POST['radio_charged'];
    // $n_input_filed = $_POST['input_filed'];
    // $n_input_status = $_POST['input_status'];

    // $n_radio_convicted = $_POST['radio_convicted'];
    // $n_input_convicted = $_POST['input_convicted'];

    // $n_radio_seperated = $_POST['radio_seperated'];
    // $n_input_seperated = $_POST['input_seperated'];

    // $n_radio_candidate = $_POST['radio_candidate'];

    // $n_radio_resigned = $_POST['radio_resigned'];
    // $n_input_resigned = $_POST['input_resigned'];

    // $n_radio_immigrant = $_POST['radio_immigrant'];
    // $n_input_immigrant = $_POST['input_immigrant'];

    // $n_radio_indigenous = $_POST['radio_indigenous'];
    // $n_input_indigenous = $_POST['input_indigenous'];

    // $n_radio_disability = $_POST['radio_disability'];
    // $n_input_disability = $_POST['input_disability'];

    // $n_radio_soloparent = $_POST['radio_soloparent'];
    // $n_input_soloparent = $_POST['input_soloparent'];

    // // REFERENCES
    // $n_ref_name = $_POST['ref_name[]'];
    // $n_ref_address = $_POST['ref_address[]'];
    // $n_ref_telno = $_POST['ref_telno[]'];

    // $n_govtid_type = $_POST['govtid_type'];
    // $n_govtid_no = $_POST['govtid_no'];
    // $n_govtid_issuance = $_POST['govtid_issuance'];

    // // if an employee doesn't have a middle name
    // $middlename = ($n_pi_name_middle === "N/A") ? "" : " " . $n_pi_name_middle;
    // // if an employee doesn't have a name extension
    // $nameext = ($n_pi_name_ext === "N/A") ? "" : " " . $n_pi_name_ext;

    // // for profile picture
    // $filename = $n_pi_name_last . ", " . $n_pi_name_first . $middlename . $nameext;
    // $file = $_FILES['change_photo']['name']; //basename.ext
    // $fileext = pathinfo($file, PATHINFO_EXTENSION); //ext

    // $temp = $_FILES['change_photo']['tmp_name']; //temporary location
    // $n_itemimgdir = "products/" . $filename . "." . $fileext; ///target location

}