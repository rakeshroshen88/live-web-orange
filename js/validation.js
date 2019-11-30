/*********************************** Admin Login *******************************************/

$(document).ready(function() {
			
	   $('#adminlogBtn').click(function()	{
			
            var username=$("#username").val();
			var password=$("#password").val();
            			
            var dataString = 'username='+username+'&password='+password+'&action=adminlogin';
			
			if($.trim(username).length < 1) {				
				$("#errormsg").html("Please enter a valid Username or Email. ");
				$("#username").focus();    
                return false;				
			}
			else if( $.trim(password).length < 1) {				
				$("#errormsg").html("Please enter you Password. ");
				$("#password").focus();
                return false;				
			}		    
			
			else {	
              
    			$.ajax({
                type: "POST",
                url: "../admin/ajx_adminlogin.php",
                data: dataString,
                cache: false,
                beforeSend: function(){ $("#adminlogBtn").val('Connecting...');},
                success: function(data){       
                   
					if(data=="loginnotsuccess") {                    
                        $("#errormsg").html("You have entered a wrong Email Address or Password. Make sure that it is typed correctly. ");                        
                        $("#adminlogBtn").val('Login')
                        $('#adminlogForm').trigger("reset");                    
                    }
                    if(data == "loginsuccess")  {
                        $("#errormsg").html("");    
                        $("#adminlogBtn").val('Login');   
                        //window.location.replace("categories");                 
                        //$(location).attr('href','categories.php');  
                        $(location).attr('href','manage_categories');                 			
                    }
                }
                });			
			}
			return false;
	   });			
				
	});
/*********************************** End Admin Login *******************************************/


