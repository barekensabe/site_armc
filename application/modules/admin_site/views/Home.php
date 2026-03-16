<?php

/**@autor pof.gongon@gmail.com
Alain justin  le 16-01-2022
*pour afficher l'accueil frontend
*/
class Home extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

  }


  function index($show=0){
   $data['pubs']=$this->Model->getRequete('SELECT `ID_PUBLICATION`, `TITRE_PUBLICATION`, `DESC_PUBLICATION`, `TITRE_PUBLICATION_ENG`, `DESC_PUBLICATION_ENG`, `IMAGE_PUBLICATION` FROM `publications` WHERE 1 ORDER BY `ID_PUBLICATION` DESC LIMIT 3');
   if ($this->session->userdata('site_lang')=='french') {
     $data['pubs']=$this->Model->getRequete('SELECT `ID_PUBLICATION`, `TITRE_PUBLICATION`, `DESC_PUBLICATION`, `TITRE_PUBLICATION_ENG`, `DESC_PUBLICATION_ENG`, `IMAGE_PUBLICATION` FROM `publications` WHERE 1 ORDER BY `ID_PUBLICATION` DESC LIMIT 3');
   }else if ($this->session->userdata('site_lang')=='english' || $this->session->userdata('site_lang')=='') {
     $data['pubs']=$this->Model->getRequete('SELECT `ID_PUBLICATION`, `TITRE_PUBLICATION_ENG` TITRE_PUBLICATION, `DESC_PUBLICATION_ENG` DESC_PUBLICATION, `IMAGE_PUBLICATION` FROM `publications` WHERE 1 ORDER BY `ID_PUBLICATION` DESC LIMIT 3');
   }

   $data['temoignages']=$this->Model->getList('temoignages',array('STATUS'=>1));
   if ($show===md5(1)) {
    $data['message']='Rendez-vous faite avec succés!';
  }

   $this->load->view('Home_View',$data);
 }
 function about(){
  $data['temoignages']=$this->Model->getList('temoignages',array('STATUS'=>1));
  $this->load->view('about',$data);
}
function chambre($id=0){
  if ($this->session->userdata('site_lang')=='french') {
   $data['resultat']=$this->Model->getRequete('SELECT chamb_categorie.CHAMB_CATEGORIE_ID,PATH_PHOTO,chambre.CHAMBRE_ID,chamb_categorie.DESCRIPTION AS CATEGORIE,chamb_categorie.DETAIL,chamb_categorie.DESCRIPTION_ANG AS CATEGORIE_ANG,chamb_categorie.DETAIL_ANG ,chamb_categorie.PRIX FROM `chambre` left JOIN  chamb_categorie ON chamb_categorie.CHAMB_CATEGORIE_ID=chambre.CHAMB_CATEGORIE_ID WHERE chamb_categorie.CHAMB_CATEGORIE_ID='.$id.'');
 }else if ($this->session->userdata('site_lang')=='english' || $this->session->userdata('site_lang')=='') {
  $data['resultat']=$this->Model->getRequete('SELECT chamb_categorie.CHAMB_CATEGORIE_ID,PATH_PHOTO,chambre.CHAMBRE_ID, chamb_categorie.DESCRIPTION_ANG AS NOM_CHAMBRE , chamb_categorie.DESCRIPTION ,chamb_categorie.DETAIL aaa,chamb_categorie.DESCRIPTION_ANG AS CATEGORIE,chamb_categorie.DETAIL_ANG DETAIL,chamb_categorie.PRIX FROM `chambre` left JOIN chamb_categorie ON chamb_categorie.CHAMB_CATEGORIE_ID=chambre.CHAMB_CATEGORIE_ID WHERE chamb_categorie.CHAMB_CATEGORIE_ID='.$id.'');
}
$this->load->view('blog',$data);
}
function Sale($id=0){
  if ($this->session->userdata('site_lang')=='french') {
   $data['resultat']=$this->Model->getRequeteOne('SELECT PATH_PHOTO,salles.SALLE_ID,salles.DESCRIPTION  AS NOM_CHAMBRE,salles.SUPERFICIE,salles.NBR_PERSONNE,salles.DESCRIPTION AS CATEGORIE,salles.DETAIL,salles.DESCRIPTION_ANG,salles.DETAIL_ANG ,salles.PRIX FROM `salles` WHERE salles.SALLE_ID='.$id.'');
 }else if ($this->session->userdata('site_lang')=='english' || $this->session->userdata('site_lang')=='') {
   $data['resultat']=$this->Model->getRequeteOne('SELECT PATH_PHOTO,salles.SALLE_ID,salles.DESCRIPTION ,salles.SUPERFICIE,salles.NBR_PERSONNE,salles.DESCRIPTION_ANG AS CATEGORIE,salles.DETAIL aaa,salles.DESCRIPTION_ANG AS NOM_CHAMBRE,salles.DETAIL_ANG AS DETAIL,salles.PRIX FROM `salles` WHERE salles.SALLE_ID='.$id.'');
 }
 $this->load->view('blog_sale',$data);
}
function blog_details(){
  $data['pubs']=$this->Model->getRequete('SELECT `ID_PUBLICATION`, `TITRE_PUBLICATION`, `DESC_PUBLICATION`, `TITRE_PUBLICATION_ENG`, `DESC_PUBLICATION_ENG`, `IMAGE_PUBLICATION` FROM `publications` WHERE 1 ORDER BY `ID_PUBLICATION` DESC LIMIT 3');
  if ($this->session->userdata('site_lang')=='french') {
   $data['pubs']=$this->Model->getRequete('SELECT `ID_PUBLICATION`, `TITRE_PUBLICATION`, `DESC_PUBLICATION`, `TITRE_PUBLICATION_ENG`, `DESC_PUBLICATION_ENG`, `IMAGE_PUBLICATION` FROM `publications` WHERE 1 ORDER BY `ID_PUBLICATION` DESC LIMIT 3');
 }else if ($this->session->userdata('site_lang')=='english'  || $this->session->userdata('site_lang')=='') {
   $data['pubs']=$this->Model->getRequete('SELECT `ID_PUBLICATION`, `TITRE_PUBLICATION_ENG` TITRE_PUBLICATION, `DESC_PUBLICATION_ENG` DESC_PUBLICATION, `IMAGE_PUBLICATION` FROM `publications` WHERE 1 ORDER BY `ID_PUBLICATION` DESC LIMIT 3');
 }
 $this->load->view('blog_details',$data);
}
function categori(){
  $this->load->view('categori');
}
function contact(){
  $data['temoignages']=$this->Model->getList('temoignages',array('STATUS'=>1));
  $this->load->view('contact',$data);
}
function contact_process(){
  $this->load->view('contact_process');
}
function elements(){
  $this->load->view('elements');
}
function latest_news(){
  $this->load->view('latest_news');
}
function gym(){
  $data['temoignages']=$this->Model->getRequete('SELECT * FROM `temoignages` WHERE `SERVICE_ID` in (SELECT SERVICE_ID FROM `services_hotel` WHERE 1 and `TYPE_SERVICE_ID`=1 and temoignages.STATUS=1)');
  $data['gym']=$this->Model->getRequete('SELECT services_hotel_images.`SERVICE_ID`,`PATH_IMAGE`,services_hotel.DESC_FRA,services_hotel.DESC_ENGL,services_hotel.TYPE_SERVICE_ID FROM `services_hotel_images` LEFT JOIN services_hotel on services_hotel.SERVICE_ID=services_hotel_images.SERVICE_ID WHERE 1 and `TYPE_SERVICE_ID`=1');    
  $this->load->view('gym',$data);
} function hotels(){
  $data['chmb']=$this->Model->getRequete('SELECT services_hotel.DESC_FRA,services_hotel.DESC_ENGL,services_hotel.TYPE_SERVICE_ID FROM  services_hotel WHERE 1 and `TYPE_SERVICE_ID`=4'); 
  $data['temoignages']=$this->Model->getRequete('SELECT * FROM `temoignages` WHERE `SERVICE_ID` in (SELECT SERVICE_ID FROM `services_hotel` WHERE 1 and `TYPE_SERVICE_ID`=4 and temoignages.STATUS=1)');
  $this->load->view('hotels',$data);
} function restaurents(){
  $data['temoignages']=$this->Model->getRequete('SELECT * FROM `temoignages` WHERE `SERVICE_ID` in (SELECT SERVICE_ID FROM `services_hotel` WHERE 1 and `TYPE_SERVICE_ID`=3 and temoignages.STATUS=1)');
  $data['restaurents']=$this->Model->getRequete('SELECT services_hotel_images.`SERVICE_ID`,`PATH_IMAGE`,services_hotel.DESC_FRA,services_hotel.DESC_ENGL,services_hotel.TYPE_SERVICE_ID FROM `services_hotel_images` LEFT JOIN services_hotel on services_hotel.SERVICE_ID=services_hotel_images.SERVICE_ID WHERE 1 and `TYPE_SERVICE_ID`=3');
  $this->load->view('restaurents',$data);
} function salles(){
  $data['temoignages']=$this->Model->getRequete('SELECT * FROM `temoignages` WHERE `SERVICE_ID` in (SELECT SERVICE_ID FROM `services_hotel` WHERE 1 and `TYPE_SERVICE_ID`=5 and temoignages.STATUS=1)');
  $this->load->view('salles',$data);
}
function piscine(){
  $data['temoignages']=$this->Model->getRequete('SELECT * FROM `temoignages` WHERE `SERVICE_ID` in (SELECT SERVICE_ID FROM `services_hotel` WHERE 1 and `TYPE_SERVICE_ID`=2 and temoignages.STATUS=1)');
  $data['piscine']=$this->Model->getRequete('SELECT services_hotel_images.`SERVICE_ID`,`PATH_IMAGE`,services_hotel.DESC_FRA,services_hotel.DESC_ENGL,services_hotel.TYPE_SERVICE_ID FROM `services_hotel_images` LEFT JOIN services_hotel on services_hotel.SERVICE_ID=services_hotel_images.SERVICE_ID WHERE 1 and `TYPE_SERVICE_ID`=2');

  $this->load->view('piscine',$data);
}
}?>