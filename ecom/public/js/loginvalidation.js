$(document).ready(function() {
	

	//The username field must contain only alphabetical or numeric characters.
	$("#username").after("<span id = 'usernameInfo' class = 'info' >The username field must contain only alphabetical or numeric characters.</span>");

	//The password field should be at least 5 characters long.
	$("#password").after("<span id = 'passwordInfo' class = 'info' >The password field should be at least 5 characters long.</span>");

	//The email field should be a valid email address.
	//$("#email").after("<span id = 'emailInfo' class = 'info' >The email field should be a valid email address (should contain @).</span>");
	
	$(".info").hide();

//function for the username;
	$("#username").focusin(function(){
		
		$("#usernameInfo").show();//when you focus on the username row,it will show you the requirment message;
	});
	  
	$("#username").focusout(function(){
	    var regusername = /^[a-zA-Z][a-zA-Z0-9_]*$/;  
        var unameVal = $("#username").val();
        
        //If the field is empty, the notification element should be hidden.
        if(unameVal.length == 0){
        	$("#usernameInfo").hide();
			$("#usernameInfo").removeClass();
			$("#usernameInfo").addClass("info");
			$("#usernameInfo").text("The username field must contain only alphabetical or numeric characters.");
        	}
		else{
				
				//If the field is non-empty and the form field does not validate, 
				//the notification element’s text should be “Error”, its class should be “error”, and it should be visible.
				if(!regusername.test(unameVal))
				{
		   			$( "#usernameInfo" ).removeClass();//delete the old class;
					$( "#usernameInfo" ).addClass("error");//add the error class;
					$( "#usernameInfo" ).text("Error");//show the Error message;
				}

				//If the field is non-empty and the form field validates, 
				//the notification element’s text should be “OK”, its class should be “ok”, and it should be visible.
				else
				{
			   		$( "#usernameInfo" ).removeClass();//delete the old class;
					$( "#usernameInfo" ).addClass("ok");//add the ok class;
					$( "#usernameInfo" ).text("OK");//show the OK message;
				}
	  		} 
	  	});
	  
	
	//function for the password;
	$("#password").focusin(function(){
		$("#passwordInfo").show();	//when you focus on the password row,it will show you the requirment message;
	  
	});  
	$("#password").focusout(function(){
        var pword = $("#password").val();
		
        //If the field is empty, the notification element should be hidden.
		if(pword.length==0)
		{
		   	$("#passwordInfo").hide();
			$("#passwordInfo").removeClass();
			$("#passwordInfo").addClass("info" );
			$("#passwordInfo").text("The password field should be at least 5 characters long.");		}
		
		//If the field is non-empty and the form field validates, 
		//the notification element’s text should be “OK”, its class should be “ok”, and it should be visible.
		else if(pword.length>=5)
		{
		   	$( "#passwordInfo" ).removeClass();
			$( "#passwordInfo" ).addClass("ok");
			$( "#passwordInfo" ).text("OK");		
		}
		
		//If the field is non-empty and the form field does not validate, 
		//the notification element’s text should be “Error”, its class should be “error”, and it should be visible.
		else
		{
			$( "#passwordInfo" ).removeClass();
			$( "#passwordInfo" ).addClass( "error" );
			$( "#passwordInfo" ).text("Error");
		}
	}); 
	 

	//function for the email :
	// $("#email").focusin(function(){
	// 	$("#emailInfo").show();	

	// });  
  //   $("#email").focusout(function(){
  //       var mail = $("#email").val();
		// var rugemail= /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
		
  //        //If the field is empty, the notification element should be hidden.
		// if(mail.length == 0){
		// 	$("#emailInfo").hide();
		// 	$("#emailInfo").removeClass();
		// 	$("#emailInfo").addClass("info");
		// 	$("#emailInfo").text("The email field should be a valid email address.");
			
		// }
		// else{
			
		// 	//If the field is non-empty and the form field does not validate, 
		// 	//the notification element’s text should be “Error”, its class should be “error”, and it should be visible.
		// 	if(!rugemail.test(mail))
		// 	{
		// 	   	$("#emailInfo").removeClass();
		// 		$("#emailInfo").addClass("error");
	// 			$("#emailInfo").text("Error");
	// 		}


	// 		//If the field is non-empty and the form field validates, 
	// 		//the notification element’s text should be “OK”, its class should be “ok”, and it should be visible.
	// 		else
	// 		{
	// 		   	$("#emailInfo").removeClass();
	// 			$("#emailInfo").addClass("ok");
	// 			$("#emailInfo").text("OK");
	// 		}
	//     }
	// }); 	
});

