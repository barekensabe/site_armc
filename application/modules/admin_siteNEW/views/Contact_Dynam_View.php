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

      <?php include VIEWPATH . 'includes/navybar_topbar.php'; ?>

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
                  <h5 class="card-title col-md-6">Enregistrer une publication</h5>

                </div>
                <div class="card-body">
                  <form method="POST" action="<?php echo base_url("index.php/admin_site/Publication/insert"); ?>" enctype="multipart/form-data">
                   <div class="row mb-4">
                    <div class="col-md-6">
                     <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Titres (en Fra)</label>
                      <input type="text" class="form-control" name="TITRE_SITE" value="<?php echo set_value("TITRE_SITE") ?>" id="TITRE_SITE" required>


                    </div>
                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Titres (en ANG )</label>
                    <input type="text" class="form-control" name="TITRE_SITE_ENG" value="<?php echo set_value("TITRE_SITE_ENG") ?>" id="TITRE_SITE" required>


                  </div>
                </div>


                

                <div class="col-md-6">
                 <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Description (en Fra)</label>
                  <textarea class="form-control" id="DESC_SITE" name="DESC_SITE"></textarea>


                </div>
              </div>

              <div class="col-md-6">
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Description(en ANG )</label>
                <textarea class="form-control" id="DESC_SITE_ENG" name="DESC_SITE_ENG"></textarea>


              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="recipient-name" class="col-form-label">Image </label>
              <input accept='image/*' type="file" class="form-control" name="IMAGE_SITE" value="<?php echo set_value("IMAGE_SITE") ?>" required  id="IMAGE_SITE">

            </div>
          </div>

          <button style="color:#fff; margin-right: -10px;" class="col-md-6 btn mb-1 btn-dark float-right">Enregistrer</a>
          </button>
        </form>
      </div>

    </div>




  </main>

</div>

</div>


<!--Fin modal d'enregistrement et modification d'un utilisateur -->

<?php include VIEWPATH.'includes/scripts_js.php'; ?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
(function () {
  ['DESC_SITE', 'DESC_SITE_ENG', 'DESC_CHAMBRE', 'DESC_CHAMBRE_ENG'].forEach(function (fieldId) {
    var el = document.getElementById(fieldId);
    if (!el || el.dataset.editorReady === '1') {
      return;
    }
    ClassicEditor.create(el, {
      toolbar: ['heading', '|', 'bold', 'italic', 'underline', 'link', '|', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', '|', 'undo', 'redo']
    }).then(function () {
      el.dataset.editorReady = '1';
    }).catch(function (error) {
      console.error('CKEditor init error:', error);
    });
  });
})();
</script>

</body>
</html>







