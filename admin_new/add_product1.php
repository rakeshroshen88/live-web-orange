<?php include("header.php");$_TBL_PROD1="product";$makearr1=array();$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );$makearr3=array();$makearr3=getValuesArr( $_TBL_SUBSUBCAT, "id","subsubcatname","", "" );$makearr2=array();$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );?>

<div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Components</a></li>
                            <li class="active">Tables</li>
                        </ul>
                    </div>
                    
                    <!-- START PAGE CONTAINER -->
    <div class="page_container">
                    <div class="container">
                                                   
                       <div class="row"> 
                        <div class="col-md-12">                                          
                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">
                                        <div class="alert-icon">
                                            <span class="icon-checkmark-circle"></span> 
                                        </div>
                                        <strong>Success!</strong> You successfully read this important alert message. 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                    </div>                                           
                                </div>

                       <div  class="col-sm-12 verticle_tabs"> 
        <div class="col-xs-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <h3> Product Information</h3>
            <ul class="nav nav-tabs tabs-left">
                <li class="active error"><a href="#home" data-toggle="tab">Genral 
                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                </a></li>
                <li><a href="#Categories" data-toggle="tab">Categories</a></li>
                <li><a href="#Prices" data-toggle="tab">Prices</a></li>
                <li><a href="#Images" data-toggle="tab">Images</a></li> 
                <li><a href="#Policies" data-toggle="tab">Policies & Shipping</a></li>      
            </ul>
        </div>
        <div class="col-xs-10">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Basic Information</h2>
                                            <p>Basic Information of the Product</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">
                                         
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Name <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control bs-datepicker" > 
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Description <span class="required">*</span></label>
                                                        <div class="col-md-10"> 
                                                            <textarea class="editor-base" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Short Description<span class="required">*</span></label>
                                                        <div class="col-md-10"> 
                                                            <textarea class="editor-base" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">SKU<span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control bs-datepicker" > 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Weight <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control bs-datepicker" > 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Color </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>Red</option>
                                                                <option>Orange</option>
                                                                <option>Pink</option>
                                                                <option>Blue</option>
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Manufacturer </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>Red</option>
                                                                <option>Orange</option>
                                                                <option>Pink</option>
                                                                <option>Blue</option>
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Status </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>Active</option>
                                                                <option>In-Active</option>
                                                                
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Country of Manufacture </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>Active</option>
                                                                <option>In-Active</option>
                                                                
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label"> Stars </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>1</option>
                                                                <option>2</option> 
                                                                <option>3</option> 
                                                                <option>4</option> 
                                                                <option>5</option> 
                                                                
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>


                                                <p></p>





                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
                <div class="tab-pane" id="Categories">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Categories</h2>
                                            <p>Select Categories of the Product</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">		  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
                                              <div class="form-group"> <script>                function showcategory(str) {					alert(str);                    if (str == "0") {                        document.getElementById("subcatid").innerHTML = "";                        return;                    } else {                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari                            xmlhttp = new XMLHttpRequest();                        } else { // code for IE6, IE5                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");                        }                        xmlhttp.onreadystatechange = function() {                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                                document.getElementById("subcatid").innerHTML = xmlhttp.responseText;                            }                        }                        xmlhttp.open("GET", "pages/ajax_subcat.php?subcatid=" + str, true);                        xmlhttp.send();                    }                }												 function show3rd(str) {										var cid1 = jQuery(this).attr('cid');											var cid = jQuery('#category').val();						                    if (str == "0") {                        document.getElementById("subsubcatid").innerHTML = "";                        return;                    } else {                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari                            xmlhttp = new XMLHttpRequest();                        } else { // code for IE6, IE5                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");                        }                        xmlhttp.onreadystatechange = function() {                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                                document.getElementById("subsubcatid").innerHTML = xmlhttp.responseText;                            }                        }                        xmlhttp.open("GET", "pages/ajax_2nd.php?subcatid=" + str + '&cid=' + cid, true);                        xmlhttp.send();                    }                }												function show4th(str) {										var cid1 = jQuery(this).attr('cid');											var cid = jQuery('#category').val();					var sid = jQuery('#subcategory').val();						var tid = jQuery('#subsubcategory').val();											                    if (str == "0") {                        document.getElementById("4thsubcatid").innerHTML = "";                        return;                    } else {                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari                            xmlhttp = new XMLHttpRequest();                        } else { // code for IE6, IE5                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");                        }                        xmlhttp.onreadystatechange = function() {                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                                document.getElementById("4thsubcatid").innerHTML = xmlhttp.responseText;                            }                        }                        xmlhttp.open("GET", "pages/ajax_4thcat.php?4thcatid=" + str + '&cid=' + cid + '&subcatid=' + sid, true);                        xmlhttp.send();                    }                }            </script>
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Main Category <span class="required">*</span></label>
                                                        <div class="col-md-10">														<?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" onchange="return showcategory(this.value);" '); ?>
                                                               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Sub Category <span class="required">*</span></label>
                                                        <div class="col-md-10">														<?php if($act=="edit"){ ?>																	<?php $subid=$row['catid'];							 $sql="SELECT * FROM $_TBL_SUBCAT WHERE catid=$subid";							$db->query($sql)or die($db->error());							 if($db->numRows()>0){															 ?>							 									 <select  name="subcategory" id="subcategory" cid="<?=$subid?>" class="form-control" onchange="return show3rd(this.value);" >													<option value="0">Select subcateory</option><?php									while($row1=$db->fetchArray()){									if($row1['id']==$row['subcatid']){ $select1='selected';}								?>		                        <option value="<?=$row1['id']?>" <?=$select1?>><?=$row1['subcatname']?></option>						  <?php }?>						   </select>												 <?php } ?>                                    									<?php } ?>																		<div id="subcatid">                                      </div>
                                                           <!-- <select class="form-control">
                                                                <option>Red</option>
                                                                <option>Orange</option>
                                                                <option>Pink</option>
                                                                <option>Blue</option>
                                                            </select>-->
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Ternary Category <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>Red</option>
                                                                <option>Orange</option>
                                                                <option>Pink</option>
                                                                <option>Blue</option>
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Product Type <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>New </option>
                                                                <option>Old</option>
                                                                <option>Like New</option>
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Populer </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>No</option>
                                                                <option>Yes</option> 
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Featured </label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>No</option>
                                                                <option>Yes</option> 
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>

                                                <p></p>




                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
                <div class="tab-pane" id="Prices">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Prices</h2>
                                            <p>Prices of the Product</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">

                                        <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Maximum Retail Price <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control bs-datepicker" > 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Selling Price <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control bs-datepicker" > 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Shipping Charge <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control " > 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Material <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control " > 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Total Quantity <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control " > 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Quantity <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control " > 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Quantity <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                                <input type="text" class="form-control " > 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label"> Tax Class <span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <select class="form-control">
                                                                <option>Red</option>
                                                                <option>Orange</option>
                                                                <option>Pink</option>
                                                                <option>Blue</option>
                                                            </select>
                                                               
                                                        </div>
                                                    </div>
                                                </div>



                                                <p></p>




                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
                <div class="tab-pane" id="Images">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Images</h2>
                                            <p>Images of the Product</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">
                                        <div class="uploadimg1">
                                            <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.N.</th> 
                                                    <th>Image</th>
                                                    <th>Upload</th>
                                                    <th>Main Image</th>
                                                    <th>Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td> 
                                                    <td>
                                                        <div class="thmis">
                                                        <img src="https://orangestate.ng/upload/1585825824738.jpg" width="50">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="file" name="">
                                                    </td>

                                                    <td><input type="radio" id="male" name="gender" value="male"></td>
                                                    <td>
                                                        <button class="btn btn-default btn-icon"><span class="fa fa-times"></span></button>
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td>2</td> 
                                                    <td>
                                                        <div class="thmis">
                                                        <img src="https://orangestate.ng/upload/1585825824738.jpg" width="50">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="file" name="">
                                                    </td>

                                                    <td><input type="radio" id="male" name="gender" value="male"></td>
                                                    <td>
                                                        <button class="btn btn-default btn-icon"><span class="fa fa-times"></span></button>
                                                    </td> 
                                                </tr>
                                                 

                                                 

                                            </tbody>
                                        </table>


                                        </div>
                                        
                                        <p></p>




                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>

                </div>

                <div class="tab-pane" id="Policies">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Policies & Shipping Information</h2>
                                            <p>Policies & Shipping Information of the Product</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">
                                         
                                                  
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Shipping <span class="required">*</span></label>
                                                        <div class="col-md-10"> 
                                                            <textarea class="editor-base" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Warranty<span class="required">*</span></label>
                                                        <div class="col-md-10"> 
                                                            <textarea class="editor-base" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Return Policy<span class="required">*</span></label>
                                                        <div class="col-md-10"> 
                                                            <textarea class="editor-base" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Manufacturer<span class="required">*</span></label>
                                                        <div class="col-md-10"> 
                                                            <textarea class="editor-base" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p></p>





                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
 
            </div>

             <div class="block ">                            
                             
                            <p class="text-right">
                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>
                                <button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>
                               
                            </p>
                             
                        </div>

        </div>

       

        <div class="clearfix"></div>
    </div>                 
</div>

                        
                    </div> <!-- END PAGE CONTAINER -->
    </div> <!-- END page_container -->
                    
<?php include("footer.php") ?>			
