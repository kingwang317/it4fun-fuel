<?php
class Jobs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define('FUELIFY', FALSE);
		$this->load->library('set_meta');
		$this->load->library('comm');
		$this->load->library('session');
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
		$this->load->module_model(RESUME_FOLDER, 'resume_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');

		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");

		$post_ary = $this->input->post();
		// print_r($post_ary);
		// die;
		$search_city = isset($post_ary['search_city'])?$post_ary['search_city']:'';
		$search_skill = isset($post_ary['search_skill'])?$post_ary['search_skill']:'';
		$search_keyword = isset($post_ary['search_keyword'])?$post_ary['search_keyword']:'';

		$filter = ' WHERE 1=1 ';

		if ($search_city != "" && $search_city != "A") {
			$filter .= " AND job_address like '%$search_city%' ";
			$this->session->set_userdata('search_city', $search_city);
		}else{
			if (!isset($search_city) ) {
				$search_city = $this->session->userdata('search_city'); 
				if ($search_city != "" && $search_city != "A") {
					$search_city = $search_city;
					$filter .= " AND job_address like '%$search_city%' ";
				} 
			}else{
				$this->session->set_userdata('job_address', "");
			}					
		}

		if ($search_skill  != "" && $search_skill != "A") {
			$filter .= " AND a.id in (select job_id from mod_skill where skill_id = '$search_skill' ) ";
			$this->session->set_userdata('search_skill', $search_skill);
		}else{
			if (!isset($search_skill) ) {
				$search_skill = $this->session->userdata('search_skill'); 
				if ($search_skill != ""  && $search_skill != "A") {
					$search_skill = $search_skill;
					$filter .= " AND a.id in (select job_id from mod_skill where skill_id = '$search_skill' ) ";
				} 
			}else{
				$this->session->set_userdata('search_skill', "");
			}			
		}

		// echo '2222'.$search_keyword;

		if ($search_keyword != "") {
			$filter .= " AND (job_title like '%$search_keyword%' OR company_id IN (SELECT id FROM mod_company where company_name like '%$search_keyword%')) ";
			$this->session->set_userdata('search_keyword', $search_keyword);
		}else{
			if (!isset($search_keyword) ) {
				$search_keyword = $this->session->userdata('search_keyword'); 
				if ($search_keyword != "") {
					$search_keyword = $search_keyword;
					$filter .= " AND (job_title like '%$search_keyword%' OR company_id IN (SELECT id FROM mod_company where company_name like '%$search_keyword%')) ";
				} 
			}else{
				$this->session->set_userdata('search_keyword', "");
			}				
		}

		// echo $filter;

		
		$target_url = $base_url.'job/';
		$total_rows = $this->com_manage_model->get_job_total_rows($filter);
		$config = $this->set_page->set_front_end_config($target_url, $total_rows, $dataStart, 8);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$results = $this->com_manage_model->get_job_list($dataStart, $dataLen, $filter);
		$city_ary = $this->resume_manage_model->get_resume_option('address_city');
		$skill_ary = $this->codekind_manage_model->get_codekind_list(0,999,"WHERE codekind_key = 'skill'" ,'mod_code');

		$this->load->model('code_model');

		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;
		$vars['search_city'] = $search_city;
		$vars['search_skill'] = $search_skill;
		$vars['search_keyword'] = $search_keyword;
		$vars['city_ary'] 			= $city_ary;	
		$vars['skill_ary'] 			= $skill_ary;	
		$vars['base_url'] 			= $base_url;
		$vars['photo_path']			= $base_url.'assets/';
		$vars['results']			= $results;
		$vars['job_detail_url']	= $base_url.'job/detail/';
		$vars['page_jump'] 			= $this->pagination->create_links();
		//$vars['views'] 				= 'job_list';
		// $vars['form_action'] = $base_url.'fuel/resume/lists';
		// $vars['form_method'] = 'POST';
		//$page_init = array('location' => 'job_list');
		//$this->fuel->pages->render('job_list', $vars);


		if($this->code_model->is_mobile() || false){
			$vars['views'] = 'm_job_list';
			$page_init = array('location' => 'm_job_list');
			$this->fuel->pages->render('m_job_list', $vars);
		}else{
			$vars['views'] = 'job_list';
			$page_init = array('location' => 'job_list');
			$this->fuel->pages->render('job_list', $vars);
		}

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

	
		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;
		$vars['job_skill'] = rtrim($job_skill_str, ',');
		$vars['job_lang'] = rtrim($job_lang_str, ',');
		$vars['job_id'] = $job_id;
		//$vars['views'] 		= 'job_detail';
		$vars['photo_path']	= $base_url.'assets/';
		$vars['result']		= $result; 
		$vars['regi_url']	= $base_url.'api/do_deliver/'.$job_id;
		//$page_init = array('location' => 'job_detail');
		//$this->fuel->pages->render('job_detail', $vars);


		if($this->code_model->is_mobile() || true){
			$vars['views'] = 'm_job_detail';
			$page_init = array('location' => 'm_job_detail');
			$this->fuel->pages->render('m_job_detail', $vars);
		}else{
			$vars['views'] = 'job_detail';
			$page_init = array('location' => 'job_detail');
			$this->fuel->pages->render('job_detail', $vars);
		}
	}

	//notices
	function notice()
	{
		$base_url = base_url();
		$this->load->model('code_model');	    
		$account = $this->code_model->get_logged_in_account(); 

		if($account == null){
			$this->comm->plu_redirect(site_url(), 0, "尚未登入");
			//die;
		}
		// $account_data = $this->code_model->get_account_data($account);
		$result = $this->code_model->get_notice($account);
  		// print_r($result);
  		 //echo "2143";
	  	 //die();
		$vars['result'] = $result; 
		$fb_data = $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data; 
		//$vars['views'] 		= 'notices';
		$vars['photo_path']	= $base_url.'assets/';  
		$vars['notice_response_url']	= $base_url.'api/do_notice_response/';
		//$page_init = array('location' => 'notices');
		//$this->fuel->pages->render('notices', $vars);

		if($this->code_model->is_mobile() || true){
			$vars['views'] = 'm_notices';
			$page_init = array('location' => 'm_notices');
			$this->fuel->pages->render('m_notices', $vars);
		}else{
			$vars['views'] = 'notices';
			$page_init = array('location' => 'notices');
			$this->fuel->pages->render('notices', $vars);
		}
	}

	function notice_response(){
		$this->load->model('code_model');
		// $this->load->module_model(COM_FOLDER, 'event_manage_model');
		$response = array();

		if($this->code_model->is_logged_in())
		{
			 

			$post_ary = $this->input->post(); 
			$drop_id = isset($post_ary['drop_id'])?$post_ary['drop_id']:'';
			$response_type = isset($post_ary['response_type'])?$post_ary['response_type']:''; 
			 
			$success = $this->code_model->update_notice_response($drop_id, $response_type);

			if($success)
			{
				$result['status']	= 1;
				$result['msg']		= "已完成";
			}
			else
			{
				$result['status']	= -1;
				$result['msg']		= "伺服器忙線中，請稍後再試";
			}
	 		
		}
		else
		{
			$result['status']	= -99;
			$result['msg']		= "尚未登入";
		}

		echo json_encode($result);
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