<?php
include("header.php");
require ('includes/check-login.php');
?>
<main>
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-sm-8 col-md-10">
                <h3 class="text-white"><a id="dashboard" href="dashboard.php">Dashboard </a><small> > Add Record</small></h3>
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
                        <h4 class="text-light">Stage One</h4>

                        <form class="row" action="includes/add-record-server.php" method="POST" enctype="multipart/form-data">

                            <section class="col-sm-6 p-4">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input id="first-name" class="form-control" type="text" name="first-name" placeholder="eg: Terra">
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input id="last-name" class="form-control" type="text" name="last-name" placeholder="eg: Baffoe">
                                </div>
                                <div class="form-group">
                                    <label for="other-names">Other Names</label>
                                    <input id="other-names" class="form-control" type="text" name="other-names" placeholder="eg: Andoh">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" class="form-control" type="date" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex: </label>
                                    <select id="sex" name="sex" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="place-of-birth">Place of Birth</label>
                                    <input id="place-of-birth" class="form-control" type="text" name="place-of-birth" placeholder="eg: Aburi">
                                </div>

                            </section>
                            <section class="col-sm-6 p-4">
                                <div class="form-group">
                                    <label for="education-level">Level of Education</label>
                                    <input id="education-level" class="form-control" type="text" name="education-level" placeholder="eg: First Degree">
                                </div>
                                <div class="form-group">
                                    <label for="email-address">Email Address</label>
                                    <input id="email-address" class="form-control" type="text" name="email-address" placeholder="eg: tcb@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="telephone-number">Telephone number</label>
                                    <input id="telephone-number" class="form-control" type="text" name="telephone-number" placeholder="eg: 055 555 5555">
                                </div>
                                <div class="form-group">
                                    <label for="postal-address">Postal Address</label>
                                    <input id="postal-address" class="form-control" type="text" name="postal-address" placeholder="eg: P O Box 38, Legon">
                                </div>
                                <div class="form-group">
                                    <label for="marital-status">Marital Status</label>
                                    <select class="form-control" id="marital-status" name="marital-status">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Complicated">Complicated</option>

                                    </select>
                                </div>
                                <button type="submit" name="add" class="btn btn-block btn-dark">Next</button>
                            </section>

                        </form>
                    </section>

                    <section class="col-sm-4 row text-center">
                        <div class="col-sm"></div>
                        <form class="col-sm-10 mt-5" method="post" action="includes/add-record-server.php" enctype="multipart/form-data">
                            <div class="form-group">
                                 <h4 class="text-light">Stage Two</h4>
                                <label for="file">Upload Profile Image</label>
                                <p class="">If you don't want to add a photo now, <br></br><button name="canceladd" class="btn btn-dark btn-sm" type="submit"> Finish</button></p>
                                <input id="file" class="form-control-file" type="file" name="file">
                                <small class="help-block">Only png and jpg files are allowed!</small>
                            </div>

                            <button type="submit" name="addimage" class="btn btn-info btn-block">Register</button>
                        </form>
                        <div class="col-sm"></div>
                    </section>
            </section>
            </div>
        </div>
    </div>
</main>
<?php include("footer.php"); ?>
