 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        
      <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="text-center mt-5">
              <h1 class="text-light">Book Byte</h1>
              <!-- <img src="img/logo.png" width="72" height="72" alt="Book Byte"> -->
          </div>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <!-- <form class="user"> -->
                  <?php echo form_open('Login/submit_forget_password', array(
                        'class' => 'user',
                        'id' => 'forget_password_form',
                        )
                    ) 
                  ?>
                  <div class="response-container"></div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url()?>login/register">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url()?>login">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>