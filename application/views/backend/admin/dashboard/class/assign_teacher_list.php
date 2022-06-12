<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>  
	     $(document).ready(function(){  
	          $('#listing').DataTable();  
	    });  
	</script>
</head>
<body>	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<!-- <h5 class="panel-title">Profile List</h5> -->
			<h5 class="panel-title badge badge-info">Course Teacher List of <?php echo $session; ?></h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 87%" href="<?php echo base_url('dashboard_admin/assign_teacher1') ?>" class="btn btn-primary"><span>Assign New Teacher</span></a>

			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
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
	                if($session_class_list){
	                	$Serial=0;
	                	foreach ($session_class_list->result() as $row) 
	                	{ 
	                	$Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course;?></td>
    						<?php foreach($teacher_list->result() as $row1){
    							if($row1->teacher_email==$row->teacher_email){?>
    							<td><?=$row1->teacher_name;?></td>
    						<?php  }} ?>
    						
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