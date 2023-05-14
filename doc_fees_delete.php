<?php
	// include database connection file

	include 'connection.php';
$f=0;
$dept=$_POST['dept'];
$id=$_POST['deleteId'];
$docid=$_POST['docid'];
$sql= "DELETE FROM doctor_fees_master WHERE Doctor_Id ='$docid' AND Fees_Type = '$id' AND Department='$dept' LIMIT 1;";		
	if ($conn->query($sql) === TRUE) 			
	{				$f=1;			}		
else			{				$f=0;			}
echo $f;?>

	
			