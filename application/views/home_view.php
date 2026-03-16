            <!doctype html>
            <html class="no-js" lang="zxx">

               <!-- <header> Blog Ara End -->
                    <?php include VIEWPATH . 'templete/header_site.php'; ?>
                <!-- </header> -->
                
                <main>

                     <!-- slider Area Start-->
        <div class="slider-area slider-height" style="background:url(<?=base_url()?>assets/img/hero/h1_hero.jpg); background-repeat: no-repeat; background-size: cover">


             <div class="slider-active">
                                <!-- Single Slider -->
                                ,<!-- ``,`CONTENU_FORMATION`,
            `ICON`,`DATE_DEBUT`,`DATE_INSERT`,ACTION,' -->

                            <?php foreach ($donne as $key => $donne) { ?>
                              
                           
                                <div class="single-slider">
                                    <div class="slider-cap-wrapper">
                                        <div class="hero__caption col-lg-6 order-2 order-md-1 text-center text-md-left">
                                            <p data-animation="fadeInLeft" data-delay=".2s"><?=$donne['DESCRIPTION']?></p>
                                            <h2 data-animation="fadeInLeft" data-delay=".5s"><?=$donne['CONTENU_FORMATION']?></h2> <br>
                                            <!-- Hero Btn -->
                                            <a href="<?=base_url("Inscription_Beneficiaire")?>" class="btn mybtn hero-btn" data-animation="fadeInLeft" data-delay=".8s"><?=$donne['ACTION']?></a>
                                        </div>
                                        <div class="hero__img col-lg-6 order-1 order-md-2d-block mx-auto mx-md-0">
                                            <img src="<?=$donne['ICON']?>" alt="">
                                        </div>
                                    </div>
                                </div>

                             <?php }  ?>

                              
                            </div>

            <!-- slider-footer Start -->
                            <div class="slider-footer section-bg d-none d-sm-block">
                                <div class="footer-wrapper shadow">
                                    <!-- single -->
                                    <div class="single-caption">
                                        <div class="single-img">
                                            <img src="<?=base_url()?>assets/img/directeur_paeej.png" alt="">
                                        </div>
                                    </div>
                                    <!-- single -->
                                    <div style="border-right: 1px solid white" class="single-caption">
                                        <div class="caption-icon">
                                            <i style="font-size:40px" class="fa fa-graduation-cap text-white"></i>
                                        </div>
                                        <div class="caption">
                                            <p>Renforcement des capacités</p>
                                            <p>des jeunes</p>
                                        </div>
                                    </div>
                                    <!-- single -->
                                    <div style="border-right: 1px solid white" class="single-caption">
                                        <div class="caption-icon">
                                            <i style="font-size:40px" class="fa fa-cogs text-white"></i>
                                        </div>
                                        <div class="caption">
                                            <p>Entreprenariat des jeunes</p>
                                         <!--    <p>Approvals</p> -->
                                        </div>
                                    </div>
                                    <!-- single -->
                                    <div class="single-caption">
                                        <div class="caption-icon">
                                           <i style="font-size:40px" class="fa fa-briefcase text-white"></i>
                                        </div>
                                        <div class="caption">
                                            <p>Employabilité des jeunes</p>
                                            <!-- <p>Approvals</p> -->
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- slider-footer End -->

        </div>
        <!-- slider Area End-->







                    <!-- Services Area Start -->
        <div class="services-area pt-150 pb-150" style="background:url(<?=base_url()?>assets/img/gallery/section_bg02.jpg); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>Formation professionnelle</span>
                                            <h2>Le programme de formation professionnelle comprend 4 cours.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">


                <?php if (!empty($formations)){ 
                
                 foreach ($formations as $key => $value) { ?>
                  
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-work"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html"><?=$value['TITRE_FORMATION']?></a></h5>
                                <p><?=$value['DESCRIPTION']?><br></p>
                            </div>
                        </div>
                    </div>

                <?php } } ?>


             <!--  -->

                 </div>
            </div>
        </div>
        <!-- Services Area End -->







                    <!-- Apply Area Start -->
                  <!--   <div class="apply-area pt-150 pb-150" style="background:url(<?=base_url()?>assets/img/gallery/section_bg03.jpg) no-repeat; background-size: cover; ">
                        <div class="container">
                            <div class="section-tittle text-center mb-80">
                                        <span class="text-white">Demande de financement</span>
                                        <h2 class="text-white">Remplir le formulaire de demande de financement.</h2>
                                    </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8 bg-light p-4 shadow">
                                    <div class="apply-wrapper"> -->
                                        <!-- Form -->
                                     <!--    <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                   <div class="single-form">
                                                        <label>* LOAN AMOUNT ($) </label>
                                                        <input type="text" name="" placeholder="Enter name">
                                                   </div>
                                                </div> -->
                                               <!-- Nice Select -->
                                          <!--       <div class="col-lg-6">
                                                   <div class="single-form">
                                                        <label>* PURPOSE OF LOAN </label>
                                                        <div class="select-option mb-10">
                                                            <select name="select" id="select1">
                                                                <option value="">Choose Categories</option>
                                                                <option value="">Category 1</option>
                                                                <option value="">Category 2</option>
                                                                <option value="">Category 3</option>
                                                            </select>
                                                        </div>
                                                   </div>
                                                </div> -->
                                                <!-- Radio -->
                                             <!--    <div class="col-lg-12">
                                                   <div class="single-form  d-flex">
                                                        <label>* Select Gender :</label> -->
                                                        <!--Radio Select -->
                                                     <!--   <div class="select-radio6">
                                                            <div class="radio">
                                                                <input id="radio" name="radio" type="radio" checked="">
                                                                <label for="radio-6" class="radio-label">Male</label>
                                                            </div>
                                                            <div class="radio">
                                                                <input id="radio" name="radio" type="radio">
                                                                <label for="radio-7" class="radio-label">Female</label>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </div> -->
                                                <!-- First Name -->
                                              <!--   <div class="col-lg-6">
                                                    <div class="single-form">
                                                         <label>* FIRST NAME</label>
                                                         <input type="text" name="" placeholder="Enter name">
                                                    </div>
                                                 </div> -->
                                                 <!-- Last Name -->
                                              <!--   <div class="col-lg-6">
                                                    <div class="single-form">
                                                         <label>* Last NAME</label>
                                                         <input type="text" name="" placeholder="Enter name">
                                                    </div>
                                                 </div> -->
                                                 <!-- Nice Select -->
                                               <!-- Nice Select -->
                                              <!--   <div class="col-lg-12">
                                                    <div class="single-form">
                                                        <label>* NUMBER OF DEPENDANTS</label>
                                                        <div class="select-option mb-10">
                                                            <select name="select" id="select1">
                                                                <option value="">Choose Option</option>
                                                                <option value="">Category 1</option>
                                                                <option value="">Category 2</option>
                                                                <option value="">Category 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- First Name -->
                                              <!--   <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* Email Adderess</label>
                                                        <input type="email" name="" placeholder="Enter email">
                                                    </div>
                                                </div> -->
                                                <!-- Last Name -->
                                              <!--   <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* Phone Number</label>
                                                        <input type="text" name="" placeholder="Enter Number">
                                                    </div>
                                                </div> -->
                                                <!-- Nice Select -->
                                               <!--  <div class="col-lg-12">
                                                    <div class="single-form">
                                                        <label>* MARITAL STATUS</label>
                                                        <div class="select-option mb-10">
                                                            <select name="select" id="select1">
                                                                <option value="">Choose Categories</option>
                                                                <option value="">Category 1</option>
                                                                <option value="">Category 2</option>
                                                                <option value="">Category 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- First Name -->
                                              <!--   <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* FIRST NAME</label>
                                                        <input type="text" name="" placeholder="Enter name">
                                                    </div>
                                                </div> -->
                                                <!-- TOWN/CITY-->
                                               <!--  <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* TOWN/CITY</label>
                                                        <input type="text" name="" placeholder="Enter city">
                                                    </div>
                                                </div> -->
                                                <!-- Street Address -->
                                               <!--  <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* STREET</label>
                                                        <input type="text" name="" placeholder="Enter Street Address">
                                                    </div>
                                                </div> -->
                                                <!-- HOUSE NAME/NUMBER -->
                                               <!--  <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* HOUSE NAME/NUMBER</label>
                                                        <input type="text" name="" placeholder="Enter House Name">
                                                    </div>
                                                </div> -->
                                                <!-- Nice Select -->
                                              <!--   <div class="col-lg-12">
                                                    <div class="single-form">
                                                        <label>* HOMEOWNER STATUS </label>
                                                        <div class="select-option mb-10">
                                                            <select name="select" id="select1">
                                                                <option value="">Enter Houseowner ststus</option>
                                                                <option value="">Category 1</option>
                                                                <option value="">Category 2</option>
                                                                <option value="">Category 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!--  EMPLOYMENT INDUSTRY -->
                                               <!--  <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* EMPLOYMENT INDUSTRY</label>
                                                        <input type="text" name="" placeholder="Enter INDUSTRY">
                                                    </div>
                                                </div> -->
                                                <!-- Last Name -->
                                              <!--   <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* EMPLOYER NAME</label>
                                                        <input type="text" name="" placeholder="Enter name">
                                                    </div>
                                                </div> -->
                                                <!--PHONE NUMBER -->
                                             <!--    <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* WORK PHONE NUMBER</label>
                                                        <input type="text" name="" placeholder="Phone Number">
                                                    </div>
                                                </div> -->
                                                <!--  MONTHLY INCOME -->
                                               <!--  <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <label>* MONTHLY INCOME ($)</label>
                                                        <input type="text" name="" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-form">
                                                        <p><span class="font-weight-bold">Date naissance:</span></p> 
                                                            <p style="margin-top: -20px">22-02-1980</p>
                                                        <p><span class="font-weight-bold">Pays d'origine du pere:</span> </p>
                                                            <p style="margin-top: -20px">Jean Ciza</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form> -->
                                        <!-- End From -->
                                        <!-- Form btn -->
                                     <!--    <a href="#" class="btn mybtn hero-btn mt-30">Envoyer la demande</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Apply Area End -->




                </main>
                
                 <!-- <footer> Blog Ara End -->
                    <?php include VIEWPATH . 'templete/footer_site.php'; ?>
                <!-- </footer> -->

                    
                </body>
            </html>