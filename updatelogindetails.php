
<?php

session_start();
include 'connect.php';

?>

<?php
if(isset($_GET['UID']))
{
    $UID=$_GET['UID'];
    $query="SELECT * FROM user_login  WHERE UID ='$UID'";
    $query_update=mysqli_query($conn,$query);
    $total=mysqli_num_rows($query_update);
   $update_query=mysqli_fetch_array($query_update);
}
?>

<?php
if(isset($_POST['submit']))
{
    $UID=$_POST['UID'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $enabled=0;
if(isset($_POST['enabled']))$enabled=1;
$query="UPDATE user_login SET username='$username',password='$password',role='$role', enabled='$enabled' WHERE UID='$UID'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    echo '<script>alert("Date Updated")</script>';
    ?>
    <meta http-equiv="refresh" content="0; url=admindashtest.php">;
    <?php
}
else
{
    echo '<script>alert("Date  Not Updated")</script>';
    ?>
    <meta http-equiv="refresh" content="0; url=admindashtest.php">;
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
    <title>Update login details</title>
   
</head>
<body>
    <div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
    <h1> Update login details</h1>


    <form action="updatelogindetails.php" method="POST">
  <br>
   UID:<input type="text" name="UID" value="<?php echo @ $update_query['UID']?>" readonly>
    <br>Name:<input type="text" name='username' value="<?php echo  @ $update_query['username']?>"/>
    <br>Pass:<input type="password" id='pass'name="password" value="<?php echo @ $update_query['password']?>"/>
   <br> Show Password:<input type='checkbox' name='showpass' value='Show pass' onclick='showpassword()' />
    <br>Role:<input type="text" name='role' value="<?php echo  @ $update_query['role']?>"/>

        <br>Enable/disable   <input type="checkbox" name="enabled" 
        <?php
     if($update_query['enabled']=='1')
     {
        echo "checked";
     }?>/>
        <input type="submit" value="Update Now" name="submit" class="submit" onclick ='return update()'>
        
    </form>
        </div>
        <script>
            function update(){
                return confirm('Are you sure you want to update this record');
            }
            </script>

            <script>
                function showpassword()
                {
                    var p=document.getElementById("pass");
                    if(p.type="password")
                    {
                        p.type="text";
                    }
                    else
                    p.type="password";
                }

           
                </script>