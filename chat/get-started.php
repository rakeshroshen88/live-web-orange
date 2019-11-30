<?php include('header.php') ;
include_once("config.inc.php");
if($_SESSION['sess_webid']==''){
	redirectpage("sign-in.php");
} 

?>
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-md-12">
						<!-- wizard -->
						<div id="myWizard">

							<br />
							<p id="p_error" class="text-danger"></p>
							<div class="progress">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 20%;">
									Step 1 of 5
								</div>
							</div>

							<div class="navbar">
								<div class="navbar-inner">
									<ul class="nav nav-pills">
										<li ><a href="#step1"  class="active" data-toggle="tab" data-step="1">Step 1 <span>Personal Details</span></a></li>
										<li><a href="#step2" data-toggle="tab" data-step="2">Step 2 <span>Contact Information</span></a></li>
										<li><a href="#step3" data-toggle="tab" data-step="3">Step 3 <span>Upload Profile Picture</span></a></li>
										<li><a href="#step4" data-toggle="tab" data-step="4">Step 4 <span>Your Interests </span></a></li>
										<li><a href="#step5" data-toggle="tab" data-step="5">Step 5 <span>Personal Details</span></a></li>
									</ul>
								</div>
							</div>
							<form  method="post" class="post-ad-1" id="formuserprofile" enctype="multipart/form-data">
							    <div class="map_canvas"></div>
							    <input type="hidden" name="imgid" id="imgid" value="">
						
								<div class="tab-content">

									<div class="tab-pane fade in show active" id="step1">

										<div class="well">
											<div class="row">
												<div class='col-sm-6'> 
												<div class="form-group">
													<label>Current Lives *</label>
														<input id="current_city" name="current_city" placeholder="Start Typing Your Address or postcode" type="text" data-validation="required" autocomplete="autoaddress">
														<i class="la la-address"></i>

													</div>
													</div>
													<div class='col-sm-6'> 
													<div class="form-group">
														<label>Current Lives *</label>
														<input type="text" name="postal_code" id="postal_code" class="form-control1" required />

													</div>
													</div>
												
												<div class='col-sm-6'> 
													<div class="form-group">
														<label>Hometown *</label>
														<input type="text" class="form-control1" name="hometown" id="hometown" required/>

													</div>
												</div>

												<div class='col-sm-6'> 
													<div class="form-group">
														<label>Work</label>
														<input type="text" class="form-control1" name="work" id="work"  />

													</div>
												</div>
												<div class='col-sm-6'> 
													<div class="form-group">
														<label>School *</label>
														<input type="text" class="form-control1" name="school" id="school" required />

													</div>
												</div>

												<div class='col-sm-6'> 
													<div class="form-group">
														<label>Work Location *</label>
														<input type="text" class="form-control1"  name="worklocation" id="worklocation" required/>

													</div>
												</div>
												<div class='col-sm-6'> 
													<div class="form-group">
														<label>College</label>
														<input type="text" class="form-control1" name="collage" id="collage"/>

													</div>
												</div> 

												  

                        

                        <div class="clear"></div>


                    </div>
                </div>

                <div class="text-right">
                	<a class="btn btn-default btn-lg next next-tab" href="#">Continue</a>
                </div>
            </div>
            <div class="tab-pane fade" id="step2">
            	<div class="well">
            		<div class="row"> 

            			<div class='col-sm-6'> 
            				<div class="form-group">
            					<label>Current Company</label>
            					<input type="text" class="form-control1" name="current_company" id="current_company"/>

            				</div>
            			</div>

            			<div class='col-sm-6'> 
            				<div class="form-group">
            					<label>Current Studied  </label>
            					<input type="text" class="form-control1" name="current_studied" id="current_studied"/>

            				</div>
            			</div>

            			<div class='col-sm-6'> 
            				<div class="form-group">
            					<label>Add a website</label>
            					<input type="text" class="form-control1" name="website" id="website"/>

            				</div>
            			</div>

            			<div class='col-sm-6'> 
            				<div class="form-group">
            					<label>Add your   </label>
            					<input type="text" class="form-control1" name="address" id="address"/>

            				</div>
            			</div>

            			<div class='col-sm-12'> 
            				<div class="form-group">
            					<label>ABOUT YOU</label> 
            					<textarea class="form-control1" name="aboutus" id="aboutus"></textarea>

            				</div>
            			</div>



 
            		</div>

            		<div     class="clear"></div>


            	</div>


            	<div class="text-right">
            		<a class="btn btn-default btn-lg next next-tab" href="#">Continue</a>
            	</div>


            </div>
            <div class="tab-pane fade" id="step3">
            	<div class="well"> 
            		<div class="row">
            			<div class="col-md-12">
            				<div class="profile-picture-upload">
            					<div class="left-uploaded-img">
            						<img src="images/ad1.jpg  "  alt="uploadted imge" id='rmvid'/>
            					</div>

            					<div class="uplodate-img-option">
            						<label for="file" class="add-profile-pic-btn"> Add Image </label>  
            						<input type="file"  id="file" name="file"/>   
            						<p>Or</p>
            						<a href="#" class="take-pic-btn">Take a Photo<span> with your Webcam</span></a>   

            					</div>



            				</div>
            			</div>
            		</div>	




            		<div     class="clear"></div>








            	</div>




            	<div class="text-right">
            		<a class="btn btn-default btn-lg next next-tab" href="#">Continue</a>
            	</div>


            </div>
            <div class="tab-pane fade" id="step4">
            	<div class="well"> 

            		<div class="sign-up-intereste">
            			<div class="profilf-your-inter">
            				<h3> Your interests  </h3>
            				<p>Add interests so we can recommend the best Meetups for you.</p>


            				<div class="add-interest">


 

            					<div class="col-md-12">
            						<div class="row">
            							  

            							<div class="col-md-4 col-md-offset-8">
            								<div class="row">
            									<div class="search-cat-interet">
            										<form>
            											<input type="text" placeholder="Search for an Interest" name="" id="">
            											<i class="fa fa-search" aria-hidden="true"></i>
            										</form>
            									</div>
            								</div>       
            							</div>

            						</div>


            					</div>


            					<div class="selected-interest adde-cat-e">
            						<div class="row">
            							<div class="col-md-12">
		            						<form>
		            							<div class="car-lig2">
		            								<div class="form-group">

		            									<input type="checkbox" id="c1" value="Investigative" name="area"/>
		            									<label for="c1">Investigative</label>
		            								</div>
		            							</div>

		            							<div class="car-lig2">
		            								<div class="form-group">

		            									<input type="checkbox" id="c2" value="Social" name="area"/>
		            									<label for="c2">Social</label>
		            								</div>
		            							</div>

		            							<div class="car-lig2">
		            								<div class="form-group">

		            									<input type="checkbox" id="c3" value="Artistic" name="area"/>
		            									<label for="c3">Artistic</label>
		            								</div>
		            							</div>

		            							<div class="car-lig2">
		            								<div class="form-group">

		            									<input type="checkbox" id="c4" value="Realistic" name="area"/>
		            									<label for="c4">Realistic</label>
		            								</div>
		            							</div>


		            							<div class="car-lig2">
		            								<div class="form-group">

		            									<input type="checkbox" id="c6" value="Enterprising" name="area"/>
		            									<label for="c6">Enterprising</label>
		            								</div>
		            							</div>


		            						</form>
		            					</div>


            					</div>



            				</div>  



            			</div>
            			</div>



            		</div>



            		<div     class="clear"></div>








            	</div>




            	<div class="text-right">
            		<a class="btn btn-default btn-lg next next-tab" href="#">Continue</a>
            	</div>
            </div>
            <div class="tab-pane fade" id="step5">
            	<div class="well">
            		<div class="sign-up-tnc">
            			<h3> What it means to be a Meethob </h3>
            			<ul>
            				<li><i class="fa fa-check" aria-hidden="true"></i> Real, in-person conversations </li>
            				<li><i class="fa fa-check" aria-hidden="true"></i> Open and honest intentions </li>
            				<li><i class="fa fa-check" aria-hidden="true"></i> Always safe and respectful</li>
            				<li><i class="fa fa-check" aria-hidden="true"></i> Put your members first</li>
            			</ul>


            			<!--<div class="check-box-new">
            				<input type="checkbox" style="display: none" id="post-chck1"><label class="check-urg" for="post-chck1"> </label><span >  <label  for="post-chck1"> Check here to indicate that you have read and agree to the terms presented in the <a href="#">Terms and Conditions </a>agreement </label></span>
            			</div>-->




            		</div>




            	</div>

            	<div class="text-right">
