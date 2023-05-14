<?php  

	// Get the user id  
	$d_name = $_REQUEST['name']; 
	// Database connection 
	include 'connection.php';
	if ($d_name !== "") 
	{ 
		// Get corresponding first name and  
		// last name for that user id     
		$query = mysqli_query($conn, "SELECT Doctor_Id FROM opd_patient_appointment WHERE Appointment_Id='$d_name'"); 
		$row = mysqli_fetch_array($query); 
		// Get the first name 
	
		$dept = $row["Doctor_Id"]; 		$sql="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$dept';";	$r=$conn->query($sql);				if($r->num_rows>0)	{		while($row=$r->fetch_assoc())		{			$doctor=$row['Doctor_Name'];					}	}
	}   
	// Store it in a array 
	$result = array("$dept","$doctor"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
