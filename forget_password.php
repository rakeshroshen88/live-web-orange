<?php include('header.php');?>

<?php  
 
$errMsg="";
if(isset($_REQUEST['send']) and $_REQUEST['send']=='save' )
{
	$db1=new DB();
	 	  $sql="select * from ".$_TBL_USER." where email_id='".$_REQUEST['email']."'";
		$db->query($sql);
		if($db->numRows()>0)
			{ 
			$row=$db->fetchArray();
				if($row['user_status']=="0"){
					
					 $errMsg='Your account has been suspendend!';
				}else if($row['user_status']=="1"){
     $evtstr='<table width="500"  style="border:#666666; size:2px;" align="center" cellpadding="10" cellspacing="0" bgcolor="#666666"  >
  <tr>
    <td valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0"  align="center"  style="border:#666666; size:2px;" >
      <tr>
        <td><img src="images/logo.png" /><br><br></td>
      </tr>
      
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="122" valign="top"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
              <tr valign="top">
                <td width="50%"><table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                      <td colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;"><br> Hi '.$row['first_name'].'</span></p>
					  </td>
  </tr>
					  <tr>
                      <td width="60%" colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;">Your Login details:</span></p>
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

,</h6>

</div></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>';
									$to=$_POST['email'];
                                    $from = "support@orangestate.ng";
                                    $subject="Forget Password Conformation Email!";
									$msg.='Email: '.$row['email_id'].'<br>';
									$msg.='password : '.base64_decode($row['password']).'<br>';				
									
									  $message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);

					echo"<script>alert('Your Password has been successfully Sent to Your E-mail! ')</script>";	
}
			}else{$errMsg= "Email address does not exit!";}}

?>  
<font color="#FF0000" size="+1" face="Arial Black, Gadget, sans-serif"><center>
<?php 
					if(!empty($errMsg))
						{
						echo $errMsg;
						echo '<br />';
						}
					?></center>
</font>
  <div style="margin-top:20px; margin-left:300px;" ><h2 align="left" style="color:#090">Forget Password</h2>  	
        <h4 align="left" style="color:#090">Enter user information</h4>
       
        
					
    <p align="left">If you've forgotten your password<br /> Enter your e-mail address below and <br />We'll send you an e-mail message containing your new password.</p>
	<form name="forpass" action="" method="post">
       
	<table cellpadding="10" cellspacing="10" width="50%" border="0">
   

<tr><td colspan="2"><hr /> </td></tr>

     <tr align="left"><td style="color:#090">Enter your email address </td><td> </td></tr>
    <tr><td width="25%" > <input name="email" type="text" size="50" style="height:25px;" required /></td>
     <input name="send" type="hidden" value="save" /> 
        <td align="left" width="25%" ><input type="submit" name="submitf" id="submitf" value="send"  /></td></tr>
        <tr><td colspan="2">&nbsp; </td></tr>

<tr><td colspan="2"><hr /> </td></tr>

    </table>
	         
		 
       
    </form>
    <br /><br />  
     </div>

<?php include('footer.php');?>