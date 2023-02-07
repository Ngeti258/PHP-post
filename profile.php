<?php
session_start();
include("connection.php");
include("functions.php");

//user must be logged in to acces this page
$user_data = check_login($con);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Profile</title>
    <style>
        *{
            padding: 0%;
            margin: 0%;
        }
        .profile_card{
            position: absolute;
            top: 150%;
            left: 40%;
            transform: translate(-50%,-50%);
       
    }
    body{
       /* background-image:url("./images/bar_images/qui-nguyen-Zrp9b3PMIy8-unsplash.jpg"); ;*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;

        /* overflow-y: hidden;
        
        background-color: #cccccc; */
    }
    .dashboard_greetings{
        font-family: 'Courier New', monospace;
        font-size: 3em;        
        position: absolute;
        top: 45%;
        left: 22%;
        transform: translate(-50%,-50%);
     }
     .nav-item-1 {
        position: absolute;
        left: 90%;
        top: 10%;

     }
     .nav-item-2 {
        position: absolute;
        top: 10%;
        left: 82%;

     }
     
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="./index.php">BAR CP</a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <strong><a class="nav-item-2 nav-link" href="./post.php">New Post</a></strong>

    <strong><a class="nav-item-1 nav-link" href="./logout.php">Logout</a></strong>
    </div>
  </div>
</nav>
    <h2 style="color: Black">Profile</h2>
    <div class='profile_card'>
        <br>
        <?php
        echo '<br><pre>';
        echo $_SESSION['active']['user_name'];
        echo '<br><pre>';

        echo $_SESSION['active']['email'];

        ?>

    </div>   
</body>
</html>