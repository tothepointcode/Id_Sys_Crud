<?php
require ("../config/db.inc.php");
//Delete record feature

if (isset($_GET['del-id'])) {
    $id = $_GET['del-id'];

    $sql = "DELETE FROM clients_tb WHERE cl_id='$id';";

    if(!mysqli_query($conn, $sql)){
        echo "SQL error occured : Deletion";
        echo mysqli_error($conn);
        exit();
    }
    header("location: ../view-record.php");
    $_SESSION['msg'] = "Record Deleted successfully!";
//    header("location: ../view-record.php");

}



?>