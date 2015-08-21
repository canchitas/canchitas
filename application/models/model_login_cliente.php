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
					$this->session->set_userdata('id_cliente',$consulta->cliente_idcliente);
					
				}
				return TRUE;

			}
			else{
				return FALSE;
			}
		}

		function login_facebook($id,$usuario){
			$this->db->where('idfacebook',$id);
			$this->db->from('login_cliente');
			$consulta =$this->db->get();
			if($consulta->num_rows>0){

				// $consulta=$consulta->row();
				// $this->session->set_userdata('usuario',$consulta->usuario);
				// $this->session->set_userdata('id_cliente',$consulta->cliente_idcliente);
			}
			else{

				$this->db->set('nombre', $usuario);
				$this->db->insert('datos_persona');
				$id_ultimo=mysql_insert_id();

				
				$this->db->set('persona' , $id_ultimo);
				$this->db->insert('cliente');

				$data = array(
					'idcliente'  => $id_ultimo,
					'idfacebook' => $id
					);
				$this->db->insert('login_cliente',$data);

				// $this->session->set_userdata('usuario',$usuario);
				// $this->session->set_userdata('id_cliente',$id_ultimo);

			}
		}
	}

 ?>