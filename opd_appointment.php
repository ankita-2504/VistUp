<?php
	include 'connection.php';
	session_start();
	if ($_SESSION['cus']['login'] == "true") { 
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
						<?php include "header.php"; ?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> Appointment </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="col-md-15">
									<?php
										if($_REQUEST['flag'] == "add")
										{?>
											<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
												<div class="card">
													<div class="card-body">
														<div class="row">
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputPassword4">Contact </label>
																	<input type="number" class="form-control" id="scontact" name="contact" value="<?php echo $_SESSION['Pcontact']; ?>"  readonly>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputName1">Patient Name </label>
																	<input type="type" class="form-control" id="sname" name="name" value="<?php echo $_SESSION['Pname']; ?>"  readonly>
																
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputName1">Patient Id </label>
																	<input type="text" class="form-control"  id="sreg" name="reg" value="<?php echo $_SESSION['Pregn']; ?>"readonly>
																	<input type="hidden" class="form-control"  id="sadd" name="sadd">
																</div>
															</div>
															 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

															  <script>
																$(document).ready(function() 
																{
																	var n=document.getElementById("sname").value;
																	var c=document.getElementById("scontact").value;
																	var r=document.getElementById("sreg").value;

																	
																	$.ajax

																	({

																		type: "POST",

																		url: "opd_appointment_table_show.php",

																		data: {n:n,c:c,r:r},

																		dataType: "html",                  
																		
																		success: function(data){ 

																		

																		$("#tabledata").html(data); 
																		//alert('r');
																		}

																	});
																	
																 
																});
															  </script>
															
														</div>
													</div>
												</div>
											</form>
											<?php
										}
										else if($_REQUEST['flag'] == "edit")
										{?>
											<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
												<div class="card">
													<div class="card-body">
														<div class="row">
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputPassword4">Contact </label>
																	<input type="type" class="form-control" id="scontact" name="contact" value="<?php echo $_SESSION['Rcontact']; ?>"  readonly>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputName1">Patient Name </label>
																	<input type="type" class="form-control" id="sname" name="name" value="<?php echo $_SESSION['Rname']; ?>"  readonly>
																
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputName1">Patient Id </label>
																	<input type="text" class="form-control"  id="sreg" name="reg" value="<?php echo $_SESSION['Rregn']; ?>"readonly>
																	<input type="hidden" class="form-control"  id="sadd" name="sadd">
																</div>
															</div>
															 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

															  <script>
																$(document).ready(function() 
																{
																	var n=document.getElementById("sname").value;
																	var c=document.getElementById("scontact").value;
																	var r=document.getElementById("sreg").value;

																	
																	$.ajax

																	({

																		type: "POST",

																		url: "opd_appointment_table_show.php",

																		data: {n:n,c:c,r:r},

																		dataType: "html",                  
																		
																		success: function(data){ 

																		

																		$("#tabledata").html(data); 
																		//alert('r');
																		}

																	});
																	
																 
																});
															  </script>
															
														</div>
													</div>
												</div>
											</form>
											<?php
										}
										else if($_REQUEST['flag'] == "book")
										{
											if (isset($_GET['contact'])) 
											{
												$pcont = $_GET['contact'];
											}
											?>
											<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
												<div class="card">
													<div class="card-body">
														<div class="row">
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputPassword4">Contact </label>
																	<input type="number" class="form-control" id="scontact" name="contact" value="<?php echo $pcont; ?>" onblur="GetDetail(this.value);" >
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputName1">Patient Name </label>
																	<select class="form-control" name="name" id="sname" onclick="GetDetail2(this.value);">
																		<option>Select Name</option>
																	</select>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputName1">Patient Id </label>
																	<input type="text" class="form-control"  id="sreg" name="reg">
																	<input type="hidden" class="form-control"  id="sadd" name="sadd">
																</div>
															</div>
															
															<div class="col-md-3">
																<div class="mt-3">
																	<button type="button" class="btn btn-primary" onclick="set();"  id="button" name="button" disabled data-toggle="modal" data-target="#exampleModal25" data-whatever="@mdo"> Register</button>
																	  <button type="button" class="btn btn-primary" onclick="showdata();" id="search" name="search" disabled >Search</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
											<?php
										}
										else
										{
											?>
												<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
													<div class="card">
														<div class="card-body">
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputPassword4">Contact </label>
																		<input type="number" class="form-control" id="scontact" name="contact" onchange="GetDetail(this.value);" >
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputName1">Patient Name </label>
																		<select class="form-control" name="name" id="sname" onchange="GetDetail2(this.value);">
																			<option>Select Name</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputName1">Patient Id </label>
																		<input type="text" class="form-control"  id="sreg" name="reg">
																		<input type="hidden" class="form-control"  id="sadd" name="sadd">
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div class="mt-3">
																		<button type="button" class="btn btn-primary" onclick="set();"  id="button" name="button" disabled data-toggle="modal" data-target="#exampleModal25" data-whatever="@mdo"> Register</button>
																		  <button type="button" class="btn btn-primary" onclick="showdata();" id="search" name="search" disabled >Search</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</form>
									
											<?php
										}
										
									?>
									<script>							

										function showdata() 

										{
											
											var n=document.getElementById("sname").value;
											var c=document.getElementById("scontact").value;
											var r=document.getElementById("sreg").value;

											
											$.ajax

											({

												type: "POST",

												url: "opd_appointment_table_show.php",

												data: {n:n,c:c,r:r},

												dataType: "html",                  
												
												success: function(data){ 

												

												$("#tabledata").html(data); 
												//alert('r');
												}

											});

										}
									</script>
				
									<script>
										function set()
										{
											//var n=document.getElementById("sname").value;
											var c=document.getElementById("scontact").value;
											var ad=document.getElementById("sadd").value;
											
											
											document.getElementById("cont").value=c;
											document.getElementById("town").value=ad;
										}
									</script>
									<div class="row mt-4">
										
											<div id="tabledata"></div>
											
											<div class="col-md-4" id="table-show"></div>
										
										
									</div>
									<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php'">Refresh</button>
									<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_doc_landing.php'">Cancel</button>
												
									
								</div>
							</div>
							<?php include "footer.php"; ?>

						</div>
					</div>
				</div>
				
				<div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
														<div id="letter"></div>
														
														
															
													</div>
													
													
													
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section2')"> Print </button>
														
														
														<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button>
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
				
				
		
				
				
				<div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<div class="cs-invoice_in" id="download_section3">
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
														        <h3 class="text-center" align="center">Appointment Advice</h3>
													        </div>
													    </div>
														<br>
														<div id="slip"></div>
														
														
														<br>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Reporting Time:  </b> <br>	-Please Report at front-desk at main reception at least 15 minutes prior your scheduled appointment. <br>
															-Carry a copy of this letter and your medical records and details of investigations (such as CT Scan films etc).
														</p><br>
														<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>One attendant:  </b><br> -Only one attendant can company an adult patient.<br> -If the patient is below 12 years, both parents can accompany the patient.	</p>
														<br><p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Waiting Time:  </b> <br>-Every effort will be made for you to be seen close to your time of appointment.<br>-We aim to keep the waiting time under 1 hour.<br>-Unfortunately, medical emergencies and the needs of other patients may cause additional delay.	</p>
														<br><p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>General Points:  </b> <br>-Please keep your phone on silent mode once you enter hospital premises.<br>-We look forward to being of service to you.</p>	
															
													<div class="cs-note" align="center" style="margin-top:20px; line-height:1.5em; display:flex;">
															<div class="cs-note_right" style="width:100%;vertical-align: middle;">
																	
																 <p class="cs-primary_color">
																	<b  style="font-weight: bold;">Additional Information:</b>This is a computer generated invoice where signature is not required.</b>
																	<br>
																	<b  style="font-weight: bold;">***End of Receipt. Thank You***</b>
																 </p>
															 </div>
														</div>
													
													</div>
													
													
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section3')"> Print </button>
														
														
														<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button>
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
				<div class="modal fade" id="exampleModal77" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
														        <h3 class="text-center" align="center">Invoice Cum Receipt</h3>
													        </div>
													    </div>
														<div id="receipt"></div>

													    <div class="cs-note" align="center" style="margin-top:20px; line-height:1.5em; display:flex;">
															<div class="cs-note_right" style="width:100%;vertical-align: middle;">
																	
																 <p class="cs-primary_color">
																	<b  style="font-weight: bold;">Additional Information:</b>This is a computer generated invoice where signature is not required.</b>
																	<br>
																	<b  style="font-weight: bold;">***End of Receipt. Thank You***</b>
																 </p>
															 </div>
														</div>
														
														
													</div>
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section')"> Print </button>
														
														<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button>
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

					function receipt(id) 

					{
						
						$.ajax

						({

							type: "POST",

							url: "opd_receipt.php",

							data: {id:id},

							dataType: "html",                  

							success: function(data){ 

							

							$("#receipt").html(data); 
							//alert('r');
							}

						});

					}
				</script>
				
				<script>							

					function slip(id) 

					{
						//alert('s');
						$.ajax

						({

							type: "POST",

							url: "opd_slip.php",

							data: {id:id},

							dataType: "html",                  

							success: function(data){ 

							//alert('hh');

							$("#slip").html(data); 

							}

						});

					}
				</script>
				<script>							

					function refund(id) 

					{
						
						document.getElementById("nbk").value =id ;
						
						$.ajax

						({

							type: "POST",

							url: "opd_refund.php",

							data: {id:id},

							dataType: "html",                  

							success: function(data){ 

							//alert('hh');

							$("#refund").html(data); 

							}

						});

					}
				</script>
				
				<div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close doctor-popup-close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								 </button>
								<div class="doctor-fees mb-4" >
									<div id="refund"></div>
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<input type="hidden" class="form-control" id="nbk" name="bookid">
					
										
										<div align="center">
											<button type="submit" class="btn btn-primary mr-2" name="ref" id="ref" >Refund</button>
										</div>
									</form>
								</div>
								
							</div>

					  </div>
					</div>
				</div>
				<?php
					if (isset($_POST['ref'])) 
					{
						include 'connection.php';
						
						
						$booking_id=$_POST['bookid'];
						
					
							
						$sql23="UPDATE opd_patient_appointment SET Is_Refund=1 WHERE Booking_Id='$booking_id';";
						
						
						if ($conn->query($sql23) === TRUE) 
						{
							
							?>
								<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
									<div class="modalcontent">
										<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
										<h3 style="color: #000; text-align: center;">Refund Successful</h3>
										<div class="dropdown-divider" style="border-top: 0px solid #b3b3b3;"></div>
										<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
											
											<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button>
												
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
								  <h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error Occurred While Refund. Please try again.</h6>
								  <div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
								  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button></div>
								   
								</div>
							</div>
							  <?php
						}
						
					}
					
				?>
				
				
				<script>							

					function letter(id) 

					{
						//alert('l');
						$.ajax

						({

							type: "POST",

							url: "opd_letter.php",

							data: {id:id},

							dataType: "html",                  

							success: function(data){ 

							//alert('hh');

							$("#letter").html(data); 

							}

						});

					}
				</script>
				<script>							
					function confirm(status) 
					{
						
						
						var id = status;
						document.getElementById("booking").value = id;
						$.ajax
						({
							type: "POST",
							url: "opd_confirm_appointment.php",
							data: {id:id},
							dataType: "html",                  
							success: function(data){ 
							//alert('hh');
							$("#confirm").html(data); 
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
					function net(str) 
					{
						
							//alert(str);
							if(str == 'Select Pay Mode')
							{
								document.getElementById("p").disabled = true;
							}
							else if(str == 'Cash')
							{
								document.getElementById("trans").style.display = "none";
								document.getElementById("transaction").value=0;
								document.getElementById("p").disabled = false;
							}
							else 
							{
								document.getElementById("trans").style.display = "block";
								document.getElementById("p").disabled = false;
							}
							var disc=document.getElementById("discount").value;
							var fees=document.getElementById("fees").value;
							var net=fees-disc;
							document.getElementById("amount").value=net;
							
						 
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
							url: "opd_show_appointment.php",
							data: {id:id},
							dataType: "html",                  
							success: function(data){                    
							$("#table-show").html(data); 
							}
						});
					}					
					
				</script>
				
				<script>
					function GetDetail(str) 
					{ 
						//alert(str);
						document.getElementById("sreg").value = "";
						document.getElementById("sadd").value = "";
						document.getElementById("sname").innerHTML = "NULL";
						if (str.length == 0) 
						{ 
							document.getElementById("sname").value = "";
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
									
									var select = document.getElementById("sname");
									//select.appendChild('Select Name');
									function GFG_Fun()
									{
										var optn = 'Select Name';
											var el = document.createElement("option");
											el.textContent = optn;
											el.value = optn;
											select.appendChild(el);
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
							document.getElementById("sreg").value = ""; 
							document.getElementById("sadd").value = ""; 
							return; 
						} 
						else 
						{ 
							var contact=document.getElementById("scontact").value; 
							var xmlhttp = new XMLHttpRequest(); 
							xmlhttp.onreadystatechange = function ()
							{ 
								if (this.readyState == 4 &&  this.status == 200) 
								{ 
									var myObj = JSON.parse(this.responseText); 
									document.getElementById ("sreg").value = myObj[0];
									document.getElementById ("sadd").value = myObj[1];
									document.getElementById("first").value=myObj[2];
											document.getElementById("last").value=myObj[3];
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
				<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close doctor-popup-close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								 </button>
								<div class="doctor-fees mb-4" >
									<div id="confirm"></div>
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Discount </label>
													<input type="text" class="form-control" id="discount" name="discount" onchange="net(this.value);" value="0">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Payment mode <span class="text-danger">*</span></label>
													<?php
														$i=[];
														$adata=[];
														$sql="select Pay_Name from pay_mode_master;";
														$result=$conn->query($sql);
														while($row=$result->fetch_assoc())
														{
															array_push($i,$row["Pay_Name"]);
															$adata[$row["Pay_Name"]]=$row["Pay_Name"];
														}
													?>
													<select class="form-control" name="paytype" id="paytype" onchange="net(this.value);" required="">
														<option value="">Select Pay Mode</option>
														<?php
															foreach($i as $item)
															{
																echo "<option value='$item'>$item</option>";
															}
														?>
													</select>
												</div>
											</div>
											
											
											<div class="col-md-12" id="trans" >
												<div class="form-group">
													<label >Transaction Id <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="transaction" name="transaction"  required>
													<input type="hidden" class="form-control" id="booking" name="booking" placeholder="eg:XYZ1246" value="">
												  
												</div>
											</div>
											<div class="col-md-5"></div>
											<div align="center">
												<button type="submit" class="btn btn-primary mr-2" name="p" id="p" disabled>Pay</button>
											</div>
										</div>
										
									</form>	
										
									
								</div>
								
							</div>

					  </div>
					</div>
				</div>
				<?php
					if (isset($_POST['p'])) 
					{
						//include 'connection.php';
						
						
						$discount=$_POST['discount'];
						
						$paytype=$_POST['paytype'];
						$transaction=$_POST['transaction'];
						$booking=$_POST['booking'];
						$sql_display="SELECT * FROM opd_patient_booking WHERE Booking_Id='$booking';";
						$res=$conn->query($sql_display);		
					
						if($res->num_rows>0)
						{
							while($row=$res->fetch_assoc())
							{
								$firstname=$row['First_Name'];
								$lastname=$row['Last_Name'];
								
								$mobile=$row['Mobile'];
								$d_id=$row['Doctor_Id'];
								$time=$row['Time'];
								$appoint_date=$row['Appoint_Date'];
								
							}
						}
						$sql0="SELECT Fees FROM doctor_fees_master WHERE Doctor_Id='$d_id' AND Fees_Type='OPD';";

	$r0=$conn->query($sql0);		

	

	if($r0->num_rows>0)

	{

		while($row=$r0->fetch_assoc())

		{

			$fees=$row['Fees'];

			//$fees=$row['Opd_Fees'];

		}

	}
						$sql="SELECT Doctor_Name,Registration_No FROM doctor_master WHERE Doctor_Id='$d_id';";
						$r=$conn->query($sql);		
						
						if($r->num_rows>0)
						{
							while($row=$r->fetch_assoc())
							{
								$doctor=$row['Doctor_Name'];
								$reg=$row['Registration_No'];
								//$fees=$row['Opd_Fees'];
							}
						}
						$sq="SELECT Patient_Id,Gender, Age,Town_Village FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
						$r1=$conn->query($sq);		
						
						if($r1->num_rows>0)
						{
							while($row=$r1->fetch_assoc())
							{
								$p_id=$row['Patient_Id'];
								
								$gender=$row['Gender'];
								$a=$row['Age'];
								$addr=$row['Town_Village'];
							}
						}
						if ($gender == 'Male')
							$salute='Mr.';
						else
							$salute='Mrs.';
						//$dateOfBirth = $dob;
						
						
						$sql2="SELECT * FROM `opd_patient_appointment` order by cast(SUBSTRING(`Appointment_Id`, 9,length(`Appointment_Id`)-8) as UNSIGNED) DESC LIMIT 1;";
						$result2=$conn->query($sql2);
						$i=0;
						while($row=$result2->fetch_assoc())
						{
							$di_id = $row["Appointment_Id"];
							$l=strlen($di_id);
							$st=substr($di_id, 0,8);
							$d=substr($di_id, 8,$l);
							$d=$d+1;
							$aid=$st.$d;
							$i++;
						}
						if($i==0)
						{
							$aid='EMD-APP-1';
						}
						$sql3="SELECT * FROM `payment` WHERE Payment_Type='OPD' order by cast(SUBSTRING(`Invoice_No`, 9,length(`Invoice_No`)-8) as UNSIGNED) DESC LIMIT 1;";
						$result3=$conn->query($sql3);
						$i=0;
						while($row=$result3->fetch_assoc())
						{
							$dd = $row['Invoice_No'];
							$l=strlen($dd);
							//echo $dd;
							$st=substr($dd, 0,8);
							$du=substr($dd, 8,$l);
							//echo $du;
							$du=$du+1;
							$inid=$st.$du;
							$i++;
						}
						if($i==0)
						{
							$inid='EMD-OPD-1';
						}
						$amount=$fees-$discount;
						$username=$_SESSION["cus"]["name"] ;
						$userid=$_SESSION["cus"]["Userid"];	
						date_default_timezone_set('Asia/Calcutta'); 
						$time=date("H:i:s");
						$sql5="INSERT INTO opd_patient_appointment( Appointment_Id, Booking_Id, Doctor_Id, Patient_Id, Amount, Pay_Mode, Transaction_id,Confirm_Date,Us_Name,Time) values('$aid', '$booking', '$d_id', '$p_id', $fees, '$paytype','$transaction',now(),'$username','$time');";
						
						
						if ($conn->query($sql5) === TRUE) 
						{
							$sql9="INSERT INTO payment( Payment_Date, Invoice_No, Payment_Type, Payment_Type_Id, Invoice_Amount, Discount, Net_Amount, Pay_Mode, Transaction_Id,Login_User_Id,Time)values(now(),'$inid','OPD' , '$aid', $fees, $discount, $amount,'$paytype','$transaction','$userid','$time');";
							$conn->query($sql9);
							$p="UPDATE opd_patient_booking SET Status='Appointed' WHERE Booking_Id='$booking';";
							$conn->query($p);
							?>
								<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
									<div class="modalcontent">
										<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
										<h3 style="color: #000; text-align: center;">Payment Successful</h3>
										<h6 style="color: #000; text-align: center; padding-bottom: 10px; color: #636262; font-size: 13px;"></h6>
										<div class="dropdown-divider" style="border-top: 0px solid #b3b3b3;"></div>
										<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
											
											<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button>
												
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
								  <h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error Occurred While Payment. Please try again.</h6>
								  <div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
								  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=add';">Close</button></div>
								   
								</div>
							</div>
							  <?php
						}
						
					}
					
				?>
				
		<div class="modal fade" id="exampleModal25" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body new-rgst">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3>New Registration</h3>
						<hr>
						<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
							<h4>Patient Info</h4>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>First Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control"  name="firstname" id="first"   readonly>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Last Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="lastname" id="last"  readonly>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Aadhar No. </label>
										<input type="text" class="form-control"  name="adhar" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Date of Birth</label>
										<input type="date" class="form-control"  name="dob" id="dob" onchange="GetDetail3(this.value);" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Age(in years)<span class="text-danger">*</span></label>
										<input type="number" class="form-control" name="age" id="age"  required/>
									</div>
								</div>
								<div class="col-md-4">
															<div class="form-group">
																<label>Blood Group</label>
																<select class="form-control" id="exampleSelectGender" name="blood">
																	<option>Select Blood Group</option>
																	<option>A+</option>
																	<option>A-</option>
																	<option>B+</option>
																	<option>B-</option>
																	<option>O+</option>
																	<option>O-</option>
																	<option>AB+</option>
																	<option>AB-</option>
																	
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Religion</label>
																<select class="form-control" id="exampleSelectGender" name="religion">
																	<option>Select Religion</option>
																	<option>Hinduism</option>
																	<option>Islam</option>
																	<option>Christianity</option>
																	<option>Sikhism</option>
																	<option>Buddhism</option>
																	<option>Judaism</option>
																	<option>Jainism</option>
																	<option>Other</option>
																	
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Occupation</label>
																<input type="text" class="form-control" name="occupation" id="occupation"  value=""/>
															</div>
														</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleSelectGender">Gender<span class="text-danger">*</span></label>
										<select class="form-control" id="gender" name="gender"required="">
											<option value="">Select Gender</option>
											<option>Male</option>
											<option>Female</option>
											<option>Other</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
															<div class="form-group">
																<label for="exampleSelectGender">Marital Status</label>
																<select class="form-control" id="exampleSelectGender" name="marital">
																	<option>Select Marital Status</option>
																	<option>Unmarried</option>
																	<option>Married</option>
																	<option>Widowed</option>
																	<option>Divorced</option>
																	<option>Separated</option>
																	
																	
																</select>
															</div>
														</div>
							</div>
							<h4>Patient Address</h4>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>House No./Street </label>
										<input type="text" class="form-control"  name="house">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Town/Village<span class="text-danger">*</span></label>
										<input type="text" class="form-control"  name="town" id="town" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Pin Code </label>
										<input type="number" class="form-control"  name="pincode" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleSelectGender">State</label>
										<?php
											$i=[];
											$adata=[];
											$sql="select State_Name from state_master;";
											$result=$conn->query($sql);
											while($row=$result->fetch_assoc())
											{
												array_push($i,$row["State_Name"]);
												$adata[$row["State_Name"]]=$row["State_Name"];
											}
										?>
										<select class="form-control" name="state" id="state" onchange="State(this.value);" >
											<option>State name</option>
											<?php
												foreach($i as $item)
												{
													echo "<option value='$item'>$item</option>";
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleSelectGender">City</label>
										<select class="form-control" id="city" name="city" onclick="City(this.value);"  >
											<option>Select City</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleSelectGender">District</label>
										<select class="form-control" id="district" name="district">
											<option>Select District</option>
											
										</select>
									</div>
								</div>
							</div>
							<h4>Patient Contact</h4>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Contact <span class="text-danger">*</span></label>
										<input type="text" class="form-control"  name="contact" id="cont"  readonly>
									</div>
								</div>
								<div class="col-md-4">
															<div class="form-group">
																<label>Whatsapp( <input type="checkbox" id="same" name="same" onchange="Contact()" /> <label for="same" class="mt-2"> Same as contact </label> ) </label>
																<input type="text" class="form-control"  name="whatsapp" onblur="validateWhatsapp(this);" id="whatsapp" >
															</div>
														</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Email </label>
										<input type="text" class="form-control"  name="email" id="email" onblur="validateEmail(this);"  >
									</div>
								</div> 
							</div>
							
							<h4>Guardian Info</h4>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" id="gname" name="gname" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Contact</label>
										<input type="number" class="form-control"  onblur="validateGPhone(this);" name="gcontact" id="gcontact" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleSelectGender">Relation</label>
										<select class="form-control" id="exampleSelectGender" name="grelation">
																	<option>Select Relation</option>
																	<option>Father</option>
																	  <option>Mother</option>
																	  <option>Father-In-Law</option>
																	  <option>Mother-In-Law</option>
																	  <option>Husband</option>
																	  <option>Wife</option>
																	  <option>Daughter</option>
																	  <option>Son</option>
																	  <option>Uncle</option>
																	  <option>Aunt</option>
																	  <option>Neice</option>
																	  <option>Nephew</option>
																	  <option>Grandfather</option>
																	  <option>Grandmother</option>
																	  <option>Granddaughter</option>
																	  <option>Grandson</option>
																	  <option>Brother</option>
																	  <option>Sister</option>
																	  <option>Other</option>
																</select>
									</div>
								</div>
							</div>
							
							<button type="submit" id="submit" class="btn btn-primary mr-2" name="add" onclick="register()">Register</button>
							<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php';">Close</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
<script>
	function validateEmail(emailField)
	{
		//alert(emailField);
		 
		if( emailField.value.length != 0)
		{ 	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			
			if (reg.test(emailField.value) == false) 
			{
				alert('Invalid Email Address');
				document.getElementById("email").value = "";
				 //return true;
			}
		}
		
		//return true;
	}
</script>
<script>

	
function validateGPhone(num)
{
	if( num.value.length != 0)
		{
  var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
		  if (reg.test(inputtxt.value) == false) 
			{
				alert('Invalid Guardian Contact');
				document.getElementById("gcontact").value = "";
				//return true;
			}
		}
}
	
</script>
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
	function validateWhatsapp(inputtxt)
	{
		if( inputtxt.value.length != 0)
		{
		var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
		  if (reg.test(inputtxt.value) == false) 
			{
				alert('Invalid Whatsapp Contact');
				document.getElementById("whatsapp").value = "";
			}
		}
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
					document.getElementById("firstname").value = str2;
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
					const str2 = arr.join(" ");
					//alert(str2);
					document.getElementById("lastname").value = str2;
				 }
				
				</script>		
				<script>
				 function convert(str)
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
					document.getElementById("gname").value = str2;
				 }
				
				</script>		
		<?php
	function register()
	{
		if (isset($_POST['add'])) 
		{
			include 'connection.php';
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$_SESSION['Rname']=$firstname." ".$lastname;
			
			$adhaar=$_POST['adhar'];
			if (empty($adhaar)) 
			{
			  $adhaar=NULL;
			}
			
			$dob=$_POST['dob'];
			if (empty($dob)) 
			{
			  $dob=NULL;
			}
			
			$age=$_POST['age'];
			
			$gender=$_POST['gender'];
			
			$marital=$_POST['marital'];
			if (empty($marital)) 
			{
			  $marital=NULL;
			}
			
			$house=$_POST['house'];
			if (empty($house)) 
			{
			  $house=NULL;
			}
			
			$town=$_POST['town'];
			if (empty($town)) 
			{
			  $town=NULL;
			}
			
			$city=$_POST['city'];
			if (empty($city)) 
			{
			  $city=NULL;
			}
			
			$district=$_POST['district'];
			if (empty($district)) 
			{
			  $district=NULL;
			}
			
			$state=$_POST['state'];
			if (empty($state)) 
			{
			  $state=NULL;
			}
			
			$pincode=$_POST['pincode'];
			if (empty($pincode)) 
			{
			  $pincode=NULL;
			}
			
			$mobile=$_POST['contact'];
			$_SESSION['Rcontact']=$mobile;
			$phone=$_POST['whatsapp'];
			if (empty($whatsapp)) 
			{
			  $whatsapp=NULL;
			}
			
			$email=$_POST['email'];
			if (empty($email)) 
			{
			  $email=NULL;
			}
			
			$gname=$_POST['gname'];
			if (empty($gname)) 
			{
			  $gname=NULL;
			}
			
			$gcontact=$_POST['gcontact'];
			if (empty($gcontact))
			{
			  $gcontact=NULL;
			}
			
			$grelation=$_POST['grelation'];
			if (empty($grelation)) 
			{
			  $grelation=NULL;
			}
			
			
			
			$blood=$_POST['blood'];
			$occupation=$_POST['occupation'];
			$religion=$_POST['religion'];
			$sql2="SELECT * FROM `patient_master` order by cast(SUBSTRING(`Patient_Id`, 5,length(`Patient_Id`)-4) as UNSIGNED) DESC LIMIT 1";
			$result2 = $conn->query($sql2);
			$i=0;
			while($row=$result2->fetch_assoc())
			{
				$d_id = $row["Patient_Id"];
				$l=strlen($d_id);
				$st=substr($d_id, 0,4);
				$d=substr($d_id, 4,$l);
				$d=$d+1;
				$id=$st.$d;
				$i++;
			}
			if($i==0)
			{
				$id='EMD-1';
			}
			$_SESSION['Rregn']=$id;
			$sql="INSERT INTO patient_master(Patient_Id, Adhaar, First_Name, Last_Name, Gender, Date_Of_Birth,Age, Marital_Status, House_Street, Town_Village, State, City, Pincode, District, Mobile, Whatsapp, Email, Guardian_Name, Guardian_Contact, Guardian_Relation,Registration_Date,Blood,Religion,Occupation) values('$id', '$adhaar', '$firstname', '$lastname', '$gender', '$dob','$age','$marital', '$house','$town','$state','$city','$pincode', '$district', $mobile, '$phone','$email','$gname','$gcontact','$grelation',now(),'$blood','$religion','$occupation');";
			
			
			if ($conn->query($sql) === TRUE) 
			{
				?>
					<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
						<div class="modalcontent">
							<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
							<h3 style="color: #000; text-align: center;">Successful!</h3>
							<h6 style="color: #000; text-align: center; padding-bottom: 10px; color: #636262; font-size: 13px;">Patient Registered Successfully.<br> Registration Id: <?php echo $id;?></h6>
							<div class="dropdown-divider" style="border-top: 0px solid #b3b3b3;"></div>
							<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
								<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=edit';">Close</button>
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
					  <h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error Occurred While Registration. Please try again.</h6>
					  <div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
					  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_appointment.php?flag=edit';">Close</button></div>
					 </div>
				  </div>
				  <?php
			}
			
		}
	}
	register();
?>
	
				
				
				<script>
					function GetDetail3(str) 
					{ 
						
						if (str.length == 0) 
						{ 
							
							document.getElementById("age").value = "";
							return; 
						} 
						else 
						{ 
							var today = new Date();
							var birthDate = new Date(str);
							var age = today.getFullYear() - birthDate.getFullYear();
							var m = today.getMonth() - birthDate.getMonth();
							if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
							{
								age--;
							}
							document.getElementById("age").value = age;
						} 
					} 

				</script>
				
				
				<script>
	  function Contact() 
	  {
		  //alert('hhh');
		if (document.getElementById("same").checked) 
		{
		  document.getElementById("whatsapp").value = document.getElementById("cont").value;
		  
		} 
		else 
		{
			 document.getElementById("whatsapp").value = "";
		}
	  }
</script>
				<script>
					function State(str) 
					{ 
						if (str.length == 0) 
						{ 
							document.getElementById("city").value = "";
							return; 
						} 
						else 
						{ 
							var xmlhttp = new XMLHttpRequest(); 
							xmlhttp.onreadystatechange = function () { 
							   
								if (this.readyState == 4 &&  this.status == 200) 
								{ 
									var myObj = JSON.parse(this.responseText); 
									document.getElementById("city").innerHTML=null;
									var str="";
									str = myObj[0];
									var elmts="";
									elmts = str.split(' ');
									
									var select = document.getElementById("city");
									
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
							xmlhttp.open("GET", "extract_details_from_statename.php?c_state=" + str, true); 
							// Sends the request to the server 
							xmlhttp.send(); 
						} 
					} 

				</script>
				<script>
					function City(str) 
					{ 
						
						//alert(str);
						if (str.length == 0) 
						{ 
							
							document.getElementById("district").value = ""; 
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
									 document.getElementById("district").innerHTML=null;
									 var str="";
									 str = myObj[0];
									 //alert("hello");
									 var elmts="";
									 elmts = str.split(',');
									 
									 var select = document.getElementById("district");
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
							xmlhttp.open("GET", "extract_district_from_city.php?city=" + str, true); 
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
			
			<?php } else {
		header("Location: index.php");
} ?>	
			