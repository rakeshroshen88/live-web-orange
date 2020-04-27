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
     $evtstr='<table class="table_full editable-bg-color bg_color_e6e6e6 editable-bg-image" bgcolor="#e6e6e6" width="100%" align="center" mc:repeatable="castellab" mc:variant="Header" cellspacing="0" cellpadding="0" border="0">
	
	<tbody><tr><td height="70"></td></tr>
	<tr>
		<td>
			
			<table class="table1 editable-bg-color bg_color_303f9f" bgcolor="orange" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
				
				<tbody><tr><td height="25"></td></tr>
				<tr>
					<td>
						
						<table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
							<tbody><tr>
								<td>
									
									<table width="50%" align="left" border="0" cellspacing="0" cellpadding="0">
										<tbody><tr>
											<td align="left" class="editable-img">
												<a href="#">
													<img editable="true" mc:edit="image007" src="https://orangestate.ng/images/logo.png" width="68" style="display:block; line-height:0; font-size:0; border:0;" border="0" alt="logo">
												</a>
											</td>
										</tr>
										<tr><td height="22"></td></tr>
									</tbody></table>

									<table width="50%" align="right" border="0" cellspacing="0" cellpadding="0">
									
										<tbody><tr><td height="3"></td></tr>
										<tr>
											<td align="right">
												
											</td>
										</tr>
									</tbody></table>

								</td>
							</tr>

							
							<tr><td height="60"></td></tr>

							<tr>
								<td align="center">
									<div class="editable-img">
										<img editable="true" mc:edit="image009" src="https://orangestate.ng/images/circle-icon-password.png" style="display:block; line-height:0; font-size:0; border:0;" border="0" alt="">
									</div>
								</td>
							</tr>

							
							<tr><td height="40"></td></tr>

							<tr>
								<td mc:edit="text009" align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 30px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Retrive Password
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="30"></td></tr>

							<tr>
								<td mc:edit="text010" align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 12px; font-weight: 300; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												'.date('l').', '.date('d-m-Y').'
											</multiline>
										</span>
									</div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
				
				<tr><td height="104"></td></tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td>
			
			<table class="table1 editable-bg-color bg_color_ffffff" bgcolor="#ffffff" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
	
				<tbody><tr><td height="60"></td></tr>

				<tr>
					<td>
						
						<table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">

							<tbody><tr>
								<td mc:edit="text011" align="left" class="center_content text_color_282828" style="color: #282828; font-size: 20px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Hi '.$row['first_name'].' '.$row['last_name'].' ,
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="10"></td></tr>

							<tr>
								<td mc:edit="text012" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td mc:edit="text013" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												Below to retrieve your password
											</multiline>
										</span>';
									$evtstr1='</div>
								</td>
							</tr>

						
							

							<tr>
								<td mc:edit="text014" align="left" class="center_content" style="font-size: 14px; line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td mc:edit="text016" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												Thanks
											</multiline>
										</span>
									</div>
								</td>
							</tr>
							
							<tr><td height="5"></td></tr>

							<tr>
								<td mc:edit="text017" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												OrangeState team
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td mc:edit="text018" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
											Any questions? Get in touch by <a href="https://orangestate.ng/contact-us.php" target="_blank" class="text_color_303f9f" style="color:#303f9f; text-decoration: none;">&nbsp; Email &nbsp; </a> 
											</multiline>
										</span>
									</div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>

				
				<tr><td height="60"></td></tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td>
			
			<table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
				
				<tbody><tr><td height="40"></td></tr>

			
				
				<tr><td height="70"></td></tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>';
									$to=$_POST['email'];
                                    $from = "support@orangestate.ng";
                                    $subject="Forget Password Conformation Email!";
									$msg.='<br>Email: '.$row['email_id'].'<br>';
									$msg.='password : '.base64_decode($row['password']).'<br>';				
									
									  $message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);

					//echo"<script>alert('Your Password has been successfully Sent to Your E-mail! ')</script>";
						$errMsg='Your Password has been successfully Sent to Your E-mail! ';
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