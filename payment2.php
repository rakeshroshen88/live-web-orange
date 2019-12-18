<script>
//Paystack inline callback function
// Using Ajax to verify the transaction
callback: function(response){
  $.ajax({
    url: 'https://orangestate.ng/file.php?reference=' + response.reference,
    method: 'post',
    success: function (data) {
      //Do whatever you like
    }
  });
}


// On the inline callback function, you can redirect to another page, passing the transaction reference 
callback: function(response){
  window.location = "https://orangestate.ng/file.php?reference=" + response.reference;
}

//So on that redirected page, you can run step 2 - Verification. 


</script>

<?php
$result = array();
//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/7PVGX8MEk85tgeEpVDtD';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer pk_live_ff9da0378cea58ecfafbfa2d6befd3da90e64255']
);
$request = curl_exec($ch);
if(curl_error($ch)){
 echo 'error:' . curl_error($ch);
 }
curl_close($ch);

if ($request) {
  $result = json_decode($request, true);
}

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
  echo "Transaction was successful";
	//Perform necessary action
}else{
  echo "Transaction was unsuccessful";
}



$result = array();
// Pass the customer's authorisation code, email and amount
$postdata =  array( 'authorization_code' => 'AUTH_72btv547','email' => 'customer@email.com', 'amount' => 500000,"reference" => '0bxco8lyc2aa0fq');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.paystack.co/transaction/charge_authorization");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
  'Authorization: Bearer pk_live_ff9da0378cea58ecfafbfa2d6befd3da90e64255',
  'Content-Type: application/json',
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$request = curl_exec ($ch);
if(curl_error($ch)){
 echo 'error:' . curl_error($ch);
 }

curl_close ($ch);
if ($request) {
  $result = json_decode($request, true);
}

?>