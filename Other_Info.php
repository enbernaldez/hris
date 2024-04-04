<!DOCTYPE html>
<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <title>Other Information</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="icons/bootstrap-icons.css" />
    <style>
        nav {
            background-color: #283872;
            width: 100%;
        }

        nav a {
            text-decoration: none;
            color: #e4e9ff;
        }

        nav a:hover {
            color: #0f1636;
        }

        .edit-link {
            float: right;
            margin-right: 20px;
            color: #007bff;
        }

        .paragraph-margin {
            margin-bottom: 10px;
        }

        .desc {
            text-align: center;
        }

        hr {
            color: antiquewhite;
        }
    </style>
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- SIDEBAR -->
            <?php
            include_once 'sidebar1.php';
            ?>
            <!-- CONTENT -->
            <div class="col-10 pb-5">
                <!-- Profile -->
                <div class="row mt-2 mb-2">
                    <div class="col-2">
                        <img src="images/Bercilla.jpg" alt="profile" style="height:150px; width:auto"
                            class="img-fluid float-end">
                    </div>
                    <div class="col align-items-center">
                        <p class="display-6"><strong>FIRST NAME MI. LAST NAME</strong></p>
                        <h4><strong>POSITION</strong></h4>
                    </div>
                    <div class="col-4">
                        <img src="images/PSA Vector.png" alt="profile" style="height:150px; width:auto"
                            class="img-fluid mb-3 float-end">
                    </div>
                </div>
                <?php include_once 'topnav.php'; ?>
                <div class="row mt-5">
                    <div class="col-4">
                        <p class="desc">SPECIAL SKILLS AND HOBBIES</p>
                        <div class="skills-container">
                            <div class="input-group mb-2">
                                <input class="form-check-input me-2" type="checkbox" id="skills_na"
                                    onclick="checkNA('skills')" required>
                                <label class="form-check-label me-2" for="skills_na">N/A</label>
                                <input type="text" name="skills[]" class="form-control" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary add-row-button float-end"
                            onclick="addInput('skills')">ADD ROW</button>
                    </div>
                    <div class="col-4">
                        <p class="desc">NON-ACADEMIC DISTINCTIONS/DISTINCTIONS (Write in full)</p>
                        <div class="distinctions-container">
                            <div class="input-group mb-2">
                                <input class="form-check-input me-2" type="checkbox" id="distinctions_na"
                                    onclick="checkNA('distinctions')" required>
                                <label class="form-check-label me-2" for="distinctions_na">N/A</label>
                                <input type="text" name="distinctions[]" class="form-control" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary add-row-button float-end"
                            onclick="addInput('distinctions')">ADD ROW</button>
                    </div>
                    <div class="col-4">
                        <p class="desc">MEMBERS IN ASSOCIATION/ORGANIZATION (Write in full)</p>
                        <div class="members-container">
                            <div class="input-group mb-2">
                                <input class="form-check-input me-2" type="checkbox" id="members_na"
                                    onclick="checkNA('members')" required>
                                <label class="form-check-label me-2" for="members_na">N/A</label>
                                <input type="text" name="members[]" class="form-control" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary add-row-button float-end"
                            onclick="addInput('members')">ADD ROW</button>
                    </div>
                </div>
                <!-- QUESTIONS -->
                <div class="row mt-3">
                    <div class="col-12">
                        <p>Are you related by consanguinity or affinity to the appointing or recommending authority, or
                            to the chief of bureau or office or to the person who has immediate supervision over you in
                            the Office, Bureau or Department where you will be appointed?</p>
                        <div>
                            <p>a. within the third degree?</p>
                            <div>
                                &emsp;<input type="radio" id="radio_consanguinity1" name="radio_consanguinity"
                                    value="yes" required> Yes
                            </div>
                            <div>
                                &emsp;<input type="radio" id="radio_consanguinity" name="radio_consanguinity" value="no"
                                    required> No
                            </div>
                        </div>
                        <div>
                            <p>b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                            <div>
                                &emsp;<input type="radio" id="radio_degree1" name="radio_degree" value="yes"> Yes
                            </div>
                            <div>
                                &emsp;<input type="radio" id="radio_degree" name="radio_degree" value="no"> No
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p>If YES, please give details:</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" id="input_degree" name="input_degree" class="form-control"
                                        required disabled>
                                </div>

                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div>
                                <p>a. Have you ever been found guilty of any administrative offense?</p>
                                <div>
                                    &emsp;<input type="radio" id="radio_guilty1" name="radio_guilty" value="yes"> Yes
                                </div>
                                <div>
                                    &emsp;<input type="radio" id="radio_guilty" name="radio_guilty" value="no"> No
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p>If YES, please give details:</p>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="input_guilty" name="input_guilty" class="form-control"
                                            required disabled>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <p>b. Have you ever been criminally charged before any court?</p>
                                <div>
                                    &emsp;<input type="radio" id="radio_filed1" name="radio_filed" value="yes"> Yes
                                </div>
                                <div>
                                    &emsp;<input type="radio" id="radio_filed" name="radio_filed" value="no"> No
                                </div>
                                <p>If YES, please give details:</p>
                                <div class="row">
                                    <div class="col-3 mb-2">
                                        <p>Date Filed:</p>
                                    </div>
                                    <div class="col-4">
                                        <input type="date" id="input_filed" name="input_filed" class="form-control"
                                            required disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 mb-2">
                                        <p>Status of Case/s:</p>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="input_status" name="input_status" class="form-control"
                                            required disabled>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-12">
                                <p>Have you ever been convicted of any crime or violation of any law, decree,
                                    ordinance or regulation by any court or tribunal?</p>
                                <div>
                                    &emsp;<input type="radio" id="radio_convicted1" name="radio_convicted" value="yes">
                                    Yes
                                </div>
                                <div>
                                    &emsp;<input type="radio" id="radio_convicted" name="radio_convicted" value="no"> No
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p>If YES, please give details:</p>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="input_convicted" name="input_convicted"
                                            class="form-control" required disabled>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Have you ever been seperated from the service in any of the following modes:
                                resignation, retirement, dropped from the rolls, dismissal, termination, end of
                                term, finished contract or phased out (abolition) in the public or private
                                sector?</p>
                            <div>
                                &emsp;<input type="radio" id="radio_seperated1" name="radio_seperated" value="yes"> Yes
                            </div>
                            <div>
                                &emsp;<input type="radio" id="radio_seperated" name="radio_seperated" value="no"> No
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p>If YES, please give details:</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" id="input_seperated" name="input_seperated" class="form-control"
                                        required disabled>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div class="col-12">
                                    <div>
                                        <p>a. Have you ever been a candidate in a national or local election
                                            held within the last year (except Barangay Election)?
                                        <div>
                                            &emsp;<input type="radio" id="radio_candidate1" name="radio_candidate"
                                                value="yes"> Yes
                                        </div>
                                        <div>
                                            &emsp;<input type="radio" id="radio_candidate" name="radio_candidate"
                                                value="no"> No
                                        </div>
                                    </div>
                                    <div>
                                        <p>b. Have you resigned from the government service during the three
                                            (3)-month period before the last election to promote/actively
                                            campaign for a national or local candidate?</p>
                                        <div>
                                            &emsp;<input type="radio" id="radio_resigned1" name="radio_resigned"
                                                value="yes"> Yes
                                        </div>
                                        <div>
                                            &emsp;<input type="radio" id="radio_resigned" name="radio_resigned"
                                                value="no"> No
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <p>If YES, please give details:</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" id="input_resigned" name="input_resigned"
                                                    class="form-control" required disabled>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>Have you acquired the status of an immigrant or permanent resident of
                                        another country?</p>
                                    <div>
                                        &emsp;<input type="radio" id="radio_immigrant1" name="radio_immigrant"
                                            value="yes"> Yes
                                    </div>
                                    <div>
                                        &emsp;<input type="radio" id="radio_immigrant" name="radio_immigrant"
                                            value="no"> No
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p>If YES, please give details (country):</p>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="input_immigrant" name="input_immigrant"
                                            class="form-control" required disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div>
                                        <p>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna
                                            Carta for Disabled Persons (RA 7277); and (c) Solo Parents
                                            Welfare Act of 2000 (RA 8972), please answer the following
                                            items:</p>
                                        <p>a. Are you a member of any indigenous group?</p>
                                        <div>
                                            &emsp;<input type="radio" id="radio_indigenous1" name="radio_indigenous"
                                                value="yes"> Yes
                                        </div>
                                        <div>
                                            &emsp;<input type="radio" id="radio_indigenous" name="radio_indigenous"
                                                value="no"> No
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <p>If YES, please specify:</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" id="input_indigenous" name="input_indigenous"
                                                    class="form-control" required disabled>
                                            </div>
                                        </div>
                                        <div>
                                            <p>b. Are you a person with disability?</p>
                                            <div>
                                                &emsp;<input type="radio" id="radio_disability1" name="radio_disability"
                                                    value=" yes"> Yes
                                            </div>
                                            <div>
                                                &emsp;<input type="radio" id="radio_disability" name="radio_disability"
                                                    value="no"> No
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p>If YES, please specify ID No:</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" id="input_disability" name="input_disability"
                                                        class="form-control" required disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>c. Are you a solo parent?</p>
                                            <div>
                                                &emsp;<input type="radio" id="radio_solo1" name="radio_solo"
                                                    value="yes"> Yes
                                            </div>
                                            <div>
                                                &emsp;<input type="radio" id="radio_solo" name="radio_solo" value="no">
                                                No
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p>If YES, please specify ID:</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" id="input_solo" name="input_solo"
                                                        class="form-control" required disabled>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
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
            inputGroup.classList.add('input-group');
            inputGroup.classList.add('mb-2');

            var checkbox = document.createElement('input');
            checkbox.classList.add('form-check-input');
            checkbox.classList.add('me-2');
            checkbox.setAttribute('type', 'checkbox');
            checkbox.setAttribute('id', section + '_delete'); // Change id to distinguish from 'N/A' checkbox
            checkbox.setAttribute('onclick', 'deleteRow(this)'); // Set onclick to delete row
            checkbox.required = true;

            var checkboxLabel = document.createElement('label');
            checkboxLabel.classList.add('form-check-label');
            checkboxLabel.classList.add('me-2');
            checkboxLabel.setAttribute('for', section + '_delete'); // Change for attribute
            checkboxLabel.textContent = 'Delete'; // Change label text

            inputGroup.appendChild(checkbox);
            inputGroup.appendChild(checkboxLabel);

            var input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', section + '[]');
            input.classList.add('form-control');
            input.required = true;

            inputGroup.appendChild(input);

            container.appendChild(inputGroup);
        }

        //Delete added row
        function deleteRow(checkbox) {
            var row = checkbox.closest('.input-group');
            row.remove();
        }

        function checkNA(section) {
            var checkbox = document.getElementById(section + '_na');
            var inputs = document.querySelectorAll('.' + section + '-container input[type="text"]');
            inputs.forEach(function (input) {
                if (checkbox.checked) {
                    input.value = "N/A";
                    input.disabled = true;
                } else {
                    input.value = "";
                    input.disabled = false;
                }
            });
        }
        
        // Function to enable/disable input fields based on radio button selection
        function toggleInput(inputId, radioId) {
            const inputBox = document.getElementById(inputId);
            const radioButton = document.getElementById(radioId);

            radioButton.addEventListener('change', function () {
                inputBox.disabled = (this.value === 'no');
                if (this.value === 'no') {
                    inputBox.value = ''; // Clear input field when "No" is selected
                    if (inputId === 'input_status') {
                        document.getElementById('input_status').disabled = true;
                    }
                } else {
                    if (inputId === 'input_status') {
                        document.getElementById('input_status').disabled = false;
                    }
                }
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
</body>

</html>