<script type="text/javascript">
    function dateValidation(e){
        let startDate = document.getElementById('startDate').value;
        let endDate = document.getElementById('endDate').value;
        if(startDate && endDate && startDate>=endDate){
            console.log('Yes Present');
            let errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent  = "End Date is before than Start Date";
            errorMessage.style.color = "red"
        } else {
            console.log('Not Present');
            let errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent  = "";
        }
        let val = document.getElementById('errorMessage').value;
        console.log(val);
        console.log(startDate, endDate);
    }

</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Add New Book</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard_admin/saveAssignBook'); ?>">
            <div class="col-md-8">
                <input type="hidden" name="BookId" value="<?= $assignBookInformation->BookId; ?>">
                <input type="hidden" name="IsReturnBook" value="false">
                <div class="form-group">
                    <label >Book Name</label>
                    <input type="text"  class="form-control" value="<?= $assignBookInformation->BookName; ?>" name="BookName" readonly required="">
                </div>
                <div class="form-group">
                    <label >Book Writer Name</label>
                    <input type="text"  class="form-control" value="<?= $assignBookInformation->BookWriterName; ?>" name="BookWriterName" readonly required="">
                </div>
                <div class="form-group">
                    <label >Number Of Total Copy</label>
                    <input type="number" class="form-control" value="<?= $assignBookInformation->NumberOfTotalCopy; ?>" name="NumberOfTotalCopy" readonly  required="">
                </div>
                <div class="form-group">
                    <label >Number Of Remaining Copy</label>
                    <input type="number" class="form-control" value="<?= $assignBookInformation->NumberOfRemainingCopy; ?>" name="NumberOfRemainingCopy" readonly  required="">
                </div>
                <div class="form-group">
                    <label >Student Id</label>
                    <input type="text" class="form-control" value="" name="StudentId"   required="">
                </div>
                <div class="form-group">
                    <label >Student Name</label>
                    <input type="text" class="form-control" value="" name="StudentName" required="">
                </div>
                <div class="form-group">
                    <label >Issue Date</label>
                    <input id= "startDate" type="date" class="form-control" value="" name="BookIssueDate" required="" onchange="dateValidation(event);">
                </div>
                <div class="form-group">
                    <label >Return Date</label>
                    <input  id= "endDate" type="date" class="form-control" min="startDate" value="" name="BookReturnDate" required="" onchange="dateValidation(event);">
                </div>
                <p id="errorMessage"></p>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>    
        </form>
    </div>
</div>
