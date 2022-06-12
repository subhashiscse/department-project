<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Teacher</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_teacher/'.$teacher_list->teacher_id); ?>">
             <input type="hidden" value="<?php echo $teacher_list->teacher_image; ?>" name="teacher_image">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Full Name</label>
                    <input type="text"  class="form-control" value="<?=$teacher_list->teacher_name; ?>" name="teacher_name"  required="">
                </div>
                <div class="form-group">
                    <label >User Name</label>
                    <input type="text" class="form-control" value="<?=$teacher_list->teacher_username; ?>" name="teacher_username"  required="">
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email"  class="form-control" value="<?=$teacher_list->teacher_email; ?>" name="teacher_email" required>
                </div>
                <div class="form-group">
                    <label >Designation</label>
                    <input type="text" class="form-control" value="<?=$teacher_list->teacher_designation; ?>" name="teacher_designation"  required="">
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="Password"  class="form-control" value="" name="teacher_pass"required>
                </div> 
                <div class="form-group">
                    <label >Phone No</label>
                    <input type="text"  class="form-control" value="<?=$teacher_list->teacher_phone; ?>" name=" teacher_phone">
                </div>
                <div class="form-group">
                    <img width="120" src="<?php echo base_url('assets/images/'.$teacher_list->teacher_image);?>" alt="<?php echo base_url('assets/images/person.jpg');?>"><br>
                    <!-- <label>Upload Image</label> -->
                    <?php if(isset($teacher_list->teacher_image)) {?>
                        <input type="file" class="form-control" value="<?=$teacher_list->teacher_image; ?>" name="teacher_image" >
                    <?php }else {?>
                    <input type="file" class="form-control" value="" name="teacher_image">
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
