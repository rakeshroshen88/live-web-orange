<?php
session_start();
include('chat/database_connection.php');
///////////////////////////
$query1 = "SELECT * FROM login_details GROUP by user_id";

$statement1 = $connect->prepare($query1);

$statement1->execute();

$result1 = $statement1->fetchAll();


foreach($result1 as $row1)
{
$login_details_id=$row1['login_details_id'];
$last_activity=$row1['last_activity'];
$cuttime=date('d-m-Y H:i:s');
$to_time = strtotime($last_activity);
$from_time = strtotime($cuttime);
$t=round(abs($to_time - $from_time) / 60);
if($t>10){
 /*  $query2 = "UPDATE login_details SET status = 'Offline' WHERE login_details_id = '".$login_details_id."'";
$statement2 = $connect->prepare($query2);
$statement2->execute(); */
}	
}
$evtstr='<table width="740"  style="border:#666666; size:2px;" align="center" cellpadding="10" cellspacing="0" bgcolor="#666666"  >
  <tr>
    <td valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0"  align="center"  style="border:#666666; size:2px;" >
      <tr>
        <td><img src="//orangestate.ng/images/logo.png" style="width:200px" /><br><br></td>
      </tr>
      
      
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
                      <td width="60%" colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;">Registration  detail :</span></p>
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
                                	 $to='ckroymca@gmail.com';
                                    $from = "c.k.roy90@gmail.com";
                                    $subject="Thank your for registering with Us.";

				                  								
							     	$message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									//@mail($to, $subject, $message, $headers); 
echo "ok";
//////////////////////////
?>