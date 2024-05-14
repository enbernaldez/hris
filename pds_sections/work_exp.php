<div class="container-fluid">
    <div class="row mt-4 text-center align-items-end">
        <div class="col-3">
            <div class="row ms-5">
                <p class="mb-0">INCLUSIVE DAT
                    ES</p>
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

    <div class="row-container text-center">
        <div class="row row-row mt-3">
            <div class="col-3">
                <div class="checkbox-container">
                    <div class="form-check me-2 remove_na">
                        <input class="form-check-input" type="checkbox" id="null_work_exp" name="null_work_exp"
                            value="true">
                        <label class="form-check-label" for="null_work_exp">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <div class="row">
                        <div class="col-6">
                            <input type="date" required name="we_date_from[]" id="we_date_from"
                                class="form-control group_na" value="">
                        </div>
                        <div class="col-6">
                            <input type="date" required name="we_date_to[]" id="we_date_to"
                                class="form-control group_na" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <input type="text" name="we_position[]" id="we_position" class="form-control group_na" required
                    value="">
            </div>
            <div class="col-2">
                <input type="text" name="we_agency[]" id="we_agency" class="form-control group_na" required value="">
            </div>
            <div class="col-1">
                <input type="text" name="we_salary[]" id="we_salary" class="form-control group_na" required value="₱">
            </div>
            <div class="col-1">
                <input type="text" name="we_sg[]" id="we_sg" class="form-control group_na" required value="">
            </div>
            <div class="col-2">
                <input type="text" name="we_status[]" id="we_status" class="form-control group_na" required value="">
            </div>
            <div class="col-1">
                <select required name="we_govtsvcs[]" id="we_govtsvcs" class="form-select group_na">
                    <option value="" disabled selected value>--select--</option>
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- BUTTON -->
    <div class="row">
        <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" name="we_addrow" id="we_addrow"
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
    // ======================== Next Button ================================================
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
            window.location.href = "pds_form.php?form_section=voluntary_work";
        } else {
            alert("Please fill out all input fields before proceeding.");
        }
    }

    // ============================ N/A Array Disable ============================
    const originalOptions = {};

    function setupNullInputArray(checkboxId, inputIds, selectIds) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));
        const selects = selectIds.map((id) => document.getElementById(id));

        selects.forEach((select) => {
            originalOptions[select.id] = Array.from(select.options).map((option) => {
                return { value: option.value, text: option.text };
            });
        });

        checkbox.addEventListener("change", function () {
            if (this.checked) {
                inputs.forEach((input) => {
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
                const clonedRows = document.querySelectorAll(".row-container .row-row");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row')) {
                        clonedRow.remove();
                    }
                });
            } else {
                inputs.forEach((input) => {

                    input.id == "we_date_from" || input.id == "we_date_to" ? input.type = "date" :
                        input.type = "text";

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

            }
        });
    }

    // WORK EXPERIENCE
    setupNullInputArray("null_work_exp", [
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
   
    function addRow() {
    // Clone the input-row element
    var newRow = document.querySelector(".row-row").cloneNode(true);
    // Inside the addRow() function, after appending the cloned row
console.log("Peso Sign: ", document.getElementById('we_salary').value);


    // Clear input values in the cloned row
    newRow.querySelectorAll("input").forEach((input) => {
        input.value = "";
    });
    var salary = newRow.querySelector("#we_salary");
    salary.value = "₱";

    // Get the reference node (the original row)
    var referenceNode = document.querySelector(".row-container .row-row");

    // Insert the cloned row before the reference node
    referenceNode.parentNode.insertBefore(newRow, referenceNode);

    //Remove the N/A checkbox and its associated text from the cloned row
    const clonedNaCheckbox = newRow.querySelector(".remove_na");
    if (clonedNaCheckbox) {
        clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
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

}
</script>