<?php
include_once "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "PERSONAL INFORMATION<br>";
    //transfers value of posted variables to local variables
    $n_pi_name_last = trim($_POST['name_last']);
    $n_pi_name_first = trim($_POST['name_first']);
    $n_pi_name_middle = trim($_POST['name_middle']) ?? "N/A";
    $n_pi_name_ext = trim($_POST['name_ext']) ?? "N/A";

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

    // retrieve employee ID from db
    $sql = "SELECT `employee_id` 
            FROM `employees` 
            WHERE `employee_lastname` = '?'
            AND `employee_firstname` = '?'
            AND `employee_middlename` = '?'
            AND `employee_nameext` = '?'";
    echo $sql . "<br>";
    // $filter = array($n_pi_name_last, $n_pi_name_first, $n_pi_name_middle,$n_pi_name_ext) 
    // $result = query($conn, $sql, $filter);
    // $row = $result[0];
    // $employee_id = $row['employee_id'];

    //transfers value of posted variables to local variables
    $n_pi_birth_date = trim($_POST['birth_date']);
    $n_pi_birth_place = trim($_POST['birth_place']);
    $n_pi_sex = trim($_POST['sex']) ?? "N/A";
    $n_pi_civilstatus = trim($_POST['civilstatus']) ?? "N/A";
    $n_pi_height = trim($_POST['height']);
    $n_pi_weight = trim($_POST['weight']);
    $n_pi_bloodtype = trim($_POST['bloodtype']) ?? "N/A";
    // $n_pi_citizenship = trim($_POST['citizenship']);
    $n_pi_citizenship_by = trim($_POST['citizenship_by']) ?? "F";
    $n_pi_citizenship_country = trim($_POST['citizenship_country']) ?? "N/A";

    function lookupId($conn, $name, $table, $column_pk, $column_name, $column_fk, $column_fk_idData)
    {
        // ======================== GLOSSARY OF ARGUMENTS FOR lookupId() ========================
        // $name is the posted value (ex: `4503`)
        // $table is the name of the table (ex: `zipcodes` table)
        // $column_pk is the column name of the IDs (ex: `zipcode_id` column)
        // $column_name is the column name of the names (ex: `zipcode_no` column)
        // $column_fk is the column name of the foreign key (ex: `citymunicipality_id` column)
        // $column_fk_idData is the data inside the column name of the foreign key (ex: `4`)
        // ======================================================================================

        $finished = false;
        while ($finished == false) {
            // check if $name exists in $table
            $keys = "`{$column_pk}`";
            $and_where = "";
            if ($column_fk != "") {
                $keys .= ", `{$column_fk}`";
                $and_where = " AND `{$column_fk}` = '{$column_fk_idData}'";
            }
            $sql = "SELECT `?`
                FROM `?`
                WHERE `?` = '?'?";
            return $sql;
            // $filter = array($keys, $table, $column_name, $name, $and_where);
            // $result = query($conn, $sql, $filter);

            // if (!empty($result)) {
            //     // retrieve ID of $name
            //     $row = $result[0];
            //     $finished = true;

            //     // exit function if ID is successfully received
            //     return $row[$column_pk];
            // } else {
            //     // insert $name if it doesn't exist in $table
            //     // $table = $table;
            //     $fields = array($column_name => $name);
            //     if (in_array($column_fk, ['citymunicipality_id', 'province_id'])) {
            //         $fields[$column_fk] = $column_fk_idData;
            //     }
            //     insert($conn, $table, $fields);
            // }
        }
    }

    // look up ID of $n_pi_citizenship_country
    $citizenship_country = lookupId($conn, $n_pi_citizenship_country, 'countries', 'country_id', 'country_name', '', '');

    echo "<br>
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
    $n_pi_id_gsis = strtoupper(trim($_POST['id_gsis']));
    $n_pi_id_pagibig = strtoupper(trim($_POST['id_pagibig']));
    $n_pi_id_philhealth = strtoupper(trim($_POST['id_philhealth']));
    $n_pi_id_sss = strtoupper(trim($_POST['id_sss']));
    $n_pi_id_tin = strtoupper(trim($_POST['id_tin']));
    $n_pi_id_agency = strtoupper(trim($_POST['id_agency']));

    echo "<br>
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
    $n_pi_radd_province = trim($_POST['radd_province']);
    $n_pi_radd_citymunicipality = trim($_POST['radd_citymunicipality']);
    $n_pi_radd_barangay = trim($_POST['radd_barangay']);
    $n_pi_radd_subdivisionvillage = trim($_POST['radd_subdivisionvillage']) ?? "N/A";
    $n_pi_radd_street = trim($_POST['radd_street']) ?? "N/A";
    $n_pi_radd_houseblocklot = trim($_POST['radd_houseblocklot']) ?? "N/A";
    $n_pi_radd_zipcode = trim($_POST['radd_zipcode']);

    //transfers value of posted variables to local variables
    $n_pi_padd_province = trim($_POST['padd_province']) ?? '';
    $n_pi_padd_citymunicipality = trim($_POST['padd_citymunicipality']) ?? '';
    $n_pi_padd_barangay = trim($_POST['padd_barangay']) ?? '';
    $n_pi_padd_subdivisionvillage = trim($_POST['padd_subdivisionvillage']) ?? "N/A";
    $n_pi_padd_street = trim($_POST['padd_street']) ?? "N/A";
    $n_pi_padd_houseblocklot = trim($_POST['padd_houseblocklot']) ?? "N/A";
    $n_pi_padd_zipcode = trim($_POST['padd_zipcode']) ?? '';

    $areas = array('province', 'citymunicipality', 'barangay', 'subdivisionvillage', 'street', 'houseblocklot', 'zipcode');
    $add_types = array('B' => 'both_', 'R' => 'residential_', 'P' => 'permanent_');

    // initialize variables for lookupEachArea()
    foreach ($add_types as $add_type => $prefix) {
        foreach ($areas as $area) {
            ${$prefix . $area} = '';
        }
    }

    // create lookupEachArea()
    // function lookupEachArea($conn, $add_type, $areas, $posted_areas, $residential_citymunicipality, $residential_province) {}

    $same_add = $_POST['same_add'] ?? "false";
    $posted_areas = array($n_pi_radd_province, $n_pi_radd_citymunicipality, $n_pi_radd_barangay, $n_pi_radd_subdivisionvillage, $n_pi_radd_street, $n_pi_radd_houseblocklot, $n_pi_radd_zipcode);

    foreach ($add_types as $add_type => $prefix) {

        if ($same_add == "false" && $add_type == "B") {
            // skip to the next element of the array
            continue;
        }
        if ($add_type == "P") {

            $posted_areas = array($n_pi_padd_province, $n_pi_padd_citymunicipality, $n_pi_padd_barangay, $n_pi_padd_subdivisionvillage, $n_pi_padd_street, $n_pi_padd_houseblocklot, $n_pi_padd_zipcode);
        }

        // call lookupEachArea()
        // lookupEachArea($conn, $add_type, $areas, $posted_areas, $residential_citymunicipality, $residential_province);

        // content of lookupEachArea()
        foreach ($areas as $index => $area) {

            // set $var_name value to what the variable's name will be
            $var_name = match ($add_type) {
                'B' => "both_{$area}",
                'R' => "residential_{$area}",
                'P' => "permanent_{$area}",
            };

            // 'global' keyword allows the $$var_name outside the function to be accessed
            // global $$var_name; // beware of using the 'global' keyword

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

            // for tables with foreign keys
            $column_fk = '';
            $data_fk = '';
            if (in_array($table_name, ['barangays', 'zipcodes'])) {
                $column_fk = 'citymunicipality_id';
                $data_fk = $residential_citymunicipality ?? '';
            } else if ($table_name == 'city_municipality') {
                $column_fk = 'province_id';
                $data_fk = $residential_province ?? '';
            }

            // $$var_name means that the value of $var_name will be used as the variable name
            // look up ID of each variable name
            $$var_name = lookupId($conn, $posted_areas[$index], $table_name, "{$area}_id", $column_name, $column_fk, $data_fk);
        }

        echo "<br>" .
            match ($add_type) {
                'B' => 'RESIDENTIAL & PERMANENT ADDRESS',
                'R' => 'RESIDENTIAL ADDRESS',
                'P' => 'PERMANENT ADDRESS',
            } . "<br>
            Province: " . ${$prefix . 'province'} . "<br>
            City/Municipality: " . ${$prefix . 'citymunicipality'} . "<br>
            Barangay: " . ${$prefix . 'barangay'} . "<br>
            Subdivision/Village: " . ${$prefix . 'subdivisionvillage'} . "<br>
            Street: " . ${$prefix . 'street'} . "<br>
            House/Block/Lot No.: " . ${$prefix . 'houseblocklot'} . "<br>
            Zipcode: " . ${$prefix . 'zipcode'} . "<br>
        ";

        // prepare arguments for insert function
        $table = 'employee_addresses';
        $fields = array(
            // 'employee_id' => $employee_id,
            'province_id' => ${$prefix . 'province'},
            'citymunicipality_id' => ${$prefix . 'citymunicipality'},
            'barangay_id' => ${$prefix . 'barangay'},
            'subdivisionvillage_id' => ${$prefix . 'subdivisionvillage'},
            'street_id' => ${$prefix . 'street'},
            'houseblocklot_id' => ${$prefix . 'houseblocklot'},
            'zipcode_id' => ${$prefix . 'zipcode'},
            'emp_add_type' => $add_type,
        );
        // insert($conn, $table, $fields);

        if ($same_add == "true") {
            // exit the loop
            break;
        }
    }

    //transfers value of posted variables to local variables
    $n_pi_no_tel = trim($_POST['no_tel']) ?? "N/A";
    $n_pi_no_mobile = trim($_POST['no_mobile']);
    $n_pi_emailadd = trim($_POST['emailadd']) ?? "N/A";

    echo "<br>
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
    $n_fb_spouse_name_last = trim($_POST['spouse_name_last']);
    $n_fb_spouse_name_first = trim($_POST['spouse_name_first']);
    $n_fb_spouse_name_middle = trim($_POST['spouse_name_middle']);
    $n_fb_spouse_name_ext = trim($_POST['spouse_name_ext']) ?? "N/A";
    $n_fb_spouse_occupation = trim($_POST['spouse_occupation']) ?? "N/A";
    $n_fb_spouse_bus_name = trim($_POST['spouse_bus_name']) ?? "N/A";
    $n_fb_spouse_bus_add = trim($_POST['spouse_bus_add']) ?? "N/A";
    $n_fb_spouse_telno = trim($_POST['spouse_telno']) ?? "N/A";

    // look up ID of $n_fb_spouse_occupation
    $occupation = lookupId($conn, $n_fb_spouse_occupation, 'occupations', 'occupation_id', 'occupation_name', '', '');

    // look up ID of $n_fb_spouse_bus_name
    $employer_business = lookupId($conn, $n_fb_spouse_bus_name, 'employer_business', 'employer_business_id', 'employer_business_name', '', '');

    echo "<br>
        SPOUSE<br>
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
    $n_fb_father_name_last = trim($_POST['father_name_last']);
    $n_fb_father_name_first = trim($_POST['father_name_first']);
    $n_fb_father_name_middle = trim($_POST['father_name_middle']) ?? "N/A";
    $n_fb_father_name_ext = trim($_POST['father_name_ext']) ?? "N/A";

    echo "<br>
        FATHER<br>
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
    $n_fb_mother_name_last = trim($_POST['mother_name_last']);
    $n_fb_mother_name_first = trim($_POST['mother_name_first']);
    $n_fb_mother_name_middle = trim($_POST['mother_name_middle']) ?? "N/A";

    echo "<br>
        MOTHER<br>
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
    $n_fb_child_fullname =  array_map('trim', $_POST['child_fullname']) ?? NULL;
    $n_fb_child_birthdate =  array_map('trim', $_POST['child_birthdate']) ?? NULL;

    if ($n_fb_child_fullname != NULL && $n_fb_child_fullname != NULL) {
        $children = array(
            $n_fb_child_fullname, // First inner array
            $n_fb_child_birthdate, // Second inner array
        );
        // Ensure both inner arrays have the same number of elements
        $numElements = count($children[0]); // Number of elements in each inner array
        echo "<br>CHILDREN<br>";
        // Iterate through each index to combine corresponding elements
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



    echo "<br><br><br>EDUCATIONAL BACKGROUND<br>";

    $educ_level = array('elem', 'sec', 'voc', 'coll', 'grad');
    $educ_details = array('_school', '_degree', '_attendance_from', '_attendance_to', '_level', '_year', '_scholarship');

    foreach ($educ_level as $lvl) {
        $title = match ($lvl) {
            'elem' => 'ELEMENTARY',
            'sec' => 'SECONDARY',
            'voc' => 'VOCATIONAL',
            'coll' => 'COLLEGE',
            'grad' => 'GRADUATE STUDIES',
        };

        foreach ($educ_details as $detail) {
            if (in_array($lvl, ["elem", "sec"])) {
                ${"n_eb_" . $lvl . $detail} = trim($_POST[$lvl . $detail]) ?? "N/A";
            } else {
                ${"n_eb_" . $lvl . $detail} =  array_map('trim', $_POST[$lvl . $detail]) ?? "N/A";
            }
            
            ${"n_eb_" . $lvl . $detail} = $_POST[$lvl . $detail] ?? "N/A";

            if ($detail == '_school' || $detail == '_degree') {
                $var_name = str_replace('_', '', $detail);
                // $var_name = substr($detail, 1);
                $$var_name = lookupId($conn, ${"n_eb_" . $lvl . $detail}, 'schools', 'school_id', 'school_name', '', '');
            } else {
                $var_name = str_replace('_', '', $detail);
                // $var_name = substr($detail, 1);
                $$var_name = ${"n_eb_" . $lvl . $detail};
            }
        }

        echo "<br>
            $title (" . strtoupper($lvl[0]) . ")<br>
            Name of School: $school<br>
            Basic Education / Degree / Course: $degree<br>
            Period of Attendance<br>
            From: $attendancefrom&emsp;
            To: $attendanceto<br>
            Highest Level / Units Earned: $level<br>
            Year Graduated: $year<br>
            Scholarship / Academic Honors Received: $scholarship<br>
        ";

        // prepare arguments for insert function
        $table = 'education';
        $fields = [
            // 'employee_id' => $employee_id,
            'educ_acadlvl' => strtoupper($lvl[0]),
            'school_id' => $school,
            'bdc_id' => $degree,
            'educ_period_from' => $attendancefrom,
            'educ_period_to' => $attendanceto,
            'educ_highest' => $level,
            'educ_graduated' => $year,
            'educ_scholarship_acad_honors' => $scholarship,
        ];
        // insert($conn, $table, $fields);
    }



    echo "<br><br><br>CIVIL SERVICE ELIGIBILITY<br>";
    //transfers value of posted variables to local variables
    $n_cse_careerservice = array_map('trim', $_POST['careerservice']) ?? array('N/A');
    $n_cse_rating =  array_map('trim', $_POST['rating']) ?? array('N/A');
    $n_cse_exam_date =  array_map('trim', $_POST['exam_date']) ?? array('N/A');
    $n_cse_exam_place =  array_map('trim', $_POST['exam_place']) ?? array('N/A');
    $n_cse_license_number =  array_map('trim', $_POST['license_number']) ?? array('N/A');
    $n_cse_license_dateofvalidity =  array_map('trim', $_POST['license_dateofvalidity']) ?? array('N/A');

    for ($i = 0; $i < count($n_cse_careerservice); $i++) {

        // look up ID of $n_cse_careerservice[$i]
        $career_service = lookupId($conn, $n_cse_careerservice[$i], 'civil_services', 'cs_id', 'cs_name', '', '');

        echo "<br>
            Career Service: $career_service<br>
            Rating: {$n_cse_rating[$i]}<br>
            Date of Examination / Conferment: {$n_cse_exam_date[$i]}<br>
            Place of Examination / Conferment: {$n_cse_exam_place[$i]}<br>
            License Number: {$n_cse_license_number[$i]}<br>
            License's Date of Validity: {$n_cse_license_dateofvalidity[$i]}<br>
        ";

        // prepare arguments for insert function
        $table = 'cs_eligibility';
        $fields = array(
            // 'employee_id' => $employee_id,
            'cs_id' => $career_service,
            'cseligibility_rating' => $n_cse_rating[$i],
            'cseligibility_examdate' => $n_cse_exam_date[$i],
            'cseligibility_place' => $n_cse_exam_place[$i],
            'cseligibility_license' => $n_cse_license_number[$i],
            'cseligibility_datevalidity' => $n_cse_license_dateofvalidity[$i],
        );
        // insert($conn, $table, $fields);
    }



    echo "<br><br><br>WORK EXPERIENCE<br>";
    //transfers value of posted variables to local variables
    $n_we_date_from =  array_map('trim', $_POST['we_date_from']) ?? array('N/A');
    $n_we_date_to =  array_map('trim', $_POST['we_date_to']) ?? array('N/A');
    $n_we_position =  array_map('trim', $_POST['we_position']) ?? array('N/A');
    $n_we_agency =  array_map('trim', $_POST['we_agency']) ?? array('N/A');
    $n_we_salary =  array_map('trim', $_POST['we_salary']) ?? array('N/A');
    $n_we_sg =  array_map('trim', $_POST['we_sg']) ?? array('N/A');
    $n_we_status =  array_map('trim', $_POST['we_status']) ?? array('N/A');
    $n_we_govtsvcs =  array_map('trim', $_POST['we_govtsvcs']) ?? array('N/A');

    for ($i = 0; $i < count($n_we_date_from); $i++) {

        // Match the pattern '09' using regex
        if (preg_match('/\b(\d{2})\b/', $n_we_sg[$i], $matches)) {
            $salary_grade = $matches[1]; // Get the matched substring
        } else {
            $salary_grade = 0;
        }

        $position = lookupId($conn, $n_we_position[$i], 'positions', 'position_id', 'position_title', 'position_salarygrade', $salary_grade);
        $daoc = lookupId($conn, $n_we_agency[$i], 'department_agency_office_company', 'daoc_id', 'daoc_name', '', '');

        if($i == 0) {
            $position_id = $position;
        }

        echo "<br>
            Inclusive Dates:<br>
            From: $n_we_date_from[$i]&emsp;
            To: {$n_we_date_to[$i]}<br>
            Position Title: $position<br>
            Department/Agency/Office/Company: $daoc<br>
            Monthly Salary: {$n_we_salary[$i]}<br>
            Salary/Job/Pay Grade & Step: {$n_we_sg[$i]}<br>
            Status of Appointment: {$n_we_status[$i]}<br>
            Government Service? {$n_we_govtsvcs[$i]}<br>
        ";

        // prepare arguments for insert function
        $table = 'work_experience';
        $fields = array(
            // 'employee_id' => $employee_id,
            'workexp_from' => $n_we_date_from[$i],
            'workexp_to' => $n_we_date_to[$i],
            'position_id' => $position,
            'daoc_id' => $daoc,
            'workexp_salary_mo' => $n_we_salary[$i],
            'workexp_paygrade_step' => $n_we_sg[$i],
            'workexp_status' => $n_we_status[$i],
            'workexp_govtsvcs' => $n_we_govtsvcs[$i],
        );
        // insert($conn, $table, $fields);
    }



    echo "<br><br><br>VOLUNTARY WORK<br>";
    //transfers value of posted variables to local variables
    $n_vw_nameaddress = array_map('trim', $_POST['vw_nameaddress']) ?? array('N/A');
    $n_vw_date_from = array_map('trim', $_POST['vw_date_from']) ?? array('N/A');
    $n_vw_date_to = array_map('trim', $_POST['vw_date_to']) ?? array('N/A');
    $n_vw_hrs = array_map('trim', $_POST['vw_hrs']) ?? array('N/A');
    $n_vw_position = array_map('trim', $_POST['vw_position']) ?? array('N/A');

    for ($i = 0; $i < count($n_vw_nameaddress); $i++) {

        echo "<br>
            Name & Address of Organization: $n_vw_nameaddress[$i]<br>
            Inclusive Dates:<br>
            From: {$n_vw_date_from[$i]}&emsp;
            To: {$n_vw_date_to[$i]}<br>
            Number of Hours: {$n_vw_hrs[$i]}<br>
            Position / Nature of Work: {$n_vw_position[$i]}<br>
        ";

        // prepare arguments for insert function
        $table = 'voluntary_work';
        $fields = array(
            // 'employee_id' => $employee_id,
            'daoc_id' => $n_vw_nameaddress[$i],
            'workexp_from' => $n_vw_date_from[$i],
            'workexp_to' => $n_vw_date_to[$i],
            'workexp_salary_mo' => $n_vw_hrs[$i],
            'position_id' => $n_vw_position[$i],
        );
        // insert($conn, $table, $fields);
    }



    echo "<br><br><br>LEARNING AND DEVELOPMENT<br>";
    //transfers value of posted variables to local variables
    $n_lnd_title = array_map('trim', $_POST['lnd_title']) ?? array('N/A');
    $n_lnd_date_from = array_map('trim', $_POST['lnd_date_from']) ?? array('N/A');
    $n_lnd_date_to = array_map('trim', $_POST['lnd_date_to']) ?? array('N/A');
    $n_lnd_hrs = array_map('trim', $_POST['lnd_hrs']) ?? array('N/A');
    $n_lnd_type = array_map('trim', $_POST['lnd_type']) ?? array('N/A');
    $n_lnd_sponsor = array_map('trim', $_POST['lnd_sponsor']) ?? array('N/A');

    for ($i = 0; $i < count($n_lnd_title); $i++) {

        $lnd_title = lookupId($conn, $n_lnd_title[$i], 'ld_titles', 'ld_title_id', 'ld_title_name', '', '');
        $lnd_sponsor = lookupId($conn, $n_lnd_sponsor[$i], 'sponsors', 'sponsor_id', 'sponsor_name', '', '');

        echo "<br>
            Title of Learning and Development: $lnd_title<br>
            Inclusive Dates of Attendance:<br>
            From: $n_lnd_date_from[$i]&emsp;
            To: {$n_lnd_date_to[$i]}<br>
            Number of Hours: $n_lnd_hrs[$i]<br>
            Type of LD: {$n_lnd_type[$i]}<br>
            Conducted/Sponsored By: $lnd_sponsor<br>
        ";

        // prepare arguments for insert function
        $table = 'learning_development';
        $fields = array(
            // 'employee_id' => $employee_id,
            'ld_title_id' => $lnd_title,
            'ld_from' => $n_lnd_date_from[$i],
            'ld_to' => $n_lnd_date_to[$i],
            'ld_hrs' => $n_lnd_hrs[$i],
            'ld_type' => $n_lnd_type[$i],
            'sponsor_id' => $lnd_sponsor,
        );
        // insert($conn, $table, $fields);
    }



    echo "<br><br><br>OTHER INFORMATION<br>";
    //transfers value of posted variables to local variables
    $n_skills = array_map('trim', $_POST['skills']) ?? array('N/A');
    $n_distinctions = array_map('trim', $_POST['distinctions']) ?? array('N/A');
    $n_membership = array_map('trim', $_POST['membership']) ?? array('N/A');

    function insert_otherInfo($items_array, $table, $fieldName) {
        // accommodate qna
        for ($i = 0; $i < count($items_array); $i++) {
            echo "&emsp;$items_array[$i]<br>";
            
            $fields = array(
                // 'employee_id' => $employee_id, 
                $fieldName => $items_array[$i]
            );
            // insert($conn, $table, $fields);
        }
    }

    echo "<br>Special Skills and Hobbies:<br>";
    insert_otherInfo($n_skills, 'special_skills_hobbies', 'ssh_name');

    echo "<br>Non-Academic distinctions/Recognition:<br>";
    insert_otherInfo($n_distinctions, 'nonacademic_recognition', 'nar_name');

    echo "<br>Membership in Association/Organization:<br>";
    insert_otherInfo($n_membership, 'membership', 'membership_name');


    function insert_qna($item_no, $qna_a, $qna_a_ifyes, $qna_b, $qna_b_ifyes, $qna_b_ifyes_plus, $qna_c, $qna_c_ifyes) {
        echo "<br>
            $item_no.<br>
            a. $qna_a: $qna_a_ifyes<br>
            b. $qna_b: $qna_b_ifyes; $qna_b_ifyes_plus<br>
            c. $qna_c: $qna_c_ifyes<br>
        ";

        // prepare arguments for insert function
        $table = 'qna';
        $fields = array(
            // 'employee_id' => $employee_id,
            'qna_a' => $qna_a,
            'qna_a_ifyes' => $qna_a_ifyes,
            'qna_b' => $qna_b,
            'qna_b_ifyes' => $qna_b_ifyes,
            'qna_b_ifyes_plus' => $qna_b_ifyes_plus,
            'qna_c' => $qna_c,
            'qna_c_ifyes' => $qna_c_ifyes,
        );
        // insert($conn, $table, $fields);
    }

    $n_radio_degree_3rd = trim($_POST['radio_degree_3rd']);

    $n_radio_degree_4th = trim($_POST['radio_degree_4th']);
    $n_input_degree_4th = trim($_POST['input_degree_4th']) ?? 'N/A';

    insert_qna('34', $n_radio_degree_3rd, 'N/A', $n_radio_degree_4th, $n_input_degree_4th, 'N/A', 'N/A', 'N/A');

    $n_radio_guilty = trim($_POST['radio_guilty']);
    $n_input_guilty = trim($_POST['input_guilty']) ?? 'N/A';

    $n_radio_charged = trim($_POST['radio_charged']);
    $n_input_filed = trim($_POST['input_filed']) ?? 'N/A';
    $n_input_status = trim($_POST['input_status']) ?? 'N/A';

    insert_qna('35', $n_radio_guilty, $n_input_guilty, $n_radio_charged, $n_input_filed, $n_input_status, 'N/A', 'N/A');

    $n_radio_convicted = trim($_POST['radio_convicted']);
    $n_input_convicted = trim($_POST['input_convicted']) ?? 'N/A';

    insert_qna('36', $n_radio_convicted, $n_input_convicted, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

    $n_radio_seperated = trim($_POST['radio_seperated']);
    $n_input_seperated = trim($_POST['input_seperated']) ?? 'N/A';

    insert_qna('37', $n_radio_seperated, $n_input_seperated, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

    $n_radio_candidate = trim($_POST['radio_candidate']);

    $n_radio_resigned = trim($_POST['radio_resigned']);
    $n_input_resigned = trim($_POST['input_resigned']) ?? 'N/A';

    insert_qna('38', $n_radio_candidate, 'N/A', $n_radio_resigned, $n_input_resigned, 'N/A', 'N/A', 'N/A');

    $n_radio_immigrant = trim($_POST['radio_immigrant']);
    $n_input_immigrant = trim($_POST['input_immigrant']) ?? 'N/A';

    insert_qna('39', $n_radio_immigrant, $n_input_immigrant, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

    $n_radio_indigenous = trim($_POST['radio_indigenous']);
    $n_input_indigenous = trim($_POST['input_indigenous']) ?? 'N/A';

    $n_radio_disability = trim($_POST['radio_disability']);
    $n_input_disability = trim($_POST['input_disability']) ?? 'N/A';

    $n_radio_soloparent = trim($_POST['radio_soloparent']);
    $n_input_soloparent = trim($_POST['input_soloparent']) ?? 'N/A';

    insert_qna('40', $n_radio_indigenous, $n_input_indigenous, $n_radio_disability, $n_input_disability, 'N/A', $n_radio_soloparent, $n_input_soloparent);



    echo "<br><br><br>REFERENCES<br>";
    $n_ref_name = array_map('trim', $_POST['ref_name']);
    $n_ref_address =  array_map('trim', $_POST['ref_address']);
    $n_ref_telno =  array_map('trim', $_POST['ref_telno']);
    
    $filtered_ref_name = array_filter($n_ref_name, function($value) {
        return $value !== ''; 
    });

    for ($i=0; $i < count($filtered_ref_name); $i++) { 
        echo "<br>
            Name: $n_ref_name[$i]<br>
            Address: $n_ref_address[$i]<br>
            Tel. No.: $n_ref_telno[$i]<br>
        ";

        // prepare arguments for insert function
        $table = 'pds_references';
        $fields = array(
            // 'employee_id' => $employee_id,
            'ref_name' => $n_ref_name[$i],
            'ref_add' => $n_ref_address[$i],
            'ref_telno' => $n_ref_telno[$i],
        );
        // insert($conn, $table, $fields);
    }

    $n_govtid_type = trim($_POST['govtid_type']);
    $n_govtid_no = trim($_POST['govtid_no']);
    $n_govtid_issuance = trim($_POST['govtid_issuance']);

    echo "<br>
        Government Issued ID: $n_govtid_type<br>
        ID/License/Passport No.: $n_govtid_no<br>
        Date/Place of Issuance: $n_govtid_issuance<br>
    ";

    // for $filename
    // if an employee doesn't have a middle name
    $middlename = ($n_pi_name_middle === "N/A") ? "" : " " . $n_pi_name_middle;
    // if an employee doesn't have a name extension
    $nameext = ($n_pi_name_ext === "N/A") ? "" : " " . $n_pi_name_ext;

    // for profile picture
    $filename = $n_pi_name_last . ", " . $n_pi_name_first . $middlename . $nameext;
    $file = $_FILES['change_photo']['name']; //basename.ext
    $fileext = pathinfo($file, PATHINFO_EXTENSION); //ext

    $temp = $_FILES['change_photo']['tmp_name']; //temporary location
    $n_itemimgdir = "id_pictures/" . $filename . "." . $fileext; ///target location

    // prepare arguments for update function
    $table = "employees";
    $fields = array(
        'position_id' => $position_id, 
        'employee_imgdir' => $n_itemimgdir,
    );
    // $filter = array( 'employee_id' => $employee_id );
    // update($conn, $table, $fields, $filter);

}