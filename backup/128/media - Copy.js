/////////////////////////////////Upload document////////////////////////////////////
	jQuery(document).on("click", ".regsubmit ", function(e){

			e.preventDefault();
			jQuery(".saveit").text("uploading..").attr("disabled",true);

			var errorhandler1 = jQuery(".errorHandler");
			var successHandler1 = jQuery(".successHandler");
			var el = jQuery(".forms");
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
			jQuery.ajax({
				url : carer_AjaxURL,
				type : 'post',
				dataType:'json',
				data : {
					action : 'upload_document_action',
					form_data : jQuery("#documentUpload").serialize()
				},
				success : function( response ) {
					el.unblock();
					if(response.status==true){
						jQuery(".saveit").html("Document Uploaded");
						jQuery(".saveit").text("Save").attr("disabled",false);

					}else{
						el.unblock();
						jQuery(".form-failed").html("Something went wrong, please try later");
						errorHandler1.show();
						successHandler1.hide();
					}
				}
			});
	});

