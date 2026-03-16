<?php

/**
 * @author
 *
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index($params = NULL) {

		$datas['message'] = $params;
		$this->load->view('Login_view', $datas);
	}

	public function forgotten_pwd($params = NULL) {

		$datas['message'] = $params;
		$this->load->view('Initialize_Password_View', $datas);
	}



	public function do_login() {
		$EMAIL = $this->input->post('EMAIL');
		$PASSWORD = $this->input->post('PASSWORD');
		$this->form_validation->set_rules('EMAIL','', 'trim|required',array('required'=>'<font style="color:red;size:2px;">Le champ est Obligatoire</font>'));
		$this->form_validation->set_rules('PASSWORD','', 'trim|required',array('required'=>'<font style="color:red;size:2px;">Le champ est Obligatoire</font>'));
		if ($this->form_validation->run()==FALSE) {	
			$this->index();
		}else{

			$user= $this->Model->getRequeteOne('SELECT * FROM admin_users_backend  WHERE  EMAIL="'.$EMAIL.'"');
			$userEp=$this->Model->getRequeteOne('SELECT USER_ID,USER_LNAME AS NOM,USER_FNAME AS PRENOM,EMAIL,TELEPHONE,PASSWORD,SOURCE_ID FROM `admin_users_frontend`  WHERE 1 AND admin_users_frontend.EMAIL="'.$EMAIL.'" ');
			if (!empty($user)) {

				if ($user['USER_ID']) {

					if ($user['PASSWORD'] == md5($PASSWORD))
					{

						$session = array(
							'USER_ID' => $user['USER_ID'],
							'USER_NAME' => $user['USER_LNAME'].' '.$user['USER_FNAME'],
							'DEPART_PROFIL_ID'=>$user['DEPART_PROFIL_ID'],
							'EMAIL'=>$user['EMAIL'],
							'COLLABORATEUR_ID'=>$user['SOURCE_ID']

						);

						$this->session->set_userdata($session);
						redirect(base_url('admin_site/Site_Touristique/index'));

					}else if (!empty($userEp)) {


				// print_r($userEp);
				// exit();
					// code...
						if ($userEp['USER_ID']) {

					// echo $userEp['PASSWORD'].'_'.md5($PASSWORD);
					// exit();

							if ($userEp['PASSWORD'] == md5($PASSWORD) )
							{



								$sessionEp = array(
									'USER_ID' => $userEp['USER_ID'],
									'USER_NAME' => $userEp['NOM'].' '.$userEp['PRENOM'],
									'EMAIL'=>$userEp['EMAIL'],
									'TELEPHONE'=>$userEp['TELEPHONE'],
									'SOURCE_ID'=>$userEp['SOURCE_ID'],
								);

								$this->session->set_userdata($sessionEp);

								redirect(base_url('Liste_Demande/index'));

							}else{
								$message = "<center><span  id='message' style='color:red;font-size:15px'><b> Le nom d'utilisateur ou/et mot de passe incorect(s) !</b></span></center>";

								$this->index("<center><span  id='message' style='color:red;font-size:15px'><b> Le nom d'utilisateur ou/et mot de passe incorect(s) !</b></span></center>");
							}
						}
				// redirect(base_url('Liste_Demande/index'));
					}

					else
					{
						$message = "<center><span  id='erro_msg' style='color:red;font-size:12px'> Le nom d'utilisateur ou/et mot de passe incorect(s) !</span></center>";
						$this->index("<center><span  id='erro_msg' style='color:red;font-size:12px'> Le nom d'utilisateur ou/et mot de passe incorect(s) !</span></center>");
					}
					
				}
			}


			else if (!empty($userEp)) {


				// print_r($userEp);
				// exit();
					// code...
				if ($userEp['USER_ID']) {

					// echo $userEp['PASSWORD'].'_'.md5($PASSWORD);
					// exit();

					if ($userEp['PASSWORD'] == md5($PASSWORD) )
					{

						

						$sessionEp = array(
							'USER_ID' => $userEp['USER_ID'],
							'USER_NAME' => $userEp['NOM'].' '.$userEp['PRENOM'],
							'EMAIL'=>$userEp['EMAIL'],
							'TELEPHONE'=>$userEp['TELEPHONE'],
							'SOURCE_ID'=>$userEp['SOURCE_ID'],
						);

						$this->session->set_userdata($sessionEp);

						redirect(base_url('admin_site/Site_Touristique/index'));

					}else{
						$message = "<center><span  id='message' style='color:red;font-size:15px'><b> Le nom d'utilisateur ou/et mot de passe incorect(s) !</b></span></center>";

						$this->index("<center><span  id='message' style='color:red;font-size:15px'><b> Le nom d'utilisateur ou/et mot de passe incorect(s) !</b></span></center>");
					}
				}
				// redirect(base_url('Liste_Demande/index'));
			}

			
			
			else
			{
				$message = "<center><span id='erro_msg' style='color:red;font-size:12px'>L'utilisateur n'existe pas/plus dans notre système informatique !</span></center>";
				$this->index("<center><span id='erro_msg' style='color:red;font-size:12px'>L'utilisateur n'existe pas/plus dans notre système informatique !</span></center>");

			}

		}
		
	}

	public function do_logout()
	{ 
		$session = array(
			'USER_ID' => NULL,
			'USER_NAME' => NULL,
			'EMAIL'=>NULL,
			'POSTE'=>NULL,
			'DEPARTEMENT'=>NULL,
			'ID_POSTE'=>NULL,
			'COLLABORATEUR_ID'=>NULL,
		);

		$this->session->unset_userdata($session);

		$sessionEp = array(
			'USER_ID' => NULL,
			'USER_NAME' => NULL,
			'SOURCE_ID'=>NULL,
			'EMAIL'=>NULL,
			'TELEPHONE'=>NULL,
		);

		$this->session->unset_userdata($sessionEp);

		redirect(base_url('Login'));

	}

	function forget_pwd()
	{
		$this->validate_forget_pwd();
		#todo: 

		$emailTo=$this->input->post('EMAIL_CONFIRMATION');


		$user=$this->Model->getOne('admin_users_backend',array('EMAIL'=>$emailTo));
		

		$userEp=$this->Model->getOne('admin_users_frontend',array('EMAIL'=>$emailTo));

		if (!empty($userEp)) {
			// code...
			$pwdEp=$this->notifications->generate_password(10);
			// $id_userEp=$this->Model->getRequeteOne('SELECT ben_beneficiaire.BENEFICIAIRE_ID,ben_beneficiaire.NOM,ben_beneficiaire.PRENOM,ben_beneficiaire.EMAIL,ben_beneficiaire.TELEPHONE,admin_users_frontend.EMAIL,admin_users_frontend.`PASSWORD`,admin_users_frontend.USER_ID FROM `admin_users_frontend` LEFT JOIN ben_beneficiaire ON ben_beneficiaire.BENEFICIAIRE_ID=admin_users_frontend.SOURCE_ID WHERE ben_beneficiaire.EMAIL="'.$emailTo.'"');
			$id_userEp=$userEp['USER_ID'];
			$valider_newEp=base_url()."Login/validate_new_pwdEp/".$id_userEp."/".md5($pwdEp);
			$lienEp=base_url()."Login";
			$messageEp="Cher(ère).<b>".$userEp['USER_LNAME']." ".$userEp['USER_FNAME']."</b> votre mot de passe a été renouvellé.<br>Le mot de passe actuel: <b>".$pwdEp."</b> <br>Souhaitez vous confirmer ces changements?<br><br><a  href='".$valider_newEp."'><button type='button' class='btn btn-info'>Confirmer</button></a><br><br>Sinon vous pouvez toujours refuser en cliquant <a href='".$lienEp."'>ici</a>";
			$subjectEp="Mot de passe oublié";
			$this->notifications->send_mail($emailTo, $subjectEp, $cc_emails = array(), $messageEp, $attach = array());
			$message='<center><span  id="message" style="color:green;font-size:15px"><b>Le nouveau mot de passe a été envoyé.Vérifier votre boîte email</b></span></center>';

		}elseif (!empty($user)) {
			// code...
			$pwd=$this->notifications->generate_password(10);
			$id_user=$this->Model->getRequeteOne('SELECT USER_ID, EMAIL FROM admin_users_backend WHERE EMAIL="'.$emailTo.'"');
			$id_user=$id_user['USER_ID'];
			$valider_new=base_url()."Login/validate_new_pwd/".$id_user."/".md5($pwd);
			$lien=base_url()."Login";
			$message1="Cher(ère).<b>".$user['USER_LNAME']." ".$user['USER_FNAME']."</b> votre mot de passe a été renouvellé.<br>Le mot de passe actuel: <b>".$pwd."</b> <br>Souhaitez vous confirmer ces changements?<br><br><a  href='".$valider_new."'><button type='button' class='btn btn-info'>Confirmer</button></a><br><br>Sinon vous pouvez toujours refuser en cliquant <a href='".$lien."'>ici</a>";
			$subject="Mot de passe oublié";
			$this->notifications->send_mail($emailTo, $subject, $cc_emails = array(), $message1, $attach = array());
			$message='<center><span  id="message" style="color:green;font-size:15px"><b>Le nouveau mot de passe a été envoyé.Vérifier votre boîte email</b></span></center>';
			
		}else{

			$message = "<center><span  id='message' style='color:red;font-size:15px'><b> Le nom d'utilisateur n'existe pas dans notre système</b></span></center>";


		}

		echo json_encode(array('status'=>TRUE,'message'=>$message));

		

	}

	function validate_forget_pwd()
	{
		$data=array();
		$data['error_string']=array();
		$data['input_error']=array();
		$data['status']=TRUE;
		$message="Le champs est obligatoire";
		$message_verif="Email n'existe pas dans le système";

		$confirm_mail=$this->input->post('EMAIL_CONFIRMATION');

		$user=$this->Model->getOne('admin_users_backend',array('EMAIL'=>$confirm_mail));
		//print_r($user['EMAIL']);die();
		$userEp=$this->Model->getOne('ben_beneficiaire',array('EMAIL'=>$confirm_mail));



		$EMAIL = $this->input->post('EMAIL');
		$PASSWORD = $this->input->post('PASSWORD');

		if (!empty($userEp)) {
		// code...
			if (empty($confirm_mail)) {
				$data['input_error'][]="EMAIL_CONFIRMATION";
				$data['error_string'][]=$message;
				$data['status']=FALSE;
			}

			if ($confirm_mail!=$userEp['EMAIL']) {
				$data['input_error'][]="EMAIL_CONFIRMATION";
				$data['error_string'][]=$message_verif;
				$data['status']=FALSE;
			}
		}

		if(!empty($user)){
			if (empty($confirm_mail)) {
				$data['input_error'][]="EMAIL_CONFIRMATION";
				$data['error_string'][]=$message;
				$data['status']=FALSE;
			}

			if ($confirm_mail!=$user['EMAIL']) {
				$data['input_error'][]="EMAIL_CONFIRMATION";
				$data['error_string'][]=$message_verif;
				$data['status']=FALSE;
			}
		}



		if ($data['status']==FALSE) 
		{
			echo json_encode($data);
			exit();

		}
	}
	function validate_new_pwd( $id, $pwd)
	{

		$this->Model->update('admin_users_backend',array('USER_ID'=>$id),array('PASSWORD'=>$pwd));
		$data['messages']='<div class="alert alert-success text-center" id="message">'."Modification du mot de passe faite avec succès".'</div>';
		$this->session->set_flashdata($data);
		redirect(base_url('Login'));

	}
	function validate_new_pwdEp( $id, $pwd)
	{

		$this->Model->update('admin_users_frontend',array('USER_ID'=>$id),array('PASSWORD'=>$pwd));
		$data['messages']='<div class="alert alert-success text-center" id="message">'."Modification du mot de passe faite avec succès".'</div>';
		$this->session->set_flashdata($data);
		redirect(base_url('Login'));

	}

}