<?php
include_once "db_conn.php";

if(isset($_POST['login_username']) || null !== ($_SESSION["username"] && $_SESSION["pwdhash"])){

    //checks if value of name="login_username" is set
    if(isset($_POST['login_username'])){

        //transfers value of name="" from form to variable
        $l_username = $_POST['login_username'];
        $l_password = $_POST['login_password'];
    }
    else if(null !== ($_SESSION["username"] && $_SESSION["pwdhash"])) {

        //transfers value from session variable to variable
        $l_username = $_SESSION['username'];
        $l_password = $_SESSION['password'];
    }
    
    //retrieves info from db
    $sql = "SELECT `user_id`, `user_name`, `user_pwdhash`, `user_type`, `user_status` FROM `users` WHERE user_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $l_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    //transfers value from db to variable
    $stored_password = $row['user_pwdhash'];
    $user_status = $row['user_status'];

    //if $result is empty, the param $l_username does not exist in db
    if(mysqli_num_rows($result) == 0) {
        header("location: landing_page.php?login=failed");
        exit();
    }
    else {
        if($user_status == 'I') {
            unset($_SESSION['user_id']);
            header("location: landing_page.php?login=inactive");
            exit();
        }
        //verifies the pwd typed vs the pwd stored in db
        else if(password_verify($l_password, $stored_password)) {

            //transfers value from db to sessioin variable
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_type'] = $row['user_type'];

            header("location: landing_page.php?login=success&user_name=" . $row['user_name']);
            exit();
        } else {
            unset($_SESSION['user_id']);
            header("location: landing_page.php?login=wrongpass");
            exit();
        }
    }
    mysqli_free_result($result);
}

// ==================================== REGISTER ====================================
// checks if value of name="reg_username" is set
// if(isset($_POST['reg_username'])) {

//     //transfers value of name="" from form to variable
//     $r_username = $_POST['reg_username'];
//     //hashes value of name="reg_password" from form then transfered to variable
//     $r_pwdhash = password_hash($_POST['reg_password'], PASSWORD_ARGON2ID);

//     $_SESSION["username"] = $r_username;
//     $_SESSION["password"] = $r_pwdhash;
    
//     //preparing arguments for insert()
//     $table = "users";
//     $fields = array('user_name' => $r_username
//                    ,'user_pwdhash' => $r_pwdhash
//                    ,'user_type' => 'A'
//                    ,'user_status' => 'A'
//                    );
//     $filter = array($r_username);
    
//     //retrieves info from db
//     $sql = "SELECT `user_name`, `user_pwdhash` FROM `users` WHERE `user_name` = ?";
//     $result = query($conn, $sql, $filter);

//     //if $result is empty, the param $r_emailadd does not exist in db
//     if(!empty($result)) {
//         header("location: landing_page.php?registration=existing");
//         exit();
//     }
//     //inserts arguments to db
//     else {
//         if(insert($conn, $table, $fields)) {
//             header("location: landing_page.php?registration=success");
//             exit();
//         } else {
//             header("location: landing_page.php?registration=failed");
//             exit();
//         }
//     }
//     mysqli_free_result($result);
// }