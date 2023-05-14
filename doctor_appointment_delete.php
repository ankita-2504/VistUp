<?php
	// include database connection file

	include 'connection.php';
$f=0;
$id=$_POST['deleteId'];
$docid=$_POST['docid'];
$sql= "DELETE FROM opd_doctor_appointment_master WHERE Doctor_Id ='$docid' AND Days = '$id' limit 1;";		
	if ($conn->query($sql) === TRUE) 			
	{				$f=1;			}		
else			{				$f=0;			}
echo $f;?>

	
			