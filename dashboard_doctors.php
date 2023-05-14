							<?php
										include 'connection.php';
										
							?>
							<div class="table-responsive table-sec mb-4 ">
								<table class="table">
									<thead>
										<tr>
											<th > Sl. No. </th>
											<th > Doctor Name </th>
											
											<th > Time </th>
										</tr>
									</thead>
									<?php
										$day=date("l") ;
										$sql_display="SELECT Distinct(Doctor_Id) as Id,Morning_Time,Evening_Time  FROM opd_doctor_appointment_master WHERE Days='$day';";
										$result=$conn->query($sql_display);  
										$num=1;
										if($result->num_rows>0)
										{
											while($row=$result->fetch_assoc())
											{ 
												$d_Id=$row['Id'];
												$mor=$row['Morning_Time'];
												$eve=$row['Evening_Time'];
												$sd2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_Id';";
												$rd2=$conn->query($sd2);		
												while($row=$rd2->fetch_assoc())

												{

													$doctor=$row['Doctor_Name'];

													

												}
												

												?>	 
													<tr>
														<td><?php echo $num++;?></td>
														<td><?php echo $doctor;?></td>
														
														<td><?php echo $mor." ".$eve;?></td>
														
														
													</tr>
													<?php
												 
											} 
										}	
									?> 
								</table>
							</div>
					