<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 

	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/bootstrap-table.js"></script>
	<script>
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
