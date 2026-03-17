<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2><?= html_escape($theme_page['titre']); ?></h2></div>
            <p><?= html_escape($theme_page['description']); ?></p>

            <?php if (!empty($theme_page['articles'])): ?>
                <h3>Articles</h3>
                <div class="row g-4">
                    <?php foreach ($theme_page['articles'] as $article): ?>
                        <div class="col-md-6">
                            <div class="publications-slide"><div class="publications-content"><h3><?= html_escape($article['titre']); ?></h3><p><?= html_escape($article['resume']); ?></p><a href="<?= site_url('actualites/' . $article['slug']); ?>">Lire la suite</a></div></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($theme_page['documents'])): ?>
                <h3 class="mt-4">Documents</h3>
                <div class="row g-4">
                    <?php foreach ($theme_page['documents'] as $document): ?>
                        <div class="col-md-6">
                            <div class="publications-slide"><div class="publications-content"><h3><?= html_escape($document['titre']); ?></h3><p><?= html_escape($document['description']); ?></p><a href="<?= site_url('documents/' . $document['slug']); ?>">Consulter</a></div></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (empty($theme_page['articles']) && empty($theme_page['documents'])): ?>
                <div class="mission-slide" style="max-width:none;">
                    <p>Le contenu de cette rubrique pourra être alimenté depuis l'espace d'administration sans modifier le design existant.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
