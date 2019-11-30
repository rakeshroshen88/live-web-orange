<?php include("config.inc.php");  ?>
<style>
.wishlistcartemoji{ width: 300px !important;    bottom: 0!important;    height: 200px!important;    top: inherit !important; }
.wishlistcartemoji li{display:inline;width:50px;}
.wishlistcartemoji li a img{    width: 30px !important;  height: 30px !important;}
#close{float: right; margin:10px;}
</style>
<ul class="wishlistcartemoji" style="display:none;"  >
<div id="close"><a href="javascript:void(0)">X</a></div>
<?php $to_user_id=$_POST['to_user_id'];
  $sql1="SELECT * FROM emoji order by id desc";
$db->query($sql1)or die($db->error());
while($row1=$db->fetchArray()){
 $ext = pathinfo($row1['image'], PATHINFO_EXTENSION);	
if($ext=='mp3'){
	
				$a.='';					 
 }else{	
				$b.='<li>
							  <a href="javascript:void(0);" eid="'.$row1['id'].'" im="'.$row1['image'].'" uidnew="'.$to_user_id.'" mp3="'.$row1['mp3'].'"  class="emoji"><img src="emoji/'.$row1['image'].'" height="50" width="50" />
						</a>
						</li>';

 } } echo $b;echo "</ul>"; 
?>
