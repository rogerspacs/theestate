<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * DEALS WITH FORMULATING /FORMATING ACCOUNT TYPES 
 * TO ALL DESIRED FORMATS TO BE DESPLAYED BY THE VIEWS
 */
class Account_type_c extends CI_Controller
{
	/**
	 * PUBLIC VARIABLES
	 */
	public $result;

	public function __construct(){
		parent::__construct();

		/**
		 *  LOAD HELPERS
		 */
		$this->load->helper(array('form', 'url'));
		/**
		 *  LOAD LIBRARIES
		 */
		$this->load->library("form_validation");
		/**
		 * LOAD ACCOUNT TYPE MODEL TO DELIVER ACCOUNTS TO BE
		 * FORMATED TO A DESIRED LOOK FOR DISPLAY ON THE VIEWS
		 * eG. TO DISPLAY IN THE FORM FIELD ACCOUNT TYPE
		*/
		$this->load->model("Account_type_m");

	}



}
?>