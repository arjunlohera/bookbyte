<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Upload Book</h1>
            </div>
            <!-- <form class="user"> -->
            <?php echo form_open('user/Upload/handle_upload', array(
                        'class' => 'user',
                        'id' => 'user_upload_book_form',
                        )
                    ) 
              ?>
            <div class="response-container"></div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="book_title" placeholder="Book Title">
              </div>
              <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="author" placeholder="Author">
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" name="publisher" placeholder="Publisher">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="number" class="form-control form-control-user" name="original_price"
                  placeholder="Original Price">
              </div>
              <div class="col-sm-6">
                <input type="number" class="form-control form-control-user" name="selling_price"
                  placeholder="Selling Price">
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control rounded" id="book_description" name="book_description"  placeholder="Book Description goes here..." rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Upload Book
            </button>
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
