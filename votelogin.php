<?php
session_start();

include_once 'connect.php';
if(isset($_POST['submit']))
{
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT *FROM user_login where username='$username'   AND password='$password'";
    $run=mysqli_query($conn,$query);
    $user_type=mysqli_fetch_array($run);
    if(mysqli_num_rows($run)>0)
    {
        
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
       
      
        // print_r($_SESSION);
        // die();
        
        
        
         ?>
            <meta http-equiv="refresh" content="0; url=vote.php";/>
            <?php
                                                                                                       //<script>window.open('admindashtest.php')</script>
        }
        else {
            echo "<script>alert('Invalid Username Or Password ')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=votelogin.php";/>
            <?php
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="testhome1.css"> -->
    <link rel="stylesheet" href="donar.css">
    <title> Vote Login Form</title>
   
</head>


</div>

  <div class="animation start-home">
  
  
  </div>
  
</nav> 
<body>


    
<div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1  style="text-align :center;"> You have to Login First to become a voter  </h1>

    <form action="votelogin.php" method="POST" ailign="center">
        

        <input type="text"  name="username" placeholder="Enter a Admin Name " required><br>
        <input type="password" name="password" id="password"  placeholder="Enter a Admin Password" required>
      <br>  Show Password:<input type="checkbox" id="checkpass" onclick='checkpassword()' style="width:auto;" ><br>
       
       

    <input type="submit" name="submit" value="Login" class="submit">

   

    
    </form>
     </div>

     <script>

        function checkpassword()
        {
            var a=document.getElementById('password');
            if(a.type=="password")
            {
                
                 a.type="text";
            }
            else
            a.type="password";

        }
        </script>
</body>

</html>