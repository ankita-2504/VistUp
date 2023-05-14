<?php
	$a_id=$_POST['id'];
	include 'connection.php';
	$sql_display="SELECT Booking_Id,Doctor_Id,Patient_Id FROM opd_patient_appointment WHERE Appointment_Id='$a_id';";
	$res=$conn->query($sql_display);		
	
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc())
		{
			$b_Id=$row['Booking_Id'];
			$d_Id=$row['Doctor_Id'];
			$p_Id=$row['Patient_Id'];
			
		}
	}
	$sql="SELECT Doctor_Name,Opd_Fees FROM doctor_master WHERE Doctor_Id='$d_Id';";
	$r=$conn->query($sql);		
	
	if($r->num_rows>0)
	{
		while($row=$r->fetch_assoc())
		{
			$doctor=$row['Doctor_Name'];
			$fees=$row['Opd_Fees'];
		}
	}
	$sq="SELECT First_Name,Last_Name,Gender, Date_Of_Birth,Town_Village,Mobile FROM patient_master WHERE Patient_Id='$p_Id';";
	$r1=$conn->query($sq);		
	
	if($r1->num_rows>0)
	{
		while($row=$r1->fetch_assoc())
		{
			$firstname=$row['First_Name'];
			$lastname=$row['Last_Name'];
			$gender=$row['Gender'];
			$dob=$row['Date_Of_Birth'];
			$addr=$row['Town_Village'];
			$mobile=$row['Mobile'];
		}
	}
	$dateOfBirth = $dob;
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dateOfBirth), date_create($today));
	$a=$diff->format('%y');
	
	$sql_display1="SELECT Time,Appoint_Date FROM opd_patient_booking WHERE Booking_Id='$b_Id';";
	$res1=$conn->query($sql_display1);		

	if($res1->num_rows>0)
	{
		while($row=$res1->fetch_assoc())
		{
			
			$time=$row['Time'];
			$appoint_date=$row['Appoint_Date'];
			
		}
	}
	$sql3="SELECT * FROM payment WHERE Payment_Type_Id ='$a_id';";
	$result3=$conn->query($sql3);
	
	while($row=$result3->fetch_assoc())
	{
		$date= $row['Payment_Date'];
		$invoice = $row['Invoice_No'];
		
		$discount=$row['Discount'];
		$amount=$row['Net_Amount'];
		$paytype=$row['Pay_Mode'];
		$transaction=$row['Transaction_Id'];
	}
	
	?>
	
		<div class="cs-invoice_head cs-type1 cs-mb25">
			<div class="cs-invoice_left" align="left">
				
				
				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Patient ID:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1.5em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $p_Id;?></span>
				</p>

				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Patient Name:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1.5em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $firstname." ".$lastname;?></span>
				</p>

				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Age/Gender:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1.5em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $a." /" .$gender;?></span>
				</p>
				
				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Address:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1.5em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $addr;?></span>
				</p>
				
				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Patient Contact:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $mobile;?></span>
				</p>

				
			</div>

		
			<div class="cs-invoice_right cs-text_right" align="right">
				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Invoice No:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1.5em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $invoice;?></span>
				</p>
				
				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Invoice Date:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php 
					 echo $date;?></span>
				</p>
				
				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Appointment Date:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1.5em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $appoint_date;?></span>
				</p>

				<p style="margin-bottom: 0.1px;">
				  <span class="cs-primary_color" style="font-weight: bold; color: #555; font-size: 15px;">Appointment Time:  </span>
				  <span style="margin-top: 0; line-height: 1.5em; display: margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; color: #777777;">	<?php echo $time;?></span>
				</p>
			</div>
		</div>
		<br><br>
		<div class="cs-table cs-style1">
			<div class="cs-round_border" style="margin-top: 0; line-height: 1.5em;">
				<div class="cs-table_responsive" style="margin-top: 0; line-height: 1.5em;">
					<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: intial; border-spacing: 2px; border-color: grey;">
						<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
							<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
								<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 20px; line-height: 1.55em; text-align: left; color: #555 ">Sl. No</th>
								<th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em; text-align: left; color: #555 ">Charge Head</th>
								<th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em; text-align: left; color: #555 ">Description</th>
								<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em; text-align: left; color: #555 ">Amount</th>
								<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em; text-align: left; color: #555 ">Pay Mode</th>
								<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em; text-align: left; color: #555 ">Transaction Id</th>
							</tr>
						</thead>
						<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
							
							<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
								<td class="cs-width_1" style="width: 5%; padding: 10px 20px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo '1';?></td>
								<td class="cs-width_2" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo 'OPD Consulation';?> </td>
								<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $doctor;?> </td>
								<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $fees;?> </td>
								<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $paytype;?> </td>
								<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $transaction;?> </td>
							
							</tr>
						</tbody>
					</table>
				</div>
				<div class="cs-invoice_footer cs-border_top" style="margin-top: 0; line-height: 1.5em; display: flex; box-sizing: border-box; flex-direction: row-reverse;">
					
					<div class="cs-right_footer" style="border-color: grey; color: #555">
						<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: initial; border-spacing: 2px; border-color: grey; border-left: 1px solid #eaeaea;">
							<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit;">
									<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em;">Total: </td>
									<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding: 10px 15px; line-height: 1.55em;"><?php echo $fees;?></td>
									<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding: 10px 15px; line-height: 1.55em;"></td>
								</tr>
								<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit; border-top: 1px solid #eaeaea;">
									<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em;">Discount: </td>
									<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding: 10px 15px; line-height: 1.55em;"><?php echo $discount;?></td>
									<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding: 10px 15px; line-height: 1.55em;"></td>
								</tr>
								<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit; border-top: 1px solid #eaeaea;">
									<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding: 10px 15px; line-height: 1.55em;">Total Amount to be paid: </td>
									<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding: 10px 15px; line-height: 1.55em;"><?php echo $amount;?></td>
									<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding: 10px 15px; line-height: 1.55em;"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
		
		
	</div>


