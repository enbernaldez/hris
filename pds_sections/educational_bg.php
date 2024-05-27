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
                <input type="text" class="form-control uppercase next_button sample" id="name_schoolE"
                    name="elem_school[]" required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button sample" id="degree_E" name="elem_degree[]"
                    required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button sample" name="elem_attendance_from[]"
                            id="p_attendance_fromE" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromE" onchange="checkNA_eb(this)"
                                data-target="null_fromE">
                            <label class="form-check-label" for="null_fromE">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button sample" name="elem_attendance_to[]"
                            id="p_attendance_toE" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toE" onchange="checkNA_eb(this)"
                                data-target="null_toE">
                            <label class="form-check-label" for="null_toE">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Highest level / units earned -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button sample" id="h_levelE" name="elem_level[]"
                    required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button sample" id="year_graduateE" name="elem_year[]"
                    required>
                    <option value="">--SELECT--</option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearE" onchange="checkNA_eb(this)"
                        data-target="null_yearE">
                    <label class="form-check-label" for="null_yearE">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP/ACADEMIC HONORS RECEIVED -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control uppercase next_button sample" id="e_scholarship"
                    name="elem_scholarship[]" required>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipE" onchange="checkNA_eb(this)"
                        data-target="null_scholarshipE">
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
                <input type="text" class="form-control uppercase next_button" id="name_schoolS" name="sec_school[]"
                    required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="degree_S" name="sec_degree[]"
                    required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="sec_attendance_from[]"
                            id="p_attendance_fromS" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromS" onchange="checkNA_eb(this)"
                                data-target="null_fromS">
                            <label class="form-check-label" for="null_fromS">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="sec_attendance_to[]"
                            id="p_attendance_toS" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toS" onchange="checkNA_eb(this)"
                                data-target="null_toS">
                            <label class="form-check-label" for="null_toS">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level / units earned -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="h_levelS" name="sec_level[]" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" id="year_graduatedS" name="sec_year[]" required>
                    <option value="">--SELECT--</option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearS" onchange="checkNA_eb(this)"
                        data-target="null_yearS">
                    <label class="form-check-label" for="null_yearS">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control uppercase next_button" id="s_scholarship"
                    name="sec_scholarship[]" required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipS" onchange="checkNA_eb(this)"
                        data-target="null_scholarshipS">
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
                    <input class="form-check-input not_app" type="checkbox" id="null_vocational"
                        data-target="null_vocational">
                    <label class="form-check-label na-text" for="null_vocational">N/A</label>
                </div>
                <button type="button" class="delete-row-button mb-4 mt-2"
                    style="display:none; background-color: transparent; border: none; color: red;">
                </button>
            </div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="name_schoolV" name="voc_school[]"
                    required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="degree_v" name="voc_degree[]"
                    required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="voc_attendance_from[]"
                            id="p_attendance_fromV" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromV" onchange="checkNA_eb(this)"
                                data-target="null_fromV">
                            <label class="form-check-label" for="null_fromV">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="voc_attendance_to[]"
                            id="p_attendance_toV" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toV" onchange="checkNA_eb(this)"
                                data-target="null_toV">
                            <label class="form-check-label" for="null_toV">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level earned -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="h_levelV" name="voc_level[]" required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" id="year_graduatedV" name="voc_year[]" required>
                    <option value="">--SELECT--</option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearV" onchange="checkNA_eb(this)"
                        data-target="null_yearV">
                    <label class="form-check-label" for="null_yearV">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP/ ACADEMIC HONORS RECEIVED -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control uppercase next_button" id="v_scholarship"
                    name="voc_scholarship[]" required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipV" onchange="checkNA_eb(this)"
                        data-target="null_scholarshipV">
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
    <div class="row mt-3 ms-1 parent-row">
        <div class="row align-items-start">
            <div class="col-1 text-center d-flex mb-4 ms-0">
                <p class="level">COLLEGE</p>
                <button type="button" class=" delete-row-button ms-5 mt-2"
                    style="display:none; background-color: transparent; border: none; color: red;">
                </button>
            </div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="name_schoolC" name="coll_school[]"
                    required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="degree_C" name="coll_degree[]"
                    required>
            </div>
            <!-- period of attendance -->
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="coll_attendance_from[]"
                            id="p_attendance_fromC" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromC" onchange="checkNA_eb(this)"
                                data-target="null_fromC">
                            <label class="form-check-label" for="null_fromC">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select next_button" name="coll_attendance_to[]"
                            id="p_attendance_toC" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toC" onchange="checkNA_eb(this)"
                                data-target="null_toC">
                            <label class="form-check-label" for="null_toC">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level earned -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="h_levelC" name="coll_level[]"
                    required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" id="year_graduatedC" name="coll_year[]" required>
                    <option value="">--SELECT--</option>
                </select>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_yearC" onchange="checkNA_eb(this)"
                        data-target="null_yearC">
                    <label class="form-check-label" for="null_yearC">N/A</label>
                </div>
            </div>
            <!-- scholarship/academic honors received -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control uppercase next_button" id="c_scholarship"
                    name="coll_scholarship[]" required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipC" onchange="checkNA_eb(this)"
                        data-target="null_scholarshipC">
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
                        <input class="form-check-input not_app" type="checkbox" id="null_graduate"
                            data-target="null_graduate">
                        <label class="form-check-label na-text" for="null_graduate">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mb-4 mt-2"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                </div>
            </div>
            <!-- name of school -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="name_schoolG" name="grad_school[]"
                    required>
            </div>
            <!-- basic education/degree/course -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="degree_g" name="grad_degree[]"
                    required>
            </div>
            <div class="col-2">
                <div class="row">
                    <!-- FROM -->
                    <div class="col na checkbox-container pe-1 small-font">
                        <select class="form-select year-select next_button" name="grad_attendance_from[]"
                            id="p_attendance_fromG" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_fromG" onchange="checkNA_eb(this)"
                                data-target="null_fromG">
                            <label class="form-check-label" for="null_fromG">N/A</label>
                        </div>
                    </div>
                    <!-- TO -->
                    <div class="col na checkbox-container ps-1 small-font">
                        <select class="form-select year-select select next_button" name="grad_attendance_to[]"
                            id="p_attendance_toG" required>
                            <option value="">--SELECT--</option>
                        </select>
                        <input type="text" class="form-control present-input" id="topresentG"
                            style="display: none;" disabled>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_toG" onchange="checkNA_eb(this)"
                                data-target="null_toG">
                            <label class="form-check-label" for="null_toG">N/A</label>
                            <div class="small-font present">
                                <input class="form-check-input" type="checkbox" id="present_toG"
                                    data-target="present_toG" onchange="presentEb(this)">
                                <label class="form-check-label" for="present_toG">PRE</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- highest level earned -->
            <div class="col">
                <input type="text" class="form-control uppercase next_button" id="h_levelG" name="grad_level[]"
                    required>
            </div>
            <!-- YEAR GRADUATED -->
            <div class="col na checkbox-container small-font">
                <select class="form-select year-select next_button" id="year_graduatedG" name="grad_year[]" required>
                    <option value="">--SELECT--</option>
                </select>
                <div class="form-check ms-2">
                    <input type="checkbox" class="form-check-input" id="null_yearG" onchange="checkNA_eb(this)"
                        data-target="null_yearG">
                    <label for="null_yearG" class="form-check-label">N/A</label>
                </div>
            </div>
            <!-- SCHOLARSHIP -->
            <div class="col na checkbox-container small-font">
                <input type="text" class="form-control uppercase next_button" id="g_scholarship"
                    name="grad_scholarship[]" required />
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" id="null_scholarshipG" onchange="checkNA_eb(this)"
                        data-target="null_scholarshipG">
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
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- CLEAR BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" id="clearButton_eb">
        <strong>CLEAR SECTION</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" id="nextButton_eg" data-bs-slide="next">
        <strong>NEXT</strong>
    </button>
