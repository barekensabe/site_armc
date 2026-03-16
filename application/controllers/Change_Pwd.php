<?php 


class Change_Pwd extends CI_Controller
{
	
	function __construct()
	{
		// code...
		parent::__construct();
	}


	function index($params=NULL)
	{
		$data['message'] = $params;
		$this->load->view('Change_Pwd_View',$data);
	}

	function modifier()
	{
		$USER_ID=$this->session->userdata('PAEEJ_USER_ID');

		$EMAIL = $this->input->post('EMAIL');
		$OLD_PASSWD = $this->input->post('OLD_PASSWD');
		$NEW_PASSWORD = $this->input->post('NEW_PASSWORD');
		$CONFIRMER_PASSWORD = $this->input->post('CONFIRMER_PASSWORD');


		$this->form_validation->set_rules('EMAIL','', 'trim|required',array('required'=>'<font style="color:red;size:2px;">Le champ est Obligatoire</font>'));
		$this->form_validation->set_rules('OLD_PASSWD','', 'trim|required',array('required'=>'<font style="color:red;size:2px;">Le champ est Obligatoire</font>'));
		$this->form_validation->set_rules('NEW_PASSWORD','', 'trim|required',array('required'=>'<font style="color:red;size:2px;">Le champ est Obligatoire</font>'));
		$this->form_validation->set_rules('CONFIRMER_PASSWORD','', 'trim|required',array('required'=>'<font style="color:red;size:2px;">Le champ est Obligatoire</font>'));

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{

			$user=$this->Model->getRequeteOne('SELECT `USER_ID`,`USER_LNAME`,`USER_FNAME`,admin_users_frontend.`EMAIL`,admin_users_frontend.`TELEPHONE`,admin_users_frontend.`PASSWORD` FROM `admin_users_frontend` JOIN ben_beneficiaire ON ben_beneficiaire.BENEFICIAIRE_ID=admin_users_frontend.SOURCE_ID WHERE ben_beneficiaire.BENEFICIAIRE_ID='.$USER_ID);

			if (!empty($user)) {

				if ($user['EMAIL']==$EMAIL && $user['PASSWORD'] == md5($OLD_PASSWD) )
				{

					if ($NEW_PASSWORD == $CONFIRMER_PASSWORD) {
						
						$this->Model->update('admin_users_frontend',array('EMAIL'=>$EMAIL),array('PASSWORD'=>md5($NEW_PASSWORD)));

						redirect(base_url('Login_ep/do_logout'));
					}else{
						$this->index("<center><div class='alert alert-warning text-center' id='message' style='color:red;font-size:15px'><b> Le nouveau et l'ancien mot de passe ne sont pas identiques!</b></div></center>");
					}

				}else{

					$this->index("<center><div class='alert alert-warning text-center' id='message' style='color:red;font-size:15px'><b> Le nom d'utilisateur ou/et ancien mot de passe incorect(s) !</b></div></center>");
				}

			}else{

				$this->index("<center><div class='alert alert-warning text-center' id='message' style='color:red;font-size:15px'><b>L'utilisateur n'existe pas dans notre système!</b></div></center>");
			}
		}

	}

}


 ?>