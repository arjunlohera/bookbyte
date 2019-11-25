<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('Site')?>" target="_blank">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3"><?=APP_NAME?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?=base_url('user/dashboard')?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
<i class="fas fa-fw fa-upload"></i>  Upload
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Upload')?>">
    <i class="fas fa-fw fa-book"></i>
    <span>Book</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Upload/pdf')?>">
    <i class="fas fa-fw fa-book"></i>
    <span>PDF</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Upload/ppt')?>">
    <i class="fas fa-fw fa-book"></i>
    <span>PPT</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  MY Contents
</div>

<!-- Nav Item - My Books -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Content/books')?>">
    <i class="fas fa-fw fa-book"></i>
    <span>My Books</span></a>
</li>

<!-- Nav Item - My PDFs -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Content/pdfs')?>">
    <i class="fas fa-fw fa-book"></i>
    <span>My PDFs</span></a>
</li>

<!-- Nav Item - My PPTs -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Content/ppts')?>">
    <i class="fas fa-fw fa-book"></i>
    <span>My PPTs</span></a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
  Account
</div>


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('user/Profile')?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Profile</span></a>
</li>

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
  <a class="nav-link" href="tables.html">
    <i class="fas fa-fw fa-table"></i>
    <span>Security</span></a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->