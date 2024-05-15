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
    <div class="row-container vw-row text-center">
        <div class="row row-row-vw mt-3">
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
                    <input type="text" name="vw_nameaddress[]" id="vw_nameaddress" class="form-control uppercase group_na_vw"
                        required>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6 px-1 mx-0">
                        <input type="date" required name="vw_date_from[]" id="vw_date_from"
                            class="form-control uppercase group_na_vw">
                    </div>
                    <div class="col-6 px-1 mx-0">
                        <input type="date" required name="vw_date_to[]" id="vw_date_to" class="form-control uppercase group_na_vw">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type="number" name="vw_hrs[]" id="vw_hrs" class="form-control uppercase group_na_vw" required>
            </div>
            <div class="col-4">
                <input type="text" name="vw_position[]" id="vw_position" class="form-control uppercase group_na_vw" required>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" name="vw_addrow" id="vw_addrow"
                onclick="addRow_vw()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-slide="next" id="nextButton_vw">
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
        document.querySelector('#nextButton_vw').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.group_na_vw');

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
    // =================================== Add Row ===================================
    function addRow_vw() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row-vw").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });

          // Get the reference node (the original row)
         var referenceNode = document.querySelector(".vw-row .row-row-vw");

        // Insert the cloned row before the reference node
        referenceNode.parentNode.insertBefore(newRow, referenceNode);

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
    }


    // ============================ N/A Array Disable ============================
    function setupNullInputArray_vw(checkboxId, inputIds) {
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
                const clonedRows = document.querySelectorAll(".vw-row .row-row-vw");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row-vw')) {
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
    setupNullInputArray_vw("null_vw", [
        "vw_nameaddress",
        "vw_date_from",
        "vw_date_to",
        "vw_hrs",
        "vw_position",
        "vw_addrow",
    ]);
</script>