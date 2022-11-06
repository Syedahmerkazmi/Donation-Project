<?php
    session_start();
    include 'connect.php';

    if(isset($_GET['uid']))
{
    $uid=$_GET['uid'];
    $query="SELECT * FROM contact WHERE uid ='$uid'";
    $fetch_details=mysqli_query($conn,$query);
    $total=mysqli_num_rows($fetch_details);
    $update_query=mysqli_fetch_array($fetch_details);
}
if ($fetch_details->num_rows > 0)
{
    // These 3 lines insert the record into contact even the cnic is already exist
    // $row = $update_query->fetch_assoc();
    // $UID=$row['UID'];
    insert_user_contact_details($UID);
  //   echo "<script>alert('Cnic Already Registerd ! Please Try With Different Cnic ')</script>";
    ?>
    <!-- <meta http-equiv="Refresh" content="0 ;url='volunteer.php'; "> -->
    <?php
}
if(isset($_GET['uid']))
{
    $uid=$_GET['uid'];
    $query="SELECT * FROM contact WHERE uid ='$uid'";
    $user_data=mysqli_query($conn,$query);
    

    while ($row=mysqli_fetch_assoc($user_data))
     { 
        $user_contact[$row['I_flag']]=$row['value'];
        
       
      }

     
    
    //   else
    //   {
         
    //       function insert_Uid_user_login($User_ID)
    //       {
    //           $password=$_POST['password'];
    //           $username=$_POST['username'];
    //           $query="INSERT INTO user_login (UID,username,password) VALUES('$User_ID','$username','$password')";
    //           $result = $GLOBALS['conn'] -> query($query);
    //       }
      }

    //   while ($user_data->num_rows > 0)
    //   { 
    //     //  $user_contact[$row['I_flag']]=$row['value'];
        // insert_user_contact_details($value);
        
    //    }

      
       
    

   
    //     if ($fetch_details->num_rows > 0)
    // {
    //     // These 3 lines insert the record into contact even the cnic is already exist
    //     $row = $fetch_details->fetch_assoc();
    //     $value=$row['value'];
    //     insert_user_contact_details($UID);
    //     echo "<script>alert('Cnic Already Registerd ! Please Try With Different Cnic ')</script>";
        
    // }
        
            // insert_user_contact_details();
        
        // $value=$_POST['value'];
        
    //     if(!empty ($value))
    //     {
    //     update_contact_details($value);
        
    //     }
    // }
    
    //   insert_user_contact_details($UID);
       

//  $value= $GLOBALS['conn'] ->   insert_id ;
//  $update_case="UPDATE contact SET value='$value'  ";
//  $query_run=mysqli_query($conn,$update_case);
// //  return $row['value'];

//  if(isset($_POST['submit']))
// {
    
//      $uid=$_POST['uid'];
//      $cid=$_POST['cid'];
//      $value=$_POST['value'];
    
    
    
//      $update_case="UPDATE contact SET value='$value' WHERE cid='$cid' ";
//      $query_run=mysqli_query($conn,$update_case);
//      }
// print_r([$value]);
// die();

         

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="donar.css">
    <title>Update contact details</title>
   
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1> Update contact details</h1>


    <form action="updatecontact.php" method="POST">
    CID:<input type="text" name="cid"  value="<?php echo @ $update_query['cid']?>" readonly/>
    <br>UID:<input type="text" name="uid" value="<?php echo  @ $update_query['uid']?>" readonly/>
    
       
            
    <br><label for="email">Email:</label> <input type="checkbox" name="I_flag[]" id="email"  style="margin:-20%;"onclick="number()" value='email'
    <?php
    //  if($user_contact['I_flag']=='1')
    //  {
    //     echo "checked";
    //  }?>/>
        
      <label for="telhome">Telephone Home:</label> <input type="checkbox" name="I_flag[]"   style="margin:-20%;"id="telhome" onclick="number()"  value='telhome'>
      <label for="teloffice">Telephone Office:</label> <input type="checkbox" name="I_flag[]"style="margin:-20%;"id="teloffice" onclick="number()" value='teloffice'>
        <br><br>  <label for="mob">Mobile Number:</label><input type="checkbox" name="I_flag[]" id="mob" style="margin:-20%;"onclick="number()" value='mob'>
        <label for="whatsapp">Whatsapp Number:</label> <input type="checkbox" name="I_flag[]" id="whatsapp" style="margin:-20%;" onclick="number()" value='whatsapp'>
<br> 
       
        
        
      
      

        
           
        <br><input type="email" name="value" id="emails" placeholder="Enter a Email  Here"  value="<?php  echo @ $user_contact['email'];?>" >
        <br><input type="number" name="value" id="telhomes" placeholder="Enter a Telephone Number Here" value="<?php  echo @ $user_contact['telhome'];?>" >
        <br><input type="number" name="value" id="teloffices" placeholder="Enter a Office Number Here" value="<?php  echo  @$user_contact['teloffice'];?>" >
        <br><input type="number" name="value" id="mobile" placeholder="Enter a Mobile Number Here" value="<?php  echo @ $user_contact['mob'];?>" >
        <br><input type="number" name="value" id="wa" placeholder="Enter a Whatsappsss Number Here" value="<?php  echo @ $user_contact['whatsapp'];?>">

         <script>
            function number()
            {
                if(email.checked==true)
                {
                    
                    document.getElementById('emails').style.display="inline-block";
                   
                }
                else document.getElementById('emails').style.display="none";

                
                 if(telhome.checked==true)
                {
                    document.getElementById('telhomes').style.display="inline-block";
                
                }
                else document.getElementById('telhomes').style.display="none";

                
                if(teloffice.checked==true)
                {
                    document.getElementById('teloffices').style.display="inline-block";
                
                }
                else document.getElementById('teloffices').style.display="none";
               
                
                if(mob.checked==true)
                {
                    document.getElementById('mobile').style.display="inline-block";
                
                }
                else document.getElementById('mobile').style.display="none";
                   
                
                if(whatsapp.checked==true)
                {
                    document.getElementById('wa').style.display="inline-block";
                
                }
                else document.getElementById('wa').style.display="none";
                
                
                
            }
            </script> 
       
       
        <input type="submit" value="Update Now" name="submit" class="submit" onclick ='return update()'>
        
    </form>
        </div>
        <script>
            function update(){
                return confirm('Are you sure you want to update this record');
            }
            </script>
            

   <?php 
           
// function insert_user_contact_details()
// {
//     $value[]=$_POST['value'];
//     // $I_flag=$_POST['I_flag'];
//     foreach($value as $chboxname)
//     {

       
//         $update_case="UPDATE contact SET value='$chboxname',I_flag='$chboxname' WHERE cid='$cid' ";
//         $GLOBALS['conn'] -> query($update_case);
//     }
// }


function insert_user_contact_details($value)
{
    $I_flag=$_POST['I_flag'];
    foreach($I_flag as $chboxname)
    {
            
        // $field_value=$_POST[$chboxname];

        $checkbox_query="UPDATE   `contact` SET I_Flag='$chboxname',value='$field_value' WHERE cid='$cid';";
        $GLOBALS['conn'] -> query($checkbox_query);
    }
}

?>

