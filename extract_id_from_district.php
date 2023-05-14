<?php  
	$city = $_REQUEST['city'];
	//$d_name = $_REQUEST['name']; 
	include 'connection.php';
	if ($city !== "") 
	{ 
		$query = mysqli_query($conn, "SELECT District_Id FROM district_master WHERE District_Name='$city'"); 
		$row = mysqli_fetch_array($query); 
		
		$city_id = $row["District_Id"]; 
	
		
		
		
	}   
	// Store it in a array 
	$result = array("$city_id"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
