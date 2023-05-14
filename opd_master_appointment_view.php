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
					<table class="table table-striped">
						<thead>
							<tr>
								<th > Sl.no </th>
								<th > Days </th>
								<th > Morning </th>
								<th > Evening </th>
								<th> Delete </th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row=$res->fetch_assoc())
								{ 
									$num++;
									
									$output .= "
									<tr>
										
										<td> $num</td>
										<td>{$row['Days']}</td>
										<td>{$row['Morning_Time']}</td>
										<td>{$row['Evening_Time']}</td>
										<td><input type='checkbox' class='delete-id' value='{$row['Days']}'></td>
										
									</tr>";
								}
								echo $output;
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




                 
                   
                























