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
  JOIN transactions t on u.UID=t.uid
  JOIN contact c on u.UID=c.uid
  JOIN caseprocess ca on u.UID=ca.initiatedby
  JOIN user_login ul on u.UID=ul.UID
  JOIN votes v on u.UID=v.UID 
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
 <td><a   href='update.php?UID=$condition[UID] &Name=$condition[Name]'>Update</a></td> 
</tr>
 <br>
 <tr>
     
  <td>".$condition['cid'] ."</td>
 <td>".$condition['uid'] ."</td>
 <td>".$condition['I_flag'] ."</td>
 <td>".$condition['value'] ."</td>
 </tr>
 <br>
 <tr>
 <td>".$condition['amount'] ."</td>
 <td>".$condition['type'] ."</td>
 <td>".$condition['description'] ."</td>
 <td>".$condition['paymentmethod'] ."</td>
 
 <td>".$condition['CaseID'] ."</td>
 <td>".$condition['CaseDesc'] ."</td>
 <td>".$condition['initiatedby'] ."</td>
 <td>".$condition['beneficary'] ."</td>
 <td>".$condition['AmountSuggested'] ."</td>
 <td>".$condition['AmountApproved'] ."</td>
 <td>".$condition['Approval'] ."</td>
</tr>

<br>
<tr>
<td>".$condition['UID'] ."</td>
 <td>".$condition['username'] ."</td>
 <td>".$condition['password'] ."</td>
 <td>".$condition['role'] ."</td>
 <td>".$condition['enabled'] ."</td>
 </tr>

<br>
<tr>
<td>".$condition['CaseID'] ."</td>
<td>".$condition['UID'] ."</td>
<td>".$condition['Vote'] ."</td>
<td>".$condition['Comments'] ."</td>
    ";
 }
}
else
echo 'record not found';
}

?>

