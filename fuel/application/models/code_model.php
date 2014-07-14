<?php
class Code_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_school_list($filter = "")
    {
        $sql = @"SELECT * FROM mod_school ".$filter." ORDER BY id DESC ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }

        return null;
    }

    public function do_logged_in($account,$password){

        $sql = @" SELECT * FROM mod_resume WHERE account = ? AND password = MD5(?) LIMIT 1";
        $para = array(
            $account,
            $password
        );

        $res_1 = $this->db->query($sql, $para);

        if($res_1->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
    }
    function is_account_logged_in($account){
        //$this->load->helper('cookie');
        $cookie = $this->input->cookie("ytalent_account",TRUE);

        //print_r($cookie);
      // print_r($this->input->cookie());
       // die();
        if(isset($cookie) && !empty($cookie) && $cookie == $account){
            return true;
        }else{
            delete_cookie("ytalent_account");
            return false;
        }
    }
    function is_logged_in(){
        //$this->load->helper('cookie');
        $cookie = $this->input->cookie("ytalent_account",TRUE);

        //print_r($cookie);
      // print_r($this->input->cookie());
       // die();
        if(isset($cookie) && !empty($cookie)){
            return true;
        }else{
            delete_cookie("ytalent_account");
            return false;
        }
    }
    function get_logged_in_account(){
        //$this->load->helper('cookie');
        $cookie = $this->input->cookie("ytalent_account",TRUE);

        //print_r($cookie);
      // print_r($this->input->cookie());
       // die();
        if(isset($cookie) && !empty($cookie)){
            return $cookie;
        }else{
            //delete_cookie("ytalent_account");
            return null;
        }
    }

     public function get_user_not_skill($account)
    { 
        // $b = urldecode($q);

        $sql = @"SELECT code_id,code_name FROM mod_code WHERE codekind_key ='skill' 
                and code_id not in (select skill_id from mod_skill where account = '$account') 
         ";
        $para = array($account);
        // echo $sql;
        $query = $this->db->query($sql,$para);

        if($query->num_rows() > 0)
        {
            $result = $query->result(); 
            return $result;
        }

        return;
    }
    public function get_skill_list($filter = "")
    {
        $sql = @"SELECT b.code_id,b.code_name FROM mod_skill a left join mod_code b on a.skill_id = b.code_id ".$filter." ORDER BY id DESC ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }

        return null;
    }
     public function get_school($name="")
    { 
        // $b = urldecode($q);

        $sql = @"SELECT code_id,code_name FROM mod_code WHERE codekind_key ='school' ";
        $para = array();
        if (!empty($name)) {
            $sql .= " AND code_name = ? ";
            array_push($para, $name);
        }
        // $para = array($q);
        // echo $sql;
        $query = $this->db->query($sql,$para);

        if($query->num_rows() > 0)
        {
            $result = $query->result(); 
            return $result;
        }

        return;
    }

    public function get_skill()
    { 
        // $b = urldecode($q);

        $sql = @"SELECT code_id,code_name FROM mod_code WHERE codekind_key ='skill' ";
        // $para = array($q);
        // echo $sql;
        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            $result = $query->result(); 
            return $result;
        }

        return;
    }

    public function do_register_resume($email, $password)
    {

        $check_sql = @" SELECT account FROM mod_resume where account = '$email' ";
        $query = $this->db->query($check_sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            return false;
        }


        $sql = @" INSERT INTO mod_resume(account,password,name,birth,contact_tel,contact_mail,create_time)VALUES(?,MD5(?),?,?,?,?,NOW())";
        $para = array($email,$password, "", "","",$email);
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }

    public function do_update_resume($data)
    {


        $account_arr = array();
        $school_arr = array();
        $exp_arr = array();
        $skill_arr = array();

        foreach ($data as $key => $value) {
            //echo $key."-".strpos($key,"job_");
            if(strpos($key,"school_")>-1){
                $school_arr[$key] = $value;
            }elseif(strpos($key,"job_")>-1){
                $exp_arr[$key] = $value;
            }elseif(strpos($key,"skill")>-1){
                $skill_arr = $value;
            }else{
                $account_arr[$key] = $value;
            }
        }

        $update_accunt_sql = " UPDATE mod_resume SET 
                                name = ?,
                                birth = ?,
                                contact_tel = ?,
                                address = ?,
                                job_status = ?,
                                about_self = ?,
                                recommended  = ? ,
                                avatar = ?
                                WHERE account = ? ";

        if(!isset($account_arr["recommended"])){
            $account_arr["recommended"] = "";
        }
        if(!isset($account_arr["avatar"])){
            $account_arr["avatar"] = "";
        }
        $para = array(
            $account_arr["name"],
            $account_arr["birth"], 
            $account_arr["contact_tel"], 
            '', 
            $account_arr["now_status"], 
            $account_arr["about_self"], 
            $account_arr["recommended"],
            $account_arr["avatar"],
            $account_arr["account"]
            );
        $res_1 = $this->db->query($update_accunt_sql, $para);

        //print_r($account_arr);
        //die();

        $delete_school_sql = "DELETE FROM mod_school WHERE account = ?";
        $para = array(
                    $account_arr["account"], 
                );
        $this->db->query($delete_school_sql, $para);

     
 
        for($i = 1; $i < 100 ;$i++){
            if(isset($school_arr["school_id_$i"]) && $school_arr["school_id_$i"] != ""){
                $school_id = $this->get_school($school_arr["school_id_$i"]);
                if (sizeof($school_id)>0) {
                    $school_id = $school_id[0]->code_id; 
                }else{
                      $insert_school_code_sql = " INSERT INTO  mod_code (codekind_key,code_name,parent_id,modi_time,lang_code)VALUES(?,?,'-1',NOW(),'tw')";
                      $para = array(
                        "school",
                        $school_arr["school_id_$i"]                         
                    );

                    $this->db->query($insert_school_code_sql, $para);
                    $sql = "SELECT last_insert_id() as ID";
                    $id_result= $this->db->query($sql);
                    $school_id = $id_result->row()->ID; 
                }
                $insert_school_sql = " INSERT INTO  mod_school (account,school_id,is_grad,is_attend)VALUES(?,?,?,?)";
                if($school_arr["school_state_$i"] == 'G'){
                    $is_grad = "1";
                    $is_attend = "0";
                }else{
                    $is_grad = "0";
                    $is_attend = "1";
                }

                $para = array(
                    $account_arr["account"],
                    $school_id ,//$school_arr["school_id_$i"], 
                    $is_grad, 
                    $is_attend = "1"
                );

                $res_2 = $this->db->query($insert_school_sql, $para);
            }else{
                if(!isset($school_arr["school_id_$i"])){
                    break;
                }
            }
        }

        $delete_exp_sql = "DELETE FROM mod_exp WHERE account = ?";
        $this->db->query($delete_exp_sql, $para);

        for($i = 1; $i < 100 ;$i++){
            if(isset($exp_arr["job_company_name_$i"]) && $exp_arr["job_company_name_$i"] != ""){
                $insert_exp_sql = " INSERT INTO  mod_exp (account,company_name,job_title,job_start_date,job_end_date)VALUES(?,?,?,?,?)";


                $para = array(
                    $account_arr["account"],
                    $exp_arr["job_company_name_$i"], 
                    $exp_arr["job_title_$i"], 
                    $exp_arr["job_start_date_$i"], 
                    $exp_arr["job_end_date_$i"]
                );

                $res_3 = $this->db->query($insert_exp_sql, $para);
            }else{
                if(!isset($exp_arr["job_company_name_$i"])){
                    break;
                }
            }
        }

        $delete_skill_sql = "DELETE FROM mod_skill WHERE account = ?";        
        $this->db->query($delete_skill_sql, $para);

        foreach ($skill_arr as $key) {
            $insert_skill_sql = " INSERT INTO  mod_skill (account,skill_id)VALUES(?,?)";


            $para = array(
                $account_arr["account"],
                $key
            );

            $this->db->query($insert_skill_sql, $para);
        }

        return true;
    }


    public function get_account_data($account)
    {
        $sql = @"SELECT * FROM mod_resume WHERE account = '$account' ";
        $query = $this->db->query($sql);
        $account_arr = array();

        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $key => $value) {
                
                $account_arr[$key] = $value;
            }

            $skill_sql = " SELECT skill_id,(SELECT code_name FROM mod_code WHERE code_id = skill_id LIMIT 1 ) as skill_name FROM mod_skill WHERE account = '$account' ";
            $skill_query = $this->db->query($skill_sql);
            if($skill_query->num_rows() > 0)
            {
                $account_arr["skills"] = $skill_query->result();
            }else{
                $account_arr["skills"] = null;
            }

            $school_sql = " SELECT school_id,(SELECT code_name FROM mod_code WHERE code_id = school_id LIMIT 1 ) as school_name,is_grad,is_attend FROM mod_school WHERE account = '$account'  ";
            $school_query = $this->db->query($school_sql);
            if($school_query->num_rows() > 0)
            {
                $account_arr["schools"] = $school_query->result();
            }else{
                $account_arr["schools"] = null;
            }

            $exp_sql = " SELECT * FROM mod_exp WHERE account = '$account'  ";
            $exp_query = $this->db->query($exp_sql);
            if($exp_query->num_rows() > 0)
            {
                $account_arr["exp"] = $exp_query->result();
            }else{
                $account_arr["exp"] = null;
            }

            return $account_arr;
        }else{
            return null;
        }

        return 0;
    }

    public function get_case_list($dataStart, $dataLen, $filter)
    {
        $sql = @"SELECT * FROM data_case_detail ".$filter." ORDER BY cd_id DESC LIMIT $dataStart, $dataLen";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }

        return false;
    }

    public function get_case_detail($cd_id)
    {
        $sql = @"SELECT * FROM data_case_detail WHERE cd_id=?";
        $para = array($cd_id);
        $query = $this->db->query($sql, $para);

        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }

        return;
    }

    public function get_case_url($cd_id)
    {
        $sql = @"SELECT cd_url FROM data_case_detail WHERE cd_id=?";
        $para = array($cd_id);
        $query = $this->db->query($sql, $para);

        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row->cd_url;
        }

        return;
    }

    public function do_insert_help($insert_data)
    {
        $sql = @"INSERT INTO data_case_help (cd_id, cli_id, case_url, cli_intro, modi_time) VALUES (?, ?, ?, ?, NOW())";
        $para = array(
                $insert_data['cd_id'],
                $insert_data['cli_id'],
                $insert_data['case_url'],
                $insert_data['cli_intro']
            );
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }

    public function get_case_help_by_cli_id($insert_data)
    {
        $sql = @"SELECT ch_id FROM data_case_help WHERE cli_id=? AND case_url=?";
        $para = array($insert_data['cli_id'], $insert_data['case_url']);
        $query = $this->db->query($sql, $para);

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

        return;
    }

    public function get_case_cate_code()
    {
        $sql = @"SELECT * FROM mod_code WHERE codekind_key='case_cate_group' AND parent_id='-1'";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }

        return;
    }

    public function get_case_sub_cate($parent_id)
    {
        $sql = @"SELECT * FROM mod_code WHERE codekind_key='case_cate_group' AND parent_id=?";
        $para = array($parent_id);
        $query = $this->db->query($sql, $para);
        
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }

        return;
    }

    public function get_parent_id($code_id)
    {
        $sql = @"SELECT parent_id FROM mod_code WHERE codekind_key='case_cate_group' AND code_id=?";
        $para = array($code_id);
        $query = $this->db->query($sql, $para);

        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row->parent_id;
        }

        return;
    }

    public function get_case_cate_sub_ids($code_id)
    {
        $tmp = array();
        $sql = @"SELECT code_id FROM mod_code WHERE codekind_key='case_cate_group' AND parent_id=?";
        $para = array($code_id);
        $query = $this->db->query($sql, $para);

        if($query->num_rows() > 0)
        {
            $result = $query->result();

            foreach ($result as $key => $row) 
            {
                array_push($tmp, $row->code_id);
            }

            $txt = implode(",", $tmp);

            return $txt;
        }

        return;
    }

    public function get_relation_case($filter, $cd_id)
    {
        $sql = @"SELECT cd_id, cd_title FROM data_case_detail ".$filter." AND cd_id<>'$cd_id' ORDER BY run_date DESC LIMIT 0, 5";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }

        return;
    }

    public function get_case_cate_title($code_id)
    {
        $sql = @"SELECT code_name FROM mod_code WHERE code_id=?";
        $para = array($code_id);
        $query = $this->db->query($sql, $para);

        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row->code_name;
        }

        return;
    }

}