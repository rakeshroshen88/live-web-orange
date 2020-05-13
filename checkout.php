<?php include( 'header.php'); include( 'chksession.php'); ?>
<script language="javascript">
function chkdel(id)
	{
	//if(confirm("Are you sure to delete?"))
	//{
Swal.fire({
				  title: 'Are you sure?',
				  text: "want to continue!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {		
			     //location.href="checkout.php?task=del&act=del&id="+id;
	
			}
				})
	}
function discount()
	{
		
	document.getElementById('chkcoup').value="applycoup";
	document.getElementById('flag').value="coupmsg";
	document.getElementById('frmcart').submit();
	}
function chkupdatecart()
	{
	
	document.getElementById('updatecart').value="doupdate";
	document.getElementById('flag').value="update";
	document.frmcart.submit();
	}
</script>

<script language="javascript">
function discount()
	{
		
	document.getElementById('chkcoup').value="applycoup";
	document.getElementById('flag').value="coupmsg";
	document.getElementById('frmcart').submit();
	}
function chkupdatecart()
	{
	
	document.getElementById('updatecart').value="doupdate";
	document.getElementById('flag').value="update";
	document.frmcart.submit();
	}
</script>
<?php
$err="";
$db1=new DB();
$db2=new DB();	
$prodid=$_REQUEST['mid'];



if(isset($_POST['updatecart']) and $_POST['updatecart']=="doupdate")
		{
		$totitem=$_POST['cart'];
		$itemprice=$_POST['itemprice'];
		$prodid=$_POST['prodid'];
		$ship=$_POST['ship'];
		$tax=$_POST['tax'];
		
		for($i=0;$i<sizeof($totitem);$i++)
			{   $discount=$db->getSingleResult('select discount from product where id='.$prodid[$i]);
			$shipnew=$db->getSingleResult('select shippingcharge from product where id='.$prodid[$i]);
				
				$totaldiscount=($itemprice[$i]*$discount/100)*$_POST['cart'.$totitem[$i]];
				$shippingchargeupdate=$shipnew*$_POST['cart'.$totitem[$i]];
				 $total=$_POST['cart'.$totitem[$i]]*$itemprice[$i];	
				 $totaltaxupdate=($total*$tax[$i]/100);
				$uparr=array(
							"quantity"=>$_POST['cart'.$totitem[$i]],
							"discount"=>$totaldiscount,
							"shippingcharge"=>$shippingchargeupdate,
							"tax_amt"=>$totaltaxupdate,
							"prod_total"=>$total
													);
				//print_r($uparr);die();
				 $whereClause=" id=".$totitem[$i];
				 updateData($uparr, $_TBL_TEMPORDER, $whereClause);
				$err='<br><b>Cart Updated Successfully!</b><br>';
			
			}	
		    
			
		}
	
?>
<?php if($_REQUEST['flag']=="coupmsg")
	{
	$err=$err;
	}elseif($_REQUEST['flag']=="update")
	{
	$err=$err;
	}elseif($_REQUEST['T']=="1"){
		
     $perr=$db->getSingleResult('select product_name from '.$_TBL_TEMPORDER.' where sessionid='.session_id()."' and prodid=".$_REQUEST['mid']);
	

	
	
	$err='<strong>'.$perr.'</strong>';
	$err.=' was successfully added to your cart.';	
	}elseif($_REQUEST['T']=="2"){
	$perrs=$db->getSingleResult('select product_name from '.$_TBL_TEMPORDER.' where sessionid='.session_id()."' and prodid=".base64_decode(mid));
	
	 $err='<strong>'.$perr.'</strong>';
	$err.='  is already in you cart.';
 	}
	//if(!empty($err)){
		$s=session_id();
	?> 
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					 <div class="col-lg-12">

					 	<div class="breadcrumb flat">
				        	<a href="../" >Home</a>
				        	<a href="">Shop</a>     
				        	<a href="javascript:;" class="active">Checkout</a>

				        </div>

	           <div class="chart-table">
              <table  class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-right">Product Total</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
	
	 <form action="checkout.php" name="frmcart" method="post" enctype="multipart/form-data" id="frmcart">
<input type="hidden" name="chkcoup" id="chkcoup" value="" />
<input type="hidden" name="flag" id="flag" value="" />
<input type="hidden" name="updatecart" id="updatecart">	
	<?php
