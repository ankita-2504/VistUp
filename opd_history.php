<?php
	include 'connection.php';
	session_start();
	/*if($_SESSION['is_login'])
	{
		//keep user on page*/
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
			</head>
			<body>
				<div class="container-scroller">
				  <!-- partial:partials/_sidebar.html -->
					<nav class="sidebar sidebar-offcanvas" id="sidebar">
						<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
						  <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
						  <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/small-logo.png" alt="logo" /></a>
						</div>
						<ul class="nav">
							<li class="nav-item nav-category">
							</li>
							<li class="nav-item menu-items active">
								<a class="nav-link" href="opd_doc_landing.php">
								  <span class="menu-icon">
									<i class="mdi mdi-speedometer"></i>
								  </span>
								  <span class="menu-title">Out Patient Department
								  </span>
								</a>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
								  <span class="menu-icon">
									<i class="mdi mdi-laptop"></i>
								  </span>
								  <span class="menu-title">In Patient Department</span>
								</a>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" href="#">
								  <span class="menu-icon">
									<i class="mdi mdi-playlist-play"></i>
								  </span>
								  <span class="menu-title">Diagnostics</span>
								</a>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" href="#">
								  <span class="menu-icon">
									<i class="mdi mdi-table-large"></i>
								  </span>
								  <span class="menu-title">Pharmacy</span>
								</a>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" href="#">
								  <span class="menu-icon">
									<i class="mdi mdi-chart-bar"></i>
								  </span>
								  <span class="menu-title">Accounts</span>
								</a>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" href="settings_landing.php">
								  <span class="menu-icon">
									<i class="mdi mdi-contacts"></i>
								  </span>
								  <span class="menu-title">Settings</span>
								</a>
							</li>
						</ul>
					</nav>
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<nav class="navbar p-0 fixed-top d-flex flex-row">
							<div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
								<a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
							</div>
							<div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
								<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
									<span class="mdi mdi-menu"></span>
								</button>
								<h3 class="logo-text"><a href="#">Eastmed Hospital & Diagnostics Pvt Ltd</a></h3>
								<ul class="navbar-nav navbar-nav-right">
									<li class="nav-item dropdown d-none d-lg-block">
										 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+New Registration</button>
									</li>
									<li class="nav-item nav-settings d-none d-lg-block">
										<a class="nav-link" href="index.php">
										  <i class="mdi mdi-home"></i>
										</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
										  <div class="navbar-profile">
											<img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
											<p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
											<i class="mdi mdi-menu-down d-none d-sm-block"></i>
										  </div>
										</a>
										<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
										 
											<a class="dropdown-item preview-item">
												<div class="preview-thumbnail">
												  <div class="preview-icon bg-dark rounded-circle">
													<i class="mdi mdi-settings text-success"></i>
												  </div>
												</div>
												<div class="preview-item-content">
												  <p class="preview-subject mb-1">Change Password</p>
												</div>
											</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item preview-item" href="logout.php">
												<div class="preview-thumbnail">
												  <div class="preview-icon bg-dark rounded-circle">
													<i class="mdi mdi-logout text-danger"></i>
												  </div>
												</div>
												<div class="preview-item-content">
												  <p class="preview-subject mb-1">Log Out</p>
												</div>
											</a>
										</div>
									</li>
								</ul>
								<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
								  <span class="mdi mdi-format-line-spacing"></span>
								</button>
							</div>
						</nav>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> OPD History </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								
									
								
								<div class="card records-card mt-2">
									<div class="card records-card mt-2">
										<div class="card-body">
											<h4> OPD History<hr> </h4>
											<div class="row">
												<div class="col-md-12">
													<div class="table-responsive table-sec mb-4 ">
														<table class="table table-striped">
															<thead>
																<tr>
																	
																	<th style="text-align: center;">Patient Id</th>
																	<th style="text-align: center;">Patient Name</th>
																	<th style="text-align: center;">Contact</th>
																	<th style="text-align: center;">Doctor</th>
																	
																	<th style="text-align: center;">Last Visit</th> 
																	<th style="text-align: center;">View</th> 
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="SELECT * FROM opd_patient_booking WHERE Status='Visited' ORDER BY sl_no DESC LIMIT 1;";
																	$result=$conn->query($sql);
																	if($result->num_rows>0)
																	{
																		while($row=$result->fetch_assoc())
																		{
																			$firstname=$row['First_Name'];
																			$lastname=$row['Last_Name'];
																			
																			$mobile=$row['Mobile'];
																			$d_id=$row['Doctor_Id'];
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
																			$sq="SELECT Patient_Id FROM patient_master WHERE First_Name='$firstname' AND Last_Name='$lastname' AND(Mobile='$mobile' OR Whatsapp='$mobile' OR Guardian_Contact='$mobile');";
																			$r1=$conn->query($sq);		
																			
																			if($r1->num_rows>0)
																			{
																				while($row=$r1->fetch_assoc())
																				{
																					$p_id=$row['Patient_Id'];
																				}
																			}
																			?>
											
																			<tr>
																				
																				<td style="text-align: center;"><?php echo $p_id;?></td>
																				<td style="text-align: center;"><?php echo $firstname." ".$lastname;?></td>
																				<td style="text-align: center;"><?php echo $mobile;?></td>
																				<td style="text-align: center;"><?php echo $doctor;?></td>
																				<td style="text-align: center;"><?php echo $appoint_date;?></td>
																				<td style="text-align: center;"><button onClick="GFG_click(this.id)"  id="<?php echo $p_id;?>"  class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"><i class="mdi mdi-magnify"></i></button></td>
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
							</div>
							<footer class="footer">
											<div class="justify-content-center justify-content-sm-between">
												<!-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Abhigan technology 2020</span> -->
												<span class="d-block mt-1 mt-sm-0 text-center"> Copyright © <a href="#" target="_blank">Abhigan technology</a> 2022</span>
											</div>
										</footer>
						</div>
							
						</div>
						<!-- main-panel ends -->
					</div>
					<!-- page-body-wrapper ends -->
				</div>
				<!-- container-scroller -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
												<input type="text" class="form-control"  name="firstname" id="firstname" onblur="validateFName(this);" placeholder="eg: John" onblur="validateName(this);" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Last Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="lastname" id="lastname" onblur="validateLName(this);" placeholder="eg: Smith" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Aadhar No. <span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" name="adhar" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Date of Birth<span class="text-danger">*</span></label>
												<input type="date" class="form-control" placeholder="Name" name="dob"required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleSelectGender">Gender<span class="text-danger">*</span></label>
												<select class="form-control" id="exampleSelectGender" name="gender"required>
													<option>Male</option>
													<option>Female</option>
													<option>Other</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleSelectGender">Marital Status<span class="text-danger">*</span></label>
												<select class="form-control" id="exampleSelectGender" name="marital"required>
													<option>Unmarried</option>
													<option>Married</option>
													
												</select>
											</div>
										</div>
									</div>
									<h4>Patient Address</h4>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>House No./Street <span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: 331" name="house"required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Town/Village<span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: Barrackpore" name="town" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Pin Code <span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: 700120" name="pincode" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleSelectGender">State<span class="text-danger">*</span></label>
												<?php
													$i=[];
													$adata=[];
													$sql="select state_name from state_master;";
													$result=$conn->query($sql);
													while($row=$result->fetch_assoc())
													{
														array_push($i,$row["state_name"]);
														$adata[$row["state_name"]]=$row["state_name"];
													}
												?>
												<select class="form-control" name="state" id="state" onchange="State(this.value);" required>
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
												<label for="exampleSelectGender">City<span class="text-danger">*</span></label>
												<select class="form-control" id="city" name="city" onclick="City(this.value);"  required>
													<option>Select City</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleSelectGender">District<span class="text-danger">*</span></label>
												<select class="form-control" id="district" name="district"required>
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
												<input type="text" class="form-control" placeholder="eg: 10 digit no." name="contact" id="contact" onblur="validatePhone(this);" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Whatsapp( <input type="checkbox" id="same" name="same" onchange="Contact()" /> <label for="same"> Same as contact </label> ) <span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: 10 digit no." name="whatsapp" onblur="validateWhatsapp(this);" id="whatsapp" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: abc@gmail.com" name="email" id="email" onblur="validateEmail(this);"  required>
											</div>
										</div> 
									</div>
									
									<h4>Guardian Info</h4>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Name<span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: John Smith" name="gname" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Contact<span class="text-danger">*</span></label>
												<input type="text" class="form-control" placeholder="eg: 10 digit no." onblur="validateGPhone(this);" name="gcontact" id="gcontact" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleSelectGender">Relation<span class="text-danger">*</span></label>
												<select class="form-control" id="exampleSelectGender" name="grelation"required>
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
													  <option>Other</option>
												</select>
											</div>
										</div>
									</div>
									
									<button type="submit" class="btn btn-primary mr-2" name="add" onclick="reg()">Register</button>
									<button class="btn btn-dark">Cancel</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php
					function reg()
					{
						if (isset($_POST['add'])) 
						{
							$conn = new mysqli('localhost', 'Ankita', '1234', 'eastmed');
							if ($conn->connect_error)
							{
								die("Connection failed: " . $conn->connect_error);
							}
							$firstname=$_POST['firstname'];
							$lastname=$_POST['lastname'];
							$adhaar=$_POST['adhar'];
							$dob=$_POST['dob'];
							$gender=$_POST['gender'];
							$marital=$_POST['marital'];
							
							$house=$_POST['house'];
							$town=$_POST['town'];
							$city=$_POST['city'];
							$district=$_POST['district'];
							$state=$_POST['state'];
							$pincode=$_POST['pincode'];
							
							$mobile=$_POST['contact'];
							$phone=$_POST['whatsapp'];
							$email=$_POST['email'];	
							$gname=$_POST['gname'];
							$gcontact=$_POST['gcontact'];
							$grelation=$_POST['grelation'];
							
							$sql2="SELECT patient_id FROM patient_master ORDER BY sl_no DESC LIMIT 1;";
							$result2=$conn->query($sql2);
							$i=0;
							while($row=$result2->fetch_assoc())
							{
								$d_id = $row["patient_id"];
								$l=strlen($d_id);
								$st=substr($d_id, 0,3);
								$d=substr($d_id, 3,$l);
								$d=$d+1;
								$id=$st.$d;
								$i++;
							}
							if($i==0)
							{
								$id='EM-1';
							}
							
							$sql="INSERT into patient_master (patient_id, adhaar, firstname, lastname, gender, dob, marital_status, house_street, town_village, state, city, pincode, district, mobile, whatsapp, email, guardian_name, guardian_contact, guardian_relation) values('$id', '$adhaar', '$firstname', '$lastname', '$gender', '$dob','$marital', '$house','$town','$state','$city',$pincode, '$district', $mobile, $phone, '$email','$gname',$gcontact,'$grelation');";
							
							
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
												<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'index.php';">Close</button>
												
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
									  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'index.php';">Close</button></div>
									  <a href="index.php" class="modalclose" style="text-decoration: none; color: black; top: 5px;">&times;</a>    
									</div>
								  </div>
								  <?php
							}
							
						}
					}
					reg();
				?>
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
				<script>
					function validateEmail(emailField)
					{
						var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
						
						if (reg.test(emailField.value) == false) 
						{
							alert('Invalid Email Address');
							 document.getElementById("email").value = "";
						}
						return true;
					}
				</script>
				<script>
				
					function validateGPhone(inputtxt)
					{
						var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
						  if (reg.test(inputtxt.value) == false) 
							{
								alert('Invalid Guardian Contact');
								document.getElementById("gcontact").value = "";
							}
						return true;
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
					function validateWhatsapp(inputtxt)
					{
						var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
						  if (reg.test(inputtxt.value) == false) 
							{
								alert('Invalid Whatsapp Contact');
								document.getElementById("whatsapp").value = "";
							}
						return true;
					}
					
				</script>
				<script>
					  function Contact() 
					  {
						if (document.getElementById("same").checked) 
						{
						  document.getElementById("whatsapp").value = document.getElementById("contact").value;
						  
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
				 

				<script>							
					function GFG_click(clicked) 
					{
						var id = clicked;
						//alert('ID '+id+ '!');
						$.ajax
						({
							type: "POST",
							url: "opd_patient_visitings.php",
							data: {id:id},
							dataType: "html",                  
							success: function(data){                    
							$("#confirm").html(data); 
							}
						});
					}					
					
				</script>
				
				<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div  id="confirm">
									<h3>All Visitings</h3>
									<hr>
								
											
								</div>
								
									
							</div>
								
						</div>
					</div>
				</div>
			
		  
		  
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