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
									<h3 class="page-title"> Department Master </h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="ipd_landing.php">In Patient Department</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
											<div class="card records-card mt-2">
												<div class="card records-card mt-2">
													<div class="card-body">
													<?php if($_REQUEST['flag'] == "add") { ?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Department Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="name" name="name"  placeholder="eg: Department Name" required>
																				</div>
																			</div>
																			
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputName1">Is Active<span class="text-danger">*</span> </label>
																					<select class="form-control" id="type" name="active" required>
																						<option value="Yes">Yes</option>
																						<option value="No">No</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																	    <input name="adding" class="btn btn-primary mr-2" type="submit" value="Add" />
																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'department_master.php';">Cancel</button>
																	</div>
																</div>
															</form>
														</div>
													<?php } else if($_REQUEST['flag'] == "edit"){
																if (isset($_GET['id'])) 
																{
																	$id = $_GET['id'];
																	
																}
																$s="SELECT * FROM department_master WHERE Department_Id ='$id';";
																$r=$conn->query($s);
																if($r->num_rows==1)
																{
																	$n = mysqli_fetch_array($r);
																	$name = $n['Department_Name'];
																	
																	$active=$n['Is_Active'];
																}
			

														?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Department Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="eg: Department Name" required>
																					<input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $id; ?>" required>
																				</div>
																			</div>
																			
																			<div class="col-md-3">
																				<div class="form-group">
																					<label for="exampleInputName1">Is Active<span class="text-danger">*</span> </label>
																					<select class="form-control" id="type" name="active"  required>
																						<option <?php if($active == "Yes") echo 'selected="selected"';?>>Yes</option>
																						<option <?php if($active == "No") echo 'selected="selected"';?>>No</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																	    <input name="editing" class="btn btn-primary mr-2" type="submit" value="Edit" />
																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'department_master.php';">Cancel</button>
																	</div>
																</div>
															</form>
														</div>
													
													<?php } else { ?>
														<div class="row">
															<div class="col-md-4" ><button class="btn btn-primary" onclick="window.location.href = 'department_master.php?flag=add';">Add New</button></div>
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
																				<th>Sl No.</th>
																				<th>Department Name</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $sql="SELECT * FROM department_master WHERE Is_Active='Yes' ORDER BY Department_Id DESC";
																			    $i=1;
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) { ?>
																					<tr id= "tr_<?php echo $row["Department_Id"]?>" class="todo-list todo-list-custom">
																						<td ><?php echo $i; ?></td>
																						<td ><?php echo $row["Department_Name"]; ?></td>
																						<td><a class="btn btn-success btn-xs" style="padding:2px;"  onclick="window.location.href = 'department_master.php?flag=edit&id=<?php echo $row['Department_Id']; ?>';"><i class="remove mdi mdi-pencil"style="margin:0;font-size:15px;"></i></a> &nbsp;<a class="btn btn-danger btn-xs" style="padding:2px;"  onclick="delete_data('<?php echo $row['Department_Id'];?>')"><i class="remove mdi mdi-delete"style="margin:0;font-size:15px;"></i></td>
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
																	<button class="btn btn-primary" onClick="printpage()"  data-toggle="modal" data-target="#exampleModal10" data-whatever="@fat">Print</button>
																</div>
															</div>
														</div>
													<?php } ?>	


													<?php
																if(isset($_POST['adding'])) {
																	
																	include 'connection.php';
																	$name = $_POST['name'];
																	
																	$active = $_POST['active'];
																	
																	$sql2="SELECT * FROM `department_master` order by cast(SUBSTRING(`Department_Id`, 10,length(`Department_Id`)-9) as UNSIGNED) DESC LIMIT 1";
			
																	$result2 = $conn->query($sql2);
											                        $i=0;
																	while($row=$result2->fetch_assoc())
																	{
																		$dd_id = $row["Department_Id"];
																		$l = strlen($dd_id);
																		$st = substr($dd_id, 0,9);
																		$d = substr($dd_id, 9,$l);
																		//echo $d;
																		$q = number_format($d);
																		$d=$q+1;
																		$id = $st.$d;
																		$i++;
																	}
																	if($i==0)
																	{
																		$id='EMD-DEPT-1';
																	}
																	
																	$s="INSERT into department_master VALUES ('$id', '$name','$active');";
																	
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Department Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'department_master.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'department_master.php';">Close</button></div>
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
																	$name = $_POST['name'];
																	
																	
																	$active = $_POST['active'];
																	
																	
																	
																	$s="UPDATE `department_master` SET `Department_Name`='$name',`Is_Active`='$active' WHERE Department_Id='$id';";
																	
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Department Edited Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'department_master.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'department_master.php';">Close</button></div>
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
			url:'department_master_delete.php',
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

						XLSX.writeFile(wb, fn || ('VisitUp.' + (type || 'xlsx')));

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
		