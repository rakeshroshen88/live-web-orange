<?php include('header.php') ?>
<body>
    <div class="business-search">
        <div class="container">
            <div class="formsechform">
                 <form action="business_directory_search.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="searchtype">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Business Name.." name="bname" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Location..." name="blocation" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="category" id="category" class="form-control" required >
  <option value="">Select</option>
  <?php 
		
		$sql="SELECT * FROM com_category WHERE menuname='company'";
		$db->query($sql)or die($db->error());
		while($row1=$db->fetchArray()){	?>
  <option value="<?=$row1['catname']?>" <?php if($row['catid']===$row1['catname']){ echo "selected"; } ?>><?=$row1['catname']?></option>
		<?php } ?>
   
  
</select> 
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="submit" class="form-sub-new fa-input" name=""><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <section class="business_cat slider">
                   <?php  $sql1="SELECT id, logoimage FROM business_hub";
		$db->query($sql1)or die($db->error());
		while($row1=$db->fetchArray()){ 
		if(!empty($row1['logoimage'])){
		?><a href="business_directory_profile.php?bid=<?=base64_encode($row1['id'])?>">
        <div class="slide"><img src="upload/<?=$row1['logoimage']?>" /></div></a>
		<?php }else{?>
			<a href="business_directory_profile.php?bid=<?=base64_encode($row1['id'])?>"><div class="slide"><img src="img/noimg.jpg" /></div></a>
		<?php }?>
		<?php }?>
                </section>
            </div>
        </div>

        <section class="mainslider-business-home">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <!--<div class="carousel-item active">
                        <img src="slider/la.jpg" class="d-block w-100" alt="..." />
                    </div>-->
					<?php   
$ct=1;
$sql="SELECT * FROM slider_add where section='businesshubslider' and img_type='hub'";
		$db->query($sql)or die($db->error());
		while($row1=$db->fetchArray()){ 
		
		if(!empty($row1['picture'])){
			if($ct==1){
		?>
		
		<div class="carousel-item active">
			<?php }else{ ?>
			<div class="carousel-item">
			<?php } ?>
			<a href="<?=$row1['addlink']?>" target="_blank">
                                <img src="slider/<?=$row1['picture']?>"  class="d-block w-100">
                                     </a> 		
		 </div>
		<?php }else{?>
		<div class="carousel-item">
			<a href="<?=$row1['addlink']?>" target="_blank"><img src="img/noimg.jpg" class="d-block w-100" /> </a></div>
		<?php }?>
		
		<?php $ct=$ct+1; } ?>

                   <!-- <div class="carousel-item">
                        <img src="slider/la_90.jpg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="slider/la_73.jpg" class="d-block w-100" alt="..." />
                    </div>-->
                </div>
            </div>
        </section>

       
	   
	    <section class="logolisthome-bisi">
            <div class="row">
                <div class="col-md-10">
                    <ul>
	   <?php  $sql="SELECT id, imgid FROM com_category";
		$db->query($sql)or die($db->error());
		while($row=$db->fetchArray()){ ?>
		
		              <li>
                            <a href="business_directory_list.php?bid=<?=base64_encode($row['id'])?>">
                                <? 
		if(!empty($row['imgid'])){
		?>			
		 <img src="category/<?=$row['imgid']?>" />
		<?php }else{?>
			<div class="slide"><img src="img/noimg.jpg" /></div>
		<?php }?>
                            </a>
                      </li>
					
		<?php }?>
					
                        

                    
                    </ul>
                </div>

                <div class="col-md-2">
                    <div class="sidebar1">
					
							<?php $db1=new DB();
								 $sql1="SELECT * FROM slider_add where img_type='hub' and section='businesshub' limit 0,3";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
                                
					
					
					
                        <div class="ads-sidebar">
                              <a href="<?=$row1['addlink']?>" target="_blank">
                                <img src="slider/<?=$row1['picture']?>"  alt="...">
                                     </a>    
                        </div>
<?php } ?>
                        
                    </div>
                </div>
            </div>
        </section>
   



	   </div>

    <?php include('footer.php') ?>
</body>
