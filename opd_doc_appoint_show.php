<?php
	$id=$_POST['id'];
	$conn = new mysqli('localhost', 'Ankita', '1234', 'eastmed');
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$output = "";
	$sql_display="SELECT name FROM doctor_master WHERE p_trfid='$trf';";
	$res=$conn->query($sql_display);		
	$num=0;
	$tot=0;
	if($res->num_rows>0)
	{?>
		<div class="row">
			<div class="table-responsive" style="margin-right: 40px; margin-left: 40px;">
				
					<table class="table" style="color: black;">
						<?php
						$output .= "
						<thead>
						   <tr>
								<th> Sl. No. </th>
								<th> Test Code </th>
								<th> Test Name </th>
								<th> Test Price </th>
								<th> Delete </th>
						   </tr>
						</thead>";
						while($row=$res->fetch_assoc())
						{ 
							$num++;
							$tot=$tot+$row['test_price'];
							$output .= "
							
							<tbody>
								<tr>
									
									<td> $num</td>
									<td>{$row['test_id']}</td>
									<td>{$row['test_name']}</td>
									<td>{$row['test_price']}</td>
									<td><input type='checkbox' class='delete-id' value='{$row['test_id']}'></td>
									
								</tr>
							</tbody>";
						}
						$output .="
					</table>";
					echo $output;
				?>
			</div>
		</div>
		<table style="margin-top: 20px;">
			<tbody>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td style="font-weight: bold; color: black; padding-left: 685px;">Total: </td>
				<td style="color: black; padding-left: 30px;"><?php echo $tot;?></td>
				</tr>
												
			</tbody>
		</table>
		<?php
	}
	else
	{
		echo "<h5>No record found</h5>";
	}
?>