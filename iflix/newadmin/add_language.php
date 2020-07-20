<?php include("header.php"); 

$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();

$uploaddir3="../../img/language/";
$check_type="mp3|MP3";
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

 $prod_detail=$_REQUEST['prod_desc'];
$updatearr=array(	
					 "language_1"=>$_REQUEST['title'],					 
					 "audio_1"=>$largeimage,
					  "category"=>$_REQUEST['category'],
					 "language_2"=>$prod_detail,
					 "status"=>$_REQUEST['pstatus'],
					 "source"=>$_REQUEST['source'],
					 "target"=>$_REQUEST['target'],
					 "date"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					 $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, 'language', $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'language');
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
						
							
						}else{
							$errMsg1='<br><b>error!</b><br>';
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM language WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Language</a></li>

                          

                        </ul>

                    </div>

    <style>
	.form-group:last-child {
    margin-bottom: 15px !important;
}
	</style>                

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

<?php if(!empty($errMsg1)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Error!</strong> <?=$errMsg1?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>
                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-12">

            <!-- Tab panes -->
				<form name="frmprod"  method="post" action=""  enctype="multipart/form-data">
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <input type="hidden" name="image3" value="<?=$row['audio_1']?>" />
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

                                         
<div class="row">
													<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Langage Categoty<span class="required">*</span></label>
                                        <div class="col-md-12">
							<?php 
                             
							$sql="SELECT * FROM rooms_type";
							$db->query($sql)or die($db->error()); ?>

						<select id="category" name="category" class="form-control">
  <option value="">Select</option>
  <?php 
		$event=$row['category'];
		$sql="SELECT * FROM language_category";
		$db->query($sql)or die($db->error());
		while($row1=$db->fetchArray()){	?>
  <option value="<?=$row1['catname']?>" <?php if($row1['catname']==$event){ echo "selected";}?>><?=$row1['catname']?></option>
		<?php } ?>
 
  
</select>
                                        </div>
                                    </div>
                                                        
                                                  
													<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Source<span class="required">*</span></label>
                                        <div class="col-md-12">
							 <select id="source" name="source" class="form-control">
 
  
  <option value="en" <?php if($row['source']=='en'){ echo "selected";}?>>English</option>  
  <option value="Ibibio" <?php if($row['source']=='Ibibio'){ echo "selected";}?>>Ibibio</option>
  <option value="Anang" <?php if($row['source']=='Anang'){ echo "selected";}?>>Anang</option>
  <option value="Oron" <?php if($row['source']=='Oron'){ echo "selected";}?>>Oron</option>
   <option value="Yoruba" <?php if($row['source']=='Yoruba'){ echo "selected";}?>>Yoruba</option>
  
</select>
                                        </div>
                                    </div>
                                                        
                                                    </div>
													<div class="row" >
 <div class="form-group col-md-12" >
                                        <label class="col-md-12" for="name"> Target</label>
                                        <div class="col-md-12">
                                        <select id="target" name="target" class="form-control">
										
  
  <option value="Ibibio" <?php if($row['target']=='Ibibio'){ echo "selected";}?>>Ibibio</option>
  <option value="Anang" <?php if($row['target']=='Anang'){ echo "selected";}?>>Anang</option>
  <option value="Oron" <?php if($row['target']=='Oron'){ echo "selected";}?>>Oron</option>
    <option value="Yoruba" <?php if($row['target']=='Yoruba'){ echo "selected";}?>>Yoruba</option>
<option value="en" <?php if($row['target']=='en'){ echo "selected";}?>>English</option>  
</select>
                                        </div>
                                    </div>
          </div>                                       
<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Englist:</label>
                                        <div class="col-md-12">
                                        <input id="title" name="title" type="text" placeholder="Language_1" class="form-control" value="<?=$row['language_1']?>">
                                        </div>
                                    </div>
									
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Local  language:</label>
                                        <div class="col-md-12">
                                         <input id="prod_desc" name="prod_desc" type="text" placeholder="Language_2" class="form-control" value="<?=$row['language_2']?>">
                                        </div>
                                    </div>
										
									</div>
                                                  
									
							   	<div class="row" >
								<div class="form-group col-md-6">
								<label class="col-md-12 control-label"> Audio Of Ibibo</label>
								<div class="col-md-12">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(Audio)</span>  <?php if($row['audio_1']){?><a href="javascript:void(0)" onclick="javascript:window.open('../playmp3.php?img=<?=$row['audio_1']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">Audio</a><?php }?>
        									 
        									</div>
								</div>
								<div class="form-group col-md-6">
                									<label class="col-md-12 control-label"> Status</label>
                									<div class="col-md-12">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="yes"<?php if($row['status']=="yes"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="no"<?php if($row['status']=="no"){echo " checked";}?>/>Deactive
                    										</label>
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





<?php include("footer.php") ?>

	