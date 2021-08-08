<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data['title'] = "Login | theestate";
		$data['view_page'] = 'login';
		$this->load->view('structure', $data);
	}
	public function check_user_session_started(){
			$user_account_type = 'nothing';

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
	/**
	 * UNLOCK USER SESSION
	 */
	public function unlock_session(){
		if ($this->input->is_ajax_request()){
			$action = 'keep_locked';

			$user_log = $this->input->post('user_log');
			$password = $this->input->post('password');

			/**
			 * CHECK IF GET SESSION STORED PASSWORD
			 * AND VARIFY IT WITH THE SENT PASSWORD
			 */
			$session_password =  $_SESSION['user_data'][$user_log]['password'];
			if (password_verify($password, $session_password)) {
				$action = 'unlock';
			}
			echo json_encode($action);
		}
	}

	/**
	 * CHECK WEATHER THE USER LOGED IN
	 * IS ACTIVE ON THE SYSTEM
	 */
	public function check_user_activeness(){
		if ($this->input->is_ajax_request()){

			$lock_time = 600;

			$action = (time() - $_SESSION['LAST_ACTIVE_TIME']);
			if ($this->input->post('action') == 'inactive_lock') {
				
			    if ((time() - $_SESSION['LAST_ACTIVE_TIME']) > $lock_time) {  // 60*10 Time in Seconds		600
					
					$action = 'session_lock';
			    }

			}else{
				$action = 'session_lock';
			}
			echo json_encode($action);
		}
	}

	public function update_session_activity(){
		$_SESSION['LAST_ACTIVE_TIME'] = time();
		$action = 'Still active at '.$_SESSION['LAST_ACTIVE_TIME'];
		echo json_encode($action);

	}

	public function check_log(){
		if ($this->input->is_ajax_request()) {

			$user_log = $this->input->post('user_log');

			// $log_id = $_SESSION['user_data'][$user_log][$user_log]['loggedIn'];
			$log_id = $_SESSION['user_data'][$user_log]['loggedIn'];
			$log_status = check_field_exists('log_tb', 'log_id', $log_id);

			$log_status_id = $log_status[0]->status_id;

			$data = array('log_id' => $log_id, 'log_status_id'=>$log_status_id);

			echo json_encode($data);
		}
	}
	/**
	 * SAVE THE TIME THE USER LOGED OUT OF 
	 * HIS/HER ACCOUNT
	 */
	public function record_log_end_time(){
		if ($this->input->is_ajax_request()) {
			/**
			 * GET LOG ID FROM USER SESSION
			 */
			$log_id = $this->input->post('log_id');
			/**
			 * FORMAT DATA TO MUCH FIELDS
			 * IN THE TABLE IN THE DATABASE
			 */
			$logend_data = array(
					'logend_time'		=> time(),
					'log_id' 			=> $log_id
				);
			/**
			 * SAVE LOG END OR SESSION TERMINATION
			 */
			$user_log_end = save_details('logend_tb', $logend_data); 
			if($user_log_end){
				$data = array('response'=>'Success', 'message'=> $user_log_end);
			}
			else{
				$data = array('response'=>'Error', 'message'=>'Operation failed');
			}
			echo json_encode($data);
		}
	}

	/**
	 * UPDATE THE LOG STATUS IS
	 */
	public function update_log_status(){
		if ($this->input->is_ajax_request()) {
			/**
			 * GET LOG ID FROM USER SESSION
			 */
			$log_id 			= $this->input->post('log_id');
			/**
			 * SET LOG STATUS ID TO 5(FIVE)
			 * LOG STATUS FIVE MEANS TERMINATED
			 */
			$status_id			= $this->input->post('status_id');
			$update_log_data 	= array(
										'status_id' => $status_id
									);
			/**
			 * UPDATE LOG STATUS 
			 */
			$log_update = update_details('log_tb', 'log_id', $log_id, $update_log_data);

			echo json_encode($log_update);

		}
	}

	public function log_all_user_logout(){

		if ($this->input->is_ajax_request()) {
			$all_logs = get_details('log_tb');

       		$update_log_data 	= array(
						'status_id' => 5
					);


           	foreach($all_logs as $all_log){
				/**
				 * UPDATE LOG STATUS 
				 */
				$log_update = update_details('log_tb', 'log_id', $all_log->log_id, $update_log_data);

				/**
				 * SAVE LOG END OR SESSION TERMINATION
				 */
				$logend_data = array(
					'logend_time'		=> time(),
					'log_id' 			=> $all_log->log_id
				);
				$user_log_end = save_details('logend_tb', $logend_data); 


				// $this->session->sess_destroy();
				$msg = array('response'=> 'Done', 'message'=>'Session Destroyed');

			}
			session_destroy();
			echo json_encode($msg);
		}
	}

	public function user_logout(){
		if ($this->input->is_ajax_request()) {
			// $this->session->sess_destroy();
			$msg = array('response'=> 'Nothing', 'message'=>'Session Destroyed not yet');
			/**
			 * TO GET SPECIFIC USERS DATA PASS THE 
			 * SESSION KEY ALONG
			 */
			$user_log = $this->input->post('user_log');
			if(isset($_SESSION['user_data'][$user_log])){
				/**
				 * SAVE THE TIME THE USER LOGED OUT OF 
				 * HIS/HER ACCOUNT IN LOGEND TABLE
				 */
				// if($this->record_log_end_time($user_log)){

					/**
					 * UPDATE LOG STATUS TO ENDED IN THE 
					 * LOG TABLE
					 */
					// if($this->update_log_status($user_log)){
						// $msg = array('response'=> 'Success', 'message'=>'Every thing set and done');

						/**
						 * REMOVE/DELETE THE USER SESSION DATA
						 * AND THEN SAVE USER LOG OUT TIME AND
						 * UPDATE LOG STATUS TO 5 WHICH MEANS 
						 * SESSION TERMINATED
						 */
						unset($_SESSION['user_data'][$user_log]); 
						$msg = array('response'=> 'Success', 'message'=>'Session Destroyed');

					// }
				// }

			}
			echo json_encode($msg);
		}
	}

	public function user_login(){
		if ($this->input->is_ajax_request()) {
			/**
			 * CHECK IF USER EMAIL ALREADY EXITS
			 */
			$user_exits = check_field_exists('user_tb', 'email', $this->input->post('email'));
			if($user_exits){
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				/**
				 *  IF VALIDATION IS COMPLETE
				 */
				if ($this->form_validation->run() == FALSE) {
					$user_data = array('response' => 'Error', 'message' => validation_error());
				}
				/**
				 *  PREPARE DATA FOR STORAGE
				 */
				else{
					/**
					 * CHECK IF EMAIL IS ASSOCCIATED WITH
					 * THE PASSWORD IN THE DATABASE
					 */
					if (password_verify($this->input->post('password'), $user_exits[0]->password)) {
						/**
						 * 	CREATE USER LOG RECORD WHEN THE USER LOGED
						 *  INTO HIS/HER ACCOUNT
						 */
						$user_id 			= $user_exits[0]->user_id;
						$session_type 		= $this->input->post('session_type');
						$country 			= $this->input->post('country');
						$city 				= $this->input->post('city');
						$region 			= $this->input->post('region');
						$ip 				= $this->input->post('ip');
						/**
						 * SET STATUS ID TO 4
						 * STATUS ID 4 MEANS IN PROGRESS
						 */
						$status_id			= 4;
						/**
						 * LOG CREATION AFTER COLLECTIONN OF
						 * ALL REQUIRED DATA
						 */
						$log_id = $this->create_log($user_id, $session_type, $country, $region, $city, $ip, $status_id);

					    $user_info = array(
							"account_type_id" 	=> $user_exits[0]->account_type_id,
							"country_id" 		=> $user_exits[0]->country_id,
							"join_date" 		=> $user_exits[0]->join_date,
							"dob" 				=> $user_exits[0]->dob,
							"email" 			=> $user_exits[0]->email,
							"fname" 			=> $user_exits[0]->fname,
							"gender_id" 		=> $user_exits[0]->gender_id,
							"user_id" 			=> $user_exits[0]->user_id,
							"lname" 			=> $user_exits[0]->lname,
							"modified_date" 	=> $user_exits[0]->modified_date,
							"password"			=> $user_exits[0]->password,
							"status_id" 		=> $user_exits[0]->status_id,
							"telephone" 		=> $user_exits[0]->telephone,
							"loggedIn" 			=> $log_id,
						);

						$_SESSION['LAST_ACTIVE_TIME'] = time();


						$email = $user_exits[0]->email;

						$each_user_log = time().'/'. $email;//

						$_SESSION['user_data'][$each_user_log] = $user_info;

						$user_data = array('response' => 'Success', 'message'=>$each_user_log, 'user_type'=>$user_exits[0]->account_type_id, 'gender_id'=>$user_exits[0]->gender_id,'user_id'=>$user_exits[0]->user_id, 'profile'=>$user_info);


					}else{
						$user_data = array('response' => 'Error', 'message'=>'Invalid login details');
					}
				}

			}else{
				$user_data = array('response' => 'Error', 'message' => 'Invalid details');
			}
			/**
			 *  SEND RESPOSE TO THE CLIENT
			 */
			echo json_encode($user_data);
		}
	}

	public function get_user_image(){
		if ($this->input->is_ajax_request()) {
			$image_exits = check_field_exists('user_image_tb', 'user_id', $this->input->post('user_id'));
			if ($image_exits) {
				$activated = 'none activated';
				$user_images = '';
				foreach($image_exits as $image){
					if($image->status_id == 1){
						$activated = $image->image;
					}else{
						$user_images .= ','.$image->image.':'.$image->set_date.'-'.$image->status_change_date;
					}
				}
				$image = array('response'=>'Success', 'message'=> $user_images, 'active'=>$activated);
			}else{
				$image = array('response'=>'Error', 'message'=> "missing");
			}
			echo json_encode($image);
		}

	}

	public function create_log($user_id, $session_type, $country, $region, $city, $ip, $status_id){
		/**
		 * 	GET ALL SESSION TYPES
		 */
		$default_session_type = check_field_exists('session_type_tb', 'preference', 'Default');
		if($default_session_type){
			/**
			 * 	GET THE VALUE OF THE SESSION TYPE
			 *  PREFERED BY THE USER IF NOT SET THE
			 *  ASSIGN THE DEFAULT ONE
			 */
			$user_prefered_session_type = ($session_type == 1) ? $session_type : $default_session_type[0]->session_type_id;

			/**
			 * FORMAT DATA TO MUCH FIELDS
			 * IN THE TABLE IN THE DATABASE
			 */
			$log_data = array(
					'log' 				=> time(),
					'user_id' 			=> $user_id,
					'session_type_id' 	=> $user_prefered_session_type,
					'country' 			=> $country,
					'city' 			 	=> $city,
					'region' 			=> $region,
					'ip'				=> $ip,
					'status_id'			=> $status_id
				);
			/**
			 *  CREATE USER LOG AT THE 
			 *  SPECIFIED TIME
			 */
			$user_log = save_details('log_tb', $log_data); 

			return $user_log;

		}
	}

}