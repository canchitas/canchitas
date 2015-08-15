<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




$route['default_controller'] 			= "home";

$route['logincliente']         			= "login_cliente/login_sesion";
$route['verificarcliente']         			= "login_cliente/verificar";
$route['registrarse']         			= "registrar_cliente/vista_registro";

$route['loginadmin']        		 	= "loginadmin/Loginadmin_c/login";
$route['campodeportivo/(:num)/:any'] 	= "home/detalle_campodeportivo/$1/";
$route['404_override'] 					= '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */