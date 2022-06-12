<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js">
    </script>
</head>
<body> 
    <script type="text/javascript">
        function toggle_check()
        {
            var checkboxes=document.getElementsByName('id[]');
            var btn=document.getElementById('toggle');
            if(btn.value=='Select All')
            {
                for(var i in checkboxes)
                {
                    checkboxes[i].checked='FALSE';
                }
                btn.value='Deselect All';
            }
            else 
            {
                for(var i in checkboxes)
                {
                    checkboxes[i].checked='';
                }
                btn.value='Select All';
            }

        }
    </script>
    <div class="panel panel-flat">
        <div class="panel-heading" style="margin: 2%;">
            <h5 class="panel-title badge badge-info">Send Notice</h5>
            <br>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
        <div class="panel-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_teacher/save_notice_admin'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Subject</label>
                    <input type="text" class="form-control" value="" name="notice_subject" placeholder="Enter the subject" required="">
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <textarea name="notice_description" id="notice_description" rows="10" cols="80">
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'notice_description' );
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