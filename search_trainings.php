<?php
include_once "db_conn.php";

$query = $_GET['query'] ?? '';

$sql = "SELECT ld_titles.ld_title_id, ld_titles.ld_title_name, GROUP_CONCAT(learning_development.ld_type SEPARATOR '/') AS ld_types, MAX(learning_development.date_added) AS date_added
        FROM ld_titles
        JOIN learning_development ON ld_titles.ld_title_id = learning_development.ld_title_id
        WHERE ld_titles.ld_title_name LIKE ? 
        GROUP BY ld_titles.ld_title_id
        ORDER BY date_added DESC";

$filter = array("%$query%");
$result = query($conn, $sql, $filter);

echo json_encode($result);