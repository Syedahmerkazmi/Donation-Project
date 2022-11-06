
<?php

include_once 'connect.php';
include 'securityforvote.php';

$query="SELECT 	CaseID ,CaseID FROM caseprocess  ";


$run=mysqli_query($conn,$query);
$check=mysqli_num_rows($run);
$users=mysqli_fetch_all($run);
?>

<?php

if(isset($_POST['submit']))
{
    // $uid=$_POST['uid'];
    $CaseID=$_POST['CaseID'];
    $UID=$_POST['UID'];
    $Vote=0;
    $Comments=$_POST['Comments'];
    if(isset($_POST['Vote']))$Vote=1;
  
    $query="INSERT INTO  votes(CaseID,UID,Vote,Comments)
     VALUES('$CaseID','$UID','$Vote','$Comments')";
     
    $result=mysqli_query($conn,$query);
    
    
    if($result>0)
    {
        echo "<script>alert('Thanks For Voting')</script>";
        ?>
        <meta http-equiv="Refresh" content="0 url=vote.php";>
        <?php
    }
    else{
        echo "<script>alert('Something wenr wrong')";
        ?>
        <meta http-equiv="Refresh" content="0 url=vote.php";>
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
    <title>vote Form</title>
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1>Vote Form</h1>


    <form action="vote.php" method="POST">
  <br>
   <select name="CaseID" required>
   <option selected='selected'>Select Case Id</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 



         
         <?php
         $use="SELECT UID,name FROM users";
         $hel=mysqli_query($conn,$use);
         $hey=mysqli_fetch_all($hel)

         
         ?>
  
         <select name="UID" required>
   <option selected='selected'>Select User Id</option>
           <?php foreach ($hey as $qwe) 
            {
                
            echo "<option value='$qwe[0]']>$qwe[1]</option>";
            }
             ?>  
         </select> 




       
       
     
         <br><label for="checkbox" style="margin-left:11%;">Vote</label>
         <input type="checkbox" name="Vote" style="margin-left:-19%;" ><br>
       
     
       
        <input type="text" name="Comments" placeholder="Comments" required>
       
        <input type="submit" value="Vote Now" name="submit" class="submit">
        <a  href="votelogout.php" ><button  class="submit" type="button" name="logout" style="margin-top:0px;padding:3%;" >Logout</button></a>
        
    </form>
        </div>
     
</body>
</html>
