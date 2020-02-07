<?php
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "catid","catname","", "" );

//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../upload/Thumb/";
$uploaddir2="../upload/Medium/";
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
if(empty($_REQUEST['cityname'])){
	$city=$_REQUEST['cityid'];
}else{
	$city=$_REQUEST['cityname'];
	
}
$prod_detail=$_REQUEST['prod_desc'];
$updatearr=array(	
					 "title"=>htmlentities($_REQUEST['prodname']),					 
					 "image"=>$largeimage,
					"stateid"=>$_REQUEST['statetitle'],
					"cityid"=>$city,		
					 "status"=>$_REQUEST['pstatus'],
					 "date"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_SIGHT, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				echo "hi";
					$insid=insertData($updatearr, $_TBL_SIGHT);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=sight');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_SIGHT WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
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
                        <td bgcolor="#FFFFFF" class="titlebar-bg">Add Home Page sight</td>
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
						<input type="hidden" name="image1" value="<?=$row['prod_small_image']?>" />
						<input type="hidden" name="image2" value="<?=$row['prod_medium_image']?>" />
						<input type="hidden" name="image3" value="<?=$row['image']?>" />
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" bgcolor="#e4e4e4" class="category_text">Enter Details </td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
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
                              <input name="prodname" type="text" class="textfield" value="<?=$row['title']?>"/>                            </td>
                          </tr>
						 						  						  
						   <tr>
                            <td width="30%" align="right" class="textfield_text">sight sight Image:</td>
                            <td width="70%">
                              <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['image']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewLimage.php?img=<?=$row['image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?> </td>
                          </tr>
                        
                          <tr>
                            <td>&nbsp;</td>
							<td align="left">
							<input name="pstatus" type="radio" value="1"<?php if($row['status']=="1"){echo " checked";}?>/>Active
							<input name="pstatus" type="radio" value="0"<?php if($row['status']=="0"){echo " checked";}?>/>Deactive
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