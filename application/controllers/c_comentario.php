<?php

class C_comentario extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model("M_comentario","comentario");
	}

	public function insertar(){
		$this->load->library('form_validation');
		$idcd       = $this->security->xss_clean(strip_tags($this->input->post("idcd")));
		$comentario = $this->security->xss_clean(strip_tags($this->input->post("comentario")));
		$fecha      = $this->security->xss_clean(strip_tags($this->input->post("fecha")));
		$hora       = $this->security->xss_clean(strip_tags($this->input->post("hora")));
		$date = date("Y-m-d").' '.$hora;
		$rpta = $this->comentario->insertarComentario(array($comentario,$date,$idcd,$this->session->userdata('id')));
		if ($rpta == 1) {
			$resultado['rpta'] = 'OK';
			$resultado['data'] = array('nombre'     => ucwords($this->session->userdata('nombres')),
										'comentario' => $comentario,
										'fecha'      => $fecha,
										'hora'       => $hora
									);
			echo json_encode($resultado); 
		}else{
			$resultado['rpta'] = 'ERROR';
			$resultado['data'][] = null; 
			echo json_encode($resultado);
		}
	}
}