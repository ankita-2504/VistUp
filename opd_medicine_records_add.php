<?php 

// Database connection
include 'connection.php';

// Insert data Query
$sql = "INSERT INTO opd_pharmacy_record ( Record_Id,Medicine_Name,Dosage,Timing,Description )
VALUES ( '".$_POST['r_id']."' , '".$_POST['medname']."' , '".$_POST['dosage']."','".$_POST['timing']."','".$_POST['descrip']."')";

if ($conn->query($sql) === TRUE) 
{
  echo 1;
} 
else
{
	echo 0;
}
?>