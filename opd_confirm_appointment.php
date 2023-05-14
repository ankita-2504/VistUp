<?php

	$b_id=$_POST['id'];

	include 'connection.php';

	$sql_display="SELECT Doctor_Id FROM opd_patient_booking WHERE Booking_Id='$b_id';";

	$res=$conn->query($sql_display);		

	

	if($res->num_rows>0)

	{

		while($row=$res->fetch_assoc())

		{

			$d_Id=$row['Doctor_Id'];

			

		}

	}

	$sql="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_Id';";

	$r=$conn->query($sql);		

	

	if($r->num_rows>0)

	{

		while($row=$r->fetch_assoc())

		{

			$doctor=$row['Doctor_Name'];

			//$fees=$row['Opd_Fees'];

		}

	}
	$sql0="SELECT Fees FROM doctor_fees_master WHERE Doctor_Id='$d_Id' AND Fees_Type='OPD';";

	$r0=$conn->query($sql0);		

	

	if($r0->num_rows>0)

	{

		while($row=$r0->fetch_assoc())

		{

			$fees=$row['Fees'];

			//$fees=$row['Opd_Fees'];

		}

	}

	

	?>

	<div class="row">

		<div class="col-md-12">

			<div class="form-group">

				<label for="exampleInputEmail3">Doctor Name:<span class="text-danger">*</span></label>

				<input type="text" class="form-control" id="dname" name="dname" value="<?php echo $doctor?>" placeholder="eg: John" readonly>

				

			</div>

		</div>

		<div class="col-md-6">

			<div class="form-group">

				<label for="exampleInputPassword4">Doctor Fees:<span class="text-danger">*</span> </label>

				<input type="text" class="form-control" id="fees" name="fees" value="<?php echo $fees?>"  placeholder="eg: Smith" readonly>

			</div>

		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<label for="amount">Net Pay</label>
				<input type="text" class="form-control" id="amount" name="amount"  value="<?php echo $fees?>"   readonly>
			</div>
		</div>

	</div>



