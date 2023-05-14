<?php
include 'connection.php';

require_once 'OPDChart.php';

if ($_SESSION["cus"]["login"] == "true")
{
	
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
			</head>
			<body>
				<div class="container-scroller">
				  <!-- partial:partials/_sidebar.html -->
					<?php include "menu.php"; ?>
					<div class="container-fluid page-body-wrapper"><!-- partial:partials/_navbar.html -->
						<?php include "header.php"; ?>
						<div class="main-panel">
							<div class="content-wrapper">
								<?php
									$date=date("Y-m-d");
									$sd="SELECT COUNT(Appointment_Id) FROM opd_patient_appointment WHERE Is_Refund='0' AND Confirm_Date='$date';";
									$rd=$conn->query($sd);		
									while($row=$rd->fetch_assoc())
									{
										$cappoint=$row['COUNT(Appointment_Id)'];
									}
									$sd2="SELECT COUNT(Status) FROM opd_patient_booking WHERE  (Status='Booked' OR Status='Appointed') AND Appoint_Date='$date';";
									$rd2=$conn->query($sd2);		
									while($row=$rd2->fetch_assoc())

									{

										$cabooked=$row['COUNT(Status)'];

										

									}
								?>
								<div class="row">
									<div class="col-sm-3 grid-margin">
										<div class="card">
											<div class="card-body dy-miter">
												<h5 class="font-weight-bold text-black font-size-15">Bookings</h5>
												<div class="row">
													<div class="col-8 col-sm-12 col-xl-8 my-auto">
														<div class="d-flex d-sm-block d-md-flex align-items-center">
															<h4 class="mb-0 blue-purple-text font-weight-bold"><?php echo $cabooked;?></h4>
														</div>
														<h6 class="text-muted font-weight-normal">Patients</h6>
													</div>
													
													<?php
														if($_SESSION["cus"]["Role"]=='Patient')
														{
															?>
															<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
																<a  style="text-align: center;"   data-toggle="modal"  data-whatever="@fat" >  <i class="mdi mdi-receipt text-primary ml-auto icon-lg" ></i></a>
																
															</div>
															<?php
														}
														else
														{
															?>
															<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
																<a  style="text-align: center;" onClick="slip()"  data-toggle="modal" data-target="#exampleModal2" data-whatever="@fat" >  <i class="mdi mdi-receipt text-primary ml-auto icon-lg" ></i></a>
																
															</div>
															<?php
														}
													
													?>
													
													
													
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="col-sm-3 grid-margin">
										<div class="card">
											<div class="card-body dy-miter">
												<h5 class="font-weight-bold text-black font-size-15">Appointments</h5>
												<div class="row">
													<div class="col-8 col-sm-12 col-xl-8 my-auto">
														<div class="d-flex d-sm-block d-md-flex align-items-center">
															<h4 class="mb-0 mb-0 blue-purple-text font-weight-bold"><?php echo $cappoint;?></h4>
														</div>
														<h6 class="text-muted font-weight-normal">Patients</h6>
													</div>
													<?php
														if($_SESSION["cus"]["Role"]=='Patient')
														{
															?>
															<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
													  
														
																<a  style="text-align: center;" data-toggle="modal"  data-whatever="@fat" >  <i class="icon-lg mdi mdi-checkbox-marked-outline text-yellow ml-auto"></i></a>
																
															</div>
															<?php
														}
														else
														{
															?>
															<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
													  
														
																<a  style="text-align: center;" onClick="slip45()"  data-toggle="modal" data-target="#exampleModal45" data-whatever="@fat" >  <i class="icon-lg mdi mdi-checkbox-marked-outline text-yellow ml-auto"></i></a>
																
															</div>
															<?php
														}
													
													?>
													
												</div>
											</div>
										</div>
									</div>
									<?php
									$day=date("l") ;
									$sql_display="SELECT COUNT( Distinct(Doctor_Id)) as Id FROM opd_doctor_appointment_master WHERE Days='$day';";
										$result=$conn->query($sql_display);  
										$num=1;
										if($result->num_rows>0)
										{
											while($row=$result->fetch_assoc())
											{ 
												$d_Id=$row['Id'];
											}
										}
									?>
									<div class="col-sm-3 grid-margin">
										<div class="card">
											<div class="card-body dy-miter">
												<h5 class="font-weight-bold text-black font-size-15">Available</h5>
												<div class="row">
													<div class="col-8 col-sm-12 col-xl-8 my-auto">
														<div class="d-flex d-sm-block d-md-flex align-items-center">
															<h4 class="mb-0 mb-0 blue-purple-text font-weight-bold"><?php echo $d_Id;?></h4>
														</div>
														<h6 class="text-muted font-weight-normal">Doctors</h6>
													</div>
													
													
													
													
													<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
														<a  style="text-align: center;" onClick="slip65()"  data-toggle="modal" data-target="#exampleModal65" data-whatever="@fat" ><i class="icon-lg mdi mdi-stethoscope text-red ml-auto"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
										$date=date("Y-m-d");
										$sd="SELECT * FROM payment WHERE Payment_Date='$date';";
										$rd=$conn->query($sd);
										$pay=0;
										while($row=$rd->fetch_assoc())
										{
											$appid=$row['Payment_Type_Id'];
											$type=$row['Payment_Type'];
											if($type == 'OPD')
											{
												$sd2="SELECT * FROM opd_patient_appointment WHERE Appointment_Id='$appid';";
												$rd2=$conn->query($sd2);
												
												while($row2=$rd2->fetch_assoc())
												{
													if($row2['Is_Refund']=='0')
														$pay=$pay+$row['Net_Amount'];
												}
											}
											else
											{
												$pay=$pay+$row['Net_Amount'];
											}
										}
										
									?>
									<?php
									if($_SESSION["cus"]["Role"]=='Patient')
									{
										
									}
									else
									{
										?>
										
										<div class="col-sm-3 grid-margin">
										<div class="card">
											<div class="card-body dy-miter">
												<h5 class="font-weight-bold text-black font-size-15">Collections</h5>
												
												<div class="row">
													<div class="col-8 col-sm-12 col-xl-8 my-auto">
														<div class="d-flex d-sm-block d-md-flex align-items-center">
														
															<h4 class="mb-0 mb-0 blue-purple-text font-weight-bold"><?php echo 'Rs.'.$pay;?></h4>
														</div>
														<h6 class="text-muted font-weight-normal">OPD</h6>
													</div>
													
													
															
															<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
														<a  style="text-align: center;" onClick="slip5()"  data-toggle="modal" data-target="#exampleModal5" data-whatever="@fat" ><i class="icon-lg mdi mdi-paypal text-primary ml-auto"></i></a>
													
													</div>
															
												</div>
											</div>
										</div>
									</div>
										
										<?php
									}
										?>
									
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title">Monthly Appointment Chart</h4>
												<canvas id="lineChart" height="80"></canvas>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							 
							<?php include "footer.php"; ?>
						
						</div>
						<!-- main-panel ends -->
					</div>
					  <!-- page-body-wrapper ends -->
				</div>
				
				<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div  id="confirm5">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal fade" id="exampleModal45" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div  id="confirm45">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal fade" id="exampleModal65" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div  id="confirm65">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
									
									
									
				<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div  id="confirm">
								</div>
							</div>
						</div>
					</div>
				</div>
									

									
				<!-- container-scroller -->
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
				<script src="assets/js/dashboard.js"></script>
				<script>
					function slip5() 
					{
						$.ajax({
							type: "POST",
							url: "dashboard_payment.php",
							dataType: "html", 
							success: function(data) { 
								$("#confirm5").html(data); 
							}
						});
					}
					function slip() 
					{
						$.ajax
						({
							type: "POST",
							url: "dashboard_bookings.php",
							dataType: "html",                  
							success: function(data){ 
								$("#confirm").html(data); 
							}
						});
					}
					function slip65() 
					{
						$.ajax
						({
							type: "POST",
							url: "dashboard_doctors.php",
							dataType: "html",                  
							success: function(data){ 
								$("#confirm65").html(data); 
							}
						});
					}
					
					function slip45() 
					{
						$.ajax
						({
							type: "POST",
							url: "dashboard_appointments.php",
							dataType: "html",                  
							success: function(data){ 
								$("#confirm45").html(data); 
							}
						});
					}
					
                    $(document).ready(function () {
                        //showGraph();
                        showGraph1();
                       // showGraph2();
                    });
                    
                    
                    function showGraph1()
                    {
                        {
                            $.post("OPDChart.php",
                            function (data1)
                            {
                                console.log(data1);
                                var chartdata = {
                                    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                                    datasets: [
                                        {
                                            label: 'Number Of Patient',
                                            data: <?php echo json_encode($dataopd); ?>,
                                            backgroundColor: '#49e2ff',
                                            borderColor: '#46d5f1',
                                            hoverBackgroundColor: '#CCCCCC',
                                            hoverBorderColor: '#666666'
                                        }
                                    ]
                                };
                                var graphTarget = $("#lineChart");
                                var barGraph = new Chart(graphTarget, {
                                    type: 'bar',
                                    data: chartdata
                                });
                            });
                        }
                    }
                    
                   
                </script>
			</body>
		</html>
		<?php
	}
	else
	{
		header("Location: index.php");
	}

?>
