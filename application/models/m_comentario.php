<?php
class M_comentario extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function insertarComentario($data=array()){
		$sql = "INSERT INTO comentario(comentario,fecha,idcampo,idlogin) VALUES (?,?,?,?);";
		$str = $this->db->query($sql, $data); 
		return "".$str;
	}
	function mostrarComentario($idCampoDeportivo){
		//$this->db->order_by('fecha','desc');
		//$consulta = $this->db->get('comentario');
		//$str = $consulta->result();
		$sql = "SELECT c.idlogin as idlogin, c.comentario as comentario, DATE_FORMAT( c.fecha, '%d/%m/%Y' ) AS fecha, DATE_FORMAT( c.fecha, '%r' ) AS hora
				FROM comentario as c WHERE c.idcampo = ? ORDER BY fecha ASC;";
		$consulta = $this->db->query($sql,$idCampoDeportivo);
		$str = $consulta->result();
		if ($consulta->num_rows > 0) {
			$resultado['rpta'] = 'OK';
			foreach ($str as $val) {
				$resultado['data'][] = array('comentarista' => ucwords($this->comentarista($val->idlogin)),
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
						WHERE c.idcliente = ? AND c.idcliente = dp.id_persona;";
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
			return (int)$val->idlogin_cliente;
		}else{
			return 0;
		}
	}
} 