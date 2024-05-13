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
                    <input type="number" name="ref_telno['.$i.']" class="form-control"' . $required . ' maxlength="11">
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
                <input type="number" class="form-control" name="govtid_type" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend ref-prepend">
                    <span class="input-group-text">ID/License/Passport No.:</span>
                </div>
                <input type="number" class="form-control uppercase" name="govtid_no" required>
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

<script>
    // Function to save form data to local storage
    function saveFormData() {
        var formData = {};

        // Save values from text and number inputs
        var textInputs = document.querySelectorAll('input[type="text"], input[type="number"]');
        textInputs.forEach(function(input) {
            formData[input.name] = input.value;
        });

        // Save values from select inputs
        var selectInputs = document.querySelectorAll('select');
        selectInputs.forEach(function(input) {
            formData[input.name] = input.value;
        });

        // Save values from textarea inputs
        var textareaInputs = document.querySelectorAll('textarea');
        textareaInputs.forEach(function(input) {
            formData[input.name] = input.value;
        });

        // Save the image data URL
        var imageInput = document.getElementById('change_photo');
        if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                formData['profile_img'] = e.target.result;
                // Save the form data object to local storage
                localStorage.setItem('formData', JSON.stringify(formData));
            }
            reader.readAsDataURL(imageInput.files[0]);
        } else {

            var storedFormData = localStorage.getItem('formData');
            if (storedFormData) {
                var storedData = JSON.parse(storedFormData);
                if (storedData['profile_img']) {
                    formData['profile_img'] = storedData['profile_img'];
                }
            }




            // Save the form data object to local storage without the image
            localStorage.setItem('formData', JSON.stringify(formData));
        }
    }

    // Function to load form data from local storage
    function loadFormData() {
        var storedFormData = localStorage.getItem('formData');
        if (storedFormData) {
            var formData = JSON.parse(storedFormData);

            // Set values to text inputs, select inputs, and textarea inputs
            var allInputs = document.querySelectorAll('input, select, textarea');
            allInputs.forEach(function(input) {
                if (formData[input.name]) {
                    input.value = formData[input.name];
                }
            });

            // Set the image preview
            var profileImg = document.getElementById('profile_img');
            if (formData['profile_img']) {
                profileImg.src = formData['profile_img'];
            }
        }
    }

    // Call loadFormData() when the page loads
    window.addEventListener('load', loadFormData);

    // Save form data to local storage before refreshing or leaving the page
    window.addEventListener('beforeunload', saveFormData);
</script>

