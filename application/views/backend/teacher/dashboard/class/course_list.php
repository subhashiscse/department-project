<script>  
    <script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js">
 $(document).ready(function(){  
      $('#listing').DataTable();  
});  
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <!-- <h5 class="panel-title">Profile List</h5> -->
        <h5 class="panel-title badge badge-info" style="margin-left: 42%;" >Course Routine</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>
        <h5 class="panel-title badge badge-success" style="margin-left: 40%;"></h5>
        <br>
    </div>
    <div class="panel-body" style="width:100%"> 
        <table id="listing" class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Session</th>
                    <th>Course No</th>
                    <!-- <th>Course Teacher</th> -->
                    <th>Class Date</th>
                    <th>Class Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($class_routine){
                    $Serial=0;
                    foreach ($class_routine->result() as $row) if($row->class_date=="Saturday") { $Serial++; ?>
                    <tr>
                        <td><?=$Serial?></td>
                        <td><?=$row->session;?></td>
                        <td><?=$row->class_course;?></td>
                        <!-- <td><?=$row->teacher_email;?></td> -->
                        <td><?=$row->class_date ?></td>
                        <td><?=$row->class_time ?></td>
                    </tr>
                 <?php } 
                }
                else{
                }
                ?>
                
                <?php
                if($class_routine){
                    $Serial=0;
                    foreach ($class_routine->result() as $row) if($row->class_date=="Sunday") { $Serial++; ?>
                    <tr>
                        <td><?=$Serial?></td>
                        <td><?=$row->session;?></td>
                        <td><?=$row->class_course;?></td>
                        <!-- <td><?=$row->teacher_email;?></td> -->
                        <td><?=$row->class_date ?></td>
                        <td><?=$row->class_time ?></td>
                    </tr>
                 <?php } 
                }
                else{
                }
                ?>  
                <?php
                if($class_routine){
                    $Serial=0;
                    foreach ($class_routine->result() as $row) if($row->class_date=="Monday") { $Serial++; ?>
                    <tr>
                        <td><?=$Serial?></td>
                        <td><?=$row->session;?></td>
                        <td><?=$row->class_course;?></td>
                        <!-- <td><?=$row->teacher_email;?></td> -->
                        <td><?=$row->class_date ?></td>
                        <td><?=$row->class_time ?></td>
                    </tr>
                 <?php } 
                }
                else{
                }
                ?>  
                <?php
                if($class_routine){
                    $Serial=0;
                    foreach ($class_routine->result() as $row) if($row->class_date=="Tuesday") { $Serial++; ?>
                    <tr>
                        <td><?=$Serial?></td>
                        <td><?=$row->session;?></td>
                        <td><?=$row->class_course;?></td>
                        <!-- <td><?=$row->teacher_email;?></td> -->
                        <td><?=$row->class_date ?></td>
                        <td><?=$row->class_time ?></td>
                    </tr>
                 <?php } 
                }
                else{
                }
                ?>  
                <?php
                if($class_routine){
                    $Serial=0;
                    foreach ($class_routine->result() as $row) if($row->class_date=="Wednesday") { $Serial++; ?>
                    <tr>
                        <td><?=$Serial?></td>
                        <td><?=$row->session;?></td>
                        <td><?=$row->class_course;?></td>
                        <!-- <td><?=$row->teacher_email;?></td> -->
                        <td><?=$row->class_date ?></td>
                        <td><?=$row->class_time ?></td>
                    </tr>
                 <?php } 
                }
                else{
                }
                ?>              
            </tbody>
        </table>                
    </div>
</div>