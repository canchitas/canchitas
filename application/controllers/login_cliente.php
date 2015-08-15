<?php 
	include "funciones/funciones_login.php";

	class Login_cliente extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model("Model_login_cliente");
		}

		function login_sesion(){
			$this->load->library('facebook'); // Automatically picks appId and secret from config
			$user = $this->facebook->getUser();
	        
	        if ($user) {
	            try {
	                $data['user_profile'] = $this->facebook->api('/me');
	            } catch (FacebookApiException $e) {
	                $user = null;
	            }
	            extract($data);
	            $this->session->set_userdata('id',$data['user_profile']['id']);
	            $this->session->set_userdata('usuario',$data['user_profile']['name']);
	            // $data['logout_url'] = site_url('home/logout'); 
	        }else {
	            $data['login_url'] = $this->facebook->getLoginUrl(array(
	                'redirect_uri' => site_url('logincliente'), 
	                'scope' => array("email",'publish_actions','user_likes') 
	            ));
	        }

	 		$this->load->view("iniciar_sesion",$data);

	    } 
	    function logup_sesion(){
	    	$this->load->library('facebook');

       		 $this->facebook->destroySession();
	 		$this->session->sess_destroy();
	 		
	 		 redirect(BASE_URL);
	    } 

	    function verificar(){
			$this->load->library('form_validation');
			// $this->output->enable_profiler(TRUE);
			$usuario=$this->security->xss_clean(strip_tags($this->input->post("usuario")));
			$password=$this->security->xss_clean(strip_tags($this->input->post("password")));

			$usuario_m=$this->security->xss_clean(strip_tags($this->input->post("usuario")));
			$password_m=$this->security->xss_clean(strip_tags($this->input->post("password")));

			$response=new StdClass;

			$validos="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@$%&/()=.-_";
			$response->mensaje=array();
			$response->errors=array();
			$response->validate=FALSE;
			if(!empty($usuario) && !empty($password)){
				$usuario=alfabeto_valido($this->input->post("usuario"),$validos);
				if($usuario===TRUE){

					$user=array('usuario'=>$usuario_m);
					if($this->Model_login_cliente->verificar($user)===TRUE){

						$password=alfabeto_valido($this->input->post("password"),$validos);
						if($password===TRUE){
							$pass=array('password'=>$password_m);
							if($this->Model_login_cliente->verificar($pass,$init=TRUE)===TRUE){

								$mensaje=$this->session->userdata('usuario');
								array_push($response->mensaje,"HOLA $mensaje");
								// redirect(BASE_URL);
								$response->validate=TRUE;

							}
							else{
								array_push($response->mensaje,"el password incorret!!");
							}

						}
						else{

							array_push($response->errors," password(paramaetros no validos)");
						}
					}
					else{

						array_push($response->mensaje,"el usuario $usuario_m no existe!!");
					}

					

				}
				else{
				array_push($response->errors," user(paramaetros no validos)");
				}
			}
			else{
				array_push($response->errors," Llene los campos");
			}
	    	echo json_encode($response);
	    }
	}
 ?>