<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Now</title>
</head>
<body>
    
<form method="POST" action="donateus.php" align="center">
    <label for="Name">Donar Name</label>
       <input type="name"  name="dname" placeholder="Enter Donar Name" required><br><br>

       <label for="email">Donar Email</label>
       <input type="email" name="demail" placeholder="Enter Donar Email" required><br><br>

       <label for="country" >Enter Your Country Name</label>
       <input type="country" name="dcountry" placeholder="Enter Yoyr Country Name" required><br><br>

        <label for="city">Enter Your City Name</label>
        <input type="city" name="dcity" placeholder="Enter Your City Name" required><br><br>

        


       
            <label for="phoneno">Donar Phone Number</label>
            <input type="phoneno" name="dphone" placeholder="Enter Donar Phone Number" required><br><br>


            Choose Paymentmethod
            <select name="method" required >
                <option value="hidden">Choose Method</option>
                <option value="debitcard">Debit Card</option>
                <option value="creditcard">Credit Card</option>
                <option value="easypaisa">Easypaisa</option>
                </select><br><br>

                
                <label for="accountnumber">Donar Account Number</label>
                <input type="number" name="daccntno" placeholder="Enter The Account Number"  ><br><br>

                <label for="deasyno">Donar Easypaisa Number</label>
                <input type="number" name="deasyno" placeholder="Enter The Easypaisa Number" ><br><br>

                <label for="amount">Enter Amount</label>
                <input type="amount" name="amount" placeholder="Enter amount" required><br><br>

                <label for="Date"> Date</label>
                <input type="date" name="date" placeholder="Please Select the Date" required><br><br>
                
                <input type="submit" value="Donate Now" name="submit">
            



<?php
session_start();
include_once 'connect.php';
if(isset($_POST['submit']))
{
   
    $dname=$_POST['dname'];
    $demail=$_POST['demail'];
    $dcountry=$_POST['dcountry'];
    $dcity=$_POST['dcity'];
    $dphone=$_POST['dphone'];
    $method=$_POST['method'];
    $daccntno=$_POST['daccntno'];
    $deasyno=$_POST['deasyno'];
    $amount=$_POST['amount'];
    $date=$_POST['date'];

 $sql="INSERT INTO donateus (dname,demail,dcountry,dcity,dphone,method,daccntno,deasyno,amount,date)
  VALUES ('$dname','$demail','$dcountry','$dcity','$dphone','$method','$daccntno','$deasyno','$amount','$date')";

  if(mysqli_query($conn,$sql))
  {
    echo "<script>alert('Thanks For Donating Us')</script>";
  }
  else
  {
    echo "Error:" .$sql ." 
".mysqli_error($conn);
  }mysqli_close($conn);
}







// if(isset($_POST['submit']))
// {	 
// 	 $first_name = $_POST['dname'];
// 	 $email = $_POST['demail'];
// 	//  $address = $_POST['address'];
// 	 $phoneno = $_POST['dphone'];
// 	//  $city = $_POST['city'];
// 	 $daccntno = $_POST['daccntno'];
// 	 $deasyno = $_POST['deasyno'];
// 	//  $cardno = $_POST['cardno'];	 
// 	//  $expdate= $_POST['expdate'];
// 	//  $cnic = $_POST['cnic'];
// 	//  $easypaisano = $_POST['easypaisano'];
// 	 $date = $_POST['date'];
	 
	 


// 	 // echo $first_name;
// 	 // echo $email;
// 	 // echo $password;
// $sql = "INSERT INTO donateus (dname,demail,dphone,daccntno,deasyno,date)
// 	 VALUES ('$first_name','$email','$phoneno','$daccntno','$deasyno','$date')" ;
	 
// 		 if (mysqli_query($conn, $sql)) {
// 		echo "New record created successfully !";
// 	 } else {
// 		echo "Error: " . $sql . "
// " . mysqli_error($conn);
// 	 }
// 	 mysqli_close($conn);
// }




?>
</form>
</body>
</html>