<div class="container-fluid">

    <?php
    if (isset($_GET['action']) && ($_GET['action'] == "view" || $_GET['action'] == "edit")) {
        $employee_id = $_GET['employee_id'];

        // `work_experience` table
        $sql = "SELECT DISTINCT `employee_id`, `workexp_from`, `workexp_to`, `position_id`, `daoc_id`, `workexp_salary_mo`, `workexp_paygrade_step`, `workexp_status`, `workexp_govtsvcs`
                FROM `work_experience`
                WHERE `employee_id` = ?
                ORDER BY
                    CASE 
                        -- Check if there is more than one workexp_to with '0000-00-00'
                        WHEN (SELECT COUNT(*) 
                            FROM `work_experience` 
                            WHERE `employee_id` = ?
                            AND `workexp_to` = '0000-00-00') > 1 
                            AND `workexp_to` = '0000-00-00'
                        THEN `workexp_from`
                        ELSE `workexp_to`
                    END
                DESC";
        $filter = array($employee_id, $employee_id);
        $result = query($conn, $sql, $filter);

        echo "
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
    ";

        if (isset($result[0]['position_id']) || $result[0]['position_id'] == "1") {
            echo "
            var checkbox = document.getElementById('null_work_exp');
            checkbox.checked = true;
            setupNullInputArray_we('null_work_exp',
                [
                    'we_date_from',
                    'we_date_to',
                    'we_position',
                    'we_agency',
                    'we_salary',
                    'we_sg',
                    'we_status'
                ],
                [
                    'we_govtsvcs'
                ],
                'we_addrow',
            );
        ";
        } else {

            foreach ($result as $key => $value) {

                // name attribute => db column
                $we_dets = array(
                    "we_date_from[]" => "from",
                    "we_date_to[]" => "to",
                    "we_position[]" => "position",
                    "we_agency[]" => "daoc",
                    "we_salary[]" => "salary_mo",
                    "we_sg[]" => "paygrade_step",
                    "we_status[]" => "status",
                    "we_govtsvcs[]" => "govtsvcs",
                );

                if (isset($daoc)) {
                    echo "
                    addRow_we();
                ";
                }

                foreach ($we_dets as $key => $dets) {

                    $name_att = json_encode($key);


                    if ($dets == "position" || $dets == "daoc") {
                        list($det, $name) = ($dets == "position") ? ["positions", "title"] : ["dept_agency_office_co", "name"];
                        $$dets = lookup($conn, $value["{$dets}_id"], $det, "{$dets}_{$name}", "{$dets}_id");

                    } else {

                        $$dets = $value['workexp_' . $dets];
                    }

                    echo "
                    var elements = document.querySelectorAll('[name={$name_att}]');
                    if (elements.length > 0) { 
                        var selectElement = elements[0];
                    }
                    selectElement.value = \"" . $$dets . "\";
                ";
                }
                // echo "<br>";
            }
        }

        echo "
        });
    </script>";
    }
    ?>
    <div class="row mt-4 text-center align-items-end">
        <div class="col-3">
            <div class="row ms-5">
                <p class="mb-0"><strong>INCLUSIVE DATES</strong><br>(mm/dd/yy)</p>
            </div>
            <div class="row ms-5">
                <div class="col">
                    <p><strong>FROM</strong></p>
                </div>
                <div class="col">
                    <p><strong>TO</strong></p>
                </div>
                <div class="row">
                    <i>
                        *Please keep all inclusive dates up to the present at the top of the list.
                    </i>
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>
                <strong>POSITION TITLE</strong><br>
                (Write in full / Do not abbreviate)
            </p>
        </div>
        <div class="col-2">
            <p>
                <strong>DEPARTMENT/AGENCY/<br>OFFICE/COMPANY</strong><br>(Write in full / Do not abbreviate)
            </p>
        </div>
        <div class="col-1">
            <p><strong>MONTHLY SALARY</strong></p>
        </div>
        <div class="col-1">
            <p>
                <strong>SALARY/JOB/ PAY GRADE</strong>
                (if applicable) <strong>& STEP</strong> (Format "00-0")/<br><strong>INCREMENT</strong>
            </p>
        </div>
        <div class="col-2">
            <p><strong>STATUS OF APPOINTMENT</strong></p>
        </div>
        <div class="col-1">
            <p><strong>GOV'T SERVICE?</strong></p>
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
                            <div class="form-check d-flex mt-1 mb-0">
                                <input type="checkbox" id="present_we" onclick="presentWe(this)"
                                    class="form-check-input uppercase me-2 remove_present_we">
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
                    value="₱">
                <!-- <div class="mt-2">
                    <input class="form-check-input na-checkbox" type="checkbox" id="we_salary_na" name="we_salary_na" oninput="checkNA(this, 'we_salary')">
                    <label class="form-check-label" for="we_salary_na">N/A</label>
                </div> -->
            </div>
            <div class="col-1">
                <input type="text" name="we_sg[]" id="we_sg" class="form-control uppercase group_na_we" required
                    value="">
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
    <div class="row mt-3">
        <div class="col-3">
            <button type="button" class="btn btn-primary add-row-button" name="we_addrow" id="we_addrow"
                onclick="addRow_we()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left button-nav" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_we">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right button-nav" data-bs-slide="next"
        id="nextButton_we">
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

        var topRow = document.querySelector(".row-row_we");
        var originalOptions = {};

        // Store the original options of each select element
        var selects = topRow.querySelectorAll('select');
        selects.forEach(function (select) {
            originalOptions[select.id] = Array.from(select.options).map(function (option) {
                return { value: option.value, text: option.text };
            });
        });

        document.getElementById('clearButton_we').addEventListener('click', function () {
            var clearInputs = document.querySelectorAll('#null_work_exp, #present_we');

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

            // Clear and restore specific select elements
            clearAndRestoreSelect_we('we_govtsvcs');

            // reset TO date inputs
            var presentCheckboxes = document.querySelectorAll('#present_we');
            presentCheckboxes.forEach(function (checkbox) {
                var row = checkbox.closest('.row-row_we');
                var toDateInput = row.querySelector('[name="we_date_to[]"]');
                if (toDateInput) {
                    toDateInput.type = 'date';
                    toDateInput.value = "";
                    toDateInput.disabled = false;
                }
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.row-row_we');
            childRows.forEach(function (row, index) {
                if (index !== 0) {
                    row.parentNode.removeChild(row);
                }
            });

            // Enable the "Add Row" button
            var addButton = document.getElementById('we_addrow');
            if (addButton) {
                addButton.disabled = false;
            }
        });

        function clearAndRestoreSelect_we(selectId) {
            var select = document.getElementById(selectId);
            if (select && originalOptions[selectId]) {
                select.innerHTML = ''; // Clear the select options
                originalOptions[selectId].forEach(function (optionData) {
                    var option = document.createElement('option');
                    option.value = optionData.value;
                    option.text = optionData.text;
                    select.add(option);
                });
                select.disabled = false; // Enable the select element
            }
        }

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

    // ============================ N/A Array Disable ============================
    function setupNullInputArray_we(checkboxId, inputIds, selectIds, addRowId) {
        var checkbox = document.querySelector("#" + checkboxId);
        var inputs = inputIds.map((id) => document.querySelector('[id="' + id + '"]'));
        var selects = selectIds.map((id) => document.querySelector('[id="' + id + '"]'));
        var addRowButton = document.querySelector("#" + addRowId);

        var originalOptions = {};

        selects.forEach((select) => {
            originalOptions[select.id] = Array.from(select.options).map((option) => {
                return { value: option.value, text: option.text };
            });
        });

        checkbox.addEventListener("change", function () {

            var row = this.closest('.row-row_we'); // Find the closest row
            var presentCheckbox = row.querySelector('[id="present_we"]'); // Find the 'PRESENT' checkbox in the same row

            if (this.checked) {
                // Uncheck and disable the 'PRESENT' checkbox if 'N/A' is checked
                if (presentCheckbox) {
                    presentCheckbox.checked = false;
                    presentCheckbox.disabled = true;
                    var toDateInput = row.querySelector('[name="we_date_to[]"]');
                    if (toDateInput) {
                        toDateInput.type = 'date';
                        toDateInput.value = "";
                        toDateInput.disabled = false;
                    }
                }

                // clear inputs
                inputs.forEach((input) => {
                    input.type = "text";
                    input.value = "N/A";
                    input.disabled = true;
                });

                selects.forEach((select) => {
                    select.innerHTML = "";
                    var optionNA = document.createElement("option");
                    optionNA.text = "N/A";
                    optionNA.value = "N/A";
                    select.appendChild(optionNA);
                    select.disabled = true;
                });

                addRowButton.disabled = true;

                // Remove cloned rows if they exist
                var clonedRows = document.querySelectorAll(".row-container_we .row-row_we");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== this.closest('.row-row_we')) {
                        clonedRow.remove();
                    }
                });
            } else {
                if (presentCheckbox) {
                    presentCheckbox.disabled = false;
                }

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
                        var option = document.createElement("option");
                        option.text = optionData.text;
                        option.value = optionData.value;
                        select.appendChild(option);
                    });
                    select.disabled = false;
                });

                addRowButton.disabled = false;
            }
        });

        var row = checkbox.closest('.row-row_we'); // Find the closest row
        var presentCheckbox = row.querySelector('[id="present_we"]'); // Find the 'PRESENT' checkbox in the same row

        if (checkbox.checked) {
            // Uncheck and disable the 'PRESENT' checkbox if 'N/A' is checked
            if (presentCheckbox) {
                presentCheckbox.checked = false;
                presentCheckbox.disabled = true;
                var toDateInput = row.querySelector('[name="we_date_to[]"]');
                if (toDateInput) {
                    toDateInput.type = 'date';
                    toDateInput.value = "";
                    toDateInput.disabled = false;
                }
            }

            // clear inputs
            inputs.forEach((input) => {
                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
            });

            selects.forEach((select) => {
                select.innerHTML = "";
                var optionNA = document.createElement("option");
                optionNA.text = "N/A";
                optionNA.value = "N/A";
                select.appendChild(optionNA);
                select.disabled = true;
            });

            addRowButton.disabled = true;

            // Remove cloned rows if they exist
            var clonedRows = document.querySelectorAll(".row-container_we .row-row_we");
            clonedRows.forEach((clonedRow) => {
                if (clonedRow !== checkbox.closest('.row-row_we')) {
                    clonedRow.remove();
                }
            });
        } else {
            if (presentCheckbox) {
                presentCheckbox.disabled = false;
            }

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
                    var option = document.createElement("option");
                    option.text = optionData.text;
                    option.value = optionData.value;
                    select.appendChild(option);
                });
                select.disabled = false;
            });

            addRowButton.disabled = false;
        }
    }

    // WORK EXPERIENCE
    setupNullInputArray_we("null_work_exp",
        [
            "we_date_from",
            "we_date_to",
            "we_position",
            "we_agency",
            "we_salary",
            "we_sg",
            "we_status"
        ],
        [
            "we_govtsvcs"
        ],
        "we_addrow"
    );

    // =================================== Add Row ===================================
    function addRow_we() {
        // Clone the input-row element
        var parentRow = document.querySelector(".row-row_we");
        var newRow = parentRow.cloneNode(true);

        var parentInputs = parentRow.querySelectorAll("input");

        // Clear input values in the cloned row
        let index = 0;
        newRow.querySelectorAll("input").forEach((input) => {
            if (input.id != "null_vw") {
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
        var salary = newRow.querySelector("#we_salary");
        salary.value = "₱";

        // Get the reference node (the original row)
        var referenceNode = document.querySelector(".row-container_we .row-row_we");

        // Insert the cloned row before the reference node
        referenceNode.parentNode.insertBefore(newRow, referenceNode);

        // Remove the N/A checkbox and its associated text from the parent row
        var origNaCheckbox = parentRow.querySelector(".remove_na");
        if (origNaCheckbox) {
            origNaCheckbox.parentNode.removeChild(origNaCheckbox);
        }

        var newNaCheckbox = newRow.querySelector(".remove_na");
        if (newNaCheckbox) {
            var checkbox = newNaCheckbox.querySelector("input");
            checkbox.setAttribute("value", "true");
            newNaCheckbox.addEventListener("change", function () {
                setupNullInputArray_we("null_work_exp",
                    [
                        "we_date_from",
                        "we_date_to",
                        "we_position",
                        "we_agency",
                        "we_salary",
                        "we_sg",
                        "we_status"
                    ],
                    [
                        "we_govtsvcs"
                    ],
                    "we_addrow"
                );
            });
        }

        // Remove the present checkbox and its label from the parent row
        var origPresentCheckbox = parentRow.querySelector(".form-check .form-check-input");
        if (origPresentCheckbox) {
            origPresentCheckbox.closest('.form-check').remove();
        }
        // uncheck present checkbox
        var presentCheckbox = newRow.querySelector('.remove_present_we');
        if (presentCheckbox) {
            presentCheckbox.checked = false;
        }

        // Show and configure the delete button for the cloned row
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

        // hide and configure the delete button for the cloned row
        var deleteButton = newRow.querySelector(".delete-row-button");
        if (deleteButton) {
            deleteButton.style.display = "none";
            deleteButton.addEventListener("click", function () {
                if (newRow.parentNode) {
                    newRow.parentNode.removeChild(newRow);
                }
            });
        }

        // Enable the TO date field in the cloned row and reset its type to 'date' if 'PRESENT' is not checked
        var toDateInput = newRow.querySelector('[name="we_date_to[]"]');
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

    document.addEventListener("DOMContentLoaded", function () {
        var position = document.querySelector('[id="we_position"]');
        if (position.value != "N/A" && position.value != "") {
            var presentCheckbox = document.querySelector('[id="present_we"]');
            var dateTo = document.querySelector('[id="we_date_to"]');
            if (dateTo.value == "") {
                presentCheckbox.checked = true;
                presentWe(presentCheckbox);
            }
        }
    });
</script>