<?php

class C_campodeportivo extends CI_Controller{
	
	function __construct(){
		PARENT::__construct();
		$this->load->model('M_ubigeo','ubigeo');
	}
	public function index(){
		if ($this->session->userdata('id')) {
			$var['data'] = $this->ubigeo->departamento();
			$this->load->view("v_registrarcampodeportivo",$var);	
		}
	}
	public function provincia(){
		$id = $this->security->xss_clean(strip_tags($this->input->post("id")));
		if ($this->session->userdata('id')) {
			$var['data'] = $this->ubigeo->provincia($id);
			echo json_encode($var);	
		}
	}
	public function distrito(){
		$id = $this->security->xss_clean(strip_tags($this->input->post("id")));
		if ($this->session->userdata('id')) {
			$var['data'] = $this->ubigeo->distrito($id);
			echo json_encode($var);	
		}
	}
	public function registrarcampodeportivo(){
		echo "OK";
	}
}