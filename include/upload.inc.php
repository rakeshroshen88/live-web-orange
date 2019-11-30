<?php


     /*
     ###############################################
     ####                                       ####
     ####    Author : chittaranjan            ####
     ####    Date   : 30 Sep,2004               ####
     ####    Updated:                           ####
     ####                                       ####
     ###############################################

     */

  class UPLOAD
  {
  	var $directory_name;
  	var $max_filesize;
  	var $error;
  	var $file_name;
  	var $full_name;
  	var $file_size;
  	var $file_type;
  	var $check_file_type;
  	var $thumb_name;
    var $tmp_name;
    
   	function set_directory($dir_name = ".")
  	{
  	 $this->directory_name = $dir_name;
  	}

   	function set_max_size($max_file = 3000000)
  	{
  	 $this->max_filesize = $max_file;
  	}
  	
  	function check_for_directory()
  	{
        if (!file_exists($this->directory_name))
        {
           mkdir($this->directory_name,0777);
        }
        @chmod($this->directory_name,0777);
  	}

   	function error()
  	{
  	 return $this->error;
  	}

  	function set_file_size($file_size)
  	{
  	 $this->file_size = $file_size;
  	}

  	function set_file_type($file_type)
  	{
  	 $this->file_type = $file_type;
  	}
	
  	function get_file_type()
  	{
  	 return $this->file_type;
  	}

  	function set_temp_name($temp_name)
  	{
  	 $this->tmp_name = $temp_name;
  	}

   	function set_file_name($file)
  	{
  		$this->file_name = $file;
  		$this->full_name = $this->directory_name."/".$file;
  	}
  	/*
	* @PARAMS : 
	* 	$uploaddir : Directory Name in which uploaded file is placed
	* 	$name : file input type field name
	* 	$rename : you may pass string or boolean 
	* 			 true : rename the file if it already exists and returns the renamed file name.
	* 			 String : rename the file to given string.
	* 	$replace =true : replace the file if it is already existing
	* 	$file_max_size : file size in bytes. 0 for default
	* 	$check_type : checks file type exp ."(jpg|gif|jpeg)"
	* 
	* 	Example UPLOAD::upload_file("temp","file",true,true,0,"jpg|jpeg|bmp|gif")
	* 
	* return : On success it will return file name else return (boolean)false
	*/
	
    function upload_file($uploaddir,$name,$rename=null,$replace=false,$file_max_size=0,$check_type="")
    {

        $this->set_file_type($_FILES[$name]['type']);
        $this->set_file_size($_FILES[$name]['size']);
        $this->error=$_FILES[$name]['error'];
        $this->set_temp_name($_FILES[$name]['tmp_name']);
        $this->set_max_size($file_max_size);

		$this->set_directory($uploaddir);
        $this->check_for_directory();
        $this->set_file_name($_FILES[$name]['name']);

		

		if(!is_uploaded_file($this->tmp_name))
		 $this->error = "File ".$this->tmp_name." is not uploaded correctly.";

		if(empty($this->file_name))
		 $this->error = "File is not uploaded correctly.";
		if($this->error!="")
          return false;


		/* if(!empty($check_type))
        {
		   if(!eregi("\.($check_type)$",$this->file_name))
		   {
           	 $this->error="File type error : Not a valid file";
			 return false;
			}
        } */

		if(!is_bool($rename)&&!empty($rename))
		{
			if(preg_match("/\..*+$/",$this->file_name,$matches))
			   $this->set_file_name($rename.$matches[0]);
		}
		elseif($rename && file_exists($this->full_name))
		{
			if(preg_match("/\..*+$/",$this->file_name,$matches))
			   $this->set_file_name(substr_replace($this->file_name,"_".rand(0, rand(0,99)),-strlen($matches[0]),0));
		}

		if(file_exists($this->full_name))
        {
          if($replace)
            @unlink($this->full_name);
          else
		  {
           	 $this->error="File error : File already exists";
			 return false;
		  }
        }

		
        $this->start_upload();
        if($this->error!="")
          return false;
        else
          return $this->file_name;
    }

  	function start_upload()
  	{
  		if(!isset($this->file_name))
  		 $this->error = "You must define filename!";

      if ($this->file_size <= 0)
  		 $this->error = "File size error (0): $this->file_size Bytes<br>";

      if ($this->file_size > $this->max_filesize && $this->max_filesize!=0)
  		 $this->error = "File size error (1): $this->file_size Bytes<br>";

       if ($this->error=="")
       {
			$destination=$this->full_name;
  			if (!@move_uploaded_file ($this->tmp_name,$destination))
  			 $this->error = "Impossible to copy ".$this->file_name." from $userfile to destination directory.";
  		}
  	}

  }
?>

