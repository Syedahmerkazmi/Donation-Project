<?php
// session_start();
include_once 'connect.php';
include 'securityfordonar.php';
$query="SELECT UID,Name FROM users";
$run=mysqli_query($conn,$query);
$check=mysqli_num_rows($run);
$users=mysqli_fetch_all($run);
?>
<?php


    $role=$_SESSION['role'];
    $query="SELECT UID FROM user_login WHERE role ='$role'";
    $query_update=mysqli_query($conn,$query);
    $total=mysqli_num_rows($query_update);
   $update_query=mysqli_fetch_array($query_update);
   $_SESSION["username"]=$username;
   $_SESSION["password"]=$password;
  



?>

<?php
    $query="SELECT *FROM user_login where username='$username'   AND password='$password' ";
    $run=mysqli_query($conn,$query);
    $user_type=mysqli_num_rows($run);
   
        
        // $_SESSION['role']=$role;
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
    
    
    

?>
<?php

if(isset($_POST['submit']))
{
    $uid=$_POST['uid'];
    $aid=$_POST['aid'];
    $date=$_POST['date'];
    $amount=$_POST['amount'];
    $type=$_POST['type'];
    $description=$_POST['description'];
    $paymentmethod=$_POST['paymentmethod'];
 
        
    $query="INSERT INTO  transactions(uid,aid,date,amount,type,description,paymentmethod)
     VALUES('$uid','$aid','$date','$amount','$type','$description','$paymentmethod')";
     
    $result=mysqli_query($conn,$query);
    
    
    if($result>0)
    {
        echo "<script>alert('Thanks For Donating')</script>";
        ?>
        <meta http-equiv="Refresh" content="0;url=donar.php";/>
        <?php
    }
    else{
        echo "<script>alert('Something wenr wrong')";
        ?>
        <meta http-equiv="Refresh" content="0;url=donar.php";/>
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
    <link rel="stylesheet" href="donar.css">
    <title>Donar Form</title>
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1>Welcome To Donar Form</h1>

    

    <form action="donar.php" method="POST">
    UID:<input type="text" name="aid" value="<?php echo @ $update_query['UID']?>" readonly>
  <br>
   <select name="uid">
   <option selected='selected'>Select User Name</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 



         
         
    <input type="date" name="date">
<br>
    <input type="number" name="amount" placeholder="Enter the amount In Number" required></input>
    
    <br><select name="type"><br>
    <option value="hidden">Enter user Type</option>
        <option value="donar" >Donar</option>
        <option value="volunteer">volunteer</option>    
</select>

        <input type="text" name="description" placeholder="Description" required>
       
        <select name="paymentmethod">
        <option value="hidden">Choose Payment Method</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
        <option value="Easypaisa">Easypaisa</option></select>

       
       

    <input type="submit" value="Donate Now" name="submit" class="submit">
    <a  href="logoutfordonar.php" ><button  class="submit" type="button" name="logout" style="margin-top:0px;padding:3%;" >Logout</button></a>
    </form>
        </div>
      
</body>
</html>
