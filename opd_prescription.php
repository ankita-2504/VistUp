<?php

	$a_id=$_POST['id'];

	include 'connection.php';

	$sql_display="SELECT * FROM opd_medical_record WHERE Record_Id='$a_id';";

	$res=$conn->query($sql_display);		

	

	if($res->num_rows>0)

	{

		while($row=$res->fetch_assoc())

		{

			$r_Id=$row['Record_Id'];
			$aid=$row['Appointment_Id'];
			$p_Id=$row['Patient_Id'];

			$d_Id=$row['Doctor_Id'];

			$height=$row['Height'];
			$medhist=$row['Medical_History'];
			$weight=$row['Weight'];

			$bp=$row['Blood_Pressure'];

			$diagnosis=$row['Diagnosis'];

			$advice=$row['Advice'];

			$da2=$row['Next_Visit'];
			$orgDate2 = $da2;  
    $next = date("d-m-Y", strtotime($orgDate2));  
			$da=$row['Date'];
			$orgDate = $da;  
    $date = date("d-m-Y", strtotime($orgDate));  
		}

	}

	$sql="SELECT Doctor_Name,Registration_No,Mobile,Email,Qualification,Specialization,Signature FROM doctor_master WHERE Doctor_Id='$d_Id';";
						$r=$conn->query($sql);		
						
						if($r->num_rows>0)
						{
							while($row=$r->fetch_assoc())
							{
								$doctor=$row['Doctor_Name'];
								$reg=$row['Registration_No'];
								$contact=$row['Mobile'];
								$email=$row['Email'];
								$qual=$row['Qualification'];
								
								$spec=$row['Specialization'];
								$Signature=$row['Signature'];
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
	$sq="SELECT Patient_Id, First_Name,Last_Name,Gender, Age,Town_Village FROM patient_master WHERE Patient_Id='$p_Id';";
						$r1=$conn->query($sq);		
						
						if($r1->num_rows>0)
						{
							while($row=$r1->fetch_assoc())
							{
								$p_id=$row['Patient_Id'];
								$f=$row['First_Name'];
								$n=$row['Last_Name'];
								$gender=$row['Gender'];
								$a=$row['Age'];
								$addr=$row['Town_Village'];
							}
						}
						if ($gender == 'Male')
							$salute='Mr.';
						else
							$salute='Mrs.';

	
	

	?>

	

		<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6 text-right">
			
			<img src="logo.jpeg" alt="" style="border: 0; width: 80px; height: 80px; vertical-align: middle;">
			
		</div>
	</div>
	
	
	
	<div class="row">
		
		<div class="col-md-6 text-left">
			
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px; font-size: 1.3em; "><b><?php echo $doctor; ?> </b> </p>
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b> <?php echo $qual; ?>/<?php echo $spec; ?> </b></p>
			
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Reg No.: <?php echo $reg; ?> </b> </p>
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b> <?php echo $contact;?>/ <?php echo $email; ?></b> </p>
			
		</div>
		
		<div class="col-md-6 text-right">
			<div class="col-md-12 text-right">
			<p style="margin-bottom:0.1px;color:#000;line-height:19px;">EastMed Hospitals & Diagnostics Pvt Ltd<br>47(35),BT Road,Kumarpara,PO: Talpukur<br>Barrackpore,Kolkata,700123<br> 8334857257/care@eastmedhospital.com</p>
			
		</div>
			
		</div>
	</div>
	
	<hr>
	 <div class="row" style="width:100%;float:left;margin:0;">
        			        <div class="col-md-6" style="width:50%;float:left;">
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;font-size: 1em; "><b>Appointment ID:  	<?php echo $aid; ?></b></p>
			<p style="margin-bottom:2px;color:#000;line-height:25px;font-size: 1em; "><b>Patient Name:  	<?php echo $f." ".$n; ?></b></p>
			
			<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Patient ID: </b>  	<?php echo $p_id; ?></p>
			
			<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Age/Gender:  </b>	<?php echo $a." /" .$gender; ?></p>
			 </div>
        			        <div class="col-md-6 text-right" style="width:50%;float:right;">
							<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Date:  </b> <?php echo $date;?></p>
            	
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Height:  </b><?php echo $height;?> cms</p>
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Weight:  </b><?php echo $weight;?> kg</p>
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Blood Pressure:  </b> <?php echo $bp;?></p>
        			        </div>
        			    </div>
	<br><br><br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Medical History:  </b> <br>
		
		<?php echo $medhist;?> 	</p>
	</div>
	<br><br><br><br>
	<?php

									$sql_display1="SELECT * FROM opd_pharmacy_record WHERE Record_Id='$r_Id';";

									$res1=$conn->query($sql_display1);		



									if($res1->num_rows>0)

									{	?>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Medicines Prescribed:  </b> 	</p>
		<br>
		
			
	</div>
	
	<div class="cs-table cs-style1" style="margin-top:20px;">
		<div class="cs-round_border" style="margin-top: 0; line-height: 1.5em;">
			<div class="cs-table_responsive" style="margin-top: 0; line-height: 1.5em;">
				<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: intial; border-spacing: 2px; border-color: grey;font-size: 13px;">
					<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
						<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Sl. No</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Medicine Name</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Dosage</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Timing</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Description</th>
							
						</tr>
					</thead>

							

							<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">

								<?php

										$num=1;

										while($row=$res1->fetch_assoc())

										{

											$med=$row['Medicine_Name'];

											$dosage=$row['Dosage'];

											$timing=$row['Timing'];

											$desc=$row['Description'];

											?>

												<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">

													<td class="cs-width_1" style="width: 5%; padding: 10px 20px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $num++;?></td>

													<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $med;?> </td>

													<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $dosage;?> </td>

													<td class="cs-width_4" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $timing;?> </td>

													<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $desc;?> </td>

												</tr>

											<?php

										}

									}

								?>

							</tbody>

						</table>

					</div>

				</div>

			</div>
			<br><br>
			<?php

								$sql_display1="SELECT * FROM opd_diagnostics_record WHERE Record_Id='$r_Id';";

								$res1=$conn->query($sql_display1);		



								if($res1->num_rows>0)

								{	?>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Tests Prescribed:  </b> 	</p>
		<br>
	</div>
	
	
	<div class="cs-table cs-style1" style="margin-top:20px;">
		<div class="cs-round_border" style="margin-top: 0; line-height: 1.5em;">
			<div class="cs-table_responsive" style="margin-top: 0; line-height: 1.5em;">
				<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: intial; border-spacing: 2px; border-color: grey;font-size: 13px;">
					<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
						<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Sl. No</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Diagnostics Name</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Type</th>
							
						</tr>
					</thead>

						

						<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">

							<?php

									$num=1;

									while($row=$res1->fetch_assoc())

									{

										$test=$row['Test_Name'];

										$type=$row['Test_Type'];

										

										?>

											<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">

												<td class="cs-width_1" style="width: 5%; padding: 10px 20px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $num++;?></td>

												<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $test;?> </td>

												<td class="cs-width_4" style="padding: 10px 15px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $type;?> </td>

											</tr>

										<?php

									}

								}

							?>

						</tbody>

					</table>

				</div>

			</div>

		</div>

		<br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Diagnosis:  </b> 	<br>
		<?php echo $diagnosis;?> 	</p>
	</div>
	<br><br>
	<div class = "row"style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Advice:  </b> 	<br>
		<?php echo $advice;?> 	</p>
	</div>
	<br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Next Visit:  </b> <br>
		<?php echo $next;?> 	</p>
	</div>
	
	<br><br>
	<div class = "row" style="float:right;margin:0;">
		<img src="uploads/<?php echo $Signature; ?>" alt="" id="preview" width="100" height="100" align="bottom">
		
	</div>
	
	<br><br><br>
	<div class="cs-note" align="center" style="margin-top:20px; line-height:1.5em; display:flex;">
															<div class="cs-note_right" style="width:100%;vertical-align: middle;">
																	
																 <p class="cs-primary_color">
																	<b  style="font-weight: bold;">***Get Well Soon***</b>
																 </p>
															 </div>
														</div>
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														

		