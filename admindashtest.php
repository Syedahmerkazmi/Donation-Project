<?php

include_once 'connect.php';
include_once 'security.php';
?>
<html>
	<head>
		<title></title>
		
	</head>

   
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<body>
		
		<div id="mySidenav" class="sidenav">
		<p class="logo"><span>Syed</span>-Ahmer<span> Ali</span> Kazmi</p>
	  <a href="admindashtest.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
	  <a href="admindashtest.php"class="icon-a"><i class="fa fa-users icons"></i>   User</a>
	  <a href="admindashtest.php"class="icon-a"><i class="fa fa-money icons"></i>   Transation</a>
	  <a href="admindashtest.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i>   CaseProcess </a>
	  <a href="admindashtest.php"class="icon-a"><i class="fa fa-tasks icons"></i>   Login </a>
	  <a href="admindashtest.php"class="icon-a"><i class="fa fa-user icons"></i>   Contact </a>
	  <a href="admindashtest.php"class="icon-a"><i class="fa fa-list-alt icons"></i>   Vote </a>
    <?php if($_SESSION['role']=='1'):?>
    <a href="donar.php"class="icon-a"><i class="fa fa-user icons"></i>   Add Donation </a>
    <a href="volunteer.php"class="icon-a"><i class="fa fa-user icons"></i>   Add Volunteer </a>
    <?php endif; ?>
    <a href="logoutnew.php"class="icon-a"><i class="fa fa-sign-out icons"></i>   Logout </a>
    <?php if($_SESSION['role']=='1'):?>
    <form method="GET" action=''>
  <input type="submit" value="Approved And Pending Cases" name="CaseID" class='hello' >
  <?php endif; ?>
  <style>
  .hello
    {
    
      
      width: 300px;
     
    background-color: transparent; border:none;    
    padding: 15px 8px 15px 32px;
    
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }
    .hello:hover{
      
      background-color:#1b203d;
   
      color:white;
      
    }
    </style>

  </form>
 	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
             
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Dashboard</span>
    <br>
    

	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Dashboard</span>
	


 <form method='GET' action=''>
    <input type="text" name="UID"  placeholder="Search By UserID (UID)" style="border:none;margin: 0%;
    padding:0%;
    width: 200px;
    outline:none;
    border-left: 16px solid white;
    border-right: 16px solid white;
    border-top:1px solid white;
    border-bottom:1px solid white;
    padding:9px 9px;
   
    border-radius: 20px;
    background-color:transparent;
    ">
     <input type="submit"  name='submit' >
     
</form>

<!--  PEnding and approved cases -->

<div class="searching">

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
<p style='text-align:center; color:#f7403b;font-size: 20px;'>Pending Cases</p>
<tr>
<th>CaseID</th>
<th>Case Desc</yh>
<th>initiateby</th>
<th>beneficary</th>
<th>AmmountSuggested</th>
<th>AmountApproved</th>

<form method='POST' action=''>
<th><input type='checkbox' name='Approval'/>Approved</th>
<th><input type='hidden' name='CaseID' value='  $condition[CaseID] ' /></th>
<th><button type='submit' name='submit' value='$condition[CaseID] '  />Submit Approval</button></th>
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
    else{
      echo 'No Pending Cases Founded';
    }
   }?>
<?php

if(isset($_POST['submit']))
{
    //print_r($_POST);die();
    $CaseID=$_POST['CaseID'];
    $Approval=0;
    if(isset($_POST['Approval']))$Approval=1;
   
   
     
 

        $update_case="UPDATE caseprocess SET Approval='$Approval' WHERE CaseID='$CaseID' ";
        $query_run=mysqli_query($conn,$update_case);
     
    $result=mysqli_query($conn,$query);
    
    
   

}
?>
<script>
  function approved()
  {
    return Confrim("Are you confrom you want to Approved this case");
  }
  </script>

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
<p style='text-align:center; color:#f7403b;font-size: 20px;'>Approved Cases</p>
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
    else{
      echo 'No Approved Cases Founded';
    }
   }?>
   </div>
   <!-- end -->

   <!-- searching -->
   

<div class="searching">

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
                
    <p style='text-align:center; color:#f7403b;font-size: 20px;'>User Details[$UID]</p>
   
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
      
   <!-- <th>Refered By</th> -->";
   
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "
  <th>Update</th>
  <th>Delete</th> 
  </tr>
";?>
<?php endif; ?>
  <?php
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
";
 
 
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "
  
  
    <form method='GET' action='update.php'>
 <td><a   href='update.php?UID=$condition[UID] '>Update</a></td> 
