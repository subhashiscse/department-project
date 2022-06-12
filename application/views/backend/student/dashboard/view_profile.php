<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Profile Information</h5>
        <br><br>                   
    </div>
    <div class="panel-body">
        <div class="col-md-8">
            <div class="form-group">
                <label >Name</label>
                <input type="text"  class="form-control" value="<?=$student_info->student_username;?>" name="" readonly="">
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="text"  class="form-control" value="<?=$student_info->student_email;?>" name="" readonly="">
            </div>
            <div class="form-group">
                <label >Phone No</label>
                <input type="text"  class="form-control" value="<?=$student_info->student_phone;?>" name="" readonly="">
            </div>
            <label >Profile Image</label>
            <div class="form-group">
                <?php if($student_info->student_image) {?>
                <img width="120" src="<?php echo base_url('assets/images/'.$student_info->student_image);?>">
                <?php }
                else{?>
                <img width="120" src="<?php echo base_url('assets/images/person.JPG');?>">
                <?php }?>
                <br>
            </div>
        </div> 
    </div>
</div>
