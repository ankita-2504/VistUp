<?php
	include 'connection.php';
	session_start();
	if ($_SESSION['cus']['login'] == "true")
	{
		//keep user on page
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
					<?php include "menu.php"; ?>
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<?php include "header.php"; ?>
						<div class="main-panel">
							<div class="content-wrapper">

								<div class="page-header">
									<h3 class="page-title"> Outpatient Department </h3>
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
										<li class="breadcrumb-item active" aria-current="page">Menu</li>
									  </ol>
									</nav>
								</div>

								<div class="row">
									<div class="col-12 grid-margin stretch-card">
										<div class="card">
											<div class="card-body">
												<div class="obd-icon-ar">
													<div class="row">
													    <?php if(in_array("Booking" ,$search_arr)) { ?>
														<div class="col-md-2" >
															<button class="obd-icon-booking-1"
																onclick="window.location.href = 'opd_booking_view.php';">
																<span class="obd-icon"><img src="./assets/images/booking.png" class="w-100"></span>
																<span> Booking</span>
															</button>
														</div>
														<?php } else { } ?>
													    <?php if(in_array("Appointment" ,$search_arr)) { ?>
														 <div class="col-md-2">
															<button class="obd-icon-booking-1"
																  onclick="window.location.href = 'opd_appointment.php';">
																  <span class="obd-icon"><img src="./assets/images/medical-appointment.png" class="w-100"></span>
																  <span> Appointment</span>
															</button>
														</div>
														<?php } else { } ?>
													    
													    <?php if(in_array("OPD Transactions" ,$search_arr)) { ?>
														<div class="col-md-2">
															<button class="obd-icon-booking-1" onclick="window.location.href = 'opd_daily_transactions.php';">
															<span class="obd-icon"><img src="./assets/images/lending.png" class="w-100"></span>
															  <span>OPD Transactions</span>
															</button>
														</div>
														<?php } else { } ?>
													    <?php if(in_array("OPD status" ,$search_arr)) { ?>
														<!--<div class="col-md-2">
															<button class="obd-icon-booking-1" onclick="window.location.href = 'opd_doc_transactions.php';">
															<span class="obd-icon"><img src="./assets/images/advice.png" class="w-100"></span>
															  <span> Doctor Wise</span>
															</button>
														</div>-->
														<div class="col-md-2">
															<button class="obd-icon-booking-1" onclick="window.location.href = 'opd_status.php';">
															<span class="obd-icon"><img src="./assets/images/evaluate.png" class="w-100"></span>
															  <span> OPD status</span>
															</button>
														</div>
														<?php } else { } ?>
													    <?php if(in_array("Doctor Timings" ,$search_arr)) { ?>
														<div class="col-md-2">
															<button class="obd-icon-booking-1" onclick="window.location.href = 'opd_doctor_master.php';">
															<span class="obd-icon"><img src="./assets/images/clock.png" class="w-100"></span>
															  <span> Doctor Timings </span>

															</button>
														</div>
														<?php } else { } ?>
														<!--<div class="col-md-2">
															<button class="obd-icon-booking-1" onclick="window.location.href = 'opd_history.php';">
															<span class="obd-icon"><img src="./assets/images/clock-timing.png" class="w-100"></span>
															  <span> OPD History</span>
															</button>
														</div>
														<div class="col-md-2">
															<button class="obd-icon-booking-1" onclick="window.location.href = 'opd_patient_history.php';">
															<span class="obd-icon"><img src="./assets/images/record.png" class="w-100"></span>
															  <span> Patient History</span>

															</button>
														</div>-->
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php include "footer.php";?>
						</div>
					  <!-- page-body-wrapper ends -->
					</div>
				</div>
				
				
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