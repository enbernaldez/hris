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
            <p>GOV'T SERVICE (Y/N)</p>
        </div>
    </div>

    <div class="row-container text-center">
        <div class="row row-row mt-3">
            <div class="col-3">
                <div class="checkbox-container">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="null_work_exp">
                        <label class="form-check-label">N/A</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="date" required name="we_from" id="we_from" class="form-control group_na">
                        </div>
                        <div class="col-6">
                            <input type="date" required name="we_to" id="we_to" class="form-control group_na">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <input type="text" name="we_position_title" id="we_position_title" class="form-control group_na">
            </div>
            <div class="col-2">
                <input type="text" name="we_dept_agency" id="we_dept_agency" class="form-control group_na">
            </div>
            <div class="col-1">
                <input type="text" name="we_mo_salary" id="we_mo_salary" class="form-control group_na">
            </div>
            <div class="col-1">
                <input type="text" name="we_sg" id="we_sg" class="form-control group_na">
            </div>
            <div class="col-2">
                <input type="text" name="we_appointment_status" id="we_appointment_status"
                    class="form-control group_na">
            </div>
            <div class="col-1">
                <select id="we_govt_service" required name="we_govt_service" class="form-select group_na">
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
</div>

<script>
    // ============================ N/A Array Disable ============================
    function setupNullInputArray(checkboxId, inputIds, chkboxIds) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));
        const checkboxes = chkboxIds.map((id) => document.getElementById(id));

        checkbox.addEventListener("change", function () {
            if (this.checked) {
                inputs.forEach((input) => {

                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;
                });
                checkboxes.forEach((chkbx) => {
                    chkbx.checked = true;
                    chkbx.disabled = true;
                });
            } else {
                inputs.forEach((input) => {

                    input.id == "we_from" || input.id == "we_to" ? input.type = "date" :
                        input.type = "text";

                    input.value = "";
                    input.disabled = false;
                });
                checkboxes.forEach((chkbx) => {
                    chkbx.checked = false;
                    chkbx.disabled = false;
                });
            }
        });
    }

    // WORK EXPERIENCE
    setupNullInputArray("null_work_exp", [
        "we_from",
        "we_to",
        "we_position_title",
        "we_dept_agency",
        "we_mo_salary",
        "we_sg",
        "we_appointment_status",
        "we_govt_service",
        "we_addrow",
    ], []);

    // =================================== Add Row ===================================
    function addRow() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });

        // Append the cloned row to the container
        document.querySelector(".row-container").appendChild(newRow);

        // Change the N/A checkbox to a delete button
        var checkbox = newRow.querySelector(".form-check-input");
        checkbox.checked = false; // Uncheck the checkbox
        checkbox.id = ""; // Remove id to avoid duplication
        checkbox.removeAttribute("onclick"); // Remove onclick event
        checkbox.setAttribute("type", "button"); // Change type to button
        checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
        checkbox.nextElementSibling.textContent = "Delete"; // Change label text
    }

    // =============== Delete Row ===============
    function deleteRow(button) {
        var row = button.closest(".row-row");
        row.remove();
    }
</script>