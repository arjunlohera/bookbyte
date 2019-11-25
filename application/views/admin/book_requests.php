<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Books Approval</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users Books</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="books_table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr. no</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Original/Selling Price</th>
            <th>Upload Date-Time</th>
            <th>Purchased</th>
            <th>Purchased By (User ID)</th>
            <th>Purchased Date-Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($books as $book) { ?>
            <tr>
                <td></td>
                <td><?=$book->book_title?></td>
                <td><?=$book->author?></td>
                <td><?=$book->publisher?></td>
                <td><?=$book->original_price?>/<?=$book->selling_price?></td>
                <td><?=$book->uploaded_datetime?></td>
                <td>
                    <?php if($book->is_purchased == 1) { ?>
                      <span class="badge badge-success"> YES </span>
                    <?php } else {?>
                      <span class="badge badge-danger"> NO </span>
                    <?php } ?>
                </td>
                <td>
                    <?php if($book->is_purchased == 1) { 
                      echo $book->purchased_by_user_id;
                    } else {
                      echo '<span class="badge badge-warning"> NA </span>';
                    } ?>
                </td>
                <td>
                    <?php if($book->is_purchased == 1) { 
                      echo $book->purchased_datetime;
                    } else {
                      echo '<span class="badge badge-warning"> NA </span>';
                    } ?>
                </td>
                <td style="width: 15%;">
                <?php if($book->is_approved == 0) {?>
                    <button data-id="<?=$book->book_id?>" class="btn btn-sm btn-outline-success book_approve_btn"><i class="fas fa-thumbs-up"></i> Approve</button>
                <?php } else { ?>
                    <button data-id="<?=$book->book_id?>" class="btn btn-sm btn-outline-danger book_disable_btn"><i class="fas fa-ban"></i> Disable</button>
                <?php } ?>
                <?php if($book->is_deleted == 0) {?>
                  <button data-id="<?=$book->book_id?>" class="btn btn-sm btn-outline-danger book_delete_btn"><i class="fas fa-trash"></i> Delete</button>
                    
                <?php } else { ?>
                  <button data-id="<?=$book->book_id?>" class="btn btn-sm btn-outline-success book_recover_btn"><i class="fas fa-recycle"></i> Recover</button>
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