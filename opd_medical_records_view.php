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
						<?php include "header.php"; ?>
						<div class="main-panel">
							<div class="content-wrapper">
								<div class="page-header">
									<h3 class="page-title"> OPD Medical Records </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="opd_doc_landing.php">Out Patient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="card records-card mt-2">
									<div class="card records-card mt-2">
										<div class="card-body">
										
											<div class="row">
												<div class="col-md-4" ><button class="btn btn-primary" onclick="window.location.href = 'opd_medical_records.php';">Add New</button></div>
												<div class="col-md-5" ></div>
												<div class="col-md-3" >
													<div class="form-group">
														<div class="search-sec">
														<input id="gfg" type="text" class="form-control" placeholder="eg: John">
														<span><i class="mdi mdi-magnify"></i></span>
													   </div>
													</div>
												</div>
											</div>	
											<div class="row mt-2">
												<div class="col-md-12">
													<div class="table-responsive table-sec mb-4 ">
														<table class="table" id="table11">
															<thead>
																<tr>
																	
																	<th>Appointment Date</th>	
																	<th>Patient Id</th>
																	<th>Patient Name</th>
																	<th>Patient Contact</th>
																	<th>Doctor Name</th>
																	<th>Edit</th>
																	
																	<th>Print</th>
																</tr>
															</thead>
															<tbody id="geeks">
																<?php $sql="SELECT * FROM opd_medical_record ORDER BY Record_Id DESC;"; 
																	$result=$conn->query($sql);
																	while($row=$result->fetch_assoc()) 
																	{
																		$r_id=$row['Record_Id'];

																		$p_id=$row['Patient_Id'];
																		$d_id=$row['Doctor_Id'];
																		$da=$row['Date'];
																		
																					 $orgDate = $da;  
    $date = date("d-m-Y", strtotime($orgDate));  
    
																		$sql2="SELECT First_Name,Last_Name,Mobile FROM patient_master WHERE Patient_Id='$p_id';";
																		$result2=$conn->query($sql2);
																		while($row=$result2->fetch_assoc()) 
																		{
																			$f=$row["First_Name"];
																			$n=$row["Last_Name"];
																			$m=$row["Mobile"];
																		}
																		$sql12="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$d_id';";
																		$result12=$conn->query($sql12);
																		while($row=$result12->fetch_assoc()) 
																		{
																			$dname=$row["Doctor_Name"];
																			//$n=$row["Last_Name"];
																		}
																		?>
																		<tr id= "tr_<?php echo $r_id?>" class="todo-list todo-list-custom">
																			
																			<td ><?php echo $date; ?></td>
																			<td ><?php echo $p_id; ?></td>
																			<td ><?php echo $f." ".$n; ?></td>
																			<td ><?php echo $m; ?></td>
																			<td ><?php echo $dname; ?></td>
																			
																			<td><a class="btn btn-success btn-xs" style="padding:2px;"     onclick="window.location.href = 'opd_medical_records_edit.php?id=<?php echo $r_id; ?>';"><i class="fa-solid fa-pencil" style="margin:0;font-size:15px;"></i></a></td>
																			<td><a class="btn btn-info btn-xs" style="padding:2px;"   onClick="confirm(this.id)"  id="<?php echo $r_id;?>" data-toggle="modal" data-target="#exampleModal7" data-whatever="@fat"><i class="fa-sharp fa-solid fa-file-invoice"style="margin:0;font-size:15px;"></i></td>

																		
																		</tr>
																	<?php } ?>
															</tbody>
														</table>
														
														<div class="mt-3">
															<div align="left">
															
																<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_doc_landing.php';"> Cancel </button>
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
					</div>
				</div>	
				<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<div class="cs-invoice_in" id="download_section2">
														<div id="invoice2"></div>
														
															
													</div>
														
													
													<br><br><br>
													<div id="editor"></div>
													<div align="center">
														<button type="button" class="btn btn-primary" id="print" onclick="printContent('download_section2')"> Print </button>
														
														
														<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_medical_records_view.php';"> Close </button>
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

					function confirm(id) 

					{

						

						

						//alert(id);

						$.ajax

						({

							type: "POST",

							url: "opd_prescription.php",

							data: {id:id},

							dataType: "html",                  

							success: function(data){ 

							//alert('hh');

							$("#invoice2").html(data); 

							}

						});

					}					

					

				</script>
				
				
				<script>							

					function printpage() 

					{
						
						$.ajax

						({

							type: "POST",

							url: "department_master_print.php",

							data: {},

							dataType: "html",                  

							success: function(data){ 

							//alert('hh');

							$("#daily").html(data); 

							}

						});

					}
				</script>
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
	function delete_data(id)
	{
		jQuery.ajax
		({
			url:'department_master_delete.php',
			type: 'POST',
			data: 'id='+id,
			success:function(result)
			{
				jQuery('#tr_'+id).hide(500);
			}
		});
		
		
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
		<?php } else {
		header("Location: index.php");
} ?>