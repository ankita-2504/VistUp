<?php
	include 'connection.php';
	session_start();
	if ($_SESSION['cus']['login'] == "true") {  
		?>
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<!-- Required meta tags -->
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<title>VisitUp</title>
				<!-- plugins:css -->
				<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
				<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
				<!-- endinject -->
				<!-- Plugin css for this page -->
				<link rel="stylesheet" href="assets/css/all.min.css">
				<link rel="stylesheet" href="assets/css/fontawesome.min.css">
				<link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
				<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
				<link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
				<link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
				<!-- End plugin css for this page -->
				<!-- inject:css -->
				<!-- endinject -->
				<!-- Layout styles -->
				<link rel="stylesheet" href="assets/css/style.css">
				<link rel="stylesheet" href="assets/css/custom.css">
				<!-- End layout styles -->
				<link rel="shortcut icon" href="assets/images/favicon.png" />
			</head>
			<body>
				<div class="container-scroller">
				  <!-- partial:partials/_sidebar.html -->
				    <?php include "menu.php"; ?>
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<?php include "header.php"; ?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> Booking </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Out Patient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
											<div class="card records-card mt-2">
												<div class="card records-card mt-2">
													<div class="card-body">
													<?php if($_REQUEST['flag'] == "add") { ?>
														<div class="col-15 grid-margin">
															<form class="forms-sample booking-page" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
																<div class="card">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<label for="exampleInputName1">Booking type<span class="text-danger">*</span> </label>
																					<select class="form-control" id="type" name="type" required>
																						<option>On-Call</option>
																						<option>Walk-In</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Doctor Name<span class="text-danger">*</span> </label>
																					<?php
																						$i=[];
																						$adata=[];
																						$sql="SELECT Doctor_Name FROM doctor_master WHERE Is_Opd ='1';";
																						$result=$conn->query($sql);
																						while($row=$result->fetch_assoc())
																						{
																							array_push($i,$row["Doctor_Name"]);
																							$adata[$row["Doctor_Name"]]=$row["Doctor_Name"];
																						}
																					?>
																					<select class="form-control" name="d_name" id="d_name" onchange="GetDetail(this.value);" required>
																					  <option>Doctor name</option>
																						<?php
																							foreach($i as $item)
																							{
																								echo "<option value='$item'>$item</option>";
																							}
																						?>
																					</select>
																					<input type="hidden" class="form-control" id="d_id" name="d_id"  required>
																					
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Day<span class="text-danger">*</span></label>
																					<select class="form-control" id="day" name="day" onclick="GetDetail2(this.value);" required>
																						<option>Select Day</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Time<span class="text-danger">*</span></label>
																					<select class="form-control" id="time" name="time" required>
																						<option>Select Time</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputEmail3">First Name:<span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="firstname" name="firstname"  onkeyup="convert3(this.value);"  required>
																					
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Last Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="lastname" name="lastname" onkeyup="convert2(this.value);" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Contact: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="contact" name="contact" onblur="validatePhone(this);" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Date:<span class="text-danger">*</span> </label>
																					<input type="date" class="form-control" id="date" name="date" onchange="myDate();datediff()"  required>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Address<span class="text-danger">*</span></label>
																					<textarea type="text" class="form-control" id="address" name="address" required></textarea>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<button name="adding" type="submit" class="btn btn-primary mr-2">Book</button>
																<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_doc_landing.php';">Cancel</button>
																
															</form>
														</div>
													<?php } else if($_REQUEST['flag'] == "edit"){
																if (isset($_GET['id'])) 
																{
																	$id = $_GET['id'];
																	
																}
																$s="SELECT * FROM opd_patient_booking WHERE Booking_Id ='$id';";
																$r=$conn->query($s);
																if($r->num_rows==1)
																{
																	$n = mysqli_fetch_array($r);
																	
																	$first=$n['First_Name'];
																	
																	$last=$n['Last_Name'];
																	$location=$n['Location'];
																	
																	$mobile=$n['Mobile'];
																	$did=$n['Doctor_Id'];
																	$time=$n['Time'];
																	$day=$n['Day'];
																	$appoint_date=$n['Appoint_Date'];
																	$type=$n['Booking_Type'];
																	
																							
																}
			

														?>
														<div class="col-15 grid-margin">
															<form class="forms-sample booking-page" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
																<div class="card">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<label for="exampleInputName1">Booking type<span class="text-danger">*</span> </label>
																					<select class="form-control" id="type" name="type" required>
																						<option <?php if($type == "On Call") echo 'selected="selected"';?>>On-Call</option>
																						<option <?php if($type == "Walk-In") echo 'selected="selected"';?>>Walk-In</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Doctor Name<span class="text-danger">*</span> </label>
																					<?php
																						$i=[];
																						$adata=[];
																						$sql="SELECT Doctor_Name FROM doctor_master WHERE Is_Opd ='1';";
																						$result=$conn->query($sql);
																						while($row=$result->fetch_assoc())
																						{
																							array_push($i,$row["Doctor_Name"]);
																							$adata[$row["Doctor_Name"]]=$row["Doctor_Name"];
																						}
																						$sql2="Select Doctor_Name from doctor_master where Doctor_Id='$did';";
																						$result2=$conn->query($sql2);
																						$row2=$result2->fetch_assoc();
																						$dname=$row2['Doctor_Name'];
																					?>
																					<select class="form-control" name="d_name" id="d_name" onchange="GetDetail(this.value);" required>
																					  <option>Doctor name</option>
																						<?php
																							foreach($i as $item)
																							{
																								if($item == $dname)
																								{
																									echo "<option value='$item' selected>$item</option>";
																								}
																								else
																								{
																									echo "<option value='$item'>$item</option>";
																								}
																							}
																						?>
																					</select>
																					<input type="hidden" class="form-control" id="d_id" name="d_id" value="<?php echo $did;?>" required>
																					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>" required>
																					
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Day<span class="text-danger">*</span></label>
																					<?php
																						$i=[];
																						$adata=[];
																						$sql="SELECT * FROM opd_doctor_appointment_master WHERE Doctor_Id ='$did';";
																						$result=$conn->query($sql);
																						while($row=$result->fetch_assoc())
																						{
																							array_push($i,$row["Days"]);
																							$adata[$row["Days"]]=$row["Days"];
																						}
																						
																					?>
																					<select class="form-control" id="day" name="day" onclick="GetDetail2(this.value);" required>
																						
																						<option>Select Day</option>
																						<?php
																							foreach($i as $item)
																							{
																								if($item == $day)
																								{
																									echo "<option value='$item' selected>$item</option>";
																								}
																								else
																								{
																									echo "<option value='$item'>$item</option>";
																								}
																							}
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Time<span class="text-danger">*</span></label>
																					<?php
																						$i=[];
																						$adata=[];
																						$sql="SELECT * FROM opd_doctor_appointment_master WHERE Doctor_Id ='$did' AND Days='$day';";
																						$result=$conn->query($sql);
																						while($row=$result->fetch_assoc())
																						{
																							if($row['Morning_Time']=='')
																							{
																							array_push($i,$row["Evening_Time"]);
																							$adata[$row["Evening_Time"]]=$row["Evening_Time"];
																							}
																							else if($row['Evening_Time']=='')
																							{
																							array_push($i,$row["Morning_Time"]);
																							$adata[$row["Morning_Time"]]=$row["Morning_Time"];
																							}
																							else
																							{
																								array_push($i,$row["Evening_Time"]);
																								$adata[$row["Evening_Time"]]=$row["Evening_Time"];
																								array_push($i,$row["Morning_Time"]);
																								$adata[$row["Morning_Time"]]=$row["Morning_Time"];
																							}
																						}
																						
																					?>
																					<select class="form-control" id="time" name="time" required>
																						<option>Select Time</option>
																						<?php
																							foreach($i as $item)
																							{
																								if($item == $time)
																								{
																									echo "<option value='$item' selected>$item</option>";
																								}
																								else
																								{
																									echo "<option value='$item'>$item</option>";
																								}
																							}
																						?>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputEmail3">First Name:<span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $first;?>" onkeyup="convert3(this.value);"  required>
																					
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Last Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $last;?>" onkeyup="convert2(this.value);" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Contact: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $mobile;?>" onblur="validatePhone(this);" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Date:<span class="text-danger">*</span> </label>
																					<input type="date" class="form-control" id="date" name="date" value="<?php echo $appoint_date;?>" onchange="myDate();datediff()"  required>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Address<span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="address" name="address" value="<?php echo $location;?>" required>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<button name="editing" type="submit" class="btn btn-primary mr-2">Update</button>
																<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_doc_landing.php';">Cancel</button>
																
															</form>
														</div>
													
													<?php } else { ?>
														<div class="row">
															<div class="col-md-4" ><button class="btn btn-primary" onclick="window.location.href = 'opd_booking_view.php?flag=add';">Add New</button></div>
															<div class="col-md-5" ></div>
															<div class="col-md-3" >
																<div class="form-group">
																	<div class="search-sec">
																	<input id="gfg" type="text" class="form-control" placeholder="Search">
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
																			<th width='4%'>Sl. No</th>
																				<th>First Name</th>
																				<th>Last Name</th>
																				<th>Location</th>
																				<th>Mobile</th>
																				<th width='8%'>Doctor Name</th>
																				<th>Time</th>
																				<th>Day</th>
																				<th>Date</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $sql="SELECT * FROM opd_patient_booking WHERE Status='Booked' ORDER BY Appoint_Date DESC";
																				$result=$conn->query($sql);
																				$c=1;
																				while($row=$result->fetch_assoc()) 
																				{
																						if($row["Mobile"] == '$_SESSION["cus"]["Contact"]' && $_SESSION["cus"]["Role"] == 'Patient')
																						{
																							
																							$did=$row['Doctor_Id'];
																							$sql2="Select Doctor_Name from doctor_master where Doctor_Id='$did';";
																							$result2=$conn->query($sql2);
																							$row2=$result2->fetch_assoc();
																							?>
																							<tr id= "tr_<?php echo $row["Booking_Id"]?>" class="todo-list todo-list-custom">
																								<td width='4%'><?php echo $c++; ?></td>
																								<td ><?php echo $row["First_Name"]; ?></td>
																								<td ><?php echo $row["Last_Name"]; ?></td>
																								<td ><?php echo $row["Location"]; ?></td>
																								<td ><?php echo $row["Mobile"]; ?></td>
																								<td width='8%'><?php echo $row2["Doctor_Name"]; ?></td>
																								<td ><?php echo $row["Time"]; ?></td>
																								<td ><?php echo $row["Day"]; ?></td>
																								<td ><?php echo date('d-m-Y',strtotime($row["Appoint_Date"])); ?></td>
																								<td><a class="btn btn-success btn-xs" style="padding:2px;"  onclick="window.location.href = 'opd_booking_view.php?flag=edit&id=<?php echo $row['Booking_Id']; ?>';"><i class="remove mdi mdi-pencil"style="margin:0;font-size:15px;"></i></a> &nbsp;<a class="btn btn-danger btn-xs" style="padding:2px;"  onclick="delete_data('<?php echo $row['Booking_Id'];?>')"><i class="remove mdi mdi-delete"style="margin:0;font-size:15px;"></i></td>
																							</tr>
																							<?php
																						}
																						else if($_SESSION["cus"]["Role"] != 'Patient')
																						{
																							$did=$row['Doctor_Id'];
																							$sql2="Select Doctor_Name from doctor_master where Doctor_Id='$did';";
																							$result2=$conn->query($sql2);
																							$row2=$result2->fetch_assoc();
																							?>
																							<tr id= "tr_<?php echo $row["Booking_Id"]?>" class="todo-list todo-list-custom">
																								<td width='4%'><?php echo $c++; ?></td>
																								<td ><?php echo $row["First_Name"]; ?></td>
																								<td ><?php echo $row["Last_Name"]; ?></td>
																								<td ><?php echo $row["Location"]; ?></td>
																								<td ><?php echo $row["Mobile"]; ?></td>
																								<td width='8%'><?php echo $row2["Doctor_Name"]; ?></td>
																								<td ><?php echo $row["Time"]; ?></td>
																								<td ><?php echo $row["Day"]; ?></td>
																								<td ><?php echo date('d-m-Y',strtotime($row["Appoint_Date"])); ?></td>
																								<td><a class="btn btn-success btn-xs" style="padding:2px;"  onclick="window.location.href = 'opd_booking_view.php?flag=edit&id=<?php echo $row['Booking_Id']; ?>';"><i class="remove mdi mdi-pencil"style="margin:0;font-size:15px;"></i></a> &nbsp;<a class="btn btn-danger btn-xs" style="padding:2px;"  onclick="delete_data('<?php echo $row['Booking_Id'];?>')"><i class="remove mdi mdi-delete"style="margin:0;font-size:15px;"></i></td>
																							</tr>
																							<?php
																						}
																						else
																						{
																							
																						}
																						
																				 } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<div class="col-md-6"  style="float: right;">
															<div class="d-flex justify-content-end">
																<div class="form-group excel-ar">
																	<button class="btn btn-primary" onclick="ExportToExcel('xlsx')">Export Excel</button>&nbsp;
																</div>
																<div class="form-group excel-ar">								
																	<button class="btn btn-primary" onClick="printpage()"  data-toggle="modal" data-target="#exampleModal10" data-whatever="@fat">Print</button>
																</div>
															</div>
														</div>
													<?php } ?>	


													<?php
																if(isset($_POST['adding']))
																{
																	
																	$type=$_POST['type'];
																	$d_name=$_POST['d_id'];
																	$day=$_POST['day'];
																	$time=$_POST['time'];
																	$first=$_POST['firstname'];
																	$first_name=rtrim($first," ");
																	$last=$_POST['lastname'];
																	$last_name=rtrim($last," ");
																	$mobile=$_POST['contact'];
																	$appoint_date=$_POST['date'];
																	$location=$_POST['address'];
																	
																	$sql2="SELECT * FROM `opd_patient_booking` order by cast(SUBSTRING(`Booking_Id`, 10,length(`Booking_Id`)-9) as UNSIGNED) DESC LIMIT 1;";
																	$result2=$conn->query($sql2);
																	$i=0;
																	while($row=$result2->fetch_assoc())
																	{
																		$d_id = $row["Booking_Id"];
																		$l=strlen($d_id);
																		$st=substr($d_id, 0,9);
																		$d=substr($d_id, 9,$l);
																		$d=$d+1;
																		$id=$st.$d;
																		$i++;
																	}
																	if($i==0)
																	{
																		$id='EMD-BOOK-1';
																	}
																	
																	
																	$s="INSERT into opd_patient_booking(Booking_Id,First_Name, Last_Name, Location, Mobile,  Doctor_Id,  Time, Day, Appoint_Date,Booking_Type,Status,Booking_Date) VALUES('$id','$first_name', '$last_name', '$location', $mobile, '$d_name', '$time', '$day', '$appoint_date','$type','Booked',now());";
																	
																	if ($conn->query($s) === TRUE) 
																	{?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Appointment Booked Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=book&contact=<?php echo $mobile;?>';">Pay Fees</button>
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_booking_view.php';">Close</button>
																					
																				</div>
																			</div>
																		</div>
																		<?php
																	}
																	else
																	{?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 700px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="fail.png" alt="Success!" style="height: 50px; padding-left: 195px; margin-top: 25px;">
																				<h3 style="color: #000; text-align: center; padding-top: 28px;">Something Went Wrong!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error occurred while Booking. Please try again.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_booking_view.php';">Close</button></div>
																			</div>
																		</div>
																		<?php 
																	}
																}
															?> 	
															<?php
																if(isset($_POST['editing'])) 
																{
																	
																	include 'connection.php';
																	$id = $_POST['id'];
																	$type=$_POST['type'];
																	$d_name=$_POST['d_id'];
																	$day=$_POST['day'];
																	$time=$_POST['time'];
																	$first=$_POST['firstname'];
																	$first_name=rtrim($first," ");
																	$last=$_POST['lastname'];
																	$last_name=rtrim($last," ");
																	$mobile=$_POST['contact'];
																	$appoint_date=$_POST['date'];
																	$location=$_POST['address'];
											
																	
																	
																	$s="UPDATE `opd_patient_booking` SET `First_Name`='$first_name',`Last_Name`='$last_name',`Location`='$location',`Mobile`='$mobile',`Doctor_Id`='$d_name',`Time`='$time',`Day`='$day',`Appoint_Date`='$appoint_date',`Booking_Type`='$type' WHERE Booking_Id='$id';";
																	
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Booking Edited Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_booking_view.php';">Close</button>
																					
																				</div>
																			</div>
																		</div>
																	<?php } else { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 700px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="fail.png" alt="Success!" style="height: 50px; padding-left: 195px; margin-top: 25px;">
																				<h3 style="color: #000; text-align: center; padding-top: 28px;">Something Went Wrong!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error occurred while Editing. Please try again.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_booking_view.php';">Close</button></div>
																			</div>
																		</div>
																		<?php 
																	}
																}
															?> 			
													</div>
												</div>
											</div>
							</div>
							<?php include "footer.php";?>
						</div>
					</div>
				</div>	
				<script>

	function validatePhone(inputtxt)
	{
		if( inputtxt.value.length != 0)
		{
		var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
		  if (reg.test(inputtxt.value) == false) 
			{
				alert('Invalid Patient Contact');
				document.getElementById("contact").value = "";
				//return true;
			}
		}
	}
	
