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
                                    <h5 class="card-title col-md-6">Liste des utilisateurs</h5>
                                    <!-- <a href="<?php echo base_url("index.php/administration/Users/add") ?> "  style="color:#fff; margin-right: -10px;" class="btn mb-1 btn-dark float-right"><i class="nav-icon fas fa-plus"></i> Nouveau Utilisateur</a> -->
                                </div>
                                <div class="card-body">
                                    <div class="row">
					<div class="col-lg-12 table-responsive" style="padding-top: -12px;">

						 <?=$this->session->flashdata('message')?>
						<div id="message_succ"></div>
						<div id="message_update" class="text-center"></div>
						<div id="message_del"></div>
						<table id="mytable" class="table table-bordered table-striped">
							<thead style="color: black;">
								<tr>

									<th>#</th>
									<th>NOM</th>
									<th>PRENOM</th>
									<th>SEXE</th>
									<th>EMAIL</th>
									<th>PROFIL</th>
									<th>DEPARTEMENT</th>
									<th>SERVICE</th>
									<th>TELEPHONE</th>
									<th>STATUT</th>
									<th>OPTIONS</th>
								</tr>
							</thead>
						</table>
					</div>



				</main>


			</div>
		</div>
 </div>

                                </div>
                            </div>
                        </div>
                    </div>

<!--Fin modal d'enregistrement et modification d'un utilisateur -->

		<?php include VIEWPATH.'includes/scripts_js.php'; ?>

	</body>
	</html>
	<script type="text/javascript">
		var saves;
		$('#message').delay('slow').fadeOut(1000);
		$(document).ready(function(){
			liste();
		});

		function liste()       //liste des users
		{

			//$('#message_del').delay(3000).hide('slow')

			var row_count ="1000000";
			$("#mytable").DataTable({
				"destroy" : true,
				"processing":true,
				"serverSide":true,
				"oreder":[[ 1, 'asc' ]],
				"ajax":{
					url: "<?php echo base_url('administration/Users/listing/');?>",
					type:"POST",
					data : {   },
					beforeSend : function() {
					}
				},
				lengthMenu: [[10,50, 100, -1], [10,50, 100, "All"]],
				pageLength: 10,
				"columnDefs":[{
					"targets":[7],
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
	<script type="text/javascript">
		function ajouter(){                     //appel du modal d'ajout
					$('#myform')[0].reset();
			saves ='add';
			$('#add_type').modal('show');
			$('#exampleModalLabel').text('Enregistrement des Utilisateurs');
			$('#btnSave').text('Enregistrer');
			$('#MOTIF_div').prop('hidden', true);


		}
	</script>

	

<script type="text/javascript">
function get_histo(HISTO_USER_ID)
{
 $('#modal_historique').modal('show');

   $("#data_modal2").DataTable({
    "destroy" : true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url: "<?php echo base_url('administration/Users/get_histo/');?>",
      type:"POST",
      data : {HISTO_USER_ID:HISTO_USER_ID},

      beforeSend : function() {
      }
    },
    lengthMenu: [[10,50, 100, -1], [10,50, 100, "All"]],
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
      "sLengthMenu":     "Afficher MENU &eacute;l&eacute;ments",
      "sInfo":           "Affichage de l'&eacute;l&eacute;ment START &agrave; END sur TOTAL &eacute;l&eacute;ments",
      "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
      "sInfoFiltered":   "(filtr&eacute; de MAX &eacute;l&eacute;ments au total)",
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
