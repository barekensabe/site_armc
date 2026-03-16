<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications" id="stats">
        <div class="container">
            <div class="section-title"><h2>Statistiques</h2></div>
            <div class="row g-4">
                <?php foreach ($statistics as $stat): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="mission-slide" style="max-width:none;">
                            <h3><?= html_escape($stat['titre']); ?></h3>
                            <p><strong><?= rtrim(rtrim((string) $stat['valeur'], '0'), '.'); ?> <?= html_escape($stat['unite']); ?></strong></p>
                            <p><?= html_escape($stat['description']); ?></p>
                            <p>Période : <?= html_escape($stat['periode']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