$ct=1;
$dbt=new DB;
$sqlt="select * from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		$grand_total=0;
		while($rowt=$dbt->fetchArray()){
		
		   $path2=$rowt['prod_image'];
		   $shippingcharge=$rowt['shippingcharge'];
		   $tax_amt=$rowt['tax_amt'];
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
  	
		 
			   $mrp=$rowt['mrp'];
				$persen=$rowt['mrp']*$rowt['quantity']-$rowt['cost']*$rowt['quantity'];
				$discount=$rowt['discount'];
			    $orgprice=$rowt['cost'];
			    $finalprice=$row['cost'];
			
			 
			
?>
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-2 hidden-xs">
              <img src="<?=$_SITE_PATH?>product/<?=$path1?>" alt="..." class="img-responsive" />
            </div>
            <div class="col-sm-10">
              <h4 class="nomargin"><?php if(!empty($rowt['product_name'])){
		echo $rowt['product_name']; } ?></h4>
             <?php if(!empty($rowt['sort_detail'])){
		echo $rowt['sort_detail']; } ?>
            </div>
          </div>
        </td>
        <td data-th="Price">₦<?=number_format($rowt['cost'],2);?></td>
        <td data-th="Quantity">
          <input type="number" class="form-control text-center" name="cart<?=$rowt['id']?>" value="<?php echo $rowt['quantity'];?>" onkeyup="chkupdatecart();">
		  <input name="cart[]" type="hidden" value="<?=$rowt['id']?>" />
		   <input name="prodid[]" type="hidden" value="<?=$rowt['prodid']?>" />
        </td>
        <td data-th="Subtotal" class="text-right">₦ <?=number_format($rowt['prod_total'],2,'.',',')?>
		<input name="itemprice[]" type="hidden"  value="<?=$rowt['cost']?>"/>
		
		<input name="tax[]" type="hidden"  value="<?=$rowt['tax_percent']?>"/>
		</td>
        <td class="actions" data-th="">
          <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm btndel " pid="<?php echo $rowt['id'];?>"  ><i class="fa fa-trash-o"></i>
          </button>
        </td>
      </tr>

<?php 
		$ct++; 
	   //echo $sub_total+=$rowt['cost']; $shippingcharge=$rowt['shippingcharge'];
		
	   
	   $grand_total=$grand_total+$rowt['prod_total'];
	   $totaltax_amt=$totaltax_amt+$tax_amt;
	   $discountamt=$discountamt+$discount;
	   $shipn=$shipn+$shippingcharge;
	$_SESSION['sess_total']=$grand_total+$shipn+$totaltax_amt-$discountamt;
	
	
	 }
	  
	  }else{?> 
	   <tr>
	  <td colspan="5" align="center">Your cart is empty!</td>
	  </tr>
	  
	  <?php }?>
    </form>

    </tbody>
    <tfoot>
	<?php if($grand_total==0){ $grand_total=0;}?>
	<tr class="visible-xs">
        <td colspan="3" align="right">Grass Total</td> 
        <td class="text-right"><strong>₦<?=number_format($grand_total,2,'.',',')?></strong>
        </td>
        <td></td>
      </tr>
	<?php if($discountamt==0){ $discountamt=0;}?>
<tr class="visible-xs">
        <td colspan="3" align="right">Discount</td> 
        <td class="text-right"><strong>- ₦<?=number_format($discountamt,2,'.',',')?></strong>
        </td>
        <td></td>
      </tr>
	  
	  <tr class="visible-xs">
        <td colspan="3" align="right">Sub Total</td> 
        <td class="text-right"><strong>₦<?=number_format(($grand_total-$discountamt),2,'.',',')?></strong>
        </td>
        <td></td>
      </tr>
	  <?php if($shipn==0){ $shipn=0;}?>
      <tr class="visible-xs">
        <td colspan="3" align="right">Shiping & Handling</td> 
        <td class="text-right"><strong>₦<?=number_format($shipn,2,'.',',')?></strong>
        </td>
        <td></td>
      </tr>
	  
	   
	  
	  <tr class="visible-xs">
        <td colspan="3" align="right">Total Tax</td> 
        <td class="text-right"><strong>₦<?=number_format($totaltax_amt,2,'.',',')?></strong>
        </td>
        <td></td>
      </tr>
	  
	  

      <tr class="visible-xs">
        <td colspan="3"></td> 
        <td class="text-right"><strong class="bold">Total ₦ <?=number_format(($_SESSION['sess_total']),2,'.',',')?></strong>
        </td>
        <td></td>
      </tr>


      <tr>
        <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
        </td>
        <td colspan="3" class="hidden-xs"></td>
        
        <td><a href="billing-details.php" class="btn btn-success btn-block">Checkout  </a>
        </td>
      </tr>

       

    </tfoot>
  </table>
 
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
 