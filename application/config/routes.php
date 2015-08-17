<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




$route['default_controller'] 			= "home";

$route['logincliente']         			= "login_cliente/login_sesion";
$route['verificarcliente']         			= "login_cliente/verificar";
$route['registrarse']         			= "registrar_cliente/vista_registro";
$route['404_override'] 					= '';



//ROUTES EDWIN CUTIPA
$route['campodeportivo/(:num)/:any'] 	=  "home/detalle_campodeportivo/$1/";
$route['loginadmin']                    =  'admin/loginadmin_c/admin';
$route['iniciarsesionadmin']            =  'admin/loginadmin_c/login';
$route['nuevocampodeportivo']           =  'admin/c_campodeportivo';
$route['comentar'] = "c_comentario/insertar";
$route['perfil']   = "home/perfil";

/* End of file routes.php */
/* Location: ./application/config/routes.php */