<div class="container-fluid">
    <div class="row mt-5">
        <!-- Special Skills and Hobbies -->
        <div class="col-4">
            <p class="desc">
                SPECIAL SKILLS AND HOBBIES
            </p>
            <div class="skills-container">
                <div class="checkbox-container mb-2">
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="skills_na" onclick="checkNA('skills')">
                        <label class="form-check-label" for="skills_na">N/A</label>
                    </div>

                    <input type="text" name="skills[]" class="form-control group-na" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-row-button mt-1 float-end" id="oi_skills_addrow"
                onclick="addInput('skills')">
                ADD ROW
            </button>
        </div>
        <!-- NON-ACADEMIC DISTINCTIONS/RECOGNITION -->
        <div class="col-4">
            <p class="desc">
                NON-ACADEMIC DISTINCTIONS/RECOGNITION (Write in full)
            </p>
            <div class="distinctions-container">
                <div class="checkbox-container mb-2 remove_na">
                    <div class="form-check me-2 remove_na">
                        <input class="form-check-input" type="checkbox" id="distinctions_na"
                            onclick="checkNA('distinctions')">
                        <label class="form-check-label" for="distinctions_na">N/A</label>
                    </div>
                    <button type="button" class="delete-row-button mx-3"
                        style="display:none; background-color: transparent; border: none; color: red;">
                    </button>
                    <input type="text" name="distinctions[]" class="form-control group-na" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-row-button mt-1 float-end" id="oi_distinctions_addrow"
                onclick="addInput('distinctions')">
                ADD ROW
            </button>
        </div>
        <!--MEMBERS IN ASSOCIATION/ORGANIZATION (Write in full)  -->
        <div class="col-4">
            <p class="desc">
                MEMBERS IN ASSOCIATION/ORGANIZATION (Write in full)
            </p>
            <div class="membership-container">
                <div class="checkbox-container mb-2 remove_na">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="membership_na"
                            onclick="checkNA('membership')">
                        <label class="form-check-label" for="membership_na">N/A</label>
                    </div>
                    <input type="text" name="membership[]" class="form-control group-na" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-row-button mt-1 float-end" id="oi_membership_addrow"
                onclick="addInput('membership')">
                ADD ROW
            </button>
        </div>
    </div>
    <hr>
    <!-- QUESTIONS -->
    <div class="container">
        <div class="row">
            <p>
                Are you related by consanguinity or affinity to the appointing or recommending authority,
                or to the chief of bureau or office or to the person who has immediate supervision over you
                in the Office, Bureau or Department where you will be appointed?
            </p>
            <div class="input">
                <p>a. within the third degree?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_3rd_yes" name="radio_degree_3rd" value="Y" required>
                    <label for="radio_degree_3rd_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_3rd_no" name="radio_degree_3rd" value="N" required>
                    <label for="radio_degree_3rd_no">No</label>
                </div>
            </div>
            <div class="input">
                <p>b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_4th_yes" name="radio_degree_4th" value="Y">
                    <label for="radio_degree_4th_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_4th_no" name="radio_degree_4th" value="N">
                    <label for="radio_degree_4th_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_degree_4th" name="input_degree_4th" class="form-control"
                            value="N/A" required disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="input">
                <p>a. Have you ever been found guilty of any administrative offense?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_guilty_yes" name="radio_guilty" value="Y">
                    <label for="radio_guilty_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_guilty_no" name="radio_guilty" value="N">
                    <label for="radio_guilty_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_guilty" name="input_guilty" class="form-control" value="N/A"
                            required disabled>
                    </div>
                </div>
            </div>
            <div class="input">
                <p>b. Have you ever been criminally charged before any court?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_charged_yes" name="radio_charged" value="Y">
                    <label for="radio_charged_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_charged_no" name="radio_charged" value="N">
                    <label for="radio_charged_no">No</label>
                </div>
                <div class="my-3">
                    <p>If YES, please give details:</p>
                    <div class="row">
                        <div class="col-3">
                            <p>Date Filed:</p>
                        </div>
                        <div class="col-2">
                            <input type="text" id="input_filed" name="input_filed" class="form-control" value="N/A"
                                required disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Status of Case/s:</p>
                        </div>
                        <div class="col">
                            <input type="text" id="input_status" name="input_status" class="form-control" value="N/A"
                                required disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="input">
                <p>
                    Have you ever been convicted of any crime or violation of any
                    law, decree, ordinance or regulation by any court or tribunal?
                </p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_convicted_yes" name="radio_convicted" value="Y">
                    <label for="radio_convicted_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_convicted_no" name="radio_convicted" value="N">
                    <label for="radio_convicted_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_convicted" name="input_convicted" class="form-control" value="N/A"
                            required disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row input">
            <p>
                Have you ever been seperated from the service in any of the following modes:
                resignation, retirement, dropped from the rolls, dismissal, termination, end of term,
                finished contract or phased out (abolition) in the public or private sector?
            </p>
            <div>
                &emsp;
                <input type="radio" id="radio_seperated_yes" name="radio_seperated" value="Y">
                <label for="radio_seperated_yes">Yes</label>
            </div>
            <div>
                &emsp;
                <input type="radio" id="radio_seperated_no" name="radio_seperated" value="N">
                <label for="radio_seperated_no">No</label>
            </div>
            <div class="row my-3">
                <div class="col-3">
                    <p>If YES, please give details:</p>
                </div>
                <div class="col">
                    <input type="text" id="input_seperated" name="input_seperated" class="form-control" value="N/A"
                        required disabled>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="input">
                <p>
                    a. Have you ever been a candidate in a national or local election
                    held within the last year (except Barangay Election)?
                </p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_candidate_yes" name="radio_candidate" value="Y">
                    <label for="radio_candidate_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_candidate_no" name="radio_candidate" value="N">
                    <label for="radio_candidate_no">No</label>
                </div>
            </div>
            <div class="input">
                <p>
                    b. Have you resigned from the government service during the
                    three(3)-month period before the last election to
                    promote/actively campaign for a national or local candidate?
                </p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_resigned_yes" name="radio_resigned" value="Y">
                    <label for="radio_resigned_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_resigned_no" name="radio_resigned" value="N">
                    <label for="radio_resigned_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_resigned" name="input_resigned" class="form-control" value="N/A"
                            required disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row input">
            <p>Have you acquired the status of an immigrant or permanent resident of another country?</p>
            <div>
                &emsp;
                <input type="radio" id="radio_immigrant_yes" name="radio_immigrant" value="Y">
                <label for="radio_immigrant_yes">Yes</label>
            </div>
            <div>
                &emsp;
                <input type="radio" id="radio_immigrant_no" name="radio_immigrant" value="N">
                <label for="radio_immigrant_no">No</label>
            </div>
            <div class="row my-3">
                <div class="col-3">
                    <p>If YES, please give details (country):</p>
                </div>
                <div class="col">
                    <input type="text" id="input_immigrant" name="input_immigrant" class="form-control" value="N/A"
                        required disabled>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <p>
                Pursuant to: (a) Indigenous People's Act (RA 8371);
                (b) Magna Carta for Disabled Persons (RA 7277);
                and (c) Solo Parents Welfare Act of 2000 (RA 8972),
                please answer the following items:
            </p>
            <div class="input">
                <p>a. Are you a member of any indigenous group?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_indigenous_yes" name="radio_indigenous" value="Y">
                    <label for="radio_indigenous_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_indigenous_no" name="radio_indigenous" value="N">
                    <label for="radio_indigenous_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please specify:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_indigenous" name="input_indigenous" class="form-control"
                            value="N/A" required disabled>
                    </div>
                </div>
            </div>
            <div class="input">
                <p>b. Are you a person with disability?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_disability_yes" name="radio_disability" value="Y">
                    <label for="radio_disability_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_disability_no" name="radio_disability" value="N">
                    <label for="radio_disability_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please specify ID No:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_disability" name="input_disability" class="form-control"
                            value="N/A" required disabled>
                    </div>
                </div>
            </div>
            <div class="input">
                <p>c. Are you a solo parent?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_soloparent_yes" name="radio_soloparent" value="Y">
                    <label for="radio_soloparent_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_soloparent_no" name="radio_soloparent" value="N">
                    <label for="radio_soloparent_no">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please specify ID:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_soloparent" name="input_soloparent" class="form-control"
                            value="N/A" required disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SUBMIT BUTTON -->
    <button type="submit" class="btn btn-primary mt-5 mx-1 button-right">
        <strong>SUBMIT</strong>
    </button>

    <!-- BACK BUTTON -->
    <button type="button" class="btn btn-secondary mt-5 mx-1 button-left" data-bs-target="#carousel"
        data-bs-slide="prev">
        <strong>PREV</strong>
    </button>

    <!-- NEXT BUTTON -->
    <button type="button" class="btn btn-primary mt-5 mx-1 button-right" data-bs-target="#carousel"
        data-bs-slide="next">
        <strong>NEXT</strong>
    </button>