/*********************************** First Category Form *******************************************/
    
 		function ClearFields(theForm){
        
        	theForm.catname.value="";
        }

        function InputFieldValidations(theForm) {
        
            if (theForm.catname.value == "") {				             
        		alert("Enter a Category.");
        		theForm.catname.focus();
        		return (false);
            }    	
        	return true;  
        }
        

        function ActionFunction(urls, catids, work){
            
            if (work == "edit") {
              
        	  
        	  var divcontainer=$('#categoryInsert');
        	 
        	  divcontainer.empty();
              //divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');
        	 
        	  divcontainer.slideDown('slow', function(){
              divcontainer.load(urls+'?catid='+catids+'&sid='+Math.random());
              });
        	 
        	 
            }
    
            if (work == "delete") {     
	 
                var result = confirm("Are you sure you want to delete?");     
	 
                if (result == true) {	
	
            	$.ajax({
            	    url: urls,
            	    async: true,
            	    cache: false,
            	    data: {catid: catids},
            	    type: 'get',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
            		   var spancontainer=$('span#record'+catids);
            		   $('#loadimg').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
                                   
            			 spancontainer.slideUp('slow', function(){
                         spancontainer.fadeOut("slow");
            	         spancontainer.remove();
            			 });
            			    
            			 window.location.reload(true);
            		    }
            		    else {
            		        spancontainer.slideUp('slow', function(){		
            			    spancontainer.html("Error While this deleting a record");
            				});
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
            	
            	
                 
                  }
                 
                }
                
            }

        function CommonFunction(FormObject, pageurl, loadurl,  FormID) { 
           
            var noofrecords = $('span.items').length;
        	
            if(InputFieldValidations(FormObject)) {               
               	    
        	$.ajax({
        	    url: pageurl,
        	    async: true,
        	    cache: false,
        	    data: $('#'+FormID).serialize(),
        	    type: 'post',			
        	    success: function (data) {
        		   data=data.replace(/\s+/g,"");
        		  
        		   $('#loadimg').html('<img src="../images/load.gif">');  	 
        		   if(data != 0){
        		 
        				var spancontainer;
        			    $('.errormsg').empty();
        			    $('div#successfulpost').fadeIn();
        			    
        			    if($('span#record'+data).length){
        				spancontainer=$('span#record'+data);
        			    }else{
        			    $("<span id='record"+data+"' class='items'></span>").appendTo("#categoryLoad");
        				spancontainer=$('span#record'+data);
        			    }
        			    ///If an element found
        			    if(spancontainer.length){
        					
        					spancontainer.slideDown('slow', function(){
        					//spancontainer.html('<div style="float:left; margin-left:5px;"><img src="../images/load.gif" /></div>');
        					spancontainer.fadeIn("slow");
        			   		spancontainer.load(loadurl+'?catid='+data+'&sid='+Math.random());
        					});
        			        
                               
                        }
        			    
        		          window.location.reload(true);                        
                          //$('#forminsert').trigger("reset");
        			
        		    }
        		    else {
        		        
        			    $('#'+FormID).show(function(){					
        			    $('.errormsg').html(data);
        			    $('.errormsg').fadeIn(500);
        			    });
        		    }
        	    },
        	    error : function(XMLHttpRequest, textStatus, errorThrown) {
        		    alert(textStatus);
        	    }
        	});
        	
        	ClearFields(FormObject);
        	return false;
            }
            return false;    
        }
/*********************************** End First Category Form *******************************************/
/*********************************** Second Category Form *******************************************/
    
 		function SubClearFields(theForm){
        
        	theForm.scatname.value="";
            theForm.subcatname.value="";
        }

        function SubInputFieldValidations(theForm) {
        
            if (theForm.scatname.value == "") {				             
        		alert("Select a Category.");
        		theForm.scatname.focus();
        		return (false);
            } 
            if (theForm.subcatname.value == "") {				             
        		alert("Enter a Sub Category.");
        		theForm.subcatname.focus();
        		return (false);
            }    	
        	return true;  
        }
        

        function SubActionFunction(urls, catids, work){
            
            if (work == "edit") {
              
        	  
        	  var divcontainer=$('#subcategoryInsert');
        	 
        	  divcontainer.empty();
              //divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');
        	 
        	  divcontainer.slideDown('slow', function(){
              divcontainer.load(urls+'?subcatid='+catids+'&sid='+Math.random());
              });
        	 
        	 
            }
    
            if (work == "delete") {     
	 
                var result = confirm("Are you sure you want to delete?");     
	 
                if (result == true) {	

            	$.ajax({
            	    url: urls,
            	    async: true,
            	    cache: false,
            	    data: {subcatid: catids},
            	    type: 'get',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
            		   var spancontainer=$('span#record'+catids);
            		   $('#loadimg1').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
                                   
            			 spancontainer.slideUp('slow', function(){
                         spancontainer.fadeOut("slow");
            	         spancontainer.remove();
            			 });
            			    
            			 window.location.reload(true);
            		    }
            		    else {
            		        spancontainer.slideUp('slow', function(){		
            			    spancontainer.html("Error While this deleting a record");
            				});
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
            	
            	
                 
                  }
                 
                }
                
            }

        function SubCommonFunction(FormObject, pageurl, loadurl,  FormID) { 
           
            var noofrecords = $('span.items').length;
        	
            if(SubInputFieldValidations(FormObject)) {               
               	    
        	$.ajax({
        	    url: pageurl,
        	    async: true,
        	    cache: false,
        	    data: $('#'+FormID).serialize(),
        	    type: 'post',			
        	    success: function (data) {
        		   data=data.replace(/\s+/g,"");
        		  
        		   $('#loadimg1').html('<img src="../images/load.gif">');  	 
        		   if(data != 0){
        		 
        				var spancontainer;
        			    $('.errormsg').empty();
        			    $('div#successfulpost').fadeIn();
        			    
        			    if($('span#record'+data).length){
        				spancontainer=$('span#record'+data);
        			    }else{
        			    $("<span id='record"+data+"' class='items'></span>").appendTo("#subcategoryLoad");
        				spancontainer=$('span#record'+data);
        			    }
        			    ///If an element found
        			    if(spancontainer.length){
        					
        					spancontainer.slideDown('slow', function(){
        					//spancontainer.html('<div style="float:left; margin-left:5px;"><img src="../images/load.gif" /></div>');
        					spancontainer.fadeIn("slow");
        			   		spancontainer.load(loadurl+'?subcatid='+data+'&sid='+Math.random());
        					});
        			        
                               
                        }
        			    
        		          window.location.reload(true);                        
                          //$('#forminsert').trigger("reset");
        			
        		    }
        		    else {
        		        
        			    $('#'+FormID).show(function(){					
        			    $('.errormsg').html(data);
        			    $('.errormsg').fadeIn(500);
        			    });
                        window.location.reload(true);   
        		    }
        	    },
        	    error : function(XMLHttpRequest, textStatus, errorThrown) {
        		    alert(textStatus);
        	    }
        	});
        	
        	SubClearFields(FormObject);
        	return false;
            }
            return false;    
        }
/*********************************** End Sedond Category Form *******************************************/
/*********************************** Third Category Form *******************************************/
 		function SubSubClearFields(theForm){
        
        	theForm.scatname1.value="";
            theForm.sbcatname.value="";
            theForm.subsubcatname.value="";
        }

        function SubSubInputFieldValidations(theForm) {
        
            if (theForm.scatname1.value == "") {				             
        		alert("Select a Category.");
        		theForm.scatname1.focus();
        		return (false);
            } 
            if (theForm.sbcatname.value == "") {				             
        		alert("Enter a Sub Category.");
        		theForm.sbcatname.focus();
        		return (false);
            } 
            if (theForm.subsubcatname.value == "") {				             
        		alert("Enter a Sub Sub Category.");
        		theForm.subsubcatname.focus();
        		return (false);
            }    	
        	return true;  
        }
        

        function SubSubActionFunction(urls, catids, work){
            
            if (work == "edit") {
              
        	  
        	  var divcontainer=$('#subsubcategoryInsert');
        	 
        	  divcontainer.empty();
              //divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');
        	 
        	  divcontainer.slideDown('slow', function(){
              divcontainer.load(urls+'?subsubcatid='+catids+'&sid='+Math.random());
              });
        	 
        	 
            }
    
            if (work == "delete") {     
	 
                var result = confirm("Are you sure you want to delete?");     
	 
                if (result == true) {	
	
            	$.ajax({
            	    url: urls,
            	    async: true,
            	    cache: false,
            	    data: {subsubcatid: catids},
            	    type: 'get',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
            		   var spancontainer=$('span#record'+catids);
            		   $('#loadimg2').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
                                   
            			 spancontainer.slideUp('slow', function(){
                         spancontainer.fadeOut("slow");
            	         spancontainer.remove();
            			 });
            			    
            			 window.location.reload(true);
            		    }
            		    else {
            		        spancontainer.slideUp('slow', function(){		
            			    spancontainer.html("Error While this deleting a record");
            				});
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
            	
            	
                 
                  }
                 
                }
                
            }

        function SubSubCommonFunction(FormObject, pageurl, loadurl,  FormID) { 
           
            var noofrecords = $('span.items').length;
        	
            if(SubSubInputFieldValidations(FormObject)) {               
               	    
        	$.ajax({
        	    url: pageurl,
        	    async: true,
        	    cache: false,
        	    data: $('#'+FormID).serialize(),
        	    type: 'post',			
        	    success: function (data) { 
        		   data=data.replace(/\s+/g,"");
        		  
        		   $('#loadimg2').html('<img src="../images/load.gif">');  	 
        		   if(data != 0){
        		 
        				var spancontainer;
        			    $('.errormsg').empty();
        			    $('div#successfulpost').fadeIn();
        			    
        			    if($('span#record'+data).length){
        				spancontainer=$('span#record'+data);
        			    }else{
        			    $("<span id='record"+data+"' class='items'></span>").appendTo("#subsubcategoryLoad");
        				spancontainer=$('span#record'+data);
        			    }
        			    ///If an element found
        			    if(spancontainer.length){
        					
        					spancontainer.slideDown('slow', function(){
        					//spancontainer.html('<div style="float:left; margin-left:5px;"><img src="../images/load.gif" /></div>');
        					spancontainer.fadeIn("slow");
        			   		spancontainer.load(loadurl+'?subsubcatid='+data+'&sid='+Math.random());
        					});
        			        
                               
                        }
        			    
        		          window.location.reload(true);                        
                          //$('#forminsert').trigger("reset");
        			
        		    }
        		    else {
        		        
        			    $('#'+FormID).show(function(){					
        			    $('.errormsg').html(data);
        			    $('.errormsg').fadeIn(500);
        			    });
        		    }
        	    },
        	    error : function(XMLHttpRequest, textStatus, errorThrown) {
        		    alert(textStatus);
        	    }
        	});
        	
        	SubSubClearFields(FormObject);
        	return false;
            }
            return false;    
        }
	
    
	function showSubCat(sel) {
             var secondproductcatid1 = sel.options[sel.selectedIndex].value;
             if (secondproductcatid1.length > 0) {
            
                $.ajax({
                    type: "POST",
                    url: "../ajx_queries.php",
                    data: "secondproductcatid=" + secondproductcatid1+'&action=getsubcategoriesindex',
                    cache: false,                    
                    success: function(html) {            
                        $(".sbcatname").html(html);
                    }
                 });
             }
    }
/*********************************** End Third Category Form *******************************************/
/*********************************** Fourth Category Form *******************************************/
 		function SubSubSubClearFields(theForm){
        
        	theForm.scatname1.value="";
            theForm.sbcatname.value="";
            theForm.ssbcatname.value="";
            theForm.subsubsubcatname.value="";
        }

        function SubSubSubInputFieldValidations(theForm) {
        
            if (theForm.scatname1.value == "") {				             
        		alert("Select a Category.");
        		theForm.scatname1.focus();
        		return (false);
            } 
            if (theForm.sbcatname.value == "") {				             
        		alert("Enter a Second Category.");
        		theForm.sbcatname.focus();
        		return (false);
            } 
            if (theForm.ssbcatname.value == "") {				             
        		alert("Enter a Third Category.");
        		theForm.ssbcatname.focus();
        		return (false);
            } 
            if (theForm.subsubsubcatname.value == "") {				             
        		alert("Enter a Fourth Category.");
        		theForm.subsubsubcatname.focus();
        		return (false);
            }   	
        	return true;  
        }
        

        function SubSubSubActionFunction(urls, catids, work){
            
            if (work == "edit") {
              
        	
        	  var divcontainer=$('#subsubsubcategoryInsert');
        	 
        	  divcontainer.empty();
              //divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');
        	 
        	  divcontainer.slideDown('slow', function(){
              divcontainer.load(urls+'?subsubsubcatid='+catids+'&sid='+Math.random());
              });
        	 
        	 
            }
    
            if (work == "delete") {     
	 
                var result = confirm("Are you sure you want to delete?");     
	 
                if (result == true) {	

            	$.ajax({
            	    url: urls,
            	    async: true,
            	    cache: false,
            	    data: {subsubsubcatid: catids},
            	    type: 'get',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
            		   var spancontainer=$('span#record'+catids);
            		   $('#loadimg2').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
                                   
            			 spancontainer.slideUp('slow', function(){
                         spancontainer.fadeOut("slow");
            	         spancontainer.remove();
            			 });
            			    
            			 window.location.reload(true);
            		    }
            		    else {
            		        spancontainer.slideUp('slow', function(){		
            			    spancontainer.html("Error While this deleting a record");
            				});
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
            	
            	
                 
                  }
                 
                }
                
            }

        function SubSubSubCommonFunction(FormObject, pageurl, loadurl,  FormID) { 
           
            var noofrecords = $('span.items').length;
        	
            if(SubSubSubInputFieldValidations(FormObject)) {               
               	    
        	$.ajax({
        	    url: pageurl,
        	    async: true,
        	    cache: false,
        	    data: $('#'+FormID).serialize(),
        	    type: 'post',			
        	    success: function (data) {
        		   data=data.replace(/\s+/g,"");
        		  
        		   $('#loadimg2').html('<img src="../images/load.gif">');  	 
        		   if(data != 0){
        		 
        				var spancontainer;
        			    $('.errormsg').empty();
        			    $('div#successfulpost').fadeIn();
        			    
        			    if($('span#record'+data).length){
        				spancontainer=$('span#record'+data);
        			    }else{
        			    $("<span id='record"+data+"' class='items'></span>").appendTo("#subsubsubcategoryLoad");
        				spancontainer=$('span#record'+data);
        			    }
        			    ///If an element found
        			    if(spancontainer.length){
        					
        					spancontainer.slideDown('slow', function(){
        					//spancontainer.html('<div style="float:left; margin-left:5px;"><img src="../images/load.gif" /></div>');
        					spancontainer.fadeIn("slow");
        			   		spancontainer.load(loadurl+'?subsubsubcatid='+data+'&sid='+Math.random());
        					});
        			        
                               
                        }
        			    
        		          window.location.reload(true);                        
                          //$('#forminsert').trigger("reset");
        			
        		    }
        		    else {
        		        
        			    $('#'+FormID).show(function(){					
        			    $('.errormsg').html(data);
        			    $('.errormsg').fadeIn(500);
        			    });
        		    }
        	    },
        	    error : function(XMLHttpRequest, textStatus, errorThrown) {
        		    alert(textStatus);
        	    }
        	});
        	
        	SubSubSubClearFields(FormObject);
        	return false;
            }
            return false;    
        }
	
    
	function showSubCat1(sel) {
             var secondproductcatid1 = sel.options[sel.selectedIndex].value;
             if (secondproductcatid1.length > 0) {
            
                $.ajax({
                    type: "POST",
                    url: "../ajx_queries.php",
                    data: "secondproductcatid=" + secondproductcatid1+'&action=getfrsubcategoriesindex1',
                    cache: false,                    
                    success: function(html) {            
                        $(".sbcatname").html(html);
                    }
                 });
             }
    }
    
    function showSubSubCat2(sel) {
             var thirdproductcatid1 = sel.options[sel.selectedIndex].value;
             if (thirdproductcatid1.length > 0) {
           
                $.ajax({
                    type: "POST",
                    url: "../ajx_queries.php",
                    data: "thirdproductcatid=" + thirdproductcatid1+'&action=getfrsubcategoriesindex2',
                    cache: false,                    
                    success: function(html) {            
                        $(".ssbcatname").html(html);
                    }
                 });
             }
    }
    
/*********************************** End Fourth Category Form *******************************************/






/*********************************** Only Numbers are allowed Validations  *******************************************/
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }  
/*********************************** End Only Numbers are allowed Validations  *******************************************/




/*********************************** Product Categories *******************************************/
         $(document).ready(function() {
		
       var procatname = $(".procatname");
       var prosubcatname = $(".prosubcatname");
       var prosubsubcatname = $(".prosubsubcatname");
       var protitle = $("#protitle");
       var proimg = $("#proimg");
       var proprice = $("#proprice");
       var protype = $("#protype");
       var prodistype = $("#prodistype");
       var prodisprice = $("#prodisprice");
       var pronetprice = $("#pronetprice");
       var proqty = $("#proqty");
       var probrandname = $("#probrandname");
       var prodesc = $("#prodesc");
      
               
       procatname.change(validateCatName);
       prosubcatname.change(validateSubCatName);
       prosubsubcatname.change(validateSubSubCatName);
       protitle.keyup(validateProductTitle);
       protitle.blur(validateProductTitle);  
       probrandname.keyup(validateProductBrandName);    
       probrandname.blur(validateProductBrandName);   
       prodesc.keyup(validateProductDesc);    
       prodesc.blur(validateProductDesc);    
       proprice.keyup(validateProductGrossPrice);
       proprice.blur(validateProductGrossPrice);       
       protype.change(validateProductType); 
       prodistype.change(validateProductDiscountType);    
       prodisprice.keyup(validateProductDiscountPrice);
       prodisprice.blur(validateProductDiscountPrice); 
       proqty.keyup(validateProductQty);
       proqty.blur(validateProductQty);  
       //proimg.change(validateProductImage); 

      
                             	
	   $('form#add-productForm').submit(function(){
	           
                              
            if( validateCatName() == 1 & validateSubCatName() == 1 & validateDiscount()==1 & validateSubSubCatName() == 1 & validateProductTitle() == 1 &  validateProductBrandName() ==1 & validateProductDesc() == 1 & validateProductGrossPrice() == 1 & validateProductQty() == 1) {
                
                
                var formData =  new FormData($('#add-productForm')[0]);  
                formData.append("action", "productdesc")
                
                $.ajax({
                        type: "POST",
                        url: "../ajx_queries.php",
                        data: formData,
                        contentType: false,
				        cache: false,   
                        beforeSend: function(){ $("#beforemsg").html('Please wait...');},
				        processData:false,                      
                        success: function(data){                           
                            if(data=='productupdated') {
                                //$(location).attr('href','products-listing');  
                                window.location.replace("products-listing"); 
                            }
                           
                        }                    
                  });
                             
    		}else {
    		    alert('Some required fields are empty');
                return false;            
    		}
            $("#errormsg").html("");
			return false;
   		
            
	   });
       
       
       function validateDiscount() {            
            if ($(".getdispanel").is(":checked")) {
                if($('.prodistype').val()=="") {
                    $(".prodistype").css({"border":"1px solid #FF0000"});                         
                    return false;
                }
                if($('.prodisprice').val()=="") {
                    $(".prodisprice").css({"border":"1px solid #FF0000"});                         
                    return false;
                }                          
                return 1;
            }else {
                $(".prodisprice").css({"border":""}); 
                $(".prodistype").css({"border":""});            
                return 1;  
            }        
       }
       
       function validateCatName() {        
        if($.trim(procatname.val()) == ""){
			//$("#firstnameMsg").html("Please enter your Full Name. "); 
            $(".procatname").css({"border":"1px solid #FF0000"});                         
            return false;				
		} else {		   
            $(".procatname").css({"border":""});             
            return 1;              
        }
      }
      
      
      function validateSubCatName() {        
        if($.trim(prosubcatname.val()) == ""){
            $(".prosubcatname").css({"border":"1px solid #FF0000"});                         
            return false;				
		} else {		   
            $(".prosubcatname").css({"border":""});             
            return 1;              
        }
      }
      
      function validateSubSubCatName() {        
        if($.trim(prosubsubcatname.val()) == ""){
            $(".prosubsubcatname").css({"border":"1px solid #FF0000"});                         
            return false;				
		} else {		   
            $(".prosubsubcatname").css({"border":""});             
            return 1;              
        }
      }
      
      
      function validateProductTitle() {        
        if($.trim(protitle.val()).length < 1){
            $("#protitle").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#protitle").css({"border":""});       
            return 1;              
        }
      }
      
          
                  
      function validateProductGrossPrice() {        
        if($.trim(proprice.val()).length < 1){
            $("#proprice").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#proprice").css({"border":""});       
            return 1;              
        }
      }
      
          
      
      function validateProductType() {        
        if($.trim(protype.val()) == ""){
            $("#protype").css({"border":"1px solid #FF0000"});            
            return false;				
		} else {		   
            $("#protype").css({"border":""});       
            return 1;              
        }
      }
      
      function validateProductImage() {        
        if($.trim($("#proimg").val()) == ""){
            $("#proimg").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#proimg").css({"border":""});       
            return 1;              
        }
      }
      
      
      function validateProductDiscountType() {        
        if($.trim(prodistype.val()) == ""){
            $("#prodistype").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#prodistype").css({"border":""});       
            validateProductDiscountPrice(); 
            return 1;  
        }
      }
      
      function validateProductDiscountPrice() {        
        if($.trim(prodisprice.val()).length < 1){
            $("#prodisprice").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#prodisprice").css({"border":""});       
            return 1;              
        }
      }
      
      
      function validateProductQty() {        
        if($.trim(proqty.val()).length < 1){
            $("#proqty").css({"border":"1px solid #FF0000"}); 
            
            return false;				
		} else {		   
            $("#proqty").css({"border":""});       
            return 1;              
        }
      }
     
      function validateProductBrandName() {        
        if($.trim($("#probrandname").val()).length < 1){
            $("#probrandname").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#probrandname").css({"border":""});       
            return 1;              
        }
      }
      
      function validateProductDesc() {        
        if($.trim($("#prodesc").val()).length < 1){
            $("#prodesc").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#prodesc").css({"border":""});       
            return 1;              
        }
      }
      
        
	});    

        
    
    
             $(document).ready(function (e) {           
                        
            // Function to preview image after validation
            $(function() {
            $("#proimg").change(function() {
            $("#proimgMsg").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpg","image/png","image/jpeg","image/PNG","image/JPG","image/JPEG"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
            //$('#previewing').attr('src','images/noimage.png');
            //$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            $('#proimgpreviewing').hide();
            $("#proimgMsg").html("<span style='color:#cc0000'>Error: </span>Sorry, only JPG, JPEG and PNG files are allowed. ");
            return false;
            }
            else
            {
            $('#proimgpreviewing').show();
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            }
            });
            });
            function imageIsLoaded(e) {
            $("#proimg").css("color","green");
            $('#proimgImage_preview').css("display", "block");
            $('#proimgpreviewing').attr('src', e.target.result);
            $('#proimgpreviewing').attr('width', '70px');
            $('#proimgpreviewing').attr('height', '70px');
            };
            });
            
    
            
            
             $(document).ready(function(){
                $('#productBtn').click(function(){
                var proimg = $('#proimg').val();
                
                var exts = ['jpg','jpeg','png','PNG','JPG','JPEG'];         
                        
                        
                        /*
                    if( $('#proimg').val()== "" ) {
                        $("#proimgMsg").html("Please upload product image. ");
                        return false;
                    } 
                    */
      
                    if ( proimg ) {
                        // split file name at dot
                        var get_ext = proimg.split('.');
                        // reverse name to check extension
                        get_ext = get_ext.reverse();
                        // check file type is valid as given in 'exts' array
                        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
                          //alert( 'Allowed extension!' );
                        } else {
                          //$('#previewing').hide();
                          $("#proimgMsg").html("Sorry, only JPG, JPEG and PNG files are allowed. ");                
                            return false;
                        }
                    }
                    
            
                    if( proimg ) {               
                        iSize = ($("#proimg")[0].files[0].size / 1024);
                        if (iSize / 1024 > 1)  {    
                            iSize = (Math.round((iSize / 1024) * 100) / 100)  
                            if(iSize > 2) {
                            $("#proimgMsg").html("Image size should be less than 2 MB. ");                
                            return false;
                            }
                        }
                    }      
                });
            });
        
        
        
      
                
            
        //depenedent product listbox
        function showSecondCat(sel) {
             var mainproductcatid = sel.options[sel.selectedIndex].value;
             if (mainproductcatid.length > 0) {
                $.ajax({
                   type: "POST",
                   url: "../admin/ajx_subcategories.php",
                   data: "mainproductcatid=" + mainproductcatid+'&action=getsecondcategories',
                   cache: false,                  
                   success: function(html) {
                    $(".prosubcatname").html(html);
                   }
                });
              
              }
        }
		
		     
        //depenedent product listbox
        function showSecondCat1(sel) {
             var mainproductcatid = sel.options[sel.selectedIndex].value;
             if (mainproductcatid.length > 0) {
                $.ajax({
                   type: "POST",
                   url: "../ajx_subcategories.php",
                   data: "mainproductcatid=" + mainproductcatid+'&action=getsecondcategories',
                   cache: false,                  
                   success: function(html) {
                    $(".prosubcatname").html(html);
                   }
                });
              
              }
        }
        
        
        function showThirdCat(sel) {
             var secondproductcatid = sel.options[sel.selectedIndex].value;
             if (secondproductcatid.length > 0) {
                //alert(secondproductcatid);
                $.ajax({
                    type: "POST",
                    url: "../admin/ajx_subcategories.php",
                    data: "secondproductcatid=" + secondproductcatid+'&action=getthirdcategories',
                    cache: false,                    
                    success: function(html) {
                        $(".prosubsubcatname").html(html);
                    }
                 });
             }
        }
		
		
		//////////////////////////////////////////////////////////
		    function showThirdCat1(sel) {
             var secondproductcatid = sel.options[sel.selectedIndex].value;
             if (secondproductcatid.length > 0) {
                //alert(secondproductcatid);
                $.ajax({
                    type: "POST",
                    url: "../ajx_subcategories.php",
                    data: "secondproductcatid=" + secondproductcatid+'&action=getthirdcategories',
                    cache: false,                    
                    success: function(html) {
                        $(".prosubsubcatname").html(html);
                    }
                 });
             }
        }
        
        function showFourthCat(sel) {
             var thirdproductcatid = sel.options[sel.selectedIndex].value;
             if (thirdproductcatid.length > 0) {
                //alert(secondproductcatid);
                $.ajax({
                    type: "POST",
                    url: "../admin/ajx_subcategories.php",
                    data: "thirdproductcatid=" + thirdproductcatid+'&action=getfourthcategories',
                    cache: false,                    
                    success: function(html) {
                        $(".prosubsubsubcatname").html(html);
                    }
                 });
             }
        }
        

	  ///////////////////////////////////////////////////
	  function showFourthCat1(sel) {
             var thirdproductcatid = sel.options[sel.selectedIndex].value;
             if (thirdproductcatid.length > 0) {
                //alert(secondproductcatid);
                $.ajax({
                    type: "POST",
                    url: "../ajx_subcategories.php",
                    data: "thirdproductcatid=" + thirdproductcatid+'&action=getfourthcategories',
                    cache: false,                    
                    success: function(html) {
                        $(".prosubsubsubcatname").html(html);
                    }
                 });
             }
        }
      
      //eligble for cash on delivery
      $(document).ready(function() {
      $('#cashondelivery').change(function() {
            if ($(this).prop('checked')) {
                $('.cashondelivery1').val('1');  
            }
            else {
                $('.cashondelivery1').val('0');  
            }
        });
      
      $('#returnproduct').change(function() {
            if ($(this).prop('checked')) {
                $('.returnproduct1').val('1');  
            }
            else {
                $('.returnproduct1').val('0');  
            }
        });
        
        $('#feature_products').change(function() {
            if ($(this).prop('checked')) {
                $('.feature_products1').val('1');  
            }
            else {
                $('.feature_products1').val('0');  
            }
        });
      });
      
      	 
		 
		 
       function isGetPay1(evt) { 
        $(".showdis").css("display","none");
        	        if ($(".getdispanel").is(":checked")) {
    			//show the hidden div
    			$(".showdis").show("fast");  
                $(".getdispanel1").val("1"); 
                
                
                
                var price = $('.proprice').val();
            var discounttype = $('.prodistype').val(); 
            var dis_amount = $('.prodisprice').val();
            var dis_percent = $('.prodisprice').val();
                        
            if ($(".getdispanel").is(":checked")) {
    			
                if($('.prodistype').val()!="") {
                    if(discounttype == 1) { //For Rupee         
                      var amount_after_dis = price - dis_amount;
                      $('.pronetprice').val(amount_after_dis);
                      $('.pronetprice1').html(amount_after_dis);                   
                    }
                    if(discounttype == 2) {    		          
                      var discount_amt = price * (dis_percent / 100);
                      var amount_after_dis = price - discount_amt;
                      $('.pronetprice').val(amount_after_dis);   
                      $('.pronetprice1').html(amount_after_dis);                
                    }
                }
            }else {
			 $('.pronetprice').val(price);
             $('.pronetprice1').html(price);   
		    }
                        
                       
		    }else {
			//otherwise, hide it
    			$(".showdis").hide("fast");
                $(".getdispanel1").val("0");  
                
                var price = $('.proprice').val();
            var discounttype = $('.prodistype').val(); 
            var dis_amount = $('.prodisprice').val();
            var dis_percent = $('.prodisprice').val();
                        
            if ($(".getdispanel").is(":checked")) {
    			
                if($('.prodistype').val()!="") {
                    if(discounttype == 1) { //For Rupee         
                      var amount_after_dis = price - dis_amount;
                      $('.pronetprice').val(amount_after_dis);
                      $('.pronetprice1').html(amount_after_dis);                   
                    }
                    if(discounttype == 2) {    		          
                      var discount_amt = price * (dis_percent / 100);
                      var amount_after_dis = price - discount_amt;
                      $('.pronetprice').val(amount_after_dis);   
                      $('.pronetprice1').html(amount_after_dis);                
                    }
                }
            }else {
			 $('.pronetprice').val(price);
             $('.pronetprice1').html(price);   
		    }
                
		    }
        return true;
       } 
        
       
       function isGetPay(evt) {
            
            var price = $('.proprice').val();
            var discounttype = $('.prodistype').val(); 
            var dis_amount = $('.prodisprice').val();
            var dis_percent = $('.prodisprice').val();
                        
            if ($(".getdispanel").is(":checked")) {
    			
                if($('.prodistype').val()!="") {
                    if(discounttype == 1) { //For Rupee         
                      var amount_after_dis = price - dis_amount;
                      $('.pronetprice').val(amount_after_dis);
                      $('.pronetprice1').html(amount_after_dis);                   
                    }
                    if(discounttype == 2) {    		          
                      var discount_amt = price * (dis_percent / 100);
                      var amount_after_dis = price - discount_amt;
                      $('.pronetprice').val(amount_after_dis);   
                      $('.pronetprice1').html(amount_after_dis);                
                    }
                }
            }else {
			 $('.pronetprice').val(price);
             $('.pronetprice1').html(price);   
		    }
            return true;
        }  
       
        
        
        //check all
        $(document).ready(function() {
            $('#selecctall').click(function(event) {  //on click 
                if(this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"               
                    });
                }else{
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                    });         
                }
            });    
        });
        
        
        
        
        
        
        function isGetPay3(evt) { 
        
     	  if ($(".delivered247").is(":checked")) {    		
                $(".getdelivered247").val("1"); 
		    }else {			
                $(".getdelivered247").val("0");              
		    }
        return true;
       } 
        
        
                
/*********************************** End Product Categories *******************************************/


/*********************************** Add New Admin  *******************************************/


 		function AdminClearFields(theForm){
        
        	theForm.adminname.value="";
			theForm.adminemail.value="";
			theForm.adminusername.value="";
			theForm.adminpassword.value="";
			theForm.admintype.value="";
        }

        function AdminInputFieldValidations(theForm) {
        
            if (theForm.adminname.value == "") {				             
        		alert("Enter a Name.");
        		theForm.adminname.focus();
        		return (false);
            }
			if (theForm.adminemail.value == "") {				             
        		alert("Enter a valid Email.");
        		theForm.adminemail.focus();
        		return (false);
            }
			if (theForm.adminusername.value == "") {				             
        		alert("Enter a Username.");
        		theForm.adminusername.focus();
        		return (false);
            }
			if (theForm.adminpassword.value == "") {				             
        		alert("Enter a Password.");
        		theForm.adminpassword.focus();
        		return (false);
            }
			if (theForm.admintype.value == "") {				             
        		alert("Select Admin Type.");
        		theForm.admintype.focus();
        		return (false);
            }
        	
        	return true;  
        }
        

        function AdminActionFunction(urls, catids, work){
            
            if (work == "edit") {
              
        	  
        	  var divcontainer=$('#adminInsert');
        	 
        	  divcontainer.empty();
              //divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');
        	 
        	  divcontainer.slideDown('slow', function(){
              divcontainer.load(urls+'?adminloginid='+catids+'&sid='+Math.random());
              });
        	 
        	 
            }
    
            if (work == "delete") {     
	 
                var result = confirm("Are you sure you want to delete?");     
	 
                if (result == true) {	
	
            	$.ajax({
            	    url: urls,
            	    async: true,
            	    cache: false,
            	    data: {adminloginid: catids},
            	    type: 'get',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
            		   var spancontainer=$('span#record'+catids);
            		   $('#loading').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
                                   
            			 spancontainer.slideUp('slow', function(){
                         spancontainer.fadeOut("slow");
            	         spancontainer.remove();
            			 });
            			    
            			 window.location.reload(true);
            		    }
            		    else {
            		        spancontainer.slideUp('slow', function(){		
            			    spancontainer.html("Error While this deleting a record");
            				});
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
            	
            	
                 
                  }
                 
                }
                
            }

        function AdminCommonFunction(FormObject, pageurl, loadurl,  FormID) { 
           
            var noofrecords = $('span.items').length;
        	
            if(AdminInputFieldValidations(FormObject)) {               
               	    
        	$.ajax({
        	    url: pageurl,
        	    async: true,
        	    cache: false,
        	    data: $('#'+FormID).serialize(),
        	    type: 'post',			
        	    success: function (data) {
        		   data=data.replace(/\s+/g,"");
        		  
        		   $('#loading').html('<img src="../images/load.gif">');  	 
        		   if(data != 0){
        		 
        				var spancontainer;
        			    $('.errormsg').empty();
        			    $('div#successfulpost').fadeIn();
        			    
        			    if($('span#record'+data).length){
        				spancontainer=$('span#record'+data);
        			    }else{
        			    $("<span id='record"+data+"' class='items'></span>").appendTo("#adminLoad");
        				spancontainer=$('span#record'+data);
        			    }
        			    ///If an element found
        			    if(spancontainer.length){
        					
        					spancontainer.slideDown('slow', function(){
        					//spancontainer.html('<div style="float:left; margin-left:5px;"><img src="../images/load.gif" /></div>');
        					spancontainer.fadeIn("slow");
        			   		spancontainer.load(loadurl+'?adminloginid='+data+'&sid='+Math.random());
        					});
        			        
                               
                        }
        			    
        		          window.location.reload(true);                        
                          //$('#forminsert').trigger("reset");
        			
        		    }
        		    else {
        		        
        			    $('#'+FormID).show(function(){					
        			    $('.errormsg').html(data);
        			    $('.errormsg').fadeIn(500);
        			    });
        		    }
        	    },
        	    error : function(XMLHttpRequest, textStatus, errorThrown) {
        		    alert(textStatus);
        	    }
        	});
        	
        	AdminClearFields(FormObject);
        	return false;
            }
            return false;    
        }
/*********************************** End Add New Admin  *******************************************/


/***************** New Member Sign Up ********/
    
    $(document).ready(function() {
                     
       $("#fullname").keyup(validateName);
       $("#fullname").blur(validateName); 
       $("#emailid").keyup(validateEmail);
       $("#emailid").blur(validateEmail);
       $("#mobileno").keyup(validateMobile);
       $("#mobileno").blur(validateMobile); 
       $("#password").keyup(validatePassword);
       $("#password").blur(validatePassword); 
       $("#confirm_password").keyup(validateConfirmPassword);
       $("#confirm_password").blur(validateConfirmPassword);
      
      
	   $('form#newmemberForm').submit(function(){        
            
            if( validateName() == 1 & validateEmail() == 1 & validateMobile() == 1 &  validatePassword() == 1 & validateConfirmPassword() == 1 ) {

                var formData =  new FormData($('#newmemberForm')[0]);  
                formData.append("action", "newmemberprofile")

                 $.ajax({
                        type: "POST",
                        url: "../ajx_queries.php",
                        data: formData,
                        contentType: false,
				        cache: false,   
				        processData:false,                      
                        success: function(data){                             
                            
                            if(data == "emailexists") {
                                $("#regerrormsg").html("Email Adddress is already exists with us.");  
                                $("#regsucessmsg").html("");
                                return false;   
                            } 
                            if(data == "invalidemailaddress") {
                                $("#regerrormsg").html("Invalid Email Adddress.");  
                                $("#regsucessmsg").html("");
                                return false;   
                            }                                                     
                            if(data == "registrationdone")  {                   
                                $("#regsucessmsg").html("You have been successfully registered.");  
                                $("#regerrormsg").html(""); 
                                $('#newmemberForm').trigger("reset");                        
                            }  
                        }                    
                  });
                  
			}
            $("#regerrormsg").html("");
            $("#regsucessmsg").html("");
			return false;
   		
            
	   });
       
       function validateName() {        
        if($.trim($("#fullname").val()).length < 1){
            $("#fullname").css({"border":"1px solid #FF0000"}); 
            $("#fullnameMsg").html('Please fill your complete name.');                        
            return false;				
		} else {                       
            $("#fullname").css({"border":""}); 
            $("#fullnameMsg").html(''); 
            return 1;              
        }
      }
      
      
      function validateEmail(){		
			 var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			//if it's valid email
            if ($.trim($("#emailid").val()).length == 0) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }
            if (!filter.test($("#emailid").val())) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }else {
                $("#emailid").css({"border":""}); 
                $("#emailidMsg").html('');          
                return 1;
            }			
	   }
      
      function validateAddress() {        
        if($("#address").val() == ""){
            $("#address").css({"border":"1px solid #FF0000"});
            $("#addressMsg").html('Please enter your complete address.');                         
            return false;				
		} else {                       
            $("#address").css({"border":""});    
            $("#addressMsg").html(''); 
            return 1;              
        }
      }
      
      function validateMobile() {        
        if($.trim($("#mobileno").val()).length < 1){
            $("#mobileno").css({"border":"1px solid #FF0000"});
            $("#mobileMsg").html('Please enter your mobile no.');                         
            return false;				
		} else {                       
            $("#mobileno").css({"border":""});    
            $("#mobileMsg").html(''); 
            return 1;              
        }
      }
      
      
      function validatePassword() {
         if($.trim($("#password").val()).length == 0){			
            $("#password").css({"border":"1px solid #FF0000"});
            $("#passwordMsg").html('Password must be greater than 6 characters.');           
            return false;				
		 }
         else if($.trim($("#password").val()).length < 6){			
            $("#password").css({"border":"1px solid #FF0000"});
            $("#passwordMsg").html('Password must be greater than 6 characters.');      
            return false;				
		} else {             
            $("#password").css({"border":""});
            $("#passwordMsg").html('');      
            validateConfirmPassword();
            return 1;         
        }
      }  
            
      
      function validateConfirmPassword() {
         if($.trim($("#confirm_password").val()).length == 0){			
			$("#confirmPassMsg").html("Password & Confirm Password does not match. ");
            $("#confirm_password").css({"border":"1px solid #FF0000"});
            return false;				
		 }
         else if($.trim($("#confirm_password").val()).length < 6){			
			$("#confirmPassMsg").html("Password & Confirm Password does not match. ");
            $("#confirm_password").css({"border":"1px solid #FF0000"});
            return false;				
		}
        else if( $.trim($("#password").val()) != $.trim($("#confirm_password").val()) ){				
			$("#confirmPassMsg").html("Password & Confirm Password does not match. ");
            $("#confirm_password").css({"border":"1px solid #FF0000"});
            return false;				
		} else {             
            $("#confirmPassMsg").html("");
            $("#confirm_password").css({"border":""});
            return 1;         
        }
      } 
      
      
                
      
	});    

/***************** End New Member Sign Up *******/


/******   Member Login *******/

    $(document).ready(function() {
			
	   $('#signupBtn').click(function()	{
			
            var username=$("#loginemailid").val();
			var password=$("#loginpassword").val();
            			
            var dataString = 'username='+username+'&password='+password+'&action=memberlogin';
			
			if($.trim(username).length < 1) {				
				$("#loginemailidMsg").html("Please enter a valid Username or Email. ");
				$("#loginemailid").focus();    
                return false;				
			}
			else if( $.trim(password).length < 1) {				
				$("#loginpasswordMsg").html("Please enter you Password. ");
				$("#loginpassword").focus();
                return false;				
			}		    
			
			else {	
              
    			$.ajax({
                type: "POST",
                url: "../ajx_queries.php",
                data: dataString,
                cache: false,
                beforeSend: function(){ $("#signupBtn").val('Connecting...');},
                success: function(data){       
                   
					if(data=="loginnotsuccess") {                    
                        $("#errormsg").html("You have entered a wrong Email Address or Password. Make sure that it is typed correctly. ");                        
                        $("#signupBtn").val('Login')
                        $('#loginForm').trigger("reset");                    
                    }
                    if(data == "loginsuccess")  {
                        $("#errormsg").html("");    
                        $("#signupBtn").val('Login');   
                        //window.location.replace("categories");                 
                        //$(location).attr('href','categories.php');  
                        $(location).attr('href','../member/dashboard');                 			
                    }
                }
                });			
			}
			return false;
	   });			
				
	});

/******   End Member Login *******/

/***************** Update Member Profile ********/
    
    $(document).ready(function() {
                     
       $("#fullname").keyup(validateName);
       $("#fullname").blur(validateName); 
       $("#emailid").keyup(validateEmail);
       $("#emailid").blur(validateEmail);
       $("#mobileno").keyup(validateMobile);
       $("#mobileno").blur(validateMobile); 
	   
	   $("#address").keyup(validateAddress);
       $("#address").blur(validateAddress);
	   $("#pincode").keyup(validatePinCode);
       $("#pincode").blur(validatePinCode);
	   $("#city").keyup(validateCityName);
       $("#city").blur(validateCityName);
       $("#state").change(validateState);
      
	   $('form#updatememberprofileForm').submit(function(){        
           
            if( validateName() == 1 & validateEmail() == 1 & validateMobile() == 1 & validateAddress()==1 & validatePinCode()==1 & validateCityName()==1 & validateState()==1) {

                var formData =  new FormData($('#updatememberprofileForm')[0]);  
                formData.append("action", "updatememberprofile")

                 $.ajax({
                        type: "POST",
                        url: "../ajx_queries.php",
                        data: formData,
                        contentType: false,
				        cache: false,   
				        processData:false,                      
                        success: function(data){   
                                                                        
                            if(data == "memberprofileupdated")  {                   
                                $("#sucessmsg").html("Your profile has been successfully updated.");  
                                $("#errormsg").html(""); 
                                //$('#newmemberForm').trigger("reset");                        
                            }  
                        }                    
                  });
                  
			}
            $("#errormsg").html("");
            $("#sucessmsg").html("");
			return false;
   		
            
	   });
       
       $('form#updatememberprofileForm1').submit(function(){        
           
            if( validateName() == 1 & validateMobile() == 1 & validateAddress()==1 & validatePinCode()==1 & validateCityName()==1 & validateState()==1) {

                var formData =  new FormData($('#updatememberprofileForm1')[0]);  
                formData.append("action", "updatememberprofile")

                 $.ajax({
                        type: "POST",
                        url: "ajx_queries.php",
                        data: formData,
                        contentType: false,
				        cache: false,   
				        processData:false,                      
                        success: function(data){   
                                                                  
                            if(data == "memberprofileupdated")  {                   
                                $("#sucessmsg").html("Your profile has been successfully updated.");  
                                $("#errormsg").html(""); 
                                $("body").load("checkout").hide().fadeIn(0).delay();                  
                            }  
                        }                    
                  });
                  
			}
            $("#errormsg").html("");
            $("#sucessmsg").html("");
			return false;
   		
            
	   });
       
       function validateName() {        
        if($.trim($("#fullname").val()).length < 1){
            $("#fullname").css({"border":"1px solid #FF0000"}); 
            $("#fullnameMsg").html('Please fill your complete name.');                        
            return false;				
		} else {                       
            $("#fullname").css({"border":""}); 
            $("#fullnameMsg").html(''); 
            return 1;              
        }
      }
      
      
      function validateEmail(){		
			 var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			//if it's valid email
            if ($.trim($("#emailid").val()).length == 0) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }
            if (!filter.test($("#emailid").val())) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }else {
                $("#emailid").css({"border":""}); 
                $("#emailidMsg").html('');          
                return 1;
            }			
	   }
      
      function validateAddress() {        
        if($("#address").val() == ""){
            $("#address").css({"border":"1px solid #FF0000"});
            $("#addressMsg").html('Please enter your complete address.');                         
            return false;				
		} else {                       
            $("#address").css({"border":""});    
            $("#addressMsg").html(''); 
            return 1;              
        }
      }
      
      function validateMobile() {        
        if($.trim($("#mobileno").val()).length < 1){
            $("#mobileno").css({"border":"1px solid #FF0000"});
            $("#mobileMsg").html('Please enter your mobile no.');                         
            return false;				
		} else {                       
            $("#mobileno").css({"border":""});    
            $("#mobileMsg").html(''); 
            return 1;              
        }
      }
      
      function validatePinCode() {        
        if($.trim($("#pincode").val()).length < 1){
            $("#pincode").css({"border":"1px solid #FF0000"});
            $("#pincodeMsg").html('Please enter your pincode.');                         
            return false;				
		} else {                       
            $("#pincode").css({"border":""});    
            $("#pincodeMsg").html(''); 
            return 1;              
        }
      }
      
      function validateCityName() {        
        if($.trim($("#city").val()).length < 1){
            $("#city").css({"border":"1px solid #FF0000"});
			$("#cityMsg").html('Please enter your city.');  
            return false;				
		} else {                       
            $("#city").css({"border":""}); 
			  $("#cityMsg").html('');    
            return 1;              
        }
      }
      
      function validateState() {        
        if($.trim($("#state").val()).length < 1){
            $("#state").css({"border":"1px solid #FF0000"});
            return false;				
		} else {                       
            $("#state").css({"border":""}); 
			 
            return 1;              
        }
      }
          
      
	});    

