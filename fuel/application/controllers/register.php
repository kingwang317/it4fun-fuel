<?php
class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define('FUELIFY', FALSE);
		$this->load->library('set_meta');
		$this->load->library('comm');
	}

	function register() 
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

	function step1_save(){
		
		$mail = $this->input->get_post("mail");
		$password = $this->input->get_post("password");
		$this->load->model('code_model');
		$result = $this->code_model->do_register_resume($mail,$password);

		if($result){
			$this->comm->plu_redirect(site_url()."register/step2?account=$mail&token=".md5(md5($mail)), 0, null);
		}else{
			$this->comm->plu_redirect(site_url(), 0, "此帳號已被註冊");
		}

		
	}

	function step2()
	{	
		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$school_list = $this->code_model->get_school_list();
		$skill_list = $this->code_model->get_skill();
/*
		if(isset($case_cate))
		{
			foreach ($case_cate as $key => $row) 
			{
				$sub_cate_result = $this->about_case_model->get_case_sub_cate($row->code_id);

				$all_cate[$key]['parent_cate'] 		= $row;
				$all_cate[$key]['sub_cate_result']	= $sub_cate_result;
			}
		}
*/
		// use Fuel_page to render so it will grab all opt-in variables and do any necessary parsing
		//print_r($skill_list);
		//die();
		$vars['views'] = 'register2';
		$vars['school_list']	= $school_list;
		$vars['skill_list']	= $skill_list;
		$vars['account'] = $this->input->get("account");
		$vars['token'] = $this->input->get("token");
		$vars['post'] = "";
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('register2', $vars);
		//$this->load->module_library(FUEL_FOLDER, 'fuel_page', $page_init);
		//$this->fuel_page->add_variables($vars);
		//$this->fuel_page->render(FALSE, FALSE); //第二個FALSE為在前台不顯示ADMIN BAR
	}
	function step2_save(){
		
		$post_arr = $this->input->post();
		  
		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		if(md5(md5($post_arr['account'])) == $post_arr['token']){
			$result = $this->code_model->do_update_resume($post_arr);
			if($result){
				$this->comm->plu_redirect(site_url()."register/step3?account=".$post_arr['account']."&token=".md5(md5($post_arr['account'])), 0, null);
			}else{
				$this->comm->plu_redirect(site_url(), 0, "更新失敗");
			}
		}else{
			$this->comm->plu_redirect(site_url(), 0, "非法進入頁面");
		}

		
	}
	function step3()
	{	
		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();
		$vars['views'] = 'register3';
		$vars['account'] = $this->input->get("account");
		$vars['token'] = $this->input->get("token");
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('register3', $vars);
	}

	function getSchool()
	{
		$this->load->model('code_model');
		$response = $this->code_model->get_school();

		$ary = array();

		foreach ($response as $key) {
			 array_push($ary, $key->code_name);
		}
		 
		echo json_encode($ary);
	} 
	
}