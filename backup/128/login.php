<?php 
session_start();
$fb = new Facebook\Facebook([
  'app_id' => '{456693944981224}', // Replace {app-id} with your app id
  'app_secret' => '{a183f640e3e138c9f04ae8d87a89cd9b}',
  'default_graph_version' => 'v5.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://orangestate.ng/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>