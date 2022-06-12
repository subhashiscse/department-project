<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Add Exam for <?php echo $session; ?></h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?> 
        <!-- <a style="margin-left: 90%" href="<?php echo base_url('dashboard_admin/add_session') ?>" class="btn btn-primary"><span>View Routine</span></a>  -->
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_exam'); ?>">
            <div class="col-md-8">
            	<input type="hidden" class="form-control" value="<?=$session;?>" name="session"  required="">
            	<div class="form-group">
                    <label>Course No</label>
                    <select class="form-control" name="exam_course">
                    	<option>None..</option>
                        <?php foreach ($course_list as $row) {?>
                            <option><?=$row->course_no; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" value="" name="exam_date"  required="">
                </div>
                <div class="form-group">
                    <label>Starting Time</label>
                    <input type="time" class="form-control" value="" name="exam_start_time"  required="">
                </div>
                <div class="form-group">
                    <label>Ending Time</label>
                    <input type="time" class="form-control" value="" name="exam_end_time"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
