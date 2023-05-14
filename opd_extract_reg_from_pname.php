<?php  
	// Get the user id  
	$name = $_REQUEST['name']; 
	$contact = $_REQUEST['contact']; 
	// Database connection 
	include 'connection.php';
	$f="";$f2="";
	if ($name !== "") 
	{    

		$count=substr_count($name, ' ');
		if($count == 1)
		{
			$arr=explode(" ",$name);
			$k=$arr[1];
			$sql= "SELECT Patient_Id FROM patient_master WHERE First_Name='$arr[0]' AND Last_Name='$arr[1]' AND (Mobile='$contact' OR Whatsapp='$contact' OR Guardian_Contact='$contact');";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				$f = $row["Patient_Id"]; 
			}		$sl= "SELECT Location FROM opd_patient_booking WHERE First_Name='$arr[0]' AND Last_Name='$arr[1]' AND Mobile='$contact';";		$resut=$conn->query($sl);		while($row=$resut->fetch_assoc())		{			$f2 = $row["Location"]; 		}
			$result = array("$f","$f2","$arr[0]","$k"); 
		}
		else
		{
			$arr=explode(" ",$name);
			$j=$arr[0];
			$k=$arr[1]." ".$arr[2];
			$l=$arr[2];
			$sql= "SELECT Patient_Id FROM patient_master WHERE First_Name='$j' AND Last_Name='$k' AND (Mobile='$contact' OR Whatsapp='$contact' OR Guardian_Contact='$contact');";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				$f = $row["Patient_Id"]; 
			}		$sl= "SELECT Location FROM opd_patient_booking WHERE First_Name='$j' AND Last_Name='$k' AND Mobile='$contact';";		$resut=$conn->query($sl);		while($row=$resut->fetch_assoc())		{			$f2 = $row["Location"]; 		}
			$result = array("$f","$f2","$arr[0]","$k"); 
		}
	}   
	// Store it in a array 
	

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
