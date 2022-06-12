<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Submit Session</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/add_exam_routine2'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Session</label>
                    <select class="form-control" name="session">
                        <option>None..</option>
                        <?php foreach ($session_list as $row) {?>
                            <option><?=$row->session; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
