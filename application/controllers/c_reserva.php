<?php

class C_reserva extends CI_Controller{
	function __construct(){
		parent::__construct();
		// $this->load->library('session');
		$this->load->model("M_reserva","reserva");
		// $this->load->model("M_valoracion","valoracion");
	}

	public function reservar(){
		$url_campodeportivo = $this->security->xss_clean($this->input->post("url_campodeportivo"));
		$id_campodeportivo = $this->security->xss_clean($this->input->post("id_campodeportivo"));
		$login_cliente = $this->security->xss_clean($this->input->post("login_cliente"));
		$fecha = $this->security->xss_clean($this->input->post("fecha"));
		$horaapertura = $this->security->xss_clean($this->input->post("horaapertura"));
		$horacierre = $this->security->xss_clean($this->input->post("horacierre"));

		$this->reserva->reserva($url_campodeportivo,$id_campodeportivo,$login_cliente,$fecha,$horaapertura,$horacierre);
		
		
	}

	
}