</script>
									<script>
										
										function myDate() 
										{
											var dt=document.getElementById("date").value;
											//var tdt=document.getElementById("tdate").value;
											//alert(tdt);
											var week=document.getElementById("day").value;
											var val=0;
											
											
											let day = new Date(dt).getDay();

											//alert(day);
											if(week == 'Sunday')
												val=0;
											else if(week == 'Monday')
												val=1;
											else if(week == 'Tuesday')
												val=2;
											else if(week == 'Wednesday')
												val=3;
											else if(week == 'Thursday')
												val=4;
											else if(week == 'Friday')
												val=5;
											else 
												val=6;
											//alert(val);
											if(val != day)
											{
												alert('Invalid date choice');
												document.getElementById("date").value="";
											}
											
										}
									</script>
									<script>
										function datediff()
										{
											//var date1=document.getElementById("tdate").value;
											var date2=document.getElementById("date").value;
											var d1 = new Date();   
											//alert(d1);
											var d2 = new Date(date2);   
											//alert(d2);
											var diff = d2.getTime() - d1.getTime();   
												
											var daydiff = diff / (1000 * 60 * 60 * 24);   
											//alert( daydiff);
											  
											if(daydiff>=30)
											{
												alert('Booking Date exceeds 30 days!');
												document.getElementById("date").value="";
											}
											  
										}
									
									</script>
									<script>
					function fcapital(str)
					{
					
					// converting first letter to uppercase
					var capitalized = str.charAt(0).toUpperCase() + str.slice(1);
					//alert(capitalized);
					document.getElementById("first").value = capitalized;
					
					}
				</script>
				<script>
					function lcapital(str) 
					{
					
					// converting first letter to uppercase
					var capitalized = str.charAt(0).toUpperCase() + str.slice(1);
					document.getElementById("last").value = capitalized;
					
					}
				</script>
				<script>
					function GetDetail(str) 
					{ 
						if (str.length == 0) 
						{ 
						  document.getElementById("day").value = ""; 
						  return; 
						} 
						else 
						{ 
							var xmlhttp = new XMLHttpRequest(); 
							xmlhttp.onreadystatechange = function () 
							{ 
								if (this.readyState == 4 &&  this.status == 200) 
								{ 
									 var myObj = JSON.parse(this.responseText); 
									 document.getElementById("day").innerHTML=null;
									 var str="";
									 str = myObj[0];
									 document.getElementById("d_id").value=myObj[1];
									 var elmts="";
									 elmts = str.split(' ');
									 var select = document.getElementById("day");
									 function GFG_Fun()
									{
										for (var i = 0; i < elmts.length; i++)
										{
											var optn = elmts[i];
											var el = document.createElement("option");
											el.textContent = optn;
											el.value = optn;
											select.appendChild(el);
										}	
									}
								  GFG_Fun();
								} 
							}; 
						  // xhttp.open("GET", "filename", true); 
						  xmlhttp.open("GET", "opd_extract_details_from_docname.php?d_name=" + str, true); 
						  // Sends the request to the server 
						  xmlhttp.send(); 
						} 
					} 
				</script>
				<script>
				 function convert3(str)
				 {
					var n=str.toLowerCase();
					const arr = n.split(" ");

					//loop through each element of the array and capitalize the first letter.
					//
						
					for (var i = 0; i < arr.length; i++) {
						arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);

					}

					//Join all the elements of the array back into a string 
					//using a blankspace as a separator 
					const str2 = arr.join("");
					//alert(str2);
					document.getElementById("firstname").value = str2;
				 }
				
				</script>		
				<script>
				 function convert2(str)
				 {
					var n=str.toLowerCase();
					const arr = n.split(" ");

					//loop through each element of the array and capitalize the first letter.
					//

					for (var i = 0; i < arr.length; i++) {
						arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);

					}

					//Join all the elements of the array back into a string 
					//using a blankspace as a separator 
					const str2 = arr.join(" ");
					//alert(str2);
					document.getElementById("lastname").value = str2;
				 }
				
				</script>		
				<script>
					function GetDetail2(str) 
					{ 
						var name=document.getElementById("d_name").value;
						//alert(str);
						if (str.length == 0) 
						{ 
							
							document.getElementById("time").value = ""; 
							return; 
						} 
						else 
						{
							var xmlhttp = new XMLHttpRequest(); 
							xmlhttp.onreadystatechange = function () 
							{ 
								if (this.readyState == 4 &&  this.status == 200) 
								{ 
									 var myObj = JSON.parse(this.responseText); 
									 document.getElementById("time").innerHTML=null;
									 var str="";
									 str = myObj[0];
									// alert(str);
									 var elmts="";
									 elmts = str.split(',');
									 
									 var select = document.getElementById("time");
									 function GFG_Fun()
									{
										for (var i = 0; i < elmts.length; i++)
										{
											var optn = elmts[i];
											var el = document.createElement("option");
											el.textContent = optn;
											el.value = optn;
											select.appendChild(el);
										}	
									}
								  GFG_Fun();
								} 
							}; 
							// xhttp.open("GET", "filename", true); 
							xmlhttp.open("GET", "opd_extract_timings_from_day.php?day=" + str + "&name=" +name, true); 
							// Sends the request to the server 
							xmlhttp.send(); 
						} 
					} 
				</script>
				<script>

					function validatePhone(inputtxt)
					{
						var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
						  if (reg.test(inputtxt.value) == false) 
							{
								alert('Invalid Patient Contact');
								document.getElementById("contact").value = "";
							}
						return true;
					}
					
				</script>
				<script>
