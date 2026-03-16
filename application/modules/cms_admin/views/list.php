<?php $this->load->view('_layout_top'); ?>
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <h2 class="mb-1 text-capitalize"><?= str_replace('_', ' ', $table); ?></h2>
        <p class="text-muted mb-0">Liste administrable avec recherche, tri, pagination et accès au détail.</p>
    </div>
    <a class="btn btn-success" href="<?= site_url('admin/create/' . $table); ?>">Ajouter</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover align-middle datatable w-100">
        <thead>
            <tr>
                <?php foreach ($fields as $field): ?>
                    <th><?= ucfirst(str_replace('_', ' ', $field->name)); ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <?php $cell = isset($row[$field->name]) ? $row[$field->name] : ''; ?>
                        <td>
                            <?php if ((preg_match('/(image|photo|banniere|piece_jointe|fichier)$/i', $field->name) || in_array($field->name, array('image_url', 'fichier_url', 'photo_profil'), TRUE)) && !empty($cell)): ?>
                                <a href="<?= base_url($cell); ?>" target="_blank">Voir le fichier</a>
                            <?php elseif (in_array($cell, array('1', 1, '0', 0), TRUE) && $field->type === 'tinyint'): ?>
                                <span class="badge <?= (string) $cell === '1' ? 'text-bg-success' : 'text-bg-secondary'; ?>"><?= (string) $cell === '1' ? 'Oui' : 'Non'; ?></span>
                            <?php else: ?>
                                <?= html_escape(mb_strimwidth((string) $cell, 0, 80, '...')); ?>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                    <td class="text-nowrap">
                        <a class="btn btn-sm btn-info text-white" href="<?= site_url('admin/detail/' . $table . '/' . $row['id']); ?>">Détail</a>
                        <a class="btn btn-sm btn-primary" href="<?= site_url('admin/edit/' . $table . '/' . $row['id']); ?>">Modifier</a>
                        <a class="btn btn-sm btn-warning" href="<?= site_url('admin/toggle/' . $table . '/' . $row['id']); ?>">Publier/Désactiver</a>
                        <a class="btn btn-sm btn-danger" href="<?= site_url('admin/delete/' . $table . '/' . $row['id']); ?>" onclick="return confirm('Supprimer cet élément ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('_layout_bottom'); ?>
