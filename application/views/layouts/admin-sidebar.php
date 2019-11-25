<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin/Dashboard')?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3"><?=APP_NAME;?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?=base_url('admin/dashboard');?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Approve Requests
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/Requests/accounts')?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Accounts</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/Requests/books')?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Books</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/Requests/pdf')?>">
    <i class="fas fa-fw fa-file-pdf"></i>
    <span>PDFs</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/Requests/ppt')?>">
    <i class="fas fa-fw fa-file-powerpoint"></i>
    <span>PPTs</span></a>
</li>

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
  Settings
</div> -->

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/Settings/')?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Website</span></a>
</li> -->

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
  <a class="nav-link" href="tables.html">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span></a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->