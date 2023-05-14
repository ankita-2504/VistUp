<?php
include 'connection.php';
											
											$name=$_POST['n'];
											$contact=$_POST['c'];
											$reg=$_POST['r'];
											$_SESSION["Pname"]=$name;
											$_SESSION["Pcontact"]=$contact;
											$_SESSION["Pregn"]=$reg;
											$count=0;
											$count=substr_count($name, ' ');
											if($count == 1)
											{
												$arr=explode(" ",$name);
												//$k=$arr[1];
												$sql= "SELECT * FROM opd_patient_booking WHERE First_Name='$arr[0]' AND Last_Name='$arr[1]' AND Mobile='$contact' AND (Status='Booked' OR Status='Appointed') ORDER BY Appoint_Date DESC;";
											$result=$conn->query($sql);
											}
											else
											{
												$arr=explode(" ",$name);
												$j=$arr[0];
												$k=$arr[1]." ".$arr[2];
												//$l=$arr[2];
												$sql= "SELECT * FROM opd_patient_booking WHERE First_Name='$j' AND Last_Name='$k' AND Mobile='$contact' AND (Status='Booked' OR Status='Appointed') ORDER BY Appoint_Date DESC;";
											$result=$conn->query($sql);
											}
											if($result->num_rows>0)
											{
												?>
												
													<div class="col-md-12">
														<div class="appointment-table table-responsive">
															<h3>Booking Information</h3>
															<div class="table-responsive table-sec mb-4 ">
																<table class="table">
																	<thead>
																		<tr>
																		  <th style="text-align: center;">Date</th>
																		  <th style="text-align: center;">Doctor</th>
																		  <th style="text-align: center;">Status</th>
																		  <th style="text-align: center;">View</th>
																		  <th style="text-align: center;">Pay</th>
																		  <th style="text-align: center;">Refund</th>
																		  <th style="text-align: center;">Receipt</th>
																		  <th style="text-align: center;">Slip</th>
																		  <th style="text-align: center;">Prescription</th>
																		</tr>
																	</thead>
																	<form action="" method="POST">
																		<tbody style="text-align: center;">
																			<?php
																				while($row=$result->fetch_assoc())
																				{
																					$id= $row["Booking_Id"];
																					$d_id =$row["Doctor_Id"];
																					$da2=$row['Appoint_Date'];
								$orgDate2 = $da2;  
    $appoint_date = date("d-m-Y", strtotime($orgDate2));  
																					$status=$row["Status"];
																					$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_id ='$d_id';";
																					$result2=$conn->query($sql2);
																					if($result2->num_rows>0)
																					{
																						while($row=$result2->fetch_assoc())
																						{
																							
																							$doctor = $row["Doctor_Name"]; 
																							
																						}
																					}
																					$sql_display="SELECT Appointment_Id,Is_Refund FROM opd_patient_appointment WHERE Booking_Id='$id';";

																					$res=$conn->query($sql_display);		

																					

																					if($res->num_rows>0)

																					{

																						while($row=$res->fetch_assoc())

																						{

																							$a_Id=$row['Appointment_Id'];
																							$yes=$row['Is_Refund'];
																						}

																					}
																					$sql_display2="SELECT Net_Amount FROM payment WHERE Payment_Type_Id='$a_Id';";

																					$res2=$conn->query($sql_display2);		

																					

																					if($res2->num_rows>0)

																					{

																						while($row=$res2->fetch_assoc())

																						{
																							$amt=$row['Net_Amount'];
																						}

																					}
																					?>
																					<tr id="<?php echo $id;?>" >
																						<td><?php echo $appoint_date;?></td>
																						<td><?php echo $doctor;?></td>
																						<td><?php echo $status;?></td>
																						<?php
																							if ($status == 'Booked')
																							{
																								?>
																								
																								
																									<td> <a class="btn btn-success btn-xs" style="padding:2px;" onClick="view(this.id)"  id="<?php echo $id;?>" >  <i class="fa-sharp fa-solid fa-eye "  style="margin:0;font-size:15px;"></i></a></td>
																									<td><a class="btn btn-dark btn-xs" style="padding:2px;" onClick="confirm(this.id)"  id="<?php echo $id;?>" data-toggle="modal" data-target="#exampleModal1" data-whatever="@fat"><i class="fa-brands fa-amazon-pay"  style="margin:0;font-size:15px;"></i></a></td>
																									<td></td>
																									<td></td>
																									<td></td>
																								<?php
																							}
																							else
																							{
																								if($yes == '1')
																								{?>
																									<td><a class="btn btn-success btn-xs" style="padding:2px;" onClick="view(this.id)"  id="<?php echo $id;?>" >  <i class="fa-sharp fa-solid fa-eye" style="margin:0;font-size:15px;"></i></a></td>
																									<td  ></td>
																									<td ></td>
																									<td  ></td>
																									<td ></td>
																									<td  ></td>
																									
																									
																								<?php
																								}
																								else
																								{
																									?>
																								<td><a class="btn btn-success btn-xs" style="padding:2px;" onClick="view(this.id)"  id="<?php echo $id;?>" >  <i class="fa-sharp fa-solid fa-eye" style="margin:0;font-size:15px;"></i></a></td>
																								<td  ></td>
																								<td ><a class="btn btn-danger btn-xs" style="padding:2px;" onClick="refund(this.id)"  id="<?php echo $id;?>" data-toggle="modal" data-target="#exampleModal7" data-whatever="@fat">  <i class="fa-solid fa-money-bill-transfer" style="margin:0;font-size:15px;"></i></a></td>
																								
																								<td ><a class="btn btn-warning btn-xs" style="padding:2px;" onClick="receipt(this.id)"  id="<?php echo $id;?>" data-toggle="modal" data-target="#exampleModal77" data-whatever="@fat">  <i class="fa-sharp fa-solid fa-file-invoice-dollar"  style="margin:0;font-size:15px;"></i></a></td>
																								<td ><a class="btn btn-info btn-xs" style="padding:2px;" onClick="slip(this.id)"  id="<?php echo $id;?>" data-toggle="modal" data-target="#exampleModal11" data-whatever="@fat"><i class="fa-solid fa-receipt" style="margin:0;font-size:15px;"></i></a></td>
																								<td ><a class="btn btn-success btn-xs" style="padding:2px;" onClick="letter(this.id)"  id="<?php echo $id;?>" data-toggle="modal" data-target="#exampleModal12" data-whatever="@fat"><i class="fa-sharp fa-solid fa-file-invoice " style="margin:0;font-size:15px;"></i></a></td>
																								
																								<?php
																								}
																								
																							}
																						
																						?>
																						
																						</tr>
																					<?php
																				}
																			?>
																		</tbody>
																	</form>
																</table>
															</div>
														</div>
													</div>
													<?php
											}
									?>