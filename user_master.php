<?php
	include 'connection.php';
	if ($_SESSION['cus']['login'] == "true")
	{
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "UPDATE `users` SET `IsDeleted`='Yes' WHERE `User_Id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='user_master.php'</script>";
}
//keep user on page
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
                		th:last-child, td:last-child {
                            visibility: hidden;
                        }
                        #buttons {
                            visibility: hidden;
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
									<h3 class="page-title"> User Master </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="settings_landing.php">Setting</a></li>
											<li class="breadcrumb-item active" aria-current="page">User Master</li>
										</ol>
									</nav>
								</div>
											<div class="card records-card mt-2">
												<div class="card records-card mt-2">
													<div class="card-body">
													<?php if($_REQUEST['flag'] == "add") { ?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">First Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="fname" name="fname"   required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Last Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="lname" name="lname"   required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Date_Of_Birth: <span class="text-danger">*</span></label>
																					<input type="date" class="form-control" id="dob" name="dob"   required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Phone Number: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="phone" name="phone"   required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Email: <span class="text-danger">*</span></label>
																					<input type="email" class="form-control" id="email" name="email"  required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputName1">Gender<span class="text-danger">*</span> </label>
																					<select class="form-control" id="gender" name="gender" required>
																						<option>Select Gender</option>
																						<option value="Male">Male</option>
																						<option value="Female">Female</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputName1">Role<span class="text-danger">*</span> </label>
																					<select class="form-control" id="role" name="role" required>
																						<option>Select Role</option>
																						<option value="Admin">Admin</option>
																						
																						
																						<option value="Doctor">Doctor</option>
																						<option value="Receptionist">Receptionist</option>
																						
																					</select>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Profile Image: <span class="text-danger">*</span></label>
																					<input type="file" class="form-control" id="filetag" onchange="loadFile(event)" name="uploadfile" placeholder="eg: Profile Image">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">User Name: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="user" name="user"   required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Password: <span class="text-danger">*</span></label>
																					<input type="password" class="form-control" id="password" name="password"   required>
																				</div>
																			</div>
																			<div class="col-md-3"></div>
																			<div class="col-md-3 text-center">
																				<div class="form-group">
																			        <img src="" id="preview" style="height:120px;position:absolute;left:80px;top:-20px;">
																			    </div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																	    <nav>
														                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                                <a class="nav-item nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="nav-home" aria-selected="true">Out Patient Department</a>
                                                                                <a class="nav-item nav-link" data-toggle="tab" href="#menu5" role="tab" aria-controls="nav-home" aria-selected="false">Settings</a>
                                                                            </div>
                                                                        </nav>
													                    <div class="tab-content" id="nav-tabContent" style="padding:10px;">
                                                                          <div id="home" class="tab-pane fade in show active" role="tabpanel" aria-labelledby="nav-home-tab">
            																<div class="row">
            																	<div class="col-md-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="Booking">
                                                                                      <label class="form-check-label">Booking</label>
                                                                                    </div>
                																</div>
            																	<div class="col-md-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="Appointment">
                                                                                      <label class="form-check-label">Appointment</label>
                                                                                    </div>
                																</div>
            																	
            																	<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="OPD Transactions">
                                                                                      <label class="form-check-label">OPD Transactions</label>
                                                                                    </div>
                																</div>
            																	<div class="col-md-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="OPD status">
                                                                                      <label class="form-check-label">OPD status</label>
                                                                                    </div>
                																</div>
            																	<div class="col-md-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="Doctor Timings">
                                                                                      <label class="form-check-label">Doctor Timings</label>
                                                                                    </div>
                																</div>
                															</div>
                                                                          </div>
                                                                          
                                                                         
                                                                          
                                                                          
                                                                          <div id="menu5" class="tab-pane fade">
            																<div class="row">
            																	<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="Doctor Master">
                                                                                      <label class="form-check-label">Doctor Master</label>
                                                                                    </div>
                																</div>
            																	
            																	<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="Department Master">
                                                                                      <label class="form-check-label">Department Master</label>
                                                                                    </div>
                																</div>
            																	<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="User Master">
                                                                                      <label class="form-check-label">User Master</label>
                                                                                    </div>
                																</div>
            																	<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="State/City Master">
                                                                                      <label class="form-check-label">State/City Master</label>
                                                                                    </div>
                																</div>
            																	<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="checkbox" name="permissions[]" value="Pay Mode Master">
                                                                                      <label class="form-check-label">Pay Mode Master</label>
                                                                                    </div>
                																</div>
            																	
																				<div class="col-md-3">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="Login Master">
                                                                                        <label class="form-check-label">Login-Logout Master</label>
                                                                                    </div>
                        														</div>
                															</div>
                                                                          </div>
                                                                        </div>
																	</div>
																</div>
																<div class="row mt-2">
																	<div class="col-md-12">
																	    <input name="adding" class="btn btn-primary mr-2" type="submit" value="Add" />
																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'user_master.php';">Cancel</button>
																	</div>
																</div>
															</form>
														</div>
													<?php } else if($_REQUEST['flag'] == "edit") {
																	$id = $_GET['id'];
    																$s="SELECT * FROM users WHERE User_Id ='$id';";
    																$r=$conn->query($s); 
    																$row=$r->fetch_assoc();
                                                                    $search_array  = explode(',', $row['Permissions']);
    														?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
															    <input type="hidden" value="<?php echo $row['User_Id']; ?>" name="id">
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">First Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" value="<?php echo $row['First_Name']; ?>" id="fname" name="fname"  placeholder="eg: First Name" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Last Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" value="<?php echo $row['Last_Name']; ?>" id="lname" name="lname"  placeholder="eg: Last Name" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Date_Of_Birth: <span class="text-danger">*</span></label>
																					<input type="date" class="form-control" value="<?php echo $row['Date_Of_Birth']; ?>" id="dob" name="dob"  placeholder="eg: Date Of Birth" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Phone Number: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" value="<?php echo $row['Contact']; ?>" id="phone" name="phone"  placeholder="eg: Phone Email" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Email: <span class="text-danger">*</span></label>
																					<input type="email" class="form-control" value="<?php echo $row['Email']; ?>" id="email" name="email" placeholder="eg: Email" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputName1">Gender<span class="text-danger">*</span> </label>
																					<select class="form-control" id="gender" name="gender" required>
																						<option>Select Gender</option>
																						<option value="Male" <?php if($row['Gender']=="Male") { echo "selected"; } else {} ?>>Male</option>
																						<option value="Female" <?php if($row['Gender']=="Female") { echo "selected"; } else {} ?>>Female</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputName1">Role<span class="text-danger">*</span> </label>
																					<select class="form-control" id="role" name="role" required>
																						<option>Select Role</option>
																						<option value="Admin" <?php if($row['Role']=="Admin") { echo "selected"; } else {} ?>>Admin</option>
																						
																						<option value="Doctor" <?php if($row['Role']=="Doctor") { echo "selected"; } else {} ?>>Doctor</option>
																						<option value="Receptionist" <?php if($row['Role']=="Receptionist") { echo "selected"; } else {} ?>>Receptionist</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Profile Image: <span class="text-danger">*</span></label>
																					<input type="file" class="form-control" id="filetag" onchange="loadFile(event)" name="uploadfile" placeholder="eg: Profile Image">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">User Name: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" value="<?php echo $row['User_Name']; ?>" id="user" name="user"  placeholder="eg: User Name" required>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Password: <span class="text-danger">*</span></label>
																					<input type="password" class="form-control" value="<?php echo $row['Password']; ?>" id="password" name="password"  placeholder="eg: Password" required>
																				</div>
																			</div>
																			<div class="col-md-3"></div>
																			<div class="col-md-3 text-center">
																				<div class="form-group">
																				    <img src="uploads/<?php echo $row['User_Image']; ?>" alt="" id="preview" style="height:120px;position:absolute;left:80px;top:-20px;">
																				</div>
																			</div>
																		</div>
																		<div class="row">
        																	<div class="col-md-12">
        																	    <ul class="nav nav-tabs">
                                                                                  <li class="nav-link active" style="background:#e2e5ef;padding: 5px 10px;"><a data-toggle="tab" href="#home" class="text-black">Out Patient Department</a></li>
                                                                                  <li class="nav-link" style="background:#e2e5ef;padding: 5px 10px;"><a data-toggle="tab" href="#menu5" class="text-black">Settings</a></li>
                                                                                </ul>
                                                                                <div class="tab-content" style="padding: 10px;">
                                                                                  <div id="home" class="tab-pane fade in show active">
                    																<div class="row">
                    																	<div class="col-md-2">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Booking" <?php if(in_array("Booking" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Booking</label>
                                                                                            </div>
                        																</div>
                    																	<div class="col-md-2">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Appointment" <?php if(in_array("Appointment" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Appointment</label>
                                                                                            </div>
                        																</div>
                    																	
                    																	<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="OPD Transactions" <?php if(in_array("OPD Transactions" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">OPD Transactions</label>
                                                                                            </div>
                        																</div>
                    																	<div class="col-md-2">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="OPD status" <?php if(in_array("OPD status" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">OPD status</label>
                                                                                            </div>
                        																</div>
                    																	<div class="col-md-2">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Doctor Timings" <?php if(in_array("Doctor Timings" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Doctor Timings</label>
                                                                                            </div>
                        																</div>
                        															</div>
                                                                                  </div>
                                                                                  
                                                                                  <div id="menu5" class="tab-pane fade">
                    																<div class="row">
                    																	<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Doctor Master" <?php if(in_array("Doctor Master" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Doctor Master</label>
                                                                                            </div>
                        																</div>
                    																	
                    																	<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Department Master" <?php if(in_array("Department Master" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Department Master</label>
                                                                                            </div>
                        																</div>
                    																	<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="User Master" <?php if(in_array("User Master" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">User Master</label>
                                                                                            </div>
                        																</div>
                    																	<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="State/City Master" <?php if(in_array("State/City Master" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">State/City Master</label>
                                                                                            </div>
                        																</div>
                    																	<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Pay Mode Master" <?php if(in_array("Pay Mode Master" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Pay Mode Master</label>
                                                                                            </div>
                        																</div>
                    																	
																						<div class="col-md-3">
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="Login Master" <?php if(in_array("Login Master" ,$search_array)) { echo "checked"; } else { } ?>>
                                                                                              <label class="form-check-label">Login-Logout Master</label>
                                                                                            </div>
                        																</div>
                        															</div>
                                                                                  </div>
                                                                                </div>
        																	</div>
        																</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																	    <input name="editing" class="btn btn-primary mr-2" type="submit" value="Update" />
																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'user_master.php';">Cancel</button>
																	</div>
																</div>
															</form>
														</div>
													<?php } else { ?>
														<div class="row">
															<div class="col-md-4" ><button class="btn btn-primary" onclick="window.location.href = 'user_master.php?flag=add';">Add New</button></div>
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
														<div class="row mt-2" id="download_section">
															<div class="col-md-12">
																<div class="table-responsive table-sec mb-4 ">
																	<table class="table" id="table11">
																		<thead>
																			<tr>
																				<th>Sl No.</th>
																				<th>Name</th>
																				<th>Contact</th>
																				<th>Role</th>
																				<th>User Name</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $sql="SELECT * FROM users WHERE `IsDeleted`='' ORDER BY Creation_Date DESC";
																			    $i=1;
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) { ?>
																					<tr>
																						<td ><?php echo $i; ?></td>
																						<td ><?php echo $row["First_Name"]." ".$row["Last_Name"]; ?></td>
																						<td ><?php echo $row["Contact"]; ?></td>
																						<td ><?php echo $row["Role"]; ?></td>
																						<td ><?php echo $row["User_Name"]; ?></td>
																						<td><a class="btn btn-success btn-xs" style="padding:2px;" href="user_master.php?flag=edit&id=<?php echo $row['User_Id']; ?>"><i class="remove mdi mdi-pencil" style="margin:0;font-size:15px;"></i></a> &nbsp; <a class="btn btn-danger btn-xs" style="padding:2px;" href="user_master.php?flag=delete&del_id=<?php echo $row['User_Id']; ?>" onclick="return confirm('Are you sure to delete the record?')"><i class="remove mdi mdi-delete" style="margin:0;font-size:15px;"></i></a></td>
																					</tr>
																				<?php $i++; } ?>
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
																	<button class="btn btn-primary" onclick="printContent('download_section')">Print</button>
																</div>
															</div>
														</div>
													<?php } ?>	


													<?php if(isset($_POST['adding'])) {
																	
																	include 'connection.php';
																	$fname = $_POST['fname'];
																	$lname = $_POST['lname'];
																	$dob = $_POST['dob'];
																	$phone = $_POST['phone'];
																	$email = $_POST['email'];
																	$gender = $_POST['gender'];
																	$role = $_POST['role'];
																	$user = $_POST['user'];
																	$password = $_POST['password'];
																	$cdate = date("Y-m-d");
																	$permissionsarr = $_POST["permissions"];
                                                                    $newvalues = implode(",", $permissionsarr);
                                                                    
                                                                    $allowed_image_extension = array(
                                                                                                        "png",
                                                                                                        "jpg",
                                                                                                        "jpeg"
                                                                                                    );
                                                                    $target_dir = "uploads/";
                                                                    $file_extension = pathinfo($_FILES["uploadfile"]["name"], PATHINFO_EXTENSION);
                                                                    $filename = rand(1000,1000000).$_FILES["uploadfile"]["name"];
                                                                    $tempname = $_FILES["uploadfile"]["tmp_name"];
                                                                    $folder = $target_dir . $filename;
                                                                    if (! in_array($file_extension, $allowed_image_extension)) {
                                                                        echo "<script>alert('Upload valid images. Only PNG and JPEG are allowed.')</script>";
                                                                    } else {
    																	move_uploaded_file($tempname, $folder);
    																	
    																	$sql2="SELECT * FROM `users` order by cast(SUBSTRING(`User_Id`, 4,length(`User_Id`)-3) as UNSIGNED) DESC LIMIT 1";
    																	$result2 = $conn->query($sql2);
    											                        $i=0;
    																	while($row=$result2->fetch_assoc())
    																	{
    																		$dd_id = $row["User_Id"];
    																		$l = strlen($dd_id);
    																		$st = substr($dd_id, 0,3);
    																		$d = substr($dd_id, 3,$l);
    																		$q = number_format($d);
    																		$d=$q+1;
    																		$id = $st.$d;
    																		$i++;
    																	}
    																	if($i==0)
    																	{
    																		$id='U001';
    																	}
    																	
    																	$s="INSERT into users(User_Id, User_Name, Password, First_Name, Last_Name, Date_Of_Birth, Contact, Email, Gender, Role, Group_Id, Creation_Date,Permissions,User_Image) 
    															            VALUES ('$id', '$user', '$password', '$fname', '$lname', '$dob', '$phone', '$email', '$gender', '$role', '', '$cdate', '$newvalues', '$filename');";
                                                                    }
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">User Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'user_master.php';">Close</button>
																					
																				</div>
																			</div>
																		</div>
																	<?php } else { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 700px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="fail.png" alt="Success!" style="height: 50px; padding-left: 195px; margin-top: 25px;">
																				<h3 style="color: #000; text-align: center; padding-top: 28px;">Something Went Wrong!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error occurred while Adding. Please try again.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'user_master.php';">Close</button></div>
																			</div>
																		</div>
																		<?php 
																	}
																}
															?> 	
															<?php
																if(isset($_POST['editing'])) {
																	
																	include 'connection.php';
																	$id = $_POST['id'];
																	$fname = $_POST['fname'];
																	$lname = $_POST['lname'];
																	$dob = $_POST['dob'];
																	$phone = $_POST['phone'];
																	$email = $_POST['email'];
																	$gender = $_POST['gender'];
																	$role = $_POST['role'];
																	$user = $_POST['user'];
																	$password = $_POST['password'];
																	$cdate = date("Y-m-d");
																	$permissionsarr = $_POST["permissions"];
                                                                    $newvalues = implode(",", $permissionsarr);
                                                                    
                                                                    $sql_img = "SELECT * FROM users WHERE User_Id='$id';";
                                                                	$result_img = $conn->query($sql_img);
                                                                	$row_img = $result_img -> fetch_assoc();
                                                                    
                                                                    if($_FILES['uploadfile']['name'] == "") {
                                                                        $filename = $row_img['User_Image'];
                                                                    } else {
                                                                        $allowed_image_extension = array(
                                                                                                            "png",
                                                                                                            "jpg",
                                                                                                            "jpeg"
                                                                                                        );
                                                                        $target_dir = "uploads/";
                                                                        $file_extension = pathinfo($_FILES["uploadfile"]["name"], PATHINFO_EXTENSION);
                                                                        $filename = rand(1000,1000000).$_FILES["uploadfile"]["name"];
                                                                        $tempname = $_FILES["uploadfile"]["tmp_name"];
                                                                        $folder = $target_dir . $filename;
                                                                        if (! in_array($file_extension, $allowed_image_extension)) {
                                                                            echo "<script>alert('Upload valid images. Only PNG and JPEG are allowed.')</script>";
                                                                        } else {
                                                                            $filename = $filename;
        																	move_uploaded_file($tempname, $folder);
                                                                        }
                                                                    }
                                                                    
    																$s="UPDATE `users` SET `User_Name`='$user',`Password`='$password',`First_Name`='$fname',`Last_Name`='$lname',`Date_Of_Birth`='$dob',`Contact`='$phone',
    																	`Email`='$email',`Gender`='$gender',`Role`='$role',`Group_Id`='',`Creation_Date`='$cdate',`Permissions`='$newvalues',`User_Image`='$filename' WHERE User_Id='$id';";
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">User Edited Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'user_master.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'user_master.php';">Close</button></div>
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
                    function printContent (el)
                    {
                        var headstr = "<div class='row' style='width:100%;float:left;'><div class='col-md-6' style='width:50%;float:left;'><img src='logo.jpeg' alt='' style='border: 0; width:80px; height:80px; vertical-align: middle;'></div><div class='col-md-6 text-right' style='width:50%;float:right;'><p style='margin-bottom:0.1px;color:#000;line-height:19px;'>EastMed Hospitals & Diagnostics Pvt Ltd<br>47(35), BT Road, Kumarpara, PO: Talpukur<br>Barrackpore, Kolkata, 700123<br>Phone: 8334857257, Email: care@eastmedhospital.com</p></div></div><hr style='margin-top:5px;margin-bottom:5px;width:100%;float:left;'><div class='row' style='width:100%;float:left;'><div class='col-md-12' style='width:100%;float:left;'><h4 class='text-center'>User Details</h4></div></div>";
                    	var restorepage = document.body.innerHTML;
                    	var printContent = document.getElementById(el).innerHTML;
                    	document.body.innerHTML = headstr + printContent;
                    	window.print();
                    	document.margin='none';
                    	document.body.innerHTML = restorepage;
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
                var loadFile = function(event) {
                	var image = document.getElementById('preview');
                	image.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>
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
		<?php
	}
	else
	{
		header("Location: index.php");
	}

?>