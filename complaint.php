<?php

session_start();
$un = $_SESSION["uname"];

$connection = mysqli_connect('localhost', 'root', '') or die ("Unable to connect");
   $db = mysqli_select_db($connection, 'complaint_registration_db') or die ("Unable to connect the database"); 

       $comp=htmlentities($_GET['compl']);
   
   $currdate = date('Y-m-d');
   $status='Recieved';
   $sql = "INSERT INTO Complaint_details (user_name, complaint, date,status) VALUES ('$un','$comp','$currdate','$status')";
   $rs = mysqli_query($connection, $sql);
   if($rs)
   {
      echo "<script>alert(' Complaint Registered Successfully');</script>";
      
   }
   echo "<script> window.location='user.php';</script>";
?>