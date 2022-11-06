<?php
session_start();

include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="donar.css">
    <title>Volunteer Form</title>

</head>
<body>



<div class='hello' style="display:inline-block;">
    <img src="images/user2.png" class='im'>
<h1>Vlounteer Form</h1>
    <form action="volunteer.php" method="POST" allign="center">
        
        <input type="text" name="UserName" placeholder="Enter A Volunteer Name "required>
   
        <input type="text" name="CNIC" placeholder="Enter A Volunteer CNIC "required>

        
        <input type="text" name="Village"  placeholder="Enter Your Volunteer Village" required>

    
        <select required name="Type">
            <option hidden value="Volunteer"> Type Of User</option>

            <option value="Volunteer" >Volunteer</option>
            <option value="Donar">Donar</option>
            <!-- <option value="Accountant">Accountant</option>
            <option value="Donar">Donar</option>
            <option value="Beneficiary">Beneficiary</option> -->
        </select>
        <select required name="Appt">
            <option hidden value="Appointment">Appointment</option>
            <option value="President" >President</option>
            <option value="Boardmember">Board Member</option>
            <option value="Accountant">Accountant</option>
            <option value="Donar">Donar</option>
            <option value="Beneficiary">Beneficiary</option>
        </select>
             
        <select name="Refby">
           <option selected='selected'>Reffered By</option>
           <?php foreach ($users as $abc) 
            {
                
            echo "<option value='$abc[0]']>$abc[1]</option>";
            }
             ?>  
         </select> 
        
    
      <input type="date" name="DOR" placeholder="Enter Date " required>

           <!-- This Data will store in tha table of contact -->
             <!-- <select name="I_flag">
                <option value="hidden" >Select Contact type</option>
                <option value="email">email</option>
                <opiton value="telhome">telhome</option>
                <option value="teloffice">teloffice</option>
                <option value="mob">mobile</option>
                <option value="whatsapp">Whatsapp</opiton>
        </select> -->
       <br> <label for="Select Contact Type">Select Contact Type</label>
       
            
      <br> Email: <input type="checkbox" name="I_flag[]" id="email" onclick="number()" value='email'  style="width:auto;margin-left:5%;">
      <br> telhome: <input type="checkbox" name="I_flag[]" id="telhome" onclick="number()" value='telhome'  style="width:auto;margin-left:2%;">
      <br> teloffice: <input type="checkbox" name="I_flag[]" id="teloffice" onclick="number()" value='teloffice'style="width:auto;margin-left:2%;">
      <br> Mobile:  <input type="checkbox" name="I_flag[]" id="mob" onclick="number()" value='mob' style="width:auto;margin-left:3.3%;">
      <br> Whatsapp:<input type="checkbox" name="I_flag[]" id="whatsapp" onclick="number()" value='whatsapp' style="width:auto;margin-left:1%;">
<br>
        <!-- <label for="email">Email</label>
        <label for="telhome">Telephone Home</label>
        <label for="teloffice">Telephone Office</label>
        <label for="mob">Mobile Number</label>
        <label for="whatsapp">Whatsapp Number</label>
            -->
        <input type="email" name="email" id="emails" placeholder="Enter a Email  Here" style="display:none;">
        <input type="number" name="telhome" id="telhomes" placeholder="Enter a Telephone Number Here" style="display:none;">
        <input type="number" name="teloffice" id="teloffices" placeholder="Enter a Office Number Here" style="display:none;">
        <input type="number" name="mob" id="mobile" placeholder="Enter a Mobile Number Here" style="display:none;">
        <input type="number" name="whatsapp" id="wa" placeholder="Enter a Whatsappsss Number Here" style="display:none;">
        
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
       
       
        
    

        <!-- it will display on form  when checkedbox is checked -->

        <br><label for="Allow">AllowLogin:</label> 
        <input type="checkbox" id="AllowLogin" onclick="allow()" name='AllowLogin' style="width:auto;margin-left:2%;"><br>


        <input type="name" style="display:none;" id="Name" name="username" placeholder="Enter a Name">
        <input type="password" id="password" name="password" style="display:none;" placeholder="Enter a Password" >
        
        <br><input type="checkbox" id="pass" style="display:none;width:auto;margin-left:2%;" onclick='showpassword()' >
        <label name="show password" id='label' style="display:none;"  value="shhow pass" >Show Password</label>

        <!-- <input type="password" id="cp" name="confrimpassword" style="display:none;"   placeholder="confrom a Password" onclick=' return confrompassword()' > -->


        <?php
        // $username=$_POST['username'];
        // $password=$_POST['ppassword'];

        // $query="INSERT INTO user_login(username,password) VALUES('$username','$password')";
        // $result=mysqli_query($conn,$query);
        
        ?>
     
    <!-- <input type="password" id="cpassword" style="display:none;" placeholder=" Confrom your Password">

    <script>
    function confrom()
    
    document.getElementById('password');
    document.getElementById('cpassword');
    if(password!=cpassword)
    {
        alert('Password Didnt Match');
    }
    </script> -->

    <script>

    function allow()
    {
        if(AllowLogin.checked==true)
    {
        document.getElementById('Name').style.display="inline-block";
        document.getElementById('password').style.display="inline-block";
        // document.getElementById('cpassword').style.display="block";
        document.getElementById('label').style.display="inline-block";
        document.getElementById('pass').style.display="inline-block" ;
        // document.getElementById('cp').style.display="block";
    }
        else
        {
            document.getElementById('Name').style.display="none";
        document.getElementById('password').style.display="none";
        document.getElementById('label').style.display="none";
        document.getElementById('pass').style.display="none";
        // document.getElementById('cp').style.display="none";
        // document.getElementById('cpassword').style.display="none";
        }
    }
    </script>

    
  
  
       <input type="submit" value="submit" name="submit" class="submit" />

      

</html>
<script>
                function showpassword()
                {
                    var p=document.getElementById("password");
                    var cp=document.getElementById("cp");
                    if(p.type=="password")
                    {
                        p.type="text";
                    }
                    else
                    p.type="password";
                }

        
        // function confrompassword() {
        // var password = document.getElementById("password").value;
        // var confirmPassword = document.getElementById("cp").value;
        // if (password != confirmPassword) {
        //     alert("Passwords do not match.");
        //     return false;
        // }
        // return true;
    
                </script>