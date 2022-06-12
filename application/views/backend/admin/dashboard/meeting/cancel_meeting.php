<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Update Meeting Shedule</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo base_url('dashboard_admin/update_meeting_shedule/'.$meeting_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Meeting Title</label>
                    <input type="text" class="form-control" value="<?=$meeting_list->meeting_title ?>" name="meeting_title"  readonly="">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" value="<?=$meeting_list->meeting_date ?>" name="meeting_date"  required="">
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" class="form-control" value="<?=$meeting_list->meeting_time ?>" name="meeting_time"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
