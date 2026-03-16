<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2><?= html_escape($document['titre']); ?></h2></div>
            <div class="publications-slide">
                <div class="publications-content">
                    <span class="date"><?= html_escape($document['type_document']); ?></span>
                    <p><?= html_escape($document['description']); ?></p>
                    <p><strong>Année :</strong> <?= html_escape($document['annee']); ?></p>
                    <a class="publications-read-more" href="<?= site_url('telecharger-document/' . $document['slug']); ?>">Télécharger / Ouvrir <i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
