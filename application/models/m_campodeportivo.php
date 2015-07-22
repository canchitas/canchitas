<?php
class M_campodeportivo extends CI_Model{
	private $resultado;
	function __construct(){
		parent::__construct();
		$this->resultado = array();
		$this->load->model('M_ubigeo','ubigeo');
		$this->load->model('M_comentario','comentario');
	}

	function listar_camposdeportivos(){
		$this->db->order_by('valoracion','desc');
		$consulta = $this->db->get('campo_deportivo');
		$str = $consulta->result();
		foreach ($str as $val) {
			$resultado[] = array('idcampo'      => $val->idcampo, 
								 'nombre'       => $val->nombre,
								 'direccion'    => $val->direccion,
								 'referencia'   => $val->referencia,
								 'estado'       => $val->estado,
								 'ubigeo'       => $this->ubigeo->localizacion($val->distrito_iddistrito),
								 'hora_apertura'=> $val->hora_inicio,
								 'hora_cierre'  => $val->hora_fin,
								 'valoracion'   => $val->valoracion,
								 'imagen'       => $val->imagen
								);	
		}
		return json_encode($resultado);
	}

	function detalle_campodeportivo($id_cd){
		$this->db->where('idcampo',$id_cd);
		$this->db->from('campo_deportivo');
		$consulta=$this->db->get();
		if ($consulta->num_rows > 0) {
			$val = $consulta->row();
			$resultado[] = array('idcampo'      => $val->idcampo , 
								 'nombre'       => $val->nombre,
								 'direccion'    => $val->direccion,
								 'referencia'   => $val->referencia,
								 'estado'       => $val->estado,
								 'ubigeo'       => $this->ubigeo->localizacion($val->distrito_iddistrito),
								 'hora_apertura'=> $val->hora_inicio,
								 'hora_cierre'  => $val->hora_fin,
								 'valoracion'   => $val->valoracion,
								 'imagen'       => $val->imagen,
								 'comentarios'  => $this->comentario->mostrarComentario($val->idcampo) 
							);	
		}
		return json_encode($resultado);
	}
}