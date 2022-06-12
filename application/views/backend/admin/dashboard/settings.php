<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Change Settings</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_settings/'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="<?=$user_info->user_name ?>" name="user_name"  readonly="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?=$user_info->user_email ?>" name="user_email"  readonly="">
                </div>
                <div class="form-group">
                    <label>Join Information</label>
                    <textarea name="meeting_join_info" id="meeting_join_info" rows="10" cols="80" value="<?$settings->meeting_join_info?>">
                        <?php echo $settings->meeting_join_info; ?>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'meeting_join_info' );
                    </script>
                </div>
                <div class="form-group">
                    <label>Cancel Information</label>
                    <textarea name="meeting_cancel_info" id="meeting_cancel_info" rows="10" cols="80" alue="<?$settings->meeting_cancel_info?>">
                        <?php echo $settings->meeting_cancel_info; ?>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'meeting_cancel_info' );
                    </script>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
