
<?php  
	include 'connection.php';
	// Get the user id  
	$d_name = $_REQUEST['d_name']; 
	// Database connection 
	
	if ($d_name !== "") 
	{ 
		// Get corresponding first name and  
		// last name for that user id     
		$query = mysqli_query($conn, "SELECT Doctor_Id FROM doctor_master WHERE Doctor_Name='$d_name'"); 
		$row = mysqli_fetch_array($query); 
		// Get the first name 
		$d_id = $row["Doctor_Id"]; 
		//$fees = $row["salary"]; 
		//$dept = $row["specialization"]; 
		//$test_price = $row["test_price"]; 
		$i=[];
		$adata=[];
		$sql= "select Days from opd_doctor_appointment_master WHERE Doctor_Id='$d_id';";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			array_push($i,$row["Days"]);
			$adata[$row["Days"]]=$row["Days"];
		}
		$str= implode(" ",$i);
		
		
	}   
	// Store it in a array 
	$result = array("$str","$d_id"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
