<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /// Admin login process

    function admin_login($email,$password){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        $this->db->where("status",1);
        $this->db->where("type",'admin');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    //check admin already exist or not

    function admin_exists($email){


        $this->db->select('*');

        $this->db->from('users');

        $this->db->where('email',$email);
        $this->db->where('type', 'admin');

        $query = $this->db->get();

        if ($query->num_rows() > 0){

            return $query->result();

        }else{

            return false;

        }



    }
    
    



    /// update admin forgotten password

    function update_password($email, $password) {



        $data = array('password' => $password);

        $this->db->where('email', $email);

        $this->db->update('users', $data);



    }
    

    //get admin profile data

    public function get_admin_profile_data(){



		$this->db->select('*');

		$this->db->from("users");

        $this->db->where('id', $this->session->userdata('user_id'));

		$query=$this->db->get();

		//echo $this->db->last_query();exit;



		return $query->result_array();

    }



    //update admin profile

    public function update_admin_profile($data){



        $this->db->where('id', $this->session->userdata('user_id'));

        return $this->db->update('users', $data);

        //echo $this->db->last_query();exit;

    }



    ///all reservations

    public function get_all_reservations(){



		$this->db->select('*');

		$this->db->from("reservations");

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;



		return $query->result_array();



    }

    

    ///all users
    public function get_all_users(){

		$this->db->select('*');

		$this->db->from("users");
        
        $this->db->where('type !=', 'admin');

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all employers
    public function get_all_employers(){

		$this->db->select('*');

		$this->db->from("users");
        
        $this->db->where('type', 'Employer');

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinic employers
    public function get_clinic_employers($id){

		$this->db->select('*');
		$this->db->from("assigned_clinics");
        $this->db->where('clinic_id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinic injury records
    public function get_clinic_injury_record($id){

		$this->db->select('*');
		$this->db->from("injury_form");
        $this->db->where('clinic_id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinic poet records
    public function get_clinic_poet_record($id){

		$this->db->select('*');
		$this->db->from("general_poet_form");
        $this->db->where('clinic_id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all employer injury records
    public function get_emp_injury_record($id){

		$this->db->select('*');
		$this->db->from("injury_form");
        $this->db->where('employer_id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all employer poet records
    public function get_emp_poet_record($id){

		$this->db->select('*');
		$this->db->from("general_poet_form");
        $this->db->where('employer_id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all employers for clinic not assigned
    public function get_all_employers_not_assigned($clinic_id){

        $SQL = "SELECT * FROM users
                WHERE NOT EXISTS (SELECT * FROM assigned_clinics
                WHERE assigned_clinics.employer_id = users.id AND assigned_clinics.clinic_id = $clinic_id)
                AND type = 'Employer'";

        $query = $this->db->query($SQL);
        //echo  $this->db->last_query();

        return $query->result_array();

    }
    
    ///get employers by id
    public function employer_by_id($id){

		$this->db->select('*');

		$this->db->from("users");
        
        $this->db->where('id', $id);

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///get employers by id
    public function get_admin(){

		$this->db->select('*');

		$this->db->from("users");
        
        $this->db->where('type', 'admin');

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinics
    public function get_all_clinics(){

		$this->db->select('*');

		$this->db->from("users");
        
        $this->db->where('type', 'Clinic');

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinics injury form data by clinic id
    public function get_injury_data_by_clinic($clinic_id){

		$this->db->select('*');
		$this->db->from("users");
        $this->db->join('injury_form', 'users.id = injury_form.clinic_id');
        
        if($this->session->userdata('user_type') == 'Clinic'){
            $this->db->where('injury_form.clinic_id',$clinic_id);
        }elseif($this->session->userdata('user_type') == 'Employer'){
            $this->db->where('injury_form.employer_id',$clinic_id);
        }
        
        //$this->db->where('users.id',$clinic_id);
        //$this->db->where('injury_form.clinic_id', $clinic_id);
        
        //$this->db->order_by("id", "desc");
		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinics general poet form data by clinic id
    public function get_poet_data_by_clinic($clinic_id){

		$this->db->select('*');
		$this->db->from("users");
        $this->db->join('general_poet_form', 'users.id = general_poet_form.clinic_id');
        //$this->db->where('users.id',$clinic_id);
        //$this->db->where('general_poet_form.clinic_id', $clinic_id);
        if($this->session->userdata('user_type') == 'Clinic'){
            $this->db->where('general_poet_form.clinic_id',$clinic_id);
        }elseif($this->session->userdata('user_type') == 'Employer'){
            $this->db->where('general_poet_form.employer_id',$clinic_id);
        }
        //$this->db->order_by("id", "desc");
		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all injury data
    public function get_all_injury_data(){

		$this->db->select('*');

		$this->db->from("users");
        $this->db->join('injury_form', 'users.id = injury_form.clinic_id');
        //$this->db->where('users.id', 'injury_form.employer_id');
        //$this->db->order_by("id", "desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all poet data
    public function get_all_poet_data(){

		$this->db->select('*');

		$this->db->from("users");
        $this->db->join('general_poet_form', 'users.id = general_poet_form.clinic_id');

        //$this->db->order_by("id", "desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all wharf data
    public function get_all_wharf_data(){

		$this->db->select('*');
        $this->db->from("users");
        $this->db->join('warf_form', 'users.id = warf_form.clinic_id');
        //$this->db->join('general_poet_form', 'users.id = general_poet_form.clinic_id');

        //$this->db->order_by("id", "desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    ///all clinics general poet form data by clinic id
    public function get_wharf_data_by_clinic($clinic_id){

		$this->db->select('*');
		$this->db->from("users");
        $this->db->join('warf_form', 'users.id = warf_form.clinic_id');
        if($this->session->userdata('user_type') == 'Clinic'){
            $this->db->where('warf_form.clinic_id',$clinic_id);
        }elseif($this->session->userdata('user_type') == 'Employer'){
            $this->db->where('warf_form.employer_id',$clinic_id);
        }
        //$this->db->order_by("id", "desc");
		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    
    //all contacts us

    public function get_all_contacts(){



		$this->db->select('*');

		$this->db->from("contact_us");

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;



		return $query->result_array();



    }

    

    //all total packages

    public function get_all_packages(){



		$this->db->select('*');

		$this->db->from("packages");

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;



		return $query->result_array();



    }



    public function insert_packages_data($data){

	   /*echo "<pre>";print_r($data);exit;*/

        $this->db->insert('packages',$data);

        return true;

    }
    
    public function assign_to_clinic($data){

	   /*echo "<pre>";print_r($data);exit;*/

        $this->db->insert('assigned_clinics',$data);

        return true;

    }
    
     /// get assigned employers by clinic
    public function get_assigned_emp_by_clicnic($clinic_id){

        $this->db->select('*');
        $this->db->from('assigned_clinics');
        $this->db->join('users', 'users.id = assigned_clinics.employer_id');
        if($this->session->userdata('user_type') == 'Clinic'){
            $this->db->where('assigned_clinics.clinic_id',$clinic_id);
        }elseif($this->session->userdata('user_type') == 'Employer'){
            $this->db->where('assigned_clinics.employer_id',$clinic_id);
        }
        
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    /// get assigned employers by clinic id
    public function get_assigned_emp_by_clicnic_id($clinic_id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('assigned_clinics', 'users.id = assigned_clinics.employer_id');
        $this->db->where('assigned_clinics.clinic_id',$clinic_id);
        
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    /// get assigned video clinics
    public function get_vid_assigned_clinics($vid_id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('assigned_videos', 'users.id = assigned_videos.assigned_to');
        $this->db->where('assigned_videos.video_id',$vid_id);
        $this->db->where('users.type','Clinic');
        
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    /// get assigned video employers
    public function get_vid_assigned_emps($vid_id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('assigned_videos', 'users.id = assigned_videos.assigned_to');
        $this->db->where('assigned_videos.video_id',$vid_id);
        $this->db->where('users.type','Employer');
        
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    /// get assigned introduction video employers
    public function get_introduction_vid_assigned_emps($vid_id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('assigned_introduction_videos', 'users.id = assigned_introduction_videos.assigned_to');
        $this->db->where('assigned_introduction_videos.video_id',$vid_id);
        $this->db->where('users.type','Employer');
        
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    ///all clinics for video not assigned
    public function get_all_clinic_not_assigned_vid($vid_id){

        $SQL = "SELECT * FROM users
                WHERE NOT EXISTS (SELECT * FROM assigned_videos
                WHERE assigned_videos.assigned_to = users.id AND assigned_videos.video_id = $vid_id)
                AND type = 'Clinic'";

        $query = $this->db->query($SQL);
        //echo  $this->db->last_query();
        return $query->result_array();

    }
    
    ///all employers for video not assigned
    public function get_all_emp_not_assigned_vid($vid_id){
        $SQL = "SELECT * FROM users
                WHERE NOT EXISTS (SELECT * FROM assigned_videos
                WHERE assigned_videos.assigned_to = users.id AND assigned_videos.video_id = $vid_id)
                AND type = 'Employer'";

        $query = $this->db->query($SQL);
        //echo  $this->db->last_query();
        return $query->result_array();

    }
    
    ///all employers for video not assigned of orientation
    public function get_all_emp_not_assigned_vid_orientation($vid_id){
        $sessid = $this->session->userdata('user_id');
        $SQL = "SELECT * FROM assigned_clinics
                WHERE NOT EXISTS (SELECT * FROM assigned_introduction_videos
                WHERE assigned_introduction_videos.assigned_to = assigned_clinics.id AND assigned_introduction_videos.video_id = $vid_id)
                AND assigned_clinics.clinic_id = $sessid";

        $query = $this->db->query($SQL);
        //echo  $this->db->last_query();
        return $query->result_array();

    }
    
     public function assign_to_user($data){

	   /*echo "<pre>";print_r($data);exit;*/
        $this->db->insert('assigned_videos',$data);
        return true;

    }
    
    public function assign_intr_vid($data){

	   /*echo "<pre>";print_r($data);exit;*/
        $this->db->insert('assigned_introduction_videos',$data);
        return true;

    }
    
    /// get assigned employers by clinic
    public function get_all_clinics_for_admin(){

        $this->db->select('*');
        $this->db->from('assigned_clinics');
        $this->db->join('users', 'users.id = assigned_clinics.clinic_id', 'right');
        $this->db->where('users.type', 'clinic');
        $this->db->group_by('assigned_clinics.clinic_id'); 
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    /// get assigned clinic data
    public function get_assigned_clinic_data($clinic_id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$clinic_id);
        $query=$this->db->get();
        //echo $this->db->last_query();

        return $query->result_array();
    }
    
    



   //get all packages for admin

    public function get_all_packages_data(){

		$this->db->select('*');

		$this->db->from("packages");

 		$query=$this->db->get();

		return $query->result_array();

    }
    
    
    // insert general employer data
    public function insert_general_employer($data){

	   /*echo "<pre>";print_r($data);exit;*/

        $this->db->insert('injury_form',$data); 

        return true;

    }
    
    // insert general poet data
    public function insert_general_poet($data){

	   /*echo "<pre>";print_r($data);exit;*/

        $this->db->insert('general_poet_form',$data); 

        return true;

    }
    
    // insert Warf form data
    public function insert_warf_data($data){

	   /*echo "<pre>";print_r($data);exit;*/

        $this->db->insert('warf_form',$data); 

        return true;

    }
    
    //update package detail
    public function update_package($data, $package_id){
        $this->db->where('id', $package_id);
        return $this->db->update('packages', $data);
    }

    //insert video
    public function add_video($data){
        $this->db->insert('videos',$data);
        return true;
    }
    //update video
    public function update_video($data,$id){
        $this->db->where('id', $id);
        $this->db->update('videos',$data);
        return true;
    }
    
    //insert introcution video
    public function add_introduction_video($data){
        $this->db->insert('introduction_videos',$data);
        return true;
    }
    
    //get all videos
    public function get_all_videos(){
		$this->db->select('*');
		$this->db->from("videos");
        $this->db->order_by("order", "asc");
		$query=$this->db->get();
		return $query->result_array();
    }
    
    //get vidoe data for edit
    public function get_edit_video($id){
		$this->db->select('*');
		$this->db->from("videos");
        $this->db->where('id', $id);
		$query=$this->db->get();
		return $query->result_array();
    }
    
    //get all videos by clinic
    public function get_all_videos_by_clinic($id){
		$this->db->select('*');
		$this->db->from("videos");
        $this->db->join('assigned_videos', 'videos.id = assigned_videos.video_id');
        $this->db->where('assigned_videos.assigned_to', $id);
        $this->db->order_by("order", "asc");
		$query=$this->db->get();
		return $query->result_array();
    }
    
    //get all videos by employer
    public function get_all_videos_by_emp($id){
		$this->db->select('*');
		$this->db->from("videos");
        $this->db->join('assigned_videos', 'videos.id = assigned_videos.video_id');
        $this->db->where('assigned_videos.assigned_to', $id);
		$query=$this->db->get();
		return $query->result_array();
    }
    
    //get all introduction by videos by employer
    public function get_all_intr_videos_by_emp($id){
		$this->db->select('*');
		$this->db->from("introduction_videos");
        $this->db->join('assigned_introduction_videos', 'introduction_videos.id = assigned_introduction_videos.video_id');
        $this->db->where('assigned_introduction_videos.assigned_to', $id);
		$query=$this->db->get();
		return $query->result_array();
    }
    
    //get all introduction videos
    public function get_introduction_videos(){
		$this->db->select('*');
		$this->db->from("introduction_videos");
        $this->db->where('video_by', $this->session->userdata('user_id'));
        //$this->db->order_by("id", "desc");
		$query=$this->db->get();
		return $query->result_array();
    }

}//end CI_model