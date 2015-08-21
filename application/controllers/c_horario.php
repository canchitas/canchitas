<?php

class C_horario extends CI_Controller{
	
	function __construct(){
		PARENT::__construct();
		$this->load->model('M_horario','horario');
	}

	public function listarhora(){
		$id     = $this->security->xss_clean(strip_tags($this->input->post("id")));
		$limite = $this->security->xss_clean(strip_tags($this->input->post("limite")));
		$var['data'] = $this->horario->listarhora($id,$limite);
		echo json_encode($var);
	}
}