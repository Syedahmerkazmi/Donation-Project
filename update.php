<?php
include 'connect.php';

$query="SELECT UID,Name FROM users";
$result=mysqli_query( $GLOBALS['conn'],$query);
$check=mysqli_num_rows($result);
$users=mysqli_fetch_all($result);// Value From database and give it into refby dropbox
?>



<?php


if(isset($_GET['UID']))
{
 
    $UID=$_GET['UID'];
   $query="SELECT * FROM users WHERE UID='$UID'";
   $query_run=mysqli_query($conn,$query);
   $total=mysqli_num_rows($query_run);
  $condition=mysqli_fetch_array($query_run);
}

 ?> 

 



<link rel="stylesheet" href="donar.css">
<div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
<h1>Update Form</h1>
    <form action="updatequeries.php" method="POST" allign="center">

    UID:<input type="text" name="UID" value="<?php echo $condition['UID']?>" readonly><br>
        
        Name:<input type="text" name="UserName" value="<?php echo $condition['Name']?>"placeholder="Enter A Volunteer Name "required>
   
       <br> CNIC:<input type="text" name="CNIC"  value="<?php echo $condition['CNIC']?>" placeholder="Enter A Volunteer CNIC "required>

        
        <br>Village:<input type="text" name="Village"    value="<?php echo $condition['Village']?>"  placeholder="Enter Your Volunteer Village" required>

    
        <br>Type:<select required name="Type">
            <option hidden value="Volunteer"> Type Of User</option>

            <option value="Volunteer" 
            <?php
            if($condition['Type'] == 'Volunteer')
            {
                echo "selected";
            }
            ?>
            >Volunteer</option>
            <option value="Donar"
            <?php
            if($condition['Type'] == 'Donar')
            {
                echo "selected";
            }
            ?>
            >Donar</option>
           
        </select>
        <br>Appt:<select required name="Appt">
            <option hidden value="C">Appointment</option>
            <option value="President" 
            <?php
            if($condition['Appt'] == 'President')
            {
                echo "selected";
            }
            ?>
            
            >President</option>
            <option value="Boardmember"
            
            
            <?php
            if($condition['Appt'] == 'Boardmember')
            {
                echo "selected";
            }
            ?>
            
            >Board Member</option>
            <option value="Accountant"
            
            <?php
            if($condition['Appt'] == 'Accountant')
            {
                echo "selected";
            }
            ?>
            
            >Accountant</option>
            <option value="Donar"
            
            <?php
            if($condition['Appt'] == 'Donar')
            {
                echo "selected";
            }
            ?>
            
            >Donar</option>
            <option value="Beneficiary"
            <?php
            if($condition['Appt'] == 'Beneficiary')
            {
                echo "selected";
            }
            ?>
            
            
            >Beneficiary</option>
        </select>
             
        <br>Refby:<select name="Refby">
           <option selected='selected'>Reffered By</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";

            }
             ?>  
         </select> 
        
    
     <br>Date: <input type="date" name="DOR" placeholder="Enter Date "  value="<?php echo $condition['DOR']?>" required>
    <br>AllowLogin: <input type='checkbox' name='AllowLogin' 
    <?php
    if($condition['AllowLogin']=='1')
    {
        echo 'checked';
    }
    ?>
    
    >
      <input type="submit" value="submit" name="submit" class="submit" onclick=" return update()">

      <script>

        function update()
        {
            return confirm('Are You sure you want to update record');
        }

        </script>


    

      