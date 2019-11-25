<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Site Settings</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users Accounts</h6>
  </div>
  <div class="card-body">
  <?php echo form_open('admin/settings/update_aboutus',
                                array
                                (
                                'class' => 'form-horizontal form-bordered' ,
                                'id'    => 'aboutus'
                                )
                                ) ?>
                                <div class="error-placement"></div>

                                <div class="form-group">
                                    <!-- <label class="sbold control-label">Enter Home page text here</label> -->
                                    <div class="col-12">
                                        <h4 class="sbold">About us</h4>
                                        <textarea id="summernote" name="aboutus" required><?php echo (isset($about_us) ? $about_us: null); ?></textarea>
                                        <div class='clearfix' id='ius'></div>
                                    </div>
                                </div>
                                <!-- <div class="form-actions"> -->
                                    <div class="row">
                                        <div class="col-md-9">
                                        <button type="submit" class='btn btn-primary'><i class="fas fa-check"></i> Update</button>
                                        </div>
                                    </div>            
                                <!-- </div> -->
                            </form>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->