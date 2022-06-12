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
						<th>Receiver</th>
                        <!-- <th>Sender</th> -->
						<th>Date</th>
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
                            <td><?=$row->user_email ?></td>
    						<!-- <td><?=$row->notice_sender ?></td> -->
    						<td><?=$row->notice_date ?></td>
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