/***************** End Member Sign Up *******/


/***************** Vendor Sign Up ********/
       
    $(document).ready(function() {
                     
       $("#fullname").keyup(validateName);
       $("#fullname").blur(validateName); 
       $("#organisationname").keyup(validateOrganisationName);
       $("#organisationname").blur(validateOrganisationName); 
       $("#organisationdate").change(validateOrganisationActive); 
       $("#emailid").keyup(validateEmail);
       $("#emailid").blur(validateEmail);
       $("#mobileno").keyup(validateMobile);
       $("#mobileno").blur(validateMobile); 
       $("#password").keyup(validatePassword);
       $("#password").blur(validatePassword); 
       $("#confirm_password").keyup(validateConfirmPassword);
       $("#confirm_password").blur(validateConfirmPassword);
   
      
	   $('form#newvendorForm').submit(function(){        
            
            if( validateName() == 1 & validateEmail() == 1 & validateMobile() == 1 &  validatePassword() == 1 & validateConfirmPassword() == 1 & validateOrganisationName() == 1 ) {

                var formData =  new FormData($('#newvendorForm')[0]);  
                formData.append("action", "newvendorprofile");
				

                 $.ajax({
                        type: "POST",
                        url: "../ajx_queries.php",
						
                        data: formData,
                        contentType: false,
				        cache: false,   
				        processData:false,                      
                        success: function(data){  
							
                            if(data == "emailexists") {
                                $("#errormsg").html("You have been successfully registered.");  
                                $("#sucessmsg").html("");
                                return false;   
                            } 
                            if(data == "invalidemailaddress") {
                                $("#errormsg").html("Invalid Email Adddress.");  
                                $("#sucessmsg").html("");
                                return false;   
                            }                                                     
                            if(data == "registrationdone")  {                   
                                $("#sucessmsg").html("You have been successfully registered.");  
                                $("#errormsg").html(""); 
                                $('#newvendorForm').trigger("reset");   
								
															
                            }  
                        }                    
                  });
                  
			}
            $("#errormsg").html("");
            $("#sucessmsg").html("");
			
			return false;
   		
            
	   });
       
       function validateName() {        
        if($.trim($("#fullname").val()).length < 1){
            $("#fullname").css({"border":"1px solid #FF0000"}); 
            $("#fullnameMsg").html('Please fill your complete name.');                        
            return false;				
		} else {                       
            $("#fullname").css({"border":""}); 
            $("#fullnameMsg").html(''); 
            return 1;              
        }
      }
      
      
      function validateOrganisationName() {        
        if($.trim($("#organisationname").val()).length < 1){
            $("#organisationname").css({"border":"1px solid #FF0000"}); 
            $("#organisationnameMsg").html('Please fill your organisation name.');                        
            return false;				
		} else {                       
            $("#organisationname").css({"border":""}); 
            $("#organisationnameMsg").html(''); 
            return 1;              
        }
      }
      
      function validateOrganisationActive() {        
        if($.trim($("#organisationdate").val()).length < 1){
            $("#organisationdate").css({"border":"1px solid #FF0000"}); 
            $("#organisationdateMsg").html('Please fill your organisation name.');                        
            return false;				
		} else {                       
            $("#organisationdate").css({"border":""}); 
            $("#organisationdateMsg").html(''); 
            return 1;              
        }
      }
      
      function validateEmail(){		
			 var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			//if it's valid email
            if ($.trim($("#emailid").val()).length == 0) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }
            if (!filter.test($("#emailid").val())) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }else {
                $("#emailid").css({"border":""}); 
                $("#emailidMsg").html('');          
                return 1;
            }			
	   }
      
      function validateAddress() {        
        if($("#address").val() == ""){
            $("#address").css({"border":"1px solid #FF0000"});
            $("#addressMsg").html('Please enter your complete address.');                         
            return false;				
		} else {                       
            $("#address").css({"border":""});    
            $("#addressMsg").html(''); 
            return 1;              
        }
      }
      
      function validateMobile() {        
        if($.trim($("#mobileno").val()).length < 1){
            $("#mobileno").css({"border":"1px solid #FF0000"});
            $("#mobileMsg").html('Please enter your mobile no.');                         
            return false;				
		} else {                       
            $("#mobileno").css({"border":""});    
            $("#mobileMsg").html(''); 
            return 1;              
        }
      }
      
      
      function validatePassword() {
         if($.trim($("#password").val()).length == 0){			
            $("#password").css({"border":"1px solid #FF0000"});
            $("#passwordMsg").html('Password must be greater than 6 characters.');           
            return false;				
		 }
         else if($.trim($("#password").val()).length < 6){			
            $("#password").css({"border":"1px solid #FF0000"});
            $("#passwordMsg").html('Password must be greater than 6 characters.');      
            return false;				
		} else {             
            $("#password").css({"border":""});
            $("#passwordMsg").html('');      
            validateConfirmPassword();
            return 1;         
        }
      }  
            
      
      function validateConfirmPassword() {
         if($.trim($("#confirm_password").val()).length == 0){			
			$("#confirmPassMsg").html("Password & Confirm Password does not match. ");
            $("#confirm_password").css({"border":"1px solid #FF0000"});
            return false;				
		 }
         else if($.trim($("#confirm_password").val()).length < 6){			
			$("#confirmPassMsg").html("Password & Confirm Password does not match. ");
            $("#confirm_password").css({"border":"1px solid #FF0000"});
            return false;				
		}
        else if( $.trim($("#password").val()) != $.trim($("#confirm_password").val()) ){				
			$("#confirmPassMsg").html("Password & Confirm Password does not match. ");
            $("#confirm_password").css({"border":"1px solid #FF0000"});
            return false;				
		} else {             
            $("#confirmPassMsg").html("");
            $("#confirm_password").css({"border":""});
            return 1;         
        }
      } 
      
      
                
      
	});    

