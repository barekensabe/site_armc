<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2>Toutes les actualités</h2></div>
            <div class="row g-4">
                <?php foreach ($articles as $article): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="publications-slide" style="height:100%;"><div class="publications-content"><span class="date"><?= !empty($article['date_publication']) ? date('d/m/Y', strtotime($article['date_publication'])) : ''; ?></span><h3><?= html_escape($article['titre']); ?></h3><p><?= html_escape($article['resume']); ?></p><a href="<?= site_url('actualites/' . $article['slug']); ?>">Lire la suite</a></div></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-4"><?= $pagination_links; ?></div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
