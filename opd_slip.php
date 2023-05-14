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
								$da2=$row['Appoint_Date'];
								$orgDate2 = $da2;  
    $appoint_date = date("d-m-Y", strtotime($orgDate2));  

		}

	}

	$sq="SELECT Patient_Id,Gender, Date_Of_Birth,Town_Village FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
						$r1=$conn->query($sq);		
						
						if($r1->num_rows>0)
						{
							while($row=$r1->fetch_assoc())
							{
								$p_id=$row['Patient_Id'];
								
								$gender=$row['Gender'];
								$dob=$row['Date_Of_Birth'];
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

	












<p style="margin-bottom: 0.1px;color:#000;line-height:19px;">Dear <?php echo $salute.$firstname." ".$lastname;?> ,Thank you for your request for an outpatient clinic appointment.The details of your appointment are as follows:  </p>
														<br>
													    
													        
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Appointment ID:  </b> 	<?php echo $aid; ?></p>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient ID:  </b> 	<?php echo $p_id; ?></p>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient Name:  </b>	<?php echo $firstname." ".$lastname; ?></p>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Appointment Date:  </b>	<?php echo $appoint_date; ?></p>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Reporting Time:  </b>	<?php echo $time; ?></p>
														
													
														
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Doctor Name:  </b> <?php echo $doctor; ?></p>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Doctor Fees:  </b> <?php echo $fees; ?></p>
														