<style>
.modal-header .close {
     padding: 0px !important;
    margin: 6px 8px -1rem auto !important;
}
</style>

<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 


if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
$post_id=$_POST['postid'];
$sql="SELECT * from user_post where post_id=".$_POST['postid'];
$db->query($sql);
if($db->numRows()>0)
{ $row=$db->fetchArray();

	echo '				
			<form  method="post" id="edituploadForm" enctype="multipart/form-data">
			<input type="hidden" name="post_id" value="'.$post_id.'" >
									<div class="post-topbar newpost1">
										<h3>Update Post</h3>
										<div class="user-picy">';
										 if(empty($userspath)){
											echo '<img src="images/resources/user.png" alt="">';
										}else{ 
										echo '<img src="upload/'.$userspath.'" alt="" width="50" height="50" style="border-radius: 50%;">';
										}
										echo '</div>
										<div class="post-st">
											 <textarea cols="5" rows="4" placeholder="Write Somethin..." name="postid" id="postid">'.$row['post_details'].'</textarea>
										</div>
										<div class="post-img-list">
											<div id="image_preview1"></div>
										</div>
										<div class="Feelingpst1" id="Feelingpst1" style="display:none;">
											<ul>
												<li class="select-fee-select">
													<select name="selectfeel1" id="selectfeel1" class="selectfeel1" >
													<option value="">Select Feeling</option>';
													
																													 $db1=new DB();

								 $sql1="SELECT * FROM $_TBL_FEELINGC where status='yes'";

								 $db1->query($sql1)or die($db1->error());

								 while($row1=$db1->fetchArray()){	
								 $post_title=$row['post_title'];
								 if($post_title==$row1['catname']){ $select="selected"; }
								 $catid=$row1['id'];
								echo '<option value="'.$catid.'" '.$select.'>'.$row1['catname'].'</option>';

								}
													
													echo '</select>
												</li>
												<div  id="feelingtxtHint1"></div>
												<li class="feeling-input">
												 
												<p class="lead emoji-picker-container">
											  <input type="text" class="form-control emg" placeholder="what are you feeling..." data-emojiable="true" name="feeling" value="'.$row['postemos'].'">
											</p>		
												</li>
																			</ul>
										</div>
										
										<input type="hidden" name="tagfriends" id="tagfriends" value="" placeholder="Search Friends" />
	
	<div class="locationdiv"style="display:none">
	<div class="loctg">
		at
	</div>
	<div class="location-input">
<input type="text" name="livelocationinput1" id="livelocationinput1" class="form-control livelocationinput1" placeholder="where are you..?" value=""  />
</div>
</div>
<div class="map_canvas1"></div>
<div id="container" style="display:none">
<div id="contentbox" contenteditable="true">
</div>
<div id="display">
</div>
<div id="msgbox">
</div>
</div>
										<script src="lib/js/config.js"></script>
    <script src="lib/js/util.js"></script>
    <script src="lib/js/jquery.emojiarea.js"></script>
    <script src="lib/js/emoji-picker.js"></script>
	<script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: "[data-emojiable=true]",
          assetsPath: "lib/img/",
          popupButtonClasses: "fa fa-smile-o"
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
										<div class="postoptions">
											<ul>
												<li>
														<label>
															<img src="images/gallery.png">Photo/ Video	
															<input type="file" id="upload_filepopup" name="upload_filepopup[]" onchange="preview_image1();" multiple>
														</label>
														<input type="hidden" name="imgidpopup" id="imgidpopup" value="'.$row['allpath'].'"/>
													</li>

													
													<li>
														<a  class="feeling1">
															<img src="images/emo.png">Feeling/Activity	
															 
														</a>
													</li>

													
													

											</ul>
 
										</div>
										<div class="post-st text-right">
											<ul>
												 
												<li><!--<a class="active"  href="#" title="">Post Status</a>-->
												<button type="button" id="edituploadpost" value="Post-Status" class="active postbtn btn">Update Post</button>
												</li>
											</ul>
										</div><!--post-st end-->

									</div> 
</form>';
/* <li>
														<a  class="livelocation">
															 <img src="images/postloaction.png" alt="new location"> 
															 
														</a>
													</li> */
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
jQuery(document).on("click", ".feeling1", function(e){
	
    $("#Feelingpst1").toggle();
  
});

/////////////////Tag frind///////////////////

 jQuery(document).ready(function()
{
var start=/@/ig; // @ Match
var word=/@(\w+)/ig; //@abc Match
jQuery(document).on("keyup", "#contentbox", function(e){

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
});

jQuery(".selectfeel1").on('change', function() {
//$("#profilesubmit").click(function(){
	var BASEURL1=social_AjaxURL+'upload/';
	var social_AjaxURL1=social_AjaxURL+'ajfeeling.php';
       var f=jQuery('#selectfeel1').val();
			var dataString ='f=' + f;

			//e.preventDefault();

					$.ajax({
            	    url: social_AjaxURL1,
					//dataType: 'json',
            	    async: true,
            	    cache: false,
            	    //data: {catid: catids},
					type: 'POST',
					 data: dataString,
					success: function(response){
						//alert(response);

					jQuery('#feelingtxtHint1').html(response);

            },
        });
    });

///////////post submit/////////////////
jQuery(document).on("click", "#edituploadpost ", function(e){

		var form=jQuery("#edituploadForm");
		var social_AjaxURL1=social_AjaxURL+'ajax_edit_post.php';

			e.preventDefault();
			  $(".editpost1").html('<img src="img/LoaderIcon.gif"> loding...');
			var el = jQuery("#uploadForm");
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
            		   
                       if(data != 0){
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


//////////////////////Multiple file Upload for post///////////////////////
	jQuery("#upload_filepopup").on('change', function() {
   var social_AjaxURL1=social_AjaxURL+'upload.php';
   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('upload_filepopup').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('upload_filepopup').files[index]);
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
		 
var img=$("#imgidpopup").val();

if(img==''){
jQuery("#imgidpopup").val(response);
}else{
jQuery("#imgidpopup").val(img+','+response);
}
     }
   });

});


function preview_image1() 
{
var filename = $("#upload_filepopup").val();
var ext = filename.split('.').pop();
if(ext != 'mp4'){
var total_file=document.getElementById("upload_filepopup").files.length;
for(var i=0;i<total_file;i++)
{
$('#image_preview1').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
}
}
}</script>
