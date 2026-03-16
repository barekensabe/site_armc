<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url()?>templateslider/assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>templateslider/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>templateslider/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>templateslider/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>templateslider/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?=base_url()?>templateslider/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>templateslider/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="<?=base_url()?>templateslider/assets/css/variables.css" rel="stylesheet">
  <link href="<?=base_url()?>templateslider/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <?php
                if (!empty($sites)) {
            // code...
                  $i=0;
                  if ($this->session->userdata('site_lang')=='french') {

                   foreach ($sites as $key => $value) {
                     $i++;
                     ?>

                     <div class="swiper-slide">
                      <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('<?=base_url()?>uploads/image_site/<?=$value['IMAGE_SITE']?>');">
                        <div class="img-bg-inner">
                          <h2>Concentrez-vous sur ce qui compte</h2>
                          <p>Concentrez-vous davantage sur votre désir que sur votre doute, et le rêve prendra soin de lui-même.</p>
                        </div>
                      </a>
                    </div>

                          <?php

      }

   // Select *Champ en francais;
  }else if ($this->session->userdata('site_lang')=='english') {


   foreach ($sites as $key => $value) {
           $i++;
            ?>

                    <div class="swiper-slide">
                      <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('<?=base_url()?>uploads/image_site/<?=$value['IMAGE_SITE']?>');">
                        <div class="img-bg-inner">
                          <h2>Focus on what matters</h2>
                          <p>Focus more on your desire than on your doubt, and the dream will take care of itself.</p>
                        </div>
                      </a>
                    </div>

                            <?php

      }
    
    // Select *Champ en englais;
  }
       
    }
    ?>

                   
                  </div>
                  <div class="custom-swiper-button-next">
                    <span class="bi-chevron-right"></span>
                  </div>
                  <div class="custom-swiper-button-prev">
                    <span class="bi-chevron-left"></span>
                  </div>

                  <div class="swiper-pagination"></div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- End Hero Slider Section -->



      </main><!-- End #main -->



      <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="<?=base_url()?>templateslider/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?=base_url()?>templateslider/assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="<?=base_url()?>templateslider/assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="<?=base_url()?>templateslider/assets/vendor/aos/aos.js"></script>
      <script src="<?=base_url()?>templateslider/assets/vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="<?=base_url()?>templateslider/assets/js/main.js"></script>

    </body>

    </html>