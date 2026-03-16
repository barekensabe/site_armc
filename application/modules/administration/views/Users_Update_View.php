<!DOCTYPE html>
<html lang="en">

<head>
	<?php include VIEWPATH.'includes/header.php'; ?>

	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
</head>

<body>

	<div class="wrapper">

		<?php include VIEWPATH.'includes/navybar_menu.php'; ?>


		<div class="main">

			<?php include VIEWPATH.'includes/navybar_topbar.php'; ?>



			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<!-- <h1 class="header-title">
							Couverture Réseau des Ecoles - Accueil
						</h1> -->
						<!-- <p class="header-subtitle">Show all the important KPIs.</p> -->
						<!-- <a href="<?=base_url('ihm/partenaire/ajouter')?>" style="color:#153d77" class="btn mb-1 btn-primary float-right"><i class="nav-icon fas fa-plus"></i> Nouveau</a> -->
					</div>
					<div class="row" style="">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title col-md-6">Modification des utilisateurs</h5>
									<a href="<?php echo base_url("index.php/administration/Users/index") ?> "style="color:#fff; margin-right: -10px;" class="btn mb-1 btn-dark float-right"><i class="nav-icon fas fa-list"></i> Liste</a>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo base_url("index.php/administration/Users/update"); ?>">
										<div class="row mb-4">
											<input type="hidden" name="USER_ID" value="<?= $row['USER_ID'] ?>">
											<div class="col-md-6">
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Nom</label>
													<input type="text" class="form-control" value="<?= $row['USER_LNAME'] ?>" name="NOM">
													<?php echo form_error('NOM', '<div class="text-danger">', '</div>'); ?>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Prénom</label>
													<input type="text" class="form-control"  value="<?= $row['USER_FNAME'] ?>" name="PRENOM">
													<?php echo form_error('PRENOM', '<div class="text-danger">', '</div>'); ?>

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Téléphone</label>
													<input type="text" class="form-control"  value="<?= $row['TELEPHONE'] ?>" name="TELEPHONE" id="TELEPHONE">
													<?php echo form_error('TELEPHONE', '<div class="text-danger">', '</div>'); ?>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Email</label>
													<input type="email" class="form-control" value="<?= $row['EMAIL'] ?>" name="EMAIL" id="MAIL">
													<?php echo form_error('EMAIL', '<div class="text-danger">', '</div>'); ?>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Sexe</label>
													<select class="form-control select2" data-toggle="select2" name="SEXE_ID" id="SEXE_ID">
														<option value="">Selectionner</option>
														<?php
														$sexs=$this->Model->getRequete('SELECT `SEXE_ID`,`DESCR` FROM `sexe` WHERE 1');
														foreach ($sexs as $value) {
															if (condition) {
															# code...
																echo "<option value='".$value['SEXE_ID']."' selected>".$value['DESCR']."</option>";

															}else {
															# code...
																echo "<option value='".$value['SEXE_ID']."'>".$value['DESCR']."</option>";

															}
														}
														?>
													</select>
													<?php echo form_error('SEXE_ID', '<div class="text-danger">', '</div>'); ?>

												</div>
											</div>
												<div class="col-md-6">
                                <label for="FName" style="font-weight: 900; color:#454545">Profil</label>
                                <select required class="form-control" name="PROFIL_ID" id="PROFIL_ID" onchange="get_depart(this.value); get_depart_profil(this.value)" data-live-search="true" class="select2">
                                  <option value="">---Sélectionner---</option>
                                  <?php
                                  foreach ($profile as $key => $value)
                                  {
                                   if ($getservdep['PROFIL_ID'] == $value['PROFIL_ID']) {?>
                                     <option value="<?=$value['PROFIL_ID']?>" selected><?=$value['DESCRIPTION']?></option>   
                                     <?php }else{
                                      ?>
                                      <option value="<?=$value['PROFIL_ID']?>"><?=$value['DESCRIPTION']?></option>
                                      <?php
                                    }}?>
                                  </select>

                                  <!-- <font id="erprofil" color="red"></font> -->
                                </div>
											

													<div class="col-md-6">
                                  <label for="FName" style="font-weight: 900; color:#454545">Département</label>
                                  <select required class="form-control" name="DAPARTEMENT_ID" id="DAPARTEMENT_ID" onchange="showsev();get_service(this.value); get_depart_profil(this.value)">
                                    <option value="">Selectionner</option>
														<?php

														foreach ($departe as $value) {
															if ($value['DAPARTEMENT_ID'] == $getservdep['DEPARTEMENT_ID']) {
															# code...
																echo "<option value='".$value['DAPARTEMENT_ID']."' selected>".$value['DESC_DEPARTEMENT']."</option>";

															}else {
															# code...
																echo "<option value='".$value['DAPARTEMENT_ID']."'>".$value['DESC_DEPARTEMENT']."</option>";
															}
														}
														?>


                                  </select>

                                  <!-- <font id="erprofil" color="red"></font> -->
                                </div>
                                <div class="col-md-6" id="eruuuuprofil" style="display:block;">
                                  <label for="FName" style="font-weight: 900; color:#454545">Service</label>
                                  <select class="form-control" name="SERVICE_ID" id="SERVICE_ID" onclick="get_depart_profil(this.value)">
                                    <option value="">---Sélectionner---</option>
                                   	<?php

														foreach ($service as $value) {
															if ($value['SERVICE_ID'] == $getservdep['SERVICE_ID']) {
															# code...
																echo "<option value='".$value['SERVICE_ID']."' selected>".$value['DESC_SERVICE']."</option>";

															}else {
															# code...
																echo "<option value='".$value['SERVICE_ID']."'>".$value['DESC_SERVICE']."</option>";
															}
														}
														?>
                                  </select>

                                  <!-- <font id="< erprofil -" color="red"></font> -->
                                </div>
                                  <input type="hidden" value="<?= $row['DEPART_PROFIL_ID'] ?>" id="DEPART_PROFIL_ID" name="DEPART_PROFIL_ID">
									</div>

											</div>
											<div class="col-md-12">
												<label for="">Motif <span style="color:red">*</span></label>
												<textarea name="MOTIF" class="form-control"></textarea>
												<?php echo form_error('MOTIF', '<div class="text-danger">', '</div>'); ?>

											</div>
										</div>
										<button style="color:#fff; margin-right: -10px;" class="btn mb-1 btn-dark float-right">Modifier</a>

										</form>
									</div>

								</div>




							</main>

						</div>

					</div>


					<!--Fin modal d'enregistrement et modification d'un utilisateur -->

					<?php include VIEWPATH.'includes/scripts_js.php'; ?>

				</body>
				</html>
