<?php

class M_valoracion extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function puntajeGlobal( $id ){
		$sql = "SELECT COUNT(idcampo) as electores, SUM(puntaje) as votos FROM valoracion  WHERE idcampo = ?;";
		$consulta = $this->db->query($sql,$id);
		$resultado = 0;
		if ($consulta->num_rows > 0) {
			$value = $consulta->row();
			if( ( (int)$value->electores) > 0 ){
				$resultado = ((int)($value->votos)*100)/((int)($value->electores)*5);
				if ( $resultado > 0 && $resultado < 10 ) {
					return 0;
				}elseif ( $resultado > 09 && $resultado < 30 ) {
					return 1;
				}elseif ( $resultado > 29 && $resultado < 50 ) {
					return 2;
				}elseif ( $resultado > 49 && $resultado < 70 ) {
					return 3;
				}elseif ( $resultado > 69 && $resultado < 90 ) {
					return 4;
				}elseif ( $resultado > 89 && $resultado < 101 ) {
					return 5;
				}
			}else{
				return 0;
			}
		}
		else{
			return 0;
		}
	}
}