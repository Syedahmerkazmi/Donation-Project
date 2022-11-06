
<?php
session_start();
include 'connect.php';


$use="SELECT UID,name FROM users";
$hel=mysqli_query($conn,$use);
$hey=mysqli_fetch_all($hel)


?>
<?php
$query="SELECT 	CaseID ,CaseID FROM caseprocess  ";


$run=mysqli_query($conn,$query);
$check=mysqli_num_rows($run);
$users=mysqli_fetch_all($run);
?>
<?php
if(isset($_GET['CaseID']))
{
    $CaseID=$_GET['CaseID'];
    $query="SELECT * FROM votes WHERE CaseID ='$CaseID'";
    $query_update=mysqli_query($conn,$query);
    $total=mysqli_num_rows($query_update);
   $update_query=mysqli_fetch_array($query_update);
}


if(isset($_POST['submit']))
{
    
    $CaseID=$_POST['CaseID'];
    $UID=$_POST['UID'];
    $Vote=0;
    $Comments=$_POST['Comments'];
    if(isset($_POST['Vote']))$Vote=1;
    
    $update_case="UPDATE votes SET CaseID='$CaseID',UID='$UID',Vote='$Vote',Comments='$Comments' WHERE UID='$UID'";
    $query_run=mysqli_query($conn,$update_case);

    if($query_run)
    {
        echo '<script>alert("Data updated")</script>';
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php
    }
    else
    {
        echo '<script>alert("Data  Not updated")</script>';
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
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
    <title>Update vote Form</title>
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1> Update Vote Form</h1>


    <form action="updatevote.php" method="POST">
  <br>
   CaseId:<input type="text"name="CaseID" value="<?php echo @ $update_query['CaseID']?>" readonly>
   <select name="CaseID" required>
   <option selected='selected'>Select Case Id</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 



         
  <br> UID:<input type="text" name="UID" value="<?php echo @ $update_query['UID']?> "readonly/>
         <select name="UID" required>
   <option selected='selected'>Select User Id</option>
           <?php foreach ($hey as $qwe) 
            {
                
            echo "<option value='$qwe[0]']>$qwe[1]</option>";
            }
             ?>  
         </select> 




       
       
     
         <br><label for="checkbox">Vote</label>
         <input type="checkbox" name="Vote" 
         
         <?php
     if($update_query['Vote']='1')
     {
        echo "checked";
     }?>
     />
       
     
       
      <br> Update: <input type="text" name="Comments" placeholder="Comments" value="<?php echo @ $update_query['Comments']?>" required>
       
        <input type="submit" value="Update Now" name="submit" class="submit" onclick ='return update()'>
        
    </form>
        </div>
     
</body>
</html>

<script>
    function update()
    {
        return confirm('Are you sure you want to update this record');
    }
    </script>
