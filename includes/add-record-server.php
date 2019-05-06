<?php
session_start();

include "../config/db.inc.php";

// Handle add and update operations
$move = false;
// stage one submit
if (isset($_POST['add']) || isset($_POST['update'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $otherNames = mysqli_real_escape_string($conn, $_POST['other_names']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $placeOfBirth = mysqli_real_escape_string($conn, $_POST['place_of_birth']);
    $educationLevel = mysqli_real_escape_string($conn, $_POST['education_level']);
    $emailAddress = mysqli_real_escape_string($conn, $_POST['email_address']);
    $telephoneNumber = mysqli_real_escape_string($conn, $_POST['telephone_number']);
    $postalAddress = mysqli_real_escape_string($conn, $_POST['postal_address']);
    $maritalStatus = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $stat = 0;

    // ADD HANDLER
    if (isset($_POST['add'])) {
        // Verification of data input
        if (empty($firstName) || empty($lastName) || empty($otherNames) || empty($dob) || empty($sex) || empty($placeOfBirth) || empty($educationLevel) || empty($emailAddress) || empty($telephoneNumber) || empty($postalAddress) || empty($maritalStatus)) {
            echo "<span class='text-danger'>Fill all fields</span>";
        } else if (!preg_match("/^[a-zA-Z]*$/", $firstName) ||  !preg_match("/^[a-zA-Z]*$/", $lastName) || !preg_match("/^[a-zA-Z]*$/", $otherNames)) {
            echo "<span class='text-danger'>Invalid names entered</span>";
        } else if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='text-danger'>Invalid email entered</span>";
        } else {
            $sql = "INSERT INTO clients_tb(
                      cl_first_name,
                      cl_last_name,
                      cl_other_names,
                      cl_dob,
                      cl_sex,
                      cl_place_of_birth,
                      cl_education_level,
                      cl_email_address,
                      cl_telephone_number,
                      cl_postal_address,
                      cl_marital_status,
                      cl_img_stat)
                    VALUES(
                      '$firstName',
                      '$lastName',
                      '$otherNames',
                      '$dob',
                      '$sex',
                      '$placeOfBirth',
                      '$educationLevel',
                      '$emailAddress',
                      '$telephoneNumber',
                      '$postalAddress',
                      '$maritalStatus',
                      '$stat'
                    );";

            if (!mysqli_query($conn, $sql)) {
                echo "Sql error occurred : Insertion";
            } else {
                $sql = "SELECT
                          max(cl_id) AS 'cl_id'
                        FROM
                          clients_tb;";

                if (!$result = mysqli_query($conn, $sql)) {
                    echo "Sql error occurred : Fetching id";
                    echo mysqli_error($conn);

                } else {
                    $resultArr = mysqli_fetch_assoc($result);
                    $_SESSION['addId'] = $resultArr['cl_id'];
                    $_SESSION['addok'] = "true";
                    echo "<span class='text-success'>Stage one successful!</span>";
                    exit();
                }

            }
        }

        // UPDATE HANDLER

    } else if ( isset($_POST['update']) ) {

        $id = $_POST['edit_id'];

        // Verification of data input
        if (empty($firstName) || empty($lastName) || empty($otherNames) || empty($dob) || empty($sex) || empty($placeOfBirth) || empty($educationLevel) || empty($emailAddress) || empty($telephoneNumber) || empty($postalAddress) || empty($maritalStatus)) {
            echo "<span class='text-danger'>Fill all fields!</span>";
        } else if (!preg_match("/^[a-zA-Z]*$/", $firstName) ||  !preg_match("/^[a-zA-Z]*$/", $lastName) || !preg_match("/^[a-zA-Z]*$/", $otherNames)) {
            echo "<span class='text-danger'>Invalid names entered!</span>";
        } else if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='text-danger'>Invalid email entered!</span>";
        } else {

            $sql = "UPDATE
                      clients_tb
                    SET
                      cl_first_name ='$firstName',
                      cl_last_name = '$lastName',
                      cl_other_names = '$otherNames',
                      cl_dob = '$dob',
                      cl_sex = '$sex',
                      cl_place_of_birth = '$placeOfBirth',
                      cl_education_level = '$educationLevel',
                      cl_email_address = '$emailAddress',
                      cl_telephone_number = '$telephoneNumber',
                      cl_postal_address = '$postalAddress',
                      cl_marital_status = '$maritalStatus'
                    WHERE
                      cl_id = '$id';";

            if (!mysqli_query($conn, $sql)) {
                echo "<span class='text-danger'>Sql error occurred : update add</span>";
                echo mysqli_error($conn);
                exit();
            } else {
                $_SESSION['editId'] = $id;     // Id for record
                $_SESSION['editok'] = "true";
                echo "<span class='text-success'>Update stage one successful!</span>";
                exit();
            }

        }

    } else {
        exit();
    }

}

