<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">PDFs Approval</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users PDFs</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="pdfs_table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr. no</th>
            <th>PDF Title</th>
            <th>Uploaded By</th>
            <th>Size</th>
            <th>Type</th>
            <th>Upload Date-Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            if(!$pdfs) {?>
            <tr><td colspan='6'><h5 class="text-muted text-center my-2">No PDF Found!</h5></td></tr>
            <?php }
            foreach($pdfs as $pdf) { ?>
            <tr>
                <td></td>
                <td><?=$pdf->file_name?></td>
                <td><?=$pdf->author?></td>
                <td><?=$pdf->file_size?></td>
                <td><?=$pdf->file_type?></td>
                <td><?=$pdf->upload_datetime?></td>
                <td style="width: 15%;">
                <?php if($pdf->is_approved == 0) {?>
                    <button data-id="<?=$pdf->pdf_id?>" class="btn btn-sm btn-outline-success pdf_approve_btn"><i class="fas fa-thumbs-up"></i> Approve</button>
                <?php } else { ?>
                    <button data-id="<?=$pdf->pdf_id?>" class="btn btn-sm btn-outline-danger pdf_disable_btn"><i class="fas fa-ban"></i> Disable</button>
                <?php } ?>
                <?php if($pdf->is_deleted == 0) {?>
                  <button data-id="<?=$pdf->pdf_id?>" class="btn btn-sm btn-outline-danger pdf_delete_btn"><i class="fas fa-trash"></i> Delete</button>
                    
                <?php } else { ?>
                  <button data-id="<?=$pdf->pdf_id?>" class="btn btn-sm btn-outline-success pdf_recover_btn"><i class="fas fa-recycle"></i> Recover</button>
                <?php } ?>
                </td>
            </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->