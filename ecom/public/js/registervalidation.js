$(document).ready(function() {

	
	$("#username").parent().after('<td><span id="usn"></span></td>');
	
        $("#password").parent().after('<td><span id="psw"></span></td>');
	   
        $("#email").parent().after('<td><span id="eml"></span></td>');
	
        $("#usn").hide();
	
        $("#psw").hide();
	
        $("#eml").hide();

        $("#username").focusin(function() {
		
	     $("#usn").text("Username must comtain only alphabetical or numeric characters. ");
	
	     $("#usn").addClass("info");
		
             $("#usn").show();
	});


	
        $( "#password" ).focusin(function() {
			
             $("#psw").text("Password must be at least 5 characters long. ");
	
	     $("#psw").addClass("info");
			
             $("#psw").show();
	});


	
       $("#email").focusin(function() {
		
     	     $("#eml").text("Email must contains @ and .,and must end with 3 characters after .");
	
   	     $("#eml").addClass("info");
		
             $("#eml").show();
	});

	

       $("#username").blur(function(){
	
             var usname = $("#username").val();	
             if(usname.length<=0){
		
       	          $("#usn").hide();
		} 
             else if(usname.match(/^[a-zA-Z0-9]+$/)){
	
 		  $("#usn").text("OK");
			
                  $("#usn").removeClass("info");
		
             	  $("#usn").addClass("ok");
		} 
              else{
			
                   $("#usn").text("Error");
			
                   $("#usn").removeClass("info");
		
    	           $("#usn").addClass("error");
		}
	
           });

	

           $("#password").blur(function(){

                 var pwd = $("#password").val();		
	         if(pwd.length<=0){
			
                     $("#psw").hide();
		} 
                 else if(pwd.length >= 5){
			
                      $("#psw").text("OK");
			
                      $("#psw").removeClass("info");
			
                      $("#psw").addClass("ok");
		} 
                  else{
			
                       $("#psw").text("Error");
	
  		       $("#psw").removeClass("info");
			
                       $("#psw").addClass("error");
		}
	
            });

	

            $("#email").blur(function(){

                   var m = $("#email").val();		
		   if(m.length<=0){
			
                              $("#eml").hide();
		} 
                    else if(m.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/)){
			
                               $("#eml").text("OK");
			
                               $("#eml").removeClass("info");
			
                               $("#eml").addClass("ok");
		} 
                    else{
			
                               $("#eml").text("Error");
			
                               $("#eml").removeClass("info");
			
                               $("#eml").addClass("error");
		}
	
             });


});