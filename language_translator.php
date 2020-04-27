<?php include('header.php'); 
//include('chksession.php');
						$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
						?>

<style>#container
{    margin: 0;
    padding: 0;
    width: 100%;
    margin-top: 0;
    float: left;
}
#contentbox
{
	    width: 100%; 
    border: 1px solid #d2dbe3;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    margin-bottom: 6px;
    text-align: left;
    float: left;
    border-radius: 3px;
    padding: 7px;
	
}
#feelingtxtHint select{    background: #ffe7d9;
    line-height: initial;
    border: none;
    height: 35px;
    border: 1px solid #d2dbe3;
    border-right: none;
    padding: 1px 8px 2px;}
.Feelingpst ul{display: flex;}
#msgbox
{
border:solid 1px #dedede;padding:5px;
display:none;background-color:#f2f2f2
}
#display
{
display:none;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:40px;
}
.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
.image
{
width:25px; float:left; margin-right:6px
}
.product-feed-tab {
    float: left;
    width: 100%;
    display: block !important;
}
.portfolio-gallery-sec h3 {
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 0px !important; 
    padding-left: 5px;
	float: none !important; 
   
}

.cover-sec {
    height: 143px !important; 
    overflow: hidden;
}
</style>

     

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 pd-left-none no-pd leftbar-mainlist">
								<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<style type="text/css">

												</style>

												<div class="profile-newimg">
													<div class="newimg-lfet">
														<?php  $dbn=new DB();
						$db2=new DB();
						   $sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						while($rowi=$dbn->fetchArray()){
							 $impid=$rowi['image_id'];
						}
						?>
						<?php if($impid=='' and empty($impid)){ echo "$impid";?>
							<img src="images/resources/user.png"  alt="" >
						<?php }else{?>
							<img src="upload/<?=$impid?>" alt="" >
						<?php }?>

													 
													</div>
													<div class="profiledetailsname">
														<h2><?=$_SESSION['sess_name']?></h2>
														<p><?php 
												echo $emp=$db->getSingleResult("SELECT current_company from user_profile where user_id=".$_SESSION['sess_webid']);
												
												?> Mutual Friends</p>
													</div>

												</div>



												<!--<div class="usr-pic">
						<?php  $dbn=new DB();
						$db2=new DB();
						   $sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						while($rowi=$dbn->fetchArray()){
							 $impid=$rowi['image_id'];
						}
						?>
						<?php if($impid=='' and empty($impid)){ echo "$impid";?>
							<img src="images/resources/user.png"  alt="" height="90" width="90">
						<?php }else{?>
							<img src="upload/<?=$impid?>" alt="" height="90" width="90">
						<?php }?>
												    
												 
													
												</div>  -->
											</div><!--username-dt end-->
											<!-- <div class="user-specs">
												<h3><?=$_SESSION['sess_name']?></h3>
												<span><?php 
												echo $emp=$db->getSingleResult("SELECT current_company from user_profile where user_id=".$_SESSION['sess_webid']);
												
												?></span>
											</div>-->
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li><!--javascript:void(0)" id="follow-->
												<a href="my-profile.php"><h4><span class="foocat">Following </span><span class="follusingnumber"><?php 
												 $num1=$db->getSingleResult("SELECT count(f_id) from followers where user_id=".$_SESSION['sess_webid']." limit 0,5");
												if(empty($num1)){ echo "0";}else{ echo $num1; }
												?></span></h4></a>
												
											</li> 
											<li>
												<h4><span class="foocat">Followers </span> <span class="follusingnumber"><?php 
												 $num=$db->getSingleResult("SELECT count(f_id) from followers where follow=".$_SESSION['sess_webid']);
												 if(empty($num)){ echo "0";}else{ echo $num; }
												?></span></h4>
												
											</li>
											<li>
												<a href="javascript:void(0);" ><h4><span class="foocat">Message </span> <span class="follusingnumber"><?php 
												 $query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '".$_SESSION['sess_webid']."'	
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	echo $countm = $statement->rowCount();
												// $message=$db->getSingleResult("SELECT * from message where user_id=".$_SESSION['sess_webid']);
												 //if(empty($countm)){ echo "0";}
												?></span></h4></a>
												
											</li>

											<li>
												<a href="my-profile.php" title="" class="viewprobtn">View Profile</a>
											</li>
										</ul>
										
										
									</div><!--user-data end-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Following</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
										<?php  
										/* $sqlres = "SELECT * from {$wpdb->prefix}carer_information where status=1  and carer_info_id IN ({$carer_id}) "; */
										$dbuf=new DB();
										 $sql="SELECT * from followers where user_id=".$_SESSION['sess_webid']." order by user_id limit 0,5";
										$db->query($sql);
										if($db->numRows()>0)
										{
										while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);										
											
										/* $sqluserf="SELECT * from user_profile where user_id=".$row['user_id'];
										$dbuf->query($sqluserf);
										if($dbuf->numRows()>0)
										{
										$userrowf=$dbuf->fetchArray();
										} */
											
											?>
											<div class="suggestion-usd">
											<?php if(!empty($userfpath)){?>
												<img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
											<?php }else{ ?>
											<img src="images/resources/user.png" alt="" height="40" width="40">
											<?php }?>
												<div class="sgt-text">
													<h4><?=$usernamef?></h4>
													<span><?=$woorking?></span>
												</div>
												 
											</div>
											
										<?php }}else{ echo "&nbsp; Data Not Availablle";} ?>
											
											
											
											<div class="view-more">
												<a href="my-profile.php" title="">View More</a>
											</div>
											
											
                                    <ul class="social_links">
                                       <!-- <li><a href="#" title=""><i class="la la-globe"></i> <?=$profilerow['website']?></a></li>
                                        -->
                                    
									
									
									<?php  $dbs=new DB();
									  $sqls="select * from social_link where user_id =".$_SESSION['sess_webid'];
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                        <li><a href="<?=$rows['slink']?>" title="" target="_blank"><i class="la la-globe"></i><?=$rows['slink']?></a></li>
									<?php }?>

									</ul>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<!--<div class="tags-sec full-width">
										<ul>
											<li><a href="#" title="">Help Center</a></li>
											<li><a href="#" title="">About</a></li>
											<li><a href="#" title="">Privacy Policy</a></li>
											<li><a href="#" title="">Community Guidelines</a></li>
											<li><a href="#" title="">Cookies Policy</a></li>
											<li><a href="#" title="">Career</a></li>
											<li><a href="#" title="">Language</a></li>
											<li><a href="#" title="">Copyright Policy</a></li>
										</ul>
										<div class="cp-sec">
											<img src="images/logo2.png" alt="">
											<p><img src="images/cp.png" alt="">Copyright 2019</p>
										</div>
									</div><!--tags-sec end-->
								</div><!--main-left-sidebar end-->
							</div>
                        <div class="col-lg-9 width78">
						 
                                <!--user-tab-sec end-->
							
                            <div class="main-ws-sec profile-lisgn newtranstionsl">
                              <div class="user-tab-sec rewivew">
                              	<div class="imgtranTop">
                              		<img src="/img/langturuimb.jpg" alt="imgtranTop">
                              	</div>
                              	<div class="imgtranTophead">
                                   <h3>Welcome to</h3>
                                   <p>Akwa Ibom Language Tutor!</p>
                                  </div>                            
                                </div>
                            
                            <div class="product-feed-tab" >
                                <div class="portfolio-gallery-sec">
                                    
									<div class="row textarea-transtion">
									<div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
									<select id="lan_1" name="lan_1" class="lan_1">
  <option value="en">English</option>
  <option value="hin">Hindi</option>
  <option value="Ibibio">Ibibio</option>
  <option value="Anang">Anang</option>
  <option value="Oron">Oron</option>
  <option value="Yoruba">Yoruba</option>
  <!--<option value="">Select Language</option><option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option>-->
