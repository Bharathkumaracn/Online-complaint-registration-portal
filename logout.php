<?php
if(isset($_GET['logout'])) { 

session_start();

session_destroy();



exit;

}
echo "<script> window.location='login.html';</script>";
?>