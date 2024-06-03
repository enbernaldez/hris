<div class="container-fluid">

    <?php

    if (isset($_GET['action']) && ($_GET['action'] == "view" || $_GET['action'] == "edit")) {
        $employee_id = $_GET['employee_id'];

        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
        ";

        $sql = "SELECT DISTINCT `employee_id`, `ref_name`, `ref_add`, `ref_telno`
                FROM `pds_references`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);

        if (!empty($result)) {
            $i = 0;
            foreach ($result as $key => $value) {
                $ref_name = json_encode($value['ref_name']);
                $ref_add = json_encode($value['ref_add']);
                $ref_telno = json_encode($value['ref_telno']);

                echo "
                    var names = document.getElementsByName('ref_name[]');
                    var addresses = document.getElementsByName('ref_address[]');
                    var telnos = document.getElementsByName('ref_telno[]');

                    names[$i].value = {$ref_name};
                    addresses[$i].value = {$ref_add};
                    telnos[$i].value = {$ref_telno};
                ";
                $i++;
            }
        }

        $sql = "SELECT DISTINCT *
                FROM `government_id`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);

        if (!empty($result)) {
            $value = $result[0];

            $govt_id_name = json_encode($value['govt_id_name']);
            $govt_id_no = json_encode($value['govt_id_no']);
            $gov_id_date_place = json_encode($value['govt_id_date_place']);

            echo "
                const govt_id_name = document.getElementById('govtid_type');
                const govt_id_no = document.getElementById('govtid_no');
                const gov_id_date_place = document.getElementById('govtid_issuance');

                govt_id_name.value = {$govt_id_name};
                govt_id_no.value = {$govt_id_no};
                gov_id_date_place.value = {$gov_id_date_place};
            ";
        }

        $sql = "SELECT `employee_id`, `employee_imgdir`
                FROM `employees`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);

        if (!empty($result)) {
            $value = $result[0];

            $img_dir = json_encode($value['employee_imgdir']);

            echo "
                const imgDir = document.getElementById('profile_img');

                imgDir.src = {$img_dir};
            ";
        }

        echo "
            });
        </script>
        ";
    }
    ?>
    <div class="row mt-3 text-center">
        <div class="col-4">
            <p class="mt-3">NAME</p>
        </div>
        <div class="col-4">
            <p class="mt-3">ADDRESS</p>
        </div>
        <div class="col-4">
            <p class="mt-3">TEL. NO.</p>
        </div>
    </div>
    <?php
    for ($i = 0; $i < 3; $i++) {
        $required = "";
        if ($i == 0) {
            $required = " required";
        }
        echo '
            <div class="row mt-3">
                <div class="col-4">
                    <input type="text" name="ref_name[]" class="form-control uppercase input_ref"' . $required . '>
                </div>
                <div class="col-4">
                    <input type="text" name="ref_address[]" class="form-control uppercase input_ref"' . $required . '>
                </div>
                <div class="col-4">
                    <input type="tel" name="ref_telno[]" id="ref_telno" class="form-control uppercase input_ref"' . $required . ' maxlength="11">
                </div>
            </div>
        ';
    } ?>
    <!-- Input Group -->
    <div class="row mt-5 align-items-end">
        <div class="col-6">
            <p>
                <strong>
                    Government Issued ID </strong>(i.e. Passport, GSIS, SSS, PRC, Driver's License etc) <br>
                <strong>Please INDICATE ID Number and Date of Issuance:</strong>
            </p>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">Government Issued ID:</span>
                </div>
                <input type="text" class="form-control uppercase input_ref" id="govtid_type" name="govtid_type"
                    required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">ID/License/Passport No.:</span>
                </div>
                <input type="text" class="form-control uppercase input_ref" id="govtid_no" name="govtid_no" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">Date/Place of Issuance:</span>
                </div>
                <input type="text" class="form-control uppercase input_ref" id="govtid_issuance" name="govtid_issuance"
                    required>
            </div>
        </div>
        <!-- Image -->
        <div class="col-6">
            <div class="mt-2 d-flex flex-column align-items-end">
                <img id="profile_img" name="profile_img" src="id_pictures/no profile.png" alt="profile"
                    style="height:150px; width:auto;">
                <div class="mt-3">
                    <input type="file" class="form-control input_ref" id="change_photo" name="change_photo"
                        style="width: 150px;" required>
                </div>
            </div>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left button-nav" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_ref">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- SUBMIT BUTTON -->
    <button type="submit" class="btn btn-primary mt-5 mx-1 button-right button-nav">
        <strong>SUBMIT</strong>
    </button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // ======================== Clear Button ==================================
        document.getElementById('clearButton_ref').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.input_ref');
            inputs.forEach(function (input) {
                if (input.id === "ref_telno") {
                    input.type = "tel";
                } else {
                    input.type = "text";
                }

                input.value = "";
                input.disabled = false;
            });

            // // Handle file input separately
            // var fileInput = document.getElementById('change_photo');
            // if (fileInput) {
            //     fileInput.value = '';
            // }

            // // Reset profile image if needed
            // var profileImg = document.getElementById('profile_img');
            // if (profileImg) {
            //     profileImg.src = 'images/person.png';
            // }
        });

        // ======================== ID Picture Display ==================================
        document.getElementById('change_photo').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profile_img').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>