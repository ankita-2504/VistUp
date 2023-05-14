<?php
	$r_id=$_POST['r_id'];
	include 'connection.php';
	
	$output = "";
	$sql_display="SELECT * FROM opd_diagnostics_record WHERE Record_Id='$r_id';";
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
								<th > Sl.no </th>
								<th > Test name </th>
								<th > Type </th>
								
								<th> Delete </th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row=$res->fetch_assoc())
								{ 
									$num++;
									
									?>
									<tr id= "tr_<?php echo $row['Test_Name'];?>" class="todo-list todo-list-custom">
										<td ><?php echo $num; ?></td>
										<td ><?php echo $row['Test_Name']; ?></td>
										<td ><?php echo $row['Test_Type']; ?></td>
										
										<td ><button type='button' name='deldata' class='btn btn-danger btn-xs' style='padding:5px;'onclick="myDelFunction212('<?php echo $row['Test_Name'];?>')"><i class='mdi mdi-trash-can' style='margin:0;font-size:15px;'></i></button></td>
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