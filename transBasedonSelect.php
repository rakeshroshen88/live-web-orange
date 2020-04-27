<?php include('config.inc.php'); 
 $api_key = 'AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&s';
//$text = 'How are you';
  $text = $_POST['keyword']; 

$text2 = 'Comment vas-tu';
  $source=$_POST['lan_1'];
  $target=$_POST['lan_2'];
//$newtext=str_replace(' ', ', ', $text); 
$newtext = explode(" ", $text); 

$newtext = implode("','",$newtext);

$newtext = "'".$newtext."'";													//$c=explode(',',$a);
if($target=='Ibibio' or $target=='Anang' or $target=='Oron' or $source=='Ibibio' or $source=='Anang' or $source=='Oron' or $source=='Yoruba' or $target=='Yoruba'){
	$dbuf=new DB();
	if($target=='Ibibio' or $target=='Anang' or $target=='Oron' or $target=='Yoruba'){
	 $sql="SELECT language_2 from language where source='".$source."' and target='".$target."' and language_1 IN($newtext)";
	$db->query($sql);
	//$array_record=array();
    if($db->numRows()>0){
	while($row=$db->fetchArray()){
	echo $obj=$row['language_2'].' ';
	}
	}
	}
	
	if($source=='Ibibio' or $source=='Anang' or $source=='Oron' or $source=='Yoruba'){
		 $sql="SELECT language_1 from language where source='".$target."' and target='".$source."' and language_2 IN($newtext)";
	$db->query($sql);
	//$array_record=array();
    if($db->numRows()>0){
	while($row=$db->fetchArray()){
	echo $obj=$row['language_1'].' ';
	}
	}
		
	}
	//array_push($array_record,$obj);
	//return $obj;
	//echo $array_record;
	}else{
 
$obj = translate($api_key,$text,$target,$source);
//print_r($obj)Ibo;
if($obj != null)
{
     if(isset($obj['error']))
    {
        //echo "Error is : ".$obj['error']['message'];
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