<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://konnect.kirusa.com/api/v1/Accounts/9wT_SbF8UPiIPAx+w1IpNA==/Messages",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\"id\":\"357895\",\r\"to\":[\"2348033114792\"],\r\"sender_mask\":\"kirusa\",\r\"body\":\"Your charging for Subscription is successful, you are subscribed for a period of 30 days\"\r}\r",
    CURLOPT_HTTPHEADER => array(
        "Authorization: PmbPgE671A7MEEMLhZBefasxJ7eXpqV0+SOQdHigyWA=",
        "Content-Type: application/json"
    )
));

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
?>