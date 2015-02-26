<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Com_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(COM_FOLDER, COM_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_company']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_company ".$filter;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_job_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_job a ".$filter;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	} 

	public function get_deliver_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_drop_resume ".$filter;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	} 

	public function get_com_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT * FROM mod_company".$filter." ORDER BY id DESC LIMIT $dataStart, $dataLen";

		// echo $sql;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_job_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT (SELECT COUNT(*) FROM mod_drop_resume c WHERE c.job_id=a.id) total_count, 
		(SELECT MAX(drop_date) FROM mod_drop_resume c WHERE c.job_id=a.id) lastest_date,
		a.*,b.company_name ,b.company_logo FROM mod_job a left join mod_company b on a.company_id = b.id
		$filter ORDER BY id DESC LIMIT $dataStart, $dataLen";

		// echo $sql;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_deliver_list($dataStart, $dataLen, $filter)
	{
		$sql = @" SELECT a.*,b.name,c.job_title,c.id job_id,d.id com_id,d.company_name FROM mod_drop_resume a 
				  LEFT JOIN mod_resume b ON a.account = b.account 
				  LEFT JOIN mod_job c ON a.job_id = c.id 
				  LEFT JOIN mod_company d ON c.company_id = d.id
				  $filter 
				  ORDER BY a.drop_date DESC 
				  LIMIT $dataStart, $dataLen";

		// echo $sql;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_com_detail($id)
	{
		$sql = @"SELECT * FROM mod_company WHERE id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	}

	// public function get_com_detail_row($id)
	// {
	// 	$sql = @"SELECT * FROM mod_company WHERE id=?";
	// 	$para = array($id);
	// 	$query = $this->db->query($sql, $para);

	// 	if($query->num_rows() > 0)
	// 	{
	// 		$row = $query->row();

	// 		return $row;
	// 	}

	// 	return; 
	// }

	public function get_job_detail($id)
	{
		$sql = @"SELECT a.*,b.company_name ,b.company_logo,b.company_intro FROM mod_job a left join mod_company b on a.company_id = b.id 
		   WHERE a.id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row;
		}

		return;
	}

	public function get_deliver_detail($id)
	{
		$sql = @"SELECT a.*,b.name FROM mod_drop_resume a 
				 LEFT JOIN mod_resume b ON a.account = b.account 
				 WHERE a.id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row;
		}

		return;
	}

	public function do_add_com($company_name, $company_intro )
	{
		$sql = @"INSERT INTO mod_company ( 
										company_name, 
										company_intro
										) 
							VALUES (?, ?) ";
		$para = array(
						$company_name, 
						$company_intro 
					);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			$id = $this->db->insert_id();

			return $id;
		}

		return;
	}

	public function do_add_skill($job_id,$skill_id)
	{
		$sql = @"INSERT INTO mod_skill ( 
										job_id, 
										skill_id,
										skill_type
										) 
							VALUES (?, ?,'1') ";
		$para = array(
						$job_id, 
						$skill_id 
					);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			$id = $this->db->insert_id();

			return $id;
		}

		return;
	}

	public function do_add_lang($job_id,$lang_id,$level_id)
	{
		$sql = @"INSERT INTO mod_lang ( 
										lang_id, 
										level_id,
										job_id,
										lang_type
										) 
							VALUES (?, ?, ?, '1') ";
		$para = array(
						$lang_id,
						$level_id,
						$job_id
					);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			$id = $this->db->insert_id();

			return $id;
		}

		return;
	}

	public function do_add_job($insert_data)
	{
		$sql = @"INSERT INTO mod_job (
											job_title, 
											job_address,
											company_id, 
											salary_hour,   
											salary_week,
											salary_month,
											job_start_date,
											job_end_date,
											job_desc,
											job_status,
											job_term,
											job_intro										 
									 ) 
				VALUES ( ?, 
						 ?, 
						 ?, 
						 ?, 
						 ?,
						 ?,
						 ?, 
						 ?, 
						 ?,
						 ?,
						 ?, 
						 ?)"; 

		$para = array(
				$insert_data['job_title'], 
				$insert_data['job_address'],
				$insert_data['company_id'],
				$insert_data['salary_hour'],  
				$insert_data['salary_week'],
				$insert_data['salary_month'],
				$insert_data['job_start_date'],
				$insert_data['job_end_date'],
				$insert_data['job_desc'],
				$insert_data['job_status'],
				$insert_data['job_term'],
				$insert_data['job_intro']
			);
		$success = $this->db->query($sql, $para);

		// print_r($success);
		// die;

		if($success)
		{
			$id = $this->db->insert_id(); 
			return $id;
		}

		return;
	}

	public function update_img($updateAry)
	{
		$sql = @"UPDATE mod_company SET
										company_intro_pic=?, 
										company_logo=?
										
							WHERE id=? ";
		$para = array(
						$updateAry['company_intro_pic'], 
						$updateAry['company_logo'], 
						$updateAry['id']
					);

		$success = $this->db->query($sql, $para);

		return $success;
	}

	public function do_edit_com($updateAry)
	{
		$sql = @"UPDATE mod_company SET company_name=?,company_intro=?,
			 company_intro_pic=?,company_logo=?  WHERE id=?";

		$para = array($updateAry['company_name'], $updateAry['company_intro'], 
					  $updateAry['company_intro_pic'], $updateAry['company_logo'], $updateAry['id']);
		$success = $this->db->query($sql, $para);

		return $success;
	}

	public function do_edit_deliver($updateAry){
		$sql = @"UPDATE mod_drop_resume SET process_type=?,note=?,interview_time=?,interview_place=? WHERE id=?";

		$para = array($updateAry['process_type'], $updateAry['note'], $updateAry['interview_time'], $updateAry['interview_place'], $updateAry['id']);
		$success = $this->db->query($sql, $para);

		return $success;
	}

	public function do_edit_job($updateAry)
	{
		$sql = @"UPDATE mod_job SET
											job_title      =?, 
											job_address    =?, 
											company_id     =?, 
											salary_hour    =?,    
											salary_week    =?, 
											salary_month   =?, 
											job_start_date =?, 
											job_end_date   =?, 
											job_desc       =?, 
											job_status     =?, 
											job_term       =?, 
											job_intro      =? 			
						WHERE id=?							 
			 
						  "; 

		$para = array(
				$updateAry['job_title'], 
				$updateAry['job_address'],
				$updateAry['company_id'],
				$updateAry['salary_hour'],  
				$updateAry['salary_week'],
				$updateAry['salary_month'],
				$updateAry['job_start_date'],
				$updateAry['job_end_date'],
				$updateAry['job_desc'],
				$updateAry['job_status'],
				$updateAry['job_term'],
				$updateAry['job_intro'],
				$updateAry['id']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function do_del_skill($job_id)
	{
		$sql = @"DELETE FROM  mod_skill WHERE job_id = ? ";	 
		$para = array($job_id);
		$success = $this->db->query($sql, $para);
		return $success;
	}

	public function do_del_lang($job_id)
	{
		$sql = @"DELETE FROM  mod_lang WHERE job_id = ? ";		 
		$para = array($job_id);
		$success = $this->db->query($sql, $para);
		return $success;
	}

	public function do_del_com($id)
	{
		$para = array($id);
		$sql = @"DELETE FROM  mod_skill WHERE job_id in (select id from mod_job where company_id = ?)";
		$success = $this->db->query($sql, $para);
		$sql = @"DELETE FROM  mod_lang  WHERE job_id in (select id from mod_job where company_id = ?)";
		$success = $this->db->query($sql, $para);
		$sql = @"DELETE FROM  mod_job  WHERE company_id = ? ";
		$$success = $this->db->query($sql, $para);
		$sql = @"DELETE FROM  mod_company WHERE id=?"; 
		$success = $this->db->query($sql, $para);

		return $success;
	}

	public function do_job_del($id)
	{
		$para = array($id);
		$sql = @"DELETE FROM  mod_skill WHERE job_id = ?";
		$success = $this->db->query($sql, $para);
		$sql = @"DELETE FROM  mod_lang  WHERE job_id = ?";
		$success = $this->db->query($sql, $para);
		$sql = @"DELETE FROM  mod_job WHERE id=?";		
		$success = $this->db->query($sql, $para);
		return $success;
	} 

	public function do_multi_del_com($ids)
	{
		$sql = @"DELETE FROM  mod_company WHERE id in (?) ";

		$para = array($ids);
		$success = $this->db->query($sql, $para);

		return $success;
	}

	  

	public function valid_user($id)
	{
		$sql = @"SELECT id, com_title FROM mod_company WHERE id=? ";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			return $query->row();
		}

		return;
	}

	public function get_code_list($codekind_key){
		$sql = @"SELECT * FROM mod_code WHERE codekind_key=? ";
		$para = array($codekind_key);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			return $query->result();
		}

		return;
	}

	public function get_lang_list(){
		return $this->get_code_list('lang');
	}

	public function get_level_list(){
		return $this->get_code_list('level');
	}

	public function get_skill_list(){
		return $this->get_code_list('skill');
	}

	public function get_job_lang_list($id)
	{
		$sql = @"SELECT a.*,b.code_name as lang_name,c.code_name as level_name FROM mod_lang a 
		left join mod_code b on a.lang_id=b.code_id
		left join mod_code c on a.level_id=c.code_id
		 WHERE job_id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}else{
			return array();
		}
 
	}

	 
	public function get_job_skill_list($id)
	{
		$sql = @"SELECT a.*,b.code_name FROM mod_skill a left join mod_code b on a.skill_id=b.code_id WHERE job_id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}else{
			return array();
		}
	}
	
}