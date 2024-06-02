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
                        <input class="form-check-input" type="checkbox" id="null_lnd" name="null_lnd" value="true"
                            data-target="null_lnd">
                        <label class="form-check-label" for="null_lnd">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" required name="lnd_title[]" id="lnd_title"
                        class="form-control uppercase group-na-lnd">
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <input type="date" required name="lnd_date_from[]" id="lnd_date_from"
                            class="form-control uppercase group-na-lnd">
                    </div>
                    <div class="col-6">
                        <input type="date" required uppercase name="lnd_date_to[]" id="lnd_date_to"
                            class="form-control uppercase group-na-lnd">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type="number" required name="lnd_hrs[]" id="lnd_hrs" class="form-control uppercase group-na-lnd">
            </div>
            <div class="col-3">
                <input type="text" required name="lnd_type[]" id="lnd_type" class="form-control uppercase group-na-lnd">
            </div>
            <div class="col-2">
                <input type="text" required name="lnd_sponsor[]" id="lnd_sponsor"
                    class="form-control uppercase group-na-lnd">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3 mt-4">
            <button type="button" class="btn btn-primary add-row-button" id="lnd_addrow" name="lnd_addrow"
                onclick="addRow_lnd()">ADD ROW</button>
        </div>
        <div class="col mt-4">
            <button class="btn btn-primary" id="download-pdf" style="float: right; border: none;">Download PDF</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_lnd">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-slide="next" id="nextButton_lnd">
        <strong>NEXT</strong>
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