</select> </br>

<div class="tranboxtranslator">
									<textarea name="tlanguage" id="tlanguage" placeholder="Type your Text !" rows="8" cols="50"style="border-radius: 5px; font-size: 22px;"></textarea>

									<div class="translate_control-a">
									<button type="button"  title="Copy" onclick="myFunction()" /><i class="fa fa-clone" aria-hidden="true"></i></button>
									<button type="button"  id="paste" title="Paste" /><i class="fa fa-clipboard" aria-hidden="true"></i></button>
									
									<button type="button" id="languageconvertor1" name="languageconvertor1" style=""><i class="fa fa-volume-up" aria-hidden="true"></i></button>
 
									</div>

									<script>
function myFunction() {
  var copyText = document.getElementById("tlanguage");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}

function paste() {
  var pasteText = document.querySelector("#tlanguage");
  pasteText.focus();
  document.execCommand("paste");
  console.log(pasteText.textContent);
}

document.querySelector("#paste").addEventListener("click", paste);
</script>
									
									
									</div>
</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
									<select id="lan_2" name="lan_2" class="lan_2">
									 <option value="">Select Language</option>
  <!--<option value="hin">Hindi</option>-->
  <option value="en">English</option>
  <option value="Ibibio">Ibibio</option>
  <option value="Anang">Anang</option>
  <option value="Oron">Oron</option>
  <option value="Yoruba">Yoruba</option>
 <!--<option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option>-->
