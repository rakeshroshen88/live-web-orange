<html lang="en">
  <head>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="664380665812-8b9mqe830i9ibuer9b3g9l14tga0n0tl.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
   
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
		////////////////////////////////
		
		var dataString = 'name1='+ profile.getName() + '&email1='+ profile.getEmail() + '&password1='+ profile.getId() + '&lastname='+ profile.getGivenName() ;
		var social_AjaxURL='http://orangestate.ng/loginwithgoogle.php';
		jQuery.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					 data: dataString,
            	    type: 'POST',			
            	    success: function (response) {
						
						
						  var data1 = jQuery.parseJSON(response);
      
			
            		  // alert(response);
            		   
                       if(data1.status==true){
                           // $('#success').html('Added');  
                         window.location = "http://orangestate.ng/dashboard.php";
                         window.location.href = "http://orangestate.ng/dashboard.php";
                         // window.location.href= MEDIA_URL+'veryfyotp.php';
            		    }else{
            		         jQuery('#success').html(data1.message);  
            		         
            		        
						//   window.location.href= MEDIA_URL+'veryfyotp.php';
            		        
            		    }
            		    
            		  
            		   
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            	         alert("Error While this addiing a record");
            				
            		    
            	    }
            	});
		
      }
    </script>
  </body>
</html>