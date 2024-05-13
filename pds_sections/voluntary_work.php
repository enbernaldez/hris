<div class="container-fluid">
    <div class="row mt-4 text-center align-items-end">
        <div class="col-4">
            <p class="ms-5">NAME & ADDRESS OF ORGANIZATION</p>
        </div>
        <div class="col-3">
            <div class="row">
                <p>INCLUSIVE DATES <br>(mm/dd/yy)</p>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>FROM</p>
                </div>
                <div class="col-6">
                    <p>TO</p>
                </div>
            </div>
        </div>
        <div class="col-1">
            <p>NUMBER OF HOURS</p>
        </div>
        <div class="col-4">
            <p>POSITION/NATURE OF WORK</p>
        </div>
    </div>
    <div class="row-container text-center">
        <div class="row row-row mt-3">
            <div class="col-4">
                <div class="checkbox-container">
                    <div class="form-check me-2 remove_na">
                        <input class="form-check-input" type="checkbox" id="null_vw" name="null_vw" value="true"
                            onclick="checkNA(this)">
                        <label class="form-check-label" for="null_vw">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="vw_nameaddress[]" id="vw_nameaddress" class="form-control group_na"
                        required>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6 px-1 mx-0">
                        <input type="date" required name="vw_date_from[]" id="vw_date_from"
                            class="form-control group_na">
                    </div>
                    <div class="col-6 px-1 mx-0">
                        <input type="date" required name="vw_date_to[]" id="vw_date_to" class="form-control group_na">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type="number" name="vw_hrs[]" id="vw_hrs" class="form-control group_na" required>
            </div>
            <div class="col-4">
                <input type="text" name="vw_position[]" id="vw_position" class="form-control group_na" required>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" name="vw_addrow" id="vw_addrow"
                onclick="addRow()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-target="#carousel"
        data-bs-slide="next">
        <strong>NEXT</strong>
    </button>
</div>

<script>
    var naChecked = false;
    // Function to save form data to local storage
    function saveFormData() {
        var formDataArray = [];

        // Get all input rows with class "row-row"
        var rows = document.querySelectorAll('.row-row');

        rows.forEach(function (row, index) {
            var rowValues = {};
            var inputs = row.querySelectorAll('.group_na');

            inputs.forEach(function (input) {
                rowValues[input.id] = input.value;
            });

            formDataArray.push(rowValues);
        });

        // Save the "N/A" checkbox state
        localStorage.setItem('naChecked', naChecked);

        // Save the form data array
        localStorage.setItem('formDataArray', JSON.stringify(formDataArray));
    }

    // Function to load form data from local storage
    function loadFormData() {
        var storedDataArray = localStorage.getItem('formDataArray');
        if (storedDataArray) {
            var formDataArray = JSON.parse(storedDataArray);

            formDataArray.forEach(function (rowData, index) {
                if (index > 0) {
                    // Clone the original row to add a new row
                    var newRow = document.querySelector(".row-row").cloneNode(true);
                    document.querySelector(".row-container").appendChild(newRow);

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
                }

                // Get the current row
                var currentRow = document.querySelectorAll(".row-row")[index];

                // Populate the input fields in the current row with stored values
                Object.keys(rowData).forEach(function (key) {
                    var inputField = currentRow.querySelector("#" + key);
                    if (inputField) {
                        inputField.value = rowData[key];
                    }
                });
            });

            naChecked = localStorage.getItem('naChecked') === 'true';
            console.log(naChecked);
            var checkbox = document.getElementById('null_vw');
            if (naChecked && checkbox) {
                checkbox.checked = true;
                disableInputs();
            }
        }
    }

    // Call loadFormData() when the page loads
    window.addEventListener('load', loadFormData);

    // Save form data to local storage before refreshing or leaving the page
    window.addEventListener('beforeunload', saveFormData);

    function disableInputs() {
        var inputs = document.querySelectorAll(".group_na");
        var vw_addrow = document.getElementById("vw_addrow");
        inputs.forEach(function (input) {
            input.type = "text";
            input.value = "N/A";
            input.disabled = true;
            vw_addrow.disabled = true;
        });
    }

    // ======================== Next button ====================================
    function submitForm() {
        // Get all input fields with class "group_na"
        var inputs = document.querySelectorAll('.group_na');

        // Check if all input fields are filled out
        var allFilled = true;
        inputs.forEach(function (input) {
            if (!input.value.trim()) {
                allFilled = false;
            }
        });

        // If all input fields are filled out, submit the form
        if (allFilled) {
            window.location.href = "pds_form.php?form_section=lnd";
        } else {
            alert("Please fill out all input fields before proceeding.");
        }
    }

    // =================================== Add Row ===================================
    function addRow() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });

        //Remove the n/a checkbox and its associated text from the cloned row
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
        document.querySelector(".row-container").appendChild(newRow);
    }


    // ============================ N/A Array Disable ============================
    function setupNullInputArray(checkboxId, inputIds) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));

        checkbox.addEventListener("change", function () {
            if (this.checked) {
                naChecked = true;
                inputs.forEach((input) => {

                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;
                });
                // Remove cloned rows if they exist
                const clonedRows = document.querySelectorAll(".row-container .row-row");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row')) {
                        clonedRow.remove();
                    }
                });
            } else {
                naChecked = false;
                inputs.forEach((input) => {

                    input.id == "vw_date_from" || input.id == "vw_date_to" ? input.type = "date" :
                        input.id == "vw_hrs" ? input.type = "number" :
                            input.type = "text";

                    input.value = "";
                    input.disabled = false;
                });
            }
        });
    }

    // VOLUNTARY WORK
    setupNullInputArray("null_vw", [
        "vw_nameaddress",
        "vw_date_from",
        "vw_date_to",
        "vw_hrs",
        "vw_position",
        "vw_addrow",
    ]);
</script>