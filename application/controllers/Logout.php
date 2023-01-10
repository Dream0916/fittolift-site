<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	 
	 

	 
	function __construct()
	{
		parent::__construct();
			
	}
	
	/*
	 * Index is all you will need to call to remove the session.
	 * As long as they have a valid session it will destroy it.
	 */
	function index()
	{
		// If session is available destroy it.
		if($this->session->userdata('logged_in')==1)
		$this->session->sess_destroy();
		$login = array('login'=> "You need to login first !");
		$this->session->set_flashdata($login);

		redirect(base_url());	
		
	}
	
}
