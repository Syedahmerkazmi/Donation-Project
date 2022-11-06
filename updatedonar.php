<?php
session_start();
include_once 'connect.php';

$query="SELECT UID,Name FROM users";
$run=mysqli_query($conn,$query);
$check=mysqli_num_rows($run);
$users=mysqli_fetch_all($run);
?>

<?php


if(isset($_GET['tid']))
{
 
    $tid=$_GET['tid'];
   $query="SELECT * FROM transactions WHERE tid='$tid'";
   $query_update=mysqli_query($conn,$query);
   $total=mysqli_num_rows($query_update);
  $update_query=mysqli_fetch_array($query_update);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="donar.css">
    <title> Update Donar Form</title>
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1>Update Donar Form</h1>


    <form action="updatedonar.php" method="POST">
  <br>
  Tid:<input type="text" name="tid" value="<?php echo  @ $update_query['tid']?>" readonly>
  <br>Userid:<input type="text" name="uid" value="<?php echo @ $update_query['uid']?>" readonly>

   <br>UserName:<select name="uid">
   <option selected='selected'>Select User Name</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 



         
         
    <br>Date:<input type="date" name="date" value="<?php echo @ $update_query['date']?>">
<br>
    Amount:<input type="number" name="amount" placeholder="Enter the amount In Number" value="<?php echo @ $update_query['amount']?>" required></input>
    
    <br>Type:<select name="type"><br>
    <option value="hidden">Enter user Type</option>
        <option value="donar" 
        <?php if($update_query['type']=='donar')
        {
            echo "selected";
        }
        
        
        ?>
        >Donar</option>
        <option value="volunteer"
        <?php
        if($update_query['type']=='volunteer')
        {
            echo "selected";
        }
        ?>
        >volunteer</option>    
</select>

        <br>Des:<input type="text" name="description" placeholder="Description"   value="<?php echo  @ $update_query['description']?>" required>
       
        <br>Method:<select name="paymentmethod">
        <option value="hidden">Choose Payment Method</option>
        <option value="Credit Card"
        <?php
        if($update_query['paymentmethod']=='Credit Card')
        {
            echo "selected";
        }
        ?>
        
        >Credit Card</option>
        <option value="Debit Card"
        <?php
        if($update_query['paymentmethod']=='Debit Card')
        {
            echo "selected";
        }
        ?>
        >Debit Card</option>
        <option value="Easypaisa"
        <?php
        if($update_query['paymentmethod']=='Easypaisa')
        {
            echo "selected";
        }
        ?>
        
        >Easypaisa</option></select>
    <input type="submit" value="Update Now" name="submit" class="submit" onclick=" return update()">
    </form>
        </div>

        <script>
            function update()
            {
                return confirm("Are you sure you want to update this record");
            }
    </script>



<?php
include 'connect.php';



if(isset($_POST['submit']))
{   $tid=$_POST['tid'];
    $uid=$_POST['uid'];
    //$aid=$_POST['aid'];
    $date=$_POST['date'];
    $amount=$_POST['amount'];
    $type=$_POST['type'];
    $description=$_POST['description'];
    $paymentmethod=$_POST['paymentmethod'];
  
       
    
    $query="UPDATE transactions SET uid='$uid',date='$date',amount='$amount',type='$type',description='$description',paymentmethod='$paymentmethod' WHERE tid='$tid'";
          $result =  $GLOBALS['conn']->query($query);
          
    if($result>0)
    {
        
        echo "<script>alert('Donation Form Updated ')</script>";
          ?>
            <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
            <?php
            
    }
    else{
        echo "<script>alert('something wrong ')</script>";
          ?>
            <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
            <?php
    }

}
?>