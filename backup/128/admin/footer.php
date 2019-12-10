<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 

	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/bootstrap-table.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&sensor=false&libraries=places&ver=0.4b" async defer></script>
	<script type='text/javascript' src='../js/jquery.geocomplete.js?ver=0.4b'></script>
<script>
jQuery(document).ready(function ($) {

jQuery("#address").attr("autocomplete","location16");

jQuery("#address").geocomplete({
map: ".map_canvas",
details: "form",
types: ["geocode", "establishment"],
}).bind("geocode:result", function(event, result){
//jQuery("#state").val(result.address_components[2].long_name);
//console.log(result);

});

jQuery("#title").attr("autocomplete","title");

jQuery("#title").geocomplete({
map: ".map_canvas",
details: "form",
types: ["geocode", "establishment"],
}).bind("geocode:result", function(event, result){
//jQuery("#state").val(result.address_components[2].long_name);
//console.log(result);

});

});
jQuery(document).ready(function(){
  jQuery(".view").click(function(){
 var v=jQuery(this).attr('v');

    jQuery("#review"+v).toggle();
  });
});
</script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
