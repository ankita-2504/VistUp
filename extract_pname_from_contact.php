<?php  
	// Get the user id  
	$contact = $_REQUEST['contact']; 
	// Database connection 
	$conn = mysqli_connect("localhost", "Ankita", "1234", "eastmed"); 
	if ($contact !== "") 
	{    
		
		$i=[];
		$adata=[];
		$sql= "SELECT firstname,lastname FROM patient_master WHERE mobile='$contact' OR whatsapp='$contact' OR guardian_contact='$contact';";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			$f = $row["firstname"]; 
			$l=$row["lastname"]; 
			$n=$f.$l;
			array_push($i,$n);
			$adata[$f]=$n;
		}
		$str= implode(" ",$adata);
		
		
	}   
	// Store it in a array 
	$result = array("$str"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
