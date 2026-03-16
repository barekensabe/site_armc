    </main>
</div>

<footer id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>À propos de l'ARMC</h3>
                <ul>
                    <span>
                        <p><?= html_escape(isset($site_settings['footer_about']) ? $site_settings['footer_about'] : "L'Autorité de Régulation du Marché des Capitaux du Burundi est l'organisme de régulation responsable de la supervision et du développement des marchés de capitaux au Burundi."); ?></p>
                    </span>
                    <li>
                        <a href="<?= html_escape(isset($site_settings['facebook_url']) ? $site_settings['facebook_url'] : '#'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= html_escape(isset($site_settings['twitter_url']) ? $site_settings['twitter_url'] : '#'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="<?= html_escape(isset($site_settings['linkedin_url']) ? $site_settings['linkedin_url'] : '#'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?= html_escape(isset($site_settings['youtube_url']) ? $site_settings['youtube_url'] : '#'); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Liens utiles</h3>
                <ul>
                    <?php foreach (array_slice(isset($quick_links) ? $quick_links : array(), 0, 8) as $footer_link): ?>
                        <?php $footer_url = preg_match('~^https?://~', $footer_link['url']) ? $footer_link['url'] : site_url(ltrim($footer_link['url'], '/')); ?>
                        <li><a href="<?= $footer_url; ?>" <?= $footer_link['type_lien'] === 'externe' ? 'target="_blank"' : ''; ?>><?= html_escape($footer_link['libelle']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Ressources</h3>
                <ul>
                    <li><a href="<?= site_url('actualites'); ?>">Publications</a></li>
                    <li><a href="<?= site_url('statistiques'); ?>">Données de marché</a></li>
                    <li><a href="<?= site_url('documents'); ?>">Documents</a></li>
                    <li><a href="<?= site_url('nous-alerter'); ?>">Alerte</a></li>
                    <li><a href="<?= site_url('plaintes'); ?>">Plaintes</a></li>
                    <li><a href="<?= site_url('contact'); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contactez-nous</h3>
                <ul class="contact-list">
                    <li><i class="fas fa-map-marker-alt"></i><span><?= html_escape(isset($site_settings['adresse_postale']) ? $site_settings['adresse_postale'] : 'Bujumbura, Burundi'); ?></span></li>
                    <li><i class="fas fa-phone"></i><span><?= html_escape(isset($site_settings['site_phone']) ? $site_settings['site_phone'] : '+257 22 00 00 00'); ?></span></li>
                    <li><i class="fas fa-envelope"></i><span><?= html_escape(isset($site_settings['site_email']) ? $site_settings['site_email'] : 'contact@armc.bi'); ?></span></li>
                    <li><i class="fas fa-clock"></i><span><?= html_escape(isset($site_settings['site_hours']) ? $site_settings['site_hours'] : 'Lu-Ve: 07h30 - 17h30'); ?></span></li>
                </ul>
                <form method="post" action="<?= site_url('newsletter/abonnement'); ?>" class="mt-3">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Votre email" required>
                    <button type="submit" class="btn btn-success btn-sm">S'abonner</button>
                </form>
            </div>

            <div class="footer-col footer-map-col">
                <h3>Notre localisation</h3>
                <div class="footer-map-card">
                    <iframe
                        title="Localisation ARMC Burundi"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.openstreetmap.org/export/embed.html?bbox=29.3538371%2C-3.4021254%2C29.3638371%2C-3.3821254&amp;layer=mapnik&amp;marker=-3.3921254%2C29.3588371"></iframe>
                </div>
                <p class="map-coordinates">Coordonnées : -3.3921254, 29.3588371</p>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= html_escape(isset($site_settings['site_name']) ? $site_settings['site_name'] : 'ARMC Burundi'); ?>. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('navToggle');
    const navContainer = document.querySelector('.nav-container');
    if (navToggle && navContainer) {
        navToggle.addEventListener('click', function () {
            navContainer.classList.toggle('is-open');
            navToggle.classList.toggle('is-open');
        });
    }

    const mainSwiper = document.querySelector('.swiper');
    if (mainSwiper) {
        new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            speed: 800,
            grabCursor: true,
            pagination: { el: '.swiper-pagination', clickable: true, dynamicBullets: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            breakpoints: {
                320: { slidesPerView: 1, spaceBetween: 10 },
                768: { slidesPerView: 1, spaceBetween: 20 },
                1024: { slidesPerView: 1, spaceBetween: 30 }
            }
        });
    }

    if (document.querySelector('.mission-swiper')) {
        new Swiper('.mission-swiper', {
            direction: 'horizontal', loop: true, autoplay: { delay: 6000, disableOnInteraction: false }, speed: 800,
            grabCursor: true, spaceBetween: 30, pagination: { el: '.mission-pagination', clickable: true },
            navigation: { nextEl: '.mission-carousel-button-next', prevEl: '.mission-carousel-button-prev' },
            breakpoints: { 320: { slidesPerView: 1, spaceBetween: 20 }, 768: { slidesPerView: 2, spaceBetween: 30 }, 1024: { slidesPerView: 3, spaceBetween: 30 } }
        });
    }

    if (document.querySelector('.publications-swiper')) {
        new Swiper('.publications-swiper', {
            direction: 'horizontal', loop: true, autoplay: { delay: 7000, disableOnInteraction: false }, speed: 800,
            grabCursor: true, spaceBetween: 30, pagination: { el: '.publications-pagination', clickable: true },
            navigation: { nextEl: '.publications-carousel-button-next', prevEl: '.publications-carousel-button-prev' },
            breakpoints: { 320: { slidesPerView: 1, spaceBetween: 20 }, 768: { slidesPerView: 2, spaceBetween: 30 }, 1024: { slidesPerView: 3, spaceBetween: 30 } }
        });
    }

    const marqueeContent = document.getElementById('marqueeContent');
    const marqueeControl = document.getElementById('marqueeControl');
    if (marqueeContent && marqueeControl) {
        let paused = false;
        marqueeControl.addEventListener('click', function() {
            paused = !paused;
            marqueeContent.style.animationPlayState = paused ? 'paused' : 'running';
            marqueeControl.innerHTML = paused ? '<i class="fas fa-play"></i>' : '<i class="fas fa-pause"></i>';
        });
    }
});
</script>
</body>
</html>
