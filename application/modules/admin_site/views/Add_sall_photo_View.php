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
 									<h5 class="card-title col-md-6">Ajout d'une chambre</h5>

 								</div>
 								<div class="card-body">
 									<form method="POST" action="<?= base_url('admin_site/Chambre/add')?>" enctype="multipart/form-data">
 										<div class="row g-4">
 									
 													<div class="col-md-6">
 														<input type="hidden" name="CHAMB_CATEGORIE_ID" id="CHAMB_CATEGORIE_ID" value="<?=$CHAMB_CATEGORIE_ID?>">
 														<label for="Responsable" class="form-label">Image<font color="#ff4945">*</font></label>
 															<input type="file" name="image" id="image" class="form-control" placeholder="...." id="Responsable" required>
 													
 													</div>
 													<div class="col-md-6">
 														<button type="submit"  class="btn btn-dark"> <i class=" fa fa-save"></i> &nbsp; Enregistrer  </button>
 													</div>
 												</div>


 											</form>
 											<!-- End of Form -->
 										</div>

 									</div>




 								</main>

 							</div>

 						</div>


 						<!--Fin modal d'enregistrement et modification d'un utilisateur -->

 						<?php include VIEWPATH.'includes/scripts_js.php'; ?>

 					</body>
 					</html>
