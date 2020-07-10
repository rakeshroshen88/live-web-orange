<?php include("config.inc.php");

   $id=$_REQUEST['id'];
    $sql="select * from ".$_TBL_PROD1." where id=".$id;
  $db->query($sql);
  $row=$db->fetchArray();
 if(isset($_REQUEST['task'])) {			
			$prodid=$row['id'];
			$qty=$_REQUEST['tono'];
			$proprice=$row['prod_sprice'];
			$tax=$row['tax'];
			$prod_image=$row['prod_large_image'];
			$totaltax=($proprice*$tax/100)*$qty;
			$discount=$row['discount'];
			$totaldiscount=($proprice*$discount/100)*$qty;
			$shippingcharge=$row['shippingcharge']*$qty;
			$proprice=str_replace(",","",$proprice);
			$total=$qty*$proprice;
			  
				$mrp=$row['prod_price'];
				$mrp=str_replace(",","",$mrp);
				//$persen=$row['prod_price']-$row['prod_sprice'];
				//$discount=($persen*100)/$mrp;
				$persen=$mrp - $proprice;
			    $orgprice=$row['prod_sprice'];
			    $finalprice=$row['prod_sprice'];
			  
			  
	$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
		 $product_name = mysqli_real_escape_string($link, $row['prod_name']);
  
	$insarr=array(
						
						"product_name"=>$product_name,
						"user_id"=>$_SESSION['sess_webid'],
						"sessionid"=>session_id(),
						"prodid"=>$prodid,						
						"cost"=>$proprice,	
						"discount"=>$totaldiscount,
						"shippingcharge"=>$shippingcharge,
						"prod_image"=>$prod_image,
						"tax_amt"=>$totaltax,
						"tax_percent"=>$tax,
						"finalprice"=>$finalprice,
						"prod_sprice"=>$orgprice,
						"prod_total"=>$total,
						"quantity"=>$qty,
						"prodsize"=>$_REQUEST['psize'],
						"prodcolor"=>$_REQUEST['color'],
						"mrp"=>$mrp,
						"buyitdate"=>date('Y-m-d h:i:s')
						
				);
			
	//print_r($insarr); die;
	 $whereClause=" prodid=".$prodid." and sessionid='".session_id()."'";
	if(matchExists($_TBL_TEMPORDER, $whereClause))
		{	
			echo $errMsg=$row['prod_name']." is already in you cart.";
			die;
			//redirect($_SITE_PATH."cart.php?T=2&mid=".base64_encode($prodid));
		}else{
						
			$insid=insertData($insarr, $_TBL_TEMPORDER);
		
				if($insid>0){
				echo "Your product has been added in cart";	
				//redirect($_SITE_PATH."cart.php?T=1&mid=".base64_encode($prodid));
				
				            }
			}
 } ?>
