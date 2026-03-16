<html lang="en">
<head>
<?php include VIEWPATH . 'includes/header.php'; ?>
</head>
<!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script> -->

<link rel='stylesheet' href='<?= base_url('template/css') ?>/sweetalert2.min.css'>
<script src="<?= base_url('template/js') ?>/sweetalert2.all.min.js"></script>
<body>
<div class="wrapper">
<?php include VIEWPATH . 'includes/navybar_menu.php'; ?>
<div class="main">
<?php include VIEWPATH . 'includes/navybar_topbar.php'; ?>
<main class="content">
<div class="container-fluid">
<div class="header">
<h1 class="header-title">
Changement du Mot de passe
</h1>
</div>
<div class="row">
    <div class="card mt-4 ml-7 col-lg-9">
      <div class="mt-4">
    <?= $this->session->flashdata('message');?>
        
      </div>

      <div class="card-body">
         <form method="POST" action="<?=  base_url("index.php/Change_Password/Modifier_password")?>">
           <div class="form-group">
             <label for="">Ancien Mot De Passe</label>
             <input type="password" class="form-control" name="old_password" value="<?php echo set_value('old_password'); ?>">
             <?php echo form_error('old_password', '<div class="text-danger">', '</div>'); ?>
            </div>
           <div class="form-group">
             <label for="">Nouveau Mot De Passe</label>
             <input type="password" class="form-control" name="new_password" value="<?php echo set_value('new_password'); ?>">
             <?php echo form_error('new_password', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
             <label for="">Confirmer Mot De Passe</label>
             <input type="password" id="CONFIRMER_PASSWORD" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
             <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
          
            </div>
            <div class="float-right">
               <input type="submit" value="Modifier" class="btn btn-primary">
            </div>
         </form>
      </div>

    </div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>

<?php include VIEWPATH . 'includes/scripts_js.php'; ?>
</body>
</html>

<script>
        $('#message').delay('slow').fadeOut(3000);
        $('#CONFIRMER_PASSWORD').bind("cut copy paste",function(e) {
      e.preventDefault();
    });

</script>