<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js">
    </script>
</head>
<body> 
    <script type="text/javascript">
    </script>
    <div class="panel panel-flat">
        <div class="panel-heading" style="margin: 2%;">
            <h5 class="panel-title badge badge-info">Send Application</h5>
            <br><br>
            <?php echo $this->session->flashdata('msg'); ?>
            <br>
        </div>
        <div class="panel-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_application'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >To.....</label>
                    <input type="text" class="form-control" value="" name="application_receiver_email" placeholder="Enter the Student's E-mail" required="">
                </div>
                <div class="form-group">
                    <label >Subject</label>
                    <input type="text" class="form-control" value="" name="application_subject" placeholder="Enter the subject" required="">
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <textarea name="application_description" id="notice_description" rows="10" cols="80">
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'application_description' );
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