<button type="submit" id="profilesubmit" value="submit" class="btn btn-success btn-lg first finished-btn">Finish</button>
            		<!--<a class="btn btn-success btn-lg first finished-btn" id="profilesubmit" href="#">Start over</a>-->
            	</div>


            </div>


        </div>



    </div>
    
</form> 




<!-- wizard -->	 
</div>
</div>
</div><!-- main-section-data end-->
</div> 
</div>
</main>





<?php include('footer.php') ?>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&sensor=false&libraries=places&ver=0.4b" async defer></script>
	<script type='text/javascript' src='js/jquery.geocomplete.js?ver=0.4b'></script>
<script>
jQuery(document).ready(function ($) {

jQuery("#current_city").attr("autocomplete","location16");

jQuery("#current_city").geocomplete({
map: ".map_canvas",
details: "form",
types: ["geocode", "establishment"],
}).bind("geocode:result", function(event, result){
//jQuery("#state").val(result.address_components[2].long_name);
console.log(result);
//alert(result.address_components[2].postal_town);
//alert(result);
//jQuery("#postal_town").val(result.address_components[2].street_number);
//alert(result.postal_town[2].long_name);
});
});
	/*getting started wizard*/

	$('.next').click(function(){

		var nextId = $(this).parents('.tab-pane').next().attr("id");
		$('[href=#'+nextId+']').tab('show');
		return false;

	})

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

          //update progress
          var step = $(e.target).data('step');
          var percent = (parseInt(step) / 5) * 100;
          
          $('.progress-bar').css({width: percent + '%'});
          $('.progress-bar').text("Step " + step + " of 5");
          
          //e.relatedTarget // previous tab
          
      })

	$('.first').click(function(){

		$('#myWizard a:first').tab('show')

	})

	/*getting started wizard ended */


</script>