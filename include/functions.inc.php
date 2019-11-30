<?php

	function redirectpage($page)
	{
		if(!headers_sent())
			header("location:$page");
		else
			echo "<script>location.href='$page'</script>";
	}
	function redirect($page)
	{
		if(!headers_sent())
			header("location:$page");
		else
			echo "<script>location.href='$page'</script>";
	}
	
	 function chkformelement($element){

if ((isset($element)) && (strlen(trim($element)) > 0))
{
$purecontent = stripslashes(strip_tags($element));

}else{

$purecontent = '';

}
return $purecontent;
} 

	function cpCreateComboBoxYear($name='year',$year_from=1900,$year_to=0,$selected_year="",$other_para="")
	{
		if($year_to==0)
			$year_to=date('Y');
		echo "<select name='$name' $other_para>";
	
		for($i=$year_from;$i<=$year_to;$i++)
			echo "<option value='$i'".($i==$selected_year?'selected':'').">$i</option>";
		echo "</select>";
		
	}
	
	function cpCreateComboBoxMonth($name='month',$selected_mon="",$show_as_number=false,$other_para="")
	{
		$mon=array(
					"1"	=>	"Jan",
					"2"	=>	"Feb",
					"3"	=>	"Mar",
					"4"	=>	"Apr",
					"5"	=>	"May",
					"6"	=>	"Jun",
					"7"	=>	"Jul",
					"8"	=>	"Aug",
					"9"	=>	"Sep",
					"10"	=>	"Oct",
					"11"	=>	"Nov",
					"12"	=>	"Dec"
					);
		echo "<select name='$name' $other_para>";
		
		foreach( $mon as $key => $value )
			echo "<option value='$key' ".($key==$selected_mon?"selected":'').">".($show_as_number==TRUE?$key:$value)."</option>";
		echo "</select>";
	}

	function cpCreateComboBoxDay($name='day',$selected_day="",$other_para="")
	{
		echo "<select name='$name' $other_para>";
		//echo "<option>.date.</option>";
		for($i=1;$i<=31;$i++)
			echo "<option value='$i' ".($i==$selected_day?'selected':'').">$i</option>";
		echo "</select>";
	}

	

	function isFromPage($referers) 
	{
		 //@referers = ( "www.2checkout.com", "2checkout.com", "www2.2checkout.com" );
		$check_referer = false;
		
		$from=$_SERVER['HTTP_REFERER'];

		if(empty($from))
			$from=$HTTP_SERVER_VARS['HTTP_REFERER'];
		
		if (!empty($from))
		{
			$from=preg_replace("/http:\/\//","",$from);
			$from=preg_replace("/www./","",$from);
			$from=preg_replace("/\/.*/","",$from);

			$referers=preg_replace("/http:\/\//","",$referers);
			$referers=preg_replace("/www./","",$referers);
			$referers=preg_replace("/\/.*/","",$referers);

			if($referers==$from)
				return true;
		}
		else
			return true;

		return $check_referer;
	}

	function is_emailchk($email)
	{
		if(!preg_match("/^[A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+$/",$email))
			return false;
		return true;
	}

	/*function is_date($d)
	{
		if(!preg_match("/^(\d){1,2}[-\/](\d){1,2}[-\/]\d{4}$/",$d,$matches))
			return -1;//Bad Date Format
		$T = split("[-/\\]",$d);
		$MON=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
		$M = $T[0];
		$D = $T[1];
		$Y = $T[2];
		return ($D>0 && ($D<=$MON[$M] || $D==29 && $Y%4==0 && ($Y%100!=0 || $Y%400==0))); 
	}*/

	function unlink_file($filename)
	{
			unlink($filename);
	}

	function download_file($filename,$isDel=false)
	{
		$file=basename($filename);
		
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
			$file = preg_replace('/\./', '%2e', $file, substr_count($file, '.') - 1);
		}

		// make sure the file exists before sending headers
		if(!$fdl=@fopen($filename,'r'))
		{
		   die("<br>Cannot Open File!<br>");
		}
		else
		{
		  header("Cache-Control: ");// leave blank to avoid IE errors
		  header("Pragma: ");// leave blank to avoid IE errors
		  header("Content-type: application/octet-stream");
		  header("Content-Disposition: attachment; filename=\"".$file."\"");
		  header("Content-length:".(string)(filesize($filename)));
		   sleep(1);
		  fpassthru($fdl);
		}

		if($isDel) {
			unlink($filename);
		}
	}

	function generate_rand_string($length=6)
	{
		$return='';
		for($i=1; $i<=$length; $i++)
		{
			$number=mt_rand(1,3);
			if($number==1)
			{
				$min=65;
				$max=89;
			}
			elseif($number==2)
			{
				$min=48;
				$max=57;
			}
			else
			{
				$min=97;
				$max=122;
			}

			mt_srand((double)microtime() * 1000000);
			$num = mt_rand($min,$max);
			$return .= chr($num);
		}
		return $return;
	}
	
	### AUTO GENERATED ID
	function create_guid()
	{
		$microTime = microtime();
		list($a_dec, $a_sec) = explode(" ", $microTime);

		$dec_hex = sprintf("%x", $a_dec* 1000000);
		$sec_hex = sprintf("%x", $a_sec);

		ensure_length($dec_hex, 5);
		ensure_length($sec_hex, 6);

		$guid = "";
		$guid .= $dec_hex;
		$guid .= create_guid_section(3);
		$guid .= '-';
		$guid .= create_guid_section(4);
		$guid .= '-';
		$guid .= create_guid_section(4);
		$guid .= '-';
		$guid .= create_guid_section(4);
		$guid .= '-';
		$guid .= $sec_hex;
		$guid .= create_guid_section(6);

		return $guid;

	}

	function create_guid_section($characters)
	{
		$return = "";
		for($i=0; $i<$characters; $i++)
		{
			$return .= sprintf("%x", mt_rand(0,15));
		}
		return $return;
	}

 function ensure_length(&$string, $length)
 {
	$strlen = strlen($string);
	if($strlen < $length)
	{
		$string = str_pad($string,$length,"0");
	}
	else if($strlen > $length)
	{
		$string = substr($string, 0, $length);
	}
 }
