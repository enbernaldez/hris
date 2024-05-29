<div class="container-fluid">

    <?php
    if (isset($_GET['action']) && $_GET['action'] == "view") {
        $employee_id = $_GET['employee_id'];

        // `voluntary_work` table
        $sql = "SELECT *
                FROM `voluntary_work`
                WHERE `employee_id` = ?
                ORDER BY
                    CASE 
                        -- Check if there is more than one volwork_to with '0000-00-00'
                        WHEN (SELECT COUNT(*) 
                            FROM `voluntary_work` 
                            WHERE `employee_id` = ?
                            AND `volwork_to` = '0000-00-00') > 1 
                            AND `volwork_to` = '0000-00-00'
                        THEN `volwork_from`
                        ELSE `volwork_to`
                    END
                ASC;";
        $filter = array($employee_id, $employee_id);
        $result = query($conn, $sql, $filter);

        echo "
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
    ";

        if ($result[0]['volwork_name_add'] == "N/A") {
            echo "
            var checkbox = document.getElementById('null_vw');
            checkbox.checked = true;
            setupNullInputArray_vw('null_vw', [
                'vw_nameaddress',
                'vw_date_from',
                'vw_date_to',
                'vw_hrs',
                'vw_position',
                'vw_addrow',
            ]);
            ";
        } else {

            $i = 0;

            foreach ($result as $key => $value) {

                // name attribute => db column
                $vw_dets = array(
                    "vw_nameaddress[]" => "name_add",
                    "vw_date_from[]" => "from",
                    "vw_date_to[]" => "to",
                    "vw_hrs[]" => "hrs",
                    "vw_position[]" => "position",
                );

                if (isset($name_add)) {
                    echo "addRow_vw();";
                }

                foreach ($vw_dets as $key => $dets) {

                    $name_att = json_encode($key);

                    $$dets = $value['volwork_' . $dets];

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
                            data-target="null_vw">
                        <label class="form-check-label" for="null_vw">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="vw_nameaddress[]" id="vw_nameaddress"
                        class="form-control uppercase group_na_vw" required>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6 px-1 mx-0">
                        <input type="date" required name="vw_date_from[]" id="vw_date_from"
                            class="form-control uppercase group_na_vw">
                    </div>
                    <div class="col-6 px-1 mx-0">
                        <input type="date" required name="vw_date_to[]" id="vw_date_to"
                            class="form-control uppercase group_na_vw">
                        <div class="form-check d-flex mt-1 mb-0">
                            <input type="checkbox" id="present_vw" name="present_vw[]" onclick="presentVw(this)" name="present"
                                class="form-check-input uppercase me-2 remove_present_vw">
                            <label for="present_vw" class="form-check-label">PRESENT</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type="number" name="vw_hrs[]" id="vw_hrs" class="form-control uppercase group_na_vw" required>
            </div>
            <div class="col-4">
                <input type="text" name="vw_position[]" id="vw_position" class="form-control uppercase group_na_vw"
                    required>
            </div>

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3">
            <button type="button" class="btn btn-primary add-row-button" name="vw_addrow" id="vw_addrow"
                onclick="addRow_vw()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_vw">
        <strong>CLEAR ALL</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-slide="next" id="nextButton_vw">
        <strong>NEXT</strong>
    </button>
</div>

<script>
    //========================= Present =====================================
    function presentVw(checkbox) {
        const present = checkbox.closest('.row-row-vw');
        const toDateInput = present.querySelector('[name="vw_date_to[]"]');
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

        document.getElementById('clearButton_vw').addEventListener('click', function () {
            var clearInputs = document.querySelectorAll("#null_vw, #present_vw");

            var inputs = document.querySelectorAll('.group_na_vw');
            inputs.forEach((input) => {

                input.id == "vw_date_from" || input.id == "vw_date_to" ? input.type = "date" :
                    input.id == "vw_hrs" ? input.type = "number" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.row-row-vw');
            childRows.forEach(function (row, index) {
                if (index !== 0) {
                    row.parentNode.removeChild(row);
                }
            });

            // Uncheck all "PRESENT" checkboxes and reset TO date inputs
            var presentCheckboxes = document.querySelectorAll('#present_vw');
            presentCheckboxes.forEach(function (checkbox) {
                var row = checkbox.closest('.row-row-vw');
                var toDateInput = row.querySelector('[name="vw_date_to[]"]');
                if (toDateInput) {
                    toDateInput.type = 'date';
                    toDateInput.value = "";
                    toDateInput.disabled = false;
                }
            });

            // Enable the "Add Row" button
            var addButton = document.getElementById('vw_addrow');
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

    // ============================ N/A Array Disable ============================
    function setupNullInputArray_vw(checkboxId, inputIds) {
        var checkbox = document.querySelector("#" + checkboxId);
        var inputs = inputIds.map((id) => document.querySelector('[id="' + id + '"]'));

        checkbox.addEventListener("change", function () {

            var row = this.closest('.row-row-vw'); // Find the closest row
            var presentCheckbox = row.querySelector('[id="present_vw"]'); // Find the 'PRESENT' checkbox in the same row

            if (this.checked) {
                // Uncheck and disable the 'PRESENT' checkbox if 'N/A' is checked
                if (presentCheckbox) {
                    presentCheckbox.checked = false;
                    presentCheckbox.disabled = true;
                    var toDateInput = row.querySelector('[name="vw_date_to[]"]');
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

                // Remove cloned rows if they exist
                var clonedRows = document.querySelectorAll(".vw-row .row-row-vw");
                clonedRows.forEach((clonedRow) => {
                    if (clonedRow !== this.closest('.row-row-vw')) {
                        clonedRow.remove();
                    }
                });
            } else {
                if (presentCheckbox) {
                    presentCheckbox.disabled = false;
                }

                inputs.forEach((input) => {
                    if (input.id === "vw_date_from" || input.id === "vw_date_to") {
                        input.type = "date";
                    } else if (input.id === "vw_hrs") {
                        input.type = "number";
                    } else {
                        input.type = "text";
                    }
                    input.value = "";
                    input.disabled = false;
                });
            }
        });

        var row = checkbox.closest('.row-row-vw'); // Find the closest row
        var presentCheckbox = row.querySelector('[id="present_vw"]'); // Find the 'PRESENT' checkbox in the same row

        if (checkbox.checked) {
            // Uncheck and disable the 'PRESENT' checkbox if 'N/A' is checked
            if (presentCheckbox) {
                presentCheckbox.checked = false;
                presentCheckbox.disabled = true;
                var toDateInput = row.querySelector('[name="vw_date_to[]"]');
                if (toDateInput) {
                    toDateInput.type = 'date';
                    toDateInput.value = "";
                    toDateInput.disabled = false;
                }
            }

            inputs.forEach((input) => {

                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
            });

            // Remove cloned rows if they exist
            var clonedRows = document.querySelectorAll(".vw-row .row-row-vw");
            clonedRows.forEach((clonedRow) => {
                if (clonedRow !== checkbox.closest('.row-row-vw')) {
                    clonedRow.remove();
                }
            });
        } else {
            if (presentCheckbox) {
                presentCheckbox.disabled = false;
            }

            inputs.forEach((input) => {
                if (input.id === "vw_date_from" || input.id === "vw_date_to") {
                    input.type = "date";
                } else if (input.id === "vw_hrs") {
                    input.type = "number";
                } else {
                    input.type = "text";
                }
                input.value = "";
                input.disabled = false;
            });
        }
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

    // =================================== Add Row ===================================
    function addRow_vw() {
        // Clone the input-row element
        var parentRow = document.querySelector(".row-row-vw");
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
            }

            input.value = "";

            index++
        });

        // Get the reference node (the original row)
        var referenceNode = document.querySelector(".vw-row .row-row-vw");

        // Insert the cloned row before the reference node
        referenceNode.parentNode.insertBefore(newRow, referenceNode);

        //Remove the n/a checkbox and its associated text from the parent row
        var origNaCheckbox = parentRow.querySelector(".remove_na");
        if (origNaCheckbox) {
            origNaCheckbox.parentNode.removeChild(origNaCheckbox);
        }

        var newNaCheckbox = newRow.querySelector(".remove_na");
        if (newNaCheckbox) {
            var checkbox = newNaCheckbox.querySelector("input");
            checkbox.setAttribute("value", "true");
            newNaCheckbox.addEventListener("change", function () {
                setupNullInputArray_vw("null_vw", [
                    "vw_nameaddress",
                    "vw_date_from",
                    "vw_date_to",
                    "vw_hrs",
                    "vw_position",
                    "vw_addrow",
                ]);
            });
        }

        // uncheck the present checkbox
        var presentCheckbox = newRow.querySelector('.remove_present_vw');
        if (presentCheckbox) {
            presentCheckbox.checked = false;
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

        // Enable the TO date field in the cloned row
        var toDateInput = newRow.querySelector('[name="vw_date_to[]"]');
        if (toDateInput) {
            toDateInput.type = 'date';
            toDateInput.value = "";
            toDateInput.disabled = false;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        var nameaddress = document.querySelector('[id="vw_nameaddress"]');
        if (nameaddress.value != "N/A" && nameaddress.value != "") {
            var presentCheckbox = document.querySelectorAll('[name="present_vw[]"]');
            var dateTo = document.querySelectorAll('[name="vw_date_to[]"]');

            for (let index = 0; index < dateTo.length; index++) {
                var to = dateTo[index];
                var checkbox = presentCheckbox[index];
                if (to.value == "") {
                    checkbox.checked = true;
                    presentVw(checkbox);
                }
            }
        }
    });
</script>