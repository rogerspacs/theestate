<?php  
class User_m extends CI_Model {

   public function __construct(){
        parent::__construct();
    }

   public function user_registration($data)
    {
        return $this->db->insert('user_tb', $data);
    }
}