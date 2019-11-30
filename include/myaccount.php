<?php include("chksession.php");

$regmsg="";
$makearr=array();
$makearr=getValuesArr( $_TBL_COUNTRIES, "countryCode","countryName","", "" );
if(isset($_POST['submit']))  
{
	if(empty($_SESSION['sess_picid'])){
		$imagepath=$_POST['path'];
		}else{
			$imagepath=$_SESSION['sess_picid'];
			
			}
	 $whereClause=" id!=".$_REQUEST['id']." and email='".$_REQUEST['email']."'" ;
     if(matchExists($_TBL_USER, $whereClause))
	 {
       
           $regmsg="This E-mail Address Already Registerd"; 
		   
      } else { 

       $name=$_REQUEST['name'];
	  // $passwd=$_REQUEST['passwd'];
	   //$conf_passwd=$_REQUEST['conf_passwd'];
	   $companyname=$_REQUEST['companyname'];
       $email=$_REQUEST['email'];
       $cell=$_REQUEST['cell'];
	   $address1=$_REQUEST['address1'];
	   $city=$_REQUEST['city'];
	   $state=$_REQUEST['state'];
	   $country=$_REQUEST['country'];
	      
     
		
if($_SESSION['sess_webid']!="")

    {
		$arr=array(
				  "name"=>$name,
							"company"=>$companyname,
				            "email"=>$email,
				            "password"=>$passwd,
							 "confirm_pass"=>$conf_passwd,
                           "address"=>$address1,
                            "zip"=>$zip,
							"city"=>$city,
							"state"=>$state,
                           "phone"=>$telnocc."-".$telno,
						   "cellno"=>$cell,
                            "country"=>$country,
							 "checkterm"=>$check,
							 "imagepath"=>$imagepath,
			    );
	
	 $x='id='.$_SESSION['sess_webid'];
     $axy=updateData($arr, $_TBL_USER, $x);
	$regmsg="Updated successfully";	
			
 
     }
	
 }	
  
 }          
          
if($_SESSION['sess_webid']!="")
  {
	  
    $res2="select * from $_TBL_USER where id='".$_SESSION['sess_webid']."'";//die;
     $db->query($res2);
    if($db->numRows()>0)
	{
      $row=$db->fetchArray();
	 
	   
         $name=$row['name'];
	    $passwd=$row['password'];
	       $companyname=$row['company'];
	      $conf_passwd=$row['confirm_pass'];
	     $email=$row['email'];
          $phone=$row['phone'];
	     $array=(explode('-',$phone));
          $telnocc=$array[0];
		 $telno=$array[1];
	     $cell=$row['cellno'];
	     $address1=$row['address'];
	   $city=$row['city'];
       $state=$row['state'];
	     $zip=$row['zip'];
	   $country=$row['country'];
	
	   }
	 }   
		 
  



 ?>


	<style type="text/css">
#upload{
cursor:pointer !important;
	border: 1px solid #cb0299;
	box-shadow: 0 0 3px #8f2249, 0 1px 1px 0 #8f2249 inset;
	color: #ffffff !important;
	text-shadow: 0 1px 0 #721738;
	background:#e7308e;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	padding:5px 6px;
	text-decoration:none !important;
	width:83px;
}
#upload1{
-moz-border-radius:5px 5px 5px 5px;
background:none repeat scroll 0 0 #000000;
color:#FFFFFF;
cursor:pointer !important;
font-family:Arial,Helvetica,sans-serif;
font-size:1.3em;
font-weight:bold;
margin:10px 0;
padding:5px;
text-align:center;
width:83px;
}
.darkbg{
	background:#ddd !important;
}
#status{
	font-family:Arial; padding:5px;
}

