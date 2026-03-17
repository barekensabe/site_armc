<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration ARMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body { background: #f6f8fb; }
        .sidebar { min-height: 100vh; background: linear-gradient(180deg, #0e5a24 0%, #177436 100%); }
        .sidebar a { color: #fff; text-decoration: none; display:block; padding:10px 14px; border-radius:10px; margin-bottom:6px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,.14); }
        .card-kpi, .content-card { border:0; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08); background:#fff; }
        .content-card { padding: 1rem; }
        .table-responsive { background:#fff; border-radius:14px; padding: 10px; box-shadow:0 8px 24px rgba(0,0,0,.05); }
        .section-card { border: 1px solid #e9eef5; border-radius: 16px; padding: 1.25rem; background: #fff; box-shadow: 0 6px 18px rgba(15, 23, 42, .04); height: 100%; }
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 sidebar p-3">
            <h4 class="text-white mb-4">ARMC Admin</h4>
            <?php $current_uri = uri_string(); ?>
            <a class="<?= $current_uri === 'admin' ? 'active' : ''; ?>" href="<?= site_url('admin'); ?>">Dashboard</a>
            <?php foreach (array('articles','pages','documents','categories','menus','sliders','quick_links','statistics_data','settings','users','newsletters','contact_messages','complaints','alerts') as $nav_table): ?>
                <a class="<?= strpos($current_uri, 'admin/list/' . $nav_table) !== FALSE ? 'active' : ''; ?>" href="<?= site_url('admin/list/' . $nav_table); ?>"><?= ucfirst(str_replace('_', ' ', $nav_table)); ?></a>
            <?php endforeach; ?>
            <a href="<?= site_url(); ?>" target="_blank">Voir le site</a>
            <a href="<?= site_url('admin/logout'); ?>">Déconnexion</a>
        </aside>
        <main class="col-md-9 col-lg-10 p-4">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success armc-flash-alert" data-autohide="10000"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger armc-flash-alert" data-autohide="10000"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
