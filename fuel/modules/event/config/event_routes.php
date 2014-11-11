<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'event/lists'] 			= EVENT_FOLDER.'/event_manage/lists';
$route[FUEL_ROUTE.'event/lists/(:num)'] 	= EVENT_FOLDER.'/event_manage/lists/$1';
$route[FUEL_ROUTE.'event/create'] 			= EVENT_FOLDER.'/event_manage/create';
$route[FUEL_ROUTE.'event/edit'] 			= EVENT_FOLDER.'/event_manage/edit';
$route[FUEL_ROUTE.'event/del'] 				= EVENT_FOLDER.'/event_manage/do_del';
$route[FUEL_ROUTE.'event/do_create'] 		= EVENT_FOLDER.'/event_manage/do_create';
$route[FUEL_ROUTE.'event/do_edit'] 			= EVENT_FOLDER.'/event_manage/do_edit';
$route[FUEL_ROUTE.'event/export_excel'] 	= EVENT_FOLDER.'/event_manage/export_excel';
$route[FUEL_ROUTE.'event/do_multi_del'] 	= EVENT_FOLDER.'/event_manage/do_multi_del';
$route[FUEL_ROUTE.'event/area/(:num)'] 		= EVENT_FOLDER.'/event_manage/getArea/$1';

 