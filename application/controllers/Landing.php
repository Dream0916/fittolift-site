<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('frontpages/index');
	}

	function about_page(){

		$this->load->view('frontpages/about');
	}

	function contact_page()
	{
		$this->load->view('frontpages/contact');
	}

	function contactus()
	{
		$firstname= $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = 'sales@FitToLift.com';
        $phone_no = $this->input->post('phone_no');
        $address = $this->input->post('address');
        $state = $this->input->post('state');
        $zip_code = $this->input->post('zip_code');
        $note = $this->input->post('note');
		// $data = array(
  //               'firstname' => $this->input->post('firstname'),
  //               'lastname' => $this->input->post('lastname'),
  //               'email' => $this->input->post('email'),
  //               'phone_no' => md5($this->input->post('phone_no')),
  //               'address' => $this->input->post('address'),
  //               'state' => $this->input->post('state'),
  //               'zip_code' => $this->input->post('zip_code'),
  //               'note' => $this->input->post('note'),
  //           );
		// echo '<pre>';
		// print_r($data);
		// exit;

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

            html_entity_decode($message='
            	<table>
				  <tr>
				    <th>FirstName</th>
				    <td>'.$firstname.'</td>
				  </tr>
				  <tr>
				    <th>LastName</th>
				    <td>'.$lastname.'</td>
				  </tr>
				  <tr>  
				    <th>Email Address</th>
				    <td>'.$email.'</td>
				    </tr>
				  <tr>
				    <th>Phone Number</th>
				    <td>'.$phone_no.'</td>
				    </tr>
				  <tr>
				    <th>Address</th>
				    <td>'.$address.'</td>
				    </tr>
				  <tr>
				    <th>States</th>
				    <td>'.$state.'</td>
				    </tr>
				  <tr>
				    <th>Zip Code</th>
				    <td>'.$zip_code.'</td>
				    </tr>
				  <tr>
				    <th>Note regarding</th>
				    <td>'.$note.'</td>
				    </tr>
				  <tr>
				  </tr>
				</table>');

            $this->email->from('contact@volxom.com', 'Clinics'); 
            $this->email->to($email);
            $this->email->subject('Contact Us'); 
            $this->email->message($message);

            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_mailtype("html");
            
            $this->email->send();
            
			redirect(base_url()."contact");
	}
}