<script type="text/javascript">

function showsev()
          {
    //alert('test');
    var PROFIL_ID =$('#PROFIL_ID').val();
    var DAPARTEMENT_ID =$('#DAPARTEMENT_ID').val();
    //alert(PROFIL_ID);
    $.post('<?=base_url('administration/Users/showsev')?>',
    {
      PROFIL_ID:PROFIL_ID,
      DAPARTEMENT_ID:DAPARTEMENT_ID
    },
    function(data)
    {  
      console.log(data)
      if (data==1) {
        $('#eruuuuprofil').css('display','none');

      }else{
        $('#eruuuuprofil').css('display','block');

      }

    }

    )
    
  }
</script>

          <script type="text/javascript">

           function get_depart()
           {
            var PROFIL_ID =$('#PROFIL_ID').val();





            $.ajax(
            {
              type: "POST",
              url: '<?php echo base_url('administration/Users/get_depart/') ?>',
              dataType: 'JSON',
              data:{
                PROFIL_ID:PROFIL_ID
              },

              success: function(data){

          //alert(data.sev)
          $('#DAPARTEMENT_ID').html(data.html);
      // DEPARTEMENT_ID.InnerHtml=data;

      if (data.sev==1) {
        $('#eruuuuprofil').css('display','none');

      }else{
        $('#eruuuuprofil').css('display','block');

      }
    }
  });

          }
        </script>

<script type="text/javascript">

  function get_depart_profil()
  {
    //alert('test');
    var PROFIL_ID =$('#PROFIL_ID').val();
    var DAPARTEMENT_ID =$('#DAPARTEMENT_ID').val();
    var SERVICE_ID =$('#SERVICE_ID').val();

    //alert(PROFIL_ID);
    $.post('<?=base_url('administration/Users/get_depart_profil')?>',
    {
      PROFIL_ID:PROFIL_ID,
      DAPARTEMENT_ID:DAPARTEMENT_ID,
      SERVICE_ID:SERVICE_ID
    },
    function(data)
    {  
      $('#DEPART_PROFIL_ID').val(data);
      
    }

    )
    
  }

       function get_service()
          {
    //alert('test');
    var PROFIL_ID =$('#PROFIL_ID').val();
    var DAPARTEMENT_ID =$('#DAPARTEMENT_ID').val();
    //alert(PROFIL_ID);
    $.post('<?=base_url('administration/Users/get_service')?>',
    {
      PROFIL_ID:PROFIL_ID,
      DAPARTEMENT_ID:DAPARTEMENT_ID
    },
    function(data)
    {  
      console.log(data)
      $('#SERVICE_ID').html(data);
    //alert('ok')

    }

    )
    
  }
</script>
