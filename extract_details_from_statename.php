
<?php  

	// Get the user id  
	$name = $_REQUEST['c_state']; 
	// Database connection 
	include 'connection.php';
	if ($name !== "") 
	{ 
		// Get corresponding first name and  
		// last name for that user id     
		$query = mysqli_query($conn, "SELECT State_Id FROM state_master WHERE State_Name='$name'"); 
		$row = mysqli_fetch_array($query); 
		// Get the first name 
		$id = $row["State_Id"]; 
		
		//$test_price = $row["test_price"]; 
		$i=[];
		$adata=[];
		$sql= "select City_Name from city_master WHERE State_Id='$id' ORDER BY City_Name;";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			array_push($i,$row["City_Name"]);
			$adata[$row["City_Name"]]=$row["City_Name"];
		}
		$str= implode(" ",$i);
	}   
	// Store it in a array 
	$result = array("$str","$id"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
