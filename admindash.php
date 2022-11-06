

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Dashboard</title>
</head>

<style>
table, th, td {
  border: 1px solid black;
 
}
</style>
<body>
    <h1 style="text-align:center;">Welcome To Admin Dashboard</h1>


  <a href="volunteer.php"><button for="Add User" name="submit" >Add User</button></a>
  <a href="logoutnew.php"><button for="logout" name="logout" >Logout</button></a>
  
 <h1 style='text-align:center;'>User Details</h1>
 <table>
 <thead> 

    <tr> 
<th>UserId</th>
<th>UserName</th>
<th>UserCnic</th>
<!-- <th>Email</th>
<th>Password</th>  -->
<th>Village</th>
<th>Type</th>
<th>Appt</th>
<th>Refby</th>
<th>Date Of Registration</th>
<th>AllowLogin</th>
   
<!-- <th>Refered By</th> -->

<th>Update</th>
<th>Delete</th> 
</tr>
</thead> 


</body>
</html>  



<?php
session_start();
include_once 'connect.php';
include_once 'delete.php';



// if(isset($_POST['delete']))
// {
    
//     $Delete=mysqli_query($conn,"DELETE FROM users WHERE uid='uid'");
//     // $query="SELECT *FROM users where name='$name' AND password='$password'";
//     $run=mysqli_query($conn,$Delete);
//     if(mysqli_num_rows($run)>0)
//     {
        
        
//         echo "<script>window.open('testhome.html')</script>";
//     }
// }

 $query="SELECT * FROM users ";
 $result=mysqli_query($conn,$query);
 $nums=mysqli_num_rows($result);
 while($condition=mysqli_fetch_array($result))
 {
    // echo"<table><td>". $condition['uid'] ."</td><td>" .$condition['name'] ." </td><td>".$condition['email'] ."</td><td>".$condition['password'] ."</td><td>".$condition['type']   
    // ."</td><td>".$condition['designation'] ."</td><td>".$condition['education'] ."</td> <td>".$condition['address']."</td><td>".$condition['status']."</td><td>".$condition['cnic'] ."</td><td>".$condition['suggestion'] ."</table>";

    echo "
<tr>
    
 <td>".$condition['UID'] ."</td>
<td>".$condition['Name'] ."</td>
<td>".$condition['CNIC'] ."</td>
<td>".$condition['Village'] ."</td>
<td>".$condition['Type'] ."</td>
<td>".$condition['Appt'] ."</td>
<td>".$condition['Refby'] ."</td>
<td>".$condition['DOR'] ."</td>
 <td>".$condition['AllowLogin'] ."</td>
    
 

    
";
    
 


?>
<form method='GET' action='update.php'>
    <td><button type='submit' name='edit_btn' value='<?php echo $condition['UID']?>'>UPDATE</button></td></form>  
   <form method='GET' action='delete.php'>
    
   <td><button type='submit' name='delete_btn' value='<?php echo $condition['UID']?>'>Delete</button></td> </tr>
 
   
<?php }?>
</table>


<!-- Deleteed query (unsuccessful not working ) -->
<!-- <input type="hidden" name="uid" value="<?php echo $condition['uid']?> -->
    <!-- <input type='submit' value='delete' name='delete'></input> -->
<?php


// if(isset($_POST['delete']))
// {
//     $uid=$_POST['uid'];
//     $query="DELETE FROM users WHERE uid='$uid'";
//     $run=mysqli_query($conn,$query); 
//     if($run)
//     {
//         echo '<script>alert("Data Deleted");</script>';
//         header("location:admindash.php");
//     }

//     else
//     echo '<script>alert("Data   NOT Deleted");</script>';
// }



?> 

  <!-- <h1 style="text-align:center;">Donation Details</h1>
<table> 

<tr>
    <th>Donar ID</th>
    <th>Donar Name</th>
    <th>Donar Email</th>
    <th>Donar Country</th>
    <th>Donar City</th>
    <th>Donar Phone</th>
    <th>Payment Method</th>
    <th>Donar account Number</th>
    <th>Donar Easypaisa Number</th>
    <th>Amount</th>
    <th>Date</th>
    <th>Update</th>
    <th>Delete</th>
    <tr> -->
<?php
//  $query="SELECT *FROM donateus";
//  $check=mysqli_query($conn,$query);
//  $result=mysqli_num_rows($check);
//  while($hello=mysqli_fetch_array($check))
 {
    //  echo"<tr>
    //  <td>".$hello['did']."</td>
    //  <td>".$hello['dname']."</td>
    //  <td>".$hello['demail']."</td>
    //  <td>".$hello['dcountry']."</td>
    //  <td>".$hello['dcity']."</td>
    //  <td>".$hello['dphone']."</td>
    //  <td>".$hello['method']."</td>
    //  <td>".$hello['daccntno']."</td>
    // <td>".$hello['deasyno']."</td>
    //  <td>".$hello['amount']."</td>
    //  <td><a  href='admindash.php'class='btn'>Update</a></td>
    //  <td><a href='admindash.php' class='btn'>Delete</a></td>
    
    
    // </tr>";
  } 



