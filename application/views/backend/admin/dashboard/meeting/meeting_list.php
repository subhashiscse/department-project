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
			<h5 class="panel-title badge badge-info">Meeting List</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 87%" href="<?php echo base_url('dashboard_admin/add_meeting') ?>" class="btn btn-primary"><span>Add New Meeting</span></a>

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
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($meeting_list){
	                	$Serial=0;
	                	foreach ($meeting_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<?php if($row->meeting_type=="AC") {?>
    						<td>Academic Committee Meeting</td>
    						<?php } else { ?>
    						<td>Planning Committee Meeting</td>
    						<?php } ?>
    						<td><?=$row->meeting_title?></td>
    						<td><?=$row->meeting_date ?></td>
    						<td><?=$row->meeting_time ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_admin/edit_meeting/'.$row->meeting_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    										<?php if($row->meeting_type==="PC"){ ?>
    										<li><a href="<?php echo base_url('dashboard_admin/add_meeting_member/'.$row->meeting_id); ?>"><i class="icon-edit"></i> Add Member</a></li>
    										<?php } ?>
    										<?php if($row->meeting_type==="PC"){ ?>
    										<li><a href="<?php echo base_url('dashboard_admin/add_pc_agenda/'.$row->meeting_id); ?>"><i class="icon-edit"></i> Add Agenda</a></li>
	    									<?php }else { ?>
	    										<li><a href="<?php echo base_url('dashboard_admin/add_ac_agenda/'.$row->meeting_id); ?>"><i class="icon-edit"></i> Add Agenda</a></li>
	    									<?php } ?>
    										<li><a href="<?php echo base_url('dashboard_admin/cancel_meeting/'.$row->meeting_id); ?>"><i class="icon-edit"></i>Cancel Meeting</a></li>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard_admin/delete_meeting/'.$row->meeting_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
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