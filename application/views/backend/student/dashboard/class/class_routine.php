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
			<h5 class="panel-title badge badge-info">Class Routine List</h5>
			<br><br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Course No</th>
						<th>Class Date</th>
						<th>Class Time</th>
						<th>Course Teacher</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($routine_list){
	                	$Serial=0;
	                	foreach ($routine_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->class_course?></td>
    						<td><?=$row->class_date ?></td>
    						<td><?=$row->class_time ?></td>
    						<td><?=$row->teacher_email ?></td>
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