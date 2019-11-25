<div class="container">
      <div class="text-center mt-5">
          <h1 class="text-light">Book Byte</h1>
          <!-- <img src="img/logo.png" width="72" height="72" alt="Book Byte"> -->
      </div>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <!-- <form class="user"> -->
              <?php echo form_open('Login/handle_registration', array(
                        'class' => 'user',
                        'id' => 'registration_form',
                        )
                    ) 
              ?>
              <div class="response-container"></div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="fname" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="lname" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" name="dob" placeholder="Date of Birth">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                    <!-- <div id="username-response">
                     <span id="username-error" class="help-block"></span>
                    </div> -->
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="gender" class="form-control" style="border-radius: 10rem; font-size: 0.8rem;">
                            <option value="" selected>Gender</option>
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                        </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="phone" placeholder="Phone">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="repeat_password" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                      Create Account
                </button>
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url()?>login/forget_password">Forgot Password?</a>
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
