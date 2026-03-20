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

         </div>
         <div class="row" style="">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title col-md-6">Ajout d'une categorie de chambre</h5>

              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url("index.php/admin_site/Chambre_Categorie/insert"); ?>" enctype="multipart/form-data">
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
            <label for="recipient-name" class="col-form-label">Prix standard</label>
            <input type="Number" class="form-control" name="PRIX" value="<?php echo set_value("PRIX") ?>" id="PRIX" required>


          </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
          <label for="recipient-name" class="col-form-label">Prix pour deux</label>
          <input type="Number" class="form-control" name="PRIX2" value="<?php echo set_value("PRIX2") ?>" id="PRIX2" required>


        </div>
      </div>

      <div class="col-md-3">
       <div class="form-group">
        <label for="recipient-name" class="col-form-label">Nombre passager</label>
        <input type="Number" class="form-control" name="NBR" value="<?php echo set_value("NBR") ?>" id="NBR" required>


      </div>
    </div>
    <div class="col-md-6">
     <div class="form-group">
      <label for="recipient-name" class="col-form-label">EQUIPEEMENTS</label>
      <select class="form-control select2" multiple data-live-search="true"  id="CHAM_EQUIPEMENT_ID" name="CHAM_EQUIPEMENT_ID[]" required>
       <!-- <option selected value="">choose</option> -->
       <?php foreach ($equipment as $key) {

        if (in_array($key['CHAM_EQUIPEMENT_ID'], $CHAM_EQUIPEMENT_ID)) {

         ?>
         <option value="<?php echo $key['CHAM_EQUIPEMENT_ID'] ?>" selected><?php echo $key['DESCRIPTION'] ?></option>     
         <?php }else{ ?>
          <option value="<?php echo $key['CHAM_EQUIPEMENT_ID'] ?>"><?php echo $key['DESCRIPTION'] ?></option>
          <?php } } ?>
        </select> 
      </div>
    </div>
<div class="col-md-6">
       <div class="form-group">
        <label for="recipient-name" class="col-form-label">Nombre de chambres</label>
        <input type="Number" class="form-control" name="NBR_CHAMBRE" value="<?php echo set_value("NBR_CHAMBRE") ?>" id="NBR_CHAMBRE" required>


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







