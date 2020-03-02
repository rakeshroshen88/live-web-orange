<?php
//session_start();
//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");

//date_default_timezone_set('Asia/Kolkata');
//date_default_timezone_set("Africa/Lagos");
//date_default_timezone_set("UTC");
function fetch_user_last_activity($user_id, $connect)
{
	$query = "
	SELECT * FROM login_details
	WHERE user_id = '$user_id'
	ORDER BY last_activity DESC
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['last_activity'];
	}
}
function fetch_user_chat_history1($from_user_id, $to_user_id, $connect)
{
	$output='hello111';
	return $output;
}
function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message
	WHERE (from_user_id = '".$from_user_id."'
	AND to_user_id = '".$to_user_id."')
	OR (from_user_id = '".$to_user_id."'
	AND to_user_id = '".$from_user_id."')
	ORDER BY timestamp asc
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if($row["from_user_id"] == $from_user_id)
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
				$user_name = '<b class="text-success yournamechat">You</b>';
			}
			else
			{
				$ext = pathinfo($row['chat_message'], PATHINFO_EXTENSION);
				if($ext=='png' or $ext=='png' or $ext=='gif' or $ext=='GIF'){
					if($row['aplay']==1 and $row['status']==1){ $ap='autoplay';}else{$ap='';}
				$query = "UPDATE chat_message SET aplay = '0' WHERE mp3 = '".$row['mp3']."' AND status = '1'";
				$statement = $connect->prepare($query);
				$statement->execute();

				$chat_message = '<img src="emoji/'.$row['chat_message'].'" width="100"></br><audio controls '.$ap.' style="width: 95%; opacity: 0;" class="auto chataudioplayer">
				  <source src="emoji/'.$row['mp3'].'" type="audio/mp3">
				  <source src="emoji/'.$row['mp3'].'" type="audio/mp3">
				  Your browser does not support the audio element.
				</audio>';
				}else{
				$chat_message = $row['chat_message'];
				}
				$user_name = '<b class="text-success yournamechat">You</b>';
				//$user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
			}


			//$dynamic_background = 'background-color:#ffe6e6;';
		}
		else
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
			}
			else
			{
				//$chat_message = $row["chat_message"];
				$ext = pathinfo($row['chat_message'], PATHINFO_EXTENSION);
				if($ext=='png' or $ext=='png' or $ext=='gif' or $ext=='GIF'){
					if($row['aplay']==1 and $row['status']==1){ $ap='autoplay';}else{$ap='';}
					$query = "UPDATE chat_message SET aplay = '0' WHERE mp3 = '".$row['mp3']."' AND status = '1'";
				$statement = $connect->prepare($query);
				$statement->execute();

				//$mp3=$db->getSingleResult("SELECT mp3 from emoji where image='".$row['chat_message']."'");
				$chat_message = '<img src="emoji/'.$row['chat_message'].'" height="100" width="100"></br><audio controls '.$ap.' style="width: 95%; opacity: 0;" class="auto chataudioplayer">
				  <source src="emoji/'.$row['mp3'].'" type="audio/mp3">
				  <source src="emoji/'.$row['mp3'].'" type="audio/mp3">
				  Your browser does not support the audio element.
				</audio>';
				}else{
				$chat_message = $row['chat_message'];
				}
			}
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$dynamic_background = 'background-color:#ffffe6; text-align: right;
    padding: 9px 0;';
		}
		$output .= '
		<li id="scroll" style="'.$dynamic_background.'" class="chat-listing1">
			<p>'.$user_name.' - '.$chat_message.'
				<div class="chatmsgtime">
					- <small> '.$row['timestamp'].'</small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	$query = "
	UPDATE chat_message
	SET status = '0', aplay = '0'
	WHERE from_user_id = '".$to_user_id."'
	AND to_user_id = '".$from_user_id."'
	AND status = '1'
	";
	// $statement = $connect->prepare($query);
	// $statement->execute();
	//Commenting to keep the status active in case of unseen message
	return $output;
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT name FROM login WHERE user_id = '$user_id'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['name'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	 $query = "
	SELECT * FROM chat_message
	WHERE from_user_id = '$from_user_id'
	AND to_user_id = '$to_user_id'
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$output = '';
	if($count > 0)
	{
		$output = '<span class="label label-success">'.$count.'</span>';
	}
	return $output;
}

function fetch_is_type_status($user_id, $connect)
{
	$query = "
	SELECT is_type FROM login_details
	WHERE user_id = '".$user_id."'
	ORDER BY last_activity DESC
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		if($row["is_type"] == 'yes')
		{
			$output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
		}
	}
	return $output;
}
/* $query = "
SELECT * FROM login
WHERE user_id != '".$_SESSION['user_id']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll(); */

