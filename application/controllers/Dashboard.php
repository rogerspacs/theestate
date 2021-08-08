<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		/**
		 * RECEIVE THE SESSION STARTED SENT ON SYSTEM START UP
		 * IF IT WAS SENT, IF NOT REDIRECT THE USER TO THE LOGIN
		 * SCREEN FOR AUTHENTICATION BEFORE USING THE SYSTEM
		 */

		$data['title'] = "Home | theestate";
		$data['view_page'] = 'owner_dashboard';
		$this->load->view('site', $data);
	}

	public function check_user_session_started(){

		if ($this->input->is_ajax_request()) {
			/**
			 * GET LOG ID/SESSION FROM USER SESSION SENT THROW AJAX
			 */
			$user_set_session	= $this->input->post('user_log');
			$user_log = $user_set_session;

			$session_email = explode('/', $user_log);
			$session_email_split = implode('@', $session_email);
			$session_name = explode('@', $session_email_split);

						// unset($_SESSION['user_data'][$user_log]); 
			$move_to_page = ($_SESSION['user_data'][$user_log]['account_type_id'] == 3) ? 'Dashboard' : 'Home';

			/**
			 * CHECK IF THE SESSION SENT THROW AJAX EXITS IN THE PHP
			 * SESSION LIST
			 */
			foreach ($_SESSION['user_data'] as $session){
				if($session['email'] == $session_email[1]){
					// $data[] = $session['email'];
					$action 	= array('response'=> 'Success', 'message' => 'Welcome back @' . $session_name[1], 'move_to_page'=> $move_to_page);

				}else{
					// $data[] = 'Nothing found';
					$action 	= array('response'=> 'Missing', 'message' => 'User session miss much @' . $user_log, 'move_to_page'=> $move_to_page);
				}
				
			}

			echo json_encode($action);
		}
	}

	public function owner_create()
	{
		$data['title'] = "Create | theestate";
		$data['view_page'] = 'owner_create';
		$this->load->view('site', $data);
	}
	
	public function owner_listing()
	{
		$data['title'] = "Listings | theestate";
		$data['view_page'] = 'owner_listing';
		$this->load->view('site', $data);
	}

	public function owner_rentals()
	{
		$data['title'] = "Rentals | theestate";
		$data['view_page'] = 'owner_rentals';
		$this->load->view('site', $data);
	}

	public function owner_settings()
	{
		$data['title'] = "Settings | theestate";
		$data['view_page'] = 'owner_settings';
		$this->load->view('site', $data);
	}


	/**
	 * NAVIGATION TO NOMAL PAGES WHILE LOGED IN AS THE OWNER
	 */
	public function home()
	{
		$data['title'] = "Home | theestate";
		$data['view_page'] = 'index';
		$this->load->view('site', $data);
	}


}
