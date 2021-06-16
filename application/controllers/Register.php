<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('register_view');
	}

    public function check(){
        $email = $this->input->get('email');
        $this->db->where('email',$email);
        $query = $this->db->get('register');
        $row = $query->num_rows();
        if($row > 0){
            echo  1;
        }else{
            echo 0;
        }
    }


    public function save(){
        $this->load->model('register_model','register');
        $data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
        );

        $this->register->insert($data);

        redirect('login');	
        return true;

        
    }
}
