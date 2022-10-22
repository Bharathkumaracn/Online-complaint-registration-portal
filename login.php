<?php 
   
   $connection = mysqli_connect('localhost', 'root', '') or die ("Unable to connect");
   $db = mysqli_select_db($connection, 'complaint_registration_db') or die ("Unable to connect the database"); 
   $user=$_POST['uname'];
   $email = $_POST['uemail'];
   $pwd = $_POST['upassword'];
   $ph=$_POST['phno'];
   $r='u';
   $sql = "INSERT INTO login_details (user_name, email_id, password,role,ph_no) VALUES ('$user','$email', '$pwd','$r','$ph')";
   $rs = mysqli_query($connection, $sql);
   if($rs)
   {
      echo "<script>alert('Registered Successfully,Redirecting to Login page.');
               window.location='login.html';</script>";
      
   }



  
?>