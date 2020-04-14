<?php include( 'header.php'); include( 'chksession.php'); 

 $us="select * from ".$_TBL_USER." where user_id=".$_SESSION['sess_webid'];
  $db->query($us);
  $db->numRows(); 
  $user_row=$db->fetchArray();
   $orderid=(string)rand(10000,999999).rand(100,9999).$_SESSION['sess_webid'];
$whereClause=" orderid='".$orderid."'" ;	
if(matchExists($_TBL_ORDER, $whereClause))
		{
			
		      $orderid=(string)rand(1000,99999).$_SESSION['sess_webid'];
		}
		$_SESSION['sess_orderid']=$orderid;
		//echo $_SESSION['finalamoun'];
		echo $tvalue=intval($_SESSION['finalamoun']);
		
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" class="pay" id="paynew" onclick="payWithPaystack()">  </button> 
</form>

<!-- place below the html form -->
<script>
$(document).ready(function() {
   $("#paynew").trigger('click');
});
</script>
<script>
 /*  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'paste your key here',
      email: 'customer@email.com',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  } */
</script>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
       //key: 'pk_test_8aac5554eab54672d05a091992ba18918bdf7b36', //tesdt key
	  key: 'pk_live_ff9da0378cea58ecfafbfa2d6befd3da90e64255', //live key
	   //key: 'sk_live_74136133d991099e7d09fda975479ae7e42b991b',
      email: '<?=$user_row['email_id']?>',
      amount: <?=$tvalue?>*100,
      currency: "NGN",
	  ref: '<?=$_SESSION['sess_orderid']?>',
     // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: '<?=$user_row['first_name']?>',
      lastname: '<?=$user_row['last_name']?>',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: '<?=$user_row['first_name']?>',
                variable_name: '<?=$user_row['mobile_no']?>',
                value: '<?=$user_row['mobile_no']?>'
            }
         ]
      },
      callback: function(response){
         /*  alert('success. transaction ref is ' + response.reference);
		   alert('success. transaction id ' + response.trans);
		    alert('success. transaction status is ' + response.status);
			 alert('success. transaction response is ' + response.response); */
			 var dataString ='ref=' + response.reference + '&transaction='+ response.trans + '&response='+ response.response;
			 window.location.href = "http://orangestate.ng/order-sucessful.php?"+dataString;
				
		  
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  } 
  </script>