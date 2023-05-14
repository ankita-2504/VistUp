
<?php

	$b_id=$_POST['id'];

	include 'connection.php';

	$sql_display="SELECT Appointment_Id,Is_Refund FROM opd_patient_appointment WHERE Booking_Id='$b_id';";

	$res=$conn->query($sql_display);		

	

	if($res->num_rows>0)

	{

		while($row=$res->fetch_assoc())

		{

			$a_Id=$row['Appointment_Id'];
			$yes=$row['Is_Refund'];
		}

	}
	
	
		$sql_display2="SELECT Net_Amount FROM payment WHERE Payment_Type_Id='$a_Id';";

		$res2=$conn->query($sql_display2);		

		

		if($res2->num_rows>0)

		{

			while($row=$res2->fetch_assoc())

			{
				$amt=$row['Net_Amount'];
			}

		}
		?>
										
										
		
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="form-group" align="center">
						<label>Amount To Refund</label>
						<input type="text" class="form-control" id="refamt" name="refamt" value="<?php echo $amt;?>"readonly>
					  
					</div>
				</div>
				
						
			</div>
			
		
		<?php
		
	
?>