<!DOCTYPE html>

<html lang="en">
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Sheet</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
    <style>
        hr {
            color: antiquewhite;
            margin: 2em;
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
                include_once 'topnav.php';
                ?>

                <!-- FORM -->

                <form action="pds.php" method="post">

                    <?php
                    if (isset($_GET['form_section'])) {
                        $form_section = $_GET['form_section'];

                        switch ($form_section) {
                            case 'personal_info':
                                include_once 'pds_sections/personal_info.php';
                                break;
                            case "fam_bg":
                                include_once 'pds_sections/fam_bg.php';
                                break;
                            case "educ_bg":
                                // EDUCATIONAL BACKGROUND
                                break;
                            case "cs_eligibility":
                                include_once 'pds_sections/cs_eligibility.php';
                                break;
                            case "work_exp":
                                include_once 'pds_sections/work_exp.php';
                                break;
                            case "voluntary_work":
                                include_once "pds_sections/voluntary_work.php";
                                break;
                            case "lnd":
                                include_once "pds_sections/lnd.php";
                                break;
                            case "other_info":
                                include_once "pds_sections/other_info.php";
                                break;
                            case "references":
                                // REFERENCES
                                break;
                        }
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>
</body>

</html>