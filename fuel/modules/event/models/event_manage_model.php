<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(EVENT_FOLDER, EVENT_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_event']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_resume $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_resume_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT * FROM mod_resume $filter ORDER BY create_time DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	} 
	
}