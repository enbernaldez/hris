<?php
include_once "db_conn.php";
include_once "sql_utilities.php";

if (isset($_POST['employee_id'])) {

    $d_emp_id = $_POST['employee_id'];

    $table = "employees";
    $fields = array('employee_status' => 'I');
    $filter = array('employee_id' => $d_emp_id);

    if (update($conn, $table, $fields, $filter)) {
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit();
    }
}