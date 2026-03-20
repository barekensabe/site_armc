<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion administration ARMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height:100vh;background:linear-gradient(135deg,#f7faf7,#eef5f0)!important;">
<?php $armc_flash = $this->session->flashdata('armc_flash'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <img src="<?= base_url('upload/cms/logo.png'); ?>" alt="ARMC" style="max-width:88px;max-height:88px;object-fit:contain;">
                        <h3 class="mt-3 mb-1">Connexion administration</h3>
                        <p class="text-muted mb-0">Accédez à l'espace de gestion ARMC</p>
                    </div>
                    <?php if (!empty($armc_flash['message'])): ?>
                        <?php $flash_type = (($armc_flash['type'] ?? 'error') === 'success') ? 'success' : 'danger'; ?>
                        <div class="alert alert-<?= $flash_type; ?> armc-flash-alert" data-autohide="5000" data-flash-id="<?= html_escape($armc_flash['id'] ?? uniqid('armc_flash_', TRUE)); ?>"><?= html_escape($armc_flash['message']); ?></div>
                    <?php endif; ?>
                    <form method="post" action="<?= site_url('admin/login'); ?>" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 btn-lg">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>document.addEventListener('DOMContentLoaded',function(){document.querySelectorAll('.armc-flash-alert').forEach(function(el){var id=el.getAttribute('data-flash-id');if(id&&sessionStorage.getItem('armc_dismissed_flash_'+id)==='1'){el.remove();return;}setTimeout(function(){if(id){sessionStorage.setItem('armc_dismissed_flash_'+id,'1');}el.remove();},5000);});window.addEventListener('pageshow',function(){document.querySelectorAll('.armc-flash-alert').forEach(function(el){var id=el.getAttribute('data-flash-id');if(id&&sessionStorage.getItem('armc_dismissed_flash_'+id)==='1'){el.remove();}});});});</script>
</body>
</html>
