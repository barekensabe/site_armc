        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function () {
        $('.datatable').DataTable({
            pageLength: 25,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'Tout']],
            order: [],
            language: {
                decimal: '',
                emptyTable: 'Aucune donnée disponible',
                info: 'Affichage de _START_ à _END_ sur _TOTAL_ éléments',
                infoEmpty: 'Affichage de 0 à 0 sur 0 élément',
                infoFiltered: '(filtré sur _MAX_ éléments au total)',
                lengthMenu: 'Afficher _MENU_ éléments',
                loadingRecords: 'Chargement...',
                processing: 'Traitement...',
                search: 'Rechercher :',
                zeroRecords: 'Aucun résultat trouvé',
                paginate: {
                    first: 'Premier',
                    last: 'Dernier',
                    next: 'Suivant',
                    previous: 'Précédent'
                }
            }
        });

        var targetType = $('#type_cible');
        var targetId = $('#cible_id');
        if (targetType.length && targetId.length) {
            var menuTargets = window.armcMenuTargets || {};
            function refreshMenuTargets() {
                var selectedType = targetType.val();
                var currentValue = targetId.data('current') || '';
                var options = menuTargets[selectedType] || {};
                targetId.empty();
                targetId.append('<option value="">Sélectionner</option>');
                $.each(options, function (value, label) {
                    var selected = String(currentValue) === String(value) ? ' selected' : '';
                    targetId.append('<option value="' + value + '"' + selected + '>' + label + '</option>');
                });
            }
            targetType.on('change', function () {
                targetId.data('current', '');
                refreshMenuTargets();
            });
            refreshMenuTargets();
        }
    });
</script>
</body>
</html>
