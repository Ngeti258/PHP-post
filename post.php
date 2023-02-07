<?php
session_start();
include('connection.php');
include('functions.php');

//user must be looged in to access this page
$user_data = check_login($con);
$id=$_SESSION['active']['id'];
//$author_username = $_SESSION['active']['user_name'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];
  
//insert into database
  $sql = "INSERT INTO articles (title,content,author_id) VALUES('$title','$content','$id')";

  if(mysqli_query($con,$sql)){
    //echo 'New record created successfully';
    header("Location: index.php");
    die;
  }else{
    echo "Error : ".$sql. "<br>".mysqli_error($con);
  }
  mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Post</title>
</head>
<style>
    *{
        padding: 0%;
        margin: 0%;
    }
    .titles{
        position: absolute;
        top: 20%;
        left: 10%;
        font-size: 25px;
        height: 30px;
        width: 50%;
    }
    .content{
        position: absolute;
        top: 35%;
        left: 10%;
        font-size: 20px;
        height: 50px;
    }
    .Submit_button{
        position: absolute;
        top: 90%;
        left: 20%;
        background-color: blue;
        
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
     .main_title{
        color: "red";
        left: 30%;
        top: 20%;
        
     }
     .post{
        border: 3px solid grey;
        height: 500px;
        width: 650px;
        position: absolute;
        top: 15%;
        left: 20%;
        align-content: center;
        background-color: wheat;
        

    }


</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <strong><a class="navbar-brand" href="./index.php">BAR CP</a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <strong><a class="nav-item-2 nav-link" href="./profile.php">Profile</a></strong>

    <strong><a class="nav-item-1 nav-link" href="./logout.php">Logout</a></strong>
    </div>
  </div>
</nav>
<div class="post">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="main_title"><h2 >New Post</h2></div>

    <div class="titles">
        <input  type="text" name="title" placeholder="Title" required>
    </div>
    <br/>
    <div class="content">
        <textarea placeholder="Write post here" name="content" rows="8" cols="38" required></textarea>
    </div>
    <div class="Submit_button">
        <strong><button>POST</button></strong>
    </div>
</form>

  <br><br>
  </div>

</body>
</html>