<?php include("header.php");
$db1=new DB();
$prodid=$_REQUEST['id'];
 $act=$_REQUEST['act'];
	
	if($act=='del')
	{
		
		$sql="DELETE FROM directory_service WHERE id='$prodid'";
		$db->query($sql);
		$err='Deleted Successfull';
	}
	$up=new UPLOAD();
$uploaddir3="../../upload/";
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
	
if($_POST['Submit']=="Save")
{
$updatearr11=array(
					"title"=>$_POST['title'],
					"imgid"=>$largeimage					
					);
if($act=='add'){
$insidq=insertData($updatearr11, 'directory_service');
if($insidq>0){ $err='Added Successfull'; }else{ $err='There is some issue ';
	
}
}elseif($act=='edit'){
$sql="UPDATE directory_service SET title= '".$_POST['title']."',imgid= '".$largeimage."' WHERE id='$prodid'";
$db->query($sql);
$err='Updated Successfull';
}
}
if(!empty($prodid))
	{
		$sql="SELECT * FROM directory_service WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row1=$db->fetchArray();			
		
	}
?>


    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

            <li><a href="#">Business Service</a></li>

            <li class="active">Manage Service</li>

        </ul>

    </div>



    <!-- START PAGE CONTAINER -->

    <div class="page_container">

        <div class="container">



            <div class="row">
				<?php if(!empty($err)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$err?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>

<?php if(!empty($err1)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Error!</strong> <?=$err1?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>
         
				
                  <div class="col-md-12">
				  
							
                      <div class="block block-condensed">

                            <!-- START HEADING -->

                            <div class="app-heading app-heading-small">

                                <div class="title">

                                    <h5>Manage Service</h5>

                                    <p>List of all Service</p>

                                </div>

							

                                <div class="heading-elements">

                                    <div class="btn-group">
									
									  <a class="btn btn-primary btn-icon-fixed dropdown-toggle" href="//orangestate.ng/admin/admin_new/viewcolor.php?act=add">Export</a>

                                        <button class="btn btn-primary btn-icon-fixed dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bars"></span> Export</button>

                                        <ul class="dropdown-menu dropdown-left">

                                             

                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"> XLS</a></li>

                                             

                                        </ul>

                                    </div> 

                                </div>





                            </div>

                            <!-- END HEADING -->



                            <div class="block-content">



                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

                                    <thead>

                                        <tr>

                                            <th>Sl no #</th>

                                            <th>Services Name</th>


                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									<?php 
												$ct=1;
												$sql="SELECT * FROM directory_service ";
												$db->query($sql)or die($db->error());
												while($row=$db->fetchArray()){
												if($ct%2==0){
													?>
                                       <tr role="row" class="odd">
                                            <td class="sorting_1"><?=$ct?>.</td>
                                            <td><?=$row['title']?></td>
                                           <td><a href="//orangestate.ng/admin/admin_new/add_services.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
						</a></td>
                                        </tr>
												<?php }else{ ?>
										<tr role="row" class="even">
                                            <td class="sorting_1"><?=$ct?>.</td>
                                            <td><?=$row['title']?></td>
                                            <td><a href="//orangestate.ng/admin/admin_new/add_services.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
						</a></td>
                                        </tr>
												<?php } $ct=$ct+1; } ?>
										



                                    </tbody>

                                </table>



                            </div>



                            </div>

                  <script>
function deladminnew(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="//orangestate.ng/admin/admin_new/add_services.php?act=del&id="+id;
	}
}




</script>  





                  </div>  

 

            </div>



        </div> 

      

			</div>
			
				<div class="col-md-12 verticle_tabs"> 

        <div class="block block-condensed">

            <!-- Tab panes -->
				<form name="frmprod" class="" method="post" action="" enctype="multipart/form-data">
								
						<input type="hidden" name="prodid" value="<?=$_REQUEST['id']?>">
						<input type="hidden" name="act" value="<?=$_REQUEST['act']?>">
						 <input type="hidden" name="image3" value="<?=$row1['imgid']?>" />
            

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                          

                                        </div>                                

                                    </div>

                                    <div class="block-content">

                                         

                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Add Services <span class="required">*</span></label>

                                                        <div class="col-md-10">

                       <input type="text" name="title" type="text" class="form-control" value="<?=$row1['title']?>" required / > 
<p></p>
                                                        </div>

                                                    </div>
													
													
								<div class="row">
								<div class="form-group">
        								<label class="col-md-2 control-label">  Image</label>
        						        <div class="col-md-10">
                                         <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row1['imgid']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewhubimage.php?img=<?=$row1['imgid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        							 </div>
        							</div>
								</div>  


                                                </div> 

                                    </div>
                                </div>

             <div class="block "> 
                            <p class="text-right">
<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Save">
                               

                            </p>

                             

                        </div>

			</form>

        </div>

        <div class="clearfix"></div>

    </div>


    <!-- END page_container -->



    <?php include("footer.php") ?>