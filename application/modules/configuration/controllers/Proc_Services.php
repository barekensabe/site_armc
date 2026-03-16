<?php 


	class Proc_Services extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function index(){

    	$data['departe']=$this->Model->getRequete('SELECT `DAPARTEMENT_ID`,`DESC_DEPARTEMENT` FROM `proc_departement` WHERE 1 ORDER BY DESC_DEPARTEMENT ASC');
			$this->load->view('Proc_Services_View',$data);
		}

		  /**
          * fonction pour la liste des etapes
         */
		function listing()
		{
		  	$query_principal='SELECT `SERVICE_ID`,`DESC_SERVICE`,`proc_departement`.`DESC_DEPARTEMENT`  FROM `proc_service` join proc_departement on proc_service.DAPARTEMENT_ID=proc_departement.DAPARTEMENT_ID WHERE 1';

		  	$var_search= !empty($_POST['search']['value']) ? $_POST['search']['value'] : null;
		  	$limit='LIMIT 0,10';
		  	$draw = isset($_POST['draw']);
		  	$start = isset($postData['start']);

		  	if(isset($_POST["length"]) && $_POST["length"] != -1)
		  	{
		  		$limit='LIMIT '.$_POST["start"].','.$_POST["length"];
		  	}
		  	$order_by='';

		  	$order_column='';
		  	$order_column = array('DESC_SERVICE','DESC_DEPARTEMENT');

		  	$order_by = isset($_POST['order']) ? ' ORDER BY ' . $order_column[$_POST['order']['0']['column']] . '  ' . $_POST['order']['0']['dir'] : ' ORDER BY DESC_ETAPE ASC';

		  	$search = !empty($_POST['search']['value']) ?  (" AND (DESC_SERVICE LIKE '%$var_search%' or DESC_DEPARTEMENT LIKE '%$var_search%')") :'';   

		  	$critaire = ' ';
		  	$query_secondaire=$query_principal.' '.$search.' '.$critaire.' '.$order_by.'   '.$limit;

		  	$query_filter = $query_principal.' '.$search.' '.$critaire;



		  	$fetch_cov_frais = $this->Model->datatable($query_secondaire);
		  	$data = array();
		  	$u=1;
		  	foreach($fetch_cov_frais as $info)
		  	{

		  		$post=array();
		  		$post[]=$u++; 

		  		$post[]=$info->DESC_SERVICE;

		  		$post[]=$info->DESC_DEPARTEMENT;
		  		

		  		$action='';
		  			$action = '<div class="dropdown" style="color:#fff;">
		  			<a class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Options  <span class="caret"></span>
		  			</a>
		  			<ul class="dropdown-menu dropdown-menu-left">';
		  			$action .="<li>
		  			<a class='dropdown-item' href='javascript:;'' onclick='get_etape(".$info->SERVICE_ID.")' ><i class='fa fa-edit'></i><font color='blue' >Modifier</font></a>
		  			</li>";

		  			// $action .="<li>
		  			// <a class='btn btn' id='btnSup' href='".base_url('configuration/Etape/Change/'.$info->SERVICE_ID.'/'.$info->IS_ACTIF )."' style='color:red'><span class ='btn-outline-info fa fa-check'>Activer</a>
		  			// </li>";

		  			$action .="<li>
		  			<a href='#' class='btn btn' style='color:red' id='btnSup' onclick='delete_etape(".$info->SERVICE_ID.")' title='delete'><i class='align-middle fas fa-fw fa-trash'></i>Supprimer</a>

		  			</li>";


		  		
		  		$post[]=$action;
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

	    
 	function addAction()
 	{
 	 	
 	 	$donnees=$this->Model->getOne('proc_service',array('DESC_SERVICE'=>$this->input->post('DESC_SERVICE')));
 	 	if(empty($donnees))
 	 	{
 	 		$DESC_SERVICE=$this->input->post('DESC_SERVICE');
 	 		$DAPARTEMENT_ID=$this->input->post('DAPARTEMENT_ID');

 	 		$data_insert=array(
 	 			'DESC_SERVICE'=>$DESC_SERVICE,
 	 		    'DAPARTEMENT_ID'=>$DAPARTEMENT_ID
 	 		);
 	 		$this->Model->create('proc_service',$data_insert);
 	 		
 	 	}
 	 	 echo json_encode(array('status' => 1));
 	}

	function getOne($id)
	{
		$get = $this->Model->getOne('proc_service',array('SERVICE_ID'=>$id));
		//print_r($get);die();

		 $pil=$this->Model->getRequete('SELECT `DAPARTEMENT_ID`,`DESC_DEPARTEMENT` FROM `proc_departement` WHERE 1 ORDER BY DESC_DEPARTEMENT ASC');

		 $html_departe='<option value="">Séléctionner</option>';
		 foreach ($pil as $key)
		 {
		 	$selected='';
		 	if($key['DAPARTEMENT_ID']==$get['DAPARTEMENT_ID'])
		 	{
		 		$selected=' selected';

		 	}
		 	$html_departe.='<option value="'.$key['DAPARTEMENT_ID'].'" '.$selected.'>'.$key['DESC_DEPARTEMENT'].'</option>';
		 }

		$output=array('DESC_SERVICE'=>$get['DESC_SERVICE'],'html_departe'=>$html_departe);
          //print_r($output);die();
		echo json_encode($output);
	}
	function update()
	{
		$id=$this->input->post('id');
			// print_r($id);die();
		$DESC_SERVICE=$this->input->post('DESC_SERVICE');
		$DAPARTEMENT_ID=$this->input->post('DAPARTEMENT_ID');

		$data_update=array
		(
		    'DESC_SERVICE'=>$DESC_SERVICE,
		    'DAPARTEMENT_ID'=>$DAPARTEMENT_ID
	    );

		$update= $this->Model->update('proc_service',array('SERVICE_ID'=>$id),$data_update);
		//print_r($update);die();

		$response ['status'] = 1;
		echo json_encode(array('status'=>true));

	}

        //fonction de supprimer
	function delete_Etape($id)
	{
		$this->Model->delete('proc_service',array('SERVICE_ID'=>$id));

		echo json_encode(array('status' => TRUE));
	}
}
?>
