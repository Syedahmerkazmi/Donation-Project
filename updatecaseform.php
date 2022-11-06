<?php
session_start();
include_once 'connect.php';

$query="SELECT UID,Name FROM users";
$run=mysqli_query($conn,$query);
$check=mysqli_num_rows($run);
$users=mysqli_fetch_all($run);
?>


<?php

if(isset($_GET['CaseID']))
{
 
    $CaseID =$_GET['CaseID'];
   $query="SELECT * FROM caseprocess WHERE CaseID ='$CaseID'";
   $query_update=mysqli_query($conn,$query);
   $total=mysqli_num_rows($query_update);
  $update_query=mysqli_fetch_array($query_update);
}


if(isset($_POST['submit']))
{
    $CaseID=$_POST['CaseID'];
    $CaseDesc=$_POST['CaseDesc'];
    $initiatedby=$_POST['initiatedby'];
    $beneficary=$_POST['beneficary'];
    $AmountSuggested=$_POST['AmountSuggested'];
    $AmountApproved=$_POST['AmountApproved'];
    $Approval=$_POST['Approval'];
    if(isset($_POST['Approval']))$Approval=1;
    
    $update_case="UPDATE caseprocess SET CaseDesc='$CaseDesc',initiatedby='$initiatedby',beneficary='$beneficary',AmountSuggested='$AmountSuggested',AmountApproved='$AmountApproved',Approval='$Approval' WHERE CaseID='$CaseID'";
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
    <title> Update Case Details</title>
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1> Case Process</h1>


    <form action="updatecaseform.php" method="POST">
  <br>
 / <input type="text" name="CaseID" value="<?php echo @ $update_query['CaseID']?>" readonly/>
   <select name="initiatedby">
   <option selected='selected'>Initiated By</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 

         <select name="beneficary">
   <option selected='selected'>Beneficary</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 


         

<br>
    <input type="number" name="AmountSuggested" placeholder="Enter the Suggested  Amount "  value="<?php echo  @ $update_query['AmountSuggested']?>"required />
    <br>
    <input type="number" name="AmountApproved" placeholder="Enter the Approved  Amount " value="<?php echo @ $update_query['AmountApproved']?>"required />
    <br>       
    <input type="text" name="CaseDesc" placeholder="Enter Case Description" value="<?php echo @ $update_query['CaseDesc']?>" required /> 
    <br>
    
      <label for="checkbox">Case Approved</label>
     <input type="checkbox" name="Approval" id="Approval"
     
     <?php
     if($update_query['Approval']=='1')
     {
        echo "checked";
     }?>
>     
 
    
    
    <input type="submit" value="update Now" name="submit" class="submit" onclick="return update()">
    
    </form>
    
        </div>
      

</body>
</html>

<script>
    function update()
    {
        return confirm("Are you sure you want to update this record");
    }
    </script>