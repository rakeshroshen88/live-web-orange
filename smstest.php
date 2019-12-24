<?php $username = "agim@webguru.ng";
			$password = "Admin@webguru1";
			
			//API Details
			
			 $textmsg = "Hi Raj !</br>Thanks for shopping orangestate, Exciting to have you here. Your order 123 has been orangestate by seller !" ;
			$priority = "ndnd";
			$stype = "normal";

			$data="user=".$username."&pass=".$password."&sender=".$senderID."&phone=".$mobileNo."&text=".$textmsg."&priority=".$priority."&stype=".$stype;
			
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, 'http://promo.smsfresh.co/api/sendmsg.php'); 
			curl_setopt($ch, CURLOPT_POST, true); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$result = curl_exec($ch); 
			curl_close($ch);
			?>