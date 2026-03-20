<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration ARMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root {
            --armc-green:#0e5a24;
            --armc-green-2:#177436;
            --armc-soft:#f6f8fb;
            --armc-border:#e9eef5;
            --armc-text:#102a43;
        }
        html, body { height:100%; }
        body { background: var(--armc-soft); color:var(--armc-text); }
        .sidebar { min-height: 100vh; max-height:100vh; overflow-y:auto; position:sticky; top:0; background: linear-gradient(180deg, var(--armc-green) 0%, var(--armc-green-2) 100%); }
        .sidebar a { color: #fff; text-decoration: none; display:block; padding:10px 14px; border-radius:10px; margin-bottom:6px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,.14); }
        .sidebar-brand { display:flex; align-items:center; justify-content:center; min-height:68px; margin-bottom:1rem; }
        .sidebar-brand img { max-width:52px; max-height:52px; object-fit:contain; background:#fff; border-radius:14px; padding:6px; }
        .main-shell { min-height:100vh; }
        .topbar { position:sticky; top:0; z-index:1030; background:rgba(246,248,251,.95); backdrop-filter: blur(8px); border-bottom:1px solid var(--armc-border); margin:-1.5rem -1.5rem 1.5rem; padding:1rem 1.5rem; }
        .topbar-grid { display:grid; grid-template-columns:minmax(0,1fr) auto minmax(0,1fr); align-items:center; gap:1rem; }
        .live-clock { text-align:center; font-weight:700; color:#155724; letter-spacing:.02em; white-space:nowrap; }
        .topbar-user { display:flex; align-items:center; justify-content:flex-end; gap:.75rem; }
        .avatar-badge { width:40px; height:40px; border-radius:50%; background:#dff3e5; color:var(--armc-green); display:flex; align-items:center; justify-content:center; font-weight:700; }
        .card-kpi, .content-card { border:0; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08); background:#fff; }
        .content-card { padding: 1rem; }
        .table-responsive { background:#fff; border-radius:14px; padding: 10px; box-shadow:0 8px 24px rgba(0,0,0,.05); }
        .section-card { border: 1px solid var(--armc-border); border-radius: 16px; padding: 1.25rem; background: #fff; box-shadow: 0 6px 18px rgba(15, 23, 42, .04); height: 100%; }
        .section-card h5 { color: #155724; font-weight: 700; margin-bottom: .25rem; }
        .section-header { margin-bottom: 1rem; padding-bottom: .75rem; border-bottom: 1px solid #eef2f7; }
        .form-label { font-weight: 600; margin-bottom: .45rem; }
        .form-control, .form-select { min-height: 44px; border-radius: 12px; }
        textarea.form-control { min-height: 140px; }
        .file-preview { background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:.75rem; }
        .thumb-preview { max-width: 160px; max-height: 100px; border-radius:10px; border:1px solid #dee2e6; }
        .detail-card { border: 1px solid #e8edf3; border-radius: 14px; padding: 1rem; background: #fbfcfe; }
        .detail-label { font-size: .85rem; font-weight: 700; color: #486581; margin-bottom: .35rem; }
        .detail-value { color: #102a43; word-break: break-word; }
        .badge-soft { background:#e9f7ef; color:#146c43; }
        .dataTables_wrapper .dataTables_filter input { margin-left:.5rem; }
        .armc-flash-alert { position:relative; overflow:hidden; }
        .armc-flash-alert::after { content:""; position:absolute; left:0; bottom:0; height:3px; width:100%; background:rgba(255,255,255,.55); animation:armcFlashCountdown linear forwards; animation-duration:var(--flash-duration, 8s); }
        .armc-editor-wrap .sun-editor { border-radius:12px; border-color:#ced4da; }
        .armc-editor-wrap .sun-editor .se-wrapper-inner { min-height:320px; }
        @keyframes armcFlashCountdown { from { width:100%; } to { width:0%; } }
        @media (max-width: 991.98px) {
            .sidebar { min-height:auto; max-height:none; position:relative; }
            .topbar-grid { grid-template-columns:1fr; }
            .live-clock, .topbar-user { justify-content:center; text-align:center; }
        }
    </style>
</head>
<body>
<?php
$cms_admin = $this->session->userdata('cms_admin');
$current_uri = uri_string();
$display_name = trim((!empty($cms_admin['prenom']) ? $cms_admin['prenom'] : '') . ' ' . (!empty($cms_admin['nom']) ? $cms_admin['nom'] : ''));
if ($display_name === '') {
    $display_name = !empty($cms_admin['email']) ? $cms_admin['email'] : 'Administrateur';
}
$avatar_letters = strtoupper(substr(trim((!empty($cms_admin['prenom']) ? $cms_admin['prenom'] : '') . (!empty($cms_admin['nom']) ? $cms_admin['nom'] : 'AR')), 0, 2));
$logo_candidates = array(
    FCPATH . 'assets/img/logo-armc.png' => base_url('assets/img/logo-armc.png'),
    FCPATH . 'assets/img/logo.png' => base_url('assets/img/logo.png'),
    FCPATH . 'assets/img/armc-logo.png' => base_url('assets/img/armc-logo.png')
);
$logo_url = '';
foreach ($logo_candidates as $candidate_path => $candidate_url) {
    if (is_file($candidate_path)) {
        $logo_url = $candidate_url;
        break;
    }
}
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <aside class="col-lg-2 col-md-3 sidebar p-3">
            <div class="sidebar-brand">
                <?php if ($logo_url !== ''): ?>
                    <img src="<?= $logo_url; ?>" alt="ARMC">
                <?php else: ?>
                    <div class="text-white fw-bold">ARMC</div>
                <?php endif; ?>
            </div>
            <a class="<?= $current_uri === 'admin' ? 'active' : ''; ?>" href="<?= site_url('admin'); ?>">Dashboard</a>
            <?php foreach (array('articles','pages','documents','categories','menus','sliders','quick_links','statistics_data','settings','users','newsletters','contact_messages','complaints','alerts') as $nav_table): ?>
                <a class="<?= strpos($current_uri, 'admin/list/' . $nav_table) !== FALSE ? 'active' : ''; ?>" href="<?= site_url('admin/list/' . $nav_table); ?>"><?= ucfirst(str_replace('_', ' ', $nav_table)); ?></a>
            <?php endforeach; ?>
            <a href="<?= site_url(); ?>" target="_blank">Voir le site</a>
            <a href="<?= site_url('admin/logout'); ?>">Déconnexion</a>
        </aside>
        <main class="col-lg-10 col-md-9 p-4 main-shell">
            <div class="topbar">
                <div class="topbar-grid">
                    <div></div>
                    <div class="live-clock" id="armc-live-clock">--/--/---- --:--:--</div>
                    <div class="topbar-user">
                        <div class="text-end">
                            <div class="fw-semibold"><?= html_escape($display_name); ?></div>
                            <?php if (!empty($cms_admin['email'])): ?><div class="small text-muted"><?= html_escape($cms_admin['email']); ?></div><?php endif; ?>
                        </div>
                        <div class="avatar-badge"><?= html_escape($avatar_letters); ?></div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success armc-flash-alert" data-autohide="8000"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger armc-flash-alert" data-autohide="8000"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
