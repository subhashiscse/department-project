<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Session</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('dashboard_admin/update_session/'.$session_list->session_id); ?>">
			<div class="col-md-8">
				<div class="form-group">
				    <label >Session Type</label>
				    <input type="text"  class="form-control" value="<?= $session_list->session; ?>" name="session" required="">
				</div>
				<button type="submit" class="btn btn-success">Update</button>
			</div>	
		</form>
	</div>
</div>


