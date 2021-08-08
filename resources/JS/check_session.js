$(document).ready(function(){
		/**
		 * ON SYSTEM START UP CHECK IF THE USER ALREADY HAS ASSEION STARTED
		 */
		 check_if_user_already_has_asession();
		
		/**
		 * FUNCTION TO CHECK IF THE USER ALREADY HAS A SESSION STARTED
		 */
		function check_if_user_already_has_asession() {
			/**
			 * IF THE USER ALREADY HAS THE SESSION STARTED THE SEND IT TO 
			 * PHP PAGES TO ALLOW USE TO USE THE SYSTEM WITHOUT HAVING TO LOGIN
			 */
			if (sessionStorage.getItem('user_log') != null){
				var user_session = sessionStorage.getItem("user_log");
				send_user_started_session(user_session);
		   		// deliver_message('user session ' + sessionStorage.getItem("user_log"), 'msg_info');
		   	}else{
		   		window.location.href = 'http://127.0.0.1/theestate/Login';

		   	}
		}
		/**
		 * FUNCTION TO SEND USER SET SESSION TO ALL PHP CONTROLLERS SO THAT THE USER CAN
		 * USE THE SYSTEM WITHOUT HAVING TO FIRST LOG IN
		 */
		function send_user_started_session(user_log){
			/**
			 * LIST OF ALL SYSTEM PHP CONTROLLERS USED
			 */
			const controller_pages = ['Dashboard'];//'Login', 'Signup', , 'Home'

			/**
			 * LOOP THROW THE LIST/ARRAY OF ALL SYSTEM PHP CONTROLLERS THAT ARE ACCESSED BY JQUERY 
			 * AND SEND STARTED SESSION TO ALL THEM SO THAT EACH TIME THE USE VISITS ANY OF THE THE 
			 * LOGIN CHECK CLEARS THE USER AS AN ALREADY LOGED IN USER/VISITOR
			 */
			for (var controller_pages_counter = 0; controller_pages_counter < controller_pages.length; ++controller_pages_counter){
				var go_to = '';
				/**
				 * SEND AJAX REQUEST TO ALL OF THE CONTROLLER PAGES
				 */
				$.ajax({
					url: "http://127.0.0.1/theestate/" + controller_pages[controller_pages_counter] + "/check_user_session_started",
					type: "POST",
					dataType: "json",
					data:{
						user_log: user_log
					},
					success: function(data) {
						// console.log('System user session check @' + controller_pages[0]);
						if(data['response'] == 'Missing'){
							window.location.href = 'http://127.0.0.1/theestate/Login';

							// deliver_message(data['message'], 'msg_info');
						}
					}
				})
			}
		}
});