/***************** End Vendor Sign Up *******/


/******   Vendor Login *******/

    $(document).ready(function() {
			
	   $('#vendorlogBtn').click(function()	{
			
            var username=$("#vendorusername").val();
			var password=$("#vendorpassword").val();
            			
            var dataString = 'username='+username+'&password='+password+'&action=vendorlogin';
			
			if($.trim(username).length < 1) {				
				$("#verrormsg").html("Please enter a valid Username or Email. ");
				$("#vendorusername").focus();    
                return false;				
			}
			else if( $.trim(password).length < 1) {				
				$("#verrormsg").html("Please enter you Password. ");
				$("#vendorpassword").focus();
                return false;				
			}		    
			
			else {	
              
    			$.ajax({
                type: "POST",
                url: "../ajx_queries.php",
                data: dataString,
                cache: false,
                beforeSend: function(){ $("#vendorlogBtn").val('Connecting...');},
                success: function(data){       
                  
					if(data=="loginnotsuccess") {                    
                        $("#verrormsg").html("You have entered a wrong Email Address or Password. Make sure that it is typed correctly. ");                        
                        $("#vendorlogBtn").val('Login')
                        $('#vendorLoginForm').trigger("reset");                    
                    }
                    if(data == "loginsuccess")  {
                        $("#verrormsg").html("");    
                        $("#vendorlogBtn").val('Login');   
                        //window.location.replace("categories");                 
                        //$(location).attr('href','categories.php');  
                        $(location).attr('href','../vendor/dashboard');                 			
                    }
                }
                });			
			}
			return false;
	   });			
				
	});

