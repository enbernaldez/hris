<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Background</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .small {
            font-size: 13px;
        }

        /* Hide the up and down arrows */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .delete-row-button:active {
            outline: none;
            /* Remove the outline */
            border: none;
            /* Remove the border */
        }
    </style>
</head>

<body style="background-color: #80A1F5">
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- SIDEBAR -->
            <?php include_once "sidebar1.php" ?>

            <!-- CONTENT -->
            <div class="col-10">
                <?php include_once 'topnav.php'; ?>
                <div class="row mt-5">
                    <div class="col-1 text-center">LEVEL</div>
                    <div class="col text-center">NAME OF SCHOOL <br>(Write in full)</div>
                    <div class="col text-center">BASIC EDUCATION/ <br>DEGREE/COURSE <br>(Write in full)</div>
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
                        <input type="text" class="form-control" id="name_schoolE" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree_E" required>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <!-- FROM -->
                            <div class="col px-0 mx-0 checkbox-container">
                                <div style="display: inline-block; width: 48%">
                                    <input type="number" class="form-control" id="p_attendance_fromE"
                                        name="p_attendance_fromE" required min="1900" max="3000">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_fromE">
                                    <label for="null_fromE" class="form-check-label mx-0">N/A</label>
                                </div>
                            </div>
                            <!-- TO -->
                            <div class="col checkbox-container px-0 mx-0">
                                <div style="display: inline-block; width: 48%;">
                                    <input type="number" class="form-control" id="p_attendance_toE"
                                        name="p_attendance_toE" required min="1900" max="3000">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_toE">
                                    <label for="null_toE" class="form-check-label">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="h_levelE" required>
                    </div>
                    <!-- YEAR GRADUATED -->
                    <div class="col checkbox-container">
                        <input type="number" class="form-control" id="year_graduatedE" required
                            style="display: inline-block; width:70%">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="null_yearE">
                            <label for="null_yearE" class="form-check-label">N/A</label>
                        </div>
                    </div>
                    <!-- SCHOLARSHIP/ACADEMIC HONORS RECEIVED -->
                    <div class="col checkbox-container">
                        <input type="text" class="form-control" id="e_scholarship" required
                            style="display: inline-block; width: 81%;">
                        <div class="form-check form-check-inline mx-0 my-0 p-0 ms-1">
                            <input type="checkbox" class="form-check-label mx-0 my-0" id="null_scholarshipE">
                            <label for="null_scholarshipE" class="form-check-label mx-0 my-0">N/A</label>
                        </div>
                    </div>
                </div>

                <!-- SECONDARY -->
                <div class="row mt-3 ms-1">
                    <div class="col-1 text-center">SECONDARY</div>
                    <div class="col">
                        <input type="text" class="form-control" id="name_schoolS" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="degree_S" required>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <!-- FROM -->
                            <div class="col checkbox-container px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_fromS" required
                                    style="display: inline-block; width: 48%" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_fromS">
                                    <label for="null_fromS" class="form-check-label mx-0">N/A</label>
                                </div>
                            </div>
                            <!-- TO -->
                            <div class="col checkbox-container px-0 mx-0">
                                <input type="number" class="form-control" id="p_attendance_toS" required
                                    style="display: inline-block; width: 48%;" min="1900" max="3000">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="null_toS">
                                    <label for="null_toS" class="form-check-label">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="h_levelS" required>
                    </div>
                    <!-- YEAR GRADUATED -->
                    <div class="col checkbox-container">
                        <input type="number" class="form-control" id="year_graduatedS" required
                            style="display: inline-block; width:70%">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="null_yearS">
                            <label for="null_yearS" class="form-check-label">N/A</label>
                        </div>
                    </div>
                    <!-- SCHOLARSHIP -->
                    <div class="col checkbox-container">
                        <input type="text" class="form-control" id="s_scholarship" required
                            style="display: inline-block; width: 81%;">
                        <div class="form-check form-check-inline mx-0 my-0 p-0">
                            <input type="checkbox" class="form-check-label mx-0 my-0 ms-1" id="null_scholarshipS">
                            <label for="null_scholarshipS" class="form-check-label mx-0 my-0">N/A</label>
                        </div>
                    </div>
                </div>

                    <!-- VOCATIONAL/ TRADE COURSE -->
                    <div class="row mt-3 ms-1">
                        <div class="col-1 text-center d-flex align-items-center justify-content-center">VOCATIONAL/ TRADE
                            COURSE
                            <input type="checkbox" class="not_app input-class mb-3 pb-3" id="null_vocational">
                            <label for="null_vocational" class="form-check-label na-text input-class mb-3 pb-3">N/A</label>
                            <button type="button" class="delete-row-button ms-3 mb-4"
                                style="display:none; background-color: transparent; border: none; color: red;">
                            </button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="name_schoolV" required>
                            <i class="fa-solid fa-plus mt-2 ms-2" id="v_addrow" name="v_addrow"></i><span
                                class="ms-2 mt-2 add-row-text">Add new Vocational row</span>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="degree_v" required>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <!-- FROM -->
                                <div class="col checkbox-container px-0 mx-0">
                                    <input type="number" class="form-control" id="p_attendance_fromV" required
                                        style="display: inline-block; width: 48%" min="1900" max="3000">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input input-class" id="null_fromV">
                                        <label for="null_fromV" class="form-check-label mx-0">N/A</label>
                                    </div>
                                </div>
                                <!-- TO -->
                                <div class="col checkbox-container px-0 mx-0">
                                    <input type="number" class="form-control" id="p_attendance_toV" required
                                        style="display: inline-block; width: 48%;" min="1900" max="3000">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="null_toV">
                                        <label for="null_toV" class="form-check-label">N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="h_levelV" required>
                        </div>
                        <!-- YEAR GRADUATED -->
                        <div class="col">
                            <input type="number" class="form-control" id="year_graduatedV" required
                                style="display: inline-block; width:70%">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="null_yearV">
                                <label for="null_yearV" class="form-check-label">N/A</label>
                            </div>
                        </div>
                        <!-- SCHOLARSHIP/ ACADEMIC HONORS RECEIVED -->
                        <div class="col">
                            <input type="text" class="form-control" id="v_scholarship" required
                                style="display: inline-block; width: 81%;">
                            <div class="form-check form-check-inline mx-0 my-0 p-0">
                                <input type="checkbox" class="form-check-label mx-0 my-0" id="null_scholarshipV">
                                <label for="null_scholarshipV" class="form-check-label mx-0 my-0">N/A</label>
                            </div>
                        </div>
                    </div>
                    <!-- COLLEGE -->
                    <div class="row mt-3 ms-1">
                        <div class="col-1 text-center d-flex mb-4 ms-0">COLLEGE
                            <button type="button" class=" delete-row-button ms-4"
                                style="display:none; background-color: transparent; border: none; color: red;"><i
                                    class="fa-solid fa-xmark fa-2xl ms-4"></i>
                            </button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="name_schoolC" required>
                            <i class="fa-solid fa-plus mt-2 ms-2" id="c_addrow" name="c_addrow"></i><span
                                class="ms-2 mt-2 add-row-text">Add new College row</span>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="degree_C" required>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <!-- FROM -->
                                <div class="col checkbox-container px-0 mx-0">
                                    <input type="number" class="form-control" id="p_attendance_fromC" required
                                        style="display: inline-block; width: 48%" min="1900" max="3000">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="null_fromC">
                                        <label for="null_fromC" class="form-check-label mx-0">N/A</label>
                                    </div>
                                </div>
                                <!-- TO -->
                                <div class="col checkbox-container px-0 mx-0">
                                    <input type="number" class="form-control" id="p_attendance_toC" required
                                        style="display: inline-block; width: 48%;" min="1900" max="3000">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="null_toC">
                                        <label for="null_toC" class="form-check-label">N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="h_levelC" required>
                        </div>
                        <div class="col">
                            <!-- YEAR GRADUATED -->
                            <input type="number" class="form-control" id="year_graduatedC" required
                                style="display: inline-block; width:70%">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="null_yearC">
                                <label for="null_yearC" class="form-check-label">N/A</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="c_scholarship" required
                                style="display: inline-block; width: 81%;">
                            <div class="form-check form-check-inline mx-0 my-0 p-0">
                                <input type="checkbox" class="form-check-label mx-0 my-0" id="null_scholarshipC">
                                <label for="null_scholarshipC" class="form-check-label mx-0 my-0">N/A</label>
                            </div>
                        </div>
                    </div>

                    <!-- GRADUATE STUDIES -->
                    <div class="row mt-3 ms-1">
                        <div class="col-1 text-center d-flex align-items-center justify-content-center">GRADUATE STUDIES
                            <input type="checkbox" class="not_app mb-3 pb-3 ms-3" id="null_graduate">
                            <label for="null_graduate" class="form-check-label na-text mb-3 pb-3">N/A</label>
                            <button type="button" class="delete-row-button ms-4"
                                style="display:none; background-color: transparent; border: none; color: red;">
                            </button>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="name_schoolG" required>
                            <i class="fa-solid fa-plus mt-2 ms-2" id="g_addrow" name="g_addrow"></i><span
                                class="ms-2 mt-2 small add-row-text">Add new Graduate Studies row</span>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="degree_g" required>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <!-- FROM -->
                                <div class="col checkbox-container px-0 mx-0">
                                    <input type="number" class="form-control" id="p_attendance_fromG" required
                                        style="display: inline-block; width: 48%" min="1900" max="3000">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="null_fromG">
                                        <label for="null_fromG" class="form-check-label mx-0">N/A</label>
                                    </div>
                                </div>
                                <!-- TO -->
                                <div class="col checkbox-container px-0 mx-0">
                                    <input type="number" class="form-control" id="p_attendance_toG" required
                                        style="display: inline-block; width: 48%;" min="1900" max="3000">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="null_toG">
                                        <label for="null_toG" class="form-check-label">N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="h_levelG" required>
                        </div>
                        <!-- YEAR GRADUATED -->
                        <div class="col">
                            <input type="number" class="form-control" id="year_graduatedG" required
                                style="display: inline-block; width:70%">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="null_yearG">
                                <label for="null_yearG" class="form-check-label">N/A</label>
                            </div>
                        </div>
                        <!-- SCHOLARSHIP -->
                        <div class="col">
                            <input type="text" class="form-control" id="g_scholarship" required
                                style="display: inline-block; width: 81%;">
                            <div class="form-check form-check-inline mx-0 my-0 p-0">
                                <input type="checkbox" class="form-check-label mx-0 my-0" id="null_scholarshipG">
                                <label for="null_scholarshipG" class="form-check-label mx-0 my-0">N/A</label>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript" src="educational_bg_script.js"></script> -->

    <script>
        // Define handleNA function
        function handleNA(checkboxId, inputId) {
            const checkbox = document.getElementById(checkboxId);
            const input = document.getElementById(inputId);

            checkbox.addEventListener("change", function () {
                if (this.checked) {
                    input.type = "text"; //Change input type to text 
                    input.value = "N/A";
                    input.disabled = true;
                } else {
                    input.type = "number" //Change input type back to number
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
                "degree_v",
                "h_levelV",
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
                "degree_g",
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

        document.addEventListener("DOMContentLoaded", function () {
            // Find the "plus" icons with the class "fa-plus"
            const plusIcons = document.querySelectorAll(".fa-plus");

            // Iterate over each "plus" icon
            plusIcons.forEach(function (icon) {
                // Attach a click event listener to each "plus" icon
                icon.addEventListener("click", function () {
                    // Find the parent row of the clicked icon
                    const parentRow = icon.closest(".row");

                    //Find the n/a checkbox within the parent row 
                    const naCheckbox = parentRow.querySelector(".not_app");

                    //Check if the n/a checkbox is checked
                    if (naCheckbox && naCheckbox.checked) {
                        return;
                    }

                    // Clone the parent row
                    const clonedRow = parentRow.cloneNode(true);

                    //Remove the n/a checkbox and its associated text from the cloned row
                    const clonedNaCheckbox = clonedRow.querySelector(".not_app");
                    if (clonedNaCheckbox) {
                        clonedNaCheckbox.parentNode.removeChild(clonedNaCheckbox);
                    }
                    const clonedNaText = clonedRow.querySelector(".na-text");
                    if (clonedNaText) {
                        clonedNaText.parentNode.removeChild(clonedNaText);

                    }
                    //find the delete button in the cloned row and enable it 
                    const deleteButton = clonedRow.querySelector(".delete-row-button");
                    if (deleteButton) {
                        deleteButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
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

                        // Optionally, clear input values in cloned row
                        input.value = "";
                    });

                    //Find the "Add new row" text span
                    const addRowText = clonedRow.querySelector(".add-row-text");
                    if (addRowText) {
                        //Remove the add row text span from the cloned row 
                        addRowText.parentNode.removeChild(addRowText);
                    }
                    //Remove the plus icon from the cloned row
                    const clonedIcon = clonedRow.querySelector(".fa-plus");
                    if (clonedIcon) {
                        clonedIcon.parentNode.removeChild(clonedIcon);
                    }

                    // Append the cloned row before the "Add new row" text 
                    parentRow.parentNode.insertBefore(clonedRow, parentRow);
                });
            });
        });
        //Function to generate a unique ID based on the old ID
        function generateUniqueId(oldId) {
            return oldId + "_" + Date.now();
        }
    </script>
</body>

</html>