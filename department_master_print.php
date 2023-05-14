<?php

	
	include 'connection.php';
	//include 'number_to_words_indian_format.php';
	
	
	
	?>
	
	<div class="row">
		
		<div class="col-md-6">
			
			<p style="margin-bottom: 0.1px;color:#000;line-height:19px;"><b>Receipt Date:  </b> <?php $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') ); echo $date->format('Y-m-d');?></p>
			
			
		</div>
	</div>
	<div class="cs-table cs-style1" style="margin-top:20px;">
		<div class="cs-round_border" style="margin-top: 0; line-height: 1.5em;">
			<div class="cs-table_responsive" style="margin-top: 0; line-height: 1.5em;">
				<table style="width: 100%; caption-side: bottom; border-collapse: collapse; display: table; text-indent: intial; border-spacing: 2px; border-color: grey;font-size: 13px;">
					<thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
						<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Sl No</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Department Id</th>
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Department Name</th>
							
							<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="padding:5px 10px; line-height: 1.55em; text-align: left; color: #555 ">Active Status</th>
							
						</tr>
					</thead>
	
					<?php
					
					
						$sql="SELECT * FROM department_master ;";
						$result=$conn->query($sql);
						$num=0;
						if($result->num_rows>0)
						{

							while($row=$result->fetch_assoc())

							{
								$num++;

								?>
								
								<tbody style="display: table-row-group; vertical-align: middle; border-color: inherit;">
								  
									<tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
										<td class="cs-width_1" style="width: 5%; padding: 10px 20px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $num;?></td>
										<td class="cs-width_2" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo $row["Department_Id"];?></td>
										<td class="cs-width_4" style="padding:5px 10px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo$row["Department_Name"];?></td>
										<td class="cs-width_1" style="padding: 10px 25px; line-height: 1.55em; display: table-cell; vertical-align: inherit; border-top: 1px solid #eaeaea; color: #777777;"><?php echo$row["Is_Active"];?></td>
										
									</tr>
									
									
								</tbody>
								<?php
								

							}

						}
					
					?>
				</table>
			</div>
			
			
		</div>
	</div>