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
		$this->load->model('about_case_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$case_cate	= $this->about_case_model->get_case_cate_code();

		if(isset($case_cate))
		{
			foreach ($case_cate as $key => $row) 
			{
				$sub_cate_result = $this->about_case_model->get_case_sub_cate($row->code_id);

				$all_cate[$key]['parent_cate'] 		= $row;
				$all_cate[$key]['sub_cate_result']	= $sub_cate_result;
			}
		}

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

		$vars['views'] = 'contact';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('contact', $vars);

	}
	function campusevent()
	{	
		//$this->load->model('about_case_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");

		$vars['views'] = 'campusevent';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('campusevent', $vars);

	}
	function terms()
	{	
		//$this->load->model('about_case_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");

		$vars['views'] = 'terms';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('terms', $vars);

	}
}