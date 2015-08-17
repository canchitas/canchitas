<?php
class M_campodeportivo extends CI_Model{
	private $resultado;
	function __construct(){
		parent::__construct();
		$this->resultado = array();
		$this->load->model('M_ubigeo','ubigeo');
		$this->load->model('M_comentario','comentario');
		$this->load->model('M_horario','horario');
		$this->load->model('M_galeria','galeria');
		$this->load->model('M_valoracion','valoracion');
	}

	function listar_camposdeportivos(){
		$sql1 = 'SELECT cd.*,COUNT(v.idcampo) as electores, SUM( v.puntaje ) AS valoracion
				FROM valoracion AS v INNER JOIN campo_deportivo AS cd
				WHERE v.idcampo = cd.idcampo GROUP BY idcampo ORDER BY valoracion DESC;';
		$sql = 'SELECT cd.* FROM campo_deportivo AS cd;';
		$consulta = $this->db->query($sql);
		$str = $consulta->result();
		foreach ($str as $val) {
			$this->resultado[] = array('idcampo'      => $val->idcampo, 
									   'nombre'       => ucwords($val->nombre),
									   'direccion'    => ucwords($val->direccion),
									   'referencia'   => ucwords($val->referencia),
									   'estado'       => $val->estado,
									   'ubigeo'       => $this->ubigeo->localizacion($val->idubigeo),
									   'hora_apertura'=> $this->horario->hora($val->idhorario_inicio),
									   'hora_cierre'  => $this->horario->hora($val->idhorario_fin),
									   'valoracion'   => $this->valoracion->puntajeGlobal($val->idcampo),
									   'imagen'       => 'upload/'.$val->imagen
									);	
		}
		return json_encode($this->resultado);
	}

	function detalle_campodeportivo($id_cd){
		$sql1 = 'SELECT cd.*, SUM( v.puntaje ) AS valoracion
				FROM valoracion AS v JOIN campo_deportivo AS cd WHERE v.idcampo = cd.idcampo AND cd.idcampo = ?
				GROUP BY idcampo ORDER BY valoracion DESC;';
		$sql = 'SELECT cd.* FROM campo_deportivo AS cd WHERE cd.idcampo = ?';
		$consulta = $this->db->query($sql,$id_cd);
		if ($consulta->num_rows > 0) {
			$val = $consulta->row();
			$this->resultado[] = array('idcampo'      => $val->idcampo , 
									   'nombre'       => ucwords($val->nombre),
    								   'direccion'    => ucwords($val->direccion),
									   'referencia'   => ucwords($val->referencia),
									   'estado'       => $val->estado,
									   'latitud'      => $val->latitud,
									   'longitud'     => $val->longitud,
									   'ubigeo'       => $this->ubigeo->localizacion($val->idubigeo),
									   'hora_apertura'=> $this->horario->hora($val->idhorario_inicio),
									   'hora_cierre'  => $this->horario->hora($val->idhorario_fin),
									   'valoracion'   => $this->valoracion->puntajeGlobal($val->idcampo),
									   'imagen'       => 'upload/'.$val->imagen,
									   'galeria'      => $this->galeria->imagenes($val->idcampo),
									   'comentarios'  => $this->comentario->mostrarComentario($val->idcampo) 
							);	
		}
		return json_encode($this->resultado);
	}
}