<?php 

// Database connection
$conn = new mysqli('localhost', 'Ankita', '1234', 'sem6_project');

// Insert data Query
$sql = "INSERT INTO doctor_appointment ( d_id,days,morning,evening )
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