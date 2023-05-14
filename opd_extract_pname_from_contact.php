<?php  
	// Get the user id  
	$contact = $_REQUEST['contact']; 
	// Database connection 
	include 'connection.php';
	if ($contact !== "") 
	{    
		
		$i=[];
		$adata=[];
		$sql= "SELECT First_Name,Last_Name FROM opd_patient_booking WHERE Mobile='$contact';";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			$f = $row["First_Name"]; 
			$l=$row["Last_Name"]; 
			$n=$f." ".$l;
			array_push($i,$n);
			$adata[$n]=$n;
		}
		$str= implode(",",$adata);
		
		
	}   
	// Store it in a array 
	$result = array("$str"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
