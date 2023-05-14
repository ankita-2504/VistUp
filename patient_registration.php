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
								
									<div class="card records-card mt-2">
										<div class="card-body">
										
											<div class="row">
						
												<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
													<p style="margin-bottom: 0.1px;color:blue;line-height:19px;">Patient Information  </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>First Name <span class="text-danger">*</span></label>
																<input type="text" class="form-control"  name="firstname" id="firstname" onkeyup="convert2(this.value);"   required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Last Name <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="lastname" id="lastname" onkeyup="convert3(this.value);"  required>
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
													<p style="margin-bottom: 0.1px;color:blue;line-height:19px;">Patient Address  </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>House No./Street </label>
																<input type="text" class="form-control" id="house" onkeyup="convertcch(this.value);" name="house">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Town/Village<span class="text-danger">*</span></label>
																<input type="text" class="form-control" id="town" onkeyup="convertcct(this.value);" name="town" required>
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
																	$sql="select state_name from state_master ORDER BY state_name;";
																	$result=$conn->query($sql);
																	while($row=$result->fetch_assoc())
																	{
																		array_push($i,$row["state_name"]);
																		$adata[$row["state_name"]]=$row["state_name"];
																	}
																?>
																<select class="form-control" name="state" id="state" onchange="State(this.value);" >
																	<option>Select State</option>
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
													<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Patient Contact </b> </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Contact <span class="text-danger">*</span></label>
																<input type="number" class="form-control"  name="contact" id="contact" onblur="validatePhone(this);" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Whatsapp( <input type="checkbox" id="same" name="same" onchange="Contact()" /> <label for="same" class="mt-2"> Same as contact </label> ) </label>
																<input type="number" class="form-control"  name="whatsapp" onblur="validateWhatsapp(this);" id="whatsapp" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Email </label>
																<input type="text" class="form-control"  name="email" id="email" onblur="validateEmail(this);"  >
															</div>
														</div> 
													</div>
													
													<p style="margin-bottom: 0.1px;color:blue;line-height:19px;">Guardian Information  </p>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Name</label>
																<input type="text" class="form-control" id="gname" onkeyup="convert(this.value);" name="gname" >
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
													
													<button type="submit" id="submit" class="btn btn-primary mr-2" name="add2" onclick="register2()">Register</button>
													<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'dashboard.php';">Cancel</button>
												</form>
											</div>
										</div>
									</div>
								
							</div>
							<?php include "footer.php"; ?>
						</div>
					</div>
				</div>
				
		<?php
	function register2()
	{
		if (isset($_POST['add2'])) 
		{
			include 'connection.php';
			$first=$_POST['firstname'];
											$firstname=rtrim($first," ");
											$last=$_POST['lastname'];
											$lastname=rtrim($last," ");
			
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
			$sql2="SELECT * FROM `patient_master` order by cast(SUBSTRING(`Patient_Id`, 5,length(`Patient_Id`)-4) as UNSIGNED) DESC LIMIT 1";
			$result2 = $conn->query($sql2);
			$i=0;
			while($row=$result2->fetch_assoc())
			{
				$d_id = $row["Patient_Id"];
				$l = strlen($d_id);
				$st = substr($d_id, 0,4);
				$d = substr($d_id, 4,$l);
				$d = $d+1;
				$id = $st.$d;
				$i++;
			}
			if($i==0)
			{
				$id='EMD-1';
			}
			
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
								<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'patient_registration.php';">Close</button>
								
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
					  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'patient_registration.php';">Close</button></div>
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
	  function check_gender() 
	  {
		var opt=document.getElementById("gender").value;
		if (opt == 'Select Gender') 
		{
		  
		  alert('Enter Gender Of Patient');
		} 
		
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
			