<?php   
session_start();   
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "complaint_registration_db";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 
    
    $username = $_POST['luname'];  
    $password = $_POST['lpassword'];  
    $_SESSION["uname"]=$username;
    
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login_details where user_name = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result); 
        $r="select role from login_details where user_name='$username'";
        $r1 = mysqli_query($con, $r);
        $row1=mysqli_fetch_array($r1);
        

        if($count == 1){  
            
           
            if($row1['role'] == 'a'){
            echo "<script> window.location='admin.php';</script>";
            }
            else{
                echo "<script> window.location='user.php';</script>";
            }
        }  
        else{  
            echo "<script>alert('Please Enter Correct Login Credentials');
               window.location='login.html';</script>"; 
        }     
        

?>  