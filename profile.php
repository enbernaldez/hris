<?php

if (isset($_GET['employee_id'])) {

    $sql = "SELECT *
            FROM `employees`
            WHERE `employee_id` = ?";
    $filter = array($_GET['employee_id']);
    $result = query($conn, $sql, $filter);
    $row = $result[0];

    $imgdir = $row['employee_imgdir'];

    $firstname = $row['employee_firstname'];
    $middlename = ($row['employee_middlename'] == "N/A") ? "" : " " . $row['employee_middlename'];
    $lastname = $row['employee_lastname'];
    $nameext = ($row['employee_nameext'] == 'N/A') ? "" : " " . $row['employee_nameext'];

    $position_id = $row['position_id'];

    $sql = "SELECT `position_title` FROM `positions` WHERE `position_id` = ?";
    $filter = array($position_id);
    $result = query($conn, $sql, $filter);
    $row = $result[0];

    $position = $row['position_title'];

    $alt_name = $lastname . ", " . $firstname . $middlename . $nameext;
    $full_name = $firstname . $middlename . " " . $lastname . $nameext;
} else {

    $imgdir = "id_pictures/no profile.png";
    $alt_name = "Employee Full Name";
    $full_name = "Employee Full Name";
    $position = "Position Title";
}


?>
<div class="row mt-2 mb-2">
    <div class="col-2">
        <img src="<?php echo $imgdir; ?>" alt="<?php echo $alt_name; ?>" style="height: 150px; width: auto"
            class="float-end" />
    </div>
    <div class="col my-auto">
        <p class="display-6"><strong><?php echo $full_name; ?></strong></p>
        <h4><strong><?php echo $position; ?></strong></h4>
    </div>
    <div class="col-2">
        <img src="images/PSA Vector.png" alt="profile" style="height: 150px; width: auto" class="float-start" />
    </div>
</div>