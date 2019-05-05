<?php
    require ('includes/check-login.php');
    include("header.php");
?><main>
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-sm-8 col-md-10">
                <h3 class="text-white"><a id="dashboard" href="dashboard.php">Dashboard </a><small> > View Records</small></h3>
            </div>

            <div class="col-sm-4 col-md-2 text-right">
                <button class="btn btn-dark dropdown-toggle" type="button" data-target="#dropdown" data-toggle="dropdown">Manage Records</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="add-record.php">Add Record</a></li>
                    <li><a class="dropdown-item" href="view-record.php">View Records</a></li>
                </ul>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-6 col-md-4 my-2">
                <div class="card">
                    <img src="images/test.png" height="300" class="card-img" alt="N/A">
                    <div class="card-body">
                        <p>Full Name :</p>
                        <p>Date of birth :</p>
                        <p>Sex :</p>
                        <p>Hall :</p>
                        <p>Course :</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 my-2">
                <div class="card">
                    <img src="images/test.png" height="300" class="card-img" alt="N/A">
                    <div class="card-body">
                        <p>Full Name :</p>
                        <p>Date of birth :</p>
                        <p>Sex :</p>
                        <p>Hall :</p>
                        <p>Course :</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 my-2">
                <div class="card">
                    <img src="images/test.png" height="300" class="card-img" alt="N/A">
                    <div class="card-body">
                        <p>Full Name :</p>
                        <p>Date of birth :</p>
                        <p>Sex :</p>
                        <p>Hall :</p>
                        <p>Course :</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 my-2">
                <div class="card">
                    <img src="images/test.png" height="300" class="card-img" alt="N/A">
                    <div class="card-body">
                        <p>Full Name :</p>
                        <p>Date of birth :</p>
                        <p>Sex :</p>
                        <p>Hall :</p>
                        <p>Course :</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 my-2">
                <div class="card">
                    <img src="images/test.png" height="300" class="card-img" alt="N/A">
                    <div class="card-body">
                        <p>Full Name :</p>
                        <p>Date of birth :</p>
                        <p>Sex :</p>
                        <p>Hall :</p>
                        <p>Course :</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php include("footer.php"); ?>
