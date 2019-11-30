<?php

	/**
	 * Send SMS , PSMS, and Wap Push
	 * @author Prashant Sengar
	 * @version 1.0.1
	 * @name SMS
	 */
	
	define( 'XML_ERROR_OFFSET',  2000 );

	class SMS
	{
		var $sms_host 	= "";
		var $sms_url 	= "";
		var $sms_port 	= 80;
		var $sms_user 	= "";
		var $sms_pwd 	= "";
		
		var $sms_service_id="";
		var $sms_channel="";
		var $sms_expiry="";
		var $sms_source="";
		var $sms_test = false;
		
		var $_error= "";
		
		var $GatewayResponse = "";
		var $_parser	= "";
		var $_result	= "";
		var $xmlData;
		
		var $Phone = "";
		var $Content = "";
		var $Premium = 0;
		
		var $sms_primium_channel = 0;
		var $sms_bin_channel = 0;
		var $sms_eco_channel = 0;
		
		/**
		 * Cunstructor
		 *
		 * @param String $host
		 * @param String $url
		 * @param Long $port
		 * @param String $user
		 * @param String $passphrase
		 * @return SMS Object
		 */
		
		function SMS($host= "",$url="",$port=80,$user="",$passphrase="")
		{
			$this->setHost($host,$url,$port);
			$this->setUser($user,$passphrase);
		}
		
		/**
		 * Set the host information
		 *
		 * @param String $host
		 * @param String $url
		 * @param Long $port
		 * @return void
		 */
		function setHost($host,$url,$port=80)
		{
			$this->sms_host = $host;
			$this->sms_url 	= $url;
			$this->sms_port	= $port;	
		}
		
		/**
		 * Set user informatipn for authentication
		 *
		 * @param String $user : User Name
		 * @param String $passphrase : User Password
		 */
		
		function setUser($user,$passphrase)
		{
			$this->sms_user	= $user;
			$this->sms_pwd	= $passphrase;
		}
		
		
		function setInfo($serviceid,$source,$expiry="")
		{
			$this->sms_service_id = $serviceid;
			$this->sms_source = $source;
			$this->sms_expiry = $expiry;
		}
		
		function setChannels($simple,$bin,$pri)
		{
			$this->sms_eco_channel = $simple;
			$this->sms_bin_channel = $bin;
			$this->sms_primium_channel = $pri;
			$this->sms_channel = $simple;
		}
		
		/**
		 * Enter description here...
		 *
		 * @param Number $phone
		 * @param String $sms
		 * @param Int $chargable 1 for premium SMS, 0 for free SMS
		 * @return unknown
		 */
		function sendSMS($phone="",$content="",$chargable=-1)
		{
			if(strlen($content)>160)
			{
				$words = split(" ",$content); 
				$newcontent="";
				for($i=0;$i<count($words);$i++)
				{
					if(strlen($newcontent) + strlen($words[$i])<=160)
						$newcontent.=$words[$i]." ";
					else
					{
						$result = $this->_sendSMS($phone,$newcontent,$chargable);
						if($result===false) return false;
						if($chargable>=1)
							return $result;
						$newcontent=$words[$i]." ";
					}
				}
				$result = $this->_sendSMS($phone,$newcontent,$chargable);
			}
			else
				$result = $this->_sendSMS($phone,$content,$chargable);
			return $result;
		}
		
		function sendWapPush($phone="",$content="",$chargable=-1)
		{
			return $this->_sendSMS($phone,$content,$chargable,true);
		}
		
		function _sendSMS($phone="",$content="",$chargable=-1,$iswap=false)
		{
			if(!empty($phone))
				$this->Phone = $phone;
			if(!empty($content))
				$this->Content = $content;
			if($chargable == 0)
				$this->Premium =0;
			else if($chargable >=1 )
				$this->Premium = 1;
			
			if(empty($this->Phone) && !is_numeric($this->Phone))
			{
				$this->error = "Invalid Phone!";
				return false;
			}
			
			if($this->Premium == 1)
				$this->sms_channel = $this->sms_primium_channel;
			else 
				$this->sms_channel = $this->sms_eco_channel;
			
			$xml.='<?xml version="1.0"?>';
			$xml.='<methodCall>';
			if($iswap)
				$xml.='<methodName>DragonGateway.SendWAP</methodName>';
			else 
				$xml.='<methodName>DragonGateway.SendSMS</methodName>';
			$xml.='<params>';
			$xml.='<param>';
			$xml.='<value>';
			$xml.='<struct>';
			$xml.='<member>';
			$xml.='<name>Service</name>';
			$xml.='<value><int>'.$this->sms_service_id.'</int></value>';
			$xml.='</member>';
			$xml.='<member>';
			$xml.='<name>Password</name>';
			$xml.='<value>'.$this->sms_pwd.'</value>';
			$xml.='</member>';
			$xml.='<member>';
			$xml.='<name>Channel</name>';
			$xml.='<value><int>'.$this->sms_channel.'</int></value>';
			$xml.='</member>';
			$xml.='<member>';
			$xml.='<name>Numbers</name>';
			$xml.='<value>'.$this->Phone.'</value>';
			$xml.='</member>';
			$xml.='<member>';
			$xml.='<name>SMSText</name>';
			$xml.='<value>'.$this->Content.'</value>';
			$xml.='</member>';
			if($iswap)
			{
				$xml.='<member>';
				$xml.='<name>Prompt</name>';
				$xml.='<value>Load QPDates</value>';
				$xml.='</member>';
			}
			if(!empty($this->sms_expiry))
			{
				$xml.='<member>';
				$xml.='<name>Expiry</name>';
				$xml.='<value><dateTime.iso8601>'.$this->sms_expiry.'</dateTime.iso8601></value>';
				$xml.='</member>';
			}
			if($this->Premium != 1)
			{
				$xml.='<member>';
				$xml.='<name>Source</name>';
				$xml.='<value>'.$this->sms_source.'</value>';
				$xml.='</member>';
			}
			if($this->sms_test)
			{
				$xml.='<member>';
				$xml.='<name>Testing</name>';
				$xml.='<value>Yes</value>';
				$xml.='</member>';
			}
			$xml.='</struct>';
			$xml.='</value>';
			$xml.='</param>';
			$xml.='</params>';
			$xml.='</methodCall>';
				
			//Sends out the request to server.
			$result = $this->_sendCRequest($xml);
			if($result == false) return false;
			
			$result = $this->_parseXML();
			if($result == false) return false;
			return $this->xmlData['STRING'][0];
			
		}
		function setPhone($user,$pass,$phone)
		{
			$this->sms_user = $user;
			$this->sms_pwd	= $pass;
			
		}
		
		
		

function pushwap1($custMobileNo,$Content)
		{
		$this->Content = $Content;
		$this->Phone  = $custMobileNo;	
		$this->sms_user = "pixel.api";
		$this->sms_pwd	= "92jdww2Df";	
		$request = "";
		
		
		$param['X-E3-Recipients'] = $this->Phone; 
		
		$param['X-E3-HTTP-Login'] = $this->sms_user; 
		
		$param['X-E3-HTTP-Password'] = $this->sms_pwd; 
		
		$param['X-E3-Media-Data'] = $this->Content; 
		
		$param['X-E3-Media-Type'] = "PI";
		$param['X-E3-Media-Title']=" Viacell Barcode";
		
		foreach($param as $key=>$val) 
		//traverse through each member of the param array 
		{ 
		$request.= $key."=".urlencode($val); 
		//we have to urlencode the values
		$request.= "&";
		//append the ampersand (&) sign after each paramter/value pair
		}
		
		$request = substr($request, 0, strlen($request)-1); 
				$result = $this->_sendCRequest($request);
				return $result;
				exit;
				if($result == false) return false;
				
				if($result == false) return false;
				for($i=0;$i<count($this->xmlData['STRING']);$i++)
				{
					$return[] = $this->xmlData['STRING'][$i];
				}
			
				return $return;
			}

		
function sendmms1($mess)
{$this->Content = $mess;
		
$request = "";


$param['X-E3-Recipients'] = $this->Phone; 

$param['X-E3-HTTP-Login'] = $this->sms_user; 

$param['X-E3-HTTP-Password'] = $this->sms_pwd; 

$param['X-E3-Media-Data'] = $this->Content; 

$param['X-E3-Media-Type'] = "PM";

foreach($param as $key=>$val) 
//traverse through each member of the param array 
{ 
$request.= $key."=".urlencode($val); 
//we have to urlencode the values
$request.= "&";
//append the ampersand (&) sign after each paramter/value pair
}

$request = substr($request, 0, strlen($request)-1); 
echo $request;
			//$result = $this->_sendCRequest($request);
			if($result == false) return false;
			
			if($result == false) return false;
			for($i=0;$i<count($this->xmlData['STRING']);$i++)
			{
				$return[] = $this->xmlData['STRING'][$i];
			}
		
			return $return;
		}
		
		
function sendmessage1($custMobileNo,$Content)
{
        $this->Content = $Content;
		$this->Phone  = $custMobileNo;	
		$this->sms_user = "pixel.api";
		$this->sms_pwd	= "92jdww2Df";	
		
$request = "";


$param['X-E3-Recipients'] = $this->Phone; 

$param['X-E3-HTTP-Login'] = $this->sms_user; 

$param['X-E3-HTTP-Password'] = $this->sms_pwd; 

$param['X-E3-Message'] = $this->Content; 
$param['X-E3-Originating-Address']="Asian Book";

$param['X-E3-Message-Format'] = "%B";

foreach($param as $key=>$val) 
		//traverse through each member of the param array 
		{ 
		$request.= $key."=".urlencode($val); 
		//we have to urlencode the values
		$request.= "&";
		//append the ampersand (&) sign after each paramter/value pair
		}
		
		$request = substr($request, 0, strlen($request)-1); 
				$result = $this->_sendCRequest($request);
				return $result;
				exit;
				if($result == false) return false;
				
				if($result == false) return false;
				for($i=0;$i<count($this->xmlData['STRING']);$i++)
				{
					$return[] = $this->xmlData['STRING'][$i];
				}
			
				return $return;
			}

		function getChannel()
		{		
			$xml = '<?xml version="1.0"?>
					<methodCall>
					  <methodName>DragonGateway.ListChannels</methodName>
					  <params>
					    <param>
					      <value>
					        <struct>
						  <member>
						    <name>Service</name>
						    <value><int>'.$this->sms_service_id.'</int></value>
						  </member>
						  <member>
						    <name>Password</name>
						    <value>'.$this->sms_pwd.'</value>
						  </member>
						</struct>
					      </value>
					    </param>
					  </params>
					</methodCall>
					';
			$result = $this->_sendCRequest($xml);
			if($result == false) return false;
			$result = $this->_parseXML();
			if($result == false) return false;
			for($i=0;$i<count($this->xmlData['STRING']);$i+=3)
			{
				$return[$this->xmlData['STRING'][$i]] = $this->xmlData['STRING'][$i+2];
			}
		
			return $return;
		
		}
		
		function _sendSRequest($s_POST_DATA)
		{
			$s_Request = "POST ".$this->sms_url." HTTP/1.0\n";
			$s_Request .="Host: ".$this->sms_host.":".$this->sms_port."\n";
			$s_Request .="Content-Type: text/xml\n";
			$s_Request .="Content-Length: ".strlen($s_POST_DATA)."\n";
			$s_Request .="\n".$s_POST_DATA."\n\n";
			
			$fp = fsockopen ($this->sms_host, $this->sms_port, $errno, $errstr, 30);
			if(!$fp)
			{echo $errno;
				$this->_error = "ERROR: $errno - $errstr<br />\n";
				return false;
			};
			fputs ($fp, $s_Request);
			while (!feof($fp)) {
				$this->GatewayResponse .= fgets ($fp, 128);
			}
			fclose ($fp);

			@preg_match("/^(.*?)\r?\n\r?\n(.*)/s", $this->GatewayResponse, $match);
			$this->GatewayResponse =$match[2];

			return $this->GatewayResponse;
		}

		function _sendCRequest($s_POST_DATA)
		{
			//echo "https://".$this->sms_host.":".$this->sms_port.$this->sms_url;
			$ch = curl_init( "http://sms.dialogue.co.uk/cgi-bin/messaging/messaging.mpl");
			//curl_setopt( $ch, CURLOPT_USERPWD, $this->sms_user.":".$this->sms_pwd );
			curl_setopt($ch, CURLOPT_POST, 1 );
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT,30 );
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$s_POST_DATA);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			$this->_result=curl_exec( $ch );
			if(curl_error($ch)!="")
			{
			 $this->_error = "ERROR: ".curl_error($ch)."<br />\n";
			return false;
			}
			curl_close($ch);

			return $this->_result;
		}
		
		/***********************************************************************
		 *** XML Parser - Callback functions                                 ***
		 ***********************************************************************/
		function epXmlElementStart ($parser, $tag, $attributes) {
			$this->currentTag = $tag;
			
			/*$this->_parentnode['node'][$this->_parentnode[$parser]]=$tag;
			$this->_parentnode[$parser]++;*/
			
		}
		
		function epXmlElementEnd ($parser, $tag) {
			$this->currentTag = "";
			//$this->_parentnode[$parser]--;
		}
		
		function epXmlData ($parser, $cdata) {
	        $this->xmlData[$this->currentTag][] = $cdata;
		}
		
		function _parseXML()
		{
            $this->_parser = xml_parser_create();
            
            // Disable XML tag capitalisation (Case Folding)
            xml_parser_set_option ($this->_parser, XML_OPTION_CASE_FOLDING, TRUE);
            
            // Define Callback functions for XML Parsing
            xml_set_object($this->_parser, &$this);
            xml_set_element_handler ($this->_parser, "epXmlElementStart", "epXmlElementEnd");
            xml_set_character_data_handler ($this->_parser, "epXmlData");
            
            // Parse the XML response
            xml_parse($this->_parser, $this->_result, TRUE);
            if( xml_get_error_code( $this->_parser ) == XML_ERROR_NONE ) {
                // Get the result into local variables.
                //print_r($this->xmlData);
                if(isset($this->xmlData['FAULT']))
				{
					$myError = $this->xmlData["I4"][0];
		            $myErrorMessage = $this->xmlData["STRING"][0];
					$this->_error.="Error($myError):".$myErrorMessage ;
					return false;
				}
	            return $this->xmlData;
            } else {
                // An XML error occured. Return the error message and number.
                $myError = xml_get_error_code( $this->_parser ) + XML_ERROR_OFFSET;
                $myErrorMessage = xml_error_string( $myError );
				$this->_error="Error($myError):".$myErrorMessage ;
				return false;
            }
            // Clean up our XML parser
            xml_parser_free( $this->parser );

		}		
		
		/**
		 * Return last error occured
		 *
		 * @return String
		 */
		function error()
		{
			return $this->_error;
		}
	}
?>