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
									<h3 class="page-title"> Doctor Master </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="settings_landing.php">Settings</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
											<div class="card records-card mt-2">
												<div class="card records-card mt-2">
													<div class="card-body">
													
														<div class="row">
															<div class="col-md-4" ><button class="btn btn-primary" onclick="window.location.href = 'doctor_master_add.php'">Add New</button></div>
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
														<div class="row mt-2">
															<div class="col-md-12">
																<div class="table-responsive table-sec mb-4 ">
																	<table class="table" id="table11">
																		<thead>
																			<tr>
																				<th width="5%">Sl No</th>
																				<th width="15%">Doctor Name</th>
																				<th width="15%"  >Department</th>
																				<th width="10%">IPD/OPD</th>
																				
																				<th width="10%">Contact</th>
																				
																				<th width="5%">Action</th>
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $sql="SELECT * FROM doctor_master WHERE Is_Active='Yes' order by cast(SUBSTRING(`Doctor_Id`, 3,length(`Doctor_Id`)-2) as UNSIGNED) DESC;";
																				$result=$conn->query($sql);$num=1;
																				while($row=$result->fetch_assoc()) {
																						$opd1= "";
																						$ipd1= "";
																						$did=$row["Doctor_Id"];
																						$nam=$row["Doctor_Name"];
																						$mob=$row["Mobile"];
																						$opd=$row["Is_Opd"];
																						$ipd=$row["Is_Ipd"];
																						if($opd == 1)
																						{
																							$opd1='OPD';
																						}
																						if($ipd == 1)
																						{
																							$ipd1='IPD';
																						}
																						//$secn=$row["Secretary_Name"];
																						//$secm=$row["Secretary_Mobile"];
																						
																						$dept="";
																						$sql2="SELECT * FROM doctor_fees_master where Doctor_Id='$did';";
																				$result2=$conn->query($sql2);
																				if($result2->num_rows==1){while($row=$result2->fetch_assoc()) {
																						$dept.=$row['Department'];
																				}}
																				else
																				{
																					while($row=$result2->fetch_assoc()) {
																						$dept.=$row['Department'].",";
																				}
																				}
																				
																						?>
																					<tr id= "tr_<?php echo $did;?>" class="todo-list todo-list-custom">
																						<td width="5%"><?php echo $num++; ?></td>
																						<td  width="15%" ><?php echo  $nam;?></td>
																						
																						<td width="15%"><?php echo $dept; ?></td>
																						<td width="10%"><?php echo $opd1." ".$ipd1; ?></td>
																						
																						<td width="10%"><?php echo $mob ?></td>
																						
																						<td width="5%"> <a class="btn btn-success btn-xs" style="padding:2px;" onclick="window.location.href = 'doctor_master_edit.php?id=<?php echo $did; ?>';"><i class="fa-solid fa-pencil" style="margin:0;font-size:15px;"></i></a>&nbsp;
																						
																						
																						<a class="btn btn-danger btn-xs" style="padding:2px;"  onclick="delete_data('<?php echo $did;?>')"><i class="fa-solid fa-trash" style="margin:0;font-size:15px;"></i></a></td>
																					</tr>
																				<?php } ?>
																		</tbody>
																	</table>
																	<div class="mt-3">
																		<div   style="float: left;">

																			<div class="d-flex justify-content-end">

																				<div class="form-group excel-ar">

																					<button class="btn btn-primary" onclick="window.location.href = 'settings_landing.php';">Cancel</button>

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
							<?php include "footer.php";?>
						</div>
					</div>
				</div>	
				
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
														        <h3 class="text-center" align="center">Associate Master Details</h3>
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
														
														<button type="button" class="btn btn-primary" onclick="window.location.href = 'opd_daily_transactions.php';"> Close </button>
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
		if (confirm("Are you sure want to delete this records")) 
		{
		jQuery.ajax
		({
			url:'doctor_master_delete.php',
			type: 'POST',
			data: 'id='+id,
			success:function(result)
			{
				jQuery('#tr_'+id).hide(500);
			}
		});
		}
		
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
		