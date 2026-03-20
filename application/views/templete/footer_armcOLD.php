<?php
$site_name           = isset($site_settings['site_name']) && $site_settings['site_name'] !== '' ? $site_settings['site_name'] : 'ARMC Burundi';
$footer_about        = isset($site_settings['footer_about']) && $site_settings['footer_about'] !== ''
    ? $site_settings['footer_about']
    : "L'Autorité de Régulation du Marché des Capitaux du Burundi est l'organisme de régulation responsable de la supervision et du développement des marchés de capitaux au Burundi.";
$site_email          = isset($site_settings['site_email']) && $site_settings['site_email'] !== '' ? $site_settings['site_email'] : 'contact@armc.bi';
$site_phone          = isset($site_settings['site_phone']) && $site_settings['site_phone'] !== '' ? $site_settings['site_phone'] : '+257 22 00 00 00';
$site_address        = isset($site_settings['adresse_postale']) && $site_settings['adresse_postale'] !== '' ? $site_settings['adresse_postale'] : 'Bujumbura, Burundi';
$site_hours          = isset($site_settings['site_hours']) && $site_settings['site_hours'] !== '' ? $site_settings['site_hours'] : 'Lu-Ve: 07h30 - 17h30';
$contact_small_title = isset($site_settings['contact_small_title']) && $site_settings['contact_small_title'] !== '' ? $site_settings['contact_small_title'] : 'Contactez Nous';
$contact_title       = isset($site_settings['contact_title']) && $site_settings['contact_title'] !== '' ? $site_settings['contact_title'] : 'Besoin de nous ?';
$contact_description = isset($site_settings['contact_description']) && $site_settings['contact_description'] !== ''
    ? $site_settings['contact_description']
    : 'Pour toute demande de renseignements ou de collaboration, ou pour découvrir comment ARMC peut vous aider dans votre parcours numérique, veuillez nous contacter.';
$map_latitude        = isset($site_settings['map_latitude']) && $site_settings['map_latitude'] !== '' ? $site_settings['map_latitude'] : '-3.3921254';
$map_longitude       = isset($site_settings['map_longitude']) && $site_settings['map_longitude'] !== '' ? $site_settings['map_longitude'] : '29.3588371';
$map_zoom            = isset($site_settings['map_zoom']) && $site_settings['map_zoom'] !== '' ? (int) $site_settings['map_zoom'] : 17;
$map_label           = isset($site_settings['map_label']) && $site_settings['map_label'] !== '' ? $site_settings['map_label'] : $site_name;
$facebook_url        = isset($site_settings['facebook_url']) && $site_settings['facebook_url'] !== '' ? $site_settings['facebook_url'] : '#';
$twitter_url         = isset($site_settings['twitter_url']) && $site_settings['twitter_url'] !== '' ? $site_settings['twitter_url'] : '#';
$linkedin_url        = isset($site_settings['linkedin_url']) && $site_settings['linkedin_url'] !== '' ? $site_settings['linkedin_url'] : '#';
$youtube_url         = isset($site_settings['youtube_url']) && $site_settings['youtube_url'] !== '' ? $site_settings['youtube_url'] : '#';
$map_src             = 'https://www.google.com/maps?q=' . rawurlencode($map_latitude . ',' . $map_longitude . ' (' . $map_label . ')') . '&z=' . $map_zoom . '&output=embed';
?>

    </main>
</div>

<style>
.armc-prefooter-wrap {
    margin-left: 260px;
    margin-right: 0;
    padding: 20px 22px 34px 22px;
    box-sizing: border-box;
}

.armc-prefooter-box,
.armc-prefooter-panel,
.armc-prefooter-grid,
.armc-prefooter-formcol,
.armc-prefooter-mapcol {
    width: 100%;
    min-width: 0;
    box-sizing: border-box;
}

.armc-prefooter-box {
    max-width: none;
    margin: 0;
    padding: 0;
}

.armc-prefooter-panel {
    background: #ffffff;
    border: 1px solid rgba(15, 108, 47, 0.08);
    border-radius: 24px;
    box-shadow: 0 12px 36px rgba(14, 24, 39, 0.08);
    padding: 28px;
    overflow: hidden;
}

.armc-prefooter-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: 28px;
    align-items: stretch;
}

.armc-prefooter-formcol {
    display: flex;
    flex-direction: column;
}

.armc-prefooter-kicker {
    margin: 0 0 10px;
    font-size: 15px;
    font-weight: 700;
    color: #667085;
}

.armc-prefooter-title {
    margin: 0 0 14px;
    font-size: clamp(2.2rem, 4vw, 4rem);
    line-height: 1.1;
    font-weight: 800;
    color: #05253b;
    word-break: break-word;
}

.armc-prefooter-text {
    margin: 0 0 22px;
    color: #667085;
    font-size: 1rem;
    line-height: 1.8;
}

.armc-prefooter-alert {
    border-radius: 14px;
    padding: 12px 14px;
    margin-bottom: 18px;
    font-size: 0.95rem;
}

.armc-prefooter-alert-success {
    background: #ecfdf3;
    color: #027a48;
    border: 1px solid #abefc6;
}

