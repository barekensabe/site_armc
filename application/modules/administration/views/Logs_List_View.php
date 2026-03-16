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
            <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title col-md-6"><?= $title1 ?></h5>
                                    <a href="<?php echo base_url("index.php/administration/Users/index") ?> "style="color:#fff; margin-right: -10px;" class="btn mb-1 btn-dark float-right"><i class="nav-icon fas fa-list"></i> Liste</a>
                                </div>
                     <div class="row" >
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
   
					<div class="col-lg-12 table-responsive" style="padding-top: -12px;">
						<input type="hidden" name="segment" id="segment" value="<?=$segment?>">
						<table id="table_users" class="table table-bordered table-striped">
							<thead style="color: black;">
								<tr>

									<th>#</th>
                                    <th>ACTION</th>
                                    <th>DATE&nbsp&nbsp&nbsp</th>
                                    <th>IP</th>
                                    <th>SYSTEME</th>
                                    <th>NAVIGATEUR</th>
								</tr>
							</thead>
						</table>
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
		$(document).ready(function(){
			getListe();
		});

	</script>

	<script type="text/javascript">


  function getListe() { 

  	var segment = $('#segment').val();
   
   $("#table_users").DataTable({
    "destroy" : true,
    "processing":true,
    "serverSide":true,
    "oreder":[],
    "ajax":{
      url: "<?php echo base_url('administration/Users/getListe/');?>", 
      type:"POST",
      data : {segment:segment},
      beforeSend : function() {
      }
    },
    lengthMenu: [[10,50, 100, -1], [5,50, 100, "All"]],
    pageLength: 10,
    "columnDefs":[{
      "targets":[],
      "orderable":false
    }],
    dom: 'Bfrtlip',
    buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print'  ],
    language: {
      "sProcessing":     "Traitement en cours...",
      "sSearch":         "Rechercher&nbsp;:",
      "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
      "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
      "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
      "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
      "sInfoPostFix":    "",
      "sLoadingRecords": "Chargement en cours...",
      "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
      "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
      "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
      },
      "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
      }
    }
  });


 }
</script>
	
     






