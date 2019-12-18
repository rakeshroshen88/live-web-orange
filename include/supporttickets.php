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
                                            <img src="images/resources/user.png" id="rmvid" alt="" height="120" width="120">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['image_id']?>" id="rmvid" alt="" height="200" width="120">
                                                <?php }?>
												<!-- <input type="file" id="file1">-->
												
                                                    <div class="add-dp" id="OpenImgUpload">
                                                        <input type="file" id="file1">
                                                        <label for="file1"><i class="fas fa-camera"></i></label>
                                                    </div>
                                    </div>
                                   
                                    <ul class="social_links">
                                        <li><a href="#" title=""><span>Open</span></a></li>
                                        <li><a href="#" title=""><span>Answered</span></a></li>
                                        <li><a href="#" title=""><span>Customer-Reply</span></a></li>
										<li><a href="#" title=""><span>Closed</span></a></li>
										 
                                 
                                    </ul>
                                </div>
                                <!--user_profile end-->
                               
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                       
						<div class="col-lg-9">
                            <div class="main-ws-sec">
							<!-- MDBootstrap Datatables  -->
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                              <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Email
      </th>
      <th class="th-sm">Status
      </th>
      <th class="th-sm">Close
      </th>
      <th class="th-sm">Department
      </th>
      <th class="th-sm">Date
      </th>
    </tr>
  </thead>
  <tbody>
   <?php 
	$sql="SELECT * from support_system order by id desc";
	$db->query($sql);
	if($db->numRows()>0)
	{
	while($row=$db->fetchArray()){
	
	$date=explode('-',$row['sdate']);
	$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	?>
    <tr>
      <td><?=$row['name']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['status']==0?'Deactive':'Active'?></td>
      <td><?=$row['close']==0?'Close':'Open'?></td>
      <td><?=$row['department']?></td>
      <td><?php echo date('d M,Y',$st);?></td>
    </tr>
  
		<?php } } ?>

  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot>
</table>

<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
              
                        </div>
                        <!--main-ws-sec end-->
                    </div>

                </div>
            </div>
            <!-- main-section-data end-->
        </div>
        </div>
    </main>
	

    <?php include('footer.php') ?>