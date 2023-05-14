<?php
include 'connection.php';
											
											$from=$_POST['n'];
											$to=$_POST['c'];
											$sql="SELECT * FROM opd_patient_appointment WHERE Confirm_Date BETWEEN '$from' AND '$to' and Is_Refund = '0';";
										$result=$conn->query($sql);

										if($result->num_rows>0)

										{

											?>
											<input type="hidden" class="form-control" name="to" id="to" placeholder="Name" value="<?php echo $to; ?>" required>
											<input type="hidden" class="form-control" name="from" id="from" placeholder="Name" value="<?php echo $from; ?>" required>
											
											<div class="card records-card mt-2">

												<div class="card records-card mt-2">

													<div class="card-body">

														<h4> Transaction History<hr> </h4>

														<div class="row">

															<div class="col-md-4" ></div>

															<div class="col-md-5" >

																<div class="form-group filter-ar">

																	<div class="d-flex">

																		<div class="mr-2 pt-3">

																			<label class=""><i class="mdi mdi-filter"></i> </label>

																		</div>

																		<div class="w-100">

																			<select class="form-control" id="ddlCountry">

																				<option value="all">Select Payment Type</option>
    																				<?php $sql_m = "SELECT * FROM `pay_mode_master`";
    																				$result_m = $conn->query($sql_m);
    																				while($row_med = $result_m->fetch_assoc()) { ?>
    																				<option value="<?php echo $row_med["Pay_Name"]; ?>"><?php echo $row_med["Pay_Name"]; ?></option>
    																				<?php } ?>

																			</select>

																			

																		</div>

																		<div class="mr-2 pt-3">

																			<label class=""><i class="mdi mdi-filter"></i> </label>

																		</div>

																		<div class="col-md-6">

																		

																			<div class="w-100">

																				<select class="form-control" id="ddlAge">

																					<option value="all">Select Doctor</option>
    																				<?php $sql_m = "SELECT * FROM `doctor_master` WHERE Is_opd='1'  ORDER BY Doctor_Id DESC";
    																				$result_m = $conn->query($sql_m);
    																				while($row_med = $result_m->fetch_assoc()) { ?>
    																				<option value="<?php echo $row_med["Doctor_Name"]; ?>"><?php echo $row_med["Doctor_Name"]; ?></option>
    																				<?php } ?>

																				</select>

																			</div>

																		</div>

																	</div>

																</div>

															</div>

															<div class="col-md-3" >

																<div class="form-group">

																	<div class="search-sec">

																	<input id="gfg" type="text" class="form-control" placeholder="eg: John">

																	<span><i class="mdi mdi-magnify"></i></span>

										                           </div>

																</div>

															</div>

															

																

														</div>	

														<div class="row mt-2">

															<div class="col-md-12">

																<div class="table-responsive table-sec mb-4 ">

																	<table class="table" id="table11">

																		<thead>

																			<tr>

																				<th >Date</th>

																				<th >Patient Id</th>
																				<th >Appointment Id</th>
																				<th >Patient Name</th>

																				<th >Doctor</th>

																				<th >Fees</th> 

																				<th >Payment Mode</th> 

																				<th >Transaction Id</th> 
																				<th >User Name</th> 
																				<th >Time</th> 

																			</tr>

																		</thead>

																		<tbody id="geeks">

																			<?php

																				while($row=$result->fetch_assoc())

																				{

																					$app_id =$row["Appointment_Id"];

																					$book_id = $row["Booking_Id"]; 

																					$doctor_id = $row["Doctor_Id"]; 

																					$patient_id = $row["Patient_Id"];

																					$amount= $row['Amount'];

																					$paymode=$row['Pay_Mode'];

																					$transaction=$row['Transaction_Id'];

																					$da=$row['Confirm_Date'];
																					 $orgDate = $da;  
    $date = date("d-m-Y", strtotime($orgDate));  
																					$user=$row['Us_Name'];
																					$time=$row['Time'];
																					

																					$sql2="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$doctor_id';";

																					$r=$conn->query($sql2);		

																					

																					if($r->num_rows>0)

																					{

																						while($row=$r->fetch_assoc())

																						{

																							$d_name=$row['Doctor_Name'];

																						}

																					}

																					$sq="SELECT First_Name,Last_Name FROM patient_master WHERE Patient_Id='$patient_id';";

																					$r1=$conn->query($sq);		

																					

																					if($r1->num_rows>0)

																					{

																						while($row=$r1->fetch_assoc())

																						{

																							$f=$row['First_Name'];

																							$l=$row['Last_Name'];

																						}

																					}

																					?>

													

																					<tr>

																						<td ><?php echo $date;?></td>

																						<td ><?php echo $patient_id;?></td>
																						<td ><?php echo $app_id;?></td>
																						<td ><?php echo $f." ".$l;?></td>

																						<td ><?php echo $d_name;?></td>

																						<td ><?php echo $amount;?></td>

																						<td ><?php echo $paymode;?></td>

																						<td ><?php echo $transaction;?></td>

																						<td ><?php echo $user;?></td>
																						<td ><?php echo $time;?></td>
																					</tr>

																					<?php

																				}

																					

																			?>

																		</tbody>

																	</table>

																</div>

															</div>

														</div>
														<div   style="float: left;">

															<div class="d-flex justify-content-end">

																<div class="form-group excel-ar">

																	

																	<button class="btn btn-primary" onclick="window.location.href = 'opd_doc_landing.php';">Cancel</button>

																</div>

																

															</div>

														</div>
														<div class="col-md-6"  style="float: right;">

															<div class="d-flex justify-content-end">

																<div class="form-group excel-ar">

																	

																	<button class="btn btn-primary" onclick="ExportToExcel('xlsx')">Export Excel</button>&nbsp;

																</div>

																<div class="form-group excel-ar">

																	

																	<button class="btn btn-primary" onClick="printpage()"  data-toggle="modal" data-target="#exampleModal10" data-whatever="@fat" >Print</button>

																</div>

															</div>

														</div>

													</div>

												</div>

											</div>

											<?php

										}?>
										
										<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

				<script type="text/javascript">

					$(document).ready(function () {

						$("#ddlCountry,#ddlAge").on("change", function () {

							var country = $('#ddlCountry').find("option:selected").val();

							var age = $('#ddlAge').find("option:selected").val();

							SearchData(country, age)

						});

					});

					function SearchData(country, age) {

						if (country.toUpperCase() == 'ALL' && age.toUpperCase() == 'ALL') {

							$('#table11 tbody tr').show();

						} else {

							$('#table11 tbody tr:has(td)').each(function () {

								var rowCountry = $.trim($(this).find('td:eq(6)').text());

								var rowAge = $.trim($(this).find('td:eq(4)').text());

								if (country.toUpperCase() != 'ALL' && age.toUpperCase() != 'ALL') {

									if (rowCountry.toUpperCase() == country.toUpperCase() && rowAge == age) {

										$(this).show();

									} else {

										$(this).hide();

									}

								} else if ($(this).find('td:eq(6)').text() != '' || $(this).find('td:eq(6)').text() != '') {

									if (country != 'all') {

										if (rowCountry.toUpperCase() == country.toUpperCase()) {

											$(this).show();

										} else {

											$(this).hide();

										}

									}

									if (age != 'all') {

										if (rowAge == age) {

											$(this).show();

										}

										else {

											$(this).hide();

										}

									}

								}

				 

							});

						}

					}

				</script>
				
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

				<script>

					$(document).ready(function() {

						$("#gfg").on("keyup", function() {

							var value = $(this).val().toLowerCase();

							$("#geeks tr").filter(function() {

								$(this).toggle($(this).text()

								.toLowerCase().indexOf(value) > -1)

							});

						});

					});
				</script>
