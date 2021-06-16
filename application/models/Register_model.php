<?php 
class Register_model extends CI_Model {

    public function insert($data){
        $this->db->insert('Register',$data);
        return true;
    }
}
?>