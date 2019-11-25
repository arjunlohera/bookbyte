<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manage PPTS</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">My PPTs</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="ppts_table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr. no</th>
            <th>PPT Title</th>
            <th>Size</th>
            <th>Type</th>
            <th>Upload Date-Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            if(!$ppts) {?>
            <tr><td colspan='6'><h5 class="text-muted text-center my-2">No PPT Found!</h5></td></tr>
            <?php }
            foreach($ppts as $ppt) { ?>
            <tr>
                <td></td>
                <td><?=$ppt->file_name?></td>
                <td><?=$ppt->file_size?></td>
                <td><?=$ppt->file_type?></td>
                <td><?=$ppt->upload_datetime?></td>
                <td style="width: 15%;">
                <?php if($ppt->is_deleted == 0) {?>
                  <button data-id="<?=$ppt->ppt_id?>" class="btn btn-sm btn-outline-danger ppt_hide_btn"><i class="fas fa-eye-slash"></i> Hide</button>
                <?php } else { ?>
                  <button data-id="<?=$ppt->ppt_id?>" class="btn btn-sm btn-outline-success ppt_unhide_btn"><i class="fas fa-eye"></i> Unhide</button>
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