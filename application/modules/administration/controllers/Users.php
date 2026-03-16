<?php 


class Users extends CI_Controller  
{
		
	function __construct()
	{  	
			parent::__construct();  
	}
	function index()
	{
        
	 $this->load->view('Users_List_view');
	}
		//fonction liste
	function listing()
	{
		$query_principal="SELECT `USER_ID`,`USER_LNAME`,`USER_FNAME`,IS_ACTIVE,sexe.DESCR AS sexe ,admin_users_backend.`EMAIL`,admin_users_backend.`TELEPHONE`,`SOURCE_ID`,IS_ACTIVE,`DATE_ACTIVATION`,proc_profil.DESCRIPTION,proc_departement.DESC_DEPARTEMENT,proc_service.DESC_SERVICE FROM `admin_users_backend` left JOIN sexe on sexe.SEXE_ID =admin_users_backend.SEXE_ID left join proc_departement_profil on admin_users_backend.DEPART_PROFIL_ID=proc_departement_profil.DEPART_PROFIL_ID left join proc_departement on proc_departement_profil.DEPARTEMENT_ID=proc_departement.DAPARTEMENT_ID left join proc_profil on proc_departement_profil.PROFIL_ID=proc_profil.PROFIL_ID left JOIN proc_service on proc_departement_profil.SERVICE_ID=proc_service.SERVICE_ID WHERE 1 ";

		$var_search= !empty($_POST['search']['value']) ? $_POST['search']['value'] : null;

		$limit='LIMIT 0,10';
		if($_POST['length'] != -1)
		{
		$limit='LIMIT '.$_POST["start"].','.$_POST["length"];
		}

		
		$order_column='';

		$order_column = array('admin_users_backend.USER_ID','admin_users_backend.USER_LNAME');

		$search = !empty($_POST['search']['value']) ?  (" AND (admin_users_backend.USER_LNAME LIKE '%$var_search%')") :'';  

		$critaire = '';

		$order_by=' ORDER BY USER_LNAME ASC';
		$query_secondaire=$query_principal.' '.$critaire.' '.$search.' '.$order_by.'   '.$limit;

		$query_filter = $query_principal.' '.$critaire.' '.$search.' '.$order_by;

				$fetch_cov_frais = $this->Model->datatable($query_secondaire);
		$data = array();
		$u=1;
		foreach($fetch_cov_frais as $info)
		{
		$post=array();
		$post[]=$u++; 
		$post[]=$info->USER_LNAME;
		$post[]=$info->USER_FNAME;
		$post[]=$info->sexe;
		$post[]=$info->EMAIL;
        $post[]=$info->DESCRIPTION;
        $post[]=$info->DESC_DEPARTEMENT;
        $post[]=$info->DESC_SERVICE;
		$post[]=$info->TELEPHONE;
        if ($info->IS_ACTIVE==0){
            $var="Activer";
            $message="Activé";

            $post[]="
            <span class='text-danger fa fa-remove'></span> ";
            }else {
            $var="Desactiver";
            $message="Desactivé";
            $post[]="<span class='text-success fa fa-check'></span>";                    
            }

		$post[]= '
			<div class="dropdown">
			<button class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cog">
			</i><span class='."caret".'> Actions</span>
			</button>
			<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

			<a href="'.base_url('index.php/administration/Users/get_row/'.$info->USER_ID).'" >Modifier</i></a><br>
			<a href="'.base_url('index.php/administration/Users/get_logs/'.md5($info->USER_ID)).'" >Logs</i></a><br>
    
			<a style="color:red" data-toggle="modal" href="#" data-target="#staticBackdrop'.$info->USER_ID.'">'.$var.'</a>
			</div>
			</div>
			<div class="modal fade" data-backdrop="static" id="staticBackdrop'.$info->USER_ID.'">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-body">
			<center>
			<h5><strong>Voulez-vous '.$message.' ?<i style="color:green;">'.$info->USER_LNAME.' '.$info->USER_FNAME.'</i></strong><br> <b style="background-color:prink"></b>
			</h5>

			</center>
			</div>
			<div class="modal-footer">

			<a  class="btn btn-dark" href="'.base_url('index.php/administration/Users/update_statut/'.$info->USER_ID).'">'.$var.'</a>
			<button class="btn btn-danger" data-dismiss="modal">
			Quitter
			</button>
			</div>
			</div>
			</div>
			</div>';


		$data[] = $post;
		}

		$output = array(
		"draw" => intval($_POST['draw']),
		"recordsTotal" =>$this->Model->all_data($query_principal),
		"recordsFiltered" => $this->Model->filtrer($query_filter),
		"data" => $data
		);
		echo json_encode($output);
	}


