<?php  
	$city = $_REQUEST['city'];
	//$d_name = $_REQUEST['name']; 
	include 'connection.php';
	if ($city !== "") 
	{ 
		$query = mysqli_query($conn, "SELECT City_Id FROM city_master WHERE City_Name='$city'"); 
		$row = mysqli_fetch_array($query); 
		
		$city_id = $row["City_Id"]; 
	
		$i=[];
		$adata=[];
		$sql= "select District_Name from district_master WHERE City_Id='$city_id'ORDER BY District_name;";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			
			
				array_push($i,$row["District_Name"]);
				$adata[$row["District_Name"]]=$row["District_Name"];
			
			
			
		}
		$str= implode(",",$i);
		
		
	}   
	// Store it in a array 
	$result = array("$str","$city_id"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
