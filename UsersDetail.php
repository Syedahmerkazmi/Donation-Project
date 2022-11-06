                
				<p>Users Detail </p>
				<br/>
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
	  
	  
	

<?php
session_start();
include_once 'connect.php';



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
    
<td>
<a href='admindash.php'class='btn'>Update</a></td>
    

    <td><a href='admindash.php'class='btn'>Delete</a></td></tr></form>";
 }


?>
</table>