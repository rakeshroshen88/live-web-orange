 <?php

if(isset($_POST['submit']) and $_POST['send2']=='send2')
 {
$evtstr='<table width="740"  style="border:#666666; size:2px;" align="center" cellpadding="10" cellspacing="0" bgcolor="#666666"  >
  <tr>
    <td valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0"  align="center"  style="border:#666666; size:2px;" >
   
      
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="122" valign="top"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
              <tr valign="top">
                <td width="50%"><table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                      <td colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;"></span></p>
					  </td>
  </tr>
					  <tr>
                      <td width="60%" colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;">Query  detail :</span></p>
                        <p>';
$evtstr1.='</p></td>
                    </tr>  
                    </tr>  
                   
                </table></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#666666"><table width="100%" border="0" cellpadding="10" cellspacing="0" bgcolor="#666666">
          <tr>
            <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000;"><div align="center" style="style4">

</div></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>';
                                	$to=$_REQUEST['email'];
                                    $from = "";
                                    $subject="Thank you for contacting ."; 
									$msg.='Name: '.$_REQUEST['name'].'<br><br>';	
				                    $msg.='Email: '.$_REQUEST['email'].'<br><br>';	
									$msg.='Phone No.: '.$_REQUEST['mobileno'].'<br><br>';
									if(!empty($_REQUEST['Interested'])){
									$msg.='Interested In: '.$_REQUEST['Interested'].'<br><br>';
									}									
									$msg.='Subject: '.$_REQUEST['subject'].'<br><br>';
									$msg.='Message: '.$_REQUEST['message'].'<br><br>';
							      	 $message=$evtstr.$msg.$evtstr1;
									$msg1="Thank you for contacting Us. ";
									$message1=$evtstr.$msg1.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message1, $headers);

                  ////////////////Site Admin///////////
                    $adminto="";
                    $adminfrom=$_REQUEST['email'];
                    $querysubject='New Enquery !'; 
                    $adminheaders  = "MIME-Version: 1.0\r\n";
                    $adminheaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $adminheaders .= "From:$adminfrom\r\n"; 
					//$adminheaders .= "Bcc:c.k.roy90@gmail.com \r\n";
                    @mail($adminto, $subject, $message, $adminheaders);
                  ///////////////////////////////////////////////////////
							echo"<script>alert('Thank you for contacting us ! ')</script>";	
						    echo'<script>window.location="index.html";</script>';
 end();	
}?>
  