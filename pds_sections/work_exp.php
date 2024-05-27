<div class="container-fluid">
    <div class="row mt-4 text-center align-items-end">
        <div class="col-3">
            <div class="row ms-5">
                <p class="mb-0">INCLUSIVE DATES</p>
                <p>(mm/dd/yy)</p>
            </div>
            <div class="row ms-5">
                <div class="col">
                    <p>FROM</p>
                </div>
                <div class="col">
                    <p>TO</p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>
                POSITION TITLE<br>
                (Write in full / Do not abbreviate)
            </p>
        </div>
        <div class="col-2">
            <p>
                DEPARTMENT/AGENCY/<br>OFFICE/COMPANY<br>(Write in full / Do not abbreviate)
            </p>
        </div>
        <div class="col-1">
            <p>MONTHLY SALARY</p>
        </div>
        <div class="col-1">
            <p>
                SALARY/JOB/PAY GRADE (if applicable) & STEP (Format "00-0")/<br>INCREMENT
            </p>
        </div>
        <div class="col-2">
            <p>STATUS OF APPOINTMENT</p>
        </div>
        <div class="col-1">
            <p>GOV'T SERVICE?</p>
        </div>
    </div>

    <div class="row-container_we text-center">
        <div class="row row-row_we mt-3">
            <div class="col-3">
                <div class="checkbox-container">
                    <div class="form-check me-2 mb-4 remove_na">
                        <input class="form-check-input" type="checkbox" id="null_work_exp" name="null_work_exp"
                            value="true" data-target="null_work_exp">
                        <label class="form-check-label" for="null_work_exp">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <div class="row">
                        <div class="col-6">
                            <input type="date" required name="we_date_from[]" id="we_date_from"
                                class="form-control uppercase group_na_we" value="">
                        </div>
                        <div class="col-6">
                            <input type="date" required name="we_date_to[]" id="we_date_to"
                                class="form-control uppercase group_na_we" value="">
                            <div class="form-check d-flex mt-2">
                                <input type="checkbox" id="present_we" onclick="presentWe(this)"
                                    class="form-check-input uppercase me-2 remove_present_vw">
                                <label for="present_we" class="form-check-label">PRESENT</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <input type="text" name="we_position[]" id="we_position" class="form-control uppercase group_na_we"
                    required value="">
            </div>
            <div class="col-2">
                <input type="text" name="we_agency[]" id="we_agency" class="form-control uppercase group_na_we" required
                    value="">
            </div>
            <div class="col-1">
                <input type="text" name="we_salary[]" id="we_salary" class="form-control uppercase group_na_we" required
                    value="₱" onclick="checkNA(this, 'we_salary_na')">
                <!-- <div class="mt-2">
                    <input class="form-check-input na-checkbox" type="checkbox" id="we_salary_na" name="we_salary_na" oninput="checkNA(this, 'we_salary')">
                    <label class="form-check-label" for="we_salary_na">N/A</label>
                </div> -->
            </div>
            <div class="col-1">
                <input type="text" name="we_sg[]" id="we_sg" class="form-control uppercase group_na_we" required
                    value="" onclick="checkNA(this, 'we_sg_na')">
                <!-- <div class="mt-2">
                    <input class="form-check-input na-checkbox" type="checkbox" id="we_sg_na" name="we_sg_na"  oninput="checkNA(this, 'we_sg')">
                    <label class="form-check-label" for="we_sg_na">N/A</label>
                </div> -->
            </div>
            <div class="col-2">
                <input type="text" name="we_status[]" id="we_status" class="form-control uppercase group_na_we" required
                    value="">
            </div>
            <div class="col-1">
                <select required name="we_govtsvcs[]" id="we_govtsvcs" class="form-select group_na_we">
                    <option value="" disabled selected value>--SELECT--</option>
                    <option value='Y'>YES</option>
                    <option value='N'>NO</option>
                </select>
            </div>
        </div>
    </div>

    <!-- BUTTON -->
    <div class="row">
        <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" name="we_addrow" id="we_addrow"
                onclick="addRow_we()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_we">
        <strong>CLEAR ALL</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-slide="next" id="nextButton_we">
        <strong>NEXT</strong>
    </button>
</div>

