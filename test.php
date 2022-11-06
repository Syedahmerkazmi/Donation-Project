<?php 

include_once 'connect.php';

if(isset($_POST['submit']))
{	 
	 $first_name = $_POST['name'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];	 
	 // echo $first_name;
	 // echo $email;
	 // echo $password;
// $sql = "INSERT INTO sign_up (name,email,password)
// 	 VALUES ('$first_name','$email','$password')" ;
	 $checkuser="SELECT * from signup where email='$email'";
	 $result = mysqli_query($conn,$checkuser);
	 $count=mysqli_num_rows($result);
	 // echo $count;
	 if($count>0)
	 {	
echo '<script>alert("User Already Exists")</script>';
	 }
	 else
	 {
	 $sql = "INSERT INTO signup (name,email,password)
	 VALUES ('$first_name','$email','$password')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title >Sign Up</title>
	<link rel="stylesheet"  href=" style.css">

</head>
<body>


<div class="main">
    <div class="navbar">
        <div class="icon">
        </div>

   <div class="menu">
   <ul>
      <li><a href="index.html"> HOME</a></li>
       <li><a href="http://localhost/Test/Contact.html"> ABOUT</a></li>
        <li><a href="#"> SERVICE</a></li>
         <li><a href="#"> DESIGN</a></li>
          <li><a href="Contact.html"> CONTACT</a></li>
   </ul>
</div>

<div class="signup-box">
	<h1>Sign Up</h1>
	<form action="#" method="POST">
		<center>
		<label>Name</label>
		<input type="text" value="" name="name" >
		<label>E-mail</label>
		<input type="text" value="" name="email" >
		<label>Password</label>
		<input type="password" value="" name="password">
<!-- 		<label>Confirm Password</label>
        <input type="Password" placeholder=""> -->
        <input style="text-align: center; color: black; background-color: green; width: 60px;margin-top: 20px;"type="submit" value="submit" name="submit"> 
     
        </center>
<p>By Clicking The Sign Up button, you agree to our
		<a href="#">Terms and condition</a> and <a href="#">Policy Privacy</a>
	</p>
	<p class="para-2"> Already have an account? <a href="Login.html"><br>Login here</a></p>
	</form>
	
</div>

</body>
</html>