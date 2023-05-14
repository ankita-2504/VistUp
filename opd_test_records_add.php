<?php 

// Database connection
include 'connection.php';

// Insert data Query
$sql = "INSERT INTO opd_diagnostics_record ( Record_Id,Test_Name,Test_Type ) VALUES ( '".$_POST['r_id']."' , '".$_POST['path']."' , '".$_POST['type']."')";

if ($conn->query($sql) === TRUE) 
{
  echo 1;
} 
else
{
	echo 0;
}
?>