</form>
 <br>

     

 <form method='GET' action='delete.php'>
 <td> <button type='submit' name='delete_btn' value= '$condition[UID]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button></td>
 
</form>";
?>
<?php endif; ?>
<?php
 }
}

else{
  echo 'No Record Founded';
}
  }
?>
 
<?php if($_SESSION['role']=='1'|| $_SESSION['role']=='2'):?>
<?php

if(isset($_GET['UID']))
  {
      $UID=$_GET['UID'];
  $query="SELECT * FROM transactions
 
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
    <p style='text-align:center; color:#f7403b;font-size: 20px;'>Transaction Details[$UID]</p>
        <tr>
        
        <th>Transaction Id</th>
        <th>UserId</th>
        <th>Approval ID</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Description</th>
        <th>Paymentmethod</th>
        
        ";
   
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "
  <th>Update</th>
  <th>Delete</th> 
  </tr>
";?>
<?php endif; ?>
  <?php
  echo "
   
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
 ";
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "
   

  
    
 <form method='GET' action='updatedonar.php'>
 <td><a   href='updatedonar.php?tid=$condition[tid] &uid=$condition[uid]'>Update</a></td> 
</form>
 <br>

     

 <form method='GET' action='delete.php'>
 <td> <button type='submit' name='delete_tn' value= '$condition[uid]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button></td>
 
</form>
";?>
<?php endif; ?>

    <?php
 }
}
  }
?>
<?php endif; ?>

<?php if($_SESSION['role']=='1'|| $_SESSION['role']=='2'):?>

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
    <p style='text-align:center; color:#f7403b;font-size: 20px;'>Caseprocess Details [$UID]</p>
    <tr> 
    
        <th>Case Id</th>
        <th>CaseDesc</th>
        <th>Initiated By</th>
        <th>Beneficary</th>
        <th>Amount Suggested</th>
        <th>Amount Approved</th>
        <th>Approval</th>";?>
        <?php if($_SESSION['role']=='1'):?>
          <?php echo "
          <th>Update</th>
          <th>Delete</th> 
          </tr>
        ";?>
        <?php endif; ?>
          <?php
          echo "

</tr>
<tr>
    
 <td>".$condition['CaseID'] ."</td>
<td>".$condition['CaseDesc'] ."</td>
<td>".$condition['initiatedby'] ."</td>
<td>".$condition['beneficary'] ."</td>
<td>".$condition['AmountSuggested'] ."</td>
<td>".$condition['AmountApproved'] ."</td>
<td>".$condition['Approval'] ."</td>
";
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "

<form method='GET' action='updatecaseform.php'>
<td><a   href='updatecaseform.php?CaseID=$condition[CaseID]'>Update</a></td> 
</form>

    

 <br>
 
     
 <form method='GET' action='delete.php'>
 <td> <button type='submit' name='delete_caseprocess' value= '$condition[CaseID]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button></td>
 
</form>


    ";?>
    <?php endif; ?>
    <?php
 }
}
  }
?>
<?php endif; ?>
<?php if($_SESSION['role']=='1'):?>
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
<p style='text-align:center; color:#f7403b;font-size: 20px;'>Contact Details [$UID]</p>

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
   </form>
   <br>
 
     
   <form method='GET' action='delete.php'>
   <td> <button type='submit' name='delete_contact' value= '$condition[uid]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button></td>
   
  </form>
  
  
      ";
   }
  }
    }
  ?>
  <?php endif; ?>
 
<?php if($_SESSION['role']=='1'):?>
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
    <p style='text-align:center; color:#f7403b;font-size: 20px;'>User_login Details [$UID]</p>
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

<br>
 
     
<form method='GET' action='delete.php'>
<td> <button type='submit' name='delete_user_login' value= '$condition[UID]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button></td>

</form>


   ";
}
}
 }
?>
<?php endif; ?>
<?php if($_SESSION['role']=='1'):?>

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
    <p style='text-align:center; color:#f7403b;font-size: 20px;'>Vote Details [$UID]</p>
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
  
    
    
   <br>
 
     
   <form method='GET' action='delete.php'>
   <td> <button type='submit' name='delete_vote' value= '$condition[UID]' onclick='return confirm('Are you sure you want to delete this data')'>Delete</button></td>
   
  </form>
  
  
      ";
   }
  }
    }
  ?>
   <?php endif; ?>
    
