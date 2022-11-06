

<?php
include 'connect.php';



      if(isset($_POST['submit']))
      { 
        
         
$UID=$_POST['UID'];
$query="SELECT * FROM users WHERE UID='$UID'";
$query_run=mysqli_query($conn,$query);

        $Name=$_POST['UserName'];
        $CNIC=$_POST['CNIC'];
        $Village=$_POST['Village'];
        $Type=$_POST['Type'];
        $Refby=$_POST['Refby'];
        $Appt=$_POST['Appt'];
        $DOR=$_POST['DOR'];
        $AllowLogin=0;
        if(isset($_POST['AllowLogin']))$AllowLogin=1;

        
// in this if the cnic is already exist then it will not update your form

        $already="SELECT *FROM users Where   CNIC='$CNIC'";
    
        $result =  $GLOBALS['conn']->query($already);
    
      
        if ($result->num_rows > 0)
        {
            
           echo "<script>alert('Cnic Already Registerd ! Please Try With Different Cnic ')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
            <?php
        }
        else
        {
           
           
          $query="UPDATE users SET CNIC='$CNIC',Name='$Name',Village='$Village',Type='$Type',Refby='$Refby',Appt='$Appt' ,DOR='$DOR' ,AllowLogin='$AllowLogin' WHERE UID='$UID'";
          $result =  $GLOBALS['conn']->query($query);
          
          echo "<script>alert('Form Updated ')</script>";
          ?>
            <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
            <?php
            
          
    
    
      }
    
    }
      ?>
      <!-- this query is for updated the user details wihtout any condition  -->
<!-- 
      if(isset($_POST['enabled']))$enabled=1;
        $query="UPDATE users SET CNIC='$CNIC',Name='$Name',Village='$Village',Type='$Type',Refby='$Refby',Appt='$Appt' ,DOR='$DOR' ,AllowLogin='$AllowLogin' WHERE UID='$UID'";
          $result =  $GLOBALS['conn']->query($query);
        if($result)
        {
            
          echo "<script>alert('Form Updated ')</script>";
          ?>
            <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
            <?php
            
        // }
    //     else
    //     {
           
           
          
          
    //       echo "<script>alert('Form not Updated ')</script>";
    //       ?>
    //         <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
    //         <?php
            
          
    
    
    //   }
    
    // } -->