<?php
    include("header.php");
    require('includes/check-login.php');
    require('includes/dashboard-server.php');
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
                        <h3><?php echo $countOfRecords; ?> <i class="fas fa-users"></i></h3>
                        <h4>All Clients</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h3><?php echo $countOfMaleRecords; ?> <i class="fas fa-users"></i></h3>
                        <h4>Male Clients</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h3><?php echo $countOfFemaleRecords; ?> <i class="fas fa-users"></i></h3>
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

                    <?php
                    if (!$result = mysqli_query($conn, $sql)) {
                        echo "No records available";
                    } else { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) :?>

                        <?php
                        $id = $row['cl_id'];
                        if ($row['cl_img_stat'] == 1) {
                        $sql = "SELECT * FROM clients_gallery_tb WHERE im_cl_id='$id';";
                        $imResult = mysqli_query($conn, $sql);
                        $imPath = mysqli_fetch_assoc($imResult);
                        $path = $imPath['im_folder'].$imPath['im_full_name'].'?'.mt_rand();
                        } else {
                        $path = "./images/test.png";
                        }
                        ?>

                        <tr>
                            <td><div id="viewImg" style="background-image: url(<?php echo $path; ?>)"></div></td>
                            <td><?php echo $row['cl_first_name'].$row['cl_last_name']; ?></td>
                            <td><?php echo $row['cl_sex']?></td>
                            <td><?php echo $row['cl_dob']?></td>
                            <td><?php echo $row['cl_education_level']?></td>
                        </tr>

                        <?php endwhile; ?>

                    <?php } ?>

                </table>

            </div>

        </div>
    </div>
</main>
<?php include("footer.php"); ?>