function validateFName(name)
{
	
	var regEx = /^[A-Za-z]+$/;
   if(name.value.match(regEx))
	 {
	  return true;
	 }
	 else
	{
	 alert("Invalid First Name.");
	 document.getElementById("firstname").value = "";
	 }
}
</script>
<script>
	function validateLName(name)
	{
		
		var regEx = /^[A-Za-z]+$/;
	   if(name.value.match(regEx))
		 {
		  return true;
		 }
		 else
		{
		 alert("Invalid Last name.");
		 document.getElementById("lastname").value = "";
		 }
	}
</script>
				<div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="col-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="cs-container">
												<div class="cs-invoice cs-style1">
													<div class="cs-invoice_in" id="download_section">
													    <div class="row">
													        <div class="col-md-6">
																<div class="cs-logo cs-mb5">
																	<img src="logo.jpeg" alt="" style="border: 0; width: 100px; height: 100px; vertical-align: middle;">
																</div>
													        </div>
													        <div class="col-md-6 text-right">
													            <p style="margin-bottom:0.1px;color:#000;line-height:19px;">EastMed Hospitals & Diagnostics Pvt Ltd<br>47(35),BT Road,Kumarpara,PO: Talpukur,Barrackpore<br>Kolkata,700120<br>Phone: 8334857257<br>Email: care@eastmedhospital.com</p>
													        </div>
													    </div>
														<hr>
													    <div class="row">
													        <div class="col-md-12">
														        <h3 class="text-center" align="center">Associate Master Details</h3>
													        </div>
													    </div>
														<div id="daily"></div>
														
														<div class="cs-note" align="center" style="margin-top:20px; line-height:1.5em; display:flex;">
															<div class="cs-note_right" style="width:100%;vertical-align: middle;">
																	
																 <p class="cs-primary_color">
																	<b  style="font-weight: bold;">***End of Receipt. Thank You***</b>
																 </p>
															 </div>
														</div>
													</div>
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section')"> Print </button>
														
														<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_daily_transactions.php';"> Close </button>
													</div>
												</div>
											
											</div>
										</div>
									</div>
								</div>	
							</div>	
						</div>
					</div>
				</div>
				
				
