<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="mission">
        <div class="container">
            <div class="section-title"><h2><?= html_escape($page_data['titre']); ?></h2></div>
            <div class="mission-slide" style="max-width:none;">
                <p><?= nl2br(html_escape($page_data['resume'])); ?></p>
                <div><?= $page_data['contenu']; ?></div>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
