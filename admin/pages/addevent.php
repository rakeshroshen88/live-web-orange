<?php 
 $prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../upload/thumb/";
$uploaddir2="../upload/medium/";
$uploaddir3="../upload/";
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
	
	

 $prod_detail=$_REQUEST['prod_desc'];
 $e1=$_REQUEST['edate'];
 $e2=explode('/',$e1);
 $edate1=$e2[2].$e2[0].$e2[1];
$updatearr=array(	
					 "etitle"=>$_REQUEST['title'],					 
					 "eimageid"=>$largeimage,
					 "eimageid1"=>$largeimage1,
					 "edetail"=>$prod_detail,
					 "estatus"=>$_REQUEST['pstatus'],
					 "eplace"=>$_REQUEST['place'],
					 "edate"=>$_REQUEST['edate']
					 );

				//print_r($updatearr);
			if($act=="edit")
				{
					 $whereClause=" eid=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_EVENT, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_EVENT);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							//redirect('main.php?mod=viewevent');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_EVENT WHERE eid=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['edate'];
		 $e3=explode('-',$e);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Event</li><?=$errMsg?>
			</ol>
		</div><!--/.row-->
	
        
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					<div class="add-frim2">
                     
                       <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="image3" value="<?=$row['eimageid']?>" />
						<input type="hidden" name="prodid" value="<?=$row['eid']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <div class="table-responsive">
                                  <table class="table">
                                    
                                    <tbody>
                                        <tr>
                                        <td>Title :</td>
                                        <td colspan="3"><input type="text" class="form-control" name="title" value="<?=$row['etitle']?>"/></td>
                                        
                                      </tr>
                                     
                                     
                           
                               
                                <tr>
                                      
                                        <td> Posted Date  :</td>
                                        <td> <input type="date" class="form-control" name="edate" value="<?=$row['edate']?>"/> </td> 
										<td> </td>
                                        <td> </td>
                                        
                               </tr>
                               
                               
                                <tr>
                                        
                                        <td>  Detail :</td>
                                        <td colspan="3">
                                        <textarea class="form-control" name="prod_desc"><?=$row['edetail']?></textarea>
                                        
                                         <script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
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
</script>    
                                       <!-- <input type="text" class="form-control" name="detail" value="<?=$row['detail']?>"/>--></td>
                                  
                               </tr>
                                      
                                       <tr>
                                      <!--  <td> Event Image  :</td>
                                        <td> <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['eimageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewLimage.php?img=<?=$row['eimageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?> </td>
                                      -->  <td>  Status  :</td>
                                        <td> <input name="pstatus" type="radio" value="yes" <?php if($row['estatus']=="yes"){echo " checked";}?>/>Active
							<input name="pstatus" type="radio" value="no" <?php if($row['estatus']=="no"){echo " checked";}?>/>Deactive </td>
                                        
                               </tr>  
                                      <tr>
                                        <td colspan="4" class="text-center"> 
                                         <input name="Submit" type="submit" class="btn btn-primary" value="Save"  />
                                      
                                        
                                        </td>
                                         
                                        
                               </tr>
                               
                               
                                      
                                      
                                      
                                      
                               
                                       
                                    </tbody>
                                  </table>
                                  </div>
                            
                        <div class="clear"></div>       
                        
                        
                        
                        

                     </div>
                        
					</div>
                    
                    
                    
                    
                    <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>