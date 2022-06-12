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
            <br><br>
            <?php echo $this->session->flashdata('msg'); ?>
            <br>
        </div>
        <div class="panel-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_notice_stuff'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >To.....</label>
                    <br><br>
                    <input type="button" class="btn-info" id="toggle" value="Select All" onclick="toggle_check()">
                    <table>
                        <?php foreach ($stuff_list->result() as $row) {?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?=$row->stuff_email;?>"></td>
                                <td><?php echo $row->stuff_email; ?></td>
                            </tr>
                        <?php } ?> 
                    </table>
                </div>
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