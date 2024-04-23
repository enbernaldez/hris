<div class="container-fluid">
    <!-- COLUMN TILES -->
    <div class="row mt-5 text-center align-items-center">
        <div class="col-1">LEVEL</div>
        <div class="col">NAME OF SCHOOL <br>(Write in full)</div>
        <div class="col">BASIC EDUCATION/ <br>DEGREE/COURSE <br>(Write in full)</div>
        <div class="col-2">PERIOD OF ATTENDANCE <br>
            <div class="row mt-2">
                <div class="col">FROM</div>
                <div class="col">TO</div>
            </div>
        </div>
        <div class="col">HIGHEST LEVEL/ <br> UNITS EARNED <br>(if not graduated)</div>
        <div class="col">YEAR GRADUATED</div>
        <div class="col">SCHOLARSHIP/ <br>ACADEMIC HONORS <br>RECEIVED </div>
    </div>

    <!-- ELEMENTARY -->
    <div class="row mt-3 ms-1 ">
        <div class="row align-items-center">
            <div class="col-sm-1 p-2">ELEMENTARY</div>
            <!-- Name of school -->
            <div class="col">
                <input type="text" class="form-control next_button sample" id="name_schoolE" name="elem_school"
                    required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control next_button sample" id="degree_E" name="elem_degree" required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button sample" name="elem_attendance_from"
                            id="p_attendance_fromE" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromE" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_fromE">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button sample" name="elem_attendance_to"
                            id="p_attendance_toE" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toE" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_toE">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Highest level / units earned -->
            <div class="col">
                <input type="text" class="form-control next_button sample" id="h_levelE" name="elem_level" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button sample" name="elem_year" id="year_graduateE"
                    required>
                    <option value=""></option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearE" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_yearE">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP/ACADEMIC HONORS RECEIVED -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control next_button sample" id="e_scholarship" name="elem_scholarship"
                    required>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipE" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_scholarshipE">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <!-- SECONDARY -->
    <div class="row mt-3 ms-1">
        <div class="row align-items-center">
            <div class="col-sm-1 p-2">SECONDARY</div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control next_button" id="name_schoolS" name="sec_school" required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control next_button" id="degree_S" name="sec_degree" required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="sec_attendance_from"
                            id="p_attendance_fromS" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromS" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_fromS">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="sec_attendance_to"
                            id="p_attendance_toS" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toS" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_toS">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level / units earned -->
            <div class="col">
                <input type="text" class="form-control next_button" id="h_levelS" name="sec_level" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" name="sec_year" id="year_graduatedS" required>
                    <option value=""></option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearS" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_yearS">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control next_button" id="s_scholarship" name="sec_scholarship"
                    required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipS" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_scholarshipS">N/A</label>
                </div>
            </div>
        </div>
    </div>

    <!-- VOCATIONAL/ TRADE COURSE -->
    <div class="row mt-3 ms-1 parent-row">
        <div class="row null_vocational align-items-start">
            <div class="col-1 text-center d-flex align-items-center justify-content-center">
                <p class="level" style="font-size: 13px;">VOCATIONAL / TRADE COURSE</p>
                <div class="form-check remove_na small-font">
                    <input class="form-check-input not_app" type="checkbox" id="null_vocational">
                    <label class="form-check-label na-text" for="null_vocational">N/A</label>
                </div>
                <button type="button" class="delete-row-button mb-4 mt-2"
                    style="display:none; background-color: transparent; border: none; color: red;">
                </button>
            </div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control next_button" id="name_schoolV" name="voc_school" required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control next_button" id="degree_v" name="voc_degree" required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="voc_attendance_from"
                            id="p_attendance_fromV" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromV" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_fromV">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="voc_attendance_to"
                            id="p_attendance_toV" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toV" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_toV">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level earned -->
            <div class="col">
                <input type="text" class="form-control next_button" id="h_levelV" name="voc_level" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" name="voc_year" id="year_graduatedV" required>
                    <option value=""></option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearV" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_yearV">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP/ ACADEMIC HONORS RECEIVED -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control next_button" id="v_scholarship" name="voc_scholarship"
                    required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipV" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_scholarshipV">N/A</label>
                </div>
            </div>
        </div>
        <!-- button  -->
        <button type="button" class="add-row-text"
            style="outline: none; width: 300px; height: 40px; background: none; border: none;  text-align: left; padding: 0; margin-left: 150px;"><i
                class="bi bi-plus-lg me-2" id="v_addrow" name="v_addrow"></i>Add new Vocational
            row</button>
    </div>
    <!-- COLLEGE -->
    <div class="row mt-3 ms-1  parent-row">
        <div class="row align-items-start">
            <div class="col-1 text-center d-flex mb-4 ms-0">
                <p class="level">COLLEGE</p>
                <button type="button" class=" delete-row-button ms-5 mt-2"
                    style="display:none; background-color: transparent; border: none; color: red;">
                </button>
            </div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control next_button" id="name_schoolC" name="coll_school" required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control next_button" id="degree_C" name="coll_degree" required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="coll_attendance_from"
                            id="p_attendance_fromC" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromC" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_fromC">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="coll_attendance_to"
                            id="p_attendance_toC" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toC" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_toC">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level earned -->
            <div class="col">
                <input type="text" class="form-control next_button" id="h_levelC" name="coll_level" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" name="coll_year" id="year_graduatedC" required>
                    <option value=""></option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearC" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_yearC">N/A</label>
                </div>
            </div>
            <!-- scholarship/academic honors received -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control next_button" id="c_scholarship" name="coll_scholarship"
                    required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipC" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_scholarshipC">N/A</label>
                </div>
            </div>
        </div>
        <button type="button" class="add-row-text"
            style="outline: none; border: none; width: 300px; height: 40px; background: none; text-align: left; padding: 0; margin-left: 150px;">
            <i class="bi bi-plus-lg me-2" id="c_addrow" name="c_addrow"></i>Add new College row
        </button>
    </div>

    <!-- GRADUATE STUDIES -->
    <div class="row mt-3 ms-1 parent-row">
        <div class="row null_graduate align-items-start ">
            <div class="col-1 text-center d-flex align-items-center justify-content-center">
                <div class="col">
                    <p class="level">GRADUATE STUDIES</p>
                </div>
                <div class="col-4">
                    <div class="form-check remove_na ms-2 small-font mt-2">
                        <input class="form-check-input not_app" type="checkbox" id="null_graduate">
                        <label class="form-check-label na-text" for="null_graduate">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mb-4 mt-2"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                </div>
            </div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control next_button" id="name_schoolG" name="grad_school" required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control next_button" id="degree_g" name="grad_degree" required>
            </div>
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="grad_attendance_from"
                            id="p_attendance_fromG" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromG" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_fromG">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="grad_attendance_to"
                            id="p_attendance_toG" required>
                            <option value=""></option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toG" onchange="checkNA(this)">
                            <label class="form-check-label" for="null_toG">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level earned -->
            <div class="col">
                <input type="text" class="form-control next_button" id="h_levelG" name="grad_level" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" name="grad_year" id="year_graduatedG" required>
                    <option value=""></option>
                </select>
                <div class="form-check ms-2">
                    <input type="checkbox" class="form-check-input" id="null_yearG" onchange="checkNA(this)">
                    <label for="null_yearG" class="form-check-label">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control next_button" id="g_scholarship" name="grad_scholarship"
                    required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipG" onchange="checkNA(this)">
                    <label class="form-check-label" for="null_scholarshipG">N/A</label>
                </div>
            </div>
        </div>
        <button type="button" class="add-row-text"
            style="outline: none; border: none; width: 300px; height: 40px; background: none; text-align: left; padding: 0; margin-left: 150px;">
            <i class="bi bi-plus-lg me-2" id="g_addrow" name="g_addrow"></i>Add new Graduate Studies row
        </button>
    </div>
    <!-- BACK BUTTON -->
    <button type="button" onclick="history.back()" class="btn btn-secondary mt-5 mx-1 button-left">
        <strong>BACK</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" onclick="submitForm()">
        <strong>NEXT</strong>
    </button>
