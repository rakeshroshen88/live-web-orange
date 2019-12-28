<?php include('header.php');
include('chksession.php');

 $page=base64_decode($_REQUEST['page']);
if($page=='product'){
$pid=base64_decode($_REQUEST['pid']);
 $sql="SELECT * from ".$_TBL_PROD1." where id='$pid'";	
 $db->query($sql);	
 if($db->numRows()>0){
$row=$db->fetchArray();	
}
$path='product/'.$row['prod_large_image'];
$title=$row['prod_name'];
}

if($page=='destination'){
	$pid=$_REQUEST['pid'];
 $sql="SELECT * from ".$_TBL_DESTINATION." where id='$pid'";	
 $db->query($sql);	
 if($db->numRows()>0){
$row=$db->fetchArray();	
}
$path='destination/'.$row['picture'];
$title=$row['title'];
}
?>

<style type="text/css">
    .chatfeature-leftbar{display: none}
</style>
     
    <main>
        <div class="main-section">
             <div class="container">
                <div class="col-md-8">
            <div class="background-white"> <!----- background-white -->
                <div class="feedbackpage">
                    <div class="product-details">
                        <div class="prodimg">
                           <img  src="<?=$_SITE_PATH?><?=$path?>" alt="<?=$row['prod_name']?>">
                        </div>
                        <div class="productdnsefedabc">
                            <h2><?=$title?> </h2>
                           
                        </div>
                    </div>
                    <div class="feedabcklisting">
                        <h3 class="feedabctitle">Your first-hand experiences really help other. Thanks!</h3>

                        <form name="feedback" id="feedback" class="feedback">
                                <div class="ratingfeed">
                                    <h4>Your overall rating of this attraction</h4><input type="hidden" id="page" name="page" value="<?=$page?>" />
<input type="hidden" id="page1" name="page1" value="<?=$_REQUEST['page']?>" />
 <input type="hidden" id="pid" name="pid" value="<?=$pid?>" /> 
  <input type="hidden" id="oldpid" name="oldpid" value="<?=$_REQUEST['pid']?>" /> 


                                    <div class="wrapper1">
  <input type="checkbox" id="st1" name="rate" value="1" />
  <label for="st1"></label>
  <input type="checkbox" id="st2" name="rate" value="2" />
  <label for="st2"></label>
  <input type="checkbox" id="st3" name="rate" value="3" />
  <label for="st3"></label>
  <input type="checkbox" id="st4" name="rate" value="4" />
  <label for="st4"></label>
  <input type="checkbox" id="st5" name="rate" value="5" />
  <label for="st5"></label>
</div>

                                </div>

                                <div class="form-group">
                                    <label>Title of your review</label>
                                    <input type="text" class="form-control"  name="title" id="title" required>
                                </div>

                                <div class="form-group">
                                    <label>You review</label>
                                    <textarea class="form-control" rows="5" name="review" id="review" required ></textarea>
                                </div>

                                <div class="checkbocfortx">
                                    <span class="boxchecktx"><input type="checkbox" name="certify" id="cf" required></span>
                                    <span class="boxchecktx-details">
                                        I certify that this review is based on my own experience and is my genuine opinion of this establishment and that I have no personal or business relationship with this establishment, and have not been offered any incentive or payment originating from the establishment to write this review. I understand that Orange State has a zero-tolerance policy on fake reviews.
                                    </span>
									<span id="error_cf"> </span>
                                </div>

                                <div class="form-group">
                                    <input type="button" value="Submit Your Review" class="btn btn-primary priorg productfeedback" id="submitnew" name="Submit">
                                </div>




                        </form>
                    </div>



                </div>
                
  
        </div><!----- background-white -->
    </div>

    </div>

        </div>

    </main>

    <?php include('footer.php') ?>