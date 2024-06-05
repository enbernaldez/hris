<div class="container-fluid">

    <?php

    if (isset($_GET['action']) && ($_GET['action'] == "view" || $_GET['action'] == "edit")) {
        $employee_id = $_GET['employee_id'];

        // `spouses` table
        $sql = "SELECT *
                FROM `spouses`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);
        $row = $result[0];

        $spouse = array("lastname", "firstname", "middlename", "nameext", "busadd", "telno");
        foreach ($spouse as $dets) {
            ${"spouse_$dets"} = $row['spouse_' . $dets];
        }
        $occupation = lookup($conn, $row['occupation_id'], 'occupations', 'occupation_name', 'occupation_id');
        $employer_business = lookup($conn, $row['employer_business_id'], 'employer_business', 'employer_business_name', 'employer_business_id');

        // `parents` table
        $sql = "SELECT *
                FROM `parents`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);

        $parents = array("lastname", "firstname", "middlename", "nameext");
        foreach ($parents as $dets) {
            ${"father_{$dets}"} = "N/A";
            ${"mother_{$dets}"} = "N/A";
        }

        foreach ($result as $value) {
            foreach ($parents as $dets) {
                $type = ($value['parent_type'] == 'F') ? "father" : "mother";
                ${"{$type}_{$dets}"} = $value['parent_' . $dets];
            }
        }

        // `children` table
        $sql = "SELECT DISTINCT `employee_id`, `child_fullname`, `child_bday`
                FROM `children`
                WHERE `employee_id` = ?";
        $filter = array($employee_id);
        $result = query($conn, $sql, $filter);

        $child_fullname = array();
        $child_bday = array();
        for ($i = 0; $i < count($result); $i++) {
            $child_fullname[] = $result[$i]['child_fullname'];
            $child_bday[] = $result[$i]['child_bday'];
        }

    } else {
        $fb_dets = array(
            "spouse_lastname",
            "spouse_firstname",
            "spouse_middlename",
            "spouse_nameext",
            "occupation",
            "employer_business",
            "spouse_busadd",
            "spouse_telno",
            "father_lastname",
            "father_firstname",
            "father_middlename",
            "father_nameext",
            "mother_lastname",
            "mother_firstname",
            "mother_middlename",
        );
        $fb_dets_arrays = array(
            "child_fullname",
            "child_bday",
        );

        foreach ($fb_dets as $var) {
            $$var = "";
        }
        foreach ($fb_dets_arrays as $var) {
            $$var = array();
        }
    }
    ?>

    <!-- SPOUSE'S FULL NAME -->
    <div class="row mt-5">
        <div class="col mx-1">
            <label for="spouse_name_last">SPOUSE'S SURNAME</label>
            <div class="form-check form-check-inline ms-2">
                <input class="form-check-input" type="checkbox" id="null_spouse" data-target="null_spouse">
                <label class="form-check-label" for="null_spouse">N/A</label>
            </div>
            <input type="text" required name="spouse_name_last" id="spouse_name_last"
                class="form-control uppercase group-na-fb" value="<?php echo $spouse_lastname; ?>">
        </div>
        <div class="col mx-1">
            <label for="spouse_name_first">FIRST NAME</label><br>
            <input type="text" required name="spouse_name_first" id="spouse_name_first"
                class="form-control uppercase group-na-fb" value="<?php echo $spouse_firstname; ?>">
        </div>
        <div class="col mx-1">
            <label for="spouse_name_middle">MIDDLE NAME</label><br>
            <div class="checkbox-container">
                <input type="text" required name="spouse_name_middle" id="spouse_name_middle"
                    class="form-control uppercase group-na-fb" value="<?php echo $spouse_middlename; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_spouse_mi" data-target="null_spouse_mi">
                    <label class="form-check-label" for="null_spouse_mi">N/A</label>
                </div>
            </div>
        </div>
        <div class="col-2 mx-1">
            <label for="spouse_name_ext">NAME EXTENSION</label><br>
            <div class="checkbox-container">
                <input type="text" required name="spouse_name_ext" id="spouse_name_ext"
                    class="form-control uppercase group-na-fb" value="<?php echo $spouse_nameext; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_spouse_nameext"
                        data-target="null_spouse_nameext">
                    <label class="form-check-label" for="null_spouse_nameext">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <!-- SPOUSE'S OCCUPATION -->
    <div class="row mt-3">
        <div class="col mx-1">
            <label for="spouse_occupation">OCCUPATION</label><br>
            <div class="checkbox-container">
                <input type="text" required name="spouse_occupation" id="spouse_occupation"
                    class="form-control uppercase group-na-fb" value="<?php echo $occupation; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_occupation" data-target="null_occupation">
                    <label class="form-check-label" for="null_occupation">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-1">
            <label for="spouse_bus_name">EMPLOYEER/BUSINESS NAME</label><br>
            <div class="checkbox-container">
                <input type="text" required name="spouse_bus_name" id="spouse_bus_name"
                    class="form-control uppercase group-na-fb" value="<?php echo $employer_business; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_bus" data-target="null_bus">
                    <label class="form-check-label" for="null_bus">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-1">
            <label for="spouse_bus_add">BUSINESS ADDRESS</label><br>
            <div class="checkbox-container">
                <input type="text" required name="spouse_bus_add" id="spouse_bus_add"
                    class="form-control uppercase group-na-fb" value="<?php echo $spouse_busadd; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_busadd" data-target="null_busadd">
                    <label class="form-check-label" for="null_busadd">N/A</label>
                </div>
            </div>
        </div>
        <div class="col mx-1">
            <label for="spouse_telno">TELEPHONE NO.</label><br>
            <div class="checkbox-container">
                <input type="text" required name="spouse_telno" id="spouse_telno" maxlength="11"
                    class="form-control uppercase group-na-fb" value="<?php echo $spouse_telno; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_spouse_telno"
                        data-target="null_spouse_telno">
                    <label class="form-check-label" for="null_spouse_telno">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <!-- FATHER'S FULL NAME -->
    <div class="row mt-3">
        <div class="col mx-1">
            <label for="father_name_last">FATHER'S SURNAME</label>
            <div class="form-check form-check-inline ms-2">
                <input class="form-check-input" type="checkbox" id="null_father" data-target="null_father">
                <label class="form-check-label" for="null_father">N/A</label>
            </div>
            <input type="text" required name="father_name_last" id="father_name_last"
                class="form-control uppercase group-na-fb" value="<?php echo $father_lastname; ?>">

        </div>
        <div class="col mx-1">
            <label for="father_name_first">FIRST NAME</label><br>
            <input type="text" required name="father_name_first" id="father_name_first"
                class="form-control uppercase group-na-fb" value="<?php echo $father_firstname; ?>">
        </div>
        <div class="col mx-1">
            <label for="father_name_middle">MIDDLE NAME</label><br>
            <div class="checkbox-container">
                <input type="text" required name="father_name_middle" id="father_name_middle"
                    class="form-control uppercase group-na-fb" value="<?php echo $father_middlename; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_father_mi" data-target="null_father_mi">
                    <label class="form-check-label" for="null_father_mi">N/A</label>
                </div>
            </div>
        </div>
        <div class="col-2 mx-1">
            <label for="father_name_ext">NAME EXTENSION</label><br>
            <div class="checkbox-container">
                <input type="text" required name="father_name_ext" id="father_name_ext"
                    class="form-control uppercase group-na-fb" value="<?php echo $father_nameext; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_father_nameext"
                        data-target="null_father_nameext">
                    <label class="form-check-label" for="null_father_nameext">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <!-- MOTHER'S FULL NAME -->
    <div class="row mt-3">
        <div class="col mx-1">
            <label for="mother_name_last">MOTHER'S SURNAME (MAIDEN)</label>
            <div class="form-check form-check-inline ms-2">
                <input class="form-check-input" type="checkbox" id="null_mother" data-target="null_mother">
                <label class="form-check-label" for="null_mother">N/A</label>
            </div>
            <input type="text" required name="mother_name_last" id="mother_name_last"
                class="form-control uppercase group-na-fb" value="<?php echo $mother_lastname; ?>">

        </div>
        <div class="col mx-1">
            <label for="mother_name_first">FIRST NAME</label><br>
            <input type="text" required name="mother_name_first" id="mother_name_first"
                class="form-control uppercase group-na-fb" value="<?php echo $mother_firstname; ?>">
        </div>
        <div class="col mx-1">
            <label for="mother_name_middle">MIDDLE NAME</label><br>
            <div class="checkbox-container">
                <input type="text" required name="mother_name_middle" id="mother_name_middle"
                    class="form-control uppercase group-na-fb" value="<?php echo $mother_middlename; ?>">
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_mother_mi" data-target="null_mother_mi">
                    <label class="form-check-label" for="null_mother_mi">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row-container">
        <div class="row mt-3">
            <div class="col-8 mx-1">
                <label for="child_name">NAME OF CHILDREN</label>
                <div class="form-check form-check-inline ms-2">
                    <input class="form-check-input" type="checkbox" id="null_children" data-target="null_children">
                    <label class="form-check-label" for="null_children">N/A</label>
                </div>
            </div>
            <div class="col mx-1">
                <label for="child_dob">DATE OF BIRTH</label>
            </div>
        </div>
        <div class="row row-row">
            <div class="col-8 mx-1">
                <input type="text" required id="child_fullname" name="child_fullname[]"
                    class="form-control uppercase group-na-fb">
            </div>
            <div class="col mx-1">
                <div class="checkbox-container">
                    <input type="date" required id="child_birthdate" name="child_birthdate[]"
                        class="form-control uppercase group-na-fb">
                    <button type="button" class="delete-row-button mx-2"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-3">
            <button type="button" class="btn btn-primary" id="fb_addrow" name="fb_addrow" onclick="addRow()">
                ADD ROW
            </button>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left button-nav" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_fb">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right button-nav" data-bs-slide="next"
        id="nextButton_fb">
        <strong>NEXT</strong>
    </button>
