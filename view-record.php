<?php
    include("header.php");
    require ('includes/check-login.php');
    require ("config/db.inc.php");

    $result = mysqli_query($conn, "SELECT * FROM clients_tb ORDER BY cl_id DESC;");

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

                <div class="col-sm-6 col-md-4 my-2">
                    <div class="card">
                        <img src="<?php echo $path; ?>" height="300" class="card-img" alt="N/A">
                        <div class="card-body">
                            <p>Name : <?php echo $row['cl_first_name']." ".$row['cl_last_name']; ?></p>
                            <p>Date of birth : <?php echo $row['cl_dob']?></p>
                            <p>Sex : <?php echo $row['cl_sex']?></p>
                            <p>Marital Status : <?php echo $row['cl_marital_status']?></p>
                            <p>Phone : <?php echo $row['cl_telephone_number']?></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-dark" href="edit-record.php?edit-id=<?php echo $row['cl_id']; ?>" >Edit</a>
                            <a class="btn btn-danger" href="includes/delete-record-server.php?del-id=<?php echo $row['cl_id']; ?>">Delete</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

            <?php if (mysqli_num_rows($result) < 1) {
                echo "<p class='alert alert-warning'>No records available</p>";
            } ?>


        </div>
</main>
<?php include("footer.php"); ?>