/******   Vendor Login *******/



/*********************************** vendor Product Categories *******************************************/
         $(document).ready(function() {
		
       var procatname = $(".procatname");
       var prosubcatname = $(".prosubcatname");
       var prosubsubcatname = $(".prosubsubcatname");
       var protitle = $("#protitle");
       var proimg = $("#proimg");
       var proprice = $("#proprice");
       var protype = $("#protype");
       var prodistype = $("#prodistype");
       var prodisprice = $("#prodisprice");
       var pronetprice = $("#pronetprice");
       var proqty = $("#proqty");
       var probrandname = $("#probrandname");
       var prodesc = $("#prodesc");
      
               
       procatname.change(validateCatName);
       prosubcatname.change(validateSubCatName);
       prosubsubcatname.change(validateSubSubCatName);
       protitle.keyup(validateProductTitle);
       protitle.blur(validateProductTitle);  
       probrandname.keyup(validateProductBrandName);    
       probrandname.blur(validateProductBrandName);   
       prodesc.keyup(validateProductDesc);    
       prodesc.blur(validateProductDesc);    
       proprice.keyup(validateProductGrossPrice);
       proprice.blur(validateProductGrossPrice);       
       protype.change(validateProductType); 
       prodistype.change(validateProductDiscountType);    
       prodisprice.keyup(validateProductDiscountPrice);
       prodisprice.blur(validateProductDiscountPrice); 
       proqty.keyup(validateProductQty);
       proqty.blur(validateProductQty);  
       //proimg.change(validateProductImage); 

      
                             	
	   $('form.vendor-productForm').submit(function(){
	           
                         
            if( validateCatName() == 1 & validateSubCatName() == 1 & validateDiscount()==1 & validateSubSubCatName() == 1 & validateProductTitle() == 1 &  validateProductBrandName() ==1 & validateProductDesc() == 1 & validateProductGrossPrice() == 1 & validateProductQty() == 1) {
                
                  
                var formData =  new FormData($('.vendor-productForm')[0]);  
                formData.append("action", "vendorproductdesc")
                
                $.ajax({
                        type: "POST",
                        url: "../ajx_queries.php",
                        data: formData,
                        contentType: false,
				        cache: false,   
                        beforeSend: function(){ $("#beforemsg").html('Please wait...');},
				        processData:false,                      
                        success: function(data){                          
                            if(data=='productupdated') {
                                //$(location).attr('href','products-listing');  
                                window.location.replace("../vendor/products-listing"); 
                            }
                           
                        }                    
                  });
                             
    		}else {
    		    alert('Some required fields are empty');
                return false;            
    		}
            $("#errormsg").html("");
			return false;
   		
            
	   });
       
       
       function validateDiscount() {            
            if ($(".getdispanel").is(":checked")) {
                if($('.prodistype').val()=="") {
                    $(".prodistype").css({"border":"1px solid #FF0000"});                         
                    return false;
                }
                if($('.prodisprice').val()=="") {
                    $(".prodisprice").css({"border":"1px solid #FF0000"});                         
                    return false;
                }                          
                return 1;
            }else {
                $(".prodisprice").css({"border":""}); 
                $(".prodistype").css({"border":""});            
                return 1;  
            }        
       }
       
       function validateCatName() {        
        if($.trim(procatname.val()) == ""){
			//$("#firstnameMsg").html("Please enter your Full Name. "); 
            $(".procatname").css({"border":"1px solid #FF0000"});                         
            return false;				
		} else {		   
            $(".procatname").css({"border":""});             
            return 1;              
        }
      }
      
      
      function validateSubCatName() {        
        if($.trim(prosubcatname.val()) == ""){
            $(".prosubcatname").css({"border":"1px solid #FF0000"});                         
            return false;				
		} else {		   
            $(".prosubcatname").css({"border":""});             
            return 1;              
        }
      }
      
      function validateSubSubCatName() {        
        if($.trim(prosubsubcatname.val()) == ""){
            $(".prosubsubcatname").css({"border":"1px solid #FF0000"});                         
            return false;				
		} else {		   
            $(".prosubsubcatname").css({"border":""});             
            return 1;              
        }
      }
      
      
      function validateProductTitle() {        
        if($.trim(protitle.val()).length < 1){
            $("#protitle").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#protitle").css({"border":""});       
            return 1;              
        }
      }
      
          
                  
      function validateProductGrossPrice() {        
        if($.trim(proprice.val()).length < 1){
            $("#proprice").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#proprice").css({"border":""});       
            return 1;              
        }
      }
      
          
      
      function validateProductType() {        
        if($.trim(protype.val()) == ""){
            $("#protype").css({"border":"1px solid #FF0000"});            
            return false;				
		} else {		   
            $("#protype").css({"border":""});       
            return 1;              
        }
      }
      
      function validateProductImage() {        
        if($.trim($("#proimg").val()) == ""){
            $("#proimg").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#proimg").css({"border":""});       
            return 1;              
        }
      }
      
      
      function validateProductDiscountType() {        
        if($.trim(prodistype.val()) == ""){
            $("#prodistype").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#prodistype").css({"border":""});       
            validateProductDiscountPrice(); 
            return 1;  
        }
      }
      
      function validateProductDiscountPrice() {        
        if($.trim(prodisprice.val()).length < 1){
            $("#prodisprice").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#prodisprice").css({"border":""});       
            return 1;              
        }
      }
      
      
      function validateProductQty() {        
        if($.trim(proqty.val()).length < 1){
            $("#proqty").css({"border":"1px solid #FF0000"}); 
            
            return false;				
		} else {		   
            $("#proqty").css({"border":""});       
            return 1;              
        }
      }
     
      function validateProductBrandName() {        
        if($.trim($("#probrandname").val()).length < 1){
            $("#probrandname").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#probrandname").css({"border":""});       
            return 1;              
        }
      }
      
      function validateProductDesc() {        
        if($.trim($("#prodesc").val()).length < 1){
            $("#prodesc").css({"border":"1px solid #FF0000"}); 
            return false;				
		} else {		   
            $("#prodesc").css({"border":""});       
            return 1;              
        }
      }
      
        
	});    

        
    
    
             $(document).ready(function (e) {           
                        
            // Function to preview image after validation
            $(function() {
            $("#proimg").change(function() {
            $("#proimgMsg").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpg","image/png","image/jpeg","image/PNG","image/JPG","image/JPEG"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
            //$('#previewing').attr('src','images/noimage.png');
            //$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            $('#proimgpreviewing').hide();
            $("#proimgMsg").html("<span style='color:#cc0000'>Error: </span>Sorry, only JPG, JPEG and PNG files are allowed. ");
            return false;
            }
            else
            {
            $('#proimgpreviewing').show();
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            }
            });
            });
            function imageIsLoaded(e) {
            $("#proimg").css("color","green");
            $('#proimgImage_preview').css("display", "block");
            $('#proimgpreviewing').attr('src', e.target.result);
            $('#proimgpreviewing').attr('width', '70px');
            $('#proimgpreviewing').attr('height', '70px');
            };
            });
            
    
            
            
             $(document).ready(function(){
                $('#productBtn').click(function(){
                var proimg = $('#proimg').val();
                
                var exts = ['jpg','jpeg','png','PNG','JPG','JPEG'];         
                        
                        
                        /*
                    if( $('#proimg').val()== "" ) {
                        $("#proimgMsg").html("Please upload product image. ");
                        return false;
                    } 
                    */
      
                    if ( proimg ) {
                        // split file name at dot
                        var get_ext = proimg.split('.');
                        // reverse name to check extension
                        get_ext = get_ext.reverse();
                        // check file type is valid as given in 'exts' array
                        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
                          //alert( 'Allowed extension!' );
                        } else {
                          //$('#previewing').hide();
                          $("#proimgMsg").html("Sorry, only JPG, JPEG and PNG files are allowed. ");                
                            return false;
                        }
                    }
                    
            
                    if( proimg ) {               
                        iSize = ($("#proimg")[0].files[0].size / 1024);
                        if (iSize / 1024 > 1)  {    
                            iSize = (Math.round((iSize / 1024) * 100) / 100)  
                            if(iSize > 2) {
                            $("#proimgMsg").html("Image size should be less than 2 MB. ");                
                            return false;
                            }
                        }
                    }      
                });
            });
        
        
        
      
                
            
        //depenedent product listbox
        function showSecondCat(sel) {
             var mainproductcatid = sel.options[sel.selectedIndex].value;
             if (mainproductcatid.length > 0) {
                $.ajax({
                   type: "POST",
                   url: "../admin/ajx_subcategories.php",
                   data: "mainproductcatid=" + mainproductcatid+'&action=getsecondcategories',
                   cache: false,                  
                   success: function(html) {
                    $(".prosubcatname").html(html);
                   }
                });
              
              }
        }
        
        
        function showThirdCat(sel) {
             var secondproductcatid = sel.options[sel.selectedIndex].value;
             if (secondproductcatid.length > 0) {
                //alert(secondproductcatid);
                $.ajax({
                    type: "POST",
                    url: "../admin/ajx_subcategories.php",
                    data: "secondproductcatid=" + secondproductcatid+'&action=getthirdcategories',
                    cache: false,                    
                    success: function(html) {
                        $(".prosubsubcatname").html(html);
                    }
                 });
             }
        }
        
        function showFourthCat(sel) {
             var thirdproductcatid = sel.options[sel.selectedIndex].value;
             if (thirdproductcatid.length > 0) {
                //alert(secondproductcatid);
                $.ajax({
                    type: "POST",
                    url: "../admin/ajx_subcategories.php",
                    data: "thirdproductcatid=" + thirdproductcatid+'&action=getfourthcategories',
                    cache: false,                    
                    success: function(html) {
                        $(".prosubsubsubcatname").html(html);
                    }
                 });
             }
        }
        

	  
      
      //eligble for cash on delivery
      $(document).ready(function() {
      $('#cashondelivery').change(function() {
            if ($(this).prop('checked')) {
                $('.cashondelivery1').val('1');  
            }
            else {
                $('.cashondelivery1').val('0');  
            }
        });
      
      $('#returnproduct').change(function() {
            if ($(this).prop('checked')) {
                $('.returnproduct1').val('1');  
            }
            else {
                $('.returnproduct1').val('0');  
            }
        });
        
        $('#feature_products').change(function() {
            if ($(this).prop('checked')) {
                $('.feature_products1').val('1');  
            }
            else {
                $('.feature_products1').val('0');  
            }
        });
      });
      
      	 
		 
		 
       function isGetPay1(evt) { 
        $(".showdis").css("display","none");
        	        if ($(".getdispanel").is(":checked")) {
    			//show the hidden div
    			$(".showdis").show("fast");  
                $(".getdispanel1").val("1"); 
                
                
                
                var price = $('.proprice').val();
            var discounttype = $('.prodistype').val(); 
            var dis_amount = $('.prodisprice').val();
            var dis_percent = $('.prodisprice').val();
                        
            if ($(".getdispanel").is(":checked")) {
    			
                if($('.prodistype').val()!="") {
                    if(discounttype == 1) { //For Rupee         
                      var amount_after_dis = price - dis_amount;
                      $('.pronetprice').val(amount_after_dis);
                      $('.pronetprice1').html(amount_after_dis);                   
                    }
                    if(discounttype == 2) {    		          
                      var discount_amt = price * (dis_percent / 100);
                      var amount_after_dis = price - discount_amt;
                      $('.pronetprice').val(amount_after_dis);   
                      $('.pronetprice1').html(amount_after_dis);                
                    }
                }
            }else {
			 $('.pronetprice').val(price);
             $('.pronetprice1').html(price);   
		    }
                        
                       
		    }else {
			//otherwise, hide it
    			$(".showdis").hide("fast");
                $(".getdispanel1").val("0");  
                
                var price = $('.proprice').val();
            var discounttype = $('.prodistype').val(); 
            var dis_amount = $('.prodisprice').val();
            var dis_percent = $('.prodisprice').val();
                        
            if ($(".getdispanel").is(":checked")) {
    			
                if($('.prodistype').val()!="") {
                    if(discounttype == 1) { //For Rupee         
                      var amount_after_dis = price - dis_amount;
                      $('.pronetprice').val(amount_after_dis);
                      $('.pronetprice1').html(amount_after_dis);                   
                    }
                    if(discounttype == 2) {    		          
                      var discount_amt = price * (dis_percent / 100);
                      var amount_after_dis = price - discount_amt;
                      $('.pronetprice').val(amount_after_dis);   
                      $('.pronetprice1').html(amount_after_dis);                
                    }
                }
            }else {
			 $('.pronetprice').val(price);
             $('.pronetprice1').html(price);   
		    }
                
		    }
        return true;
       } 
        
       
       function isGetPay(evt) {
            
            var price = $('.proprice').val();
            var discounttype = $('.prodistype').val(); 
            var dis_amount = $('.prodisprice').val();
            var dis_percent = $('.prodisprice').val();
                        
            if ($(".getdispanel").is(":checked")) {
    			
                if($('.prodistype').val()!="") {
                    if(discounttype == 1) { //For Rupee         
                      var amount_after_dis = price - dis_amount;
                      $('.pronetprice').val(amount_after_dis);
                      $('.pronetprice1').html(amount_after_dis);                   
                    }
                    if(discounttype == 2) {    		          
                      var discount_amt = price * (dis_percent / 100);
                      var amount_after_dis = price - discount_amt;
                      $('.pronetprice').val(amount_after_dis);   
                      $('.pronetprice1').html(amount_after_dis);                
                    }
                }
            }else {
			 $('.pronetprice').val(price);
             $('.pronetprice1').html(price);   
		    }
            return true;
        }  
       
        
        
        //check all
        $(document).ready(function() {
            $('#selecctall').click(function(event) {  //on click 
                if(this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"               
                    });
                }else{
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                    });         
                }
            });    
        });
        
        
        
        
        
        
        function isGetPay3(evt) { 
        
     	  if ($(".delivered247").is(":checked")) {    		
                $(".getdelivered247").val("1"); 
		    }else {			
                $(".getdelivered247").val("0");              
		    }
        return true;
       } 
        
        
                