</tr>
 <br>
 <tr>
  </table>   
  

  </div>

    
	</div>
		
		<div class="col-div-6">
		<div class="profile">

			<img  style="border-radius:50%;" src="images/mine3.jpg" class="pro-img" >
			<p>Syed Ahmer Ali <span> Admin</span></p>
		</div>
	</div>
		<div class="clearfix"></div>
	</div>

		<div class="clearfix"></div>
		<br/>
		
		<div class="col-div-3">
			<div class="box">
           
            <?php
            $query="SELECT * FROM users";
            $result=mysqli_query($conn,$query);
            $check=mysqli_num_rows($result);
           

          
           
				echo "<p>$check<br/><span>Total Users</span></p>"; ?>
				<i class="fa fa-users box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
            <?php
            $query="SELECT * FROM caseprocess";
            $result=mysqli_query($conn,$query);
            $check=mysqli_num_rows($result);
           

          
           
				echo "<p>$check<br/><span>Total Cases</span></p>"; ?>
				
				<i class="fa fa-list box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
            <?php
            $query="SELECT * FROM transactions";
            $result=mysqli_query($conn,$query);
            $check=mysqli_num_rows($result);
           

          
           
				echo "<p>$check<br/><span>Total Transations</span></p>"; ?>
				<i class="fa fa-money box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
            <?php
            $query="SELECT * FROM user_login where role=1";
            $result=mysqli_query($conn,$query);
            $check=mysqli_num_rows($result);
           

          
           
				echo "<p>$check<br/><span>Total Admins</span></p>"; ?>
				<i class="fa fa-tasks box-icon"></i>
			</div>
		</div>
		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-10">
			<div class="box-8">
			<div class="content-box">
				
				                
            <br><p style="text-align:center;  padding-bottom:2%;">User Details </p>
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
<!-- the query below the comment is used to show to update and delete button only if the user type is 1 which means he is admin  -->
<?php if($_SESSION['role']=='1'):?>
<th>Update</th>
<th>Delete</th> 
</tr>
</thead>
	  <?php endif; ?>
	  
	

<?php
//session_start();
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
<td>".$condition['AllowLogin'] ."</td> ";
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "
    <form method='GET' action='update.php'>
 <td><a   href='update.php?UID=$condition[UID] &Name=$condition[Name]'>Update</a></td> 
</form>
";?>
<?php endif; ?>
   
 




<?php if($_SESSION['role']=='1'):?>

   <form method='GET' action='delete.php'>
  
   <td><button type='submit' name='delete_btn' value='<?php echo @ $condition['UID']?>'  onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php endif; ?>
 
   
<?php }?>
<?php if($_SESSION['role']=='1' || $_SESSION['role']=='2'):?>
</table>
<br><p style="text-align:center; padding-top:2%; padding-bottom:2%;">Transaction Details </p>
				<br/>
<table>
     <thead>
        <tr>
        
        <th>Transaction Id</th>
        <th>UserId</th>
        <th>Approval ID</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Description</th>
        <th>Paymentmethod</th>
        <?php if($_SESSION['role']=='1' ):?>
        <th>Update</th>
        <th>Delete</th>
        <?php endif;?>
</tr>
</thead>

<?php
 
 $query="SELECT * FROM transactions";
 $result=mysqli_query($conn,$query);
 $hello=mysqli_num_rows($result);
 while($check=mysqli_fetch_array($result))
 {
     echo "
     <tr>
    <td>".$check['tid']."</td>
     <td>".$check['uid']."</td>
     <td>".$check['aid']."</td>
     <td>".$check['date']."</td>
     <td>".$check['amount']."</td> 
     <td>".$check['type']."</td>
     <td>".$check['description']."</td> 
     <td>".$check['paymentmethod']."</td> 
     ";
     ?>
     <?php if($_SESSION['role']=='1'):?>
       <?php echo "
         <form method='GET' action='updatedonar.php'>
         <td><a   href='updatedonar.php?tid=$check[tid] &uid=$check[uid]'>Update</a></td> 
        </form>
     ";?>
     <?php endif; ?>
       
    
     

    
<?php if($_SESSION['role']=='1' ):?>
<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_tn' value='<?php echo $check['uid']?>'  onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php endif;?>
 
   
   <?php }?>
   <?php endif; ?>
</table> 
<?php if($_SESSION['role']=='1'|| $_SESSION['role']=='2'):?>
<br><p style="text-align:center; padding-top:2%; padding-bottom:2%;">CaseProcess Details </p>
<table>
    <tr> 
    
        <th>Case Id</th>
        <th>CaseDesc</th>
        <th>Initiated By</th>
        <th>Beneficary</th>
        <th>Amount Suggested</th>
        <th>Amount Approved</th>
        <th>Approval</th>
        <?php if($_SESSION['role']=='1'):?>
        <th>Update</th>
        <th>Delete</th>
          <?php endif;?>
</tr>


