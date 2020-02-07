<?php
/* function translate($from_lan, $to_lan, $text){
    $json = json_decode(file_get_contents('https://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=' . urlencode($text) . '&langpair=' . $from_lan . '|' . $to_lan));
    $translated_text = $json->responseData->translatedText;

    return $translated_text;
}

echo $a=translate('en','fr','hello'); */


   /*  $apiKey = 'AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&sg';
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
//$text = 'How are you';
 $text = $_POST['keyword']; 
$text2 = 'Comment vas-tu';
$source="en";
$target="hin";
 
$obj = translate($api_key,$text,$target,$source);
//print_r($obj)Ibo;
if($obj != null)
{
     if(isset($obj['error']))
    {
        echo "Error is : ".$obj['error']['message'];
    }
    else
    {
        //echo "Translsated Text: ".$obj['data']['translations'][0]['translatedText']."n";
		echo $obj['data']['translations'][0]['translatedText']; 
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