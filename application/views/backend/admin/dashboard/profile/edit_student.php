<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Student</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_student/'.$student_list->student_id); ?>">
             <input type="hidden" value="<?php echo $student_list->student_image; ?>" name="student_image">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Full Name</label>
                    <input type="text"  class="form-control" value="<?=$student_list->student_name; ?>" name="student_name"  required="">
                </div>
                <div class="form-group">
                    <label >User Name</label>
                    <input type="text" class="form-control" value="<?=$student_list->student_username; ?>" name="student_username"  required="">
                </div>
                <div class="form-group">
                    <label >Session</label>
                    <select class="form-control" name="student_session" >
                        <option><?php echo $student_list->student_session;?></option>
                        <?php foreach ($session_list as $row) {?>
                            <option><?=$row->session; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Roll</label>
                    <input type="text" class="form-control" value="<?=$student_list->student_roll;?>" name="student_roll"  required="">
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email"  class="form-control" value="<?=$student_list->student_email; ?>" name="student_email" required>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="Password"  class="form-control" value="" name="student_pass"required>
                </div> 
                <div class="form-group">
                    <label >Phone No</label>
                    <input type="text"  class="form-control" value="<?=$student_list->student_phone; ?>" name=" student_phone">
                </div>
                <div class="form-group">
                    <img width="120" src="<?php echo base_url('assets/images/'.$student_list->student_image);?>" alt="<?php echo base_url('assets/images/person.jpg');?>"><br>
                    <!-- <label>Upload Image</label> -->
                    <?php if(isset($student_list->student_image)) {?>
                        <input type="file" class="form-control" value="<?=$student_list->student_image; ?>" name="student_image" >
                    <?php }else {?>
                    <input type="file" class="form-control" value="" name="student_image">
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>     
        </form>
    </div>
</div>
