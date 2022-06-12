<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Slider</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('dashboard_admin/update_slider/'.$work_slider->slider_id); ?>">
			<input type="hidden" value="<?php echo $work_slider->slider_image; ?>" name="slider_image">
		<div class="col-md-8">
			<div class="form-group">
                    <img width="120" src="<?php echo base_url('assets/images/'.$work_slider->slider_image);?>" alt=""><br>
                    <!-- <label>Upload Image</label> -->
                    <?php if(isset($work_slider->slider_image)) {?>
                        <input type="file" class="form-control" value="<?=$work_slider->slider_image; ?>" name="slider_image" >
                    <?php }else {?>
                    <input type="file" class="form-control" value="" name="slider_image">
                    <?php } ?>
                </div>
			<button type="submit" class="btn btn-success">Update</button>
		</div>
			
	</div>

</form>

	</div>
</div>


