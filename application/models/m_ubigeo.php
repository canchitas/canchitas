<?php

class M_ubigeo extends CI_Model{
	private $resultado;
	function __construct(){
		parent::__construct();
		$resultado = array();
	}

	public function localizacion($str){
		$this->db->where('idubigeo',$str);
		$consulta = $this->db->get('ubigeo');
		$str = $consulta->row();
		$resultado[] = array('idubigeo'    => $str->id,       
							 'distrito'    => $str->distrito,
							 'provincia'   => $str->provincia,
							 'departamento'=> $str->departamento	
						);	 
		return $resultado;
	}
}