<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define('FUELIFY', FALSE);
		$this->load->library('set_meta');
	}

	function home() 
	{
		parent::Controller();

	}



	function index()
	{	
		$this->load->helper('cookie');
		$this->load->library('facebook'); 
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$this->load->model('code_model');
		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;

		// use Fuel_page to render so it will grab all opt-in variables and do any necessary parsing
		$vars['views'] = 'home';
		$vars['all_cate']	= $all_cate;
		$vars['base_url'] = base_url();
		
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('home', $vars);
		//$this->load->module_library(FUEL_FOLDER, 'fuel_page', $page_init);
		//$this->fuel_page->add_variables($vars);
		//$this->fuel_page->render(FALSE, FALSE); //第二個FALSE為在前台不顯示ADMIN BAR
	}
	
	function contact()
	{	
		//$this->load->model('about_case_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");

		$this->load->model('code_model');
		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;

		$vars['views'] = 'contact';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('contact', $vars);

	}
	function campusevents()
	{	
		//$this->load->model('about_case_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");

		$this->load->model('code_model');
		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;

		$vars['views'] = 'campusevents';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('campusevents', $vars);

	}
	function terms()
	{	
		//$this->load->model('about_case_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");

		$this->load->model('code_model');
		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;

		$vars['views'] = 'terms';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('terms', $vars);

	}
}