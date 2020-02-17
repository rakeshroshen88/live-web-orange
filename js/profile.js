///////////updte user profile/////////////////
jQuery(document).on("click", "#overviewsave", function(e){  
		
		var overview = jQuery('#overview').val();		
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		var dataString ='overview='+overview ;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		var dataString ='exp='+exp+'&subject='+subject+'&add=add';
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
			
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
			
		var social_AjaxURL1=social_AjaxURL+'ajax_add_education.php';
		
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
			
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		var dataString ='skills='+skills;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		var dataString ='current_city='+current_city+'&hometown='+hometown;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
	
	
   var social_AjaxURL1=social_AjaxURL+'uploadgallery.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('upload_file2').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('upload_file2').files[index]);
   }

   // AJAX request
   $.ajax({
     url: social_AjaxURL1, 
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
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		var dataString ='galleryname='+galleryname;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
 // alert('');
//$("#profilesubmit").click(function(){
	var BASEURL1=social_AjaxURL+'upload/';
	var social_AjaxURL1=social_AjaxURL+'profileimageupload.php';
        var fd = new FormData();
        var files = $('#file1')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL1,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
               
                if(response != 0){
                    //alert(response);
                    jQuery("#rmvid").hide();
                    jQuery(".user-pro-img").html('<img src="'+BASEURL1 + response +'" />');
                    
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
	var BASEURL1=social_AjaxURL+'upload/';
	var social_AjaxURL1=social_AjaxURL+'coverimageupload.php';
	//alert(social_AjaxURL1);
    var fd = new FormData();
        var files = $('#file2')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL1,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
               
                if(response != 0){
                    //alert(response);
                    jQuery("#coverid").hide();
                    jQuery(".cover-sec1").html('<img src="'+BASEURL1 + response +'" />');
                    
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
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
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
            	    url: social_AjaxURL1,
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
		
		var social_AjaxURL1=social_AjaxURL+'educationupdate.php';
		//var social_AjaxURL='http://localhost/orangeraponew/ajax_add_education.php';
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
			
		var social_AjaxURL1=social_AjaxURL+'ajax_add_education.php';
		
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
		
		var social_AjaxURL1=social_AjaxURL+'expupdate.php';
		//var social_AjaxURL='http://localhost/orangeraponew/ajax_add_education.php';
		
			//e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
		var social_AjaxURL1=social_AjaxURL+'ajax_user_update.php';
		var dataString ='exp='+exp+'&subject='+subject+'&expid='+expid;
		//alert(dataString);
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
		var social_AjaxURL=social_AjaxURL+'ajax_user_update.php';
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
		
		var social_AjaxURL1=social_AjaxURL+'ajax_unfollow.php';
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
            	    url: social_AjaxURL1,
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
  alert('hello');
//$("#profilesubmit").click(function(){
	var BASEURL=social_AjaxURL+'upload/';
	var social_AjaxURL1=social_AjaxURL+'compcoverimageupload.php';
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
jQuery("#file55").on('change', function() {

//$("#profilesubmit").click(function(){
	var BASEURL=social_AjaxURL+'upload/';
	var social_AjaxURL1=social_AjaxURL+'compcoverimageupload.php';
        var fd = new FormData();
        var files = $('#file55')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL1,
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
                    jQuery('#file55').focus();
                    //alert('file not uploaded');
                }
            },
        });
    });
	
////////////////////////////////////////////////
jQuery("#file3").on('change', function() {
  
//$("#profilesubmit").click(function(){
	var BASEURL=social_AjaxURL+'upload/';
	var social_AjaxURL1=social_AjaxURL+'companyprofileimageupload.php';
        var fd = new FormData();
        var files = $('#file3')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL1,
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
	
		var social_AjaxURL1=social_AjaxURL+'ajax_comp_update.php';
		var dataString ='overview='+overview+'&cid='+comid ;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
			
		var social_AjaxURL1=social_AjaxURL+'ajax_comp_update.php';
		
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
		var social_AjaxURL1=social_AjaxURL='ajax_comp_update.php';
		var dataString ='cid='+cid;
		//alert(dataString);
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
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
	
	
   var social_AjaxURL1=social_AjaxURL+'uploadcompgallery.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('upload_file5').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('upload_file5').files[index]);
   }

   // AJAX request
   $.ajax({
     url: social_AjaxURL1, 
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
		var social_AjaxURL1=social_AjaxURL+'ajax_comp_update.php';
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
            	    url: social_AjaxURL1,
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
	var BASEURL=social_AjaxURL+'product/';
	var social_AjaxURL1=social_AjaxURL+'prodimg.php';
        var fd = new FormData();
        var files = $('#p')[0].files[0];
       
        fd.append('file',files);

        $.ajax({
            url: social_AjaxURL1,
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
   var social_AjaxURL1=social_AjaxURL+'mproduct.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('mp').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('mp').files[index]);
   }

   // AJAX request
   $.ajax({
     url: social_AjaxURL1, 
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

///////////Socail link/////////////////
jQuery(document).on("click", "#socalsave", function(e){  
		
		var link = jQuery('#link').val();
			
		var social_AjaxURL1=social_AjaxURL+'ajax_comp_update.php';
		var dataString ='link='+link;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
						//$("#experience-box").hide();
						$("#skills-box1").removeClass("open");
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
		
///////////Socail link/////////////////
jQuery(document).on("click", "#csocalsave", function(e){  
		
		var clink = jQuery('#clink').val();
			var cuserid = jQuery('#cuserid').val();
			
		var social_AjaxURL1=social_AjaxURL+'ajax_comp_update.php';
		var dataString ='clink='+clink+'&cuserid='+cuserid;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
						//$("#experience-box").hide();
						$("#skills-box1").removeClass("open");
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
		
/* 	$('.send_chatemoji1').click(function() {
		var cid = jQuery(this).attr('pid');
	//$(".emoji1[pid='" + cid + "']").toggle();
            $(".emoji1[pid='" + cid + "']").lazy({
                bind: "event",
                delay: 0
            });
        }); */
		
		/* $('.send_chatemoji').click(function() {
            $('.emoji1').lazy({
                bind: "event",
                delay: 0
            });
        }); */
		
$(".send_chatemoji1").click(function(){
	var cid = jQuery(this).attr('cid');
	
	//$(".wishlistcartemoji1[cid='" + cid + "']").toggle();
  var x = event.clientX;
  var y = event.clientY;
  document.getElementById('wishlistcartemoji1').style.top = y + "px";
  document.getElementById('wishlistcartemoji1').style.left = x + "px";
  $('.emojinew').attr('pid', cid);
  /* var coords = "X coords: " + x + ", Y coords: " + y;
  alert(coords); */
  
  $(".wishlistcartemoji1").toggle();
});

$(".send_chatemoji").click(function(){
 // $(".wishlistcartemoji").toggle();
 var cid = jQuery(this).attr('cid');
 $(".wishlistcartemoji[cid='" + cid + "']").toggle();
});


///////////updte user profile/////////////////
jQuery(document).on("click", "#changepassword", function(e){  
		
		var oldpassword = jQuery('#oldpassword').val();
		var newpassword = jQuery('#newpassword').val();
		var renewpassword = jQuery('#renewpassword').val();
		if(oldpassword ==''){
			$("#oldpassword").css("border-color", "#FF0000");
			$('#changepassword').attr('disabled',true);    
			
			$('#p_error').html('Please Enter Old Password'); 
						 
			return false;
		}else{
		$("#oldpassword").css("border-color", "#00FF00");
		$('#p_error').html(''); 
		$('#changepassword').attr('disabled',false);	
		}
		
		if(newpassword ==''){
			$('#p_error').html('Please Enter New Password'); 
						 
			return false;
		}
	
		if(newpassword != renewpassword){
			$("#renewpassword").css("border-color", "#FF0000");
			$('#changepassword').attr('disabled',true);        
			$('#p_error').html('Password Not Matched'); 
						 
			return false;
		}else{
		$("#renewpassword").css("border-color", "#00FF00");
		$('#p_error').html(''); 
		$('#changepassword').attr('disabled',false);	
		}
		var social_AjaxURL1=social_AjaxURL+'ajax_changepassword.php';
		var dataString ='oldpassword='+oldpassword + '&newpassword='+newpassword ;
		
			e.preventDefault();
		
					$.ajax({
            	    url: social_AjaxURL1,
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					 //data: profileuploadtn,
            	    			
            	    success: function (data) {
						$('#p_error').html(data); 
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
						   }, 7000);
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
	
	
	
	$("#oldpassword").focusout(function(){
	var oldpassword = $("#oldpassword").val();
	if(oldpassword ==''){
			$("#oldpassword").css("border-color", "#FF0000");
			$('#changepassword').attr('disabled',true);    
			
			$('#p_error').html('Please Enter Old Password'); 
						 
			return false;
		}else{
		$("#oldpassword").css("border-color", "#00FF00");
		$('#p_error').html(''); 
		$('#changepassword').attr('disabled',false);	
		}
	});
	$("#newpassword").focusout(function(){
		var newpassword = $("#newpassword").val();
	if (newpassword=='') {
        //alert(errors.join("\n"));
		$("#newpassword").css("border-color", "#FF0000");
        $('#changepassword').attr('disabled',true);
        $("#p_error").text(errors.join("\n"));
        return false;
    }else{
		$("#newpassword").css("border-color", "#00FF00");
		$('#p_error').html(''); 
		  $('#changepassword').attr('disabled',false);
	}	
	});
	
	$("#renewpassword").focusout(function(){
	var renewpassword = $("#renewpassword").val();
	if(renewpassword ==''){
			$("#renewpassword").css("border-color", "#FF0000");
			$('#changepassword').attr('disabled',true);        
			$('#p_error').html('Password Not Matched'); 
						 
			return false;
		}else{
		$("#renewpassword").css("border-color", "#00FF00");
		$('#p_error').html(''); 
		$('#changepassword').attr('disabled',false);	
		}	
	});
	$("#newpassword").focusout(function(){
	var p = $("#newpassword" ).val();
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
		$("#newpassword").css("border-color", "#FF0000");
        $('#changepassword').attr('disabled',true);
        $("#p_error").text(errors.join("\n"));
        return false;
    }else{
		$("#newpassword").css("border-color", "#00FF00");
		$('#p_error').html(''); 
		  $('#changepassword').attr('disabled',false);
	}
			 });
		
	