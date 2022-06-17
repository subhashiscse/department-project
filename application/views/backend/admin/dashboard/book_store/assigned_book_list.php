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
			<h5 class="panel-title badge badge-info">Assigned Book List</h5>
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
						<th>Issue Date</th>
						<th>Return Date</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($assigned_book_list){
	                	$Serial=0;
	                	foreach ($assigned_book_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->BookName ?></td>
    						<td><?=$row->BookWriterName ?></td>
    						<td><?=$row->BookIssueDate ?></td>
    						<td><?=$row->IsReturnBook ?></td>
    						<td class="text-center">
    							<ul class="icons-list" >
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
											<li><a onclick="return confirm('Are you sure you want to Unasign this ?');" href="<?php echo base_url('dashboard_admin/unassignBook/'.$row->BookAssignId ); ?>"><i class="icon-file-pdf"></i> Unassign Book</a></li>
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