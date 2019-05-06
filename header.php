<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="A system for managing national identification records">
    <title>National Identification System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css" >
    <link rel="stylesheet" href="assets/css/all.css" >

    <style>
        main {
            min-height: calc(100vh - 56px);
            background: linear-gradient(35deg,#17a2b8, rgba(0,0,0,0.5), rgba(0,0,0,0.5));
        }
        input[type='text']:focus,
        input[type='password']:focus{
            border: 3px solid #17a2b8;
        }

    </style>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(() => {
            // Add record
            $('#add-form').on('submit',(e)=>{
                e.preventDefault();
                let fname = $("input[name='first-name']").val();
                let lname = $("input[name='last-name']").val();
                let onames = $("input[name='other-names']").val();
                let cdob = $("input[name='dob']").val();
                let csex = $("select[name='sex']").val();
                let pbirth = $("input[name='place-of-birth']").val();
                let elevel = $("input[name='education-level']").val();
                let telnum = $("input[name='telephone-number']").val();
                let email = $("input[name='email-address']").val();
                let paddr = $("input[name='postal-address']").val();
                let mariStat = $("select[name='marital-status']").val();
                let submit = $("input[name='add']").val();

                $("#form-msg").load("includes/add-record-server.php",{
                    first_name : fname,
                    last_name : lname,
                    other_names : onames,
                    dob : cdob,
                    sex : csex,
                    place_of_birth : pbirth,
                    education_level : elevel,
                    email_address : email,
                    telephone_number : telnum,
                    postal_address : paddr,
                    marital_status : mariStat,
                    add: submit
                },()=>{
                });
            });


            $('#edit-form').on('submit',(e)=>{
                e.preventDefault();
                let fname = $("input[name='first-name']").val();
                let lname = $("input[name='last-name']").val();
                let onames = $("input[name='other-names']").val();
                let cdob = $("input[name='dob']").val();
                let csex = $("input[name='sex']").val();
                let pbirth = $("input[name='place-of-birth']").val();
                let elevel = $("input[name='education-level']").val();
                let telnum = $("input[name='telephone-number']").val();
                let email = $("input[name='email-address']").val();
                let paddr = $("input[name='postal-address']").val();
                let mariStat = $("input[name='marital-status']").val();
                let submit = $("input[name='add']").val();

                $("#form-msg").load("includes/add-record-server.php",{
                    first_name : fname,
                    last_name : lname,
                    other_names : onames,
                    dob : cdob,
                    sex : csex,
                    place_of_birth : pbirth,
                    education_level : elevel,
                    email_address : email,
                    telephone_number : telnum,
                    postal_address : paddr,
                    marital_status : mariStat,
                    add: submit
                },()=>{});
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#">National ID</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ml-auto">
                    <?php if (!isset($_SESSION['admin'])): ?>
                    <li class="nav-item active">
                         <a class="nav-link px-2" href="#">Admin <i class="fas fa-user pl-2"></i></a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle px-2" data-toggle="dropdown" type="button" href="#">Welcome, <?php echo $_SESSION['admin']; ?> <i class="fas fa-user pl-2"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"  href="includes/destroy.php?des-cookies">Clear login data</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="includes/destroy.php?logout">Logout</a>
                    </li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

