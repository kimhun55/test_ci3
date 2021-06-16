<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
			parent::__construct();
			$this->load->model('login_model','login');

			
    }

    public function index(){

		if(@$this->session->userdata('logged_in') === true ){
			redirect('dashboard_view');
			exit();

		}
		
		$this->load->library('form_validation');

		

		$this->form_validation->set_rules('email', 'email', 'callback_login_check|required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_view');
		}
		else
		{
			redirect('dashboard_view');	
			exit();
		}
		
	}
	

	public function login_check($str)
	{
			$data = $this->admin->check_login($str);
			if ($data)
			{
					$newdata = array(
							'email'  => $data['email'],
							'firstname'		=> $data['firstname'],
							'lastname'     => $data['lastname']
					);
					
					$this->session->set_userdata($newdata);

					return true;
			}
			else
			{
				$this->form_validation->set_message('login_check', 'No Username or Password !!');
				return FALSE;
			}
	}

	public function logout(){
		
		$this->session->sess_destroy();
		
		redirect();	
		exit();
	}
}
