<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	</style>
</head>
<body>	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title badge badge-info">Notice List</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<!-- <a style="margin-left: 87%" href="<?php echo base_url('dashboard_admin/add_teacher') ?>" class="btn btn-primary"><span>Add New Teacher</span></a> -->

			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Subject</th>
						<th>Description</th>
						<th>Sender</th>
						<th>Date</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($notice_list){
	                	$Serial=0;
	                	foreach ($notice_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->notice_subject?></td>
    						<td><?=$row->notice_description ?></td>
    						<td><?=$row->notice_sender ?></td>
    						<td><?=$row->notice_date ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_teacher/'.$row->teacher_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_teacher/'.$row->teacher_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
    									</ul>
    								</li>
    							</ul>
    						</td>
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