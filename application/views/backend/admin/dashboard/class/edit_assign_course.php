<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Course</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_assign_course/'.$assign_course_list->course_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Session</label>
                    <select class="form-control" name="session">
                        <option value="<?php echo $assign_course_list->session?> "><?php echo $assign_course_list->session?> </option>
                        <?php foreach ($session_list as $row) {?>
                            <option><?=$row->session; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label >Course No</label>
                    <input type="text" class="form-control" value="<?php echo $assign_course_list->course_no ?>" name="course_no"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
