<?php 
   
   $connection = mysqli_connect('localhost', 'root', '') or die ("Unable to connect");
   $db = mysqli_select_db($connection, 'complaint_registration_db') or die ("Unable to connect the database"); 
   $user=$_POST['usrname'];  
   $sql = "select * from login_details where user_name='$user'";
   $rs = mysqli_query($connection, $sql);
   $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);  
                                    
    $eid = $row['email_id'];
    $ph=$row['ph_no'];
  
    

    echo "<script>alert('Name : $user ; E-mail :  $eid ; Contact :  $ph');
               window.location='admin.php';</script>";
  

  
?>