</div>

<script>

    // ======================== Next button ====================================
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to the "Next" button
        document.getElementById('nextButton').addEventListener('click', submitForm);
    });


    // Function to submit the form
    function submitForm() {
        // Get all input fields with class "group-na"
        var inputs = document.querySelectorAll('.group-na');

        // Check if all input fields are filled out
        var allInputsFilled = true;
        inputs.forEach(function (input) {
            if (!input.value.trim()) {
                allInputsFilled = false;
            }
        });

        // Check if all required radio buttons are selected and corresponding input boxes filled
        var allRadioSelected = checkAllRadioSelected();

        // If all input fields and radio buttons are filled out, submit the form
        if (allInputsFilled && allRadioSelected) {
            window.location.href = "pds_form.php?form_section=ref";
        } else {
            alert("Please fill out all input fields and select all required options before proceeding.");
        }
    }

    // Function to check if all required radio buttons are selected and corresponding input boxes filled
    function checkAllRadioSelected() {
        // Get all radio button groups
        var radioGroups = document.querySelectorAll('[name^="radio_"]');

        // Iterate over each radio button group
        for (var i = 0; i < radioGroups.length; i++) {
            var radioGroup = radioGroups[i];
            var radioButtons = document.querySelectorAll('[name="' + radioGroup.name + '"]');
            var isSelected = false;

            // Check if at least one radio button in the group is selected
            for (var j = 0; j < radioButtons.length; j++) {
                if (radioButtons[j].checked) {
                    isSelected = true;
                    // If "Yes" option is selected, check if the corresponding input box is filled
                    if (radioButtons[j].value === "Y") {
                        var input_container = radioButtons[j].closest('.input');
                        var inputBox = input_container.querySelector('input[type="text"]');
                        if (!inputBox.value.trim()) {
                            return false;
                        }
                    }
                    break;
                }
            }

            // If no radio button in the group is selected, return false
            if (!isSelected) {
                return false;
            }
        }

        return true; // Return true if all required radio buttons are selected and corresponding input boxes filled
    }


    function addInput(section) {
        var container = document.querySelector('.' + section + '-container');
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('checkbox-container');
        inputGroup.classList.add('mb-2');

        var input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', section + '[]');
        input.classList.add('form-control');
        input.required = true;

        // Create delete button
        var deleteButton = document.createElement('button');
        deleteButton.innerHTML = '<i class="bi bi-x-lg"></i>';
        deleteButton.classList.add('delete-row-button');
        deleteButton.addEventListener('click', function () {
            inputGroup.parentNode.removeChild(inputGroup);
        });
        deleteButton.style.cssText = 'background-color: transparent; border: none; color: red; margin: 15px;';

        inputGroup.appendChild(deleteButton);
        inputGroup.appendChild(input);
        container.appendChild(inputGroup);
    }

    //Function to handle checking NA checkboxes
    function checkNA(section) {
        var checkbox = document.getElementById(section + '_na');
        var input = document.querySelector('.' + section + '-container .form-control');
        var addrow = document.getElementById('oi_' + section + '_addrow');

        if (checkbox.checked) {
            input.value = "N/A";
            input.disabled = true;
            addrow.disabled = true;
        } else {
            input.value = "";
            input.disabled = false;
            addrow.disabled = false;
        }
        // Remove cloned rows if they exist
        const clonedRows = document.querySelectorAll("." + section + "-container .checkbox-container");
        clonedRows.forEach((clonedRow) => {
            if (clonedRow !== checkbox.closest('.checkbox-container')) {
                clonedRow.remove();
            }
        });

        input.addEventListener("input", function () {
            if (this.value === "N/A") {
                checkbox.checked = true;
                this.disabled = true;
                addrow.disabled = true;
            }
        })
    }

    checkNA('skills');
    checkNA('distinctions');
    checkNA('membership');

    // Function to enable/disable input fields based on radio button selection
    function toggleInput(inputId, radioId) {
        const inputBox = document.getElementById(inputId);
        const radioButton = document.getElementById(radioId);

        radioButton.addEventListener('change', function () {
            if (this.value === "Y") {
                if (inputBox.id == "input_filed") {
                    inputBox.type = "date";
                }
                inputBox.value = "";
                inputBox.disabled = false;
            } else {
                if (inputBox.id == "input_filed") {
                    inputBox.type = "text";
                }
                inputBox.value = "N/A";
                inputBox.disabled = true;
            }
        });
    }

    // Call the function for each pair of radio and input
    toggleInput("input_degree_4th", "radio_degree_4th_yes"); // For Yes
    toggleInput("input_degree_4th", "radio_degree_4th_no"); // For No

    toggleInput("input_guilty", "radio_guilty_yes");
    toggleInput("input_guilty", "radio_guilty_no");

    toggleInput("input_filed", "radio_charged_yes"); //to disable and remove text for status of case/s
    toggleInput("input_filed", "radio_charged_no");

    toggleInput("input_status", "radio_charged_yes");
    toggleInput("input_status", "radio_charged_no");

    toggleInput("input_convicted", "radio_convicted_yes");
    toggleInput("input_convicted", "radio_convicted_no");

    toggleInput("input_seperated", "radio_seperated_yes");
    toggleInput("input_seperated", "radio_seperated_no");

    toggleInput("input_resigned", "radio_resigned_yes");
    toggleInput("input_resigned", "radio_resigned_no");

    toggleInput("input_immigrant", "radio_immigrant_yes");
    toggleInput("input_immigrant", "radio_immigrant_no");

    toggleInput("input_indigenous", "radio_indigenous_yes");
    toggleInput("input_indigenous", "radio_indigenous_no");

    toggleInput("input_disability", "radio_disability_yes");
    toggleInput("input_disability", "radio_disability_no");

    toggleInput("input_soloparent", "radio_soloparent_yes");
    toggleInput("input_soloparent", "radio_soloparent_no");
</script>