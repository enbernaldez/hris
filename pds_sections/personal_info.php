<div class="container-fluid section-pi">

    <?php
    if (isset($_GET['office'])) {
        $office = $_GET['office'];
        echo '<input required type="text" name="office" value="' . $office . '">';
    }
    ?>
    <!-- EMPLOYEE'S FULL NAME -->
    <div class="row mt-5">

        <div class="col mx-2">
            <label for="name_last">SURNAME</label><br>
            <input type="text" required name="name_last" id="name_last" class="form-control input test">
        </div>
        <div class="col mx-2">
            <label for="name_first">FIRST NAME</label><br>
            <input type="text" required name="name_first" id="name_first" class="form-control input">
        </div>
        <div class="col mx-2">
            <label for="name_middle">MIDDLE NAME</label><br>
            <div class="checkbox-container">
                <input type="text" required name="name_middle" id="name_middle" class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_middle">
                    <label class="form-check-label" for="null_middle">N/A</label>
                </div>
            </div>
        </div>
        <div class="col-2 mx-2">
            <label for="name_ext">NAME EXTENSION</label><br>
            <div class="checkbox-container">
                <input type="text" required name="name_ext" id="name_ext" class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_ext">
                    <label class="form-check-label" for="null_ext">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="birth_date">DATE OF BIRTH</label><br>
            <input type="date" required name="birth_date" id="birth_date" class="form-control input">

        </div>
        <div class="col mx-2">
            <label for="birth_place">PLACE OF BIRTH</label><br>
            <input type="text" required name="birth_place" id="birth_place" class="form-control input">
        </div>
        <div class="col mx-2">
            <label for="sex">SEX</label><br>
            <select id="sex" required name="sex" class="form-select input">
                <option value="" disabled selected value>--select--</option>
                <option value='M'>Male</option>";
                <option value='F'>Female</option>";
            </select>
        </div>
        <div class="col mx-2">
            <label for="civilstatus">CIVIL STATUS</label><br>
            <select id="civilstatus" required name="civilstatus" class="form-select input">
                <option value="" disabled selected value>--select--</option>
                <option value='S'>Single</option>";
                <option value='M'>Married</option>";
                <option value='C'>Common law</option>";
                <option value='W'>Widowed</option>";
                <option value='H'>Separated</option>";
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="height">HEIGHT (m)</label><br>
            <input type="number" required name="height" id="height" class="form-control input" min="1" step="0.01"
                max="2">
        </div>
        <div class="col mx-2">
            <label for="weight">WEIGHT (kg)</label><br>
            <input type="text" required name="weight" id="weight" class="form-control input">
        </div>
        <div class="col mx-2">
            <label for="bloodtype">BLOOD TYPE</label><br>
            <select id="bloodtype" required name="bloodtype" class="form-select input">
                <option value="" disabled selected value>--select--</option>
                <option value='O+'>O+</option>";
                <option value='O-'>O-</option>";
                <option value='A+'>A+</option>";
                <option value='A-'>A-</option>";
                <option value='B+'>B+</option>";
                <option value='B-'>B-</option>";
                <option value='AB+'>AB+</option>";
                <option value='AB-'>AB-</option>";
            </select>
        </div>
    </div>

    <!-- EMPLOYEE'S ID'S -->
    <div class="row mt-3">
        <div class="col mx-2">
            <label for="gsis">GSIS ID NO.</label><br>
            <input type="text" required name="id_gsis" id="gsis" class="form-control input uppercase">
        </div>
        <div class="col mx-2">
            <label for="pagibig">PAG-IBIG ID NO.</label><br>
            <input type="text" required name="id_pagibig" id="pagibig" class="form-control input uppercase">
        </div>
        <div class="col mx-2">
            <label for="philhealth">PHILHEALTH NO.</label><br>
            <input type="text" required name="id_philhealth" id="philhealth" class="form-control input uppercase">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="sss">SSS NO.</label><br>
            <input type="text" required name="id_sss" id="sss" class="form-control input uppercase">
        </div>
        <div class="col mx-2">
            <label for="tin">TIN NO.</label><br>
            <input type="text" required name="id_tin" id="tin" class="form-control input uppercase">
        </div>
        <div class="col mx-2">
            <label for="employee_no">AGENCY EMPLOYEE NO.</label><br>
            <input type="text" required name="id_agency" id="employee_no" class="form-control input uppercase">
        </div>
    </div>

    <!-- EMPLOYEE'S CITIZENSHIP -->
    <div class="row mt-3">
        <div class="col mx-2">
            <label for="citizenship">CITIZENSHIP</label><br>
            <select id="citizenship" required name="citizenship" class="form-select input">
                <option value="" disabled selected value>--select--</option>
                <option value='F'>Filipino</option>";
                <option value='D'>Dual Citizenship</option>";
            </select>
        </div>
        <div class="col mx-2">
            <label for="citizenship_by">CITIZENSHIP BY</label><br>
            <select id="citizenship_by" required name="citizenship_by" class="form-select input" disabled>
                <option value="" disabled>--select--</option>
                <option value="F" selected value hidden>N/A</option>
                <option value='B'>Birth</option>";
                <option value='N'>Naturalization</option>";
            </select>
        </div>
        <div class="col mx-2">
            <label for="citizenship_country">If Holder of Dual Citizenship, please indicate
                country</label><br>
            <input type="text" required name="citizenship_country" id="citizenship_country" class="form-control input"
                value="N/A" disabled>
        </div>
    </div>

    <!-- RESIDENTIAL ADDRESS -->
    <h5 class="mt-5">RESIDENTIAL ADDRESS</h5>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="radd_province">PROVINCE</label>
            <select id="radd_province" required name="radd_province" class="form-select input">
                <?php
                $list_province = query($conn, "SELECT * FROM `provinces`");
                echo '<option value="" disabled selected value>--select--</option>';
                foreach ($list_province as $key => $row) {
                    $prov_id = $row['province_id'];
                    $prov_name = $row['province_name'];
                    echo "<option value='" . $prov_name . "'>" . $prov_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="radd_citymunicipality">CITY/MUNICIPALITY</label>
            <select id="radd_citymunicipality" required name="radd_citymunicipality" class="form-select input">
                <?php
                $list_citymunicipality = query($conn, "SELECT * FROM `city_municipality`");
                echo '<option value="" disabled selected value>--select--</option>';
                foreach ($list_citymunicipality as $key => $row) {
                    $cm_id = $row['citymunicipality_id'];
                    $cm_name = $row['citymunicipality_name'];
                    echo "<option value='" . $cm_name . "'>" . $cm_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="radd_barangay">BARANGAY</label>
            <input type="text" required name="radd_barangay" id="radd_barangay" class="form-control input">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="radd_subdivisionvillage">SUBDIVISION/VILLAGE</label><br>
            <div class="checkbox-container">
                <input type="text" required name="radd_subdivisionvillage" id="radd_subdivisionvillage"
                    class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_rsv">
                    <label class="form-check-label" for="null_rsv">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="radd_street">STREET</label><br>
            <div class="checkbox-container">
                <input type="text" required name="radd_street" id="radd_street" class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_rst">
                    <label class="form-check-label" for="null_rst">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="radd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
            <div class="checkbox-container">
                <input type="text" required name="radd_houseblocklot" id="radd_houseblocklot"
                    class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_rhbl">
                    <label class="form-check-label" for="null_rhbl">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3 mx-2">
            <label for="radd_zipcode">ZIPCODE</label>
            <input type="number" required name="radd_zipcode" id="radd_zipcode" class="form-control input" min="400"
                max="9900">
        </div>
    </div>

    <!-- PERMANENT ADDRESS -->
    <div class="mt-5">
        <h5 style="display: inline">PERMANENT ADDRESS</h5>
        <div class="form-check form-check-inline ms-2">
            <input class="form-check-input" type="checkbox" id="same_add" name="same_add" value="true">
            <label class="form-check-label" for="same_add">Same as the Residential Address</label>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="padd_province">PROVINCE</label>
            <select id="padd_province" required name="padd_province" class="form-select input">
                <?php
                $list_province = query($conn, "SELECT * FROM `provinces`");
                echo '<option value="" disabled selected value>--select--</option>';
                foreach ($list_province as $key => $row) {
                    $prov_id = $row['province_id'];
                    $prov_name = $row['province_name'];
                    echo "<option value='" . $prov_name . "'>" . $prov_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="padd_citymunicipality">CITY/MUNICIPALITY</label>
            <select id="padd_citymunicipality" required name="padd_citymunicipality" class="form-select input">
                <?php
                $list_citymunicipality = query($conn, "SELECT * FROM `city_municipality`");
                echo '<option value="" disabled selected value>--select--</option>';
                foreach ($list_citymunicipality as $key => $row) {
                    $cm_id = $row['citymunicipality_id'];
                    $cm_name = $row['citymunicipality_name'];
                    echo "<option value='" . $cm_name . "'>" . $cm_name . "</option>";
                } ?>
            </select>
        </div>
        <div class="col mx-2">
            <label for="padd_barangay">BARANGAY</label>
            <input type="text" required name="padd_barangay" id="padd_barangay" class="form-control input">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col mx-2">
            <label for="padd_subdivisionvillage">SUBDIVISION/VILLAGE</label><br>
            <div class="checkbox-container">
                <input type="text" required name="padd_subdivisionvillage" id="padd_subdivisionvillage"
                    class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_psv">
                    <label class="form-check-label" for="null_psv">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="padd_street">STREET</label><br>
            <div class="checkbox-container">
                <input type="text" required name="padd_street" id="padd_street" class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_pst">
                    <label class="form-check-label" for="null_pst">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="padd_houseblocklot">HOUSE/BLOCK/LOT NO.</label><br>
            <div class="checkbox-container">
                <input type="text" required name="padd_houseblocklot" id="padd_houseblocklot"
                    class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_phbl">
                    <label class="form-check-label" for="null_phbl">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3 mx-2">
            <label for="padd_zipcode">ZIPCODE</label>
            <input type="number" required name="padd_zipcode" id="padd_zipcode" class="form-control input" min="400"
                max="9900">
        </div>
    </div>

    <!-- CONTACT DETAILS -->
    <div class="row mt-5">
        <div class="col mx-2">
            <label for="no_tel">TELEPHONE NO.</label><br>
            <div class="checkbox-container">
                <input type="tel" required name="no_tel" id="no_tel" class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_telno">
                    <label class="form-check-label" for="null_telno">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <label for="no_mobile">MOBILE NO.</label><br>
            <input type="tel" required name="no_mobile" id="no_mobile" class="form-control input" maxlength="11">
        </div>
        <div class="col mx-2">
            <label for="emailadd">EMAIL ADDRESS</label><br>
            <div class="checkbox-container">
                <input type="email" required name="emailadd" id="emailadd" class="form-control input">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_emailadd">
                    <label class="form-check-label" for="null_emailadd">N/A</label>
                </div>
            </div>
        </div>

    </div>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-slide="next" id="nextButton_pi">
        <strong>NEXT</strong>
    </button>

    <!-- SUBMIT BUTTON -->
    <!-- <button type="submit" class="btn btn-primary mt-5 mx-1 button-right">
        <strong>SUBMIT</strong>
    </button> -->

</div>

<script>
    //========================= Next Button =====================================
    // Document ready function
    document.addEventListener('DOMContentLoaded', function () {
        var carouselElement = document.querySelector('#carouselExample');
        var carousel = new bootstrap.Carousel(carouselElement);


        // Move to the next slide only if the form is filled out
        document.querySelector('#nextButton_pi').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.input');

            // Check if all input fields in the active slide are filled out
            var allFilled = true;
            inputs.forEach(function (input) {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });

            // If all input fields are filled out, move to the next carousel item
            if (allFilled) {
                carousel.next();
            } else {
                alert("Please fill out all input fields before proceeding.");
            }
        });
    });
    // ======================== Next Button ================================================
    // function submitForm() {
    //     // Get all input fields with class "input"
    //     var inputs = document.querySelectorAll('.input');

    //     // Check if all input fields are filled out
    //     var allFilled = true;
    //     inputs.forEach(function (input) {
    //         if (!input.value.trim()) {
    //             allFilled = false;
    //         }
    //     });

    //     // If all input fields are filled out, submit the form
    //     if (allFilled) {
    //         window.location.href = "pds_form.php?form_section=fam_bg";
    //     } else {
    //         alert("Please fill out all input fields before proceeding.");
    //     }
    // }


    telTypeArray = ["no_tel"];
    emailTypeArray = ["emailadd"];

    // ======================= N/A disable =======================
    function setupNullInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        checkbox.addEventListener("change", function () {
            if (this.checked) {

                input.type = "text";
                input.value = "N/A";
                input.disabled = true;

            } else {

                input.id == "no_tel" ? input.type = "tel" :
                    input.id == "emailadd" ? input.type = "email" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
            }
        });
        input.addEventListener("input", function () {
            if (this.value.trim().toLowerCase() === "n/a") {
                checkbox.checked = true;
                this.disabled = true;
            }
        });
    }

    // Call the function for each pair of checkbox and input
    // PERSONAL INFORMATION
    setupNullInput("null_middle", "name_middle");
    setupNullInput("null_ext", "name_ext");
    setupNullInput("null_rhbl", "radd_houseblocklot");
    setupNullInput("null_rst", "radd_street");
    setupNullInput("null_rsv", "radd_subdivisionvillage");
    setupNullInput("null_phbl", "padd_houseblocklot");
    setupNullInput("null_pst", "padd_street");
    setupNullInput("null_psv", "padd_subdivisionvillage");
    setupNullInput("null_telno", "no_tel");
    setupNullInput("null_emailadd", "emailadd");

    // ================================= Citizenship =================================
    const citizenshipSelect = document.getElementById("citizenship");
    const citizenshipBySelect = document.getElementById("citizenship_by");
    const citizenshipCountryInput = document.getElementById("citizenship_country");

    citizenshipSelect.addEventListener("change", function () {
        if (this.value === "D") {
            // If Dual Citizenship is selected, enable Citizenship By and Citizenship Country
            citizenshipBySelect.disabled = false;
            citizenshipCountryInput.disabled = false;
            citizenshipBySelect.value = "";
            citizenshipCountryInput.value = "";
        } else {
            // Reset Citizenship By and Citizenship Country values when Citizenship changes
            citizenshipBySelect.value = "F";
            citizenshipCountryInput.value = "N/A";
            // Otherwise, disable them
            citizenshipBySelect.disabled = true;
            citizenshipCountryInput.disabled = true;
        }
    });

    // ============ Same as the Residential Address Checkbox ============
    function copyValues(source, destination, isChecked, checkbox) {
        // destination.value = isChecked ? source.value : '';
        if (chk_same.checked) {
            destination.value = source.value;
            destination.disabled = true;
            checkbox.disabled = true;

            // If source is null, input is disabled and N/A checkbox is checked
            if (source.value == "N/A") {
                checkbox.checked = true;
            }
        } else {
            destination.disabled = false;
            checkbox.disabled = false;
        }
    }

    // Get references to the checkbox and input text elements
    const chk_same = document.getElementById("same_add");
    const sourceInputs = [
        document.getElementById("radd_zipcode"),
        document.getElementById("radd_province"),
        document.getElementById("radd_citymunicipality"),
        document.getElementById("radd_barangay"),
        document.getElementById("radd_subdivisionvillage"),
        document.getElementById("radd_street"),
        document.getElementById("radd_houseblocklot"),
    ];
    const destinationInputs = [
        document.getElementById("padd_zipcode"),
        document.getElementById("padd_province"),
        document.getElementById("padd_citymunicipality"),
        document.getElementById("padd_barangay"),
        document.getElementById("padd_subdivisionvillage"),
        document.getElementById("padd_street"),
        document.getElementById("padd_houseblocklot"),
    ];
    const naCheckboxes = [
        "", "", "", "",
        document.getElementById("null_psv"),
        document.getElementById("null_pst"),
        document.getElementById("null_phbl"),
    ];

    // Add event listener to the checkbox
    chk_same.addEventListener("change", function () {
        // Iterate over source and destination inputs, copying values accordingly
        sourceInputs.forEach((source, index) => {
            copyValues(
                source,
                destinationInputs[index],
                chk_same.checked,
                naCheckboxes[index]
            );
        });
    });
</script>