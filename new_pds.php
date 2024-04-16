<?php
include_once "db_conn.php";

if (isset($_POST["name_last"]) && isset($_POST["profile_img"])) {
    
    //transfers value of name attribute from PDS form to variable
    // PERSONAL INFORMATION
    $n_pi_name_last = $_POST['name_last'];
    $n_pi_name_first = $_POST['name_first'];
    $n_pi_name_middle = $_POST['name_middle'];
    $n_pi_name_ext = $_POST['name_ext'];
    $n_pi_birth_date = $_POST['birth_date'];
    $n_pi_birth_place = $_POST['birth_place'];
    $n_pi_sex = $_POST['sex'];
    $n_pi_civilstatus = $_POST['civilstatus'];
    $n_pi_height = $_POST['height'];
    $n_pi_weight = $_POST['weight'];
    $n_pi_bloodtype = $_POST['bloodtype'];
    $n_pi_id_gsis = $_POST['id_gsis'];
    $n_pi_id_pagibig = $_POST['id_pagibig'];
    $n_pi_id_philhealth = $_POST['id_philhealth'];
    $n_pi_id_sss = $_POST['id_sss'];
    $n_pi_id_tin = $_POST['id_tin'];
    $n_pi_id_agency = $_POST['id_agency'];
    $n_pi_citizenship = $_POST['citizenship'];
    $n_pi_citizenship_by = $_POST['citizenship_by'];
    $n_pi_citizenship_country = $_POST['citizenship_country'];
    $n_pi_radd_province = $_POST['radd_province'];
    $n_pi_radd_citymunicipality = $_POST['radd_citymunicipality'];
    $n_pi_radd_barangay = $_POST['radd_barangay'];
    $n_pi_radd_subdivisionvillage = $_POST['radd_subdivisionvillage'];
    $n_pi_radd_street = $_POST['radd_street'];
    $n_pi_radd_houseblocklot = $_POST['radd_houseblocklot'];
    $n_pi_radd_zipcode = $_POST['radd_zipcode'];
    $n_pi_padd_province = $_POST['padd_province'];
    $n_pi_padd_citymunicipality = $_POST['padd_citymunicipality'];
    $n_pi_padd_barangay = $_POST['padd_barangay'];
    $n_pi_padd_subdivisionvillage = $_POST['padd_subdivisionvillage'];
    $n_pi_padd_street = $_POST['padd_street'];
    $n_pi_padd_houseblocklot = $_POST['padd_houseblocklot'];
    $n_pi_padd_zipcode = $_POST['padd_zipcode'];
    $n_pi_no_tel = $_POST['no_tel'];
    $n_pi_no_mobile = $_POST['no_mobile'];
    $n_pi_emailadd = $_POST['emailadd'];

    // FAMILY BACKGROUND
    $n_fb_spouse_name_last = $_POST['spouse_name_last'];
    $n_fb_spouse_name_first = $_POST['spouse_name_first'];
    $n_fb_spouse_name_middle = $_POST['spouse_name_middle'];
    $n_fb_spouse_name_ext = $_POST['spouse_name_ext'];
    $n_fb_spouse_occupation = $_POST['spouse_occupation'];
    $n_fb_spouse_bus_name = $_POST['spouse_bus_name'];
    $n_fb_spouse_bus_add = $_POST['spouse_bus_add'];
    $n_fb_spouse_telno = $_POST['spouse_telno'];
    $n_fb_father_name_last = $_POST['father_name_last'];
    $n_fb_father_name_first = $_POST['father_name_first'];
    $n_fb_father_name_middle = $_POST['father_name_middle'];
    $n_fb_father_name_ext = $_POST['father_name_ext'];
    $n_fb_mother_name_last = $_POST['mother_name_last'];
    $n_fb_mother_name_first = $_POST['mother_name_first'];
    $n_fb_mother_name_middle = $_POST['mother_name_middle'];
    $n_fb_child_fullname = $_POST['child_fullname[]'];
    $n_fb_child_birthdate = $_POST['child_birthdate[]'];

    // EDUCATIONAL BACKGROUND
    
    // CIVIL SERVICE ELIGBILITY
    $n_cse_careerservice = $_POST['careerservice[]'];
    $n_cse_rating = $_POST['rating[]'];
    $n_cse_exam_date = $_POST['exam_date[]'];
    $n_cse_exam_place = $_POST['exam_place[]'];
    $n_cse_license_number = $_POST['license_number[]'];
    $n_cse_license_dateofvalidity = $_POST['license_dateofvalidity[]'];

    // WORK EXPERIENCE
    $n_we_date_from = $_POST['we_date_from[]'];
    $n_we_date_to = $_POST['we_date_to[]'];
    $n_we_position = $_POST['we_position[]'];
    $n_we_agency = $_POST['we_agency[]'];
    $n_we_salary = $_POST['we_salary[]'];
    $n_we_sg = $_POST['we_sg[]'];
    $n_we_status = $_POST['we_status[]'];
    $n_we_govtsvcs = $_POST['we_govtsvcs[]'];

    // VOLUNTARY WORK
    $n_vw_nameaddress = $_POST['vw_nameaddress[]'];
    $n_vw_date_from = $_POST['vw_date_from[]'];
    $n_vw_date_to = $_POST['vw_date_to[]'];
    $n_vw_hrs = $_POST['vw_hrs[]'];
    $n_vw_position = $_POST['vw_position[]'];
    
    // LEARNING AND DEVELOPMENT
    $n_lnd_title = $_POST['lnd_title[]'];
    $n_lnd_date_from = $_POST['lnd_date_from[]'];
    $n_lnd_date_to = $_POST['lnd_date_to[]'];
    $n_lnd_hrs = $_POST['lnd_hrs[]'];
    $n_lnd_type = $_POST['lnd_type[]'];
    $n_lnd_sponsor = $_POST['lnd_sponsor[]'];

    // OTHER INFORMATION
    $n_skills = $_POST['skills[]'];
    $n_distinctions = $_POST['distinctions[]'];
    $n_membership = $_POST['membership[]'];

    $n_radio_degree_3rd = $_POST['radio_degree_3rd'];

    $n_radio_degree_4th = $_POST['radio_degree_4th'];
    $n_input_degree_4th = $_POST['input_degree_4th'];

    $n_radio_guilty = $_POST['radio_guilty'];
    $n_input_guilty = $_POST['input_guilty'];

    $n_radio_charged = $_POST['radio_charged'];
    $n_input_filed = $_POST['input_filed'];
    $n_input_status = $_POST['input_status'];

    $n_radio_convicted = $_POST['radio_convicted'];
    $n_input_convicted = $_POST['input_convicted'];

    $n_radio_seperated = $_POST['radio_seperated'];
    $n_input_seperated = $_POST['input_seperated'];

    $n_radio_candidate = $_POST['radio_candidate'];

    $n_radio_resigned = $_POST['radio_resigned'];
    $n_input_resigned = $_POST['input_resigned'];

    $n_radio_immigrant = $_POST['radio_immigrant'];
    $n_input_immigrant = $_POST['input_immigrant'];

    $n_radio_indigenous = $_POST['radio_indigenous'];
    $n_input_indigenous = $_POST['input_indigenous'];

    $n_radio_disability = $_POST['radio_disability'];
    $n_input_disability = $_POST['input_disability'];

    $n_radio_soloparent = $_POST['radio_soloparent'];
    $n_input_soloparent = $_POST['input_soloparent'];

    // REFERENCES
    $n_ref_name = $_POST['ref_name[]'];
    $n_ref_address = $_POST['ref_address[]'];
    $n_ref_telno = $_POST['ref_telno[]'];

    $n_govtid_type = $_POST['govtid_type'];
    $n_govtid_no = $_POST['govtid_no'];
    $n_govtid_issuance = $_POST['govtid_issuance'];

    // if an employee doesn't have a middle name
    $middlename = ($n_pi_name_middle === "N/A") ? "" : " " . $n_pi_name_middle;
    // if an employee doesn't have a name extension
    $nameext = ($n_pi_name_ext === "N/A") ? "" : " " . $n_pi_name_ext;

    // for profile picture
    $filename = $n_pi_name_last . ", " . $n_pi_name_first . $middlename . $nameext;
    $file = $_FILES['change_photo']['name']; //basename.ext
    $fileext = pathinfo($file, PATHINFO_EXTENSION); //ext

    $temp = $_FILES['change_photo']['tmp_name']; //temporary location
    $n_itemimgdir = "products/" . $filename . "." . $fileext; ///target location
}