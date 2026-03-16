<!DOCTYPE html>
<html lang="en">
<?php include VIEWPATH .'template_ep/header_ep.php'; ?>

<style>
  hr.vertival_line {
        border:         none;
        border-left:    1px solid hsla(200, 10%, 50%,100);
        height:         40vh;
        width:          1px; 
        margin-left:    100px;
    }
</style>
<body>



  <!-- Nnavbar Start -->
  <?php include VIEWPATH .'template_ep/menu_ep.php'; ?>
  <!-- Navbar End -->


    <!-- dashboard inner -->
<div class="midde_cont pb-5" ><!--  -->
  <div class="container-fluid">
    <?php include VIEWPATH .'template_ep/user_ep.php'; ?>
    <!-- row -->
    <div class="row mr-lg-5 ml-lg-5">
      <div class="col-md-9" style="margin-left: 150px;">
        <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
            <div class="heading1 margin_0">
              <h2><i class="fa fa-unlock"></i> Changement du mot de passe</h2>
            </div>
          </div>
          <div class="full price_table padding_infor_info">

            <div class="row">
                <!-- profile -->
              <?php include VIEWPATH .'template_ep/profile_ep.php'; ?>
              <!-- end profile-->
              <div class="col-lg-2"><hr class="vertival_line"></div>

              <div class="col-md-7">

                <?=$message; ?>
                
            <form class="form-horizontal" method="POST" action="<?=base_url('Change_Pwd/modifier') ?>">
              <div class="row">

                <div class="col-lg-9" style="margin-left:49px;">
                  <label style="font-weight: 900; color:#454545">E-mail</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" name="EMAIL" id="EMAIL">
                  </div>
                  <?php echo form_error('EMAIL', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9" style="margin-left:49px;">
                  <label style="font-weight: 900; color:#454545">Ancien mot de passe</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-unlock"></i></span>
                    <input type="password" class="form-control" name="OLD_PASSWD" id="OLD_PASSWD">
                  </div>
                  <?php echo form_error('OLD_PASSWD', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9" style="margin-left:49px;">
                  <label style="font-weight: 900; color:#454545">Nouveau mot de passe</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                    <input type="password" class="form-control" name="NEW_PASSWORD" id="NEW_PASSWORD">
                  </div>
                  <?php echo form_error('NEW_PASSWORD', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9" style="margin-left:49px;">
                  <label style="font-weight: 900; color:#454545">Confirmer le nouveau mot de passe</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="CONFIRMER_PASSWORD" id="CONFIRMER_PASSWORD">
                  </div>
                  <?php echo form_error('CONFIRMER_PASSWORD', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div><br><br>
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 text-center">
                  <button class="main_bt" type="submit">Changer</button>
                </div>
              </div><br>
            </form>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
    <!-- footer -->
    <?php include VIEWPATH .'template_ep/footer_ep.php'; ?>
  </div>
<!-- end dashboard inner -->
</div>


</body>

<script type="text/javascript">

    $('#message').delay(6000).hide('slow');


    $('#CONFIRMER_PASSWORD').bind("cut copy paste",function(e) {
      e.preventDefault();
    });

</script>

</html>

