<?php  
	include 'connection.php';
	$day = $_REQUEST['day'];
	$d_name = $_REQUEST['name']; 
	if ($d_name !== "") 
	{ 
		$query = mysqli_query($conn, "SELECT Doctor_Id FROM doctor_master WHERE Doctor_Name='$d_name'"); 
		$row = mysqli_fetch_array($query); 
		
		$d_id = $row["Doctor_Id"]; 
	
		$i=[];
		$adata=[];
		$sql= "select Morning_Time,Evening_Time from opd_doctor_appointment_master WHERE Doctor_Id='$d_id' and Days='$day';";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			
			if(empty($row["Morning_Time"]))
			{
				array_push($i,$row["Evening_Time"]);
				$adata[$row["Evening_Time"]]=$row["Evening_Time"];
			}
			else if(empty($row["Evening_Time"]))
			{
				array_push($i,$row["Morning_Time"]);
				$adata[$row["Morning_Time"]]=$row["Morning_Time"];
			}
			else
			{
				
				array_push($i,$row["Morning_Time"]);
				$adata[$row["Morning_Time"]]=$row["Morning_Time"];				array_push($i,$row["Evening_Time"]);				$adata[$row["Evening_Time"]]=$row["Evening_Time"];
			}
			
		}
		$str= implode(",",$i);
		
		
	}   
	// Store it in a array 
	$result = array("$str"); 

	// Send in JSON encoded form 
	$myJSON = json_encode($result); 
	echo $myJSON; 
?> 
