<?php include 'connection.php';
if ($_SESSION['cus']['login'] == "true") {
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `pay_mode_master` WHERE `pay_mode_master_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='pay_mode_master.php'</script>";
} ?>
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
            	<style type="text/css" media="print">
                	@media print
                	{
                		@page {
                    		margin-top: 0;
                    		margin-bottom: 0;
                		}
                		body  {
                    		padding-top:72px;
                    		padding-bottom:72px;
                    		background:#fff;
                		}
                		th:last-child, td:last-child {
                            visibility:hidden;
                        }
                        #buttons {
                            visibility:hidden;
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
									<h3 class="page-title"> Pay Mode Master</h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="pay_mode_master.php"> Pay Mode Master</a></li>
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
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Pay Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="pay_name" name="pay_name" onblur="validateBLName(this);" placeholder="eg: Pay Name" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Is Active<span class="text-danger">*</span></label>
																					<select class="form-control" id="type" name="active" required>
																						<option value="Yes">Yes</option>
																						<option value="No">No</option>
																					</select>
																				</div>
																			</div>
																		</div>
        																<div class="row">
        																	<div class="col-md-12">
        																	    <input name="adding" class="btn btn-primary mr-2" type="submit" value="Add" />
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'pay_mode_master.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
													<?php } else if($_REQUEST['flag'] == "edit") {
													$id = $_GET['id'];   
													$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `pay_mode_master` WHERE pay_mode_master_id='$id'")); ?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
															    <input type="hidden" value="<?php echo $row["pay_mode_master_id"]; ?>" name="pay_mode_master_id">
																<div class="card mt-2">
																	<div class="card-body">
																	    <div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Pay Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="pay_name" value="<?php echo $row["Pay_Name"]; ?>" name="pay_name" onblur="validateBLName(this);" placeholder="eg: Expense Name" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputName1">Is Active<span class="text-danger">*</span></label>
																					<select class="form-control" id="type" name="active" required>
																						<option value="Yes" <?php if($row["IsActive"]=="Yes") { echo "selected"; } else { } ?>>Yes</option>
																						<option value="No" <?php if($row["IsActive"]=="No") { echo "selected"; } else { } ?>>No</option>
																					</select>
																				</div>
																			</div>
																		</div>
        																<div class="row">
        																	<div class="col-md-12">
        																	    <input name="update" class="btn btn-primary mr-2" type="submit" value="Update" />
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'pay_mode_master.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
													<?php } else { ?>
														<div class="row">
															<div class="col-md-2" ><button class="btn btn-primary" onclick="window.location.href = 'pay_mode_master.php?flag=add';">Add New</button></div>
															<div class="col-md-3"></div>
															<div class="col-md-4" ></div>
															<div class="col-md-3" >
																<div class="form-group">
																	<div class="search-sec">
																	<input id="gfg" type="text" class="form-control" placeholder="eg: John">
																	<span><i class="mdi mdi-magnify"></i></span>
										                           </div>
																</div>
															</div>
														</div>	
														<div class="row mt-2" id="download_section">
															<div class="col-md-12">
																<div class="table-responsive table-sec mb-4 ">
																	<table class="table header-fixed" id="table11">
																		<thead>
																			<tr>
																				<th>Sl No</th>
																				<th>Name</th>
																				<th>Active</th> 
																				<th>Action</th> 
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $i=1;
																			    $sql="SELECT * FROM `pay_mode_master` ORDER BY insert_date DESC";
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) { ?>
																					<tr>
																						<td><?php echo $i; ?></td>
																						<td><?php echo $row["Pay_Name"]; ?></td>
																						<td><?php echo $row["Is_Active"]; ?></td>
																						<td><a class="btn btn-success btn-xs" style="padding:2px;" href="pay_mode_master.php?id=<?php echo $row["pay_mode_master_id"]; ?>&flag=edit"><i class="mdi mdi-pencil" style="margin:0;font-size:15px;"></i></a> &nbsp; <a class="btn btn-danger btn-xs" style="padding:3px;" href="pay_mode_master.php?del_id=<?php echo $row["pay_mode_master_id"]; ?>&flag=delete"  onclick="return confirm('Are you sure to delete the record?')"><i class="fa fa-trash" style="margin:0;font-size:15px;"></i></a></td>
																					</tr>
																				<?php $i++; } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<div class="col-md-12"  style="float: right;">
															<div class="d-flex justify-content-end">
																<div class="form-group excel-ar">
																	<button class="btn btn-primary" onclick="ExportToExcel('xlsx')">Export Excel</button>&nbsp;
																</div>
															</div>
														</div>
													<?php } ?>	


													<?php if(isset($_POST['adding'])) {
																	
																	include 'connection.php';
																	$pay_name = $_POST['pay_name'];
																	$active = $_POST['active'];
																	
																	$sql2="SELECT * FROM `pay_mode_master` order by cast(SUBSTRING(`Pay_Id`, 13,length(`Pay_Id`)-12) as UNSIGNED) DESC LIMIT 1";
																	$result2 = $conn->query($sql2);
											                        $i=0;
																	while($row=$result2->fetch_assoc())
																	{
																		$d_id = $row["Pay_Id"];
																		$l = strlen($d_id);
																		$st = substr($d_id, 0,12);
																		$d = substr($d_id, 12,$l);
																		$d = $d+1;
																		$id = $st.$d;
																		$i++;
																	}
                                                                    if($i==0)
                                                                    {
                                                                        $id='EMD-PAYMODE-1';
                                                                    } 
																	
																	$s="INSERT into pay_mode_master(Pay_Id, Pay_Name, Is_Active) 
																	VALUES ('$id', '$pay_name', '$active');";
																	
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Pay Mode Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'pay_mode_master.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'pay_mode_master.php';">Close</button></div>
																			</div>
																		</div>
																		<?php } } ?> 
																		
															<?php if(isset($_POST['update'])) {
																	
																	include 'connection.php';
																	$pay_mode_master_id = $_POST['pay_mode_master_id'];
																	$pay_name = $_POST['pay_name'];
																	$active = $_POST['active'];
																	
																	$sql = "UPDATE `pay_mode_master` SET
                                                                        `Pay_Name` = '".$pay_name."',
                                                                        `Is_Active` = '".$active."'
                                                                        WHERE `pay_mode_master_id` = '".$pay_mode_master_id."'";
																	
																	if ($conn->query($sql) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Pay Mode Updated Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'pay_mode_master.php';">Close</button>
																					
																				</div>
																			</div>
																		</div>
																	    <?php } else { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 700px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="fail.png" alt="Success!" style="height: 50px; padding-left: 195px; margin-top: 25px;">
																				<h3 style="color: #000; text-align: center; padding-top: 28px;">Something Went Wrong!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Error occurred while Updating. Please try again.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'pay_mode_master.php';">Close</button></div>
																			</div>
																		</div>
																		<?php } } ?> 
																		
													</div>
												</div>
											</div>
						</div>
							<?php include "footer.php";?>
					</div>
				</div>
				
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
				<script type="text/javascript">
					$(document).ready(function () {
						$("#ddlCountry,#ddlAge").on("change", function () {
							var country = $('#ddlCountry').find("option:selected").val();
							var age = $('#ddlAge').find("option:selected").val();
							SearchData(country, age);
						});
					});

					function SearchData(country, age) {
						if (country.toUpperCase() == 'ALL' && age.toUpperCase() == 'ALL') {
							$('#table11 tbody tr').show();
						} else {
							$('#table11 tbody tr:has(td)').each(function () {
								var rowCountry = $.trim($(this).find('td:eq(2)').text());
								var rowAge = $.trim($(this).find('td:eq(3)').text());
								if (country.toUpperCase() != 'ALL' && age.toUpperCase() != 'ALL') {
									if (rowCountry.toUpperCase() == country.toUpperCase() && rowAge == age) {
										$(this).show();
									} else {
										$(this).hide();
									}
								} else if ($(this).find('td:eq(2)').text() != '' || $(this).find('td:eq(2)').text() != '') {
									if (country != 'all') {
										if (rowCountry.toUpperCase() == country.toUpperCase()) {
											$(this).show();
										} else {
											$(this).hide();
										}
									}
									if (age != 'all') {
										if (rowAge == age) {
											$(this).show();
										}
										else {
											$(this).hide();
										}
									}
								}
				 
							});
						}
					}
				</script>
				<script>
                    function printContent (el)
                    {
                        var headstr = "<div class='row' style='width:100%;float:left;'><div class='col-md-6' style='width:50%;float:left;'><img src='logo.jpeg' alt='' style='border: 0; width:80px; height:80px; vertical-align: middle;'></div><div class='col-md-6 text-right' style='width:50%;float:right;'><p style='margin-bottom:0.1px;color:#000;line-height:19px;'>EastMed Hospitals & Diagnostics Pvt Ltd<br>47(35), BT Road, Kumarpara, PO: Talpukur<br>Barrackpore, Kolkata, 700123<br>Phone: 8334857257, Email: care@eastmedhospital.com</p></div></div><hr style='margin-top:5px;margin-bottom:5px;width:100%;float:left;'><div class='row' style='width:100%;float:left;'><div class='col-md-12' style='width:100%;float:left;'><h4 class='text-center'>Pharmacy Stock Details</h4></div></div>";
                    	var restorepage = document.body.innerHTML;
                    	var printContent = document.getElementById(el).innerHTML;
                    	document.body.innerHTML = headstr + printContent;
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
    			<script>
                    var $table = document.getElementById("table111"),
                    $n = 10,
                    $rowCount = $table.rows.length,
                    $firstRow = $table.rows[0].firstElementChild.tagName,
                    $hasHead = ($firstRow === "TH"),
                    $tr = [],
                    $i,$ii,$j = ($hasHead)?1:0,
                    $th = ($hasHead?$table.rows[(0)].outerHTML:"");
                    var $pageCount = Math.ceil($rowCount / $n);
                    if ($pageCount > 1) {
                    	for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
                    		$tr[$ii] = $table.rows[$i].outerHTML;
                    	$table.insertAdjacentHTML("afterend","<div id='buttons'></div");
                    	sort(1);
                    }
                    
                    function sort($p) {
                    	var $rows = $th,$s = (($n * $p)-$n);
                    	for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
                    		$rows += $tr[$i];
                    	$table.innerHTML = $rows;
                    	document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
                    	document.getElementById("id"+$p).setAttribute("class","active");
                    }
                    
                    function pageButtons($pCount,$cur) {
                    	var	$prevDis = ($cur == 1)?"disabled":"",
                    		$nextDis = ($cur == $pCount)?"disabled":"",
                    		$buttons = "<input type='button' value='<< Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
                    	for ($i=1; $i<=$pCount;$i++)
                    		$buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
                    	$buttons += "<input type='button' value='Next >>' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
                    	return $buttons;
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