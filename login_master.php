<?php include 'connection.php';
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
									<h3 class="page-title"> Login-Logout Master</h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="company_master.php"> Login-Logout Master</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
											<div class="card records-card mt-2">
												<div class="card records-card mt-2">
													<div class="card-body">
													<?php if($_REQUEST['flag'] == "add") { ?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Company Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="company_name" name="company_name" onblur="validateBLName(this);" placeholder="eg: Company Name" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Address: <span class="text-danger">*</span></label>
																					<textarea type="text" rows="4" class="form-control" id="address" name="address" required=""></textarea>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Contact: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="contact" name="contact" onblur="validateBLName(this);" placeholder="eg: Contact" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Email: <span class="text-danger">*</span></label>
																					<input type="email" class="form-control" id="email" name="email" onblur="validateBLName(this);" placeholder="eg: Email" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Website: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="website" name="website" onblur="validateBLName(this);" placeholder="eg: Website" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Registration No: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="registration" name="registration" onblur="validateBLName(this);" placeholder="eg: Registration No" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">GST No: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="gst" name="gst" onblur="validateBLName(this);" placeholder="eg: GST No" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Logo Image: <span class="text-danger">*</span></label>
																					<input type="file" class="form-control" id="filetag" onchange="loadFile(event)" name="uploadfile" placeholder="eg: Profile Image">
																				</div>
																			</div>
																			<div class="col-md-4 text-center">
																				<div class="form-group">
																			        <img src="" id="preview" style="height:120px;">
																			    </div>
																			</div>
																		</div>
        																<div class="row">
        																	<div class="col-md-12">
        																	    <input name="adding" class="btn btn-primary mr-2" type="submit" value="Add" />
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'company_master.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
													<?php } else if($_REQUEST['flag'] == "edit") {
													$id = $_GET['id'];   
													$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `company_master` WHERE company_master_id='$id'")); ?>
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
															    <input type="hidden" value="<?php echo $row["company_master_id"]; ?>" name="company_master_id">
																<div class="card mt-2">
																	<div class="card-body">
																	    <div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Company Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $row["Company_Name"]; ?>" onblur="validateBLName(this);" placeholder="eg: Company Name" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Address: <span class="text-danger">*</span></label>
																					<textarea type="text" rows="4" class="form-control" id="address" name="address" required=""><?php echo $row["Address"]; ?></textarea>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Contact: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row["Contact"]; ?>" onblur="validateBLName(this);" placeholder="eg: Contact" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Email: <span class="text-danger">*</span></label>
																					<input type="email" class="form-control" id="email" name="email" value="<?php echo $row["Email"]; ?>" onblur="validateBLName(this);" placeholder="eg: Email" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Website: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="website" name="website" value="<?php echo $row["Website"]; ?>" onblur="validateBLName(this);" placeholder="eg: Website" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Registration No: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="registration" name="registration" value="<?php echo $row["Registration_No"]; ?>" onblur="validateBLName(this);" placeholder="eg: Registration No" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">GST No: <span class="text-danger">*</span></label>
																					<input type="text" class="form-control" id="gst" name="gst" value="<?php echo $row["GST_No"]; ?>" onblur="validateBLName(this);" placeholder="eg: GST No" required>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">Logo Image:</label>
																					<input type="file" class="form-control" id="filetag" onchange="loadFile(event)" name="uploadfile" placeholder="eg: Profile Image">
																				</div>
																			</div>
																			<div class="col-md-4 text-center">
																				<div class="form-group">
																			        <img src="uploads/<?php echo $row['Logo']; ?>" alt="" id="preview" style="height:120px;">
																			    </div>
																			</div>
																		</div>
        																<div class="row">
        																	<div class="col-md-12">
        																	    <input name="update" class="btn btn-primary mr-2" type="submit" value="Update" />
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'company_master.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
													<?php } else { ?>
														<div class="row">
															<div class="col-md-2"  >
															   
															</div>
															<div class="col-md-3"></div>
															<div class="col-md-4" ></div>
															<div class="col-md-3" >
																<div class="form-group">
																	<div class="search-sec">
																	<input id="gfg" type="text" class="form-control" placeholder="Search">
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
																				<th>User Name</th>
																				<th>Login Date</th>
																				<th>Login Time</th>
																				<th>Logout Date</th>
																				<th>Logout Time</th>
																				
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $i=1;
																			    $sql="SELECT * FROM `login_logout_timings` order by cast(SUBSTRING(`Login_Id`, 4,length(`Login_Id`)-3) as UNSIGNED) DESC ";
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) {
																					$user=$row['User_Id'];
																						$sql2="SELECT First_Name,Last_Name FROM users WHERE User_Id='$user';";

																					$r=$conn->query($sql2);		

																					

																					if($r->num_rows>0)

																					{

																						while($row2=$r->fetch_assoc())

																						{

																							$fname=$row2['First_Name'];
																							$lname=$row2['Last_Name'];

																						}

																					}
																						?>
																					<tr>
																						<td><?php echo $i; ?></td>
																						<td ><?php echo $fname." ".$lname;?></td>
																						<td><?php echo $row["Login_Date"]; ?></td>
																						<td><?php echo $row["Login_Time"]; ?></td>
																						<td><?php echo $row["Logout_Date"]; ?></td>
																						<td><?php echo $row["Logout_Time"]; ?></td>
																						
																					</tr>
																				<?php $i++; } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														
													<?php } ?>	


													<?php if(isset($_POST['adding'])) {
																	
															include 'connection.php';
																	$company_name = $_POST['company_name'];
																	$address = $_POST['address'];
																	$contact = $_POST['contact'];
																	$email = $_POST['email'];
																	$website = $_POST['website'];
																	$registration = $_POST['registration'];
																	$gst = $_POST['gst'];
                                                                    
                                                                    $allowed_image_extension = array(
                                                                                                        "png",
                                                                                                        "jpg",
                                                                                                        "jpeg"
                                                                                                    );
                                                                    $target_dir = "uploads/";
                                                                    $file_extension = pathinfo($_FILES["uploadfile"]["name"], PATHINFO_EXTENSION);
                                                                    $filename = $_FILES["uploadfile"]["name"];
                                                                    $tempname = $_FILES["uploadfile"]["tmp_name"];
                                                                    $folder = $target_dir . $filename;
                                                                    if (!in_array($file_extension, $allowed_image_extension)) {
                                                                        echo "<script>alert('Upload valid images. Only PNG and JPEG are allowed.')</script>";
                                                                    } else {
    																	move_uploaded_file($tempname, $folder);
    																	
    																	$s="INSERT into company_master(Company_Name, Address, Contact, Email, Website, Registration_No, GST_No, Logo) 
    															            VALUES ('$company_name', '$address', '$contact', '$email', '$website', '$registration', '$gst', '$filename');";
                                                                    }
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Company Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'company_master.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'company_master.php';">Close</button></div>
																			</div>
																		</div>
																		<?php } } ?> 
																		
															<?php if(isset($_POST['update'])) {
																	
																	include 'connection.php';
																	$id = $_POST['company_master_id'];
																	$company_name = $_POST['company_name'];
																	$address = $_POST['address'];
																	$contact = $_POST['contact'];
																	$email = $_POST['email'];
																	$website = $_POST['website'];
																	$registration = $_POST['registration'];
																	$gst = $_POST['gst'];
																	
																	$sql_img = "SELECT * FROM company_master WHERE company_master_id='$id';";
                                                                	$result_img = $conn->query($sql_img);
                                                                	$row_img = $result_img -> fetch_assoc();
                                                                    
                                                                    if($_FILES['uploadfile']['name'] == "") {
                                                                        $filename = $row_img['Logo'];
                                                                    } else {
                                                                        $allowed_image_extension = array(
                                                                                                            "png",
                                                                                                            "jpg",
                                                                                                            "jpeg"
                                                                                                        );
                                                                        $target_dir = "uploads/";
                                                                        $file_extension = pathinfo($_FILES["uploadfile"]["name"], PATHINFO_EXTENSION);
                                                                        $filename = $_FILES["uploadfile"]["name"];
                                                                        $tempname = $_FILES["uploadfile"]["tmp_name"];
                                                                        $folder = $target_dir . $filename;
                                                                        if (! in_array($file_extension, $allowed_image_extension)) {
                                                                            echo "<script>alert('Upload valid images. Only PNG and JPEG are allowed.')</script>";
                                                                        } else {
                                                                            $filename = $filename;
        																	move_uploaded_file($tempname, $folder);
                                                                        }
                                                                    }
                                                                    $sql = "UPDATE `company_master` SET `Company_Name`='$company_name',`Address`='$address',`Contact`='$contact',`Email`='$email',`Website`='$website',`Registration_No`='$registration',
    																	`GST_No`='$gst',`Logo`='$filename' WHERE company_master_id='$id';";
																	
																	if ($conn->query($sql) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">Company Updated Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'company_master.php';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'company_master.php';">Close</button></div>
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
    			<script>
                var loadFile = function(event) {
                	var image = document.getElementById('preview');
                	image.src = URL.createObjectURL(event.target.files[0]);
                };
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