.armc-prefooter-alert-error {
    background: #fef3f2;
    color: #b42318;
    border: 1px solid #fecdca;
}

.armc-prefooter-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 16px;
}

.armc-prefooter-group {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.armc-prefooter-label {
    margin-bottom: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    color: #344054;
}

.armc-prefooter-label .required {
    color: #dc2626;
}

.armc-prefooter-input,
.armc-prefooter-textarea {
    width: 100%;
    min-width: 0;
    padding: 14px 16px;
    box-sizing: border-box;
    border: 1px solid #d0d5dd;
    border-radius: 14px;
    background: #f8fafc;
    color: #101828;
    font-size: 0.98rem;
    transition: border-color .2s ease, box-shadow .2s ease, background-color .2s ease;
}

.armc-prefooter-input:focus,
.armc-prefooter-textarea:focus {
    outline: none;
    border-color: #0f6c2f;
    box-shadow: 0 0 0 4px rgba(15, 108, 47, 0.08);
    background: #ffffff;
}

.armc-prefooter-textarea {
    min-height: 158px;
    resize: vertical;
}

.armc-prefooter-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px 28px;
    border: 1px solid #f97316;
    border-radius: 14px;
    background: #ffffff;
    color: #f97316;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s ease;
}

.armc-prefooter-submit:hover {
    background: #f97316;
    color: #ffffff;
}

.armc-prefooter-mapcol {
    display: flex;
    flex-direction: column;
    gap: 16px;
    min-width: 0;
}

.armc-prefooter-frame {
    display: block;
    width: 100% !important;
    max-width: 100% !important;
    min-width: 100% !important;
    flex: 1 1 auto;
    min-height: 520px;
    height: 100%;
    border: 0;
    border-radius: 22px;
    overflow: hidden;
    background: #eef2f6;
}

.armc-prefooter-infos {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    width: 100%;
}

.armc-prefooter-info {
    background: #f8fafc;
    border: 1px solid #eaecf0;
    border-radius: 16px;
    padding: 14px 16px;
}

.armc-prefooter-info-title {
    margin: 0 0 6px;
    font-size: 0.95rem;
    font-weight: 700;
    color: #0f6c2f;
}

.armc-prefooter-info-text,
.armc-prefooter-info-text a {
    margin: 0;
    color: #475467;
    line-height: 1.6;
    text-decoration: none;
    word-break: break-word;
}

@media (max-width: 1199.98px) {
    .armc-prefooter-wrap {
        padding: 18px 18px 30px 18px;
    }

    .armc-prefooter-title {
        font-size: clamp(2rem, 3.5vw, 3.2rem);
    }
}

@media (max-width: 991.98px) {
    .armc-prefooter-wrap {
        margin-left: 0;
        padding: 18px 14px 26px 14px;
    }

    .armc-prefooter-panel {
        padding: 22px;
    }

    .armc-prefooter-grid {
        grid-template-columns: 1fr;
    }

    .armc-prefooter-frame {
        min-height: 360px;
    }
}

@media (max-width: 575.98px) {
    .armc-prefooter-panel {
        padding: 16px;
        border-radius: 18px;
    }

    .armc-prefooter-row,
    .armc-prefooter-infos {
        grid-template-columns: 1fr;
    }

    .armc-prefooter-submit {
        width: 100%;
    }

    .armc-prefooter-frame {
        min-height: 300px;
    }
}
</style>

