<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Course Teacher List</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_assign_teacher/'.$assign_teacher_list->class_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Session</label>
                    <select class="form-control" name="session">
                        <option value="<?php echo $assign_teacher_list->session?> "><?php echo $assign_teacher_list->session?> </option>
                        <?php foreach ($session_list as $row) {?>
                            <option><?=$row->session; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Assign Teacher</label>
                    <select class="form-control" name="teacher_email">
                       <option value="<?php echo $assign_teacher_list->teacher_email;?>"><?php echo $assign_teacher_list->teacher_email;?> </option>
                        <?php foreach ($teacher_list as $row) {?>
                            <option><?=$row->teacher_email; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label >Course No</label>
                    <!-- <input type="text" class="form-control" value="<?php echo $assign_teacher_list->class_course ?>" name="class_course"  required=""> -->
                    <select class="form-control" name="class_course">
                       <option value="<?php echo $assign_teacher_list->class_course;?>"><?php echo $assign_teacher_list->class_course;?> </option>
                        <?php foreach ($session_course_list as $row) {?>
                            <option><?=$row->course_no; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Class Date</label>
                    <select class="form-control" name="class_date">
                        <option value="<?php echo $assign_teacher_list->class_date;?>"><?php echo $assign_teacher_list->class_date;?> </option>
                        <option>Saturday</option>
                        <option>Sunday</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Class Time</label>
                    <input type="time" class="form-control" value="<?php echo $assign_teacher_list->class_time;?>" name="class_time"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