</div>
<script>
    //==================== present checkbox ==============================
    function presentEb(checkbox) {
        const container = checkbox.closest('.checkbox-container');
        const select = container.querySelector('.form-select');
        const presentInput = container.querySelector('.present-input');

        if (checkbox.checked) {
            select.style.display = 'none';
            presentInput.style.display = 'block';
            presentInput.value = "PRESENT";
            presentInput.disabled = true;
        } else {
            select.style.display = 'block';
            presentInput.style.display = 'none';
            presentInput.value = "";
            presentInput.disabled = false;
        }
    }
    // ======================== Clear Button ==================================
    document.addEventListener('DOMContentLoaded', function () {
        var clearInputs = document.querySelectorAll("#null_fromE, #null_toE, #null_yearE, #null_scholarshipE, #null_fromS, #null_toS, #null_yearS, #null_scholarshipS, #null_vocational, #null_fromV, #null_toV, #null_yearV, #null_scholarshipV, #null_fromC, #null_toC, #null_yearC, #null_scholarshipC, #null_graduate, #null_fromG, #null_toG, #null_yearG, #null_scholarshipG, #present_toG");
        var originalSelectOptions = {};

        //List of specific select elements IDs to be cleared and restored 
        var specificSelectIds = ["p_attendance_fromE", "p_attendance_toE", "year_graduateE", "p_attendance_fromS", "p_attendance_toS", "year_graduatedS", "p_attendance_fromV", "p_attendance_toV", "year_graduatedV", "p_attendance_fromC", "p_attendance_toC", "year_graduatedC", "p_attendance_fromG", "p_attendance_toG", "year_graduatedG"];

        // Store the original options of each specific select element
        specificSelectIds.forEach((selectId) => {
            var select = document.getElementById(selectId);
            if (select) {
                originalSelectOptions[selectId] = Array.from(select.options).map((option) => {
                    return { value: option.value, text: option.text };
                });
            }
        });

        document.getElementById('clearButton_eb').addEventListener('click', function () {
            var inputs = document.querySelectorAll('.next_button, .present-input');
            inputs.forEach(function (input) {
                if (input.id == "topresentG") {
                    input.style.display = "none";
                }
                input.value = '';
                input.disabled = false;
            });

            clearInputs.forEach(function (checkbox) {
                checkbox.checked = false;
                checkbox.disabled = false;
            });

            // Remove all cloned rows for children
            var childRows = document.querySelectorAll('.new-row');
            childRows.forEach(function (row) {
                if (row.parentNode) {
                    row.parentNode.removeChild(row);
                }
            });

            // Restore original select options for specific selects
            specificSelectIds.forEach((selectId) => {
                var select = document.getElementById(selectId);
                if (select) {
                    select.disabled = false;
                    select.innerHTML = '';
                    originalSelectOptions[selectId].forEach((optionData) => {
                        var option = document.createElement('option');
                        option.text = optionData.text;
                        option.value = optionData.value;
                        select.add(option);
                    });
                    if (selectId == "p_attendance_toG") {
                        select.style.display = "block";
                    }
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
        document.querySelector('#nextButton_eg').addEventListener('click', function () {
            var activeSlide = document.querySelector('.carousel-item.active');
            var inputs = activeSlide.querySelectorAll('.next_button');

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
    //=============== checkNA Function ==================================
    function checkNA_eb(checkbox) {
        var chk_col = checkbox.closest('.checkbox-container');
        var chk_input = chk_col.querySelector("input[type='text']");
        var chk_select = chk_col.querySelector("select");
        var presentCheckbox = chk_col.querySelector("input[id^='present_toG']");

        if (checkbox.checked) {
            if (chk_select) {
                // Store original options if not already stored
                if (!chk_select.dataset.originalOptions) {
                    var options = Array.from(chk_select.options).map(option => {
                        return { value: option.value, text: option.text };
                    });
                    chk_select.dataset.originalOptions = JSON.stringify(options);
                }

                // Clear and disable the select
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
            if (presentCheckbox) {
                presentCheckbox.checked = false;
                presentCheckbox.disabled = true;
            }
        } else {
            if (chk_select) {
                chk_select.disabled = false;
                chk_select.innerHTML = ""; // Clear current options

                // Restore original options
                if (chk_select.dataset.originalOptions) {
                    var originalOptions = JSON.parse(chk_select.dataset.originalOptions);
                    originalOptions.forEach(opt => {
                        var option = document.createElement("option");
                        option.text = opt.text;
                        option.value = opt.value;
                        chk_select.add(option);
                    });
                }

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
            if (presentCheckbox) {
                presentCheckbox.disabled = false;
            }
        }
    }


    // Define an object to store the original options of each select element
    const newOptions = {};

    function handleNAArray(checkboxId, inputIds, selectIds, chkboxIds, onlyDisableChkboxId, onlyDisableInputId) {
        const checkbox = document.getElementById(checkboxId);
        const inputs = inputIds.map((id) => document.getElementById(id));
        const selects = selectIds.map((id) => document.getElementById(id));
        const checkboxes = chkboxIds.map((id) => document.getElementById(id));
        const onlyDisableCheckbox = document.getElementById(onlyDisableChkboxId);
        const onlyDisableInput = document.getElementById(onlyDisableInputId);

        // Store the original options of each select element
        selects.forEach((select) => {
            newOptions[select.id] = Array.from(select.options).map((option) => {
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
                    select.style.display = "block";
                    // Append option to select
                    select.appendChild(optionNA);
                    select.disabled = true;
                });
                checkboxes.forEach((chkbx) => {
                    chkbx.checked = true;
                    chkbx.disabled = true;
                });
                if (onlyDisableCheckbox) {
                    onlyDisableCheckbox.checked = false;
                    onlyDisableCheckbox.disabled = true;
                    onlyDisableInput.style.display = "none";
                }
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
                    newOptions[select.id].forEach((optionData) => {
                        const option = document.createElement("option");
                        option.text = optionData.text;
                        option.value = optionData.value;
                        select.appendChild(option);
                    });
                    if (select.id == "p_attendance_toG") {
                        select.style.display = "block";
                    }
                    select.disabled = false;
                });
                checkboxes.forEach((chkbx) => {
                    chkbx.checked = false;
                    chkbx.disabled = false;
                });
                if (onlyDisableCheckbox) {
                    onlyDisableCheckbox.disabled = false;
                }
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
        ],
        "present_toG", "topresentG"
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
                // Add the new-row class to the cloned row
                clonedRow.classList.add('new-row');

                const levelandPresent = clonedRow.querySelectorAll(".level, .present");
                levelandPresent.forEach(element => {
                    element.hidden = true;
                });

                // Clear checkbox values and enable checkboxes in the cloned row
                const checkboxes = clonedRow.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        checkbox.checked = false; // Uncheck the checkbox if it's checked
                    }
                });

                // Clear select values and enable select boxes in the cloned row
                const selects = clonedRow.querySelectorAll('select');
                selects.forEach(function (select) {
                    // Clear the value of the select box and add --SELECT-- option
                    select.disabled = false;
                    select.innerHTML = "";

                    var option = document.createElement("option");
                    option.text = "--SELECT--"; // Add --SELECT-- option
                    option.value = ""; // Empty value for --SELECT--
                    select.add(option);

                    select.value = ''; // Set the value to an empty string

                    // Populate year dropdowns or other options as necessary
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