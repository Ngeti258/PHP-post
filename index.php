<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

function greetings()
{
    $time = date('H');

    if ($time > 00 and $time <10) {
        echo "Good Morning";
    } else if ($time >= 10 and $time < 16) {
        echo 'Good Afternoon';
    } else {
        echo 'Good evening';
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<style>

    *{
        padding:0%;
        margin: 0%;
    }
    .nav-item-1{
        position: absolute;
        left: 90%;
        top: 10%;
    }
    .nav-item-2{
        position: absolute;
        left: 80%;
        top: 10%;

    }
    .nav-item-3{
        position: absolute;
        left: 70%;
        top: 10%;

    }
    .posts{
        font-size: 30px;
        top: 10%;
        
    }
    table {
  position: absolute;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
  left: 20;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.button{
    background-color: blue;
}
</style>


<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<strong><a class="navbar-brand" href="./index.php">BLOG CP</a></strong>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <strong><a class="nav-item-3 nav-link" href="./post.php">New Post</a></strong>


    <strong><a class="nav-item-2 nav-link" href="./profile.php">Profile</a></strong>

    <strong><a class="nav-item-1 nav-link" href="./logout.php">Logout</a></strong>
    </div>
  </div>
</nav>
    <strong><div class="posts">
        
    <?php
    greetings();
    echo ", ";  
    echo ($_SESSION['active']['user_name']);
    echo '<br>';
    echo '....................................................';
    ?>
    </div>
    </strong>

    <div class="blog_posts">
    <?php


    //reading from the database and joining with the users table
    $sql = "SELECT  * FROM `articles`  INNER JOIN `users` ON `users`.`id`=`articles`.`author_id` ORDER BY `articles`.`updated_at` DESC LIMIT 5 ";



    
    $results = mysqli_query($con, $sql);

    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $break = '<br>';
            $title = $row["title"];
            $by = " by ";
            $username = $row['user_name'];            
            $content = $row["content"];
            
            $separation = '.............';
            echo $break;
            echo $title;
            echo $by;
            echo $username;
            echo '<br>';
            echo $content;
            echo '<br>';
            echo $separation;

        }
      }
    
    ?>
        <table>
  <tr>
    <th>Title</th>
    <th>Content</th>
    <th>Author</th>
    
  </tr>
  
    <?php
    $sql_2 = "SELECT  * FROM `articles` INNER JOIN `users` ON `users`.`id`=`articles`.`author_id` ORDER BY `articles`.`updated_at` DESC";
    $product = mysqli_query($con, $sql_2);
    
    if(mysqli_num_rows($product)>0){
        while($data = mysqli_fetch_assoc($product)){            
            ?>
            <tr>
                <td><?php echo $data['title'] ?></td>
                <td><?php echo $data['content'] ?></td>
                <td><?php echo $data['user_name'] ?></td>
                <?php
                if($_SESSION['active']['id'] == $data['id']){
                  ?>
                <td><a href="update_process.php?id=<?php echo $data["post_id"]; ?>">Update</a></td>
                <td><a href="delete_process.php?id=<?php echo $data['post_id']; ?>">Delete</a></td>

                <?php
                }
                ?>
                
            </tr>
            <?php
        }
    }
    ?>   
  </tr> 
</table>
    </div>    
    </body>
</html>
