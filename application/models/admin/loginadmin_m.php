<?php 
	class Loginadmin_m extends CI_Model{
		public function __construct(){
			parent::__construct();
            $this->load->database();
		}

		function verificar($post=array(),$init=FALSE){
			// $post=array('nick'=>'elard');
			$sql="SELECT la.usuario as user, an.idadmin as id, an.persona_dni as dni, concat_ws(' ',dp.nombre,dp.apellido_paterno )as nombres,dp.email as email 
				  FROM login_admin as la INNER JOIN administrador_negocio as an,datos_persona as dp 
				  WHERE la.idlogin_admin = an.idadmin and an.persona_dni = dp.dni and la.usuario = ? and la.password=?;";
			$consulta = $this->db->query($sql, $post);
			//$this->db->where($post);
			//$this->db->from('login_admin');
			//$consulta=$this->db->get();		
			if($consulta->num_rows>0){
				$val=$consulta->row();
				$this->session->set_userdata('usuario', $val->user);
				$this->session->set_userdata('id',     $val->id);
				$this->session->set_userdata('nombres', $val->nombres);
				$this->session->set_userdata('email',   $val->email);
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
 ?>