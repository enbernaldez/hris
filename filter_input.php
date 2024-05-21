<?php
// test.php

include_once "db_conn.php";

if (isset($_POST['selectedValue'])) {

    $selectedOption = $_POST['selectedValue'];
    $table = $_POST['tableName'];
    $fk_column = $_POST['foreignKeyColumn'];
    $str = (str_replace("_", "", $table));
    $column = preg_replace('/s$/', '', $str);
    $name_column = ($table == "zipcodes") ? "{$column}_no" : "{$column}_name";

    if ($table == 'city_municipality' && $fk_column == 'citymunicipality_id') {
        $sql = "SELECT *
                FROM `zipcodes`
                WHERE `zipcode_no` = ?";
        $filter = array($selectedOption);
        $result = query($conn, $sql, $filter);
        $value = $result[0];
        $selectedOption = $value['citymunicipality_id'];
    }

    $sql = "SELECT *
            FROM `{$table}`
            WHERE `{$fk_column}` = ?
            ORDER BY `{$name_column}` ASC";
    $filter = array($selectedOption);
    $result = query($conn, $sql, $filter);

    $suboptions = [];

    foreach ($result as $value) {
        $id = $value["{$column}_id"];
        $name = $value[$name_column];

        if ($table == 'city_municipality') {
            $suboptions[] = [
                'value' => $id,
                'text' => $name,
            ];
        } else {
            $suboptions[] = [
                'value' => $name,
            ];
        }
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($suboptions);
}

// if (isset($_POST['selectedCityMunicipality'])) {
//     $selectedOption = $_POST['selectedCityMunicipality'];

//     $sql = "SELECT *
//             FROM `barangays`
//             WHERE `citymunicipality_id` = ?
//             ORDER BY `barangay_name` ASC";
//     $filter = array($selectedOption);
//     $result = query($conn, $sql, $filter);

//     $suboptions = [];

//     foreach ($result as $value) {
//         $id = $value['barangay_id'];
//         $name = $value['barangay_name'];

//         $suboptions[] = [
//             'value' => $name,
//         ];
//     }

//     // Return JSON response
//     header('Content-Type: application/json');
//     echo json_encode($suboptions);
// }
?>