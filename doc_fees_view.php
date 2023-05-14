<?php
	$r_id=$_POST['docid'];
	include 'connection.php';
	$output = "";
	$sql_display="SELECT * FROM doctor_fees_master WHERE Doctor_Id='$r_id';";
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
								<th> Department </th>
								<th> Fees Type </th>
								<th> Fees </th>
								<th> Referral </th>
								
								<th> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row=$res->fetch_assoc())
								{ 
									$num++;
									
									?>
									<tr id= "tr_<?php echo $row['Fees_Type'];?>" class="todo-list todo-list-custom">
										<td ><?php echo $num; ?></td>
										<td ><?php echo $row['Department']; ?></td>
										<td ><?php echo $row['Fees_Type']; ?></td>
										<td ><?php echo $row['Fees']; ?></td>
										<td ><?php echo $row['Referral']; ?></td>
										
										<td ><button type='button' name='deldata' class='btn btn-danger btn-xs' style='padding:5px;'onclick="myDelFunction('<?php echo $row['Department'];?>','<?php echo $row['Fees_Type'];?>')"><i class='mdi mdi-trash-can' style='margin:0;font-size:15px;'></i></button></td>
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
		
	}
?>

