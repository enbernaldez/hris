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

                    <input type="text" name="skills[]" class="form-control" required>
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
                    <input type="text" name="distinctions[]" class="form-control" required>
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
                    <input type="text" name="membership[]" class="form-control" required>
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
            <div>
                <p>a. within the third degree?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_3rd_yes" name="radio_degree_3rd" value="yes" required>
                    <label for="radio_degree_3rd_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_3rd_no" name="radio_degree_3rd" value="no" required>
                    <label for="radio_degree_3rd_no">No</label>
                </div>
            </div>
            <div>
                <p>b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_4th_yes" name="radio_degree_4th" value="yes">
                    <label for="radio_degree_4th_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree_4th_no" name="radio_degree_4th" value="no">
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
            <div>
                <p>a. Have you ever been found guilty of any administrative offense?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_guilty_yes" name="radio_guilty" value="yes">
                    <label for="radio_guilty_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_guilty_no" name="radio_guilty" value="no">
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
            <div>
                <p>b. Have you ever been criminally charged before any court?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_charged_yes" name="radio_charged" value="yes">
                    <label for="radio_charged_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_charged_no" name="radio_charged" value="no">
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
            <div>
                <p>
                    Have you ever been convicted of any crime or violation of any
                    law, decree, ordinance or regulation by any court or tribunal?
                </p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_convicted_yes" name="radio_convicted" value="yes">
                    <label for="radio_convicted_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_convicted_no" name="radio_convicted" value="no">
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
        <div class="row">
            <p>
                Have you ever been seperated from the service in any of the following modes:
                resignation, retirement, dropped from the rolls, dismissal, termination, end of term,
                finished contract or phased out (abolition) in the public or private sector?
            </p>
            <div>
                &emsp;
                <input type="radio" id="radio_seperated_yes" name="radio_seperated" value="yes">
                <label for="radio_seperated_yes">Yes</label>
            </div>
            <div>
                &emsp;
                <input type="radio" id="radio_seperated_no" name="radio_seperated" value="no">
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
            <div>
                <p>
                    a. Have you ever been a candidate in a national or local election
                    held within the last year (except Barangay Election)?
                </p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_candidate_yes" name="radio_candidate" value="yes">
                    <label for="radio_candidate_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_candidate_no" name="radio_candidate" value="no">
                    <label for="radio_candidate_no">No</label>
                </div>
            </div>
            <div>
                <p>
                    b. Have you resigned from the government service during the
                    three(3)-month period before the last election to
                    promote/actively campaign for a national or local candidate?
                </p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_resigned_yes" name="radio_resigned" value="yes">
                    <label for="radio_resigned_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_resigned_no" name="radio_resigned" value="no">
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
        <div class="row">
            <p>Have you acquired the status of an immigrant or permanent resident of another country?</p>
            <div>
                &emsp;
                <input type="radio" id="radio_immigrant_yes" name="radio_immigrant" value="yes">
                <label for="radio_immigrant_yes">Yes</label>
            </div>
            <div>
                &emsp;
                <input type="radio" id="radio_immigrant_no" name="radio_immigrant" value="no">
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
            <div>
                <p>a. Are you a member of any indigenous group?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_indigenous_yes" name="radio_indigenous" value="yes">
                    <label for="radio_indigenous_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_indigenous_no" name="radio_indigenous" value="no">
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
            <div>
                <p>b. Are you a person with disability?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_disability_yes" name="radio_disability" value=" yes">
                    <label for="radio_disability_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_disability_no" name="radio_disability" value="no">
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
            <div>
                <p>c. Are you a solo parent?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_soloparent_yes" name="radio_soloparent" value="yes">
                    <label for="radio_soloparent_yes">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_soloparent_no" name="radio_soloparent" value="no">
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
</div>
<script>
    function addInput(section) {
        var container = document.querySelector('.' + section + '-container');
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('checkbox-container');
        inputGroup.classList.add('mb-2');

        // var naDiv = document.createElement('div');
        // naDiv.classList.add('form-check');
        // naDiv.classList.add('me-2');

        // inputGroup.appendChild(naDiv);

        // var checkbox = document.createElement('input');
        // checkbox.classList.add('form-check-input');
        // checkbox.setAttribute('type', 'checkbox');
        // checkbox.setAttribute('id', section + '_delete'); // Change id to distinguish from 'N/A' checkbox
        // checkbox.setAttribute('onclick', 'deleteRow(this)'); // Set onclick to delete row

        // var checkboxLabel = document.createElement('label');
        // checkboxLabel.classList.add('form-check-label');
        // checkboxLabel.setAttribute('for', section + '_delete'); // Change for attribute
        // checkboxLabel.textContent = 'Delete'; // Change label text

        // naDiv.appendChild(checkbox);
        // naDiv.appendChild(checkboxLabel);

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
    }

    // function deleteRow(button) {
    //     var row = button.closest(".checkbox-container");
    //     row.remove();
    // }

    // Function to enable/disable input fields based on radio button selection
    function toggleInput(inputId, radioId) {
        const inputBox = document.getElementById(inputId);
        const radioButton = document.getElementById(radioId);

        radioButton.addEventListener('change', function () {
            if (this.value === "yes") {
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