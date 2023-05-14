<?php
	$id=$_POST['id'];
	include 'connection.php';
	
	$sql_display="SELECT Doctor_Name FROM doctor_master WHERE Doctor_Id='$id';";
	$res=$conn->query($sql_display);		
	$num=0;
	$tot=0;
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc())
		{
			$name=$row['Doctor_Name'];
			
			
		}
	}
	$sql_display1="SELECT Department FROM doctor_fees_master WHERE Doctor_Id='$id' ;";
	$result1=$conn->query($sql_display1);  
	//$num=1;
	if($result1->num_rows>0)
	{
		while($row=$result1->fetch_assoc())
		{
			$specialization=$row['Department'];
		}
	}
?>
<h3>Edit OPD Doctor Timings</h3>
<hr>

<h4>Doctor Information</h4>	
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Name </label>
			<input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name;?>" readonly>
			<input type="hidden" class="form-control" placeholder="Name" name="d_id" id="d_id" value="<?php echo $id;?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Department </label>
			<input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $specialization;?>" readonly>
			
		</div>
	</div>
</div>
<h4>Doctor Timings</h4>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="exampleInputEmail3"> Days :</label>
			<select name="days" id="days" class="form-control"  style="border: 1.5px solid #0091d5;">
				<option>Days</option>
				<option value="Sunday">Sunday</option>
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>	
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="exampleInputEmail3"> Morning :</label>
			<input type="text" class="form-control" name="morning" id="morning" placeholder="eg: hh-mm AM"/>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="exampleInputEmail3"> Evening :</label>
			<input type="text" class="form-control" name="evening" id="evening" placeholder="eg: hh-mm PM"/>
		</div>
	</div>
	<div class="col-md-3"></div>
	<div class="col-md-5 pt-4 mb-4" align="center">
		
		<button type="submit" id="showdata" class="btn btn-primary">Add</button>
		<button type="button" id="del" class="btn btn-primary">Delete</button>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	//data insertion
	$(document).ready(function()
	{
		$('#showdata').click(function(event)
		{
			
			event.preventDefault();
			var	days = $('#days').val();
			var	morning = $('#morning').val();
			var evening = $('#evening').val();
			var d_id = $('#d_id').val();
			
			$.ajax
			({
				type: "POST",
				url: "opd_master_appointment_add.php",
				data: {d_id:d_id,days:days,morning:morning,evening:evening},		    
				dataType: "json",
				success: function(result)
				{	
					if (result==1)
					{
					//alert("Test added successfully");
					loadData();
					function loadData()
					{
						//var p_trfid = $('#p_trfid').val();
						$.ajax
						({    
							type: "POST",
							url: "opd_master_appointment_view.php",
							data: {d_id:d_id},
							dataType: "html",                  
							success: function(data){                    
							$("#table-show").html(data); 
							}
						});
					}
				}
				else
				{
				  alert("Some thing went wrong try again");
				}
				
				}
			});
			
		});
		$("#del").click(function()
		{
			var id = [];
			var d_id = $('#d_id').val();
			$(".delete-id:checked").each(function()
			{
				id.push($(this).val());
				element = this;
			});
			  
			if (id.length > 0)
			{
				if (confirm("Are you sure want to delete this records")) 
				{
					$.ajax
					({
						url : "opd_master_appointment_delete.php",
						type: "POST",
						cache:false,
						data:{deleteId: id,d_id:d_id},
						success:function(response)
						{
						  if (response==1)
							{
								alert("Record delete successfully.Click OK to refresh");
								loadData();
								function loadData()
								{
									
									$.ajax
									({
										type: "POST",
										url: "opd_master_appointment_view.php",
										data: {d_id:d_id},
										dataType: "html",                  
										success: function(data){                    
										$("#table-show").html(data); 
										}
									});  
								}
							}
							else
							{
							  alert("Some thing went wrong try again");
							}
						}
					});
				}
			}
			else
			{
				alert("Please select atleast one checkbox");
			}
		});
	});
	//data display
	
</script>	

<script>
	loadData();
	function loadData()
	{
		var d_id = $('#d_id').val();
		$.ajax
		({    
			type: "POST",
			url: "opd_master_appointment_view.php",
			data: {d_id:d_id},
			dataType: "html",                  
			success: function(data){                    
			$("#table-show").html(data); 
			}
		});
	}
</script>	
<div id="table-show" style="padding-left: 2px; padding-right: 2px;"></div>	