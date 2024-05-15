<?php
include_once "db_conn.php";
include_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['titleInput'];
    $type = $_POST['typeOfLdInput'];
    $employees = $_POST['training_employee'];
    $from = $_POST['date_from'];
    $to = $_POST['date_to'];
    $hrs = $_POST['numberOfHours'];
    $sponsor = $_POST['conducted_Sponsoredby'];

    $title_id = lookupId($conn, $title, 'ld_titles', 'ld_title_id', 'ld_title_name', '', '');
    $sponsor_id = lookupId($conn, $sponsor, 'sponsors', 'sponsor_id', 'sponsor_name', '', '');

    echo "
        Title: " . $title_id . "<br>
        Type of LD: " . $type . "<br>
        Employees:<br>
    ";
        
    foreach ($employees as $employee) {
        echo "&emsp;{$employee}<br>";
    }
        
    echo "
        Date From: " . $from . "<br>
        Date To: " . $to . "<br>
        Number of Hours: " . $hrs . "<br>
        Conducted/Sponsored By: " . $sponsor_id . "<br>
    ";

    foreach ($employees as $employee) {
        $table = 'learning_development';
        $fields = array(
            'employee_id' => $employee,
            'ld_title_id' => $title_id,
            'ld_from' => $from,
            'ld_to' => $to,
            'ld_hrs' => $hrs,
            'ld_type' => $type,
            'sponsor_id' => $sponsor_id,
        );
        insert($conn, $table, $fields);
    }

    header("location: trainings.php?add_training=success&training_added=" . $title_id);
}