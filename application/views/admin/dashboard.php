<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="<?=base_url();?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-external-link-alt fa-sm text-white-50"></i> Goto BookByte Site</a>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_users;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Account Approvals</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$pending_approvals;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Book Approvals</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$pending_book_approvals;?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Books</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_books;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">User Accounts</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-sm" id="users_table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr. no</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Registration Date</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $x = 1;
          foreach($users as $user) { ?>
            <tr>
                <td><?=$x++;?></td>
                <td><?=$user->first_name?></td>
                <td><?=$user->last_name?></td>
                <td><?=$user->dob?></td>
                <td><?=$user->gender?></td>
                <td><?=$user->registration_date?></td>
            </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>
      </div>
    </div>
  </div>

  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Resources</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="adminPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
        <span class="mr-2">
          <i class="fas fa-circle text-primary"></i> PDFs
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-success"></i> PPTs
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-info"></i> Books
        </span>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


