<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() // to remember use public
    {
        parent::__construct();
        
        // Load database
        $this->load->model('user');
        $this->load->model('Admin_model');
        
        if($this->session->userdata('logged_in')==1){
            redirect('');
        }
    }
    
    
    // Validate and store registration data in database
    public function new_user_registration() {

        // Check validation for user input in SignUp form
        // $this->form_validation->set_rules('username', 'UserName', 'trim|required');
        //$this->form_validation->set_rules('email', 'Email', 'trim|required');
        //$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        //$this->form_validation->set_rules('type', 'Type', 'trim|required');
        // if($this->form_validation->run() == FALSE) {
        //     $this->load->view('includes/header');
        //     $this->load->view('includes/footer');
        // }else{
        
        
            $is_exist =$this->Admin_model->admin_exists($this->input->post('email'));
            if(!empty($is_exist)){
                $this->session->set_flashdata('error', 'oops! This email already exists!');
                redirect("");
                exit;
            }
            
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'type' => $this->input->post('type'),
                'clinic_name' => $this->input->post('clinic_name'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zip_code' => $this->input->post('zip_code'),
                'image' => 'http://volxom.com/projects/clinic/assets/admin-images/no-image.jpg',
                'password_updation_date' => date('Y-m-d'),
                'status' => 0
            );

            // echo '<pre>';print_r($data);exit;
            
            $config = Array(
                'protocol' => 'SMTP',
                'smtp_host' => 'mail.fittolift.com',
                'smtp_port' => 26,
                'smtp_user' => 'admin@fittolift.com',
                'smtp_pass' => "User-1234!", //{;nZ2pfHPy'
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'   => TRUE
            );

            $this->load->library('email', $config); //load email library
            $this->email->set_newline("\r\n");
            
            html_entity_decode($message='<div style="background: #f3f3f3;
            border: 2px solid #0667b3; border-radius: 5px; margin-left:50px; margin-right: 50px; margin-top: 20px; margin-bottom: 20px;">
            <div>
            <div>
            <div style="text-align:center;">
            <h4 style="color: #0667b3;font-size: 18px;text-align: center;/* text-transform: uppercase; */font-weight: bold;border-bottom: 1px solid #bababa;padding-bottom: 15px; padding-top:25px;">
            We are so happy that you chose us! 
            </h4>
            </div>
            <div>
            <p style="padding-left: 60px;padding-top: 25px;padding-bottom: 25px;padding-right: 60px; text-align: center; color: #000;">
            Thank you for registering with Fit to Lift.</br>
            Please verify your email ID below and available all our services.
            </p>
            <p style="text-align: center;">
            <a style="font-size: 14px; background: #ec6733; margin: 15px; color:#fff; text-decoration:none; font-weight: bold;  text-align: center; padding: 15px;" href="'.base_url().'register/verify/'.$this->input->post('email').'">
            VERIFY MY EMAIL</a>
            </p>
            <br>

            </div>
            <div style="padding: 3px; border-top:1px solid #bababa;  "><p style="font-size: 14px; color: #000; text-align: center;">
            Fit to Lift Team

            </p>
            </div>
            </div>
            </div>
            </div>');

            $this->email->from('admin@fittolift.com', 'Fit to Lift'); 
            $this->email->to($this->input->post('email'));
            $this->email->subject('Verify your account'); 
            $this->email->message($message);

            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_mailtype("html");
            
            $this->email->send();
            
            $result = $this->user->registration_insert($data);
            
            if($result){
                $this->session->set_flashdata('success', 'You are successfully registered. Check your email to active your account!');
                redirect('');
                exit;
            }else{
                $this->session->set_flashdata('error', 'oops! please try later for register!');
                redirect("");
                exit;
            }
        }
    
    
    
    ///verify user
    public function verify(){
        $email = $this->uri->segment(3);
        $this->user->update_status($email);
        $this->session->set_flashdata('success', 'You are successfully verified. Please login now!');
        redirect(base_url(''));
        exit;
    }
    
    //check email exist ajax
    public function emailcheck(){
		echo "<pre>";
		$email = $this->input->post('email');
		if($email!='' || $email!=null){
		$user = $this->user->get_email_check($email);

            if(empty($user) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $resp = array('status'=>false /*,'msg'=>'Email Already Exist'/*, 'html'=>$html*/);
                echo json_encode($resp);
            }elseif(!empty($user) && $email!=''){
                $resp = array('status'=>true /*, 'html'=>$html*/);
                echo json_encode($resp);
            }
            
        }else{
            $resp = array('status'=>'not' /*, 'html'=>$html*/);
            echo json_encode($resp);
        }
		
	}

    
  } //end of register class
