$(document).ready(function(){
	
	 $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                
            }
            else if($(this).prop("checked") == false){
				$("#c2").css("border-color", "#FF0000");
        		$('#submit').attr('disabled',true);
        		$("#error_c2").text("* You have to check term & condition!");
                //alert("Checkbox is unchecked.");
            }
        });
	
	//var MEDIA_URL='http://webz-engine.com/sample/orange_state2/';
		$flag=1;
    	$("#myName").focusout(function(){

    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_name").text("* You have to enter your first name!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_name").text("");

        	}
       });
        $("#lastname").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_lastname").text("* You have to enter your Last name!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_lastname").text("");
        	}
       });
       /*  $("#dob").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_dob").text("* You have to enter your Date of Birth!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_dob").text("");
        	}
       }); */
        /* $("#gender").focusout(function(){
        	$(this).css("border-color", "#2eb82e");
       
       }); */
	   
			function IsEmail(email) {
			  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			  if(!regex.test(email)) {
				return false;
			  }else{
				return true;
			  }
			}
			$("#email").focusout(function(){
			var email = $('#email').val();	
			if(IsEmail(email)==false){
			$('#submit').attr('disabled',true);
			$("#error_age").text("* You have to enter your Email!");
			return false;
			}
			/*var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test($("#email").val())){
			$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_age").text("* You have to enter your Email!");
		}else
        	{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_email").text("");

        	}*/
			
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_age").text("* You have to enter your Email!");
        	}
        	else
        	{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_email").text("");

        	}
        	});
			
			////////////////////////////////////////
			$("#password").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_password").text("* You have to enter your password!");
        	}
        	else
        	{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_password").text("");

        	}
        	});
			
			
			$("#repeat-password").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_repeat-password").text("* You have to enter your repeat password!");
        	}
        	else
        	{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_repeat-password").text("");

        	}
        	});
			///////////////////////////////////////
        $("#phone").focusout(function(){
            $pho =$("#phone").val();
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_phone").text("* You have to enter your Phone Number!");
        	}
        	else if ($pho.length!=10)
        	{   
                    $(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_phone").text("* Lenght of Phone Number Should Be Ten");
        	}
        	else if(!$.isNumeric($pho))
        	{
        	        $(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_phone").text("* Phone Number Should Be Numeric");  
        	}
        	else{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_phone").text("");
        	}

    	});

   		$( "#submit" ).click(function() {
   			if($("#myName" ).val()=='')
   			{
        		$("#myName").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_name").text("* You have to enter your first name!");
        	}
        	if($("#lastname" ).val()=='')
   			{
        		$("#lastname").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_lastname").text("* You have to enter your Last name!");
        	}
   			if($("#dob" ).val()=='')
   			{
        		$("#dob").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_dob").text("* You have to enter your Date of Birth!");
        	}
   			if($("#email" ).val()=='')
   			{
        		$("#email").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_email").text("* You have to enter your Email!");
        	}
			
			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test($("#email" ).val())){
				
			// Do whatever if it passes.
			}else{ $("#email").css("border-color", "#FF0000");
        		$('#submit').attr('disabled',true);
        		$("#error_email").text("* You have to enter your Email!");}
				
        	if($("#phone" ).val()=='')
   			{
        		$("#phone").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_phone").text("* You have to enter your Phone Number!");
        	}
			
			////////////////////////////////////
			if($("#password" ).val()=='')
   			{
        		$("#password").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_password").text("* You have to enter your password!");
        	}
			
			
			
			
			if($("#repeat-password" ).val()=='')
   			{
        		$("#repeat-password").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_repeat-password").text("* You have to enter your repeat password!");
        	}
			if($("#password" ).val() != $("#repeat-password" ).val()){
				$("#repeat-password").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_repeat-password").text("* You have to enter your repeat password!");
			}
			
			
			
			///////////////////
			});
