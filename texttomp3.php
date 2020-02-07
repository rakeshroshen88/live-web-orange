<?php

	//get the text 
   $text = substr($_POST['keyword'], 0, 100);
   
   //we are passing as a query string so encode it, space will become +
   $text = urlencode($text);
   
   //give a file name and path to store the file
   $file  = rand(10,100);
   $file = "audio/" . $file . ".mp3";
   
   //now get the content from the Google API using file_get_contents
   $mp3 = file_get_contents("https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=$text&tl=en-IN");
   
   //save the mp3 file to the path
   file_put_contents($file, $mp3);
	echo $file;
?>
