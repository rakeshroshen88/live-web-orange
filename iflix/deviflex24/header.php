 <?php include("../../config.inc.php");
 if(empty($_SESSION['SES_ADMIN_ID'])){
		$_SESSION['SES_ADMIN_ID']=$_REQUEST['aid'];
	}else{
		$_SESSION['SES_ADMIN_ID']=$_SESSION['SES_ADMIN_ID'];
	}
    $sql="SELECT * FROM $_TBL_ADMIN WHERE id='".$_SESSION['SES_ADMIN_ID']."'";
	$result = $db->query($sql)or die($db->error()); 
	if($row=$db->fetchArray())
		{  
			 $_SESSION['SES_ADMIN_ID']=$row['id'];
			 $_SESSION['SES_USERTYPE']=$row['usertype'];
			 $_SESSION['SES_ADMIN_USER']=$row['adminname'];
			 $_SESSION['Super_admin']=$row['admintype'];
			 $_SESSION['rid']=$row['resturant_id'];
		} 
if(empty($_SESSION['SES_ADMIN_ID'])){
		 redirect("//iflex.ng/admin/index.php");
	 } 
	 $link = mysqli_connect("localhost", "iflex_iflexaccess", "pa@0lo~O=Ui3", "iflex_datahub");
?> 
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
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script> 
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
      
        <!-- APP WRAPPER -->
        <div class="app">           

            <!-- START APP CONTAINER -->
            <div class="app-container  app-sidebar-left-minimized">
                <!-- START SIDEBAR -->
                <?php 
				if($_SESSION['SES_USERTYPE']=='restaurant'){
				include("restaurentsidemenu.php");
				}else{
				
				include("sidemenu.php"); 
				}
				?>
                <!-- END SIDEBAR -->
                

                <!-- START APP CONTENT -->
                <div class="app-content app-sidebar-left">
                    <!-- START APP HEADER -->
                   	<?php include("headerbar.php") ?>
                 	 
                    <!-- END PAGE HEADING -->