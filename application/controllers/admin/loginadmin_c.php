<?php 
	class Loginadmin_c extends CI_Controller{
		private $value;
		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model("admin/Loginadmin_m");
			$this->value = array();
		}
		function login_sesion(){
	 		// $this->load->view("admin/login");
	    } 
	    function logup_sesion(){
	 		$this->session->sess_destroy();
	 		 // redirect(BASE_URL.'login');
	    } 

	    function login(){
			$this->load->library('form_validation');
			$usuario=$this->security->xss_clean(strip_tags($this->input->post("usuario")));
			$password=$this->security->xss_clean(strip_tags($this->input->post("password")));

			$response=new StdClass;

			$response->mensaje=array();
			$response->errors=array();
			if(!empty($usuario) && !empty($password)){
				//if($this->M_LoginCliente->verificar(array('usuario'=>$usuario))===TRUE){
				if($this->Loginadmin_m->verificar(array($usuario,$password))===TRUE){					
					$this->value[] = array( 'rpta' =>'ok',
											'data' => 'null'
										 );
					$this->session->userdata('usuario');
					$this->session->userdata('id');
				    $this->session->userdata('nombres');
					$this->session->userdata('email');
				}else{
					//array_push($response->mensaje,"el usuario $usuario no existe!!");
					$this->value[] = array( 'rpta'=>'error',
											'data' => array('error' => 'El usuario '.$usuario.' no existe..!')
										);
				}
			}else{
				//array_push($response->errors," Llene los campos");
				$this->value[] = array( 'rpta'=>'error',
											'data' => array('error' => 'Campos de texto vacíos..!')
										);
			}
	    	//echo json_encode($response);
	    	header('Content-type: application/json; charset=utf-8');
	    	echo json_encode($this->value,JSON_FORCE_OBJECT);
	    	//return json_encode($this->value,JSON_FORCE_OBJECT);
	    }
	}
 ?>