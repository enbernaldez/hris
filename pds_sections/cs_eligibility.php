<div class="container-fluid">

    <?php
    if (isset($_GET['action']) && $_GET['action'] == "view") {
        $employee_id = $_GET['employee_id'];

        // `cs_eligibility` table
        $sql = "SELECT *
                FROM `cs_eligibility`
                WHERE `employee_id` = ?
            ORDER BY `cseligibility_examdate` ASC";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);

        echo "
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
            ";

        if ($result[0]['cs_id'] == "1") {
            echo "
                var checkbox = document.getElementById('null_cse');
                checkbox.checked = true;
                checkNA_cs(checkbox);
            ";
        } else {

            foreach ($result as $key => $value) {

                $cs_dets = array(
                    "careerservice[]" => "cs",
                    "rating[]" => "rating",
                    "exam_date[]" => "examdate",
                    "exam_place[]" => "examplace",
                    "license_number[]" => "license",
                    "license_dateofvalidity[]" => "datevalidity",
                );

                if (isset($cs)) {
                    echo "
                        addRow_cs();
                    ";
                }

                $i = 0;
                foreach ($cs_dets as $key => $dets) {

                    $name_att = json_encode($key);


                    if ($dets == "cs") {

                        $$dets = lookup($conn, $value["{$dets}_id"], "civil_services", "{$dets}_name", "{$dets}_id");

                    } else {

                        $$dets = $value['cseligibility_' . $dets];
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
        <div class="col-4">
            <p>CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES CSEE
                BARANGAY ELIGIBILITY/DRIVER'S LICENSE
            </p>
        </div>
        <div class="col-1">
            <p>RATING<br>(if applicable)</p>
        </div>
        <div class="col-2">
            <p>DATE OF EXAMINATION/CONFERMENT</p>
        </div>
        <div class="col-2">
            <p>PLACE OF EXAMINATION/CONFERMENT</p>
        </div>
        <div class="col-3">
            <div class="row">
                <p>LICENSE (if applicable)</p>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>NUMBER</p>
                </div>
                <div class="col-6">
                    <p>DATE OF VALIDITY</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row-container cs-row">
        <div class="row row-row-cs mt-2">
            <div class="col-4">
                <div class="checkbox-container">
                    <div class="form-check me-2 remove_na">
                        <input class="form-check-input" type="checkbox" id="null_cse" onclick="checkNA_cs(this)"
                            data-target="null_cse">
                        <label class="form-check-label" for="null_cse">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="careerservice[]" id="careerservice"
                        class="form-control uppercase group-na-cs" required>
                </div>
            </div>
            <div class="col-1">
                <input type="text" name="rating[]" id="rating" class="form-control uppercase group-na-cs" required>
            </div>
            <div class="col-2">
                <input type="date" name="exam_date[]" id="exam_date" class="form-control uppercase group-na-cs"
                    required>
            </div>
            <div class="col-2">
                <input type="text" name="exam_place[]" id="exam_place" class="form-control uppercase group-na-cs"
                    required>
            </div>
            <div class="col-3 license">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="license_number[]" id="license_number"
                            class="form-control uppercase group-na-cs" required>
                    </div>
                    <div class="col-6">
                        <input type="date" name="license_dateofvalidity[]" id="license_dateofvalidity"
                            class="form-control uppercase group-na-cs" required>
                    </div>
                </div>
                <div class="mt-1 text-center">
                    <input class="form-check-input na-checkbox" type="checkbox" id="na_license" name="na_license"
                        oninput="NA_license(this)">
                    <label class="form-check-label" for="na_license">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <button type="button" class="btn btn-primary add-row-button" id="cse_addrow" name="cse_addrow"
                onclick="addRow_cs()">ADD ROW</button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_cs">
        <strong>CLEAR ALL</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" id="nextButton_cs" data-bs-slide="next">
        <strong>NEXT</strong>
    </button>

</div>

<script>
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll("#null_cse");

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

        document.getElementById('clearButton_cs').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.group-na-cs');
            inputs.forEach(function (input) {
                input.id == "exam_date" || input.id == "license_dateofvalidity" ? input.type = "date" :
                    input.id == "license_number" ? input.type = "number" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            var childRows = document.querySelectorAll('.row-row-cs');
            var lastIndex = childRows.length - 1;
            childRows.forEach(function (row, index) {
                if (index !== lastIndex) {
                    row.parentNode.removeChild(row);
                }
            });

            var addButton = document.getElementById('cse_addrow');
            if (addButton) {
                addButton.disabled = false;
            }

            // Uncheck all "N/A" checkboxes within the individual rows
            var naLicenseCheckboxes = document.querySelectorAll('.na-checkbox');
            naLicenseCheckboxes.forEach(function (naCheckbox) {
                naCheckbox.checked = false;
                NA_license(naCheckbox);
            });
        });
    });

    //========================= Next Button =====================================
    document.addEventListener('DOMContentLoaded', function () {
        var carouselElement = document.querySelector('#carouselExample');
        var carousel = new bootstrap.Carousel(carouselElement);

        document.querySelector('#nextButton_cs').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.group-na-cs');

            var allFilled = true;
            inputs.forEach(function (input) {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });

            if (allFilled) {
                carousel.next();
            } else {
                alert("Please fill out all input fields before proceeding.");
            }
        });
    });

    function disableInputs(inputs) {
        inputs.forEach(function (input) {
            if (!input.classList.contains('na-checkbox')) {
                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
            }
        });
    }

    function enableInputs(inputs) {
        inputs.forEach(function (input) {
            if (!input.classList.contains('na-checkbox')) {
                input.type = (input.id == "exam_date" || input.id == "license_dateofvalidity") ? "date" :
                    (input.id == "license_number") ? "number" :
                        "text";
                input.value = "";
                input.disabled = false;
            }
        });
    }

    function checkNA_cs(checkbox) {
        var inputs = document.querySelectorAll(".group-na-cs");
        var cse_addrow = document.getElementById("cse_addrow");

        if (checkbox.checked) {
            disableInputs(inputs);

            const clonedRows = document.querySelectorAll(".cs-row .row-row-cs");
            clonedRows.forEach((clonedRow) => {
                if (clonedRow !== checkbox.closest('.row-row-cs')) {
                    clonedRow.remove();
                }
            });

            cse_addrow.disabled = true;

            var naLicenseCheckboxes = document.querySelectorAll('.na-checkbox');
            naLicenseCheckboxes.forEach(function (naCheckbox) {
                naCheckbox.checked = true;
                NA_license(naCheckbox);
            });
        } else {
            enableInputs(inputs);
            cse_addrow.disabled = false;

            var naLicenseCheckboxes = document.querySelectorAll('.na-checkbox');
            naLicenseCheckboxes.forEach(function (naCheckbox) {
                naCheckbox.checked = false;
                NA_license(naCheckbox);
            });
        }
    }

    function NA_license(checkbox) {
        var row = checkbox.closest('.license');
        var inputs = row.querySelectorAll('input');
        if (checkbox.checked) {
            disableInputs(inputs);
        } else {
            enableInputs(inputs);
        }
    }

    function addRow_cs() {
        var newRow = document.querySelector(".row-row-cs").cloneNode(true);

        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
            input.disabled = false;
        });

        var referenceNode = document.querySelector(".cs-row .row-row-cs");

        referenceNode.parentNode.insertBefore(newRow, referenceNode);

        const clonedNaCheckbox = newRow.querySelector(".remove_na");
        if (clonedNaCheckbox) {
            clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
        }

        const deleteButton = newRow.querySelector(".delete-row-button");
        if (deleteButton) {
            deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
            deleteButton.style.display = "inline-block";
            deleteButton.addEventListener("click", function () {
                newRow.parentNode.removeChild(newRow);
            });
        }
        const naCheckbox = newRow.querySelector(".na-checkbox");
        if (naCheckbox) {
            naCheckbox.addEventListener("input", function () {
                checkNA(this, 'license_number', 'license_dateofvalidity');
            });
        }
    }
</script>