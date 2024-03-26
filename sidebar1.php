<?php
include_once ("db_conn.php");

if (isset ($_SESSION['user_id'])) {
    $log = "LOG OUT";
    $li_att = ' ';
    $a_att = 'href="logout.php" ';
} else {
    $log = "LOG IN";
    $li_att = ' data-bs-toggle="modal" data-bs-target="#exampleModal"';
    $a_att = '"';
}
?>

<div class="col-2 bg d-flex col-xl-2 px-sm-2 px-0">
    <div
        class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white position-fixed top-0 start-0">
        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
            id="menu">
            <div class="input-group custom-rounded mt-3">
                <input type="search" class="form-control text-center mt-5 custom-rounded d-none d-lg-inline"
                    placeholder="Search" />
            </div>
            <div class="divider-top d-none d-lg-inline"></div>
            <li class="nav-item mt-3">
                <a href="landing_page.php" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">HOME</span>
                </a>
            </li>

            <!-- Accordion -->
            <li class="sidebar-item d-none d-lg-inline mt-2">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                    aria-expanded="false" aria-controls="pages">
                    RSSO V
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
                <li class="nav-item mt-2">
                    <a href="employee_tiles.php?scope=province&office=' . $prov_name . '" class="nav-link px-sm-0 px-2">
                        <span class="d-none d-lg-inline uppercase">' . $prov_name . '</span>
                    </a>
                </li>
                ';
            } ?>
            
            <div class="divider-bottom d-none d-lg-inline mb-2"></div>

            <!-- SETTINGS -->
            <?php
            if (isset ($_SESSION['user_id'])) {
                echo '
                <li class="nav-item mt-2">
                    <a href="trainings.php" class="nav-link px-sm-0 px-2">
                        <span class="d-none d-lg-inline">TRAININGS</span>
                    </a>
                </li>
                ';
            }
            ?>
            <li class="nav-item mt-2" <?php echo $li_att; ?>>
                <a <?php echo $a_att; ?>class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">
                        <?php echo $log; ?>
                    </span>
                </a>
            </li>
            <?php
            if (isset ($_GET['login'])) {
                switch ($_GET['login']) {
                    case "success":
                        echo "<div class='alert alert-success'>Logged in!</div>";
                        break;
                    case "failed":
                        echo "<div class='alert alert-info'>User not registered.</div>";
                        break;
                    case "wrongpass":
                        echo "<div class='alert alert-warning'>Wrong password.</div>";
                        break;
                    case "inactive":
                        echo "<div class='alert alert-info'>User inactive.</div>";
                        break;
                }
            }
            ?>

        </ul>
    </div>

    <!-- Log In Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="text-dark text-center">LOG IN</h1>
                    <form action="login.php" method="POST">
                        <div class="px-3 mt-5">
                            <input type="text" class="form-control" id="login_username" name="login_username"
                                placeholder="username" aria-describedby="usernameHelp" required>
                        </div>
                        <div class="px-3 mt-4">
                            <input type="password" class="form-control" id="login_password" name="login_password"
                                placeholder="password" required>
                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input" type="checkbox" id="show_pass" name="show_pass"
                                    onclick="myFunction()">
                                <label class="form-check-label" for="show_pass">Show Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn custom-button mt-4 text-white" id="log">
                                <strong>
                                    <?php echo $log; ?>
                                </strong>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    function myFunction() {
        var showPass = document.getElementById("login_password");
        if (showPass.type === "password") {
            showPass.type = "text";
        } else {
            showPass.type = "password";
        }
    }
</script>