<div class="armc-prefooter-wrap">
    <div class="armc-prefooter-box">
        <section id="contact">
            <div class="armc-prefooter-panel">
                <div class="armc-prefooter-grid">
                    <div class="armc-prefooter-formcol">
                        <p class="armc-prefooter-kicker"><?= html_escape($contact_small_title); ?></p>
                        <h2 class="armc-prefooter-title"><?= html_escape($contact_title); ?></h2>
                        <p class="armc-prefooter-text"><?= html_escape($contact_description); ?></p>

                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="armc-prefooter-alert armc-prefooter-alert-success"><?= html_escape($this->session->flashdata('success')); ?></div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="armc-prefooter-alert armc-prefooter-alert-error"><?= html_escape($this->session->flashdata('error')); ?></div>
                        <?php endif; ?>

                        <form method="post" action="<?= site_url('contact/envoyer'); ?>">
                            <div class="armc-prefooter-row">
                                <div class="armc-prefooter-group">
                                    <label class="armc-prefooter-label" for="pc_nom_complet">Votre nom <span class="required">*</span></label>
                                    <input id="pc_nom_complet" type="text" name="nom_complet" class="armc-prefooter-input" placeholder="Votre nom" value="<?= html_escape(set_value('nom_complet')); ?>" required>
                                </div>
                                <div class="armc-prefooter-group">
                                    <label class="armc-prefooter-label" for="pc_email">Votre email <span class="required">*</span></label>
                                    <input id="pc_email" type="email" name="email" class="armc-prefooter-input" placeholder="Votre email" value="<?= html_escape(set_value('email')); ?>" required>
                                </div>
                            </div>
                            <div class="armc-prefooter-row">
                                <div class="armc-prefooter-group">
                                    <label class="armc-prefooter-label" for="pc_telephone">Téléphone</label>
                                    <input id="pc_telephone" type="text" name="telephone" class="armc-prefooter-input" placeholder="Votre téléphone" value="<?= html_escape(set_value('telephone')); ?>">
                                </div>
                                <div class="armc-prefooter-group">
                                    <label class="armc-prefooter-label" for="pc_sujet">Sujet</label>
                                    <input id="pc_sujet" type="text" name="sujet" class="armc-prefooter-input" placeholder="Objet de votre message" value="<?= html_escape(set_value('sujet')); ?>">
                                </div>
                            </div>
                            <div class="armc-prefooter-group" style="margin-bottom:18px;">
                                <label class="armc-prefooter-label" for="pc_message">Votre message <span class="required">*</span></label>
                                <textarea id="pc_message" name="message" class="armc-prefooter-textarea" placeholder="Votre message" required><?= html_escape(set_value('message')); ?></textarea>
                            </div>
                            <button type="submit" class="armc-prefooter-submit">
                                <span>Envoyer</span>
                                <span aria-hidden="true">➜</span>
                            </button>
                        </form>
                    </div>

                    <div class="armc-prefooter-mapcol">
                        <iframe
                            class="armc-prefooter-frame"
                            src="<?= html_escape($map_src); ?>"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Localisation <?= html_escape($map_label); ?>"></iframe>

                        <div class="armc-prefooter-infos">
                            <div class="armc-prefooter-info">
                                <h3 class="armc-prefooter-info-title">Adresse</h3>
                                <p class="armc-prefooter-info-text"><?= html_escape($site_address); ?></p>
                            </div>
                            <div class="armc-prefooter-info">
                                <h3 class="armc-prefooter-info-title">Téléphone</h3>
                                <p class="armc-prefooter-info-text"><a href="tel:<?= html_escape($site_phone); ?>"><?= html_escape($site_phone); ?></a></p>
                            </div>
                            <div class="armc-prefooter-info">
                                <h3 class="armc-prefooter-info-title">Email</h3>
                                <p class="armc-prefooter-info-text"><a href="mailto:<?= html_escape($site_email); ?>"><?= html_escape($site_email); ?></a></p>
                            </div>
                            <div class="armc-prefooter-info">
                                <h3 class="armc-prefooter-info-title">Horaires</h3>
                                <p class="armc-prefooter-info-text"><?= html_escape($site_hours); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<footer id="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>À propos de l'ARMC</h3>
                <ul>
                    <span>
                        <p><?= html_escape($footer_about); ?></p>
                    </span>
                    <li>
                        <a href="<?= html_escape($facebook_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= html_escape($twitter_url); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="<?= html_escape($linkedin_url); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?= html_escape($youtube_url); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
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
                    <li><i class="fas fa-map-marker-alt"></i><span><?= html_escape($site_address); ?></span></li>
                    <li><i class="fas fa-phone"></i><span><?= html_escape($site_phone); ?></span></li>
                    <li><i class="fas fa-envelope"></i><span><?= html_escape($site_email); ?></span></li>
                    <li><i class="fas fa-clock"></i><span><?= html_escape($site_hours); ?></span></li>
                </ul>
                <form method="post" action="<?= site_url('newsletter/abonnement'); ?>" class="mt-3">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Votre email" required>
                    <button type="submit" class="btn btn-success btn-sm">S'abonner</button>
                </form>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= html_escape($site_name); ?>. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainSwiper = document.querySelector('.swiper');
    if (mainSwiper && typeof Swiper !== 'undefined') {
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

    if (document.querySelector('.mission-swiper') && typeof Swiper !== 'undefined') {
        new Swiper('.mission-swiper', {
            direction: 'horizontal',
            loop: true,
            autoplay: { delay: 6000, disableOnInteraction: false },
            speed: 800,
            grabCursor: true,
            spaceBetween: 30,
            pagination: { el: '.mission-pagination', clickable: true },
            navigation: { nextEl: '.mission-carousel-button-next', prevEl: '.mission-carousel-button-prev' },
            breakpoints: {
                320: { slidesPerView: 1, spaceBetween: 20 },
                768: { slidesPerView: 2, spaceBetween: 30 },
                1024: { slidesPerView: 3, spaceBetween: 30 }
            }
        });
    }

    if (document.querySelector('.publications-swiper') && typeof Swiper !== 'undefined') {
        new Swiper('.publications-swiper', {
            direction: 'horizontal',
            loop: true,
            autoplay: { delay: 7000, disableOnInteraction: false },
            speed: 800,
            grabCursor: true,
            spaceBetween: 30,
            pagination: { el: '.publications-pagination', clickable: true },
            navigation: { nextEl: '.publications-carousel-button-next', prevEl: '.publications-carousel-button-prev' },
            breakpoints: {
                320: { slidesPerView: 1, spaceBetween: 20 },
                768: { slidesPerView: 2, spaceBetween: 30 },
                1024: { slidesPerView: 3, spaceBetween: 30 }
            }
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
