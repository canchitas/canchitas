<?php

class M_galeria extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	function imagenes($id){
		$sql = "SELECT g.url AS link, g.descripcion AS descripcion, DATE_FORMAT( g.fecha, '%d/%m/%Y' ) AS fecha
				FROM galeria g WHERE g.idcampo =?;";
		$consulta = $this->db->query($sql,$id);
		if ($consulta->num_rows > 0) {
			$value = $consulta->result();
			$resultado['rpta'] = 'OK';
			foreach ($value as $val) {
				$resultado['data'][] = array('link'        => 'static/assets/'.$val->link,
											 'descripcion' => $val->descripcion,
											 'fecha'       => $val->fecha
										);	
			}
			return $resultado;
		}else{
			$resultado['rpta'] = 'ERROR';
			$resultado['data'][] = null;
			return $resultado;
		}
	}
}