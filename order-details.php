<?php include( 'header.php'); include( 'chksession.php'); ?>
 
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					 <div class="col-lg-12">

					 	<div class="breadcrumb flat">
				        	<a href="../" >Home</a>
				        	<a href="">Shop</a>
                  <a href="">Order Details</a>     
				        	

				        </div>
          
          <div class="row">
         
         <div   id="comp-order-ta " class="myoder" aria-labelledby="complete-order">
      <div class="card">
        <div class="card-header">
       
        </div>
      </div>
	  
	  <?php
include("chksession.php");
$db1=new DB();
@defined('IN_CALLER', 1);
$orderid=$_GET['id'];
$sql="select * from ".$_TBL_ORDER." where orderid='".$orderid."'";
$db->query($sql);
if($db->numRows()>0)
	{
	$grand_total=0;
	$row=$db->fetchArray();
	 $prodidarr=explode(',',$row['prodid']);
	 $prodarray=explode(',',$row['product_name']);
	 $qtyarr=explode(',',$row['quantity']);
	$pricearr=explode(',',$row['price']);	
	$subtotalarr=explode(',',$row['subtotal']);
	 $cn=count($prodarray)-1;

$sql="select * from billing_address where userid=".$row['userid'];
$db->query($sql);
$shiprow=$db->fetchArray();


// $bsql="select * from ".$_TBL_USER." join ON user_profile where user_id=".$row['userid'];
 $sql22="SELECT * FROM all_user JOIN user_profile ON all_user.user_id=user_profile.user_id where all_user.user_id=".$row['userid'];
$db->query($sql22);
$billrow=$db->fetchArray();
$billrow['first_name'];
$arr1=@explode(' ',$row['buydate']);
$edate=@explode('-',$arr1[0]);
$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);
}
?>	
<div class="card">
        <div class="card-header">
          <h4 class="mb-0"><strong>My Orders</strong></h4>
        </div>
      </div>
      <div class="card pull-up">
        <div class="card-header">
          <div class="float-left">
            <a href="javascript:void(0);" class="btn btn-info">#<?=$orderid?></a>
          </div>
          <div class="float-right">
            <a href="submitticket.php" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
            
          </div>
        </div>
		<table cellpadding="10" cellspacing="10" style="margin-left: 20px;">
	<tr>
	<!--<td><strong>User Address</strong></td>-->
	<td><strong>Shipping Address</strong></td>
	</tr>
	<tr><!--<td>
    <?php if(!empty($billrow['first_name'])){ ?>
	Name:<?=$billrow['first_name']?>	<br />
     <?php }?>
     <?php if(!empty($billrow['address'])){ ?>
	Address:<?=$billrow['address']?><br />
     <?php }?>
     <?php if(!empty($billrow['twon'])){ ?>
      
	City:<?=$billrow['town']?><br />
     <?php }?>
     <?php if(!empty($billrow['state'])){ ?>
      
	State: <?=$billrow['state']?><br />
     <?php }?>
     <?php if(!empty($billrow['zip_code'])){ ?>
	Zip Code:<?=$billrow['zip_code']?><br />
     <?php }?>
     <?php if(!empty($billrow['mobileno'])){ ?>
	Phone:<?=$billrow['mobileno']?><br />
     <?php }?>
	 <?php if(!empty($billrow['email_id'])){ ?>
	E-Mail:<?=$billrow['email_id']?><br />
     <?php }?>
	</td>-->
	<td align="left" valign="top" style="padding-left:5px;">
	<?php if(!empty($shiprow['billing_firstname'])){ ?>
	<?=$shiprow['billing_firstname']?>	 <?=$shiprow['billing_lastname']?><br />
    <?php }?>
   
    <?php if(!empty($shiprow['billing_adress'])){ ?>
	<?=$shiprow['billing_adress']?>	<br />
     <?php }?>
    <?php if(!empty($shiprow['billing_state'])){ ?>
	<?=$shiprow['billing_state']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_zip'])){ ?>
	Zip Code:<?=$shiprow['billing_zip']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_phone'])){ ?>
	Phone:<?=$shiprow['billing_phone']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_email'])){ ?>
	
	E-Mail:<?=$shiprow['billing_email']?><br />
     <?php }?>
	</td></tr>
	</table>
<?php

		for($i=0;$i<$cn;$i++)
				{
?>
		
        <div class="card-content">
          <div class="card-body py-2">
            <div class="d-flex justify-content-between lh-condensed">
              <div class="order-details text-center">
                <div class="product-img d-flex align-items-center">
				<?php
		$pic=$db1->getSingleResult("select prod_large_image from ".$_TBL_PRODUCT." where id=".$prodidarr[$i]);
		?>
		<img class="img-fluid" src="<?php echo $_SITE_PATH.'product/'.$pic;?>" alt=""/>	
                 
                </div>
              </div>
              <div class="order-details">
                <h6 class="my-0"><?php 		
		echo $qtyarr[$i];		
		?></h6>
                <small class="text-muted"><?=$prodarray[$i]?></small>
              </div>
              <div class="order-details">
                <div class="order-info">₦<?=number_format($pricearr[$i],2,'.',',')?></div>
              </div>
              <div class="order-details">
                <!--<h6 class="my-0"><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></h6>-->
                <small class="text-muted">₦ <?=number_format($subtotalarr[$i],2,'.',',')?></small>
              </div>
            </div>
          </div>
        </div>
		
<?php
	 $subtotal+=$subtotalarr[$i];
	$grand_total+=$subtotalarr[$i];
	
			}
?>	
		
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
          <span class="float-left">
            <span class="text-muted">Ordered On</span>
            <strong><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></strong>
          </span>
          <span class="float-right">
            <span class="text-muted">Ordered Amount</span>
            <strong>₦ <?=number_format($grand_total,2,'.',',')?></strong>
          </span>
        </div>
      </div>
      
<?php include("footer.php"); ?>
	  
	  
      </div>
      </div>



    <!-- card.// -->
					 </div>
				</div>
			</div>
			<!-- main-section-data end-->
		</div>
	</div>
</main>
 


<script src="lib/js/config.js"></script>
<script src="lib/js/util.js"></script>
<script src="lib/js/jquery.emojiarea.js"></script>
<script src="lib/js/emoji-picker.js"></script>
<script>
	$(function() {
	            // Initializes and creates emoji set from sprite sheet
	            window.emojiPicker = new EmojiPicker({
	                emojiable_selector: '[data-emojiable=true]',
	                assetsPath: 'lib/img/',
	                popupButtonClasses: 'fa fa-smile-o'
	            });
	            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
	            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
	            // It can be called as many times as necessary; previously converted input fields will not be converted again
	            window.emojiPicker.discover();
	        });
</script>
<?php include( 'footer.php') ?>
<script>
	function preview_image() {
	                var total_file = document.getElementById("upload_file").files.length;
	                for (var i = 0; i < total_file; i++) {
	
	                    $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
	                }
	            }
	
	            //video player
</script>
<script type="text/javascript">
	
	document.documentElement.setAttribute("lang", "en");
document.documentElement.removeAttribute("class");

axe.run( function(err, results) {
  console.log( results.violations );
} );
</script>
 