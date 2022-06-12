<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	</style>
	<script>  
		$(document).ready(function(){  
			$('#listing').DataTable();  
		});  
	</script>
</head>
<body>	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title badge badge-info">Application List</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<br>
		</div>
		<div class="panel-body" style="width:100%;overflow:auto;">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Subject</th>
						<th>Description</th>
						<th>Sender</th>
						<th>Sender Email</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($application_list){
	                	$Serial=0;
	                	foreach ($application_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->application_subject?></td>
    						<td><?=$row->application_description?></td>
    						<td><?=$row->application_sender?></td>
    						<td><?=$row->application_sender_email?></td>
    						<td><?=$row->application_date?></td>
    						<td><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_student/delete_application/'.$row->application_id); ?>"><i class="glyphicon glyphicon-trash"icon-remove"></i> Delete</a></td>
    					</tr>
    				 <?php } 
	                }
	                else{
	                }
	                ?>			
				</tbody>
			</table>				
        </div>
    </div>
</body>
</html>