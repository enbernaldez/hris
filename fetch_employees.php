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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS - Search</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="https://unpkg.com/sweetalert/dist/swal.min.js"></script>
    <style>
        .employees-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .tile {
            width: 450px;
            height: 100px;
            background-color: #80A1F5;
            border-radius: 12px;
            padding: 10px;
            margin: 10px;
        }
        .titletext {
            color: #E4E9FF;
            text-align: center;
            margin: 0;
        }
        /* context menu */
        #customContextMenu {
            position: absolute;
            background-color: #E4E9FF;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            padding: 5px 0;
            z-index: 1000;
        }
        #customContextMenu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        #customContextMenu ul li {
            padding: 8px 15px;
            cursor: pointer;
        }
        #customContextMenu ul li:hover {
            background-color: #80A1F5;
        }
        .modal-content-style {
            background-color: #C2CDFF;
            height: auto;
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('sidebar1.php'); ?>
            <div class="col-10 px-5 pt-3 pb-5">
                <img src="images/PSA banner.jpg" alt="PSA Banner" class="img-fluid" style="max-height: 128px;">

                <div class="col-4 mt-3">
                    <form action="search_bar.php" method="GET">
                        <div class="input-group mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control text-center mt-3 custom-rounded" name="search" placeholder="Search Employee" value="<?php echo htmlspecialchars($search); ?>" />
                                <div class="input-group-append mt-3">
                                    <button class="btn btn-primary" type="submit" style="border-top-right-radius: 17px; border-bottom-right-radius: 17px;">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="employeesContainer" class="employees-container mt-3">
                    <?php
                    if (count($employees) > 0) {
                        foreach ($employees as $employee) {
                            echo '<div class="tile">';
                            echo '<div class="row">';
                            echo '<div class="col-3">';
                            echo '<img src="'. ($employee['employee_imgdir'] ?: 'id_pictures/no profile.png') .'" alt="No Profile" height="80px" width="auto">';
                            echo '</div>';
                            echo '<div class="col-8">';
                            echo '<p style="margin: 0"><strong>'. strtoupper($employee['employee_firstname']) .' '. strtoupper($employee['employee_middlename']) .' '. strtoupper($employee['employee_lastname']) .'</strong></p>';
                            echo '<p style="margin: 0; font-size: 14px;">'. $employee['position_id'] .'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="mt-4 text-center"><p>No employees found.</p></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
