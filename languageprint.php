<?php

include('inc.language.php');

// Set our translations.
$translation['fr'] = array(
  'Email' => 'Courriel',
  'Name' => 'Nom',
  'Organization' => 'Entreprise',
  'Phone Number' => 'Num&eacute;ro de t&eacute;l&eacute;phone',
  'Hello %name' => 'Bonjour %name',
);

print t('Name');
print t('Email');
print t('Organization');
print t('Phone Number');
print t('Hello %name', array('%name' => 'Mr. Anderson'));

   /*  $apiKey = 'AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&s';
     $text = $_POST['keyword'];
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=fr';

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);                 
     $responseDecoded = json_decode($response, true);
    curl_close($handle);

    echo 'Source: ' . $text . '<br>';
    echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
*/
?> 

<?php
   /*  $apiKey = 'AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&s';
    $url = 'https://www.googleapis.com/language/translate/v2/languages?key=' . $apiKey;

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);     //We want the result to be saved into variable, not printed out
    $response = curl_exec($handle);                         
    curl_close($handle);

    print_r(json_decode($response, true)); */
?>

<?php
 $api_key = 'AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&s';
$text = 'How are you';
$source="en";
$target="fr";
 
$obj = translate($api_key,$text,$target,$source);
if($obj != null)
{
     if(isset($obj['error']))
    {
        echo "Error is : ".$obj['error']['message'];
    }
    else
    {
        //echo "Translsated Text: ".$obj['data']['translations'][0]['translatedText']."n";
		echo "Detecte Source Languge : ".$obj['data']['translations'][0]['detectedSourceLanguage']."n"; 
       /*  if(isset($obj['data']['translations'][0]['detectedSourceLanguage'])) //this is set if only source is not available.
            echo "Detecte Source Languge : ".$obj['data']['translations'][0]['detectedSourceLanguage']."n";    */  
    } 
}
else{
    echo "UNKNOW ERROR";
} 
function translate($api_key,$text,$target,$source=false)
{
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $api_key . '&q=' . rawurlencode($text);
    $url .= '&target='.$target;
    if($source)
     $url .= '&source='.$source;
 
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);                 
    curl_close($ch);
 
    $obj =json_decode($response,true); //true converts stdClass to associative array.
    return $obj;
}   
 
?>