<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 


if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
$post_id=$_POST['postid'];
$sql="SELECT * from user_post where post_hide='0' and post_id=".$_POST['postid'];
$db->query($sql);
if($db->numRows()>0)
{ $row=$db->fetchArray();
	echo '				
			<form  method="post" id="edituploadForm" enctype="multipart/form-data">
									<div class="post-topbar newpost1">
										<h3>Update Post</h3>
										<div class="user-picy">';
										 if(empty($userspath)){
											echo '<img src="images/resources/user-pic.png" alt="">';
										}else{ 
										echo '<img src="upload/'.$userspath.'" alt="" width="50" height="50" style="border-radius: 50%;">';
										}
										echo '</div>
										<div class="post-st">
											 <textarea cols="5" rows="4" placeholder="Write Somethin..." name="postid" id="postid">'.$row['post_details'].'</textarea>
										</div>
										<div class="post-img-list">
											<div id="image_preview"></div>
										</div>
										<div class="Feelingpst">
											<ul>
												<li class="select-fee-select">
													<select name="selectfeel">
														<option value="">Feeling</option>
														<option value="Celebriting">Celebriting</option>
													</select>
												</li>
												
				<li class="feeling-input">
				<p class="lead emoji-picker-container">
              <input type="text" class="form-control" placeholder="what are you feeling..." data-emojiable="true" name="feeling">

            </p>
			
	
												</li>
											</ul>
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
															<input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple>
														</label>
														<input type="hidden" name="imgid" id="imgid" value=""/>
													</li>

													<li>
														<a>
															<img src="images/users.png">Tag Friends	
															 
														</a>
													</li>

													<li>
														<a>
															<img src="images/emo.png">Feeling/Activity	
															 
														</a>
													</li>

													<li>
														<a>
															<img src="images/record.png">Live Video	
															 
														</a>
													</li>

											</ul>
 
										</div>
										<div class="post-st text-right">
											<ul>
												 
												<li><!--<a class="active"  href="#" title="">Post Status</a>-->
												<button type="submit" id="edituploadpost" value="Post-Status" class="active">Update Post</button>
												</li>
											</ul>
										</div><!--post-st end-->

									</div> 
</form>';
	
}
?>
