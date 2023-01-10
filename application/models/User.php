<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    
   // Insert registration data in database
    public function registration_insert($data) {
        //Query to check whether username already exist or not
//        $condition = "user_name =" . "'" . $data['user_name'] . "'";
//        $this->db->select('*');
//        $this->db->from('user_login');
//        $this->db->where($condition);
//        $this->db->limit(1);
//        $query = $this->db->get();
//        if ($query->num_rows() == 0) {

        // Query to insert data in database
        $this->db->insert('users', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }
//        }else{
//            return false;
//        }
    }//end of register user
    
    public function get_email_check($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result();
    }
    
    /// login process
    function login($email,$password,$type)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        $this->db->where("status",1);
        $this->db->where("type",$type);
        $query=$this->db->get();
        
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    //get user data by session
    public function get_user_data($user_id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function cron_data()
    { 
        $query ="select * from cron_records order by id DESC limit 1";
        $res = $this->db->query($query);
        return $res->result();
    }
    public function user_data($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where("type !=",'admin');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
    
    //update onboard info
    public function update_onboard($data, $id){
        $this->db->where('id', $id);
        return $this->db->update('inv_users', $data);
    }
    
    //insert package
    public function insert_package($data,$id){
        $res = $this->db->insert('package', $data);
        if($res){
            $this->db->where('id', $id);
            $this->db->set('has_package', 1);
            return $this->db->update('inv_users');
        }
    }
    
    //get package by user
    public function get_package($user_id){
        $this->db->select('*');
        $this->db->from('package');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    //update user package
    public function update_package($data, $id){
        $this->db->where('user_id', $id);
        $res = $this->db->update('package', $data);
        if($res){
            $this->db->where('id', $id);
            $this->db->set('has_package', 1);
            return $this->db->update('inv_users');
        }
    }
    
    //check admin already exist or not

    function user_exists($email){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }
    
    
    //update reset password
    public function update_password($email,$pass){
        $this->db->where('email', $email);
        $this->db->set('password', $pass);
        $this->db->set('password_updation_date', date("Y-m-d"));
        return $this->db->update('users');
    }

    
    //update user status
    public function update_status($email){
        $this->db->where('email', $email);
        $this->db->set('status', 1  );
        return $this->db->update('users');
    }
    
    //fron cron job emails
    public function get_all_users(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('type !=', 'admin');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }
    
     public function insert_cron_record($data) {
        
        $this->db->insert('cron_records', $data);
        return true;
        
    }//insert cron recored

}//end of class