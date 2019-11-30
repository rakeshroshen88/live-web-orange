<?php

	/**
	 * @access Public
	 * @author Harish Kumar
	 * @name mimemail.inc.php
	 * @version 1.0.0
	 * 
	 * You can send the mime mails with attachments with help of this class
	 *
	 */


    define("CRLF","\r\n");
     
	class MIMEMAIL
	{
		var $parts;
		var $to;
		var $cc;
		var $bcc;
		var $from;
		var $headers;
		var $subject;
		var $body;
		var $html;
		var $host;
		var $port;
		var $error;
		var $line_sep;
			
		/**
		 * Conustructor
		 *
		 * @return MIMEMAIL
		 */
		function MIMEMAIL()
		{
			$this->parts=array();
			$this->to="";
			$this->cc="";
			$this->bcc="";
			$this->from="";
			$this->subject="";
			$this->body="";
			$this->headers=null;
			$this->html=false;
		}
		
		/**
		 * @access Private
		 * return the mime type of file based on file extension
		 * @param String: $file
		 * @return String
		 */
		function get_mime_type($file)
		{
			$file = basename($file);
			$file_extension = strtolower(substr(strrchr($file,"."),1));
	
			 switch( $file_extension ) 
			 {
				 case "pdf": $ctype="application/pdf"; break;
				 case "exe": $ctype="application/octet-stream"; break;
				 case "zip": $ctype="application/zip"; break;
				 case "doc": $ctype="application/msword"; break;
				 case "xls": $ctype="application/vnd.ms-excel"; break;
				 case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
				 case "gif": $ctype="image/gif"; break;
				 case "png": $ctype="image/png"; break;
				 case "jpeg":
				 case "jpg": $ctype="image/jpg"; break;
				 case "mp3": $ctype="audio/mpeg"; break;
				 case "wav": $ctype="audio/x-wav"; break;
				 case "mpeg":
				 case "mpg":
				 case "mpe": $ctype="video/mpeg"; break;
				 case "mov": $ctype="video/quicktime"; break;
				 case "avi": $ctype="video/x-msvideo"; break;
	
				 //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
				 case "php":
				 case "asp":
				 case "pl":
				 case "cgi":
				 case "aspx":
				 case "c":
				 case "cpp":
				 case "xml":
				 case "csv":
				 case "htm":
				 case "html":
				 case "txt": $ctype="text/html"; break;
	
				 default: $ctype="application/octet-stream";
		   }
		   return $ctype;
		}
		
		function is_email($email)
		{
			if(!preg_match("/^([A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+,?)+$/",$email))
				return false;
			return true;
		}

		function add_attachment($message,$name="",$ctype="application/octet-stream")
		{
			$this->parts[]=array(
							"ctype"=>$ctype,
							"message"=>$message,
							"encode"=>"base64",
							"name"=>$name
							);			
		}
		
		function attach($files = null)
		{
			if(empty($files))
				return;
			if(!is_array($files))
				$files = array($files);
			foreach($files as $file)
			{
				if(!is_file($file))
				{
					$this->error.= "Error: File not found: $file <br>".CRLF;
					continue;
				}
				
				$data = file_get_contents($file);
  				$this->add_attachment($data,basename($file),$this->get_mime_type($file));
			}
			
		}
		
		function build_message($part)
		{
			$message=$part["message"];
			$message=chunk_split(base64_encode($message));
			$encoding="base64";
			return "Content-Type: ".$part["ctype"].($part["name"]? ";name=\"".$part["name"]."\"" : "").
					CRLF."Content-Transfer-Encoding: $encoding".CRLF.CRLF."$message".CRLF;
			
		}
		
		function build_multipart()
		{
			$boundry="HKC".md5(uniqid(time()));
			$multipart="Content-Type: multipart/mixed; boundary= \"$boundry\"".CRLF.CRLF;
			$multipart.="This is a MIME encoded message.".CRLF.CRLF."--$boundry";
			
			for($i=sizeof($this->parts)-1;$i>=0;$i--)
			{
				$multipart.=CRLF.$this->build_message($this->parts[$i])."--$boundry";
			}
			return $multipart.="--".CRLF;
		}
		
		function get_mail($complete=true)
		{
			$mime="";
			if(!empty($this->from))
				$mime.="From: ".$this->from.CRLF;
			if(!empty($this->headers) && is_array($this->headers))
			{
				foreach($this->headers as $header=>$header_value)
					$mime.="$header: $header_value".CRLF;					
			}
			else if(!empty($this->headers))
				$mime.=$this->headers.CRLF;
			if($complete)
			{
				if(!empty($this->cc))
					$mime.="Cc: ".$this->cc.CRLF;
				if(!empty($this->bcc))
					$mime.="Bcc: ".$this->bcc.CRLF;
				if(!empty($this->subject))
					$mime.="Subject: ".$this->subject.CRLF;
			}
			
			if(!empty($this->body))
				$this->add_attachment($this->body,"",($this->html? "text/html":"text/plain"));
			$mime.= "MIME-Version: 1.0".CRLF.$this->build_multipart();
			return $mime;
		}
		
		function send()
		{
			if(empty($this->to) || !$this->is_email($this->to))
			{
				$this->error = "Error: Recipient(s) are not well defined";
				return false;
			}
			
			if(!empty($this->cc))
				$mime=$this->get_mail(true);
			else
				$mime=$this->get_mail(false);

			if(!empty($this->host))
				ini_set("SMTP",$this->host);
			
			if(!empty($this->error))		
				return false;
			return mail($this->to,$this->subject,"",$mime);
		}
	}
	
?>