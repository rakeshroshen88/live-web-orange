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
$db2=new DB();
if($target=='Ibibio' or $target=='Anang' or $target=='Oron' or $target=='Yoruba' or $source=='Ibibio' or $source=='Anang' or $source=='Oron' or $source=='Yoruba'){
	$dbuf=new DB();
	if($target=='Ibibio' or $target=='Anang' or $target=='Oron' or $target=='Yoruba'){
	 $sql="SELECT language_2,category from language where source='".$source."' and target='".$target."' and language_1 IN($newtext)";
	$db->query($sql);
	//$array_record=array();
    if($db->numRows()>0){
	while($row=$db->fetchArray()){
		$obj=$row['language_2'].' ';
		
			$sql2="SELECT language_1,language_2,audio_1 from language where source='".$source."' and target='".$target."' and category='".$row['category']."' limit 5";
			$db2->query($sql2);
			
			while($row2=$db2->fetchArray()){
				//$audio_1=str_replace(" ","",$row2['audio_1']);
				$ibibomp3.='<tr><td>'.$row2['language_1'].'</td>';
				$ibibomp3.='<td>'.$row2['language_2'].'</td>';
				$ibibomp3.="<td>
							<a href='javascript:void(0)' class='aplay' mid='".$row2['audio_1']."'><i class='fa fa-play' title='play'  aria-hidden='true'></i></a>";
										
		$ibibomp3.='<a href="/img/language/'.$row2['audio_1'].'" target="_blank"><i class="fa fa-download" title="download"  aria-hidden="true"></i></a>
										 
										 </td></tr>';
			}
			
		
	}
	}else{
		$obj="";
	}
	$response['status']= $status;
	$response['id']= $insid;
	$response['message'] = $obj;
	$response['english'] = $english;
	$response['ibibo'] = $ibibo;
	$response['ibibomp3'] = $ibibomp3;
	echo json_encode($response);
	die;
	}
	
	if($source=='Ibibio' or $source=='Anang' or $source=='Oron' or $source=='Yoruba'){
		 $sql="SELECT language_1 from language where source='".$target."' and target='".$source."' and language_2 IN($newtext)";
	$db->query($sql);
	//$array_record=array();
    if($db->numRows()>0){
	while($row=$db->fetchArray()){
	 $obj=$row['language_1'];
	}
	}else{
		echo "";
	}
	$response['status']= $status;
	
	$response['message'] = $obj;
	$response['english'] = $english;
	$response['ibibo'] = $ibibo;
	$response['ibibomp3'] = $ibibomp3;
	echo json_encode($response);
	die;
	
		
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
       // echo "Error is : ".$obj['error']['message'];
	 //  echo "Translation Not Available";
    }
    else
    {
        //echo "Translsated Text: ".$obj['data']['translations'][0]['translatedText']."n";
		 $obj=$obj['data']['translations'][0]['translatedText'];
	$response['status']= $status;
	
	$response['message'] = $obj;
	$response['english'] = $english;
	$response['ibibo'] = $ibibo;
	$response['ibibomp3'] = $ibibomp3;
	echo json_encode($response);
	die;		 
     
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
