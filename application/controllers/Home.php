<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = "Home | theestate";
		$data['view_page'] = 'index';
		$this->load->view('structure', $data);
	}


	public function check_user_session_started(){

		if ($this->input->is_ajax_request()) {
			/**
			 * GET LOG ID/SESSION FROM USER SESSION SENT THROW AJAX
			 */
			$user_set_session	= $this->input->post('user_log');
			$user_log = $user_set_session;

			$user_account_type = $_SESSION['user_data'][$user_log]['account_type_id'];


			echo json_encode($user_account_type);
		}
	}
}