jQuery(document).on("click", "#submit ", function(e){
/////////////////////////////////Register document////////////////////////////////////
	
		var MEDIA_URL='http://webz-engine.com/sample/orange_state2/';
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_signup.php';
		
			e.preventDefault();
			//jQuery(".saveit").text("uploading..").attr("disabled",true);

			//var errorhandler1 = jQuery(".errorHandler");
			//var successHandler1 = jQuery(".successHandler");
			var el = jQuery("#submit");
			el.block({
				overlayCSS: {
					backgroundColor: '#fff'
				},
				message: '<img src="'+MEDIA_URL+'/images/loading.gif" /> Just a moment...',
				css: {
					border: 'none',
					color: '#333',
					background: 'none'
				}
			});
		
					var name = $("#myName").val();
					var email = $("#email").val();
					var password = $("#password").val();
					var lastname = $("#lastname").val();
					var phone = $("#phone").val();
					var country = $("#country").val();
					var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&lastname='+ lastname + '&phoneno='+ phone + '&country='+ country;
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					 data: dataString,
            	    type: 'POST',			
            	    success: function (response) {
						el.unblock();
						
						  var data1 = jQuery.parseJSON(response);
      
			
            		  // alert(response);
            		   
                       if(data1.status==true){
                           // $('#success').html('Added');  
                             window.location = "http://webz-engine.com/sample/orange_state2/veryfyotp.php";
                             window.location.href = "http://webz-engine.com/sample/orange_state2/veryfyotp.php";
                         // window.location.href= MEDIA_URL+'veryfyotp.php';
            		    }else{
            		         $('#success').html(data1.message);  
            		         
            		        
						//   window.location.href= MEDIA_URL+'veryfyotp.php';
            		        
            		    }
            		    
            		  
            		   
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            	         alert("Error While this addiing a record");
            				el.unblock();
            		    
            	    }
            	});
            	
            	
	 
	});
	////////////////////////////////Register company////////////////////////////////////
	jQuery(document).on("click", "#companysubmit ", function(e){
		//alert('hello');
			$("#company-name").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#company-name').attr('disabled',true);
        			$("#error_com").text("* You have to enter your repeat password!");
        	}
        	else
        	{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#companysubmit').attr('disabled',false);
        		$("#error_com").text("");

        	}
        	});
		
			if($("#company-name" ).val()=='')
   			{
        		$("#company-name").css("border-color", "#FF0000");
        			$('#companysubmit').attr('disabled',true);
        			 $("#error_com").text("* You have to enter your page name!");
        	}
	
		var MEDIA_URL='http://webz-engine.com/sample/orange_state2/';
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_page_creation.php';
		
			e.preventDefault();
			//jQuery(".saveit").text("uploading..").attr("disabled",true);

			//var errorhandler1 = jQuery(".errorHandler");
			//var successHandler1 = jQuery(".successHandler");
			var el = jQuery("#companysubmit");
			el.block({
				overlayCSS: {
					backgroundColor: '#fff'
				},
				message: '<img src="'+MEDIA_URL+'/images/loading.gif" /> Just a moment...',
				css: {
					border: 'none',
					color: '#333',
					background: 'none'
				}
			});
		
					var companyname = $("#company-name").val();
					var category = $("#category").val();					
					var country = $("#country1").val();
					var dataString ='companyname =' + companyname + '&category='+ category + '&country='+ country;
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					 data: dataString,
            	    type: 'POST',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#company_error').html(data);  
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	//$('#company_error').html('Page not created !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	////////////////////////////////User Profile////////////////////////////////////
	
	
jQuery("#file").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var MEDIA_URL='http://webz-engine.com/sample/orange_state2/upload/';
var social_AjaxURL='http://webz-engine.com/sample/orange_state2/imageupload.php';
        var fd = new FormData();
        var files = $('#file')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
               
                if(response != 0){
                    //alert(response);
                    jQuery("#rmvid").hide();
                    jQuery(".left-uploaded-img").html('<img src="'+MEDIA_URL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 jQuery('#imgid').val(response); 
                }else{
                    jQuery('#file').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });

	
