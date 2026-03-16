<?php 

	/**
	 * 
	 */
	class Test extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function index(){

			$this->load->view('test_view');
		}
	}
 ?>