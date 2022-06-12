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
	<div class="panel panel-flat" style="width:100%;overflow:auto;">
		<div class="panel-heading">
			<h5 class="panel-title badge badge-info">Exam Routine List</h5>
			<br><br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Course No</th>
						<th>Exam Date</th>
						<th>Exam Start Time</th>
						<th>Exam End Time</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($exam_routine_list){
	                	$Serial=0;
	                	foreach ($exam_routine_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->exam_course?></td>
    						<td><?=$row->exam_date ?></td>
    						<td><?=$row->exam_start_time ?></td>
    						<td><?=$row->exam_end_time ?></td>
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