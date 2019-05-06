<?php

    require_once('db.inc.dashboard.php');

    // No. of Records
    $sql = "SELECT * FROM clients_tb;";
    if (!$result = mysqli_query($conn, $sql)){
        $countOfRecords = 0;
    } else {
        $countOfRecords = mysqli_num_rows($result);
    }

    $sql = "SELECT * FROM clients_tb WHERE cl_sex='Male';";
    if (!$result = mysqli_query($conn, $sql)){
        $countOfMaleRecords = 0;
    } else {
        $countOfMaleRecords = mysqli_num_rows($result);
    }

    $sql = "SELECT * FROM clients_tb WHERE cl_sex='Female';";
    if (!$result = mysqli_query($conn, $sql)){
        $countOfFemaleRecords = 0;
    } else {
        $countOfFemaleRecords = mysqli_num_rows($result);
    }


    $sql = "SELECT * FROM clients_tb ORDER BY cl_id DESC LIMIT 3;";
    $result = mysqli_query($conn, $sql);
?>