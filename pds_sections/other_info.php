<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-4">
            <p class="desc">
                SPECIAL SKILLS AND HOBBIES
            </p>
            <div class="skills-container">
                <div class="checkbox-container mb-2">
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
        <div class="col-4">
            <p class="desc">
                NON-ACADEMIC DISTINCTIONS/RECOGNITION (Write in full)
            </p>
            <div class="distinctions-container">
                <div class="checkbox-container mb-2">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="distinctions_na"
                            onclick="checkNA('distinctions')">
                        <label class="form-check-label" for="distinctions_na">N/A</label>
                    </div>
                    <input type="text" name="distinctions[]" class="form-control" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-row-button mt-1 float-end" id="oi_distinctions_addrow"
                onclick="addInput('distinctions')">
                ADD ROW
            </button>
        </div>
        <div class="col-4">
            <p class="desc">
                MEMBERS IN ASSOCIATION/ORGANIZATION (Write in full)
            </p>
            <div class="members-container">
                <div class="checkbox-container mb-2">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="members_na" onclick="checkNA('members')">
                        <label class="form-check-label" for="members_na">N/A</label>
                    </div>
                    <input type="text" name="members[]" class="form-control" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-row-button mt-1 float-end" id="oi_members_addrow"
                onclick="addInput('members')">
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
                    <input type="radio" id="radio_consanguinity1" name="radio_consanguinity" value="yes" required>
                    <label for="radio_consanguinity1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_consanguinity" name="radio_consanguinity" value="no" required>
                    <label for="radio_consanguinity">No</label>
                </div>
            </div>
            <div>
                <p>b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree1" name="radio_degree" value="yes">
                    <label for="radio_degree1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_degree" name="radio_degree" value="no">
                    <label for="radio_degree">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_degree" name="input_degree" class="form-control" required disabled>
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
                    <input type="radio" id="radio_guilty1" name="radio_guilty" value="yes">
                    <label for="radio_guilty1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_guilty" name="radio_guilty" value="no">
                    <label for="radio_guilty">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_guilty" name="input_guilty" class="form-control" required disabled>
                    </div>
                </div>
            </div>
            <div>
                <p>b. Have you ever been criminally charged before any court?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_filed1" name="radio_filed" value="yes">
                    <label for="radio_filed1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_filed" name="radio_filed" value="no">
                    <label for="radio_filed">No</label>
                </div>
                <div class="my-3">
                    <p>If YES, please give details:</p>
                    <div class="row">
                        <div class="col-3">
                            <p>Date Filed:</p>
                        </div>
                        <div class="col-2">
                            <input type="date" id="input_filed" name="input_filed" class="form-control" required
                                disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Status of Case/s:</p>
                        </div>
                        <div class="col">
                            <input type="text" id="input_status" name="input_status" class="form-control" required
                                disabled>
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
                    <input type="radio" id="radio_convicted1" name="radio_convicted" value="yes">
                    <label for="radio_convicted1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_convicted" name="radio_convicted" value="no">
                    <label for="radio_convicted">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_convicted" name="input_convicted" class="form-control" required
                            disabled>
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
                <input type="radio" id="radio_seperated1" name="radio_seperated" value="yes">
                <label for="radio_seperated1">Yes</label>
            </div>
            <div>
                &emsp;
                <input type="radio" id="radio_seperated" name="radio_seperated" value="no">
                <label for="radio_seperated">No</label>
            </div>
            <div class="row my-3">
                <div class="col-3">
                    <p>If YES, please give details:</p>
                </div>
                <div class="col">
                    <input type="text" id="input_seperated" name="input_seperated" class="form-control" required
                        disabled>
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
                    <input type="radio" id="radio_candidate1" name="radio_candidate" value="yes">
                    <label for="radio_candidate1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_candidate" name="radio_candidate" value="no">
                    <label for="radio_candidate">No</label>
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
                    <input type="radio" id="radio_resigned1" name="radio_resigned" value="yes">
                    <label for="radio_resigned1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_resigned" name="radio_resigned" value="no">
                    <label for="radio_resigned">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please give details:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_resigned" name="input_resigned" class="form-control" required
                            disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <p>Have you acquired the status of an immigrant or permanent resident of another country?</p>
            <div>
                &emsp;
                <input type="radio" id="radio_immigrant1" name="radio_immigrant" value="yes">
                <label for="radio_immigrant1">Yes</label>
            </div>
            <div>
                &emsp;
                <input type="radio" id="radio_immigrant" name="radio_immigrant" value="no">
                <label for="radio_immigrant">No</label>
            </div>
            <div class="row my-3">
                <div class="col-3">
                    <p>If YES, please give details (country):</p>
                </div>
                <div class="col">
                    <input type="text" id="input_immigrant" name="input_immigrant" class="form-control" required
                        disabled>
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
                    <input type="radio" id="radio_indigenous1" name="radio_indigenous" value="yes">
                    <label for="radio_indigenous1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_indigenous" name="radio_indigenous" value="no">
                    <label for="radio_indigenous">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please specify:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_indigenous" name="input_indigenous" class="form-control" required
                            disabled>
                    </div>
                </div>
            </div>
            <div>
                <p>b. Are you a person with disability?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_disability1" name="radio_disability" value=" yes">
                    <label for="radio_disability1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_disability" name="radio_disability" value="no">
                    <label for="radio_disability">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please specify ID No:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_disability" name="input_disability" class="form-control" required
                            disabled>
                    </div>
                </div>
            </div>
            <div>
                <p>c. Are you a solo parent?</p>
                <div>
                    &emsp;
                    <input type="radio" id="radio_solo1" name="radio_solo" value="yes">
                    <label for="radio_solo1">Yes</label>
                </div>
                <div>
                    &emsp;
                    <input type="radio" id="radio_solo" name="radio_solo" value="no">
                    <label for="radio_solo">No</label>
                </div>
                <div class="row my-3">
                    <div class="col-3">
                        <p>If YES, please specify ID:</p>
                    </div>
                    <div class="col">
                        <input type="text" id="input_solo" name="input_solo" class="form-control" required disabled>
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

        var naDiv = document.createElement('div');
        naDiv.classList.add('form-check');
        naDiv.classList.add('me-2');

        inputGroup.appendChild(naDiv);

        var checkbox = document.createElement('input');
        checkbox.classList.add('form-check-input');
        checkbox.setAttribute('type', 'checkbox');
        checkbox.setAttribute('id', section + '_delete'); // Change id to distinguish from 'N/A' checkbox
        checkbox.setAttribute('onclick', 'deleteRow(this)'); // Set onclick to delete row

        var checkboxLabel = document.createElement('label');
        checkboxLabel.classList.add('form-check-label');
        checkboxLabel.setAttribute('for', section + '_delete'); // Change for attribute
        checkboxLabel.textContent = 'Delete'; // Change label text

        naDiv.appendChild(checkbox);
        naDiv.appendChild(checkboxLabel);

        var input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', section + '[]');
        input.classList.add('form-control');
        input.required = true;

        inputGroup.appendChild(input);

        container.appendChild(inputGroup);
    }

    //Delete added row
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
    }

    function deleteRow(button) {
        var row = button.closest(".checkbox-container");
        row.remove();
    }

    // Function to enable/disable input fields based on radio button selection
    function toggleInput(inputId, radioId) {
        const inputBox = document.getElementById(inputId);
        const radioButton = document.getElementById(radioId);

        radioButton.addEventListener('change', function () {
            inputBox.disabled = (this.value === 'no');
        });
    }

    // Call the function for each pair of radio and input
    toggleInput("input_degree", "radio_degree1"); // For Yes
    toggleInput("input_degree", "radio_degree"); // For No

    toggleInput("input_guilty", "radio_guilty1");
    toggleInput("input_guilty", "radio_guilty");

    toggleInput("input_filed", "radio_filed1"); //to disable and remove text for status of case/s
    toggleInput("input_filed", "radio_filed");

    toggleInput("input_status", "radio_filed1");
    toggleInput("input_status", "radio_filed");

    toggleInput("input_convicted", "radio_convicted1");
    toggleInput("input_convicted", "radio_convicted");

    toggleInput("input_seperated", "radio_seperated1");
    toggleInput("input_seperated", "radio_seperated");

    toggleInput("input_resigned", "radio_resigned1");
    toggleInput("input_resigned", "radio_resigned");

    toggleInput("input_immigrant", "radio_immigrant1");
    toggleInput("input_immigrant", "radio_immigrant");

    toggleInput("input_indigenous", "radio_indigenous1");
    toggleInput("input_indigenous", "radio_indigenous");

    toggleInput("input_disability", "radio_disability1");
    toggleInput("input_disability", "radio_disability");

    toggleInput("input_solo", "radio_solo1");
    toggleInput("input_solo", "radio_solo");
</script>