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
        $('.armc-flash-alert[data-autohide]').each(function () {
            var $alert = $(this);
            var delay = parseInt($alert.data('autohide'), 10) || 10000;
            setTimeout(function () {
                $alert.fadeOut(400, function () {
                    $(this).remove();
                });
            }, delay);
        });

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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    window.armcEditors = window.armcEditors || {};

    function armcSlugify(value) {
        return (value || '')
            .toString()
            .normalize('NFD')
            .replace(/[̀-ͯ]/g, '')
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '')
            .replace(/-{2,}/g, '-');
    }

    function armcInitWysiwyg() {
        $('.armc-wysiwyg').each(function () {
            var element = this;
            if (element.dataset.editorReady === '1') {
                return;
            }
            ClassicEditor.create(element, {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'underline', 'link', '|',
                    'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            }).then(function (editor) {
                window.armcEditors[element.id] = editor;
                element.dataset.editorReady = '1';
            }).catch(function (error) {
                console.error('CKEditor init error:', error);
            });
        });
    }

    function armcBindSlugFields() {
        var slugField = $('.armc-slug-field');
        if (!slugField.length) {
            return;
        }

        slugField.on('input blur', function () {
            $(this).val(armcSlugify($(this).val()));
        });

        $('.armc-slug-source').on('input blur', function () {
            var targetId = $(this).data('slug-target') || 'slug';
            var $target = $('#' + targetId);
            if (!$target.length) {
                return;
            }

            if ($target.val().trim() !== '') {
                return;
            }

            $target.val(armcSlugify($(this).val()));
        });
    }

    $(function () {
        armcInitWysiwyg();
        armcBindSlugFields();
    });
</script>
</body>
</html>
