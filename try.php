<?php
include_once "db_conn.php";

$selectedOption = '1';

$sql = "SELECT *
        FROM `city_municipality`
        WHERE `province_id` = ?
        ORDER BY `citymunicipality_name` ASC";
$filter = array($selectedOption);
$result = query($conn, $sql, $filter);

$suboptions = [];

foreach ($result as $value) {
    $cm_id = $value['citymunicipality_id'];
    $cm_name = $value['citymunicipality_name'];

    $suboptions[] = [
        'value' => $cm_id, 'text' => $cm_name,
    ];

    echo $cm_id . " => " . $cm_name . "<br>";
    echo '<pre>'; print_r($suboptions); echo '</pre>';
}