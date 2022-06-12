
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	</style>
</head>
<body>	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<!-- <h5 class="panel-title">Profile List</h5> -->
			<h5 class="panel-title badge badge-info">Meeting List</h5>
			<br><br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Meeting Title</th>
						<th>Agenda List</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($meeting_list){
	                	$Serial=0;
	                	foreach ($meeting_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->meeting_title;?></td>
    						<?php
    						 $meeting_agenda = $this->db->where("meeting_id",$row->meeting_id)->get("meeting_agenda")->result(); 
    						 if($meeting_agenda){?>
    						
    						<td><?=$meeting_agenda->agenda_list;?></td>
    					<?php } 
 						else {?>
 							<td></td>
 						<?php } ?>
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