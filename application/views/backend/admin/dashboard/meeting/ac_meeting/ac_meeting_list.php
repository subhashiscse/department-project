<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>  
     $(document).ready(function(){  
          $('#listing').DataTable();  
    });  
</script>
	<style>
	</style>
</head>
<body>	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<!-- <h5 class="panel-title">Profile List</h5> -->
			<h5 class="panel-title badge badge-info">Acadamic Meeting List</h5>
			<br><br>
			<!-- <?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 87%" href="<?php echo base_url('dashboard_admin/add_meeting') ?>" class="btn btn-primary"><span>Add New Meeting</span></a> -->

			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Meeting Type</th>
						<th>Meeting Title</th>
						<th>Meeting Date</th>
						<th>Meeting Time</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($meeting_list){
	                	$Serial=0;
	                	foreach ($meeting_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td>Academic Committee Meeting</td>
    						<td><?=$row->meeting_title?></td>
    						<td><?=$row->meeting_date ?></td>
    						<td><?=$row->meeting_time ?></td>
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