<?php
	include 'connection.php';
	session_start();
	//keep user on page
		?>
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<!-- Required meta tags -->
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<title>VisitUp</title>
				<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
				<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
									<h3 class="page-title"> Doctor Master </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="settings_landing.php">Settings</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<?php
					
									$ipid=$_GET['id'];
									//echo $ipid;
									$record= "SELECT * FROM doctor_master WHERE Doctor_Id='$ipid';";
									$r=$conn->query($record);
									
									if($r->num_rows==1)
									{
										$n = mysqli_fetch_array($r);
										$docid=$n['Doctor_Id'];
										$name=$n['Doctor_Name'];

										//$adhaar=$n['adhar'];

										$reg=$n['Registration_No'];

										$gender=$n['Gender'];

										$marital=$n['Marital_Status'];

										

										$house=$n['House_Street'];

										$town=$n['Town_Village'];

										$city=$n['City_Id'];
										$pincode=$n['Pincode'];
										$district=$n['District_Id'];

										$state=$n['State_Id'];

										$mobile=$n['Mobile'];

										$phone=$n['Whatsapp'];

										$email=$n['Email'];	

										$qual=$n['Qualification'];
										$exp=$n['Experience'];
										$spec=$n['Specialization'];
										//$dept=$n['Department_Id'];
										
										$is_opd=$n['Is_Opd'];
										$is_ipd=$n['Is_Ipd'];
										
										

										$sec_name=$n['Secretary_Name'];

										$sec_mobile=$n['Secretary_Mobile'];

										$sec_email=$n['Secretary_Email'];

										$Signature = $n['Signature'];
																											
																				
									

									
												
												
												

									}
								?>
								<div class="card records-card mt-2">
									<div class="card records-card mt-2">
										<div class="card-body">
										
											<nav>
												<div class="nav nav-tabs" id="nav-tab" role="tablist">
													<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Details</a>
													<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Professional Details</a>
													<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Secretary Details</a>
													
												</div>
											</nav>
											<form class="form-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">
															
												<div class="tab-content" id="nav-tabContent">
													<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
														<div class="row">

															<div class="col-md-4">

																<div class="form-group">

																	<label> Name <span class="text-danger">*</span></label>

																	<input type="text" class="form-control"  name="name" id="name" value="<?php echo $name;?>" onkeyup="convert(this.value);" required>
																	<input type="hidden" class="form-control"  name="docid" id="docid" value="<?php echo $docid;?>" required>
																	
																</div>

															</div>
															
															<div class="col-md-4">

																<div class="form-group">

																	<label>Contact <span class="text-danger">*</span></label>

																	<input type="number" class="form-control"  name="contact" id="contact" value="<?php echo $mobile;?>" onblur="validatePhone(this);" required>

																</div>

															</div>

															<div class="col-md-4">

																<div class="form-group">

																	<label>Whatsapp( <input type="checkbox" id="same" name="same"  onchange="Contact()" /> <label for="same" class="mt-2"> Same as contact </label> ) </label>

																	<input type="number" class="form-control"  name="whatsapp" value="<?php echo $phone;?>" onblur="validateWhatsapp(this);" id="whatsapp" >

																</div>

															</div>
															
															<div class="col-md-4">

																<div class="form-group">

																	<label>House No./Street </label>

																	<input type="text" class="form-control" value="<?php echo $house;?>"  name="house">

																</div>

															</div>

															<div class="col-md-4">

																<div class="form-group">

																	<label>Town/Village</label>

																	<input type="text" class="form-control"  name="town" value="<?php echo $town;?>">

																</div>

															</div>

															<div class="col-md-4">

																<div class="form-group">

																	<label>Pin Code </label>

																	<input type="number" class="form-control" value="<?php echo $pincode;?>" name="pincode" >

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
															
															

															<div class="col-md-4">

																<div class="form-group">

																	<label>Email <span class="text-danger">*</span></label>

																	<input type="text" class="form-control" value="<?php echo $email;?>" name="email" id="email" onblur="validateEmail(this);"  >

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
																	<option<?php if($marital == "Widowed") echo 'selected="selected"';?>>Widowed</option>
																	<option<?php if($marital == "Divorced") echo 'selected="selected"';?>>Divorced</option>
																	<option<?php if($marital == "Separated") echo 'selected="selected"';?>>Separated</option>
																</select>

																</div>

															</div>
															<div class="col-md-1">
																<div class="mt-3">
																	<button type="submit" name="adddoc" onclick="reg2()" class="btn btn-primary">Update</button>
																</div>
															</div>
															<div class="col-md-2">
																<div class="mt-3">
																	<button class="btn btn-primary"><a href="doctor_master.php" style="text-decoration: none; color: white;">Cancel</a></button>
																</div>
															</div>
														

														</div>
														
														
															

													</div>

												
													<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
													
														<div class="row">
															<div class="col-md-4">

																<div class="form-group">

																	<label>Registration No.</label>

																	<input type="text" class="form-control" value="<?php echo $reg;?>"  name="reg">

																</div>

															</div>
															
															<div class="col-md-4">

																<div class="form-group">

																	<label>Qualification <span class="text-danger">*</span></label>

																	<input type="text" class="form-control" value="<?php echo $qual;?>"  name="qual" id="qual" required>

																</div>

															</div>

															<div class="col-md-4">

																<div class="form-group">

																	<label>Specialization <span class="text-danger">*</span></label>

																	<input type="text" class="form-control"  name="spec" value="<?php echo $spec;?>"  id="spec" required>

																</div>

															</div>


															

															<div class="col-md-4">

																<div class="form-group">

																	<label>Experience (in years)<span class="text-danger">*</span></label>

																	<input type="number" class="form-control" value="<?php echo $exp;?>"  name="exp" id="exp" required>

																</div>

															</div>	
															<div class="col-md-4">

																<div class="form-group">

																	<label>Patient Type<span class="text-danger">*</span></label>

																	<select class="form-control" id="ipd_opd" name="ipd_opd"   onchange="check();" required="">
																		
																		<option value="">Select Option</option>
																		

																		
																		<option <?php if($is_opd==1 && $is_ipd!= 1)echo 'selected="selected"';?>>OPD</option>

																		
																	</select>
																	
																</div>

															</div>

															<div class="col-md-4">

																
															</div>

															
															<div class="col-md-3" id="depts">
																<div class="form-group">
																	<label for="exampleInputEmail3"> Department :<span class="text-danger">*</span></label>
																	
																	<?php

																		

																		$i=[];

																		$adata=[];

																		$sql="select Department_Name from department_master;";

																		$result=$conn->query($sql);

																		while($row=$result->fetch_assoc())

																		{

																			array_push($i,$row["Department_Name"]);

																			$adata[$row["Department_Name"]]=$row["Department_Name"];

																		}

																	?>

																	<select name="dept" id="dept" class="form-control" style="border: 1.5px solid #0091d5;">

																		<option value="">Select Department</option>

																		<?php

																			foreach($i as $item)

																			{
																				
																				echo "<option value='$item'>$item</option>";
																				
																			}

																		?>

																	</select>

																</div>
															</div>
															<div class="col-md-3" id="fees_types" >
																<div class="form-group">
																	<label for="exampleInputEmail3"> Fees Type :<span class="text-danger">*</span></label>
																	
																	<select class="form-control" name="fees_type" id="fees_type" >
																		
																	</select>
																</div>
															</div>
															<div class="col-md-2" id="feess">
																<div class="form-group">
																	<label for="exampleInputPassword4">Fees :<span class="text-danger">*</span> </label>
																	
																	<input type="number" class="form-control" value=""  name="fees" id="fees">
																</div>
															</div>
															<div class="col-md-2" id="referrals">
																<div class="form-group">
																	<label for="exampleInputPassword4">Referral : </label>
																	<input type="number" class="form-control" value=" "  name="referral" id="referral">
																</div>
															</div>
															
															<div class="col-md-2" id="ref">
																<div class="mt-3">
																	<button type="submit" id="showdat" name="showdat" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"  style="margin:0;font-size:15px;"></i></button>
																</div>
															</div>
															
															<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
															<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
															
															<script>
																loadData1234();
																function loadData1234()
																{
																	var docid = $('#docid').val();
																	//alert(docid);
																	$.ajax
																	({    
																		type: "POST",
																		url: "doc_fees_view.php",
																		data: {docid:docid},
																		dataType: "html",                  
																		success: function(data){                    
																			$("#table-show").html(data); 
																		}
																	});
																}
															
															</script>
															<script type="text/javascript">
																//data insertion
																$(document).ready(function()
																{
																	$('#showdat').click(function(event)
																	{
																		
																		event.preventDefault();
																		var	fees_type = $('#fees_type').val();
																		var	fees = $('#fees').val();
																		var referral = $('#referral').val();
																		var dept = $('#dept').val();
																		var docid = $('#docid').val();
																		if(dept=='')
																		{
																			alert(' Please Select Department Name');
																			return false;
																		}
																		else if(fees_type=='')
																		{
																			alert('Please Select Fees Type');
																			return false;
																		}
																		else if(fees=='')
																		{
																			alert('Please Enter Fees');
																			return false;
																		}
																		
																		
																		$.ajax
																		({
																			type: "POST",
																			url: "doc_fees_add.php",
																			data: {docid:docid,fees_type:fees_type,fees:fees,referral:referral,dept:dept},		    
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
																							url: "doc_fees_view.php",
																							data: {docid:docid},
																							dataType: "html",                  
																							success: function(data)
																							{                    
																								$("#table-show").html(data); 
																								// document.getElementById("showdata").disabled = true;
																								document.getElementById("fees").value = "";
																								document.getElementById("referral").value = "";
																								//document.getElementById("quantity").required = false;
																								document.getElementById("fees_type").innerHTML = "<option value=''>Select Fees Type</option>";
																								document.getElementById("dept").innerHTML = "<option value=''>Select Department</option>";
																								
																								//document.getElementById("batch_no").required = false;
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
																		
																	});
																});
																//data display
																
															</script>
															<script>
																 function myDelFunction(dept,delid) 
																{
																	var docid = $('#docid').val();
																	//alert(r_id+delid);
																	
																	var deleteId = delid;
																	if (confirm("Are you sure want to delete this records")) 
																	{
																		//alert(deleteId);
																		$.ajax
																			({
																				url : "doc_fees_delete.php",
																				type: "POST",
																				cache:false,
																				data:{dept:dept,deleteId: deleteId,docid:docid},
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
																								url: "doc_fees_view.php",
																								data: {docid:docid},
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
																}
																		
															</script>
															<div class="col-md-12">
															<div id="table-show" style="padding-left: 2px; padding-right: 2px;"></div>		
															</div>
															
															
															
															
															
															
															
															
															<div class="col-md-3" id="day" >
																<div class="form-group">
																	<label for="exampleInputEmail3"> Days :</label>
																	<select name="days" id="days" class="form-control"  style="border: 1.5px solid #0091d5;">
																		<option value="">Days</option>
																		<option value="Sunday">Sunday</option>
																		<option value="Monday">Monday</option>
																		<option value="Tuesday">Tuesday</option>
																		<option value="Wednesday">Wednesday</option>
																		<option value="Thursday">Thursday</option>
																		<option value="Friday">Friday</option>
																		<option value="Saturday">Saturday</option>	
																	</select>
																</div>
															</div>
															<div class="col-md-3" id="opd_mor">
																<div class="form-group">
																	<label for="exampleInputEmail3"> Morning :</label>
																	<input type="text" class="form-control" name="morning" value='' id="morning" placeholder="eg: hh-mm AM"/>
																</div>
															</div>
															<div class="col-md-3" id="opd_eve">
																<div class="form-group">
																	<label for="exampleInputEmail3"> Evening :</label>
																	<input type="text" class="form-control" name="evening" value='' id="evening" placeholder="eg: hh-mm PM"/>
																</div>
															</div>
															
															<div class="col-md-2" id="opd_eve2">
																<div class="mt-3">
																<button type="submit" id="showdata" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"  style="margin:0;font-size:15px;"></i></button>
																</div>
															</div>
															<script>
															
																loadData2();
																function loadData2()
																{
																	var d_id = $('#docid').val();
																	$.ajax
																	({    
																		type: "POST",
																		url: "doctor_appointment_view.php",
																		data: {d_id:d_id},
																		dataType: "html",                  
																		success: function(data){                    
																		$("#table-show2").html(data); 
																		}
																	});
																}
															
															</script>
															<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
															<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
															<script type="text/javascript">
																//data insertion
																$(document).ready(function()
																{
																	$('#showdata').click(function(event)
																	{
																		
																		event.preventDefault();
																		var	days = $('#days').val();
																		var	morning = $('#morning').val();
																		var evening = $('#evening').val();
																		var d_id = $('#docid').val();
																		if(days=="")
																		{
																			alert('Please Select Days!!');
																			return false;
																		}
																		else if(morning == "" && evening=="")
																		{
																			alert('Please Select Timings!!');
																			return false;
																		}
																		$.ajax
																		({
																			type: "POST",
																			url: "opd_master_appointment_add.php",
																			data: {d_id:d_id,days:days,morning:morning,evening:evening},		    
																			dataType: "json",
																			success: function(result)
																			{	
																				if (result==1)
																				{
																				//alert("Test added successfully");
																				loadData();
																				function loadData()
																				{
																					//var p_trfid = $('#p_trfid').val();
																					$.ajax
																					({    
																						type: "POST",
																						url: "doctor_appointment_view.php",
																						data: {d_id:d_id},
																						dataType: "html",                  
																						success: function(data){                    
																						$("#table-show2").html(data); 
																						document.getElementById("morning").value = "";
																								document.getElementById("evening").value = "";
																								//document.getElementById("quantity").required = false;
																								document.getElementById("days").innerHTML = "<option value=''>Select Days</option>";
																								//document.getElementById("dept").innerHTML = "<option value=''>Select Department</option>";
																								
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
																		
																	});
																});
																//data display
																
															</script>
															<script>
																 function myDelFunction2(delid) 
																{
																	var docid = $('#docid').val();
																	//alert(r_id+delid);
																	
																	var deleteId = delid;
																	if (confirm("Are you sure want to delete this records")) 
																	{
																		//alert(deleteId);
																		$.ajax
																			({
																				url : "doctor_appointment_delete.php",
																				type: "POST",
																				cache:false,
																				data:{deleteId: deleteId,docid:docid},
																				success:function(response)
																				{
																					
																					if (response==1)
																					{
																						loadData();
																						function loadData()
																						{
																							//var p_trfid = $('#p_trfid').val();
																							$.ajax
																							({    
																								type: "POST",
																								url: "doctor_appointment_view.php",
																								data: {d_id:docid},
																								dataType: "html",                  
																								success: function(data){                    
																								$("#table-show2").html(data); 
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
																}
																		
															</script>
															<div class="col-md-12">
															<div id="table-show2" style="padding-left: 2px; padding-right: 2px;"></div>		
															</div>
															
															
															
															
														
															<div class="col-md-4">
																<div class="form-group">
																	<label for="exampleInputPassword4">Signature: </label>
																	<input type="file" class="form-control" id="filetag" onchange="loadFile(event)" name="uploadfile" >
																</div>
															</div>
															
															<div class="col-md-4 text-center">
																<div class="form-group">
																
																	<img src="uploads/<?php echo $Signature; ?>" id="preview" style="width:100px;position:absolute;left:80px;top:-10px;">
																</div>
															</div>
															<div class="col-md-1">
																<div class="mt-3">
																	<button type="submit" name="adddoc" onclick="reg2()" class="btn btn-primary">Update</button>
																</div>
															</div>
															<div class="col-md-2">
																<div class="mt-3">
																	<button class="btn btn-primary"><a href="doctor_master.php" style="text-decoration: none; color: white;">Cancel</a></button>
																</div>
															</div>
														

														</div>
														
															
													</div>
													
													<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
													
														<div class="row">

															<div class="col-md-4">

																<div class="form-group">

																	<label>Name </label>

																	<input type="text" class="form-control" value="<?php echo $sec_name;?>"  name="sec_name" id="sec_name"  >

																</div>

															</div>
															<div class="col-md-4">

																	<div class="form-group">

																		<label>Contact </label>

																		<input type="number" class="form-control" value="<?php echo $sec_mobile;?>"  name="sec_mobile"  id="sec_mobile" >

																	</div>

															</div>

															<div class="col-md-4">

																<div class="form-group">

																	<label>Email </label>

																	<input type="text" class="form-control"  name="sec_email" value="<?php echo $sec_email;?>"id="sec_email"  >

																</div>

															</div>
															
															<div class="col-md-1">
																<div class="mt-3">
																	<button type="submit" name="adddoc" onclick="reg2()" class="btn btn-primary">Update</button>
																</div>
															</div>
															<div class="col-md-2">
																<div class="mt-3">
																	<button class="btn btn-primary"><a href="doctor_master.php" style="text-decoration: none; color: white;">Cancel</a></button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php include "footer.php";?>
						</div>
					</div>
				</div>
				<?php

					function reg2()

					{
						include "connection.php";
						if (isset($_POST['adddoc'])) 

						{

							

							
							$docid=$_POST['docid'];
							$name=$_POST['name'];

							//$adhaar=$_POST['adhar'];

							$reg=$_POST['reg'];

							$gender=$_POST['gender'];

							$marital=$_POST['marital'];

							

							$house=$_POST['house'];

							$town=$_POST['town'];

							$city=$_POST['city'];

							$district=$_POST['district'];

							$state=$_POST['state'];

							$pincode=$_POST['pincode'];

							$qual=$_POST['qual'];
							$spec=$_POST['spec'];
							//$dept=$_POST['dept'];
							$exp=$_POST['exp'];
							$ipd_opd=$_POST['ipd_opd'];
							if($ipd_opd == 'OPD')
							{
								$is_opd='1';
								$is_ipd='0';
							}
							else if($ipd_opd=='IPD')
							{
								$is_ipd='1';
								$is_opd='0';
							}
							else
							{
								$is_ipd='1';
								$is_opd='1';
							}
							
							$mobile=$_POST['contact'];

							$phone=$_POST['whatsapp'];

							$email=$_POST['email'];	

							$sec_name=$_POST['sec_name'];

							$sec_mobile=$_POST['sec_mobile'];

							$sec_email=$_POST['sec_email'];

							$sql_img = "SELECT * FROM doctor_master WHERE Doctor_Id='$docid';";
                                                                	$result_img = $conn->query($sql_img);
                                                                	$row_img = $result_img -> fetch_assoc();
                                                                    
                                                                    if($_FILES['uploadfile']['name'] == "") 
																	{
                                                                        $filename = $row_img['Signature'];
                                                                    } 
																	else 
																	{
                                                                        $allowed_image_extension = array(
                                                                                                            "png",
                                                                                                            "jpg",
                                                                                                            "jpeg"
                                                                                                        );
                                                                        $target_dir = "uploads/";
                                                                        $file_extension = pathinfo($_FILES["uploadfile"]["name"], PATHINFO_EXTENSION);
                                                                        $filename = $_FILES["uploadfile"]["name"];
                                                                        $tempname = $_FILES["uploadfile"]["tmp_name"];
                                                                        $folder = $target_dir . $filename;
                                                                        if (! in_array($file_extension, $allowed_image_extension)) 
																		{
                                                                            echo "<script>alert('Upload valid images. Only PNG and JPEG are allowed.')</script>";
                                                                        }
																		else 
																		{
                                                                            $filename = $filename;
        																	move_uploaded_file($tempname, $folder);
                                                                        }
                                                                    }

							

							$sql="UPDATE `doctor_master` SET `Doctor_Name`='$name',`Registration_No`='$reg',`Gender`='$gender',`Marital_Status`='$marital',`House_Street`='$house',`Town_Village`='$town',`City_Id`='$city',`Pincode`='$pincode',`District_Id`='$district',`State_Id`='$state',`Mobile`='$mobile',`Whatsapp`='$phone',`Email`='$email',`Qualification`='$qual',`Experience`='$exp',`Specialization`='$spec',`Is_Opd`='$is_opd',`Is_Ipd`='$is_ipd',`Secretary_Name`='$sec_name',`Secretary_Mobile`='$sec_mobile',`Secretary_Email`='$sec_email',`Signature`='$filename',`Is_Active`='Yes' WHERE Doctor_Id='$docid';";

							

							if ($conn->query($sql) === TRUE) 

							{

								?>

									<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">

										<div class="modalcontent">

											<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">

											<h3 style="color: #000; text-align: center;">Successful!</h3>

											<h6 style="color: #000; text-align: center; padding-bottom: 10px; color: #636262; font-size: 13px;"> Doctor  Data Updated Successfully.</h6>

											<div class="dropdown-divider" style="border-top: 0px solid #b3b3b3;"></div>

											<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">

												<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'doctor_master.php';">Close</button>

												

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

									  <h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error Occurred! Please try again.</h6>

									  <div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>

									  <div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'doctor_master.php';">Close</button></div>

									 
									</div>

								  </div>

								  <?php
							}

							
						}
					}

				reg2();
					
				?>

				
				
				
				
				<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
                <script>
                var loadFile = function(event) {
                	var image = document.getElementById('preview');
                	image.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>				
				
				



			<script>
					check();
					function check() 

					{ 
							
						var pay=document.getElementById("ipd_opd").value;

						if (pay == 'IPD')

						{
							document.getElementById("feess").style.display = "block";
							document.getElementById("referrals").style.display = "block";
							//document.getElementById("quantity").required = false;
							document.getElementById("fees_types").style.display = "block";
							document.getElementById("depts").style.display = "block";
																					document.getElementById("ref").style.display = "block";											
							document.getElementById("fees_type").innerHTML = "<option value=''>Select Fees Type</option><option value='IPD'>IPD</option><option value='OT'>OT</option><option value='Procedural'>Procedural</option><option value='Other'>Other</option>";
							
							document.getElementById("day").style.display = "none";
							document.getElementById("opd_mor").style.display = "none";
							document.getElementById("opd_eve").style.display = "none";
							document.getElementById("opd_eve2").style.display = "none";
							document.getElementById("opd_gap2").style.display = "none";
							
							
						}

						else if(pay== 'OPD')

						{
							document.getElementById("feess").style.display = "block";
							document.getElementById("referrals").style.display = "block";
							//document.getElementById("quantity").required = false;
							document.getElementById("fees_types").style.display = "block";
							document.getElementById("depts").style.display = "block";
								document.getElementById("ref").style.display = "block";															
							document.getElementById("fees_type").innerHTML = "<option value=''>Select Fees Type</option><option value='OPD'>OPD</option>";
							
							document.getElementById("day").style.display = "block";
							document.getElementById("opd_mor").style.display = "block";
							document.getElementById("opd_eve").style.display = "block";
							document.getElementById("opd_eve2").style.display = "block";
							document.getElementById("opd_gap2").style.display = "block";

						}
						else if(pay== '')

						{
							
							document.getElementById("feess").style.display = "none";
							document.getElementById("referrals").style.display = "none";
							//document.getElementById("quantity").required = false;
							document.getElementById("fees_types").style.display = "none";
							document.getElementById("depts").style.display = "none";
									document.getElementById("ref").style.display = "none";																	
							document.getElementById("day").style.display = "none";
							document.getElementById("opd_mor").style.display = "none";
							document.getElementById("opd_eve").style.display = "none";
							document.getElementById("opd_eve2").style.display = "none";
							document.getElementById("opd_gap2").style.display = "none";
						}

						else

						{
							document.getElementById("feess").style.display = "block";
							document.getElementById("referrals").style.display = "block";
							//document.getElementById("quantity").required = false;
							document.getElementById("fees_types").style.display = "block";
							document.getElementById("depts").style.display = "block";
											document.getElementById("ref").style.display = "block";		
document.getElementById("fees_type").innerHTML = "<option value=''>Select Fees Type</option><option value='OPD'>OPD</option><option value='IPD'>IPD</option><option value='OT'>OT</option><option value='Procedural'>Procedural</option><option value='Other'>Other</option>";
																		
							document.getElementById("day").style.display = "block";
							document.getElementById("opd_mor").style.display = "block";
							document.getElementById("opd_eve").style.display = "block";
							document.getElementById("opd_gap2").style.display = "block";
							document.getElementById("opd_eve2").style.display = "block";
							
						}

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
					document.getElementById("name").value = str2;
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
		