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
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Contact Form</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name</label>
									<div class="col-md-9">
									<input id="name" name="name" type="text" placeholder="Your name" class="form-control">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Your E-mail</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control">
									</div>
								</div>
								
                                
                                
                                	<!-- Select input-->
    								<div class="form-group">
    									<label class="col-md-3 control-label">Select Country</label>
    									<div class="col-md-9">
                                            <select class="form-control">
                                                <option>India</option>
                                                <option>Pak</option>
                                                <option>India</option>
                                                
                                            </select>
    									 
    									</div>
    								</div>
                                    
                                    
                                    
                                    	<!-- Select input-->
        								<div class="form-group">
        									<label class="col-md-3 control-label">Select Country</label>
            									<div class="col-md-9">
                                                    <select class="form-control">
                                                        <option>India</option>
                                                        <option>Pak</option>
                                                        <option>India</option>
                                                        
                                                    </select>
            									 
            									</div>
        								</div>
                                        
                                        
                                         
                                        
                                    
                                    
                                    	<!-- File input-->
        								<div class="form-group">
        									<label class="col-md-3 control-label">File input</label>
        									<div class="col-md-9">
                                                <input type="file">
        									 
        									</div>
        								</div>
                                        
                                       	<!-- Chcek box input-->
        								<div class="form-group">
        									<label class="col-md-3 control-label">Checkboxes</label>
        									<div class="col-md-9">
                                                 <div class="checkbox">
                										<label>
                											<input type="checkbox" value="">Checkbox 1
                										</label>
                									</div>
                									<div class="checkbox">
                										<label>
                											<input type="checkbox" value="">Checkbox 2
                										</label>
                									</div>
                									<div class="checkbox">
                										<label>
                											<input type="checkbox" value="">Checkbox 3
                										</label>
                									</div>
                									<div class="checkbox">
                										<label>
                											<input type="checkbox" value="">Checkbox 4
                										</label>
                									</div>
        									</div>
        								</div>
                                        
                                        
                                        
                                         
                                         
                                         	<!-- Radio input-->
                								<div class="form-group">
                									<label class="col-md-3 control-label">Radio input</label>
                									<div class="col-md-9">
                                                        <div class="radio">
                    										<label>
                    											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio Button 1
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Button 2
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
                    										</label>
                    									</div>
                									</div>
                								</div>
                                                
                                                
                                        
                                        
                                       
                                
                                
                                
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Your message</label>
									<div class="col-md-9">
										<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Submit</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
                    
                    
                    
                    
                    <div class="row">
            			<div class="col-lg-12">
            				<div class="panel panel-default">
            				 
            					<div class="panel-body">
                                 
            						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            						    <thead>
            						    <tr>
            						        <th data-field="state" data-checkbox="true" >Item ID</th>
            						        <th data-field="id" data-sortable="true">Item ID</th>
            						        <th data-field="name"  data-sortable="true">Item Name</th>
            						        <th data-field="price" data-sortable="true">Item Price</th>
            						    </tr>
            						    </thead>
            						</table>
            					</div>
            				</div>
            			</div>
            		</div><!--/.row-->	
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
