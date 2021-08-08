$(document).ready(function(){

	// ----------------------------ADMIN LOG ALL USERS OUT-----------
	$('.log_all_users_out').on('click',function(event) {
		event.preventDefault()
		unset_all_user_session();
	})
	function unset_all_user_session(){
		console.log('system clear')
	   		$.ajax({
				url:"http://127.0.0.1/theestate/Login/log_all_user_logout",
				type: "POST",
				dataType: "json",
				success: function(data){
					// console.log(data);
					if (data['response'] == 'Done') {
				   		deliver_message(data['message'], 'msg_info')
						

						// CLEAR ALL SET SESSION VARIABLES;
						sessionStorage.removeItem('user_log_id');
						sessionStorage.removeItem('user_log');
						sessionStorage.removeItem('user_log_status_id');
						sessionStorage.clear();  
					}
				}
			});
	   }

	// --------------------SYSTEM LOAD CHECKS-------------------------

		welcomeMessage()
		function welcomeMessage(){
			if (sessionStorage.getItem('welcome') != null){
					
				/**
				 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
				 */
			 	deliver_message(sessionStorage.getItem('welcome'), 'msg_good');
			 	/**
			 	 * UNSET THE WECOME MESSAGE
			 	 */
			 	 sessionStorage.removeItem('welcome');
			}
		}

		check_new_account_creation()
		function check_new_account_creation(){
			if (sessionStorage.getItem('newaccount') != null){
					
				/**
				 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
				 */
			 	deliver_message('Info! '+sessionStorage.getItem('newaccount')+'.', 'msg_good');
			}
		}

		 var check_user_activeness_functionIsRunning = false;
		/**
		 * CHECK LOG ID
		 */
	    get_user_log_id();
	    // if (sessionStorage.getItem('user_log_id')) {
	    // 	sessionStorage.removeItem('user_log_id')
	    // 	sessionStorage.removeItem('user_log_status_id')

	    // }
	    // user_log_identifier = (sessionStorage.getItem('user_log_id')) ? sessionStorage.getItem('user_log_id') : '';

	    mouse_mossion_update_session();


		/**
		 * ANY MOUSE HOVER ON ANY ELEMENT OF THE SYSTEM
		 * SHOULD UPDATE SESSION ACTIVE TIME IF THE USER 
		 * IS FULLY LOGGED IN
		 */
		 function mouse_mossion_update_session(){
			$(".selector").on("mouseover", function () {
		   		get_user_log_id() 
		   		user_log_status_id =  sessionStorage.getItem("user_log_status_id");
		   		// console.log(user_log_status_id);
		   		if(user_log_status_id == 4){
					// ------------------------------------------------------
				    /**														|
			    	 *| UPDATE SESSION ACTIVE TIME 							|
			    	 */														
			    	 update_active_session(); 	
					// -----------------------------------------------------|
	   			}
			});
	   	}

		/**
		 *  GET THE VISITOR'S LOCATION
		 *  AND STORE THE VALUE IN THE
		 *  SPAN
		 */
		// --$.getJSON("https://api.ipify.org?format=json", function(data) {

	        /**
	         * GET DEVICE IP ADDRESS
	         */
	         // --var device_ip = data.ip;
	         // console.log(device_ip);

	         /**
	          * GET USER LOCATION
	          */
			var location = '';

			// THIS IS TEMPURAL JUST FOR NOW
				vis_location = 'status success, country Uganda, countryCode UG, region C, regionName Central Region, city Kampala, zip , lat 0.3162, lon 32.5657, timezone Africa/Kampala, isp University of Kisubi, org , as AS327687 Research and Education Network for Uganda, query 196.43.149.142,';
	            sessionStorage.setItem('vis_location', location);

	        // THIS IS THE PERMANT ONE
	       // $.getJSON("http://ip-api.com/json/" + device_ip, function (data) {//"https://ipapi.co/"+ device_ip+"/json/",
	        	
	       //      $.each(data, function (key, value) {
	       //          location += key + " " + value + ", ";
	       //      });
	       //      //STORE LOCATION
	       //      sessionStorage.setItem('visitor_location', location);
	       //  });
	    // --});

		/**
	    * SEND LOGID TO THE CONTROLLERS TO CHECK WEATHER THE USER IS ALREADY LOGED IN
	    */
	    send_user_log()
	    
	    function send_user_log(){
	    	var user_log = 'nothin';
	    	if(sessionStorage.getItem('user_log')!= null){
	    		user_log = sessionStorage.getItem('user_log');
	    	}

			set_user_profile_image()

	    	const home_operation_controllers = ['Login', 'Home', 'Signup'];
	    	for(home_operation_controller_counter = 0; home_operation_controller_counter < home_operation_controllers.length; ++home_operation_controller_counter){
	    		$.ajax({
					url:"http://127.0.0.1/theestate/"+home_operation_controllers[home_operation_controller_counter]+"/check_user_session_started",
					type: "POST",
					dataType: "json",
					data: {
						user_log: user_log
					},
					success: function(data){

				        // console.log(data)
				        if(data == 2){
				        	$('.iconic_links').removeClass('disabled');
				        	$('.account_setup_access').addClass('disabled');

				        }


					}
				});
	    	}
	    }

		get_user_image()

	    function get_user_image(){
	    	if(sessionStorage.getItem('user_id') != null){
	    		user_id = sessionStorage.getItem('user_id');
	    		
	    		$.ajax({
					url:"http://127.0.0.1/theestate/Login/get_user_image",
					type: "POST",
					dataType: "json",
					data: {
						user_id: user_id
					},
					success: function(data){
						if(data['response'] == 'Success'){
							sessionStorage.setItem('user_images', data['message'])
							if( data['active'] != ""){
								sessionStorage.setItem('user_active_image', data['active'])
							}
							
						}
						
				        // console.log(data)
					}
				});
	    	}
	    }


	    function set_user_profile_image(){

	    	if(sessionStorage.getItem('user_active_image') != null && sessionStorage.getItem('user_active_image') != 'none activated'){
	    		var user_active_image = sessionStorage.getItem('user_active_image');
	    		// console.log(user_active_image);

	    		$('.user_icon').attr('src', 'http://127.0.0.1/theestate/resources/images/users/'+user_active_image);
	    		$('#image_preview').attr('src', 'http://127.0.0.1/theestate/resources/images/users/'+user_active_image);


	    	}else if(sessionStorage.getItem('user_gender_id') != null){

	    		var gender = sessionStorage.getItem('user_gender_id');

	        	$('.user_icon').attr('src', function() {
				    var src = 'http://127.0.0.1/theestate/resources/images/default/users/men_default_icon.png';
				    if (gender == 1) {
				        src = 'http://127.0.0.1/theestate/resources/images/default/users/men_default_icon.png';
				    } else if (gender ==2) {
				        src = 'http://127.0.0.1/theestate/resources/images/default/users/female_default_icon.png';
				    }
				    return src;
				})
	    	}
	    }

	// -----------------------------------------------------------------------------

	// ------------------------------SIGNUP-----------------------------------------
		/**
		 *  IF REGISTRATION FORM IS SUBMITED
		 *  DISABLE THE DEFAULT ACTION FOR 
		 *  FORM SUBMITION
		 */
		$("#reg_form").on('submit', function(event){
			event.preventDefault();
			/**
			 * COLLECT ALL THE FORM FIELDS
			 */
			var reg_first_name = $('#reg_first_name').val();
			var reg_last_name = $('#reg_last_name').val();
			var reg_email = $('#reg_email').val();
			var reg_telephone = $('#reg_telephone').val();
			var reg_account_type = $('#reg_account_type').val();
			var reg_country = $('#reg_country').val();
			var reg_gender = $('#reg_gender').val();
			var reg_dob = $('#reg_dob').val();
			var reg_password = $('#reg_password').val();
			var reg_confirm_password = $('#reg_confirm_password').val();

			/**
			 * CHECK IF THE TERMS OF SERVICE CHECKBOX IS 
			 * CLICKED AND PROCED IF NOT TELL THE USER TO 
			 * REVIEW THE TERMS OF SERVICES BEFORE CONTINUEING
			 */
			if($('#terms').prop('checked')){
				/**
				 *  CHECK IF ALL REQUIRED FIELDS HAVE
				 *  BEEN FIELD WITH A VALUE
				 */
				if(reg_confirm_password != '' && reg_first_name!= '' && reg_last_name != '' && reg_email != '' && reg_telephone != '' && reg_account_type != '' && reg_country != '' && reg_gender != '' && reg_dob != '' && reg_password != '' && reg_confirm_password != ''){
					if (reg_password == reg_confirm_password) {
						
						$.ajax({
							url:"http://127.0.0.1/theestate/Signup/user_signup",
							type: "POST",
							dataType: "json",
							data: {
								fname: reg_first_name,
								lname: reg_last_name,
								email: reg_email,
								telephone: reg_telephone,
								account_type_id: reg_account_type,
								country_id: reg_country,
								gender_id: reg_gender,
								dob: reg_dob,
								password : reg_password
							},
							success: function(data){
								// STORE MESSAGE TO DISPLAY ON LOGIN PAGE AFTER REDIRECT
								sessionStorage.setItem('newaccount', 'Account created successfully, please login');
								
								if(data['response'] == 'Success'){
									/**
									 * RELOCATE TO LOGIN PAGE
									 */
									window.location.href = 'http://127.0.0.1/theestate/Login';

								}else{
									/**
									 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
									 */
								 	deliver_message('Info! '+data['message']+'.', 'msg_info');

								}
							}
						});
					} else {
						/**
						 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
						 */
					 	deliver_message('Info! password miss much', 'msg_info');
					}
				}else{
					/**
					 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
					 */
				 	deliver_message('Info! all fields are required please', 'msg_info');
				}
			}else{

				/**
				 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
				 */
				 deliver_message('Accept the terms of service pleace', 'msg_info');
			}
		});
	// -----------------------------------------------------------------------------

	// ------------------------------SIGNIN-----------------------------------------
		/**
		 * IF LOGIN FORM IS SUBMITED
		 *  DISABLE THE DEFAULT ACTION FOR 
		 *  FORM SUBMITION
		 */
		$('#login_form').on('submit', function(event){
			event.preventDefault();
			var email = $('#login_email').val();
			var password = $('#login_password').val();
			var session_type = ($('#keep_me_signed_in').prop('checked')) ? 1 : 0;

			if (email == "" || password == "") {
				deliver_message("All field must be filled", 'msg_warn');
			} else {
				console.log(email + ' ' + password + ' ' + session_type);
				var visitor_location = sessionStorage.getItem('visitor_location') //$('#recieved_location').text();
				// handle_location = (visitor_location != '') ? visitor_location : 'status success, country Uganda, countryCode UG, region C, regionName Central Region, city Kampala, zip , lat 0.3162, lon 32.5657, timezone Africa/Kampala, isp University of Kisubi, org , as AS327687 Research and Education Network for Uganda, query 196.43.149.142,';
				handle_location = 'status success, country Uganda, countryCode UG, region C, regionName Central Region, city Kampala, zip , lat 0.3162, lon 32.5657, timezone Africa/Kampala, isp University of Kisubi, org , as AS327687 Research and Education Network for Uganda, query 196.43.149.142,';
				// if(visitor_location != '')
				visitor_location = 'status success, country Uganda, countryCode UG, region C, regionName Central Region, city Kampala, zip , lat 0.3162, lon 32.5657, timezone Africa/Kampala, isp University of Kisubi, org , as AS327687 Research and Education Network for Uganda, query 196.43.149.142,';
				
				location_array = visitor_location.split(', ');

				country_value = location_array[1].split(' ');
				country = country_value[1];

				region_value = location_array[4].split(' ');
				region = region_value[1];

				city_value = location_array[5].split(' ');
				city = city_value[1];

				ip_value = location_array[location_array.length-2].split(' ');
				ip = ip_value[1];

				$.ajax({
					url:"http://127.0.0.1/theestate/Login/user_login",
					type: "POST",
					dataType: "json",
					data: {
						email: email,
						password : password,
						session_type : session_type,
						country: country,
						region: region,
						city: city,
						ip: ip
					},
					success: function(data){
						if(data['response'] == 'Success'){

							/**
							 * DELETE NEW ACCOUNT SESSION IF IT EXISTS
							 */
							if (sessionStorage.getItem('newaccount') != null){
						
								sessionStorage.removeItem('newaccount')
							}

							/**
							 * SET WELCOME MESSAGE SESSION
							 */
							 var user = email.split('@');
							 sessionStorage.setItem('welcome', 'Welcome @'+user[0]);

							/**
							 *  STORE USERNAME AS SESSION
							 *  TO BE USED LATER IN THE LOGOUT
							 *  SECTION AND THEN START CHECKING USER ACTIVENES
							 */
				            sessionStorage.setItem("user_log", data['message']);
				            sessionStorage.setItem("user_gender_id", data['gender_id']);
				            sessionStorage.setItem("user_id", data['user_id']);

				            check_user_activeness('inactive_lock')

							/**
							 * CHECK IF USER IS ADMIN,OWNER,OR BUYER
							 */
							if(data['user_type'] == 1){
								window.location.href = 'http://127.0.0.1/theestate/Dashboard';

							}
							if(data['user_type'] == 2){
								window.location.href = 'http://127.0.0.1/theestate/Home';

							}
							if(data['user_type'] == 3){
								window.location.href = 'http://127.0.0.1/theestate/Dashboard';
							}
						}else{
							/**
							 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
							 */
						 	deliver_message('Info! '+data['message']+'.', 'msg_failed');
						}
					}
				});
			}
		});

	// -----------------------------------------------------------------------------
	

    // --------------------FUNCTION TEST AREA-------------------------
		// $(".user_account").on('click', function(event){
		// 	event.preventDefault();
	   		
	 //   		get_user_log_id() 
	 //   		deliver_message('log id ' + sessionStorage.getItem("user_log_id"), 'msg_info')
		// });

	// ---------------------------------------------------------------

	// ----------------------GENERAL FUNCTIONS------------------------
	   /**
	    * AFTER LOGING OUT THE USER ACCOUNT 
	    * SAVE LOGEND TIME IN THE LOGEND TABLE
	    */
	    function record_log_end_time(){
	    	/**
	    	 * GET LOG ID SEND IT WITH NEW STATUS
	    	 * FOR THE LOG
	    	 */
	    	get_user_log_id();
	    	var log_id = sessionStorage.getItem("user_log_id");
	    	// console.log(log_id)
		  	$.ajax({
				url:"http://127.0.0.1/theestate/Login/record_log_end_time",
				type: "POST",
				dataType: "json",
				data: {
					log_id: log_id
				},
				success: function(data){
			   		deliver_message('Session log status updated to terminated', 'msg_info')
					// console.log(data);
				}
			});
	   }

	   /**
	    * AFTER LOCKING THE USER ACCOUNT UPDATE
	    * LOG STATUS TO LOCKED IN LOG TABLE
	    */
	    function update_user_log_status(status_id){
	    	/**
	    	 * GET LOG ID SEND IT WITH NEW STATUS
	    	 * FOR THE LOG
	    	 */
	    	get_user_log_id();
	    	var log_id = sessionStorage.getItem("user_log_id");
	    	// console.log(log_id+ ' '+ status_id)
		  	$.ajax({
				url:"http://127.0.0.1/theestate/Login/update_log_status",
				type: "POST",
				dataType: "json",
				data: {
					status_id: status_id,
					log_id: log_id
				},
				success: function(data){

					if(status_id == 4){
						/**
						 * UPDATE SESSION ACTIVE TIME
						 */
						 update_active_session();
					}
					// console.log(data);
				}
			});
	   }

	   /**
	    * GET LOG ID FROM LOG TO BE
	    * USED TO UPDATE LOG STATUS
	    */
	   function get_user_log_id() {
	   		if(sessionStorage.getItem('user_log') != null){

		   		var user_log = sessionStorage.getItem("user_log");

				$.ajax({
					url:"http://127.0.0.1/theestate/Login/check_log",
					type: "POST",
					dataType: "json",
					data: {
						user_log: user_log
					},
					success: function(data){
						/**
						 * STORE USER LOG ID IN SESSION TO
						 * BE USED LATER
						 */
						var user_log_id = data['log_id'];
						var user_log_status_id = data['log_status_id'];
				        sessionStorage.setItem("user_log_id", user_log_id);
				        sessionStorage.setItem("user_log_status_id", user_log_status_id);

				        // console.log(data)

					}
				});
	   		}
	   }


	    /**
	     * UPDATE LAST ACTIVE TIME
	     */
	   function update_active_session(){
		  	$.ajax({
				url:"http://127.0.0.1/theestate/Login/update_session_activity",
				type: "POST",
				dataType: "json",
				data: {
					action: 'still_active'
				},
				success: function(data){
					// console.log(data);
				}
			});
	   }
   	// ---------------------------------------------------------------

	// ---------------------------LOCK SCREEN-----------------------
		/**
		 * DURING SYSTEM STARTUP/ RELOAD IF THE ACCOUNT IS LOCKED KEEP
		 * IT IN THE LOCKED MODE
		 */
		 keep_account_locked_after_reloading()
		 function keep_account_locked_after_reloading(){
		 	if(sessionStorage.getItem('user_log_status_id') != null){
			 	var user_log_status_id = sessionStorage.getItem('user_log_status_id');
			 	if (user_log_status_id == 6) {
					// LOCK THE SCREEN
					$('.lock_automatic').removeClass('disabled');
			 	}else{
			 		// START COUNTING USER ACTIVENESS
			 		check_user_activeness('inactive_lock')
			 	}
		 	}
		 }

		/**
		 * LOCK USER ACCOUNT
		 * 
		 */
		 $(".lock_user_account_screen").on('click', function(event){
			event.preventDefault();

			// LOCK THE SCREEN
		    check_user_activeness_functionIsRunning = false;

			 check_user_activeness('immediate_lock')

			 if($('.selector').hasClass('disable_body_scroll')){
			 	// $('.selector').addClass('disable_body_scroll');
			 }else{
			 	$('.selector').addClass('disable_body_scroll');
			 }

		});
		/**
		 * CHECK USER ACTIVENESS SINCE HE/SHE
		 * LOGED INTO THE SYSTEM
		 */

	   	function check_user_activeness(action){

		    if (!check_user_activeness_functionIsRunning) {
		        check_user_activeness_functionIsRunning = true;

		   		check_timer = setInterval(function(){ 
		   			/**
		   			 * CHECK USER ACTIVE STATUS ONLY IF HE/SHE IS STILL ACTIVLY LOGED INTO THE SYSTEM
		   			 */
		   			if(sessionStorage.getItem('user_log_status_id') != null && sessionStorage.getItem('user_log_status_id') == 4){
			   			$.ajax({
							url:"http://127.0.0.1/theestate/Login/check_user_activeness",
							type: "POST",
							dataType: "json",
							data: {
								action: action
							},
							success: function(data){
								if (data == 'session_lock') {
									// LOCK THE SCREEN
									if($('.lock_automatic').hasClass('disabled')){

										clearInterval(check_timer);

										$('.lock_automatic').removeClass('disabled');

										/**
										 * UPDATE LOG STATUS ID TO LOCKED(6)
										 */
										update_user_log_status(6)
									}
								}
								// console.log(data)
							}
						});
			   		}
		   		}, 1000);


		        check_user_activeness_functionIsRunning = false;
		   	}
	   }

	   	/**
	   	 * LOCK THE USER SCREEN
	   	 */
		$(".lock_logout").on('click', function(event){
			event.preventDefault();

			if($('.selector').hasClass('disable_body_scroll')){
			 	$('.selector').removeClass('disable_body_scroll');
			 }

	   		get_user_log_id() 
	    	user_log_id = sessionStorage.getItem('user_log_id');
	    	// console.log(user_log_id)

	   		var user_log = sessionStorage.getItem("user_log");
			unset_user_session(user_log);
			window.location.href = 'http://127.0.0.1/theestate/Login';
		});

	   	/**
	   	 * MOVE OUT OF THE LOCK SCREEN TO LOGIN SCREEN
	   	 */

		$(".lock_login").on('click', function(event){
			event.preventDefault();

			var password = $('#lock_password').val();
			var user_log = sessionStorage.getItem('user_log');

			if(password !=''){
				$.ajax({
					url:"http://127.0.0.1/theestate/Login/unlock_session",
					type: "POST",
					dataType: "json",
					data: {
						password : password,
						user_log: user_log
					},
					success: function(data){

						if(data == 'unlock'){
							/**
							 * SEND LOCK TIME 
							 */
			   				// send_time_before_locking(600);

							$('#lock_password').val('');
							$('.lock_automatic').addClass('disabled');

							if($('.selector').hasClass('disable_body_scroll')){
							 	$('.selector').removeClass('disable_body_scroll');
							}
							/**
							 * START UPDATING ACTIVE SESSION TIME AS
							 * BASED ON MOUSE MOTION
							 */
				   			sessionStorage.removeItem('user_log_status_id');
							 mouse_mossion_update_session();

							/**
							 * UPDATE LOG STATUS ID TO IN PROGRESS(4)
							 */
					   		get_user_log_id() 
					    	user_log_id = sessionStorage.getItem('user_log_id');
					    	update_user_log_status(4);

					    	// ---------EACH BUTTON, LINK, EVERY MOUSE HOVER OF CLICK SHOW HAVE THE TWO----
					    	/**
					    	 * UPDATE SESSION ACTIVE TIME
					    	 */
					    	 update_active_session();
							// ---------------------------------------------------------------------------

							 /**
							  * START CHECKING FOR LAST ACTIVE
							  * TIME OF THE USER
							  */
							  check_user_activeness('inactive_lock');
						}else{
							deliver_message('Invalid password details', 'msg_failed');
						}
						
					}
				});
			}else{
				deliver_message('Password field requires input please', 'msg_warn');
			}
			// window.location.href = 'Login';
		});

	// ---------------------------------------------------------------

	// -----------------------------LOGOUT---------------------------

		/**
		 *  LOGOUT  THE USER
		 */
		$(".logout").on('click', function(event){
			event.preventDefault();
			$('.login_out_info').removeClass('disabled');

			if($('.selector').hasClass('disable_body_scroll')){
			 	$('.selector').removeClass('disable_body_scroll');
			}else{
				$('.selector').addClass('disable_body_scroll');
			}
			/**
		    * SEND LOGID TO THE CONTROLLERS TO CHECK WEATHER THE USER IS ALREADY LOGED IN
		    */
		    send_user_log()

			/**
			 * UPDATE SESSION ACTIVENES
			 */
			update_active_session()

			/**
			 * CALL COUNTER FUNCTION
			 * TO WARN THE USER BEFORE
			 * HE/SHE IS LOGGED OUT
			 */
			 countdown(10);
		});

		/**
		 * LOGOUT COUNTER FUNCTION
		 */
	   function countdown(val)
	   {
	   		/**
	   		 * GET USERNAME FROM THE SESSIONSTORAGE
	   		 * AND USE IT TO LOG OUT
	   		 */
	   		var user_log = sessionStorage.getItem("user_log");
	   		// var email = $('#session_email').val();
		  	var counter=val;
		
			var timer = setInterval(function(){ 
				$(".count_down_cancel").on('click', function(event){
					clearInterval(timer); 
				});
				$(".count_down_ok").on('click', function(event){
					counter = -1;
				});
				if(counter >= 0){
				  	$(".countdown").html(counter+' <small>s</small>');
				}
				if(counter<0){
					$('.login_out_info').addClass('disabled');

					if($('.selector').hasClass('disable_body_scroll')){
					 	
					}else{
						$('.selector').removeClass('disable_body_scroll');
					}
					/**
					 * UNSET ALL USER SESSIONS WHICH
					 * WHERE SET DURING THE LOGIN
					 */
					
					clearInterval(timer);
					unset_user_session(user_log);
					
					window.location.href = 'http://127.0.0.1/theestate/Login';

				}
				counter--;		
			}, 1000)
	    }

		/**
		 * CHECK USER ACTIVENES NON STOP
		 * CHECK USER ACTIVENESS EVERY AFTER 20s
		 */
		// SET LAST ACTIVE TO CURRENT TIME;
		$(".count_down_cancel").on('click', function(event){
			$('.login_out_info').addClass('disabled');
			if($('.selector').hasClass('disable_body_scroll')){
			 	$('.selector').removeClass('disable_body_scroll');
			}
			update_active_session();
		});

		/**
		 * BEFORE LOGINOUT UNSET ALL SESSION
		 * VARIABLES THAT WERE SET DURING
		 * LOGIN PROCESS, UPDATE LOG STATUS 
		 * TO TERMINATED (STATUS ID 5)
		 */
	   function unset_user_session(user_log){
	   		$.ajax({
				url:"http://127.0.0.1/theestate/Login/user_logout",
				type: "POST",
				dataType: "json",
				data: {
					user_log: user_log
				},
				success: function(data){
					// console.log(data);
					if (data['response'] == 'Success') {
				   		deliver_message(data['message'], 'msg_info')
						
					 	/**
						 * UPDATE LOG STATUS TO TERMINATED (STATUS ID 5)
						 */
						var status_id = 5;
						update_user_log_status(status_id)

						/**
						 * RECORD LOG END TIME
						 */
						record_log_end_time()

						// CLEAR ALL SET SESSION VARIABLES;
						sessionStorage.removeItem('user_log_id');
						sessionStorage.removeItem('user_log');
						sessionStorage.removeItem('user_log_status_id');
						sessionStorage.clear();  
					}
				}
			});
	   }
	// ---------------------------------------------------------------


	// --------------------DELIVER MESSAGES-------------------------
		/**
		 *  KEEP RECORD IF THE CLOSE MESSAGE ICON IS CLICKED
		 * 	IF NOT IT'S FALSE
		 */
		var close_clicked = false;

		/**
		 * WHEN CLOSE MESSAGE ICON IS CLICKED CLOSE THE MESSAGE
		 * BY  CALLING THE HIDE MESSAGE FUNCTION AND THEN RECORD
		 * THAT THE CLOSE MESSAGE ICON HAS BEEN CLICKED BY SETTING
		 * IT TO TRUE
		 */
		$('.close_notification_message').on('click', function (event) {
			hideMessage()
			close_clicked = true;
		});

		/**
		 * SHOW THE MESSAGE ONLY IF THE CLOSE MESSAGE ICON HAS NOT(!) 
		 * BEEN CLICKED, START BY UNDOING HIDE FUNCTIONS' WORK 
		 * (REMOVE THE DISABLED CLASS)
		 */
		 function showMessage(message, colour_class){ 
		 	if(!close_clicked){
				if($('.notification_messages').hasClass('disabled')){
					$('.notification_messages').removeClass('disabled');
				}
				
				$('.notification_messages').addClass('message_show');
				// $('.notification_messages').addClass(colour_class);
				 assignMessageNewColour(colour_class)
				$('.notification_messages span').text(message);
		 	}
		}

		/**
		 * HIDE THE MESSAGE, START BY UNDOING SHOW FUNCTIONS' WORK 
		 * (REMOVE THE MESSAGE SHOW CLASS)
		 */
		 function hideMessage(){ 
			if($('.notification_messages').hasClass('message_show')){
				$('.notification_messages').removeClass('message_show');
			}
			$('.notification_messages').addClass('disabled');
		}

		function assignMessageNewColour(new_colour) {
			const colours = ['msg_info', 'msg_good', 'msg_warn', 'msg_failed'];

			var colour_counter;
			for (colour_counter = 0; colour_counter < colours.length; ++colour_counter) {
				if($('.notification_messages').hasClass(colours[colour_counter])){
					$('.notification_messages').removeClass(colours[colour_counter]);
				}
				// console.log(colours[colour_counter])
			}

			$('.notification_messages').addClass(new_colour);

		}

		/**
		 * SHOW THE MESSAGE FOR JUST 30 SECONDS AND THEN HIDE IT,
		 * BEFORE HIDING THE MESSAGE FIRST CHECK IF THE CLOSE 
		 * MESSAGE ICON HAS BEEN CLICK, IF ITS CLICK DON'T TRY
		 * HIDING IT BECAUSE IT IS ALREADY HIDEN BY USER'S HELP 
		 */
		function deliver_message(message, colour_class) {
			var counter = 0;

			var notificationtimer = setInterval(function(){ 
				if (counter < 3000) {
					/**
					 * PASS THE MESSAGE ONLY ONCE 
					 */
					if (counter==0) {
						showMessage(message, colour_class);
					}
				}else{
				 	if(!close_clicked){
						hideMessage();
					}
				}

				if (counter == 3000) {
					clearInterval(notificationtimer);
				}
				counter++;
			}, 1);
		}
	// ---------------------------------------------------------------

	/**
	 * ---------------------------ASSET ENTRY PROCESS---------------------
	 */
		/**
		 * WHEN THE ASSET GENERAL DETAILS' FORM IS SUBMITED COLLECT  
		 * FORM FIELD DATA AND STORE IT IN VARIABLES, CHECK IF THERE
		 * NOT EMPTY THEN PROCED TO ANOTHER SECTION WHICH THE SWITCH 
		 * STATEMENT HELPS IDENTIFY BASED ON THE CATEGORY SPECIFIED
		 */
		$('.go_to_next').on('click', function(event){
        	// Prevent form submition
        	event.preventDefault()

        	// GET FORM VALUES
        	var asset_category = $('#asset_category').val();
			var location = $('#asset_location').val();
			var price = $('#asset_price').val();
			var description = $('#asset_description').val();
			var transaction_type = $('#asset_transaction_type').val();
			var asset_lease_duration = $('#asset_lease_duration').val();

			// PRINT FORM VALUES TO THE CONSOLE
			// console.log(asset_category + ' ' + location + ' ' + price + ' ' + description);
			if (asset_category == '' || location =='' || price =='' || description == '' || transaction_type == '') {
				/**
				 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
				 */
			 	deliver_message("Info! all fields required please", 'msg_warn');
			}else{

				/**
				 * CALL FUNCTION TO COLLECT THE COLLECTED DETAILS AND PLACE THEM 
				 * ON THE `TO SAVE LIST`
				 */
				var asset_det = [];
				var asset_images = new Object();

				
				// var general_det = new Object();
				// general_det["category_id"] = asset_category;
				// general_det["transaction_type_id"] = transaction_type;
				// general_det["location"] = location;
				// general_det["price"] = price;
				// general_det["description"] = description;
				// general_det["asset_lease_duration"] = (asset_lease_duration != 'none') ? asset_lease_duration : 'transaction type not lease';

				var general_det = [];
				
				general_det.push(asset_category);
				general_det.push(transaction_type);
				general_det.push(location);
				general_det.push(price);
				general_det.push(description);
				general_det.push(asset_lease_duration);

				// console.log(general_det);
				sessionStorage.setItem('general_det', general_det)


				$('#asset_category_collected').text(asset_category);
				$('#asset_location_collected').text(location);
				$('#asset_price_collected').text(price);
				$('#asset_lease_duration_collected').text(asset_lease_duration);
				$('#asset_description_collected').text(description);

				// HIDE INSTRUCTIONS SECTION
				$('#instractions').addClass('keep_hidden');
				$('#instractions').removeClass('move');
				// SHOW THE COLLECTED DETAILS
				$('#collected_general').removeClass('keep_hidden');
				$('#collected_general').addClass('move');

	        	/**
	        	 * CHECK WHAT ASSET CATEGORY DID THE ASSET BELONG TO THEN
	        	 * MOVE TO THAT SECTION AND DO THE DATA COLLECTION AGAIN IN THAT SECTION
	        	 * CHECK IF THAT SECTION'S FORM FIELDS ARE NOT EMPTY BEFORE PROCEDING
	        	 */

	        	switch (asset_category) { 
					case 'House':
						deliver_message("house", 'msg_warn');
						/**
						 *  AFTER SUBMITING THE ASSET CATEGORY AS HOUSE, DISABLE THE CATEGORY
						 *  SELECTION FIELD THEN MOVE TO THE HOUSE DETAILS 
						 *  SECTION AND FILL IN THE HOUSE DETAILS
						 */
						move_from_general('#house');
						$('#asset_category').attr("disabled", "disabled");

						/**	
						 * 	CHECK IF THE FORM FIELDS ARE NOT EMPTY AND SUBMIT THE HOUSE
						 *  DETAILS THEN MOVE TO THE IMAGE UPLOAD SECTION
						 */
						$('#house').on('submit', function (event) {
							event.preventDefault();

				        	var sited_on_land_size = $('#sited_on_land_size').val();
							var number_of_bed_rooms = $('#number_of_bed_rooms').val();
							var number_of_birth_rooms = $('#number_of_birth_rooms').val();

							if (sited_on_land_size == '' || number_of_bed_rooms =='' || number_of_birth_rooms =='') {

								/**
								 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
								 */
							 	deliver_message("Info! all fields required please", 'msg_warn');

							}else{
								// IF THERE IS ANY FIEATURE ELEMENT REMOVE IT BEFORE ADDING THE NEW ONES
				                $(".hfeature_element").remove();

								// colllect house features
								var house_features = [];
					            $.each($("input[name='house_features']:checked"), function(){

					            	// COLLECT HOUSE FEATURES
					                house_features.push($(this).val());

					                // SEND THEM TO THE COLLECTION
					                var house_feature = 	'<div class="col-xl-3 hfeature_element"><p>'+$(this).val()+'</p></div>';

									$("#collected_house_features").append(house_feature);
					            });

					            // CONVERT ALL THE HOUSE FEATURES INTO ONE STRING SEPERATED BY COMMAS
					            all_house_features = house_features.join("| ");

					            // HOUSE COLLECTED DETAILS
								// $('#asset_land_size_collected').text(land_size);
								$('#asset_size_of_land_sitted_on_collected').text(sited_on_land_size);
								$('#asset_number_of_bedrooms_collected').text(number_of_bed_rooms);
								$('#asset_number_of_birthrooms_collected').text(number_of_birth_rooms);

								// SHOW COLLECTED INFORMATION
								$('#collected_house_features').removeClass('keep_hidden');
								$('#collected_house_features').addClass('move');


								asset_det.push(sited_on_land_size);
								asset_det.push(number_of_bed_rooms);
								asset_det.push(number_of_birth_rooms);
								asset_det.push(all_house_features);

								// console.log(asset_det);
								sessionStorage.setItem('asset_det', asset_det)

								/**
								 * MOVE TO THE HOUSE COLLECTION PAGE
								 */
								next('#house', '#image_upload');
							}
						});

						/**
						 *  SUMIT/UPLOAD THE IMAGES YOU HAVE SELECTED AND
						 *  THEN MOVE TO THE THANK YOU SECTION
						 */
						$('#image_upload').on('submit', function (event) {
							event.preventDefault();

							// console.log(selected_images);
							sessionStorage.setItem('asset_images', selected_images);
							
							next('#image_upload', '#collection_success');
						});

						/**
						 *  INCASE YOU WANT TO RECHECK THE HOUSE'S DETAILS
						 *  CLICK ON PREVIEW TO MOVE BACK TO THE HOUSE'S DETAILS SECTION
						 */
						$('#move_back_to_previous').on('click', function (event) {
							event.preventDefault();
							move_from_image('#house')
						})
						
						/**
						 *  INCASE YOU WANT TO RECHECK THE GENERAL SECTION
						 *  CLICK ON PREVIEW TO MOVE BACK TO THE HOUSE'S DETAILS SECTION
						 */
						prev('#general', '#house');

						break;
					case 'Land': 
						deliver_message("land", 'msg_warn');

						/**
						 *  AFTER SUBMITING THE ASSET CATEGORY AS HOUSE,
						 *  DISABLE THE CATEGORY SELECTION FIELD THEN
						 *  MOVE TO THE HOUSE DETAILS 
						 *  SECTION AND FILL IN THE HOUSE DETAILS
						 */
						move_from_general('#land');
						$('#asset_category').attr("disabled", "disabled");

						/**
						 *  SUBMIT THE land DETAILS WHEN YOU
						 *  GET DONE WITH SPECIFYING ITS DETAILS
						 *  AND MOVE TO THE IMAGE UPLOAD SECTION
						 */
						$('#land').on('submit', function (event) {
							event.preventDefault();
				        	var land_size = $('#land_size').val();

							if (land_size == '') {
								/**
								 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
								 */
							 	deliver_message("Info! all fields required please", 'msg_warn');

							}else{

				                // IF THERE IS ANY FIEATURE ELEMENT REMOVE IT BEFORE ADDING THE NEW ONES
				                $(".lfeature_element").remove();

								// colllect land features
								var land_features = [];
					            $.each($("input[name='land_features']:checked"), function(){

					            	// COLLECT LAND LAND FEATURES
					                land_features.push($(this).val());

					                // SEND THEM TO THE COLLECTION
					                var land_feature = 	'<div class="col-xl-3 lfeature_element"><p>'+$(this).val()+'</p></div>';

									$("#collected_land_features").append(land_feature);
					            });

					            // CONVERT ALL THE LAND FEATURES INTO ONE STRING SEPERATED BY COMMAS
					            all_land_features = land_features.join("| ");

					            // LAND COLLECTED DETAILS
								$('#asset_land_size_collected').text(land_size);
								// SHOW COLLECTED INFORMATION
								$('#collected_land_features').removeClass('keep_hidden');
								$('#collected_land_features').addClass('move');

								// var land_det = new Object();
								asset_det.push(land_size);
								asset_det.push(all_land_features);

								// console.log(asset_det);

								sessionStorage.setItem('asset_det', asset_det)

					            // MOVE TO IMAGE UPLOAD
								next('#land', '#image_upload');
							}
						});


						
						/**
						 *  SUMIT/UPLOAD THE IMAGES YOU HAVE SELECTED AND
						 *  THEN MOVE TO THE THANK YOU SECTION
						 */
						$('#image_upload').on('submit', function (event) {
							event.preventDefault();

							// console.log(selected_images);
							sessionStorage.setItem('asset_images', selected_images);

							next('#image_upload', '#collection_success');
						});

						/**
						 *  INCASE YOU WANT TO RECHECK THE land'S DETAILS
						 *  CLICK ON PREVIEW TO MOVE BACK TO THE land'S DETAILS SECTION
						 */
						$('#move_back_to_previous').on('click', function (event) {
							event.preventDefault();
							move_from_image('#land')
						})
						
						/**
						 *  INCASE YOU WANT TO RECHECK THE GENERAL SECTION
						 *  CLICK ON PREVIEW TO MOVE BACK TO THE land'S DETAILS SECTION
						 */
						prev('#general', '#land');


						break;
					case 'Rental': 
						deliver_message("Rental", 'msg_warn');

						/**
						 *  AFTER SUBMITING THE ASSET CATEGORY AS HOUSE,
						 *  DISABLE THE CATEGORY SELECTION FIELD THEN
						 *  MOVE TO THE HOUSE DETAILS 
						 *  SECTION AND FILL IN THE HOUSE DETAILS
						 */
						move_from_general('#rentals');
						$('#asset_category').attr("disabled", "disabled");

						/**
						 *  SUBMIT THE land DETAILS WHEN YOU
						 *  GET DONE WITH SPECIFYING ITS DETAILS
						 *  AND MOVE TO THE IMAGE UPLOAD SECTION
						 */
						$('#rentals').on('submit', function (event) {
							event.preventDefault();
				        	var number_of_rooms = $('#number_of_rooms').val();
				        	var size_of_rooms = $('#size_of_rooms').val();

							if (number_of_rooms == '' || size_of_rooms =='') {
								/**
								 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
								 */
							 	deliver_message("Info! all fields required please", 'msg_warn');

							}else{

								// IF THERE IS ANY FIEATURE ELEMENT REMOVE IT BEFORE ADDING THE NEW ONES
				                $(".rfeature_element").remove();

								// colllect house features
								var rental_features = [];
					            $.each($("input[name='rental_features']:checked"), function(){

					            	// COLLECT HOUSE FEATURES
					                rental_features.push($(this).val());

					                // SEND THEM TO THE COLLECTION
					                var rental_feature = 	'<div class="col-xl-3 rfeature_element"><p>'+$(this).val()+'</p></div>';

									$("#collected_rental_features").append(rental_feature);
					            });

					            // CONVERT ALL THE HOUSE FEATURES INTO ONE STRING SEPERATED BY COMMAS
					            all_rental_features = rental_features.join("| ");

					            // HOUSE COLLECTED DETAILS
								// $('#asset_land_size_collected').text(land_size);
								$('#asset_number_of_rooms_collected').text(number_of_rooms);
								$('#asset_size_of_rooms_collected').text(size_of_rooms);
								
								// SHOW COLLECTED INFORMATION
								$('#collected_rental_features').removeClass('keep_hidden');
								$('#collected_rental_features').addClass('move');
								
								// var rental_features = new Object();
								asset_det.push(number_of_rooms);
								asset_det.push(size_of_rooms);
								asset_det.push(all_rental_features);

								// console.log(asset_det);

								sessionStorage.setItem('asset_det', asset_det)

								next('#rentals', '#image_upload');
							}
						});

						/**
						 *  SUMIT/UPLOAD THE IMAGES YOU HAVE SELECTED AND
						 *  THEN MOVE TO THE THANK YOU SECTION
						 */
						$('#image_upload').on('submit', function (event) {
							event.preventDefault();

							sessionStorage.setItem('asset_images', selected_images);
							// console.log(asset_images);
							
							next('#image_upload', '#collection_success');
						});

						/**
						 *  INCASE YOU WANT TO RECHECK THE land'S DETAILS
						 *  CLICK ON PREVIEW TO MOVE BACK TO THE land'S DETAILS SECTION
						 */
						$('#move_back_to_previous').on('click', function (event) {
							event.preventDefault();
							move_from_image('#rentals')
						})
						
						/**
						 *  INCASE YOU WANT TO RECHECK THE GENERAL SECTION
						 *  CLICK ON PREVIEW TO MOVE BACK TO THE land'S DETAILS SECTION
						 */
						prev('#general', '#rentals');

					break;

					default:
						deliver_message("nothing", 'msg_warn');
				}
			}


			// colllect images features
			var selected_images = [];
			// DISPLAY IMAGES ON SELECT
			front_image.onchange = evt => {
			  const [file] = front_image.files
			  if (file) {
			  	// COLLECT ASSET IMAGES
				selected_images.push(file.name);
				// asset_images['front_image'] = file.name;

			    front_image_display.src = URL.createObjectURL(file);
			  }
			}
			rear_image.onchange = evt => {
			  const [file] = rear_image.files
			  if (file) {
			  	// COLLECT ASSET IMAGES
				selected_images.push(file.name);
				// asset_images['rear_image'] = file.name;

			    rear_image_display.src = URL.createObjectURL(file);
			  }
			}
			left_side_image.onchange = evt => {
			  const [file] = left_side_image.files
			  if (file) {
			  	// COLLECT ASSET IMAGES
				selected_images.push(file.name);
				// asset_images['left_side_image'] = file.name;

			    left_side_image_display.src = URL.createObjectURL(file);
			  }
			}
			right_side_image.onchange = evt => {
			  const [file] = right_side_image.files
			  if (file) {
			  	// COLLECT ASSET IMAGES
				selected_images.push(file.name);
				// asset_images['right_side_image'] = file.name;

			    right_side_image_display.src = URL.createObjectURL(file);
			  }
			}
			arial_image.onchange = evt => {
			  const [file] = arial_image.files
			  if (file) {
			  	// COLLECT ASSET IMAGES
				selected_images.push(file.name);
				// asset_images['arial_image'] = file.name;

			    arial_image_display.src = URL.createObjectURL(file);
			  }
			}
			interior_image.onchange = evt => {
			  const [file] = interior_image.files
			  if (file) {
			  	// COLLECT ASSET IMAGES
				selected_images.push(file.name);
				asset_images['interior_image'] = file.name;

			    interior_image_display.src = URL.createObjectURL(file);
			  }
			}


        });

		
		function prev(preview_to, preview_from) {

			$('.prev').on('click', function(event) {
				event.preventDefault();
			 	deliver_message("Info! system check", 'msg_info');
				elementMotion(preview_from, 'revealed', 'move_right', 'Info! First step complete, your on second step')
				elementMotion(preview_to, 'move_left', 'revealed', 'Info! First step complete')
			});
		}
		function next(from, to) {
		 	deliver_message("Info! system check", 'msg_info');
			elementMotion(from, 'revealed', 'move_left', 'Info! First step complete, your on second step')
			elementMotion(to, 'move_right', 'revealed', 'Info! First step complete')
		}
		function move_from_image(move_to){
			
		 	deliver_message("Info! system check", 'msg_info');
			elementMotion('#image_upload', 'revealed', 'move_right', 'Info! First step complete, your on second step')
			elementMotion(move_to, 'move_left', 'revealed', 'Info! First step complete')

		}
		function move_from_general(move_to) {

			elementMotion('#general', 'revealed', 'move_left', 'Info! First step complete, your on second step')
			elementMotion(move_to, 'move_right', 'revealed', 'Info! First step complete, your on second step')
		}

		/**
		 * RESET ALL FORM FIELDS
		 */
		$('#reset').on('click', function(event){
			event.preventDefault()
			clearAssetFields();
			/**
			 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
			 */
		 	deliver_message("Info! all fields cleared", 'msg_warn');
	 	
		})

		/**
		 * SHOW LEASE DURATION FORM FIRLD IF ASSET TRANSACTION TYPE
		 * IS LEASE AND HIDE IF ASSET TRANSACTION TYPE IS SALE
		 */
		$('#asset_transaction_type').on('change',function(){

	        if( $(this).val()== 2){ //"lease"
   				$('#asset_lease_duration').removeClass('no_show');
	   			$('#asset_lease_duration').val('');

	        }else{
				$('#asset_lease_duration').addClass('no_show');
	        }
	    });

		/**
		 * SAVE ALL THE COLLECTED ASSET DETAILS 
		 */
		$('#save_asset').on('click', function(event){
			event.preventDefault()
			/**
			 * MOVE ALL ASSET COLLECTION SECTIONS BACK TO THE RIGHT END
			 */
			moveAssetsbacktoleft()

			/**
			 * SHOW THE FIRST SECTION
			 */
			prev('#general', '#collection_success');

			/**
			 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
			 */
		 	deliver_message("Info! Data collection complete", 'msg_good');

		 	/**
		 	 * CLEAR ALL FORM FIELDS
		 	 */
		 	clearAssetFields();

		 	/**
		 	 * SSEND COLLECTED DATAILS TO THE SERVER FOR PROCESSING
		 	 */
		 	send_collected_details();

		 	// SHOW INSTRUCTIONS SECTION
			$('#instractions').removeClass('keep_hidden');
			$('#instractions').addClass('move');
			// HIDE THE COLLECTED DETAILS
			if($('#collected_general').hasClass('move')){
				$('#collected_general').removeClass('move');
				$('#collected_general').addClass('keep_hidden');
			}
			if($('#collected_house_features').hasClass('move')){
				$('#collected_house_features').removeClass('move');
				$('#collected_house_features').addClass('keep_hidden');
			}
			if($('#collected_land_features').hasClass('move')){
				$('#collected_land_features').removeClass('move');
				$('#collected_land_features').addClass('keep_hidden');
			}
			if($('#collected_rental_features').hasClass('move')){
				$('#collected_rental_features').removeClass('move');
				$('#collected_rental_features').addClass('keep_hidden');
			}
	 	
		})
		/**
		 * SEND THE DETAILS COLLECTED TO SERVER SIDE FOR PROCESSING
		 */
		function send_collected_details(){

			$.ajax({
			 	url:"http://127.0.0.1/theestate/Asset/process_collected_asset_data",
				type: "POST",
				dataType: "json",
				data: {
					general_det: sessionStorage.getItem('general_det'),
					asset_det: sessionStorage.getItem('asset_det'),
					asset_images: sessionStorage.getItem('asset_images')
				},
				success: function(data){
					console.log(data);

				}
			 });
		}

		/**
		 * MOVE ALL ASSET COLLECTION SECTIONS BACK TO THE RIGHT END
		 */
		function moveAssetsbacktoleft(){
			/**
			 * STORE ALL ASSET DATA COLLECTION SECTIONS IN AN ARRAY
			 */
			const asset_categories  = ["#house", "#rentals", '#land', '#image_upload', '#collection_success'];
			var asset_category_counter;
			for (asset_category_counter = 0; asset_category_counter < asset_categories.length; ++asset_category_counter) {
			    // do something with `substr[i]`
			    // console.log(asset_categories[asset_category_counter]);
				elementMotion(asset_categories[asset_category_counter], 'move_left', 'move_right', 'Data collection completed successfully');
			}
		}

		function clearAssetFields(){
			$('#asset_category').removeAttr("disabled");
			$('#asset_category').prop("selectedIndex", 0).val();
			$('#asset_transaction_type').prop("selectedIndex", 0).val();
        	$('#asset_lease_duration').val('');
			$('#asset_location').val('');
			$('#asset_price').val('');
			$('#asset_description').val('');
		}

		function elementMotion(element, remove_class_name, add_class_name, msg){
			if ($(element).hasClass(remove_class_name)) {
				if ($(element).removeClass(remove_class_name)) {
					/**
					 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
					 */
				 	// deliver_message("Info! system check", 'msg_info');
				 	addElementClass(element, add_class_name, msg)
				 }
			}else{
				/**
				 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
				 */
			 	// deliver_message("Info! check failed", 'msg_info');
			}
		}

		function addElementClass(element, add_class_name, msg){
			if ($(element).addClass(add_class_name)) {
				/**
					 * DELIVER THE MESSAGE PASSED IN AS ARGUMENT
					 */
				 	deliver_message(msg, 'msg_info');
			}else{
			}
		}

		/**
		 * ---------------------PROFILE UPDATE--------------------------
		 */

		$('.user_account').on('click', function(event){
			event.preventDefault();

	   		deliver_message('log id ' + sessionStorage.getItem("user_log_id"), 'msg_info')
			// REFRENSH PROFILE DATA ON THE SCREEN 
			get_user_profile()		

			if($('.user_profile').hasClass('disabled')){
				$('.selector').addClass('disable_body_scroll');
				$('.user_profile').removeClass('disabled');
			}else{
				$('.selector').removeClass('disable_body_scroll');
				$('.user_profile').addClass('disabled');	
			}
			
		});
		
		function change_to_date(date_unixtime){
			/**
			 * GET USER BROWSERS TIMEZON
			 */
			var timezone_offset_minutes = new Date().getTimezoneOffset();
			timezone_offset_minutes = (timezone_offset_minutes == 0) ? 0 : -timezone_offset_minutes;

			// Timezone difference in minutes such as 330 or -360 or 0
			// console.log(timezone_offset_minutes);

			/**
			 * SEND TIMEZONE OFFSET MINUTES TO
			 * PHP FOR PROCESSING
			 */
				// var date_unixtime = sessionStorage.getItem('dob');
			 $.ajax({
			 	url:"http://127.0.0.1/theestate/Signup/get_change_to_date",
				type: "POST",
				dataType: "json",
				data: {
				//	timezone_offset_minutes: timezone_offset_minutes
						date_unixtime: date_unixtime
				},
				success: function(data){
					// console.log(data);
					sessionStorage.setItem('dob', data);

				}
			 });
		}
		get_user_profile()
		function get_user_profile(){
			// console.log('Doing it')
			if(sessionStorage.getItem('user_log') != null){
				// var timezone = (new Date).toString().split('(')[1].slice(0, -1);

				var user_log = sessionStorage.getItem('user_log');
				$.ajax({
					url:"http://127.0.0.1/theestate/Signup/get_user_profile",
					type: "POST",
					dataType: "json",
					data: {
						user_log: user_log
					},
					success: function(data){
						// console.log(data);
						get_gender(data['gender_id'])
						get_country(data['country_id'])
						get_account(data['account_type_id'])
						// console.log(data['country_id'])

						sessionStorage.setItem('fname', data['fname']);
						sessionStorage.setItem('lname', data['lname']);
						sessionStorage.setItem('email', data['email']);
						sessionStorage.setItem('telephone', data['telephone']);
						$('.profile_user_name').text(data['lname'].charAt(0).toUpperCase() + data['lname'].slice(1) + ' ' + data['fname'].charAt(0).toUpperCase() + data['fname'].slice(1));
						$('.profile_user_email').text(data['email']);
						$('.profile_user_telephone').text(0+data['telephone']);

						$('.profile_user_country').text(sessionStorage.getItem('country_name'));
						$('.profile_user_gender').text(sessionStorage.getItem('gender_name'));
						$('.profile_user_account').text(sessionStorage.getItem('account_name'));

						// SET DOB SESSION VARIABLE
						change_to_date(data['dob']);
						//STORE DOB SESSION VARIABLE TO BE PASSED IN AS TEXT TO THE DOB CLASS
						var dob = sessionStorage.getItem('dob');
						$('.profile_user_dob').text(dob);
					}
				});
			}
		}

		function get_country(country_id){
				$.ajax({
					url:"http://127.0.0.1/theestate/Signup/get_user_country",
					type: "POST",
					dataType: "json",
					data: {
						country_id: country_id
					},
					success: function(data){
						sessionStorage.setItem('country_name', data);
						
					}
				});

		}
		function get_gender(gender_id){
				$.ajax({
					url:"http://127.0.0.1/theestate/Signup/get_user_gender",
					type: "POST",
					dataType: "json",
					data: {
						gender_id: gender_id
					},
					success: function(data){
						sessionStorage.setItem('gender_name', data);
					}
				});

		}
		function get_account(account_type_id){
				$.ajax({
					url:"http://127.0.0.1/theestate/Signup/get_user_account",
					type: "POST",
					dataType: "json",
					data: {
						account_type_id: account_type_id
					},
					success: function(data){
						sessionStorage.setItem('account_name', data);
					}
				});

		}

		$('.edit_profile').on('click', function(event){
			event.preventDefault()

			get_user_profile()

			fill_update_register_form_fields();
		})

		function fill_update_register_form_fields(){
			// $('.edit_profile_country_name').val(sessionStorage.getItem('country_name'));
			var country = sessionStorage.getItem("country_name");
			var gender = sessionStorage.getItem("gender_name");
			$('.edit_country option:contains('+country+')').prop('selected', true)
			$('.edit_gender option:contains('+gender+')').prop('selected', true)
			// $('.edit_profile_gender').prop("selectedIndex", 2).val();

			// var now = new Date();

			// var day = ("0" + now.getDate()).slice(-2);
			// var month = ("0" + (now.getMonth() + 1)).slice(-2);

			// var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
			var dob = sessionStorage.getItem('dob');
			$('.edit_profile_dob').val(dob);
			// $('.edit_profile_gender_name').val(sessionStorage.getItem('gender_name'));
			// $('.edit_profile_account_name').val(sessionStorage.getItem('account_name'));
			$('.edit_profile_first_name').val(sessionStorage.getItem('fname'));
			$('.edit_profile_last_name').val(sessionStorage.getItem('lname'));
			$('.edit_profile_email').val(sessionStorage.getItem('email'));
			$('.edit_profile_telephone').val(sessionStorage.getItem('telephone'));
			// $('.edit_profile_dob').val(sessionStorage.getItem('dob'));
		}

		$('.edit_profile_btn').on('click', function(event){
			event.preventDefault()

			edit_user_profile()

			// REFRENSH PROFILE DATA ON THE SCREEN 
			get_user_profile()	

		});
		function edit_user_profile() {

			var edit_country = $('.edit_profile_country').val();
			var edit_gender = $('.edit_profile_gender').val();
			var edit_profile_dob = $('.edit_profile_dob').val();
			var edit_profile_first_name = $('.edit_profile_first_name').val();
			var edit_profile_last_name = $('.edit_profile_last_name').val();
			var edit_profile_email = $('.edit_profile_email').val();
			var edit_profile_telephone = $('.edit_profile_telephone').val();
			if(sessionStorage.getItem('user_id') != null){
				$.ajax({
					url:"http://127.0.0.1/theestate/Signup/update_user_profile",
					type: "POST",
					dataType: "json",
					data: {
						user_id: sessionStorage.getItem('user_id'),
						user_log: sessionStorage.getItem('user_log'),
						country_id: edit_country,
						gender_id: edit_gender,
						dob: edit_profile_dob,
						fname: edit_profile_first_name,
						lname: edit_profile_last_name,
						email: edit_profile_email,
						telephone: edit_profile_telephone
					},
					success: function(data){

				   		deliver_message('log id ' + sessionStorage.getItem("user_log_id"), 'msg_info')
						// console.log(data);
					}
				});
			}
		}


		// ------------------------------------PROFILE IMAGE----------------------------------
		$(".uploader").on('click', function(event){

			profile_image_to_upload.onchange = evt => {
			  const [file] = profile_image_to_upload.files
			  if (file) {
			    image_preview.src = URL.createObjectURL(file)
			  }
			}
		});

		$("#upload_profile").on('submit', function(event){
			event.preventDefault();

		if($('#profile_image_to_upload').val() == ""){
			deliver_message('Select  the image please', 'msg_warn');
		}else{
			$.ajax({
				url:'http://127.0.0.1/theestate/Signup/do_upload',
	            type:"post",
	            data:new FormData(this), 
	            contentType:false,
	            cache:false,
	            processData:false,
	            success: function(data){
				
					$('.user_icon').attr('src', data);

					// sessionStorage.setItem('unsave_profile_pic', data);
	                // console.log(data)

	                var image_name  = data;
	                save_profile_image(sessionStorage.getItem('user_id'), image_name);
	          }
	       });
		}
		});

		function save_profile_image(user_id, image_name){
			$.ajax({
		 	url:"http://127.0.0.1/theestate/Signup/save_profile_image",
			type: "POST",
			dataType: "json",
			data: {
					user_id: user_id,
					image_name: image_name

			},
			success: function(data){
				// console.log(data);
				get_user_image();
			}
		 });
		}
});