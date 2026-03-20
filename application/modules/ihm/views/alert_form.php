<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2>Nous alerter</h2></div>
            <div class="publications-slide"><div class="publications-content">
                <?php if ($this->session->flashdata('success')): ?><div class="alert alert-success armc-flash-alert"><?= html_escape($this->session->flashdata('success')); ?></div><?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?><div class="alert alert-danger armc-flash-alert"><?= html_escape($this->session->flashdata('error')); ?></div><?php endif; ?>
                <form method="post" action="<?= site_url('nous-alerter/envoyer'); ?>" class="public-contact-form" novalidate>
                    <div class="row g-3">
                        <div class="col-md-6 public-form-group"><input type="text" name="nom_complet" class="public-input" placeholder="Nom complet"></div>
<div class="col-md-6 public-form-group"><input type="email" name="email" class="public-input" placeholder="Email"></div>
<div class="col-md-6 public-form-group"><input type="text" name="telephone" class="public-input" placeholder="Téléphone"></div>
<div class="col-md-6 public-form-group"><select class="public-input" name="type_alerte" required><option value="">Type d'alerte *</option><option value="signalement">Signalement</option><option value="fraude">Fraude</option><option value="abus">Abus</option><option value="non_conformite">Non conformité</option><option value="manquement">Manquement</option><option value="autre">Autre</option></select></div>
<div class="col-md-6 public-form-group"><select class="public-input" name="niveau_confidentialite" required><option value="">Confidentialité *</option><option value="normal">Normal</option><option value="confidentiel">Confidentiel</option><option value="anonyme">Anonyme</option></select></div>
<div class="col-12 public-form-group"><textarea name="description" class="public-input public-textarea" rows="6" placeholder="Description *" required></textarea></div>
                        <div class="col-12"><button class="btn btn-success public-contact-button" type="submit">Envoyer</button></div>
                    </div>
                </form>
            </div></div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
