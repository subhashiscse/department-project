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
			<h5 class="panel-title badge badge-info">Book List</h5>
			<?php echo $this->session->flashdata('msg'); ?>
			<br>
		</div>
		<div class="panel-body">
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Book Name</th>
						<th>Book Writer Name</th>
						<th>Total Copy</th>
						<th>Remaining Copy</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($book_list){
	                	$Serial=0;
	                	foreach ($book_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->BookName ?></td>
    						<td><?=$row->BookWriterName ?></td>
    						<td><?=$row->NumberOfTotalCopy ?></td>
    						<td><?=$row->NumberOfRemainingCopy ?></td>
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