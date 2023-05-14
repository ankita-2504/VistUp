<?php

	$id=$_POST['id'];

	include 'connection.php';
	include 'number_to_words_indian_format.php';
	$sql_display="SELECT * FROM opd_patient_booking WHERE Booking_Id='$id';";

	$res=$conn->query($sql_display);		

	

	if($res->num_rows>0)

	{

		while($row=$res->fetch_assoc())

		{

			$firstname=$row['First_Name'];
								$lastname=$row['Last_Name'];
								
								$mobile=$row['Mobile'];
								$d_id=$row['Doctor_Id'];
								$time=$row['Time'];
								$da2=$row['Appoint_Date'];
								$orgDate2 = $da2;  
    $appoint_date = date("d-m-Y", strtotime($orgDate2));  
		}

	}

	$sq="SELECT Patient_Id,Gender, Age,Town_Village FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
						$r1=$conn->query($sq);		
						
						if($r1->num_rows>0)
						{
							while($row=$r1->fetch_assoc())
							{
								$p_id=$row['Patient_Id'];
								
								$gender=$row['Gender'];
								$a=$row['Age'];
								$addr=$row['Town_Village'];
							}
						}
						if ($gender == 'Male')
							$salute='Mr.';
						else
							$salute='Mrs.';
	
$sql="SELECT Doctor_Name,Registration_No FROM doctor_master WHERE Doctor_Id='$d_id';";
						$r=$conn->query($sql);		
						
						if($r->num_rows>0)
						{
							while($row=$r->fetch_assoc())
							{
								$doctor=$row['Doctor_Name'];
								$reg=$row['Registration_No'];
								
							}
						}
						
						
						$sql0="SELECT Fees FROM doctor_fees_master WHERE Doctor_Id='$d_id' AND Fees_Type='OPD';";

	$r0=$conn->query($sql0);		

	

	if($r0->num_rows>0)

	{

		while($row=$r0->fetch_assoc())

		{

			$fees=$row['Fees'];

			//$fees=$row['Opd_Fees'];

		}

	}
						
						
						$sql2="SELECT Appointment_Id FROM opd_patient_appointment WHERE Booking_Id='$id';";
						$result2=$conn->query($sql2);
						$i=0;
						while($row=$result2->fetch_assoc())
						{
							$aid = $row["Appointment_Id"];
							
						}
						$sql9="SELECT *FROM payment WHERE Payment_Type='OPD' AND Payment_Type_Id='$aid';";
						$result9=$conn->query($sql9);
						
						while($row=$result9->fetch_assoc())
						{
							$da=$row["Payment_Date"];
							$orgDate = $da;  
    $date = date("d-m-Y", strtotime($orgDate));  
							$inid = $row["Invoice_No"];
							//$aid = $row["Invoice_Amount"];
							$discount = $row["Discount"];
							$amount = $row["Net_Amount"];
							$paytype = $row["Pay_Mode"];
							$transaction = $row["Transaction_Id"];
							
						}
	?>
<div class="row">
													        <div class="col-md-6">
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient ID:  </b> 	<?php echo $p_id; ?></p>
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient Name:  </b>	<?php echo $firstname." ".$lastname; ?></p>
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Age/Gender:  </b>	<?php echo $a." /" .$gender; ?></p>
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Address:  </b>	<?php echo $addr; ?></p>
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Contact:  </b> <?php echo $mobile; ?></p>
													        </div>
													        <div class="col-md-6 text-right">
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Invoice No:  </b> <?php echo $inid; ?></p>
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Invoice Date:  </b> <?php echo $date;?></p>
																<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Appointment Date:  </b> <?php echo $appoint_date;?> </p>
																
													        </div>
													    </div>
														
														
														
														
														<div class="cs-table cs-style1" style="margin-top:20px;">
															<div class="cs-round_border" style="margin-top: 0; line-height: 1.5em;">
																<div class="cs-table_responsive" style="margin-top: 0; line-height: 1.5em;">
																	<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: intial; border-spacing: 2px; border-color: grey;font-size: 13px;">
																		<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
																			<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
																				<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Sl. No</th>
																				<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Charge Head</th>
																				<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Description</th>
																				<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Amount</th>
																				<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Pay Mode</th>
																				<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Payment ID</th>
																				
																			</tr>
																		</thead>
																		<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
																		  
																			<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
																				<td class="cs-width_1" style="width: 5%; padding: 10px 20px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;">1</td>
																				<td class="cs-width_2" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;">OPD Consulation</td>
																				<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $doctor;?></td>
																				<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $fees; ?></td>
																				<td class="cs-width_3" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $paytype; ?></td>
																				<td class="cs-width_4" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $transaction; ?></td>
																				
																			</tr>
																			
																			
																		</tbody>
																	</table>
																</div>
																<div class="cs-invoice_footer cs-border_top" style="margin-top: 0; line-height: 1.5em; display: flex; box-sizing: border-box; flex-direction: row-reverse;">
																	<div class="cs-right_footer" style="border-color: grey; color: #555">
																		<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: initial; border-spacing: 2px; border-color: grey; border-left: 1px solid #eaeaea;font-size: 13px;">
																			<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
																				<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit;">
																					<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em;">Total: </td>
																					<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"><?php echo $fees;?></td>
																					<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"></td>
																				</tr>
																				<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit; border-top: 1px solid #eaeaea;">
																					<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em;">Discount: </td>
																					<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"><?php echo $discount;?></td>
																					<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"></td>
																				</tr>
																				<tr class="cs-border_left" style="display: table-row; vertical-align: inherit; border-color: inherit; border-top: 1px solid #eaeaea;">
																					<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em;">Total Amount to be paid: </td>
																					<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"><?php echo $amount;?></td>
																					
																					<td class="cs-width_1 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"></td>
																				</tr>
																				<tr>
																					<td class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em;">Amount In words: </td>
																					<td class="cs-width_4 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" style="padding:5px 10px; line-height: 1.55em;"><?php echo convertNumberToWordsForIndia($amount); ?></td>
																					
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																
															</div>
														</div>
														