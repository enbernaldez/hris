<?php
include_once "db_conn.php";

$query = $_GET['query'] ?? '';

$sql = "SELECT ldt.ld_title_id, ldt.ld_title_name, GROUP_CONCAT(ld.ld_type SEPARATOR '/') AS ld_types, MAX(ld.date_added) AS date_added
        FROM ld_titles ldt
        JOIN learning_development ld ON ldt.ld_title_id = ld.ld_title_id
        JOIN employees e ON ld.employee_id = e.employee_id
        WHERE ldt.ld_title_name LIKE ? AND e.employee_status = 'A'
        GROUP BY ldt.ld_title_id, e.employee_id
        ORDER BY date_added DESC";

$filter = array("%$query%");
$result = query($conn, $sql, $filter);

echo json_encode($result);