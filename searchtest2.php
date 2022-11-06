<?php
session_start();
include 'connect.php';
     ?>
<form action="" method ='GET'>
    <!-- <input type='text' name='UID' placeholder="UID"readonly/>     -->
 search here<input type="text" name='UID' />
  <br>
  <button type='sumbit' name="submit"> submit</button><br></form>
  <?php

  if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM users u
 
  WHERE  u.UID='$UID' ";
//   $query="SELECT * FROM  transactions WHERE tid='$UID'";
//   $query="SELECT * FROM  caseprocess WHERE initatedby='$UID'";
//   $query="SELECT * FROM  contact WHERE uid='$UID'";
//   $query="SELECT * FROM  user_login WHERE UID='$UID'";
//   $query="SELECT * FROM  votes WHERE UID='$UID'";

 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "

    <table>
                
  
   
       <tr> 
   <th>UserId</th>
   <th>UserName</th>
   <th>UserCnic</th>
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
    <form method='GET' action='update.php'>
 <td><a   href='update.php?UID=$condition[UID]'>Update</a></td> 
</form>
 <br>


 <td> 
 <form method='GET' action='delete.php'>
 <button type='submit' name='delete_btn' value= '$condition[UID]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button>
 
</form>

</td> 
    ";
 }
}
  }
?>
  
 


<?php

if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM transactions
 
  WHERE  tid='$UID' ";
//   $query="SELECT * FROM  transactions WHERE tid='$UID'";
//   $query="SELECT * FROM  caseprocess WHERE initatedby='$UID'";
//   $query="SELECT * FROM  contact WHERE uid='$UID'";
//   $query="SELECT * FROM  user_login WHERE UID='$UID'";
//   $query="SELECT * FROM  votes WHERE UID='$UID'";

 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
    <table>
    <h1 style='text-align:center;'>Transaction record</h1>
        <tr>
        
        <th>Transaction Id</th>
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
<tr>
    
 <td>".$condition['tid'] ."</td>
<td>".$condition['uid'] ."</td>
<td>".$condition['aid'] ."</td>
<td>".$condition['date'] ."</td>
<td>".$condition['amount'] ."</td>
<td>".$condition['type'] ."</td>
<td>".$condition['description'] ."</td>

 <td>".$condition['paymentmethod'] ."</td>
    
 <form method='GET' action='updatedonar.php'>
 <td><a   href='updatedonar.php?tid=$condition[tid] &uid=$condition[uid]'>Update</a></td> 
</form>
 <br>

     

    ";
 }

?>
<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_tn' value='<?php echo $condition['uid']?>'  onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   
 
  </table>
   <?php 
}
}?>



<?php

if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM caseprocess 
 
  WHERE  initiatedby='$UID' ";
//   $query="SELECT * FROM  transactions WHERE tid='$UID'";
//   $query="SELECT * FROM  caseprocess WHERE initatedby='$UID'";
//   $query="SELECT * FROM  contact WHERE uid='$UID'";
//   $query="SELECT * FROM  user_login WHERE UID='$UID'";
//   $query="SELECT * FROM  votes WHERE UID='$UID'";

 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
    <table>
    <h1 style='text-align:center';>Caseprocess </h1>
    <tr> 
    
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
<tr>
    
 <td>".$condition['CaseID'] ."</td>
<td>".$condition['CaseDesc'] ."</td>
<td>".$condition['initiatedby'] ."</td>
<td>".$condition['beneficary'] ."</td>
<td>".$condition['AmountSuggested'] ."</td>
<td>".$condition['AmountApproved'] ."</td>
<td>".$condition['Approval'] ."</td>

<form method='GET' action='updatecaseform.php'>
<td><a   href='updatecaseform.php?CaseID=$condition[CaseID]'>Update</a></td> 
</form>

    

 <br>
 
     

    ";
 }
?>
<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_caseprocess' value='<?php echo $condition['CaseID']?>'  onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   

   <?php }
   }?>
</table>


<?php

if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM contact
 
  WHERE  uid='$UID' ";
//   $query="SELECT * FROM  transactions WHERE tid='$UID'";
//   $query="SELECT * FROM  caseprocess WHERE initatedby='$UID'";
//   $query="SELECT * FROM  contact WHERE uid='$UID'";
//   $query="SELECT * FROM  user_login WHERE UID='$UID'";
//   $query="SELECT * FROM  votes WHERE UID='$UID'";

 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
<table>
<h1 style='text-align:center;;'>contact reocrd</h1>

    <tr>
    <th>Contact Id</th>
    <th>User Id</th>
    <th>Type Of Contact</th>
    <th>Value</th>
    <th>Update</th>
    <th>Delete</th>
</tr>
<tr>
    
 <td>".$condition['cid'] ."</td>
<td>".$condition['uid'] ."</td>
<td>".$condition['I_flag'] ."</td>
<td>".$condition['value'] ."</td>

    

 <br>
 <form method='GET' action='updatecontact.php'>
    <td><a   href='updatecontact.php?uid=$condition[uid]'>Update</a></td> 
   </form>";
 }

?>

<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_contact' value='<?php echo $condition['uid']?>' onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php }
   }?>
</table>

<?php

if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM user_login WHERE  UID='$UID' ";
 $result=mysqli_query($conn,$query);
 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
    <table>
    <h1 style='text-align:center;'>user_login reocrd</h1>
    <tr>
      
        
        <th>User Id</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Role (is Admin)</th>
        <th>Enabled</th>

        <th>Update</th>
        <th>Delete</th>
</tr>
<tr>
    
 <td>".$condition['UID'] ."</td>
<td>".$condition['username'] ."</td>
<td>".$condition['password'] ."</td>
<td>".$condition['role'] ."</td>
<td>".$condition['enabled'] ."</td>

    

 

 <form method='GET' action='updatelogindetails.php'>
 <td><a   href='updatelogindetails.php?UID=$condition[UID] '>Update</a></td> 
</form>

    ";
}

?>

<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_user_login' value='<?php echo $condition['UID']?>' onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php }
   }?> <br>  </table>   




<?php

if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM votes
  WHERE  UID='$UID' ";
 $result=mysqli_query($conn,$query);

 if( mysqli_num_rows($result)>0)
 {
 while($condition=mysqli_fetch_array($result))
 {
   

    echo "
    <tr>
    
    <table>
    <h1 style='text-align:center;'>Vote reocrd</h1>
    <th>Case ID</th>
    <th>User ID</th>
    <th>Vote</th>
    <th>Comments</th>
    <th>Update</th>
    <th>Delete</th>
    </tr>

<br>
<tr>
    
 <td>".$condition['CaseID'] ."</td>
<td>".$condition['UID'] ."</td>
<td>".$condition['Vote'] ."</td>
<td>".$condition['Comments'] ."</td>
<td><a href='updatevote.php?CaseID=$condition[CaseID]'>Update</a></td> 
   </form>
  
    
    
    ";

 }
 ?>



  <form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_vote' value='<?php $condition['UID']?>' onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php }
   }?>
</form>
    
</tr>
 <br>
 <tr>
  </table>   



