<?php
include_once ("db_conn.php");

if (isset ($_POST['province_name'])) {
    $provinceName = $_POST['province_name'];

    // Perform SQL query to fetch cities/municipalities based on the selected province
    $sql = "SELECT c.citymunicipality_id, c.citymunicipality_name 
            FROM city_municipality AS c
            JOIN provinces AS p ON c.province_id = p.province_id
            WHERE p.province_name = ?";

    $result = query($conn, $sql, array($provinceName));
    if ($result === false) {
        echo "Error executing query: " . mysqli_error($conn);
        exit;
    }

    $options = '<option value="" disabled selected value>--select--</option>';

    foreach ($result as $key => $row) {
        $citymunicipality_id = $row['citymunicipality_id'];
        $citymunicipality_name = $row['citymunicipality_name'];

        $options .= '<option value="' . $row['citymunicipality_name'] . '">' . $row['citymunicipality_name'] . '</option>';
    }

    // Return HTML options
    echo $options;
} else {
    // Handle if province_name is not set
    echo "Province name is not set.";
}