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
									<h3 class="page-title"> OPD Status </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Outpatient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="col-md-12 grid-margin">
									<form class="forms-sample booking-page" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleInputName1">From Date </label>
															<input type="date" class="form-control" name="from" id="from" value="<?php $month = date('m');$day = date('d');$year = date('Y');$today = $year . '-' . $month . '-' . $day; echo $today; ?>" placeholder="Name" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleInputName1">To Date </label>
															<input type="date" class="form-control" name="to" id="to" value="<?php $month = date('m');$day = date('d');$year = date('Y');$today = $year . '-' . $month . '-' . $day; echo $today; ?>" placeholder="Name" required>
														</div>
													</div>
													<div class="col-md-3">

														<div class="mt-3">

															
																<button type="button" class="btn btn-primary" onclick="showdata(); " id="search" name="search" >Search</button>
															  

															

														</div>
														
														<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

															  <script>
																$(document).ready(function() 
																{
																	var n=document.getElementById("from").value;
																	var c=document.getElementById("to").value;
																	//var r=document.getElementById("sreg").value;
																	
																	
																	$.ajax

																	({

																		type: "POST",

																		url: "opd_status_show.php",

																		data: {n:n,c:c},

																		dataType: "html",                  
																		
																		success: function(data){ 

																		
																		//alert('hh');
																		$("#tabledata").html(data); 
																		//alert('r');
																		}

																	});
																	
																 
																});
															  </script>
														
														
														
														

													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-12" id="display" style="visibility:visible;">
								<div id="tabledata"></div>
								</div>		
								<script>
								
								
									function showdata() 

										{
											var div = document.getElementById('display');

									// hide
									div.style.visibility = 'hidden';
											var n=document.getElementById("from").value;
																	var c=document.getElementById("to").value;
																	//var r=document.getElementById("sreg").value;

																	
																	$.ajax

																	({

																		type: "POST",

																		url: "opd_status_show_onclick.php",

																		data: {n:n,c:c},

																		dataType: "html",                  
																		
																		success: function(data){ 

																		var div = document.getElementById('display');

									// hide
									div.style.visibility = 'visible';

																		$("#tabledata").html(data); 
																		//alert('r');
																		}

																	});

										}
									
								
								</script>
							</div>
							<?php include "footer.php";?>
						</div>
							
						</div>
						<!-- main-panel ends -->
					</div>
					<!-- page-body-wrapper ends -->
				</div>
				<!-- container-scroller -->
				
					<div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body new-rgst">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="col-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="cs-container">
												<div class="cs-invoice cs-style1">
													<div class="cs-invoice_in" id="download_section">
													    <div class="row">
													        <div class="col-md-6">
																<div class="cs-logo cs-mb5">
																	<img src="logo.jpeg" alt="" style="border: 0; width: 100px; height: 100px; vertical-align: middle;">
																</div>
													        </div>
													        <div class="col-md-6 text-right">
													            <p style="margin-bottom:0.1px;color:#000;line-height:19px;">EastMed Hospitals & Diagnostics Pvt Ltd<br>47(35),BT Road,Kumarpara,PO: Talpukur,Barrackpore<br>Kolkata,700120<br>Phone: 8334857257<br>Email: care@eastmedhospital.com</p>
													        </div>
													    </div>
														<hr>
													    <div class="row">
													        <div class="col-md-12">
														        <h3 class="text-center" align="center">Opd Status</h3>
													        </div>
													    </div>
														<div id="daily"></div>
														
														<div class="cs-note" align="center" style="margin-top:20px; line-height:1.5em; display:flex;">
															<div class="cs-note_right" style="width:100%;vertical-align: middle;">
																	
																 <p class="cs-primary_color">
																	<b  style="font-weight: bold;">***End of Receipt. Thank You***</b>
																 </p>
															 </div>
														</div>
													</div>
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section')"> Print </button>
														
														<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_status.php';"> Close </button>
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
				
				<script>
					function printContent (el)
					{
						var restorepage = document.body.innerHTML;
						var printContent = document.getElementById(el).innerHTML;
						document.body.innerHTML = printContent;
						window.print();
						document.body.innerHTML = restorepage;
					}

				</script>
				<script>							

					function printpage() 
					{
						//alert('hh');
						var to=document.getElementById("to").value;
						var from=document.getElementById("from").value;
						var status=document.getElementById("ddlCountry").value;
						var doc=document.getElementById("ddlAge").value;
						$.ajax

						({

							type: "POST",

							url: "opd_status_print.php",

							data: {to:to,from:from,status:status,doc:doc},

							dataType: "html",                  

							success: function(data){ 

							//

							$("#daily").html(data); 

							}

						});

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