<?php 


 $query="SELECT * FROM caseprocess";
 $result=mysqli_query($conn,$query);
 $chek=mysqli_num_rows($result);
 while($hello=mysqli_fetch_array($result))
 {
     echo "
     <tr>
     <td>".$hello['CaseID']."</td>
     <td>".$hello['CaseDesc']."</td>
     <td>".$hello['initiatedby']."</td>
     <td>".$hello['beneficary']."</td>
     <td>".$hello['AmountSuggested']."</td>
    <td>".$hello['AmountApproved']."</td>
     <td>".$hello['Approval']."</td>
    
     ";
?>
<?php if($_SESSION['role']=='1'):?>
  <?php echo "
  <form method='GET' action='updatecaseform.php'>
  <td><a   href='updatecaseform.php?CaseID=$hello[CaseID]'>Update</a></td> 
 </form>
";?>
<?php endif; ?>
  
  
<?php if($_SESSION['role']=='1'):?>
<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_caseprocess' value='<?php echo $hello['CaseID']?>'  onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
  <?php endif; ?>
 
   
   <?php }?>
   <?php endif; ?>
</table>
<?php if($_SESSION['role']=='1'):?>
<br><p style="text-align:center; padding-top:2%; padding-bottom:2%;">Login Details </p>
<table>
    <tr>
      
        
        <th>User Id</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Role (is Admin)</th>
        <th>Enabled</th>

        <th>Update</th>
        <th>Delete</th>
</tr>

