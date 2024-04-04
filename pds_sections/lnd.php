<div class="container-fluid">
    <div class="row mt-4 text-center align-items-end">
        <div class="col-3">
            <p>
                TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>
                (Write in full)
            </p>
        </div>
        <div class="col-3">
            <div class="row">
                <p>INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)</p>
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
        <div class="col-3">
            <p>
                TYPE OF LD<br>(Managerial / Supervisory / Technical / etc.)
            </p>
        </div>
        <div class="col-2">
            <p>CONDUCTED/SPONSORED BY (Write in full)</p>
        </div>

    </div>

    <div class="row-container">
        <div class="row row-row mt-3">
            <div class="col-3">
                <div class="checkbox-container">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="null_lnd">
                        <label class="form-check-label">N/A</label>
                    </div>
                    <input type="text" name="lnd_title" id="lnd_title" class="form-control group-na">
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <input type="date" required name="lnd_from" id="lnd_from" class="form-control group-na">
                    </div>
                    <div class="col-6">
                        <input type="date" required name="lnd_to" id="lnd_to" class="form-control group-na">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type="number" name="lnd_hrs" id="lnd_hrs" class="form-control group-na">
            </div>
            <div class="col-3">
                <input type="text" name="lnd_type" id="lnd_type" class="form-control group-na">
            </div>
            <div class="col-2">
                <input type="text" name="lnd_conducted" id="lnd_conducted" class="form-control group-na">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3 mt-4">
            <button type="button" class="btn btn-primary add-row-button" id="lnd_addrow" name="lnd_addrow"
                onclick="addRow()">ADD ROW</button>
        </div>
    </div>
</div>

<script>
    // ============================ N/A Array Disable ============================
    function setupNullInputArray(checkboxId, inputIds) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));

        checkbox.addEventListener("change", function () {
            if (this.checked) {
                inputs.forEach((input) => {

                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;
                });
            } else {
                inputs.forEach((input) => {

                    input.id == "lnd_from" || input.id == "lnd_to" ? input.type = "date" :
                        input.id == "lnd_hrs" ? input.type = "number" :
                            input.type = "text";

                    input.value = "";
                    input.disabled = false;
                });
            }
        });
    }

    // LEARNING AND DEVELOPMENT
    setupNullInputArray("null_lnd", [
        "lnd_title",
        "lnd_from",
        "lnd_to",
        "lnd_hrs",
        "lnd_type",
        "lnd_conducted",
        "lnd_addrow",
    ]);

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