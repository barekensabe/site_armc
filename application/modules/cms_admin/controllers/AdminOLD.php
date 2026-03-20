<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    /** @var array<int, string> */
    protected $managed_tables = array(
        'articles',
        'pages',
        'documents',
        'categories',
        'menus',
        'sliders',
        'quick_links',
        'statistics_data',
        'settings',
        'users',
        'newsletters',
        'contact_messages',
        'complaints',
        'alerts'
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cms_model');
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent'));
    }

    public function index()
    {
        $this->require_auth();
        $data['counts'] = $this->Cms_model->get_dashboard_counts();
        $data['managed_tables'] = $this->managed_tables;
        $data['top_pages'] = $this->Cms_model->get_top_viewed_pages(10);
        $data['recent_visitors'] = $this->Cms_model->get_recent_visitor_activity(15);
        $this->load->view('dashboard', $data);
    }

    public function login()
    {
        if ($this->input->method() === 'post') {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $user = $this->Cms_model->authenticate_user($email, $password);

            if ($user) {
                $this->session->set_userdata('cms_admin', array(
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'email' => $user['email'],
                    'photo_profil' => isset($user['photo_profil']) ? $user['photo_profil'] : ''
                ));
                redirect('admin');
                return;
            }

            $this->session->set_flashdata('error', 'Identifiants invalides.');
            redirect('admin/login');
            return;
        }

        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->unset_userdata('cms_admin');
        redirect('admin/login');
    }

    public function list($table = NULL)
    {
        $this->require_auth();
        $this->validate_table($table);

        $data['table'] = $table;
        $data['rows'] = $this->Cms_model->get_table_rows($table, 2000);
        $data['fields'] = $this->Cms_model->get_table_fields($table);
        $this->load->view('list', $data);
    }

    public function detail($table = NULL, $id = NULL)
    {
        $this->require_auth();
        $this->validate_table($table);

        $row = $this->Cms_model->get_row($table, $id);
        if (empty($row)) {
            show_404();
        }

        $data = array(
            'table' => $table,
            'row' => $row,
            'details' => $this->Cms_model->get_table_row_details($table, $id)
        );

        $this->load->view('detail', $data);
    }

    public function create($table = NULL)
    {
        $this->require_auth();
        $this->validate_table($table);

        if ($this->input->method() === 'post') {
            if (!$this->validate_form($table, array())) {
                $this->render_form($table, $this->input->post(NULL, FALSE) ?: array());
                return;
            }

            $data = $this->collect_post_data($table);
            if ($this->Cms_model->insert_row($table, $data)) {
                $this->session->set_flashdata('success', 'Enregistrement créé avec succès.');
                redirect('admin/list/' . $table);
                return;
            }

            $this->session->set_flashdata('error', $this->get_db_error_message('Impossible de créer cet enregistrement.'));
            $this->render_form($table, array_merge($this->input->post(NULL, FALSE) ?: array(), $data));
            return;
        }

        $this->render_form($table, array());
    }

    public function edit($table = NULL, $id = NULL)
    {
        $this->require_auth();
        $this->validate_table($table);
        $row = $this->Cms_model->get_row($table, $id);

        if (empty($row)) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            if (!$this->validate_form($table, $row)) {
                $row = array_merge($row, $this->input->post(NULL, FALSE) ?: array());
                $this->render_form($table, $row);
                return;
            }

            $data = $this->collect_post_data($table, $row);
            if ($this->Cms_model->update_row($table, $id, $data)) {
                $this->session->set_flashdata('success', 'Enregistrement mis à jour.');
                redirect('admin/list/' . $table);
                return;
            }

            $this->session->set_flashdata('error', $this->get_db_error_message('La mise à jour a échoué.'));
            $row = array_merge($row, $this->input->post(NULL, FALSE) ?: array(), $data);
            $this->render_form($table, $row);
            return;
        }

        $this->render_form($table, $row);
    }

    public function delete($table = NULL, $id = NULL)
    {
        $this->require_auth();
        $this->validate_table($table);
        $this->Cms_model->delete_row($table, $id);
        $this->session->set_flashdata('success', 'Enregistrement supprimé.');
        redirect('admin/list/' . $table);
    }

    public function toggle($table = NULL, $id = NULL)
    {
        $this->require_auth();
        $this->validate_table($table);
        $row = $this->Cms_model->get_row($table, $id);
        if (!$row) {
            show_404();
        }

        $field = $this->resolve_toggle_field($table, $row);
        if ($field === NULL) {
            $this->session->set_flashdata('error', 'Aucun champ de publication/désactivation sur cette table.');
            redirect('admin/list/' . $table);
            return;
        }

        $new_value = $this->get_toggled_value($field, $row[$field]);
        $payload = array($field => $new_value);
        $payload = array_merge($payload, $this->get_audit_data($table, FALSE));
        $this->Cms_model->update_row($table, $id, $payload);
        $this->session->set_flashdata('success', 'Statut modifié avec succès.');
        redirect('admin/list/' . $table);
    }

    protected function render_form($table, $row)
    {
        $fields = $this->Cms_model->get_table_fields($table);
        $ui_meta = array();

        foreach ($fields as $field) {
            $ui_meta[$field->name] = $this->Cms_model->get_field_ui_meta($table, $field->name);
        }

        $data = array(
            'table' => $table,
            'row' => $row,
            'fields' => $fields,
            'ui_meta' => $ui_meta,
            'menu_target_options' => $this->get_menu_target_options(),
            'form_sections' => $this->get_form_sections($table),
            'hidden_fields' => $this->get_hidden_fields($table),
            'required_fields' => $this->get_required_fields($table, $row)
        );

        $this->load->view('form', $data);
    }


    protected function is_rich_editor_field($field_name)
    {
        return in_array($field_name, array('contenu', 'description'), TRUE);
    }

    protected function rich_content_has_meaningful_value($value)
    {
        if (!is_string($value)) {
            return FALSE;
        }

        $normalized = preg_replace('/&(nbsp|#160);/i', ' ', $value);
        $normalized = preg_replace('/\s+/u', ' ', (string) $normalized);
        $text = trim(strip_tags($normalized));

        if ($text !== '') {
            return TRUE;
        }

        return (bool) preg_match('/<(img|iframe|video|audio|embed|object|table|svg|canvas)\b/i', $value);
    }

    public function validate_rich_content($value, $field_name)
    {
        $raw_value = $this->input->post($field_name, FALSE);
        if ($this->rich_content_has_meaningful_value($raw_value)) {
            return TRUE;
        }

        $label_map = array(
            'contenu' => 'contenu',
            'description' => 'description'
        );
        $label = isset($label_map[$field_name]) ? $label_map[$field_name] : ucfirst(str_replace('_', ' ', $field_name));
        $this->form_validation->set_message('validate_rich_content', 'Le champ ' . $label . ' est obligatoire.');
        return FALSE;
    }


    protected function validate_form($table, array $existing_row = array())
    {
        $this->form_validation->reset_validation();

        $required_fields = $this->get_required_fields($table, $existing_row);
        $label_map = array(
            'categorie_id' => 'catégorie',
            'auteur_id' => 'auteur',
            'titre' => 'titre',
            'contenu' => 'contenu',
            "type_article" => "type d'article",
            'statut' => 'statut',
            'libelle' => 'libellé',
            'nom' => 'nom',
            'email' => 'email'
        );

        foreach ($required_fields as $field_name) {
            $label = isset($label_map[$field_name]) ? $label_map[$field_name] : ucfirst(str_replace('_', ' ', $field_name));
            if ($this->is_rich_editor_field($field_name)) {
                $this->form_validation->set_rules($field_name, $label, 'callback_validate_rich_content[' . $field_name . ']');
            } else {
                $this->form_validation->set_rules($field_name, $label, 'trim|required');
            }
        }

        $this->form_validation->set_message('required', 'Le champ %s est obligatoire.');

        return $this->form_validation->run();
    }

    protected function collect_post_data($table, $existing_row = array())
    {
        $fields = $this->Cms_model->get_table_fields($table);
        $row = array();
        $pk = $this->Cms_model->get_pk($table);
        $is_update = !empty($existing_row);
        $hidden_fields = $this->get_hidden_fields($table);
        $uploaded_files = array();

        foreach ($fields as $field) {
            $name = $field->name;
            if ($name === $pk || in_array($name, $hidden_fields, TRUE)) {
                continue;
            }

            if ($name === 'password_hash') {
                $raw_password = $this->input->post('password_plain', TRUE);
                if (!empty($raw_password)) {
                    $row[$name] = password_hash($raw_password, PASSWORD_DEFAULT);
                }
                continue;
            }

            if ($this->is_file_field($name)) {
                $upload_data = $this->handle_file_upload($name);
                if ($upload_data !== NULL) {
                    $row[$name] = 'upload/cms/' . $upload_data['file_name'];
                    $uploaded_files[$name] = $upload_data;
                } elseif ($is_update && isset($existing_row[$name])) {
                    $row[$name] = $existing_row[$name];
                }
                continue;
            }

            $value = $this->input->post($name, $this->is_rich_text_field($name) ? FALSE : TRUE);

            if (is_string($value) && !$this->is_rich_text_field($name)) {
                $value = trim($value);
            }

            if ($field->type === 'tinyint') {
                $row[$name] = empty($value) ? 0 : 1;
                continue;
            }

            if (is_string($value) && strpos($name, 'date') !== FALSE) {
                $value = trim(str_replace('T', ' ', $value));
                if ($value !== '' && strlen($value) === 16) {
                    $value .= ':00';
                }
            }

            if ($value === '') {
                $value = NULL;
            }

            $row[$name] = $value;
        }

        $row = array_merge($row, $this->get_audit_data($table, !$is_update, $row, $existing_row));
        $this->apply_computed_fields($table, $row, $uploaded_files, !$is_update, $existing_row);

        $now = date('Y-m-d H:i:s');
        if (array_key_exists('slug', $row)) {
            $row['slug'] = $this->normalize_slug($row['slug']);
        }

        if (in_array($table, array('articles', 'pages', 'documents'), TRUE)) {
            if (empty($row['slug']) && !empty($row['titre'])) {
                $row['slug'] = $this->normalize_slug($row['titre']);
            }
            if (empty($row['date_publication']) && !empty($row['statut']) && $row['statut'] === 'publie') {
                $row['date_publication'] = $now;
            }
        }

        if ($table === 'categories' && empty($row['slug']) && !empty($row['nom'])) {
            $row['slug'] = $this->normalize_slug($row['nom']);
        }

        if ($table === 'alerts' && empty($row['reference_alerte'])) {
            $row['reference_alerte'] = 'ALT-' . date('YmdHis');
        }

        if ($table === 'complaints' && empty($row['numero_plainte'])) {
            $row['numero_plainte'] = 'PL-' . date('YmdHis');
        }

        return $row;
    }

    protected function is_rich_text_field($field_name)
    {
        return in_array($field_name, array('contenu', 'description', 'message', 'commentaire_interne'), TRUE);
    }

    protected function normalize_slug($value)
    {
        $value = is_string($value) ? trim($value) : '';
        if ($value === '') {
            return NULL;
        }

        $normalized = url_title(convert_accented_characters($value), 'dash', TRUE);
        return $normalized !== '' ? $normalized : NULL;
    }

    protected function handle_file_upload($field_name)
    {
        if (empty($_FILES[$field_name]['name'])) {
            return NULL;
        }

        $upload_path = FCPATH . 'upload/cms/';
        if (!is_dir($upload_path)) {
            @mkdir($upload_path, 0775, TRUE);
        }

        $config = array(
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif|webp|svg|pdf|doc|docx|xls|xlsx|ppt|pptx|zip|rar',
            'max_size' => 20480,
            'encrypt_name' => TRUE,
            'remove_spaces' => TRUE
        );

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            redirect($this->agent->referrer() ?: 'admin');
            exit;
        }

        return $this->upload->data();
    }

    protected function apply_computed_fields($table, array &$row, array $uploaded_files, $is_insert, array $existing_row)
    {
        if (isset($uploaded_files['fichier_url'])) {
            $file = $uploaded_files['fichier_url'];
            $row['nom_fichier_original'] = $file['client_name'];
            $row['extension'] = ltrim($file['file_ext'], '.');
            $row['taille_fichier'] = isset($file['file_size']) ? (int) round($file['file_size'] * 1024) : NULL;
        } elseif ($table === 'documents') {
            foreach (array('nom_fichier_original', 'extension', 'taille_fichier') as $field_name) {
                if (empty($row[$field_name]) && isset($existing_row[$field_name])) {
                    $row[$field_name] = $existing_row[$field_name];
                }
            }
        }

        if ($table === 'menus' && isset($row['type_cible']) && $row['type_cible'] !== 'url') {
            $row['url'] = NULL;
        }

        if ($table === 'menus' && isset($row['type_cible']) && $row['type_cible'] === 'url') {
            $row['cible_id'] = NULL;
        }

        if ($table === 'newsletters' && !isset($row['date_abonnement']) && $is_insert) {
            $row['date_abonnement'] = date('Y-m-d H:i:s');
        }

        if (in_array($table, array('alerts', 'complaints'), TRUE) && $is_insert && !isset($row['date_soumission'])) {
            $row['date_soumission'] = date('Y-m-d H:i:s');
        }
    }

    protected function get_audit_data($table, $is_insert, array $row = array(), array $existing_row = array())
    {
        $data = array();
        $admin = $this->session->userdata('cms_admin');
        $admin_id = !empty($admin['id']) ? (int) $admin['id'] : NULL;

        if ($admin_id === NULL) {
            return $data;
        }

        $fields = $this->Cms_model->get_table_field_names($table);

        if ($is_insert && in_array('created_by', $fields, TRUE) && empty($row['created_by'])) {
            $data['created_by'] = $admin_id;
        }

        if (!$is_insert && in_array('updated_by', $fields, TRUE)) {
            $data['updated_by'] = $admin_id;
        }

        if ($is_insert && in_array('updated_by', $fields, TRUE) && empty($row['updated_by'])) {
            $data['updated_by'] = $admin_id;
        }

        if (in_array('auteur_id', $fields, TRUE) && empty($row['auteur_id']) && !$is_insert && !empty($existing_row['auteur_id'])) {
            $data['auteur_id'] = $existing_row['auteur_id'];
        }

        return $data;
    }


    protected function get_required_fields($table, array $row = array())
    {
        $required = $this->Cms_model->get_required_columns($table);
        $manual = array(
            'articles' => array('categorie_id', 'auteur_id', 'titre', 'contenu', 'type_article', 'statut'),
            'pages' => array('auteur_id', 'titre', 'contenu', 'statut'),
            'documents' => array('categorie_id', 'auteur_id', 'titre', 'type_document', 'statut', 'fichier_url'),
            'categories' => array('nom', 'type_contenu'),
            'menus' => array('libelle', 'type_cible'),
            'sliders' => array('titre'),
            'quick_links' => array('libelle', 'url', 'type_lien'),
            'statistics_data' => array('categorie', 'titre', 'valeur', 'periode'),
            'settings' => array('cle', 'type_valeur'),
            'users' => empty($row) ? array('nom', 'prenom', 'email', 'role_id', 'statut', 'password_plain') : array('nom', 'prenom', 'email', 'role_id', 'statut'),
            'newsletters' => array('email', 'statut'),
            'contact_messages' => array('nom_complet', 'email', 'sujet', 'message'),
            'complaints' => array('nom_complet', 'sujet', 'description', 'canal_reception', 'priorite', 'statut'),
            'alerts' => array('description', 'type_alerte', 'niveau_confidentialite', 'statut')
        );

        if (isset($manual[$table])) {
            $required = array_unique(array_merge($required, $manual[$table]));
        }

        if (!empty($row) && $table === 'documents') {
            $required = array_values(array_diff($required, array('fichier_url')));
        }

        return array_values(array_unique($required));
    }

    protected function get_hidden_fields($table)
    {
        $common = array('id', 'created_at', 'updated_at');
        $map = array(
            'articles' => array('nombre_vues', 'date_validation'),
            'pages' => array('slug'),
            'documents' => array('slug', 'nom_fichier_original', 'extension', 'taille_fichier', 'nombre_telechargements'),
            'categories' => array('slug'),
            'settings' => array('updated_by'),
            'users' => array('derniere_connexion'),
            'quick_links' => array('created_by'),
            'sliders' => array('created_by'),
            'statistics_data' => array('created_by', 'date_publication'),
            'alerts' => array('reference_alerte', 'date_soumission', 'date_traitement'),
            'complaints' => array('numero_plainte', 'date_soumission', 'date_cloture', 'date_traitement'),
            'contact_messages' => array(),
            'newsletters' => array('date_abonnement', 'date_desabonnement')
        );

        return array_merge($common, isset($map[$table]) ? $map[$table] : array());
    }

    protected function is_file_field($field_name)
    {
        return (bool) preg_match('/(image|photo|banniere|piece_jointe|fichier)$/i', $field_name)
            || in_array($field_name, array('image_url', 'fichier_url', 'photo_profil', 'image_principale', 'image_secondaire', 'image_banniere'), TRUE);
    }

    protected function get_menu_target_options()
    {
        return array(
            'page' => $this->Cms_model->get_options_from_table('pages', 'titre'),
            'categorie' => $this->Cms_model->get_options_from_table('categories', 'nom'),
            'article' => $this->Cms_model->get_options_from_table('articles', 'titre'),
            'document' => $this->Cms_model->get_options_from_table('documents', 'titre')
        );
    }

    protected function get_form_sections($table)
    {
        $sections = array(
            'articles' => array('Informations principales', 'Publication et affichage', 'SEO et médias'),
            'pages' => array('Informations principales', 'Publication', 'SEO et bannière'),
            'documents' => array('Informations principales', 'Fichier et diffusion', 'SEO'),
            'menus' => array('Configuration du menu', 'Cible et affichage'),
            'users' => array('Profil utilisateur', 'Accès et sécurité'),
            'complaints' => array('Identité du plaignant', 'Traitement interne'),
            'alerts' => array('Informations du déclarant', 'Traitement interne')
        );

        return isset($sections[$table]) ? $sections[$table] : array('Informations générales', 'Paramètres');
    }


    protected function get_db_error_message($default_message)
    {
        $error = $this->db->error();
        if (!empty($error['message'])) {
            return $default_message . ' Détail technique : ' . $error['message'];
        }

        return $default_message;
    }

    protected function resolve_toggle_field($table, $row)
    {
        $candidates = array('actif', 'statut', 'telechargeable');
        foreach ($candidates as $field) {
            if (array_key_exists($field, $row)) {
                return $field;
            }
        }
        return NULL;
    }

    protected function get_toggled_value($field, $current)
    {
        if ($field === 'actif' || $field === 'telechargeable') {
            return ((int) $current === 1) ? 0 : 1;
        }

        $status_map = array(
            'publie' => 'archive',
            'archive' => 'publie',
            'brouillon' => 'publie',
            'actif' => 'inactif',
            'inactif' => 'actif',
            'non_lu' => 'lu',
            'lu' => 'non_lu',
            'recu' => 'en_cours',
            'en_cours' => 'traite',
            'traite' => 'recu'
        );

        return isset($status_map[$current]) ? $status_map[$current] : 'publie';
    }

    protected function validate_table($table)
    {
        if (!in_array($table, $this->managed_tables, TRUE)) {
            show_404();
        }
    }

    public function change_password()
    {
        $this->require_auth();
        $cms_admin = $this->session->userdata('cms_admin');
        $user_id = isset($cms_admin['id']) ? (int) $cms_admin['id'] : 0;
        if ($user_id <= 0) {
            redirect('admin/login');
            return;
        }

        if ($this->input->method() === 'post') {
            $current_password = (string) $this->input->post('current_password', TRUE);
            $new_password = (string) $this->input->post('new_password', TRUE);
            $confirm_password = (string) $this->input->post('confirm_password', TRUE);

            $user = $this->Cms_model->get_row('users', $user_id);
            if (empty($user) || empty($user['password_hash']) || !password_verify($current_password, $user['password_hash'])) {
                $this->session->set_flashdata('error', 'Le mot de passe actuel est incorrect.');
                redirect('admin/change_password');
                return;
            }

            if (strlen($new_password) < 8) {
                $this->session->set_flashdata('error', 'Le nouveau mot de passe doit contenir au moins 8 caractères.');
                redirect('admin/change_password');
                return;
            }

            if ($new_password !== $confirm_password) {
                $this->session->set_flashdata('error', 'La confirmation du nouveau mot de passe ne correspond pas.');
                redirect('admin/change_password');
                return;
            }

            $payload = array(
                'password_hash' => password_hash($new_password, PASSWORD_DEFAULT),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->Cms_model->update_row('users', $user_id, $payload);
            $this->session->set_flashdata('success', 'Mot de passe modifié avec succès.');
            redirect('admin/change_password');
            return;
        }

        $this->load->view('change_password');
    }

    public function upload_editor_image()
    {
        $this->require_auth();

        if (empty($_FILES['image'])) {
            return $this->json_response(array('errorMessage' => 'Aucune image reçue.'), 400);
        }

        $upload_path = FCPATH . 'upload/cms/editor/';
        if (!is_dir($upload_path)) {
            @mkdir($upload_path, 0775, TRUE);
        }

        $config = array(
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif|webp|svg',
            'max_size' => 5120,
            'encrypt_name' => TRUE
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            return $this->json_response(array('errorMessage' => strip_tags($this->upload->display_errors('', ''))), 400);
        }

        $file = $this->upload->data();
        return $this->json_response(array('result' => array(array('url' => base_url('upload/cms/editor/' . $file['file_name']), 'name' => $file['file_name']))));
    }

    protected function json_response($payload, $status = 200)
    {
        $this->output
            ->set_status_header($status)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($payload));
        return;
    }

    protected function require_auth()
    {
        if (!$this->session->userdata('cms_admin')) {
            redirect('admin/login');
            exit;
        }
    }
}
