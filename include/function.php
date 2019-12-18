<?php
#### THESE HELPS TO MANAGE THE ADDSLASHES AND STRIPSLASHES
#### IF YOU USE PHP FUNCTIONS IT IS DEPENDENT ON SERVER CONFIGURATION.
#### SO IT SHOULD BE AVOID.


##### USE WHEN PUTTING DATA INTO DATABASE
function putData( $inputValue ) {
        ####return str_replace("\\", "&#92;",str_replace('"', "&#34;",str_replace( "'","&#39;", trim($inputValue) ) ) );
        if( get_magic_quotes_gpc() ) {
                return trim($inputValue);
        } else {
                return addslashes( trim($inputValue) );
        }
}

###### USED IN CASE OF DISPLAYING
function getData( $outputValue ) {
        #####return str_replace("&#92;", "\\",str_replace("&#34;", '"',str_replace( "&#39;","'", trim($outputValue) ) ) );
        return htmlentities( trim($outputValue) );
}

##### THIS FUNCTION SPECAILLY USED WHEN TO CREATE THE WEBPAGE FROM THE HTML FILE
##### WE NEED TO REMOVE THE SLASHES
function removeSlashesFrom( $inputValue ) {
        if( get_magic_quotes_gpc() ) {
                return stripslashes( trim($inputValue) );
        } else {
                return trim($inputValue);
        }
}

######## REPLACE THE SINGLE QUTOES AND DOUBLE QUOTES AND BACKSLAHES
function replaceStringVl( $inputValue ) {
        return str_replace("\\", "\\",str_replace('"', '\\"', str_replace( "'","\'", trim($inputValue) ) ) );
        ##return addslashes(trim($inputValue));

}

##### THIS FUNCTION SPECAILLY USED WHEN TO CREATE THE WEBPAGE FROM THE HTML FILE
##### WE NEED TO ADD THE SLASHES
function addSlashesTo( $inputValue ) {
        return addslashes( trim($inputValue) );
}


##### THIS FUNCTION SPECAILLY USED TO CONVERT THE NEW LINE TO BREAK<BR>
function convertTonl2br( $inputValue ) {
        return nl2br( trim($inputValue) );
}


###### THIS TELLS THAT THE VALUE IS VALID INTEGRE TYPE
function isValidInteger( $str ) {
        if(preg_match("/^([0-9]+)$/",$str,$reg) ) { ####  BE VALID INTEGER
                return true;
        } else {
                return false;
        }
} # END OF FUNCTION

########### USED TO FIRE THE INSERT QUERY
function insertData($arr, $tableName) {
        $mysql_db = new DB();
        $query = "";

        if(! is_array($arr) ) {
                die("ERROR: Invalid Operation.");
        }
        foreach($arr as $key => $value ) {
          $query .= "$key='$value',";
        }
               $query = " insert into $tableName set ".substr($query,0,-1);
		$mysql_db->query($query);
        return $mysql_db->insertID(); ######## RETURNS LAST INSERTED ID
} # END OF FUNCTION




########### USED TO FIRE THE UPDATE QUERY
function updateData($arr, $tableName, $whereClause) {
        $mysql_db = new DB();
        $query = "";

        if(! is_array($arr) ) {
                die("ERROR: Invalid Operation.");
        }
        foreach($arr as $key => $value ) {
          $query .= "$key='$value',";
        }

        if( $whereClause == "" ) {
                die("ERROR: Invalid Operation in where clause.");
        }

        $whereClause = " where ".$whereClause;
    	  $query = " update $tableName set ".substr($query,0,-1).$whereClause;
        $mysql_db->query($query);
		
} # END OF FUNCTION

########### USED TO FIRE THE INSERT QUERY FOR ENCODE/DECPDE
function insertCreditData($arr, $tableName) {
        $mysql_db = new DB();
        $query = "";

        if(! is_array($arr) ) {
                die("ERROR: Invalid Operation.");
        }
        foreach($arr as $key => $value ) {
          if( $key == "cc_no" || $key == "cc_code"  )
                  { $query .= "$key=$value,"; }
          else
                  { $query .= "$key='$value',"; }
        }

        $query = " insert into $tableName set ".substr($query,0,-1);
        $mysql_db->query($query);
        return $mysql_db->insertID(); ######## RETURNS LAST INSERTED ID
} # END OF FUNCTION

