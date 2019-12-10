
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
			location.href="cart.php?task=del&act=del&id="+id;
	
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

</head>

<body>
<main>
<!--header-->
<?php include('header.php'); ?>
<!--end header-->
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
<?php
$err="";
$db1=new DB();
$db2=new DB();	
$prodid=$_REQUEST['mid'];

if(isset($_GET['task']) and $_GET['task']=="del")
	{
		 $sql="delete from ".$_TBL_TEMPORDER." where id=".$_GET['id'];
		$db->query($sql);
		$err="Deleted Successfully";
		redirect($_SITE_PATH."cart.php");	
		$tot=$db1->getSingleResult("select count(*) from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'");
	  if($tot==0)
		{
		unset($_SESSION['sess_coup']);
		unset($_SESSION['sess_coupcode']);
		unset($_SESSION['sess_couptype']);
		}	
	}

if(isset($_POST['updatecart']) and $_POST['updatecart']=="doupdate")
		{
		  $totitem=$_POST['cart'];
	 $itemprice=$_POST['itemprice'];
		for($i=0;$i<sizeof($totitem);$i++)
			{
				 $total=$_POST['cart'.$totitem[$i]]*$itemprice[$i];				
				$uparr=array(
							"quantity"=>$_POST['cart'.$totitem[$i]],
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

<!--section-->
<div class="asectionmid">
    <div class="container">
    <div class="asecinner">
        <div class="row">
        <div class="col-md-12">
        
        <h1 class="ah1"><span></span> <i class="fa fa-cart-plus"></i> My Cart <span class="acount">(<?php  echo $count=$db->getSingleResult("select count(id) from ".$_TBL_TEMPORDER." where sessionid='$s'");?>)</span> <span class="sp2"></span></h1>
        </div>
        </div>
        <div class="checkout">
    <?php
        if(!empty($err)){
	?>
	<h5><?=$err?></h5><br />
	<?php $err='';} ?> </div> 
      <div class="chart-table">
              <table  class="table table-hover table-condensed">
        
            <thead>
      <tr>
	   
          <tr>
                              <th>Sr. No.</th>
                              <th>Product Name</th>
                              <th>Product Image</th>
                              <th>MRP</th>
                              <th>Discount</th>
                              <th>Save</th>
                              <th>Qty.</th>
                              <th>Price</th>
                              
                              <th>Action</th>
                          </tr>
       
      </tr>
    </thead>
                      
                      
                      <tbody>

	 <form action="cart.php" name="frmcart" method="post" enctype="multipart/form-data" id="frmcart">
        <input type="hidden" name="chkcoup" id="chkcoup" value="" />
<input type="hidden" name="flag" id="flag" value="" />
<input type="hidden" name="updatecart" id="updatecart">
       <!-- <input type="hidden" name="flag" id="flag" value="" />
        <input type="hidden" name="updatecart" id="updatecart">-->
		<?php
$ct=1;
$dbt=new DB;
$sqlt="select * from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		
		while($rowt=$dbt->fetchArray()){
		$ppid=$rowt['prodid'];
		 $ppid=$rowt['prodid'];
		
		  $path2=$db->getSingleResult("select prod_large_image from $_TBL_PROD1 where  id='$ppid'");
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
  		//$productprice=$db->getSingleResult("select prod_sprice from $_TBL_PROD where  id='$ppid'");
		 
			   $mrp=$rowt['mrp'];
				$persen=$rowt['mrp']*$rowt['quantity']-$rowt['cost']*$rowt['quantity'];
				$discount=($persen*100)/$mrp;
			    $orgprice=$rowt['cost'];
			    $finalprice=$row['cost'];
			  
			  //$save=$rowt['prod_total']-$discount;
		
			  
			 
		
?>
   <tr>
                              <td><?php echo $ct;?></td>
                              <td><?php if(!empty($rowt['product_name'])){
		echo $rowt['product_name']; } ?></td>
                              <td><img src="<?=$_SITE_PATH?>product/<?=$path1?>" height="80" width="80" /></td>
                              <td>Rs. <?=number_format($rowt['mrp'],2);?></td>
                              <td><?=number_format($rowt['discount'],2); echo "%";?></td>
                              <td>Rs. <?=number_format($persen,2);?></td>
                              <td><input name="cart[]" type="hidden" value="<?=$rowt['id']?>" />
                               <input name="cart<?=$rowt['id']?>"  style="text-align: center;"type="text" size="3" value="<?php echo $rowt['quantity'];?>" /></td>
                              <td>Rs.<?=number_format($rowt['prod_total'],2,'.',',')?> <input name="itemprice[]" type="hidden"  value="<?=$rowt['cost']?>"/></td>
                              
                              <td><label for="cartdel"><i class="fa fa-trash"  onclick="chkdel('<?php echo $rowt['id'];?>')" ></i></label></td>
                          </tr>
                          
	<?php 
		$ct++; 
	   //echo $sub_total+=$rowt['cost'];
	  echo $grand_total+=$rowt['prod_total'];
$_SESSION['sess_total']=$grand_total;
	 }
	  
	  }else{?> 
	   <tr>
	  <td colspan="9" align="center">Your cart is empty!</td>
	  </tr>
	  
	  <?php }?>
                         
                          
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Total :</td>
                              <td>Rs. <?=number_format($grand_total,2,'.',',')?></td>
                              <td></td>
                              <td></td>
                          </tr>
                      </tbody>
                  </table>
                  
                  </div>
           </div>
           
           <div class="row">
                  <div class="col-md-12">
                          <div class="shopbtn cartbtn">
                               <a href="javascript:void(0);" onclick="javascript:document.location.href='<?=$_SITE_PATH?>';" class="btn"><span>Continue Shopping</span></a>
							   <a href="javascript:void(0);" onclick="chkupdatecart();"  class="btn"><span>Update</span></a>
							  
							   <?php if(!empty($_SESSION['sess_webid'])){?>
							   <a href="javascript:void(0);" onclick="javascript:document.location.href='<?=$_SITE_PATH?>order.php?id=<?php echo $_SESSION['sess_webid'];?>';" class="btn"><span>Checkout</span></a>							   
							   <?php }else{?>
							   <a href="javascript:void(0);" onclick="javascript:document.location.href='<?=$_SITE_PATH?>order.php?id=<?php echo $_SESSION['sess_webid'];?>';" class="btn"><span>Checkout</span></a>
							   <?php
							   }
							   ?>
                               
	
                          </div>
                  </div>
           </div>
        
        
        </div>
    </div>
</div>
<!--end section-->

<!--footer-->
<?php include('footer.php'); ?>
<!--end footer-->
