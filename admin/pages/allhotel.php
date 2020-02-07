+<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HOTELS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/vacanza.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="css/fonts.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--animation-->
    <link href="css/animate.css" rel="stylesheet" />
    <script src="js/wow.min.js"></script>
    <script>
       new WOW().init();
     </script>
    <!--end animation-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css' />
    
   <!--navigation--> 
  <link href="css/megamenu.css" rel="stylesheet" />
<style>.megamenu{margin: 0 0 0 0;}.megamenu > li.grid .megapanel .row [class*="col"]{background: #ccc !important;}.megamenu h4{margin-top: 0;}.megamenu .adress{}.megamenu .adress label{float: left;width: 100%;margin-bottom: 2px;}</style>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--end navigation--> 


<script>
$(window).scroll(function(){
    if ($(window).scrollTop() >= 100) {
       $('.hnav').addClass('fixed-header');
    }
    else {
       $('.hnav').removeClass('fixed-header');
    }
});
</script>
   
  </head>
  <body>
<div class="vmain">

<!--header-->
<?php include('header.php'); ?>
<!--end header-->
 
 <!--navigation-->
<?php include('nav.php'); ?>
 <!--end navigation-->
 

 <div class="clear"></div>
 
 <!--banner-->
 <div class="vbanner vhotel">
 <div class="container">
 <div class="row">
 <div class="col-md-6 col-md-offset-3">
 <h2><i class="fa fa-building"></i> India's Hotels</h2>
 </div>
 </div>
 </div>
 </div>
 <!--end banner-->
 
 <!--section-->
 <div class="vsection">
 <div class="container">
 <div class="vinall">
     <div class="row">
     <!--dest 1-->
         <div class="col-md-12">
            
              <!--Destination By Themes-->
             <div class="hotdest">
             <h2>Hotels List <span>Find holiday options by the experience you want to have</span></h2>
             
            
             <?php
				
				$db4=new DB();
				$db6=new DB();
				$db3=new DB();
				$db2=new DB();
				 
				$tt1=base64_decode($_REQUEST['tid']);
				$sql6="SELECT * FROM $_TBL_THEME WHERE status='1' and id='$tt1'";
				$db6->query($sql6)or die($db6->error());
				$rowt=$db6->fetchArray();
				$sql4="SELECT * FROM $_TBL_HOTEL WHERE status='1' order by id desc ";
				$db4->query($sql4)or die($db4->error());
				$dcount=$db4->numRows();
				if($db4->numRows()>0)
				{
				while($row2=$db4->fetchArray()){ 
				$cid=$row2['cityid'];
				$city=$db3->getSingleResult("select cityname from cities where id=".$cid);
				
				 $sql3="SELECT * FROM $_TBL_ITEMIMAGE WHERE item_id='".$row2['id']."' limit 0,1 ";
								$db2->query($sql3)or die($db2->error());
								if($db2->numRows()>0)	
								{
								$imagerowt=$db2->fetchArray();
								}
				?>    
           
            
            
             <div class="col-md-4">
                <div class="view view-seventh">
                    <img src="<?=$_SITE_PATH?>upload/<?=$imagerowt['image']?>" />
                    <div class="mask">
                        <h2><?=$row2['title']?></h2>    
						 <p><?=$row2['place']?> </p>
                        <a href="hotel-details.php?hid=<?php echo base64_encode($row2['id']);?>" class="info"> View More</a>
                    </div>
                </div>
            </div>   
                
				<?php }}?> 
                <!--end boxes-->
            
            
             </div>
             <!--end  destination by THemes-->
          
           
             
         </div>
         <!--end dest 1-->
       
         
     </div>
 </div>
 </div>
 </div>
 <!--end section-->
 
 <!--footer-->
<?php include('footer.php'); ?>
<!--end footer-->
   
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</div> 
  </body>
</html>