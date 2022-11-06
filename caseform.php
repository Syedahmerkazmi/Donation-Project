<?php
// session_start();
include_once 'connect.php';
include 'securityforcase.php';
$query="SELECT UID,Name FROM users";
$run=mysqli_query($conn,$query);
$check=mysqli_num_rows($run);
$users=mysqli_fetch_all($run);
?>

<?php

if(isset($_POST['submit']))
{
    //print_r($_POST);die();
    $aid=$_POST['aid'];
    $CaseDesc=$_POST['CaseDesc'];
    $initiatedby=$_POST['initiatedby'];
    $beneficary=$_POST['beneficary'];
    $AmountSuggested=$_POST['AmountSuggested'];
    $AmountApproved=$_POST['AmountApproved'];
    $Approval=0;
    if(isset($_POST['Approval']))$Approval=1;
   
   
        //$query_insert_into_transactions="INSERT INTO transactions (Approval) VALUES('$Approval')";
        //$result = $GLOBALS['conn'] -> query($query_insert_into_transactions);
 

    $query="INSERT INTO  caseprocess(CaseDesc,initiatedby,beneficary,AmountSuggested,AmountApproved,Approval)
     VALUES('$CaseDesc','$initiatedby','$beneficary','$AmountSuggested','$AmountApproved','$Approval')";
     
    $result=mysqli_query($conn,$query);
    
    
    if($result>0)
    {
        echo "<script>alert('Thanks!')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=caseform.php";/>
        <?php
        
    }
    else{
        echo "<script>alert('Something wenr wrong')";
        ?>
        <meta http-equiv="refresh" content="0; url=caseform.php";/>
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
    <title>Case Details</title>
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1> Case Process</h1>


    <form action="caseform.php" method="POST">
  <br>
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
    <input type="number" name="AmountSuggested" placeholder="Enter the Suggested  Amount " required />
    <br>
    <input type="number" name="AmountApproved" placeholder="Enter the Approved  Amount " required />
    <br>       
    <input type="text" name="CaseDesc" placeholder="Enter Case Description" required /> 
    <br>
            

    <?php if($_SESSION['role']=='1'):?>
      <label for="checkbox">Case Approved</label>
     <input type="checkbox" name="Approval" id="Approval">
     <!-- Javacript for checkbox -->
     <?php endif; ?>
     <input type="hidden" name="aid" placeholder="Enter Case Description"  /> 
    
    <input type="submit" value="Initiate Case" name="submit" class="submit" >
    <a  href="logout.php" ><button  class="submit" type="button" name="logout" style="margin-top:0px;padding:3%;" >Logout</button></a>
    
    </form>
    
        </div>
      
        
</body>
</html>