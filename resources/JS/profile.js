$(document).ready(function(){

	// LOAD OTHER PROFILE IMAGES
	if(sessionStorage.getItem('user_images') != null && sessionStorage.getItem('user_images') != ""){
		var user_images = sessionStorage.getItem('user_images');
		// GET THE IMAGES AND THEIR DATES
		var user_images_array_with_dates = user_images.split(',');
		// console.log(user_images_array_with_dates);

		// PREPARE AN ARRAY TO HOLD IMAGES/DATES
		var image_array =[]

    	var perticuler_image = '';

		//PREPARE AN ARRAY TO HOLD IMAGES/DATES    	 
    	var both_dates = [];
    	// date_text = '';


    	for(image_with_date_counter = 1; image_with_date_counter < user_images_array_with_dates.length; ++image_with_date_counter){
    		// SEPERATE THE IMAGE FROM DATES
			var user_images_array = user_images_array_with_dates[1].split(':');
			// STORE THE IMAGE IN IMAGE ARRAY
			image_array.push(user_images_array[0]);
			// STORE THE DATES IN THE DATE ARRAY
			both_dates.push(user_images_array[1]);

			// SEPERATE THE SET DATE FROM THE CHANGE DATE
			var datess= both_dates[0].split('-');
			// STORE CHANGE DATE HERE
			var status_change_date_array = datess[1];
			// STORE SET DATE HERE
			var set_date_array = datess[0];

			// GET ACTUAL DATE FROM THE 
			get_real_dates('set_date'+set_date_array[image_with_date_counter], set_date_array[image_with_date_counter]);
			// GET ACTUAL DATE FROM THE 
			get_real_dates('status_change_date'+status_change_date_array[image_with_date_counter], status_change_date_array[image_with_date_counter]);



    		perticuler_image += '<div class="particuler_image">';
				perticuler_image += '<div class="set_image">';
					perticuler_image += '<img src="http://127.0.0.1/theestate/resources/images/users/'+user_images_array[0]+'" class="">';
				perticuler_image += '</div>';
				perticuler_image += '<div class="set_date">';
					perticuler_image += '<span><b>Set on: </b>'+sessionStorage.getItem('set_date'+set_date_array[image_with_date_counter])+'</span>';
					perticuler_image += '<span><b>Chenged on: </b>'+sessionStorage.getItem('status_change_date'+status_change_date_array[image_with_date_counter])+'</span>';
				perticuler_image += '</div>';
				perticuler_image += '<div class="image_action">';
					perticuler_image += '<i class="las la-plus"></i>';
					perticuler_image += '<i class="las la-times"></i>';
				perticuler_image += '</div>';
			perticuler_image += '</div>';
		}
		// console.log(image_array)

    	$('.previous').html(perticuler_image);
	}

	function get_real_dates(session_value, date_unixtime){
		$.ajax({
		 	url:"http://127.0.0.1/theestate/Signup/get_change_to_date",
			type: "POST",
			dataType: "json",
			data: {
					date_unixtime: date_unixtime
			},
			success: function(data){
				// console.log(data);
				sessionStorage.setItem(session_value, data);

			}
		 });
	}

});