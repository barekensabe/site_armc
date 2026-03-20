<?php
$this->load->view('_layout_top');

$section_breaks = array(
    'articles' => array(
        'Publication et affichage' => array('type_article', 'statut', 'mis_en_avant', 'afficher_accueil', 'date_publication', 'tags'),
        'SEO et médias' => array('slug', 'image_principale', 'image_secondaire', 'meta_title', 'meta_description')
    ),
    'pages' => array(
        'Publication' => array('statut', 'est_page_accueil', 'date_publication'),
        'SEO et bannière' => array('image_banniere', 'meta_title', 'meta_description')
    ),
    'documents' => array(
        'Fichier et diffusion' => array('fichier_url', 'type_document', 'annee', 'statut', 'telechargeable', 'date_publication'),
        'SEO' => array('meta_title', 'meta_description')
    ),
    'menus' => array(
        'Cible et affichage' => array('type_cible', 'cible_id', 'url', 'ordre_affichage', 'nouvelle_fenetre', 'actif')
    ),
    'users' => array(
        'Accès et sécurité' => array('role_id', 'email', 'telephone', 'password_hash', 'photo_profil', 'statut')
    ),
    'complaints' => array(
        'Traitement interne' => array('canal_reception', 'priorite', 'statut', 'agent_assigne_id', 'piece_jointe', 'commentaire_interne')
    ),
    'alerts' => array(
        'Traitement interne' => array('type_alerte', 'niveau_confidentialite', 'statut', 'agent_assigne_id', 'piece_jointe', 'commentaire_interne')
    )
);

$field_groups = array('Informations principales' => array());
$current_map = isset($section_breaks[$table]) ? $section_breaks[$table] : array();
foreach ($current_map as $group_title => $group_fields) {
    $field_groups[$group_title] = array();
}

foreach ($fields as $field) {
    $name = $field->name;
    if (in_array($name, $hidden_fields, TRUE)) {
        continue;
    }

    $placed = FALSE;
    foreach ($current_map as $group_title => $group_fields) {
        if (in_array($name, $group_fields, TRUE)) {
            $field_groups[$group_title][] = $field;
            $placed = TRUE;
            break;
        }
    }

    if (!$placed) {
        $field_groups['Informations principales'][] = $field;
    }
}

function armc_input_col($name, $field)
{
    if (in_array($name, array('contenu', 'resume', 'description', 'message', 'commentaire_interne', 'meta_description'), TRUE)) {
        return 'col-12';
    }

    if (in_array($field->type, array('text', 'longtext'), TRUE)) {
        return 'col-12';
    }

    return 'col-lg-4 col-md-6';
}
?>
<h2 class="mb-1"><?= empty($row) ? 'Ajouter' : 'Modifier'; ?> - <?= ucfirst(str_replace('_', ' ', $table)); ?></h2>
<p class="text-muted mb-2">Formulaire simplifié, ergonomique et adapté à la structure réelle de la base de données.</p>
<p class="mb-4"><span class="text-danger fw-bold">*</span> Champs obligatoires</p>

