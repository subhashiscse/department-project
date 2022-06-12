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
			<h5 class="panel-title badge badge-info">Notice List</h5>
			<br><br>
			<?php echo $this->session->flashdata('msg'); ?>

			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
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
    						<?php if($row->notice_status==0) {?>
    						<td><b><?=$Serial?></b></td>
    						<td><b><?=$row->notice_subject?></b></td>
    						<td><b><?=$row->notice_description ?></b></td>
    						<td><b><?=$row->notice_sender ?></b></td>
    						<td><b><?=$row->notice_date ?></b></td>
    						<?php }
    						else { ?>
    						<td><?=$Serial?></td>
    						<td><?=$row->notice_subject?></td>
    						<td><?=$row->notice_description ?></td>
    						<td><?=$row->notice_sender ?></td>
    						<td><?=$row->notice_date ?></td>
    						<?php } ?>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard_teacher/mark_notice/'.$row->notice_id); ?>"><i class="icon-file-excel"></i>Mark as read</a></li>
    										<li><a href="<?php echo base_url('dashboard_teacher/unmark_notice/'.$row->notice_id); ?>"><i class="icon-file-excel"></i>Mark as unread</a></li>
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