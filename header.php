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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#">National ID</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
