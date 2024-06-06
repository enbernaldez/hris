<?php

if (isset($_GET['employee_id'])) {

    $sql = "SELECT *
            FROM `employees`
            WHERE `employee_id` = ?";
    $filter = array($_GET['employee_id']);
    $result = query($conn, $sql, $filter);
    if (!empty($result)) {
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
    }
} else {
    $middle_name = ($middlename == "N/A") ? "" : " " . $middlename;
    $name_ext = ($nameext == "N/A") ? "" : " " . $nameext;

    $imgdir = "id_pictures/no profile.png";
    $alt_name = $lastname . ", " . $firstname . $middle_name . $name_ext;
    $full_name = $firstname . $middle_name . " " . $lastname . $name_ext;
    $position = "[Position Title]";
}


?>
<div class="row mt-2 mb-2">
    <div class="col-2">
        <div class="image-container" style="border-radius:12px;">
            <img src="<?php echo $imgdir; ?>" alt="<?php echo $alt_name; ?>"
                id="header_profile_img" class="float-end" />
        </div>
    </div>
    <div class="col my-auto">
        <p class="display-6"><strong><?php echo $full_name; ?></strong></p>
        <h4><strong><?php echo $position; ?></strong></h4>
    </div>
    <div class="col-2">
        <img src="images/PSA Vector.png" alt="profile" style="height: 150px; width: auto" class="float-start" />
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ======================== ID Picture Display ==================================
        document.getElementById('change_photo').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('header_profile_img').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>