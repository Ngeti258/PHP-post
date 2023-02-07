<?php
include_once 'connection.php';
if(count($_POST)>0) {
    $sql = "UPDATE articles set title='" . $_POST['title'] . "', content='" . $_POST['content'] . "' WHERE post_id='" . $_GET['id'] . "'";
mysqli_query($con,$sql);
header("Location: index.php");

}
$result = mysqli_query($con,"SELECT * FROM articles WHERE post_id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Post Data</title>
</head>
<style>
    *{
        padding: 0%;
        margin: 0%;
    }
    .update_form{
        border: 2px solid grey;
        position: absolute;
        top: 15%;
        left: 40%;
        align-content: center;
        background-color: wheat;
    }
    .title{
      position: absolute;  
      left: 30%;
      font-size: 20px;
      margin: 10px; 
    }
    .content{
        height: 100px;
        width: 500px;
    }
</style>
<body>
<form name="frmUser" method="POST" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
</div>

<div class="update_form">
title: <input type="text" name="title" class="txtField" required value="<?php echo $row['title'];  ?>">

<br>
content :<input type="text" name="content" class="content" required value="<?php echo $row['content']; ?>">

<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">
</div>
</form>
</body>
</html>