<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'com/lists'] 					= COM_FOLDER.'/com_manage/lists';
$route[FUEL_ROUTE.'com/lists/(:num)'] 			= COM_FOLDER.'/com_manage/lists/$1';
$route[FUEL_ROUTE.'com/create'] 				= COM_FOLDER.'/com_manage/create';
$route[FUEL_ROUTE.'com/edit/(:num)'] 			= COM_FOLDER.'/com_manage/edit/$1';
$route[FUEL_ROUTE.'com/del/(:num)'] 			= COM_FOLDER.'/com_manage/do_del/$1';
$route[FUEL_ROUTE.'com/do_create'] 				= COM_FOLDER.'/com_manage/do_create';
$route[FUEL_ROUTE.'com/do_edit/(:num)'] 		= COM_FOLDER.'/com_manage/do_edit/$1';
$route[FUEL_ROUTE.'com/do_multi_del'] 			= COM_FOLDER.'/com_manage/do_multi_del';
$route[FUEL_ROUTE.'com/joblist/(:num)/(:num)']  = COM_FOLDER.'/com_manage/job_list/$1/$2'; 
$route[FUEL_ROUTE.'job/create/(:num)'] 			= COM_FOLDER.'/com_manage/job_create/$1';
$route[FUEL_ROUTE.'job/do_create'] 				= COM_FOLDER.'/com_manage/do_job_create';
$route[FUEL_ROUTE.'job/edit/(:num)'] 			= COM_FOLDER.'/com_manage/job_edit/$1';
$route[FUEL_ROUTE.'job/do_edit'] 		        = COM_FOLDER.'/com_manage/do_job_edit';
$route[FUEL_ROUTE.'job/del/(:num)'] 			= COM_FOLDER.'/com_manage/do_job_del/$1'; 
$route[FUEL_ROUTE.'deliver_list/(:num)/(:num)'] = COM_FOLDER.'/com_manage/deliver_list/$1/$2';
$route[FUEL_ROUTE.'deliver/(:num)'] 	        = COM_FOLDER.'/com_manage/deliver/$1';
$route[FUEL_ROUTE.'do_edit_deliver'] 		    = COM_FOLDER.'/com_manage/do_edit_deliver';
