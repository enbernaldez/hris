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

    <div class="row-container lnd_row">
        <div class="row row-row-lnd mt-3">
            <div class="col-3">
                <div class="checkbox-container">
                    <div class="form-check me-2 remove_na">
                        <input class="form-check-input" type="checkbox" id="null_lnd" name="null_lnd" value="true">
                        <label class="form-check-label" for="null_lnd">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="lnd_title[]" id="lnd_title" class="form-control group-na-lnd">
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <input type="date" required name="lnd_date_from[]" id="lnd_date_from"
                            class="form-control group-na-lnd">
                    </div>
                    <div class="col-6">
                        <input type="date" required name="lnd_date_to[]" id="lnd_date_to" class="form-control group-na-lnd">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type="number" name="lnd_hrs[]" id="lnd_hrs" class="form-control group-na-lnd">
            </div>
            <div class="col-3">
                <input type="text" name="lnd_type[]" id="lnd_type" class="form-control group-na-lnd">
            </div>
            <div class="col-2">
                <input type="text" name="lnd_sponsor[]" id="lnd_sponsor" class="form-control group-na-lnd">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3 mt-4">
            <button type="button" class="btn btn-primary add-row-button" id="lnd_addrow" name="lnd_addrow"
                onclick="addRow_lnd()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-slide="next" id="nextButton_lnd">
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
        document.querySelector('#nextButton_lnd').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.group-na-lnd');

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
    function addRow_lnd() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row-lnd").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });
        // Get the reference node (the original row)
    var referenceNode = document.querySelector(".lnd_row .row-row-lnd");

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
                const clonedRows = document.querySelectorAll(".lnd_row .row-row-lnd");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row-lnd')) {
                        clonedRow.remove();
                    }
                });
            } else {
                naChecked = false;
                inputs.forEach((input) => {

                    input.id == "lnd_date_from" || input.id == "lnd_date_to" ? input.type = "date" :
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
        "lnd_date_from",
        "lnd_date_to",
        "lnd_hrs",
        "lnd_type",
        "lnd_sponsor",
        "lnd_addrow",
    ]);
</script>