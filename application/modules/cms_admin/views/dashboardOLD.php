<?php $this->load->view('_layout_top'); ?>
<h2 class="mb-4">Tableau de bord</h2>
<div class="row g-3">
    <?php foreach ($counts as $label => $value): ?>
        <div class="col-md-4 col-xl-2">
            <div class="card card-kpi">
                <div class="card-body">
                    <div class="text-muted text-capitalize"><?= $label; ?></div>
                    <div class="fs-3 fw-bold"><?= $value; ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="mt-4 card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <h5>Gestion du site dynamique</h5>
        <p>Utilisez le menu de gauche pour créer, modifier, publier, désactiver ou supprimer les contenus du site public sans changer le design existant.</p>
    </div>
</div>
<?php $this->load->view('_layout_bottom'); ?>
