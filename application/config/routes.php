<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***************************************************	USERS INTRERFACE	***********************************************/
$route[''] 													= "users_interface/index";
$route['design-interierov']		 							= "users_interface/design_interierov";
$route['design-interierov/viewimage/:num'] 					= "users_interface/viewimage";
$route['design-interierov/viewsmallimage/:num'] 			= "users_interface/viewsmallimage";
$route['design-interierov/:any/:any/viewimage/:num'] 		= "users_interface/viewimage";
$route['design-interierov/:any/:any'] 						= "users_interface/design_interiera";

$route['agentstvo-nedvijimosti'] 							= "users_interface/agentstvo_nedvijimosti";
$route['agentstvo-nedvijimosti/viewimage/:num'] 			= "users_interface/viewimage";
$route['agentstvo-nedvijimosti/viewsmallimage/:num'] 		= "users_interface/viewsmallimage";
$route['agentstvo-nedvijimosti/:any/:any/viewimage/:num'] 	= "users_interface/viewimage";
$route['agentstvo-nedvijimosti/:any/:any'] 					= "users_interface/object_nedvijimosti";

$route['stroitelstvo'] 										= "users_interface/stroitelstvo";
$route['stroitelstvo/viewimage/:num'] 						= "users_interface/viewimage";
$route['stroitelstvo/viewsmallimage/:num'] 					= "users_interface/viewsmallimage";
$route['stroitelstvo/object/:any/viewimage/:num'] 			= "users_interface/viewimage";
$route['stroitelstvo/object/:any'] 							= "users_interface/object_stroitelstva";

$route['konkurs-dlya-desainerov-architektorov-stroika1']	= "users_interface/konkurs_dlya_desainerov";

$route['remont'] 					= "users_interface/remont";
$route['injenernue-seti'] 			= "users_interface/injenernue_seti";
$route['o-kompanii'] 				= "users_interface/o_kompanii";
$route['kontaktnaya-informacia'] 	= "users_interface/kontaktnaya_informacia";

$route['admin'] 					= "users_interface/admin_login";
$route['logoff'] 					= "users_interface/logoff";
$route['contacts'] 					= "users_interface/contacts";

/***************************************************	ADMIN INTRERFACE	***********************************************/
$route['admin-panel/logoff'] 												= "admin_interface/admin_logoff";
$route['admin-panel/design-interierov/:any/:any/delete/image/:num'] 		= "admin_interface/admin_delete_image";
$route['admin-panel/agentstvo-nedvijimosti/:any/:any/delete/image/:num'] 	= "admin_interface/admin_delete_image";