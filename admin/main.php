<?php include("header.php")?>
<?php
if(empty($_SESSION['SES_ADMIN_ID'])){
		redirect("index.php");
		}
?>
			<?php include("left-menu.php")?>
	
			<?php
			$module='';
			if(!empty($_REQUEST['mod'])){
			$module=$_REQUEST['mod'];}
			if($module=="view"){
				
			include_once("pages/viewuser.php");
			
			}elseif($module=="adduser"){
				
			include_once("pages/adduser.php");
			}elseif($module=="uploadvideo"){
				
			include_once("pages/uploadvideo.php");
			}elseif($module=="addemoji"){
				
			include_once("pages/addemoji.php");
			}elseif($module=="setting"){
				
			include_once("pages/setting.php");
			}elseif($module=="subadmin"){
				
			include_once("pages/user.php");	
			}elseif($module=="add_support"){
				
			include_once("pages/add_support.php");
			}elseif($module=="subcat"){	
			include_once("pages/subcategory.php");	
			}elseif($module=="add_subcat"){	
			include_once("pages/add_edit_subcat.php");
			}elseif($module=="fsubcat"){	
			include_once("pages/fsubcategory.php");	
			}elseif($module=="support"){	
			include_once("pages/support.php");	
			}elseif($module=="add_fsubcat"){	
			include_once("pages/add_edit_fsubcat.php");
			
			}elseif($module=="subsubcat"){		
			include_once("pages/subsubcategory.php");
			}elseif($module=="4thsubcat"){		
			include_once("pages/4thsubcat.php");
			
			}elseif($module=="neworder"){		
			include_once("pages/neworder.php");
			}elseif($module=="feedback"){		
			include_once("pages/feedback.php");
			}elseif($module=="add_subsubcat"){	
			include_once("pages/add_edit_subsubcat.php");
			}elseif($module=="add_4thsubcat"){	
			include_once("pages/add_4thsubcat.php");
			}elseif($module=="viewproduct"){		
			include_once("pages/viewproduct.php");	
			}elseif($module=="addproduct"){					
			include_once("pages/addproduct.php");		
			}elseif($module=="order"){				
			include_once("pages/order.php");						
			}elseif($module=="order_detail"){		
			include_once("pages/order_detail.php");
			}elseif($module=="add_subadmin"){
				
			include_once("pages/add_edit_user.php");
			}elseif($module=="adddistination"){
				
			include_once("pages/adddistination.php");
			}elseif($module=="distination"){
				
			include_once("pages/distination.php");
			}elseif($module=="addservice"){
				
			include_once("pages/addservice.php");
			
			}elseif($module=="viewservice"){
				
			include_once("pages/viewservice.php");
            
            }elseif($module=="sliderr"){
				
			include_once("pages/viewsliders.php");
			
			}elseif($module=="add_sliderr"){
				
			include_once("pages/add_edit_sliders.php");
			}elseif($module=="article"){
				
			include_once("pages/viewarticle.php");
			}elseif($module=="upload"){
				
			include_once("pages/upload.php");
			
			}elseif($module=="addarticle"){
				
			include_once("pages/addarticle.php");
			}elseif($module=="inventory"){
				
			include_once("pages/inventory.php");
			
			}elseif($module=="addinventory"){
				
			include_once("pages/addinventory.php");
			 }elseif($module=="viewcatlog"){
				
			include_once("pages/viewcatlog.php");
			
			}elseif($module=="addcatlog"){
				
			include_once("pages/addcatlog.php");	
			}elseif($module=="cat"){				
			include_once("pages/category.php");		
			}elseif($module=="add_cat"){		
			include_once("pages/add_edit_category.php");
}elseif($module=="fcat"){				
			include_once("pages/fcategory.php");		
			}elseif($module=="add_fcat"){		
			include_once("pages/add_edit_fcategory.php");
			
			
			}elseif($module=="cat1"){					
			include_once("pages/category1.php");		
			}elseif($module=="add_cat1"){							
			include_once("pages/add_edit_category1.php");
			////////////////////////////////////////////
			}elseif($module=="viewlangcat"){					
			include_once("pages/viewcat.php");		
			}elseif($module=="addlancat"){							
			include_once("pages/add_lang_cat.php");	
			///////////////////////////////////////////
			
			}elseif($module=="intrest"){						
			include_once("pages/intrest.php");		
			}elseif($module=="add_intrest"){					
			include_once("pages/add_edit_intrest.php");			
			}elseif($module=="hospitality"){					
			include_once("pages/hospitality.php");			
			}elseif($module=="add_hospitality"){			
			include_once("pages/add_edit_hospitality.php");
			}elseif($module=="classified"){
				
			include_once("pages/classified.php");
			
			}elseif($module=="addclassified"){
				
			include_once("pages/addclassified.php");
			}elseif($module=="facility"){
				
			include_once("pages/viewfas.php");
			}elseif($module=="sight"){
				
			include_once("pages/viewsight.php");
			
			}elseif($module=="add_sight"){
				
			include_once("pages/add_edit_sight.php");
			
			}elseif($module=="add_fas"){
				
			include_once("pages/addfas.php");
			}elseif($module=="weekend"){
				
			include_once("pages/viewweekend.php");
			}elseif($module=="addweekend"){
				
			include_once("pages/addweekend.php");
			
			}elseif($module=="assosiate"){
				
			include_once("pages/assosiate.php");
			}elseif($module=="theme"){
				
			include_once("pages/theme.php");
			}elseif($module=="addtheme"){
				
			include_once("pages/addtheme.php");
			
			}elseif($module=="flight"){
				
			include_once("pages/viewflight.php");
			}elseif($module=="bus"){
				
			include_once("pages/viewbus.php");
			}elseif($module=="train"){
				
			include_once("pages/lviewluxary.php");
			}elseif($module=="viewcity"){
				
			include_once("pages/viewcity.php");
			}elseif($module=="addcity"){
				
			include_once("pages/addcity.php");
			}elseif($module=="guide"){
				
			include_once("pages/viewguide.php");
			}elseif($module=="addguide"){
				
			include_once("pages/addguide.php");
			}elseif($module=="viewstate"){
				
			include_once("pages/viewstate.php");
			}elseif($module=="addstate"){
				
			include_once("pages/addstate.php");
			}elseif($module=="viewtest"){
				
			include_once("pages/viewtest.php");
			}elseif($module=="addtest"){
				
			include_once("pages/addtest.php");
			}elseif($module=="package"){
				
			include_once("pages/viewpac.php");
			}elseif($module=="job"){
				
			include_once("pages/viewjob.php");
			}elseif($module=="addjob"){
				
			include_once("pages/addjob.php");
			}elseif($module=="addhotel"){
				
			include_once("pages/hotel.php");
			}elseif($module=="hotel"){
				
			include_once("pages/viewhotel.php");
			}elseif($module=="hotellist"){
				
			include_once("pages/hotellist.php");
			
			}elseif($module=="addhotellist"){
				
			include_once("pages/addhotellist.php");
			}elseif($module=="addtrain"){
				
			include_once("pages/train.php");
			}elseif($module=="addnews"){
				
			include_once("pages/addnews.php");
			}elseif($module=="viewnews"){
				
			include_once("pages/viewnews.php");
			}elseif($module=="usubtrain"){
				
			include_once("pages/viewsubdetail.php");
			}elseif($module=="amenities"){
				
			include_once("pages/viewbus.php");
			}elseif($module=="add_amenities"){
				
			include_once("pages/addsub.php");
			}elseif($module=="add_unsub"){
				
			include_once("pages/addsubdetail.php");
			}elseif($module=="maint"){
				
			include_once("pages/maint.php");
			}elseif($module=="sub"){
				
			include_once("pages/subtrain.php");
			}elseif($module=="home"){
				
			include_once("pages/home.php");
			}elseif($module=="inq"){
				
			include_once("pages/viewinq.php");
			}elseif($module=="add_event"){
				
			include_once("pages/add_edit_event.php");
			
			}elseif($module=="viewevent"){
				
			include_once("pages/viewevent.php");
			}elseif($module=="addevent"){

				

			include_once("pages/addevent.php");

			

			}elseif($module=="viewevent"){

				

			include_once("pages/viewevent.php");
			}elseif($module=="add_inq"){
				
			include_once("pages/inq.php");
			}elseif($module=="employee"){
				
			include_once("pages/employee.php");
			}elseif($module=="addemployee"){
				
			include_once("pages/add_employee.php");
			}elseif($module=="viewdestype"){
				
			include_once("pages/viewdestype.php");
			}elseif($module=="adddtype"){
				
			include_once("pages/adddestinationtype.php");			
			}elseif($module=="about"){
				
			include_once("pages/about.php");
			
			
			}else{
			?>
			<div align="center" style="padding:30px;">Welcome In Admin Area.</div>
			<?php } ?>
			
		
  <?php include("footer.php")?>
</body>
</html>
