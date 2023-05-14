<?php
	include 'connection.php';
	
if ($_SESSION['cus']['login'] == "true") {
    
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `state_master` WHERE `state_master_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='state_city.php?page=state'</script>";
}
if($_REQUEST['flag'] == "delete1")
{
  mysqli_query($conn, "DELETE FROM `city_master` WHERE `city_master_id` = '$_REQUEST[del_id1]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='state_city.php?page=city'</script>";
}
if($_REQUEST['flag'] == "delete2")
{
  mysqli_query($conn, "DELETE FROM `district_master` WHERE `district_master_id` = '$_REQUEST[del_id2]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='state_city.php?page=district'</script>";
}
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
                		padding-top: 72px;
                		padding-bottom: 72px ;
                		background:#fff;
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
									<h3 class="page-title">State/City Master</h3>
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="state_city.php">State/City Master</a></li>
											<li class="breadcrumb-item active" aria-current="page">Menu</li>
										</ol>
									</nav>
								</div>
								<div class="card records-card mt-2">
									<div class="card records-card mt-2">
										<div class="card-body">
										    <ul class="nav nav-tabs">
                                              <li class="nav-link" style="background:#e2e5ef;"><a href="state_city.php?page=state" class="text-black">State</a></li>
                                              <li class="nav-link" style="margin:0 10px;background:#e2e5ef;"><a href="state_city.php?page=city" class="text-black">City</a></li>
                                              <li class="nav-link" style="background:#e2e5ef;"><a href="state_city.php?page=district" class="text-black">District</a></li>
                                            </ul>
                                            <div style="padding:10px;">
                                                <?php if(($_REQUEST['page'] == "state") || ($_REQUEST['page'] == "")) { ?>
                                                <div id="home" class="tab-pane">
														<div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            													<?php if($_REQUEST['flag'] == "edit") {
            													$id = $_GET['id'];   
            													$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `state_master` WHERE state_master_id='$id'")); } else { } ?>
															    <?php if($row["state_master_id"]!='') { ?><input type="hidden" value="<?php echo $row["state_master_id"]; ?>" name="state_master_id"><?php } else { } ?>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-8">
																				<div class="form-group">
																					<label for="exampleInputPassword4">State Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" <?php if($row["state_master_id"]!='') { ?>value="<?php echo $row["State_Name"]; ?>"<?php } else { } ?> id="state_name" name="state_name" onblur="validateBLName(this);" placeholder="eg: State Name" required>
																				</div>
																			</div>
        																	<div class="col-md-4 mt-3">
            																	<?php if($row["state_master_id"]!='') { ?>
        																	    <input name="update" class="btn btn-primary mr-2" type="submit" value="Update" />
        																	    <?php } else { ?>
            																	<input name="adding" class="btn btn-primary mr-2" type="submit" value="Add" />
            																	<?php } ?>
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
														<div class="row" id="download_section">
															<div class="col-md-12">
																<div class="table-responsive table-sec mb-4 ">
																	<table class="table" id="table11">
																		<thead>
																			<tr>
																				<th>Sl No</th>
																				<th>State Name</th>
																				<th>Action</th> 
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $i=1;
																			    $sql="SELECT * FROM `state_master` ORDER BY state_master_id DESC";
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) { ?>
																					<tr>
																						<td><?php echo $i; ?></td>
																						<td><?php echo $row["State_Name"]; ?></td>
																						<td><a class="btn btn-success btn-xs" style="padding:2px;" href="state_city.php?page=state&id=<?php echo $row["state_master_id"]; ?>&flag=edit"><i class="mdi mdi-pencil" style="margin:0;font-size:15px;"></i></a> &nbsp; <a class="btn btn-danger btn-xs" style="padding:3px;" href="state_city.php?del_id=<?php echo $row["state_master_id"]; ?>&flag=delete"  onclick="return confirm('Are you sure to delete the record?')"><i class="fa fa-trash" style="margin:0;font-size:15px;"></i></a></td>
																					</tr>
																				<?php $i++; } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
                                              </div>
                                              <?php } else { } ?>
                                              <?php if($_REQUEST['page'] == "city") { ?>
                                              <div id="menu1" class="tab-pane">
                                                  <div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
															    <?php if($_REQUEST['flag'] == "edit1") {
                												$id1 = $_GET['id1'];   
                												$row1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `city_master` WHERE city_master_id='$id1'")); } ?>
                												<?php if($row1["city_master_id"]!='') { ?><input type="hidden" value="<?php echo $row1["city_master_id"]; ?>" name="city_master_id"><?php } else { } ?>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
                                                                                	<label for="exampleInputName1">State Name<span class="text-danger">*</span> </label>
                                                                                	<select class="form-control" name="state" id="state" required>
                                                                                	    <option value="">Select State</option>
            																			<?php $sql_state = "SELECT * FROM `state_master` ORDER BY state_master_id DESC";
            																				$result_state = $conn->query($sql_state);
            																				while($row_state = $result_state->fetch_assoc()) { ?>
                                                                                	    <option value="<?php echo $row_state["State_Id"]; ?>" <?php if($row_state["State_Id"]==$row1["State_Id"]) { echo "selected"; } else { } ?>><?php echo $row_state["State_Name"]; ?></option>
																				        <?php } ?>
                                                                                	</select>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">City Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" <?php if($row1["city_master_id"]!='') { ?> value="<?php echo $row1["City_Name"]; ?>" <?php } else { } ?> id="city_name" name="city_name" onblur="validateBLName(this);" placeholder="eg: City Name" required>
																				</div>
																			</div>
        																	<div class="col-md-4 mt-3">
            																	<?php if($row1["city_master_id"]!='') { ?>
        																	    <input name="update1" class="btn btn-primary mr-2" type="submit" value="Update" />
        																	    <?php } else { ?>
            																	<input name="adding1" class="btn btn-primary mr-2" type="submit" value="Add" />
            																	<?php } ?>
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
														<div class="row" id="download_section">
															<div class="col-md-12">
																<div class="table-responsive table-sec mb-4 ">
																	<table class="table" id="table11">
																		<thead>
																			<tr>
																				<th>Sl No</th>
																				<th>State Name</th>
																				<th>City Name</th>
																				<th>Action</th> 
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $i=1;
																			    $sql="SELECT * FROM `city_master` ORDER BY city_master_id DESC";
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) { ?>
																					<tr>
																						<td><?php echo $i; ?></td>
																						<td><?php $row_state_c = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `state_master` WHERE State_Id='".$row["State_Id"]."'")); echo $row_state_c["State_Name"]; ?></td>
																						<td><?php echo $row["City_Name"]; ?></td>
																						<td><a class="btn btn-success btn-xs" style="padding:2px;" href="state_city.php?page=city&id1=<?php echo $row["city_master_id"]; ?>&flag=edit1"><i class="mdi mdi-pencil" style="margin:0;font-size:15px;"></i></a> &nbsp; <a class="btn btn-danger btn-xs" style="padding:3px;" href="state_city.php?del_id1=<?php echo $row["city_master_id"]; ?>&flag=delete1"  onclick="return confirm('Are you sure to delete the record?')"><i class="fa fa-trash" style="margin:0;font-size:15px;"></i></a></td>
																					</tr>
																				<?php $i++; } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
                                              </div>
                                              <?php } else { } ?>
                                              <?php if($_REQUEST['page'] == "district") { ?>
                                              <div id="menu2" class="tab-pane">
                                                  <div class="col-15 grid-margin">
															<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
															    <?php if($_REQUEST['flag'] == "edit2") {
                												$id2 = $_GET['id2'];
                												$row1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `district_master` WHERE district_master_id='$id2'")); } ?>
                												<?php if($row1["district_master_id"]!='') { ?><input type="hidden" value="<?php echo $row1["district_master_id"]; ?>" name="district_master_id"><?php } else { } ?>
																<div class="card mt-2">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
                                                                                	<label for="exampleInputName1">City Name<span class="text-danger">*</span> </label>
                                                                                	<select class="form-control" name="city" id="city" required>
                                                                                	    <option value="">Select City</option>
            																			<?php $sql_city = "SELECT * FROM `city_master` ORDER BY city_master_id DESC";
            																				$result_city = $conn->query($sql_city);
            																				while($row_city = $result_city->fetch_assoc()) { ?>
                                                                                	    <option value="<?php echo $row_city["City_Id"]; ?>" <?php if($row1["City_Id"]!='') { if($row_city["City_Id"]==$row1["City_Id"]) { echo "selected"; } else { } } else { } ?>><?php echo $row_city["City_Name"]; ?></option>
																				        <?php } ?>
                                                                                	</select>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputPassword4">District Name:<span class="text-danger">*</span> </label>
																					<input type="text" class="form-control" <?php if($row1["district_master_id"]!='') { ?> value="<?php echo $row1["District_Name"]; ?>" <?php } else { } ?> id="district_name" name="district_name" onblur="validateBLName(this);" placeholder="eg: District Name" required>
																				</div>
																			</div>
        																	<div class="col-md-4 mt-3">
            																	<?php if($row1["district_master_id"]!='') { ?>
        																	    <input name="update2" class="btn btn-primary mr-2" type="submit" value="Update" />
        																	    <?php } else { ?>
            																	<input name="adding2" class="btn btn-primary mr-2" type="submit" value="Add" />
            																	<?php } ?>
        																		<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php';">Cancel</button>
        																	</div>
        																</div>
																	</div>
																</div>
															</form>
														</div>
														<div class="row" id="download_section">
															<div class="col-md-12">
																<div class="table-responsive table-sec mb-4 ">
																	<table class="table" id="table11">
																		<thead>
																			<tr>
																				<th>Sl No</th>
																				<th>City Name</th>
																				<th>District Name</th>
																				<th>Action</th> 
																			</tr>
																		</thead>
																		<tbody id="geeks">
																			<?php $i=1;
																			    $sql="SELECT * FROM `district_master` ORDER BY district_master_id DESC";
																				$result=$conn->query($sql);
																				while($row=$result->fetch_assoc()) { ?>
																					<tr>
																						<td><?php echo $i; ?></td>
																						<td><?php $row_state_city = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `city_master` WHERE City_Id='".$row["City_Id"]."'")); echo $row_state_city["City_Name"]; ?></td>
																						<td><?php echo $row["District_Name"]; ?></td>
																						<td><a class="btn btn-success btn-xs" style="padding:2px;" href="state_city.php?page=district&id2=<?php echo $row["district_master_id"]; ?>&flag=edit2"><i class="mdi mdi-pencil" style="margin:0;font-size:15px;"></i></a> &nbsp; <a class="btn btn-danger btn-xs" style="padding:3px;" href="state_city.php?del_id2=<?php echo $row["district_master_id"]; ?>&flag=delete2"  onclick="return confirm('Are you sure to delete the record?')"><i class="fa fa-trash" style="margin:0;font-size:15px;"></i></a></td>
																					</tr>
																				<?php $i++; } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
                                              </div>
                                              <?php } else { } ?>
                                            </div>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
							<?php include "footer.php";?>
                        </div>
                    </div>
                </div>


                                                                <?php if(isset($_POST['adding'])) {
																	include 'connection.php';
																	$state_name = $_POST['state_name'];
																	$sql_check = "SELECT * FROM `state_master` WHERE State_Name='$state_name'";
    																$row_check = $conn->query($sql_check); 
    																$sql2="SELECT * FROM `state_master` order by cast(SUBSTRING(`State_Id`, 3,length(`State_Id`)-2) as UNSIGNED) DESC LIMIT 1";
                                                                	$result2=$conn->query($sql2);
                                                                	$j=0;
                                                                	while($row=$result2->fetch_assoc())
                                                                	{
                                                                		$d_id = $row["State_Id"];
                                                                			$l=strlen($d_id);
                                                                			$st=substr($d_id, 0,2);
                                                                			$d=substr($d_id, 2,$l);
                                                                			$d=$d+1;
                                                                			$id=$st.$d;
                                                                			$j++;
                                                                	}
                                                                    if($j==0)
                                                                    {
                                                                    	$id='S001';
                                                                    }
    																if ($row_check->num_rows>0) {
    																    echo "<script>alert('State Name already present.')</script>"; 
    																} else {
																	$s="INSERT into state_master(State_Id, State_Name) VALUES ('$id', '$state_name');";
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">State Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=state';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=state';">Close</button></div>
																			</div>
																		</div>
															<?php } } } ?> 
																		
															<?php if(isset($_POST['update'])) {
																	include 'connection.php';
																	$state_name = $_POST['state_name'];
																	$state_master_id = $_POST['state_master_id'];
																	$sql = "UPDATE `state_master` SET
                                                                        `State_Name` = '".$state_name."'
                                                                        WHERE `state_master_id` = '".$state_master_id."'";
																	if ($conn->query($sql) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">State Updated Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=state';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=state';">Close</button></div>
																			</div>
																		</div>
															<?php } } ?> 

                                                            <?php if(isset($_POST['adding1'])) {
																	include 'connection.php';
																	$state = $_POST['state'];
																	$city_name = $_POST['city_name'];
																	$sql_check = "SELECT * FROM `city_master` WHERE City_Name='$city_name'";
    																$row_check = $conn->query($sql_check); 
    																$sql2="SELECT * FROM `city_master` order by cast(SUBSTRING(`City_Id`, 3,length(`City_Id`)-2) as UNSIGNED) DESC LIMIT 1";
                                                                	$result2=$conn->query($sql2);
                                                                	$j=0;
                                                                	while($row=$result2->fetch_assoc())
                                                                	{
                                                                		$d_id = $row["City_Id"];
                                                                			$l=strlen($d_id);
                                                                			$st=substr($d_id, 0,2);
                                                                			$d=substr($d_id, 2,$l);
                                                                			$d=$d+1;
                                                                			$id=$st.$d;
                                                                			$j++;
                                                                	}
                                                                    if($j==0)
                                                                    {
                                                                    	$id='C001';
                                                                    }
    																if ($row_check->num_rows>0) {
    																    echo "<script>alert('City Name already present.')</script>"; 
    																} else {
																	$s="INSERT into city_master(State_Id, City_Id, City_Name) VALUES ('$state', '$id', '$city_name');";
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">City Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=city';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=city';">Close</button></div>
																			</div>
																		</div>
															<?php } } } ?> 
																		
															<?php if(isset($_POST['update1'])) {
																	include 'connection.php';
																	$state = $_POST['state'];
																	$city_name = $_POST['city_name'];
																	$city_master_id = $_POST['city_master_id'];
																	$sql = "UPDATE `city_master` SET
                                                                        `State_Id` = '".$state."',
                                                                        `City_Name` = '".$city_name."'
                                                                        WHERE `city_master_id` = '".$city_master_id."'";
																	if ($conn->query($sql) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">City Updated Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=city';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=city';">Close</button></div>
																			</div>
																		</div>
															<?php } } ?> 

                                                            <?php if(isset($_POST['adding2'])) {
																	include 'connection.php';
																	$city =  $_POST['city'];
																	$district_name = $_POST['district_name'];
																	$sql_check = "SELECT * FROM `district_master` WHERE District_Name='$district_name'";
    																$row_check = $conn->query($sql_check); 
    																$sql2="SELECT * FROM `district_master` order by cast(SUBSTRING(`District_Id`, 2,length(`District_Id`)-1) as UNSIGNED) DESC LIMIT 1";
                                                                	$result2=$conn->query($sql2);
                                                                	$j=0;
                                                                	while($row=$result2->fetch_assoc())
                                                                	{
                                                                		$d_id = $row["District_Id"];
                                                                			$l=strlen($d_id);
                                                                			$st=substr($d_id, 0,1);
                                                                			$d=substr($d_id, 1,$l);
                                                                			$d=$d+1;
                                                                			$id=$st.$d;
                                                                			$j++;
                                                                	}
                                                                    if($j==0)
                                                                    {
                                                                    	$id='D001';
                                                                    }
    																if ($row_check->num_rows>0) {
    																    echo "<script>alert('District Name already present.')</script>"; 
    																} else {
																	$s="INSERT into district_master(City_Id, District_Id, District_Name) VALUES ('$city', '$id', '$district_name');";
																	if ($conn->query($s) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">District Added Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=district';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=district';">Close</button></div>
																			</div>
																		</div>
															<?php } } } ?> 
																		
															<?php if(isset($_POST['update2'])) {
																	include 'connection.php';
																	$city =  $_POST['city'];
																	$district_name = $_POST['district_name'];
																	$district_master_id = $_POST['district_master_id'];
																	$sql = "UPDATE `district_master` SET
                                                                        `City_Id` = '".$city."',
                                                                        `District_Name` = '".$district_name."'
                                                                        WHERE `district_master_id` = '".$district_master_id."'";
																	if ($conn->query($sql) === TRUE) { ?>
																		<div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; align-items: center; padding-left: 500px; background: rgba(0, 0, 0, 0.5); transition: all 0.4s;">
																			<div class="modalcontent">
																				<img src="success.png" alt="Success!" style="height: 100px; padding-left: 170px;">
																				<h3 style="color: #000; text-align: center;">Successful!</h3>
																				<h6 style="color: #000; text-align: center; padding-bottom: 20px; color: #636262; font-size: 13px;">District Updated Successfully.</h6>
																				<div class="dropdown-divider" style="border-top: 1px solid #b3b3b3;"></div>
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;">
																					<button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=district';">Close</button>
																					
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
																				<div style="display: flex; justify-content: space-evenly; padding-top: 13px; padding-bottom: 10px;"><button type="button" class="btn btn-primary mr-2" onclick="window.location.href = 'state_city.php?page=district';">Close</button></div>
																			</div>
																		</div>
															<?php } } ?> 

	
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
				<script>
                    function printContent (el)
                    {
                    	var restorepage = document.body.innerHTML;
                    	var printContent = document.getElementById(el).innerHTML;
                    	document.body.innerHTML = printContent;
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