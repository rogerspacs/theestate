$(document).ready(function(){

	   /**
	    * SEND LOGID TO THE CONTROLLERS TO CHECK WEATHER THE USER IS ALREADY LOGED IN
	    */
	    send_user_log()
	    
	    function send_user_log(){
	    	var user_log = 'nothin';
	    	if(sessionStorage.getItem('user_log')!= null){
	    		$user_log = sessionStorage.getItem('user_log');
	    	}
	    	// const main_controllers = ['Dashboard', 'Home'];
	    	// for(main_controller_counter = 0; main_controller_counter < main_controllers.length; ++main_controller_counter){
	    		$.ajax({
					url:"http://127.0.0.1/theestate/Home/check_user_session_started",
					type: "POST",
					dataType: "json",
					data: {
						user_log: user_log
					},
					success: function(data){

				        console.log(data)

					}
				});
	    	// }
	    }
});