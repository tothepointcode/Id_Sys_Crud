<?php
session_start();
require_once('../config/db.inc.php');

if(isset($_POST['login-submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);

    if (empty($username) || empty($password)) {
        $_SESSION['msg'] = "<span class='text-danger'>Please fill all fields!</span>";
        header("location: ../index.php");
    } else {
        // Check for login correctness
        $query = "SELECT password FROM users WHERE username='$username' OR email='$username';";
        $result = mysqli_query($conn, $query);
    }

    if (!mysqli_num_rows($result) > 0) {
        $_SESSION['msg'] = "<span class='text-danger'>User account doesn't exist!</span>";
        header("location: ../index.php");

    } else if (!($resultAssoc = mysqli_fetch_assoc($result))) {
            $_SESSION['msg'] = "<span class='text-danger'>Sql error occurred!</span>";
            header("location: ../index");

    } else {
        $pass = $resultAssoc['password'];
        if (!(password_verify($password, $pass))) {
            $_SESSION['msg'] = "<span class='text-danger'>Incorrect password!</span>";
            header("location: ../index.php");

        } else {
            //  Check for remember me
            if (isset($_POST['remember-me'])) {
                setcookie('user',$username,time()+3600,'/');
                setcookie('pass',$password,time()+3600,'/');
                header("location: ../dashboard.php");

            } else {
                header("location: ../dashboard.php");

            }
            $_SESSION['admin']="Test Admin";

        }
    }
} else {
    header("location: ".ROOT_URL);
}
?>