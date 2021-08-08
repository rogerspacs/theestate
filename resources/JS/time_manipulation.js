$(document).ready(function(){
	// $("#reg_form").on('submit', function(event){
	// 	event.preventDefault();
	// 	var dob = $('#reg_dob').val();
	// 	get_browzer_timezone()

	// 	/**
	// 	 * SEND TIMEZONE OFFSET MINUTES TO
	// 	 * PHP FOR PROCESSING
	// 	 */
	// 	 $.ajax({
	// 	 	url:"http://127.0.0.1/theestate/Signup/convert_given_date_to_unix_timestamp",
	// 		type: "POST",
	// 		dataType: "json",
	// 		data: {
	// 			dob: dob
	// 		},
	// 		success: function(data){
	// 			console.log(data);
	// 		}
	// 	 });
	// });

	function get_browzer_timezone(){
		/**
		 * GET USER BROWSERS TIMEZON
		 */
		var timezone_offset_minutes = new Date().getTimezoneOffset();
		timezone_offset_minutes = (timezone_offset_minutes == 0) ? 0 : -timezone_offset_minutes;

		// Timezone difference in minutes such as 330 or -360 or 0
		console.log(timezone_offset_minutes);

		/**
		 * SEND TIMEZONE OFFSET MINUTES TO
		 * PHP FOR PROCESSING
		 */
		 $.ajax({
		 	url:"http://127.0.0.1/theestate/Signup/get_timezone",
			type: "POST",
			dataType: "json",
			data: {
				timezone_offset_minutes: timezone_offset_minutes
			},
			success: function(data){
				console.log(data);
			}
		 });
	}

	// $.ajax({
	// 	url: "http://127.0.0.1/theestate/Signup/convert_unix_time_to_date",
	// 	type: "POST",
	// 	dataType: "json",
	// 	data: {
	// 		min: 3
	// 	},
	// 	success: function(data){
	// 		console.log(data)
	// 	}
	// });
});