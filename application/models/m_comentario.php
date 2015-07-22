<?php
class M_comentario extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function mostrarComentario($idCampoDeportivo){
		//$this->db->order_by('fecha','desc');
		//$consulta = $this->db->get('comentario');
		//$str = $consulta->result();
		$this->db->order_by('fecha,hora','ASC');
		$this->db->where('idcampo',$idCampoDeportivo);
		$consulta = $this->db->get('comentario');
		$str = $consulta->result();
		if ($consulta->num_rows > 0) {
			$resultado['rpta'] = 'OK';
			foreach ($str as $val) {
				$resultado['data'][] = array('comentarista' => $this->comentarista($val->idlogin_cliente),
											 'comentario' => $val->comentario,
											 'fecha' => $val->fecha,
											 'hora' => $val->hora
					);	
			}
			return $resultado;
		}else{
			$resultado['rpta'] = 'ERROR';
			$resultado['data'][] = null;
			return $resultado;
		}
	}

	public function comentarista($idPersona){
		$sql = "SELECT CONCAT_WS( ' ', nombre, apellido_paterno ) AS nombres FROM cliente AS c JOIN datos_persona AS dp
						WHERE c.idcliente =? AND c.persona_dni = dp.dni;";
		$consulta = $this->db->query($sql,array($this->cliente($idPersona) ));
		if($consulta->num_rows>0){
			$val=$consulta->row();
			return $val->nombres;
		}else{
			return 'Anónimo';
		}
	}

	public function cliente($idPersona){
		$this->db->where('idlogin_cliente',$idPersona);
		$this->db->from('login_cliente');
		$consulta=$this->db->get();
		if ($consulta->num_rows > 0) {
			$val = $consulta->row();
			return (int)$val->cliente_idcliente;
		}else{
			return 0;
		}
	}
} 