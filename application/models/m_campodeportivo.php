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
									   	   'url'       	  => $val->url,
										   'imagen'       => 'upload/'.$val->imagen
										);	
			}
			return json_encode($this->resultado);
		
	}
	function listar_camposdeportivos_buscar($buscar){

			 // FROM post p left join semejanzapost s on p.id=s.idPost2
			/*SELECT cd.nombre 
			FROM ubigeo u left join campo_deportivo cd on u.id=cd.idubigeo
			WHERE departamento LIKE 'acora%' or provincia LIKE 'acora%'or distrito LIKE 'acora%'*/
			$sql = "SELECT cd.* 
			FROM ubigeo u left join campo_deportivo cd on u.id=cd.idubigeo
			WHERE departamento LIKE '$buscar%' or provincia LIKE '$buscar%'or distrito LIKE '$buscar%'";
			$consulta = $this->db->query($sql);
			$str = $consulta->result();
			foreach ($str as $val) {
				if($val->idcampo!=NULL){
					// $response=new StdClass;
					// $this->resultado["datos"][]="hola";
					$this->resultado[]= array('idcampo'      => $val->idcampo, 
											   'nombre'       => ucwords($val->nombre),
											   'direccion'    => ucwords($val->direccion),
											   'referencia'   => ucwords($val->referencia),
											   'estado'       => $val->estado,
											   'ubigeo'       => $this->ubigeo->localizacion($val->idubigeo),
											   'hora_apertura'=> $this->horario->hora($val->idhorario_inicio),
											   'hora_cierre'  => $this->horario->hora($val->idhorario_fin),
											   'valoracion'   => $this->valoracion->puntajeGlobal($val->idcampo),
											   'imagen'       => 'upload/cancha/'.$val->imagen
											);
					
				}
				else{
					// $this->resultado["datos"][]="chau";
				}	
			}
			return $this->resultado;
	}
	function detalle_campodeportivo($id_cd){
		$sql1 = 'SELECT cd.*, SUM( v.puntaje ) AS valoracion
				FROM valoracion AS v JOIN campo_deportivo AS cd WHERE v.idcampo = cd.idcampo AND cd.idcampo = ?
				GROUP BY idcampo ORDER BY valoracion DESC;';
		$sql = 'SELECT cd.* FROM campo_deportivo AS cd WHERE cd.url = ?';
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
									   'url'       	  => $val->url,
									   'galeria'      => $this->galeria->imagenes($val->idcampo),
									   'comentarios'  => $this->comentario->mostrarComentario($val->idcampo) 
							);	
		}
		return json_encode($this->resultado);
	}
}

// [
// {"idcampo":"1","nombre":"La Foquita","direccion":"Jr Puno","referencia":"Cerca Del Centro","estado":"1","ubigeo":[{"id":"2112","distrito":"Asuncion","provincia":"Chachapoyas","departamento":"Amazonas"}],"hora_apertura":"07:00:00","hora_cierre":"23:00:00","valoracion":4,"imagen":"upload\/default.png"},
// {"idcampo":"2","nombre":"La Foquita","direccion":"Jr Arequipa","referencia":"En Puno","estado":"1","ubigeo":[{"id":"15872011","distrito":"Puno","provincia":"Puno","departamento":"Puno"}],"hora_apertura":"04:00:00","hora_cierre":"14:00:00","valoracion":0,"imagen":"upload\/default.png"},
// {"idcampo":"7","nombre":"Mi Camchita XD!","direccion":"Jr Lambayeque","referencia":"La Mejor Cacvhita De Puno","estado":"1","ubigeo":[{"id":"15872011","distrito":"Puno","provincia":"Puno","departamento":"Puno"}],"hora_apertura":"07:00:00","hora_cierre":"19:00:00","valoracion":0,"imagen":"upload\/default.png"},
// {"idcampo":"8","nombre":"Las Malbinas","direccion":"Jr Puno","referencia":"Cerca Del Puente Peatonal","estado":"1","ubigeo":[{"id":"15882012","distrito":"Acora","provincia":"Puno","departamento":"Puno"}],"hora_apertura":"04:00:00","hora_cierre":"11:00:00","valoracion":0,"imagen":"upload\/default.png"},
// {"idcampo":"9","nombre":"Mi Camchita XD!22","direccion":"Jr Lambayeque2","referencia":"La Mejor Cacvhita De Puno2 Cerca Del Puente Peatonal","estado":"1","ubigeo":[{"id":"15872011","distrito":"Puno","provincia":"Puno","departamento":"Puno"}],"hora_apertura":"07:00:00","hora_cierre":"19:00:00","valoracion":0,"imagen":"upload\/default.png"},
// {"idcampo":"10","nombre":"Las Malbinas22","direccion":"Jr Puno2","referencia":"Cerca Del Puente Peatonal Cerca Del Puente Peatonal","estado":"1","ubigeo":[{"id":"15882012","distrito":"Acora","provincia":"Puno","departamento":"Puno"}],"hora_apertura":"04:00:00","hora_cierre":"11:00:00","valoracion":0,"imagen":"upload\/default.png"}]