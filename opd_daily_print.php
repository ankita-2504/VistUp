<?php

	$to=$_POST['to'];
	
	$from=$_POST['from'];
	
	$pay=$_POST['pay'];
	$doc=$_POST['doc'];
	$total=0;
	include 'connection.php';
	include 'number_to_words_indian_format.php';
	
	$s="SELECT Doctor_Id FROM doctor_master WHERE Doctor_Name='$doc';";
	$r=$conn->query($s);		
	
	if($r->num_rows>0)
	{
		while($row=$r->fetch_assoc())
		{
			$did=$row['Doctor_Id'];
			//echo $did;
		}
	}
	
	?>
	
	<div class="row">
		<div class="col-md-6">
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>From:  </b> 	<?php $orgDate1 = $from;  
    $fr = date("d-m-Y", strtotime($orgDate1));  echo $fr; ?></p>
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>To:  </b>	<?php $orgDate = $to;  
    $t= date("d-m-Y", strtotime($orgDate));   echo $t; ?></p>
		</div>
		<div class="col-md-6 text-right">
			
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Receipt Date:  </b> <?php $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') ); echo $date->format('d-m-Y');?></p>
			
			
		</div>
	</div>
	<div class="cs-table cs-style1" style="margin-top:20px;">
		<div class="cs-round_border" style="margin-top: 0; line-height: 1.5em;">
			<div class="cs-table_responsive" style="margin-top: 0; line-height: 1.5em;">
				<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: intial; border-spacing: 2px; border-color: grey;font-size: 13px;">
					<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
						<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Date</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Patient Id</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Patient Name</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Doctor</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Fees</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:10px 25px; line-height: 1.55em; text-align: left; color: #555 ">Pay Mode</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Transaction Id</th>
							
						</tr>
					</thead>
	
					<?php
					
					if($pay == 'all' && $doc == 'all')
					{
						$sql="SELECT * FROM opd_patient_appointment WHERE Confirm_Date BETWEEN '$from' AND '$to';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())

							{
								$app_id =$row["Appointment_Id"];

								$book_id = $row["Booking_Id"]; 

								$doctor_id = $row["Doctor_Id"]; 

								$patient_id = $row["Patient_Id"];

								$amount= $row['Amount'];

								$paymode=$row['Pay_Mode'];

								$transaction=$row['Transaction_Id'];

								$da=$row['Confirm_Date'];
								$orgDate3 = $da;  
    $date = date("d-m-Y", strtotime($orgDate3));  
								

								$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$doctor_id';";

								$r=$conn->query($sql2);		

								

								if($r->num_rows>0)

								{

									while($row=$r->fetch_assoc())

									{

										$d_name=$row['Doctor_Name'];

									}

								}

								$sq="SELECT First_Name,Last_Name FROM patient_master WHERE Patient_Id='$patient_id';";

								$r1=$conn->query($sq);		

								

								if($r1->num_rows>0)

								{

									while($row=$r1->fetch_assoc())

									{

										$f=$row['First_Name'];

										$l=$row['Last_Name'];

									}

								}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $patient_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $f." ".$l;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $d_name;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  $total=$total+$amount;echo $amount;?></td>
										<td class="cs-width_4" style="padding: 10px 55px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $paymode;?></td>
										<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $transaction;?></td>
										
									</tr>
									
									
									
								</tbody>
								<?php
								

							}

						}
					}
					else if ($doc == 'all')
					{
						$sql="SELECT * FROM opd_patient_appointment WHERE Confirm_Date BETWEEN '$from' AND '$to' AND Pay_Mode ='$pay';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())
							{

								$app_id =$row["Appointment_Id"];

								$book_id = $row["Booking_Id"]; 

								$doctor_id = $row["Doctor_Id"]; 

								$patient_id = $row["Patient_Id"];

								$amount= $row['Amount'];

								$paymode=$row['Pay_Mode'];

								$transaction=$row['Transaction_Id'];

								$date=$row['Confirm_Date'];

								

								$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$doctor_id';";

								$r=$conn->query($sql2);		

								

								if($r->num_rows>0)

								{

									while($row=$r->fetch_assoc())

									{

										$d_name=$row['Doctor_Name'];

									}

								}

								$sq="SELECT First_Name,Last_Name FROM patient_master WHERE Patient_Id='$patient_id';";

								$r1=$conn->query($sq);		

								

								if($r1->num_rows>0)

								{

									while($row=$r1->fetch_assoc())

									{

										$f=$row['First_Name'];

										$l=$row['Last_Name'];

									}

								}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $patient_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $f." ".$l;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $d_name;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  $total=$total+$amount;echo $amount;?></td>
										<td class="cs-width_4" style="padding: 10px 55px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $paymode;?></td>
										<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $transaction;?></td>
										
									</tr>
									
									
								</tbody>
								<?php
								

							}

						}
					}
					else if ($pay == 'all')
					{
						$sql="SELECT * FROM opd_patient_appointment WHERE Confirm_Date BETWEEN '$from' AND '$to' AND Doctor_Id ='$did';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())

							{	$app_id =$row["Appointment_Id"];

								$book_id = $row["Booking_Id"]; 

								$doctor_id = $row["Doctor_Id"]; 

								$patient_id = $row["Patient_Id"];

								$amount= $row['Amount'];

								$paymode=$row['Pay_Mode'];

								$transaction=$row['Transaction_Id'];

								$date=$row['Confirm_Date'];

								

								$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$doctor_id';";

								$r=$conn->query($sql2);		

								

								if($r->num_rows>0)

								{

									while($row=$r->fetch_assoc())

									{

										$d_name=$row['Doctor_Name'];

									}

								}

								$sq="SELECT First_Name,Last_Name FROM patient_master WHERE Patient_Id='$patient_id';";

								$r1=$conn->query($sq);		

								

								if($r1->num_rows>0)

								{

									while($row=$r1->fetch_assoc())

									{

										$f=$row['First_Name'];

										$l=$row['Last_Name'];

									}

								}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $patient_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $f." ".$l;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $d_name;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  $total=$total+$amount;echo $amount;?></td>
										<td class="cs-width_4" style="padding: 10px 55px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $paymode;?></td>
										<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $transaction;?></td>
										
									</tr>
									
									
								</tbody>
								<?php
								

							}

						}
					}
					else
					{
						$sql="SELECT * FROM opd_patient_appointment WHERE Confirm_Date BETWEEN '$from' AND '$to' AND Doctor_Id ='$did' AND Pay_Mode='$pay';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())
							{
								$app_id =$row["Appointment_Id"];

								$book_id = $row["Booking_Id"]; 

								$doctor_id = $row["Doctor_Id"]; 

								$patient_id = $row["Patient_Id"];

								$amount= $row['Amount'];

								$paymode=$row['Pay_Mode'];

								$transaction=$row['Transaction_Id'];

								$date=$row['Confirm_Date'];

								

								$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$doctor_id';";

								$r=$conn->query($sql2);		

								

								if($r->num_rows>0)

								{

									while($row=$r->fetch_assoc())

									{

										$d_name=$row['Doctor_Name'];

									}

								}

								$sq="SELECT First_Name,Last_Name FROM patient_master WHERE Patient_Id='$patient_id';";

								$r1=$conn->query($sq);		

								

								if($r1->num_rows>0)

								{

									while($row=$r1->fetch_assoc())

									{

										$f=$row['First_Name'];

										$l=$row['Last_Name'];

									}

								}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $patient_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $f." ".$l;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $d_name;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  $total=$total+$amount;echo $amount;?></td>
										<td class="cs-width_4" style="padding: 10px 55px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $paymode;?></td>
										<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $transaction;?></td>
										
									</tr>
									
									
									
								</tbody>
								<?php
								

							}

						}
					}	
					?>
				</table>
			</div>
			<div class="cs-invoice_footer cs-border_top" style="margin-top: 0; line-height: 1.5em; display: flex; box-sizing: border-box; flex-direction: row-reverse;">
				<div class="cs-right_footer" style="border-color: grey; color: #555">
					<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: initial; border-spacing: 2px; border-color: grey; border-left: 1px solid #eaeaea;font-size: 13px;">
						<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
							<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit;">
								<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em;">Total: </td>
								<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"><?php echo $total;?></td>
								<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"></td>
							</tr>
							
							<tr>
								<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em;">Amount In words: </td>
								<td class="cs-width_4 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"><?php echo convertNumberToWordsForIndia($total); ?></td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>