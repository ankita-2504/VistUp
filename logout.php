<?php
include 'connection.php';
session_start();
session_destroy();
date_default_timezone_set("Asia/Kolkata");
$time = date("H:i:s");
$date = date("d-m-Y");
$id=$_SESSION["cus"]["Loginid"];
echo $id;

$abc="UPDATE `login_logout_timings` SET `Logout_Date`='$date',`Logout_Time`='$time' WHERE Login_Id='$id';";
if ($conn->query($abc) === TRUE) 
{
	header("location:index.php");
	
}

exit;
?>