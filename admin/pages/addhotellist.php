
<script>
function deladmin(id)
{ 
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act=del&id1="+id;
	}
}
</script>


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
  

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		

		<div class="row">

			<ol class="breadcrumb">

				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>

				<li class="active">Add/Edit Hotel</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>

			</ol>

		</div><!--/.row-->

	

        

        

		

		<div class="row">

			<div class="col-md-12">

				<div class="panel panel-default">

					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>

					<div class="panel-body">

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
						    <td> </td> <td>
						   <div  id="txtHint"></div> </td>
						    </tr>
                          <tr>
                            <td width="30%" align="right" class="form-control">Hotel Name :</td>
                            <td width="70%">
                              <input name="prodname" type="text" class="form-control" value="<?=$row['title']?>"/>                            </td>
                          </tr>
						 		
                        <tr>
                            <td width="30%" align="right" class="form-control">contact person :</td>
                            <td width="70%">
                              <input name="conperson" type="text" class="form-control" value="<?=$row['conperson']?>"/>                            </td>
                          </tr>
                           <tr>
                            <td width="30%" align="right" class="form-control">Contact No :</td>
                            <td width="70%">
                              <input name="phone" type="text" class="form-control" value="<?=$row['phone']?>"/>                            </td>
                          </tr>
						  <!--<tr>
                            <td width="30%" align="right" class="form-control">Hotel Rate:</td>
                            <td width="70%">
                             <textarea name="rate" cols="50" rows="5" class="form-control" ><?=$row['rate']?></textarea>
                             <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
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
                          </tr>	-->
 <tr><td colspan="2">
<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Price Days Wise:</label>
                                        <div class="col-md-9">
                                        Sunday:<input name="Sunday" type="text" class="form-control" value="<?=$row['Sunday']?>"/>

 Monday:<input name="Monday" type="text" class="form-control" value="<?=$row['Monday']?>"/>  

 Tuesday:<input name="Tuesday" type="text" class="form-control" value="<?=$row['Tuesday']?>"/>  
 Wednesday:<input name="wednesday" type="text" class="form-control" value="<?=$row['wednesday']?>"/>   
     

 Thursday:<input name="Thursday" type="text" class="form-control" value="<?=$row['Thursday']?>"/>  

 Friday:<input name="Friday" type="text" class="form-control" value="<?=$row['Friday']?>"/>  

 Saturday:<input name="Saturday" type="text" class="form-control" value="<?=$row['Saturday']?>"/>  

                                   </div>
                                    </div></td>
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
						

                    

                    <!--/.row-->	

				</div>

				

				 

				

			</div><!--/.col-->

			 

		</div><!--/.row-->

	</div>
	
	
	
