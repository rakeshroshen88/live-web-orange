<?php include("header.php");
$db1=new DB();
$prodid=$_REQUEST['id'];
 $act=$_REQUEST['act'];
	
	if($act=='del')
	{
		
		$sql="DELETE FROM allproductcolor WHERE id='$prodid'";
		$db->query($sql);
		
	}
	
	
if($_POST['Submit']=="Save")
{
$updatearr11=array(
					"nameofcolor"=>$_POST['prodcolor']				
					);
if($act=='add'){
$insidq=insertData($updatearr11, 'allproductcolor');
}elseif($act=='edit'){
$sql="UPDATE allproductcolor SET nameofcolor= '".$_POST['prodcolor']."' WHERE id='$prodid'";
$db->query($sql);
}
}
if(!empty($prodid))
	{
		$sql="SELECT * FROM allproductcolor WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row1=$db->fetchArray();			
		
	}
?>


    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

            <li><a href="#">Products Colors</a></li>

            <li class="active">Manage Colors</li>

        </ul>

    </div>



    <!-- START PAGE CONTAINER -->

    <div class="page_container">

        <div class="container">



            <div class="row">
			
				
                  <div class="col-md-12">
				  
							
                      <div class="block block-condensed">

                            <!-- START HEADING -->

                            <div class="app-heading app-heading-small">

                                <div class="title">

                                    <h5>Manage Color</h5>

                                    <p>List of all Color</p>

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

                                            <th>Bill to Name</th>


                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									<?php 
												$ct=1;
												$sql="SELECT * FROM allproductcolor ";
												$db->query($sql)or die($db->error());
												while($row=$db->fetchArray()){
												if($ct%2==0){
													?>
                                       <tr role="row" class="odd">
                                            <td class="sorting_1"><?=$ct?>.</td>
                                            <td><?=$row['nameofcolor']?></td>
                                           <td><a href="//orangestate.ng/admin/admin_new/viewcolor.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
						</a></td>
                                        </tr>
												<?php }else{ ?>
										<tr role="row" class="even">
                                            <td class="sorting_1"><?=$ct?>.</td>
                                            <td><?=$row['nameofcolor']?></td>
                                            <td><a href="//orangestate.ng/admin/admin_new/viewcolor.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
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
		location.href="//orangestate.ng/admin/admin_new/viewcolor.php?act=del&id="+id;
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

                                                        <label class="col-md-2 control-label">Add Color <span class="required">*</span></label>

                                                        <div class="col-md-10">

                       <input type="text"name="prodcolor" type="text" class="form-control" value="<?=$row1['nameofcolor']?>" required / > 
<p></p>
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