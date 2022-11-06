<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>a and p</title>
</head>
<body>





<?php
include 'connect.php';

if(isset($_GET['CaseID']))
  {
      $CaseID=$_GET['CaseID'];
  $query="SELECT * FROM caseprocess WHERE Approval='0' ";


 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
    
<table>
<p>Pending Cases</p>
<tr>
<th>CaseID</th>
<th>Case Desc</yh>
<th>initiateby</th>
<th>beneficary</th>
<th>AmmountSuggested</th>
<th>AmountApproved</th>

<form method='POST' action=''>
<th><input type='checkbox' name='Approval' />Approval</th>
<th><input type='hidden' name='CaseID' value='  $condition[CaseID] ' />Approval</th>
<th><button type='submit' name='submit' value=' $condition[CaseID]  ' />Approved Case</button/th>
</form>
    </tr>
    <tr>
 <td>".$condition['CaseID'] ."</td>
<td>".$condition['CaseDesc'] ."</td>
<td>".$condition['initiatedby'] ."</td>
<td>".$condition['beneficary'] ."</td>
<td>".$condition['AmountSuggested'] ."</td>
<td>".$condition['AmountApproved'] ."</td>
<td>".$condition['Approval'] ."</td> </tr>";


 }


    }
   }?>
<?php

if(isset($_POST['submit']))
{
  
    $CaseID=$_POST['CaseID'];
    $Approval=0;
    if(isset($_POST['Approval']))$Approval=1;
   
   
     
 

        $update_case="UPDATE caseprocess SET Approval='$Approval' WHERE CaseID='$CaseID'";
        $query_run=mysqli_query($conn,$update_case);
     
    $result=mysqli_query($conn,$query);
    
    
   

}
?>


<?php
include 'connect.php';

if(isset($_GET['CaseID']))
  {
      $CaseID=$_GET['CaseID'];
  $query="SELECT * FROM caseprocess WHERE Approval='1' ";


 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
  
<table>
<p>approved Cases</p>
<tr>
<th>CaseID</th>
<th>Case Desc</yh>
<th>initiateby</th>
<th>beneficary</th>
<th>AmmountSuggested</th>
<th>AmountApproved</th>

    </tr>
    <tr>
 <td>".$condition['CaseID'] ."</td>
<td>".$condition['CaseDesc'] ."</td>
<td>".$condition['initiatedby'] ."</td>
<td>".$condition['beneficary'] ."</td>
<td>".$condition['AmountSuggested'] ."</td>
<td>".$condition['AmountApproved'] ."</td>
<td>".$condition['Approval'] ."</td> </tr>";


 }


    }
   }?>