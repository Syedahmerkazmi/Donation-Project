<?php 

include_once 'connect.php';

if(isset($_POST['submit']))
{	 
	 $first_name = $_POST['name'];
	 $email = $_POST['email'];
	 $address = $_POST['address'];
	 $phoneno = $_POST['phoneno'];
	 $city = $_POST['city'];
	 $country = $_POST['country'];
	 $postalcode = $_POST['postalcode'];
	 $cardno = $_POST['cardno'];	 
	 $expdate= $_POST['expdate'];
	 $cnic = $_POST['cnic'];
	 $easypaisano = $_POST['easypaisano'];
	 $amount = $_POST['amount'];
	 
	 


	 // echo $first_name;
	 // echo $email;
	 // echo $password;
$sql = "INSERT INTO donationform (name,email,address,phoneno,city,country,postalcode,cardno,expdate,cnic,easypaisano,amount)
	 VALUES ('$first_name','$email','$address','$phoneno','$city','$country','$postalcode','$cardno','$expdate','$cnic','$easypaisano', '$amount')" ;
	 // $sql = "INSERT INTO sign_up (name,email,password)
	 // VALUES ('$first_name','$email','$password')";
		 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}



 ?>