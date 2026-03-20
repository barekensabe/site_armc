<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration ARMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --armc-green:#0e5a24; --armc-green-2:#177436; --armc-soft:#f6f8fb; --armc-border:#e9eef5; --armc-text:#102a43; }
        html, body { height:100%; }
        body { background: var(--armc-soft); color:var(--armc-text); }
        .sidebar { min-height:100vh; max-height:100vh; overflow-y:auto; position:sticky; top:0; background: linear-gradient(180deg, var(--armc-green) 0%, var(--armc-green-2) 100%); }
        .sidebar::-webkit-scrollbar { width:8px; }
        .sidebar::-webkit-scrollbar-thumb { background:rgba(255,255,255,.25); border-radius:999px; }
        .sidebar-brand { display:flex; align-items:center; gap:.75rem; min-height:68px; margin-bottom:1rem; color:#fff; }
        .sidebar-brand img { width:48px; height:48px; object-fit:contain; background:#fff; border-radius:14px; padding:6px; }
        .sidebar-brand-text { font-weight:700; line-height:1.1; }
        .sidebar a { color:#fff; text-decoration:none; display:flex; align-items:center; gap:.7rem; padding:10px 14px; border-radius:10px; margin-bottom:6px; font-weight:500; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,.14); }
        .sidebar a i { font-size:1rem; width:18px; text-align:center; }
        .main-shell { min-height:100vh; }
        .topbar { position:sticky; top:0; z-index:1030; background:rgba(246,248,251,.95); backdrop-filter: blur(8px); border-bottom:1px solid var(--armc-border); margin:-1.5rem -1.5rem 1.5rem; padding:1rem 1.5rem; }
        .topbar-grid { display:grid; grid-template-columns:minmax(0,1fr) auto minmax(0,1fr); align-items:center; gap:1rem; }
        .topbar-brand { display:flex; align-items:center; gap:.75rem; }
        .topbar-brand img { width:42px; height:42px; object-fit:contain; }
        .live-clock { text-align:center; font-weight:700; color:#155724; letter-spacing:.02em; white-space:nowrap; display:flex; align-items:center; justify-content:center; gap:.55rem; }
        .topbar-user { display:flex; align-items:center; justify-content:flex-end; gap:.75rem; }
        .avatar-badge, .avatar-photo { width:42px; height:42px; border-radius:50%; object-fit:cover; border:2px solid #dff3e5; background:#dff3e5; }
        .avatar-badge { color:var(--armc-green); display:flex; align-items:center; justify-content:center; font-weight:700; }
        .card-kpi, .content-card { border:0; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08); background:#fff; }
        .content-card { padding: 1rem; }
        .table-responsive { background:#fff; border-radius:14px; padding:10px; box-shadow:0 8px 24px rgba(0,0,0,.05); }
        .section-card { border:1px solid var(--armc-border); border-radius:16px; padding:1.25rem; background:#fff; box-shadow:0 6px 18px rgba(15,23,42,.04); height:100%; }
        .section-card h5 { color:#155724; font-weight:700; margin-bottom:.25rem; }
        .section-header { margin-bottom:1rem; padding-bottom:.75rem; border-bottom:1px solid #eef2f7; }
        .form-label { font-weight:600; margin-bottom:.45rem; }
        .form-control, .form-select { min-height:44px; border-radius:12px; }
        textarea.form-control { min-height:140px; }
        .file-preview { background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:.75rem; }
        .thumb-preview { max-width:160px; max-height:100px; border-radius:10px; border:1px solid #dee2e6; }
        .detail-card { border:1px solid #e8edf3; border-radius:14px; padding:1rem; background:#fbfcfe; }
        .detail-label { font-size:.85rem; font-weight:700; color:#486581; margin-bottom:.35rem; }
        .detail-value { color:#102a43; word-break:break-word; }
        .badge-soft { background:#e9f7ef; color:#146c43; }
        .dataTables_wrapper .dataTables_filter input { margin-left:.5rem; }
        .dt-buttons .btn { margin-right:.35rem; }
        .armc-flash-alert { position:relative; overflow:hidden; }
        .armc-flash-alert::after { content:""; position:absolute; left:0; bottom:0; height:3px; width:100%; background:rgba(255,255,255,.55); animation:armcFlashCountdown linear forwards; animation-duration:var(--flash-duration, 8s); }
        .armc-editor-wrap .sun-editor { border-radius:12px; border-color:#ced4da; }
        .armc-editor-wrap .sun-editor .se-wrapper-inner { min-height:320px; }
        @keyframes armcFlashCountdown { from { width:100%; } to { width:0%; } }
        @media (max-width: 991.98px) {
            .sidebar { min-height:auto; max-height:none; position:relative; }
            .topbar-grid { grid-template-columns:1fr; }
            .topbar-brand, .live-clock, .topbar-user { justify-content:center; text-align:center; }
        }
    </style>
</head>
<body>
<?php
$cms_admin = $this->session->userdata('cms_admin');
$current_uri = uri_string();
$display_name = trim((!empty($cms_admin['prenom']) ? $cms_admin['prenom'] : '') . ' ' . (!empty($cms_admin['nom']) ? $cms_admin['nom'] : ''));
if ($display_name === '') { $display_name = !empty($cms_admin['email']) ? $cms_admin['email'] : 'Administrateur'; }
$avatar_letters = strtoupper(substr(trim((!empty($cms_admin['prenom']) ? $cms_admin['prenom'] : '') . (!empty($cms_admin['nom']) ? $cms_admin['nom'] : 'AR')), 0, 2));
$logo_candidates = array(
    FCPATH . 'assets/img/logo-armc.png' => base_url('assets/img/logo-armc.png'),
    FCPATH . 'assets/img/logo.png' => base_url('assets/img/logo.png'),
    FCPATH . 'upload/cms/logo.png' => base_url('upload/cms/logo.png'),
    FCPATH . 'assets/img/armc-logo.png' => base_url('assets/img/armc-logo.png')
);
$logo_url = '';
foreach ($logo_candidates as $candidate_path => $candidate_url) {
    if (is_file($candidate_path)) { $logo_url = $candidate_url; break; }
}
$photo_url = '';
if (!empty($cms_admin['photo_profil'])) {
    $photo_url = preg_match('#^https?://#i', $cms_admin['photo_profil']) ? $cms_admin['photo_profil'] : base_url(ltrim($cms_admin['photo_profil'], '/'));
}
$menu_icons = array(
    'admin' => 'bi-speedometer2', 'articles' => 'bi-newspaper', 'pages' => 'bi-file-earmark-richtext',
    'documents' => 'bi-folder2-open', 'categories' => 'bi-tags', 'menus' => 'bi-menu-button-wide',
    'sliders' => 'bi-images', 'quick_links' => 'bi-link-45deg', 'statistics_data' => 'bi-bar-chart-line',
    'settings' => 'bi-gear', 'users' => 'bi-people', 'newsletters' => 'bi-envelope-paper',
    'contact_messages' => 'bi-chat-dots', 'complaints' => 'bi-shield-exclamation', 'alerts' => 'bi-bell',
    'site' => 'bi-globe2', 'password' => 'bi-key', 'logout' => 'bi-box-arrow-right'
);
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <aside class="col-lg-2 col-md-3 sidebar p-3">
            <div class="sidebar-brand">
                <?php if ($logo_url !== ''): ?><img src="<?= $logo_url; ?>" alt="ARMC"><?php endif; ?>
                <div class="sidebar-brand-text">ARMC<br><small class="fw-normal opacity-75">Administration</small></div>
            </div>
            <a class="<?= $current_uri === 'admin' ? 'active' : ''; ?>" href="<?= site_url('admin'); ?>"><i class="<?= $menu_icons['admin']; ?>"></i><span>Dashboard</span></a>
            <?php foreach (array('articles','pages','documents','categories','menus','sliders','quick_links','statistics_data','settings','users','newsletters','contact_messages','complaints','alerts') as $nav_table): ?>
                <a class="<?= strpos($current_uri, 'admin/list/' . $nav_table) !== FALSE ? 'active' : ''; ?>" href="<?= site_url('admin/list/' . $nav_table); ?>"><i class="<?= isset($menu_icons[$nav_table]) ? $menu_icons[$nav_table] : 'bi-circle'; ?>"></i><span><?= ucfirst(str_replace('_', ' ', $nav_table)); ?></span></a>
            <?php endforeach; ?>
            <a class="<?= strpos($current_uri, 'admin/change_password') !== FALSE ? 'active' : ''; ?>" href="<?= site_url('admin/change_password'); ?>"><i class="<?= $menu_icons['password']; ?>"></i><span>Modifier mot de passe</span></a>
            <a href="<?= site_url(); ?>" target="_blank"><i class="<?= $menu_icons['site']; ?>"></i><span>Voir le site</span></a>
            <a href="<?= site_url('admin/logout'); ?>"><i class="<?= $menu_icons['logout']; ?>"></i><span>Déconnexion</span></a>
        </aside>
        <main class="col-lg-10 col-md-9 p-4 main-shell">
            <div class="topbar">
                <div class="topbar-grid">
                    <div class="topbar-brand"><?php if ($logo_url !== ''): ?><img src="<?= $logo_url; ?>" alt="ARMC"><?php endif; ?><div><div class="fw-semibold">ARMC</div><div class="small text-muted">Espace administration</div></div></div>
                    <div class="live-clock" id="armc-live-clock"><i class="bi bi-calendar3"></i><span>--/--/---- --:--:--</span></div>
                    <div class="topbar-user">
                        <div class="text-end"><div class="fw-semibold"><?= html_escape($display_name); ?></div><?php if (!empty($cms_admin['email'])): ?><div class="small text-muted"><?= html_escape($cms_admin['email']); ?></div><?php endif; ?></div>
                        <?php if ($photo_url !== ''): ?><img src="<?= $photo_url; ?>" alt="<?= html_escape($display_name); ?>" class="avatar-photo"><?php else: ?><div class="avatar-badge"><?= html_escape($avatar_letters); ?></div><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')): ?><div class="alert alert-success armc-flash-alert" data-autohide="8000"><?= $this->session->flashdata('success'); ?></div><?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?><div class="alert alert-danger armc-flash-alert" data-autohide="8000"><?= $this->session->flashdata('error'); ?></div><?php endif; ?>
