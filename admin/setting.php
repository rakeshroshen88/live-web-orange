<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php include('header.php') ; ?>
    <?php include('left-menu.php') ; ?>
    
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Index</li>
			</ol>
		</div><!--/.row-->
		
		 <?php include('all-count.php') ; ?>
        
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default"> 
					<div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> Change Password</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
                                
                                <div class="col-md-6 col-md-offset-2">
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-4 control-label">New Password</label>
									<div class="col-md-8">
									<input id="name" name="name" type="text" placeholder="New Password " class="form-control">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-4 control-label" >Confirm Password</label>
									<div class="col-md-8">
										<input id="email" name="email" type="text" placeholder="Confirm Password" class="form-control">
									</div>
								</div>
								
                                  
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-center text-center">
										<button type="submit" class="btn btn-default btn-md ">Submit</button>
									</div>
								</div>
                                
                                
                                
                                </div>
							</fieldset>
						</form>
					</div>
                    
                    
                    
                    
                     <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>
    
    
     
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
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
