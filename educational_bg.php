<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Background</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        nav {
            background-color: #283872;
            width: 100%;
            box-shadow: 0px 2px 5px black;
        }

        nav a {
            text-decoration: none;
            color: #E4E9FF;
        }

        nav a:hover {
            color: #FFD644;
        }

        .form-check-input,
        .form-check-label {
            height: 15px;
            width: 15px;
            font-size: 12px;
        }
        /* Hide the up and down arrows */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- SIDEBAR -->
            <?php include_once "sidebar1.php" ?>

            <!-- CONTENT -->
            <div class="col-10 container">
                <?php include_once 'topnav.php'; ?>
                <div class="row mt-5">
                    <div class="col-1 text-center">LEVEL</div>
                    <div class="col text-center">NAME OF SCHOOL <br>(Write in full)</div>
                    <div class="col text-center">BACHELORS EDUCATION/ <br>DEGREE/COURSE <br>(Write in full)</div>
                    <div class="col-2 ms-2 mt-2">PERIOD OF ATTENDANCE <br>
                        <div class="row mt-2">
                            <div class="col text-start">FROM</div>
                            <div class="col text-start ms-3">TO</div>
                        </div>
                    </div>
                    <div class="col text-center">HIGHEST LEVEL/ <br> UNITS EARNED <br>(if not graduated)</div>
                    <div class="col ms-2 px-3 mt-4">YEAR GRADUATED</div>
                    <div class="col text-center">SCHOLARSHIP/ <br>ACADEMIC HONORS <br>RECEIVED </div>
                </div>
                <!-- ELEMENTARY -->
                <div class="row mt-3 ms-1">
                    <div class="col-1 text-center">ELEMENTARY</div>
                    <div class="col">
                        <input type="text" class="form-control" id="name_school" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree" required>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_from" required
                                    style="display: inline-block; width: 48%" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_from">
                                    <label for="null_from" class="form-check-label mx-0">N/A</label>
                                </div>
                            </div>
                            <div class="col px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_to" required
                                    style="display: inline-block; width: 48%;" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_to">
                                    <label for="null_to" class="form-check-label">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="h_level" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="year_graduated" required
                            style="display: inline-block; width:70%">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="null_year">
                            <label for="null_year" class="form-check-label">N/A</label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="scholarship" required>
                    </div>
                </div>

                <!-- SECONDARY -->
                <div class="row mt-3 ms-1">
                    <div class="col-1 text-center">SECONDARY</div>
                    <div class="col">
                        <input type="text" class="form-control" id="name_school" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree" required>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_from" required
                                    style="display: inline-block; width: 48%" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_fromS">
                                    <label for="null_fromS" class="form-check-label mx-0">N/A</label>
                                </div>
                            </div>
                            <div class="col px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_to" required
                                    style="display: inline-block; width: 48%;" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_toS">
                                    <label for="null_toS" class="form-check-label">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="h_level" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="year_graduated" required
                            style="display: inline-block; width:70%">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="null_yearS">
                            <label for="null_yearS" class="form-check-label">N/A</label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="scholarship" required>
                    </div>
                </div>
                <!-- VOCATIONAL/ TRADE COURSE -->
                <div class="row mt-3 ms-1">
                    <div class="col-1 text-center d-flex align-items-center justify-content-center">VOCATIONAL/ TRADE COURSE
                        <input type="checkbox" class="mb-3 pb-3" id="null_vocational">
                        <label for="null_vocational" class="form-check-label mb-3 pb-3">N/A</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="name_school" required>
                        <i class="fa-solid fa-plus mt-2 ms-2" id="addRow"></i><span class="ms-2 mt-2">Add new Vocational row</span>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree" required>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_from" required
                                    style="display: inline-block; width: 48%" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_fromV">
                                    <label for="null_fromV" class="form-check-label mx-0">N/A</label>
                                </div>
                            </div>
                            <div class="col px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_to" required
                                    style="display: inline-block; width: 48%;" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_toV">
                                    <label for="null_toV" class="form-check-label">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="h_level" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="year_graduated" required
                            style="display: inline-block; width:70%">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="null_yearV">
                            <label for="null_yearV" class="form-check-label">N/A</label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="scholarship" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
    document.getElementById('addRow').addEventListener('click', function() {
        // Create new elements
        var newRow = document.createElement('div');
        newRow.classList.add('col');

        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.classList.add('form-control');
        newInput.required = true;

        var newIcon = document.createElement('i');
        newIcon.classList.add('fa-solid', 'fa-plus', 'mt-2', 'ms-2');
        newIcon.id = 'addRow'; // Assign same id to maintain event listener

        var newText = document.createElement('span');
        newText.classList.add('ms-2', 'mt-2');
        newText.textContent = 'Add new Vocational row';

        // Append elements to the new row
        newRow.appendChild(newInput);
        newRow.appendChild(newIcon);
        newRow.appendChild(newText);

        // Insert the new row before the existing row
        var existingRow = document.querySelector('.col');
        existingRow.parentNode.insertBefore(newRow, existingRow);
    });
</script> -->

</body>

</html>