<?php include("config.inc.php");

   $id=$_REQUEST['id'];
    $sql="select * from ".$_TBL_PROD1." where id=".$id;
  $db->query($sql);
  $row=$db->fetchArray();
 if(isset($_REQUEST['task'])) {			
			$prodid=$row['id'];
			$qty=$_REQUEST['tono'];
			$proprice=$row['prod_sprice'];
			$total=$qty*$proprice;
			  
				$mrp=$row['prod_price'];
				$persen=$row['prod_price']-$row['prod_sprice'];
				$discount=($persen*100)/$mrp;
			    $orgprice=$row['prod_sprice'];
			    $finalprice=$row['prod_sprice'];
			  
			  
		
  
	$insarr=array(
						
						"product_name"=>$row['prod_name'],
						"user_id"=>$_SESSION['sess_webid'],
						"sessionid"=>session_id(),
						"prodid"=>$prodid,						
						"cost"=>$proprice,	
						"discount"=>$discount,
						"finalprice"=>$finalprice,
						"prod_total"=>$total,
						"quantity"=>$qty,
						"mrp"=>$mrp,
						"buyitdate"=>date('Y-m-d h:i:s')
						
				);
			
	
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