########### USED TO FIRE THE UPDATE QUERY FOR ENCODE/DECODE.
function updateCreditData($arr, $tableName, $whereClause) {
        $mysql_db = new DB();
        $query = "";

        if(! is_array($arr) ) {
                die("ERROR: Invalid Operation.");
        }

        foreach($arr as $key => $value ) {
          if( $key == "cc_no" || $key == "cc_code"  )
                  { $query .= "$key=$value,"; }
          else
                  { $query .= "$key='$value',"; }
        }

        if( $whereClause == "" ) {
                die("ERROR: Invalid Operation in where clause.");
        }

        $whereClause = " where ".$whereClause;
        $query = " update $tableName set ".substr($query,0,-1).$whereClause;
        $mysql_db->query($query);
} # END OF FUNCTION




######### FUNCTION USED TO KNOW WHETHER RECORD EXISTS OR NOT
function matchExists($tableName, $whereClause) {
        $mysql_db = new DB();

        if( $tableName == "" || $whereClause == "") {
                die("ERROR: Invalid Operation.");
        }
        $query = "select count(*) as cnt from $tableName where ".$whereClause;
        $mysql_db->query($query);
        $data = $mysql_db->fetchArray();

        if( $data['cnt']>0 ) {
                return true;
        } else {
                return false;
        }
} ### END OF FUNCTION

######### CREATE THE SINGLE SELECTED DROP DOWN BOX
function createComboBox($arr, $name, $sltValue, $extraInfo="") {

        if(! is_array($arr) ) {
                die("ERROR: Incorect Information");
        }
        $data = "<select name='$name' $extraInfo>";
        foreach( $arr as $key => $value ) {
                $sel = "";
                if( $key == $sltValue )
                        $sel = " selected ";
                $data .= "<option value='$key' $sel>$value</option>";
        }
        return $data .= "</select>";
} ########### END OF FUNCTION


######### CREATE THE MULTIPLE SELECTED DROP DOWN BOX(LIST BOX)
function createListBox($arr, $name, $sltValueArr, $extraInfo="") {

        if(! is_array($arr) ) {
                die("ERROR: Incorect Information");
        }
        if(! is_array($sltValueArr) ) {
                die("ERROR: Incorect Information");
        }

        $data = "<select name='$name' $extraInfo>";
        foreach( $arr as $key => $value ) {
                $sel = "";
                if( in_array($key, $sltValue) )
                        $sel = " selected ";
                $data .= "<option value='$key' $sel>$value</option>";
        }
        return $data .= "</select>";
} ############ END OF FUNCTION



######## THIS FUNCTION SPECIALLY IS USED TO GET THE VALUES FROM STATE, REGION AREA, AND COMMUNITIES.

function getValuesArr( $tableName, $dataValueField, $dataTextField, $defaultValue = "", $whereClause = "" ) {

    $mysql_db = new DB();

        if( $defaultValue != "" ) {
                $valueArr = array( "0" => $defaultValue );
        }

        if( $tableName == "") {
                die("ERROR: Invalid Operation.");
        }
     $query = "select $dataValueField, $dataTextField from $tableName ";
        if( $whereClause != "" ) {
             $query .= " where ".$whereClause;
        }
        $mysql_db->query($query);
        if( $mysql_db->numRows() > 0 ) {
                while( $data = $mysql_db->fetchArray() ) {
                                $valueArr[$data[$dataValueField]] = $data[$dataTextField];
                }
                return $valueArr;
        } else {
                return array( "0" => $defaultValue);
        }

} ######## ENDOOF THE FUNCTION

