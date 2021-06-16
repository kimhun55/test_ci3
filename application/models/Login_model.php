<?php 
class Login_model extends CI_Model {

    public function check_login($email){
        $this->db->where('email',$email);
        $this->db->where('password',md5($this->input->post('password')));

        $query = $this->db->get('Register');
        $row = $query->num_rows();
        if($row == 1){
            $data = $query->row_array();
            return $data;
        }else{
            return false;
        }
    }
}
?>