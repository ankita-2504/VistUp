<?php 

// Database connection
include 'connection.php';

// Insert data Query
$sql = "INSERT INTO opd_doctor_appointment_master ( Doctor_Id,Days,Morning_Time,Evening_Time )
VALUES ( '".$_POST['d_id']."' , '".$_POST['days']."' , '".$_POST['morning']."','".$_POST['evening']."')";

if ($conn->query($sql) === TRUE) 
{
  echo 1;
} 
else
{
	echo 0;
}
?>