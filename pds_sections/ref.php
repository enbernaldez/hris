<div class="container-fluid">
    <div class="row mt-5 text-center">
        <div class="col-4">
            <p class="mt-3">NAME</p>
            <?php
            for ($i=0; $i < 3; $i++) { 
                echo '<input type="text" name="ref_name[]" class="form-control mt-3" required>';
            }
            ?>
        </div>
        <div class="col-4">
            <p class="mt-3">ADDRESS</p>
            <?php
            for ($i=0; $i < 3; $i++) { 
                echo '<input type="text" name="ref_address[]" class="form-control mt-3" required>';
            }
            ?>
        </div>
        <div class="col-4">
            <p class="mt-3">TEL NO.</p>
            <?php
            for ($i= 0; $i < 3; $i++) {
                echo '<input type="text" name="ref_tel_no[]" class="form-control mt-3" required>';
            }
            ?>
        </div>
    </div>
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
                <input type="text" class="form-control" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">ID/License/Passport No.:</span>
                </div>
                <input type="text" class="form-control" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">Date/Place of Issuance:</span>
                </div>
                <input type="text" class="form-control" required>
            </div>
        </div>
        <!-- Image -->
        <div class="col-6">
            <div class="mt-2 d-flex flex-column align-items-end">
                <img id="profile_img" src="images/person.png" alt="profile" style="height:150px; width:auto;">
                <div class="mt-3">
                    <input type="file" class="form-control" id="change_photo" name="change_photo" style="width: 150px;">
                </div>
            </div>
        </div>
    </div>
</div>