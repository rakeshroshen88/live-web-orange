<?php include('header.php');?>

 <div  class="white-popup mfp-with-anim mfp-hide">
 <form role="form" name="login" method="post" action="" onsubmit="return submitregform();" id="formID" enctype="multipart/form-data" >
                    <div class="msg2">
                             <?php if(isset($_REQUEST['errMsg']) and $_REQUEST['errMsg']!=""){echo $_REQUEST['errMsg'];}?>
                     </div>
                     
                      <input type="hidden" value="do_register" name="action" class="frm-field">
                        <input type="hidden" value="" name="redirecturl">
                        <input type="hidden" value="295740" name="resellerid">
                           <input type="hidden" value="path" name="<?=$imgid?>">                
                         
                       
						<h2>User Address</h2>
                         <div class="form-group">
                                <label for="Name">Your Name </label>
                                <input type="text" value="<?=$row['name']?>" class="form-control"  id="input_fullname" name="name" />
                         </div>
                         
                         
                           <?php if(empty($_SESSION['sess_webid'])){?>
                          <div class="form-group">
                                <label for="Name">Password </label>
                                <input type="text"  value="<?=$row['password']?>" class="form-control" id="passwd" name="passwd" />
                               
                         </div>
                         <?php }?>
                         
                      
                          <div class="form-group">
                                <label for="email1">Email address:</label>
                                <input type="email" value="<?=$row['email']?>" class="form-control" id="emai1l" name="emai1l"/>
                         </div>
 <script>

function showUser(str)
{
	

  document.getElementById("billing_adress").innerHTML="str";
  document.getElementById("billing_adress").value="str";
  


}
   </script>
   <?php
   if(empty($bill['billing_address'])){
	   
	   $bill1=$row['address'];
   }else{
	   $bill1=$bill['billing_address'];
   }
   
   
   
   ?>
                         <div class="form-group">
                                <label for="Name"> Address </label>
                                <input type="text"  value="<?=$row['address']?>" class="form-control" id="address" name="address" onchange="return showUser(this.value);" />
                               
                         </div>
                         
                         
                         
                         
                          <div class="form-group">
                                <label for="Name"> City </label>
                                <input type="text" value="<?=$row['city']?>" name="city" class="form-control" id="select_city"  />
                               
                         </div>
						 
						 
						  <div class="form-group">
                                <label for="Name"> State </label>
                                <input type="text" value="<?=$row['state']?>" id="input_address1" name="state" class="form-control" />
                               
                         </div>
						 
						 
						  <div class="form-group">
                                <label for="Name"> Zip </label>
                                <input type="text" value="<?=$row['zip']?>" id="input_zip" name="zip" class="form-control" />
                               
                         </div>
						 
						 
						  <div class="form-group">
                                <label for="Name"> Mobile no </label>
                                <input type="text"  value="<?=$row['cellno']?>"  name="cell"  id="input_phone" class="form-control" />
                               
                         </div>
                       
                        <div class="text-center">
                              <button class="btn btn-primary" name="submit" type="submit" >update</button>
                         </div>
                    
                
                  
                  </form>
 </div>
    


  <div class="col-md-8">
  <form role="form" name="login1" method="post" action="" onsubmit="return submitregform1();" id="formID1" enctype="multipart/form-data" >
                       
						<h2>Shipping Address</h2>
                         <div class="form-group">
                                <label for="Name"> Full Name </label>
                                <input type="text" value="<?=$bill['billing_firstname']?>" id="input_address1" name="billing_firstname" class="form-control" />
                               
                         </div>
                
                
                         <div class="form-group">
                                <label for="Name"> Billing Email </label>
                                <input type="text" value="<?=$bill['billing_email']?>" id="billing_email" name="billing_email" class="form-control" />
                               
                         </div>
                       
                         
                         
                       
                         
                          <div class="form-group">
                                <label for="Name"> Billing Mobile No </label>
                               <input type="text"  value="<?=$bill['billing_phone']?>"  name="billing_phone"  id="billing_phone" class="form-control" />
                               
                         </div>
						 
						  <div class="form-group">
                                <label for="Name"> Billing Address  </label>
                               <input type="text"  value="<?=$bill1?>"  name="billing_adress"  id="billing_adress" class="form-control" />
                               
                         </div>
						 
						  <div class="form-group">
                                <label for="Name"> Billing City  </label>
                               <input type="text"  value="<?=$row['billing_city']?>"  name="billing_city"  id="v" class="form-control" />
                               
                         </div>
						 
						  <div class="form-group">
                                <label for="Name"> Billing Zip  </label>
                               <input type="text"  value="<?=$row['billing_zip']?>"  name="billing_zip	"  id="billing_zip	" class="form-control" />
                               
                         </div>
						
                         
                      
                 
                        <div class="text-center">
                              <button class="btn btn-primary" name="submit" type="submit" >Checkout</button>
                         </div>
                    
                
                  
                  </form>
        
        </div>
        




<?php include('footer.php');?>