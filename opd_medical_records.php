<?php
	include 'connection.php';
	session_start();
	if ($_SESSION['cus']['login'] == "true") {  
	$sql2="SELECT * FROM `opd_medical_record` order by cast(SUBSTRING(`Record_Id`, 3,length(`Record_Id`)-2) as UNSIGNED) DESC LIMIT 1;";
		$result2=$conn->query($sql2);
		$i=0;
		while($row=$result2->fetch_assoc())
		{
			$dD_id = $row["Record_Id"];
			$l=strlen($dD_id);
			$st=substr($dD_id, 0,2);
			$d=substr($dD_id, 2,$l);
			$d=$d+1;
			$ddid=$st.$d;
			$i++;
		}
		if($i==0)
		{
			$ddid='R-1';
		}
	
	
		
		?>
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<!-- Required meta tags -->
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<title>EastMed</title>
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
				<style type="text/css" media="print">
                	@media print
                	{
                		@page {
                    		margin-top: 0;
                    		margin-bottom: 0;
                		}
                		body  {
                    		padding-top:72px;
                    		padding-bottom:72px;
                    		background:#fff;
                		}
                		th:last-child, td:last-child {
                            visibility:hidden;
                        }
                        #buttons {
                            visibility:hidden;
                        }
                	} 
                </style>
			</head>
			<body>
				<div class="container-scroller">
					<?php include "menu.php"; ?>
					
					
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<?php include "header.php";?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> OPD Medical Records </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="col-md-12 grid-margin">
									<form class="forms-sample booking-page"method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleInputName1">Patient Id <span class="text-danger">*</span></label>
															<input type="text" class="form-control" id="p_id" name="p_id"  onchange="Patient(this.value);" onkeyup='caps(this.value);' required>
															<input type="hidden" class="form-control" id="r_id" name="r_id" placeholder="Name" value="<?php echo $ddid;?>"required>
															
														</div>
													</div>
												
												
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleInputName1">Appointment Id <span class="text-danger">*</span></label>
															<input type="text" class="form-control" id="a_id" name="a_id"  onchange="appointment(this.value);" onkeyup='caps2(this.value);' required>
															
															
														</div>
													</div>
												</div>
											</div>
										</div>
										<script>
				 function caps(str)
				 {
					var n=str.toUpperCase();
					
					//alert(str2);
					document.getElementById("p_id").value = n;
				 }
				
				</script>	
				<script>
				 function caps2(str)
				 {
					var n=str.toUpperCase();
					
					//alert(str2);
					document.getElementById("a_id").value = n;
				 }
				
				</script>	
										<script>
											function Patient(str) 
											{ 
												//alert(str);
												
												if (str.length == 0) 
												{ 
													//alert("H");
													document.getElementById("name").value = "";
													document.getElementById("age").value = "";
													document.getElementById("gender").value = "";
													document.getElementById("contact").value = "";
													return; 
												} 
												else 
												{ 
													
												  // alert(str);
													var xmlhttp = new XMLHttpRequest(); 
													xmlhttp.onreadystatechange = function () {
														
													   
														if (this.readyState == 4 &&  this.status == 200) 
														{ 
														  
															var myObj = JSON.parse(this.responseText); 
													 
															
															//document.getElementById ("d_id").value = myObj[0]; 
															document.getElementById("name").value = myObj[0]; 
															document.getElementById("age").value = myObj[1]; 
															document.getElementById("gender").value = myObj[2]; 
															document.getElementById("contact").value = myObj[3]; 
															
															
														} 
													}; 
													// xhttp.open("GET", "filename", true); 
													xmlhttp.open("GET", "opd_extract_patient_from_id.php?id=" + str, true); 
													// Sends the request to the server 
													xmlhttp.send(); 
												} 
											} 
										</script>
										<script>
											function appointment(str) 
											{ 
												//alert(str);
												
												if (str.length == 0) 
												{ 
													//alert("H");
													document.getElementById("d_name").value = "";
													document.getElementById("d_id").value = "";
													return; 
												} 
												else 
												{ 
													
												  // alert(str);
													var xmlhttp = new XMLHttpRequest(); 
													xmlhttp.onreadystatechange = function () {
														
													   
														if (this.readyState == 4 &&  this.status == 200) 
														{ 
														  
															var myObj = JSON.parse(this.responseText); 
													 
															
															document.getElementById ("d_id").value = myObj[0]; 
															document.getElementById("d_name").value = myObj[1]; 
															
															
															
															
														} 
													}; 
													// xhttp.open("GET", "filename", true); 
													xmlhttp.open("GET", "opd_extract_id_from_docname.php?name=" + str, true); 
													// Sends the request to the server 
													xmlhttp.send(); 
												} 
											} 
										</script>
										

										<div class="card records-card mt-2">
											<div class="card-body">
												<h4>Patient Details
													<hr>
												</h4>

												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputEmail3">Patient Name:</label>
															<input type="text" class="form-control" id="name" name="name"  value="" readonly>
															
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">Age(In Years) </label>
															<input type="text" class="form-control" id="age" name="age"  value="" readonly>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">Gender </label>
															<input type="text" class="form-control" id="gender" name="gender"  value="" readonly>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">Contact</label>
															<input type="text" class="form-control" id="contact" name="contact"  value="" readonly>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">Height(cms)</label>
															<input type="number" class="form-control" value="" name="height" >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">Weight(kg)</label>
															<input type="number" class="form-control" value="" name="weight" >
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">BP</label>
															<input type="text" class="form-control" value="" name="bp" >
														</div>
													</div>
													<div class="col-md-12">
													  <div class="form-group">
														<label for="exampleInputPassword4">Medical History</label>
														<textarea type="text" rows="4"  class="form-control" id="history" name="history" value=""></textarea>
													  </div>
													</div>
												</div>
											</div>
										</div>
										<div class="card records-card mt-2">
											<div class="card-body">
												<h4>Doctor Details
													<hr>
												</h4>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleInputEmail3">Doctor Name:<span class="text-danger">*</span></label>
															<input type="text" class="form-control" name="d_name" id="d_name" readonly required>
															
															
														</div>
													</div>
													
															<input type="hidden" class="form-control" id="d_id" name="d_id" placeholder="eg: D-09776" readonly required>
															
														
												</div>
											</div>
										</div>
										
										<div class="card records-card mt-2">
											<div class="card-body">
												<h4>Prescribed Medicine
													<hr>
												</h4>

												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputEmail3"> Medicine name :<span class="text-danger">*</span></label>
															<?php
																$i=[];
																$adata=[];
																$sql="SELECT Medicine_Name FROM medicine_master; ";
																$result=$conn->query($sql);
																while($row=$result->fetch_assoc())
																{
																	array_push($i,$row["Medicine_Name"]);
																	$adata[$row["Medicine_Name"]]=$row["Medicine_Name"];
																}
															?>
															<select class="form-control" name="med_name" id="med_name" required="">
															  <option value="">Medicine name</option>
																<?php
																	foreach($i as $item)
																	{
																		echo "<option value='$item'>$item</option>";
																	}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label for="exampleInputPassword4">Dosage : <span class="text-danger">*</span></label>
															
															<select class="form-control" name="dosage_name" id="dosage_name" required="">
															  <option value="">Dosage Type</option>
															  <option>1-0-0</option>
															  <option>1-0-1</option>
															  <option>1-1-0</option>
															  <option>1-1-1</option>
															  <option>0-1-1</option>
															  <option>0-0-1</option>
															  <option>0-1-0</option>
																<option>Hourly</option>
															</select>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label for="exampleInputPassword4">Timing : <span class="text-danger">*</span></label>
															<select class="form-control" name="timing" id="timing" required="">
															  <option value="">Select Timing</option>
															  <option>Before</option>
															  <option>After</option>
															</select>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label for="exampleInputPassword4">Description :<span class="text-danger">*</span> </label>
															<input type="text" class="form-control"  name="descrip" id="descrip" value="">
														</div>
													</div>
													<div class="col-md-3">
														<div class="mt-3">
															<button type="submit" id="showdata" name="showdata" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"  style="margin:0;font-size:15px;"></i></button>
														</div>
													</div>
												</div>
												<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
												<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
												<script type="text/javascript">
													//data insertion
													$(document).ready(function()
													{
														$('#showdata').click(function(event)
														{
															
															event.preventDefault();
															var	medname = $('#med_name').val();
															var	dosage = $('#dosage_name').val();
															var timing = $('#timing').val();
															var descrip = $('#descrip').val();
															var r_id = $('#r_id').val();
															if(medname==''){alert('Please select medicine name!!');return false;} 
															else if( dosage==''){alert('Please select dosage type of medicine!!');return false;}
															else if( timing==''){alert('Please select timing of medicine!!');return false;}
															else if(descrip==''){alert('Please describe intake of medicine!!');return false;}
															else{
															$.ajax
															({
																type: "POST",
																url: "opd_medicine_records_add.php",
																data: {r_id:r_id,medname:medname,dosage:dosage,timing:timing,descrip:descrip},		    
																dataType: "json",
																success: function(result)
																{	
																	if (result==1)
																	{
																		loadData();
																		function loadData()
																		{
																			$.ajax
																			({    
																				type: "POST",
																				url: "opd_medicine_records_view.php",
																				data: {r_id:r_id},
																				dataType: "html",                  
																				success: function(data){                    
																				    $("#table-show").html(data); 
																					document.getElementById("descrip").value = "";
                                                                    
    			                                                    document.getElementById("med_name").innerHTML = "<option value=''>Medicine name</option>";
																	document.getElementById("dosage_name").innerHTML = "<option value=''>Dosage Type</option>";
																	document.getElementById("timing").innerHTML = "<option value=''>Select Timing</option>";
    			                                                   
																				}
																			});
																		}
																	}
																	else
																	{
																	  alert("Some thing went wrong try again");
																	}
																	
																}
															});
															}
														});
													});
													//data display
													
												</script>
												<script>
													 function myDelFunction(delid) 
													{
														var r_id = $('#r_id').val();
														//alert(r_id+delid);
														
														var deleteId = delid;
														$.ajax
															({
																url : "opd_medicine_records_delete.php",
																type: "POST",
																cache:false,
																data:{deleteId: deleteId,r_id:r_id},
																success:function(response)
																{
																	
																	if (response==1)
																	{
																		loadData();
																		function loadData()
																		{
																			$.ajax
																			({    
																				type: "POST",
																				url: "opd_medicine_records_view.php",
																				data: {r_id:r_id},
																				dataType: "html",                  
																				success: function(data){                    
																					$("#table-show").html(data); 
																				}
																			});
																		}
																	}
																	else
																	{
																	  alert("Something went wrong try again");
																	}
																}
															});
													}
															
												</script>
													
												<div id="table-show" style="padding-left: 2px; padding-right: 2px;"></div>		
											</div>
										</div>
										<div class="card records-card mt-2">
											<div class="card-body">
												<h4> Tests
													<hr>
												</h4>
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputEmail3"> Pathology:</label>
															<?php
																$i=[];
																$adata=[];
																$sql="SELECT Test_Name FROM diagnostics_master WHERE Test_Type='Pathology'; ";
																$result=$conn->query($sql);
																while($row=$result->fetch_assoc())
																{
																	array_push($i,$row["Test_Name"]);
																	$adata[$row["Test_Name"]]=$row["Test_Name"];
																}
															?>
															<select class="form-control" name="path" id="path" >
															  <option>Tests name</option>
																<?php
																	foreach($i as $item)
																	{
																		echo "<option value='$item'>$item</option>";
																	}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="mt-3">
															<button type="submit" id="Pathology" name="showdata1" onclick="sub(this.id)" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"  style="margin:0;font-size:15px;"></i></button>
														</div>
													</div>
													<script type="text/javascript" src="js/jquery.js"></script>
													<script type="text/javascript">

														function sub(str)
														{
															//alert('hh');
															var path = $('#path').val();
															//var radio = $('#radio').val();
															var r_id = $('#r_id').val();
															var type = str;
															//alert(type);
															if(path!='Tests Name')
															{
																event.preventDefault();
																$.ajax
																({
																	type: 'post',
																	url: 'opd_test_records_add.php',
																	data: {r_id:r_id,path:path,type:type},
																	success: function (response) 
																	{ 
																		if(response==1)
																		{
																			loadData();
																			function loadData()
																			{
																				$.ajax
																				({    
																					type: "POST",
																					url: "opd_test_records_view.php",
																					data: {r_id:r_id},

																					success: function(response){                    
																					$("#table-show1").html(response); 
																					}
																				});
																			}
																		}
																		else
																		{
																		  alert("Some thing went wrong try again");
																		}
																  }
																 });
															}	
															
																	
														}

													</script>
													<script>
													 function myDelFunction212(delid) 
													{
														var r_id = $('#r_id').val();
														//alert(r_id+delid);
														
														var deleteId = delid;
														$.ajax
															({
																
																url : "opd_test_records_delete.php",
																type: "POST",
																cache:false,
																data:{deleteId: deleteId,r_id:r_id},
																success:function(response)
																{
																	//alert(response);
																	if (response==1)
																	{
																			loadData();
																			function loadData()
																			{
																				$.ajax
																				({    
																					type: "POST",
																					url: "opd_test_records_view.php",
																					data: {r_id:r_id},

																					success: function(response){                    
																					$("#table-show1").html(response); 
																					}
																				});
																			}
																	}
																	else
																	{
																	  alert("Something went wrong try again");
																	}
																}
															});
													}
															
												</script>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputEmail3"> Radiology:</label>
															<?php
																$i=[];
																$adata=[];
																$sql="SELECT Test_Name FROM diagnostics_master WHERE Test_Type='Radiology'; ";
																$result=$conn->query($sql);
																while($row=$result->fetch_assoc())
																{
																	array_push($i,$row["Test_Name"]);
																	$adata[$row["Test_Name"]]=$row["Test_Name"];
																}
															?>
															<select class="form-control" name="radio" id="radio" required>
															  <option>Tests name</option>
																<?php
																	foreach($i as $item)
																	{
																		echo "<option value='$item'>$item</option>";
																	}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-3"> 
														<div class="mt-3">
															<button type="submit" id="Radiology"  name="showdata2" onclick="sub2(this.id)" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"  style="margin:0;font-size:15px;"></i></button>
														</div>
													</div>
													<script type="text/javascript">

														function sub2(str)
														{
															//alert('hh');
															//var path = $('#path').val();
															var path = $('#radio').val();
															var r_id = $('#r_id').val();
															var type = str;
															//alert(type);
															if(radio!='Tests Name')
															{
																event.preventDefault();
																$.ajax
																({
																	type: 'post',
																	url: 'opd_test_records_add.php',
																	data: {r_id:r_id,path:path,type:type},
																	success: function (response) 
																	{ 
																		if(response==1)
																		{
																			loadData();
																			function loadData()
																			{
																				$.ajax
																				({    
																					type: "POST",
																					url: "opd_test_records_view.php",
																					data: {r_id:r_id},

																					success: function(response){                    
																					$("#table-show1").html(response); 
																					}
																				});
																			}
																		}
																		else
																		{
																		  alert("Some thing went wrong try again");
																		}
																  }
																 });
															}	
															
																	
														}

													</script>
												</div>
												<div id="table-show1" style="padding-left: 2px; padding-right: 2px;"></div>		
												
												
												
												
												<div class="row">
													<div class="col-md-6">
													  <div class="form-group">
														<label for="exampleInputPassword4">Diagnosis<span class="text-danger">*</span></label>
														<textarea type="text" rows="4"  class="form-control" id="diagnosis" name="diagnosis" required></textarea>
													  </div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
														  <label for="exampleInputPassword4">Advice<span class="text-danger">*</span></label>
														  <textarea type="text" rows="4" class="form-control"  name="advice" required></textarea>
														</div>
													</div>
													
												</div>
												<div class="row mt-3">
													<div class="col-md-4">
													  <div class="form-group">
														<label for="exampleInputPassword4">Next Visit
														</label>
														<input type="text" class="form-control"  name="visit">
													  </div>
													</div>
												</div>
												
											</div>
										</div>
										<button type="submit" class="btn btn-primary mr-2" name="add2" onclick="reg2()">Submit</a>
										<button class="btn btn-primary mr-2">Cancel</button>
									</form>
								</div>
							</div>
							<?php
								function reg2()
								{
									if (isset($_POST['add2'])) 
									{
										include 'connection.php';
										$p_id=$_POST['p_id'];
										$r_id=$_POST['r_id'];
										$a_id=$_POST['a_id'];
										$h=$_POST['height'];
										$w=$_POST['weight'];
										$bp=$_POST['bp'];
										$history=$_POST['history'];
										$d_id=$_POST['d_id'];
										
										
										$diagnosis=$_POST['diagnosis'];
										$visit=$_POST['visit'];
										$advice=$_POST['advice'];	
										$sql="SELECT Booking_Id FROM opd_patient_appointment WHERE Appointment_Id='$a_id';";
										$r=$conn->query($sql);		
										
										if($r->num_rows>0)
										{
											while($row=$r->fetch_assoc())
											{
												$b_id=$row['Booking_Id'];
												//$fees=$row['Opd_Fees'];
											}
										}
										
										
										include 'connection.php';
										
										$sql="INSERT into opd_medical_record  values('$r_id','$a_id','$p_id','$d_id','$h','$history','$w','$bp','$diagnosis','$advice','$visit',now());";
										
										
										if ($conn->query($sql) === TRUE) 
										{
											$p="UPDATE opd_patient_booking SET status='Visited' WHERE booking_id='$b_id';";
											$conn->query($p);
											
											?>
												<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
													<div class="modalcontent">
														<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
														<h3 style="color: #000; text-align: center;">Successful!</h3>
														<h6 style="color: #000; text-align: center; padding-bottom: 10px; color: #636262; font-size: 13px;">Medical Record Entered Successfully.</h6>
														<div class="dropdown-divider" style="border-top: 0px solid #b3b3b3;"></div>
														<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
															<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_medical_records_view.php';">Close</button>
															<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal7" data-whatever="@fat" onClick="confirm(this.id)" id="<?php echo $r_id;?>">Print</button>
															
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
												  <h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error Occurred While Entry. Please try again.</h6>
												  <div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
												  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_medical_records_view.php';">Close</button></div>
												    
												</div>
											  </div>
											  <?php
										}
										
									}
								}
								reg2();
							?>
							
							
							<?php include "footer.php";?>
						</div>
					</div>
				</div>
				<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<div class="cs-invoice_in" id="download_section2">
														<div id="invoice2"></div>
														
															
													</div>
														
													
													<br><br><br>
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section2')"> Print </button>
														
														
														<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_medical_records_view.php';"> Close </button>
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
					function confirm(id) 
					{
						
						
						//alert(id);
						$.ajax
						({
							type: "POST",
							url: "opd_prescription.php",
							data: {id:id},
							dataType: "html",                  
							success: function(data){ 
							//alert('hh');
							$("#invoice2").html(data); 
							}
						});
					}					
					
				</script>
					
				
				<!-- container-scroller -->
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