/*********************************** End vendor Product Categories *******************************************/



/***** Vendor Profile Update ****/
    
    $(document).ready(function() {
                     
       $("#fullname").keyup(validateName);
       $("#fullname").blur(validateName); 
       $("#organisationname").keyup(validateOrganisationName);
       $("#organisationname").blur(validateOrganisationName); 
       $("#organisationdate").change(validateOrganisationActive); 
       $("#emailid").keyup(validateEmail);
       $("#emailid").blur(validateEmail);
       $("#mobileno").keyup(validateMobile);
       $("#mobileno").blur(validateMobile); 
             
	   $('form#updatevendorprofileForm').submit(function(){        
            
            if( validateName() == 1 & validateEmail() == 1 & validateMobile() == 1 & validateOrganisationName() == 1 & validateOrganisationActive() == 1) {

                var formData =  new FormData($('#updatevendorprofileForm')[0]);  
                formData.append("action", "updatevendorprofile")

                 $.ajax({
                        type: "POST",
                        url: "../ajx_queries.php",
                        data: formData,
                        contentType: false,
				        cache: false,   
				        processData:false,                      
                        success: function(data){                
                                                                          
                            if(data == "vendorprofileupdated")  {                   
                                $("#sucessmsg").html("Profile has been successsfully updated.");  
                                $("#errormsg").html(""); 
                                //$('#updatevendorprofileForm').trigger("reset");                        
                            }  
                        }                    
                  });
                  
			}
            $("#errormsg").html("");
            $("#sucessmsg").html("");
			return false;
   		
            
	   });
       
       function validateName() {        
        if($.trim($("#fullname").val()).length < 1){
            $("#fullname").css({"border":"1px solid #FF0000"}); 
            $("#fullnameMsg").html('Please fill your complete name.');                        
            return false;				
		} else {                       
            $("#fullname").css({"border":""}); 
            $("#fullnameMsg").html(''); 
            return 1;              
        }
      }
      
      
      function validateOrganisationName() {        
        if($.trim($("#organisationname").val()).length < 1){
            $("#organisationname").css({"border":"1px solid #FF0000"}); 
            $("#organisationnameMsg").html('Please fill your organisation name.');                        
            return false;				
		} else {                       
            $("#organisationname").css({"border":""}); 
            $("#organisationnameMsg").html(''); 
            return 1;              
        }
      }
      
      function validateOrganisationActive() {        
        if($.trim($("#organisationdate").val()).length < 1){
            $("#organisationdate").css({"border":"1px solid #FF0000"}); 
            $("#organisationdateMsg").html('Please fill your organisation name.');                        
            return false;				
		} else {                       
            $("#organisationdate").css({"border":""}); 
            $("#organisationdateMsg").html(''); 
            return 1;              
        }
      }
      
      function validateEmail(){		
			 var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			//if it's valid email
            if ($.trim($("#emailid").val()).length == 0) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }
            if (!filter.test($("#emailid").val())) {
                $("#emailid").css({"border":"1px solid #FF0000"}); 
                $("#emailidMsg").html('Please enter your valid email address.');          
            }else {
                $("#emailid").css({"border":""}); 
                $("#emailidMsg").html('');          
                return 1;
            }			
	   }
      
      function validateAddress() {        
        if($("#address").val() == ""){
            $("#address").css({"border":"1px solid #FF0000"});
            $("#addressMsg").html('Please enter your complete address.');                         
            return false;				
		} else {                       
            $("#address").css({"border":""});    
            $("#addressMsg").html(''); 
            return 1;              
        }
      }
      
      function validateMobile() {        
        if($.trim($("#mobileno").val()).length < 1){
            $("#mobileno").css({"border":"1px solid #FF0000"});
            $("#mobileMsg").html('Please enter your mobile no.');                         
            return false;				
		} else {                       
            $("#mobileno").css({"border":""});    
            $("#mobileMsg").html(''); 
            return 1;              
        }
      }
	});    

    
