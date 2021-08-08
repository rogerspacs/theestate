$(document).ready(function(){

	/**
	 *  GET THE VISITOR'S LOCATION
	 *  AND STORE THE VALUE IN THE
	 *  SPAN
	 */
	$.getJSON("https://api.ipify.org?format=json", function(data) {

        /**
         * GET DEVICE IP ADDRESS
         */
         var device_ip = data.ip;
         // console.log(device_ip);

         /**
          * GET USER LOCATION
          */
		var location = '';
       $.getJSON("http://ip-api.com/json/" + device_ip, function (data) {//"https://ipapi.co/"+ device_ip+"/json/",
        	
            $.each(data, function (key, value) {
                location += key + " " + value + ", ";
            });
            // console.log(location);
            // $('#recieved_location').text(location);
            //STORE LOCATION
            sessionStorage.setItem('visitor_location', location);
        });
    });

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
							console.log(data);
							
							if(data['response'] == 'Success'){
								/**
								 * RELOCATE TO LOGIN PAGE
								 */
								window.location.href = 'http://127.0.0.1/theestate/Login';

							}
								
						}
					});
				} else {
					alert('password and reg_confirm_password');
				}
			}else{
				alert('All fields are required');
			}
		}else{
			alert('Accept the terms of service pleace before proceding');
		}
	});

	$('#login_form').on('submit', function(event){
		event.preventDefault();
		var email = $('#login_email').val();
		var password = $('#login_password').val();
		var session_type = ($('#keep_me_signed_in').prop('checked')) ? 1 : 0;

		if (email == "" && password == "") {
			alert("All field must be filled");
		} else {
			console.log(email + ' ' + password + ' ' + session_type);
			var visitor_location = sessionStorage.getItem('visitor_location') //$('#recieved_location').text();
			handle_location = (visitor_location != '') ? visitor_location : 'status success, country Uganda, countryCode UG, region C, regionName Central Region, city Kampala, zip , lat 0.3162, lon 32.5657, timezone Africa/Kampala, isp University of Kisubi, org , as AS327687 Research and Education Network for Uganda, query 196.43.149.142,';
			// if(visitor_location != '')
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
				url:"Login/user_login",
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

					// console.log(visitor_location)
					console.log(data);

					/**
					 *  STORE USERNAME AS SESSION
					 *  TO BE USED LATER IN THE LOGOUT
					 *  SECTION
					 */
		            sessionStorage.setItem("user_log", data['message']);

					/**
					 * CHECK IF USER IS ADMIN,OWNER,OR BUYER
					 */
					if(data['user_type'] == 1){
						window.location.href = 'http://127.0.0.1/theestate/Dashboard';

					}
					if(data['user_type'] == 2){
						window.location.href = 'http://127.0.0.1/theestate/Dashboard';

					}
					if(data['user_type'] == 3){
						window.location.href = 'http://127.0.0.1/theestate/Owner_dashboard';

					}
					
				}
			});
		}
	});

	

});