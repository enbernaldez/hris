<div class="container-fluid">
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
    for ($i=0; $i < 3; $i++) {
        $required = "";
        if ($i == 0) {
            $required = " required";
        }
        echo '
            <div class="row mt-3">
                <div class="col-4">
                    <input type="text" name="ref_name['.$i.']" class="form-control"' . $required . '>
                </div>
                <div class="col-4">
                    <input type="text" name="ref_address['.$i.']" class="form-control"' . $required . '>
                </div>
                <div class="col-4">
                    <input type="tel" name="ref_telno['.$i.']" class="form-control"' . $required . ' maxlength="11">
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
                <input type="text" class="form-control" name="govtid_type" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">ID/License/Passport No.:</span>
                </div>
                <input type="text" class="form-control uppercase" name="govtid_no" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">Date/Place of Issuance:</span>
                </div>
                <input type="text" class="form-control" name="govtid_issuance" required>
            </div>
        </div>
        <!-- Image -->
        <div class="col-6">
            <div class="mt-2 d-flex flex-column align-items-end">
                <img id="profile_img" name="profile_img" src="images/person.png" alt="profile"
                    style="height:150px; width:auto;">
                <div class="mt-3">
                    <input type="file" class="form-control" id="change_photo" name="change_photo" style="width: 150px;" required>
                </div>
            </div>
        </div>
    </div>

<!-- BACK BUTTON -->
<button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
    data-bs-slide="prev">
    <strong>PREV</strong>
</button>

    <!-- SUBMIT BUTTON -->
    <button type="submit" class="btn btn-primary mt-5 mx-1 button-right">
        <strong>SUBMIT</strong>
    </button>
</div>