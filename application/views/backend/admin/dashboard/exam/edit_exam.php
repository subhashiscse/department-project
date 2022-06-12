<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Exam</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo base_url('dashboard_admin/update_exam/'.$exam_routine->exam_id); ?>">
            <div class="col-md-8">
                <input type="hidden" class="form-control" value="<?=$exam_routine->session;?>" name="session"  required="">
                <div class="form-group">
                    <label>Course No</label>
                    <select class="form-control" name="exam_course">
                        <option value="<?php echo $exam_routine->exam_course?> "><?php echo $exam_routine->exam_course?> </option>
                        <?php foreach ($course_list as $row) {?>
                            <option><?=$row->course_no; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" value="<?=$exam_routine->exam_date ?>" name="exam_date"  required="">
                </div>
                <div class="form-group">
                    <label>Starting Time</label>
                    <input type="time" class="form-control" value="<?=$exam_routine->exam_start_time ?>" name="exam_start_time"  required="">
                </div>
                <div class="form-group">
                    <label>Ending Time</label>
                    <input type="time" class="form-control" value="<?=$exam_routine->exam_end_time ?>" name="exam_end_time"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
