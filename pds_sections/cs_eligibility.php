<div class="container-fluid">
    <div class="row mt-4 text-center align-items-end">
        <div class="col-4">
            <p>CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES CSEE
                BARANGAY ELIGIBILITY/DRIVER'S LICENSE
            </p>
        </div>
        <div class="col-1">
            <p>RATING<br>(if applicable)</p>
        </div>
        <div class="col-2">
            <p>DATE OF EXAMINATION/CONFERMENT</p>
        </div>
        <div class="col-2">
            <p>PLACE OF EXAMINATION/CONFERMENT</p>
        </div>
        <div class="col-3">
            <div class="row">
                <p>LICENSE (if applicable)</p>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>NUMBER</p>
                </div>
                <div class="col-6">
                    <p>DATE OF VALIDITY</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row-container cs-row">
        <div class="row row-row-cs mt-3">
            <div class="col-4">
                <div class="checkbox-container">
                    <div class="form-check me-2 remove_na">
                        <input class="form-check-input" type="checkbox" id="null_cse" onclick="checkNA_cs(this)">
                        <label class="form-check-label" for="null_cse">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="careerservice[]" id="careerservice" class="form-control group-na-cs"
                        required>
                </div>
            </div>
            <div class="col-1">
                <input type="text" name="rating[]" id="rating" class="form-control group-na-cs" required>
            </div>
            <div class="col-2">
                <input type="date" name="exam_date[]" id="exam_date" class="form-control group-na-cs" required>
            </div>
            <div class="col-2">
                <input type="text" name="exam_place[]" id="exam_place" class="form-control group-na-cs" required>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="license_number[]" id="license_number" class="form-control group-na-cs"
                            required>
                    </div>
                    <div class="col-6">
                        <input type="date" name="license_dateofvalidity[]" id="license_dateofvalidity"
                            class="form-control group-na-cs" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" id="cse_addrow" name="cse_addrow"
                onclick="addRow_cs()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" id="nextButton_cs" data-bs-slide="next">
        <strong>NEXT</strong>
    </button>

</div>

<script>
//========================= Next Button =====================================
    // Document ready function
    document.addEventListener('DOMContentLoaded', function () {
        var carouselElement = document.querySelector('#carouselExample');
        var carousel = new bootstrap.Carousel(carouselElement);


        // Move to the next slide only if the form is filled out
        document.querySelector('#nextButton_cs').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.group-na-cs');

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

    // ============ Function to disable input fields if "N/A" checkbox is checked =========
    function disableInputs() {
        var inputs = document.querySelectorAll(".group-na-cs");
        var cse_addrow = document.getElementById("cse_addrow");
        inputs.forEach(function (input) {
            input.type = "text";
            input.value = "N/A";
            input.disabled = true;
            cse_addrow.disabled = true;
        });
    }
    // ======================== Next button ====================================
    // function submitForm() {
    //     // Get all input fields with class "group_na"
    //     var inputs = document.querySelectorAll('.group-na-cs');

    //     // Check if all input fields are filled out
    //     var allFilled = true;
    //     inputs.forEach(function (input) {
    //         if (!input.value.trim()) {
    //             allFilled = false;
    //         }
    //     });

    //     // If all input fields are filled out, submit the form
    //     if (allFilled) {
    //         window.location.href = "pds_form.php?form_section=work_exp";
    //     } else {
    //         alert("Please fill out all input fields before proceeding.");
    //     }
    // }

    function addRow_cs() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row-cs").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });

        // Remove the "N/A" checkbox and its associated label from the cloned row
        const clonedNaCheckbox = newRow.querySelector(".remove_na");
        if (clonedNaCheckbox) {
            clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
        }

        // Find the delete button in the cloned row and enable it 
        const deleteButton = newRow.querySelector(".delete-row-button");
        if (deleteButton) {
            deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
            deleteButton.style.display = "inline-block";
            deleteButton.addEventListener("click", function () {
                newRow.parentNode.removeChild(newRow);
            });
        }

        // Append the cloned row to the container
        document.querySelector(".cs-row").appendChild(newRow);
    }

    function checkNA_cs(checkbox) {
        var inputs = document.querySelectorAll(".group-na-cs");
        var cse_addrow = document.getElementById("cse_addrow");
        if (checkbox.checked) {
            naChecked = true;
            disableInputs();

            // Remove cloned rows if they exist
            const clonedRows = document.querySelectorAll(".cs-row .row-row-cs");
            clonedRows.forEach((clonedRow) => {
                if (clonedRow !== checkbox.closest('.row-row-cs')) {
                    clonedRow.remove();
                }
            });
        } else {
            naChecked = false;
            inputs.forEach(function (input) {
                input.id == "exam_date" || input.id == "license_dateofvalidity" ? input.type = "date" :
                    input.id == "license_number" ? input.type = "number" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
                cse_addrow.disabled = false;
            });
        }
    }

</script>