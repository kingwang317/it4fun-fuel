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
		$vars['views'] = 'home';
		$vars['all_cate']	= $all_cate;
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('home', $vars);
	}

	function step1_save(){
		$this->load->helper('cookie');
		$this->input->set_cookie("ytalent_account","", time()-3600);
		$mail = $this->input->get_post("mail");
		$password = $this->input->get_post("password");
		$this->load->model('code_model');
		$result = $this->code_model->do_register_resume($mail,$password);

		if($result){
			
			$this->input->set_cookie("ytalent_account",$mail, time()+3600);
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

	function do_connect_fb2account(){
		$this->load->model('code_model');
		$account = $this->code_model->get_logged_in_account();

		$data = $this->code_model->get_fb_data();


		if(isset($data['user_profile'])){
			$result = $this->code_model->do_update_fbid2resume($account,$data['user_profile']['id']);
			$this->comm->plu_redirect(site_url()."user/editinfo", 0, "FACEBOOK連接成功");

		}else{
			$this->comm->plu_redirect(site_url(), 0, "FACEBOOK連接失敗");
		}


	}
	function editinfo()
	{	

		//ALTER TABLE  `mod_resume` ADD  `find_job_kind` INT( 10 ) NULL
		$this->load->model('code_model');
		$this->load->helper('cookie');
		$this->load->helper('ytalent');
		//$this->load->helper('MY_date');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$account = $this->code_model->get_logged_in_account();
		$recommended_id = $this->input->cookie("ytalent_recommended_id");

		if($account == null){
			$this->comm->plu_redirect(site_url(), 0, "尚未登入");
		}

		$account_data = $this->code_model->get_account_data($account);
		// $skill_list = $this->code_model->get_user_not_skill($account);
		$skill_list = $this->code_model->get_skill();
		$user_skill_list = $this->code_model->get_skill_list(" WHERE account = '$account' ");

		$job_cate_list = $this->code_model->get_job_cate("job_cate");
		// print_r($account_data[0]->exclude_cate);
		// die;
		$exclude_cate = !empty($account_data[0]->exclude_cate)?explode(";", $account_data[0]->exclude_cate):array();
		$age = isset($account_data[0]->birth)&&$account_data[0]->birth!="0000-00-00"?get_age($account_data[0]->birth):'';

		// $lang_list = $this->code_model->get_lang();
		// $lang_list = $this->code_model->get_lang_list(" WHERE account = '$account' ");
		$level_list = $this->code_model->get_level();
		


		$fb_data	= $this->code_model->get_fb_data("user/do_connect_fb2account");
		$vars['age'] = $age;
		$vars['fb_data'] = $fb_data;
		$vars['exclude_cate']	= $exclude_cate;
		$vars['skill_list']	= $skill_list;
		// $vars['lang_list']	= $lang_list;
		$vars['level_list']	= $level_list;
		$vars['job_cate_list'] = $job_cate_list;
		$vars['user_skill_list']	= $user_skill_list;
		$vars['views'] = 'editinfo';
		$vars['recommended_id'] = $recommended_id;
		$vars['account'] = $account;
		$vars['account'] = $this->input->get("account");
		$vars['token'] = $this->input->get("token");
		$vars['data'] = $account_data;
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('editinfo', $vars);
	
	}

	function do_edit(){
		
		$post_arr = $this->input->post();
		// print_r($_FILES);
		// die;

		$avatar_path = assets_server_path("avatar/");

		if (!file_exists($avatar_path)) {
		    mkdir($avatar_path, 0777, true);
		}

		$about_att_path = assets_server_path("about_att/");

		if (!file_exists($about_att_path)) {
		    mkdir($about_att_path, 0777, true);
		}

		$config['upload_path'] = $avatar_path;
		$config['allowed_types'] = 'png';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config);

		// $files = $_FILES;

	 	$name = $post_arr['account'].".png";

        // $_FILES['pic']['name']=  $name;
        // $_FILES['pic']['type']= $files['avatar']['type'];
        // $_FILES['pic']['tmp_name']= $files['avatar']['tmp_name'];
        // $_FILES['pic']['error']= $files['avatar']['error'];
        // $_FILES['pic']['size']= $files['avatar']['size'];    
        $msg = null;
		if (!$this->upload->do_upload('avatar') && $_FILES['avatar']['size'] != 0)
		{
			$msg = "頭像圖片更新失敗，限制140x140以內，PNG的圖片";
			// $msg = $this->upload->display_errors();
		}
		else
		{
			$data = array('upload_data'=>$this->upload->data());
			$post_arr["avatar"] = $data["upload_data"]["file_name"];
		}
		//關於自己
		$config['upload_path'] = $about_att_path;
		$config['allowed_types'] = 'doc|docx|pdf|jpg|png';
		$config['max_size']	= '9999999';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->upload->initialize($config);


		// $_FILES['about_att']['name']=  $name;
  //       $_FILES['about_att']['type']= $files['about_att']['type'];
  //       $_FILES['about_att']['tmp_name']= $files['about_att']['tmp_name'];
  //       $_FILES['about_att']['error']= $files['about_att']['error'];
  //       $_FILES['about_att']['size']= $files['about_att']['size'];    
  //       print_r($_FILES);
		// die;

		if ($this->upload->do_upload('about_att'))
		{
			$data = array('upload_data'=>$this->upload->data());
			$post_arr["about_att"] = $data["upload_data"]["file_name"];
		} else{ 

			$post_arr["about_att"] = $post_arr["exist_about_att"];	
			if (isset($post_arr["about_att_delete"])) {
			 	$post_arr["about_att"] = '';
			 	unlink($about_att_path."/".$post_arr["exist_about_att"]);
			}			 
		}

     

		// print_r($post_arr);
		// die;

		$this->load->model('code_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();
		$result = $this->code_model->do_update_resume($post_arr);
		if($result){
			$this->comm->plu_redirect(site_url()."user/editinfo?account=".$post_arr['account'], 0, $msg);
		}else{
			$this->comm->plu_redirect(site_url(), 0, "更新失敗");
		}
		
	}
 	function logout()
    {
       // $this->fuel_auth->logout();
$this->load->helper('cookie');
        delete_cookie("ytalent_account");

        redirect(site_url());
    }

    function do_login()
    {
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
				$this->input->set_cookie("ytalent_account",$account, 3600);

            	$this->comm->plu_redirect(site_url()."user/myinfo", 0, "登入成功");
            }else{

            	$this->comm->plu_redirect(site_url(), 0, "登入失敗");
            }
			
			    
        }
    }
    public function do_fb_regi(){
    	$this->load->helper('cookie');
		$this->load->model('code_model');

		$data = $this->code_model->get_fb_data();


		if(isset($data['user_profile'])){

			$this->input->set_cookie("ytalent_account","", time()-3600);
			$mail = $data['user_profile']['id'];
			$password = $data['user_profile']['id'];
			$name = "";
			$fb_email = "";
			if(isset($data['user_profile']['name'])){
				$name = $data['user_profile']['name'];
			}
			if(isset($data['user_profile']['email'])){
				$fb_email = $data['user_profile']['email'];
			}



			$result = $this->code_model->do_register_resume($mail,$password,$name,$fb_email,$data['user_profile']['id']);
			$this->input->set_cookie("ytalent_account",$mail, time()+3600);
			$this->input->set_cookie("ytalent_fb_logout_url",$data['logout_url'], time()+3600);

			$this->comm->plu_redirect(site_url()."user/editinfo?account=".$mail, 0, "FACEBOOK登入成功");

		}else{
			$this->comm->plu_redirect(site_url(), 0, "FACEBOOK登入失敗");
		}
	}
	function myevent()
	{	
		$this->load->helper('cookie');
		$this->load->library('facebook');
		$this->load->library('set_page');
		$this->load->model('code_model');
		$base_url = base_url();
		$this->load->module_model(EVENT_FOLDER, 'event_manage_model');
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$filter = '';
		$target_url = $base_url.'event/';


		$results = $this->event_manage_model->get_event_list(0, 4, $filter);

		$account = $this->code_model->get_logged_in_account();

		$filter = " WHERE  event_id in (SELECT event_id FROM mod_register WHERE account = '$account' ORDER BY drop_date )";

		$results_my = $this->event_manage_model->get_event_list(0, 4, $filter);

		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;

		$vars['base_url'] 			= $base_url;
		$vars['target_url'] 		= $target_url;
		$vars['photo_path']			= $base_url.'assets/uploads/event/';
		$vars['results']			= $results;
		$vars['results_my']			= $results_my;
		$vars['event_detail_url']	= $base_url.'event/detail/';
		
		$vars['views'] 				= 'myevent';
		$page_init = array('location' => 'myevent');
		$this->fuel->pages->render('myevent', $vars);
	}
	function mynews()
	{	
		$this->load->helper('cookie');
		$this->load->library('facebook');
		$this->load->library('set_page');
		$this->load->model('code_model');
		$base_url = base_url();
		$this->load->module_model(EVENT_FOLDER, 'event_manage_model');
		$this->load->module_model(COM_FOLDER, 'com_manage_model');
		$this->load->module_model(NEWS_FOLDER, 'news_manage_model');
		
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$filter = '';
		$event_target_url = $base_url.'event/';
		$job_target_url = $base_url.'job/';


		$event_results = $this->event_manage_model->get_event_list(0, 4, "");
		$job_results = $this->com_manage_model->get_job_list(0, 4, "");
		$news_results = $this->news_manage_model->get_news_list(0, 3, "WHERE type = (SELECT code_id FROM mod_code WHERE code_key = 'NEWS')");

		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;


		//print_r($news_results);
//die();
		$vars['base_url'] 			= $base_url;
		$vars['event_target_url'] 		= $event_target_url;
		$vars['job_target_url'] 		= $job_target_url;
		$vars['event_photo_path']			= $base_url.'assets/uploads/event/';
		$vars['news_photo_path']			= $base_url.'assets/uploads/news/';
		$vars['job_photo_path']			= $base_url.'assets/';
		$vars['event_results']			= $event_results;
		$vars['job_results']			= $job_results;
		$vars['news_results']			= $news_results;
		$vars['event_detail_url']	= $base_url.'event/detail/';
		$vars['job_detail_url']	= $base_url.'job/detail/';
		$vars['news_detail_url']	= $base_url.'job/detail/';
		$vars['views'] 				= 'mynews';
		$page_init = array('location' => 'mynews');
		$this->fuel->pages->render('mynews', $vars);
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
	
}