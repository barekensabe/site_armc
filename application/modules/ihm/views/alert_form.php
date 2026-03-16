<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2>Nous alerter</h2></div>
            <div class="publications-slide"><div class="publications-content">
                <form method="post" action="<?= site_url('nous-alerter/envoyer'); ?>">
                    <div class="row g-3">
                        <div class="col-md-6"><input class="form-control" type="text" name="nom_complet" placeholder="Nom complet"></div>
                        <div class="col-md-6"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                        <div class="col-md-6"><input class="form-control" type="text" name="telephone" placeholder="Téléphone"></div>
                        <div class="col-md-6"><select class="form-control" name="type_alerte"><option value="signalement">Signalement</option><option value="fraude">Fraude</option><option value="abus">Abus</option><option value="non_conformite">Non conformité</option><option value="manquement">Manquement</option><option value="autre">Autre</option></select></div>
                        <div class="col-md-6"><select class="form-control" name="niveau_confidentialite"><option value="normal">Normal</option><option value="confidentiel">Confidentiel</option><option value="anonyme">Anonyme</option></select></div>
                        <div class="col-12"><textarea class="form-control" name="description" rows="6" placeholder="Description" required></textarea></div>
                        <div class="col-12"><button class="btn btn-success" type="submit">Transmettre</button></div>
                    </div>
                </form>
            </div></div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
