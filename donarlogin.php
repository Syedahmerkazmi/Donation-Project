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
       
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        $_SESSION["role"]=$role;
        
        if($_SESSION['role'] == '1')
        {
            $query="SELECT *FROM user_login where username='$username'   AND password='$password' AND role='1'";
            $run=mysqli_query($conn,$query);
            $user_type=mysqli_fetch_array($run);
            if(mysqli_num_rows($run)>0)
        {

         ?>
            <meta http-equiv="refresh" content="0; url=donar.php";/>
            <?php
           
        }
        else {
            echo "<script>alert('Invalid Admin Name or username ')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=donarlogin.php";/>
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
                   <meta http-equiv="refresh" content="0; url=donar.php";/>
                   <?php
                  
               }
               else {
                   echo "<script>alert('Invalid Accoutant Name or password ')</script>";
                   ?>
                   <meta http-equiv="refresh" content="0; url=donarlogin.php";/>
                   <?php
               }
        }
        
        
        else
        {
        echo "<script>alert('Only Admin And Accountant has permission to access this page')</script>";
        ?>
        <meta http-equiv="refresh" content="0 donarlogin.php">
        <?php
        }
    }
    else
    {
    echo "<script>alert('Invalid Username or password')</script>";
    ?>
        <meta http-equiv="refresh" content="0 donarlogin.php">
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
    <title>Donar login</title>
   
</head>
</div>

  <div class="animation start-home">
  
  
  </div>
  
</nav> 
<body>


    
<div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
<h1  style="text-align :center;">Only Admin And Accountant has Access to the Aonar Form </h1>
    <form action="donarlogin.php" method="POST" ailign="center">
        
    
        <input type="text"  name="username" placeholder="Enter a Admin Name " required><br>
        <input type="password" name="password" id="password"  placeholder="Enter a Admin Password" required>
      <br>  Show Password:<input type="checkbox" id="checkpass" onclick='checkpassword()' style="width:auto;" ><br>
        <select name='role'>
        <option value="hidden" >Login
        <option value="1" name="Admin" >Admin</option>
        <option value="2" name="Accountant" >Accountant</option>
        </select>

       

    <input type="submit" name="submit" value="submit" class="submit">

    
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