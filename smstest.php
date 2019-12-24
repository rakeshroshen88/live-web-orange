<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://konnect.kirusa.com/api/v1/Accounts/70Iq+hVNajatAtsQwAGdXw==/Messages",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\"id\":\"357895\",\r\"from\":\"919716799201\",\r\"to\":[\"918178822969\",\"918178628438\"],\r\"sender_mask\":\"KONNECT\",\r\"body\":\"Your charging for Subscription is successful, you are subscribed for a period of 30 days\"\r}\r",
    CURLOPT_HTTPHEADER => array(
        "Authorization: 'NxMpkCQyyIqNlKz+D6cZrP+8l8yEc+WOO64q45tP3lc='",
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