<?php
	include 'connection.php';
	session_start();
	/*if($_SESSION['is_login'])
	{*/
		//keep user on page
		?>
		<!DOCTYPE html>
		<html lang="en">
			<head>
				
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<title>EastMed</title>
				
				<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
				<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
				
				<link rel="stylesheet" href="assets/css/all.min.css">
				<link rel="stylesheet" href="assets/css/fontawesome.min.css">
				<link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
				<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
				<link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
				<link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
				
				<link rel="stylesheet" href="assets/css/style.css">
				<link rel="stylesheet" href="assets/css/custom.css">
				
				<link rel="shortcut icon" href="assets/images/favicon.png" />
			</head>
			<body>
				<div class="container-scroller">
				  <!-- partial:partials/_sidebar.html -->
					<?php include "menu.php"; ?>
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<?php include "header.php";?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> Patient History </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="col-md-15">
									<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputPassword4">Contact </label>
															<input type="type" class="form-control" id="contact" name="contact" onchange="GetDetail(this.value);" placeholder="Contact">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="exampleInputName1">Patient Name </label>
															<select class="form-control" name="name" id="name" onchange="GetDetail2(this.value);">
																<option>Select Name</option>
															</select>
														</div>
													</div>
													<div class="col-md-3" hidden>
														<div class="form-group">
															<label for="exampleInputName1">Patient Id </label>
															<input type="text" class="form-control"  id="reg" name="reg">
														</div>
													</div>
													<script>
														
													</script>
													<div class="col-md-3">
														<div class="mt-3">
															
															<button type="submit" class="btn btn-primary" id="search" name="search" >Search</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
									
									
									<?php
										if(isset($_POST['search']))
										{
											$contact=$_POST['contact'];
											$name=$_POST['name'];
											$reg=$_POST['reg'];
											
											$arr=explode(" ",$name);
											
											$sql= "SELECT * FROM opd_patient_booking WHERE First_Name='$arr[0]' AND Last_Name='$arr[1]' AND Mobile='$contact' AND (Status='Visited' OR Status='Appointed');";
											$result=$conn->query($sql);
											if($result->num_rows>0)
											{
												?>
												<div class="row mt-4">
													<div class="col-md-12">
														<div class="appointment-table table-responsive">
															<h3>Booking Information</h3>
															<div class="table-responsive table-sec mb-4 ">
																<table class="table">
																	<thead>
																		<tr>
																		  <th style="text-align: center;">Date</th>
																		  <th style="text-align: center;">Time</th>
																		  <th style="text-align: center;">Doctor</th>
																		  <th style="text-align: center;">Status</th>
																		  
																		  
																		</tr>
																	</thead>
																	<form action="" method="POST">
																		<tbody style="text-align: center;">
																			<?php
																				while($row=$result->fetch_assoc())
																				{
																					$id= $row["Booking_Id"];
																					$d_id =$row["Doctor_Id"];
																					$time =$row["Time"];
																					$appoint_date =$row["Appoint_Date"];
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
																					$sql3="SELECT Appointment_Id FROM opd_patient_appointment WHERE Booking_Id ='$id';";
																					$result3=$conn->query($sql3);
																					if($result3->num_rows>0)
																					{
																						while($row=$result3->fetch_assoc())
																						{
																						
																							$aid = $row["Appointment_Id"]; 
																							
																						}
																					}
																					if($status=='Appointed')
																					{
																						?>
																						<tr id="<?php echo $aid;?>" >
																							<td><?php echo $appoint_date;?></td>
																							<td><?php echo $time;?></td>
																							<td><?php echo $doctor;?></td>
																							<td><?php echo $status;?></td>
																							
																						</tr>
																						<?php
																					}
																					else
																					{
																						?>
																						<tr id="<?php echo $aid;?>" >
																							<td><?php echo $appoint_date;?></td>
																							<td><?php echo $time;?></td>
																							<td><?php echo $doctor;?></td>
																							<td><?php echo $status;?></td>
																							</tr>
																						<?php
																					}
																					
																					
																					
																				}
																			?>
																		</tbody>
																	</form>
																</table>
															</div>
														</div>
													</div>
													<div class="col-md-4" id="table-show"></div>
												</div>
												<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_doc_landing.php';">Close</button>
												<?php
											}
											else
											{?>
												<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 700px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
													<div class="modalcontent">
													  <img src="fail.png" alt="Success!" style="height: 50px; padding-left: 195px; margin-top: 25px;">
													  <h3 style="color: #000; text-align: center; padding-top: 28px;">Something Went Wrong!</h3>
													  <h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error Occurred While Search. Please try again.</h6>
													  <div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
													  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_patient_history.php';">Close</button></div>
													  <a href="opd_patient_history.php" class="modalclose" style="text-decoration: none; color: black; top: 5px;">&times;</a>    
													</div>
												</div>
												  <?php
											}	
										}	
									?>
								</div>
							</div>
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
														
														
														<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_patient_history.php';"> Close </button>
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
					function view(clicked) 
					{
						var id = clicked;
						//alert('ID '+id+ '!');
						$.ajax
						({
							type: "POST",
							url: "opd_print_receipt.php",
							data: {id:id},
							dataType: "html",                  
							success: function(data){ 
							//alert('hh');							
							$("#invoice").html(data); 
							}
						});
					}					
					
				</script>
		
				
				<script>
					function GetDetail(str) 
					{ 
						//alert(str);
						document.getElementById("reg").value = "";
						if (str.length == 0) 
						{ 
							document.getElementById("name").value = "";
							return; 
						} 
						else 
						{ 
							
							var xmlhttp = new XMLHttpRequest(); 
							xmlhttp.onreadystatechange = function () { 
							   
								if (this.readyState == 4 &&  this.status == 200) 
								{ 
								  
									var myObj = JSON.parse(this.responseText); 
									
									var str="";
									str = myObj[0];
									var elmts="";
									 elmts = str.split(',');
									
									var select = document.getElementById("name");
									
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
							xmlhttp.open("GET", "opd_extract_pname_from_contact.php?contact=" + str, true); 
							// Sends the request to the server 
							xmlhttp.send(); 
						} 
					} 
				</script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				<script>
					function GetDetail2(str) 
					{ 
						//alert(str);
						if (str.length == 0) 
						{ 
							document.getElementById("reg").value = ""; 
							return; 
						} 
						else 
						{ 
							var contact=document.getElementById("contact").value; 
							var xmlhttp = new XMLHttpRequest(); 
							xmlhttp.onreadystatechange = function ()
							{ 
								if (this.readyState == 4 &&  this.status == 200) 
								{ 
									var myObj = JSON.parse(this.responseText); 
									document.getElementById ("reg").value = myObj[0];
									if (myObj[0]=="")
									{
										document.getElementById('button').disabled = false;
										document.getElementById('search').disabled = true;
										//document.getElementById('confirm').disabled = true;
									}
									else
									{
										document.getElementById('button').disabled = true;
										document.getElementById('search').disabled = false;
										//document.getElementById('confirm').disabled = false;
									}
								} 
							}; 
							// xhttp.open("GET", "filename", true); 
							xmlhttp.open("GET", "opd_extract_reg_from_pname.php?name=" + str + "&contact=" +contact, true); 
							// Sends the request to the server 
							xmlhttp.send(); 
						} 
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
		

			