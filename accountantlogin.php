<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accountant Login Form</title>
</head>
<body>
    
    <form method="POST" action="accountantlogin.php" align="center">
    <label for="name">Accountant Name</label>
    <input type="name" name="name" placeholder="Enter Accountant Name" required><br><br>

    <label for="Password">Password</label>
    <input type="password" name="password"><br><br>
<input type="submit" name="submit" value="submit">

</form>


<?php
session_start();
include_once 'connect.php';
if(isset($_POST['submit']))
{
    
    $name=$_POST['name'];
    $password=$_POST['password'];
    
   
    $query="SELECT *FROM logindetails where   name='$name' AND type='accountant' AND password='$password'";
    $hell=mysqli_query($conn,$query);
    if(mysqli_num_rows($hell)>0)
    {
        $_SESSION['name']=$name;
        echo "<script>window.open('accountantdash.php')</script>";
    }
    else{
        echo "<script>alert('Invalid Accountant')</script>";
    }

}

?>
</body>
</html>