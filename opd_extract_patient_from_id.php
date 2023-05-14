<?php  
	include 'connection.php';
	$id = $_REQUEST['id']; 
	//$contact = $_REQUEST['contact']; 
	// Database connection 
	
	$f="";
	if ($id !== "") 
	{    
		
		$sql= "SELECT First_Name,Last_Name,Gender,Age,Mobile FROM patient_master WHERE Patient_Id='$id';";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			$f = $row["First_Name"]; 
			$l = $row["Last_Name"]; 
			$g = $row["Gender"]; 
			$a = $row["Age"]; 
			$m = $row["Mobile"]; 
		}
		$n=$f." ".$l;
		
	}   
	// Store it in a array 
	$result = array("$n","$a","$g","$m"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
