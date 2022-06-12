<?php $agenda_list=$this->db->where("meeting_id",$meeting_list->meeting_id)->get("meeting_agenda")->row();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js">
    </script>
</head>
<body> 
    <div class="panel panel-flat">
        <div class="panel-heading" style="margin: 2%;">
            <h5 class="panel-title badge badge-info">Add Acadamic Agenda</h5>
            <br><br>
            <?php echo $this->session->flashdata('msg'); ?>
            <br>
        </div>
        <div class="panel-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_ac_agenda/'.$meeting_list->meeting_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Meeting Title</label>
                    <input type="text" class="form-control" value="<?=$meeting_list->meeting_title; ?>" name="meeting_title" required="">
                </div>
                <div class="form-group">
                    <label >Meeting Agenda</label>
                    <textarea name="agenda_list" value="" rows="10" cols="80">
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'agenda_list' );
                    </script>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
        </div>
        <div class="panel-body" style="width:100%">                  
        </div>
    </div>
</body>
</html>