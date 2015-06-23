<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Com_manage extends Fuel_base_controller {
	public $view_location = 'com';
	public $nav_selected = 'com/manage';
	public $module_name = 'com';
	public $module_uri = 'com/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('com/manage');
		$this->load->module_model(COM_FOLDER, 'com_manage_model');
		$this->load->helper('ajax');
		// $this->load->helper('MY_Date');
		$this->load->helper('ytalent');
		// $this->load->helper('MY_array');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('comm');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url(); 
		$act = $this->input->get_post("act");
		$search_item = $this->input->get_post("search_item");
		$filter = "";

		


		if($search_item && $act)
		{
			switch ($act) {
				case 'by_name':
					$filter = " WHERE com_title LIKE '%".$search_item."%'";
					break;
				case 'by_email':
					$filter = " WHERE com_email LIKE '%".$search_item."%'";
					break;	
				default:
					$filter = " WHERE 1=1 " ;
					break;
			}
		}
		
		$target_url = $base_url.'fuel/com/lists/';

		// $new_count = $this->com_manage_model->get_total_rows(" WHERE DATE(  `create_time` ) = DATE( NOW( ) )  ");
		$total_count = $this->com_manage_model->get_total_rows(" WHERE 1=1 ");
		$search_count = $this->com_manage_model->get_total_rows($filter);

		// $vars['new_count'] = $new_count;
		$vars['total_count'] = $total_count;
		$vars['search_count'] = $search_count;

		$config = $this->set_page->set_config($target_url, $search_count, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$com_results = $this->com_manage_model->get_com_list($dataStart, $dataLen, $filter);

		$vars['search_item'] = $search_item;
		$vars['act'] = $act;
		$vars['form_action'] = $base_url.'fuel/com/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/com/create';
		$vars['edit_url'] = $base_url.'fuel/com/edit/';
		$vars['del_url'] = $base_url.'fuel/com/del/';
		$vars['multi_del_url'] = $base_url.'fuel/com/do_multi_del';
		$vars['job_url'] = $base_url.'fuel/com/joblist/';
		$vars['com_results'] = $com_results;
		$vars['search_url'] = $base_url.'fuel/com/lists';
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/com_lists_view', $vars);
		//$this->load->view('_admin/member_lists_view', $vars, 'member');

	}

	function job_list($id,$dataStart=0){ 
		//com_job_lists_view
		$base_url = base_url();   
		$target_url = $base_url."fuel/com/joblist/$id/$dataStart"; 

		$filter = " WHERE 1=1 AND company_id = $id "; 

		$post_ary = $this->input->post(); 
		$search_title = $post_ary["search_title"];

		if ($search_title != "") {
			$filter .= " AND job_title LIKE '%$search_title%'";
			$this->session->set_userdata('search_title', $search_title);
		}else{
			if (!isset($search_title) ) {
				$search_title = $this->session->userdata('search_title'); 
				if ($search_title != "") {
					$search_title = $search_title;
					$filter .= " AND job_title LIKE '%$search_title%'";
				} 
			}else{
				$this->session->set_userdata('search_title', "");
			}					
		}

		$total_count = $this->com_manage_model->get_job_total_rows($filter);  
		$vars['total_count'] = $total_count; 

		$config = $this->set_page->set_config($target_url, $total_count, $dataStart, 200);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$com = $this->com_manage_model->get_com_detail($id);

		$job_results = $this->com_manage_model->get_job_list($dataStart, $dataLen, $filter);

 		$vars['search_title'] = $search_title;
		$vars['form_action'] = $target_url;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);
		$vars['com_name'] = $com->company_name;
		$vars['com_id'] = $com->id;
		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/job/create/'.$com->id;
		$vars['edit_url'] = $base_url.'fuel/job/edit/'; 
		$vars['del_url'] = $base_url.'fuel/job/del/';
		$vars['com_url'] = $base_url.'fuel/com/lists';
		$vars['deliver_url'] = $base_url.'fuel/deliver_list/';
		$vars['multi_del_url'] = $base_url.'fuel/job/do_multi_del'; 
		$vars['job_results'] = $job_results;
		$vars['search_url'] = $base_url.'fuel/com/joblist';
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/com_job_lists_view', $vars);
	}

	function deliver_list($job_id,$dataStart=0)
	{
		$view_name = "應徵列表";
		$base_url = base_url();  
		$target_url = $base_url."fuel/com/joblist/$job_id/$dataStart"; 

		$job = $this->com_manage_model->get_job_detail($job_id);
		$com = $this->com_manage_model->get_com_detail($job->company_id);
		 
		$filter = " WHERE job_id='$job_id' ";
 
		
		$total_count = $this->com_manage_model->get_deliver_total_rows($filter);  
		$vars['total_count'] = $total_count; 

		$config = $this->set_page->set_config($target_url, $total_count, $dataStart, 200);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 

		$deliver_results = $this->com_manage_model->get_deliver_list($dataStart, $dataLen, $filter);

 	 
		$vars['form_action'] = $target_url;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);
		$vars['com_name'] = $com->company_name;
		$vars['job_title'] = $job->job_title;
		$vars['page_jump'] = $this->pagination->create_links();	 
		$vars['edit_url'] = $base_url.'fuel/deliver/'; 	 
		$vars['job_url'] = $base_url.'fuel/com/joblist/'.$com->id.'/0';
		$vars['member_url'] = $base_url.'fuel/resume/edit?account=';
		$vars['deliver_results'] = $deliver_results; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/com_deliver_lists_view', $vars);
	}

	function deliver($id)
	{
		$view_name = "編輯投遞";
		$base_url = base_url();  

		$row = $this->com_manage_model->get_deliver_detail($id);
  
		$vars['form_action'] = $base_url."fuel/do_edit_deliver";
		$vars['form_method'] = 'POST';
		$vars['module_uri'] = $this->module_uri;
		$vars['view_name'] = $view_name;
		$vars['row'] = $row;
		$vars['back_url'] = $base_url."fuel/deliver_list/$row->job_id/0"; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/deliver_edit_view', $vars);
	}

	function create()
	{
		$view_name = "新增";
		$base_url = base_url(); 
 
		$vars['view_name'] = $view_name;
		$vars['form_action'] = $base_url."fuel/com/do_create";
		$vars['form_method'] = 'POST';
		$vars['module_uri'] = $this->module_uri;
		$vars['submit_url'] = $base_url."fuel/com/do_create";
		$vars['back_url'] = $base_url."fuel/com/lists";
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/com_create_view', $vars);
	}

	function job_create($id)
	{
		$view_name = "新增職缺";
		$base_url = base_url();  

		$com = $this->com_manage_model->get_com_detail($id);

		$skill = $this->com_manage_model->get_skill_list();
		$level = $this->com_manage_model->get_level_list();
		$lang = $this->com_manage_model->get_lang_list();
 
	 
		$vars['skill'] = $skill;
		$vars['level'] = $level;
		$vars['lang'] = $lang;
 
		$vars['view_name'] = $view_name;
		$vars['com_name'] = $com->company_name;
		$vars['com_id'] = $com->id;
		$vars['form_action'] = $base_url."fuel/job/do_create";
		$vars['form_method'] = 'POST';
		$vars['module_uri'] = $this->module_uri;
		$vars['submit_url'] = $base_url."fuel/com/do_job_create";
		$vars['back_url'] = $base_url."fuel/com/joblist/$id/0";
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/job_create_view', $vars);
	}
	//

	function do_create()
	{
		$base_url = base_url();
		
		$company_name = $this->input->get_post("company_name");
		$company_intro = htmlspecialchars($this->input->get_post("company_intro"));
		  
		$id = $this->com_manage_model->do_add_com($company_name, $company_intro );

		if($id)
		{
			
			// $id = $this->products_manage_model->get_last_insert_id(); 
			$root_path = assets_server_path("com_img/$id/");


			if (!file_exists($root_path)) {
			    mkdir($root_path, 0777, true);
			}
			 
			$config['upload_path'] = $root_path;
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']	= '9999';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload',$config); 

			$updateAry = array();
			$updateAry["id"] = $id;

			if ($this->upload->do_upload('company_intro_pic'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["company_intro_pic"] = "com_img/$id/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["company_intro_pic"] = '';				 
			} 
			if ($this->upload->do_upload('company_logo'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["company_logo"] = "com_img/$id/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["company_logo"] = '';				 
			}  

			$this->com_manage_model->update_img($updateAry); 

			
			$this->comm->plu_redirect($base_url."fuel/com/lists", 0, "新增成功");
			die();
		}
	}

	function do_job_create()
	{ 

		$post_arr = $this->input->post(); 

		// print_r($post_arr);
		// die;

		$com_id = $post_arr["company_id"];
		$module_uri = base_url()."fuel/com/joblist/$com_id/0";
		$post_arr["job_intro"] = htmlspecialchars($post_arr["job_intro"]);
		$post_arr["job_desc"] = htmlspecialchars($post_arr["job_desc"]);
		$post_arr["job_term"] = htmlspecialchars($post_arr["job_term"]);

		$job_id = $this->com_manage_model->do_add_job($post_arr);  

		if($job_id)
		{ 

			if (isset($post_arr['skill'])) {				
				foreach ($post_arr['skill'] as $key => $value) {
					$this->com_manage_model->do_add_skill($job_id,$value);  
				}
			}

			if (isset($post_arr['lang'])) {				
				foreach ($post_arr['lang'] as $key => $value) {
					$this->com_manage_model->do_add_lang($job_id,$value,$post_arr["level_$value"]);  
				}
			}

			$this->comm->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}
		return;
		  
	}

	function edit($id)
	{
		$view_name = "編輯公司";
		$base_url = base_url();

		$row = $this->com_manage_model->get_com_detail($id);
  
		$vars['form_method'] = 'POST';
		$vars['module_uri'] = $this->module_uri;
		$vars['view_name'] = $view_name;
		$vars['row'] = $row;
		$vars['back_url'] = $base_url."fuel/com/lists";
		$vars['form_action'] = $base_url."fuel/com/do_edit/".$id;
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/com_edit_view', $vars);
	}

	function job_edit($id)
	{
		$view_name = "編輯職缺";
		$base_url = base_url();  

		$row = $this->com_manage_model->get_job_detail($id);
		$com = $this->com_manage_model->get_com_detail($row->company_id);

		$skill = $this->com_manage_model->get_skill_list();
		$level = $this->com_manage_model->get_level_list();
		$lang = $this->com_manage_model->get_lang_list();

		$job_skill = $this->com_manage_model->get_job_skill_list($id); 
		// print_r($job_skill);
		// die;
		$job_lang = $this->com_manage_model->get_job_lang_list($id);
	// print_r($job_lang);
	// 	die;
		$lang_level = array();
		foreach ($job_lang as $key) {
			$lang_level[$key->lang_id] = $key->level_id;
		}
		// print_r($lang_level);
		// die;

 
		$vars['view_name'] = $view_name;
		$vars['com_name'] = $com->company_name;	
		$vars['row'] = $row;
		$vars['skill'] = $skill;
		$vars['level'] = $level;
		$vars['lang'] = $lang;
		$vars['job_skill'] = $job_skill; 
		$vars['job_lang'] = $job_lang;
		$vars['lang_level'] = $lang_level;
		$vars['form_action'] = $base_url."fuel/job/do_edit";
		$vars['form_method'] = 'POST';
		// $vars['module_uri'] = $this->module_uri;
		// $vars['submit_url'] = $base_url."fuel/com/do_job_create";
		$vars['back_url'] = $base_url."fuel/com/joblist/$com->id/0";
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/job_edit_view', $vars);
	}



	function do_edit($id)
	{

		$post_arr = $this->input->post(); 
		$post_arr["id"] = $id;

		$base_url = base_url();

		$root_path = assets_server_path("com_img/$id/");
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		} 
	 

		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config); 
  
		if ($this->upload->do_upload('company_intro_pic'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["company_intro_pic"] = "com_img/$id/".$data["upload_data"]["file_name"];
		} else{ 
			echo $this->upload->display_errors();
			$post_arr["company_intro_pic"] = $post_arr["exist_company_intro_pic"];	
			if (isset($post_arr["company_intro_pic_delete"])) {
			 	$post_arr["company_intro_pic"] = '';
			 	unlink(assets_server_path()."/".$post_arr["exist_company_intro_pic"]);
			}		 
		} 

		if ($this->upload->do_upload('company_logo'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["company_logo"] = "com_img/$id/".$data["upload_data"]["file_name"];
		} else{ 
			echo $this->upload->display_errors();
			$post_arr["company_logo"] = $post_arr["exist_company_logo"];	
			if (isset($post_arr["company_logo_delete"])) {
			 	$post_arr["company_logo"] = '';
			 	unlink(assets_server_path()."/".$post_arr["exist_company_logo"]);
			}		 
		} 

		$success = $this->com_manage_model->do_edit_com($post_arr);
		if($success)
		{
			$this->comm->plu_redirect($base_url."fuel/com/lists", 0, "修改成功");
			die();
		}
	}

	function do_job_edit()
	{

		$post_arr = $this->input->post();  
		$post_arr["job_intro"] = htmlspecialchars($post_arr["job_intro"]);
		$post_arr["job_desc"] = htmlspecialchars($post_arr["job_desc"]);
		$post_arr["job_term"] = htmlspecialchars($post_arr["job_term"]);
		$company_id = $post_arr["company_id"];

		$module_uri = base_url()."fuel/com/joblist/$company_id/0";
  
		$success = $this->com_manage_model->do_edit_job($post_arr);

		if($success)
		{
			$job_id = $post_arr["id"];
			$this->com_manage_model->do_del_skill($job_id); 
			$this->com_manage_model->do_del_lang($job_id); 

			if (isset($post_arr['skill'])) {
				foreach ($post_arr['skill'] as $key => $value) {
					$this->com_manage_model->do_add_skill($job_id,$value);  
				}
			}

			if (isset($post_arr['lang'])) {
				foreach ($post_arr['lang'] as $key => $value) {
					$this->com_manage_model->do_add_lang($job_id,$value,$post_arr["level_$value"]);  
				}
			}

			$this->comm->plu_redirect($module_uri, 0, "修改成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}
	}

	function do_edit_deliver(){
		$post_arr = $this->input->post();  
		$post_arr["note"] = htmlspecialchars($post_arr["note"]); 
		$job_id = $post_arr["job_id"]; 
		// die;

		$module_uri = base_url()."fuel/deliver_list/$job_id/0";
  
		$success = $this->com_manage_model->do_edit_deliver($post_arr);

		if($success)
		{
			$this->comm->plu_redirect($module_uri, 0, "修改成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}
	}

	function do_del($com_id)
	{
		$result = array();

		$success = $this->com_manage_model->do_del_com($com_id);

		if($success)
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = -1;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	}

	function do_multi_del()
	{
		$result = array();

		$com_ids = $this->input->get_post("com_ids");

		if($com_ids)
		{
			$im_com_ids = implode(",", $com_ids);

			$success = $this->member_manage_model->do_multi_del_com($im_com_ids);
		}
		else
		{
			$success = false;
		}



		if(isset($success))
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = $im_order_ids;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	}

	function do_job_del($job_id)
	{
		$result = array();

		$success = $this->com_manage_model->do_job_del($job_id);

		if($success)
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = -1;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	}

}