<script>
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById('clearButton_lnd').addEventListener('click', function () {
            var clearInputs = document.querySelectorAll("#null_lnd");

            var inputs = document.querySelectorAll('.group-na-lnd');
            inputs.forEach((input) => {

                input.id == "lnd_date_from" || input.id == "lnd_date_to" ? input.type = "date" :
                    input.id == "lnd_hrs" ? input.type = "number" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.row-row-lnd');
            childRows.forEach(function (row, index) {
                if (index !== 0) {
                    row.parentNode.removeChild(row);
                }
            });

            // Enable the "Add Row" button
            var addButton = document.getElementById('lnd_addrow');
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
    // ======================= Add Row =======================================
    function addRow_lnd() {
        // Clone the input-row element
        var parentRow = document.querySelector(".row-row-lnd");
        var newRow = parentRow.cloneNode(true);

        var parentInputs = parentRow.querySelectorAll("input");

        // Clear input values in the cloned row
        let index = 0;
        newRow.querySelectorAll("input").forEach((input) => {
            if (input.id != "null_lnd") {
                var oldId = input.getAttribute("id");
                var newId = generateUniqueId(oldId); // Generate a unique id 
                parentInputs[index].setAttribute("id", newId);

                //Update corresponding label ID
                var label = parentRow.querySelector(`label[for="${oldId}"]`);
                if (label) {
                    label.setAttribute("for", newId);
                }

                input.value = "";
            }

            index++
        });
        // Get the reference node (the original row)
        var referenceNode = document.querySelector(".lnd_row .row-row-lnd");

        // Insert the cloned row before the reference node
        referenceNode.parentNode.insertBefore(newRow, referenceNode);

        // Remove the "N/A" checkbox and its associated label from the cloned row
        var origNaCheckbox = parentRow.querySelector(".remove_na");
        if (origNaCheckbox) {
            origNaCheckbox.parentNode.removeChild(origNaCheckbox);
        }

        var newNaCheckbox = newRow.querySelector(".remove_na");
        if (newNaCheckbox) {
            var checkbox = newNaCheckbox.querySelector("input");
            checkbox.setAttribute("value", "true");
            newNaCheckbox.addEventListener("change", function () {
                setupNullInputArray_lnd("null_lnd", [
                    "lnd_title",
                    "lnd_date_from",
                    "lnd_date_to",
                    "lnd_hrs",
                    "lnd_type",
                    "lnd_sponsor",
                ]);
            });
        }

        // Find the delete button in the cloned row and enable it 
        var origDeleteButton = parentRow.querySelector(".delete-row-button");
        if (origDeleteButton) {
            origDeleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
            origDeleteButton.style.display = "inline-block";
            origDeleteButton.addEventListener("click", function () {
                if (parentRow.parentNode) {
                    parentRow.parentNode.removeChild(parentRow);
                }
            });
        }

        // Find the delete button in the cloned row and enable it 
        var deleteButton = newRow.querySelector(".delete-row-button");
        if (deleteButton) {
            deleteButton.style.display = "none";
            deleteButton.addEventListener("click", function () {
                if (newRow.parentNode) {
                    newRow.parentNode.removeChild(newRow);
                }
            });
        }
    }

    // ============================ N/A Array Disable ============================
    function setupNullInputArray_lnd(checkboxId, inputIds) {
        var checkbox = document.querySelector("#" + checkboxId);
        var inputs = inputIds.map((id) => document.querySelector('[id="' + id + '"]'));

        checkbox.addEventListener("change", function () {
            var row = this.closest('row-row-lnd'); //Find the closest row 

            if (this.checked) {
                //clear inputs
                inputs.forEach((input) => {

                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;
                });
                // Remove cloned rows if they exist
                var clonedRows = document.querySelectorAll(".lnd_row .row-row-lnd");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== checkbox.closest('.row-row-lnd')) {
                        clonedRow.remove();
                    }
                });
            } else {
                inputs.forEach((input) => {
                    if (input.id == "lnd_date_from" || input.id == "lnd_date_to") {
                        input.type = "date";
                    } else if (input.id == "lnd_hrs") {
                        input.type = "number";
                    } else {
                        input.type = "text";
                    }
                    input.value = "";
                    input.disabled = false;
                });
            }
        });
        if (checkbox.checked) {
            inputs.forEach((input) => {

                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
            });

            // Remove cloned rows if they exist
            var clonedRows = document.querySelectorAll(".lnd_row .row-row-lnd");
            clonedRows.forEach((clonedRow) => {
                if (clonedRow !== checkbox.closest('.row-row-lnd')) {
                    clonedRow.remove();
                }
            });
        } else {
            inputs.forEach((input) => {
                if (input.id === "lnd_date_from" || input.id === "lnd_date_to") {
                    input.type = "date";
                } else if (input.id === "lnd_hrs") {
                    input.type = "number";
                } else {
                    input.type = "text";
                }
                input.value = "";
                input.disabled = false;
            });
        }
    }

    // LEARNING AND DEVELOPMENT
    setupNullInputArray_lnd("null_lnd", [
        "lnd_title",
        "lnd_date_from",
        "lnd_date_to",
        "lnd_hrs",
        "lnd_type",
        "lnd_sponsor",
        "lnd_addrow",
    ]);
    //===============================Download PDF=========================
    document.getElementById('download-pdf').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const fullName = "<?php echo $full_name; ?>";

        // Add the full name at the top
        doc.setFontSize(12);
        doc.text(fullName, 15, 20); 

        // Prepare the table data
        const rows = [];
        document.querySelectorAll('.lnd_row .row-row-lnd').forEach((row) => {
            const title = row.querySelector('[name="lnd_title[]"]').value;
            const dateFrom = row.querySelector('[name="lnd_date_from[]"]').value;
            const dateTo = row.querySelector('[name="lnd_date_to[]"]').value;
            const hours = row.querySelector('[name="lnd_hrs[]"]').value;
            const type = row.querySelector('[name="lnd_type[]"]').value;
            const sponsor = row.querySelector('[name="lnd_sponsor[]"]').value;

            rows.push([title, dateFrom,  dateTo, hours, type, sponsor]);
        });

        // Add the table to the PDF with styling
        doc.autoTable({
            head: [[
                { content: 'TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS', rowSpan: 2 },
                { content: 'INCLUSIVE DATE OF ATTENDANCE', colSpan: 2, styles: { halign: 'center' } },
                { content: 'NUMBER OF HOURS', rowSpan: 2 },
                { content: 'TYPE OF LD', rowSpan: 2 },
                { content: 'CONDUCTED/SPONSORED BY', rowSpan: 2 }
            ], [
                { content: 'FROM', styles: { halign: 'center' } },
                { content: 'TO', styles: { halign: 'center' } }
            ]],
            body: rows,
            startY: 30,
            headStyles: {fontSize: 8, textColor: [0, 0, 0], halign: 'center', lineWidth: 0.1, lineColor: [0, 0, 0], },
            bodyStyles: {fontSize: 9, textColor: [0, 0, 0], halign: 'center', lineWidth: 0.1, lineColor: [0, 0, 0], },
            theme: 'plain',
        });

        // Save the PDF
        doc.save('lnd_report.pdf');
    });

    
</script>