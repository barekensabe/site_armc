<?php $this->load->view('_layout_top'); ?>
<div class="content-card mx-auto" style="max-width:760px;">
    <h2 class="mb-1">Modifier le mot de passe</h2>
    <p class="text-muted mb-4">Renseignez votre mot de passe actuel puis définissez un nouveau mot de passe sécurisé.</p>
    <form method="post" action="<?= site_url('admin/change_password'); ?>">
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="current_password">Mot de passe actuel</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="new_password">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="new_password" name="new_password" minlength="8" required>
                <small class="text-muted">Minimum 8 caractères.</small>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="confirm_password">Confirmer le nouveau mot de passe</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required>
            </div>
        </div>
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success"><i class="bi bi-shield-lock me-1"></i>Mettre à jour</button>
            <a href="<?= site_url('admin'); ?>" class="btn btn-secondary">Retour</a>
        </div>
    </form>
</div>
<?php $this->load->view('_layout_bottom'); ?>
