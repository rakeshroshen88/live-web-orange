///////////updte user profile/////////////////
jQuery(document).on("click", "#overviewsave", function(e){  
		
		var overview = jQuery('#overview').val();		
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='overview='+overview ;
		
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
						//$("#overview-box").hide();
						$("#overview-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
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
						  timer: 1500
						  
						});
						setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						   //$('#overview').html(data);  
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
	
	

///////////updte exp profile/////////////////
jQuery(document).on("click", "#expsave", function(e){  
		
		var exp = jQuery('#exp2').val();	
		var subject = jQuery('#subject2').val();			
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='exp='+exp+'&subject='+subject+'&add=add';
		
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
						//$("#experience-box").hide();
						$("#experience-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   	 
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						//window.location.reload(true);
						  
						//$("#overview-box").show();
						   //$('#overview').html(data);  
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
	
	
	///////////updte exp profile/////////////////
jQuery(document).on("click", "#coninfosave", function(e){  
		var form=jQuery("#contactinfoform");
			
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		
		
			e.preventDefault();
		
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
						//$("#contact-box").hide();
						$("#contact-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   //data=data.replace(/\s+/g,"");
					    	 
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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
	
	
/////////////////////updte educationsave profile/////////////////
jQuery(document).on("click", "#educationsave", function(e){  
		var form=jQuery("#educationinfoform");
			
		var social_AjaxURL='http://orangestate.ng/ajax_add_education.php';
		
		
			e.preventDefault();
		
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
						//$(".ed-box-open").hide();
            		   //data=data.replace(/\s+/g,"");
					   $("#education-box").removeClass("open");
					   $(".wrapper").removeClass("overlay");	 
					    	 
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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
		
///////////updte skills profile/////////////////
jQuery(document).on("click", "#skillssave", function(e){  
		
		var skills = jQuery('#skills').val();
			
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='skills='+skills;
		
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
						//$("#experience-box").hide();
						$("#skills-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
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
	
	
	///////////updte Location profile/////////////////
jQuery(document).on("click", "#savelocation", function(e){  
		
		var current_city = jQuery('#current_city').val();	
		var hometown = jQuery('#hometown').val();			
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='current_city='+current_city+'&hometown='+hometown;
		
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
						
						$("#location-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   
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
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						//window.location.reload(true);
						  
						//$("#overview-box").show();
						   //$('#overview').html(data);  
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
	
	
	//////////////////////Multiple file Upload for post/////////////////////// 
	jQuery("#upload_file2").on('change', function() {
		//jQuery(document).on("click", "#upload_file2", function(e){  
	
	
   var social_AjaxURL='http://orangestate.ng/uploadgallery.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('upload_file2').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('upload_file2').files[index]);
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
        for(var index = 0; index < response.length; index++) {
         var src = response[index];
		//alert(src);
         // Add img element in <div id='preview'>
         $('#show').append('<img src="'+src+'" width="200px;" height="200px">');
       } 

     }
   });

});
////////



///////////updte Location profile/////////////////
jQuery(document).on("click", "#gallerysave", function(e){  
		
		var galleryname = jQuery('#galleryname').val();	
		var imgid = jQuery('#imgid').val();			
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='galleryname='+galleryname;
		
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
						//$("#create-portfolio").hide();
            		    $("#create-portfolio").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
					
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
	
jQuery("#file1").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var BASEURL='http://orangestate.ng/upload/';
	var social_AjaxURL='http://orangestate.ng/profileimageupload.php';
        var fd = new FormData();
        var files = $('#file1')[0].files[0];
       
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
                    jQuery(".user-pro-img").html('<img src="'+BASEURL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 //jQuery('#imgid').val(response); 
                }else{
                    jQuery('#file1').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });

///////////////////////////////////////
jQuery("#file2").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var BASEURL='http://orangestate.ng/upload/';
	var social_AjaxURL='http://orangestate.ng/coverimageupload.php';
        var fd = new FormData();
        var files = $('#file2')[0].files[0];
       
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
                    jQuery("#coverid").hide();
                    jQuery(".cover-sec1").html('<img src="'+BASEURL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 //jQuery('#imgid').val(response); 
                }else{
                    jQuery('#file2').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });
////////////////////////////////////////////////


	///////////post del id /////////////////
jQuery(document).on("click", ".skillsdel", function(e){
 
		
		var delid = jQuery(this).attr('delid');		
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='delid=' + delid ;
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
						
            		   //data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   $('#follownew').html('');
					   $('#follownew').html('following');					   
                       if(data != 0){
						   Swal.fire({
  type: 'success',
  title: '',
  text: data,
  showConfirmButton: false,
timer: 1500
  
});
 setTimeout(function(){
							window.location.reload(true);
						   }, 10000);
						  // $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  
})
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
  text: 'Something went wrong!',
  
})
	  
  }
})
				
        
    	
	});
	
	/////////////////////updte educationsave profile/////////////////
jQuery(document).on("click", "#educationupdate", function(e){  
	
			var id = jQuery(this).attr('eid');
		
		var social_AjaxURL='http://orangestate.ng/educationupdate.php';
		//var social_AjaxURL='http://localhost/orangeraponew/ajax_add_education.php';
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data:  {
						"id" :id
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {	
					   $('#education-box1').html(data);					   
					   $("#education-box1").addClass("open");					  
					   $(".wrapper").addClass("overlay");	 
					    	 
                       
            		  
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	
	/////////////////////updte educationsave profile/////////////////
jQuery(document).on("click", "#educationeditupdate", function(e){  
		var form=jQuery("#educationupdateform");
			
		var social_AjaxURL='http://orangestate.ng/ajax_add_education.php';
		
		
			//e.preventDefault();
		
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
						//$(".ed-box-open").hide();
            		   //data=data.replace(/\s+/g,"");
					   $("#education-box1").removeClass("open");
					   $(".wrapper").removeClass("overlay");	 
					    	 
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 10000);
						
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
	

	/////////////////////updte educationsave profile/////////////////
jQuery(document).on("click", ".exp_open1", function(e){  
	
			var id = jQuery(this).attr('eid');
		
		var social_AjaxURL='http://orangestate.ng/expupdate.php';
		//var social_AjaxURL='http://localhost/orangeraponew/ajax_add_education.php';
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data:  {
						"id" :id
							},
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {	
					   $('#ed-box1').html(data);					   
					   $("#ed-box1").addClass("open");					  
					   $(".wrapper").addClass("overlay");	 
					    	 
                       
            		  
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
        
    	
	});
	
	///////////updte exp profile/////////////////
jQuery(document).on("click", "#updateexpsave", function(e){  
		
		var exp = jQuery('#exp1').val();	
		var expid = jQuery('#expid1').val();
		var subject = jQuery('#subject1').val();
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='exp='+exp+'&subject='+subject+'&expid='+expid;
		
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
						
						$("#ed-box1").removeClass("open");
						//$("#experience-box1").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		  	 
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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
		
		

	///////////post del id /////////////////
jQuery(document).on("click", ".gallerydel", function(e){
 
		
		var delidg = jQuery(this).attr('delidg');		
		var social_AjaxURL='http://orangestate.ng/ajax_user_update.php';
		var dataString ='delidg=' + delidg ;
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
						
            		   
                       if(data != 0){
						   Swal.fire({
  type: 'success',
  title: '',
  text: data,
  showConfirmButton: false,
						  timer: 1500
  
});

setTimeout(function(){
							window.location.reload(true);
						   }, 10000);
						  // $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  
})
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
  text: 'Something went wrong!',
  
})
	  
  }
})
				
        
    	
	});
	
	
	
	/////////////unfollow user//////////////////
	  $(".follownew1").on('click', function(event){
		
		var f_id = jQuery(this).attr('fid');
		
		var social_AjaxURL='http://orangestate.ng/ajax_unfollow.php';
		var dataString ='followid=' + f_id ;
			
		Swal.fire({
  title: 'Are you sure?',
  text: "want to continue!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Unfollow it!'
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
						
            		   //data=data.replace(/\s+/g,"");
					   //alert(data);
            		   //var spancontainer=$('span#record'+catids);
            		   //$('#follownew').html('');
					   $('#hide'+f_id).remove();					   
                       if(data != 0){
						   Swal.fire({
						  //position: 'top-end',
						  type: 'success',
						  title: 'Successful Removed',
						  showConfirmButton: false,
						  timer: 1500
						})
						  // $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'Something went wrong!',
							   showConfirmButton: false,
						  timer: 1500
							  
							})
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
  text: 'Something went wrong!',
  
})
	  
  }
})
				
        
    	
	});
	
	
	
///////////////////////////////////////
jQuery("#file4").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var BASEURL='http://orangestate.ng/upload/';
	var social_AjaxURL='http://orangestate.ng/compcoverimageupload.php';
        var fd = new FormData();
        var files = $('#file4')[0].files[0];
       
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
                    jQuery("#coverid").hide();
                    jQuery(".cover-sec1").html('<img src="'+BASEURL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 //jQuery('#imgid').val(response); 
                }else{
                    jQuery('#file2').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });
////////////////////////////////////////////////
jQuery("#file3").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var BASEURL='http://orangestate.ng/upload/';
	var social_AjaxURL='http://orangestate.ng/companyprofileimageupload.php';
        var fd = new FormData();
        var files = $('#file3')[0].files[0];
       
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
                    jQuery(".user-pro-img").html('<img src="'+BASEURL + response +'" />');
                    
                   // jQuery("#imgid").val(data.result.attach_id);
                 //jQuery('#imgid').val(response); 
                }else{
                    jQuery('#file1').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });



jQuery(document).on("click", "#comoverviewsave", function(e){  
		
		var overview = jQuery('#overview').val();
		var comid = jQuery(this).attr('cid');	
	
		var social_AjaxURL='http://orangestate.ng/ajax_comp_update.php';
		var dataString ='overview='+overview+'&cid='+comid ;
		
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
						//$("#overview-box").hide();
						$("#overview-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
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
						  timer: 1500
						  
						});
						setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						   //$('#overview').html(data);  
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
	
	
		///////////updte exp profile/////////////////
jQuery(document).on("click", "#compinfosave", function(e){  
		var form=jQuery("#contactinfoform");
			
		var social_AjaxURL='http://orangestate.ng/ajax_comp_update.php';
		
		
			e.preventDefault();
		
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
						//$("#contact-box").hide();
						$("#contact-box").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   //data=data.replace(/\s+/g,"");
					    	 
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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
	
	jQuery(document).on("click", "#comgallerysave", function(e){  
		
		var cid = jQuery(this).attr('cid');	
		
		var imgid = jQuery('#imgid').val();			
		var social_AjaxURL='http://orangestate.ng/ajax_comp_update.php';
		var dataString ='cid='+cid;
		alert(dataString);
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
						//$("#create-portfolio").hide();
            		    $("#create-portfolio").removeClass("open");
						$(".wrapper").removeClass("overlay");
            		   
                       if(data != 0){
						   swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						  showConfirmButton: false,
						  timer: 1500
						  
						});
						  setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
					
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
	jQuery("#upload_file5").on('change', function() {
		//jQuery(document).on("click", "#upload_file2", function(e){  
	
	
   var social_AjaxURL='http://orangestate.ng/uploadcompgallery.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('upload_file5').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('upload_file5').files[index]);
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
        for(var index = 0; index < response.length; index++) {
         var src = response[index];
		//alert(src);
         // Add img element in <div id='preview'>
         $('#show').append('<img src="'+src+'" width="200px;" height="200px">');
       } 

     }
   });

});
////////

	///////////post del id /////////////////
jQuery(document).on("click", ".cgallerydel", function(e){
 
		
		var delidg = jQuery(this).attr('delidcg');
var img = jQuery(this).attr('img');		
		var social_AjaxURL='http://orangestate.ng/ajax_comp_update.php';
		var dataString ='delidg=' + delidg+ '&img=' + img ;
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
						
            		   
                       if(data != 0){
						   Swal.fire({
  type: 'success',
  title: '',
  text: data,
  showConfirmButton: false,
						  timer: 1500
  
});

setTimeout(function(){
							window.location.reload(true);
						   }, 10000);
						  // $('#postshow').html(data);  
						   //window.location.href= MEDIA_URL+'index.php';
            			 //window.location.reload(true);
            		    }
            		    else {
							Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  
})
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
  text: 'Something went wrong!',
  
})
	  
  }
})
				
        
    	
	});
	
///////////////////////////////////////
jQuery("#p").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var BASEURL='http://orangestate.ng/product/';
	var social_AjaxURL='http://orangestate.ng/prodimg.php';
        var fd = new FormData();
        var files = $('#p')[0].files[0];
       
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
                   // jQuery("#coverid").hide();
                   // jQuery(".cover-sec1").html('<img src="'+BASEURL + response +'" />');
                    
                    jQuery("#pimgid").val(response);
                 //jQuery('#imgid').val(response); 
                }else{
                    jQuery('#p').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });

	//////////////////////Multiple file product Upload for post/////////////////////// 
	jQuery("#mp").on('change', function() {
   var social_AjaxURL='http://orangestate.ng/mproduct.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('mp').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('mp').files[index]);
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
		jQuery('#mpimgid').val(response); 
       

     }
   });

});

	