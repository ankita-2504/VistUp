<?php include 'connection.php';

	session_start(); 
	if ($_SESSION['cus']['login'] == "true") {  ?>
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
					<div class="container-fluid page-body-wrapper">
					 <?php include "header.php"; ?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> Booking </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
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
																$sql="SELECT Doctor_Name FROM doctor_master WHERE Is_Opd ='1' ORDER BY Doctor_Name;";
																$result=$conn->query($sql);
																while($row=$result->fetch_assoc())
																{
																	array_push($i,$row["Doctor_Name"]);
																	$adata[$row["Doctor_Name"]]=$row["Doctor_Name"];
																}
															?>
															<select class="form-control" name="d_name" id="d_name" onchange="GetDetail(this.value);" required="">
															  <option value="">Doctor name</option>
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
															<select class="form-control" id="day" name="day" onclick="GetDetail2(this.value);" required="">
																<option value="">Select Day</option>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleInputName1">Time<span class="text-danger">*</span></label>
															<select class="form-control" id="time" name="time" required="">
																<option value="">Select Time</option>
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
															<input type="number" class="form-control" id="contact" name="contact" onblur="validatePhone(this);" required>
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
										<div class="col-md-3" >
											
											<div class = "row mt-3">
											<button type="submit" class="btn btn-primary mr-2">Book</button>
											<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_doc_landing.php';">Cancel</button>
											
											</div>
										</div>	
									</form>
									<script>

	function validatePhone(input)
	{
		
		
		  if(input.value.length == '0')
		  {}
	  else{
			  var reg = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
			  if (reg.test(input.value) == false) 
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
									<?php
										if ($_SERVER["REQUEST_METHOD"] == "POST") 
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
															<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_booking.php';">Close</button>
															
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
														<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'opd_booking.php';">Close</button></div>
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
				  <!-- main-panel ends -->
				  
				  <!-- page-body-wrapper ends -->
				 
				  <!-- container-scroller -->
				  
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
	