<?php

	$to=$_POST['to'];
	
	$from=$_POST['from'];
	
	$status=$_POST['status'];
	$doc=$_POST['doc'];
	//$total=0;
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
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Status</th>
							
						</tr>
					</thead>
	
					<?php
					
					if($status == 'all' && $doc == 'all')
					{
						$sql="SELECT * FROM opd_patient_booking WHERE Appoint_Date BETWEEN '$from' AND '$to';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())
																				{
																					$firstname=$row['First_Name'];
																					$lastname=$row['Last_Name'];
																					
																					$mobile=$row['Mobile'];
																					$d_id=$row['Doctor_Id'];
																					$da=$row['Appoint_Date'];
																					$orgDate = $da;  
    $appoint_date = date("d-m-Y", strtotime($orgDate));  
																					$status=$row['Status'];
																					
																					$sq3="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_id';";
																					$r3=$conn->query($sq3);		
																					
																					if($r3->num_rows>0)
																					{
																						while($row=$r3->fetch_assoc())
																						{
																							$doctor=$row['Doctor_Name'];
																						}
																					}
																					
																					
																					
																					$sq="SELECT Patient_Id FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
																					$r1=$conn->query($sq);		
																					
																					if($r1->num_rows>0)
																					{
																						while($row=$r1->fetch_assoc())
																						{
																							$p_id=$row['Patient_Id'];
																						}
																					}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $appoint_date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $p_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $firstname." ".$lastname;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $doctor;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  echo $status;?></td>
										
									</tr>
									
									
									
								</tbody>
								<?php
								

							}

						}
					}
					else if ($doc == 'all')
					{
						$sql="SELECT * FROM opd_patient_booking WHERE Appoint_Date BETWEEN '$from' AND '$to' AND Status='$status';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())
																				{
																					$firstname=$row['First_Name'];
																					$lastname=$row['Last_Name'];
																					
																					$mobile=$row['Mobile'];
																					$d_id=$row['Doctor_Id'];
																					$da=$row['Appoint_Date'];
																					$orgDate = $da;  
    $appoint_date = date("d-m-Y", strtotime($orgDate));  
																					$status=$row['Status'];
																					
																					$sq3="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_id';";
																					$r3=$conn->query($sq3);		
																					
																					if($r3->num_rows>0)
																					{
																						while($row=$r3->fetch_assoc())
																						{
																							$doctor=$row['Doctor_Name'];
																						}
																					}
																					
																					
																					
																					$sq="SELECT Patient_Id FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
																					$r1=$conn->query($sq);		
																					
																					if($r1->num_rows>0)
																					{
																						while($row=$r1->fetch_assoc())
																						{
																							$p_id=$row['Patient_Id'];
																						}
																					}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $appoint_date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $p_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $firstname." ".$lastname;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $doctor;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  echo $status;?></td>
										
									</tr>
									
									
									
								</tbody>
								<?php
								

							}

						}
					}
					else if ($status == 'all')
					{
						$sql="SELECT * FROM opd_patient_booking WHERE Appoint_Date BETWEEN '$from' AND '$to' AND Doctor_Id='$did';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())
																				{
																					$firstname=$row['First_Name'];
																					$lastname=$row['Last_Name'];
																					
																					$mobile=$row['Mobile'];
																					$d_id=$row['Doctor_Id'];
																					$da=$row['Appoint_Date'];
																					$orgDate = $da;  
    $appoint_date = date("d-m-Y", strtotime($orgDate));  
																					$status=$row['Status'];
																					
																					$sq3="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_id';";
																					$r3=$conn->query($sq3);		
																					
																					if($r3->num_rows>0)
																					{
																						while($row=$r3->fetch_assoc())
																						{
																							$doctor=$row['Doctor_Name'];
																						}
																					}
																					
																					
																					
																					$sq="SELECT Patient_Id FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
																					$r1=$conn->query($sq);		
																					
																					if($r1->num_rows>0)
																					{
																						while($row=$r1->fetch_assoc())
																						{
																							$p_id=$row['Patient_Id'];
																						}
																					}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $appoint_date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $p_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $firstname." ".$lastname;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $doctor;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  echo $status;?></td>
										
									</tr>
									
									
									
								</tbody>
								<?php
								

							}

						}
					}
					else
					{
						$sql="SELECT * FROM opd_patient_booking WHERE Appoint_Date BETWEEN '$from' AND '$to' AND Status='$status' AND Doctor_Id='$did';";
						$result=$conn->query($sql);

						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())
																				{
																					$firstname=$row['First_Name'];
																					$lastname=$row['Last_Name'];
																					
																					$mobile=$row['Mobile'];
																					$d_id=$row['Doctor_Id'];
																					$da=$row['Appoint_Date'];
																					$orgDate = $da;  
    $appoint_date = date("d-m-Y", strtotime($orgDate));  
																					$status=$row['Status'];
																					
																					$sq3="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_id';";
																					$r3=$conn->query($sq3);		
																					
																					if($r3->num_rows>0)
																					{
																						while($row=$r3->fetch_assoc())
																						{
																							$doctor=$row['Doctor_Name'];
																						}
																					}
																					
																					
																					
																					$sq="SELECT Patient_Id FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
																					$r1=$conn->query($sq);		
																					
																					if($r1->num_rows>0)
																					{
																						while($row=$r1->fetch_assoc())
																						{
																							$p_id=$row['Patient_Id'];
																						}
																					}

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_2" style=" padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $appoint_date;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $p_id;?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $firstname." ".$lastname;?></td>
										<td class="cs-width_4" style="padding: 5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $doctor;?></td>
										<td class="cs-width_1" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php  echo $status;?></td>
										
									</tr>
									
									
									
								</tbody>
								<?php
								

							}

						}
					}	
					?>
				</table>
			</div>
			
			
		</div>
	</div>