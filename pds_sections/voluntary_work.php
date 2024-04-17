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
                        <input class="form-check-input" type="checkbox" id="null_vw" onclick="checkNA(this)">
                        <label class="form-check-label" for="null_vw">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="vw_nameaddress[]" id="vw_nameaddress" class="form-control group_na" required>
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
                // Remove cloned rows if they exist
                const clonedRows = document.querySelectorAll(".row-container .row-row");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row')) {
                        clonedRow.remove();
                    }
                });
            } else {
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

        // Change the N/A checkbox to a delete button
        // var checkbox = newRow.querySelector(".form-check-input");
        // checkbox.checked = false; // Uncheck the checkbox
        // checkbox.id = ""; // Remove id to avoid duplication
        // checkbox.removeAttribute("onclick"); // Remove onclick event
        // checkbox.setAttribute("type", "button"); // Change type to button
        // checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
        // checkbox.nextElementSibling.textContent = "Delete"; // Change label text
    }

    // =============== Delete Row ===============
    // function deleteRow(button) {
    //     var row = button.closest(".row-row");
    //     row.remove();
    // }
</script>