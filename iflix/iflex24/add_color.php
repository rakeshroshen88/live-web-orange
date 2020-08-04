<?php include("header.php");
$db1=new DB();
$prodid=$_REQUEST['id'];
 $act=$_REQUEST['act'];
if(!empty($prodid))
	{
		$sql="SELECT * FROM allproductcolor WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}	
	
if($_POST['Submit']=="Save")
{
$updatearr11=array(
					"nameofcolor"=>$_POST['prodcolor']				
					);
$insidq=insertData($updatearr11, 'allproductcolor');	
$errMsg='Color Added!';
}

?>


<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Product</a></li>

                            <li class="active">Color</li>

                        </ul>

                    </div>

                    

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 
				<?php if(!empty($errMsg)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$errMsg?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>

                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-12">

            <!-- Tab panes -->
				<form name="frmprod" class="" method="post" action=""  enctype="multipart/form-data">
								
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
            <div class="tab-content">

                <div class="tab-pane active" id="home">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                          

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                         

                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Add Color <span class="required">*</span></label>

                                                        <div class="col-md-10">

                                                                <input type="text"name="prodcolor" type="text" class="form-control" value="<?=$row['nameofcolor']?>" required / > 
<p></p>
                                                        </div>

                                                    </div>

                                                </div> 







                                             












                                    </div>



                                </div>

                                <!-- END RECENT -->

<p></p>

                    </div>

                </div>
<p></p>
             

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>

                                <!--<button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>-->
<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Save"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>



                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> 
<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  

<?php include("footer.php") ?>

	