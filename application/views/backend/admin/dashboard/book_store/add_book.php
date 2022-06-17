<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Add New Book</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/saveBook'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Book Name</label>
                    <input type="text"  class="form-control" value="" name="BookName"  required="">
                </div>
                <div class="form-group">
                    <label >Writer Name</label>
                    <input type="text" class="form-control" value="" name="BookWriterName"  required="">
                </div>
                
                <div class="form-group">
                    <label >Number Of Total Copy</label>
                    <input type="number" class="form-control" value="" name="NumberOfTotalCopy"  required="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
