<?php
include_once "db_conn.php";
if ($_SESSION['user_type'] != 'A') {
    header("location:" . $_SERVER['HTTP_REFERER']);
    header("location:landing_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Sheet</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <script src="js/bootstrap.js"></script>

    <style>
        /* educational background */
        nav {
            background-color: #283872;
            width: 100%;
            box-shadow: 0px 2px 5px black;
        }

        nav p {
            text-decoration: none;
            color: #E4E9FF;
        }

        nav p:hover {
            color: #FFD644;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .small-font {
            font-size: 13px;
        }

        .delete-row-button:active {
            outline: none;
            border: none;
        }

        .add-row-text:active {
            outline: none;
            border: none;
            color: blue;
        }

        .add-row-text {
            margin-top: -26px;
        }

        /* --------------- */
        hr {
            color: antiquewhite;
            margin: 2em;
        }

        .ref-prepend {
            width: 200px;
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
                <!-- PROFILE -->

                <?php
                include_once 'profile.php';
                ?>

                <!-- FORM -->

                <form action="pds_new.php" method="post" enctype="multipart/form-data">
                    <div id="carousel" class="carousel slide" data-bs-ride="false" data-pause="hover">
                        <nav class="navbar sticky-top">
                            <div class="container">
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                                        aria-current="true" aria-label="Personal Information"
                                        style="text-align:center; cursor: pointer;">
                                        Personal Information
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Family Background"
                                        style="text-align:center; cursor: pointer;">
                                        Family Background
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="2"
                                        aria-label="Educational Background" style="text-align:center; cursor: pointer;">
                                        Educational Background
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="3"
                                        aria-label="Civil Service Eligibility" style="text-align:center; cursor: pointer;">
                                        Civil Service Eligibility
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Work Experience"
                                        style="text-align:center; cursor: pointer;">
                                        Work Experience
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="5" aria-label="Voluntary Work"
                                        style="text-align:center; cursor: pointer;">
                                        Voluntary Work
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="6"
                                        aria-label="Learning & Development" style="text-align:center; cursor: pointer;">
                                        Learning & Development
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="7" aria-label="Other Information"
                                        style="text-align:center; cursor: pointer;">
                                        Other Information
                                    </p>
                                </div>
                                <div class="col mx-4">
                                    <p data-bs-target="#carousel" data-bs-slide-to="8" aria-label="References"
                                        style="text-align:center; cursor: pointer;">
                                        References
                                    </p>
                                </div>
                            </div>
                        </nav>
                        <div class="carousel-inner">
                            <!-- PERSONAL INFORMATION -->
                            <div class="carousel-item active">
                                <?php include_once "pds_sections/personal_info.php"; ?>
                            </div>
                            <!-- FAMILY BACKGROUND -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/fam_bg.php"; ?>
                            </div>
                            <!-- EDUCATIONAL BACKGROUND -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/educational_bg.php"; ?>
                            </div>
                            <!-- CIVIL SERVICE ELIGIBILITY -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/cs_eligibility.php"; ?>
                            </div>
                            <!-- WORK EXPERIENCE -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/work_exp.php"; ?>
                            </div>
                            <!-- VOLUNTARY WORK -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/voluntary_work.php"; ?>
                            </div>
                            <!-- LEARNING & DEVELOPMENT -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/lnd.php"; ?>
                            </div>
                            <!-- OTHER INFORMATION -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/other_info.php"; ?>
                            </div>
                            <!-- REFERENCES -->
                            <div class="carousel-item">
                                <?php include_once "pds_sections/ref.php"; ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>