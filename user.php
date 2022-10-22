<?php
session_start();
$un = $_SESSION["uname"];
$connection = mysqli_connect('localhost', 'root', '') or die ("Unable to connect");
$db = mysqli_select_db($connection, 'complaint_registration_db') or die ("Unable to connect the database"); 
$query =  "select * from complaint_details where user_name= '$un' ";
$result = mysqli_query($connection,$query);

?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome User</title>
<link rel="stylesheet" href="user.css">
</head>
<body>
<div class="head">
    <div class="inline_block">
        <h1>Complaint Registration Portal</h1>
    </div></div>
    <div>
    <div class="name"><h3> Welcome user : <?php echo $un ?></h3> </div>
<div class="logoutform">
    <form action="logout.php" >
        <input type="submit" class="logoutbtn" value="Logout" />
</form></div></div>
<div class="imgform">
  <div class="info"><h2> Leave your Complaint Here</h2> </div>  
 <div class="imgdiv">
 <img src="http://pluspng.com/img-png/png-pointing-finger-pointing-finger-png-image-43096-878.png" style="transform:rotate()" width="150" height="150"/>
</div>     
<div class="formdiv">
<form action="complaint.php">
<textarea rows="6" cols="100" name="compl" placeholder="Describe your issue in detail..."></textarea>
</br>
<input type="submit" class="btn" value="Register">
</form>
</div></div>

<div class="container1">
            
                
                    
                        <table class="table">
                            <tr>
                                <th class="">Id</th>
                                <th class="colheader1"> Complaint</th>
                                <th class="colheader">Date</th>
                                <th class="colheader"> Status </th>
                            </tr>

                            <?php 
                                    
                                 
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $complaint = $row['complaint'];
                                        $dat=$row['date'];
                                        $currstatus = $row['status'];
                                        $cid=$row['c_id'];
                            ?>
                                    <tr>
                                        <td><?php echo $cid ?></td>
                                        <td><?php echo $complaint ?></td>
                                        <td><?php echo $dat ?></td>
                                        <td><?php echo $currstatus ?></td>
                                    </tr>        
                            <?php 
                                    } 
                            ?>                                                                    
                                   

                        </table>
                   
                
            
        </div>


</body>
</html>