function get_all_files($parent_dir="",$file_type="",$include_sub_dir=true)
	{
		static	$file_arr=array();
		if (is_dir($parent_dir))
		{
			$sls="";
			$file_type=strtolower($file_type);
			if(trim($parent_dir)!="/")
				$sls="/";
			if ($dh = opendir($parent_dir))
			{
				while (($file = readdir($dh)) !== false)
				{
					if(is_dir($parent_dir.$sls.$file) && $file!="." && $file!=".." && $include_sub_dir)
					{
						$sub_dir=get_all_files($parent_dir.$sls.$file,$file_type);
					}
					elseif(is_file($parent_dir.$sls.$file)&& $file!="." && $file!="..")
					{

				$path_parts = pathinfo($file);
				$ext=$path_parts["extension"];
				if(!isset($ext)|| trim($ext)=="")
				  $ext="12356";
				if(strstr($file_type,strtolower($ext))||$file_type=="")
				   $file_arr[]=$parent_dir.$sls.$file;
					}
				}
				closedir($dh);
			}
			arsort($file_arr);
			return $file_arr;
		}
		return 0;
	}

	function currencyImage($cuntry)
	{
		switch($cuntry)
		{
			case 'USD':
			case 'AUD':
			case 'BSD':
			case 'BBD':
			case 'BZD':
			case 'BMD':
			case 'BND':
			case 'BND':
			case 'CAD':
			case 'KYD':
			case 'XCD':
			case 'FJD':
			case 'GYD':
			case 'HKD':
			case 'JMD':
			case 'LRD':
			case 'MXN':
			case 'NAD':
			case 'NZD':
			case 'SGD':
			case 'SBD':
			case 'SRD':
			case 'TWD':
			case 'TTD':
			case 'TVD':
			case 'ZWD':
				return "$";
				break;
			case 'GBP':
			case 'CYP':
			case 'EGP':
			case 'FKP':
			case 'GIP':
			case 'GGP':
			case 'IEP':
			case 'IMP':
			case 'JEP':
			case 'LBP':
			case 'SHP':
			case 'SYP':
				return "&#163;";
				break;
			case 'EUR':
				return "&euro;";
				break;
			case 'INR':
			case 'MUR':
			case 'NPR':
			case 'SCR':
			case 'PKR':
				return "Rs";
				break;
			case 'VAL':
			case 'ITL':
			case 'MTL':
			case 'TRY':
			case 'TRL':
				return "£";
				break;
			case 'BEF':
			case 'LUF':
			case 'FRF':
				return "?";
				break;
			case 'JPY':
				return "&yen;";
				break;
		}
	}
///////time segment////////

function timeago($time, $tense='ago') {
    // declaring periods as static function var for future use
    static $periods = array('year', 'month', 'day', 'hour', 'minute', 'second');

    // checking time format
    if(!(strtotime($time)>0)) {
        return trigger_error("Wrong time format: '$time'", E_USER_ERROR);
    }

    // getting diff between now and time
    $now  = new DateTime('now');
    $time = new DateTime($time);
    $diff = $now->diff($time)->format('%y %m %d %h %i %s');
    // combining diff with periods
    $diff = explode(' ', $diff);
    $diff = array_combine($periods, $diff);
    // filtering zero periods from diff
    $diff = array_filter($diff);
    // getting first period and value
    $period = key($diff);
    $value  = current($diff);

    // if input time was equal now, value will be 0, so checking it
    if(!$value) {
        $period = 'seconds';
        $value  = 0;
    } else {
        // converting days to weeks
        if($period=='day' && $value>=7) {
            $period = 'week';
            $value  = floor($value/7);
        }
        // adding 's' to period for human readability
        if($value>1) {
            $period .= 's';
        }
    }

    // returning timeago
    return "$value $period $tense";
}


?>