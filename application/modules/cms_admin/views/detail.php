<?php $this->load->view('_layout_top'); ?>
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <h2 class="mb-1 text-capitalize">Détail - <?= str_replace('_', ' ', $table); ?></h2>
        <p class="text-muted mb-0">Consultation complète de l'enregistrement sélectionné.</p>
    </div>
    <div class="d-flex gap-2">
        <a class="btn btn-primary" href="<?= site_url('admin/edit/' . $table . '/' . $row['id']); ?>">Modifier</a>
        <a class="btn btn-secondary" href="<?= site_url('admin/list/' . $table); ?>">Retour</a>
    </div>
</div>

<div class="content-card">
    <div class="row g-3">
        <?php foreach ($details as $detail): ?>
            <div class="col-lg-4 col-md-6">
                <div class="detail-card h-100">
                    <div class="detail-label"><?= html_escape($detail['label']); ?></div>
                    <div class="detail-value">
                        <?php if ((preg_match('/(image|photo|banniere|piece_jointe|fichier)$/i', $detail['label']) || in_array(strtolower(str_replace(' ', '_', $detail['label'])), array('image_url', 'fichier_url', 'photo_profil'), TRUE)) && !empty($detail['value']) && $detail['display'] !== '—'): ?>
                            <?php if (preg_match('/\.(jpg|jpeg|png|gif|webp|svg)$/i', $detail['value'])): ?>
                                <img src="<?= base_url($detail['value']); ?>" class="thumb-preview mb-2" alt="<?= html_escape($detail['label']); ?>">
                            <?php endif; ?>
                            <div><a href="<?= base_url($detail['value']); ?>" target="_blank">Ouvrir le fichier</a></div>
                        <?php else: ?>
                            <?= nl2br(html_escape((string) $detail['display'])); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php $this->load->view('_layout_bottom'); ?>
