							<?php
										include 'connection.php';
										
							?>
							<div class="table-responsive table-sec mb-4 ">
								<table class="table">
									<thead>
										<tr>
											<th > Sl. No. </th>
											<th > Collection Type </th>
											<th> Amount	</th>									
										</tr>
									</thead>
									<?php
										$date=date("Y-m-d");
										
												$sd="SELECT SUM(Net_Amount) FROM payment WHERE Payment_Date='$date' AND Payment_Type='IPD';";
												$rd=$conn->query($sd);		
												while($row=$rd->fetch_assoc())

												{

													$ipd=$row['SUM(Net_Amount)'];

													

												}
												$sd="SELECT * FROM payment WHERE Payment_Date='$date' AND Payment_Type='OPD';";
												$rd=$conn->query($sd);		
												while($row=$rd->fetch_assoc())

												{

													$appid=$row['Payment_Type_Id'];
													$sd2="SELECT * FROM opd_patient_appointment WHERE Appointment_Id='$appid';";
													$rd2=$conn->query($sd2);
													
													while($row2=$rd2->fetch_assoc())
													{
														if($row2['Is_Refund']=='0')
															$opd=$opd+$row['Net_Amount'];
													}

													

												}
												$sd="SELECT SUM(Net_Amount) FROM payment WHERE Payment_Date='$date' AND Payment_Type='MED';";
												$rd=$conn->query($sd);		
												while($row=$rd->fetch_assoc())

												{

													$med=$row['SUM(Net_Amount)'];

													

												}

												?>	 
													<tr>
														<td> 1</td>
														<td> IPD</td>
														<td><?php echo $ipd;?></td>
														
														
													</tr>
													<tr>
														<td> 2</td>
														<td> OPD</td>
														<td><?php echo $opd;?></td>
														
														
													</tr>
													<tr>
														<td> 3</td>
														<td>PHARMACY</td>
														<td><?php echo $med;?></td>
														
														
													</tr>
													<?php
											
									?> 
								</table>
							</div>
					