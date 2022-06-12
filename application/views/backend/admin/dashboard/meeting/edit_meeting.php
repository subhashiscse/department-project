<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Add New Meeting</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/update_meeting/'.$meeting_list->meeting_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Meeting Type</label>
                    <select class="form-control" name="meeting_type">
                        <!-- <option><?php if($meeting_list->meeting_type=="PC") echo  "Planning Committee Meeting"; else echo "Acadamic Committee Meeting";?></option> -->
                        <option><?php if($meeting_list->meeting_type=="PC") echo  "PC"; else echo "AC";?></option>
                        <option value="AC">AC</option>
                        <option value="PC">PC</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Meeting Title</label>
                    <input type="text" class="form-control" value="<?php echo $meeting_list->meeting_title; ?>" name="meeting_title"  required="">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" value="<?php echo $meeting_list->meeting_date; ?>" name="meeting_date"  required="">
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" class="form-control" value="<?php echo $meeting_list->meeting_time; ?>" name="meeting_time"  required="">
                </div>
                
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
