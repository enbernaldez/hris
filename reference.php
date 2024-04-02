<!DOCTYPE html>
<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reference</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .input-group-prepend {
            width: 200px;
        }

        .input-group-text {
            width: 200px;
            text-align: left;
            margin-right: 10px;
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
                <div class="container">
                    <div class="row mt-4 text-center align-items-center ms-auto">
                        <div class="col-4">
                            <p>NAME</p>
                        </div>
                        <div class="col-4">
                            <p>ADDRESS</p>
                        </div>
                        <div class="col-4">
                            <p>TEL NO.</p>
                        </div>
                    </div>
                    <div class="row-container">
                        <div class="row row-row mt-3">
                            <div class="col-4">
                                <input type="text" name="ref_name" id="ref_name" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="ref_address" id="ref_address" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="ref_tel_No" id="ref_tel_No" class="form-control" required>
                            </div>
                        </div>
                        <div class="row row-row mt-3">
                            <div class="col-4">
                                <input type="text" name="ref_name" id="ref_name" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="ref_address" id="ref_address" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="ref_tel_No" id="ref_tel_No" class="form-control" required>
                            </div>
                        </div>
                        <div class="row row-row mt-3">
                            <div class="col-4">
                                <input type="text" name="ref_name" id="ref_name" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="ref_address" id="ref_address" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="ref_tel_No" id="ref_tel_No" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <!-- Input Group -->
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for=""><strong>Government Issued ID (i.e. Passport, GSIS, SSS, PRC,
                                            Driver's License etc) Please INDICATE ID Number and Date of
                                            Issuance:</strong></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Government Issued ID:</span>
                                        </div>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ID/License/Passport No.:</span>
                                        </div>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Date/Place of Issuance:</span>
                                        </div>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="col-6">
                                <div class="mt-4 d-flex flex-column align-items-end">
                                    <!-- <img id="profile_image" src="images/Bercilla.jpg" alt="profile"
                                        style="height:150px; width:auto;" class="img-fluid float-end"> -->
                                    <img id="profile_image" src="images/person.png" alt="profile"
                                        style="height:150px; width:auto;">
                                    <div class="mt-2">
                                        <input type="file" class="form-control" id="change_photo" name="change_photo"
                                            style="width: 150px;" onchange="updateProfileImage(this)">
                                    </div>
                                </div>
                            </div>
                            <!-- Script -->
                            <script>
                                // Check if there is a saved image in local storage
                                if (localStorage.getItem('profile_image')) {
                                    document.getElementById('profile_image').src = localStorage.getItem('profile_image');
                                }

                                function updateProfileImage(input) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        document.getElementById('profile_image').src = e.target.result;
                                        // Save the image data to local storage
                                        localStorage.setItem('profile_image', e.target.result);
                                        document.getElementById('profile_image').style.display = 'block'; // Show the image after uploading
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>