    /**
     *  formaulaire pour ajouter utilisateur
     * 
     */
	
     public function add(){
        $data['profil']= $this->Model->getRequete("SELECT * FROM `proc_profil`");
        $this->load->View("Users_Add_view",$data);
     }

     /**
      *fonction pour insert 
      *
      */
      public function insert(){
        $id_connected=$this->session->userdata('USER_ID');
    // print_r($id_connected);
     // die();
        $NOM=$this->input->post("NOM");
        $PRENOM=$this->input->post("PRENOM");
        $TELEPHONE=$this->input->post("TELEPHONE");
        $EMAIL=$this->input->post("EMAIL");
        $SEXE_ID=$this->input->post("SEXE_ID");
        // $PROFIL=$this->input->post("PROFIL");
        $DEPART_PROFIL_ID=$this->input->post("DEPART_PROFIL_ID");
        $this->form_validation->set_rules('NOM', '', 'trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('PRENOM','','trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('TELEPHONE', '', 'trim|required|is_unique[admin_users_backend.telephone]',array('required'=>"Champ obligatoire",'is_unique' => "Numero de Telephone  éxiste"));
        $this->form_validation->set_rules('EMAIL','','trim|required|valid_email|is_unique[admin_users_backend.email]',array('required'=>"Champ obligatoire",'is_unique' => "Email éxiste",'valid_email' => "Email invalide"));   

        $this->form_validation->set_rules('SEXE_ID','','trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('DEPART_PROFIL_ID','','trim|required',array('required'=>"Champ obligatoire"));
        if($this->form_validation->run()==FALSE){
            $this->add();
        }
        else{
            $password = $this->notifications->generate_password(8);
            $array= array('USER_LNAME'=>$NOM,
            'USER_FNAME'=>$PRENOM,
            'SEXE_ID'=>$SEXE_ID,
            'EMAIL'=>$EMAIL,
            'TELEPHONE'=>$TELEPHONE,
            'PASSWORD'=> MD5($password),
            'CREER_PAR'=>$id_connected,
            'DEPART_PROFIL_ID'=>intval($DEPART_PROFIL_ID)
    );
            $check=$this->Model->getRequeteOne("SELECT * FROM `admin_users_backend` where EMAIL ='".$EMAIL."' AND TELEPHONE ='".$TELEPHONE."'");
            if (empty($check)) {

                $status=$this->Model->create('admin_users_backend',$array); 

            // print_r($array);die();
                if($status==1)
                {
                    $subject = 'Creation de mot de passe';
            $gender = ($SEXE==1) ? "Cher " : "Chère";
            $message= $NOM.' '.$PRENOM."<b>,Bienvenue sur la <a href='".base_url('Login')."'>Plateforme de PAEEJ</a>.<br>Pour vous connecter, prière de bien vouloir utiliser vos identifiants de connexion ci-dessous:<br><br>
              - Nom d'utilisateur : <b>$EMAIL</b><br>
              - Mot de passe : <b>$password</b><br><br>
              Mais il faut attendre pour que ton compte soit activer par l'administrateur";

            $this->notifications->send_mail($EMAIL, $subject, $cc_emails = NULL, $message, $attach = NULL);
                    $data['message']='<div  style="height:3em;border-radius:10px;padding-top:0.5em; width:80%;margin-left:5em" id="message" class=" btn btn-dark">'."Utilisateur a étè enregistre avec success..!!!".'</div>';
               $this->session->set_flashdata($data);
               redirect(base_url('index.php/administration/Users/index')); 

                    
                }
                else
                {
                    $data['message']='<div  style="height:3em;border-radius:10px;padding-top:0.5em; width:80%;margin-left:5em" id="message" class=" btn btn-dark">'."SOUS MENU NON ENREGISTRE..!!".'</div>';
            $this->session->set_flashdata($data);
            redirect(base_url('index.php/administration/Users/index')); 
              
                    }
            }else {
                $data=array(
                    'class' => 'text-danger',
                    'message' => 'Sous menu existé..!!'
                );
                   $this->session->set_flashdata("dash",$data);
                   redirect(base_url('index.php/administration/Users/add')); 
             
              
            }
         }
             
}
/**
 * recupere one row
 * 
 */public function get_row($id)
  {
    $row= $this->Model->getOne('admin_users_backend', array('USER_ID'=>$id));
    $getservdep=$this->Model->getRequeteOne('SELECT DEPARTEMENT_ID,`SERVICE_ID`,`PROFIL_ID` FROM `proc_departement_profil` WHERE `DEPART_PROFIL_ID`='.$row['DEPART_PROFIL_ID']);
    $profile=$this->Model->getRequete("SELECT * FROM `proc_profil`");
      
      $departe=$this->Model->getRequete('SELECT DISTINCT proc_departement.DAPARTEMENT_ID,proc_departement.DESC_DEPARTEMENT FROM proc_departement WHERE proc_departement.DAPARTEMENT_ID IN (SELECT `DEPARTEMENT_ID` FROM `proc_departement_profil` WHERE 1 AND `PROFIL_ID`='.$getservdep['PROFIL_ID'].')');
       $service=$this->Model->getRequete('SELECT DEPART_PROFIL_ID, proc_departement.DAPARTEMENT_ID,  proc_profil.DESCRIPTION,proc_departement.DESC_DEPARTEMENT,proc_departement_profil.DEPART_PROFIL_ID, proc_service.SERVICE_ID, proc_service.DESC_SERVICE FROM proc_departement_profil LEFT join proc_departement on  proc_departement_profil.DEPARTEMENT_ID=proc_departement.DAPARTEMENT_ID LEFT join proc_profil on proc_departement_profil.PROFIL_ID=proc_profil.PROFIL_ID LEFT join proc_service on proc_departement_profil.SERVICE_ID=proc_service.SERVICE_ID WHERE proc_departement_profil.PROFIL_ID='.$getservdep['PROFIL_ID'].
      ' AND proc_departement_profil.DEPARTEMENT_ID='.$getservdep['DEPARTEMENT_ID'].'') ;                                    
    $data['row']=$row;
    $data['service']=$service;
    $data['departe']=$departe;
    $data['getservdep']=$getservdep;

    $data['profile']=$profile;
    $this->load->view('Users_Update_View',$data);             
  }
    /*
     * focntion pour la desactivation et l'activation d'un utilisateur
     * 
     * 
     */
    public function update_statut($id){
        $data['rows']= $this->Model->getOne('admin_users_backend', array('USER_ID'=>$id));
        $check=$this->Model->getRequeteOne("SELECT EMAIL FROM `admin_users_backend` where  USER_ID ='".$id."'");
        $EMAIL=$check['EMAIL'];
        // print_r($EMAIL);
        // die();

        if ($data['rows']['IS_ACTIVE']==0) {
            $data= array('USER_ID'=>$id,'IS_ACTIVE'=>"1");
            $status=$this->Model->update('admin_users_backend',array('USER_ID'=>$id),$data);
            if($status==TRUE)
            {
                $subject = 'Activation d/" un utilisateur';
                $gender = ($SEXE==1) ? "Cher " : "Chère";
                $message= "<b>,Salut Votre est activé  vous pouvez commencer a travail";
                $this->notifications->send_mail($EMAIL, $subject, $cc_emails = NULL, $message, $attach = NULL);

                $data=array(
                    'class' => 'success',
                    'message' => 'Utilisateur a étè activé avec succès..!!'
                );
    
                $this->session->set_flashdata("dash",$data);
                redirect(base_url('index.php/administration/Users/index')); 

                
            }
            else
            {
                $data=array(
                    'class' => 'danger',
                    'message' => "Echec d'active sous menu..!!"
                );
                $this->session->set_flashdata("dash",$data);
                redirect(base_url('index.php/administration/Users/index')); 
              
                }

                redirect(base_url('index.php/administration/Users/index')); 
             
            


        } else {
            $data= array('USER_ID'=>$id,'IS_ACTIVE'=>"0");
            $status=$this->Model->update('admin_users_backend',array('USER_ID'=>$id),$data);
            if($status==TRUE)
            {
                $data=array(
                    'class' => 'success',
                    'message' => 'Utilisateur a étè desactivé avec succès..!!'
                );
    
                $this->session->set_flashdata("dash",$data);
                redirect(base_url('index.php/administration/Users/index')); 

                
            }
            else
            {
                $data=array(
                    'class' => 'danger',
                    'message' => 'desactivation echoué..!!'
                );
                $this->session->set_flashdata("dash",$data);
                redirect(base_url('index.php/administration/Users/index')); 
              
                }
                redirect(base_url('index.php/administration/Users/index')); 
              
        }
    }

     
    /**
     *  fonction pour modifier les informations d'un utilisateur
     * 
     */

      public function update(){
        $id=$this->input->post("USER_ID");

        $id_connected=$this->session->userdata('USER_ID');
        $NOM=$this->input->post("NOM");
        $PRENOM=$this->input->post("PRENOM");
        $TELEPHONE=$this->input->post("TELEPHONE");
        $EMAIL=$this->input->post("EMAIL");
        $SEXE_ID=$this->input->post("SEXE_ID");
        //$PROFIL=$this->input->post("PROFIL");
        $DEPART_PROFIL_ID=$this->input->post("DEPART_PROFIL_ID");
        // print_r($DEPART_PROFIL_ID); die();
        $MOTIF=$this->input->post("MOTIF");

        $this->form_validation->set_rules('NOM', '', 'trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('PRENOM','','trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('TELEPHONE', '', 'trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('EMAIL','','trim|required|valid_email',array('required'=>"Champ obligatoire",'valid_email' => "Email invalide"));   
        $this->form_validation->set_rules('SEXE_ID','','trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('MOTIF','','trim|required',array('required'=>"Champ obligatoire"));
        $this->form_validation->set_rules('DEPART_PROFIL_ID','','trim|required',array('required'=>"Champ obligatoire"));


        if($this->form_validation->run()==FALSE){
            $this->get_row($id);
        }
        else{
            $array= array('USER_LNAME'=>$NOM,
            'USER_FNAME'=>$PRENOM,
            'SEXE_ID'=>$SEXE_ID,
            'EMAIL'=>$EMAIL,
            'TELEPHONE'=>$TELEPHONE,
            'CREER_PAR'=>$id_connected,
            'DEPART_PROFIL_ID'=>intval($DEPART_PROFIL_ID)


        );
              // print_r($array);die();
        $this->Model->update('admin_users_backend',array('USER_ID'=>$id),$array); 

        $array_histo= array('USER_ID'=> $id,
                'USER_LNAME'=>$NOM,
                'USER_FNAME'=>$PRENOM,
                'EMAIL'=>$EMAIL,
                'TELEPHONE1'=>$TELEPHONE,
                'MODIFIER_PAR'=>$id_connected,
                'MOTIF' => $MOTIF              
            );

                  $this->Model->create('admin_users_historique',$array_histo); 

                if($status==TRUE)
                {
           
                    $data['message']='<div  style="height:3em;border-radius:10px;padding-top:0.5em; width:80%;margin-left:5em" id="message" class=" btn btn-dark">'."Utilisateur a étè enregistre avec success..!!!".'</div>';
                    $this->session->set_flashdata($data);
                    redirect(base_url('index.php/administration/Users/index')); 

                    
                }
                else
                {
                    $data['message']='<div  style="height:3em;border-radius:10px;padding-top:0.5em; width:80%;margin-left:5em" id="message" class=" btn btn-dark">'."SOUS MENU NON ENREGISTRE..!!".'</div>';
                   $this->session->set_flashdata($data);
                    redirect(base_url('index.php/administration/Users/index')); 
              
                    }
            
         }
        

        
      }

    function showsev()
    {
        $PROFIL_ID =$this->input->post('PROFIL_ID');
        $DAPARTEMENT_ID=$this->input->post('DAPARTEMENT_ID');
        $servcheck=$this->Model->getRequete('SELECT `SERVICE_ID` FROM `proc_departement_profil` WHERE 1 AND `DEPARTEMENT_ID`='.$DAPARTEMENT_ID.' AND `PROFIL_ID`='.$PROFIL_ID.' and `SERVICE_ID` is not null');
        $serv=0;
        if (empty($servcheck)) 
        {
          $serv=1;
        }
      echo $serv;
    }

     function get_depart_profil()
  {
    $PROFIL_ID=$this->input->post('PROFIL_ID');
    $DAPARTEMENT_ID=$this->input->post('DAPARTEMENT_ID');
    $SERVICE_ID=$this->input->post('SERVICE_ID');
    $statu=1;
    if(!empty($PROFIL_ID) && !empty($DAPARTEMENT_ID) && !empty($SERVICE_ID))
    {
     $statu=2;
     $depart_profil = $this->Model->getOne('proc_departement_profil',array('PROFIL_ID'=>$PROFIL_ID,'DEPARTEMENT_ID'=>$DAPARTEMENT_ID,'SERVICE_ID'=>$SERVICE_ID));
   }
   else if(!empty($PROFIL_ID) && !empty($DAPARTEMENT_ID) && empty($SERVICE_ID))
   {
     $statu=2;
     $depart_profil = $this->Model->getOne('proc_departement_profil',array('PROFIL_ID'=>$PROFIL_ID,'DEPARTEMENT_ID'=>$DAPARTEMENT_ID));
   }
   $html='';
   if ($statu==2) {
    if (!empty($depart_profil)) 
    {
      $html.=$depart_profil['DEPART_PROFIL_ID'];
    }
  }
  echo $html;
}

 function get_service()
  {
    $PROFIL_ID =$this->input->post('PROFIL_ID');
    $DAPARTEMENT_ID=$this->input->post('DAPARTEMENT_ID');
    $service=$this->Model->getRequete('SELECT DEPART_PROFIL_ID, proc_departement.DAPARTEMENT_ID,  proc_profil.DESCRIPTION,proc_departement.DESC_DEPARTEMENT,proc_departement_profil.DEPART_PROFIL_ID, proc_service.SERVICE_ID, proc_service.DESC_SERVICE FROM proc_departement_profil LEFT join proc_departement on  proc_departement_profil.DEPARTEMENT_ID=proc_departement.DAPARTEMENT_ID LEFT join proc_profil on proc_departement_profil.PROFIL_ID=proc_profil.PROFIL_ID LEFT join proc_service on proc_departement_profil.SERVICE_ID=proc_service.SERVICE_ID WHERE proc_departement_profil.PROFIL_ID='.$PROFIL_ID.
      ' AND proc_departement_profil.DEPARTEMENT_ID='.$DAPARTEMENT_ID.'');
    $html='<option value="">Séléctionner</option>';
    if (!empty($service)) 
    {
      foreach ($service as $key)
      {
        $html.='<option value="'.$key['SERVICE_ID'].'">'.$key['DESC_SERVICE'].'</option>';
      }
    }
    $serv=0;
    if (empty($service)) {
      $serv=1;
    }
    echo $html;
  }

    function get_depart()
  {
    $PROFIL_ID =$this->input->post('PROFIL_ID');
    $depart=$this->Model->getRequete('SELECT DISTINCT proc_departement.DAPARTEMENT_ID,proc_departement.DESC_DEPARTEMENT FROM proc_departement WHERE proc_departement.DAPARTEMENT_ID IN (SELECT `DEPARTEMENT_ID` FROM `proc_departement_profil` WHERE 1 AND `PROFIL_ID`='.$PROFIL_ID.')');
    
    $html='<option value="">Séléctionner</option>';
    if (!empty($depart)) 
    {
      foreach ($depart as $key)
      {
        $html.='<option value="'.$key['DAPARTEMENT_ID'].'">'.$key['DESC_DEPARTEMENT'].'</option>';
      }
    }
    $servcheck=$this->Model->getRequete('SELECT `SERVICE_ID` FROM `proc_departement_profil` WHERE 1 AND `PROFIL_ID`='.$PROFIL_ID.' and `SERVICE_ID` is not null');
    $serv=0;
    if (empty($servcheck)) {
      $serv=1;
    }
    $htmls=array('html'=>$html,'sev'=>$serv);
    echo json_encode($htmls);
  }
/**
 *  function to call logs list page
 * 
 * 
 */
  public function get_logs($segment){
    $segment = $this->uri->segment(4);
    $users=$this->Model->getRequeteOne("select USER_LNAME,USER_FNAME from admin_users_backend where md5(USER_ID)='".$segment."'");
    $data['title1']="Liste des logs de l'utilisateur <strong class='text-primary'>".$users['USER_LNAME'].' '.$users['USER_FNAME']."</strong>";
    $data['segment']=$segment;
    $this->load->view("Logs_List_View",$data);
  }

  /**
   * listes des logs d'un utilisiateur
   * 
   */

   public function getListe()
   {
       $segment = $this->input->post('segment');
     
       $query_principal = 'SELECT * FROM logs WHERE 1 and md5(user_id)="'.$segment.'" ';
         
       $var_search= !empty($_POST['search']['value']) ? $_POST['search']['value'] : null;

       $limit='LIMIT 0,10';


       if($_POST['length'] != -1){
         $limit='LIMIT '.$_POST["start"].','.$_POST["length"];
       }
       $order_by='';

       $order_column=array('logs','date_time','ip_adresse','operating_system','browser_used');

       $order_by = isset($_POST['order']) ? ' ORDER BY '.$order_column[$_POST['order']['0']['column']] .'  '.$_POST['order']['0']['dir'] : ' ORDER BY id  ASC';

       $search = !empty($_POST['search']['value']) ? (" AND  (ip_adresse LIKE '%$var_search%' OR operating_system LIKE '%$var_search%' OR logs LIKE '%$var_search%' OR date_time LIKE '%$var_search%' OR browser_used LIKE '%$var_search%') ") : '';     
             
       $critaire = '';

        $query_secondaire=$query_principal.' '.$critaire.' '.$search.' '.$order_by.'   '.$limit;
        $query_filter = $query_principal.' '.$critaire.' '.$search;

        $fetch_op = $this->Model->datatable($query_secondaire);
        $data = array();
         $u=0;	
        foreach ($fetch_op as $row) {
          $u++;
         $sub_array = array();
        $sub_array[]=$u;
          $sub_array[]=$row->logs; 
          $sub_array[]=date('d-m-Y h:i:s',strtotime($row->date_time));  
          $sub_array[]=$row->ip_adresse;  
          $sub_array[]=$row->operating_system;  
          $sub_array[]=$row->browser_used;
          $data[] = $sub_array;
        }
        $output = array(
         "draw" => intval($_POST['draw']),
         "recordsTotal" =>$this->Model->all_data($query_principal),
         "recordsFiltered" => $this->Model->filtrer($query_filter),
         "data" => $data
       );
        echo json_encode($output);

       }



}
?>

