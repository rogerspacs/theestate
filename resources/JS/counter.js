$(document).ready(function(){

   window.onload = countdown(100);

   var myVar;
   function countdown(val)
   {
	  var counter=val;
	
	  myVar= setInterval(function(){ 
			    	if(counter >= 0){
					  $("#countdown").html(counter+' <small>s</small>');
					}
			    	if(counter<0){
			    		counter = 100
					  $("#countdown").html(counter+' <small>s</small>');
					}
					counter--;		
			  	}, 1000)
	
    }

   // function set_count(){
	  // clearInterval(myVar);
	  // var count_val=document.getElementById("counter_val").value;
	  // countdown(count_val);
   // }
});