###### USED TO GET THE WEBPAGE CONTENTS
function getHtmlPage( $flyer_id ) {
         $mysql_db = new DB();
         $qry = "select  flyer_webpage from ".FLYER." where flyer_id=$flyer_id";
         $mysql_db->query( $qry );
         $data = $mysql_db->fetchArray();
         return $data['flyer_webpage'];
}




######## THIS FUNCTION HELPS TO KNOW THAT URL IS ACCESSIBLE OR NOT ######################
function urlExists($url) {
        $urlParts = parse_url($url);
        $host = $urlParts['host'];
        $fsocket_timeout = 10;
        $port = (isset($urlParts['port'])) ? $urlParts['port'] : 80;

        if( !$fp = @fsockopen( $host, $port, $errno, $errstr, $fsocket_timeout ))
        return false; // url not available
        else
        return true; // yes url exists
} # END OF FUNCTION


function dateDiff($dformat, $endDate, $beginDate) { 

			$date_parts1=explode($dformat, $beginDate); 
			$date_parts2=explode($dformat, $endDate); 
			$start_date=gregoriantojd((int)$date_parts1[1],(int)$date_parts1[2],(int)$date_parts1[0]);
	        $end_date=gregoriantojd((int)$date_parts2[1],(int)$date_parts2[2],(int)$date_parts2[0]);
		    return $end_date - $start_date; 
			  
			  }
function send_header($http_equiv,$content="")
	{
		if(!headers_sent())
			header($http_equiv.":".$content);
		else
			echo "<meta HTTP-EQUIV=$http_equiv CONTENT ='$content'>";
	}
function fieldSortLink($title,$field,$qryStr="",$default=false,$fsort="asc")
	{
		global $order_field,$_COM_IMGS;
		$sort="asc";

		$qryStr=preg_replace("/(oby|sort)=[^&]*&?/","",$qryStr);

		if($default && empty($_REQUEST['oby']))
		{
			$_REQUEST['oby'] = $field;
			$_REQUEST['sort'] = $fsort;
		}
		
		if(trim($_REQUEST['oby'])==$field && ($_REQUEST['sort']=='asc' || empty($_REQUEST['sort'])))
			$sort="desc";

		$return.= "$title &nbsp;";
		$return.= "<a href='".$_SERVER['PHP_SELF']."?oby=$field&sort=$sort&$qryStr'>";
		$return.= "<img src='".$_COM_IMGS."sort_".$sort.".gif' border=0>";
		
		if(!empty($_REQUEST['oby']))
			 $order_field="ORDER BY ".$_REQUEST['oby']." ".$_REQUEST['sort'];
		return $return;
	}
function write_file($file,$content,$mode="w")
	{
		$fp=@fopen($file,$mode);
		if(!is_resource($fp))
			return false;
		fwrite($fp,$content);
		fclose($fp);
		return true;
	}
function seofriendly($url,$flag,$idname,$idval)
	{
	
	if($flag)
		{
		if($idval!="" and $idname!="")
			{
			$newurl=str_replace('.php','-'.$idname.'-'.$idval.'.htm',$url);	
			return $newurl;
			}else{
			$newurl=str_replace('.php','.htm',$url);	
			return $newurl;
			}
		
		}else{
			if($idval!="" and $idname!="")
				{
				return $url.'?'.$idname.'='.$idval;
				}else{
				return $url;
				}
		
		}
	}
