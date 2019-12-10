<?php

// validate and save the order posted

// craft a reference for the payment, here we are using the ID from saving it earlier
//$reference = $savedOrder->id
$reference =133;
// Get this from https://github.com/yabacon/paystack-class
require 'Paystack.php'; 
// if using https://github.com/yabacon/paystack-php
// require 'paystack/autoload.php';

$paystack = new Paystack('sk_test_1da9aa5e449e6a6c6ec6c2d154e3520bc62d90bb');
// the code below throws an exception if there was a problem completing the request, 
// else returns an object created from the json response
$trx = $paystack->transaction->initialize(
  [
    'amount'=>$_POST['amount'], /* 20 naira */
    'email'=>$_POST['email_prepared_for_paystack'],
    // 'callback_url'=>'http://your-site.tld/folder/anotherfolder/verify.php',
    'metadata'=>json_encode([
      'cart_id'=>$_POST['cartid'],
      'reference'=>$reference,
      'custom_fields'=> [
        [
          'display_name'=> "Paid on",
          'variable_name'=> "paid_on",
          'value'=> 'Website'
        ],
        [
          'display_name'=> "Paid via",
          'variable_name'=> "paid_via",
          'value'=> 'Standard'
        ]
      ]
    ])
  ]
);
// status should be true if there was a successful call
if(!$trx['status']){
  exit($trx->message);
}
// full sample initialize response is here: https://developers.paystack.co/docs/initialize-a-transaction
// Get the user to click link to start payment or simply redirect to the url generated
header('Location: ' . $trx->data->authorization_url);
?>