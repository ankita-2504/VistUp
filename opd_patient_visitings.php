<?php
	$id=$_POST['id'];
	include 'connection.php';
	$sql2="SELECT First_Name,Last_Name,Mobile,Whatsapp,Guardian_Contact FROM patient_master WHERE Patient_Id ='$id';";
	$result2=$conn->query($sql2);
	if($result2->num_rows>0)
	{
		while($row=$result2->fetch_assoc())
		{
			$firstname=$row['First_Name'];
			$lastname=$row['Last_Name'];
			$mobile=$row['Mobile'];
			$whatsapp=$row['Whatsapp'];
			$guardian_contact=$row['Guardian_Contact'];
		}
	}
	?>
	<div class="card records-card mt-2">
		<div class="card records-card mt-2">
			<div class="card-body">
				
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive table-sec mb-4 ">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="text-align: center;">Date Of Visit</th>
										<th style="text-align: center;">Patient Id</th>
										<th style="text-align: center;">Patient Name</th>
										<th style="text-align: center;">Doctor</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="SELECT Doctor_Id,Appoint_Date FROM opd_patient_booking WHERE First_Name ='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Mobile='$whatsapp' OR Mobile='$guardian_contact') AND Status='Visited';";
										$result=$conn->query($sql);
										if($result->num_rows>0)
										{
											while($row=$result->fetch_assoc())
											{
												
												$d_id = $row["Doctor_Id"]; 
												
												$appoint_date=$row['Appoint_Date'];
												
												$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_id ='$d_id';";
												$result2=$conn->query($sql2);
												if($result2->num_rows>0)
												{
													while($row=$result2->fetch_assoc())
													{
														
														$doctor = $row["Doctor_Name"]; 
														
													}
												}
												?>
				
												<tr>
													<td style="text-align: center;"><?php echo $appoint_date;?></td>
													<td style="text-align: center;"><?php echo $id;?></td>
													<td style="text-align: center;"><?php echo $firstname." ".$lastname;?></td>
													<td style="text-align: center;"><?php echo $doctor;?></td>
													
													
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
			</div>
		</div>
	</div>
	