</select></br>

<div class="tranboxtranslator">
									<textarea rows="8" cols="50" name="rlanguage" id="rlanguage" placeholder="Read Translation Here..." readonly  style="border-radius: 5px; font-size: 22px;"></textarea>
									</br>
									<div class="translate_control-a">
									<button type="button" title="clone" onclick="clone()" /><i class="fa fa-clone" aria-hidden="true"></i></button>
									

									<button type="button" id="languageconvertor" name="languageconvertor" style="display:none;" /><i class="fa fa-volume-up" aria-hidden="true"></i></button>
 <script>
function clone() {
  var copyText = document.getElementById("rlanguage");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Clone the text: " + copyText.value);
}
</script>
									
									<div id="audioplay"></div>
									<div id="audioplay1" style="display:none;">
									<audio controls="controls" src="" style="opacity: 0;    visibility: hidden; position:absolute;" id="myAudio"><source src="" type="audio/mp3" /><source src="" type="audio/ogg" /></audio>
									<button  type="button"  class="myAudio"><i class="fa fa-volume-up" aria-hidden="true"></i></button>
									</div>
									</div>
								</div>
									
									
									
									</div>
									
									
									
									</div>
                                   
                                <div id="library" style="display:none;">   
                                <div class="row tras_sub_title">
									<div class="col-md-12">
										 <h3>Library</h3>
											</br>
										 <!-- <input type="text" placeholder="search" name="libsearch"/> -->
									</div>
								</div>
								<div class="rowt">
							
										
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>English</th>
            <th>Our Dialect</th>
            <th>Pronounciation</th>
        
        </tr>
    </thead>
	
    <tbody id="ibibomp3">
        
       
     
    
       
       
	   </tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="gutter">
                <div class="line number1 index0 alt2" style="display: none;">1</div>
            </td>
            <td class="code">
                <div class="container" style="display: none;">
                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                </div>
            </td>
        </tr>
    </tbody>
</table>






							  </div>
                          
							</div>
						  </div>
								
								
                               
                            </div>
							
							
                            
                        </div>
                        <!--main-ws-sec end-->
                    </div>

                </div>
            </div>
            <!-- main-section-data end-->
        </div>
        </div>
    </main>
	
<!--

-->
	<!-- DataTables CSS -->

<!-- DataTables JS -->




<input type="hidden" name="audioval" id="audioval" value="" />
<div id="audioplay1"></div>
    <?php include('footer.php') ?>

<script>



$(document).on('click', '.aplay', function(){
	var mid = jQuery(this).attr('mid');
	$("#audioplay1").html('<audio controls="controls" style="opacity: 0;    visibility: hidden; position:absolute;"  autoplay="autoplay" style="" id="cataudio"><source src="//orangestate.ng/img/language/'+mid+'" type="audio/mp3" /><source src="//orangestate.ng/img/language/'+mid+'" type="audio/ogg" /></audio>');	
	
    
});
 
 </script>
<script>