?>
</table> 
   
    <table>
     <thead>
        <tr>
        <h1 style="text-align:center;">Transation Details</h1>
        <th>Transactionid</th>
        <th>UserId</th>
        <th>Approval ID</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Description</th>
        <th>Paymentmethod</th>
        <th>Update</th>
        <th>Delete</th>
</tr>
</thead>

<?php

 $query="SELECT * FROM transactions";
 $result=mysqli_query($conn,$query);
 $hello=mysqli_num_rows($result);
 while($check=mysqli_fetch_array($result))
 {
     echo "
     <tr>
    <td>".$check['tid']."</td>
     <td>".$check['uid']."</td>
     <td>".$check['aid']."</td>
     <td>".$check['date']."</td>
     <td>".$check['amount']."</td> 
     <td>".$check['type']."</td>
     <td>".$check['description']."</td> 
     <td>".$check['paymentmethod']."</td> 
    
    
     <td><a href='admindash.php'class='btn'>Update</a></td>

    <td><a href='admindash.php'id='get'>Delete</a></td></tr>";
 } 



?>
</table> 


 <table>
    <tr> 
    <h1 style="text-align:center;">CaseProcess Details</h1>
        <th>Case Id</th>
        <th>CaseDesc</th>
        <th>Initiated By</th>
        <th>Beneficary</th>
        <th>Amount Suggested</th>
        <th>Amount Approved</th>
        <th>Approval</th>
        <th>Update</th>
        <th>Delete</th>

</tr>


<?php 


 $query="SELECT * FROM caseprocess";
 $result=mysqli_query($conn,$query);
 $chek=mysqli_num_rows($result);
 while($hello=mysqli_fetch_array($result))
 {
     echo "
     <tr>
     <td>".$hello['CaseID']."</td>
     <td>".$hello['CaseDesc']."</td>
     <td>".$hello['initiatedby']."</td>
     <td>".$hello['beneficary']."</td>
     <td>".$hello['AmountSuggested']."</td>
    <td>".$hello['AmountApproved']."</td>
     <td>".$hello['Approval']."</td>
    
     <td><a href='admindash.php'class='btn'>Update</a></td>

     <td><a href='admindash.php'class='btn'>Delete</a></td></tr>";
    
    
   
}


?>
</table>

<table>
    <tr>
        <h1 style="text-align:center;">Login Details</h1>
        
        <th>User Id</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Role</th>
        <th>Enabled</th>

        <th>Update</th>
        <th>Delete</th>
</tr>

<?php 

 $process="SELECT *FROM user_login";
 $result=mysqli_query($conn,$process);
 $why=mysqli_num_rows($result);
 while($if=mysqli_fetch_array($result))
{
    echo"
    <tr>
    
    <td>".$if['UID']."</td>
    <td>".$if['username']."</td>
    <td>".$if['password']."</td>
    <td>".$if['role']."</td>
    <td>".$if['enabled']."</td>
    
   <td><a href='admindash.php'class='btn'>Update</a></td>

    <td><a href='admindash.php'class='btn'>Delete</a></td></tr>";

    
    
    
}

?> 

 <table>
    <h1 style='text-align:center;'>Contact Details<h1>
    <tr>
        <th>Contact Id</th>
        <th>User Id</th>
        <th>Type Of Contact</th>
        <th>Value</th>
        <th>Update</th>
        <th>Delete</th>
</tr>

        
<?php


$query="SELECT * FROM contact ";
$result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);
while($check=mysqli_fetch_array($result))
{
    echo "<tr>
    <td>".$check['cid']."</td>
    <td>".$check['uid']."</td>
    <td>".$check['I_flag']."</td>
    <td>".$check['value']."</td>

    <td><a href='#' class='btn'>Update</a></td>
    <td><a href='#' class='btn'>Delete</a></td>

    
    </tr>";
} 





 ?>

</table>


 <table>
    <h1 style='text-align:center;'>Vote Details</h1>
    <tr>
    <th>Case ID</th>
    <th>User ID</th>
    <th>Vote</th>
    <th>Comments</th>
    <th>Update</th>
    <th>Delete</th>


    </tr>
<?php
$query="SELECT * FROM votes";
$result=mysqli_query($conn,$query);
$chek=mysqli_num_rows($result);
while($check=mysqli_fetch_array($result))
{
    echo "<tr>
    
    <td>".$check['CaseID']."</td>
    <td>".$check['UID']."</td>
    <td>".$check['Vote']."</td>
    <td>".$check['Comments']."</td>
    <td><a href='admindash.php' class='btn'>Update</a></td>
    <td><a href='admindash.php' class='btn'>Delete</a></td>
    
    
    </tr>";
}



?> 


