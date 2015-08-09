<?php 
	if($this->session->userdata('usuario')){
		redirect(BASE_URL);
	}
	$this->load->view("templates/head");
	$this->load->view("templates/header2");
	$this->load->view("vistas/login");
	$this->load->view("templates/footer");