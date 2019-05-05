<?php
    require ('includes/check-login.php');
    include("header.php");
?>
<main>
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-sm-8 col-md-10">
                <h3 class="text-white"><a id="dashboard" href="dashboard.php">Dashboard </a></h3>
            </div>

            <div class="col-sm-4 col-md-2 text-right">
                <button class="btn btn-dark dropdown-toggle" type="button" data-target="#dropdown" data-toggle="dropdown">Manage Records</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="add-record.php">Add Record</a></li>
                    <li><a class="dropdown-item" href="view-record.php">View Records</a></li>
                </ul>
            </div>
        </div>
        <div id="updates" class="row text-center">
            <div class="col-sm-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h3>34 <i class="fas fa-users"></i></h3>
                        <h4>All Clients</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h3>23 <i class="fas fa-users"></i></h3>
                        <h4>Male Clients</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h3>329 <i class="fas fa-users"></i></h3>
                        <h4>Female Clients</h4>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Recent Records</h5>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Date of Birth</th>
                        <th>Educational Level</th>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>Tracy Bandoh</td>
                        <td>Female</td>
                        <td>12/12/1992</td>
                        <td>College Education</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</main>
<?php include("footer.php"); ?>
