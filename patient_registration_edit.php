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
                		padding-top: 72px;
                		padding-bottom: 72px ;
                		background:#fff;
                		}
                	} 
                </style>
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
									<h3 class="page-title"> New Registration </h3>
									
								</div>
									<?php
									
										$ipid=$_GET['id'];
												//echo $ipid;
												$record= "SELECT * FROM patient_master WHERE Patient_Id='$ipid';";
												$r=$conn->query($record);
												
												if($r->num_rows==1)
												{
													$n = mysqli_fetch_array($r);
													
													
													$adhaar=$n['Adhaar'];
													$firstname=$n['First_Name'];
													$lastname=$n['Last_Name'];
													$gender=$n['Gender'];
													$dob=$n['Date_Of_Birth'];
													
													$age=$n['Age'];
													
													
													
													$marital=$n['Marital_Status'];
													
													
													$house=$n['House_Street'];
													
													$town=$n['Town_Village'];
													$state=$n['State'];
													$city=$n['City'];
													
													$pincode=$n['Pincode'];
													
													$district=$n['District'];
													
													
													
													
													
													$mobile=$n['Mobile'];
													
													$phone=$n['Whatsapp'];
													
													$email=$n['Email'];
													
													$gname=$n['Guardian_Name'];
													
													$gcontact=$n['Guardian_Contact'];
													
													$grelation=$n['Guardian_Relation'];
													
													$blood=$n['Blood'];
													$religion=$n['Religion'];
													$occupation=$n['Occupation'];
													
													
												}
									
									?>
									<div class="card records-card mt-2">
										<div class="card-body">
										
											<div class="row">
						
												<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
													<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient Info  </b> </p>
													<br>
													<input type="hidden" class="form-control" value="<?php echo $ipid;?>" name="pid" >
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>First Name <span class="text-danger">*</span></label>
																<input type="text" class="form-control"  name="firstname" value="<?php echo $firstname;?>" id="firstname" onkeyup="convert2(this.value);"  required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Last Name <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname;?>" onkeyup="convert3(this.value);"   required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Aadhar No. </label>
																<input type="text" class="form-control" value="<?php echo $adhaar;?>" name="adhar" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Date of Birth</label>
																<input type="date" class="form-control"  name="dob" id="dob" value="<?php echo $dob;?>" onchange="GetDetail3(this.value);" />
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Age<span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="age" id="age" value="<?php echo $age;?>" required/>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Blood Group</label>
																<select class="form-control" id="blood" name="blood">
																	<option>Select Blood Group</option>
																	<option value="A+"<?php if($blood == "A+") echo 'selected="selected"';?>>A+</option>
																	<option value="A-"<?php if($blood == "A-") echo 'selected="selected"';?>>A-</option>
																	<option value="B+"<?php if($blood == "B+") echo 'selected="selected"';?>>B+</option>
																	<option value="B-"<?php if($blood == "B-") echo 'selected="selected"';?>>B-</option>
																	<option value="O+"<?php if($blood == "O+") echo 'selected="selected"';?>>O+</option>
																	<option value="O-"<?php if($blood == "O-") echo 'selected="selected"';?>>O-</option>
																	<option value="AB+"<?php if($blood == "AB+") echo 'selected="selected"';?>>AB+</option>
																	<option value="AB-"<?php if($blood == "AB-") echo 'selected="selected"';?>>AB-</option>
																	
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Religion</label>
																<select class="form-control" id="religion" name="religion">
																<option>Select Religion</option>
																	<option value='Hinduism'<?php if($religion == "Hinduism") echo 'selected="selected"';?> >Hinduism</option>
																	<option value='Islam'<?php if($religion == "Islam") echo 'selected="selected"';?>>Islam</option>
																	<option value='Christianity'<?php if($religion == "Christianity") echo 'selected="selected"';?>>Christianity</option>
																	<option value='Sikhism'<?php if($religion == "Sikhism") echo 'selected="selected"';?>>Sikhism</option>
																	<option value='Buddhism'<?php if($religion == "Budhdhism") echo 'selected="selected"';?>>Buddhism</option>
																	<option value='Judaism'<?php if($religion == "Judaism") echo 'selected="selected"';?>>Judaism</option>
																	<option value='Jainism'<?php if($religion == "Jainism") echo 'selected="selected"';?>>Jainism</option>
																	<option value='Other'<?php if($religion == "Other") echo 'selected="selected"';?>>Other</option>
																	</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Occupation</label>
																<input type="text" class="form-control" name="occupation" id="occupation"  value="<?php echo $occupation;?>"/>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="exampleSelectGender">Gender<span class="text-danger">*</span></label>
																<select class="form-control" id="exampleSelectGender" name="gender"required>
																	<option  <?php if($gender == "Male") echo 'selected="selected"';?> >Male</option>
														<option <?php if($gender == "Female") echo 'selected="selected"';?> >Female</option>
														<option <?php if($gender == "Other") echo 'selected="selected"';?> >Other</option>
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="exampleSelectGender">Marital Status</label>
																<select class="form-control" id="exampleSelectGender" name="marital">
																	<option>Select Marital Status</option>
																	<option  <?php if($marital == "Unmarried") echo 'selected="selected"';?> >Unmarried</option>
																	<option <?php if($marital == "Married") echo 'selected="selected"';?> >Married</option>
																	<option <?php if($marital == "Widowed") echo 'selected="selected"';?>>Widowed</option>
																	<option<?php if($marital == "Divorced") echo 'selected="selected"';?>>Divorced</option>
																	<option<?php if($marital == "Separated") echo 'selected="selected"';?>>Separated</option>
																</select>
															</div>
														</div>
													</div>
													<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient Address  </b> </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>House No./Street </label>
																<input type="text" class="form-control" onkeyup="convertcch(this.value);" value="<?php echo $house;?>" name="house">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Town/Village<span class="text-danger">*</span></label>
																<input type="text" class="form-control" onkeyup="convertcct(this.value);" value="<?php echo $town;?>" name="town" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Pin Code </label>
																<input type="text" class="form-control" value="<?php echo $pincode;?>" name="pincode" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="exampleSelectGender">State</label>
																<?php
																	$i=[];
																	$adata=[];
																	$sql2="select State_Id from state_master WHERE State_Name='$state';";
																	$result2=$conn->query($sql2);
																	while($row=$result2->fetch_assoc())
																	{
																		$state_id=$row['State_Id'];
																	}
																	$sql="select State_Name from state_master;";
																	$result=$conn->query($sql);
																	while($row=$result->fetch_assoc())
																	{
																		array_push($i,$row["State_Name"]);
																		$adata[$row["State_Name"]]=$row["State_Name"];
																	}
																?>
																<select class="form-control" name="state" id="state" onchange="State(this.value);" >
																	<option>Select State</option>
																	<?php
																		foreach($i as $item)
																		{
																			if($item == $state)
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
																<label for="exampleSelectGender">City</label>
																<?php
																	$i=[];
																	$adata=[];
																	$sql2="select City_Id from city_master WHERE City_Name='$city';";
																	$result2=$conn->query($sql2);
																	while($row=$result2->fetch_assoc())
																	{
																		$city_id=$row['City_Id'];
																	}
																	$sql="select City_Name from city_master WHERE State_Id='$state_id';";
																	$result=$conn->query($sql);
																	while($row=$result->fetch_assoc())
																	{
																		array_push($i,$row["City_Name"]);
																		$adata[$row["City_Name"]]=$row["City_Name"];
																	}
																?>
																<select class="form-control" id="city" name="city" onclick="City(this.value);"  >
																	<option>Select City</option>
																	<?php
																		foreach($i as $item)
																		{
																			if($item == $city)
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
																<label for="exampleSelectGender">District</label>
																
																<?php
																	$i=[];
																	$adata=[];
																	$sql="select District_Name from district_master WHERE City_Id='$city_id';";
																	$result=$conn->query($sql);
																	while($row=$result->fetch_assoc())
																	{
																		array_push($i,$row["District_Name"]);
																		$adata[$row["District_Name"]]=$row["District_Name"];
																	}
																?>
																<select class="form-control" id="district" name="district">
																	<option>Select District</option>
																	<?php
																		foreach($i as $item)
																		{
																			if($item == $district)
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
													<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient Contact </b> </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Contact <span class="text-danger">*</span></label>
																<input type="text" class="form-control"  name="contact" id="contact" value="<?php echo $mobile;?>" onblur="validatePhone(this);" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Whatsapp( <input type="checkbox" id="same" name="same" onchange="Contact()" /> <label for="same" class="mt-2"> Same as contact </label> ) </label>
																<input type="text" class="form-control" value="<?php echo $phone;?>"  name="whatsapp" onblur="validateWhatsapp(this);" id="whatsapp" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Email </label>
																<input type="text" class="form-control" value="<?php echo $email;?>" name="email" id="email" onblur="validateEmail(this);"  >
															</div>
														</div> 
													</div>
													
													<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Guardian Info  </b> </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Name</label>
																<input type="text" class="form-control" value="<?php echo $gname;?>" name="gname" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Contact</label>
																<input type="text" class="form-control" value="<?php echo $gcontact;?>" onblur="validateGPhone(this);" name="gcontact" id="gcontact" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="exampleSelectGender">Relation</label>
																<select class="form-control" id="exampleSelectGender" name="grelation">
																	<option>Select Relation</option>
																	<option  <?php if($grelation == "Father") echo 'selected="selected"';?> >Father</option>
																	<option <?php if($grelation == "Mother") echo 'selected="selected"';?> >Mother</option>
																	<option <?php if($grelation == "Father-In-Law") echo 'selected="selected"';?> >Father-In-Law</option>
																	<option  <?php if($grelation == "Mother-In-Law") echo 'selected="selected"';?> >Mother-In-Law</option>
																	<option <?php if($grelation == "Husband") echo 'selected="selected"';?> >Husband</option>
																	<option <?php if($grelation == "Wife") echo 'selected="selected"';?> >Wife</option>
																	<option  <?php if($grelation == "Daughter") echo 'selected="selected"';?> >Daughter</option>
																	<option <?php if($grelation == "Son") echo 'selected="selected"';?> >Son</option>
																	<option <?php if($grelation == "Uncle") echo 'selected="selected"';?> >Uncle</option>
																	<option  <?php if($grelation == "Aunt") echo 'selected="selected"';?> >Aunt</option>
																	<option <?php if($grelation == "Neice") echo 'selected="selected"';?> >Neice</option>
																	<option <?php if($grelation == "Nephew") echo 'selected="selected"';?> >Nephew</option>
																	<option  <?php if($grelation == "Grandfather") echo 'selected="selected"';?> >Grandfather</option>
																	<option <?php if($grelation == "Grandmother") echo 'selected="selected"';?> >Grandmother</option>
																	<option <?php if($grelation == "Sister") echo 'selected="selected"';?> >Sister</option>
																	<option  <?php if($grelation == "Brother") echo 'selected="selected"';?> >Brother</option>
																	<option <?php if($grelation == "Grandson") echo 'selected="selected"';?> >Grandson</option>
																	<option <?php if($grelation == "Granddaughter") echo 'selected="selected"';?> >Granddaughter</option>
																	<option <?php if($grelation == "Other") echo 'selected="selected"';?> >Other</option>
																	
																</select>
															</div>
														</div>
													</div>
													
													<button type="submit" class="btn btn-primary mr-2" name="add2" onclick="register2()">Update</button>
													<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'ipd_admission_display.php';">Cancel</button>
												</form>
											</div>
										</div>
									</div>
								
							</div>
							<?php include "footer.php"; ?>
						</div>
					</div>
				</div>
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
					const str2 = arr.join("");
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
						
		<?php
	function register2()
	{
		if (isset($_POST['add2'])) 
		{
			include 'connection.php';
			$pid=$_POST['pid'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
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
			
			
			$sql="UPDATE `patient_master` SET `Adhaar`='$adhaar',`First_Name`='$firstname',`Last_Name`='$lastname',`Gender`='$gender',`Date_Of_Birth`='$dob',`Age`='$age',`Marital_Status`='$marital',`House_Street`='$house',`Town_Village`='$town',`State`='$state',`City`='$city',`Pincode`='$pincode',`District`='$district',`Mobile`='$mobile',`Whatsapp`='$phone',`Email`='$email',`Guardian_Name`='$gname',`Guardian_Contact`='$gcontact',`Guardian_Relation`='$grelation', `Blood`='$blood',`Religion`='$religion',`Occupation`='$occupation' WHERE Patient_Id='$pid';";
			
			if ($conn->query($sql) === TRUE) 
			{
				?>
					<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
						<div class="modalcontent">
							<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
							<h3 style="color: #000; text-align: center;">Successful!</h3>
							<h6 style="color: #000; text-align: center; padding-bottom: 10px; color: #636262; font-size: 13px;">Patient Data Updated Successfully.</h6>
							<div class="dropdown-divider" style="border-top: 0px solid #b3b3b3;"></div>
							<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
								<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'ipd_admission_display.php';">Close</button>
								
							</div>
							<a href="patient_registration.php" class="modalclose" style="text-decoration: none; color: black; top: 5px;">&times;</a>  
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
					  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'ipd_admission_display.php';">Close</button></div>
					  <a href="patient_registration.php" class="modalclose" style="text-decoration: none; color: black; top: 5px;">&times;</a>    
					</div>
				  </div>
				  <?php
			}
			
		}
	}
	register2();
?>
	
				
				<script>
					function fcapital(str)
					{
					
					// converting first letter to uppercase
					var capitalized = str.charAt(0).toUpperCase() + str.slice(1);
					document.getElementById("firstname").value = capitalized;
					
					}
				</script>
				<script>
					function lcapital(str) 
					{
					
					// converting first letter to uppercase
					var capitalized = str.charAt(0).toUpperCase() + str.slice(1);
					document.getElementById("lastname").value = capitalized;
					
					}
				</script>
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
				 function convertcct(str)
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
					document.getElementById("town").value = str2;
				 }
				
				</script>
				<script>
				 function convertcch(str)
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
					document.getElementById("house").value = str2;
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
<?php } else {
		header("Location: index.php");
} ?>