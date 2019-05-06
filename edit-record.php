<?php
    include("header.php");
    require ('includes/check-login.php');

    require ('config/db.inc.php');

    if (isset($_GET['edit-id'])) {
//        $_SESSION['id'] = $_GET['edit-id'];
        $idEdit = $_GET['edit-id'];

        $sqlEdit = "SELECT * FROM clients_tb WHERE cl_id='$idEdit';";
        $resultEdit = mysqli_query($conn, $sqlEdit);

        if(!$resultEdit){
            echo "SQL error occured";
            mysqli_error($conn);
            exit();
        } else {
            $rowEdit = mysqli_fetch_assoc($resultEdit);
        }
    }

?>
<main>
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-sm-8 col-md-10">
                <h3 class="text-white"><a id="dashboard" href="dashboard.php">Dashboard </a><small> > Edit Record</small></h3>
            </div>

            <div class="col-sm-4 col-md-2 text-right">
                <button class="btn btn-dark dropdown-toggle" type="button" data-target="#dropdown" data-toggle="dropdown">Manage Records</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="add-record.php">Add Record</a></li>
                    <li><a class="dropdown-item" href="view-record.php">View Records</a></li>
                </ul>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 text-white text-center">
                <section class="row ">
                    <section class="col-sm-8 border-right">
                        <h4>Stage One</h4>

                        <form id="edit-form" class="row" action="" method="POST" enctype="multipart/form-data">

                            <section class="col-sm-6 p-4">
                                <input type="hidden" name="edit-id" value="<?php echo $idEdit; ?>">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input id="first-name" class="form-control" type="text" name="first-name" placeholder="eg: Terra" value="<?php
                                        echo $rowEdit['cl_first_name'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input id="last-name" class="form-control" type="text" name="last-name" placeholder="eg: Baffoe" value="<?php
                                    echo $rowEdit['cl_last_name'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="other-names">Other Names</label>
                                    <input id="other-names" class="form-control" type="text" name="other-names" placeholder="eg: Andoh" value="<?php
                                    echo $rowEdit['cl_other_names'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" class="form-control" type="date" name="dob" value="<?php
                                    echo $rowEdit['cl_dob'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex: </label>
                                    <input id="sex" class="form-control" type="text" name="sex" value="<?php echo $rowEdit['cl_sex'];?>" list="sexoptions">
                                    <datalist id="sexoptions">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="place-of-birth">Place of Birth</label>
                                    <input id="place-of-birth" class="form-control" type="text" name="place-of-birth" placeholder="eg: Aburi" value="<?php
                                    echo $rowEdit['cl_place_of_birth'];
                                    ?>">
                                </div>

                            </section>
                            <section class="col-sm-6 p-4">
                                <div class="form-group">
                                    <label for="education-level">Level of Education</label>
                                    <input id="education-level" class="form-control" type="text" name="education-level" placeholder="eg: First Degree" value="<?php
                                    echo $rowEdit['cl_education_level'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email-address">Email Address</label>
                                    <input id="email-address" class="form-control" type="text" name="email-address" placeholder="eg: tcb@gmail.com" value="<?php
                                    echo $rowEdit['cl_email_address'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="telephone-number">Telephone number</label>
                                    <input id="telephone-number" class="form-control" type="text" name="telephone-number" placeholder="eg: 055 555 5555" value="<?php
                                    echo $rowEdit['cl_telephone_number'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="postal-address">Postal Address</label>
                                    <input id="postal-address" class="form-control" type="text" name="postal-address" placeholder="eg: P O Box 38, Legon" value="<?php
                                    echo $rowEdit['cl_postal_address'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="marital-status">Sex: </label>
                                    <input id="marital-status" class="form-control" type="text" name="marital-status" value="<?php echo $rowEdit['cl_marital_status'];?>" list="options">
                                    <datalist id="options">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Complicated">Complicated</option>
                                    </datalist>
                                </div>
                                <p id="form-msg">.</p>
                                <input type="submit" name="update" class="btn btn-block btn-dark" value="Next">
                            </section>


                        </form>
                    </section>

                    <section class="col-sm-4 row text-center">
                        <div class="col-sm"></div>
                        <form class="col-sm-10 mt-5" method="post" action="includes/add-record-server.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <h4 class="text-light">Stage Two</h4>

                                <label for="file">Upload Profile Image</label>
                                <p class="">If you don't want to change the photo, <br></br><button name="cancelupdate" class="btn btn-dark btn-sm" type="submit"> Finish</button></p>
                                <input id="file" class="form-control-file" type="file" name="file">
                                <small class="help-block">Only png and jpg files are allowed!</small>
                            </div>

                            <button type="submit" name="updateimg" class="btn btn-info btn-block">Update </button>
                        </form>
                        <div class="col-sm"></div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</main>
<?php include("footer.php"); ?>
