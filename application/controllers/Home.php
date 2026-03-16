<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homen extends CI_Controller {

    function save_contacts(){

    	$message = $this->input->post("message");
    	$name = $this->input->post("name");
    	$email = $this->input->post("email");
    	$subject = $this->input->post("subject");

    	$donne = array('message'=>$message,
                       'name'=>$name,
                       'email'=>$email,
                       'subject'=>$subject
                   );

    	$this->Model->create('notification', $donne);

    	$mail  = $this->Model->getList('personne_notif');

    	$messages = 'De la part de '.$name.",<br>".$message;

    	foreach ($mail as $key => $mail) {
    	  $this->notifications->send_mail($mail["EMAIL"], $subject.' (PAEEJ)', NULL, $messages, NULL);
    	}


    	redirect(base_url('Home'));

    }


	 
	public function index()
	{


		$donne['donne'] = $this->Model->getRequete('SELECT * FROM `formation_activite` WHERE 1 order by `FORMATION_ACTIVITE_ID` DESC' );

		$donne['formations'] = $this->Model->getRequete('SELECT FORMATION_ID,process_formation.DESCRIPTION_FORMATION AS TITRE_FORMATION,proc_formation_type.DESCRIPTION FROM `process_formation` LEFT JOIN proc_formation_type ON proc_formation_type.TYPE_FORMATION_ID=process_formation.TYPE_FORMATION_ID WHERE proc_formation_type.ID_PILIER=2 ORDER BY process_formation.DESCRIPTION_FORMATION ASC');

		$this->load->view('home_view',$donne);
	}


	public function formulaire()
	{
		$this->load->view('form');
	}

	public function blogs()
	{
		$this->load->view('blogs');
	}

	public function blogs_detail()
	{
		$this->load->view('blogs_detail');
	}

	public function contacts()
	{    

		$donne['donne'] = "-3.3911374,29.3606192";
		$this->load->view('contacts_view',$donne);
	}


	public function about()
	{
		$this->load->view('about_view');
	}

	
	public function elements()
	{
		$this->load->view('elements_view');
	}





}