<?php 

 $process="SELECT *FROM user_login";
 $result=mysqli_query($conn,$process);
 $why=mysqli_num_rows($result);
 while($if=mysqli_fetch_array($result))
{
    echo"
    <tr>
    
    <td>".$if['UID']."</td>
    <td>".$if['username']."</td>
    <td>".$if['password']."</td>
    <td>".$if['role']."</td>
    <td>".$if['enabled']."</td>
    
    <form method='GET' action='updatelogindetails.php'>
     <td><a   href='updatelogindetails.php?UID=$if[UID] '>Update</a></td> 
    </form>

    ";

    
    
    


?> 
<form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_user_login' value='<?php echo $if['UID']?>' onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php }?>
</table>
<?php endif; ?>

<?php if($_SESSION['role']=='1'):?>
<br><p style="text-align:center; padding-top:2%; padding-bottom:2%;">Contact Details </p>
<table>
   
    <tr>
        <th>Contact Id</th>
        <th>User Id</th>
        <th>Type Of Contact</th>
        <th>Value</th>
        <th>Update</th>
        <th>Delete</th>
</tr>

        
<?php


$query="SELECT * FROM contact ";
$result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);
while($check=mysqli_fetch_array($result))
{
    echo "<tr>
    <td>".$check['cid']."</td>
    <td>".$check['uid']."</td>
    <td>".$check['I_flag']."</td>
    <td>".$check['value']."</td>

    <form method='GET' action='updatecontact.php'>
    <td><a   href='updatecontact.php?uid=$check[uid] & I_flag=$check[I_flag]'>Update</a></td> 
   </form>
    

    
   ";






 ?>
 <form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_contact' value='<?php echo $check['uid']?>' onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php }?>
   

</table>
<?php endif; ?>

<?php if($_SESSION['role']=='1'):?>
<br><p style="text-align:center; padding-top:2%; padding-bottom:2%;">Vote Details </p>
<table>
  
    <tr>
    <th>Case ID</th>
    <th>User ID</th>
    <th>Vote</th>
    <th>Comments</th>
    <th>Update</th>
    <th>Delete</th>


    </tr>
<?php
$query="SELECT * FROM votes";
$result=mysqli_query($conn,$query);
$chek=mysqli_num_rows($result);
while($check=mysqli_fetch_array($result))
{
    echo "<tr>
    
    <td>".$check['CaseID']."</td>
    <td>".$check['UID']."</td>
    <td>".$check['Vote']."</td>
    <td>".$check['Comments']."</td>
    <form method='GET' action='updatevote.php'>
    <td><a href='updatevote.php?CaseID=$check[CaseID]'>Update</a></td> 
   </form>
  
    
    
    ";


?>

  <form method='GET' action='delete.php'>
  <td><button type='submit' name='delete_vote' value='<?php $check['UID']?>' onclick="return confirm('Are you sure you want to delete this data')">Delete</button></td> </tr>
   <?php }?>
</form>
</table>
<?php endif; ?>

			</div>
		</div>
		</div>

		


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>

	  $(".nav").click(function(){
	    $("#mySidenav").css('width','70px');
	    $("#main").css('margin-left','70px');
	    $(".logo").css('visibility', 'hidden');
	    $(".logo span").css('visibility', 'visible');
	     $(".logo span").css('margin-left', '-10px');
	     $(".icon-a").css('visibility', 'hidden');
	     $(".icons").css('visibility', 'visible');
	     $(".icons").css('margin-left', '-8px');
	      $(".nav").css('display','none');
	      $(".nav2").css('display','block');
	  });

	$(".nav2").click(function(){
	    $("#mySidenav").css('width','300px');
	    $("#main").css('margin-left','300px');
	    $(".logo").css('visibility', 'visible');
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>

<style>
body{
	margin:0px;
	padding: 0px;
	background-color:#1b203d;
	/* overflow: hidden; */
	font-family: system-ui;
}
.clearfix{
	clear: both;
}
.logo{
	margin: 0px;
	margin-left: 28px;
    font-weight: bold;
    color: white;
    margin-bottom: 30px;
}
.logo span{
	color: #f7403b;
}
.sidenav {
  height: 150%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #272c4a;
  overflow: hidden;
  transition: 0.5s;
  padding-top: 30px;
}
.sidenav a {
  padding: 15px 8px 15px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
.sidenav a:hover {
  color: #f1f1f1;
  background-color:#1b203d;
}
.sidenav{
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
  margin-left: 300px;
}
.head{
	padding:20px;
}
.col-div-6{
	width: 50%;
	float: left;
}
.profile{
	display: inline-block;
	float: right;
	width: 160px;
}
.pro-img{
	float: left;
	width: 40px;
	margin-top: 5px;
}
.profile p{
	color: white;
	font-weight: 500;
	margin-left: 55px;
	margin-top: 10px;
	font-size: 13.5px;
}
.profile p span{
	font-weight: 400;
    font-size: 12px;
    display: block;
    color: #8e8b8b;
}
.col-div-3{
	width: 25%;
	float: left;
}
.box{
	width: 85%;
	height: 100px;
	background-color: #272c4a;
	margin-left: 10px;
	padding:10px;
}
.box p{
	 font-size: 35px;
    color: white;
    font-weight: bold;
    line-height: 30px;
    padding-left: 10px;
    margin-top: 20px;
    display: inline-block;
}
.box p span{
	font-size: 20px;
	font-weight: 400;
	color: #818181;
}
.box-icon{
	font-size: 40px!important;
    float: right;
    margin-top: 35px!important;
    color: #818181;
    padding-right: 10px;
}
.col-div-8{
	width: 70%;
	float: left;
}
.col-div-4{
	width: 30%;
	float: left;
}
.content-box{
	padding: 20px;
}
.content-box p{
	margin: 0px;
    font-size: 20px;
    color: #f7403b;
}
.content-box p span{
	float: right;
    background-color: #ddd;
    padding: 3px 10px;
    font-size: 15px;
}
.box-8, .box-4{
	width: auto;
	background-color: #272c4a;
	height: auto;
	
}
.nav2{
	display: none;
}

.box-8{
	margin-left: 10px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}
td, th {
  text-align: left;
  padding:15px;
  color: #ddd;
  border-bottom: 1px solid #81818140;
}
.circle-wrap {
  margin: 50px auto;
  width: 150px;
  height: 150px;
  background: #e6e2e7;
  border-radius: 50%;
}
.circle-wrap .circle .mask,
.circle-wrap .circle .fill {
  width: 150px;
  height: 150px;
  position: absolute;
  border-radius: 50%;
}
.circle-wrap .circle .mask {
  clip: rect(0px, 150px, 150px, 75px);
}

.circle-wrap .circle .mask .fill {
  clip: rect(0px, 75px, 150px, 0px);
  background-color: #f7403b;
}
.circle-wrap .circle .mask.full,
.circle-wrap .circle .fill {
  animation: fill ease-in-out 3s;
  transform: rotate(126deg);
}

@keyframes fill {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(126deg);
  }
}
.circle-wrap .inside-circle {
  width: 130px;
  height: 130px;
  border-radius: 50%;
  background: #fff;
  line-height: 130px;
  text-align: center;
  margin-top: 10px;
  margin-left: 10px;
  position: absolute;
  z-index: 100;
  font-weight: 700;
  font-size: 2em;
}
input:focus
{
    color:white;
  
}
button
{
  background:#272c4a;
  color:white;
  
  border:none;
  margin-right:2%;
}
button:hover
{
  background-color:#818181;
  transition: 0.3s;
}

.searching{
  width:142ch;
    background-color: #272c4a;;
    
}
</style>

<script>
    function Confirm()
    {
        //return ("Are you sure you want to delete this data");
    }

</script>

	</body>


	</html>