$(document).ready(function(){
	$("#tlanguage").keyup(function(){
		var  target=$('#lan_2').val();
			if(target==''){
				return false;
			}
		$.ajax({
		type: "POST",
		url: "languageprint.php",
		data:'keyword='+$(this).val() + '&lan_1='+$('#lan_1').val() + '&lan_2='+$('#lan_2').val(),
		beforeSend: function(){
			//$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(response){
			var data = jQuery.parseJSON(response);			
			var data1=data.message;	
			var english=data.english;	
			var ibibo=data.ibibo;	
			
			var ibibomp3new=data.ibibomp3;	
			//var ibibomp3new = ibibomp3.replace(' ');
			//var ibibomp3new=ibibomp3new.trim();
			var newdata=data1.trim();
			$("#rlanguage").show();
			$("#rlanguage").html(newdata);
			$("#english").html(english);
			$("#ibibo").html(ibibo);
			$("#ibibomp3").html(ibibomp3new);
			$("#rlanguage").css("background","#FFF");
			 //table.Draw();
			  $("#example").DataTable();
		}
		});
	});
	
	 $(document).ready(function ()
        {
            var table = $('#GridView1').DataTable();
            $('#inputSearch').on('keyup', function ()
            {
                table.search(this.value).draw();
            });

        });
		
	$("#languageconvertor").click(function(){
		var  target=$('#lan_2').val();		
		var  source=$('#lan_2').val();
		if(target=='Ibibio' || target=='Anang' || target=='Oron'){
			$('#library').show();			
		}else{
			$('#library').hide();
		}
		$.ajax({
		type: "POST",
		url: "texttomp3.php",
		data:'keyword='+$('#rlanguage').val(),
		beforeSend: function(){
			//$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			
					$("#audioplay").html('<audio controls="controls" autoplay="autoplay" style="opacity: 0; visibility: hidden; position:absolute;"><source src="'+data+'" type="audio/mp3" /><source src="'+data+'" type="audio/ogg" /></audio>');	
					
			
			
			}
		});
		
	});
	
	$("#languageconvertor1").click(function(){
		var  target=$('#lan_2').val();		
		var  source=$('#lan_2').val();
		if(target=='Ibibio' || target=='Anang' || target=='Oron'){
			$('#library').show();			
		}else{
			$('#library').hide();
		}
		$.ajax({
		type: "POST",
		url: "texttomp3.php",
		data:'keyword='+$('#tlanguage').val(),
		beforeSend: function(){
			//$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			
					$("#audioplay").html('<audio controls="controls" autoplay="autoplay" style="opacity: 0; visibility: hidden; position:absolute;"><source src="'+data+'" type="audio/mp3" /><source src="'+data+'" type="audio/ogg" /></audio>');	
					
			
			
			}
		});
		
	});
	
	
	
	$("#lan_2").change(function(){
		var  target=$('#lan_2').val();
		
		if(target=='Ibibio' || target=='Anang' || target=='Oron'){
			$('#library').show();
			$('#languageconvertor').hide();
			$('.myAudio').show();
			$('#audioplay1').show();
		}else{
			$('#library').hide();
			$('#audioplay1').hide();
			$('.myAudio').hide();
			$('#languageconvertor').show();
			
		}
		$.ajax({
		type: "POST",
		url: "transBasedonSelect.php",
		data:'keyword='+$("#tlanguage").val() + '&lan_1='+$('#lan_1').val() + '&lan_2='+$('#lan_2').val(),
		beforeSend: function(){
			//$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
		var newdata=data.trim();
			$("#rlanguage").show();
			$("#rlanguage").html('');
			$("#rlanguage").html(newdata);
			$("#rlanguage").css("background","#FFF");	
			
			
		}
		});
	});
	
	////////////////////////////////////////////
	$(".myAudio").click(function(){
		var  target=$('#lan_2').val();		
		var  source=$('#lan_2').val();
		
		$.ajax({
		type: "POST",
		url: "texttomp3.php",
		data:'keyword='+$('#rlanguage').val() + '&target='+ target,
		beforeSend: function(){
			//$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){		
	var audio = document.getElementById("myAudio");
	var audioval = data.replace(' ');
	var playlist = audioval.split(',');	
	var i=1;
	//console.log(playlist[0]);
	audio.src = playlist[0];
	//audio.src = "//orangestate.ng/img/language/95.mp3";
	audio.play();
	
	audio.onended = function() {
		
		audio.src = playlist[i];
		audio.play();
		i++;
		
	 
	};
			
			
			}
		});
		
	});
	///////////////////////////////////////////

	
});
/* var playlist1= [
  'https://www.w3schools.com/tags/horse.mp3',
  'https://demo.twilio.com/hellomonkey/monkey.mp3',
  'https://www.w3schools.com/tags/horse.mp3'];  */
/* function audioplaynew(dataaudio)
{ 

	$("#audioplay1").html('<audio controls="controls" autoplay="autoplay" style="" id="cataudio"><source src="//orangestate.ng/img/language/'+dataaudionew+'" type="audio/mp3" /><source src="//orangestate.ng/img/language/'+dataaudionew+'" type="audio/ogg" /></audio>');	
} */


function playAudio() {
	
	var audio = document.getElementById("myAudio");

	var str=$("#audioval").val();
	var audioval = str.replace(' ');
	var playlist = audioval.split(',');
	
	console.log(playlist);
	var i=1;
	//console.log(playlist[0]);
	audio.src = playlist[0];
	//audio.src = "//orangestate.ng/img/language/95.mp3";
	audio.play();
	
	audio.onended = function() {
		
		audio.src = playlist[i];
		audio.play();
		i++;
		
	 
	};
}
 

function pauseAudio(){ 
alert('');
var audio = document.getElementById("cataudio");
  audio.pause(); 
}  

/* $(document).ready(function() {
    $('#example').DataTable();
} ); */
</script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>

<!-- DataTables Select CSS -->
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- DataTables Select JS -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" type="text/javascript"></script>

