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
			<h5 class="panel-title badge badge-info">Course List</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 87%" href="<?php echo base_url('dashboard_admin/assign_course') ?>" class="btn btn-primary"><span>Assign New Course</span></a>

			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Session</th>
						<th>Course no</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($assign_course_list){
	                	$Serial=0;
	                	foreach ($assign_course_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->session?></td>
    						<td><?=$row->course_no ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_assign_course/'.$row->course_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_assign_course/'.$row->course_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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








