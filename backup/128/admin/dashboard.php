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
    <?php include('left-menu.php') ; 
	$sqladmin="select * from ".$_TBL_ADMIN ." where id='1' ";
$db->query($sqladmin);
$row=$db->fetchArray();
	
	?>
    
    
    
    
    
     <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Admin Setting</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Admin Management</div>
					<div class="panel-body">
                    
                    
						<table data-toggle="table"  data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="true" >Admin </th>
						        <th data-field="id" data-sortable="true">Admin Name</th>
						        <th data-field="name"  data-sortable="true">Admin Email</th>
                                <th data-field="name1"  data-sortable="true">Admin Phone</th>
						        <th data-field="price" data-sortable="true">Admin Address</th>
						    </tr>
                            
						    </thead>
                            
                             <tr><td></td>
						        <td><?=$row['adminname']?> </td>
						        <td><?=$row['adminemail']?></td>
						        <td><?=$row['adminphone']?></td>
                                <td><?=$row['adminaddress']?></td>
						       
						    </tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		 <!--/.row-->	
		
		
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
