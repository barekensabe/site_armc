<?php 

	
	/**
	 * 
	 */
	class Erreur extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function index(){




			$this->load->view('Erreur_view')
		}
	}
 ?>