/***** End Vendor Profile Update ****/


/************ Single Product ****/

 $(document).ready(function() {
    
  $('.productdetail').click(function() {
            
            var selectedTabId = this.id;
            var reDefineurl = selectedTabId+'huseven.com'+selectedTabId+"huseven.com"+selectedTabId+"huseven.com";  
            var EncryptUrl = Base64.encode(reDefineurl);            
            var Encryptid = Base64.encode(selectedTabId);   
            
            var recommendedpro = 'recpro';
            var recommendproval = $(".recommededpro").val();
            recommendproval += ","+selectedTabId;
            create_cookie(recommendedpro, recommendproval, 30, "/");
            
             //coookie name
            var showprocookie = 'show';            
            delete_cookie(showprocookie);
            create_cookie(showprocookie, selectedTabId, 30, "/");
            window.location.replace("productdetails?v="+EncryptUrl+'&p='+Encryptid);
      });      
      
    });
/************ End Single Product ****/

/************ Check Pincodes ****/

 $(document).ready(function() {
    
  $('#checkpincode').click(function() {
           
           var pincode = $("#pincode").val();
           if($.trim(pincode).length < 1) {
                //$("#pincodestatus").html('Enter pincode.');
                $("#pincode").css({"border":"1px solid #FF0000"}); 
                return false;
           
           }else {
                $("#pincode").css({"border":""});               
                $.ajax({                        
                        type: "POST",
                        url: "ajx_queries.php",
                        data: 'pincode='+pincode+'&action=checkpincode',                        
				        cache: false, 
                        success: function(data){             
                                                                          
                             $("#pincodestatus").html(data);
							 var ad=data;
							 if(ad=='Not Available'){
								 $(addtocart1).hide();
								 $(addtocart2).show();
								 
								 }else{
									  $(addtocart2).hide();
									  $(addtocart1).show();
									 }
                        }                    
                  });
           } 
           
      });      
      
    });
/************ End Check Pincodes ****/


/************ Index Categories ******/

    $(document).ready(function() {
     
      
      $('.maincat').click(function() {
            
            var selectedTabId = this.id;
            var reDefineurl = selectedTabId+'huseven.com'+selectedTabId+"huseven.com"+selectedTabId+"huseven.com";  
            var EncryptUrl = Base64.encode(reDefineurl);            
            var Encryptid = Base64.encode(selectedTabId);   
            
            //coookie name
            var maincookie_name = 'm';
            var subcookie_name = 's';
            var subsubcookie_name = 'ss';
            var subsubsubcookie_name = 'sss';
            //deleting a cookie if already exists
            delete_cookie(maincookie_name);
            delete_cookie(subcookie_name);
            delete_cookie(subsubcookie_name);
            delete_cookie(subsubsubcookie_name);
            
            //decoded a cookie value
            var cookie_value = selectedTabId;
            create_cookie(maincookie_name, cookie_value, 30, "/");
            
            //$(location).attr('href','shop?v='+EncryptUrl+'&d='+Encryptid);
            //window.location="shop?v="+EncryptUrl+'&m='+Encryptid;
            window.location.replace("product?v="+EncryptUrl+'&m='+Encryptid);
      });
      
      
    });
/************ End Index Categories ******/



/************ Search Brands ****/

    $(document).ready(function(){
            $('.getbrandname').bind('keyup', function () {
                
            var brandname = $(".getbrandname").val();           
            var getClass = $(this).attr('class'); 
            var brandcat = getClass.split(' ')[1];
            //var brandvalue = getClass.split(' ')[1];
            //var brandid = getClass.split(' ')[2];
            
           
                $.ajax({
                    type: "POST",
                    url: "ajx_queries.php",
                    //data: "getbrandname=" + brandname+'&brandvalue='+ brandvalue+'&brandid='+ brandid+'&action=getbrandname',     
                    data: "getbrandname=" + brandname+'&brandcat='+ brandcat+'&action=getbrandname',                 
                    cache: false,
                    beforeSend: function() {
                        //$('#sub_productcat').html('<img src="images/load.gif" alt="" width="24" height="24">');
                    },
                    success: function(html) {
                        $("#brandlist").html(html);
                    }
                 });                
            });
                $('.getbrandname').trigger('keyup');
    });
/************ End Search Brands ****/


