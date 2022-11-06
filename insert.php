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
