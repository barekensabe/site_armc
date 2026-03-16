<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2>Documents</h2></div>
            <div class="row g-4">
                <?php foreach ($documents as $document): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="publications-slide" style="height:100%;"><div class="publications-content"><span class="date"><?= html_escape($document['type_document']); ?></span><h3><?= html_escape($document['titre']); ?></h3><p><?= html_escape($document['description']); ?></p><a href="<?= site_url('documents/' . $document['slug']); ?>">Consulter</a></div></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
