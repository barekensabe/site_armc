<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur public ARMC.
 *
 * Le design existant est conservé. Seuls les contenus sont désormais
 * alimentés par la base MySQL.
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cms_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data = $this->build_public_data();
        $data['sliders'] = $this->Cms_model->get_active_sliders(10);
        $data['home_articles'] = $this->Cms_model->get_home_articles(8);
        $data['featured_pages'] = $this->Cms_model->get_featured_pages(8);
        $data['home_statistics'] = $this->Cms_model->get_home_statistics(8);

        $this->load->view('index', $data);
    }

    public function article($slug = NULL)
    {
        $article = $this->Cms_model->get_article_by_slug($slug);
        if (!$article) {
            show_404();
        }

        $this->Cms_model->increment_article_views($article['id']);

        $data = $this->build_public_data();
        $data['article'] = $article;
        $data['related_articles'] = $this->Cms_model->get_category_articles($article['categorie_id']);
        $this->load->view('article_detail', $data);
    }

    public function page($slug = NULL)
    {
        $page = $this->Cms_model->get_page_by_slug($slug);
        if (!$page) {
            show_404();
        }

        $data = $this->build_public_data();
        $data['page_data'] = $page;
        $this->load->view('page_detail', $data);
    }

    public function category($slug = NULL)
    {
        $category = $this->Cms_model->get_category_by_slug($slug);
        if (!$category) {
            show_404();
        }

        $data = $this->build_public_data();
        $data['category'] = $category;
        $data['articles'] = $this->Cms_model->get_category_articles($category['id']);
        $data['documents'] = $this->Cms_model->get_category_documents($category['id']);
        $this->load->view('category_detail', $data);
    }

    public function actualites($page = 0)
    {
        $limit = 10;
        $config['base_url'] = site_url('actualites');
        $config['total_rows'] = $this->Cms_model->count_published_articles();
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $this->pagination->initialize($config);

        $offset = max(0, ((int) $page - 1) * $limit);

        $data = $this->build_public_data();
        $data['articles'] = $this->Cms_model->get_articles_paginated($limit, $offset);
        $data['pagination_links'] = $this->pagination->create_links();
        $this->load->view('articles_list', $data);
    }

    public function documents($slug = NULL)
    {
        if ($slug) {
            $document = $this->Cms_model->get_document_by_slug($slug);
            if (!$document) {
                show_404();
            }

            $data = $this->build_public_data();
            $data['document'] = $document;
            $this->load->view('document_detail', $data);
            return;
        }

        $data = $this->build_public_data();
        $data['documents'] = $this->Cms_model->get_documents_paginated(20, 0);
        $this->load->view('documents_list', $data);
    }

    public function telecharger_document($slug = NULL)
    {
        $document = $this->Cms_model->get_document_by_slug($slug);
        if (!$document) {
            show_404();
        }

        $this->Cms_model->increment_document_downloads($document['id']);

        if (!empty($document['fichier_url'])) {
            redirect(base_url(ltrim($document['fichier_url'], '/')));
            return;
        }

        show_404();
    }

    public function statistiques()
    {
        $data = $this->build_public_data();
        $data['statistics'] = $this->Cms_model->get_table_rows('statistics_data', 100);
        $this->load->view('statistics', $data);
    }

    public function contact()
    {
        $data = $this->build_public_data();
        $this->load->view('contact_dynamic', $data);
    }

    public function save_contact()
    {
        $redirect_url = $this->input->post('redirect_url', TRUE);
        $redirect_url = !empty($redirect_url) ? $redirect_url : site_url('contact');

        $payload = array(
            'nom_complet' => trim((string) $this->input->post('nom_complet', TRUE)),
            'email'       => trim((string) $this->input->post('email', TRUE)),
            'telephone'   => trim((string) $this->input->post('telephone', TRUE)),
            'sujet'       => trim((string) $this->input->post('sujet', TRUE)),
            'message'     => trim((string) $this->input->post('message', TRUE)),
            'statut'      => 'non_lu'
        );

        if ($payload['nom_complet'] === '' || $payload['email'] === '' || $payload['sujet'] === '' || $payload['message'] === '') {
            $this->session->set_flashdata('error', 'Merci de renseigner tous les champs obligatoires du formulaire de contact.');
            redirect($redirect_url);
            return;
        }

        if (!filter_var($payload['email'], FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Veuillez saisir une adresse email valide.');
            redirect($redirect_url);
            return;
        }

        if ($this->Cms_model->save_contact_message($payload)) {
            $this->session->set_flashdata('success', 'Votre message a été envoyé avec succès.');
        } else {
            $this->session->set_flashdata('error', 'Une erreur est survenue lors de l\'envoi de votre message.');
        }

        redirect($redirect_url);
    }

    public function nous_alerter()
    {
        $data = $this->build_public_data();
        $this->load->view('alert_form', $data);
    }

    public function save_alert()
    {
        $payload = array(
            'reference_alerte'       => 'ALT-' . date('YmdHis'),
            'nom_complet'            => $this->input->post('nom_complet', TRUE),
            'email'                  => $this->input->post('email', TRUE),
            'telephone'              => $this->input->post('telephone', TRUE),
            'type_alerte'            => $this->input->post('type_alerte', TRUE),
            'description'            => $this->input->post('description', TRUE),
            'niveau_confidentialite' => $this->input->post('niveau_confidentialite', TRUE),
            'statut'                 => 'recu',
            'date_soumission'        => date('Y-m-d H:i:s')
        );

        $this->Cms_model->save_alert($payload);
        $this->session->set_flashdata('success', 'Votre alerte a été enregistrée.');
        redirect('nous-alerter');
    }

    public function plaintes()
    {
        $data = $this->build_public_data();
        $this->load->view('complaint_form', $data);
    }

    public function save_plainte()
    {
        $payload = array(
            'numero_plainte'        => 'PL-' . date('YmdHis'),
            'nom_complet'           => $this->input->post('nom_complet', TRUE),
            'email'                 => $this->input->post('email', TRUE),
            'telephone'             => $this->input->post('telephone', TRUE),
            'adresse'               => $this->input->post('adresse', TRUE),
            'institution_concernee' => $this->input->post('institution_concernee', TRUE),
            'sujet'                 => $this->input->post('sujet', TRUE),
            'description'           => $this->input->post('description', TRUE),
            'canal_reception'       => 'web',
            'priorite'              => $this->input->post('priorite', TRUE) ?: 'moyenne',
            'statut'                => 'recu',
            'date_soumission'       => date('Y-m-d H:i:s')
        );

        $this->Cms_model->save_complaint($payload);
        $this->session->set_flashdata('success', 'Votre plainte a été transmise.');
        redirect('plaintes');
    }

    public function newsletter()
    {
        $email = $this->input->post('email', TRUE);
        if (!empty($email)) {
            $this->Cms_model->save_newsletter($email);
            $this->session->set_flashdata('success', 'Votre abonnement a bien été enregistré.');
        }
        redirect($this->input->server('HTTP_REFERER') ?: site_url());
    }

    /**
     * Anciennes pages statiques gardées pour compatibilité.
     */
    public function Cfr_presse2026() { $this->load->view('Cfr_presse2026', $this->build_public_data()); }
    public function Cocpt_Base() { $this->load->view('Cocpt_Base', $this->build_public_data()); }
    public function bdi_profes_CISI_Tanz_ARMC() { $this->load->view('bdi_profes_CISI_Tanz_ARMC', $this->build_public_data()); }
    public function Visite_Tunisie() { $this->load->view('Visite_Tunisie', $this->build_public_data()); }
    public function ArticleFormationJournaliste() { $this->load->view('ArticleFormationJournaliste', $this->build_public_data()); }
    public function Equip_info() { $this->load->view('Equip_info', $this->build_public_data()); }
    public function Fournit_mob() { $this->load->view('Fournit_mob', $this->build_public_data()); }
    public function Alerte() { $this->nous_alerter(); }

    protected function build_public_data()
    {
        $settings = $this->Cms_model->get_settings_map();

        return array(
            'site_settings'  => $settings,
            'menu_tree'      => $this->Cms_model->get_menu_tree(),
            'quick_links'    => $this->Cms_model->get_quick_links(12),
            'ticker_articles'=> $this->Cms_model->get_home_articles(7),
            'home_statistics'=> $this->Cms_model->get_home_statistics(8)
        );
    }
}
