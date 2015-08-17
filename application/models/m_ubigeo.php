<?php

class M_ubigeo extends CI_Model{
	private $resultado;
	function __construct(){
		parent::__construct();
		$resultado = array();
	}

	public function localizacion($str){
		$this->db->where('id',$str);
		$consulta = $this->db->get('ubigeo');
		$str = $consulta->row();
		$resultado[] = array('id'    => $str->id,       
							 'distrito'    => ucfirst(strtolower($str->distrito)),
							 'provincia'   => ucfirst(strtolower($str->provincia)),
							 'departamento'=> ucfirst(strtolower($str->departamento))	
						);	 
		return $resultado;
	}

	public function departamento(){
		$sql = 'SELECT * FROM ubigeo GROUP BY (departamento)';
		$consulta = $this->db->query($sql);
		$str = $consulta->result();
		$resultado['rpta'] = 'OK';
		foreach ($str as $val) {
			$resultado['data'][] = array('id'      => $val->id, 
								 'departamento'    => ucwords($val->departamento),
								);	
		}		
		return json_encode($resultado);
	}

	public function provincia($str){
		$sql='SELECT * FROM ubigeo WHERE departamento = ? group by provincia;';
		$consulta = $this->db->query($sql,$str);
		$str = $consulta->result();
		$this->resultado['rpta'] = 'OK';
		foreach ($str as $val) {
			$this->resultado['data'][] = array('id'      => $val->id, 
								 'provincia'       => ucwords($val->provincia),
								);	
		}		
		return ($this->resultado);
	}

	public function distrito($str){
		$this->db->where('id',$str);
		$consulta = $this->db->get('ubigeo');
		$str = $consulta->row();
		$resultado[] = array('id'    => $str->id,       
							 'distrito'   => ucfirst(strtolower($str->distrito))
						);	 
		return $resultado;
	}

}