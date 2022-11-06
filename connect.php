
<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "donation"

$servername='localhost';
$username='root';
$password='';
$dbname = "donation";
// $conn=mysqli_connect($servername,$username,$password,$dbname);
$conn= new mysqli($servername,$username,$password,$dbname);
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
else
{
   $GLOBALS['conn']=$conn;
}

// else {
//   echo "Connection Establish Successfully";
//      }


// try {
//   $conn = new PDO("mysql:host=$servername;dbname=donation", $username, $password);
//   if(isset($_POST['submit']))
//   {

//   if(!empty($_POST['name'])  &&!empty($_POST['email']) &&!empty($_POST['password']))
//   {
//   $name=$_POST['name'];
//    $email=$_POST['email'];
//     $password=$_POST['password'];
//     $query="INSERT INTO sign_up(name,email, password) VALUES ('$name','$email','$password')";
//     $run=mysqli_query($conn,$query) or die(mysqli_error());
//     if($run)
//     {
//       echo "Form Submitted";
//     }
//     else
//     {

//       echo "Form  not Submitted";
//     }
//   }
//   else
//   {
//     echo "all fields required";
//   }
//   }
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

?>