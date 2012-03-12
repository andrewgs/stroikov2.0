<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***************************************************	USERS INTRERFACE	***********************************************/
$route[''] 							= "users_interface/index";
$route['design-interierov']		 	= "users_interface/design_interierov";
$route['obektu-stroitelstva']	 	= "users_interface/obektu_stroitelstva";
$route['remont'] 					= "users_interface/remont";
$route['stroitelstvo'] 				= "users_interface/stroitelstvo";
$route['injenernue-seti'] 			= "users_interface/injenernue_seti";
$route['agentstvo-nedvijimosti'] 	= "users_interface/agentstvo_nedvijimosti";
$route['o-kompanii'] 				= "users_interface/o_kompanii";
$route['kontaktnaya-informacia'] 	= "users_interface/kontaktnaya_informacia";


$route['admin'] 					= "users_interface/admin_login";
$route['logoff'] 					= "users_interface/logoff";
$route['contacts'] 					= "users_interface/contacts";

/***************************************************	ADMIN INTRERFACE	***********************************************/
$route['admin-panel/logoff'] 				= "admin_interface/admin_logoff";