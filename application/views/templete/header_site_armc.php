<?php
$site_name = isset($site_settings['site_name']) ? $site_settings['site_name'] : 'ARMC Burundi';
$site_phone = isset($site_settings['site_phone']) ? $site_settings['site_phone'] : '+257 22 00 00 00';
$site_email = isset($site_settings['site_email']) ? $site_settings['site_email'] : 'contact@armc.bi';
$site_address = isset($site_settings['adresse_postale']) ? $site_settings['adresse_postale'] : 'Bujumbura, Burundi';
$logo = isset($site_settings['site_logo']) ? $site_settings['site_logo'] : 'sites/default/files/communiques/logo.png';
if (!function_exists('armc_icon')) {
    function armc_icon($name)
    {
        $map = array(
            'calendar' => 'fa-calendar-check',
            'users' => 'fa-users',
            'bar-chart' => 'fa-chart-bar',
            'mail' => 'fa-envelope',
            'edit' => 'fa-pen',
            'book' => 'fa-book',
            'link' => 'fa-link'
        );
        return isset($map[$name]) ? $map[$name] : 'fa-circle';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= html_escape($site_name); ?> - Autorité de Régulation du Marché des Capitaux du Burundi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="shortcut icon" href="<?= base_url('sites/default/files/favicon.ico'); ?>" type="image/vnd.microsoft.icon" />
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">
</head>
<body>
<header>
    <div class="banner-fixed">
        <i class="fas fa-university"></i>
        <span class="armc-highlight"><?= html_escape($site_name); ?></span>
        Autorité de Régulation du Marché des Capitaux du Burundi
        <i class="fas fa-university"></i>
    </div>

    <div class="banner-marquee">
        <div class="marquee-wrapper">
            <div class="marquee-container">
                <div class="marquee-content" id="marqueeContent">
                    <div class="marquee-item"><i class="fas fa-phone"></i> <?= html_escape($site_phone); ?></div>
                    <div class="marquee-item"><i class="fas fa-envelope"></i> <?= html_escape($site_email); ?></div>
                    <div class="marquee-item"><i class="fas fa-map-marker-alt"></i> <?= html_escape($site_address); ?></div>
                    <?php foreach (array_slice(isset($ticker_articles) ? $ticker_articles : array(), 0, 5) as $ticker): ?>
                        <div class="marquee-item"><i class="fas fa-chart-line"></i> <?= html_escape($ticker['titre']); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="marquee-control" id="marqueeControl" title="Pause/Play"><i class="fas fa-pause"></i></button>
        </div>
    </div>

    <div class="logo-wrapper">
        <img src="<?= preg_match('~^https?://~', $logo) ? $logo : base_url(ltrim($logo, '/')); ?>" alt="ARMC Logo" onerror="this.src='https://via.placeholder.com/130x130/eeeeee/006400?text=ARMC'">
    </div>

    <div class="main-header">
        <button class="nav-toggle" id="navToggle" type="button" aria-label="Ouvrir le menu">
            <span></span><span></span><span></span>
        </button>
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="<?= site_url(); ?>" class="active"><i class="fas fa-home"></i></a></li>
                    <?php foreach (isset($menu_tree) ? $menu_tree : array() as $menu): ?>
                        <?php if (!empty($menu['children'])): ?>
                            <li class="dropdown">
                                <a href="<?= $menu['resolved_url']; ?>"><?= html_escape($menu['libelle']); ?> <i class="fas fa-chevron-down"></i></a>
                                <div class="dropdown-content">
                                    <?php foreach ($menu['children'] as $child): ?>
                                        <a href="<?= $child['resolved_url']; ?>" <?= !empty($child['nouvelle_fenetre']) ? 'target="_blank"' : ''; ?>><i class="fas fa-angle-right"></i> <?= html_escape($child['libelle']); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                        <?php else: ?>
                            <li><a href="<?= $menu['resolved_url']; ?>" <?= !empty($menu['nouvelle_fenetre']) ? 'target="_blank"' : ''; ?>><?= html_escape($menu['libelle']); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="page-wrapper">
    <div class="quick-access-sidebar">
        <div class="quick-links">
            <h3><i class="fas fa-link"></i> Accès Rapide</h3>
            <?php foreach (isset($quick_links) ? $quick_links : array() as $quick_link): ?>
                <?php $url = preg_match('~^https?://~', $quick_link['url']) ? $quick_link['url'] : site_url(ltrim($quick_link['url'], '/')); ?>
                <a href="<?= $url; ?>" <?= $quick_link['type_lien'] === 'externe' ? 'target="_blank"' : ''; ?>><i class="fas <?= armc_icon($quick_link['icone']); ?>"></i> <?= html_escape($quick_link['libelle']); ?></a>
            <?php endforeach; ?>
        </div>

        <h3><i class="fas fa-chart-line"></i> Données Rapides</h3>
        <div class="quick-stats">
            <?php foreach (array_slice(isset($home_statistics) ? $home_statistics : array(), 0, 6) as $stat): ?>
                <div class="quick-stat-item">
                    <div class="quick-stat-value"><?= rtrim(rtrim((string) $stat['valeur'], '0'), '.'); ?><?= !empty($stat['unite']) ? ' ' . html_escape($stat['unite']) : ''; ?></div>
                    <div class="quick-stat-label"><?= html_escape($stat['titre']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="sidebar-date">
            <p>Mise à jour: <span><?= date('d/m/Y'); ?></span></p>
        </div>
    </div>
