<?php
include 'connect.php';



if(isset($_GET['delete_btn']))
{
    $UID=$_GET['delete_btn'];
    $query="DELETE FROM users WHERE UID='$UID'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run)
    {
     
        
       
        echo "<script>alert('Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php
    }

    else
    echo 'Data Not Deleted';
}



if(isset($_GET['delete_tn']))
{
    $UID=$_GET['delete_tn'];
    $query="DELETE FROM transactions WHERE UID='$UID'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run)
    {
        echo "<script>alert('Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php
    }

    else
    echo 'Data Not Deleted';
}

if(isset($_GET['delete_caseprocess']))
{
    $CaseID=$_GET['delete_caseprocess'];
    $query="DELETE FROM caseprocess WHERE CaseID='$CaseID'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run)
    {
        echo "<script>alert('Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php
    }

    else
    echo 'Data Not Deleted';
}

if(isset($_GET['delete_user_login']))
{
    $UID=$_GET['delete_user_login'];
    $query="DELETE FROM user_login WHERE UID='$UID'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run)
    {
        echo "<script>alert('Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php
        
       
    }

    else
    echo 'Data Not Deleted';
}


if(isset($_GET['delete_contact']))
{
    $uid=$_GET['delete_contact'];
    $query="DELETE FROM contact WHERE uid='$uid'";
    $query_run=mysqli_query($conn,$query);

    if($query_run)
    {
        echo "<script>alert('Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php

    }
    else
    echo 'Data Not Deleted';

}

// if(isset($_GET['delete_vote']))
// {
//     $UID=$_GET['delete_vote'];
//     $query="DELETE FROM votes WHERE UID='$UID'";
//     $query_run=mysqli_query($conn,$query);

//     if($query_run)
//     {
//         echo "<script>alert('Data Deleted')</script>";
//         ?>
//         <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
//         <?php

//     }
//     else
//     echo 'Data Not Deleted';

// }
if(isset($_GET['delete_vote']))
{
    $UID=$_GET['delete_vote'];
    $query="DELETE FROM votes WHERE UID='$UID'";
    $query_run=mysqli_query($conn,$query);
    if($query_run)

    {
        echo "<script>alert('Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php


    }
    else
    echo "<script>alert('Data Not Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=admindashtest.php";/>
        <?php
    
}
?>