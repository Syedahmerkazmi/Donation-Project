<?php
include 'connect.php';
$query="SELECT UID,Name FROM users";
$result=mysqli_query( $GLOBALS['conn'],$query);
// $result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);
$users=mysqli_fetch_all($result);
?>
<?php

if(isset($_POST['submit']))
{
    // print_r($_POST);die();
    $Name=$_POST['UserName'];
    $CNIC=$_POST['CNIC'];
    $Village=$_POST['Village'];
    $Type=$_POST['Type'];
    $Refby=$_POST['Refby'];
    $Appt=$_POST['Appt'];
    $DOR=$_POST['DOR'];
    $AllowLogin=0;
    if(isset($_POST['AllowLogin']))$AllowLogin=1;
    


    $already="SELECT *FROM users Where   CNIC='$CNIC'";

    $result =  $GLOBALS['conn']->query($already);

  
    if ($result->num_rows > 0)
    {
        // These 3 lines insert the record into contact even the cnic is already exist
        // $row = $result->fetch_assoc();
        // $UID=$row['UID'];
        // insert_user_contact_details($UID);
        echo "<script>alert('Cnic Already Registerd ! Please Try With Different Cnic ')</script>";
        ?>
        <meta http-equiv="Refresh" content="0 ;url='volunteer.php'; ">
        <?php
    }
    else
    {
       
        function insert_Uid_user_login($User_ID)
        {
            $password=$_POST['password'];
            $username=$_POST['username'];
            $query="INSERT INTO user_login (UID,username,password) VALUES('$User_ID','$username','$password')";
            $result = $GLOBALS['conn'] -> query($query);
        }
        
    
        $user_insert_query = "INSERT INTO users (Name,CNIC,Village,Type,Refby,Appt,DOR,AllowLogin)
                                        VALUES ('$Name','$CNIC','$Village','$Type','$Refby','$Appt','$DOR','$AllowLogin')";
                                        
      $result = $GLOBALS['conn'] -> query($user_insert_query);
      



       $UID= $GLOBALS['conn'] -> insert_id; //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) from the last query.
       
        if ($UID)
        {
            insert_user_contact_details($UID);
            insert_Uid_user_login($UID);

            echo "<script>alert('New Record with user ID = $UID Created Sucessfully ! Thanks For Joining Our Team ! Best Of Luck')</script>";
            ?>
        <meta http-equiv="Refresh" content="0 ;url='volunteer.php'; ">
        <?php

        }
        else{
            echo "Error:" . $sql . "
            " . mysqli_error( $GLOBALS['conn']);
        }
        mysqli_close( $GLOBALS['conn']);
    }
}

function insert_user_contact_details($User_ID)
{
    $I_flag=$_POST['I_flag'];
    foreach($I_flag as $chboxname)
    {
            
        $field_value=$_POST[$chboxname];

        $checkbox_query="INSERT INTO `contact` ( `uid`, `I_flag`, `value`) VALUES ( '$User_ID', '$chboxname', '$field_value');";
        $GLOBALS['conn'] -> query($checkbox_query);
    }
}



?>
