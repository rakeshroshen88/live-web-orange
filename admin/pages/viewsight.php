<?php
 $mod=$_REQUEST['mod'];
$firstname=$_REQUEST['firstname'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
$qryStr="mod=$mod&firstname=$firstname";
if($act=='dac')
	{
		if($stat==0)
			$stat=1;
		else
			$stat=0;
		$sql="UPDATE $_TBL_SIGHT SET status='$stat' WHERE id='$id'";
		$db->query($sql);
		redirect('main.php?mod=sight');
	}

if($act=='del')
	{
		
		$sql="DELETE FROM $_TBL_SIGHT WHERE id='$id'";
		$db->query($sql);
		redirect('main.php?mod=sight');
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act=del&id="+id;
	}
}
</script>
<table width="100%">
  <tr>
    <td class="container-bg" width="100%"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="body-bg" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           
            <td width="100%"><table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td height="300" valign="top" class="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					
                  <tr>
                    <td bgcolor="#E6E6E6" class="tdpad"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#FFFFFF" class="titlebar-bg">Home Page sight Management</td>
                      </tr>
					  <tr>
					<td align="center" style="border:solid #666666 1px;;">
					<form name="frmsearch" method="post" action="">
					<table align="center" border="0" width="100%" cellpadding="5" cellspacing="5">
					<tr>
					<td align="right">Enter Title:</td>
					<td align="left"><input type="text" name="firstname"></td>
					</tr>
					<tr><td colspan="2" align="center"><input type="submit" value="Search" name="search"></td></tr>
					
					</table>
					</form>
					</td>
					</tr>
                      <tr>
                        <td height="40" bgcolor="#FFFFFF" align="center" valign="middle">
						
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" height="6"></td>
                            </tr>
                          <tr>
                            <td width="50%">
							<div class="add_btn">
						<a href="main.php?mod=add_sight&act=add">
						Add sight Image</a></div></td>
                            <td align="right" class="dropdown_gap">Show:
                              <select id="showrecord" name="showrecord" style="width:100px;" onchange="javascript:document.location.href='main.php?<?=$qryStr?>&rec='+document.getElementById('showrecord').value">
						<option value="10" <?php if($rec==10){echo " selected";}?>>10</option>
						<option value="20" <?php if($rec==20){echo " selected";}?>>20</option>
						<option value="50" <?php if($rec==50){echo " selected";}?>>50</option>
						<option value="100" <?php if($rec==100){echo " selected";}?>>100</option>
						<option value="200" <?php if($rec==200){echo " selected";}?>>200</option>
						</select></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF" class="tdpad-content"><table cellspacing="1" cellpadding="2" width="100%" border="0">
                          <tr>			
                            <td width="11%" align="center" valign="bottom" bgcolor="#E4E4E4" class="category_text">Title</td>
                            <td width="11%" align="center" valign="bottom" bgcolor="#E4E4E4" class="category_text">Date</td>							
							<td width="11%" align="center" valign="bottom" bgcolor="#E4E4E4" class="category_text">Status</td>
							<td width="11%" align="center" valign="bottom" bgcolor="#E4E4E4" class="category_text">Action</td>
                          </tr>
<?php
$db1=new DB();
	$wherestr=" ";
	
	//if(!empty($wherestr)){$wherestr.=" and catname='Story'";}else{$wherestr=" where catname='Story'";}
	if(!empty($_REQUEST['firstname']) and isset($_REQUEST['firstname']))
		{
		$wherestr=" where title like '%$firstname%'";
		}
		if(empty($rec))
			{
			$_LIST_LEN=10;
			}else{
			$_LIST_LEN=$rec;
			}
	$sql="SELECT * from ".$_TBL_SIGHT.$wherestr.$order_field;
	$db->query($sql);
	$total_records=$db->numRows();
	$page=new Page;
	$page->show_disabled_links=true;
	$page->set_page_data($_PAGE,$total_records,$_LIST_LEN,10,true,true,true);
	$page->set_qry_string($qryStr);
	$db->query($page->get_limit_query($sql));
	
	if($db->numRows()>0)
		{
	while($row=$db->fetchArray()){
		
$date=explode('-',$row['date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
	if(empty($num))
		{
		$num=0;
		}
		
?>						  
						  <tr>
						  
                            <td valign="top" align="left"><a href="main.php?mod=add_sight&act=edit&id=<?=$row['id']?>"><?=$row['title']?></a></td>
							<td valign="top" align="center"><?php echo date('d M,Y',$st);?></td>							
                           <td valign="top" align="center"><a href="main.php?mod=sight&act=dac&id=<?=$row['id']?>&stat=<?=$row['status']?>"><?=$row['status']==0?'Deactive':'Active'?></a> </td>
                            <td align="center" valign="top"><a href="main.php?mod=add_sight&act=edit&id=<?=$row['id']?>"><img height="16" alt="Edit USER" src="images/edit.png" width="16" border="0" /> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'><img height="16" alt="Delete Sight" src="images/delete.png" width="16" border="0" /></a>
							</td>
                          </tr>
<?php } ?>
<tr><td colspan="5" align="center" height="30" valign="bottom"><?php $page->get_page_nav()?></td></tr>
<?php	}else{
	
?>  
						<tr><td colspan="4" valign="top" align="center">Not found any record !</td></tr>                      
 <?php   } ?>                         
 
                       </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 </table>