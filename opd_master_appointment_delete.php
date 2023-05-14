<?php
	// include database connection file

	include 'connection.php';
	// delete data from student table..

	if (isset($_POST['deleteId'])) {
		
		$deleteId = $_POST['deleteId'];
		$d_Id = $_POST['d_id'];
		// implode function break the array in to string 
		$deleteId = implode(' ', $deleteId);
		//$elmts=[];
		$elmts = explode(' ',$deleteId);
		
		foreach($elmts as $item)
		{
			$query  = "DELETE FROM opd_doctor_appointment_master WHERE Doctor_Id ='$d_Id' AND Days= '$item'";

			$result = mysqli_query($conn, $query);
		}

		if ($result === true) 
		{
			echo 1;
		}
		else
		{
			echo 0;
		}

	}
	
?>