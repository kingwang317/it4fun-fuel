<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Resume_manage extends Fuel_base_controller {
	public $view_location = 'resume';
	public $nav_selected = 'resume/manage';
	public $module_name = 'resume manage';
	public $module_uri = 'fuel/resume/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('resume/manage');
		$this->load->module_model(RESUME_FOLDER, 'resume_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$act = $this->input->get_post("act");
		
	 
		$search_account = $this->input->get_post("search_account");
		$search_name = $this->input->get_post("search_name");
		$search_recommended = $this->input->get_post("search_recommended");
		$create_time_s = $this->input->get_post("create_time_s");
		$create_time_e = $this->input->get_post("create_time_e");

		$filter = " WHERE 1=1  ";

		if (!empty($search_name)) {
			$filter .= " AND name LIKE '%$search_name%'";
		}

		if (!empty($search_account)) {
			$filter .= " AND account LIKE '%$search_account%'";
		}


		if (!empty($search_recommended)) {
			$filter .= " AND recommended = '$search_recommended'";
		}

		if (!empty($create_time_s)) {
			$filter .= " AND create_time >= '$create_time_s'";
		}

		if (!empty($create_time_e)) {
			$filter .= " AND create_time <= '$create_time_e'";
		}
 
		
		$target_url = $base_url.'fuel/resume/lists/';

		$total_rows = $this->resume_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		// echo $filter;

		$results = $this->resume_manage_model->get_resume_list($dataStart, $dataLen,$filter);
		
		$vars['total_rows'] = $total_rows;
		$vars['search_account'] = $search_account;
		$vars['search_name'] = $search_name;
		$vars['search_recommended'] = $search_recommended;
		$vars['create_time_s'] = $create_time_s;
		$vars['create_time_e'] = $create_time_e;
		$vars['search_name'] = $search_name;
		$vars['form_action'] = $base_url.'fuel/resume/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/resume/create';
		$vars['edit_url'] = $base_url.'fuel/resume/edit?account=';
		$vars['del_url'] = $base_url.'fuel/resume/del';
		$vars['multi_del_url'] = $base_url.'fuel/resume/do_multi_del';
		$vars['results'] = $results;
		$vars['total_rows'] = $total_rows;
		$vars['search_url'] = $base_url.'fuel/resume/lists';
		$vars['level_url'] = $base_url.'fuel/code/lists?codekind_key=';
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/resume_lists_view', $vars);

	}

 
	function create()
	{
		$vars['form_action'] = base_url().'fuel/resume/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增履歷";

		$job_state = $this->codekind_manage_model->get_code_list_for_other_mod("job_state");
		$vars['job_state'] = $job_state;

		$job_cate = $this->codekind_manage_model->get_code_list_for_other_mod("job_cate");
		$vars['job_cate'] = $job_cate;

		$city = $this->codekind_manage_model->get_code_list_for_other_mod("city");
		$vars['city'] = $city;

		$place = $this->codekind_manage_model->get_code_list_for_other_mod("city");
		$placeOrdered = array();
		foreach ($place as $key) {
			 $value = $this->codekind_manage_model->get_code_detail_by_parent_id($key->code_id);
			 array_push($placeOrdered, $key);
			 foreach ($value as $key2) {
			 	array_push($placeOrdered, $key2);
			 }
		}
		$vars['place'] = $placeOrdered;

		$this->fuel->admin->render("_admin/resume_create_view", $vars);
	}

	function do_create()
	{
		$module_uri = base_url().$this->module_uri;
		 
		$insert_data = array();
		$insert_data['account'] = $this->input->get_post("account");
		$insert_data['password'] = $this->input->get_post("password");
		$insert_data['name'] = $this->input->get_post("name");
		$insert_data['birth'] = $this->input->get_post("birth");
		$insert_data['contact_tel'] = $this->input->get_post("contact_tel");
		$insert_data['contact_mail'] = $this->input->get_post("contact_mail");
		$insert_data['address_zip'] = $this->input->get_post("address_zip");
		$insert_data['address_city'] = $this->input->get_post("address_city");
		$insert_data['address_area'] = $this->input->get_post("address_area");
		$insert_data['address'] = $this->input->get_post("address");
		$insert_data['job_status'] = $this->input->get_post("job_status");
		$insert_data['note'] = $this->input->get_post("note");
		$insert_data['about_self'] = $this->input->get_post("about_self");
		$insert_data['exclude_cate'] = implode(";",$this->input->get_post("exclude_cate"));
		$insert_data['job_location'] = implode(";",$this->input->get_post("place"));
		$insert_data['fb_account'] = $this->input->get_post("fb_account");

		$success = $this->resume_manage_model->insert($insert_data);
		$success = true;
		if($success)
		{
			$this->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}

		return;
	}

	 
	function edit()
	{
		$account = $this->input->get("account");
		if(isset($account))
		{
			$result = $this->resume_manage_model->get_resume_detail($account);
		}

		$vars['form_action'] = base_url().'fuel/resume/do_edit?account='.$account;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	
 

		$job_state = $this->codekind_manage_model->get_code_list_for_other_mod("job_state");
		$vars['job_state'] = $job_state;

		$job_cate = $this->codekind_manage_model->get_code_list_for_other_mod("job_cate");
		$vars['job_cate'] = $job_cate;

		$city = $this->codekind_manage_model->get_code_list_for_other_mod("city");
		$vars['city'] = $city;

		$place = $this->codekind_manage_model->get_code_list_for_other_mod("city");
		$placeOrdered = array();

		foreach ($place as $key) {
			 $value = $this->codekind_manage_model->get_code_detail_by_parent_id($key->code_id);
			 array_push($placeOrdered, $key);
			 foreach ($value as $key2) {
			 	array_push($placeOrdered, $key2);
			 }
		}
		$vars['place'] = $placeOrdered;

		$skill = $this->resume_manage_model->get_resume_skill($account);		
		$vars["skill"] = $skill;

		$school = $this->resume_manage_model->get_resume_school($account);		
		$vars["school"] = $school;


		$exp = $this->resume_manage_model->get_resume_exp($account);		
		$vars["exp"] = $exp;
	 

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars["result"] = $result;
		$vars["view_name"] = "修改履歷";
		$this->fuel->admin->render('_admin/resume_edit_view', $vars);
	}

	function do_edit()
	{
		$account = $this->input->get("account");
		$module_uri = base_url().$this->module_uri;
		if(!empty($account))
		{
			$update_data = array();
			$update_data['account'] = $this->input->get_post("account");
			$password = $this->input->get_post("password");
			if (!empty($password)) {
				$update_data['password'] = $this->input->get_post("password");	
			}
			$update_data['name'] = $this->input->get_post("name");
			$update_data['birth'] = $this->input->get_post("birth");
			$update_data['contact_tel'] = $this->input->get_post("contact_tel");
			$update_data['contact_mail'] = $this->input->get_post("contact_mail");
			$update_data['address_zip'] = $this->input->get_post("address_zip");
			$update_data['address_city'] = $this->input->get_post("address_city");
			$update_data['address_area'] = $this->input->get_post("address_area");
			$update_data['address'] = $this->input->get_post("address");
			$update_data['note'] = $this->input->get_post("note");
			$update_data['job_status'] = $this->input->get_post("job_status");
			$update_data['about_self'] = $this->input->get_post("about_self");
			$exclude_cate = $this->input->get_post("exclude_cate");
			if (is_array($exclude_cate)  && sizeof($exclude_cate)>0) { 
				 $update_data['exclude_cate'] = implode(";",$exclude_cate );
			}else{
				$update_data['exclude_cate'] = "";
			}
			$place = $this->input->get_post("place");
			if (is_array($place)  && sizeof($place)>0) {
				 $update_data['job_location'] = implode(";",$place);
			} else{
				$update_data['job_location'] = "";
			}
			$update_data['fb_account'] = $this->input->get_post("fb_account");

			$success = $this->resume_manage_model->update($update_data);

			if($success)
			{
				$this->plu_redirect($module_uri, 0, "更新成功");
				die();
			}
			else
			{
				$this->plu_redirect($module_uri, 0, "更新失敗");
				die();
			}
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}

		return;
	} 

	function getArea($code_id)
	{
		$response = $this->codekind_manage_model->get_code_detail_by_parent_id($code_id);
		 
		echo json_encode($response);
	} 

	function do_del()
	{
		$account = $this->input->get("account");
		$response = array();
		if(!empty($account))
		{
			$success = $this->resume_manage_model->del($account);

			if($success)
			{
				$response['status'] = 1;
			}
			else
			{
				$response['status'] = -1;
			}
		}
		else
		{
			$response['status'] = -1;
		}

		echo json_encode($response);
	}

	function plu_redirect($url, $delay, $msg)
	{
	    if( isset($msg) )
	    {
	        $this->notify($msg);
	    }

	    echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	}

	function notify($msg)
	{
	    $msg = addslashes($msg);
	    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	    echo "<script type='text/javascript'>alert('$msg')</script>\n";
	    echo "<noscript>$msg</noscript>\n";
	    return;
	}

}