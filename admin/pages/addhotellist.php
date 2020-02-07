<?php

//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

 $prod_detail=$_REQUEST['prod_desc'];
if(empty($_REQUEST['cityname'])){
	$city=$_REQUEST['cityid'];
}else{
	$city=$_REQUEST['cityname'];
	
}
$updatearr=array(	
					 "title"=>htmlentities($_REQUEST['prodname']),	
					 "status"=>$_REQUEST['pstatus'],
					 "conperson"=>$_REQUEST['conperson'],
					 "phone"=>$_REQUEST['phone'],
					 "rate"=>$_REQUEST['rate'],	
					"stateid"=>$_REQUEST['statetitle'],					
					"cityid"=>$city,	
					 "date"=>date('Y-m-d')
					 );
		
				//print_r($updatearr);die;
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_HOTELLIST, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_HOTELLIST);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							
								redirect('main.php?mod=hotellist');
							
							
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_HOTELLIST WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['date'];
		 $e3=explode('-',$e);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
	}
?>


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
                        <td bgcolor="#FFFFFF" class="titlebar-bg">hotellist</td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF">&nbsp;</td>
                      </tr>
					   <tr>
                        <td bgcolor="#FFFFFF" align="center" style="color:#FF0000;"><?=$errMsg?></td>
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
                        <td bgcolor="#FFFFFF" class="tdpad-content">
						<form name="frmprod" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						<input type="hidden" name="image1" value="<?=$row['prod_small_image']?>" />
						<input type="hidden" name="image2" value="<?=$row['prod_medium_image']?>" />
						<input type="hidden" name="image3" value="<?=$row['imageid']?>" />
                      
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="cityid" value="<?=$row['cityid']?>" />
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" bgcolor="#e4e4e4" class="category_text">Enter Details </td>
                          </tr>
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
                            <td width="30%" align="right" class="textfield_text">Hotel Name :</td>
                            <td width="70%">
                              <input name="prodname" type="text" class="textfield" value="<?=$row['title']?>"/>                            </td>
                          </tr>
						 		
                        <tr>
                            <td width="30%" align="right" class="textfield_text">contact person :</td>
                            <td width="70%">
                              <input name="conperson" type="text" class="textfield" value="<?=$row['conperson']?>"/>                            </td>
                          </tr>
                           <tr>
                            <td width="30%" align="right" class="textfield_text">Contact No :</td>
                            <td width="70%">
                              <input name="phone" type="text" class="textfield" value="<?=$row['phone']?>"/>                            </td>
                          </tr>
						  <tr>
                            <td width="30%" align="right" class="textfield_text">Hotel Rate:</td>
                            <td width="70%">
                             <textarea name="rate" cols="50" rows="5" class="textfield" ><?=$row['rate']?></textarea>
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
</script>    </td>
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