</div>
<script>
    // ======================== Next button ====================================
    function submitForm() {
        // Get all input fields with class "group_na"
        var inputs = document.querySelectorAll('.next_button');

        // Check if all input fields are filled out
        var allFilled = true;
        inputs.forEach(function (input) {
            if (!input.value.trim()) {
                allFilled = false;
            }
        });

        // If all input fields are filled out, submit the form
        if (allFilled) {
            window.location.href = "pds_form.php?form_section=cs_eligibility";
        } else {
            alert("Please fill out all input fields before proceeding.");
        }
    }
    // Year Picker 
    function populateYearDropdowns(select) {
        const currentYear = new Date().getFullYear();

        for (let year = currentYear; year >= 1900; year--) {
            const option = document.createElement('option');
            option.text = year;
            option.value = year;
            select.add(option);
        }
    }

    const selectElements = document.querySelectorAll('.year-select');
    // Call the function to populate the year dropdowns
    selectElements.forEach(selectElement => {
        populateYearDropdowns(selectElement);
    })

    function checkNA(checkbox) {
        var chk_col = checkbox.closest('.na');
        var chk_input = chk_col.querySelector("input[type='text']");
        var chk_select = chk_col.querySelector("select");

        if (checkbox.checked) {
            if (chk_select) {
                chk_select.innerHTML = "";
                var option = document.createElement("option");
                option.text = "N/A";
                option.value = "N/A";
                chk_select.add(option);
                chk_select.disabled = true;
            }
            if (chk_input) {
                chk_input.value = "N/A";
                chk_input.disabled = true;
            }
        } else {
            if (chk_select) {
                chk_select.disabled = false;
                chk_select.innerHTML = ""; // Clear previous options
                var option = document.createElement("option");
                option.text = ""; // Empty option
                option.value = ""; // Modify as needed
                chk_select.add(option);
                // If it's the "Year Graduated" or "Period of Attendance" field
                if (checkbox.id.includes("_year") || checkbox.id.includes("_from") || checkbox.id.includes("_to")) {
                    populateYearDropdowns(chk_select); // Populate year options
                } else {
                    var scholarshipIDs = ["e_scholarship", "s_scholarship", "v_scholarship", "c_scholarship", "g_scholarship"];
                    if (scholarshipIDs.includes(checkbox.id)) {
                        var option = document.createElement("option");
                        option.text = "Enter Scholarship"; // Modify as needed
                        option.value = ""; // Modify as needed
                        chk_select.add(option);
                    }
                }
            }
            if (chk_input) {
                chk_input.value = "";
                chk_input.disabled = false;
            }
        }
    }
    // Define an object to store the original options of each select element
    const originalOptions = {};

    function handleNAArray(checkboxId, inputIds, selectIds, chkboxIds) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));
        const selects = selectIds.map((id) => document.getElementById(id));
        const checkboxes = chkboxIds.map((id) => document.getElementById(id));

        // Store the original options of each select element
        selects.forEach((select) => {
            originalOptions[select.id] = Array.from(select.options).map((option) => {
                return { value: option.value, text: option.text };
            });
        });

        checkbox.addEventListener("change", function () {
            if (this.checked) {
                inputs.forEach((input) => {
                    input.value = "N/A";
                    input.disabled = true;
                });
                selects.forEach((select) => {
                    // Clear existing options
                    select.innerHTML = "";
                    // Create new option with "N/A" value
                    const optionNA = document.createElement("option");
                    optionNA.text = "N/A";
                    optionNA.value = "N/A";
                    // Append option to select
                    select.appendChild(optionNA);
                    select.disabled = true;
                });
                checkboxes.forEach((chkbx) => {
                    chkbx.checked = true;
                    chkbx.disabled = true;
                });
                // Remove cloned rows if they exist
                const clonedRows = document.querySelectorAll("." + checkboxId + ".new-row");
                clonedRows.forEach((clonedRow) => {
                    clonedRow.remove();
                });
            } else {
                inputs.forEach((input) => {
                    input.value = "";
                    input.disabled = false;
                });
                selects.forEach((select) => {
                // Restore original options
                select.innerHTML = "";
                originalOptions[select.id].forEach((optionData) => {
                    const option = document.createElement("option");
                    option.text = optionData.text;
                    option.value = optionData.value;
                    select.appendChild(option);
                });
                select.disabled = false;
            });
                checkboxes.forEach((chkbx) => {
                    chkbx.checked = false;
                    chkbx.disabled = false;
                });
            }
        });
    }

    //ARRAYS
    handleNAArray(
        "null_vocational",
        [
            "name_schoolV",
            "degree_v",
            "h_levelV",
            "p_attendance_fromV",
            "p_attendance_toV",
            "year_graduatedV",
            "v_scholarship"
        ],
        [
            "p_attendance_fromV",
            "p_attendance_toV",
            "year_graduatedV",
        ],
        [
            "null_fromV",
            "null_toV",
            "null_yearV",
            "null_scholarshipV"
        ]
    );
    handleNAArray(
        "null_graduate",
        [
            "name_schoolG",
            "degree_g",
            "p_attendance_fromG",
            "p_attendance_toG",
            "h_levelG",
            "year_graduatedG",
            "g_scholarship"
        ],
        [
            "p_attendance_fromG",
            "p_attendance_toG",
            "year_graduatedG",
        ],
        [
            "null_fromG",
            "null_toG",
            "null_yearG",
            "null_scholarshipG"
        ]
    );



    document.addEventListener("DOMContentLoaded", function () {
        // Find the "button"
        const plusButtons = document.querySelectorAll("button");

        // Iterate over each "plus" icon
        plusButtons.forEach(function (button) {
            // Attach a click event listener to each "plus" icon
            button.addEventListener("click", function () {
                // Find the parent row of the clicked icon
                const parentRow = button.closest(".parent-row");
                const row = parentRow.querySelector(".row");

                //Find the n/a checkbox within the parent row 
                const naCheckbox = row.querySelector(".not_app");

                //Check if the n/a checkbox is checked
                if (naCheckbox && naCheckbox.checked) {
                    return;
                }

                // Clone the row
                const clonedRow = row.cloneNode(true);
                //Add the new-row class to the cloned row 
                clonedRow.classList.add('new-row');

                const level = clonedRow.querySelector('.level');
                level.hidden = true;

                // Clear select values and enable select boxes in the cloned row
                const checkboxes = clonedRow.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        checkbox.checked = false; // Uncheck the checkbox if it's checked
                    }
                });

                // Find all select elements in the cloned row
                const selects = clonedRow.querySelectorAll('select');

                // Iterate over each select element and set its value to an empty string or to the default selected option
                selects.forEach(function (select) {
                    // Clear the value of the select box 

                    select.disabled = false;
                    select.innerHTML = "";

                    var option = document.createElement("option");
                    option.text = ""; // Empty option
                    option.value = ""; // Modify as needed
                    select.add(option);

                    select.value = ''; // Set the value to an empty string

                    populateYearDropdowns(select);
                });



                //Remove the n/a checkbox and its associated text from the cloned row
                const clonedNaCheckbox = clonedRow.querySelector(".remove_na");
                if (clonedNaCheckbox) {
                    clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
                }

                //find the delete button in the cloned row and enable it 
                const deleteButton = clonedRow.querySelector(".delete-row-button");
                if (deleteButton) {
                    deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
                    deleteButton.style.display = "inline-block";
                    deleteButton.addEventListener("click", function () {
                        clonedRow.parentNode.removeChild(clonedRow);
                    });
                }

                // Update IDs of cloned elements to make them unique
                const inputFields = clonedRow.querySelectorAll("input");
                inputFields.forEach(function (input) {
                    const oldId = input.getAttribute("id");
                    const newId = generateUniqueId(oldId); // Generate a unique id 
                    input.setAttribute("id", newId);

                    //Update corresponding label ID
                    const labelFor = input.getAttribute("id");
                    const label = clonedRow.querySelector(`label[for="${oldId}"]`);
                    if (label) {
                        label.setAttribute("for", newId);
                    }

                    // Optionally, clear input values in cloned row
                    input.value = "";
                    input.disabled = false;
                });

                // Generate unique IDs for select elements
                const selectFields = clonedRow.querySelectorAll("select");
                selectFields.forEach(function (select) {
                    const oldId = select.getAttribute("id");
                    const newId = generateUniqueId(oldId); // Generate a unique id 
                    select.setAttribute("id", newId);
                });

                // Append the cloned row before the "Add new row" text 
                button.insertAdjacentElement("beforebegin", clonedRow);
            });
        });
    });
    //Function to generate a unique ID based on the old ID
    function generateUniqueId(oldId) {
        return oldId + "_" + Date.now();
    }
</script>