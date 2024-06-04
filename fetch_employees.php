<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include_once("db_conn.php");

// Get search query from GET parameters
$search = $_GET['search'] ?? '';

// Prepare SQL query to fetch employee data based on the search query
$sql = "SELECT * FROM employees 
        WHERE CONCAT(employee_firstname, ' ', employee_middlename, ' ', employee_lastname) LIKE ?";

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare($sql);
if (!$stmt) {
    // Handle prepare error
    die("Prepare failed: " . $conn->error);
}

$search_param = "%" . $search . "%";
if (!$stmt->bind_param("s", $search_param)) {
    // Handle bind error
    die("Bind failed: " . $stmt->error);
}

if (!$stmt->execute()) {
    // Handle execute error
    die("Execute failed: " . $stmt->error);
}

// Get result set from the executed statement
$result = $stmt->get_result();
if (!$result) {
    // Handle get result error
    die("Get result failed: " . $stmt->error);
}

// Fetch all rows from the result set and store them in an array
$employees = $result->fetch_all(MYSQLI_ASSOC);

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($employees);
?>



