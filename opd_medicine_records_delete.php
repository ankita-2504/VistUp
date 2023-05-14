<?php
	// include database connection file

	include 'connection.php';
$f=0;
$id=$_POST['deleteId'];
$record=$_POST['r_id'];
$sql= "DELETE FROM opd_pharmacy_record WHERE Record_Id ='$record' AND Medicine_Name = '$id';";		
	if ($conn->query($sql) === TRUE) 			
	{				$f=1;			}		
else			{				$f=0;			}
echo $f;?>

	
			