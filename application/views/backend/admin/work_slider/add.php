

<script type="text/javascript">


</script>
<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Add New Slider</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>


	<div class="panel-body">
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_slider'); ?>">
		<div class="col-md-8">
			<div class="form-group" id="feature_bg">
			    <label>Upload Image</label>
			    <input type="file" class="form-control" name="slider_image">
			    <label>Max Size 1MB</label>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
			
	</div>

</form>

	</div>
</div>