.error{ background:#f0c6c3; border:1px solid #cc6622; }
.baltr{background-image:url(../images/head_bg.png); color:#FFFFFF}
.baltd1{ background-color:#e9e5e5}
.baltd2{ background-color:#f4f1f1}

#files span{float:left;}

.popup {padding:10px; display:none; width:775px; height:500px; overflow:scroll;}
.close-icon {width:24px; height:24px; background:url(<?=$_SITE_PATH?>images/x.png) no-repeat 0 0; position:absolute; right:-10px; top:-10px;}
input, button {margin-top:0; margin-bottom:0;}


.smallpopup {padding:10px; display:none;}
.close-icon {width:24px; height:24px; background:url(<?=$_SITE_PATH?>images/x.png) no-repeat 0 0; position:absolute; right:-10px; top:-10px;}


</style>
<script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?=$_SITE_PATH?>uploadjs/ajaxupload.3.5.js" ></script>
<script language="javascript" type="text/javascript">
var j3=jQuery.noConflict();
j3(function()
{
	var btnUpload=j3('#upload');
	var status=j3('#status');
	
	var upurl="<?=$_SITE_PATH?>upload-file.php";
	new AjaxUpload(btnUpload, {
	action: upurl,
	name: 'uploadfile',
	onSubmit: function(file, ext)
	{
		document.getElementById('statuspic').style.display='';
	 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
     // extension is not allowed 
	status.text('Only JPG, PNG or GIF files are allowed');
	return false;
	}status.text('');
	},
	
	onComplete: function(file, response)
	{
		//On completion clear the status
		status.text('');
		
		//Add uploaded file to list
		var str=response.split('|');
		var bb=str[0].substr(0,7);
		var filename=str[1];		
		var idd=str[0].replace('success',' ');
		var idb =idd.replace(/^\s*|\s*$/g,'')		
		if(bb==="success")		
		{
			
		var productElement = document.getElementById('logoid');
		
		if (productElement != null)
			{
			j3('.success').remove();
			}
			document.getElementById('statuspic').style.display='none';
			document.getElementById('files').innerHTML='';
			j3('<span id="logoid"></span>').appendTo('#files').html('<img src="<?=$_SITE_PATH?>upload/medium/'+filename+'" alt="" style="margin:5px;" /><br><a href="javascript:void(0)" onClick="deletelogoFile('+idd+');"><input type="button" value="Delete" class="button_grey fr" /></a>').addClass('success');
		}
		else 
		{
			j3('<span></span>').appendTo('#files').text(response).addClass('error');
		}
	}});
});


function deletelogoFile(id)
{
	var aurl="<?=$_SITE_PATH?>delete-file.php?imageid="+id;
	j3.get(aurl);
	document.getElementById('logoid').innerHTML='';
	
}
</script>
<script>
function submitregform(){
	
 if(is_empty(document.getElementById('input_fullname').value))
		{
		alert("Please enter name!");
		document.getElementById('input_fullname').focus();		
		return false;
		}
if(is_empty(document.getElementById('company').value))
		{
		alert("Please enter company name!");
		document.getElementById('company').focus();		
		return false;
		}
if(!is_email(document.getElementById('email').value))
		{
		alert("Please enter your valid email address!");
		document.getElementById('email').focus();		
		return false;
		}
/*if(is_empty(document.getElementById('username').value))
		{
		alert("Please enter username!");
		document.getElementById('username').focus();		
		return false;
		}*/
 if(is_empty(document.getElementById('passwd').value))
		{
		alert("Please enter password!");
		document.getElementById('passwd').focus();		
		return false;
		}
  if((document.getElementById('passwd').value)!=(document.getElementById('conf_passwd').value))
		{
		alert("Password and confirm password must be same!");
		document.getElementById('cpwd').focus();		
		return false;
		}
		
		var cap=document.getElementById('captchacode').value;
		var cap1=document.getElementById('captcha').value;
			
		if(cap1!=cap)
		{
		alert("you have entered  invalid captcha !");
		document.getElementById('captchacode').focus();		
		return false;
		}
		if(!document.getElementById('check').checked || document.getElementById('check').checked==false) 
		{
		alert("Please Select our term and condition!");
		document.getElementById('check').focus();		
		return false;
		}
		
		
		
		
}
</script>
  <div class="main">
			<div class="wrap">
            <div>
            <div style="float:left" >
            
<?php 
$dbp=new DB();
 $resp="select * from $_TBL_PAGEOWNER where userid='".$_SESSION['sess_webid']."'";//die;
$dbp->query($resp);
if($dbp->numRows()>0)
{	$total=$dbp->numRows();   ?> 
 <h2 style="color:#090; margin-top:10px;"> Manage own Pages!</h2>
  <h3> Total Pages = <?=$total?>
  
  <?php while($rowp=$dbp->fetchArray()){?>
  <a href="<?=$_SITE_PATH?>inner.php?module=editpage&id=<?=$rowp['id']?>"> <p> <?=$rowp['pagetitle']?></p>  </a>        
            
            
           <?php }}?> 
            
            
            </div>
<div style="margin-left:400px;" style="float:right">

<form name="login" method="post" action="" onsubmit="return submitregform();" id="formID" >
 <input type="hidden" value="do_register" name="action" class="frm-field">
    <input type="hidden" value="" name="redirecturl">
    <input type="hidden" value="295740" name="resellerid">
     <input type="hidden" name="captcha" id="captcha" value=""/>
     <input type="hidden" name="path" value="<?=$row['imagepath']?>" />
<table cellpadding="5" cellspacing="5" align="center" >
<h2 style="color:#090; margin-top:10px;">Create an Account!</h2>
<tr><td colspan="2"><hr /> </td></tr>

  <?php if(isset($_REQUEST['errMsg']) and $_REQUEST['errMsg']!=""){echo $_REQUEST['errMsg'];}?>
  
<tr><td style="padding-top:10px;">Name:</td><td style="padding-top:10px;"> 
          <input type="text" size="35" value="<?=$row['name']?>" class="frm-field required" id="input_fullname" name="name" ></td></tr>
<tr><td style="padding-top:10px;">companyname: </td><td style="padding-top:10px;"><input type="text" size="35" value="<?=$row['company']?>" class="frm-field required" id="company" name="companyname"></td></tr>

<tr><td style="padding-top:10px;">Email: </td><td style="padding-top:10px;"><input type="text" size="35" value="<?=$row['email']?>" class="frm-field required" id="email" name="email"></td></tr>

<!--<tr><td style="padding-top:10px;">Password: </td><td style="padding-top:10px;"><input type="password" size="35" value="" class="frm-field required" id="passwd" name="passwd"></td></tr>

<tr><td style="padding-top:10px;">Conform Password: </td><td style="padding-top:10px;"> <input type="password" onKeyUp="runPassword(this.value, 'mypassword');" size="35" class="frm-field required" id="conf_passwd" name="conf_passwd"></td></tr>
-->
<tr><td style="padding-top:10px;">Address: </td><td style="padding-top:10px;"> <input type="text" value="<?=$row['address']?>" maxlength="64" class="frm-field required" id="input_address1" name="address1"></td></tr>

<tr><td style="padding-top:10px;">City: </td><td style="padding-top:10px;">  <input type="text" size="35" value="<?=$row['city']?>" name="city" maxlength="15" class="frm-field required" id="select_city" style="width:140px;"></td></tr>

<tr><td style="padding-top:10px;">State : </td><td style="padding-top:10px;">  <input type="text" value="<?=$row['state']?>" maxlength="64" class="frm-field required" id="input_address1" name="state"></td></tr>
<tr><td style="padding-top:10px;">Zip code : </td><td style="padding-top:10px;">  <input type="text" size="35" value="<?=$row['zip']?>" maxlength="15" class="frm-field required" id="input_zip" name="zip" style="width:100px;"></td></tr>


<tr><td style="padding-top:10px;">Country : </td><td style="padding-top:10px;"><?php echo createComboBox($makearr,"country",$row['country'],"")?></td></tr>
<tr><td style="padding-top:10px;">Mobile No: </td><td style="padding-top:10px;">  <input type="text" size="35" value="<?=$row['cellno']?>" name="cell" maxlength="12" class="frm-field required" id="input_phone"></td></tr>
		  </td></tr>
<tr><td colspan="2">
<div id="upload"><span>Upload Image</span></div><div style="margin-left:175px; margin-top:-43px;"></div><div style="margin-left:245px; margin-top:-43px; font-size:16px; font-weight:bold;">&nbsp;</div>
       <br /><br /> <span id="status"></span><span id="statuspic" style="display:none;"><img src="<?=$_SITE_PATH?>images/load.gif" width="64" height="64"></span>
       </td>
</tr>         
                            <tr>
                              <td id="files" colspan="2"><img src="<?=$_SITE_PATH?>upload/medium/<?=$row['imagepath']?>" alt="" style="margin:5px;" /></td>
                            </tr>
                          

<tr><td colspan="2" style="padding-top:10px;" align="center"><button name="submit" type="submit"  >Update Accoun</button></td></tr>
<tr><td colspan="2" style="padding-top:10px;"><hr /> </td></tr>

</table>  
  
  </form>
  </div> </div>
  
  <script language="javascript" src="js/prototype.js"></script>
        <!--<script>
            
            // This method is called right before the ajax form validation request
            // it is typically used to setup some visuals ("Please wait...");
            // you may return a false to stop the request 
            function beforeCall(form, options){
                if (window.console) 
                    console.log("Right before the AJAX form validation call");
                return true;
            }
            
            // Called once the server replies to the ajax form validation request
            function ajaxValidationCallback(status, form, json, options){
                if (window.console) 
                    console.log(status);
                
                if (status === true) {
                   alert("the form is valid!");
                    // uncomment these lines to submit the form to form.action
                   form.validationEngine('detach');
                   form.submit();
                    // or you may use AJAX again to submit the data
                }
            }
			
            var j = jQuery.noConflict();
            j(document).ready(function(){
                j("#formID").validationEngine();
            });
        </script>--> 
        

