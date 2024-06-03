<?php
include_once ("db_conn.php");

if (isset($_SESSION['user_id'])) {
    $log = "LOG OUT";
    $li_att = ' data-bs-toggle="modal" data-bs-target="#logoutModal"'; // Added logout trigger
    $a_att = '';
} else {
    $log = "LOG IN";
    $li_att = ' data-bs-toggle="modal" data-bs-target="#loginModal"';
    $a_att = '"';
}
?>
<style>
    .dropdown-icon {
        position: absolute;
        right: 0;
        padding-right: 13px;
    }

    .sidebar-item {
        position: relative;
        width: 100%;
        font-size: 18px;
    }

    .sidebar-item a {
        display: block;
        color: inherit;
        text-decoration: none;
        padding: 10px 0;
    }

    .center-text {
        text-align: center;
        width: 100%;
    }

    .col-10 {
        padding-left: 15px;
    }

    @media (max-width: 1000px) {
        .col-2 {
            width: 25%;
        }

        .col-10 {
            width: 75%;
        }
    }
</style>

<div class="vh-100 col-2 bg d-flex col-xl-2 px-sm-2 px-0">
    <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white top-0 start-0">
        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
            id="menu">
            <span class="uppercase center-text mt-3">
                <h1>HRIS</h1>
            </span>
            <form action="search_bar.php" method="GET">
                <div class="input-group mt-3">
                    <div class="input-group">
                        <input type="text" class="form-control text-center mt-3 custom-rounded" name="search" placeholder="Search Employee" />
                        <div class="input-group-append mt-3">
                            <button class="btn btn-primary" type="submit" style="border-top-right-radius: 17px; border-bottom-right-radius: 17px;">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="divider-top"></div>
            <li class="sidebar-item nav-item mt-3">
                <a href="landing_page.php" class="nav-link px-sm-0 px-2">
                    <span class="uppercase">Home</span>
                </a>
            </li>

            <!-- Accordion -->
            <li class="sidebar-item mt-2">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                    RSSO V
                    <span class="dropdown-icon"></span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <?php
                    $list_rsso = query($conn, "SELECT * FROM `rsso_v`");
                    foreach ($list_rsso as $key => $row) {
                        $rsso_id = $row['rsso_id'];
                        $rsso_acro = $row['rsso_acronym'];
                        echo '
                        <li class="sidebar-item mt-2">
                            <a href="employee_tiles.php?scope=region&office=' . $rsso_acro . '" class="sidebar-link ps-5">' . $rsso_acro . '</a>
                        </li>
                        ';
                    }
                    ?>
                </ul>
            </li>

            <!-- PROVINCES -->
            <?php
            $list_province = query($conn, "SELECT * FROM `provinces`");
            foreach ($list_province as $key => $row) {
                $prov_id = $row['province_id'];
                $prov_name = $row['province_name'];
                echo '
                <li class="sidebar-item mt-2">
                    <a href="employee_tiles.php?scope=province&office=' . $prov_name . '" class="nav-link px-sm-0 px-2">
                        <span class="uppercase">' . $prov_name . '</span>
                    </a>
                </li>
                ';
            } ?>

            <div class="divider-bottom mb-2"></div>

            <!-- SETTINGS -->
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '
                <li class="sidebar-item nav-item mt-2">
                    <a href="trainings.php" class="nav-link px-sm-0 px-2">
                        <span class="">TRAININGS</span>
                    </a>
                </li>
                ';
            }
            ?>
            <li class="sidebar-item nav-item mt-2" <?php echo $li_att; ?>>
                <a class="nav-link px-sm-0 px-2" <?php echo $a_att; ?>>
                    <span class="">
                        <?php echo $log; ?>
                    </span>
                </a>
            </li>
            <?php
            if (isset($_GET['login'])) {
                switch ($_GET['login']) {
                    case "success":
                        echo "<div class='alert alert-success alertMessage'>Logged in!</div>";
                        break;
                    case "failed":
                        echo "<div class='alert alert-info alertMessage'>User not registered.</div>";
                        break;
                    case "wrongpass":
                        echo "<div class='alert alert-warning alertMessage'>Wrong password.</div>";
                        break;
                    case "inactive":
                        echo "<div class='alert alert-info alertMessage'>User inactive.</div>";
                        break;
                }
            }
            ?>
            <div class="col-10"></div>
        </ul>
    </div>
</div>

<!-- Log In Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1 class="text-dark text-center">LOG IN</h1>
                <form action="login.php" method="POST">
                    <div class="px-3 mt-5">
                        <input type="text" class="form-control" id="login_username" name="login_username" placeholder="username" aria-describedby="usernameHelp" required>
                    </div>
                    <div class="px-3 mt-4">
                        <input type="password" class="form-control" id="login_password" name="login_password" placeholder="password" required>
                        <div class="form-check form-check-inline mt-1">
                            <input class="form-check-input" type="checkbox" id="show_pass" name="show_pass" onclick="myFunction()">
                            <label class="form-check-label" for="show_pass">Show Password</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn custom-button text-white" id="log">
                            <strong><?php echo $log; ?></strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div style="height: 260px;" class="modal-content">
            <div class="modal-header d-flex justify-content-end align-items-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top: 5px; margin-right: 10px;"></button>
            </div>
            <div class="modal-header d-flex justify-content-center align-items-center">
                <h4 class="modal-title" id="logoutModalLabel">Logout</h4>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <h5 style="text-align: center; font-weight: normal;">Are you sure you want to logout?</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-secondary btn-sm me-1" data-bs-dismiss="modal" style="height: 30px; width: 60px;">No</button>
                <span style="margin-right: 40px;"></span>
                <a href="logout.php" class="btn btn-primary btn-sm" style="height: 30px; width: 60px;">Yes</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    // Function to hide alert after a delay
    document.addEventListener('DOMContentLoaded', function () {
        var alertElement = document.querySelectorAll('.alertMessage');
        if (alertElement) {
            alertElement.forEach(element => {
                setTimeout(function () {
                    element.style.display = 'none';
                }, 5000); // Hide after 5 seconds
            });
        }
    });

    function myFunction() {
        var showPass = document.getElementById("login_password");
        if (showPass.type === "password") {
            showPass.type = "text";
        } else {
            showPass.type = "password";
        }
    }
</script>

