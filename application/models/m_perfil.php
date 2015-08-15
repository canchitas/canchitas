<?php

class M_perfil extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function datosPersonales(){
		$sql = "SELECT lc.idcliente as idcliente,lc.idlogin_cliente,lc.usuario as user,
				c.persona_dni as dni, c.valoracion as valoracion, c.foto as foto,
				dp.nombre as nombres, dp.apellido_paterno as paterno, dp.apellido_materno as materno,
				DATE_FORMAT( dp.fechanac, '%d/%m/%Y' ) as fecha_nacimiento,dp.email as email,dp.telefono as telefono, 
				dp.celular as celular,dp.sexo as sexo
				FROM login_cliente lc JOIN cliente c, datos_persona dp 
				WHERE lc.idcliente = c.idcliente AND c.persona_dni = dp.dni AND lc.idlogin_cliente = ?;";
		$consulta = $this->db->query($sql,$this->session->userdata('id'));
		if ($consulta->num_rows > 0) {	
			$resultado['rpta']   = 'OK';
			$resultado['data'][] = $consulta->row();	
		}else{
			$resultado['rpta']   = 'ERROR';
			$resultado['data'][] = null;	
		}
		return json_encode($resultado);	
	}
	function actualizarDatospersonales($data = array()){
		
	}
}