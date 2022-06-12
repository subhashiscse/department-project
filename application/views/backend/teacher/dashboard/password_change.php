<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Update Password</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_teacher/update_password'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Old Password</label>
                    <input type="Password"  class="form-control" value="" name="old_pass"  required="">
                </div>
                <div class="form-group">
                    <label >New Password</label>
                    <input type="Password"  class="form-control" value="" name="new_pass"  required="">
                </div>
                <div class="form-group">
                    <label >Retype New Password</label>
                    <input type="Password"  class="form-control" value="" name="ret_new_pass"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
