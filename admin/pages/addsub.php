<?php

//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

 $prod_detail=$_REQUEST['prod_desc'];

$updatearr=array(	
					 "title"=>$_REQUEST['prodname'],	
					 "status"=>$_REQUEST['pstatus'],
					 "date"=>date('Y-m-d')
					 );
		
				//print_r($updatearr);
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_AMENITIES, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_AMENITIES);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							
								redirect('main.php?mod=amenities');
							
							
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_AMENITIES WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['sdate'];
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
                        <td bgcolor="#FFFFFF" class="titlebar-bg">Amenities</td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF">&nbsp;</td>
                      </tr>
					   <tr>
                        <td bgcolor="#FFFFFF" align="center" style="color:#FF0000;"><?=$errMsg?></td>
                      </tr>
                      <script language="javascript">
 function validateround()
	{
		
		var a=document.getElementById('gallery').value;
		
		if(a=='flight' || a=='train' || a=='bus' || a=='package')
		{
			document.getElementById('round1').style.display = "none"
			//document.getElementById('round1').style.display = "block"
		}else if(a=='hotal'){
			
			document.getElementById('round1').style.display = '';
			
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
                            <td width="30%" align="right" class="textfield_text">Title :</td>
                            <td width="70%">
                              <input name="prodname" type="text" class="textfield" value="<?=$row['title']?>"/>                            </td>
                          </tr>
						 		
                       
                          
                          <tr>
                            <td>&nbsp;</td>
							<td align="left">
							<input name="pstatus" type="radio" value="1" <?php if($row['status']=="1"){echo " checked";}?>/>Active
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