<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>
<main class="main-content">
    <div class="cont_article">
        <div class="carousel-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($sliders as $slide): ?>
                        <div class="swiper-slide">
                            <a href="<?= !empty($slide['bouton_lien']) ? (preg_match('~^https?://~', $slide['bouton_lien']) ? $slide['bouton_lien'] : site_url(ltrim($slide['bouton_lien'], '/'))) : '#'; ?>" <?= !empty($slide['bouton_lien']) && preg_match('~^https?://~', $slide['bouton_lien']) ? 'target="_blank"' : ''; ?> title="<?= html_escape($slide['titre']); ?>">
                                <img src="<?= preg_match('~^https?://~', $slide['image_url']) ? $slide['image_url'] : base_url(ltrim($slide['image_url'], '/')); ?>" alt="<?= html_escape($slide['titre']); ?>">
                                <div class="slide-caption"><?= html_escape($slide['titre']); ?><?= !empty($slide['description']) ? ' - ' . html_escape($slide['description']) : ''; ?></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <section class="mission" id="mission">
        <div class="container">
            <div class="section-title"><h2>Les Objectifs Principaux de Notre Mission</h2></div>
            <div class="mission-carousel-container">
                <button class="mission-carousel-button-prev"></button>
                <div class="swiper mission-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($featured_pages as $page): ?>
                            <div class="swiper-slide mission-slide">
                                <div class="mission-icon"><i class="fas fa-bullseye"></i></div>
                                <h3><?= html_escape($page['titre']); ?></h3>
                                <p><?= html_escape($page['resume']); ?></p>
                                <p><a href="<?= site_url('pages/' . $page['slug']); ?>">Lire la suite</a></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="mission-carousel-button-next"></button>
                <div class="mission-pagination swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="publications" id="publications">
        <div class="container">
            <div class="section-title"><h2>Événements</h2></div>
            <div class="publications-carousel-container">
                <button class="publications-carousel-button-prev"></button>
                <div class="swiper publications-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($home_articles as $article): ?>
                            <div class="swiper-slide publications-slide">
                                <div class="publications-image">
                                    <img src="<?= !empty($article['image_principale']) ? (preg_match('~^https?://~', $article['image_principale']) ? $article['image_principale'] : base_url(ltrim($article['image_principale'], '/'))) : 'https://via.placeholder.com/600x400?text=ARMC'; ?>" alt="<?= html_escape($article['titre']); ?>">
                                </div>
                                <div class="publications-content">
                                    <span class="date"><?= !empty($article['date_publication']) ? date('d/m/Y', strtotime($article['date_publication'])) : ''; ?></span>
                                    <h3><?= html_escape($article['titre']); ?></h3>
                                    <p><?= html_escape($article['resume']); ?></p>
                                    <a href="<?= site_url('actualites/' . $article['slug']); ?>" class="publications-read-more">Lire la suite <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="publications-carousel-button-next"></button>
                <div class="publications-pagination swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="publications" id="related">
        <div class="container">
            <div class="section-title"><h2>Dernières publications</h2></div>
            <div class="row g-4">
                <?php foreach (array_slice($home_articles, 0, 6) as $article): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="publications-slide" style="height:100%;">
                            <div class="publications-content">
                                <span class="date"><?= html_escape($article['categorie_nom']); ?></span>
                                <h3><?= html_escape($article['titre']); ?></h3>
                                <p><?= html_escape($article['resume']); ?></p>
                                <a href="<?= site_url('actualites/' . $article['slug']); ?>" class="publications-read-more">Lire la suite <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php include VIEWPATH . 'templete/footer_armc.php'; ?>
