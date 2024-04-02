<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Educational Background</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="hris_style.css" />
    <link rel="stylesheet" href="local_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        nav {
            background-color: #283872;
            width: 100%;
            box-shadow: 0px 2px 5px black;
        }

        nav a {
            text-decoration: none;
            color: #e4e9ff;
        }

        nav a:hover {
            color: #ffd644;
        }

        .small-font {
            font-size: 13px;
        }

        /* .form-check-input,
      .form-check-label {
        height: 15px;
        width: 15px;
        font-size: 12px;
      } */

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        /* Hide the up and down arrows */
        /* input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      } */

        /* .small {
        font-size: 13px;
      } */
    </style>
</head>

<body style="background-color: #80a1f5">
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- SIDEBAR -->
            <?php include_once "sidebar1.php" ?>

            <!-- CONTENT -->
            <div class="col-10">
                <?php include_once 'topnav.php'; ?>
                <div class="row mt-5 text-center align-items-end">
                    <div class="col-1 pe-3">LEVEL</div>
                    <div class="col">
                        NAME OF SCHOOL <br />(Write in full)
                    </div>
                    <div class="col">
                        BASIC EDUCATION/ <br />DEGREE/COURSE <br />(Write in full)
                    </div>
                    <div class="col-2 ms-2 mt-2">
                        PERIOD OF ATTENDANCE <br />
                        <div class="row mt-2">
                            <div class="col">FROM</div>
                            <div class="col">TO</div>
                        </div>
                    </div>
                    <div class="col">
                        HIGHEST LEVEL/ <br />
                        UNITS EARNED <br />(if not graduated)
                    </div>
                    <div class="col">YEAR GRADUATED</div>
                    <div class="col">
                        SCHOLARSHIP/ <br />ACADEMIC HONORS <br />RECEIVED
                    </div>
                </div>

                <!-- ELEMENTARY -->
                <div class="row mt-3">
                    <div class="col-1 me-3 text-center">ELEMENTARY</div>
                    <!-- name of school -->
                    <div class="col">
                        <input type="text" class="form-control" id="name_schoolE" required />
                    </div>
                    <!-- basic education/degree/course -->
                    <div class="col">
                        <input type="text" class="form-control" id="degreeE" required />
                    </div>
                    <!-- period of attendance -->
                    <div class="col-2">
                        <div class="row">
                            <!-- from -->
                            <div class="col checkbox-container pe-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_fromE"
                                    name="p_attendance_fromE" required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_fromE">
                                    <label class="form-check-label" for="null_fromE">N/A</label>
                                </div>
                            </div>
                            <!-- to -->
                            <div class="col checkbox-container ps-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_toE" name="p_attendance_toE"
                                    required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_toE">
                                    <label class="form-check-label" for="null_toE">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- highest level / units earned -->
                    <div class="col">
                        <input type="text" class="form-control" id="h_level" required />
                    </div>
                    <!-- year graduated -->
                    <div class="col checkbox-container small-font">
                        <input type="number" class="form-control" id="year_graduatedE" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_yearE">
                            <label class="form-check-label" for="null_yearE">N/A</label>
                        </div>
                    </div>
                    <!-- scholarship/academic honors received -->
                    <div class="col checkbox-container small-font">
                        <input type="text" class="form-control" id="e_scholarship" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_scholarshipE">
                            <label class="form-check-label" for="null_scholarshipE">N/A</label>
                        </div>
                    </div>
                </div>

                <!-- SECONDARY -->
                <div class="row mt-3">
                    <div class="col-1 me-3 text-center">SECONDARY</div>
                    <!-- name of school -->
                    <div class="col">
                        <input type="text" class="form-control" id="name_schoolS" required />
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degreeS" required />
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <!-- from -->
                            <div class="col checkbox-container pe-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_fromS"
                                    name="p_attendance_fromS" required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_fromS">
                                    <label class="form-check-label" for="null_fromS">N/A</label>
                                </div>
                            </div>
                            <!-- to -->
                            <div class="col checkbox-container ps-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_toS" name="p_attendance_toS"
                                    required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_toS">
                                    <label class="form-check-label" for="null_toS">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- highest level / units earned -->
                    <div class="col">
                        <input type="text" class="form-control" id="h_level" required />
                    </div>
                    <!-- year graduated -->
                    <div class="col checkbox-container small-font">
                        <input type="number" class="form-control" id="year_graduatedS" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_yearS">
                            <label class="form-check-label" for="null_yearS">N/A</label>
                        </div>
                    </div>
                    <!-- scholarship/academic honors received -->
                    <div class="col checkbox-container small-font">
                        <input type="text" class="form-control" id="s_scholarship" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_scholarshipS">
                            <label class="form-check-label" for="null_scholarshipS">N/A</label>
                        </div>
                    </div>
                </div>

                <!-- VOCATIONAL / TRADE COURSE -->
                <div class="row mt-3 ms-1 align-items-start">
                    <div class="col-1 text-center checkbox-container align-items-start justify-content-center">
                        VOCATIONAL / TRADE COURSE
                        <div class="form-check ms-2 small-font mt-2">
                            <input class="form-check-input not_app" type="checkbox" id="null_vocational">
                            <label class="form-check-label" for="null_vocational">N/A</label>
                        </div>
                    </div>
                    <!-- name of school -->
                    <div class="col small-font">
                        <input type="text" class="form-control" id="name_schoolV" required />
                        <i class="fa-solid fa-plus mt-2 ms-2" id="v_addrow" name="v_addrow"></i>
                        <span class="ms-2 mt-2 add-row-text">Add new Vocational row</span>
                    </div>
                    <!-- basic education/degree/course -->
                    <div class="col">
                        <input type="text" class="form-control" id="degreeV" required />
                    </div>
                    <!-- period of attendance -->
                    <div class="col-2">
                        <div class="row">
                            <!-- from -->
                            <div class="col checkbox-container pe-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_fromV"
                                    name="p_attendance_fromV" required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_fromV">
                                    <label class="form-check-label" for="null_fromV">N/A</label>
                                </div>
                            </div>
                            <!-- to -->
                            <div class="col checkbox-container ps-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_toV" name="p_attendance_toV"
                                    required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_toV">
                                    <label class="form-check-label" for="null_toV">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- highest level / units earned -->
                    <div class="col">
                        <input type="text" class="form-control" id="h_levelV" required />
                    </div>
                    <!-- year graduated -->
                    <div class="col checkbox-container small-font">
                        <input type="number" class="form-control" id="year_graduatedV" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_yearV">
                            <label class="form-check-label" for="null_yearV">N/A</label>
                        </div>
                    </div>
                    <!-- scholarship/academic honors received -->
                    <div class="col checkbox-container small-font">
                        <input type="text" class="form-control" id="v_scholarship" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_scholarshipV">
                            <label class="form-check-label" for="null_scholarshipV">N/A</label>
                        </div>
                    </div>
                </div>

                <!-- COLLEGE -->
                <div class="row mt-3 align-items-start">
                    <div class="col-1 me-3 text-center align-items-start">
                        COLLEGE
                    </div>
                    <!-- name of school -->
                    <div class="col small-font">
                        <input type="text" class="form-control" id="name_schoolC" required />
                        <i class="fa-solid fa-plus mt-2 ms-2" id="c_addrow" name="c_addrow"></i>
                        <span class="ms-2 mt-2 add-row-text">Add new College row</span>
                    </div>
                    <!-- basic education/degree/course -->
                    <div class="col">
                        <input type="text" class="form-control" id="degreeC" required />
                    </div>
                    <!-- period of attendance -->
                    <div class="col-2">
                        <div class="row">
                            <!-- from -->
                            <div class="col checkbox-container pe-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_fromC"
                                    name="p_attendance_fromC" required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_fromC">
                                    <label class="form-check-label" for="null_fromC">N/A</label>
                                </div>
                            </div>
                            <!-- to -->
                            <div class="col checkbox-container ps-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_toC" required
                                    style="display: inline-block; width: 48%" min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_toC">
                                    <label class="form-check-label" for="null_toC">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- highest level / units earned -->
                    <div class="col">
                        <input type="text" class="form-control" id="h_levelC" required />
                    </div>
                    <!-- year graduated -->
                    <div class="col checkbox-container small-font">
                        <input type="number" class="form-control" id="year_graduatedC" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_yearC">
                            <label class="form-check-label" for="null_yearC">N/A</label>
                        </div>
                    </div>
                    <!-- scholarship/academic honors received -->
                    <div class="col checkbox-container small-font">
                        <input type="text" class="form-control" id="c_scholarship" required
                            style="display: inline-block; width: 81%" />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_scholarshipC">
                            <label class="form-check-label" for="null_scholarshipC">N/A</label>
                        </div>
                    </div>
                </div>

                <!-- GRADUATE STUDIES -->
                <div class="row mt-3 ms-1 align-items-start">
                    <div class="col-1 text-center checkbox-container align-items-start justify-content-center">
                        GRADUATE STUDIES
                        <div class="form-check ms-2 small-font mt-2">
                            <input class="form-check-input not_app" type="checkbox" id="null_graduate">
                            <label class="form-check-label" for="null_graduate">N/A</label>
                        </div>
                    </div>
                    <!-- name of school -->
                    <div class="col small-font">
                        <input type="text" class="form-control" id="name_schoolG" required />
                        <i class="fa-solid fa-plus mt-2 ms-2" id="g_addrow" name="g_addrow"></i><span
                            class="ms-2 mt-2 add-row-text">Add new Graduate Studies row</span>
                    </div>
                    <!-- basic education/degree/course -->
                    <div class="col">
                        <input type="text" class="form-control" id="degreeG" required />
                    </div>
                    <!-- period of attendance -->
                    <div class="col-2">
                        <div class="row">
                            <!-- from -->
                            <div class="col checkbox-container pe-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_fromG"
                                    name="p_attendance_fromV" required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_fromG">
                                    <label class="form-check-label" for="null_fromG">N/A</label>
                                </div>
                            </div>
                            <!-- to -->
                            <div class="col checkbox-container ps-1 small-font">
                                <input type="number" class="form-control" id="p_attendance_toG" name="p_attendance_toG"
                                    required min="1900" max="3000" />
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" id="null_toG">
                                    <label class="form-check-label" for="null_toG">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- highest level / units earned -->
                    <div class="col">
                        <input type="text" class="form-control" id="h_levelG" required />
                    </div>
                    <!-- year graduated -->
                    <div class="col checkbox-container small-font">
                        <input type="number" class="form-control" id="year_graduatedG" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_yearG">
                            <label class="form-check-label" for="null_yearG">N/A</label>
                        </div>
                    </div>
                    <!-- SCHOLARSHIP -->
                    <div class="col checkbox-container small-font">
                        <input type="text" class="form-control" id="g_scholarship" required />
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="null_scholarshipG">
                            <label class="form-check-label" for="null_scholarshipG">N/A</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        numberTypeArray = ["p_attendance_fromE", "p_attendance_fromS", "p_attendance_fromV", "p_attendance_fromC", "p_attendance_fromG"
                         , "p_attendance_toE", "p_attendance_toS", "p_attendance_toV", "p_attendance_toC", "p_attendance_toG"
                         , "year_graduatedE", "year_graduatedS", "year_graduatedV", "year_graduatedC", "year_graduatedG"];

        function handleNA(checkboxId, inputId) {
            const checkbox = document.getElementById(checkboxId);
            const input = document.getElementById(inputId);

            checkbox.addEventListener("change", function () {
                if (this.checked) {

                    input.type = "text"; //Change input type to text 
                    input.value = "N/A";
                    input.disabled = true;

                } else {
                    var number = false;
                    for (var i = 0; i < numberTypeArray.length; i++) {
                        if (inputId === numberTypeArray[i]) {
                            number = true;
                            break;
                        }
                    }

                    if (number) {
                        input.type = "number";
                    }

                    input.value = "";
                    input.disabled = false;
                }
            })
        }

        // Call handleNA function for each pair of checkbox and input
        handleNA("null_fromE", "p_attendance_fromE");
        handleNA("null_toE", "p_attendance_toE");
        handleNA("null_yearE", "year_graduatedE");
        handleNA("null_scholarshipE", "e_scholarship");
        handleNA("null_fromS", "p_attendance_fromS")
        handleNA("null_toS", "p_attendance_toS");
        handleNA("null_yearS", "year_graduatedS");
        handleNA("null_scholarshipS", "s_scholarship");
        handleNA("null_fromV", "p_attendance_fromV");
        handleNA("null_toV", "p_attendance_toV");
        handleNA("null_yearV", "year_graduatedV");
        handleNA("null_scholarshipV", "v_scholarship");
        handleNA("null_fromC", "p_attendance_fromC");
        handleNA("null_toC", "p_attendance_toC");
        handleNA("null_yearC", "year_graduatedC");
        handleNA("null_scholarshipC", "c_scholarship");
        handleNA("null_fromG", "p_attendance_fromG");
        handleNA("null_toG", "p_attendance_toG");
        handleNA("null_yearG", "year_graduatedG");
        handleNA("null_scholarshipG", "g_scholarship");

        function handleNAArray(checkboxId, inputIds, chkboxIds) {
            const checkbox = document.getElementById(checkboxId);
            const inputs = inputIds.map((id) => document.getElementById(id));
            const checkboxes = chkboxIds.map((id) => document.getElementById(id));

            checkbox.addEventListener("change", function () {
                if (this.checked) {
                    inputs.forEach((input) => {
                        input.type = "text"; //Change input type to text
                        input.value = "N/A";
                        input.disabled = true;
                    });
                    checkboxes.forEach((chkbx) => {
                        chkbx.checked = true;
                        chkbx.disabled = true;
                    });
                } else {
                    inputs.forEach((input) => {
                        input.type = "number"; //Change input type back to number
                        input.value = "";
                        input.disabled = false;
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
                "degreeV",
                "p_attendance_fromV",
                "p_attendance_toV",
                "h_levelV",
                "year_graduatedV",
                "v_scholarship"
            ], //Array of input fields IDs
            [
                "null_fromV",
                "null_toV",
                "null_yearV",
                "null_scholarshipV"
            ], // Array of checkbox IDs
        );
        handleNAArray(
            "null_graduate",
            [
                "name_schoolG",
                "degreeG",
                "p_attendance_fromG",
                "p_attendance_toG",
                "h_levelG",
                "year_graduatedG",
                "g_scholarship"
            ],
            [
                "null_fromG",
                "null_toG",
                "null_yearG",
                "null_scholarshipG"
            ]
        );
    </script>
</body>

</html>