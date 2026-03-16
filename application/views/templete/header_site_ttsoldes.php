<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Celestin - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url()?>assets/img/logo.png" rel="icon">
  <link href="<?=base_url()?>assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TOUR Celestin
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/TOUR Celestin-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-portfolio">
  <?php

  $sousmenu = $this->uri->segment(3);


  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?=base_url()?>assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">TOUR Celestin</h1>
      </a>


      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <!-- <a href="<?=base_url('Language/index/english')?>" class="btn-get-started"><img class=" p-1 language-image d-flex align-items-center ms-2" src="<?=base_url()?>assets/img/EN.png"></a> -->
            <a href="<?=base_url('Language/index/french')?>"><img class=" p-1 language-image active d-flex align-items-center ms-2" src="<?=base_url()?>assets/img/FR.png"></a>
             <a href="<?=base_url('Language/index/english')?>"><img class=" p-1 language-image d-flex align-items-center ms-2" src="<?=base_url()?>assets/img/EN.png"></a>
          </div>
        <ul>
          <li><a href="<?=base_url('ihm/Home/index')?>" class="<?php if($sousmenu == 'index') echo 'active' ?>"><?=lang('menu_accueil')?></a></li>
          <li><a href="<?=base_url('ihm/Home/about')?>" class="<?php if($sousmenu == 'about') echo 'active' ?>"><?=lang('menu_service')?></a></li>
          <li><a href="<?=base_url('ihm/Home/service')?>" class="<?php if($sousmenu == 'service') echo 'active' ?>"><?=lang('menu_propos')?></a></li>
          <li><a href="<?=base_url('ihm/Home/tourisme')?>" class="<?php if($sousmenu == 'tourisme') echo 'active' ?>"><?=lang('menu_site')?></a></li>
          <li><a href="<?=base_url('ihm/Home/blogs')?>" class="<?php if($sousmenu == 'blogs') echo 'active' ?>"><?=lang('menu_publication')?></a></li>

         <!--  <li class="dropdown"><a href="#"><span>Partenaire</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Partenaire 1 </a></li>
              <li class="dropdown"><a href="#"><span>Hotel</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Hotel 1</a></li>
                  <li><a href="#">Hotel 2</a></li>
                  <li><a href="#">Hotel 3</a></li>
                </ul>
              </li>
              <li><a href="#">Partenaire 2</a></li>
              <li><a href="#">Partenaire 3</a></li>
              <li><a href="#">Partenaire 4</a></li>
            </ul>
          </li> -->
        
          <li><a href="<?=base_url('ihm/Home/contacts')?>">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
 