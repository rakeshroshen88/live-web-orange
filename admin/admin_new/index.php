<?php include("header.php");
  if($_SESSION['Super_admin']=='superadmin'){
	   include("adminhomepage.php");
  }else{
	   include("restaurenthomepage.php");
  }
include("footer.php"); ?>