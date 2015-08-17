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
	    public function admin(){
	    	if($this->session->userdata('usuario')){
				redirect(BASE_URL.'nuevocampodeportivo');
			}else{
				$this->load->view("v_loginadmin");
			}
	    }
	    function login(){
			$this->load->library('form_validation');
			$usuario=$this->security->xss_clean(strip_tags($this->input->post("usuario")));
			$password=$this->security->xss_clean(strip_tags($this->input->post("password")));
			if(!empty($usuario) && !empty($password)){
				if($this->Loginadmin_m->verificar(array($usuario,$password))===TRUE){					
					$this->session->userdata('usuario');
					$this->session->userdata('id');
				    $this->session->userdata('nombres');
					$this->session->userdata('email');
					
					redirect(BASE_URL."nuevocampodeportivo");
					$this->value[] = array( 'rpta' =>'ok',
											'data' => 'null'
										 );
				}else{
					redirect(BASE_URL.'loginadmin');
					$this->value[] = array( 'rpta'=>'error',
											'data' => array('error' => 'El usuario '.$usuario.' no existe..!')
										);
				}
			}else{
				redirect(BASE_URL.'loginadmin');
				$this->value[] = array( 'rpta'=>'error',
											'data' => array('error' => 'Campos de texto vacíos..!')
										);
			}
	    	header('Content-type: application/json; charset=utf-8');
	    	//echo json_encode($this->value,JSON_FORCE_OBJECT);
	    }
	}
