<?php include("config.inc.php");

   $id=$_REQUEST['id'];
    $sql="select * from ".$_TBL_PROD1." where id=".$id;
  $db->query($sql);
  $row=$db->fetchArray();
 if(isset($_REQUEST['task'])) {			
			$prodid=$row['id'];
			$qty=$_REQUEST['tono'];
			$proprice=$row['prod_sprice'];
			$proprice=str_replace(",","",$proprice);
			$total=$qty*$proprice;
			  
				$mrp=$row['prod_price'];
				$mrp=str_replace(",","",$mrp);
				//$persen=$row['prod_price']-$row['prod_sprice'];
				$persen=$mrp - $proprice;
				$discount=($persen*100)/$mrp;
			    $orgprice=$proprice;
			    $finalprice=$proprice;
			  
			$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
		 $product_name = mysqli_real_escape_string($link, $row['prod_name']);

	$insarr=array(
						
						"product_name"=>$product_name,
						"user_id"=>$_SESSION['sess_webid'],
						"sessionid"=>session_id(),
						"prodid"=>$prodid,						
						"cost"=>$proprice,	
						"discount"=>$discount,
						"finalprice"=>$finalprice,
						"prod_total"=>$total,
						"quantity"=>$qty,
						"prodsize"=>$_REQUEST['prodsize'],
						"prodcolor"=>$_REQUEST['prodcolor'],
						"mrp"=>$mrp,
						"buyitdate"=>date('Y-m-d h:i:s')
						
				);
			
	//print_r($insarr);die;
	 $whereClause=" prodid=".$prodid." and sessionid='".session_id()."'";
	if(matchExists($_TBL_TEMPORDER, $whereClause))
		{	
					$status = false;
					$message = $row['prod_name']." is already in you cart.";
					$grand_total='';
					$iemcount='';
					$insidnew='';
					$tempitem='';
			
			//redirect($_SITE_PATH."cart.php?T=2&mid=".base64_encode($prodid));
		}else{
						
			$insid=insertData($insarr, $_TBL_TEMPORDER);
		
				
					if($insid !== false){
					$iemcount=$db->getSingleResult("SELECT count(*) from $_TBL_TEMPORDER where sessionid='".session_id()."'");
					$ct=1;
$dbt=new DB;
$sqlt="select * from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		
		while($rowt=$dbt->fetchArray()){
			$ppid=$rowt['prodid'];
		
		 $shipn=$db->getSingleResult("select shippingcharge from $_TBL_PRODUCT where  id='$ppid'");
		  $path2=$db->getSingleResult("select prod_large_image from $_TBL_PRODUCTUCT where  id='$ppid'");
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
		
			$prod='
                  <div>
                    <h6 class="my-0">'.$rowt['product_name'].'</h6>
                   
                    <small class="text-muted">'.$rowt['quantity'].'</small>
                  <span class="text-muted">₦'.$rowt['cost'].'</span>
				  <span class="text-muted btndel" pid="'.$rowt['id'].'">X</span>
				  </div>
                ';
                             
	
$ct++; 
	  
	   $grand_total+=$rowt['prod_total'];
	   $shiping=$shiping+$shipn;

	}}              $tempitem=$prod;
					$insidnew=$insid;
					$status = true;
					$shiping=$shiping;
					$message = "Your product has been added in cart";
					}else{
					$status = false;
					$message = "Your product not added in cart";
					}
					
					
					
				//echo "Your product has been added in cart";	
				//redirect($_SITE_PATH."cart.php?T=1&mid=".base64_encode($prodid));
				
				           
			}
 }
			$response['granttotal']= $grand_total+$shiping;
			$response['status']= $status;
			$response['totalcount']= $iemcount;
			$response['id']= $insidnew;
			$response['tempitem']= $tempitem;
			$response['shiping']= $shiping;
			$response['message'] = $message;
			echo json_encode($response);
			die;
 ?>
    