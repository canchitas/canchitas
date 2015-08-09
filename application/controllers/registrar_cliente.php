<?php 

	class Registrar_cliente extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model("Model_login_cliente");
		}

		function vista_registro(){

	 		$this->load->view("registrarse");
	    } 
	    
	}
 ?>