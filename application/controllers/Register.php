<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('register_view');
	}


    public function save(){
        $this->load->model('register_model','register');
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
        );

        $this->register->insert($data);

        redirect('login');	
        return true;

        
    }
}
