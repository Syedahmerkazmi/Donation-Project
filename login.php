<?php
session_start();

include_once 'connect.php';
if(isset($_POST['submit']))
{
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $query="SELECT *FROM user_login where username='$username'   AND password='$password' AND role='$role'";
    $run=mysqli_query($conn,$query);
    $user_type=mysqli_fetch_array($run);
    if(mysqli_num_rows($run)>0)
    {
        
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['role']="$role";
      
        // print_r($_SESSION);
        // die();
        if($_SESSION['role'] == '1')
        {
            $query="SELECT *FROM user_login where username='$username'   AND password='$password' AND role='1'";
            $run=mysqli_query($conn,$query);
            $user_type=mysqli_fetch_array($run);
            if(mysqli_num_rows($run)>0)
        {

         ?>
            <meta http-equiv="refresh" content="0; url=caseform.php";/>
            <?php
                                                                                                       //<script>window.open('admindashtest.php')</script>
        }
        else {
            echo "<script>alert('Invalid Admin ')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=login.php";/>
            <?php
        }


    }
        

        else if($_SESSION['role'] == '0')
        {
            $query="SELECT *FROM user_login where username='$username'   AND password='$password' AND role='0'";
            $run=mysqli_query($conn,$query);
            $user_type=mysqli_fetch_array($run);
            if(mysqli_num_rows($run)>0)
        
            {

                ?>
                   <meta http-equiv="refresh" content="0; url=caseform.php";/>
                   <?php
                                                                                                              //<script>window.open('admindashtest.php')</script>
               }
               else {
                   echo "<script>alert('Invalid User ')</script>";
                   ?>
                   <meta http-equiv="refresh" content="0; url=login.php";/>
                   <?php
               }
        }

        
        else if($_SESSION['role'] == '2')
        {
            $query="SELECT *FROM user_login where username='$username'   AND password='$password' AND role='2'";
            $run=mysqli_query($conn,$query);
            $user_type=mysqli_fetch_array($run);
            if(mysqli_num_rows($run)>0)
        
            {

                ?>
                   <meta http-equiv="refresh" content="0; url=caseform.php";/>
                   <?php
                                                                                                              //<script>window.open('admindashtest.php')</script>
               }
               else {
                   echo "<script>alert('Invalid Accoutant ')</script>";
                   ?>
                   <meta http-equiv="refresh" content="0; url=login.php";/>
                   <?php
               }
        }
        
        
        else
        {
        echo "<script>alert('You dont have permission to Initiate a case')</script>";
        ?>
        <meta http-equiv="refresh" content="0 login.php">
        <?php
        }
    }
    else
    {
    echo "<script>alert('Invalid Username or password')</script>";
    ?>
        <meta http-equiv="refresh" content="0 login.php">
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
    <title> login form</title>
   
</head>
<!-- 
<nav>
  <a href="testhome.html">Home</a>
  <a href="services.html">Service</a>
  <a href="volunteer.php">Sign-Up</a>
  <a href="adminlogin.php">Login</a>
  <a href="about.html">About Us</a>
  <a href="Contact.html">Contact Us</a>
 <div class="hell" name="type">
  <a  class="r"href="#">Register as </a>
  <a class="he" href="volunteer.php">Volunteer</a>
  <a class="he" href="donar.php">Donar</a>
  <a class="he" href="#">Contact Us</a></div> -->

</div>

  <div class="animation start-home">
  
  
  </div>
  
</nav> 
<body>


    
<div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1  style="text-align :center;">  You Have To Login First To Initiate A Case </h1>

    <form action="login.php" method="POST" ailign="center">
        

        <input type="text"  name="username" placeholder="Enter a Admin Name " required><br>
        <input type="password" name="password" id="password"  placeholder="Enter a Admin Password" required>
      <br>  Show Password:<input type="checkbox" id="checkpass" onclick='checkpassword()' style="width:auto;" ><br>
        <select name='role'>
        <option value="hidden" >Login
        <option value="0" name="User" >User</option>
        <option value="1" name="Admin" >Admin</option>
        <option value="2" name="Accountant" >Accountant</option>
        </select>

       

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