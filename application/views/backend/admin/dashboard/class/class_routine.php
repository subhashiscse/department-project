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
			<!-- <h5 class="panel-title">Profile List</h5> -->
			<h5 class="panel-title badge badge-info" style="margin-left: 42%;" >Class Routine</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<h5 class="panel-title badge badge-success" style="margin-left: 40%;">SESSION: <?php echo $session;?></h5>
			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Course No</th>
						<th>Course Teacher</th>
						<th>Class Date</th>
						<th>Class Time</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($class_routine){
	                	$Serial=0;
	                	foreach ($class_routine->result() as $row) if($row->class_date=="Saturday") { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course;?></td>
    						<td><?=$row->teacher_email;?></td>
    						<td><?=$row->class_date ?></td>
    						<td><?=$row->class_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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
	                
	                <?php
	                if($class_routine){
	                	$Serial=0;
	                	foreach ($class_routine->result() as $row) if($row->class_date=="Sunday") { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course;?></td>
    						<td><?=$row->teacher_email;?></td>
    						<td><?=$row->class_date ?></td>
    						<td><?=$row->class_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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
	                <?php
	                if($class_routine){
	                	$Serial=0;
	                	foreach ($class_routine->result() as $row) if($row->class_date=="Monday") { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course;?></td>
    						<td><?=$row->teacher_email;?></td>
    						<td><?=$row->class_date ?></td>
    						<td><?=$row->class_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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
	                <?php
	                if($class_routine){
	                	$Serial=0;
	                	foreach ($class_routine->result() as $row) if($row->class_date=="Tuesday") { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course;?></td>
    						<td><?=$row->teacher_email;?></td>
    						<td><?=$row->class_date ?></td>
    						<td><?=$row->class_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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
	                <?php
	                if($class_routine){
	                	$Serial=0;
	                	foreach ($class_routine->result() as $row) if($row->class_date=="Wednesday") { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course;?></td>
    						<td><?=$row->teacher_email;?></td>
    						<td><?=$row->class_date ?></td>
    						<td><?=$row->class_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_assign_teacher/'.$row->class_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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