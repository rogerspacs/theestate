<?php  
/**
 * DEALS WITH ALL ACCOUNT TYPE OPERATIONS
 * (
 * BEING EXACT ie
 * INSERT, UPDATE, DELETE AND GET/SELECT
 * ACCOUNT TYPES
 * )
 */
class Account_type_m extends CI_Model
{
	// PUBLIC VARIABLES;
	public $query;
	
	public function __construct(){
		parent::__construct();
	}

	// GET ACCOUNTS FROM ACCOUNT TABLE
	public function account_type_fetch(){
		$this->query =$this->db->get("account_type_tb");
    	return $this->query->result();
	}


}
?>