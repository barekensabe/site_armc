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
              Liste des services
            </h1>
          </div>
          
          <div class="row">
            <div class="col-xl-12 col-xxl-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <button type="button" style="float: right;" class="btn btn-success mb-3" onclick="new_etape()" title="Nouveau"><i class="nav-icon fas fa-plus"></i>NOUVEAU </button>
                  </div>
                  <?=  $this->session->flashdata('message');?>
                  </br>
                  <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover table-condensed" style="min-width: 100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>SERVICES</th>
                           <th>DEPARTEMENT</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

    </div>
  </div>
</body>
</html>
<?php include VIEWPATH . 'includes/scripts_js.php'; ?>

<script type="text/javascript">
  $(document).ready(function() {
        liste();
        
    });
   function liste() 
  {  

     $("#mytable").DataTable({
      "destroy" : true,
      "processing":true,
      "serverSide":true,
      "oreder":[[ 1, 'asc' ]],
      "ajax":{
        url: "<?php echo base_url('configuration/Proc_Services/listing/');?>", 
        type:"POST",
        data : {  },
        beforeSend : function() {
        }
      },
      lengthMenu: [[10,50, 100, -1], [10,50, 100, "All"]],
      pageLength: 10,
      "columnDefs":[{
        "targets":[3],
        "orderable":false
      }],
      dom: 'Bfrtlip',
      buttons: ['excel', 'pdf'],
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
<!-- Modal d'ajout et de modification -->

 <div class="modal fade" id="newEtapeModal" data-backdrop="static">
    <div class="modal-dialog modal-mg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"></h3>

        </div>

        <form id="newEtapeForm" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <input type="hidden" name="id" id="id">
 
              <div class="col-md-6" id="div_lieu_delivrance">
                  <label for="FName" style="font-weight: 900; color:#454545">Service</label>
                  <input type="text" name="DESC_SERVICE" id="DESC_SERVICE" class="form-control">
                  <font id="erDESC_SERVICE" color="red"></font>
              </div>
              <div class="col-md-6">
                  <label for="FName" style="font-weight: 900; color:#454545">Département</label>
                  <select required class="form-control" name="DAPARTEMENT_ID" id="DAPARTEMENT_ID">
                    <option value="">---Sélectionner---</option>
                    <?php
                     foreach ($departe as $key => $value) {
                         if (set_value('DAPARTEMENT_ID')==$value['DAPARTEMENT_ID']) {?>
                         <option value="<?=$value['DAPARTEMENT_ID']?>" selected><?=$value['DESC_DEPARTEMENT']?></option>   
                        <?php }else{
                        ?>
                      <option value="<?=$value['DAPARTEMENT_ID']?>"><?=$value['DESC_DEPARTEMENT']?></option>
                      <?php
                    }}?>
                  </select>
                  <font id="erDESC_DEPARTEMENT" color="red"></font>
              </div>
           
            </div>
             <!-- <div class="row">
 
              
           
            </div> -->


          </div>

             

          <div class="modal-footer">
              <button type="button" class="btn btn-dark" onclick="refresh()" data-dismiss="modal">Fermer</button>
              <button type="button" id="btnSave"  onclick="save_etape();" class="btn btn-success">Enregistrer</button>
          </div>

        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
     var save_method;
     function new_etape()
     {
        save_method = 'add';
        $('#newEtapeModal').modal('show');
        $('#newEtapeForm')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#btnSave').text('Enregistrer')
        $('.modal-title').text('Nouveau service');
    }

    function save_etape() {


        var DESC_SERVICE = $('#DESC_SERVICE').val();
        var DAPARTEMENT_ID = $('#DAPARTEMENT_ID').val();

        $('#erDESC_SERVICE').html('');
        $('#erDESC_DEPARTEMENT').html('');

        var statut = 2;

        if (DESC_SERVICE == '') {
            statut = 1;
            $('#erDESC_SERVICE').html('Le champ est obligatoire');
        }
        if (DAPARTEMENT_ID == '') {
            statut = 1;
            $('#erDESC_DEPARTEMENT').html('Le champ est obligatoire');
        }
        var url;

        if (statut == 2) {

          var form_data = new FormData($("#newEtapeForm")[0]);
         
          // console.log(file_data);


          if(save_method=='add') {
              url = "<?= base_url('configuration/Proc_Services/addAction/') ?>";
              $.ajax({
                url: url,
                type: 'POST',
                dataType:'JSON',
                data: form_data ,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data)

                               //alert(data)
                               Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Ajout avec succès !',
                                timer: 2000,
                            }).then(() => {
                             window.location.reload();
                            })
                            $("#newEtapeForm")[0].reset();

                        }
                    })
          } 
          else 
          {
              url = "<?= base_url('configuration/Proc_Services/update/') ?>";
             
              Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous souhaitez modifier cette étape !",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, modifier-le!',
                cancelButtonText: "Non",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType:'JSON',
                        data: form_data ,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                         Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: ' Modification avec succès !',
                            timer: 1500,
                        }).then(() => {
                            window.location.reload();
                        })
                        $("#newEtapeForm")[0].reset();

                    }
                })
                }
            })
        }

      }
    }

  </script>  

  <script type="text/javascript">

  function get_etape(id) {
    // alert(id)

    save_method = 'update';
    $('#newEtapeModal').modal('show');


    $('.modal-title').text('Modification d\'un service');

    $('.form-group').removeClass('has-error');

    $('#btnSave').text('Modifier')

    $('#newEtapeForm')[0].reset();
    $('.help-block').empty();

    $.ajax({
        url: "<?= base_url() ?>configuration/Proc_Services/getOne/" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {

            $('#id').val(id);
            // alert(id);die();
            $('#DESC_SERVICE').val(data.DESC_SERVICE);
            $('#DAPARTEMENT_ID').html(data.html_departe);

        },

        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Erreur : ' + textStatus);
        }
    });

}
</script>
<script type="text/javascript">
  function delete_etape(id) {
          
           Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous voulez supprimer ce service !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le !',
            cancelButtonText: "Non"
        }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  url: '<?= base_url() ?>configuration/Proc_Services/delete_Etape/'+ id,
                  type: 'POST',
                  success:function(data){
                     Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Supprimé avec succès !',
                        showCancelButton:false,
                        timer:2000,
                    }).then(()=>{
                        window.location.reload();
                    })
                }
            })
           }
       })  
    }
</script>

