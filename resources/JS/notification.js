$(document).ready(function(){
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
		 function showMessage(message){ 
		 	if(!close_clicked){
				if($('.notification_messages'). hasClass('disabled')){
					$('.notification_messages').removeClass('disabled');
				}
				
				$('.notification_messages').addClass('message_show');
				$('.notification_messages span').text(message);
		 	}
		}

		/**
		 * HIDE THE MESSAGE, START BY UNDOING SHOW FUNCTIONS' WORK 
		 * (REMOVE THE MESSAGE SHOW CLASS)
		 */
		 function hideMessage(){ 
			if($('.notification_messages'). hasClass('message_show')){
				$('.notification_messages').removeClass('message_show');
			}
			$('.notification_messages').addClass('disabled');
		}

		/**
		 * SHOW THE MESSAGE FOR JUST 30 SECONDS AND THEN HIDE IT,
		 * BEFORE HIDING THE MESSAGE FIRST CHECK IF THE CLOSE 
		 * MESSAGE ICON HAS BEEN CLICK, IF ITS CLICK DON'T TRY
		 * HIDING IT BECAUSE IT IS ALREADY HIDEN BY USER'S HELP 
		 */
		function deliver_message(message) {
			var counter = 0;

			var notificationtimer = setInterval(function(){ 
				if (counter < 20) {
					showMessage(message);
				}else{
				 	if(!close_clicked){
						hideMessage();
					}
				}

				if (counter == 20) {
					clearInterval(notificationtimer);
				}
				counter++;
			}, 1000);
		}

		 deliver_message('System check 3');
	// ---------------------------------------------------------------

});