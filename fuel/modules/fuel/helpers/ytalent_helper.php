<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function job_status_string($job_status)
{ 
	$msg = '';
	switch ($job_status) {
	    case 0:
	        $msg = '上架';
	        break;
	    case 1:
	        $msg = '下架';
	        break; 
	}
	return $msg; 
}

function process_type_string($process_type){
	$msg = '';
	switch ($process_type) {
	    case 0:
	        $msg = '未處理';
	        break;
	    case 1:
	        $msg = '待確認時間';
	        break;
	    case 2:
	        $msg = '已通知面試';
	        break;
	    case 3:
	        $msg = '完成面試';
	        break;
	}
	return $msg;
}

function in_array_field($needle, $needle_field, $haystack, $strict = false) { 
    if ($strict) { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field === $needle) 
                return true; 
    } 
    else { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field == $needle) 
                return true; 
    } 
    return false; 
} 
