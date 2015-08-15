<?php

class M_horario extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function hora($id){
		$this->db->where('idhorario',$id);
		$consulta = $this->db->get('horario');
		if ($consulta->num_rows>0) {
			$str = $consulta->row();	
			return $str->hora;
		}else{
			return '00:00:00';
		}
	}
}
