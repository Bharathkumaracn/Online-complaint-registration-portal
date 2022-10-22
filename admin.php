<?php
session_start();
$un = $_SESSION["uname"];

$connection = mysqli_connect('localhost', 'root', '') or die ("Unable to connect");
$db = mysqli_select_db($connection, 'complaint_registration_db') or die ("Unable to connect the database"); 
$query =  "select * from complaint_details";
$result = mysqli_query($connection,$query);
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="user.css">
<title>Welcome Admin</title>
</head>   

<body>

<div class="head">
    <div class="inline_block">
        <h1>Complaint Registration Portal</h1>
    </div>
</div>
<div>
    <div class="name"><h3> Welcome Admin : <?php echo $un ?></h3> </div>
<div class="logoutform">
    <form action="logout.php" >
        <input type="submit" class="logoutbtn" value="Logout" />
</form></div></div>

<div class="userinfo">

<form  method="post" action="userinfo.php" >
Enter Name to get user details :
<input class="username" type="text" id="usrname" name="usrname" placeholder="Username" >

<input type="submit" class="btn" value="Search">
</form>

</div>

<div class="container">
            
     <table class="table table-bordered">
        <tr>
            <th class="">Complaint Id</th>
            <th class="">User</th>
            <th class="colheader1"> Complaint</th>
            <th class="colheader">Date</th>
            <th class="colheader">Current Status </th>
            <th class="colheader">Edit Status</th>
            
        </tr>

                            <?php 
                                    
                                    //if( $result ){
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        
                                        $complaint = $row['complaint'];
                                        $dat=$row['date'];
                                        $currstatus = $row['status'];
                                        $cid = $row['c_id'];
                                        $uname=$row['user_name'];
                            ?>
                                    <tr>
                                        <td> <?php echo $cid ?></td>
                                        <td> <?php echo $uname ?></td>
                                        <td><?php echo $complaint ?></td>
                                        <td><?php echo $dat ?></td>
                                        <td><?php echo $currstatus ?></td>
                                        <td>
                                        <form method="POST" action="status.php">
                                        <select name="editstat" class="drop">
                                        <option selected diasbled>--select--</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In-Progress">In-Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Rejected">Rejected</option>
                                        </select>
                                        <input type="hidden" name="cid"  value="<?php echo $cid ?>"></input>
                                        <button type="submit" class="submit" name="submit" >Save</button>
                                        </form>
                                        </td>
                                        
                                        
                                            
                                    </tr>        
                            <?php 
                           
                                    } 
                            ?>                                                                    
                                   

                        </table>
                   
        </div>
                                

</body>
</html>