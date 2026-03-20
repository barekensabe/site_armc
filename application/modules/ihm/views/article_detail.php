<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2><?= html_escape($article['titre']); ?></h2></div>
            <div class="publications-slide">
                <?php if (!empty($article['image_principale'])): ?>
                    <div class="publications-image"><img src="<?= preg_match('~^https?://~', $article['image_principale']) ? $article['image_principale'] : base_url(ltrim($article['image_principale'], '/')); ?>" alt="<?= html_escape($article['titre']); ?>"></div>
                <?php endif; ?>
                <div class="publications-content">
                    <span class="date">Catégorie : <?= html_escape($article['categorie_nom']); ?> | <?= !empty($article['date_publication']) ? date('d/m/Y', strtotime($article['date_publication'])) : ''; ?></span>
                    <p><?= nl2br(html_escape($article['resume'])); ?></p>
                    <?php if (!empty($article['video_url'])): ?>
                <div class="ratio ratio-16x9 my-4">
                    <iframe src="<?= html_escape($article['video_url']); ?>" title="Vidéo" allowfullscreen loading="lazy"></iframe>
                </div>
                <?php endif; ?>
                <div><?= $article['contenu']; ?></div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
