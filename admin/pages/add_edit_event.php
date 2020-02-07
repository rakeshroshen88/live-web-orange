<?php 
 $prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../upload/thumb/";
$uploaddir2="../upload/medium/";
$uploaddir3="../upload/Large/";
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
	
	
if($act=="edit")
	{
		

	if(!empty($_FILES['largeimage1']['name']))
		{
		$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
		
		
		}else{
		$largeimage1=$_REQUEST['image4'];
		
		}
	
	}else{
	
	$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
	
	}

 $prod_detail=$_REQUEST['prod_desc'];
 $e1=$_REQUEST['edate'];
 $e2=explode('/',$e1);
 $edate1=$e2[2].$e2[0].$e2[1];
 if(empty($_REQUEST['cityname'])){ $eid1=$_REQUEST['cityid1']; }else{ $eid1=$_REQUEST['cityname']; }
$updatearr=array(	
					 "etitle"=>htmlentities($_REQUEST['prodname']),					 
					 "eimageid"=>$largeimage,
					 "eimageid1"=>$largeimage1,
					 "edetail"=>$prod_detail,
					 "estatus"=>$_REQUEST['pstatus'],
					 "stateid"=>$_REQUEST['statetitle'],
					"cityid"=>$eid1,
					 "eplace"=>$_REQUEST['place'],
					 "edate"=>$edate1
					 );

				
			if($act=="edit")
				{
					 $whereClause=" eid=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_EVENT, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_EVENT);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=viewevent');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_EVENT WHERE eid=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['edate'];
		 $e3=explode('-',$e);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
	}
?>
<SCRIPT>
function validpic(picfile)
	{
	vtype=new Array("png","gif","jpg","jpeg");
	str=new String(document.getElementById(picfile).value);
	arr=new Array();
	arr=str.split('.');
	num=arr.length;
	flag=false;
	for(i=0;i<vtype.length;i++)
		{
		if(vtype[i]==arr[num-1])
			{
			flag=true;
			}
		}
	if(!flag)
		{
		alert("Please Select Valid Picture File");
		document.getElementById(picfile).focus();
		return false;
		}
	
	}
	
function formValidator(theForm)
{
extraoption1="";
extraoption2="";
len=document.frmprod.elements.length;
for(i=0;i<len;i++)
	{
	str=new String(document.frmprod.elements[i].name);
	
	extname=str.substr(0,6);
	if(extname=='txtext')
		{
		//alert(document.frmprod.elements[i].name);
		//alert(extname);		
		extraoption1+=document.frmprod.elements[i].value+',';
		}
	if(extname=='txtopt')
		{
		extraoption2+=document.frmprod.elements[i].value+',';
		}
		
	}	
document.getElementById('extraoption1').value=extraoption1;
document.getElementById('extraoption2').value=extraoption2;;


	if(is_empty(theForm.prodname.value))
		{
			alert("Please fill the product name !.")
			theForm.prodname.focus();
			return false;
		}
	if(!is_number(theForm.prodqty.value))
		{
			alert("Please fill the valid product quantity !")
			theForm.prodqty.focus();
			return false;
		}
	if(!is_float(theForm.prodprice.value))
		{
			alert("Please enter valid charges !.")
			theForm.prodprice.focus();
			return false;
		}
	if(!is_empty(theForm.proddisc.value))
		{
		if(!is_float(theForm.proddisc.value))
			{
			alert("Please enter valid discpunt !.")
			theForm.proddisc.focus();
			return false;
			}
		}
	if(theForm.image1.value=="" && theForm.smallimage.value=="")
		{
		
		if(is_empty(theForm.smallimage.value))
			{
				alert("Please select the product small image.")
				theForm.smallimage.focus();
				return false;
			}
		validpic('smallimage');
	
		}
	if(theForm.image2.value=="" && theForm.mediumimage.value=="")
		{
		if(is_empty(theForm.mediumimage.value))
			{
				alert("Please select the product medium image.")
				theForm.mediumimage.focus();
				return false;
			}
		validpic('mediumimage');
		}
	if(theForm.image3.value=="" && theForm.largeimage.value=="")
		{
		if(is_empty(theForm.largeimage.value))
			{
			
				alert("Please select the product large image.")
				theForm.largeimage.focus();
				return false;
			}
		validpic('largeimage');
		}
	if(is_empty(theForm.prod_desc.value))
		{
			alert("Please fill the product description !.")
			theForm.prod_desc.focus();
			return false;
		}

	

}

