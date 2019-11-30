<?php
class Users {
	public $table_name = 'userlogin';
	
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$picture){
		
		$prev_query = mysqli_query("SELECT * FROM userlogin WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
		if(mysqli_num_rows($prev_query)>0){
			$update = mysqli_query("UPDATE userlogin SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
		}else{
			$insert = mysqli_query("INSERT INTO userlogin SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'");
		}
		
		$query = mysqli_query("SELECT * FROM userlogin WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
		$result = mysqli_fetch_array($query);
		$_SESSION['uuserid']= $result['userid'];
 if(!empty($_SESSION['uuserid'])){header("Location:../");}
    		$_SESSION['uname']= $result['fname'].' '.$result['lname'];
		return $result;
	}
}
?>