<?php
include_once "db_conn.php";
if ($_SESSION['user_type'] != 'A') {
    header("location:" . $_SERVER['HTTP_REFERER']);
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

    <style>
        /* top navigation bar */

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

        /* checkbox */
        .checkbox-container {
            display: flex;
            align-items: center;
        }

        /* small font */
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
                include_once 'topnav.php';
                ?>

                <!-- FORM -->

                <form action="new_pds.php" method="post" enctype="multipart/form-data">

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
                                include_once 'pds_sections/educational_bg.php';
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
                            case "ref":
                                include_once "pds_sections/ref.php";
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