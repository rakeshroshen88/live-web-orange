<div class="shadow_box" style="text-align:center; margin-top:35px; " align="right"><div id="map_canvas" style="height:350px; width:900px;" >Google Map</div></div>
    
       
       
       <input id="address"  type="hidden" value="c 7/4 , NITHARI, NOIDA SECTOR 31, UP, INDA">
       <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCHjEdSo36jq0S-tEF1Ksn-JGSKjnEn6Qw&sensor=true">
</script>
   <script type="text/javascript">
     var geocoder;
 var map;
 function initialize() {
   geocoder = new google.maps.Geocoder();
   var latlng = new google.maps.LatLng(28.24, 77.18);
   var myOptions = {
     zoom: 15,
     center: latlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }
   map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
codeAddress();
 }

 function codeAddress() {
   var address = document.getElementById("address").value;
   geocoder.geocode( { 'address': address}, function(results, status) {
     if (status == google.maps.GeocoderStatus.OK) {
       map.setCenter(results[0].geometry.location);
       var marker = new google.maps.Marker({
           map: map,
           position: results[0].geometry.location
       });
     } else {
     alert("Geocode was not successful for the following reason: " + status);
     }
   });
 }
 
 google.maps.event.addDomListener(window, 'load', initialize);  

   </script>

  
  
  
  
  

<!--<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script type="text/javascript">
jQuery(document).ready(function()
{
var start=/@/ig; // @ Match
var word=/@(\w+)/ig; //@abc Match
  
jQuery("#contentbox").on("keyup",function()
//jQuery("#contentbox").live("keyup",function()
{
var content=jQuery(this).text(); //Content Box Data
var go= content.match(start); //Content Matching @
var name= content.match(word); //Content Matching @abc
var dataString = 'searchword='+ name;
console.log(go);
//If @ available
if(go.length>0)
{
jQuery("#msgbox").slideDown('show');
jQuery("#display").slideUp('show');
jQuery("#msgbox").html("Type the name of someone or something...");
//if @abc avalable
if(name.length>0)
{
jQuery.ajax({
type: "POST",
url: "boxsearch.php", // Database name search
data: dataString,
cache: false,
success: function(data)
{
jQuery("#msgbox").hide();
jQuery("#display").html(data).show();
}
});
}
}
//return false();  
});

//Adding result name to content box.

jQuery(".addname").on("click",function()
{
var username=jQuery(this).attr('title');
var old=jQuery("#contentbox").html();
var content=old.replace(word," "); //replacing @abc to (" ") space
jQuery("#contentbox").html(content);
var E="<a class='red' contenteditable='false' href='#' >"+username+"</a>";
jQuery("#contentbox").append(E);
jQuery("#display").hide();
jQuery("#msgbox").hide();
});
});
</script>
@abc Match
<div id="container">
<div id="contentbox" contenteditable="true">
</div>
<div id='display'>
</div>
<div id="msgbox">
</div>
</div>
<style>
#container
{
margin:50px; padding:10px; width:460px
}
#contentbox
{
width:458px; height:50px;
border:solid 2px #333;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
margin-bottom:6px;
text-align:left;
}
#msgbox
{
border:solid 1px #dedede;padding:5px;
display:none;background-color:#f2f2f2
}
#display
{
display:none;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
}
.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
.image
{
width:25px; float:left; margin-right:6px
}
</style>