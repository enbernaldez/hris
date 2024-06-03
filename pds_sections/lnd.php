<div class="container-fluid">
<?php

if (isset($_GET['employee_id'])) {

    $sql = "SELECT *
            FROM `employees`
            WHERE `employee_id` = ?";
    $filter = array($_GET['employee_id']);
    $result = query($conn, $sql, $filter);
    $row = $result[0];

    $firstname = $row['employee_firstname'];
    $middlename = ($row['employee_middlename'] == "N/A") ? "" : " " . $row['employee_middlename'];
    $lastname = $row['employee_lastname'];
    $nameext = ($row['employee_nameext'] == 'N/A') ? "" : " " . $row['employee_nameext'];

    $full_name = $firstname . $middlename . " " . $lastname . $nameext;
}

?>
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
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left button-nav" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_lnd">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right button-nav" data-bs-slide="next" id="nextButton_lnd">
        <strong>NEXT</strong>
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

<script>
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll("#null_lnd");

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

        document.getElementById('clearButton_lnd').addEventListener('click', function () {
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
            var lastIndex = childRows.length - 1;
            childRows.forEach(function (row, index) {
                if (index !== lastIndex) {
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