<?php

	$d_id=$_POST['d_id'];

include 'connection.php';

	$output = "";

	$sql_display="SELECT * FROM opd_doctor_appointment_master WHERE Doctor_Id='$d_id';";

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
								<th> Days </th>
								<th> Morning </th>
								<th> Evening </th>
								
								<th> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row=$res->fetch_assoc())
								{ 
									$num++;
									
									?>
									<tr id= "tr_<?php echo $row['Days'];?>" class="todo-list todo-list-custom">
										<td ><?php echo $num; ?></td>
										<td ><?php echo $row['Days']; ?></td>
										<td ><?php echo $row['Morning_Time']; ?></td>
										<td ><?php echo $row['Evening_Time']; ?></td>
										
										<td ><button type='button' name='deldata' class='btn btn-danger btn-xs' style='padding:5px;'onclick="myDelFunction2('<?php echo $row['Days'];?>')"><i class='mdi mdi-trash-can' style='margin:0;font-size:15px;'></i></button></td>
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


