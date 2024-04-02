<!DOCTYPE html>
<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <title>Learning and Development</title>
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

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox-container .form-check-label {
            margin-left: 10px;
        }

        .checkbox-container input[type="text"] {
            margin-left: 10px;
        }

        .paragraph-margin {
            margin-bottom: 10px;
        }

        p {
            text-align: center;
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
                <div>
                </div>
                <!-- Moved "Edit" link to a new line -->
                <!-- <div class="row">
          <div class="paragraph-margin">
            <br> <a href="edit" class="edit-link"> Edit<i class="bi bi-pencil-square"></i></a>
          </div>
        </div> -->

                <div class="row mt-5">
                    <div class="col-3">
                        <p>TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS (Write in full)</p>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <p>INCLUSIVE DATES OF ATTENDANCE (dd/mm/yyyy)</p>
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
                    <div class="col-3">
                        <p>TYPE OF LD (Managerial/Supervisory/Technical/etc)</p>
                    </div>
                    <div class="col-2">
                        <p>CONDUCTED/SPONSORED BY (Write in full)</p>
                    </div>

                </div>
                <div class="row-container">
                    <div class="row row-row mt-3">
                        <div class="col-3">
                            <div class="checkbox-container">
                                <input class="form-check-input" type="checkbox" id="null_ext" onclick="checkNA(this)">
                                <label class="form-check-label">N/A</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" required name="from" id="from" class="form-control">
                                </div>
                                <div class="col-6">
                                    <input type="date" required name="to" id="to" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <input type="text" name="hours" id="hours" class="form-control">
                        </div>
                        <div class="col-3">
                            <input type="text" name="typeld" id="typeld" class="form-control">
                        </div>
                        <div class="col-2">
                            <input type="text" name="conducted" id="conducted" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3 mt-4">
                        <button type="button" class="btn btn-primary add-row-button" id="ld_addrow" name="ld_addrow"
                            onclick="addRow()">ADD ROW</button>
                    </div>
                </div>

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
                        var inputs = document.querySelectorAll('.form-control');
                        var ld_addrow = document.getElementById('ld_addrow');
                        if (checkbox.checked) {
                            inputs.forEach(function (input) {
                                if (input.type === "date") {
                                    input.value = ""; // Clear the value
                                    input.placeholder = "N/A"; // Set placeholder to "N/A"
                                } else {
                                    input.value = "N/A";
                                }
                                input.disabled = true;
                                ld_addrow.disabled = true;
                            });
                        } else {
                            inputs.forEach(function (input) {
                                input.value = "";
                                input.disabled = false;
                                ld_addrow.disabled = false;
                                if (input.type === "date") {
                                    input.placeholder = "MM/DD/YYYY"; // Set placeholder to MM/DD/YYYY
                                }
                            });
                        }
                    }

                    function deleteRow(button) {
                        var row = button.closest('.row-row');
                        row.remove();
                    }
                </script>

            </div>
        </div>
</body>

</html>