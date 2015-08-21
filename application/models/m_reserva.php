<?php 
	class M_reserva extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->resultado  = array();
	}

	public function reserva($url_campodeportivo,$id_campodeportivo,$login_cliente,$fecha,$horaapertura,$horacierre){
		$response=new StdClass;
		$fecha_sistema = date("Y-m-d");
		$hora_sistema = date("H:i:s");
		$data = array(
					'fecha_sistema'  => $fecha_sistema,
					'hora_sistema' => $hora_sistema,
					'estado' => 1,
					'fecha_reserva' => $fecha,
					'idcliente' => $login_cliente,
					'idcampo' => $id_campodeportivo,
					'horario_incio' => $horaapertura,
					'horario_fin' => $horacierre
					);
				$this->db->insert('reserva',$data);
		$response->mensaje="insercion correcta";
		return $response;
	}

}
 ?>