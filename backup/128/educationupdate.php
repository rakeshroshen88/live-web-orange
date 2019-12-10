<?php 
include_once("config.inc.php");
$id=$_POST['id'];
$dbedu=new DB();
$sqledu="select * from user_education where edu_id =".$id;
$dbedu->query($sqledu);
$rowedu=$dbedu->fetchArray();
echo '<div class="overview-edit">
		<h3>Education</h3> 
		<form id="educationupdateform" method="post">
		<input type="hidden" name="eduid" value="'.$rowedu['edu_id'].'">
			<input type="text" name="school" placeholder="School / University" value="'.$rowedu['edu_title'].'">
			<div class="datepicky">
				<div class="row">
					<div class="col-lg-6 no-left-pd">
						<div class="datefm">
							<input type="text" name="from" placeholder="From 2010" value="'.$rowedu['star_year'].'">
						</div>
					</div>
					<div class="col-lg-6 no-righ-pd">
						<div class="datefm">
							<input type="text" name="to" placeholder="To 2012" value="'.$rowedu['end_year'].'">
						</div>
					</div>
				</div>
			</div>
			<input type="text" name="degree" placeholder="Degree" value="'.$rowedu['degree'].'">
			<textarea name="description" placeholder="Description">'.$rowedu['description'].'</textarea>
			<button type="submit" name="educationeditupdate" id="educationeditupdate" class="save">Save</button>
			<button type="submit" class="cancel">Cancel</button>
		</form> <a href="#" title="" class="close-box"><i class="la la-close"></i></a> 
	</div>';
	?>
