<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Stuff</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_stuff/'.$stuff_list->stuff_id); ?>">
             <input type="hidden" value="<?php echo $stuff_list->stuff_image; ?>" name="stuff_image">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Full Name</label>
                    <input type="text"  class="form-control" value="<?=$stuff_list->stuff_name; ?>" name="stuff_name"  required="">
                </div>
                <div class="form-group">
                    <label >User Name</label>
                    <input type="text" class="form-control" value="<?=$stuff_list->stuff_username; ?>" name="stuff_username"  required="">
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email"  class="form-control" value="<?=$stuff_list->stuff_email; ?>" name="stuff_email" required>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="Password"  class="form-control" value="" name="stuff_pass"required>
                </div> 
                <div class="form-group">
                    <label >Phone No</label>
                    <input type="text"  class="form-control" value="<?=$stuff_list->stuff_phone; ?>" name=" stuff_phone">
                </div>
                <div class="form-group">
                    <img width="120" src="<?php echo base_url('assets/images/'.$stuff_list->stuff_image);?>" alt="<?php echo base_url('assets/images/1.jpg');?>"><br>
                    <?php if(isset($stuff_list->stuff_image)) {?>
                        <input type="file" class="form-control" value="<?=$stuff_list->stuff_image; ?>" name="stuff_image" >
                    <?php }else {?>
                    <input type="file" class="form-control" value="" name="stuff_image">
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
