<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Profile Information</h1>
            </div>
            <div class="response-container"></div>
            <table class="table">
              <tbody>
                <tr class="row">
                  <td class="col-md-6">First Name</td>
                  <td class="col-md-6 edit_fname text-info" id="first_name"><?=$user->first_name?></td>
                  <td class="col-md-6">Last Name</td>
                  <td class="col-md-6 edit_lname text-info" id="last_name"><?=$user->last_name?></td>
                  <td class="col-md-6">Date of Birth</td>
                  <td class="col-md-6"><?=$user->dob?></td>
                  <td class="col-md-6">Gender</td>
                  <td class="col-md-6"><?=$user->gender?></td>
                  <td class="col-md-6">Username</td>
                  <td class="col-md-6"><?=$user->username?></td>
                  <td class="col-md-6">Email</td>
                  <td class="col-md-6"><?=$user->email?></td>
                  <td class="col-md-6">Phone</td>
                  <td class="col-md-6"><?=$user->phone?></td>
                  <td class="col-md-6">Alternate Phone</td>
                  <td class="col-md-6 edit_phone text-info" id="alternate_phone"><?php if($user->alternate_phone == NULL) {?>
                    Not Available
                  <?php } else {
                   echo $user->alternate_phone;
                  }?>
                  </td>
                  <td class="col-md-6">Status</td>
                  <td class="col-md-6"><?php if($user->status == 1) {?>
                    <span class="badge badge-success p-2"> Approved </span>
                  <?php } else {?>
                    <span class="badge badge-danger p-2"> Not Approved </span>
                  <?php }?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
