<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url', 'form');

		// $this->load->helper(array('form', 'url'));
		$this->load->library("form_validation");
		$this->load->model("User_m");
	}


	public function index()
	{
		$data['title'] = "Signup | theestate";
		$data['view_page'] = 'signup';
		$this->load->view('structure', $data);
	}
	public function check_user_session_started(){
		// $user_account_type = 'nothing';

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

	public function user_signup(){
		if ($this->input->is_ajax_request()) {
			$data = array('response' => 'Error');

			/**
			 * CHECK IF USER EMAIL ALREADY EXITS
			 */
			$user_exits = check_field_exists('user_tb', 'email', $this->input->post('email'));
			if(!$user_exits){
				/**
				 *  VALIDATE FORM DATA/VALIDATION
				 */
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('telephone', 'Phone number', 'required');
				$this->form_validation->set_rules('account_type_id', 'Account Type', 'required');
				$this->form_validation->set_rules('country_id', 'Country', 'required');
				$this->form_validation->set_rules('gender_id', 'Gender', 'required');
				$this->form_validation->set_rules('dob', 'DOB', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');

				/**
				 *  IF VALIDATION IS COMPLETE
				 */
				if ($this->form_validation->run() == FALSE) {
					$response = array('response' => 'Error', 'message' => validation_error());
				}

				/**
				 *  PREPARE DATA FOR STORAGE
				 */
				else{
					/**
					 * ENCRYPT THE PASSWORD
					 * FOR STORAGE IN THE DATABASE
					 */
					$hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

					/**
					 * FORMAT DATA TO MUCH FIELDS
					 * IN THE TABLE IN THE DATABASE
					 */
					$ajax_data = array(
							'account_type_id' => $this->input->post('account_type_id'),
							'country_id' => $this->input->post('country_id'),
							'dob' => $this->convert_given_date_to_unix_timestamp($this->input->post('dob')),
							'email' => $this->input->post('email'),
							'fname' => $this->input->post('fname'),
							'gender_id' => $this->input->post('gender_id'),
							'lname' => $this->input->post('lname'),
							'password' => $hash,
							'telephone' => $this->input->post('telephone'),
							'join_date' => time()
						);

					/**
					 * SAVE THE DATA TO THE SPACIFIED
					 * TABLE IN THE DATABASE
					 */
					if ($inserted_id = save_details('user_tb', $ajax_data)) {
						$response = array('response' => 'Success', 'message' => "Operation completed successfully", 'id' =>$inserted_id);
					}
				}
			}else{
				$response = array('response'=> 'Warning', 'message' => "Warning! Email your entered is already associated with another account");
			}
			

			// SEND RESPOSE TO THE CLIENT
			echo json_encode($response);

		}else{
			echo "Access Denailed";
		}
	}
	/**
	 * CREATE UNIX TIME FROM GIVEN DATE
	 * PREPARE FOR STORAGE IN DATABESE
	 * id USER TABLE STORES DATE OF BIRTH
	 * dob
	 */
	function convert_given_date_to_unix_timestamp($date){
		/**
		 *  ISSOLATE THE NUMBERS REPRESENTING 
		 *  EACH PARY OF THE DATE FROM DAY, MONTH
		 *  AND YEAR mktime(hour, minute, second, month, day, year, isDST)
		 */
		if($date_figures = explode("-", $date)){
			$unix_time= mktime(0, 0, 0, $date_figures[1], $date_figures[2], $date_figures[0]);
			return $unix_time;	
		}
	}

	/**
	 * CONVERT UNIX TIME TO ANY DATE IN
	 * A PARTICULAR USER'S TIMES ZONE
	 */

	 function convert_unix_time_to_date($unix_time, $timezone){

		/**
		 *  CREATE UNIX TIME
		 */
	 	$unix_time_stamp = $unix_time;//time();
	 	/**
	 	 * INTATIATE NEW DATE OBJECT $dt = new DateTime();
	 	 */
	 	$date_time = new DateTime();

	 	/**
	 	 * SET TIMESTAMP FOR THE NEW DATE CREATED
	 	 */
	 	 $date_time->setTimestamp($unix_time_stamp); 

	 	/**
	 	 * GET USER'S TIME ZONE
	 	 */
	 	$user_timezone = new DateTimeZone($timezone); 

	 	/**
	 	 * PASS TIMEZONE FOR THE DATE $dt->setTimezone($tz);
	 	 */
	 	$date_time->setTimezone($user_timezone);

	 	/**
	 	 * UNIX TIME STAMP CONVERTED TO USERS TIMEZONE
	 	 * NOW DISPLAY THE DATE
	 	 */
	 	// echo json_encode($date_time->format("r"));
	 	$date = $date_time->format('Y-m-d H:i:s');
	 	$date_array = explode(' ', $date);
	 	$date_alone = $date_array[0];
	 	return $date_alone;
	 }

	public function get_change_to_date(){
		// /**
		//  *  This is just an example. In application this will come from Javascript (via an AJAX or something)
		//  */
		// $timezone_offset_minutes = $this->input->post('timezone_offset_minutes');  // $_GET['timezone_offset_minutes']

		// *
		//  *  Convert minutes to seconds
		 
		// $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);

		// // Africa/Nairobi
		// // date_default_timezone_set('Africa/Nairobi');
		// echo json_encode($timezone_name);
		// // return $timezone_name;


		$date_unixtime = $this->input->post('date_unixtime');
		// $unix_time = $_SESSION['user_data'][$user_log]['dob'];
		$date = $this->convert_unix_time_to_date($date_unixtime, 'Africa/Nairobi');//date("d-m-Y");

		// $user_details = $_SESSION['user_data'][$user_log];

		echo json_encode($date);
	}


	
	public function get_user_profile(){
		$user_log = $this->input->post('user_log');
		$unix_time = $_SESSION['user_data'][$user_log]['dob'];
		if(is_int($_SESSION['user_data'][$user_log]['dob'])){
			$_SESSION['user_data'][$user_log]['dob'] = $this->convert_unix_time_to_date($unix_time, 'Africa/Nairobi');
		}
		// $_SESSION['user_data'][$user_log]['dob'] = convert_unix_time_to_date($unix_time, 'Africa/Nairobi');//date("d-m-Y");

		$user_details = $_SESSION['user_data'][$user_log];

		echo json_encode($user_details);
	}
	public function get_user_country(){
			$country = check_field_exists('country_tb', 'country_id', $this->input->post('country_id'));
			echo json_encode($country[0]->country_name);

	}
	public function get_user_account(){
			$account_type = check_field_exists('account_type_tb', 'account_type_id', $this->input->post('account_type_id'));
			echo json_encode($account_type[0]->account_name);

	}
	public function get_user_gender(){
			$gender = check_field_exists('gender_tb', 'gender_id', $this->input->post('gender_id'));
			echo json_encode($gender[0]->gender_name);

	}

	public function update_user_profile(){

		$user_id = $this->input->post('user_id');
		$user_log = $this->input->post('user_log');
		
		
		$ajax_data = array(
			'country_id' => $this->input->post('country_id'),
			'dob' => $this->convert_given_date_to_unix_timestamp($this->input->post('dob')),
			'email' => $this->input->post('email'),
			'fname' => $this->input->post('fname'),
			'gender_id' => $this->input->post('gender_id'),
			'lname' => $this->input->post('lname'),
			'telephone' => $this->input->post('telephone'),
			'modified_date' => time()
		);	

		$user_update = update_details('user_tb', 'user_id', $user_id, $ajax_data);


		// REFRESH DATA CHANGES
		$user_profile = check_field_exists('user_tb', 'user_id', $user_id);

		$user_info = array(
			"account_type_id" 	=> $user_profile[0]->account_type_id,
			"country_id" 		=> $user_profile[0]->country_id,
			"join_date" 		=> $user_profile[0]->join_date,
			"dob" 				=> $user_profile[0]->dob,
			"email" 			=> $user_profile[0]->email,
			"fname" 			=> $user_profile[0]->fname,
			"gender_id" 		=> $user_profile[0]->gender_id,
			"user_id" 			=> $user_profile[0]->user_id,
			"lname" 			=> $user_profile[0]->lname,
			"modified_date" 	=> $user_profile[0]->modified_date,
			"password"			=> $user_profile[0]->password,
			"status_id" 		=> $user_profile[0]->status_id,
			"telephone" 		=> $user_profile[0]->telephone,
			"loggedIn" 			=> $log_id
		);
		$_SESSION['user_data'][$user_log] = $user_info;

		echo json_encode($user_info);

	}


	public function upload_profile_image(){
		if(isset($_FILES['profile_image_to_upload']['name'])){

		   /* Getting file name */
		   $filename = $_FILES['profile_image_to_upload']['name'];

		   /* Location */
		   $location = "./resources/images/users/".$filename;
		   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
		   $imageFileType = strtolower($imageFileType);

		   /* Valid extensions */
		   $valid_extensions = array("jpg","jpeg","png");

		   $response = 0;
		   /* Check file extension */
		   if(in_array(strtolower($imageFileType), $valid_extensions)) {
		      /* Upload file */
		      if(move_uploaded_file($_FILES['profile_image_to_upload']['tmp_name'],$location)){
		         $response = $location;
		      }
		   }

		   echo $response;
		   exit;
		}
	}


    function do_upload(){
        // $config['upload_path']="./assets/images";
        // $config['allowed_types']='gif|jpg|png';
        // $config['encrypt_name'] = TRUE;
         
        // $this->load->library('upload',$config);
        // if($this->upload->do_upload("file")){
        //     $data = array('upload_data' => $this->upload->data());
 
        //     $title= $this->input->post('title');
        //     $image= $data['upload_data']['file_name']; 
             
        //     $result= $this->upload_model->save_upload($title,$image);
        //     echo json_decode($result);
        // }
		if(isset($_FILES['profile_image_to_upload']['name'])){
			$config['upload_path'] = './resources/images/users/';//'./images/';
	        $config['allowed_types'] = 'gif|jpg|png|gif';

	        $this->load->library('upload', $config);

	        if (!$this->upload->do_upload('profile_image_to_upload')) {
	            $data = $this->upload->display_errors();

	            // $this->load->view('files/upload_form', $error);
	        } else {
	            $data = $this->upload->data();

	            // $this->load->view('files/upload_result', $data);
	        }
	        $image = "http://127.0.0.1/theestate/resources/images/users/".$data['file_name'];

            echo $image;

		}

	}


	public function check_if_user_has_set_profile_image($user_id){
			$image_exits = check_field_exists('user_image_tb', 'user_id', $user_id);
			$status = false;
			if ($image_exits) {
				// UPDATE THAT IMAGE'S STATUS TO INNACTIVE

				$image_data = array(
					'status_id' =>  2,
					'status_change_date' => time()
				);	

				$image_update = update_details('user_image_tb', 'user_id', $user_id, $image_data);
				$status = $image_update;
			}

			return $status;

	}

	public function save_profile_image(){
			$user_id = $this->input->post('user_id');
			$image_path = $this->input->post('image_name');

			$image_path_array = explode('users/', $image_path);
			$image_name = $image_path_array[1];

			// UPDATE EXITING IMAGE STATUS' TO INNACTIVE
			$update_user_image_status = $this->check_if_user_has_set_profile_image($user_id);

	        // SAVE IMAGE AS ACTIVE TO THE DATABASE
	        $image_data = array(
	        		'user_id'		=>  $user_id,
					'status_id' 	=>  1,
					'image'			=>  $image_name,
					'set_date' 		=>  time()
				);

	        $image_save = save_details('user_image_tb', $image_data);// save_user_profile_image($user_id, $image_name);

	        echo json_encode($image_save);
	}

}
