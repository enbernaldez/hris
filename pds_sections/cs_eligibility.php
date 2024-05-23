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
                        <input class="form-check-input" type="checkbox" id="null_cse" onclick="checkNA_cs(this)"
                            data-target="null_cse">
                        <label class="form-check-label" for="null_cse">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="careerservice[]" id="careerservice"
                        class="form-control uppercase group-na-cs" required>
                </div>
            </div>
            <div class="col-1">
                <input type="text" name="rating[]" id="rating" class="form-control uppercase group-na-cs" required>
            </div>
            <div class="col-2">
                <input type="date" name="exam_date[]" id="exam_date" class="form-control uppercase group-na-cs"
                    required>
            </div>
            <div class="col-2">
                <input type="text" name="exam_place[]" id="exam_place" class="form-control uppercase group-na-cs"
                    required>
            </div>
            <div class="col-3 license">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="license_number[]" id="license_number"
                            class="form-control uppercase group-na-cs" required>
                    </div>
                    <div class="col-6">
                        <input type="date" name="license_dateofvalidity[]" id="license_dateofvalidity"
                            class="form-control uppercase group-na-cs" required>
                    </div>
                </div>
                <div class="mt-2">
                    <input class="form-check-input na-checkbox" type="checkbox" id="na_license" name="na_license"
                        oninput="NA_license(this)">
                    <label class="form-check-label" for="na_license">N/A</label>
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

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_cs">
        <strong>CLEAR ALL</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" id="nextButton_cs" data-bs-slide="next">
        <strong>NEXT</strong>
    </button>

</div>

<script>
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll('.form-check-input[type="checkbox"]');

        clearInputs.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var targets = checkbox.dataset.target.split(',');
                targets.forEach(function (targetId) {
                    var inputElement = document.getElementById(targetId.trim());
                    if (checkbox.checked) {
                        inputElement.value = '';
                        inputElement.disabled = true;
                    } else {
                        inputElement.disabled = false;
                    }
                });
            });
        });

        document.getElementById('clearButton_cs').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.group-na-cs');
            inputs.forEach(function (input) {
                input.id == "exam_date" || input.id == "license_dateofvalidity" ? input.type = "date" :
                    input.id == "license_number" ? input.type = "number" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.row-row-cs');
            var lastIndex = childRows.length - 1;
            childRows.forEach(function (row, index) {
                if (index !== lastIndex) {
                    row.parentNode.removeChild(row);
                }
            });
            // Enable the "Add Row" button
            var addButton = document.getElementById('cse_addrow');
            if (addButton) {
                addButton.disabled = false;
            }
        });
    });
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

    function addRow_cs() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row-cs").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });

        // Get the reference node (the original row)
        var referenceNode = document.querySelector(".cs-row .row-row-cs");

        // Insert the cloned row before the reference node
        referenceNode.parentNode.insertBefore(newRow, referenceNode);

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
        const naCheckbox = newRow.querySelector(".na-checkbox");
        if (naCheckbox) {
            naCheckbox.addEventListener("input", function () {
                checkNA(this, 'license_number', 'license_dateofvalidity');
            });
        }
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

    function NA_license(checkbox) {
        var row = checkbox.closest('.license');
        var inputs = row.querySelectorAll('input');
        if (checkbox.checked) {
            inputs.forEach(input => {
                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
            });
        } else {
            inputs.forEach(input => {
                input.type = (input.id == "license_dateofvalidity") ? "date" : "text";
                input.value = "N/A";
                input.disabled = true;
            });
        }
    }
   
</script> 