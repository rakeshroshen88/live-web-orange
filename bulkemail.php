<?php //include_once("config.inc.php");?>

<?php $ct=1;

if(isset($_POST['signup']) and $_POST['send2']=='send2')

 {  
    
    
    
    
     echo"<script>alert('Thank you ! ')</script>";		
    
    
    
    
    
    
    
    
    
    
    
 ///////////////////////////////////   
    
    
    
    
    
    
///////////Site Admin/////////////
require("class.phpmailer.php");
/*$message='This is the body in plain text for non-HTML mail clients';
$mail = new PHPMailer();
$mail1='c.k.roy90@gmail.com';
$mail->IsSMTP();
//$mail->Host = "ns1.md-in-35.webhostbox.net";  //SMTP server
$mail->Host = "ssl://smtp.gmail.com";  //SMTP server
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 587;
//$mail->Username = "roy@webz-engine.com";  //Username
//$mail->Password = "!tPr^HdQEv*t";    //Password

$mail->Username = "molly.thompson.eps1@gmail.com";  //Username
$mail->Password = "hello@123";    //Password


$mail->From = "c.k.roy90@gmail.com";    //From address required//
$mail->FromName = "Epixel Services";
$mail->AddAddress($mail1);
//$mail->AddReplyTo("chittaranjan.roy90@gmail.com");

$mail->IsHTML(true);

$mail->Subject = "Thank you for contacting us";
$mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}else{
echo "Thank you for contacting us !";
    echo"<script>alert('Thank you for contacting us ! ')</script>";		
   // echo'<script>window.location="index.php";</script>';
}*/
    
    
 //require('./PHPMailer/class.phpmailer.php');
$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';

$body = 'This is the message';

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';

$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;


$mail->Username = "molly.thompson.eps1@gmail.com";  /*Username*/
$mail->Password = "hello@123";    /**Password**/


$mail->SetFrom('ckroymca@gmail.com', 'roy');
//$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
$mail->Subject    = 'subject';
$mail->MsgHTML($body);

$mail->AddAddress('c.k.roy90@gmail.com', 'hello');
//$mail->AddAddress('abc2@gmail.com', 'title2'); /* ... */

//$mail->AddAttachment($fileName);
$mail->send();   
    
    
    
    
    
    
   /* 
    
    ////////////////////////
    set_time_limit(0);
    $subject='test';
    $newMessage = 'hello';

    $to = 'c.k.roy90@gmail.com';

    // Establish content headers
    $headers = "From: ckroyma@gmail.com"."\n";
   // $headers .= "Reply-To: bounce@domain.com"."\n";
    $headers .= "X-Mailer: PHP v.". phpversion()."\n";
    $headers .= "MIME-Version: 1.0"."\n";  
    $headers .= "Content-Type: text/html; charset=iso-8859-1"."\n";
    $headers .= "Content-Transfer-Encoding: 8bit;";

    mail($to, $subject, $newMessage, $headers);die;
				
								
		
  $admin_email = "info@epixelservices.com";
  $email = 'c.k.roy90@gmail.com ';
  $subject = 'test';
  $comment = 'hello sir';
  
  //send email
  mail($email, "$subject", $comment, "From:" . $admin_email);
  
		die;
		
		
		mysql_set_charset("utf8");
		$sql="SELECT * FROM user  order by id desc limit 0,100";
		$db->query($sql)or die($db->error());
		while($row1=$db->fetchArray()){
		$useremail =$row1['email'];
		$sender =$row1['sender'];
		$suject =$row1['subject'];
		
		$useremail =$row1['email'];
		$sender =$row1['sender'];
		$suject =$row1['subjects'];
		$content =$row1['content'];
									$to=$useremail;

                                    $from=$sender;

                                    $subject=$suject; 			

																	

									$msg1=$content;

									 $message1=$evtstr.$msg1.$evtstr1;									

		     	                      //$message=$evtstr.$msg.$evtstr1;

									$headers  = "MIME-Version: 1.0\r\n";

									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

									$headers .= "From:$from\r\n";

									@mail($to, $subject, $message1, $headers);
	
	

                                	
*/
                    

                    

                    /////////////////////////////////////////Site Admin/////////////////////////////////////////////////////////////

			/*		$ToEmail = $useremail; 
    $EmailSubject = $suject; 
    $mailheader = "From: ".$from."\r\n"; 
    //$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
   
    $MESSAGE_BODY .= "Comment: ".nl2br($content).""; 
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
	
	

					*/
					
					
					
					
					
					
					
                   /* $adminto="sales@epixelservices.com";

                    $adminfrom=$useremail;

                    $querysubject="Query from Customer !"; 

                    $adminheaders  = "MIME-Version: 1.0\r\n";

                    $adminheaders .= "Content-type: text/html; charset=iso-8859-1\r\n";

                    $adminheaders .= "From:$adminfrom\r\n";

                    @mail($adminto, $subject, $message, $adminheaders);*/

                    

                    //////////////////////////////////////////////////////////////////////////////////////////////////////

                     

                    

                
 sleep(10);
            // }        
                    

                                    

                                  // echo"<script>alert('Email Has Been Send! ')</script>";	

                           

						//  echo'<script>window.location="index.php";</script>';


}?>

 <form method="post" class="form-horizontal" id="supportForm" action="" >

				<input type="hidden"  name="send2"  value="send2"/>
				 <input type="submit" name="signup" class="btn btn1 btn-larg" id="contactSupport"  value="Send Email"/>
				 
</form>