function resizeimages($image,$source,$dest)
	{
	
		if(!empty($image))
			{				
		$background_image=$image;	
		$sourcepath=$source;
		$destination_path =$dest;
	 	$picname= $background_image;
	  	$ext=substr($picname,strlen($picname)-3,strlen($picname));
	  	$ext=strtolower($ext);
	  	$newname=uniqid();
	  if($ext=="Gif" or $ext=="gif")
			{
			$back_imside=imagecreatefromgif($sourcepath.$picname);
			}elseif($ext=="jpg" or $ext=="jpeg"){
			$back_imside=imagecreatefromjpeg($sourcepath.$picname);
			}elseif($ext=="png" or $ext=="Png"){
			$back_imside=imagecreatefrompng($sourcepath.$picname);
			}
		$back_srcsize = getimagesize($sourcepath.$picname);
		
	
		if($back_srcsize[0]>350)
			{	
			
				//////////////This will create small size background///////////////////////////
				
				$back1_dest_x = 350;
				$back1_dest_y = ($back_srcsize[1]/$back_srcsize[0]) * 350;
				
				if($back1_dest_y>210)
					{
					$back1_dest_x =(350/$back1_dest_y) * 210;	
					$back1_dest_y=210;	
					}
					
				$bg=imagecreatetruecolor(350,210);
				$color=imagecolorallocate($bg,255,255,255);				
				imagefill($bg,100,150,$color);
				
				$back1_dst_img = imagecreatetruecolor($back1_dest_x, $back1_dest_y);
				
				//  Resize image
				imagecopyresampled($back1_dst_img, $back_imside,0, 0, 0, 0, $back1_dest_x, $back1_dest_y, $back_srcsize[0], $back_srcsize[1]);
				$xloc=(350/2-($back1_dest_x/2));
				$yloc=((210/2)-($back1_dest_y/2));
				imagecopymerge($bg,$back1_dst_img,$xloc,$yloc,0,0,imagesx($back1_dst_img),imagesy($back1_dst_img),100);
				//  Output image
				$back_path1=$dest."medium/".$image;
				$img_path=$back_path1;
				imagepng($bg,$back_path1);
				//  Destroy images
				imagedestroy($back1_dst_img);
				
				//////////////////////////////////////////////////////////////////////////////
			}	
	
	
	
	if($back_srcsize[0]>100)
			{	
			
				//////////////This will create small size background///////////////////////////
				
				$back1_dest_x = 100;
				$back1_dest_y = ($back_srcsize[1]/$back_srcsize[0]) * 100;
				
				if($back1_dest_y>100)
					{
					$back1_dest_x =(100/$back1_dest_y) * 100;	
					$back1_dest_y=100;	
					}
					
				$bg=@imagecreatetruecolor(100,120);
				$color=imagecolorallocate($bg,255,255,255);				
				imagefill($bg,100,100,$color);
				
				$back1_dst_img = @imagecreatetruecolor($back1_dest_x, $back1_dest_y);
				
				//  Resize image
				@imagecopyresampled($back1_dst_img, $back_imside,0, 0, 0, 0, $back1_dest_x, $back1_dest_y, $back_srcsize[0], $back_srcsize[1]);
				$xloc=((100/2)-($back1_dest_x/2));
				$yloc=((120/2)-($back1_dest_y/2));
				imagecopymerge($bg,$back1_dst_img,$xloc,$yloc,0,0,imagesx($back1_dst_img),imagesy($back1_dst_img),100);
				//  Output image
				$back_path1=$dest."thumb/".$image;
				$img_path=$back_path1;
				@imagepng($bg,$back_path1);
				//  Destroy images
				@imagedestroy($back1_dst_img);
				
				//////////////////////////////////////////////////////////////////////////////
			}
	
	
			}
			
	}
	
	function productresizeimage($image,$source,$dest)
	{
	
		if(!empty($image))
			{				
		$background_image=$image;	
		$sourcepath=$source;
		$destination_path =$dest;
	 	$picname= $background_image;
	  	$ext=substr($picname,strlen($picname)-3,strlen($picname));
	  	$ext=strtolower($ext);
	  	$newname=uniqid();
	  if($ext=="Gif" or $ext=="gif")
			{
			$back_imside=imagecreatefromgif($sourcepath.$picname);
			}elseif($ext=="jpg" or $ext=="jpeg"){
			$back_imside=imagecreatefromjpeg($sourcepath.$picname);
			}elseif($ext=="png" or $ext=="Png"){
			$back_imside=imagecreatefrompng($sourcepath.$picname);
			}
		$back_srcsize = getimagesize($sourcepath.$picname);
		
	
		if($back_srcsize[0]>350)
			{	
			
				//////////////This will create small size background///////////////////////////
				
				$back1_dest_x = 350;
				$back1_dest_y = ($back_srcsize[1]/$back_srcsize[0]) * 350;
				
				if($back1_dest_y>210)
					{
					$back1_dest_x =(350/$back1_dest_y) * 210;	
					$back1_dest_y=210;	
					}
					
				$bg=imagecreatetruecolor(350,210);
				$color=imagecolorallocate($bg,255,255,255);				
				imagefill($bg,100,150,$color);
				
				$back1_dst_img = imagecreatetruecolor($back1_dest_x, $back1_dest_y);
				
				//  Resize image
				imagecopyresampled($back1_dst_img, $back_imside,0, 0, 0, 0, $back1_dest_x, $back1_dest_y, $back_srcsize[0], $back_srcsize[1]);
				$xloc=(350/2-($back1_dest_x/2));
				$yloc=((210/2)-($back1_dest_y/2));
				imagecopymerge($bg,$back1_dst_img,$xloc,$yloc,0,0,imagesx($back1_dst_img),imagesy($back1_dst_img),100);
				//  Output image
				$back_path1=$dest."medium/".$image;
				$img_path=$back_path1;
				imagepng($bg,$back_path1);
				//  Destroy images
				imagedestroy($back1_dst_img);
				
				//////////////////////////////////////////////////////////////////////////////
			}	
	
	
	
	if($back_srcsize[0]>100)
			{	
			
				//////////////This will create small size background///////////////////////////
				
				$back1_dest_x = 100;
				$back1_dest_y = ($back_srcsize[1]/$back_srcsize[0]) * 100;
				
				if($back1_dest_y>100)
					{
					$back1_dest_x =(100/$back1_dest_y) * 100;	
					$back1_dest_y=100;	
					}
					
				$bg=@imagecreatetruecolor(100,120);
				$color=imagecolorallocate($bg,255,255,255);				
				imagefill($bg,100,100,$color);
				
				$back1_dst_img = @imagecreatetruecolor($back1_dest_x, $back1_dest_y);
				
				//  Resize image
				@imagecopyresampled($back1_dst_img, $back_imside,0, 0, 0, 0, $back1_dest_x, $back1_dest_y, $back_srcsize[0], $back_srcsize[1]);
				$xloc=((100/2)-($back1_dest_x/2));
				$yloc=((120/2)-($back1_dest_y/2));
				imagecopymerge($bg,$back1_dst_img,$xloc,$yloc,0,0,imagesx($back1_dst_img),imagesy($back1_dst_img),100);
				//  Output image
				$back_path1=$dest."thumb/".$image;
				$img_path=$back_path1;
				@imagepng($bg,$back_path1);
				//  Destroy images
				@imagedestroy($back1_dst_img);
				
				//////////////////////////////////////////////////////////////////////////////
			}
	
	
			}
			
	}
