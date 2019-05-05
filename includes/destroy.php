<?php
session_start();

    // When destroy is clicked
if (isset($_GET['des-cookies'])) {
    setcookie('user',"",time()-3600,'/');
    setcookie('pass',"",time()-3600,'/');

    //  When logout is clicked
} else if (isset($_GET['logout'])) {
    session_destroy();
}

header("location: ../index.php");
