<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']== "POST"){
    $UserName=$_POST['UserName'];
    $Email=$_POST['Email'];
    $Password= $_POST['Password'];
    $Confirm_Password = $_POST['Confirm_Password'];


    $username_to_articles = "INSERT INTO articles(author_username) VALUES('$UserName')";


    mysqli_query($con, $username_to_articles);


    if(($Confirm_Password) == ($Password)){
        //save to database
        // $id = random_num(20);
        $query = "INSERT INTO users (user_name,email,password) VALUES('$UserName','$Email','$Password')";

        mysqli_query($con,$query);
        
        header("Location: login.php");
        die;
         
            
        }else{
        echo "Passwords do not Match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<style>
    *{
        padding: 5px;
        margin: 3px;
        box-sizing: border-box;

    }
    .error {color: #FF0000;}
    .container{
        border: 1px solid black;
        position: absolute;
        top: 10%;
        left: 40%;
        align-content: center;
        background-color: wheat;

    }
    .Title{
        position: absolute;  
         left: 12%; 
         font-size: 20px;
         margin: 10px;
    }
    .inputs{
        position: relative;
        top: 10%;
        left: 8%;
    }
    .Submit_button{
      position: absolute;
      left: 35%;
      top: 78%;
      
    }
</style>


<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   action="./Dashboard.php" method="POST">
            <div class="Title">Register To The Bar</div>
            <br/>
            <br>
            <br>
            <div class="inputs">
                <input type="text" name="UserName" placeholder="Enter Username" required>
                
            </div>
            <br/>    
            <div class="inputs">
                <input type="email" name="Email" placeholder="Enter your Email" required>
            </div>
            <br/>    
            <div class="inputs">
                <input type="password" name="Password" placeholder="Enter your password" required>
            </div>
            <br/>    
            <div class="inputs">
                <input type="password" name="Confirm_Password" placeholder="Confirm your password" required>
            </div>
           

            <br>
            <br>
            <div class="Submit_button">
                <button>Sign Up</button>
            </div>  
            <br> 
            <div class="login">
            <a href="./login.php">Already have an account?Login</a>
  </div>


        </form>

    </div>
    
</body>
</html>