<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<div class="panel-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/save_meeting_member/'.$meeting_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="button" class="btn-info" id="toggle" value="Select All" onclick="toggle_check()">
                    <table>
                        <?php foreach ($teacher_list->result() as $row) {?>
                            <tr>
                            <?php $this->db->select("*");
                                  $this->db->from("meeting_member_list");
                                  $this->db->where('meeting_id',$meeting_id);
                                  $this->db->where('teacher_email',$row->teacher_email);
                                  $this->result = $this->db->get();
                            ?>
                                <td><input type="checkbox" <?php if($this->result->num_rows() > 0) echo "checked"; ?> name="id[]" value="<?=$row->teacher_email?>"></td>
                                <td><?php echo $row->teacher_email; ?></td>
                            </tr>
                        <?php } ?> 
                    </table>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
        </div>
</body>
</html>