/************ Promo Code *****/

    function PromoClearFields(theForm){
        
        	theForm.promocode.value="";            
            theForm.valid_from.value="";
            theForm.valid_to.value="";
            theForm.validupto_totalamt.value="";
            theForm.totaltimes.value="";
            theForm.promostatus.value="";
        }

        function PromoInputFieldValidations(theForm) {
        
            if (theForm.promocode.value == "") {				             
        		alert("Enter a promo code.");
        		theForm.promocode.focus();
        		return (false);
            } 
            if (theForm.valid_from.value == "") {				             
        		alert("Select valid from date.");
        		theForm.valid_from.focus();
        		return (false);
            } 
            if (theForm.valid_to.value == "") {				             
        		alert("Select valid till.");
        		theForm.valid_to.focus();
        		return (false);
            } 
            if (theForm.validupto_totalamt.value == "") {				             
        		alert("Enter amount.");
        		theForm.validupto_totalamt.focus();
        		return (false);
            } 
            if (theForm.totaltimes.value == "") {				             
        		alert("How many times a user can use this promo code.");
        		theForm.totaltimes.focus();
        		return (false);
            } 
               	
        	return true;  
        }
        

        function PromoActionFunction(urls, catids, work){
            
            if (work == "edit") {
              
        	  
        	  var divcontainer=$('#promoInsert');
        	 
        	  divcontainer.empty();
              //divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');
        	 
        	  divcontainer.slideDown('slow', function(){
              divcontainer.load(urls+'?id='+catids+'&sid='+Math.random());
              });
        	 
        	 
            }
    
            if (work == "delete") {     
	 
                var result = confirm("Are you sure you want to delete?");     
	 
                if (result == true) {	
	
            	$.ajax({
            	    url: urls,
            	    async: true,
            	    cache: false,
            	    data: {id: catids},
            	    type: 'get',			
            	    success: function (data) {
            		   data=data.replace(/\s+/g,"");
            		   var spancontainer=$('span#record'+catids);
            		   $('#promoImgLoad').html('<img src="../images/load.gif">');  	 
                       if(data != 0){
                                   
            			 spancontainer.slideUp('slow', function(){
                         spancontainer.fadeOut("slow");
            	         spancontainer.remove();
            			 });
            			    
            			 window.location.reload(true);
            		    }
            		    else {
            		        spancontainer.slideUp('slow', function(){		
            			    spancontainer.html("Error While this deleting a record");
            				});
            		    }
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	
            	
            	
                 
                  }
                 
                }
                
            }

        function PromoCommonFunction(FormObject, pageurl, loadurl,  FormID) { 
           
            var noofrecords = $('span.items').length;
        	
            if(PromoInputFieldValidations(FormObject)) {               
               	  
        	$.ajax({
        	    url: pageurl,
        	    async: true,
        	    cache: false,
        	    data: $('#'+FormID).serialize(),
        	    type: 'post',			
        	    success: function (data) { 
        		   data=data.replace(/\s+/g,"");
        		  
        		   $('#promoImgLoad').html('<img src="../images/load.gif">');  	 
        		   if(data != 0){
        		 
        				var spancontainer;
        			    $('.errormsg').empty();
        			    $('div#successfulpost').fadeIn();
        			    
        			    if($('span#record'+data).length){
        				spancontainer=$('span#record'+data);
        			    }else{
        			    $("<span id='record"+data+"' class='items'></span>").appendTo("#promoLoad");
        				spancontainer=$('span#record'+data);
        			    }
        			    ///If an element found
        			    if(spancontainer.length){
        					
        					spancontainer.slideDown('slow', function(){
        					//spancontainer.html('<div style="float:left; margin-left:5px;"><img src="../images/load.gif" /></div>');
        					spancontainer.fadeIn("slow");
        			   		spancontainer.load(loadurl+'?id='+data+'&sid='+Math.random());
        					});
        			        
                               
                        }
        			    
        		          window.location.reload(true);                        
                          //$('#forminsert').trigger("reset");
        			
        		    }
        		    else {
        		        
        			    $('#'+FormID).show(function(){					
        			    $('.errormsg').html(data);
        			    $('.errormsg').fadeIn(500);
        			    });
        		    }
        	    },
        	    error : function(XMLHttpRequest, textStatus, errorThrown) {
        		    alert(textStatus);
        	    }
        	});
        	
        	PromoClearFields(FormObject);
        	return false;
            }
            return false;    
        }
        
/*********** End Promo Code ****/


/*********** Checkout ****/
    
    function checkuserstatus() {
        var chkloginstatus = $("#chkloginstatus").val();                
        var chkcartstatus = $("#chkcartstatus").val();  
        var chkaddressstatus = $("#chkaddressstatus").val();
        var tokengen=$("#tokengen").val();
        var promoapplied=$("#promoapplied").val();
        var promocodetext=$("#promocodetext").val();
		
        var finalgrandtotal = $("#finalgrandtotal").val();
        var walletamt = $("#walletamttxt").val();
        var walletid = $("#walletidtxt").val();
        var walletleft = $("#walletlefttxt").val();
        var walletstatuschk = $("#walletstatuschk").val();
        var paymentmode = $('input[name=paymentmode]:checked').val(); 
        if(chkcartstatus == 0) {
            alert("Your cart is empty.");        
            return false;
        }  
   
        if($('input:checkbox[name=tc]').is(':checked')==false) {
            alert("Please Accept Terms and Conditions");
            return false;
        }
      
		 
        if(chkaddressstatus == 'no') {
            alert("Please update your address.");        
            return false;
        } 
		
		
		
        if(chkloginstatus == 0) {
            alert("Please Log in before checkout.");            
            //window.location.replace("auth/");
        }else {
            //alert(finalgrandtotal);
            if(finalgrandtotal=='0'){
           /*     
                var form = $('<form></form>');
                 $(form).hide().attr('method','post').attr('action','finalpayment1');
                  var data = [{field_name: 'tok', val: tokengen}, {field_name: 'couponappliedstatus', val: promoapplied }, {field_name: 'couponno', val: promocodetext}, {field_name: 'final_amount', val: finalgrandtotal}, {field_name: 'walletid', val: walletid}, {field_name: 'walletamt', val: walletamt}, {field_name: 'walletleft', val: walletleft}, {field_name: 'walletstatuschk', val: walletstatuschk}]
                  for (i in data)
                  {
                  
                    var input = $('<input type="hidden" />').attr('name',data[i].field_name).val(data[i].val); 
                    $(form).append(input);
                  }
                  $(form).appendTo('body').submit();
                  
            */
			 window.location.replace("../finalpayment1?finalgrandtotal=" + finalgrandtotal +'&wamount=' + walletamt +'&walletid=' + walletid +'&walletleft=' + walletleft +'&tokengen=' + tokengen +'&walletstatuschk=' + walletstatuschk +'&couponappliedstatus=' + promocodetext +'&couponno=' + promoapplied);     
            }else {
				if (!$('input[name=paymentmode]:checked').val() ) {  
				alert("Please select payment mode.");
				return false;
				} 
				
				 if(paymentmode == 'CashOn') {
                 window.location.replace("../finalpayment1?finalgrandtotal=" + finalgrandtotal +'&wamount=' + walletamt +'&walletid=' + walletid +'&walletleft=' + walletleft +'&tokengen=' + tokengen +'&walletstatuschk=' + walletstatuschk +'&couponappliedstatus=' + promocodetext +'&couponno=' + promoapplied +'&paymentmode=' + paymentmode);      
            }
            if(paymentmode == 'Online') {
               window.location.replace("../online_form?finalgrandtotal=" + finalgrandtotal +'&wamount=' + walletamt +'&walletid=' + walletid +'&walletleft=' + walletleft +'&tokengen=' + tokengen +'&walletstatuschk=' + walletstatuschk +'&couponappliedstatus=' + promocodetext +'&couponno=' + promoapplied +'&paymentmode=' + paymentmode);   
            }
                
        // window.location.replace("../online_form?finalgrandtotal=" + finalgrandtotal +'&wamount=' + walletamt +'&walletid=' + walletid +'&walletleft=' + walletleft +'&tokengen=' + tokengen +'&walletstatuschk=' + walletstatuschk +'&couponappliedstatus=' + promocodetext +'&couponno=' + promoapplied);      
            }
             return true;   
            
            
                               
        }  
        
        
        return true;  
    } 
/*********** End Checkout ****/ 


/*********** Wallet ********/ 

$(document).ready(function() {
    //set initial state.
    //$('#textbox1').val($(this).is(':checked'));
    $("#walletstatuschk").val('no');
    var walletamt = $("#walletamttxt").val();
    var walletid = $("#walletidtxt").val();
    
    $('#walletstatus').change(function() {
        if($(this).is(":checked")) {
            //var returnVal = confirm("Are you sure?");
            //$(this).attr("checked", returnVal);
            $("#walletstatuschk").val('yes');
            if(walletid > 0){
                var finalgrandtotal = $("#finalgrandtotal").val();
                var total = finalgrandtotal - walletamt;
                
                if(total < 0){
                    $("#walletlefttxt").val(total);
                    $("#finalgrandtotal").val(0);
                    $("#finalgrandtotaltxt").html(0);
                }
                if(total==0){
                    $("#walletlefttxt").val(0);
                    $("#finalgrandtotal").val(0);
                    $("#finalgrandtotaltxt").html(0);
                }
                if(total>0){
                    $("#walletlefttxt").val(0);
                    $("#finalgrandtotal").val(total);
                    $("#finalgrandtotaltxt").html(total);
                }
                
            }
        }else { 
            $("#walletstatuschk").val('no');
            var walletleft = $("#walletlefttxt").val();
            var finalgrandtotal = $("#finalgrandtotal").val();
            
            var fnalamt = parseInt(walletamt) + parseInt(walletleft) + parseInt(finalgrandtotal);
            $("#finalgrandtotal").val(fnalamt);
            $("#finalgrandtotaltxt").html(fnalamt);
            $("#walletlefttxt").val('');
            
        }
        //$('#textbox1').val($(this).is(':checked'));        
    });
});
/*********** End Wallet ********/ 


/*********** Check Promocodes ****/

    $(document).ready(function(){       
        $('#addpromocode').click(function(){
            var promocode = $("#promocode").val();
            var finalamounttext = $("#finalgrandtotal").val();
        	 $.ajax({
                       type: "POST",
                       url: "ajx_queries.php",
                       data: "promocode=" + promocode +'&finalamount=' + finalamounttext +'&action=applypromocode',
                       dataType: "json", 
                       cache: false,                  
                       success: function(html) { 
                           
                           if(html[0] == 'promocodeinactive') {
                                 $("#promocode").val('');
                                 $("#promocodeErrorMsg").html(''); 
                                 $("#promocodeErrorMsg").html('Promo code expired.'); 
                                 $("#promoapplied").val(html[1]);  
                                 $("#promocodetext").val(html[2]);  
                                 $("#finalgrandtotaltxt").html(html[4]);     
                                 $("#finalgrandtotal").val(html[4]);                             
                           } 
                           if(html[0] == 'promocodeactive') {                         
                                 $("#promocode-panel").hide();
                                 $("#promocodeErrorMsg").html(''); 
                                 $("#promocodeSucessMsg").html('Promo code applied.');  
                                 $("#promoapplied").val(html[1]);  
                                 $("#promocodetext").val(html[2]);  
                                 $("#finalgrandtotaltxt").html(html[4]);     
                                 $("#finalgrandtotal").val(html[4]);                            
                           }
                           if(html[0] == 'lesstotalamount') {  
                                $("#promocode").val('');
                                $("#promocodeSucessMsg").html(''); 
                                $("#promocodeErrorMsg").html('Minimum Order Value Should Be At least Rs. ' + html[3]); 
                                $("#promoapplied").val(html[1]);  
                                $("#promocodetext").val(html[2]); 
                                $("#finalgrandtotaltxt").html(html[4]);     
                                $("#finalgrandtotal").val(html[4]);                          
                           }                           
                           if(html[0] == 'promocodeexpired') {    
                                $("#promocode").val('');
                                $("#promocodeSucessMsg").html(''); 
                                $("#promocodeErrorMsg").html('Promo code expired.'); 
                                $("#promoapplied").val(html[1]);  
                                $("#promocodetext").val(html[2]); 
                                $("#finalgrandtotaltxt").html(html[4]);     
                                $("#finalgrandtotal").val(html[4]); 
                           }
                           if(html[0] == 'invalidpromocode') {  
                                $("#promocode").val('');
                                $("#promocodeSucessMsg").html(''); 
                                $("#promocodeErrorMsg").html('Invalid promo code.'); 
                                $("#promoapplied").val(html[1]);  
                                $("#promocodetext").val(html[2]); 
                                $("#finalgrandtotaltxt").html(html[4]);     
                                $("#finalgrandtotal").val(html[4]); 
                           }
                       }                  
                    });
        });
        
    }); 
    
    
 /************************* Admin Orders  ********************************************/
    
    $(document).ready(function () {      
      var orderstatus = $('input[name="orderstatus"]');
        orderstatus.on('click', function(){
            if ( $(this).is(':checked') ) {
                
                var selectedChk = this.value;
                var getConfirm = confirm("Do you want to closed this order");
                
                if(getConfirm) {               
                
                    $.ajax({
                       type: "POST",
                       url: "../ajx_queries.php",
                       data: "userpaymentid=" + selectedChk+'&action=getupdatedorders',
                       cache: false,                  
                       success: function(html) {      
                       
                           if(html == 'orderupdated') {
                                
                                //$('.shipping').trigger("reset");   
                                 //$(".shipping").load(location.href + " .shipping");
                                 
                                 var data = "Order has been successfully deleted."
                                 $('#orderMsg').hide().html(data).fadeIn('slow');

                                 setTimeout(function() {
                                    $("body").load("orders").hide().fadeIn(0).delay(); 
                                    $('#orderMsg').hide();                                    
                                 }, 1300);
                           }
                       }                  
                    });
                
                }else {
                    
                    return false;
                }
            }          
        });    
    });
    
    
  $(document).ready(function () {       
        $(".refcomment").change(function() {  
            var getid = this.id; 
            var getvalue = this.value; 
            
            $.ajax({
                       type: "POST",
                       url: "../ajx_queries.php",
                       data: "getid=" + getid+ '&getvalue='+getvalue + '&action=getupdatedordersref',
                       cache: false,                  
                       success: function(html) { 
                               
                                 var data = "Comment has been successfully updated."
                                 $('#orderMsg').hide().html(data).fadeIn('slow');
                                 
                                 setTimeout(function() {
                                    $("body").load("orders").hide().fadeIn(0).delay(); 
                                    $('#orderMsg').hide();                                    
                                 }, 2000);
                       }                  
            });
        });    
    });

/************************* End Admin Orders  ********************************************/  