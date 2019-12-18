<?php include('header.php'); 
include('chksession.php');
						$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
						?>

    <section class="cover-sec">
	<div class="cover-sec1">
	<?php if(!empty($profilerow['cover_image_id'])){ ?>
	<img src="upload/<?=$profilerow['cover_image_id']?>" alt="" id="coverid" style="width:1920px; height:500px">
	<?php }else{ ?>
        <img src="images/resources/company-cover.jpg" alt="" id="coverid">
	<?php } ?>
	</div>
		<label class="btn btn-primary" style="position:absolute; right:10%; bottom:10%;">
			<input type="file" style="display:none;" id="file2" name="file2"/>
			Browse
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
                                        
                                    </ul>
									<?php } ?>


							   </div>
                                <!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Following </h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <!--sd-title end-->
                                    <div class="suggestions-list">
									  <?php 
										$dbuf=new DB();
										$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);
										?>
                                        <div class="suggestion-usd">
                                            <?php if(!empty($userfpath)){?>
                                          <img src="upload/<?=$userfpath?>" alt="" height="40" width="40">
                                            <?php }else{ ?>
                                            <img src="images/resources/user.png" alt=""  height="40" width="40">
                                             <?php }?>
                                            <div class="sgt-text">
                                               <h4><?=$usernamef?></h4>
                                                <span><?=$woorking?></span>
                                            </div>
                                            <!--<span><i class="la la-plus follownew" id="follownew<?=$frow['f_id']?>" fid="<?=$frow['follow']?>"></i></span>-->
                                        </div>
										<?php }} ?>
                                      
									  <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div>
                                    <!--suggestions-list end-->
                                </div>
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
                            <div class="main-ws-sec profile-lisgn">
							<table id="example" class="display" cellspacing="0" width="100%">
							
						<!--<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">-->

						    <thead>

                            

						    <tr>

						       
<th data-field="Orderid" data-sortable="true">Orderid </th>

						        <th data-field="amount" data-sortable="true">Amount </th>

						       

						        <th data-field="Date" data-sortable="true">Order Date</th>

  
                                <th data-field="Status" data-sortable="true">Status</th>

                                <th data-field="Action" data-sortable="true">Action</th>

						    </tr>

						    </thead>

                            
<?php
$db1=new DB();
$wherestr=" ";
	
	//if(!empty($wherestr)){$wherestr.=" and catname='Story'";}else{$wherestr=" where catname='Story'";}
	if(!empty($_REQUEST['innumber']) or isset($_REQUEST['innumber']))
		{
		$wherestr=" where orderid like '%$innumber%'";
		}
		if(empty($rec))
			{
			$_LIST_LEN=10;
			}else{
			$_LIST_LEN=$rec;
			}
if($order_field=="")
	{
	$order_field=" order by id desc";
	}
	$sql="SELECT * from ".$_TBL_ORDER.$wherestr.$order_field;
	$db->query($sql);
	$total_records=$db->numRows();
	$page=new Page;
	$page->show_disabled_links=true;
	$page->set_page_data($_PAGE,$total_records,$_LIST_LEN,50,true,true,true);
	$page->set_qry_string($qryStr);
	$db->query($page->get_limit_query($sql));
	
	if($db->numRows()>0)
		{
	while($row=$db->fetchArray()){
	$num=$db1->getSingleResult('select count(*) from '.$_TBL_ORDER." where id=".$row['id']);
	 $name=$db1->getSingleResult('select first_name from all_user where user_id='.$row['userid']);
	
$arr1=@explode(' ',$row['buydate']);
		$edate=@explode('-',$arr1[0]);
		$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);
		if($row['order_status']=="0")
	{
	$sta="Pending";
	}elseif($row['order_status']=="1"){
		$sta="Cancelled";
	}elseif($row['order_status']=="2"){
		$sta="Confirmed";
	}
		
		?>		
 					<tr>

						

                         <td><a href="order-details.php?id=<?=$row[orderid]?>"><?=$row['orderid']?></a></td>
<td align='center'>₦ <?=$row[totalprice]?></td>
                           
							<td ><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></td>
							
							
                           <td>
					   <?php echo $sta;?>
							  </td>
                            <td><a href=''><i class="fas fa-eye"></i></a></td>

                     </tr>

<?php } ?>

<?php	}else{

	

?>  

						<tr><td colspan="4" valign="top" align="center">Not found any order !</td></tr>                      

 <?php   } ?>   					  

	

						</table>
		

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
                               
                    </div>

                </div>
            </div>
            <!-- main-section-data end-->
        </div>
        </div>
    </main>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css
  ">	


    <?php include('footer.php') ?>
	<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js
  "></script>