<script type="text/javascript">
    function random()
    {
        var a=document.getElementById('class_course').value;
       // alert(a); 
    }
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Assign Teacher </h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_assign_teacher/'.$session); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Course No</label>
                    <select class="form-control" name="class_course" id="class_course" onchange="random()">
                        <option>None..</option>
                        <?php foreach ($course_list as $row) {?>
                            <option><?=$row->course_no; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Teacher Email</label>
                    <select class="form-control" name="teacher_email">
                        <option>None..</option>
                        <?php foreach ($teacher_list as $row) {?>
                            <option><?=$row->teacher_email; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="output">
                    
                </div>
                <div class="form-group">
                    <label >Class Date</label>
                    <select class="form-control" name="class_date">
                        <option>None..</option>
                        <option>Saturday</option>
                        <option>Sunday</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Class Time</label>
                    <input type="time" class="form-control" value="" name="class_time"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