// Stage one add ends


//Update cancel handler img upload
if (isset($_POST['cancelupdate'])) {
    unset($_SESSION['editok']);
    unset($_SESSION['editId']);
    echo "<span class='text-info'>Profile image will remain unchanged</span>";
    header("location: ../view-record.php");
    $move = true;
}

//Add cancel handler img upload
if (isset($_POST['canceladd'])) {
    $addId = $_SESSION['addId'];

    $sql = "INSERT INTO studentgallery (img_stdid) VALUES ($addId);";

    if($res = mysqli_query($conn,$sql)) {
        echo "SQL error : Img cancel add";
        echo mysqli_error($conn);

    }
    $move = true;
    unset($_SESSION['addok']);
    header("location: ../view-record.php");
    echo "<span class='text-info'>Default profile will be used</span>";
}


// stage two image submit
if (isset($_POST['addimage']) || isset($_POST['updateimg'])) {

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg","jpeg","png");

    // insert new image
    if (isset($_POST['addimage'])) {
        $addId = $_SESSION['addId'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 2000000) {

                    $imageFullName = "clientimg".$addId.".".$fileActualExt;
                    $folder = "images/";
                    $fileDestination = "../".$folder.$imageFullName;

                    $sql = "INSERT INTO clients_gallery_tb (im_cl_id,im_folder,im_full_name) VALUES ('$addId','$folder','$imageFullName');";

                    if (!mysqli_query($conn,$sql)) {
                        echo "<span class='text-danger'>Sql statement failed : img add</span>";
                        echo mysqli_error($conn);
                        exit();
                    } else {

                        // update img status records
                        $sql = "UPDATE clients_tb SET cl_img_stat=1 WHERE cl_id ='$addId';";
                        if (!mysqli_query($conn, $sql)) {
                            echo "<span class='text-danger'>error : client table img update</span>";

                            echo "";
                            echo mysqli_error($conn);
                            exit();
                        }
                        move_uploaded_file($fileTempName,$fileDestination);
                        unset($_SESSION['addok']);
                        unset($_SESSION['addId']);
                        $move = true;
                        echo "<span class='text-success'>Image uploaded successfully</span>";
                        header("location: ../view-record.php");

                    }

                } else {
                    echo "<span class='text-danger'>Huge file</span>";
                    exit();
                }
            } else {
                echo "<span class='text-danger'>File error internally</span>";
                exit();
            }
        } else {
            echo "<span class='text-danger'>Invalid file uploaded</span>";
            exit();
        }

        // Update image
    } else if (isset($_POST['updateimg'])) {
        $editId = $_SESSION['editId'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 2000000) {

                    $imageFullName = "clientimg".$editId.".".$fileActualExt;
                    $folder = "images/";
                    $fileDestination = "../".$folder.$imageFullName;

                    $sql = "UPDATE clients_gallery_tb SET im_folder='$folder',im_full_name='$imageFullName' WHERE im_cl_id='$editId';";

                    if (!mysqli_query($conn,$sql)) {
                        echo "<span class='text-danger'>Sql statement failed : img add</span>";
                        echo mysqli_error($conn);
                        exit();
                    } else {

                        // update img status records
                        $sql = "UPDATE clients_tb SET cl_img_stat=1 WHERE cl_id ='$editId';";
                        if (!mysqli_query($conn, $sql)) {
                            echo "<span class='text-danger'>error : table update</span>";
                            echo mysqli_error($conn);
                            exit();
                        }


                        move_uploaded_file($fileTempName,$fileDestination);
                        unset($_SESSION['editok']);
                        unset($_SESSION['editId']);
                        echo "<span class='text-success'>Image updated successfully!</span>";
                        header("location: ../view-record.php");
                        $move = true;
                    }

                } else {
                        echo "<span class='text-danger'>Huge file</span>";
                        exit();
                    }
                } else {
                    echo "<span class='text-danger'>File error internally</span>";
                    exit();
                }
            } else {
                echo "<span class='text-danger'>Invalid file uploaded</span>";
                exit();
            }

    } else {
        header("location: ../index.php");
        exit();
    }
}
//Stage two submit ends

?>
<script>
    let moveStat =<?php echo $move; ?>;
</script>
