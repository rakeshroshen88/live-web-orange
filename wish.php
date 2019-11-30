<?php include("config.inc.php");

   $id=$_REQUEST['id'];
    $sql="select * from ".$_TBL_PROD1." where id=".$id;
  $db->query($sql);
  $row=$db->fetchArray();
 if(isset($_REQUEST['task'])) {			
			$prodid=$row['id'];
			//$qty=$_REQUEST['tono'];
			//$proprice=$row['prod_sprice'];
		    //$mrp=$row['prod_price'];
				
			//$link = mysqli_connect("localhost", "root", "", "social_media");		  
		// $product_name = mysqli_real_escape_string($link, $row['prod_name']);

	$insarr=array(
						"user_id"=>$_SESSION['sess_webid'],						
						"prodid"=>$prodid,
						"status"=>1,						
						"wishdate"=>date('Y-m-d h:i:s')
						
				);
			
	//print_r($insarr);die;
	 $whereClause=" prodid=".$prodid;
	if(matchExists('wishlish', $whereClause))
		{	
					$status = false;
					$message = $row['prod_name']." is already in you Wish lish.";					
					$iemcount='';
					
			
			//redirect($_SITE_PATH."cart.php?T=2&mid=".base64_encode($prodid));
		}else{
						
			$insid=insertData($insarr, 'wishlish');
		
				
					if($insid !== false){
					$iemcount=$db->getSingleResult("SELECT count(*) from wishlish where user_id='".$_SESSION['sess_webid']."'");
					$ct=1;
$dbt=new DB;
$sqlt="select * from wishlish where user_id='".$_SESSION['sess_webid']."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		
		while($rowt=$dbt->fetchArray()){
			$ppid=$rowt['prodid'];
		
		 $prod_name=$db->getSingleResult("select prod_name from $_TBL_PRODUCT where  id='$ppid'");
		  $path2=$db->getSingleResult("select prod_large_image from $_TBL_PRODUCT where  id='$ppid'");
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
		$goid=base64_encode($ppid); 
		
			$prod='
                  <div class="carlisting1main">
				  <a href="product-details.php?pid='.$goid.'>"><img src="'.$path1.'" height="50" width="50" /></a>
                    <h6 class="my-0"><span class="prodcutname">'.$prod_name.'</span><span class="text-muted wbtndel" title="Remove"  pid="'.$rowt['prodid'].'">X</span></h6> 
				  </div>
                ';
                             
	
$ct++; 
	  
	  

	}}              $tempitem=$prod;
					$insidnew=$insid;
					$status = true;
					
					$message = "Your product has been added in wishlist";
					}else{
					$status = false;
					$message = "Your product not added in wishlist";
					}
					
					
					
				//echo "Your product has been added in cart";	
				//redirect($_SITE_PATH."cart.php?T=1&mid=".base64_encode($prodid));
				
				           
			}
 }
			
			$response['status']= $status;
			$response['totalcount']= $iemcount;
			$response['id']= $insidnew;			
			$response['message'] = $message;
			echo json_encode($response);
			die;
 ?>
    