<?php include("header.php"); 
 
$_TBL_SLIDER='slider_add';
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();

$uploaddir3="../../slider/";
$check_type="jpg|jpeg|gif|png";
if($act=="edit")
	{

	if(!empty($_FILES['largeimage']['name']))
		{
		$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
		
		}else{
		$largeimage=$_REQUEST['image3'];
		}
	
	}else{
	
	$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
	
	
	}

 //$prod_detail=$_REQUEST['prod_desc'];
$updatearr=array(	
					"picture"=>$largeimage,
					"addlink"=>$_REQUEST['tum'].'//'.$_REQUEST['link'],
					 "homestatus"=>$_REQUEST['pstatus'],
					 "section"=>$_REQUEST['section'],
					 "img_type"=>$_REQUEST['type'],	
					 "homedate"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					 $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_SLIDER, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_SLIDER);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_SLIDER WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>

<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li class="active"><a href="#">Advert</a></li>

                           

                        </ul>

                    </div>

    <style>
	.form-group:last-child {
    margin-bottom: 15px !important;
}
	</style>                

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 
				<?php if(!empty($errMsg)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$errMsg?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>

<?php if(!empty($errMsg1)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Error!</strong> <?=$errMsg1?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>
                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-12">

            <!-- Tab panes -->
				<form name="frmprod"  method="post" action=""  enctype="multipart/form-data">
						
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="cityid" value="<?=$row['cityid']?>" />
						<input type="hidden" name="image3" value="<?=$row['picture']?>" />
						
            <div class="tab-content">

                <div class="tab-pane active" id="home">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                          

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                         
<div class="row">
	<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Pages</label>
                                        <div class="col-md-10">
                                        <select name="type" id="type" class="form-control" >
  <option value="">Select</option>
  <option value="Market-Place" <?php if($row['img_type']=='Market-Place'){ echo "selected";}?>>Market Place </option>
  <option value="Dashboard" <?php if($row['img_type']=='Dashboard'){ echo "selected";}?>>Dashboard</option>
   <option value="icancook" <?php if($row['img_type']=='icancook'){ echo "selected";}?>>I Can Cook</option>
   <option value="Mobile" <?php if($row['img_type']=='Mobile'){ echo "selected";}?>>Mobile Slider</option>
   
   <option value="Language" <?php if($row['img_type']=='Language'){ echo "selected";}?>>Language Translator</option>
   
   <option value="event" <?php if($row['img_type']=='event'){ echo "selected";}?>>Event</option>
   
   <option value="hub" <?php if($row['img_type']=='hub'){ echo "selected";}?>>Business Hub</option>
 
</select>
                                        </div>
                                    </div>
							   
	 </div>
		
<div class="row">
	<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Sections</label>
                                        <div class="col-md-10">
                                        <select name="section" id="section" class="form-control" >
  <option value="">Select</option>
  <option value="slider" <?php if($row['section']=='slider'){ echo "selected";}?>>Market Place main Slider</option>
  <option value="advertisement" <?php if($row['section']=='advertisement'){ echo "selected";}?>>Market Place Right Ads</option>
   <!--<option value="Sponsor" <?php if($row['section']=='Sponsor'){ echo "selected";}?>>Sponsor</option>-->
   <option value="Mobile" <?php if($row['section']=='Mobile'){ echo "selected";}?>>Mobile Slider</option>
   
   <option value="Language" <?php if($row['section']=='Language'){ echo "selected";}?>>Language Translator Ads</option>
   <option value="cook" <?php if($row['section']=='cook'){ echo "selected";}?>>I Can Cook Ads</option>
   <option value="event" <?php if($row['section']=='event'){ echo "selected";}?>>Event Ads</option>
    <option value="businesshub" <?php if($row['section']=='businesshub'){ echo "selected";}?>>Business Ads</option>
	<option value="businesshubslider" <?php if($row['section']=='businesshubslider'){ echo "selected";}?>>Business main slider</option>
 
</select>
                                        </div>
                                    </div>
							   
	 </div>						   
	 
	 <div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="url"> Url:</label>
										
										<div class="col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                               <?php   $link=$row['addlink'];
											   $link1=explode('//',$link);
											  
											   ?>
                                                <select class=" btn btn-default dropdown-toggle" style="height: 34px;" name="tum">
												<option value="http:" <?php if($link1[0]==='http:'){ echo "selected"; }?>>http<span class="caret"></span></option>
												<option value="https:" <?php if($link1[0]==='https:'){ echo "selected"; }?>>https</option>
                                                   
                                                  
                                                </select>
                                            </div>
                                            <input id="link" name="link" type="text" placeholder="url:" class="form-control" value="<?=$link1[1]?>" >
                                        </div>
                                    </div>
										
                                       
                                    </div>
								</div>
								
	
		
                      <div class="row">
                                    	<div class="form-group">
        									<label class="col-md-2 control-label">  Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewnimage2.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         </div>
                                         
                							
                                         <div class="row">
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1" <?php if($row['homestatus']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0" <?php if($row['homestatus']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
                									</div>
                								</div>
                                               </div> 
                                      
                                        


</div>



   </div>

                                <!-- END RECENT -->

<p></p>

                    </div>

                </div>
<p></p>
             

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>

                                <!--<button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>-->

<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Save"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>



                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> 
<!--<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  
-->
<script>
jQuery(document).on("change","#country",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajstate.php';
        var dataString ="cid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showstate').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#state",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajcity.php';
        var dataString ="sid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showcity').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#cityname",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajhotel.php';
        var dataString ="hid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showhotel').html(response);
                }else{
                
                }
            },
        });
});

function deleteFile(id)
{
	var aurl="//orangestate.ng/admin/pages/delete-filerooms.php";
	 var dataString ="imageid=" + id ;
        $.ajax({
            url: aurl,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                  $("#"+id).hide();	
                }else{
                
                }
            },
        });

}

</script>

	<script>

function showUser(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHint").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
    }
  }
  
xmlhttp.open("GET","pages/ajcity.php?q="+str,true);
xmlhttp.send();
}
}



function showhotel(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHinthotel").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
		
    document.getElementById("txtHinthotel").innerHTML=xmlhttp1.responseText;
	
	
    }
  }
  
xmlhttp1.open("GET","pages/ajhotel.php?q="+str,true);
xmlhttp1.send();
}
}

</script>														  
<script language="javascript">
function getCheckedCheckboxesFor(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
		
		$('#emplist').val(values);
    });
    return values;
}
	</script>
	
	
	
	<script language="javascript">
function getCheckedCheckboxesFor1(checkboxName) {
    var checkboxes1 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes1, function(el1) {
        values.push(el1.value);
		
		$('#emplist1').val(values);
    });
    return values;
}
	</script>
	
	
	<script language="javascript">
function getCheckedCheckboxesFor2(checkboxName) {
    var checkboxes2 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes2, function(el2) {
        values.push(el2.value);
		
		$('#emplist2').val(values);
    });
	
    return values;
}
	</script>
	
	
		<script language="javascript">
function getCheckedCheckboxesFor3(checkboxName) {
    var checkboxes3 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes3, function(el3) {
        values.push(el3.value);
		
		$('#emplist3').val(values);
    });
    return values;
}
	</script>


<?php include("footer.php") ?>

	