</div>

<script>
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll("#null_spouse, #null_spouse_mi, #null_spouse_nameext, #null_occupation, #null_bus, #null_busadd, #null_spouse_telno, #null_father, #null_father_mi, #null_father_nameext, #null_mother, #null_mother_mi, #null_children");

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

        document.getElementById('clearButton_fb').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.group-na-fb');
            inputs.forEach(function (input) {
                //Set the input type based on the input id 
                input.id == "spouse_telno" ? input.type = "tel" :
                    input.id == "child_birthdate" ? input.type = "date" :
                        input.type = "text";

                input.value = '';
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.row-row');
            childRows.forEach(function (row, index) {
                if (index !== 0) {
                    row.parentNode.removeChild(row);
                }
            });
        });
    });
    //========================= Next Button =====================================
    // Document ready function
    document.addEventListener('DOMContentLoaded', function () {
        var carouselElement = document.querySelector('#carouselExample');
        var carousel = new bootstrap.Carousel(carouselElement);


        // Move to the next slide only if the form is filled out
        document.querySelector('#nextButton_fb').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.group-na-fb');

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

    // ======================= N/A disable =======================
    function setupNullInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        // if retrieved value is N/A
        if (input.value == "N/A") {
            input.removeAttribute("style");
            checkbox.checked = true;
            input.disabled = true;
        }

        // if checkbox is toggled
        checkbox.addEventListener("change", function () {
            if (this.checked) {

                input.type = "text";
                input.value = "N/A";
                input.disabled = true;

            } else {
                input.id == "spouse_telno" ? input.type = "tel" : input.type = "text";

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

    // FAMILY BACKGROUND
    setupNullInput("null_spouse_mi", "spouse_name_middle");
    setupNullInput("null_spouse_nameext", "spouse_name_ext");
    setupNullInput("null_occupation", "spouse_occupation");
    setupNullInput("null_bus", "spouse_bus_name");
    setupNullInput("null_busadd", "spouse_bus_add");
    setupNullInput("null_spouse_telno", "spouse_telno");
    setupNullInput("null_father_mi", "father_name_middle");
    setupNullInput("null_father_nameext", "father_name_ext");
    setupNullInput("null_mother_mi", "mother_name_middle");

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

                    input.id == "spouse_telno" ? input.type = "tel" :
                        input.id == "child_birthdate" ? input.type = "date" :
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
        
        if (checkbox.checked) {
            inputs.forEach((input) => {

                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
            });
            checkboxes.forEach((chkbx) => {
                chkbx.checked = true;
                chkbx.disabled = true;
            });
        }
    }

    // ARRAYS
    // FAMILY BACKGROUND
    setupNullInputArray(
        "null_spouse",
        [
            "spouse_name_last",
            "spouse_name_first",
            "spouse_name_middle",
            "spouse_name_ext",
            "spouse_occupation",
            "spouse_bus_name",
            "spouse_bus_add",
            "spouse_telno",
        ],
        [
            "null_spouse_mi",
            "null_spouse_nameext",
            "null_occupation",
            "null_bus",
            "null_busadd",
            "null_spouse_telno",
        ]
    );
    setupNullInputArray(
        "null_father",
        [
            "father_name_last",
            "father_name_first",
            "father_name_middle",
            "father_name_ext",
        ],
        ["null_father_mi", "null_father_nameext"]
    );
    setupNullInputArray(
        "null_mother",
        ["mother_name_last", "mother_name_first", "mother_name_middle"],
        ["null_mother_mi"]
    );
    setupNullInputArray("null_children", ["child_fullname", "child_birthdate"], []);

    // =================================== Add Row ===================================
    function addRow(fullname = '', bday = '') {
        // Check if the original row is set to "N/A"
        const nullChildrenCheckbox = document.getElementById("null_children");
        if (nullChildrenCheckbox.checked) {
            return; // Do nothing if original row is "N/A"
        }

        // Clone the input-row element
        const newRow = document.querySelector(".row-row").cloneNode(true);

        newRow.classList.add("mt-3");
        // Clear input values in the cloned row
        let i = 0;
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
            if (fullname != '' && bday != '') {
                input.value = (i == 0) ? fullname : bday;
            }
            i++;
        });

        // Find the delete button in the cloned row and enable it 
        const deleteButton = newRow.querySelector(".delete-row-button");
        if (deleteButton) {
            deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
            deleteButton.style.display = "inline-block";
            deleteButton.addEventListener("click", function () {
                newRow.parentNode.removeChild(newRow);
            });
        }

        // Set inputs to "N/A" if corresponding checkbox is checked
        const checkboxes = newRow.querySelectorAll(".form-check-input");
        checkboxes.forEach((checkbox, index) => {
            const input = newRow.querySelectorAll("input")[index];
            if (checkbox.checked) {
                input.value = "N/A";
                input.disabled = true;
            }
        });

        // Append the cloned row to the container
        document.querySelector(".row-container").appendChild(newRow);

        // Set inputs to "N/A" when "N/A" checkbox is clicked and remove the cloned row
        const childNameInput = newRow.querySelector("input[name='child_fullname[]']");
        const childDobInput = newRow.querySelector("input[name='child_birthdate[]']");
        nullChildrenCheckbox.addEventListener("change", function () {
            if (this.checked) {
                newRow.parentNode.removeChild(newRow);
            } else {
                childNameInput.value = "";
                childNameInput.disabled = false;
                childDobInput.value = "";
                childDobInput.disabled = false;
            }
        });

        // Disable the "Add Row" button if the original row is "N/A"
        const addButton = document.getElementById("fb_addrow");
        if (nullChildrenCheckbox.checked) {
            addButton.disabled = true;
        } else {
            addButton.disabled = false;
        }
    }
</script>

<?php
if (isset($_GET['action']) && ($_GET['action'] == "view" || $_GET['action'] == "edit")) {
    echo "
    <script>
        const spouse_checkbox = document.getElementById('null_spouse');
        spouse_checkbox.checked = (spouse_name_last.value == 'N/A');
        
        const father_checkbox = document.getElementById('null_father');
        father_checkbox.checked = (father_name_last.value == 'N/A');
        
        const mother_checkbox = document.getElementById('null_mother');
        mother_checkbox.checked = (mother_name_last.value == 'N/A');
    ";

    $count = count($child_fullname);
    if ($count === 0) {
        echo "
        const children_row = document.querySelector('.row-row');
        const children_checkbox = document.getElementById('null_children');

        children_checkbox.checked = true;

        let n = 0;
        children_row.querySelectorAll('input').forEach((input) => {
            input.type = 'text';
            input.value = 'N/A';
            n++;
        });
    ";
    } else {
        echo '
            const children_row = document.querySelector(".row-row");
        ';
        for ($i = 0; $i < $count; $i++) {

            $fullname = json_encode($child_fullname[$i]);
            $bday = json_encode($child_bday[$i]);

            // set value of original row
            if ($i == 0) {
                echo "
                    let n = 0;
                    children_row.querySelectorAll('input').forEach((input) => {
                        input.value = (n == 0) ? {$fullname} : {$bday};
                        n++;
                    });
                ";
            } else {
                echo "
                    addRow({$fullname}, {$bday});
                ";
            }
        }
    }
    echo "
    </script>";
}
?>