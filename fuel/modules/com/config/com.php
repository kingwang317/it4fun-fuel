<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['com'] = array(
'com/lists'		=> '公司列表'
);

// deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['crawleruse_db_table_settings'] = TRUE;

// the cache folder to hold blog cache files
$config['com_cache_group'] = 'com';

$config['tables']['mod_company'] = 'mod_company';


$config['com_javascript'] = array(
	// 'jquery.js',
	// 'jquery.min.js',
	// 'bootstrap.min',
	// 'count.js',
	// 'jquery-ui.min.js'
    site_url().'assets/admin_js/jquery.js',
    site_url().'assets/admin_js/bootstrap.min.js'
);

$config['com_ck_javascript'] = array(
    site_url().'assets/admin_js/ckeditor.js',
    site_url().'assets/admin_js/adapters/jquery.js',  
);


$config['com_css'] = array(
	site_url().'assets/admin_css/bootstrap.min.css',
	site_url().'assets/admin_css/bootstrap-reset.css',
	site_url().'assets/admin_css/font-awesome/css/font-awesome.css',
	// 'jquery-easy-pie-chart/jquery.easy-pie-chart.css',
	'style.css',
	site_url().'assets/admin_css/style-responsive.css',
	site_url().'assets/admin_css/admin_style.css',
	site_url().'assets/admin_css/jquery-ui.css'
	// site_url().'assets/admin_css/bootstrap.min.css',
	// site_url().'assets/admin_css/style.css',
	// site_url().'assets/admin_css/style-responsive.css'
);

?>