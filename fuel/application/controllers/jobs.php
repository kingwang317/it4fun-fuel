<?php
class Jobs extends CI_Controller {

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

	function index($dataStart=0)
	{	
		$this->load->helper('cookie');
		$this->load->library('facebook');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$base_url = base_url();
		$this->load->module_model(COM_FOLDER, 'com_manage_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$filter = '';
		$target_url = $base_url.'job/';
		$total_rows = $this->com_manage_model->get_job_total_rows($filter);
		$config = $this->set_page->set_front_end_config($target_url, $total_rows, $dataStart, 8);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$results = $this->com_manage_model->get_job_list($dataStart, $dataLen, $filter);

		$this->load->model('code_model');

		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;

		$vars['base_url'] 			= $base_url;
		$vars['photo_path']			= $base_url.'assets/';
		$vars['results']			= $results;
		$vars['job_detail_url']	= $base_url.'job/detail/';
		$vars['page_jump'] 			= $this->pagination->create_links();
		$vars['views'] 				= 'job_list';
		$page_init = array('location' => 'job_list');
		$this->fuel->pages->render('job_list', $vars);

	}

	function jobs_detail($job_id)
	{
		$this->load->helper('cookie');
		$this->load->library('facebook');
		$this->load->model('code_model');
		$base_url = base_url();
		$this->load->module_model(COM_FOLDER, 'com_manage_model');


		$result = $this->com_manage_model->get_job_detail($job_id); 
		$job_skill = $this->com_manage_model->get_job_skill_list($job_id); 
		$job_skill_str = ''; 

		$job_lang = $this->com_manage_model->get_job_lang_list($job_id);
		$job_lang_str = ''; 

		foreach ($job_skill as $key => $value) {
			$job_skill_str.=$value->code_name.',';
		}

		foreach ($job_lang as $key => $value) {
			$job_lang_str.=$value->lang_name."[$value->level_name]".',';
		}

		$r_url = "job/detail/".$job_id;

		$fb_data	= $this->code_model->get_fb_data($r_url);
		$vars['job_skill'] = rtrim($job_skill_str, ',');
		$vars['job_lang'] = rtrim($job_lang_str, ',');
		$vars['job_id'] = $job_id;
		$vars['fb_data'] = $fb_data;
		$vars['views'] 		= 'job_detail';
		$vars['photo_path']	= $base_url.'assets/';
		$vars['result']		= $result; 
		$vars['regi_url']	= $base_url.'api/do_deliver/'.$job_id;
		$page_init = array('location' => 'job_detail');
		$this->fuel->pages->render('job_detail', $vars);
	}

	function deliver($job_id)
	{
		$this->load->model('code_model');
		// $this->load->module_model(COM_FOLDER, 'event_manage_model');
		$response = array();

		if($this->code_model->is_logged_in())
		{
			$account = $this->code_model->get_logged_in_account();		 
			$chk_deliver = $this->code_model->do_chk_deliver($job_id, $account);
			if($chk_deliver === true)
			{
				$result['status']	= -3;
				$result['msg']		= "您已投遞過此職缺";
				
			}
			else
			{
				$success = $this->code_model->do_regi_event($job_id, $account);
				if($success)
				{
					$result['status']	= 1;
					$result['msg']		= "履歷投遞完成";
				}
				else
				{
					$result['status']	= -1;
					$result['msg']		= "伺服器忙線中，請稍後再試";
				}
			}
	 		
		}
		else
		{
			$result['status']	= -99;
			$result['msg']		= "尚未登入";
		}

		echo json_encode($result);
	}
	
}