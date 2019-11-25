<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row align-items-center">
        <div class="col-lg-5 d-none d-lg-block text-center" style="font-size: 24px; color: gray;">
          <i class="fas fa-file-powerpoint fa-10x"></i>
        </div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-file-powerpoint"></i> Upload PPT</h1>
            </div>
            <!-- <form class="user"> -->
            
            <?php
            $attr = array(
              'id' => 'user_upload_ppt_form',
              'class' => '',
              // 'style' => 'width: 500px; margin-top: 50px;',
            );
            echo form_open_multipart('', $attr);
            ?>
            <div class="response-container"></div>
              <div class="form-group mb-5">
                <input type="text" class="form-control form-control-user" id="ppt_title" name="ppt_title" placeholder="PPT Title" required>
              </div>
              <div class="form-group">
                <input type="file" class="file" id="ppt_file" name="ppt_file" data-browse-on-zone-click="true" data-allowed-file-extensions='["ppt", "pptx"]' data-theme='fas' required>
              </div>
            <button type="submit" id="btn-upload" class="btn btn-primary btn-user btn-block">
              <i class="fas fa-upload"></i> Upload PPT
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
