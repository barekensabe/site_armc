<?php $this->load->view('_layout_top'); ?>
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8">
        <div class="section-card">
            <div class="section-header">
                <h5>Modifier mon mot de passe</h5>
                <p class="text-muted mb-0">Renseignez votre mot de passe actuel puis définissez un nouveau mot de passe sécurisé.</p>
            </div>

            <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_errors('<div>', '</div>'); ?>
                </div>
            <?php endif; ?>

            <form method="post" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="current_password">Mot de passe actuel <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="new_password">Nouveau mot de passe <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" minlength="8" required>
                    <small class="text-muted">Minimum 8 caractères.</small>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="confirm_password">Confirmer le nouveau mot de passe <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                    <a href="<?= site_url('admin'); ?>" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('_layout_bottom'); ?>
