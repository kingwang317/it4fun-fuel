<?php
class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define('FUELIFY', FALSE);
		$this->load->library('set_meta');
		$this->load->library('comm');
	}

	function user() 
	{
		parent::Controller();

	}

	function index()
	{	
		$this->load->model('about_case_model');
		$this->url_checker();
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
			$this->input->set_cookie("ytalent_account",$mail, 3600);
			$this->comm->plu_redirect(site_url()."register/step2?account=$mail&token=".md5(md5($mail)), 0, null);
		}else{
			$this->comm->plu_redirect(site_url(), 0, "此帳號已被註冊");
		}

		
	}

	function myinfo()
	{	
		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$account = $this->code_model->get_logged_in_account();

		if($account == null){
			$this->comm->plu_redirect(site_url(), 0, "尚未登入");
		}

		$account_data = $this->code_model->get_account_data($account);
	
		$vars['views'] = 'myinfo';
		$vars['account'] = $account;
		$vars['data'] = $account_data;
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('myinfo', $vars);
	
	}

	function editinfo()
	{	
		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$account = $this->code_model->get_logged_in_account();

		if($account == null){
			$this->comm->plu_redirect(site_url(), 0, "尚未登入");
		}

		$account_data = $this->code_model->get_account_data($account);
		$skill_list = $this->code_model->get_user_not_skill($account);

		// $school_list = $this->code_model->get_school_list(" WHERE account = '$account' ");
		$user_skill_list = $this->code_model->get_skill_list(" WHERE account = '$account' ");
	
		$vars['skill_list']	= $skill_list;
		// $vars['school_list']	= $school_list;
		$vars['user_skill_list']	= $user_skill_list;
		$vars['views'] = 'editinfo';
		$vars['account'] = $account;
		$vars['account'] = $this->input->get("account");
		$vars['token'] = $this->input->get("token");
		$vars['data'] = $account_data;
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('editinfo', $vars);
	
	}
	function do_edit(){
		
		$post_arr = $this->input->post();
		$config['upload_path'] = assets_server_path('avatar/');
		$config['allowed_types'] = 'png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config);

		$files = $_FILES;

	 	$name = $post_arr['account'].".png";

        $_FILES['pic']['name']=  $name;
        $_FILES['pic']['type']= $files['avatar']['type'];
        $_FILES['pic']['tmp_name']= $files['avatar']['tmp_name'];
        $_FILES['pic']['error']= $files['avatar']['error'];
        $_FILES['pic']['size']= $files['avatar']['size'];    

		if (!$this->upload->do_upload('pic'))
		{
			$msg = array('error'=>$this->upload->display_errors());

			//$this->load->view('upload_form',$error);
		}
		else
		{
			$data = array('upload_data'=>$this->upload->data());

			$post_arr["avatar"] = $data["upload_data"]["file_name"];
			//$this->load->view('upload_success',$data);
		}
		//echo assets_server_path('/assets/avatar/');
		//print_r($post_arr);
		//die();
		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();
		//$this->comm->plu_redirect(site_url(), 0, $msg);
		$result = $this->code_model->do_update_resume($post_arr);
		if($result){
			$this->comm->plu_redirect(site_url()."user/myinfo?account=".$post_arr['account'], 0, null);
		}else{
			$this->comm->plu_redirect(site_url(), 0, "更新失敗");
		}


		
	}
 function logout()
    {
        $this->fuel_auth->logout();

        redirect(site_url());
    }



    function do_login()
    {
    	//delete_cookie();
    	$this->load->helper('cookie');
        $this->set_meta->set_meta_data();
		$this->load->model('code_model');
        $account = $this->input->post("login_mail");
        $password = $this->input->post("login_password");

        $is_logined = $this->code_model->is_account_logged_in($account);
       
        if($is_logined)
        {
            redirect(site_url()."user/myinfo");
        }
        else
        {
            $login_result = $this->code_model->do_logged_in($account,$password);   
            
            if($login_result){
	        	/*$config = array(
					'name' =>  $account, 
					//'value' => serialize(array()),
					'expire' => 3600,
					'path' => $this->fuel->config('fuel_cookie_path')
					//'domain' => base_url()
				);
				$this->input->set_cookie($config);*/

				$this->input->set_cookie("ytalent_account",$account, 3600);

            	$this->comm->plu_redirect(site_url()."user/myinfo", 0, "登入成功");
            }else{

            	$this->comm->plu_redirect(site_url(), 0, "登入失敗");
            }
			
			    
        }
    }
	function step3()
	{	
		$this->load->model('code_model');
		$this->url_checker();
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();
		$vars['views'] = 'register3';
		$vars['account'] = $this->input->get("account");
		$vars['token'] = $this->input->get("token");
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('register3', $vars);
	}

	function fb_login()
	{	
		$this->load->model('code_model');
        $fbid = NULL;
        if($this->input->post('fbid') && $this->input->post('signed_request'))
        {
            $fbid = $this->input->post('fbid');

            /*
				加強登入機制安全性
            */

            $signed_request = $this->input->post('signed_request');
	        list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

	        // decode the data
	        $expected_sig = hash_hmac('sha256', $payload, FB_APP_SECRET, $raw = true);

	        $sig = $this->base64_url_decode($encoded_sig);

            if($sig !== $expected_sig)
            {
            	$fbid = NULL;
            	$result['status'] = -99;
            	$result['message'] = "Promession Deny";
            }
        }

        if($fbid != NULL)
        {
        	$result['fbid'] = $fbid;
        	$basic_info = $this->code_model->get_account_data($fbid);

			$this->load->helper('convert');
			$this->load->helper('cookie');
			
        	if($basic_info != null)
        	{
				$valid_user = $this->member_manage_model->valid_user_by_fbid($fbid);
				if (!empty($valid_user)) 
				{
					$this->fuel_auth->set_valid_user_fb($valid_user);
					// reset failed login attempts
					// set the cookie for viewing the live site with added FUEL capabilities
					$config = array(
						'name' => $this->fuel->auth->get_fuel_trigger_cookie_name(), 
						'value' => serialize(array('id' => $this->fuel->auth->user_data('id'), 'language' => $this->fuel->auth->user_data('language'))),
						'expire' => 3600,
						//'path' => WEB_PATH
						'path' => $this->fuel->config('fuel_cookie_path')
					);
					set_cookie($config);

                    if(empty($basic_info->cli_mobile))
                    {
                        $result['cli_mobile'] = -1;
                    }
                    else
                    {
                        $result['cli_mobile'] = $basic_info->cli_mobile;
                    }

					$result['status'] = 1;
					$result['user_data'] = $this->fuel->auth->user_data('id');
				}
				else
				{
					$result['status'] = -1;
				}
        	}
        	else
        	{
			    $result['status'] = -3;
			    $result['fbid'] = $fbid;
			    $result['signed_request'] = $this->input->post('signed_request');
			    $result['message'] = 'FB ID Not Exist';
        	}
        }
        else
        {
        	$result['status'] = -99;
        	$result['message'] = "Promession Deny";
        }

        if(is_ajax())
        {
        	echo json_encode($result);
        }
        else
        {
        	show_404();
        }
	}
	
}