<?php $this->load->view('_layout_top'); ?>
<?php $cardStyles = array('articles'=>'linear-gradient(135deg,#0d6efd,#4dabf7)','pages'=>'linear-gradient(135deg,#198754,#51cf66)','documents'=>'linear-gradient(135deg,#6f42c1,#9775fa)','categories'=>'linear-gradient(135deg,#fd7e14,#ffa94d)','menus'=>'linear-gradient(135deg,#20c997,#63e6be)','utilisateurs'=>'linear-gradient(135deg,#e83e8c,#f783ac)','messages'=>'linear-gradient(135deg,#dc3545,#ff8787)','plaintes'=>'linear-gradient(135deg,#6610f2,#b197fc)','alertes'=>'linear-gradient(135deg,#ffc107,#ffe066)','newsletters'=>'linear-gradient(135deg,#343a40,#868e96)','visiteurs'=>'linear-gradient(135deg,#0dcaf0,#74c0fc)','vues'=>'linear-gradient(135deg,#198754,#20c997)'); ?>
<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
    <div>
        <h2 class="mb-1">Tableau de bord</h2>
        <p class="text-muted mb-0">Vue d'ensemble de l'activité du CMS ARMC.</p>
    </div>
</div>
<div class="row g-3">
<?php foreach ($counts as $label => $value): ?>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-kpi text-white h-100" style="background: <?= isset($cardStyles[$label]) ? $cardStyles[$label] : 'linear-gradient(135deg,#0e5a24,#177436)'; ?>;">
            <div class="card-body">
                <div class="small text-uppercase opacity-75"><?= html_escape(str_replace('_',' ',$label)); ?></div>
                <div class="display-6 fw-bold"><?= number_format((float)$value, 0, ',', ' '); ?></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<div class="row g-4 mt-1">
    <div class="col-xl-7">
        <div class="content-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Répartition des contenus</h5>
                <span class="badge text-bg-light">Statistiques clés</span>
            </div>
            <canvas id="contentChart" height="120"></canvas>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="content-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Pages les plus consultées</h5>
                <span class="badge text-bg-light">Top 10</span>
            </div>
            <?php if (!empty($top_pages)): ?>
            <canvas id="pagesChart" height="180"></canvas>
            <?php else: ?><p class="text-muted mb-0">Aucune statistique visiteur disponible pour le moment.</p><?php endif; ?>
        </div>
    </div>
</div>
<div class="row g-4 mt-1">
    <div class="col-xl-12">
        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Dernières visites enregistrées</h5>
                <span class="badge text-bg-light">Journal enrichi</span>
            </div>
            <?php if (!empty($recent_visitors)): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 datatable">
                        <thead><tr><th>IP</th><th>Page</th><th>Navigateur</th><th>Système</th><th>Utilisateur</th><th>Date</th></tr></thead>
                        <tbody>
                        <?php foreach ($recent_visitors as $visit): ?>
                            <tr>
                                <td><?= html_escape($visit['ip_adresse']); ?></td>
                                <td><?= html_escape($visit['page_label']); ?></td>
                                <td><?= html_escape(isset($visit['browser_used']) ? $visit['browser_used'] : ''); ?></td>
                                <td><?= html_escape(isset($visit['operating_system']) ? $visit['operating_system'] : ''); ?></td>
                                <td><?= html_escape(isset($visit['username']) ? $visit['username'] : ''); ?></td>
                                <td><?= html_escape($visit['date_time']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?><p class="text-muted mb-0">Aucune visite enregistrée pour le moment.</p><?php endif; ?>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded',function(){
    var ctx=document.getElementById('contentChart');
    if(ctx){new Chart(ctx,{type:'bar',data:{labels:['Articles','Pages','Documents','Catégories','Menus','Utilisateurs','Messages','Plaintes','Alertes'],datasets:[{label:'Total',data:[<?= (int)($counts['articles']??0); ?>,<?= (int)($counts['pages']??0); ?>,<?= (int)($counts['documents']??0); ?>,<?= (int)($counts['categories']??0); ?>,<?= (int)($counts['menus']??0); ?>,<?= (int)($counts['utilisateurs']??0); ?>,<?= (int)($counts['messages']??0); ?>,<?= (int)($counts['plaintes']??0); ?>,<?= (int)($counts['alertes']??0); ?>]}]},options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{callback:(value)=>armcFormatNumber(value)}}}});}
    var ctx2=document.getElementById('pagesChart');
    if(ctx2){new Chart(ctx2,{type:'doughnut',data:{labels:<?= json_encode(array_map(function($p){return $p['page_label'];}, $top_pages)); ?>,datasets:[{data:<?= json_encode(array_map(function($p){return (int)$p['views'];}, $top_pages)); ?>}]},options:{plugins:{legend:{position:'bottom'}}}});}
});
</script>
<?php $this->load->view('_layout_bottom'); ?>
