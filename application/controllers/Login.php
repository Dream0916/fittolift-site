<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() // to remember use public
    {
        parent::__construct();
        
        // Load database
        $this->load->model('user');
    }
    
    // Show login form
	// public function index()
	// {
	// 	$this->load->view('front/includes/header');
 //        $this->load->view('front/login');
	// }
    
    
    // Validate and Login process
    public function login_process() {
        
        $user_data =$this->user->user_data($this->input->post('email'));
        if(!$user_data){
            $this->session->set_flashdata('error', 'Invalid credentials !');
            redirect('/');
            exit;
        }
        
        $updation_date = $user_data[0]->password_updation_date;
        
        
        $cron_data =$this->user->cron_data();
        $cron_date_time = $cron_data[0]->cron_date;
        $cron_date = date('Y-m-d', strtotime($cron_date_time));
        //echo '<pre>';print_r($user_data);exit;
        if($updation_date <= $cron_date){
            $this->session->set_flashdata('error', ' Please reset your new password to available services of fit to lift !');
            redirect('/');
            exit;
        }
        
        // Check validation for user input in Login form
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        // if($this->form_validation->run() == FALSE) {
        //     $this->load->view('front/includes/header');
        //     $this->load->view('front/login');
        // }else{
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $type = $this->input->post('sign-type');
            $result =$this->user->login($email,$password,$type);
            // echo '<pre>';print_r($result);exit;
            //add all data to session
        
            //$this->session->sess_destroy();    
        
            if($result){
                $newdata = array(
                    'user_id'        => $result[0]->id,
                    'username'  => $result[0]->username,
                    'user_email'     => $result[0]->email,
                    'user_type'     => $result[0]->type,
                    'image'     => $result[0]->image,
                    'logged_in'      => 1
                );
                // echo '<pre>';print_r($newdata);exit;

                if($newdata['logged_in'] == 1)
                {

                    $this->session->set_userdata($newdata);

                        redirect(base_url('admin'));
                    }
                }else{
                    //print_r($this->session->all_userdata());exit;
                    
                    $this->session->set_flashdata('error', 'Invalid username or password or Acccount is in-active !');
                    redirect('/');
                    exit;
                }
            }
    //end of login function


    ///user fortgot password
    public function forgot_pwd(){

        $email = $this->input->post('email');
        $pass1 = mt_rand( 10000000, 99999999);
        $pass2 = md5($pass1);

        $is_exist = $this->user->user_exists($email);
         //echo '<pre>';print_r($is_exist);exit;
        if($is_exist){
            //configure email settings
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
        
            $this->email->set_newline("\r\n");
            $this->email->initialize($config);

            $this->email->from('admin@fittolift.com', 'Fit to Lift'); 

              $subject="Forgot Password - Fit to Lift!";  //subject
              $message= /*-----------email body starts-----------*/
                "This email has been sent as a request to reset your password.<br>
                Copy password to login and reset new password in profile settings.<br>
                <span style='color:red;'>You must change your password to a new strong one otherwise your account will be deactivated within next 24 hours.</span><br>
                --------------------------------------------------------------<br>
                <b>Email   :</b> " . $email . "<br>
                <b>Password   :</b> " . $pass1 . "<br>
                --------------------------------------------------------------<br>" ;
                /*-----------email body ends-----------*/
              $this->email->to($email);
              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->send();  
            
                $update = $this->user->update_password($email, $pass2);
                $this->session->set_flashdata('success','New Password has been emailed to you !');
                redirect('/');
                exit;
        }else{
              $this->session->set_flashdata('error','This email does not exist!');
              redirect('/');
              exit;

        }
   
    }
    

    
    //check email exist ajax
 //    public function emailcheck(){
	// 	// echo "<pre>";
	// 	$email = $this->input->post('email');
	// 	if($email!='' || $email!=null){
	// 	$user = $this->user->get_email_check($email);

 //            if(empty($user) && filter_var($email, FILTER_VALIDATE_EMAIL)){
 //                $resp = array('status'=>false /*,'msg'=>'Email Already Exist'/*, 'html'=>$html*/);
 //                echo json_encode($resp);
 //            }elseif(!empty($user) && $email!=''){
 //                $resp = array('status'=>true /*, 'html'=>$html*/);
 //                echo json_encode($resp);
 //            }
            
 //        }else{
 //            $resp = array('status'=>'not' /*, 'html'=>$html*/);
 //            echo json_encode($resp);
 //        }
		
	// }
    
    ///forgot password
    // public function forgot_pwd(){
    //     $this->load->view('front/includes/header');
    //     $this->load->view('front/forgot_pwd');
    // }
    
    ///Reset password process
    // public function password_request(){
    //     $email = $this->input->post('email');
    //     //$pass1 = mt_rand( 10000000, 99999999);
    //     //$pass2 = md5($pass1);
        
    //     $is_exist = $this->user->get_email_check($email);
    //      //echo '<pre>';print_r($is_exist);exit;
    //     if($is_exist){
    //         //$update = $this->user->update_password($email, $pass2);
            
    //         $this->load->library('email');
            
    //         $this->email->from('no-reply@invoicyapp.com', 'InvoicyApp'); 
    //         $this->email->to($email);
    //         $this->email->subject('Password Reset'); 
            
    //         html_entity_decode($message='<div style="    background: #f3f3f3;
    //         border: 2px solid #0667b3; border-radius: 5px; margin-left:50px; margin-right: 50px; margin-top: 20px; margin-bottom: 20px;">
    //         <div>
    //         <div>
    //         <div>
    //         <p style="font-size:17px; margin-left:28px; padding-top: 25px;padding-bottom: 25px;padding-right: 60px;  color: #000;">
    //         Hello,<br><br> You are receiving this email because you requested a password reset for
    //         Visa Event. <br><br> To reset your password, click the link below. You will be taken to Visa Event where you will create a new password.
    //         </p>
    //         <p style="text-align: center;">
    //         <a style="font-size: 14px; background: #ec6733; margin: 15px; color:#fff; text-decoration:none; font-weight: bold;  text-align: center; padding: 15px;" href="'.base_url().'password/reset/confirm/'.$email.'">
    //         Reset Password</a>
    //         </p>
    //         <br>
    //         <p style="font-size:17px; margin-left:28px; padding-top: 4px;padding-bottom: 25px;padding-right: 60px;  color: #000;">
    //         After you have created your new password, you can use it with any email addresses you use to sign into Visa Event.<br><br>If the link does not work, try copying and pasting it into your browser. If you continue to have problems, or if you didnt request this email, please contact our Customer Support Heroes.
    //         </p>

    //         </div>
    //         <div style="padding: 3px; border-top:1px solid #bababa;  "><p style="font-size: 14px; color: #000; text-align: center;">
    //         Visa Event Team

    //         </p>
    //         </div>
    //         </div>
    //         </div>
    //         </div>');
            
    //         $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
    //         $this->email->set_mailtype("html");
            
    //         $this->email->send();
            
            
    //         $this->session->set_flashdata('success','We have emailed you the instructions to reset your password. If you do not receive the email, please check your spam folder or contact us.');
    //         redirect('password/reset');
    //         exit;
    //     }else{
    //         $this->session->set_flashdata('error','Your email does not exists!');
    //         redirect('password/reset');
    //         exit;
    //     }
    // }
    
    ///reset password
    // public function reset_pwd(){
    //     $this->load->view('front/includes/header');
    //     $this->load->view('front/reset_pwd');
    // }
    
    //reset password process
    // public function  reset_process(){
    //     $pass = $this->input->post('password');
    //     $email = $this->input->post('email');
    //     $this->user->update_password($email, $pass);
        
    //     $this->session->set_flashdata('success','Your password successfylly updated!');
    //     redirect('login');
    //     exit;
        
            
    // }

}
//end of register class
