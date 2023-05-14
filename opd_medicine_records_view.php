<?php
	$r_id=$_POST['r_id'];
	include 'connection.php';
	$output = "";
	$sql_display="SELECT * FROM opd_pharmacy_record WHERE Record_Id='$r_id';";
	$res=$conn->query($sql_display);		
	$num=0;
	//$tot=0;
	if($res->num_rows>0)
	{?>
		<div class="row">
			<div class="col-md-12">
                <div class="table-responsive table-sec mb-4 ">
					<table class="table">
						<thead>
							<tr>
								<th> Sl.no </th>
								<th> Medicine </th>
								<th> Dosage </th>
								<th> Timing </th>
								<th> Description </th>
								<th> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row=$res->fetch_assoc())
								{ 
									$num++;
									
									?>
									<tr id= "tr_<?php echo $row['Medicine_Name'];?>" class="todo-list todo-list-custom">
										<td ><?php echo $num; ?></td>
										<td ><?php echo $row['Medicine_Name']; ?></td>
										<td ><?php echo $row['Dosage']; ?></td>
										<td ><?php echo $row['Timing']; ?></td>
										<td ><?php echo $row['Description']; ?></td>
										<td ><button type='button' name='deldata' class='btn btn-danger btn-xs' style='padding:5px;'onclick="myDelFunction('<?php echo $row['Medicine_Name'];?>')"><i class='mdi mdi-trash-can' style='margin:0;font-size:15px;'></i></button></td>
									</tr>
									
									<?php
								}
								
							?>
						</tbody>	
                    </table>
                </div>
			</div>
		</div>
		
		<?php
	}
	else
	{
		echo "<h5>No record found</h5>";
	}
?>

