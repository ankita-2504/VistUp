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
									<h3 class="page-title"> Change Password </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="change_password.php">Change Password</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="card records-card mt-2">
									<div class="card records-card mt-2">
										<div class="card-body">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
															    <input type="hidden" value="<?php echo $row_per["User_Id"]; ?>" name="user_id">
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Old Password:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="opassword" name="opassword" placeholder="eg: Old Password" required>
																				</div>
																			</div>
																			<div class="col-md-8"></div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">New Password:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="password" name="password" placeholder="eg: New Password" required>
																				</div>
																			</div>
																			<div class="col-md-8"></div>
        																	<div class="col-md-4 mt-3">
        																	    <input name="update" class="btn btn-primary mr-2" type="submit" value="Update" />
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'change_password.php';">Cancel</button>
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

																		
															<?php if(isset($_POST['update'])) {
																	include 'connection.php';
																	$user_id = $_POST['user_id'];
																	$opassword = $_POST['opassword'];
																	$sql="SELECT * FROM users WHERE User_Id='".$user_id."'";
																	$result=$conn->query($sql);
																	$row=$result->fetch_assoc();
																	if($row['Password']==$opassword) {
    																	$password = $_POST['password'];
    																	$sql = "UPDATE `users` SET
                                                                        `Password` = '".$password."'
                                                                        WHERE `User_Id` = '".$user_id."'";
																	if ($conn->query($sql) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Password Updated Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'change_password.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'change_password.php';">Close</button></div>
																			</div>
																		</div>
															<?php } } else { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 700px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="fail.png" alt="Success!" style="height: 50px; padding-left: 195px; margin-top: 25px;">
																				<h3 style="color: #000; text-align: center; padding-top: 28px;">Wrong Old Password!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Please try again.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'change_password.php';">Close</button></div>
																			</div>
																		</div>
															<?php } } ?> 

	
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
				<script>
                    function printContent (el)
                    {
                    	var restorepage = document.body.innerHTML;
                    	var printContent = document.getElementById(el).innerHTML;
                    	document.body.innerHTML = printContent;
                    	window.print();
                    	document.margin='none';
                    	document.body.innerHTML = restorepage;
                    }
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