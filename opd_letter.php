<?php

	$id=$_POST['id'];

	include 'connection.php';

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
								$appoint_date=$row['Appoint_Date'];

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
	
$sql="SELECT Doctor_Name,Registration_No,Mobile,Email,Qualification,Specialization FROM doctor_master WHERE Doctor_Id='$d_id';";
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
								//$fees=$row['Opd_Fees'];
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
			<p style="margin-bottom:0.1px;color:#000;line-height:19px;">VisitUp Clinic Private Limited<br>NH-12 (Old NH-34) PO: Simhat<br>Haringhata,Nadia,741249<br> 23210073/care@visitupclinic.com</p>
			
		</div>
			
		</div>
	</div>
	
	<hr>
	 <div class="row" style="width:100%;float:left;margin:0;">
        			        <div class="col-md-6" style="width:50%;float:left;">
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;font-size: 1em; "><b>Appointment ID:   	<?php echo $aid; ?></b></p>
			<p style="margin-bottom:2px;color:#000;line-height:25px;font-size: 1em; "><b>Patient Name:  	<?php echo $firstname." ".$lastname; ?></b></p>
			<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Patient ID:</b>   	<?php echo $p_id; ?></p>
			
			<p style="margin-bottom:2px;color:#000;line-height:25px;"><b>Age/Gender:  </b>	<?php echo $a." /" .$gender; ?></p>
			 </div>
        			        <div class="col-md-6 text-right" style="width:50%;float:right;">
							<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Date:  </b> <?php $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') ); echo $date->format('d-m-Y');?>&emsp;&emsp;&emsp;</p>
            	
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Height:  </b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>Weight:  </b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
            	<p style="margin-bottom: 2px;color:#000;line-height:25px;"><b>B.P:  </b> &emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; &emsp;</p>
        			        </div>
        			    </div>
	<br><br><br><br><br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Medical History:  </b> 	</p>
	</div>
	<br><br><br><br><br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Medicines Prescribed:  </b> 	</p>
	</div>
	<br><br><br><br><br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Tests Prescribed:  </b> 	</p>
	</div>
	
	<br><br><br><br><br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Diagnosis:  </b> 	</p>
	</div>
	<br><br><br><br><br><br>
	<div class = "row"style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Advice:  </b> 	</p>
	</div>
	<br><br><br><br><br><br>
	<div class = "row" style="width:100%;float:left;margin:0;">
		<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Next Visit:  </b> </p>
	</div>
	<br><br><br><br><br><br>
	<div class="cs-note" align="center" style="margin-top:20px; line-height:1.5em; display:flex;">
															<div class="cs-note_right" style="width:100%;vertical-align: middle;">
																	
																 <p class="cs-primary_color">
																	<b  style="font-weight: bold;">***Get Well Soon***</b>
																 </p>
															 </div>
														</div>