function changecat()
			{
			window.location.href='?mod=add_prod&id=<?=$_REQUEST['id']?>&act=<?=$_REQUEST['act']?>&catid='+document.getElementById("category").value;			
			}        
</SCRIPT>

<table width="100%">
  <tr>
    <td class="container-bg"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="body-bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="300" valign="top" class="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#E6E6E6" class="tdpad"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#FFFFFF" class="titlebar-bg">Add Home Page Event</td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF">&nbsp;</td>
                      </tr>
					   <tr>
                        <td bgcolor="#FFFFFF" align="center" style="color:#FF0000;"><?=$errMsg?></td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF" class="tdpad-content">
						<form name="frmprod" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="image4" value="<?=$row['eimageid1']?>" />
						<input type="hidden" name="image3" value="<?=$row['eimageid']?>" />
						<input type="hidden" name="prodid" value="<?=$row['eid']?>" />
						<input type="hidden" name="cityid1" value="<?=$row['cityid']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" bgcolor="#e4e4e4" class="category_text">Enter Details </td>
                          </tr>
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
</script>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
						 <tr>
                            <td width="39%" align="right" class="textfield_text">Select state:</td>
                            <td width="61%">
							<select id="statetitle" name="statetitle" style="width: 40%;" onchange="return showUser(this.value);">
                        <option value='0'>Select state</option>
		<?php $db1=new DB();
		$sql1="SELECT * FROM $_TBL_STATE WHERE status='1'";
		$db1->query($sql1)or die($db11->error());
		while($row1=$db1->fetchArray()){
		 $tt=$row1['id'];
		?>				
                        <option value="<?=$row1['id']?>" <?php if($row1['id']==$row['stateid']){echo " selected";}?>><?=$row1['title']?></option>
		<?php }?>	
                    </select>
                                                       </td>
                          </tr>
						   <tr>
                            <td width="39%" align="right" class="textfield_text"></td>
                        <td width="70%">
                              <div  id="txtHint"></div>
               
                 </td>
                          </tr>
                          <tr>
                            <td width="30%" align="right" class="textfield_text">Title :</td>
                            <td width="70%">
                              <input name="prodname" type="text" class="textfield" value="<?=$row['etitle']?>"/>                            </td>
                          </tr>
                          
                           <tr>
                            <td width="30%" align="right" class="textfield_text">Place :</td>
                            <td width="70%">
                              <input name="place" type="text" class="textfield" value="<?=$row['eplace']?>"/>                            </td>
                          </tr>
						   <tr>
                            <td width="30%" align="right" class="textfield_text">Event Date :</td>
                            <td width="70%">
                              <input name="edate" type="date" class="textfield" value="<?php echo $edate;?>"/><?php echo $edate;?>                            </td>
                          </tr>
                          
                           <tr>
                            <td width="30%" align="right" class="textfield_text">Description :</td>
                            <td width="70%">
                              <textarea name="prod_desc"  height="400" class="textfield" ><?=$row['edetail']?></textarea>
                                <script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>                             </td>
                          </tr>
						 						  						  
						   <tr>
                            <td width="30%" align="right" class="textfield_text"> Event Image:</td>
                            <td width="70%">
                              <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['eimageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('vieweimage.php?img=<?=$row['eimageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?> </td>
                          </tr>
                           <tr>
                            <td width="30%" align="right" class="textfield_text"> Event Image:</td>
                            <td width="70%">
                              <input name="largeimage1" id="largeimage1" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['eimageid1']){?><a href="javascript:void(0)" onclick="javascript:window.open('vieweimage.php?img=<?=$row['eimageid1']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?> </td>
                          </tr>
                        
                          <tr>
                            <td>&nbsp;</td>
							<td align="left">
							<input name="pstatus" type="radio" value="yes" <?php if($row['estatus']=="yes"){echo " checked";}?>/>Active
							<input name="pstatus" type="radio" value="no" <?php if($row['estatus']=="no"){echo " checked";}?>/>Deactive
							</td>
                          </tr>
						  
						
                          <tr>
                            <td>&nbsp;</td>
                            <td><input name="Submit" type="submit" class="button" value="Save" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                     
                        </table>
						</form>
						
						</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>