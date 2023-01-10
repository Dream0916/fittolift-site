<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        ob_start();

        $this->load->model('Admin_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
        $this->load->library('session');
        //$data['admin_detail'] = $this->Admin_model->get_admin_detail();

        //$admin_email = $data['admin_detail'][0]['email']; 

    }

    //main index

    public function index(){

        if (!$this->session->userdata('logged_in')==1){

            redirect('admin/login');
            exit;
        }
        $data['total_clinic'] = count($this->Admin_model->get_clinics_counter());
        $data['total_employers'] = count($this->Admin_model->get_employers_counter());
        $data['total_ftd_warf'] = count($this->Admin_model->get_all_wharf_data());
        $data['total_poet_data'] = count($this->Admin_model->get_all_poet_data());
        $data['total_injury_data'] = count($this->Admin_model->get_all_injury_data());
        $data['total_videos'] = count($this->Admin_model->get_videos_counter());

        $user_id = $this->uri->segment(3);
        if(empty($user_id)){
            $data['user_data'] = $this->Admin_model->get_admin_profile_data($this->session->userdata('user_id'));
        }else{
            $data['user_data'] = $this->Admin_model->get_admin_profile_data($user_id);
        }
        //echo '<pre>';print_r($data['user_data']);exit;
        
        $data['clinic_employers'] = count($this->Admin_model->get_clinic_employers($this->session->userdata('user_id')));
        $data['clinic_injury_records'] = count($this->Admin_model->get_clinic_injury_record($this->session->userdata('user_id')));
        $data['clinic_poet_records'] = count($this->Admin_model->get_clinic_poet_record($this->session->userdata('user_id')));
        
        $data['emp_injury_records'] = count($this->Admin_model->get_emp_injury_record($this->session->userdata('user_id')));
        $data['emp_poet_records'] = count($this->Admin_model->get_emp_poet_record($this->session->userdata('user_id')));

        //$data['total_employees'] = count($this->Admin_model->get_all_packages());

		$this->load->view('admin/includes/header');
        $this->load->view('admin/index', $data);

	}

    ///login controller

    public function login(){

        //$this->load->view('admin/includes/header');

        $this->load->view('admin/login');

        //$this->load->view('admin/includes/footer');

    }

    public function table(){
        $this->load->view('admin/table');
    }
    ///process admin login

    public function admin_login(){

        $email=$this->input->post('email');

        $password= md5($this->input->post('password'));

        $result=$this->Admin_model->admin_login($email,$password);

        //echo '<pre>';print_r($result);exit;

        if($result){

            $admindata = array(

                'user_id'        => $result[0]->id,
                'username'  => $result[0]->username,
                'user_email'     => $result[0]->email,
                'user_type'     => 'admin',
                'image'     => $result[0]->image,
                'logged_in'      => 1

            );

            if($admindata['logged_in'] == 1)
            
            {//echo 'yes';exit;

            $session = $this->session->set_userdata($admindata);

            // echo '<pre>';print_r($this->session->userdata());exit;

            redirect(base_url('/admin'));
            exit; 

        }else{
                //echo 'no';exit;
            $this->session->set_flashdata('error', 'Invalid Credentials!');

            redirect('admin/login');
            exit;

        }
        
    }else{
        $this->session->set_flashdata('error', 'Invalid Credentials!');

        redirect('admin/login');
        exit;
    }
}
    
    ///Admin fortgot password

    public function admin_forgot_pwd(){
        $email = $this->input->post('email');
        $pass1 = mt_rand( 10000000, 99999999);
        $pass2 = md5($pass1);
        $is_exist = $this->Admin_model->admin_exists($email);
        //echo '<pre>';print_r($is_exist);exit;
        if($is_exist){
            $config = Array(
                    'protocol' => 'SMTP',
                    'smtp_host' => 'box675.bluehost.com',
                    'smtp_port' => 465,
                    'smtp_user' => $from_email,
                    'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                    'smtp_timeout' => '4',
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'wordwrap'   => TRUE
            );
        
            $this->email->set_newline("\r\n");
            $this->email->initialize($config);

            $this->email->from('admin@fittolift.com', 'Fit to Lift');

            $subject="Forgot Admin Password - Fit to Lift!";  //subject

            $message= /*-----------email body starts-----------*/

                "This email has been sent as a request to reset your password.<br>
                Copy password to login and reset new password in profile settings.<br>
                <span style='color:red;'>You must change your password to a new strong one otherwise your account will be deactivated within next 24 hours.</span><br>
                -------------------------------------------------<br>
                <b>Eamil   :</b> " . $email . "<br>
                <b>Password   :</b> " . $pass1 . "<br>
                -------------------------------------------------<br>" ;

                /*-----------email body ends-----------*/

              $this->email->to($email);
              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->send();  

                //if ($this->email->send()){

                $update = $this->Admin_model->update_password($email, $pass2);

                $this->session->set_flashdata('success','New Password has been emailed to you !');
                redirect('admin/login');
                exit;

//            }else{
//                //error
//                $this->session->set_flashdata('error','There is error in sending mail! Please try again later!');
//                redirect('/');
//            }


        }else{
              $this->session->set_flashdata('error','You are not Admin!!!');
              redirect('admin/login');
              exit;
        }

    }

    ///Log out
    public function logout(){
        $user_data = $this->session->all_userdata();
        //echo '<pre>';print_r($user_data);exit;
        $this->session->unset_userdata($user_data );
        $this->session->sess_destroy();
        redirect('https://www.fittolift.com');
        exit;
    }

    /// admin profile
    public function adminProfile(){
        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        $user_id = $this->uri->segment(3);
        if($this->session->userdata('user_type') == 'Employer' || $this->session->userdata('user_type') == 'Clinic'){
            
              if($user_id=!$this->session->userdata('user_id')){redirect('admin');exit;}
          }
        if(empty($user_id)){
            $data['admin'] = $this->Admin_model->get_admin_profile_data($this->session->userdata('user_id'));
        }else{
            $data['admin'] = $this->Admin_model->get_admin_profile_data($user_id);
        }
        $this->load->view('admin/admin_profile', $data);

    }
    
    /// send email mesage to all users
    public function sendEmail(){
        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $data['users'] = $this->Admin_model->get_all_users();
        $this->load->view('admin/email_to_all', $data);

    }

    //// Edit admin profile
    public function edit_admin(){
        //echo '<pre>';print_r($this->session->userdata); exit;
        $config = array(
            'upload_path' =>'assets/admin-images/',
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "0", 
            'max_height' => "0",
            'max_width' => "0"
        );

        $user_id= $this->input->post('id');
        if($this->input->post('dr_name')==''){$dr_name='Nill';}else{$dr_name=$this->input->post('dr_name');}
        if($this->input->post('clinic_name')==''){$clinic_name='Nill';}else{$clinic_name=$this->input->post('clinic_name');}
        if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload()){
                var_dump( $this->upload->display_errors());exit;
            }
            $image_data = $this->upload->data();
            $img= base_url('/assets/admin-images/'.$image_data['file_name']);
            $data = array(
                'id' =>$user_id,
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'image' => $img,
                'dr_name' => $dr_name,
                'clinic_name' => $clinic_name,
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zip_code' => $this->input->post('zip_code')
            );
            $updated = $this->Admin_model->update_admin_profile($data);
            $this->session->set_userdata('image', $img);

            if($updated){
                $this->session->set_flashdata('success','Profile updated successfully!');
            }else{
                $this->session->set_flashdata('error','Something wrong, please try later!');
            }
            if($user_id){
                redirect('admin/adminProfile/'.$user_id);
            }else{
                redirect('admin/adminProfile');
            }
            exit;
            
        }else{
            $data = array(
                'id' =>$user_id,
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'dr_name' => $dr_name,
                'clinic_name' => $clinic_name,
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zip_code' => $this->input->post('zip_code')
            );
            //echo '<pre>';print_r($data); exit;

            $updated = $this->Admin_model->update_admin_profile($data);

            if($updated){
                $this->session->set_flashdata('success','Profile updated successfully!');
            }else{
                $this->session->set_flashdata('error','Something wrong, please try later!');
            }
            if($user_id){
                redirect('admin/adminProfile/'.$user_id);
            }else{
                redirect('admin/adminProfile');
            }
            exit;
        }

    }//end edit admin profile


    //view all users
    public function users(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $data['users'] = $this->Admin_model->get_all_users();
        $data['all_employers'] = $this->Admin_model->get_employers_counter();
        
        //echo  '<pre>';print_r($data['all_employers']);exit;

        $this->load->view('admin/includes/header');
        $this->load->view('admin/users', $data);

    }
    public function get_all_employers(){

		$this->db->select('*');
		$this->db->from("users");
        $this->db->where('type', 'Employer');

        //$this->db->order_by("id", "desc");

		$query=$this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();

    }
    //view all employers
    public function employers($rowno=0){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        
        $this->db->select('*');
		$this->db->from("users");
        $this->db->where('type', 'Employer');
		$query=$this->db->get();
		$total = $query->result_array();
//      pagination settings
        $config['base_url'] = site_url('admin/employers');
        $config['total_rows'] = count($total);
        $config['per_page'] = "15";
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<p><ul class="pagination">';
        $config['full_tag_close'] = '</ul></p><!--pagination-->';
        //Customizing the First Link
        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        //Customizing the Last Link
        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        //Customizing the "Next" Link
        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        //Customizing the "Previous" Link
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        //Customizing the "Current Page" Link
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></li>";
        //Customizing the "Digit" Link
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //echo '<pre>';print_r($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // fetch employees list
        $data['users'] = $this->Admin_model->get_all_employers($config["per_page"], $data['page'], NULL);       
        // create pagination links
        $data['pagination'] = $this->pagination->create_links();
        $data['total'] = $config['total_rows'];
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/employers', $data);

    }
    
    function searchEmployers()
    {
        // get search string
        $search = ($this->input->post("username"))? $this->input->post("username") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("admin/searchEmployers/$search");
        $config['total_rows'] = $this->Admin_model->get_employers_count($search);
        $config['per_page'] = "15";
        $config["uri_segment"] = 4;
        //$choice = $config["total_rows"]/$config["per_page"];
        //$config["num_links"] = floor($choice);

        // integrate bootstrap pagination
         // integrate bootstrap pagination
        $config['full_tag_open'] = '<p><ul class="pagination">';
        $config['full_tag_close'] = '</ul></p><!--pagination-->';
        //Customizing the First Link
        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        //Customizing the Last Link
        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        //Customizing the "Next" Link
        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        //Customizing the "Previous" Link
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        //Customizing the "Current Page" Link
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></li>";
        //Customizing the "Digit" Link
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['users'] = $this->Admin_model->get_all_employers($config["per_page"], $data['page'], $search);       
        // create pagination links
        $data['pagination'] = $this->pagination->create_links();
        $data['total'] = $config['total_rows'];
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/employers', $data);
    }
  
    
    //assing emp to clinic
    public function assign_to_clinic(){
        
        $data = array(
            'clinic_id' => $this->input->post('clinic_id'),
            'employer_id' => $this->input->post('assigned_employers')
        );

        $inserted = $this->Admin_model->assign_to_clinic($data);

        if($inserted){
            $this->session->set_flashdata('success','Employer has been assigned to this clicnic!');
        }else{
            $this->session->set_flashdata('error','Something wrong, please try later!');
        }
        
        redirect('admin/clinics');
        exit;
        
    }
    
    public function clinics($rowno=0){
        //pagination settings
        $this->db->select('*');
		$this->db->from("users");
        $this->db->where('type', 'Clinic');
		$query=$this->db->get();
		$total = $query->result_array();
        
        $config['base_url'] = site_url('admin/clinics');
        //$config['total_rows'] = $this->db->where('type', 'Clinic')->count_all('users');
        $config['total_rows'] = count($total);
        $config['per_page'] = "15";
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
//        $config["uri_segment"] = 3;
//        $choice = $config["total_rows"]/$config["per_page"];
//        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<p><ul class="pagination">';
        $config['full_tag_close'] = '</ul></p><!--pagination-->';
        //Customizing the First Link
        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        //Customizing the Last Link
        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        //Customizing the "Next" Link
        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        //Customizing the "Previous" Link
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        //Customizing the "Current Page" Link
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></li>";
        //Customizing the "Digit" Link
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //echo '<pre>';print_r($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // fetch employees list
        $data['users'] = $this->Admin_model->get_all_clinics($config["per_page"], $data['page'], NULL);       
        // create pagination links
        $data['pagination'] = $this->pagination->create_links();
        $data['total'] = $config['total_rows'];
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/clinics', $data);
    }
    
    function searchClinic()
    {
        // get search string
        $search = ($this->input->post("username"))? $this->input->post("username") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("admin/searchClinic/$search");
        $config['total_rows'] = $this->Admin_model->get_clinics_count($search);
        $config['per_page'] = "15";
        $config["uri_segment"] = 4;
        //$choice = $config["total_rows"]/$config["per_page"];
        //$config["num_links"] = floor($choice);

        // integrate bootstrap pagination
         // integrate bootstrap pagination
        $config['full_tag_open'] = '<p><ul class="pagination">';
        $config['full_tag_close'] = '</ul></p><!--pagination-->';
        //Customizing the First Link
        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        //Customizing the Last Link
        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        //Customizing the "Next" Link
        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        //Customizing the "Previous" Link
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        //Customizing the "Current Page" Link
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></li>";
        //Customizing the "Digit" Link
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['users'] = $this->Admin_model->get_all_clinics($config["per_page"], $data['page'], $search);       
        // create pagination links
        $data['pagination'] = $this->pagination->create_links();
        $data['total'] = $config['total_rows'];
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/clinics', $data);
    }
  
    
    //view of employere dashobard clinic
    public function clinic(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $data['emp_clinic'] = $this->Admin_model->get_assigned_emp_by_clicnic($this->session->userdata('user_id'));
        
        //echo  '<pre>';print_r($data['emp_clinic']);exit;
        
        //echo  '<pre>';print_r($data['all_employers']);exit;

        $this->load->view('admin/includes/header');
        $this->load->view('admin/employer_clinic', $data);

    }
    
    //view all injury form data
    public function injury_data(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        
        if($this->session->userdata('user_type') == 'admin'){
            $data['injury_data'] = $this->Admin_model->get_all_injury_data();
        }
        
        if($this->session->userdata('user_type') == 'Clinic' || $this->session->userdata('user_type') == 'Employer'){
            $data['injury_data'] = $this->Admin_model->get_injury_data_by_clinic($this->session->userdata('user_id'));
            
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/injury_data', $data);

    }
    
    //view all poet form data
    public function poet_data(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        
        if($this->session->userdata('user_type') == 'admin'){
            $data['injury_data'] = $this->Admin_model->get_all_poet_data();
        }
        
        if($this->session->userdata('user_type') == 'Clinic' || $this->session->userdata('user_type') == 'Employer'){
            $data['injury_data'] = $this->Admin_model->get_poet_data_by_clinic($this->session->userdata('user_id'));
            //echo '<pre>';print_r($data['injury_data']);exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/poet_data', $data);

    }
    
    //view all Wharf form data
    public function ftd_data(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        
        if($this->session->userdata('user_type') == 'admin'){
            $data['wharf_data'] = $this->Admin_model->get_all_wharf_data();
        }
        
        if($this->session->userdata('user_type') == 'Clinic' || $this->session->userdata('user_type') == 'Employer'){
            $data['wharf_data'] = $this->Admin_model->get_wharf_data_by_clinic($this->session->userdata('user_id'));
            //echo '<pre>';print_r($data['injury_data']);exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/wharf_data', $data);

    }
    
    
    public function reservations(){

        if(!$this->session->userdata('logged_in')==1){

            redirect('admin/login');

            exit;

        }

        

        $data['reservations'] = $this->Admin_model->get_all_reservations();

        $this->load->view('admin/includes/header');
        $this->load->view('admin/reservations', $data);
    }
    
    
    function clinic_inactive($id){

        $this->db->set('status', '0');
        $this->db->where('id', $id);
        $this->db->update('users');
        $this->session->set_flashdata('success','Clinic in-active successfully !');

        redirect('admin/clinics');
        exit;

    }
    function clinic_active($id){

        $this->db->where('id', $id);
        $this->db->set('status', 1);
        $this->db->update('users');
        $this->session->set_flashdata('success','Clinic activated successfully !');

        redirect('admin/clinics');
        exit;

    }
    
    function emp_inactive($id){

        $this->db->set('status', '0');
        $this->db->where('id', $id);
        $this->db->update('users');
        $this->session->set_flashdata('success','Clinic in-active successfully !');

        redirect('admin/employers');
        exit;

    }
    function emp_active($id){

        $this->db->where('id', $id);
        $this->db->set('status', 1);
        $this->db->update('users');
        $this->session->set_flashdata('success','Clinic activated successfully !');

        redirect('admin/employers');
        exit;

    }
    function emp_unassign($id){

        $this->db->where('id', $id);
        $this->db->delete('assigned_clinics');
        $this->session->set_flashdata('success','Employer un-assigned successfully !');

        redirect('admin/clinics');
        exit;

    }
    
    function delUser($id){

        $this->db->where('id', $id);
        $del = $this->db->delete('users');
        if($del){
            $this->db->where('employer_id', $id);
            $this->db->delete('injury_form');
        }
        if($del){
            $this->db->where('employer_id', $id);
            $this->db->delete('general_poet_form');
        }
        if($del){
            $this->db->where('employer_id', $id);
            $this->db->delete('warf_form');
        }
        
        $this->session->set_flashdata('success','User deleted successfully !');

        redirect('admin/users');
        exit;

    }
    
    ///delete injury data
    function delInjurydata($id){

        $this->db->where('id', $id);
        $this->db->delete('injury_form');
        $this->session->set_flashdata('success','Record deleted successfully !');

        redirect('admin/injury_data');
        exit;

    }
    
    ///delete poet data
    function delPoetdata($id){

        $this->db->where('id', $id);
        $this->db->delete('general_poet_form');
        $this->session->set_flashdata('success','Record deleted successfully !');

        redirect('admin/poet_data');
        exit;

    }
    
    ///delete poet data
    function delwharfdata($id){

        $this->db->where('id', $id);
        $this->db->delete('warf_form');
        $this->session->set_flashdata('success','Record deleted successfully !');

        redirect('admin/ftd_data');
        exit;

    }
    
    /// send email to all users at once from admin 
    
    /// send email to users from reservations by admin
    function email_to_all(){

        //$user_id = $this->input->post('id');
        
        $from_email = $this->input->post('from_email');
        $email_select = $this->input->post('email_select');
        
        if($email_select == 'To All Clinics'){
            $all_clinics = $this->Admin_model->get_clinics_counter();
            foreach($all_clinics as $emails){
                 $mails[] = $emails['email'];
                
            }
            
        }
        if($email_select=='To All Employers'){
            $all_employers = $this->Admin_model->get_employers_counter();
            foreach($all_employers as $emails){
                $mails[] = $emails['email'];
            }
        }
        if($email_select=='To All Users'){
            $all_users = $this->Admin_model->get_all_users();
            foreach($all_users as $emails){
                $mails[] = $emails['email'];
            }
        }
        if($email_select=='To Specific User(s)'){
            $mails[] = $this->input->post('to_users');
            //$to_email = rtrim($mails,',');
            //echo '<pre>';print_r($to_email);exit;
        }
        
        $texts = $this->input->post('text');
        $text = strip_tags($texts);
        //echo $to_email;
        $to_email = implode(",", $mails);
        
        $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'box675.bluehost.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
        );
        
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);

        $this->email->from($from_email, 'Fit to Lift');
        $subject = "Reply - Fit to Lift!";  //subject

        $message = "<div class='modal-content' style='background-color: #fff;width: 750px; float: left; font-family: inherit; color:  #716d6e;border: 1px solid #9E9E9E;'>
            <div style='padding: 12px;text-align: center;'>
                <img style='vertical-align: sub;' src='https://www.fittolift.com/assets/images/clinic_logo.png'>
            </div>

            <div class='modal-body'>

                <div style='background-color: rgba(198, 19, 52, 0.2); padding: 18px 30px; padding-bottom: 1px;'>
                    <h3 style='margin: 0;color: #716d6e;line-height: 10px;font-size: 18px;'text-align:center;>
                        <i class='fa fa-info-circle'></i>Message from Admin.</h3>
                    <p> Our goal is Excellence in Prevention of the Ailments we treat.</p>
                </div>

                <div style='margin-top: 15px; display: inline-block;'>
                <div style='padding: 0 0 0 30px;'>";
        $message .= $text; 
        
        $message .= "<div>&nbsp;</div>
                </div></div>

                <div style='color: #fff;background-color: #e3e2e2;border-bottom: none; padding: 10px; padding-left: 14px; float: left;width: 96.8%;text-align: center;'>
                    <h4 style='font-size: 18px; font-weight: 900; text-transform: uppercase;margin:0;color: brown;'>Fit to Lift certified clinic</h4>
                </div>
            </div>
        </div>";
        
        /*-----------email body ends-----------*/

        $this->email->to($to_email);
        $this->email->to('shafiq.mustang@gmail.com,shafiq_1010@yahoo.com');
        $this->email->subject($subject);
        $this->email->message($message);
        
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_mailtype("html");
        
        $send = $this->email->send();
        if($send){
          $this->session->set_flashdata('success','Email sent successfully !');  
        }else{
            $this->session->set_flashdata('error','Email sending failed !');
        }

        redirect('admin/sendEmail');
        exit;

    }


    /// send email to users from reservations by admin
    function email_to_user(){

        $user_id = $this->input->post('id');
        $to_email = $this->input->post('to_email');
        $from_email = $this->input->post('from_email');
        $name = $this->input->post('name');
        $texts = $this->input->post('text');

        $text = strip_tags($texts);

//        $config = Array(
//                'protocol' => 'SMTP',
//                'smtp_host' => 'mail.fittolift.com',
//                'smtp_port' => 26,
//                'smtp_user' => $from_email,
//                'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
//                'smtp_timeout' => '4',
//                'mailtype'  => 'html',
//                'charset'   => 'utf-8',
//                'wordwrap'   => TRUE
//        );
        
        $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'box675.bluehost.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
        );
        
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);

        $this->email->from($from_email, 'Fit to Lift');
        $subject = "Reply - Fit to Lift!";  //subject

        $message = $text;

        /*-----------email body ends-----------*/

        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_mailtype("html");
        
        $send = $this->email->send();
        
        if($send){
          $this->session->set_flashdata('success','Email sent successfully !');  
        }else{
            $this->session->set_flashdata('error','Email sending failed !');
        }

        redirect('admin');
        exit;

    }

    //view all contact
    public function contactEmails(){

        if(!$this->session->userdata('logged_in')==1){

            redirect('admin/login');
            exit;

        }

        $data['contacts'] = $this->Admin_model->get_all_contacts();

        $this->load->view('admin/includes/header');

        $this->load->view('admin/contacts', $data);

    }


    /// delete reservations

    function delcontacts($id){
        $this->db->where('id', $id);
        $this->db->delete('contact_us');

        $this->session->set_flashdata('success','Contact email deleted successfully !');
        redirect('admin/contactEmails');
        exit;

    }

    ///General Poet Form
    public function general_poet(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/general_poet');

    }
    
     //insert general poet
    public function insert_general_poet()
    {
       //echo  '<pre>';print_r($_POST);exit;
//       $data['employer_id'] = $this->input->post('employer_id');
//        
//       $data['clinic_id'] = $this->input->post('clinic_id');      
//        
//       $data['employer_email_directed'] = $this->input->post('employer_email_directed');
//
//       $data['date_reported'] = $this->input->post('date_reported');
//
//       $data['employee_initials'] = $this->input->post('employee_initials');
//
//       $data['dob'] = $this->input->post('dob');
//
//       $data['lift_waist'] = $this->input->post('lift_waist');
//
//       $data['lift_at_shoulder'] = $this->input->post('lift_at_shoulder');
//
//       $data['lift_above_shoulder'] = $this->input->post('lift_above_shoulder');
//
//       $data['lift_knee'] = $this->input->post('lift_knee');
//
//       $data['lift_floor'] = $this->input->post('lift_floor');
//        
//       $data['sitting'] = $this->input->post('sitting');
//        
//       $data['fit_for_duty'] = $this->input->post('fit_for_duty');     
//
//       $time_reported1 = $this->input->post('timing1');
//       $time_reported2 = $this->input->post('timing2');
//       $time_reported3 = $this->input->post('timing3');
//       $data['timing'] = $time_reported1.':'.$time_reported2.' '.$time_reported3;
//        
//       $data['drug_test'] = $this->input->post('drug_test');
        
        
        $data['clinic_id'] = $this->input->post('clinic_id');
        
       $data['employer_id'] = $this->input->post('employer_id');    
        
       $data['emp_email'] = $this->input->post('emp_email');
        
       $data['emp_location'] = $this->input->post('emp_location');
        
       $data['first_name'] = $this->input->post('first_name');
        
       $data['last_name'] = $this->input->post('last_name');    
        
       $data['employee_no'] = $this->input->post('employee_no');

       $data['dob'] = $this->input->post('dob');    
       $data['gender'] = $this->input->post('gender');
        
       $data['office_visit'] = $this->input->post('office_visit');    

       $data['date_reported'] = $this->input->post('date_reported');

       if($this->input->post('waist_lift') == 'Other'){
           $data['waist_lift'] = $this->input->post('other_waist_up_field');
       }else{
           $data['waist_lift'] = $this->input->post('waist_lift');
       }        
        
       if($this->input->post('shoulder_lift') == 'Other'){
           $data['shoulder_lift'] = $this->input->post('other_shoulder_lift_field');
       }else{
           $data['shoulder_lift'] = $this->input->post('shoulder_lift');
       } 

       if($this->input->post('shoulder_level') == 'Other'){
           $data['shoulder_level'] = $this->input->post('other_shoulder_level_field');
       }else{
           $data['shoulder_level'] = $this->input->post('shoulder_level');
       }    

       if($this->input->post('knee_lift') == 'Other'){
           $data['knee_lift'] = $this->input->post('other_knee_lift_field');
       }else{
           $data['knee_lift'] = $this->input->post('knee_lift');
       }     

       if($this->input->post('floor_lift') == 'Other'){
           $data['floor_lift'] = $this->input->post('other_floor_lift_field');
       }else{
           $data['floor_lift'] = $this->input->post('floor_lift');
       }     

     
       $data['job_desc'] = $this->input->post('job_desc');

       $data['drug_test'] = $this->input->post('drug_test');
        
       if($this->input->post('physical_demand') == 'Other'){
           $data['physical_demand'] = $this->input->post('other_physical_demand_field');
       }else{
           $data['physical_demand'] = $this->input->post('physical_demand');
       }
        
       if($this->input->post('sitting') == 'Other'){
           $data['sitting'] = $this->input->post('other_sitting_field');
       }else{
           $data['sitting'] = $this->input->post('sitting');
       }
        
       if($this->input->post('climbing') == 'Other'){
           $data['climbing'] = $this->input->post('other_climbing_field');
       }else{
           $data['climbing'] = $this->input->post('climbing');
       }
        
      if($this->input->post('duty') == 'Other'){
           $data['duty'] = $this->input->post('other_duty_field');
       }else{
           $data['duty'] = $this->input->post('duty');
       }    
        
      if($this->input->post('dot') == 'Yes'){
           $data['dot'] = $this->input->post('yes_dot');
      }
      if($this->input->post('dot') == 'Yes1'){
           $data['dot'] = $this->input->post('other_dot_date');
      }
      if($this->input->post('dot') == 'No'){
           $data['dot'] = $this->input->post('other_dot_field');
      }    
        
       $data['doctor_name'] = $this->input->post('doctor_name');    
        

        //echo '<pre>'; print_r($data); exit;
        
        $insert_poet = $this->Admin_model->insert_general_poet($data); 
        
        $clinic_data = $this->Admin_model->employer_by_id($this->input->post('clinic_id'));
        $employer_data = $this->Admin_model->employer_by_id($this->input->post('employer_id'));
        $admin_data = $this->Admin_model->get_admin();
        $emp_name = $employer_data[0]['username'];
        $clinic_name = $clinic_data[0]['clinic_name'];
        $date = date('Y-m-d H:i:s');

        if($insert_poet){
                
            $config = Array(
                    'protocol' => 'SMTP',
                    'smtp_host' => 'box675.bluehost.com',
                    'smtp_port' => 465,
                    'smtp_user' => $from_email,
                    'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                    'smtp_timeout' => '4',
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'wordwrap'   => TRUE
            );
        
            $this->email->set_newline("\r\n");
            $this->email->initialize($config);

            $this->email->from('admin@fittolift.com', 'Fit to Lift');
            $subject="General Poet/Fit4D form submission - Fit to Lift!";  //subject

//            $message= /*-----------email body starts-----------*/
//                "-------------------------------------------------------------------------------------------------------------------------------------<br>
//                
//                Clinic Name :  $clinic_name <br> 
//                Employer Name :  $emp_name <br>               
//                This email is a notifiction to admin and employer of a General POET / Fit4D - Clinic Reporting Form submission.<br>
//                Date : $date <br>
//                Best Regards Fittolift. <br>
//
//                ------------------------------------------------------------------------------------------------------------------------------------<br>" ;
            $message = "<div class='modal-content' style='background-color: #fff;width: 750px; float: left; font-family: inherit; color:  #716d6e;border: 1px solid #9E9E9E;'>
            <div style='padding: 12px;text-align: center;'>
                <img style='vertical-align: sub;' src='https://www.fittolift.com/assets/images/clinic_logo.png'>
            </div>

            <div class='modal-body'>

                <div style='background-color: rgba(198, 19, 52, 0.2); padding: 18px 30px; padding-bottom: 1px;'>
                    <h3 style='margin: 0;color: #716d6e;line-height: 10px;font-size: 18px;'>
                        <i class='fa fa-info-circle'></i> This email is a notifiction to admin and employer.</h3>
                    <p>For General POET / Fit4D - Clinic Reporting Form submission.</p>
                </div>

                <div style='margin-top: 15px; display: inline-block;'>

                    <div style='padding: 0 0 0 30px;'>
                        <h3 style='margin: 0;font-size: 25px;color: #c61334;font-weight: bold; margin-bottom: 20px;'>Location & Date</h3>

                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Clinic Name</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$clinic_name</p>
                        </div>
                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Employer Name</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$emp_name</p>
                        </div>
                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Date</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$date</p>
                        </div>
                    </div>
                    <div class='clearfix'></div>
                </div>

                <div style='color: #fff;background-color: #e3e2e2;border-bottom: none; padding: 10px; padding-left: 14px; float: left;width: 96.8%;text-align: center;'>
                    <h4 style='font-size: 18px; font-weight: 900; text-transform: uppercase;margin:0;color: brown;'>Fit to Lift certified clinic</h4>
                </div>
            </div>
        </div>";

                /*-----------email body ends-----------*/
                
              $this->email->to($employer_data[0]['email']);
              $this->email->cc($admin_data[0]['email']);
              //$this->email->cc($admin_data[0]['email']);
              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->send(); 

                $this->session->set_flashdata('success','Record inserted successfully!');
                redirect('admin/poet_data');
                exit;

            }else{
                $this->session->set_flashdata('error','Something wrong, please try later!');
				redirect('admin/poet_data');
				exit;
            }
    }//end insert general poet
    
    
    
    //insert general employer
    public function insert_general_employer()
    {
       //echo  '<pre>';print_r($_POST);exit;
        
       $data['clinic_id'] = $this->input->post('clinic_id');
       $data['employer_id'] = $this->input->post('employer_id');    
       $data['emp_email'] = $this->input->post('emp_email');
       $data['emp_location'] = $this->input->post('emp_location');
       $data['first_name'] = $this->input->post('first_name');
       $data['last_name'] = $this->input->post('last_name');  
       $data['employee_no'] = $this->input->post('employee_no');
       $data['gender'] = $this->input->post('gender');

//       $data['birth_year'] = $this->input->post('birth_year');
       $data['dob'] = $this->input->post('dob');   
       $data['injury_date'] = $this->input->post('injury_date');
       $data['office_visit'] = $this->input->post('office_visit');
       $data['loss_day'] = $this->input->post('loss_day');
       //$data['visit_type'] = $this->input->post('visit_type');

       $time_reported1 = $this->input->post('time_reported1');
       $time_reported2 = $this->input->post('time_reported2');
       $time_reported3 = $this->input->post('time_reported3');
       $data['time_reported'] = $time_reported1.':'.$time_reported2.' '.$time_reported3;
        
       $time_day1 = $this->input->post('time_day1');
       $time_day2 = $this->input->post('time_day2');
       $time_day3 = $this->input->post('time_day3');
       $data['time_of_day'] = $time_day1.':'.$time_day2.' '.$time_day3;    

       $data['date_dc'] = $this->input->post('date_dc');
       $data['provider_seen'] = $this->input->post('provider_seen');
       $data['treatment'] = $this->input->post('treatment');
       $data['first_aid'] = $this->input->post('first_aid');  
       if($this->input->post('injury_nature') == 'Other'){
           $data['injury_nature'] = $this->input->post('other_nature');
       }else{
           $data['injury_nature'] = $this->input->post('injury_nature');
       }

       $data['injury_cause'] = $this->input->post('injury_cause');

       $area_injured = $this->input->post('area_injured');
        $area_inj = '';
       foreach($area_injured as $area){
           $area_inj .= $area." , ";
           $data['area_injured'] = $area_inj;
       }    
      
       $data['inc_desc'] = $this->input->post('inc_desc');

       //$data['arm_lift'] = $this->input->post('arm_lift');
      
       //$data['near_left'] = $this->input->post('near_left');

       //$data['far_lift'] = $this->input->post('far_lift');

       if($this->input->post('waist_lift') == 'Other'){
           $data['waist_lift'] = $this->input->post('other_waist_up_field');
       }else{
           $data['waist_lift'] = $this->input->post('waist_lift');
       }        
        
       if($this->input->post('shoulder_lift') == 'Other'){
           $data['shoulder_lift'] = $this->input->post('other_shoulder_lift_field');
       }else{
           $data['shoulder_lift'] = $this->input->post('shoulder_lift');
       } 

       if($this->input->post('shoulder_level') == 'Other'){
           $data['shoulder_level'] = $this->input->post('other_shoulder_level_field');
       }else{
           $data['shoulder_level'] = $this->input->post('shoulder_level');
       }    

       if($this->input->post('knee_lift') == 'Other'){
           $data['knee_lift'] = $this->input->post('other_knee_lift_field');
       }else{
           $data['knee_lift'] = $this->input->post('knee_lift');
       }     

       if($this->input->post('floor_lift') == 'Other'){
           $data['floor_lift'] = $this->input->post('other_floor_lift_field');
       }else{
           $data['floor_lift'] = $this->input->post('floor_lift');
       }     

       if($this->input->post('sitting') == 'Other'){
           $data['sitting'] = $this->input->post('other_sitting_field');
       }else{
           $data['sitting'] = $this->input->post('sitting');
       }
        
       if($this->input->post('climbing') == 'Other'){
           $data['climbing'] = $this->input->post('other_climbing_field');
       }else{
           $data['climbing'] = $this->input->post('climbing');
       }
        
      if($this->input->post('duty') == 'Other'){
           $data['duty'] = $this->input->post('other_duty_field');
       }else{
           $data['duty'] = $this->input->post('duty');
       }   
        
        
       if($this->input->post('grip_restrictions') == 'Other'){
           $data['grip_restrictions'] = $this->input->post('other_grip_restrictions_field');
       }else{
           $data['grip_restrictions'] = $this->input->post('grip_restrictions');
       }    
        
       $data['hand_wrist'] = $this->input->post('hand_wrist');
        
       $data['refered_out'] = $this->input->post('refered_out');

       //$data['emp_return'] = $this->input->post('emp_return');

       $data['return_date'] = $this->input->post('return_date');

       $data['next_eval'] = $this->input->post('next_eval');

       $data['dept_no'] = $this->input->post('dept_no');

       $data['dept_name'] = $this->input->post('dept_name');

       $data['dept_manager'] = $this->input->post('dept_manager');

       $data['job_desc'] = $this->input->post('job_desc');

       $data['doctor_name'] = $this->input->post('doctor_name');

       $data['drug_test'] = $this->input->post('drug_test');

        //echo '<pre>'; print_r($data); exit;
        
        $insert_poet = $this->Admin_model->insert_general_employer($data);
        
        $clinic_data = $this->Admin_model->employer_by_id($this->input->post('clinic_id'));
        $employer_data = $this->Admin_model->employer_by_id($this->input->post('employer_id'));
        $admin_data = $this->Admin_model->get_admin();
        $emp_name = $employer_data[0]['username'];
        $clinic_name = $clinic_data[0]['clinic_name'];
        $date = date('Y-m-d H:i:s');

        if($insert_poet){
                
            $config = Array(
                    'protocol' => 'SMTP',
                    'smtp_host' => 'box675.bluehost.com',
                    'smtp_port' => 465,
                    'smtp_user' => $from_email,
                    'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                    'smtp_timeout' => '4',
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'wordwrap'   => TRUE
            );
        
            $this->email->set_newline("\r\n");
            $this->email->initialize($config);

            $this->email->from('admin@fittolift.com', 'Fit to Lift');
            $subject="General Injury form submission - Fit to Lift!";  //subject
            

            $message = "<div class='modal-content' style='background-color: #fff;width: 750px; float: left; font-family: inherit; color:  #716d6e;border: 1px solid #9E9E9E;'>
            <div style='padding: 12px;text-align: center;'>
                <img style='vertical-align: sub;' src='https://www.fittolift.com/assets/images/clinic_logo.png'>
            </div>

            <div class='modal-body'>

                <div style='background-color: rgba(198, 19, 52, 0.2); padding: 18px 30px; padding-bottom: 1px;'>
                    <h3 style='margin: 0;color: #716d6e;line-height: 10px;font-size: 18px;'>
                        <i class='fa fa-info-circle'></i> This email is a notifiction to admin and employer.</h3>
                    <p>For Clinical Injury Reporting Form submission.</p>
                </div>

                <div style='margin-top: 15px; display: inline-block;'>

                    <div style='padding: 0 0 0 30px;'>
                        <h3 style='margin: 0;font-size: 25px;color: #c61334;font-weight: bold; margin-bottom: 20px;'>Location & Date</h3>

                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Clinic Name</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$clinic_name</p>
                        </div>
                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Employer Name</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$emp_name</p>
                        </div>
                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Date</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$date</p>
                        </div>
                    </div>
                    <div class='clearfix'></div>
                </div>

                <div style='color: #fff;background-color: #e3e2e2;border-bottom: none; padding: 10px; padding-left: 14px; float: left;width: 96.8%;text-align: center;'>
                    <h4 style='font-size: 18px; font-weight: 900; text-transform: uppercase;margin:0;color: brown;'>Fit to Lift certified clinic</h4>
                </div>
            </div>
        </div>";
                /*-----------email body ends-----------*/
                
              $this->email->to($employer_data[0]['email']);
              $this->email->cc($admin_data[0]['email']);
              //$this->email->cc($admin_data[0]['email']);
              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->send(); 

                $this->session->set_flashdata('success','Record inserted successfully!');
				redirect('admin/injury_data');
				exit;
            }else{
                $this->session->set_flashdata('error','Something wrong, please try later!');
				redirect('admin/injury_data');
				exit;
            }
    }//end insertion general employer
    
    ///wharf mine Form
    public function ftd_form(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/wharf_mine');

    }
    
    //insert wharf form
    public function insert_warf_form()
    {
       //echo  '<pre>';print_r($_POST);exit;
        
       $data['employer_id'] = $this->input->post('employer_id'); 
       $data['clinic_id'] = $this->input->post('clinic_id');
       $data['emp_email'] = $this->input->post('emp_email');
       $data['emp_location'] = $this->input->post('emp_location');    
       $data['date_reported'] = $this->input->post('date_reported');
        
       $data['employee_no'] = $this->input->post('employee_no');    
        
       $data['first_name'] = $this->input->post('first_name');
       $data['last_name'] = $this->input->post('last_name');        
        
       $data['dob'] = $this->input->post('dob');
       $data['gender'] = $this->input->post('gender');    
        
       $data['initials'] = $this->input->post('initials');
    
       $data['office_visit'] = $this->input->post('office_visit');
    
       $data['job_desc'] = $this->input->post('job_desc');
        
       $data['category_physical'] = $this->input->post('category_physical');
        
       if($this->input->post('duty') == 'Other'){
           $data['duty'] = $this->input->post('other_duty_field');
       }else{
           $data['duty'] = $this->input->post('duty');
       } 

       $time_day1 = $this->input->post('time_day1');
       $time_day2 = $this->input->post('time_day2');
       $time_day3 = $this->input->post('time_day3');
       $data['time'] = $time_day1.':'.$time_day2.' '.$time_day3;    

       $data['drug_test'] = $this->input->post('drug_test');
       $data['doctor_name'] = $this->input->post('doctor_name');    

        //echo '<pre>'; print_r($data); exit;
        
        $insert_poet = $this->Admin_model->insert_warf_data($data);
        
        $clinic_data = $this->Admin_model->employer_by_id($this->input->post('clinic_id'));
        $employer_data = $this->Admin_model->employer_by_id($this->input->post('employer_id'));
        $admin_data = $this->Admin_model->get_admin();
        $emp_name = $employer_data[0]['username'];
        $clinic_name = $clinic_data[0]['clinic_name'];
        $date = date('Y-m-d H:i:s');
                
            $config = Array(
                    'protocol' => 'SMTP',
                    'smtp_host' => 'box675.bluehost.com',
                    'smtp_port' => 465,
                    'smtp_user' => $from_email,
                    'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                    'smtp_timeout' => '4',
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'wordwrap'   => TRUE
            );
        
            $this->email->set_newline("\r\n");
            $this->email->initialize($config);

            $this->email->from('admin@fittolift.com', 'Fit to Lift');
            $subject="Category - POET / FfD Form submission - Fit to Lift!";  //subject

            $message = "<div class='modal-content' style='background-color: #fff;width: 750px; float: left; font-family: inherit; color:  #716d6e;border: 1px solid #9E9E9E;'>
            <div style='padding: 12px;text-align: center;'>
                <img style='vertical-align: sub;' src='https://www.fittolift.com/assets/images/clinic_logo.png'>
            </div>

            <div class='modal-body'>

                <div style='background-color: rgba(198, 19, 52, 0.2); padding: 18px 30px; padding-bottom: 1px;'>
                    <h3 style='margin: 0;color: #716d6e;line-height: 10px;font-size: 18px;'>
                        <i class='fa fa-info-circle'></i> This email is a notifiction to admin and employer.</h3>
                    <p>For Category - POET / FfD Form Data submission.</p>
                </div>

                <div style='margin-top: 15px; display: inline-block;'>

                    <div style='padding: 0 0 0 30px;'>
                        <h3 style='margin: 0;font-size: 25px;color: #c61334;font-weight: bold; margin-bottom: 20px;'>Location & Date</h3>

                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Clinic Name</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$clinic_name</p>
                        </div>
                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Employer Name</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$emp_name</p>
                        </div>
                        <div style='margin-bottom: 22px;'>
                            <span style='float: left;font-size: 17px;'></span>
                            <h4 style='font-size: 14px;font-weight: bold; margin: 0 0 3px 25px;'>Date</h4>
                            <p style='margin-left: 25px;margin-top: 0;font-size: 14px;font-weight: bold;color: #988585;cursor: no-drop;'>$date</p>
                        </div>
                    </div>
                    <div class='clearfix'></div>
                </div>

                <div style='color: #fff;background-color: #e3e2e2;border-bottom: none; padding: 10px; padding-left: 14px; float: left;width: 96.8%;text-align: center;'>
                    <h4 style='font-size: 18px; font-weight: 900; text-transform: uppercase;margin:0;color: brown;'>Fit to Lift certified clinic</h4>
                </div>
            </div>
        </div>";
                /*-----------email body ends-----------*/
                
              $this->email->to($employer_data[0]['email']);
              $this->email->cc($admin_data[0]['email']);
              //$this->email->cc($admin_data[0]['email']);
              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->send(); 

            if($insert_poet){
                $this->session->set_flashdata('success','Record inserted successfully!');
				redirect('admin/ftd_data');
				exit;
            }else{
                $this->session->set_flashdata('error','Something wrong, please try later!');
				redirect('admin/ftd_data');
				exit;
            }
    }//end insertion category employer
    
    ///general employer Form
    public function general_employer(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/general_employer');

    }
    
    ///new video
    public function addVideo(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/add_video');

    }
    
    //insert video
    public function insert_video(){
        
        $data = array(
            'video_by' => $this->input->post('video_by'),
            'video_title' => $this->input->post('video_title'),
            'video_link' => $this->input->post('video_link'),
            'video_description' => $this->input->post('video_description'),
            'order' => $this->input->post('order')
        );

        $inserted = $this->Admin_model->add_video($data);

        if($inserted){
            $this->session->set_flashdata('success','Video has been Added!');
        }else{
            $this->session->set_flashdata('error','Something wrong, please try later!');
        }
        
        redirect('admin/allVideos');
        exit;
        
    }
    
    ///edit video
    public function editVideo($id){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        
        $data['video'] = $this->Admin_model->get_edit_video($id);
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/edit_video',$data);

    }
    
    //update video
    public function update_video(){
        
        $data = array(
            'video_by' => $this->input->post('video_by'),
            'id' => $this->input->post('video_id'),
            'video_title' => $this->input->post('video_title'),
            'order' => $this->input->post('order'),
            'video_description' => $this->input->post('video_description')
        );
        //echo '<pre>';print_r($data);exit;
        $updated= $this->Admin_model->update_video($data,$this->input->post('video_id'));

        if($updated){
            $this->session->set_flashdata('success','Video has been updated!');
        }else{
            $this->session->set_flashdata('error','Something wrong, please try later!');
        }
        
        redirect('admin/allVideos');
        exit;
        
    }
    
    //show videos
    public function allVideos(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        
        $this->db->select('*');
		$this->db->from("videos");
		$query=$this->db->get();
		$total = $query->result_array();
//      pagination settings
        $config['base_url'] = site_url('admin/allVideos');
        $config['total_rows'] = count($total);
        $config['per_page'] = "3";
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<p><ul class="pagination">';
        $config['full_tag_close'] = '</ul></p><!--pagination-->';
        //Customizing the First Link
        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        //Customizing the Last Link
        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        //Customizing the "Next" Link
        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        //Customizing the "Previous" Link
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        //Customizing the "Current Page" Link
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></li>";
        //Customizing the "Digit" Link
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //echo '<pre>';print_r($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
        // create pagination links
        $data['pagination'] = $this->pagination->create_links();
        $data['total'] = $config['total_rows'];
        
        if($this->session->userdata('user_type') == 'admin'){
            $data['video_data'] = $this->Admin_model->get_all_videos($config["per_page"], $data['page']);
        } 
        if($this->session->userdata('user_type') == 'Clinic'){
            $data['video_data'] = $this->Admin_model->get_all_videos_by_clinic($this->session->userdata('user_id'));
            //echo '<pre>';print_r($data['video_data']);exit;
        }
        if($this->session->userdata('user_type') == 'Employer'){
            $data['video_data'] = $this->Admin_model->get_all_videos_by_emp($this->session->userdata('user_id'));
            $data['video_data_intr'] = $this->Admin_model->get_all_intr_videos_by_emp($this->session->userdata('user_id'));
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/all_videos', $data);

    }
    
    //show videos for employer
    public function employerVideos(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }
        
        $data['video_data'] = $this->Admin_model->get_all_videos_by_emp($this->session->userdata('user_id'));
        $data['video_data_intr'] = $this->Admin_model->get_all_intr_videos_by_emp($this->session->userdata('user_id'));
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/all_employer_videos', $data);

    }
    
    //delete videos data
    function delvideo($id){

        $this->db->where('id', $id);
        $this->db->delete('videos');
        $this->session->set_flashdata('success','Video deleted successfully !');

        redirect('admin/allVideos');
        exit;

    }
    
    //assing vidoe to user
    public function assign_vid_to_user(){
        
        $data = array(
            'assigned_by' => $this->input->post('assigned_by'),
            'assigned_to' => $this->input->post('assigned_user'),
            'video_id' => $this->input->post('video_id')
        );

        $inserted = $this->Admin_model->assign_to_user($data);

        if($inserted){
            $this->session->set_flashdata('success','Video has been assigned to this Employer!');
        }else{
            $this->session->set_flashdata('error','Something wrong, please try later!');
        }
        
        redirect('admin/allVideos');
        exit;
    }
    
    
    // Assing video to all employers
    public function assign_vid_toall_emp($vid_id){

        $all_emps = $this->Admin_model->get_employers_counter();
        foreach($all_emps as $emps){
            $emp_id = $emps['id'];
            $data = array(
                'assigned_by' => $this->session->userdata('user_id'),
                'assigned_to' => $emp_id,
                'video_id' => $vid_id
            );
            $inserted = $this->Admin_model->assign_to_user($data);
        }
        
        $this->session->set_flashdata('success','Video has been assigned to all Employers!');
        redirect('admin/allVideos');
        exit;
    }
    
    // Assing video to all Clinics
    public function assign_vid_toall_clinics($vid_id){

        $all_clinics = $this->Admin_model->get_clinics_counter();
        foreach($all_clinics as $emps){
            $emp_id = $emps['id'];
            $data = array(
                'assigned_by' => $this->session->userdata('user_id'),
                'assigned_to' => $emp_id,
                'video_id' => $vid_id
            );
            $inserted = $this->Admin_model->assign_to_user($data);
        }
        
        $this->session->set_flashdata('success','Video has been assigned to all Clinics!');
        redirect('admin/allVideos');
        exit;
    }
    
    function user_unassign($id){

        $this->db->where('id', $id);
        $this->db->delete('assigned_videos');
        $this->session->set_flashdata('success','User un-assigned successfully !');

        redirect('admin/allVideos');
        exit;

    }
    
    
    ///Introduction video by clinic
    public function addYourVideo(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/add_video_clinic');

    }
    
    //insert video
    public function insert_clinic_video(){
        
        $data['video_data'] = $this->Admin_model->get_introduction_videos();
        
        if(count($data['video_data']) == 2){
            $this->session->set_flashdata('error','Sorry! You can add only 2 videos only.');
            redirect('admin/orientationVideos');
            exit;
        }
        
        $data = array(
            'video_by' => $this->input->post('video_by'),
            'video_title' => $this->input->post('video_title'),
            'video_link' => $this->input->post('video_link')
        );

        $inserted = $this->Admin_model->add_introduction_video($data);

        if($inserted){
            $this->session->set_flashdata('success','Your Video has been Added!');
        }else{
            $this->session->set_flashdata('error','Something wrong, please try later!');
        }
        
        redirect('admin/orientationVideos');
        exit;
        
    }
    
    //show videos
    public function orientationVideos(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $data['video_data'] = $this->Admin_model->get_introduction_videos();

        $this->load->view('admin/includes/header');
        $this->load->view('admin/all_intro_videos', $data);

    }
    
    //delete videos data
    function delintroductionvideo($id){

        $this->db->where('id', $id);
        $this->db->delete('introduction_videos');
        $this->session->set_flashdata('success','Introduction Video deleted successfully !');

        redirect('admin/orientationVideos');
        exit;

    }
    
    //assing vidoe to user
    public function assign_int_vid_to_emp(){
        
        $data = array(
            'assigned_by' => $this->input->post('assigned_by'),
            'assigned_to' => $this->input->post('assigned_user'),
            'video_id' => $this->input->post('video_id')
        );

        $inserted = $this->Admin_model->assign_intr_vid($data);

        if($inserted){
            $this->session->set_flashdata('success','Video has been assigned to this Employer!');
        }else{
            $this->session->set_flashdata('error','Something wrong, please try later!');
        }
        
        redirect('admin/orientationVideos');
        exit;
    }
    
    // Assing video to all Clinics
    public function assign_int_vid_to_all_emp($vid_id){

        $all_emp = $this->Admin_model->get_all_emp_not_assigned_vid_orientation($vid_id);
        //echo '<pre>';print_r($all_emp);exit;
        foreach($all_emp as $emps){
            $emp_id = $emps['employer_id'];
            $data = array(
                'assigned_by' => $this->session->userdata('user_id'),
                'assigned_to' => $emp_id,
                'video_id' => $vid_id
            );
            $inserted = $this->Admin_model->assign_intr_vid($data);
        }
        
        $this->session->set_flashdata('success','Video has been assigned to all Employers of this Clinic!');
        redirect('admin/orientationVideos');
        exit;
    }
    
    function emp_vid_unassign($id){

        $this->db->where('id', $id);
        $this->db->delete('assigned_introduction_videos');
        $this->session->set_flashdata('success','Video un-assigned successfully !');

        redirect('admin/orientationVideos');
        exit;

    }

//add clinic form

//    public function clinic(){
//
//        if(!$this->session->userdata('logged_in')==1){
//
//            redirect('admin/login');
//
//            exit;
//
//        }
//
//
//        $this->load->view('admin/includes/header');
//
//        $this->load->view('admin/add_package');
//
//    }
//
//        //add employer form
//
//
//
//    public function employer(){
//
//        if(!$this->session->userdata('logged_in')==1){
//
//            redirect('admin/login');
//
//            exit;
//
//        }
//
//
//        $this->load->view('admin/includes/header');
//
//        $this->load->view('admin/employer');
//
//    }
//
//
//    //add WS form
//
//
//
//    public function WS(){
//
//        if(!$this->session->userdata('logged_in')==1){
//
//            redirect('admin/login');
//
//            exit;
//
//        }
//
//
//        $this->load->view('admin/includes/header');
//
//        $this->load->view('admin/WS');
//
//    }

    

    

}//end class