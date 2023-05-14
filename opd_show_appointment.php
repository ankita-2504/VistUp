<?php
	$id=$_POST['id'];
	include 'connection.php';
	$output = "";
	$sql_display="SELECT First_Name,Last_Name,Mobile,Time,Day FROM opd_patient_booking WHERE Booking_Id='$id';";
	$res=$conn->query($sql_display);		
	
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc())
		{
			$f=$row['First_Name'];
			$l=$row['Last_Name'];
			?>

			<div class="appointment-table table-responsive">
				<h3>Paitent Information</h3>
				<table class="table table-appointment mb-4">
				
					<tr>
						<td style="width:50%">Name :</td>
						<td><?php echo $f." ".$l?> </td>
					</tr>
					<tr>
						<td style="width:50%">Contact :</td>
						<td><?php echo $row['Mobile'];?> </td>
					</tr>
					<tr>
						<td style="width:50%">Time :</td>
						<td><?php echo $row['Time'];?> </td>
					</tr>
					<tr>
						<td style="width:50%">Day :</td>
						<td><?php echo $row['Day'];?></td>
					</tr>
				  
				</table>
			  
			</div>
			<?php
		}
	}
?>
		
