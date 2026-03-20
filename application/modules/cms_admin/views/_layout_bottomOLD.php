        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suneditor@2.47.6/dist/css/suneditor.min.css">
<script src="https://cdn.jsdelivr.net/npm/suneditor@2.47.6/dist/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/suneditor@2.47.6/src/lang/fr.js"></script>
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

        function updateLiveClock() {
            var now = new Date();
            var days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            var months = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
            var pad = function (n) { return String(n).padStart(2, '0'); };
            var text = days[now.getDay()] + ' ' + pad(now.getDate()) + ' ' + months[now.getMonth()] + ' ' + now.getFullYear() + ' - ' + pad(now.getHours()) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds());
            $('#armc-live-clock').text(text);
        }
        updateLiveClock();
        window.setInterval(updateLiveClock, 1000);

        var targetType = $('#type_cible');
        var targetId = $('#cible_id');
        $('.armc-flash-alert[data-autohide]').each(function () {
            var $alert = $(this);
            var delay = parseInt($alert.data('autohide'), 10) || 8000;
            $alert.css('--flash-duration', (delay / 1000) + 's');
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

        var richEditors = [];
        $('textarea.armc-rich-editor').each(function () {
            var textarea = this;
            var editor = SUNEDITOR.create(textarea, {
                lang: (typeof SUNEDITOR_LANG !== 'undefined' && SUNEDITOR_LANG.fr) ? SUNEDITOR_LANG.fr : undefined,
                width: '100%',
                height: textarea.id === 'contenu' ? '380' : '280',
                minHeight: '220px',
                buttonList: [
                    ['undo', 'redo'],
                    ['formatBlock', 'font', 'fontSize'],
                    ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                    ['fontColor', 'hiliteColor', 'removeFormat'],
                    ['outdent', 'indent'],
                    ['align', 'horizontalRule', 'list', 'lineHeight'],
                    ['table', 'link', 'image', 'video'],
                    ['fullScreen', 'showBlocks', 'codeView', 'preview']
                ],
                formats: ['p', 'div', 'h1', 'h2', 'h3', 'h4', 'blockquote'],
                font: ['Arial', 'Verdana', 'Tahoma', 'Times New Roman', 'Georgia', 'Courier New'],
                imageUploadUrl: '<?= site_url('admin/upload_editor_image'); ?>',
                imageAccept: '.jpg,.jpeg,.png,.gif,.webp,.svg',
                imageMultipleFile: false,
                videoFileInput: false,
                videoUrlInput: true,
                videoRatio: 0.5625,
                videoWidth: '100%',
                attributesWhitelist: {
                    all: 'style|class|id|data-.+|allowfullscreen|frameborder|scrolling',
                    iframe: 'style|class|src|width|height|name|align|allow|allowfullscreen|frameborder|scrolling'
                }
            });

            var syncEditor = function () {
                textarea.value = editor.getContents();
            };

            editor.onChange = function (contents) {
                textarea.value = contents;
            };

            editor.onBlur = function () {
                syncEditor();
            };

            editor.onImageUploadError = function (message) {
                alert(message);
            };

            if (textarea.form) {
                textarea.form.addEventListener('submit', syncEditor);
            }

            richEditors.push({ textarea: textarea, editor: editor, sync: syncEditor });
        });

        $('form').on('submit', function () {
            richEditors.forEach(function (item) { item.sync(); });
            var firstInvalid = null;

            richEditors.forEach(function (item) {
                if (item.textarea.dataset.editorRequired !== '1') {
                    return;
                }

                var html = item.textarea.value || '';
                var normalized = html.replace(/&(nbsp|#160);/gi, ' ').replace(/\s+/g, ' ').trim();
                var hasText = $('<div>').html(normalized).text().replace(/\s+/g, '').length > 0;
                var hasMedia = /<(img|iframe|video|audio|embed|object|table|svg|canvas)\b/i.test(html);

                if (!hasText && !hasMedia) {
                    firstInvalid = item.editor;
                    var label = $('label[for="' + item.textarea.id + '"]').text().trim() || 'contenu';
                    alert('Le champ ' + label.replace('*', '').trim() + ' est obligatoire.');
                }
            });

            if (firstInvalid) {
                firstInvalid.focus();
                return false;
            }
        });
    });
</script>
</body>
</html>
