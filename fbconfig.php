<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '456693944981224'; //Facebook App ID
$appSecret = 'a183f640e3e138c9f04ae8d87a89cd9b'; // Facebook App Secret
$homeurl = 'http://orangestate.ng/index';  //return to home
//$fbPermissions = 'chittaranjan.roy90@gmail.com';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>