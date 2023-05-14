<?php $uri = $_SERVER['REQUEST_URI']; 
$id = $_SESSION["cus"]["Userid"];
$check_sql = "SELECT * FROM users WHERE User_Id='".$id."'";
$row_check = $conn->query($check_sql);
$row_per = $row_check->fetch_assoc();
$search_arr = explode(',', $row_per['Permissions']);
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
						<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
						  <a class="sidebar-brand brand-logo" href="dashboard.php"><img src="assets/images/logo.png" alt="logo" /></a>
						  <a class="sidebar-brand brand-logo-mini" href="dashboard.php"><img src="assets/images/small-logo.png" alt="logo" /></a>
						</div>
						<ul class="nav">
							<?php if((in_array("Booking" ,$search_arr)) || (in_array("Appointment" ,$search_arr)) || (in_array("Medical Records" ,$search_arr)) || (in_array("OPD Transactions" ,$search_arr)) || (in_array("OPD status" ,$search_arr)) || (in_array("Doctor Timings" ,$search_arr))) { ?>
							<li class="nav-item menu-items <?php if(($uri=="/new/opd_doc_landing.php") || ($uri=="/new/opd_booking.php")|| ($uri=="/new/opd_daily_transactions.php")|| ($uri=="/new/opd_medical_records_view.php")|| ($uri=="/new/opd_medical_records_edit.php")|| ($uri=="/new/opd_medical_records.php")|| ($uri=="/new/opd_appointment.php")|| ($uri=="/new/opd_status.php")|| ($uri=="/new/opd_doctor_master.php")|| ($uri=="/new/opd_patient_history.php")){ echo "active"; } else { } ?>">
								<a class="nav-link" href="opd_doc_landing.php">
								  <span class="menu-icon">
									<i class="mdi mdi-speedometer"></i>
								  </span>
								  <span class="menu-title">Out-Patient
								  </span>
								</a>
							</li>
							<?php } else { } ?>
							
							<?php if((in_array("Doctor Master" ,$search_arr)) || (in_array("Associate Master" ,$search_arr)) || (in_array("User Master" ,$search_arr)) || (in_array("State/City Master" ,$search_arr)) || (in_array("Pay Mode Master" ,$search_arr)) || (in_array("Company Master" ,$search_arr))) { ?>
							<li class="nav-item menu-items">
								<a class="nav-link" href="settings_landing.php">
								  <span class="menu-icon">
									<i class="mdi mdi-contacts"></i>
								  </span>
								  <span class="menu-title">Settings</span>
								</a>
							</li>
							<?php } else { } ?>
						</ul>
					</nav>
					