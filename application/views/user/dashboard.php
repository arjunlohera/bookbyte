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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total PDFs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_pdfs;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-pdf fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total PPTs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_ppts;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-powerpoint fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Books</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$total_books;?></div>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Purchased Books</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$purchased_books;?></div>
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
                  <h6 class="m-0 font-weight-bold text-primary">Books</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-sm" id="">
                      <thead>
                        <tr>
                          <th>Sr. no</th>
                          <th>Book Title</th>
                          <th>Author</th>
                          <th>Publisher</th>
                          <th>Original/Selling Price</th>
                          <th>Upload Date-Time</th>
                          <th>Purchased</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                    $x = 1;
                    foreach($books as $book) { ?>
                        <tr>
                          <td><?=$x++;?></td>
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
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
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
      <!-- End of Main Content -->

     
