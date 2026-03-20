<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="mission">
        <div class="container">
            <div class="section-title"><h2><?= html_escape($page_data['titre']); ?></h2></div>
            <div class="mission-slide" style="max-width:none;">
                <p><?= nl2br(html_escape($page_data['resume'])); ?></p>
                <?php if (!empty($page_data['video_url'])): ?>
                <div class="ratio ratio-16x9 my-4">
                    <iframe src="<?= html_escape($page_data['video_url']); ?>" title="Vidéo" allowfullscreen loading="lazy"></iframe>
                </div>
                <?php endif; ?>
                <div><?= $page_data['contenu']; ?></div>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
