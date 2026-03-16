<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <section class="publications">
        <div class="container">
            <div class="section-title"><h2>Contact</h2></div>
            <div class="publications-slide"><div class="publications-content">
                <form method="post" action="<?= site_url('contact/envoyer'); ?>">
                    <div class="row g-3">
                        <div class="col-md-6"><input class="form-control" type="text" name="nom_complet" placeholder="Nom complet" required></div>
                        <div class="col-md-6"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                        <div class="col-md-6"><input class="form-control" type="text" name="telephone" placeholder="Téléphone"></div>
                        <div class="col-md-6"><input class="form-control" type="text" name="sujet" placeholder="Sujet" required></div>
                        <div class="col-12"><textarea class="form-control" name="message" rows="6" placeholder="Votre message" required></textarea></div>
                        <div class="col-12"><button class="btn btn-success" type="submit">Envoyer</button></div>
                    </div>
                </form>
            </div></div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
