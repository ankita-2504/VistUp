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
			</head>
			<body>
				<div class="container-scroller">
				  <!-- partial:partials/_sidebar.html -->
					<?php include "menu.php"; ?>
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<?php include "header.php";?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> OPD Doctor Master </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="col-md-12 grid-margin">
									<div class="card records-card mt-2">
										<div class="card records-card mt-2">
											<div class="card-body">
												<h4> OPD Doctors Timings<hr> </h4>
												
												<div class="row">
													<div class="col-md-12">
														<div class="table-responsive table-sec mb-4 ">
															<table class="table">
																<thead>
																	<tr>
																		<th >Sl. No</th>
																		<th >Doctor Name</th>
																		<th >Department</th>
																		<th >Day</th>
																		<th >Morning</th>
																		<th >Evening</th> 
																		<th >Edit</th> 
																	</tr>
																</thead>
																<tbody>
																	<?php
																		$sql_display="SELECT Doctor_Id,Doctor_Name FROM doctor_master WHERE Is_Opd='1' ORDER BY Doctor_Name;";
																		$result=$conn->query($sql_display);  
																		$num=1;
																		if($result->num_rows>0)
																		{
																			while($row=$result->fetch_assoc())
																			{
																				$id =$row["Doctor_Id"];
																				$name = $row["Doctor_Name"]; 
																				$sql_display1="SELECT Department FROM doctor_fees_master WHERE Doctor_Id='$id' ;";
																				$result1=$conn->query($sql_display1);  
																				//$num=1;
																				if($result1->num_rows>0)
																				{
																					while($row=$result1->fetch_assoc())
																					{
																						$spec = $row["Department"]; 
																					}
																				}
																				
																				?>
																				<tr>
																					<td ><?php echo $num++;?></td>
																					<td ><?php echo $name;?></td>
																					<td ><?php echo $spec;?></td>
																					<td>
																						<?php
																							$sql_days="SELECT Days FROM opd_doctor_appointment_master WHERE Doctor_Id='$id';";
																							$r1=$conn->query($sql_days);  
																			
																							if($r1->num_rows>0)
																							{
																								while($row=$r1->fetch_assoc())
																								{
																									 echo $row['Days'];
																									 echo "<br><br>";
																								}
																							}
																						?>
																					</td>
																					
																					<td >
																						<?php
																							$sql_days="SELECT Morning_Time FROM opd_doctor_appointment_master  WHERE Doctor_Id='$id';";
																							$r2=$conn->query($sql_days);  
																			
																							if($r2->num_rows>0)
																							{
																								while($row=$r2->fetch_assoc())
																								{
																									 echo $row['Morning_Time'];
																									 echo "<br><br>";
																								}
																							}
																						?>
																					</td>
																					<td >
																					
																						<?php
																							$sql_days="SELECT Evening_Time FROM opd_doctor_appointment_master  WHERE Doctor_Id='$id';";
																							$r3=$conn->query($sql_days);  
																			
																							if($r3->num_rows>0)
																							{
																								while($row=$r3->fetch_assoc())
																								{
																									 echo $row['Evening_Time'];
																									 echo "<br><br>";
																								}
																							}
																						?>
																					</td>
																					<td><a class="btn btn-success btn-xs" style="padding:2px;" onClick="GFG_click(this.id)"  id="<?php echo $id;?>"   data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" ><i class="fa-solid fa-pen" style="margin:0;font-size:15px;"></i></a></td>
																				</tr>
																				<?php
																			}
																		}
																	?>
																</tbody>
															</table>
															<div class="mt-3">
																													<div   style="float: left;">

															<div class="d-flex justify-content-end">

																<div class="form-group excel-ar">

																	

																	<button class="btn btn-primary" onclick="window.location.href = 'opd_doc_landing.php';">Cancel</button>

																</div>

																

															</div>

														</div>
															<div class="col-md-6"  style="float: right;">
															<div class="d-flex justify-content-end">
																<div class="form-group excel-ar">
																	<button class="btn btn-primary" onclick="ExportToExcel('xlsx')">Export Excel</button>&nbsp;
																</div>
																<div class="form-group excel-ar">								
																	<button class="btn btn-primary" onClick="printpage()"  data-toggle="modal" data-target="#exampleModal10" data-whatever="@fat">Print</button>
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
								</div>
							</div>
							<?php include "footer.php";?>
						</div>
						<!-- main-panel ends -->
					</div>
					<!-- page-body-wrapper ends -->
				</div>
				<!-- container-scroller -->
				
				 

				<script>							
					function GFG_click(clicked) 
					{
						var id = clicked;
						//alert('ID '+id+ '!');
						$.ajax
						({
							type: "POST",
							url: "opd_appoint_edit.php",
							data: {id:id},
							dataType: "html",                  
							success: function(data){                    
							$("#confirm").html(data); 
							}
						});
					}					
					
				</script>
				
				<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div  id="confirm">
									<h3>Edit Timings</h3>
									<hr>
								
									<h4>Doctor Info</h4>		
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
		<?php } else {
		header("Location: index.php");
} ?>