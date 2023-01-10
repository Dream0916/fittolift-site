<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){

        parent::__construct();

        //ob_start();

        $this->load->model('Admin_model');

        $this->load->helper(array('form', 'url'));

        //$data['admin_detail'] = $this->Admin_model->get_admin_detail();

        //$admin_email = $data['admin_detail'][0]['email']; 

    }

    //main index

    public function index(){

        if (!$this->session->userdata('logged_in')==1){

            redirect('admin/login');
            exit;
        }

        $data['total_clinic'] = count($this->Admin_model->get_all_clinics());

        $data['total_employers'] = count($this->Admin_model->get_all_employers());
        
        
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

    ///process admin login

    public function admin_login(){

        $email=$this->input->post('email');

        $password= md5($this->input->post('password'));

        $result=$this->Admin_model->admin_login($email,$password);

        // echo '<pre>';print_r($result);exit;

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
            
            {

            $session = $this->session->set_userdata($admindata);

            // echo '<pre>';print_r($this->session->userdata());exit;

            redirect(base_url('admin'));
            exit;

        }else{

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

        $pass2 = $pass1;



        $is_exist = $this->Admin_model->admin_exists($email);

        //echo '<pre>';print_r($is_exist);exit;



        if($is_exist){

         $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'mail.volxom.com',
                'smtp_port' => 26,
                'smtp_user' => 'contact@volxom.com',
                'smtp_pass' => "{;nZ2pfHPy'",
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
            );

            $this->email->set_newline("\r\n");

            $this->email->initialize($config);



            $this->email->from('contact@volxom.com.pk', 'Fit to Lift'); //sender's email

            $subject="Forgot Admin Password - Fit to Lift!";  //subject



            $message= /*-----------email body starts-----------*/



                "This email has been sent as a request to reset your password.<br>

                Use this password to login.<br>

                -------------------------------------------------<br>

                <b>Email   :</b> " . $email . "<br>

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

//                redirect('');

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

        //$this->logout_confirmation();



        redirect('https://www.fittolift.com');

        exit;



    }



    

    /// admin profile

    public function adminProfile(){

        if(!$this->session->userdata('logged_in')==1){

            redirect('admin/login');

            exit;

        }

        $data['admin'] = $this->Admin_model->get_admin_profile_data();

        $this->load->view('admin/admin_profile', $data);



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


        if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {

            $this->load->library('upload', $config);



            if(!$this->upload->do_upload()){

                var_dump( $this->upload->display_errors());exit;

            }



            $image_data = $this->upload->data();



            $img= base_url('/assets/admin-images/'.$image_data['file_name']);



            $data = array(

                'email' => $this->input->post('email'),

                'password' => md5($this->input->post('password')),

                'image' => $img

            );



            $updated = $this->Admin_model->update_admin_profile($data);

            $this->session->set_userdata('image', $img);



            if($updated){

                $this->session->set_flashdata('success','Profile updated successfully!');

            }else{

                $this->session->set_flashdata('error','Something wrong, please try later!');

            }
            
            redirect('admin/adminProfile');
            exit;
            
        }else{
            
            $data = array(

                'email' => $this->input->post('email'),

                'password' => md5($this->input->post('password'))

            );

            //echo '<pre>';print_r($data); exit;

            
            $updated = $this->Admin_model->update_admin_profile($data);



            if($updated){

                $this->session->set_flashdata('success','Profile updated successfully!');

            }else{

                $this->session->set_flashdata('error','Something wrong, please try later!');

            }

            redirect('admin/adminProfile');
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
        $data['all_employers'] = $this->Admin_model->get_all_employers();
        
        //echo  '<pre>';print_r($data['all_employers']);exit;

        $this->load->view('admin/includes/header');
        $this->load->view('admin/users', $data);

    }
    
    //view all employers
    public function employers(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

        $data['users'] = $this->Admin_model->get_all_employers();
        $data['all_employers'] = $this->Admin_model->get_all_employers();
        
        //echo  '<pre>';print_r($data['all_employers']);exit;

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
    
    //view all clinics
    public function clinics(){

        if(!$this->session->userdata('logged_in')==1){
            redirect('admin/login');
            exit;
        }

//        $data['users'] = $this->Admin_model->get_all_clinics();
        //$data['all_employers'] = $this->Admin_model->get_all_employers_not_assigned();
        
        $data['users'] = $this->Admin_model->get_all_clinics_for_admin();
        
        //echo  '<pre>';print_r($data['users']);exit;

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

        
        if($this->session->userdata('user_type') == 'admin' || $this->session->userdata('user_type') == 'Clinic'){
            $data['wharf_data'] = $this->Admin_model->get_all_wharf_data();
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



    

    /// delete reservations



    function delReservation($id){



        $this->db->where('id', $id);



        $this->db->delete('reservations');



        $this->session->set_flashdata('success','Reservation deleted successfully !');

        redirect('admin/reservations');

        exit;



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
        $this->db->delete('users');
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

        redirect('admin/wharf_data');
        exit;

    }



    

    /// send email to users from reservations by admin



    function email_to_user(){



        $user_id = $this->input->post('id');

        $to_email = $this->input->post('to_email');

        $name = $this->input->post('name');

        $texts = $this->input->post('text');

        $text = strip_tags($texts);
        
        $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'mail.volxom.com',
                'smtp_port' => 26,
                'smtp_user' => 'contact@volxom.com',
                'smtp_pass' => "{;nZ2pfHPy'",
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
            );
        
        $this->email->set_newline("\r\n");

        $this->email->initialize($config);

        $this->email->from('contact@volxom.com', 'Fit to Lift'); //sender's email

        $subject = "Reply - Fit to Lift!";  //subject

        $message = $text;

        /*-----------email body ends-----------*/

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);

        $send = $this->email->send();



        if($send){

            $this->session->set_flashdata('success','Email sent successfully !');

        }else{

            $this->session->set_flashdata('error','There is an error to send email.Pleae try later!');

        }



        redirect('admin/users');

        exit;

    }



    //view all reservations



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
       }else{
           $data['dot'] = $this->input->post('dot');
       }

        //echo '<pre>'; print_r($data); exit;
        
        $insert_poet = $this->Admin_model->insert_general_poet($data);
        
        $employer_data = $this->Admin_model->employer_by_id($this->input->post('employer_id'));
        $admin_data = $this->Admin_model->get_admin();  

            if($insert_poet){
                
            $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'mail.volxom.com',
                'smtp_port' => 26,
                'smtp_user' => 'contact@volxom.com',
                'smtp_pass' => "{;nZ2pfHPy'",
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
            );

            $this->email->set_newline("\r\n");

            $this->email->initialize($config);

            $this->email->from('contact@volxom.com', 'Fit to Lift'); //sender's email
            $subject="General Poet/Fit4D form submission - Fit to Lift!";  //subject

            $message= /*-----------email body starts-----------*/

                "
                -------------------------------------------------<br>

                This email is a notifiction to admin and employer of a General POET / Fit4D - Clinic Reporting Form submission.<br>

                -------------------------------------------------<br>" ;

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
        
        $employer_data = $this->Admin_model->employer_by_id($this->input->post('employer_id'));
        $admin_data = $this->Admin_model->get_admin();  

            if($insert_poet){
                
            $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'mail.volxom.com',
                'smtp_port' => 26,
                'smtp_user' => 'contact@volxom.com',
                'smtp_pass' => "{;nZ2pfHPy'",
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
            );

            $this->email->set_newline("\r\n");

            $this->email->initialize($config);

            $this->email->from('contact@volxom.com', 'Fit to Lift'); //sender's email
            $subject="General Injury form submission - Fit to Lift!";  //subject

            $message= /*-----------email body starts-----------*/

                "
                -------------------------------------------------<br>

                This email is a notifiction to admin and employer of a Clinical Injury Reporting Form submission.<br>

                -------------------------------------------------<br>" ;

                /*-----------email body ends-----------*/
                
              $this->email->to($employer_data[0]['email']);
              //$this->email->cc($admin_data[0]['email']);
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
    
    
    
    //insert general employer
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
        
        $employer_data = $this->Admin_model->employer_by_id($this->input->post('employer_id'));
        $admin_data = $this->Admin_model->get_admin();  

            if($insert_poet){
                
            $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'mail.volxom.com',
                'smtp_port' => 26,
                'smtp_user' => 'contact@volxom.com',
                'smtp_pass' => "{;nZ2pfHPy'",
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
            );

            $this->email->set_newline("\r\n");

            $this->email->initialize($config);

            $this->email->from('contact@volxom.com.pk', 'Fit to Lift'); //sender's email
            $subject="Category - POET / FfD Form submission - Fit to Lift!";  //subject

            $message= /*-----------email body starts-----------*/

                "
                -------------------------------------------------<br>

                This email is a notifiction to admin and employer of a Category - POET / FfD Form Data submission.<br>

                -------------------------------------------------<br>" ;

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
    }//end insertion general employer
    
    ///general employer Form
    public function general_employer(){

        if(!$this->session->userdata('logged_in')==1){ 
            redirect('admin/login');
            exit;
        }

        $this->load->view('admin/includes/header');
        $this->load->view('admin/general_employer');

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

    

    //Insert pakcage from admin

    function insert_package(){

        

		//echo '<pre>';print_r($_FILES);exit;

		

		if($this->input->post('free_drinks')){

			$freed_drinks = 1;

		}else{

			$freed_drinks = 0;

		}

		

		if($this->input->post('security_drivers')){

			$security_drivers = 1;

		}else{

			$security_drivers = 0;

		}

		

	   if($this->input->post('fuel')){

			$fuel = 1;

		}else{

			$fuel = 0;

		}

		

		if($this->input->post('toll_tax')){

			$toll_tax = 1;

		}else{

			$toll_tax = 0;

		}

		

		if($this->input->post('waiting_hour')){

			$waiting_hour = 1;

		}else{

			$waiting_hour = 0;

		}

		

		if($this->input->post('picku_benefit')){

			$picku_benefit = 1;

		}else{

			$picku_benefit = 0;

		}

        

        

        //echo '<pre>';print_r($data);exit;

        

        $config = array(

            'upload_path' =>'assets/uploads/',

            'allowed_types' => "gif|jpg|png|jpeg",

            'overwrite' => TRUE,

            'max_size' => "3000",

            'max_height' => "3000",

            'max_width' => "3000"

        );



        if (isset($_FILES['upload_img']) && is_uploaded_file($_FILES['upload_img']['tmp_name'])) {

            $this->load->library('upload', $config);



            if(!$this->upload->do_upload('upload_img')){

                var_dump( $this->upload->display_errors());exit;

            }



            $image_data = $this->upload->data();

		    $img_upload = $image_data['file_name'];

          

            $img= base_url('/assets/uploads/'.$img_upload);

			

			$data = array(

				'title'   	        => $this->input->post('title'),

				'price'             => $this->input->post('price'),

                'waiting_price'     => $this->input->post('waiting_price'),

				'call_us'           => $this->input->post('call_us'),

				'email'             => $this->input->post('email'),

				'website'           => $this->input->post('website'),

				'facebook'          => $this->input->post('facebook'),

				'twitter'           => $this->input->post('twitter'),

				'free_drinks'      	=> $freed_drinks,

				'security_drivers'  => $security_drivers,

				'fuel'              => $fuel,	

				'toll_tax'          => $toll_tax,

				'waiting_hour'      => $waiting_hour,

				'picku_benefit'     => $picku_benefit,

				'description'       => $this->input->post('description'),

				'img_file'          => $img

			);

            

            ///enter dyanmic extra values

            $field_extra_array = $this->input->post('extra_field');



            $i = 1;

            foreach($field_extra_array as $value){

                $data['extra_pkg_'.$i] = $value;

                $i++;

            }

            //echo '<pre>';print_r($data);exit;

            

			$insert_packages = $this->Admin_model->insert_packages_data($data);

            if($insert_packages){



                $this->session->set_flashdata('success','Record inserted successfully!');

				redirect('admin/addPackage');

				exit;

            }else{



                $this->session->set_flashdata('error','Something wrong, please try later!');

				redirect('admin/addPackage');

				exit;

            }



		}else{

				$this->session->set_flashdata('error','Please upload package image!');

				redirect('admin/addPackage');

				exit;

		}

	

   }//insert_package





 //view all Packages



    public function packages(){

        if(!$this->session->userdata('logged_in')==1){

            redirect('admin/login');

            exit;

        }

        

        $data['packages'] = $this->Admin_model->get_all_packages_data();



        $this->load->view('admin/includes/header');

        $this->load->view('admin/packages', $data);



    }



    

    /// delete packages



    function delpackages($id){



        $this->db->where('id', $id);

        $this->db->delete('packages');



        $this->session->set_flashdata('success','Contact email deleted successfully !');

        redirect('admin/packages');

        exit;

    }



    //Show Edit package page

    public function editPackage(){

        if(!$this->session->userdata('logged_in')==1){

            redirect('admin/login');

            exit;

        }

        

        $id = $this->uri->segment(3);

        $data['package'] = $this->Admin_model->get_package_by_id($id);

        //echo '<pre>';print_r($data);exit;

        

        $this->load->view('admin/includes/header');

        $this->load->view('admin/edit_package', $data);

    }

    

    //// Edit Package Function

    public function edit_package(){



        //echo '<pre>';print_r($this->session->userdata); exit;

        $config = array(

            'upload_path'   =>'assets/uploads/',

            'allowed_types' => "gif|jpg|png|jpeg",

            'overwrite'     => TRUE,

            'max_size'      => "0", 

            'max_height'    => "0",

            'max_width'     => "0"

        );

        

        $package_id = $this->input->post('package_id');

        

        if($this->input->post('free_drinks')){

			$freed_drinks = 1;

		}else{

			$freed_drinks = 0;

		}

		

		if($this->input->post('security_drivers')){

			$security_drivers = 1;

		}else{

			$security_drivers = 0;

		}

		

	   if($this->input->post('fuel')){

			$fuel = 1;

		}else{

			$fuel = 0;

		}

		

		if($this->input->post('toll_tax')){

			$toll_tax = 1;

		}else{

			$toll_tax = 0;

		}

		

		if($this->input->post('waiting_hour')){

			$waiting_hour = 1;

		}else{

			$waiting_hour = 0;

		}

		

		if($this->input->post('picku_benefit')){

			$picku_benefit = 1;

		}else{

			$picku_benefit = 0;

		}

        

        if (isset($_FILES['upload_img']) && is_uploaded_file($_FILES['upload_img']['tmp_name'])) {



            $this->load->library('upload', $config);



            if(!$this->upload->do_upload('upload_img')){

                var_dump( $this->upload->display_errors());exit;

            }



            $image_data = $this->upload->data();



            $img= base_url('/assets/uploads/'.$image_data['file_name']);



            $data = array(

				'title'   	        => $this->input->post('title'),

				'price'             => $this->input->post('price'),

                'waiting_price'     => $this->input->post('waiting_price'),

				'call_us'           => $this->input->post('call_us'),

				'email'             => $this->input->post('email'),

				'website'           => $this->input->post('website'),

				'facebook'          => $this->input->post('facebook'),

				'twitter'           => $this->input->post('twitter'),

				'free_drinks'      	=> $freed_drinks,

				'security_drivers'  => $security_drivers,

				'fuel'              => $fuel,	

				'toll_tax'          => $toll_tax,

				'waiting_hour'      => $waiting_hour,

				'picku_benefit'     => $picku_benefit,

				'description'       => $this->input->post('description'),

				'img_file'          => $img

			);

            ///enter dyanmic extra values

            $field_extra_array = $this->input->post('extra_field');



            $i = 1;

            foreach($field_extra_array as $value){

                $data['extra_pkg_'.$i] = $value;

                $i++;

            }    

            

            $updated = $this->Admin_model->update_package($data, $package_id);

            if($updated){

                $this->session->set_flashdata('success','Package updated successfully!');

            }else{

                $this->session->set_flashdata('error','Something wrong, please try later!');

            }



            redirect('admin/packages/');

            exit;



        }else{



            $data = array(

				'title'   	        => $this->input->post('title'),

				'price'             => $this->input->post('price'),

                'waiting_price'     => $this->input->post('waiting_price'),

				'call_us'           => $this->input->post('call_us'),

				'email'             => $this->input->post('email'),

				'website'           => $this->input->post('website'),

				'facebook'          => $this->input->post('facebook'),

				'twitter'           => $this->input->post('twitter'),

				'free_drinks'      	=> $freed_drinks,

				'security_drivers'  => $security_drivers,

				'fuel'              => $fuel,	

				'toll_tax'          => $toll_tax,

				'waiting_hour'      => $waiting_hour,

				'picku_benefit'     => $picku_benefit,

				'description'       => $this->input->post('description')

			);

            

            ///enter dyanmic extra values

            $field_extra_array = $this->input->post('extra_field');



            $i = 1;

            foreach($field_extra_array as $value){

                $data['extra_pkg_'.$i] = $value;

                $i++;

            }

            

            //echo '<pre>';print_r($data); exit;



            $updated = $this->Admin_model->update_package($data, $package_id);

            if($updated){

                $this->session->set_flashdata('success','Package updated successfully!');

            }else{

                $this->session->set_flashdata('error','Something wrong, please try later!');

            }



            redirect('admin/packages/');

            exit;

        }



    }///end edit package





}
}//end class