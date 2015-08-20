<?php

class M_horario extends CI_Model{
	private $resultado;
	function __construct(){
		parent::__construct();
		$this->resultado  = array();
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
	public function listarhora($hora,$limitar){
		$sql = '';
		if ($limitar === false) {
			$sql='SELECT * FROM horario ORDER BY hora ASC;';			
		}else{
			$sql="SELECT * FROM horario WHERE idhorario > '".$hora."' ORDER BY hora ASC;";			
		}
		$consulta = $this->db->query($sql);
		$str = $consulta->result();
		if ($consulta->num_rows > 0){
			$this->resultado['rpta'] = 'OK';
			foreach ($str as $val) {
				$this->resultado['data'][] = array('id'   => $val->idhorario, 
									 			   'hora' => ucwords($val->hora),
												);	
			}
		}else{
			$this->resultado['rpta'] = 'ERROR';
			$this->resultado['data'] = null;			
		}
		return $this->resultado;		
	}
}