<?php if (validation_errors()): ?>
    <div class="alert alert-danger">
        <?= validation_errors('<div>', '</div>'); ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" novalidate>
    <div class="row g-4">
        <?php foreach ($field_groups as $group_title => $group_fields): ?>
            <?php if (empty($group_fields)) { continue; } ?>
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <h5><?= $group_title; ?></h5>
                        <p class="text-muted mb-0">Renseignez uniquement les champs utiles pour cette section.</p>
                    </div>
                    <div class="row g-3">
                        <?php foreach ($group_fields as $field): ?>
                            <?php
                                $name = $field->name;
                                $value = isset($row[$name]) ? $row[$name] : '';
                                $meta = isset($ui_meta[$name]) ? $ui_meta[$name] : array('type' => 'text', 'options' => array(), 'accept' => '', 'help' => '');
                                $label = ucfirst(str_replace('_', ' ', $name));
                                $col_class = armc_input_col($name, $field);
                            ?>

                            <?php if ($name === 'password_hash'): ?>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <input type="password" name="password_plain" class="form-control" placeholder="Laisser vide pour conserver l'ancien" <?= in_array('password_plain', $required_fields, TRUE) ? 'required' : ''; ?>>
                                    <small class="text-muted">Ce champ est facultatif lors d'une modification.</small>
                                </div>
                                <?php continue; ?>
                            <?php endif; ?>

                            <div class="<?= $col_class; ?>">
                                <label class="form-label" for="<?= $name; ?>">
                                    <?= $label; ?>
                                    <?php if (in_array($name, $required_fields, TRUE)): ?><span class="text-danger"> *</span><?php endif; ?>
                                </label>

                                <?php if (in_array($name, array('contenu', 'resume', 'description', 'message', 'commentaire_interne', 'meta_description'), TRUE)): ?>
                                    <?php $is_rich_editor = in_array($name, array('contenu', 'description', 'message', 'commentaire_interne'), TRUE); ?>
                                    <textarea name="<?= $name; ?>" id="<?= $name; ?>" class="form-control <?= $is_rich_editor ? 'armc-wysiwyg' : ''; ?>" rows="<?= $name === 'contenu' ? '10' : '4'; ?>" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>><?= html_escape($value); ?></textarea>
                                    <?php if ($name === 'meta_description'): ?>
                                        <small class="text-muted d-block mt-1">Ce champ reste en texte simple pour préserver le SEO.</small>
                                    <?php elseif ($is_rich_editor): ?>
                                        <small class="text-muted d-block mt-1">Éditeur enrichi activé pour une saisie CMS plus professionnelle.</small>
                                    <?php endif; ?>
                                <?php elseif ($meta['type'] === 'file'): ?>
                                    <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" class="form-control" accept="<?= html_escape($meta['accept']); ?>" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                    <?php if (!empty($meta['help'])): ?>
                                        <small class="text-muted d-block mt-1"><?= $meta['help']; ?></small>
                                    <?php endif; ?>
                                    <?php if (!empty($value)): ?>
                                        <div class="file-preview mt-2">
                                            <div class="small text-muted mb-2">Fichier actuel</div>
                                            <?php if (preg_match('/\.(jpg|jpeg|png|gif|webp|svg)$/i', $value)): ?>
                                                <div class="mb-2">
                                                    <img src="<?= base_url($value); ?>" alt="<?= html_escape($label); ?>" class="thumb-preview">
                                                </div>
                                            <?php endif; ?>
                                            <a href="<?= base_url($value); ?>" target="_blank">Ouvrir le fichier actuel</a>
                                        </div>
                                    <?php endif; ?>
                                <?php elseif ($name === 'cible_id' && $table === 'menus'): ?>
                                    <select name="<?= $name; ?>" id="<?= $name; ?>" class="form-select" data-current="<?= html_escape($value); ?>" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                        <option value="">Sélectionner</option>
                                    </select>
                                <?php elseif ($meta['type'] === 'select' || $field->type === 'tinyint'): ?>
                                    <select name="<?= $name; ?>" id="<?= $name; ?>" class="form-select" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                        <option value="">Sélectionner</option>
                                        <?php if ($field->type === 'tinyint'): ?>
                                            <option value="1" <?= ((string) $value === '1') ? 'selected' : ''; ?>>Oui / Actif</option>
                                            <option value="0" <?= ((string) $value === '0') ? 'selected' : ''; ?>>Non / Inactif</option>
                                        <?php else: ?>
                                            <?php foreach ($meta['options'] as $option_value => $option_label): ?>
                                                <option value="<?= html_escape($option_value); ?>" <?= ((string) $value === (string) $option_value) ? 'selected' : ''; ?>>
                                                    <?= html_escape(ucfirst(str_replace('_', ' ', $option_label))); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                <?php elseif (strpos($name, 'date') !== FALSE): ?>
                                    <input type="datetime-local" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= !empty($value) ? html_escape(date('Y-m-d\TH:i', strtotime($value))) : ''; ?>" class="form-control" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                <?php elseif (in_array($field->type, array('int', 'bigint', 'decimal', 'year'), TRUE)): ?>
                                    <input type="number" step="<?= $field->type === 'decimal' ? '0.01' : '1'; ?>" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= html_escape($value); ?>" class="form-control" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                <?php elseif ($name === 'slug'): ?>
                                    <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= html_escape($value); ?>" class="form-control armc-slug-field" placeholder="ex: education-financiere" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                    <small class="text-muted d-block mt-1">Le slug est automatiquement normalisé : suppression des accents, caractères spéciaux et espaces.</small>
                                <?php elseif (in_array($name, array('titre', 'nom', 'libelle'), TRUE)): ?>
                                    <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= html_escape($value); ?>" class="form-control armc-slug-source" data-slug-target="slug" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                <?php elseif ($name === 'email'): ?>
                                    <input type="email" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= html_escape($value); ?>" class="form-control" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                <?php elseif ($name === 'telephone'): ?>
                                    <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= html_escape($value); ?>" class="form-control" placeholder="+257 ...">
                                <?php else: ?>
                                    <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= html_escape($value); ?>" class="form-control" <?= in_array($name, $required_fields, TRUE) ? 'required' : ''; ?>>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-4 d-flex gap-2">
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="<?= site_url('admin/list/' . $table); ?>" class="btn btn-secondary">Retour</a>
    </div>
</form>

<?php if ($table === 'menus'): ?>
<script>
    window.armcMenuTargets = <?= json_encode($menu_target_options); ?>;
</script>
<?php endif; ?>
<?php $this->load->view('_layout_bottom'); ?>
