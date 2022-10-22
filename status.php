<?php 
   
   $connection = mysqli_connect('localhost', 'root', '') or die ("Unable to connect");
   $db = mysqli_select_db($connection, 'complaint_registration_db') or die ("Unable to connect the database"); 


   if(isset($_POST['submit'])) 
   { 
   $statupdate=$_POST['editstat']; 
   $cid = $_POST['cid'];
   $query =  "UPDATE complaint_details SET status='$statupdate' where c_id= '$cid'";
    $result = mysqli_query($connection,$query); 
   
   echo "<script> window.location='admin.php';</script>";
   } 
?>