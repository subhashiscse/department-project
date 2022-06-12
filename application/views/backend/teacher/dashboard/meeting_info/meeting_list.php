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
			<?php echo $this->session->flashdata('msg'); ?>
			<br>
		</div>
		<div class="panel-body" style="width:100%">	
			<table id="listing" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th style="width: 10%">Serial</th>
						<th style="width: 10%">Meeting Type</th>
						<th style="width: 20%">Meeting Title</th>
						<th style="width: 10%">Meeting Date</th>
						<th style="width: 10%">Meeting Time</th>
						<th style="width: 20%">Meeting Member</th>
						<th>Meeting Agenda</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($meeting_info)
	                	{
	                		$Serial=0;
	                		foreach ($meeting_info as $row) {
	                			$Serial++;
	                			$meeting_info1=$this->db->where('meeting_id',$row->meeting_id)->get('meeting_list')->row();
	                			$meeting_agenda=$this->db->where('meeting_id',$row->meeting_id)->get('meeting_agenda')->row();
	                			$meeting_member_list=$this->db->where('meeting_id',$row->meeting_id)->get('meeting_member_list')->result();
	                			?>
	                		<tr>
	                		<td><?=$Serial?></td>
	                		<td><?=$meeting_info1->meeting_type?></td>
	                		<td><?=$meeting_info1->meeting_title?></td>
	                		<td><?=$meeting_info1->meeting_date?></td>
	                		<td><?=$meeting_info1->meeting_time?></td>
    						<td>
    							<?php foreach ($meeting_member_list as $row1) {
    								echo $row1->teacher_email."<br>";
    							} ?>
    						</td>
	                		<?php 
	                			if($meeting_agenda)
	                				{?>
	                				<td><?=$meeting_agenda->agenda_list?></td>
	                				<?php } 
	                			else {?>
	                			<td><??></td>
	                		<?php } ?>
	                		</tr>
	                	<?php  }
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