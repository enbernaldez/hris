<!DOCTYPE html>

<html lang="en">
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- SIDEBAR -->
            <?php
            include_once 'sidebar1.php';
            ?>

            <!-- CONTENT -->
            <div class="col-10 pb-5">
                <!-- PROFILE -->

                <?php
                include_once 'profile.php';
                include_once 'topnav.php';
                ?>

                <!-- FORM -->

                <form action="pds.php" method="post">

                    <?php
                    if (isset($_GET['form_section'])) {
                        $form_section = $_GET['form_section'];

                        switch ($form_section) {
                            case 'personal_info':
                                include_once 'pds_sections/personal_info.php';
                                break;
                            case "fam_bg":
                                include_once 'pds_sections/fam_bg.php';
                                break;
                            case "educ_bg":
                                // EDUCATIONAL BACKGROUND
                                break;
                            case "cs_eligibility":
                                include_once 'pds_sections/cs_eligibility.php';
                                break;
                            case "work_exp":
                                include_once 'pds_sections/work_exp.php';
                                break;
                            case "voluntary_work":
                                include_once "pds_sections/voluntary_work.php";
                                break;
                            case "lnd":
                                include_once "pds_sections/lnd.php";
                                break;
                            case "other_info":
                                ?>
                                <!-- OTHER INFORMATION -->
                                <?php
                                break;
                            case "references":
                                ?>
                                <!-- REFERENCES -->
                                <?php
                                break;
                        }
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>

    <script>

        // ============================ N/A Array Disable ============================
        telTypeArray = ["tel_no"];
        emailTypeArray = ["email_add"];

        function setupNullInputArray(checkboxId, inputIds, chkboxIds) {
            const checkbox = document.getElementById(checkboxId);
            const inputs = inputIds.map((id) => document.getElementById(id));
            const checkboxes = chkboxIds.map((id) => document.getElementById(id));

            checkbox.addEventListener("change", function () {
                if (this.checked) {
                    inputs.forEach((input) => {

                        input.type = "text";
                        input.value = "N/A";
                        input.disabled = true;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = true;
                        chkbx.disabled = true;
                    });
                } else {
                    inputs.forEach((input) => {
                        var tel = false;
                        var email = false;

                        for (var i = 0; i < telTypeArray.length; i++) {
                            if (inputId === numberTypeArray[i]) {
                                tel = true;
                                break;
                            }
                        }
                        for (var i = 0; i < emailTypeArray.length; i++) {
                            if (inputId === numberTypeArray[i]) {
                                email = true;
                                break;
                            }
                        }

                        tel ? input.type = "tel" : email ? input.type = "email" : null;

                        input.value = "";
                        input.disabled = false;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = false;
                        chkbx.disabled = false;
                    });
                }
            });
        }

        // ARRAYS




        // =================================== Add Row ===================================
        function addRow() {
            // Clone the input-row element
            var newRow = document.querySelector(".row-row").cloneNode(true);

            // Clear input values in the cloned row
            newRow.querySelectorAll("input").forEach((input) => {
                input.value = "";
            });

            // Append the cloned row to the container
            document.querySelector(".row-container").appendChild(newRow);

            // Change the N/A checkbox to a delete button
            var checkbox = newRow.querySelector(".form-check-input");
            checkbox.checked = false; // Uncheck the checkbox
            checkbox.id = ""; // Remove id to avoid duplication
            checkbox.removeAttribute("onclick"); // Remove onclick event
            checkbox.setAttribute("type", "button"); // Change type to button
            checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
            checkbox.nextElementSibling.textContent = "Delete"; // Change label text
        }

        // =============== Delete Row ===============
        function deleteRow(button) {
            var row = button.closest(".row-row");
            row.remove();
        }
    </script>

</body>

</html>