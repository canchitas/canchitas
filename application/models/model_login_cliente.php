<?php 
	class Model_login_cliente extends CI_Model{
		public function __construct(){
			parent::__construct();
            $this->load->database();
		}

		function verificar($post=array(),$init=FALSE){
			// $post=array('nick'=>'elard');
			$this->db->where($post);
			$this->db->from('login_cliente');
			$consulta=$this->db->get();

			if($consulta->num_rows>0){
				// each
				
				if($init==TRUE){
					$consulta=$consulta->row();
					$this->session->set_userdata('usuario',$consulta->usuario);
					// $this->session->set_userdata('email',$consulta->email);
				}
				return TRUE;

			}
			else{
				return FALSE;
			}
		}
	}

 ?>