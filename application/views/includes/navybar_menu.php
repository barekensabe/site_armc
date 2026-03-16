<?php

  $menu = $this->uri->segment(1);
  $sousmenu = $this->uri->segment(2);
  // $utilisateur=$this->session->userdata('DEPART_PROFIL_ID');
  // $dat=$this->Model->getOne('users_profil_droits',array('DEPART_PROFIL_ID' =>$utilisateur ));

  $dat=array();
  if (empty($dat)) {
    $showIHM='no';
    $showSIG='no';
    $showCONFIGURATION='no';
    $showAPPLICATION='no';
    $showCRA='no';
    $showBI='no';
  }else{
    $showIHM=($dat['IHM'] ==1) ? 'yes':'no';
    $showSIG=($dat['SIG'] ==1) ? 'yes':'no';
    $showCONFIGURATION=($dat['CONFIGURATION'] ==1) ? 'yes':'no';
    $showAPPLICATION=($dat['APPLICATION'] ==1) ? 'yes':'no';
    $showCRA=($dat['CRA'] ==1) ? 'yes':'no';
    $showBI=($dat['BI'] ==1) ? 'yes':'no';
  }
  ?>

  <nav id="sidebar" class="sidebar">
    <a class="sidebar-brand text-center" href="#">
      <img width="150px" src="<?= base_url() ?>assets/img/logo.png">
    </a>
    <div class="sidebar-content">

      <div class="sidebar-user">
        <div class="font-weight-bold"><?= $this->session->userdata('POSTE') ?></div>
        <small>Admin</small>
        <hr>
      </div>

      <ul class="sidebar-nav">


       <!--DEBUT  MODULE ADMIN -->


       <li class="sidebar-item <?php if($menu == 'admin_site' ) echo 'active'  ?>">
        <a href="#admin" data-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle mr-2 fa fa-cogs"></i> <span class="align-middle">Paramètrage</span>
        </a>

        <ul id="Gutil" class="sidebar-dropdown list-unstyled collapse" data-parent="#appli">

          <li class="sidebar-item <?php if($sousmenu == 'Site_Touristique') echo 'active' ?>"><a class="sidebar-link  collapsed ml-4" href="<?= base_url() ?>admin_site/Site_Touristique">Site Touristique</a></li>

          <li class="sidebar-item <?php if($sousmenu == 'Publication') echo 'active' ?>"><a class="sidebar-link  collapsed ml-4" href="<?= base_url() ?>admin_site/Publication">Publications</a></li>

          <li class="sidebar-item <?php if($sousmenu == 'Publication') echo 'active' ?>"><a class="sidebar-link  collapsed ml-4" href="<?= base_url() ?>admin_site/Agents">Agents</a></li>
          
          <li class="sidebar-item <?php if($sousmenu == 'Publication') echo 'active' ?>"><a class="sidebar-link  collapsed ml-4" href="<?= base_url() ?>admin_site/Partenaire">Partenaire</a></li>

        </ul>
      </li>


        
      </ul>
    </div>
  </nav>
