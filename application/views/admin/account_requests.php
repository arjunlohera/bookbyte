<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Account Approval</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users Accounts</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="users_table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr. no</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Registration Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <!-- <tfoot>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Registration Date</th>
            <th>Action</th>
          </tr>
        </tfoot> -->
        <tbody>
          <?php foreach($users as $user) { ?>
            <tr>
                <td></td>
                <td><?=$user->first_name?></td>
                <td><?=$user->last_name?></td>
                <td><?=$user->dob?></td>
                <td><?=$user->gender?></td>
                <td>
                    <i class="fas fa-phone"></i> <?=$user->phone?><br/>
                    <?php if(isset($user->alternate_phone)) { ?>
                        <i class="fas fa-phone"></i> <?=$user->alternate_phone?><br/>
                    <?php } ?>
                    <i class="fas fa-envelope"></i> <?=$user->email?>
                
                </td>
                <td><?=$user->registration_date?></td>
                <td>
                <?php if($user->status == 0) {?>
                    <button data-id="<?=$user->user_id?>" class="btn btn-sm btn-outline-success account_approve_btn"><i class="fas fa-thumbs-up"></i> Approve</button>
                <?php } else { ?>
                    <button data-id="<?=$user->user_id?>" class="btn btn-sm btn-outline-danger account_disable_btn"><i class="fas fa-ban"></i> Disable</button>
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