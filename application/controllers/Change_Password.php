<?php


class Change_Password extends CI_Controller 
{
    /**
     * fonction pour  le formulaire
     * 
     */
    public function index(){
      $this->load->view('Change_Password_View');

    }

    public function Modifier_password(){
		$USER_ID=$this->session->userdata('USER_ID');
// print_r($USER_ID); die();
      $old_password=$this->input->post("old_password");
      $new_password=$this->input->post("new_password");
      $confirm_password=$this->input->post("confirm_password");

      $this->form_validation->set_rules('old_password', '', 'trim|required',array('required'=>"Champ obligatoire"));
      $this->form_validation->set_rules('new_password', '', 'trim|required|min_length[4]',array('required'=>"Champ obligatoire","min_length" => "Minimum 4 characters"));
      $this->form_validation->set_rules('confirm_password', '', 'trim|required|matches[new_password]|min_length[4]',array('required'=>"Champ obligatoire",
    'matches'=>"Mot de passe ne sont pas indentique","min_length" => "Minimum 4 characters"));
      if ($this->form_validation->run() == FALSE)
      {
        $this->index();
      }
      else
      {
       $get_password=$this->Model->getRequeteOne("SELECT admin_users_backend.USER_ID,admin_users_backend.USER_LNAME,admin_users_backend.USER_FNAME,admin_users_backend.PASSWORD 
                      FROM admin_users_backend where admin_users_backend.USER_ID= ".$USER_ID);
        if(!empty($get_password)){
            if($get_password['PASSWORD']==MD5($old_password)){
              $array= array('PASSWORD'=>MD5($confirm_password));
             $this->Model->update('admin_users_backend',array('USER_ID'=>$USER_ID),$array); 
             redirect(base_url('Login/do_logout'));
             $this->index();
            }else{
              $data['message'] = '<div  style="height:3em;border-radius:10px;padding-top:0.5em; width:80%;margin-left:5em" id="message" class=" btn btn-dark">' . "Ancien mot de passe incorect !" . '</div>';
              $this->session->set_flashdata($data);     
              $this->index();
            }
        }else{
          $data['message'] = '<div  style="height:3em;border-radius:10px;padding-top:0.5em; width:80%;margin-left:5em" id="message" class=" btn btn-dark">' . "L'utilisateur n'existe pas dans notre système!" . '</div>';
          $this->session->set_flashdata($data);
        $this->index();

        }
      

      }




    }
   


  }





  ?>