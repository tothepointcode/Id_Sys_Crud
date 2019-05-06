<?php
session_start();
require_once('../config/db.inc.php');

$legit = false;
if(isset($_POST['login_submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);

    if (empty($username) || empty($password)) {
        echo "<span class='text-danger bg-light p-1'>Please fill all fields!</span>";
    } else {
        // Check for login correctness
        $query = "SELECT fname,password FROM users WHERE username='$username' OR email='$username';";
        $result = mysqli_query($conn, $query);

        if (!mysqli_num_rows($result) > 0) {
            echo "<span class='text-danger bg-light p-1'>User account doesn't exist!</span>";

        } else if (!($resultAssoc = mysqli_fetch_assoc($result))) {
            echo "<span class='text-danger bg-light p-1'>Sql error occurred!</span>";

        } else {
            $pass = $resultAssoc['password'];
            if (!(password_verify($password, $pass))) {
                echo "<span class='text-danger bg-light p-1'>Incorrect password!</span>";

            } else {
                //  Check for remember me
                if (isset($_POST['remember_me'])) {
                    setcookie('user',$username,time()+3600,'/');
                    setcookie('pass',$password,time()+3600,'/');
                    echo "<span class='text-success bg-light p-1'>Inside!</span>";

                } else {
                    echo "<span class='text-success bg-light p-1'>Inside!</span>";

                }
                $_SESSION['admin'] = $resultAssoc['fname'];
                $legit = true;

            }
        }
    }


} else {
    header("location: ../index.php");
}
?>

<script>
    let legit =<?php echo $legit;?>
</script>
