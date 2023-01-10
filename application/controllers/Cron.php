<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function __construct() // to remember use public
    {
        parent::__construct();
        
        // Load database
        $this->load->model('user');
        $this->load->model('Admin_model');
        
    }
    
    
    // Validate and store registration data in database
    public function auto_email() {
        exit;
        $users = $this->user->get_all_users();
        //echo  '<pre>';print_r($users);exit;
        
        if($users){
            
            $data = array(
                'is_run' => 'Yes'
            );
            
            $insert_record = $this->user->insert_cron_record($data);
            
            foreach($users as $emails){

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

                $this->load->library('email', $config); //load email library
                $this->email->set_newline("\r\n");

                html_entity_decode($message='<div style="background: #f3f3f3;
                border: 2px solid #0667b3; border-radius: 5px; margin-left:50px; margin-right: 50px; margin-top: 20px; margin-bottom: 20px;">
                <div>
                <div>
                <div style="text-align:center;">
                <h4 style="color: #0667b3;font-size: 18px;text-align: center;/* text-transform: uppercase; */font-weight: bold;border-bottom: 1px solid #bababa;padding-bottom: 15px; padding-top:25px;">
                Auto generated email by system! 
                </h4>
                </div>
                <div>
                <p style="padding-left: 60px;padding-top: 25px;padding-bottom: 25px;padding-right: 60px; text-align: center; color: #000;">
                Thank you for being with Fit to Lift.</br>
                Please change your account credentials to avoid security threats.
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

                $this->email->from('contact@volxom.com', 'Fit to Lift'); 
                $this->email->to($emails['email']);
                $this->email->subject('Change your account details'); 
                $this->email->message($message);

                $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                $this->email->set_mailtype("html");

                $this->email->send();
            }
        }
            
    }
    


    
  } //end of register class
