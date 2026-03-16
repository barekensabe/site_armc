<!DOCTYPE html>
<html lang="en">

<head>
    <?php include VIEWPATH . 'includes/header.php'; ?>
</head>


<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<body>

    <div class="wrapper">

        <?php include VIEWPATH . 'includes/navybar_menu.php'; ?>


        <div class="main">

            <?php include VIEWPATH . 'includes/navybar_topbar.php'; ?>



            <main class="content">
                <div class="container-fluid">

                    <div class="header">
                        <h1 class="header-title">
                            Liste des sites touristiques
                        </h1>
                        

                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div style="box-shadow: rgba(100, 100, 111, 0.25) 0px 7px 29px 0px" class="card">
                                <div class="card-header">
                                    <a class="btn btn-dark float-right" href="<?=base_url('admin_site/Site_Touristique/')?>" ><i class="nav-icon fas fa-plus"></i> Nouveau</a>
                                </div>

                                <div class="card-body" style="overflow-x:auto;">
                                    <table id="reponse1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                             <!--  <th>#</th> -->
                                             <th>IMAGE</th>
                                             <th>TITRE</th>
                                             <th>DESCRIPTION</th>
                                             <th>OPTION</th>
                                         </tr>
                                     </thead>
                                     <tbody>

                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </main>



         </div>
     </div>
<?php include VIEWPATH . 'includes/scripts_js.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        liste();

    });
</script>



<script type="text/javascript">
    function liste() {
        $('#message').delay('slow').fadeOut(3000);
        $("#reponse1").DataTable({
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "oreder": [],
            "ajax": {
                url: "<?php echo base_url('admin_site/Site_Touristique/listing/'); ?>",
                type: "POST",
                data: {},
                beforeSend: function() {}
            },
            lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"]
            ],
            pageLength: 10,
            "columnDefs": [{
                "targets": [],
                "orderable": false
            }],
            dom: 'Bfrtlip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }
        });


    }
</script>
