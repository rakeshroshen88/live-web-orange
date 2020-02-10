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

    <section class="cover-sec">
	
		<label style="position:absolute; right:10%; bottom:10%;">
			
		</label>
    </section>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <?php if($profilerow['image_id']=='' and empty($profilerow['image_id'])){ ?>
                                            <img src="images/resources/user.png" id="rmvid" alt="" height="190" width="190">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['image_id']?>" id="rmvid" alt="" height="190" width="190">
                                                <?php }?>
												<!-- <input type="file" id="file1">-->
												
                                                    <div class="add-dp" id="OpenImgUpload">
                                                        <input type="file" id="file1">
                                                        <label for="file1"><i class="fas fa-camera"></i></label>
                                                    </div>
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b><?php 
												 $num1=$db->getSingleResult("SELECT count(f_id) from followers where user_id=".$_SESSION['sess_webid']." limit 0,5");
												if(empty($num1)){ echo "0";}else{ echo $num1; }
												?></b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b><?php 
												
												 $num=$db->getSingleResult("SELECT count(f_id) from followers where follow=".$_SESSION['sess_webid']);
												 if(!empty($num)){ echo $num;}else{ echo "0";}
												?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
                                  <?php if(!empty($profilerow['website'])){?>
                                    <ul class="social_links">
                                        <li><a href="#" title=""><i class="la la-globe"></i> <?=$profilerow['website']?></a></li>
                                        
                                    
									<?php } ?>
									
									<?php  $dbs=new DB();
									  $sqls="select * from social_link where user_id =".$_SESSION['sess_webid'];
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                        <li><a href="<?=$rows['slink']?>" title="" target="_blank"><i class="la la-globe"></i><?=$rows['slink']?></a></li>
									<?php }?>

									</ul>
							   </div>
							   
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
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									
                                <!--user_profile end
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Following </h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                   
                                </div>-->
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
						
                                <!--user-tab-sec end-->
							
                            <div class="main-ws-sec profile-lisgn">
                              <div class="user-tab-sec rewivew">
                                   <h3>Welcome to</h3><p>Akwa Ibom</p>
                                                                       
                                </div>
                            
                            <div class="product-feed-tab" >
                                <div class="portfolio-gallery-sec">
                                    
									<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<h3>
									<select id="lan_1" name="lan_1">
  <option value="en">English</option>
  <option value="hin">Hindi</option>
  <option value="Ibibio">Ibibio</option>
  <option value="Anang">Anang</option>
  <option value="Oron">Oron</option>
  <option value="">Select Language</option><option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option>
</select>
</h3></br>
									<textarea name="tlanguage" id="tlanguage" placeholder="Type your Text !" rows="12" cols="50"style="border-radius: 5px;"></textarea>
									
									
									
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<h3><select id="lan_2" name="lan_2">
									 <option value="">Select Language</option>
  <option value="hin">Hindi</option>
  <option value="en">English</option>
  <option value="Ibibio">Ibibio</option>
  <option value="Anang">Anang</option>
  <option value="Oron">Oron</option>
 <option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option>
</select></h3></br>
									<textarea rows="12" cols="50" name="rlanguage" id="rlanguage" readonly  style="border-radius: 5px;"></textarea>
									</br>
									<button type="button" id="languageconvertor" name="languageconvertor" style="display:none;" /><i class="fa fa-bullhorn" aria-hidden="true"></i></button>
									<div id="audioplay"></div>
									<div id="audioplay1" style="display:none;">
									<audio controls="controls" src="" style="opacity: 0;    visibility: hidden; position:absolute;" id="myAudio"><source src="" type="audio/mp3" /><source src="" type="audio/ogg" /></audio><button  type="button"  class="myAudio"><i class="fa fa-bullhorn" aria-hidden="true"></i></button>
									</div>
									
									
									
									</div>
									
									
									
									</div>
                                   
                                   
                                <div class="row">
									<div class="col-md-12">
										 <h3>Library</h3>
											</br>
										 <input type="text" placeholder="search" name="libsearch"/>
									</div>
								</div>
								<div class="row">
								
										 <div class="col-md-4">
										 <h3>English</h3>
										 <ul id="english">
										 
										 <li>Ankle</li>
										 
										 
										 </ul>
										 </div>
										 
										  <div class="col-md-4">
										 <h3>Our Dialect 	<select id="lan_1" name="lan_1">
  <option value="en">English</option>
  <option value="hin">Hindi</option>
  <option value="Ibibio">Ibibio</option>
  <option value="Anang">Anang</option>
  <option value="Oron">Oron</option>
  <option value="">Select Language</option><option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option>
</select>
</h3>
										 <ul id="ibibo">
										 
										 <li>Ankle</li>
										
										 
										 </ul>
										</div>
										 
										<div class="col-md-4">
										 <h3>Pronounciation</h3>
										  <ul id="ibibomp3">
										  <style>
											.controltranstion i{margin:0 10px; color: #ff5e00;}
										  </style>
										 <li class="controltranstion">
										<a href="javascript:void(0)"class='aplay'><i class='fa fa-play' title='play'  aria-hidden='true'></i>
										</a>
										<!--<a href="javascript:pauseAudio("")"> <i class="fa fa-volume-off " title="Mute" aria-hidden="true"></i> </a>
										 
										 <i class="fa fa-volume-down" title="Valume down" aria-hidden="true"></i>
										 <i class="fa fa-volume-up" title="Valume Up"  aria-hidden="true"></i>-->
										 <i class="fa fa-download" title="download"  aria-hidden="true"></i>
										 
										 </li>
										 
										 
										
										 </ul>
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
<input type="hidden" name="audioval" id="audioval" value="" />
<div id="audioplay1"></div>
    <?php include('footer.php') ?>

<script>
$(document).on('click', '.aplay', function(){
	var mid = jQuery(this).attr('mid');
	$("#audioplay1").html('<audio controls="controls" autoplay="autoplay" style="" id="cataudio"><source src="//orangestate.ng/img/language/'+mid+'" type="audio/mp3" /><source src="//orangestate.ng/img/language/'+mid+'" type="audio/ogg" /></audio>');	
	
    
});
 
 </script>
<script>


$(document).ready(function(){
	$("#tlanguage").keyup(function(){
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
		}
		});
	});
	
	
	$("#languageconvertor").click(function(){
		var  target=$('#lan_2').val();		
		var  source=$('#lan_2').val();
		
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
	
	
	$("#lan_2").change(function(){
		var  target=$('#lan_2').val();
		
		if(target=='Ibibio' || target=='Anang' || target=='Oron'){
			$('#languageconvertor').hide();
			$('.myAudio').show();
			$('#audioplay1').show();
		}else{
			$('#audioplay1').hide();
			$('.myAudio').hide();
			$('#languageconvertor').show();
			
		}
		$.ajax({
		type: "POST",
		url: "transBasedonSelect.php",
		data:'keyword='+$("#rlanguage").val() + '&lan_1='+$('#lan_1').val() + '&lan_2='+$('#lan_2').val(),
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

</script>
<?php include('footer.php');?>