<script>
    //========================= Present =====================================
    function presentWe(checkbox) {
        const row = checkbox.closest('.row-row_we');  // Find the closest row
        const toDateInput = row.querySelector('[name="we_date_to[]"]');  // Select the TO date input within that row
        if (checkbox.checked) {
            toDateInput.type = 'text';
            toDateInput.value = "PRESENT";
            toDateInput.disabled = true;
        } else {
            toDateInput.type = 'date';
            toDateInput.value = "";
            toDateInput.disabled = false;
        }
    }
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll('#null_work_exp' , '#present_we');

        var originalOptions = {};

        // Store the original options of each select element
        var selects = document.querySelectorAll('select');
        selects.forEach(function (select) {
            originalOptions[select.id] = Array.from(select.options).map(function (option) {
                return { value: option.value, text: option.text };
            });
        });

        clearInputs.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var targets = checkbox.dataset.target.split(',');
                targets.forEach(function (targetId) {
                    var inputElement = document.getElementById(targetId.trim());
                    if (checkbox.checked) {
                        inputElement.value = '';
                    } else {
                        inputElement.disabled = false;
                    }
                });
            });
        });

        document.getElementById('clearButton_we').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.group_na_we');
            inputs.forEach((input) => {

                input.id == "we_date_from" || input.id == "we_date_to" ? input.type = "date" : 
                    input.type = "text";

                input.value = "";
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Uncheck all "N/A" checkboxes
            var naCheckboxes = document.querySelectorAll('.na-checkbox');
            naCheckboxes.forEach(function (checkbox) {
                checkbox.checked = false;
                var input = checkbox.closest('div').querySelector('input[type="text"]');
                if (input) {
                    input.value = "";
                    input.disabled = false;
                }
            });

            // Uncheck all "PRESENT" checkboxes and reset TO date inputs
            var presentCheckboxes = document.querySelectorAll('#present_we');
                presentCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                    checkbox.disabled = false; // Ensure the PRESENT checkbox is enabled
                    var row = checkbox.closest('.row-row_we');
                    var toDateInput = row.querySelector('[name="we_date_to[]"]');
                    if (toDateInput) {
                        toDateInput.type = 'date';
                        toDateInput.value = "";
                        toDateInput.disabled = false;
                    }
                });

            // Restore original options for each select element
            selects.forEach(function (select) {
                var selectId = select.id;
                select.innerHTML = '';
                originalOptions[selectId].forEach(function (optionData) {
                    var option = document.createElement('option');
                    option.value = optionData.value;
                    option.text = optionData.text;
                    select.add(option);
                });
                select.disabled = false;
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.row-row_we');
            var lastIndex = childRows.length - 1;
            childRows.forEach(function (row, index) {
                if (index !== lastIndex) {
                    row.parentNode.removeChild(row);
                }
            });
            // Enable the "Add Row" button
            var addButton = document.getElementById('we_addrow');
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
        document.querySelector('#nextButton_we').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.group_na_we');

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

    function toggleNACheckbox(checkbox, input) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                input.value = "N/A";
                input.disabled = true;
            } else {
                input.value = "";
                input.disabled = false;
            }
        });
    }

    document.querySelectorAll('.na-checkbox').forEach(function (checkbox) {
        var input = checkbox.closest('div').querySelector('input[type="text"]');
        toggleNACheckbox(checkbox, input);
    });

    // ============================ N/A Array Disable ============================
    function setupNullInputArray_we(checkboxId, inputIds, selectIds) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));
        const selects = selectIds.map((id) => document.getElementById(id));

        const originalOptions = {};

        selects.forEach((select) => {
            originalOptions[select.id] = Array.from(select.options).map((option) => {
                return { value: option.value, text: option.text };
            });
        });

        checkbox.addEventListener("change", function () {
            const row = this.closest('.row-row_we'); // Find the closest row
            const presentCheckbox = row.querySelector('[id="present_we"]'); // Find the 'PRESENT' checkbox in the same row

            if (this.checked) {
                // Uncheck and disable the 'PRESENT' checkbox if 'N/A' is checked
                if (presentCheckbox) {
                    presentCheckbox.checked = false;
                    presentCheckbox.disabled = true;
                    const toDateInput = row.querySelector('[name="we_date_to[]"]');
                    if (toDateInput) {
                        toDateInput.type = 'date';
                        toDateInput.value = "";
                        toDateInput.disabled = false;
                    }
                } inputs.forEach((input) => {
                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;
                });
                selects.forEach((select) => {
                    select.innerHTML = "";
                    const optionNA = document.createElement("option");
                    optionNA.text = "N/A";
                    optionNA.value = "N/A";
                    select.appendChild(optionNA);
                    select.disabled = true;
                });
                // Remove cloned rows if they exist
                const clonedRows = document.querySelectorAll(".row-container_we .row-row_we");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row_we')) {
                        clonedRow.remove();
                    }
                });
            } else {
                if (presentCheckbox) {
                    presentCheckbox.disabled = false;
                }

                // Check the individual "N/A" checkboxes for salary and salary grade
                // document.querySelectorAll('.na-checkbox').forEach(function (naCheckbox) {
                //     naCheckbox.checked = true;
                //     var input = naCheckbox.closest('div').querySelector('input[type="text"]');
                //     toggleNACheckbox(naCheckbox, input);
                // });
            // } else {
                inputs.forEach((input) => {
                    if (input.id == "we_date_from" || input.id == "we_date_to") {
                        input.type = "date";
                    } else {
                        input.type = "text";
                    }
                    input.value = "";
                    input.disabled = false;
                });
                selects.forEach((select) => {
                    select.innerHTML = "";
                    originalOptions[select.id].forEach((optionData) => {
                        const option = document.createElement("option");
                        option.text = optionData.text;
                        option.value = optionData.value;
                        select.appendChild(option);
                    });
                    select.disabled = false;
                });

                // Uncheck the individual "N/A" checkboxes for salary and salary grade
                document.querySelectorAll('.na-checkbox').forEach(function (naCheckbox) {
                    naCheckbox.checked = false;
                    var input = naCheckbox.closest('div').querySelector('input[type="text"]');
                    toggleNACheckbox(naCheckbox, input);
                });
            }
        });
    }

    // WORK EXPERIENCE
    setupNullInputArray_we("null_work_exp", [
        "we_date_from",
        "we_date_to",
        "we_position",
        "we_agency",
        "we_salary",
        "we_sg",
        "we_status",
        "we_addrow",
    ],
        [
            "we_govtsvcs"
        ]);

    // =================================== Add Row ===================================
    function addRow_we() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row_we").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });
        var salary = newRow.querySelector("#we_salary");
        salary.value = "₱";

        // Get the reference node (the original row)
        var referenceNode = document.querySelector(".row-container_we .row-row_we");

        // Insert the cloned row before the reference node
        referenceNode.parentNode.insertBefore(newRow, referenceNode);

        // Remove the N/A checkbox and its associated text from the cloned row
        const clonedNaCheckbox = newRow.querySelector(".remove_na");
        if (clonedNaCheckbox) {
            clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
        }

        // Remove the present checkbox and its label from the cloned row, and uncheck the present checkbox
        const clonedPresentCheckbox = newRow.querySelector(".form-check .form-check-input");
        if (clonedPresentCheckbox) {
            clonedPresentCheckbox.closest('.form-check').remove();
        } else {
            const presentCheckbox = newRow.querySelector('.remove_present_we input[type="checkbox"]');
            if (presentCheckbox) {
                presentCheckbox.checked = false;
            }
        }

        // Show and configure the delete button for the cloned row
        const deleteButton = newRow.querySelector(".delete-row-button");
        if (deleteButton) {
            deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
            deleteButton.style.display = "inline-block";
            deleteButton.addEventListener("click", function () {
                newRow.parentNode.removeChild(newRow);
            });
        }
        newRow.querySelectorAll('.na-checkbox').forEach(function (checkbox) {
            var input = checkbox.closest('div').querySelector('input[type="text"]');
            toggleNACheckbox(checkbox, input);
        });

        // Enable the TO date field in the cloned row and reset its type to 'date' if 'PRESENT' is not checked
        const toDateInput = newRow.querySelector('[name="we_date_to[]"]');
        if (toDateInput) {
            toDateInput.type = 'date'; // Ensure TO date input field type is set to 'date'
            toDateInput.value = "";
            toDateInput.disabled = false;
        }
    }

    function setupNullInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        // if retrieved value is N/A
        if (input.value == "N/A") {
            checkbox.checked = true;
            input.disabled = true;
        }

        // if checkbox is toggled
        checkbox.addEventListener("change", function () {
            if (this.checked) {

                input.value = "N/A";
                input.disabled = true;

            } else {

                input.value = "";
                input.disabled = false;
            }
        });

        // if N/A is inputted
        input.addEventListener("input", function () {
            if (this.value.trim().toLowerCase() === "n/a") {
                checkbox.checked = true;
                this.disabled = true;
            }
        })
    }

    // setupNullInput("we_salary_na", "we_salary");
    // setupNullInput("we_sg_na", "we_sg");

</script>


