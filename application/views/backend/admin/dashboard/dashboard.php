<script type="text/javascript">
</script>
<div class="panel panel-flat">
   <!--  <marquee>A scrolling text created with HTML Marquee element.</marquee> -->
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info" style="text-align: center;">Welcome <?php echo $user_info->user_name; ?></h5>
        <br><br>                   
    </div>
    <div class="panel-body">
        <div class="col-md-8">
            <div class="form-group">
                <label >Name</label>
                <input type="text"  class="form-control" value="<?=$user_info->user_name;?>" name="" readonly="">
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="text"  class="form-control" value="<?=$user_info->user_email;?>" name="" readonly="">
            </div>
            <div class="form-group">
                <label >Phone No</label>
                <input type="text"  class="form-control" value="<?=$user_info->user_phone;?>" name="" readonly="">
            </div>
            <label >Profile Image</label>
            <div class="form-group">
                <?php if($user_info->user_image) {?>
                <img width="120" src="<?php echo base_url('assets/images/'.$user_info->user_image);?>">
                <?php }
                else{?>
                <img width="120" src="<?php echo base_url('assets/images/person.JPG');?>">
                <?php }?>
            </div>
        </div> 
    </div>
</div>
