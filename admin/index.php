<?php include("../config.inc.php")?>
<?php
$db5=new DB();
if(isset($_POST['Login']))
{	 $password =md5($_POST['admin_pwd']);
	  $salt =md5('samastkjfsdlkhfks5424737&^ds#@$^@$#&kjipu748574r random');

	  $hash = md5($salt . $password);
	$admin_uid=$_POST['admin_uid'];
	$admin_pwd=$_POST['admin_pwd'];

	    $sql="SELECT id,adminname,adminemail FROM $_TBL_ADMIN WHERE adminname='$admin_uid' and BINARY adminpassword='$admin_pwd'";
	$result = $db->query($sql)or die($db->error()); 
	if($row=$db->fetchArray())
		{  
		$db5->query("SELECT adminstatus from $_TBL_ADMIN WHERE id='".$row['id']."' and adminstatus=1");
			if($db5->numRows()>0)
			{
			$_SESSION['SES_ADMIN_ID']=$row['id'];
			 $_SESSION['SES_USERTYPE']=$row['usertype'];
			 $_SESSION['SES_ADMIN_USER']=$row['adminname'];
			 $_SESSION['Super_admin']=$row['admintype'];
			 $_SESSION['rid']=$row['resturant_id'];
			
			redirect("/admin_new/");
			}
			else{
			$errMsg="User is not active till now!";
			   }
		}
	else
	{
		$errMsg="Error: UserId/Password Incorrect";
	}

}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row"><span style="color:#FF0000; font-size:18px;"><?=$errMsg?></span>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="admin_uid" type="text" autofocus="" required/>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="admin_pwd" type="password" required/>
							</div>
						 <input type="submit" name="Login" class="btn btn-primary" value="Login"/>
							<!--<a href="index.php" class="btn btn-primary">Login</a>-->
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
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