jQuery(document).on("click", "#profilesubmit ", function(e){
  
		var form=jQuery("#formuserprofile");
		
		var img=jQuery("#profileimg").val();
		
		var MEDIA_URL ='http://webz-engine.com/sample/orange_state2/';
		
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_user_profile.php';
		
			e.preventDefault();
		
			var el = jQuery("#formuserprofile");
			
			
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data:  {		
						"formData" : form.serialize()
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#p_error').html(data);  
						   window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	//////////////////////Multiple file Upload for post/////////////////////// 
	jQuery("#upload_file").on('change', function() {
var social_AjaxURL='http://webz-engine.com/sample/orange_state2/upload.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('upload_file').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('upload_file').files[index]);
   }

   // AJAX request
   $.ajax({
     url: social_AjaxURL, 
     type: 'post',
     data: form_data,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {
		jQuery('#imgid').val(response); 
       /* for(var index = 0; index < response.length; index++) {
         var src = response[index];
		alert(src);
         // Add img element in <div id='preview'>
         $('#show').append('<img src="'+src+'" width="200px;" height="200px">');
       } */

     }
   });

});
///////////post submit/////////////////
jQuery(document).on("click", "#uploadpost ", function(e){
  
		var form=jQuery("#uploadForm");
		
		//var img=jQuery("#profileimg").val();
		
		var MEDIA_URL ='http://webz-engine.com/sample/orange_state2/';
		
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_post.php';
		
			e.preventDefault();
		
			var el = jQuery("#uploadForm");
			
			
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data:  {		
						"formData" : form.serialize()
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   //data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	});
	

///////////post like/////////////////
jQuery(document).on("click", "#like2", function(e){
  
		
		var l_id = jQuery(this).attr('like1');
		
		
		//var img=jQuery("#profileimg").val();
		
		var MEDIA_URL ='http://webz-engine.com/sample/orange_state2/';
		
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_like.php';
		var dataString ='postid='+l_id ;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#like').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	
	
	///////////post follow/////////////////
jQuery(document).on("click", "#follow", function(e){
  
		alert('hlo');
		var f_id = jQuery(this).attr('fid');
		//alert(l_id);
		
		//var img=jQuery("#profileimg").val();
		
		var MEDIA_URL ='http://webz-engine.com/sample/orange_state2/';
		
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_follow.php';
		var dataString ='fid =' + f_id ;
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	
///////////post comment/////////////////
jQuery(document).on("click", "#commentid ", function(e){
  
		var form=jQuery("#commentForm");
		
		
		var rcom=jQuery("#rpostcomment").val();
		//alert(rcom);
		
		var MEDIA_URL ='http://webz-engine.com/sample/orange_state2/';
		
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_comment.php';
		
			e.preventDefault();
		
			var el = jQuery("#commentForm");
			
			
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data:  {		
						"formData" : form.serialize()
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	///////////post reply/////////////////
jQuery(document).on("click", "#replyid ", function(e){
  
		var form=jQuery("#replyForm");
		
		//var img=jQuery("#profileimg").val();
		
		var MEDIA_URL ='http://webz-engine.com/sample/orange_state2/';
		
		var social_AjaxURL='http://webz-engine.com/sample/orange_state2/ajax_reply.php';
		
			e.preventDefault();
		
			var el = jQuery("#replyForm");
			
			
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data:  {		
						"formData" : form.serialize()
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   //$('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
jQuery(document).on("click", ".com", function(e){
	
	$("#commentdisplay").css("display", "block");
	jQuery('#commentdisplay').focus();

}	);

jQuery(document).on("click", "#replyiddiv", function(e){
	
	var cid = jQuery(this).attr('cid');
	
	$("#replydisplay"+cid).css("display", "block");
	jQuery('#replydisplay'+cid).focus();

}	);
//////////////////comment Image//////////////////////	
jQuery("#cimageupload").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var MEDIA_URL='http://webz-engine.com/sample/orange_state2/upload/';
var social_AjaxURL='http://webz-engine.com/sample/orange_state2/commentimageupload.php';
        var fd = new FormData();
        var files = $('#cimageupload')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
               data=data.replace(/\s+/g,"");
                if(data != 0){
                    //alert(response);
                   // jQuery("#rmvid").hide();
                    //jQuery(".left-uploaded-img").html('<img src="'+MEDIA_URL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 jQuery('#cimage').val(data); 
                }else{
                    jQuery('#file').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });
	
	///////////////////////reply Image////////////////////////
	
	jQuery("#rimageupload").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var MEDIA_URL='http://webz-engine.com/sample/orange_state2/upload/';
var social_AjaxURL='http://webz-engine.com/sample/orange_state2/replyimageupload.php';
        var fd = new FormData();
        var files = $('#rimageupload')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
               data=data.replace(/\s+/g,"");
                if(data != 0){
                    //alert(response);
                    //jQuery("#rmvid").hide();
                    //jQuery(".left-uploaded-img").html('<img src="'+MEDIA_URL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 jQuery('#rimage').val(data); 
                }else{
                    jQuery('#file').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });
