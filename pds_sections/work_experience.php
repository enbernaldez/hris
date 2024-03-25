<!DOCTYPE html>
<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Experience</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
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

        /* Added custom style to align checkbox with input field */
        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox-container .form-check-label {
            margin-left: auto;
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        /* Added margin between checkbox and input */
        .checkbox-container input[type="text"] {
            margin-left: 10px;
        }

        /* Added margin to paragraph tag */
        .paragraph-margin {
            margin-bottom: 10px;
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
                    <div class="col-6 align-items-center">
                        <p class="display-6"><strong>FIRST NAME MI. LAST NAME</strong></p>
                        <h4><strong>POSITION</strong></h4>
                    </div>
                    <div class="col-4">
                        <img src="images/PSA Vector.png" alt="profile" style="height:150px; width:auto"
                            class="img-fluid mb-3 float-end">
                    </div>
                </div>
                <?php include_once 'topnav.php'; ?>

                <!-- CONTENT -->
                <div class="row mt-3 text-center align-items-center ms-auto">
                    <div class="col-3">
                        <div class="row ms-5 mt-0">
                            <p class="mb-0">INCLUSIVE DATES</p>
                            <p>(mm/dd/yy)</p>
                        </div>
                        <div class="row ms-5">
                            <div class="col">
                                <p>FROM</p>
                            </div>
                            <div class="col">
                                <p>TO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <p class=mb-0>POSITION TITLE</p>
                        <p>(Write in full/Do not abbreviate)</p>
                    </div>
                    <div class="col-2">
                        <p class="mb-0">DEPARTMENT/AGENCY/<br>OFFICE/COMPANY</p>
                        <p>(Write in full/Do not abbreviate)</p>
                    </div>
                    <div class="col-1">
                        <p>MONTHLY SALARY</p>
                    </div>
                    <div class="col-1">
                        <p>SALARY/JOB PAY/GRADE (if applicable) & STEP (Format "00-0")/<br>
                            INCREMENT</p>
                    </div>
                    <div class="col-2">
                        <p>STATUS OF APPOINTMENT</p>
                    </div>
                    <div class="col-1">
                        <p>GOV'T SERVICE (Y/N)</p>
                    </div>
                </div>
                <div class="row-container text-center">
                    <div class="row row-row mt-3">
                        <div class="col-3">
                            <div class="checkbox-container">
                                <input class="form-check-input" type="checkbox" id="null_ext" onclick="checkNA(this)">
                                <label class="form-check-label">N/A</label>
                                <div class="row ms-auto">
                                    <div class="col-6 px-1">
                                        <input type="date" required name="from_date" id="from_date"
                                            class="form-control group_na">
                                    </div>
                                    <div class="col-6 px-1">
                                        <input type="date" required name="to_date" id="to_date"
                                            class="form-control group_na">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="text" name="positionTitle" id="positionTitle" class="form-control group_na">
                        </div>
                        <div class="col-2">
                            <input type="text" name="department_Agency" id="department_Agency"
                                class="form-control group_na">
                        </div>
                        <div class="col-1">
                            <input type="text" name="monthlySalary" id="monthlySalary" class="form-control group_na">
                        </div>
                        <div class="col-1">
                            <input type="text" name="salary_Jobpay" id="salary_Jobpay" class="form-control group_na">
                        </div>
                        <div class="col-2">
                            <input type="text" name="statusOfAppointment" id="statusOfAppointment"
                                class="form-control group_na">
                        </div>
                        <div class="col-1">
                            <select id="govtservice" required name="govtservice" class="form-select group_na">
                                <option value="" disabled selected value>--select--</option>
                                <option value='Y'>YES</option>
                                <option value='N'>NO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <br><button type="button" class="btn btn-primary add-row-button" onclick="addRow()">ADD
                            ROW</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function addRow() {
                // Clone the input-row element
                var newRow = document.querySelector('.row-row').cloneNode(true);

                // Clear input values in the cloned row
                newRow.querySelectorAll('input').forEach(input => {
                    input.value = '';
                });

                // Append the cloned row to the container
                document.querySelector('.row-container').appendChild(newRow);

                // Change the N/A checkbox to a delete button
                var checkbox = newRow.querySelector('.form-check-input');
                checkbox.checked = false; // Uncheck the checkbox
                checkbox.id = ""; // Remove id to avoid duplication
                checkbox.removeAttribute("onclick"); // Remove onclick event
                checkbox.setAttribute("type", "button"); // Change type to button
                checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
                checkbox.nextElementSibling.textContent = "Delete"; // Change label text
            }

            function checkNA(checkbox) {
                var inputs = document.querySelectorAll('.group_na');
                var we_addrow = document.getElementById('we_addrow');
                if (checkbox.checked) {
                    inputs.forEach(function (input) {
                        input.value = "N/A";
                        input.disabled = true;
                    });
                    we_addrow.disabled = true;

                } else {
                    inputs.forEach(function (input) {
                        input.value = "";
                        input.disabled = false;
                    });
                    we_addrow.disabled = false;
                }
            }

            function deleteRow(button) {
                var row = button.closest('.row-row');
                row.remove();
            }
        </script>
    </div>
</body>

</html>