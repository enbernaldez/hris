<?php
include_once "db_conn.php";

$search_query = $_GET['query'] ?? '';

header('Content-Type: application/json');

// Sanitize input
$search_query = mysqli_real_escape_string($conn, $search_query);

$sql = "SELECT DISTINCT ld.ld_title_id, ld.date_added, lt.ld_title_name, GROUP_CONCAT(DISTINCT ld.ld_type SEPARATOR '/') AS ld_type
        FROM learning_development ld
        JOIN ld_titles lt ON ld.ld_title_id = lt.ld_title_id
        WHERE lt.ld_title_name LIKE '%$search_query%'
        GROUP BY ld.ld_title_id, ld.date_added, lt.ld_title_name
        ORDER BY ld.date_added DESC";

$result = mysqli_query($conn, $sql);

$trainings = [];
while ($row = mysqli_fetch_assoc($result)) {
    $trainings[] = [
        'ld_title_id' => $row['ld_title_id'],
        'ld_title_name' => $row['ld_title_name'],
        'ld_type' => $row['ld_type'],
        'date_added' => $row['date_added']
    ];
}

echo json_encode($trainings);

mysqli_close($conn);
?>