function productcatseo($type,$id=0,$prodname,$flag=true,$subcat=0)
	{
		if($type=="prod")
			{
				$href=$_SITE_PATH."products/".$id."/".$prodname.".html";
				
			}elseif($type=="search")
			{
				$href=$_SITE_PATH."search/".$id."/".$prodname.".html";
				                
			}elseif($type=="cat")
			{
				if($subcat>0)
					{
						$href=$_SITE_PATH."category/".$id."/".$subcat."/".$prodname.".html";	
					}else{
						$href=$_SITE_PATH."category/".$id."/".$prodname.".html";	
					}
					
				
			}elseif($type=="info"){
				
				$href=$_SITE_PATH."information/".$id."/".$prodname.".html";
			}elseif($type=="men"){
				
				$href=$_SITE_PATH."product/".$id."/".$prodname.".html";
			}elseif($type=="women"){
				
				$href=$_SITE_PATH."product/".$id."/".$prodname.".html";
			}elseif($type=="prodcat"){
				$href=$_SITE_PATH."products/".$id."/".$subcat."/".$prodname.".html";
			}
		//echo "rajnish".$_SERVER['REQUEST_URI'];
		$url1="category/12/name.html";
		$url2="products/12/name.html";
		$url3="information/1/about.html";
		
		return $href;
	}
?>