<script>							

					function printpage() 

					{
						
						$.ajax

						({

							type: "POST",

							url: "department_master_print.php",

							data: {},

							dataType: "html",                  

							success: function(data){ 

							//alert('hh');

							$("#daily").html(data); 

							}

						});

					}
				</script>
<script>
					function printContent (el)
					{
						var restorepage = document.body.innerHTML;
						var printContent = document.getElementById(el).innerHTML;
						document.body.innerHTML = printContent;
						window.print();
						document.body.innerHTML = restorepage;
					}

				</script>
				
	<script>
	function delete_data(id)
	{
		
		if (confirm("Are you sure want to delete this records")) 
		{
		jQuery.ajax
		({
			url:'opd_booking_delete.php',
			type: 'POST',
			data: 'id='+id,
			success:function(result)
			{
				jQuery('#tr_'+id).hide(500);
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
				<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

				<script>



				function ExportToExcel(type, fn, dl) {

					var elt = document.getElementById('table11');

					var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });

					return dl ?

						XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :

						XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));

				}



			</script>
				  <!-- plugins:js -->
				  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
				  <!-- endinject -->
				  <!-- Plugin js for this page -->
				  <script src="assets/vendors/chart.js/Chart.min.js"></script>
				  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
				  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
				  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
				  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
				  <!-- End plugin js for this page -->
				  <!-- inject:js -->
				  <script src="assets/js/chart.js"></script>
				  <script src="assets/js/off-canvas.js"></script>
				  <script src="assets/js/hoverable-collapse.js"></script>
				  <script src="assets/js/misc.js"></script>
				  <script src="assets/js/settings.js"></script>
				  <script src="assets/js/todolist.js"></script>
				  <!-- endinject -->
				  <!-- Custom js for this page -->
				  <script src="assets/js/dashboard.js"></script>
				  <!-- End custom js for this page -->
			</body>
		</html>
		<?php } else {
		header("Location: index.php");
} ?>