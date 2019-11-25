<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <meta name="description" content="<?=$description?>">
    <meta name="keywords" content="<?php foreach($keywords as $keyword) echo $keyword.', ';?>">
    <meta name="theme-color" content="#03a6f3">
    <title><?=$page_title;?></title>
    <!-- Loading css files -->
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/assets/img/logo/favicon.png" />
    <?php 
        foreach ($css as $c) { ?>
    <link rel="stylesheet" type="text/css" href="<?=$c?>">
    <?php } ?>
    <?php $this->load->view('layouts/framework-js') ?>
</head>

<body class="<?= $body_class; ?>" style="position: relative;">
    <?php if($show_header == true) {  ?>
    <header id="top">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="#" class="web-url"><?=base_url()?></a></div>
                    <div class="col-md-6">
                        <h5><span class="font-italic">[This web application is under development]</span><br /> Special
                            Discount for Students upto 30%</h5>
                    </div>
                    <div class="col-md-3">
                        <span class="ph-number">Call : +91 98-7654-3210</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand mb-0 h1" href="<?=base_url()?>">Book<span
                            style="color:#ff9700;">Byte</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item <?php if($this->uri->segment(2) == ''){ echo "active"; }?>">
                                <a href="<?=base_url('Site')?>" class="nav-link"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="navbar-item <?php if($this->uri->segment(2) == 'shop'){ echo "active"; }?>">
                                <a href="<?=base_url('Site/shop')?>" class="nav-link"><i
                                        class="fas fa-shopping-cart"></i> Shop</a>
                            </li>
                            <li class="navbar-item <?php if($this->uri->segment(2) == 'pdf'){ echo "active"; }?>">
                                <a href="<?=base_url('site/pdf')?>" class="nav-link"><i class="fas fa-file-pdf"></i>
                                    PDFs</a>
                            </li>
                            <li class="navbar-item <?php if($this->uri->segment(2) == 'ppt'){ echo "active"; }?>">
                                <a href="<?=base_url('site/ppt')?>" class="nav-link"><i
                                        class="fas fa-file-powerpoint"></i> PPTs</a>
                            </li>
                            <?php if($this->Auth->is_guest()) { ?>
                            <li class="navbar-item <?php if($this->uri->segment(2) == 'login'){ echo "active"; }?>">
                                <a href="<?=base_url('Login')?>" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                                    Login</a>
                            </li>
                            <?php } else { ?>
                            <li class="navbar-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userAccount" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i> Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userAccount">
                                    <a class="dropdown-item" href="<?=base_url('Login')?>"><i
                                            class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                        Dashboard</a>
                                    <a class="dropdown-item" href="<?=base_url('Login/logout/1')?>"><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i> Logout</a>
                                </div>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <?php }?>