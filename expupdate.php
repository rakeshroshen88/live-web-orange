<?php 
include_once("config.inc.php");
$id=$_POST['id'];
$dbedu=new DB();
$sqledu="select * from user_experience where exp_id =".$id;
$dbedu->query($sqledu);
$rowedu=$dbedu->fetchArray();

	
echo '<div class="overview-edit">
            <h3>Experience</h3>
            <form id="updateformexp" method="post">
			<input type="hidden" name="expid1" id="expid1" value="'.$id.'">
                <input type="text" name="subject1" id="subject1" placeholder="Subject" value="'.$rowedu['subject'].'">
                <textarea name="exp1" id="exp1">'.$rowedu['details'].'</textarea>
                <button type="submit" id="updateexpsave" class="save">Save</button>
              
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>';
		 ?>