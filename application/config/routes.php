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
$route['o-kompanii/photo-album/slideshow/viewimage/:num'] 	= "users_interface/viewimage";
$route['stroitelstvo/object/:any'] 							= "users_interface/object_stroitelstva";
$route['remont/object/:any/viewimage/:num'] 				= "users_interface/viewimage";
$route['remont/viewsmallimage/:num'] 						= "users_interface/viewsmallimage";
$route['remont/object/:any'] 								= "users_interface/object_remonta";

$route['konkurs-dlya-desainerov-architektorov-stroika1']	= "users_interface/konkurs_dlya_desainerov";

$route['remont'] 					= "users_interface/remont";
$route['injenernue-seti'] 			= "users_interface/injenernue_seti";
$route['o-kompanii'] 				= "users_interface/o_kompanii";
$route['o-kompanii/photo-album']	= "users_interface/photo_album";

$route['kontaktnaya-informacia'] 	= "users_interface/kontaktnaya_informacia";
$route['zakaz-interiera'] 			= "users_interface/zakaz_interiera";

$route['admin'] 					= "users_interface/admin_login";
$route['logoff'] 					= "users_interface/logoff";
$route['contacts'] 					= "users_interface/contacts";

/***************************************************	ADMIN INTRERFACE	***********************************************/
$route['admin-panel/logoff'] 											= "admin_interface/admin_logoff";
$route['admin-panel/design-interierov/:any/:any/delete/image/:num'] 	= "admin_interface/admin_delete_image";

$route['admin-panel/design-interierov/:any/:any/delete-interior/id/:num'] 	= "admin_interface/admin_delete_interior";
$route['admin-panel/agentstvo-nedvijimosti/:any/:any/delete-estate/id/:num'] 	= "admin_interface/admin_delete_estate";


$route['admin-panel/stroitelstvo/object/:any/delete-object/id/:num'] 		= "admin_interface/admin_delete_object";
$route['admin-panel/delete/object-types/:num']								= "admin_interface/admin_delete_objecttypes";

$route['admin-panel/stroitelstvo/object/:any/delete/image/:num'] 			= "admin_interface/admin_delete_image";
$route['admin-panel/photo-album/delete/image/:num']							= "admin_interface/photo_album_delete_image";

$route['admin-panel/remont/object/:any/delete-object/id/:num'] 				= "admin_interface/admin_delete_remont";

$route['admin-panel/agentstvo-nedvijimosti/:any/:any/delete/image/:num'] 	= "admin_interface/admin_delete_image";