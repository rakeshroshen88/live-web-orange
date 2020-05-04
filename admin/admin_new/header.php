<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Admin Panel</title>            
        
       
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="css/styles.css">
        <!-- EOF CSS INCLUDE -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<style>
		.btn.btn-icon-fixed span[class^='icon-'], .btn.btn-icon-fixed span.fa {
    position: absolute;
    left: 0px;
    top: 0px;
    width: 40px;
    height: 30px !important;
   
}
		</style>
    </head>
    <body>        
        <?php
	//include("../common.php");
	include("../../config.inc.php");

	?>
        <!-- APP WRAPPER -->
        <div class="app">           

            <!-- START APP CONTAINER -->
            <div class="app-container  app-sidebar-left-minimized">
                <!-- START SIDEBAR -->
                <?php include("sidemenu.php") ?>
                <!-- END SIDEBAR -->
                

                <!-- START APP CONTENT -->
                <div class="app-content app-sidebar-left">
                    <!-- START APP HEADER -->
                   	<?php include("headerbar.php") ?>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>      	 
                    <!-- END PAGE HEADING -->