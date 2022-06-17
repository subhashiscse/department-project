<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title badge badge-info">Edit Book</h5>
        <br><br>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo base_url('dashboard_admin/updateBook/'.$book_list->BookId); ?>">
			<div class="col-md-8">
                <input type="hidden" name="PreviousTotalCopy" value="<?= $book_list->PreviousTotalCopy; ?>">  
                <input type="hidden" name="NumberOfRemainingCopy" value="<?= $book_list->NumberOfRemainingCopy; ?>">  
				<div class="form-group">
				    <label>Book Name</label>
				    <input type="text"  class="form-control" value="<?= $book_list->BookName; ?>" name="BookName" required="">
				</div>
                <div class="form-group">
				    <label>Writer Name</label>
				    <input type="text"  class="form-control" value="<?= $book_list->BookWriterName; ?>" name="BookWriterName" required="">
				</div>
                <div class="form-group">
				    <label>Number Of Total Copy</label>
				    <input type="number"  class="form-control" min="<?= $book_list->NumberOfTotalCopy-$book_list->NumberOfRemainingCopy; ?>" value="<?= $book_list->NumberOfTotalCopy; ?>" name="NumberOfTotalCopy" required="">
				</div>
				<button type="submit" class="btn btn-success">Update</button>
			</div>	
		</form>
    </div>
</div>
