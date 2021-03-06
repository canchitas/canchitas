<?php 
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_campodeportivo','campodeportivo');
		$this->load->model('M_ubigeo','ubigeo');
	}
	function index(){
		$this->load->view("home");
		// if ($this->session->userdata('nombres')) {
		// 	echo "Bienvenido: ".$this->session->userdata('nombres');
		// 	echo " ID: ".$this->session->userdata('id');
		// }else{
		// 	$this->load->view("admin/Loginadmin_v");
		// }	
		
		// $datos['cd'] = $this->campodeportivo->listar_camposdeportivos();
		// $this->load->view("v_campodeportivo",$datos);
	}
	function buscar(){
		$this->load->view("templates/head");
		$this->load->view("templates/header");
		$datos['cd'] = $this->campodeportivo->listar_camposdeportivos();	
		$this->load->view("v_listarcamposdeportivos",$datos);
		$this->load->view("templates/footer");
	}
	function detalle_campodeportivo($id_cd){
		$cd = $this->security->xss_clean($id_cd);
		$this->load->view("templates/head");
		$this->load->view("templates/header");
		$datos['detalle'] = $this->campodeportivo->detalle_campodeportivo($cd);
		$this->load->view('v_detallecampodeportivo',$datos);
		$this->load->view("templates/footer");

	}
	function busqueda(){
		$key=$this->security->xss_clean($this->input->post("key"));
		$var=$this->campodeportivo->listar_camposdeportivos_buscar($key);
		echo json_encode($var);
	}
}
?>