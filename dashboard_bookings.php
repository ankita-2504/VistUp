							<?php
										include 'connection.php';
										
							?>
							<div class="table-responsive table-sec mb-4 ">
								<table class="table">
									<thead>
										<tr>
											<th > Sl. No. </th>
											<th > Doctor Name </th>
											<th > Bookings </th>
											
										</tr>
									</thead>
									<?php
										$date=date("Y-m-d");
										$sql_display="SELECT Distinct(Doctor_Id) as Id FROM opd_patient_booking WHERE Appoint_Date='$date';";
										$result=$conn->query($sql_display);  
										$num=1;
										if($result->num_rows>0)
										{
											while($row=$result->fetch_assoc())
											{ 
												$d_Id=$row['Id'];
												$sd2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_Id';";
												$rd2=$conn->query($sd2);		
												while($row=$rd2->fetch_assoc())

												{

													$doctor=$row['Doctor_Name'];

													

												}
												$sd2="SELECT COUNT(Status) FROM opd_patient_booking WHERE Doctor_Id='$d_Id' AND (Status='Booked' OR Status='Appointed') AND Appoint_Date='$date';";
												$rd2=$conn->query($sd2);		
												while($row=$rd2->fetch_assoc())

												{

													$cabooked=$row['COUNT(Status)'];

													

												}
												$sd2="SELECT COUNT(Appointment_Id) AS ap FROM opd_patient_appointment WHERE Doctor_Id='$d_Id'  AND Confirm_Date='$date' AND Is_Refund='0';";
												$rd2=$conn->query($sd2);		
												while($row=$rd2->fetch_assoc())

												{

													$cappoint=$row['ap'];

													

												}

												?>	 
													<tr>
														<td><?php echo $num++;?></td>
														<td><?php echo $doctor;?></td>
														<td><?php echo $cabooked;?></td>
														
													</tr>
													<?php
												 
											} 
										}	
									?> 
								</table>
							</div>
					