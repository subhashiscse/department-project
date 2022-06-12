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
			<h5 class="panel-title badge badge-info" style="margin-left: 35%;">Exam Routine for <?php echo $session; ?></h5>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 90%" href="<?php echo base_url('dashboard_admin/add_exam_routine') ?>" class="btn btn-primary"><span>Add Routine</span></a>
		</div>
		<div class="panel-body">
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Course no</th>
						<th>Exam Date</th>
						<th>Starting Time</th>
						<th>Ending Time</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($exam_list){
	                	$Serial=0;
	                	foreach ($exam_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->exam_course ?></td>
    						<td><?=$row->exam_date ?></td>
    						<td><?=$row->exam_start_time ?></td>
    						<td><?=$row->exam_end_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_exam/'.$row->exam_id); ?>"><i class="icon-file-excel"></i>Edit</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_exam/'.$row->exam_id); ?>"><i class="icon-file-pdf"></i>Delete</a></li>
    										
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