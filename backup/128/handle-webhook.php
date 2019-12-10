<?php

// Retrieve the request's body
$body = @file_get_contents("php://input");
$signature = (isset($_SERVER['HTTP_X_PAYSTACK_SIGNATURE']) ? $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] : '');

/* It is a good idea to log all events received. Add code *
 * here to log the signature and body to db or file       */

if (!$signature) {
    // only a post with paystack signature header gets our attention
    exit();
}

define('PAYSTACK_SECRET_KEY','pk_test_8aac5554eab54672d05a091992ba18918bdf7b36');
// confirm the event's signature
if( $signature !== hash_hmac('sha512', $body, 'pk_test_8aac5554eab54672d05a091992ba18918bdf7b36') ){
  // silently forget this ever happened
  exit();
}

http_response_code(200);
// parse event (which is json string) as object
// Give value to your customer but don't give any output
// Remember that this is a call from Paystack's servers and 
// Your customer is not seeing the response here at all
$event = json_decode($body);
switch($event->event){
    // charge.success
    case 'charge.success':
        // TIP: you may still verify the transaction
    		// before giving value.
        break;
}
exit();
?>