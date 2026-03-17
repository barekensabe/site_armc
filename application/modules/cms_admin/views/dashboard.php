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

<div class="row g-4 mt-1">
    <div class="col-xl-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h5 class="mb-3">Pages les plus consultées</h5>
                <?php if (!empty($top_pages)): ?>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead><tr><th>Page</th><th class="text-end">Vues</th></tr></thead>
                            <tbody>
                            <?php foreach ($top_pages as $page): ?>
                                <tr>
                                    <td><?= html_escape($page['page_label']); ?></td>
                                    <td class="text-end fw-bold"><?= (int) $page['views']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted mb-0">Aucune statistique visiteur disponible pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h5 class="mb-3">Dernières visites enregistrées</h5>
                <?php if (!empty($recent_visitors)): ?>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead><tr><th>IP</th><th>Page</th><th>Date</th></tr></thead>
                            <tbody>
                            <?php foreach ($recent_visitors as $visit): ?>
                                <tr>
                                    <td><?= html_escape($visit['ip_adresse']); ?></td>
                                    <td><?= html_escape($visit['page_label']); ?></td>
                                    <td><?= html_escape($visit['date_time']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted mb-0">Aucune visite enregistrée pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <h5>Gestion du site dynamique</h5>
        <p>Utilisez le menu de gauche pour créer, modifier, publier, désactiver ou supprimer les contenus du site public sans changer le design existant.</p>
    </div>
</div>
<?php $this->load->view('_layout_bottom'); ?>
