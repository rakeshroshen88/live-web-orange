$(document).ready(function(){
	/*Swal.fire({
  title: "<i>Title</i>", 
  html: "Testno  sporocilo za objekt: <b>test</b>",  
  confirmButtonText: "V <u>redu</u>", 
});*/
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
	
	//var BASEURL='http://orangestate.ng/';
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
			
			$("#password").focusout(function(){
	var p = $("#password" ).val();
	//alert(p);
    var errors = [];
    if (p.length < 8) {
        errors.push("Your password must be at least 8 characters");
    }
    if (p.search(/[a-z]/i) < 0) {
        errors.push("Your password must contain at least one letter."); 
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (errors.length > 0) {
        //alert(errors.join("\n"));
		$("#password").css("border-color", "#FF0000");
        $('#submit').attr('disabled',true);
        $("#error_password").text(errors.join("\n"));
        return false;
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
			
	$("#password").focusout(function(){
	var p = $("#password" ).val();
	//alert(p);
    var errors = [];
    if (p.length < 8) {
        errors.push("Your password must be at least 8 characters");
    }
    if (p.search(/[a-z]/i) < 0) {
        errors.push("Your password must contain at least one letter."); 
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (errors.length > 0) {
        //alert(errors.join("\n"));
		$("#password").css("border-color", "#FF0000");
        $('#submit').attr('disabled',true);
        $("#error_password").text(errors.join("\n"));
        return false;
    }
			 });
			
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
	
		var BASEURL='http://orangestate.ng/';
		var social_AjaxURL='http://orangestate.ng/ajax_signup.php';
		
			e.preventDefault();
			//jQuery(".saveit").text("uploading..").attr("disabled",true);

			//var errorhandler1 = jQuery(".errorHandler");
			//var successHandler1 = jQuery(".successHandler");
			var el = jQuery("#submit");
			el.block({
				overlayCSS: {
					backgroundColor: '#fff'
				},
				message: '<img src="'+BASEURL+'/images/loading.gif" /> Just a moment...',
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
					
					var countrycode = $("#countrycode").val();
					var country = $("input[name=country]").val();
					var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&lastname='+ lastname + '&phoneno='+ phone + '&country='+ country + '&countrycode='+ countrycode;
					
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
                             window.location = "http://orangestate.ng/veryfyotp.php";
                             window.location.href = "http://orangestate.ng/veryfyotp.php";
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
	
		var BASEURL='http://orangestate.ng/';
		var social_AjaxURL='http://orangestate.ng/ajax_page_creation.php';
		
			e.preventDefault();
			
			var el = jQuery("#companysubmit");
			el.block({
				overlayCSS: {
					backgroundColor: '#fff'
				},
				message: '<img src="'+BASEURL+'/images/loading.gif" /> Just a moment...',
				css: {
					border: 'none',
					color: '#333',
					background: 'none'
				}
			});
		
					var companyname = $("#company-name").val();
					var category = $("#category").val();					
					var country = $("#country1").val();
					var dataString ='companyname=' + companyname + '&category='+ category + '&country='+ country;
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					 data: dataString,
            	    type: 'POST',			
            	    success: function (data) {
            		   //data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1000
						  
						}); 
						   
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
	var BASEURL='http://orangestate.ng/upload/';
	var social_AjaxURL='http://orangestate.ng/imageupload.php';
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
                    jQuery(".left-uploaded-img").html('<img src="'+BASEURL + response +'" />');
                    
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
		
		var BASEURL ='http://orangestate.ng/';
		
		var social_AjaxURL='http://orangestate.ng/ajax_user_profile.php';
		var selected = new Array();


$("input:checkbox[name=area]:checked").each(function(){
    selected.push($(this).val());
});
			e.preventDefault();
		
			var el = jQuery("#formuserprofile");
			
			
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data:  {		
						"formData" : form.serialize(),
						"area" :selected
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#p_error').html(data);  
						   window.location.href= BASEURL+'index.php';
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
   var social_AjaxURL='http://orangestate.ng/upload.php';
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
		 //alert(response);
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
		var social_AjaxURL='http://orangestate.ng/ajax_post.php';
		
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
jQuery(document).on("click", ".like2", function(e){ 
		
		var l_id = jQuery(this).attr('like1');
		
		var social_AjaxURL='http://orangestate.ng/ajax_like.php';
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
						$("#like2").html('');
						$("#like"+l_id).html('<i class="fas fa-heart"></i>'+data);
						//$(".like2").addClass("likes");
						   
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		   /*  }
            		    else {
            		   	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    } */
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	


	
		
	///////////post follow/////////////////
jQuery(document).on("click", "#follow", function(e){
  
		
		var f_id = jQuery(this).attr('fid');
		var social_AjaxURL='http://orangestate.ng/ajax_follow.php';
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
	
	
	
	///////////post follow/////////////////
//jQuery(document).on("click", ".follownew", function(e){
  $(".follownew").on('click', function(event){
		
		var f_id = jQuery(this).attr('fid');		
		var social_AjaxURL='http://orangestate.ng/ajax_follow.php';
		var dataString ='followid=' + f_id ;
	
    	$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
						
            		   //data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   $('#follownew'+f_id).html('');
					   $('#follownew'+f_id).html('following');					   
                      /*  if(data != 0){
						   Swal.fire({
						  type: 'success',
						  title: '',
						  text: data
						  
						}); */
						  // $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            
	});
	
	
///////////post comment/////////////////
jQuery(document).on("click", ".commentid ", function(e){
		var c_id = jQuery(this).attr('cid');	
		var postcomment=jQuery("#postcomment"+c_id).val();
		var pid=jQuery("#pid"+c_id).val();
		var uid=jQuery("#uid"+c_id).val();		
		var cimage=jQuery("#cimage"+c_id).val();
		var dataString ='pid='+pid+'&uid='+uid+'&postcomment='+postcomment+'&cimage='+cimage;
		//var form=jQuery("#commentForm");
		//var rcom=jQuery("#rpostcomment").val();
		
		var social_AjaxURL='http://orangestate.ng/ajax_comment.php';
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data: dataString,
					
            	    success: function (data) {
						
            		   //data=data.replace(/\s+/g,"");
					  // $('.comment-listing').html(data);
						$('#commentdisplay'+c_id).html(data);					   
                       if(data != 0){
						  
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
jQuery(document).on("click", ".replyid ", function(e){
  
		var social_AjaxURL='http://orangestate.ng/ajax_reply.php';
		var c_id = jQuery(this).attr('rid');	
		var postcomment=jQuery("#rpostcomment"+c_id).val();
		var pid=jQuery("#pid"+c_id).val();
		var cid=jQuery("#cid"+c_id).val();
		var uid=jQuery("#uid"+c_id).val();		
		var rimage=jQuery("#rimage"+c_id).val();
		var dataString ='pid='+pid+'&uid='+uid+'&rpostcomment='+postcomment+'&rimage='+rimage+'&cid='+cid;
		
			
					
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					data: dataString,
            	    			
            	    success: function (data) {  
					
                       if(data != 0){
						  $('#replydisplay'+c_id).html(data);  	 
						
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
	var cid = jQuery(this).attr('cid');
	$("#commentdisplay"+cid).css("display", "block");
	jQuery('#commentdisplay'+cid).focus();

}	);

jQuery(document).on("click", "#replyiddiv", function(e){
	
	var cid = jQuery(this).attr('cid');
	
	$("#replydisplay"+cid).css("display", "block");
	jQuery('#replydisplay'+cid).focus();

}	);
//////////////////comment Image//////////////////////	
jQuery("#cimageupload").on('change', function() {

var social_AjaxURL='http://orangestate.ng/commentimageupload.php';
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
 
var social_AjaxURL='http://orangestate.ng/replyimageupload.php';
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



///////////////////////Delete  Post/////////////////////

///////////post delete/////////////////
jQuery(document).on("click", ".posthide", function(e){
  
		
		var p_id = jQuery(this).attr('hidepost');
		var social_AjaxURL='http://orangestate.ng/ajax_post_hide.php';
		var dataString ='postid='+p_id ;
		
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
						  // $('#like').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 window.location.reload(true);
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
	
///////////post Hide/////////////////
jQuery(document).on("click", ".deletepost", function(e){
  
		
		var d_id = jQuery(this).attr('delpost');
		
		
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/ajax_post_delete.php';
		var dataString ='postid='+d_id ;
		
			e.preventDefault();
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to continue!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {
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
						  // $('#like').html(data);  
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
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'
					 
					})
				}
				})
        
    	
	});
	

	
	///////////Load post /////////////////
jQuery(document).on("click", "#editpost", function(e){
  
		
		var e_id = jQuery(this).attr('editpostid');
		
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/ajax_editpost_form.php';
		var dataString ='postid='+e_id ;
		
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
            		   //data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
						   $('#myModal').modal('show');
						$('#post_body').html(data);  
						//window.location.href= MEDIA_URL+'index.php';
            			// window.location.reload(true);
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Something went wrong!'
  
})
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});

//////////////////////Multiple file Upload for post/////////////////////// 
	
	
jQuery(document).on("click", "#addproduct ", function(e){
  
		var form=jQuery("#AddForm");
	
		var social_AjaxURL='http://orangestate.ng/ajax_add_product.php';
		
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
						$("#experience-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
         	 
                       if(data != 0){
						  Swal.fire({
						  type: 'success',
						  title: '',
						  text: data						  
						}); 
            			 
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
	
	///////////buy now /////////////////
//jQuery(document).on("click", ".bid_now11", function(e){
	jQuery(document).on("click", ".bid_now11", function(e){  
 
		
		var id = jQuery(this).attr('pid');
		
		//var img=jQuery("#profileimg").val();
		
		
	
		var social_AjaxURL='http://orangestate.ng/loadpopup.php';
		var dataString ='id=' + id;
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){					
						//$('#popupid').html(data);
						$('.abc').html(data);
						$("#overview-box").addClass("open");					  
					   $(".wrapper").addClass("overlay");
            		    }
            		    else {
							
							$('#popupid').html('error');
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});

		///////////by now/////////////////
jQuery(document).on("click", ".addtocart", function(e){
  
		
		var id = jQuery(this).attr('pid');
		//var id1 = $("#id"+id).val();
		var task = 'task';//$("#task"+id).val();
		//var tono = $("#tono"+id).val();
		
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/task.php';
		var dataString ='id=' + id + '&task=' + task + '&tono=1';
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						Swal.fire({
  position: 'top-end',
  type: 'success',
  title: data,
  showConfirmButton: false,
  timer: 1500
  
});
						 setTimeout(function(){
							window.location.href= BASEURL+'checkout.php';	
						   }, 2000);
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});


	///////////Load post /////////////////
jQuery(document).on("click", ".btndel", function(e){
  
		
		var id = jQuery(this).attr('pid');
		var task='del';
		
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/cartempty.php';
		var dataString ='id=' + id + '&task=' + task ;
		
			//e.preventDefault();
		Swal.fire({
				  title: 'Are you sure?',
				  text: "want to continue!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {	
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						Swal.fire({
  position: 'top-end',
  type: 'success',
  title: 'Delated',
  showConfirmButton: false,
  timer: 1500
  
});
						 setTimeout(function(){
							window.location.href= BASEURL+'checkout.php';	
						   }, 2000);
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            }
				})	
        
    	
	});
	
	
	
			///////////Search record /////////////////
//jQuery(document).on("click", ".pricelowtohigh", function(e){
  jQuery('#pricelowtohigh').on('change', function() {
		var pricelowtohigh=jQuery("#pricelowtohigh").val();
		if(pricelowtohigh==''){
			pricelowtohigh='';
		}
		var min=jQuery("#min").val();
		if(min==''){
			var minval='';
		}
		var max=jQuery("#max").val();
		if(max==''){
			var maxval='';
		}
		//var id = jQuery(this).attr('pricelowtohigh');
		var social_AjaxURL='http://orangestate.ng/searchdone.php';
		var dataString ='pricelowtohigh=' + pricelowtohigh+'&min=' + min+'&max=' + max;
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						$('.searchrec').html('');
						$('.searchrec').html(data);
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops, Result Not Found',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});

 //jQuery('#pricelowtohigh').on('change', function() {
	 $("#max").keyup(function(e){
	//jQuery( "#min" ).mouseout(function() {
		var pricelowtohigh=jQuery("#pricelowtohigh").val();
		if(pricelowtohigh==''){
			pricelowtohigh='';
		}
		var min=jQuery("#min").val();
		if(min==''){
			var minval='';
		}else{
			var minval=min;
		}
		var max=jQuery("#max").val();
		if(max==''){
			var maxval='';
		}else{
			var maxval=max;
		}
		//var id = jQuery(this).attr('pricelowtohigh');
		var social_AjaxURL='http://orangestate.ng/searchdone.php';
		var dataString ='pricelowtohigh=' + pricelowtohigh+'&min=' + minval+'&max=' + maxval;
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						$('.searchrec').html('');
						$('.searchrec').html(data);
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops, Result Not Found',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	$("#max").keyup(function(e){
	//jQuery( "#max" ).mouseout(function() {
		var pricelowtohigh=jQuery("#pricelowtohigh").val();
		if(pricelowtohigh==''){
			pricelowtohigh='';
		}
		var min=jQuery("#min").val();
		if(min==''){
			var minval='';
		}else{
			var minval=min;
		}
		var max=jQuery("#max").val();
		if(max==''){
			var maxval='';
		}else{
			var maxval=max;
		}
		//var id = jQuery(this).attr('pricelowtohigh');
		var social_AjaxURL='http://orangestate.ng/searchdone.php';
		var dataString ='pricelowtohigh=' + pricelowtohigh+'&min=' + minval+'&max=' + maxval;
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						$('.searchrec').html('');
						$('.searchrec').html(data);
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops, Result Not Found',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
			///////////Load post /////////////////
jQuery(document).on("click", ".addtocartnew", function(e){
  
		
		var id = jQuery(this).attr('pid');
		//var id1 = $("#id"+id).val();
		var task = 'task';//$("#task"+id).val();
		var tono = $("#tono"+id).val();
		if(tono==''){
			tono=1;
		}
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/tasknew.php';
		var dataString ='id=' + id + '&task=' + task + '&tono='+tono;
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  var data1 = jQuery.parseJSON(data);
      
			
            		  // alert(response);
            		   
                       if(data1.status==true){
						   $('#tempshow').html('');
							$('#tempshow').html(data1.tempitem); 
							$('.card-title').html('');
							$('.card-title').html('Your cart('+data1.totalcount+')');
							$('.my-cart-badge').html('');
							$('.my-cart-badge').html(data1.totalcount);
							$('.gt').html('');
							$('.gt').html('₦'+data1.granttotal);
							$('.shiping').html('');
							$('.shiping').html('₦'+data1.shiping);
							Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: data1.message,
						  showConfirmButton: false,
						  timer: 1000
						  
						});
					   }
					   
					   if(data1.status==false){
						  Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						   title: data1.message,
						  showConfirmButton: false,
						  timer: 1000
						  
						}); 
						   
					   }
                       
            		   /* else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }*/
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
				});            	
        
  
  jQuery(document).on("click", ".addtocartnew1", function(e){
  
		
		var id = jQuery(this).attr('pid');
		//var id1 = $("#id"+id).val();
		var task = 'task';//$("#task"+id).val();
		var tono = 1;
		
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/tasknew.php';
		var dataString ='id=' + id + '&task=' + task + '&tono='+tono;
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  var data1 = jQuery.parseJSON(data);
      
			
            		  // alert(response);
            		   
                       if(data1.status==true){
						   $('#tempshow').html('');
							$('#tempshow').html(data1.tempitem); 
							$('.card-title').html('');
							$('.card-title').html('Your cart('+data1.totalcount+')');
							$('.my-cart-badge').html('');
							$('.my-cart-badge').html(data1.totalcount);
							$('.gt').html('');
							$('.gt').html('₦'+data1.granttotal);
							$('.shiping').html('');
							$('.shiping').html('₦'+data1.shiping);
							Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: data1.message,
						  showConfirmButton: false,
						  timer: 1000
						  
						});
					   }
					   
					   if(data1.status==false){
						  Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						   title: data1.message,
						  showConfirmButton: false,
						  timer: 1000
						  
						}); 
						   
					   }
                       
            		   /* else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }*/
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
				});            	
   
  
  jQuery(document).on("click", ".allclear", function(e){
	  $('#min').val('');
	   $('#max').val('');
	   
	   var social_AjaxURL='http://orangestate.ng/searchdone.php';
		var dataString ='all=all';
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						$('.searchrec').html('');
						$('.searchrec').html(data);
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops, Result Not Found',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
	   
 
  }); 
  
  
   $(function(){
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
        var day = dtToday.getDate();
        var year = dtToday.getFullYear() - 18;
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
    	var minDate = year + '-' + month + '-' + day;
        var maxDate = year + '-' + month + '-' + day;
    	$('#dob').attr('max', maxDate);
    });
///////////post view count/////////////////
jQuery(document).on("click", ".vcount", function(e){ 
		
		var video = jQuery(this).attr('videoid');
		var social_AjaxURL='http://orangestate.ng/ajax_view.php';
		var dataString ='postid='+video ;
		
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
						$(".video1"+video).html('');
						$(".video1"+video).html("data");
						
						   if(data != 0){
						
						
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


		///////////by now/////////////////
jQuery(document).on("click", ".addtowishlist", function(e){
  
		
		var id = jQuery(this).attr('pid');
		//var id1 = $("#id"+id).val();
		var task = 'task';//$("#task"+id).val();
		//var tono = $("#tono"+id).val();
		
		//var img=jQuery("#profileimg").val();
		
		
		
		var social_AjaxURL='http://orangestate.ng/wish.php';
		var dataString ='id=' + id + '&task=' + task;
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
            		  
                       if(data != 0){
						Swal.fire({
  position: 'top-end',
  type: 'success',
  title: data,
  showConfirmButton: false,
  timer: 1000
  
});
setTimeout(function(){
							window.location.reload(true);
						   }, 1000);
						
				
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: data,
  showConfirmButton: false,
  timer: 1500
  
});
setTimeout(function(){
							window.location.reload(true);
						   }, 1000);
            		   //	$('#p_error').html('Please fill Mandatory Fields !'); 
            			  //  alert("Error While this deleting a record");
            				
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
$(document).on('click', '.emoji', function(){		var chat_message = jQuery(this).attr('im');			var to_user_id = jQuery(this).attr('uidnew');
	var mp3 = jQuery(this).attr('mp3');	
	
	$.ajax({
			url:"insertemoji.php",
			method:"POST",
			data:{to_user_id:to_user_id, chat_message:chat_message, mp3:mp3},
			success:function(data){
				//alert(data);
				$('#chat_history_'+to_user_id).html(data);
				var auto='<audio src="emoji/'+mp3+'" controls autoplay style="width: 95%; opacity: 0;" ></audio>';
				$('#autop').html(auto);
				$(".chat_history").stop().animate({ scrollTop: $(".chat_history")[0].scrollHeight}, 1000);
			}
		})
	/* 		jQuery("#emojiid").val('<img src="emoji/'+im+'" alt="" style="width:50px;" />');		jQuery("#files").html('<img src="emoji/'+im+'" alt="" style="width:50px; height:50px;" />');		var emojiid=jQuery("#emojiid").val();		//alert(emojiid);		$('<span id='+idd+'></span>').appendTo('#files').html('<img src="emoji/'+im+'" alt="" style="margin:5px;" />').addClass('success'); */});
	
	
	jQuery(document).on("click", ".send_chatemoji", function(e){
	//var cid = jQuery(this).attr('cid');
	$(".wishlistcartemoji").css("display", "block");
	$(".wishlistcartemoji").show();
	

}	);	

	jQuery(document).on("click", "#close", function(e){
	//var cid = jQuery(this).attr('cid');
	$(".wishlistcartemoji").css("display", "none");
	$(".wishlistcartemoji").hide();
	
	

}	);	

///////////
$(document).on('keyup', '.cp', function(){
    if (event.keyCode == 13) {
	$('.commentid').click();    
      return false;
    }
  });
  
  $(document).on('keyup', '.rp', function(){
    if (event.keyCode == 13) {
	$('.replyid').click();    
      return false;
    }
  });


jQuery(document).on("click", ".tagshow", function(e){
	//var cid = jQuery(this).attr('cid');
	$("#container").css("display", "block");
	$("#container").show();
	jQuery('#container').focus();
	$("#Feelingpst").hide();

}	);	


jQuery(document).on("click", ".feeling", function(e){
	//var cid = jQuery(this).attr('cid');
	$("#container").css("display", "none");
	jQuery('#container').hide();
	$("#Feelingpst").show();
	$("#Feelingpst").css("display", "block");

}	);		
	
/////////////////Tag frind///////////////////

 jQuery(document).ready(function()
{
var start=/@/ig; // @ Match
var word=/@(\w+)/ig; //@abc Match
jQuery(document).on("keyup", "#contentbox", function(e){
// $('#contentbox').live('keyup', function() {
//jQuery("#contentbox").live("keyup",function()

var content=jQuery(this).text(); //Content Box Data
var go= content.match(start); //Content Matching @
var name= content.match(word); //Content Matching @abc
var dataString = 'searchword='+ name;
//If @ available
if(go.length>0)
{
jQuery("#msgbox").slideDown('show');
jQuery("#display").slideUp('show');
jQuery("#msgbox").html("Type the name of someone or something...");
//if @abc avalable
if(name.length>0)
{
jQuery.ajax({
type: "POST",
url: "boxsearch.php", // Database name search
data: dataString,
cache: false,
success: function(data)
{
jQuery("#msgbox").hide();
jQuery("#display").html(data).show();
}
});
}
}
return false;
}); 

 //Adding result name to content box.
//jQuery(".addname").live("click",function()
//{
var frnd = []; 
var allfrnd;
jQuery(document).on("click", ".addname", function(e){
var username=$(this).attr('title');
var userid=$(this).attr('userid');
var u=$("#tagfriends").val();
allfrnd=frnd.push( $(this).data(userid) );
$("#tagfriends").val(u+','+allfrnd);
var old=$("#contentbox").html();
var content=old.replace(word," "); //replacing @abc to (" ") space
jQuery("#contentbox").html(content);
var E="<a class='red' contenteditable='false' href='#' >"+username+"</a>";
jQuery("#contentbox").append(E);
jQuery("#display").hide();
jQuery("#msgbox").hide();
});
});	 
