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
			<h5 class="panel-title badge badge-info">Teacher List</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 87%" href="<?php echo base_url('dashboard_admin/add_teacher') ?>" class="btn btn-primary"><span>Add New Teacher</span></a>

			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Profile Image</th>
						<th>Email</th>
						<th>Phone No</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($teacher_list){
	                	$Serial=0;
	                	foreach ($teacher_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->teacher_name?></td>
    						<td><?=$row->teacher_designation ?></td>
    						<?php if($row->teacher_image){ ?>
    						<td><div class="media">
								<a href="#" class="media-left"><img style="width:50px;height:50px; border-radius: 15px;"src="<?php echo base_url('assets/images/'.$row->teacher_image) ?>" alt=""></a>
							</div></td>
							<?php } 
							else {?>
								<td><div class="media">
								<a href="#" class="media-left"><img style="width:50px;height:50px; border-radius: 15px;"src="<?php echo base_url('assets/images/person.JPG') ?>" alt=""></a>
							</div></td>
							<?php } ?>
    						<td><?=$row->teacher_email ?></td>
    						<td><?=$row->teacher_phone ?></td>
    						
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