function fetch_is_status15($user_id, $connect)
{
	$query = "
SELECT * FROM login
WHERE user_id != '".$_SESSION['user_id']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{    $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
		$currentDate = date($user_last_activity);
		$userLastActivity = date($date);
		$timeLapse = (($currentDate - $userLastActivity)/60);


		if($timeLapse > 10)
		{
			$output = '<span class="greendot"></span>';
		}else{
			$output = '<span class="reddot"></span>';
		}
	}
	return $output;
}


function fetch_is_status($user_id, $connect)
{
	$query = "
	SELECT status FROM login_details
	WHERE user_id = '".$user_id."'
	ORDER BY last_activity DESC
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		if($row["status"] == 'Online')
		{
			$output = '<span class="greendot"></span>';
		}else{
			$output = '<span class="reddot"></span>';
		}
	}
	return $output;
}



function fetch_is_statusonline($user_id, $connect)
{
	$query = "
	SELECT status FROM login_details
	WHERE user_id = '".$user_id."'
	ORDER BY last_activity DESC
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	$output1 = '';
	foreach($result as $row)
	{
		if($row["status"] == 'Online')
		{
			$output = $output+1;
		}else{
			$output1 = $output1+1;
		}
	}
	return $output;
}

function fetch_group_chat_history($connect)
{
	$query = "
	SELECT * FROM chat_message
	WHERE to_user_id = '0'
	ORDER BY timestamp asc
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if($row["from_user_id"] == $_SESSION["user_id"])
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
				$user_name = '<b class="text-success yournamechat">You</b>';
			}
			else
			{
				$chat_message = $row["chat_message"];
				$user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success yournamechat">You</b>';
			}

			//$dynamic_background = 'background-color:#ffe6e6;';
		}
		else
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
			}
			else
			{
				$chat_message = $row["chat_message"];
			}
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$dynamic_background = 'background-color:#ffffe6; text-align: right;
    padding: 9px 0; ';
		}

		$output .= '

		<li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
			<p>'.$user_name.' - '.$chat_message.'
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	return $output;
}

//New Function for fetching chats..making json format to differentiate the sound and normal chat message.
function fetch_user_chat_history_json($to_user_id, $from_user_id, $connect)
{
	// echo $to_use r_id.'to'; //Receiver
	// echo $from_user_id."from"; //Sender

	$query = "
	SELECT * FROM chat_message
	WHERE (from_user_id = '".$from_user_id."'
	AND to_user_id = '".$to_user_id."')
  AND status = 1
	ORDER BY timestamp asc
	";

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<ul class="list-unstyled">';
	$chat['type'] = array();

	$chat['username'] = array();
	$chat['background'] = array();


	$i=0;
	$response = array();

	foreach($result as $row)
	{

		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';

		$chat['from_user_id'] = $row['from_user_id'];
		$chat['to_user_id'] = $row['to_user_id'];
		if($row['status'] ==0){
			continue;
		}
		$i++;

				$ext = pathinfo($row['chat_message'], PATHINFO_EXTENSION);
				if($ext=='png' or $ext=='png' or $ext=='gif' or $ext=='GIF'){



						$chat_message = '<img src="emoji/'.$row['chat_message'].'" width="100"></br><audio controls '.$app.' style="width: 95%; opacity: 0;" class="auto chataudioplayer">
						  <source src="emoji/'.$row['mp3'].'" type="audio/mp3">
						  <source src="emoji/'.$row['mp3'].'" type="audio/mp3">
						  Your browser does not support the audio element.
						</audio>';

						$chat['type'] = 'emoji';
						$chat['chat_message'] = '<img src="emoji/'.$row['chat_message'].'" width="100"></br>';
						$chat['sound'] = 'emoji/'.$row['mp3'];

						//$chat_message = '<em>This message has been removed</em>';
						//$user_name = '<b class="text-success yournamechat">You</b>';

				}else{
						$chat['type']='text';
						$chat['chat_message'] = $row['chat_message'];
						$chat['sound'] = '';
				}
			// }





				$chat['username']= '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
				$chat['background']= 'background-color:#ffffe6; text-align: right; padding: 9px 0;';

				$chat['timestamp'] = $row['timestamp'];
				$response[] = $chat;
				$i++;

			$query = "
			UPDATE chat_message
			SET status = '0', aplay = '0'
			WHERE chat_message_id = '".$row['chat_message_id']."'
			";
			$statement = $connect->prepare($query);
			$statement->execute();
	}


	return json_encode($response);

}

?>
