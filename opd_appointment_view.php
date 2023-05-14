<?php
	$deleteId=$_POST['deleteId'];
	$conn = new mysqli('localhost', 'Ankita', '1234', 'eastmed');
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql= "SELECT * FROM opd_patient_booking WHERE booking_id='$deleteId';";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$bookid= $row["booking_id"];
			$firstname = $row["firstname"];
			$lastname = $row["lastname"];
			$location = $row["location"];
			$doctor =$row["doctor"];
			$time =$row["time"];
			$day =$row["day"];
			$appoint_date =$row["appoint_date"];
			$status=$row["status"];
		}
		?>
		<div class="col-md-6">
			<div class="appointment-table table-responsive">
				<h3>Appointment Information</h3>
				<table class="table table-appointment mb-4">
					<tr>
						<td style="width:25%">Name :</td>
						<td><?php echo $firstname." ".$lastname; ?></td>
					</tr>
					
					<tr>
						<td style="width: 40%">Date of Appointment:</td>
						<td><?php echo $chk; ?></td>
					</tr>
					<tr>
						<td style="width: 40%">Doctor Name:</td>
						<td>
						  <?php echo $doctor; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 40%">Day:</td>

						<td>  <?php echo $day; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 40%">Time:</td>
						<td><?php echo $time; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php
	}
?>