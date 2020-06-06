<!-- Modal -->

 

<?php //////////////////////////?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body" id="post_body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<style>
#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 0px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>


<?php //////////////////////////?>
<!--
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>style="heigh:30px !important;" -->



<div class="chatfeature-leftbar">
	<div class="open-chat-bttm">
		<h3 ><i class="fa fa-commenting-o" aria-hidden="true"></i> Chat (<?php 
$db4=new DB();
$l=array();
$sql4="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
$db4->query($sql4);
if($db4->numRows()>0)
{
while($row4=$db4->fetchArray()){
	$l[]=$row4['follow'];
}
}
$allfriend=implode(',',$l);

/* 	$query = "
	SELECT * FROM login_details
	WHERE status = 'Online' group by user_id
	"; */
	
	 $query = "
SELECT * FROM login WHERE user_id != '".$_SESSION['user_id']."' and f_userid IN (SELECT f_userid FROM login_details
	WHERE f_userid  IN($allfriend) and status='Online')";

	$statement = $connect->prepare($query);
	$statement->execute();
	 $count = $statement->rowCount();
	 echo $count;
//echo $c=fetch_is_statusonline($_SESSION['user_id'], $connect);
	?>) </h3>
	</div>
	<div id="user_details" ></div>
</div>
<input type="hidden" id="is_active_group_chat_window" value="yes" />
					<!--<button type="button" name="group_chat" id="group_chat" class="btn btn-info btn-lg btn-warning btn-xs"  data-toggle="modal" data-target="#myModals">Group Chat</button>-->

  <!-- Modal <button type="button" class="btn " data-toggle="modal" data-target="#myModals">Open Modal</button>
-->
  <div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
		  <div id="group_chat_dialog" title="Group Chat Window" style="display:none;">
	<div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px; ">

	</div>
	<div class="form-group">

		<div class="chat_message_area">
			<div id="group_chat_message" contenteditable class="form-control">

			</div>
			<div class="image_upload">
				<form id="uploadImage" method="post" action="upload.php">
					<label for="uploadFile"><img src="chat/upload.png" /></label>
					<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
				</form>
			</div>
		</div>
	</div>
	<div class="form-group" align="right">
		<button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
	</div>
</div>

        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


<!--
 <div class="container">
			<br />

			<h3 align="center">Live Chat </h3><br />
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h4>Online User</h4>
				</div>
				<div class="col-md-2 col-sm-3">
					<input type="hidden" id="is_active_group_chat_window" value="no" />
					<button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button>
				</div>
				<div class="col-md-2 col-sm-3">
					<p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="logout.php">Logout</a></p>
				</div>
			</div>




			 <div class="boxopenbox">


			 </div>
			<br />
			<br />

		</div>

<div class="col-md-2 col-sm-3">
					<input type="hidden" id="is_active_group_chat_window" value="no" />
					<button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button>
				</div>
				<!--
<div id="group_chat_dialog" title="Group Chat Window" style="display:none;">
	<div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px; ">

	</div>
	<div class="form-group">

		<div class="chat_message_area">
			<div id="group_chat_message" contenteditable class="form-control">

			</div>
			<div class="image_upload">
				<form id="uploadImage" method="post" action="upload.php">
					<label for="uploadFile"><img src="chat/upload.png" /></label>
					<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
				</form>
			</div>
		</div>
	</div>
	<div class="form-group" align="right">
		<button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
	</div>
</div>

-->
<script>
$(document).ready(function(){



	fetch_user();

/* 
setInterval(function(){

		update_last_activity();
		fetch_user();
        update_chat_history_data_json();
		// update_chat_history_data();

		fetch_group_chat_history();
		log();
	}, 5000);   

	  setInterval(function(){

		offline_chat();

	}, 1000000);  
  */
	function log()
	{
		$.ajax({
			url:"log.php",
			method:"POST",
			success:function(data){

			}
		})
	}

	function offline_chat()
	{
		$.ajax({
			url:"offline_chat.php",
			method:"POST",
			success:function(data){

			}
		})
	}

	function fetch_user()
	{
		$.ajax({
			url:"chat/fetch_user.php",
			method:"POST",
			success:function(data){
				//alert(data);
				$('#user_details').html(data);
			}
		})
	}
	////////////////////////

	/////////////////////

	function update_last_activity()
	{
		$.ajax({
			url:"chat/update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name, to_user_email)
	{
		/* var modal_content = '<div class="chatbox" id="user_dialog_'+to_user_id+'"><div class="conversation-box"><div class="con-title mg-3"><div class="chat-user-info"><img src="images/resources/us-img1.png" alt="" height="40" width="40"><h3>'+to_user_name+'<span class="status-info"></span></h3></div><button class="start_one  j-actions m-video_call" data-call="video" uid="'+to_user_email+'" id="'+to_user_email+'"><i class="fa fa-video-camera" aria-hidden="true"></i></button><button class="start_one j-actions m-audio_call" data-call="audio"  uid="'+to_user_email+'"><i class="fa fa-volume-up" aria-hidden="true"></i></button><div class="st-icons"><a href="#" title="" class="close-chat"><i class="la la-close"></i></a></div></div>';
		modal_content += '<div class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += fetch_user_chat_history1(to_user_id);
		modal_content += '</div>'; */
		
		var modal_content = '<div class="chatbox" id="user_dialog_'+to_user_id+'"><div class="conversation-box"><div class="con-title mg-3"><div class="chat-user-info"><img src="images/resources/us-img1.png" alt="" height="40" width="40"><h3>'+to_user_name+'<span class="status-info"></span></h3></div><div class="st-icons"><a href="#" title="" class="close-chat"><i class="la la-close"></i></a></div></div>';
		modal_content += '<div class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += fetch_user_chat_history1(to_user_id);
		modal_content += '</div>';
		
		//modal_content += '</div> <div id="#emoji'"></div>';
		//modal_content += emoji(to_user_id);
		//modal_content += '<div>test66</div>';
		modal_content += '<div class="heelo"></div>';
		//modal_content += emoji(to_user_id);
		modal_content += '<div class="typing-msg"><form><textarea placeholder="Type a message here" name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea><button  type="button" name="send_chat"  class="send_chat" id="'+to_user_id+'" uid="'+to_user_id+'"><i class="fa fa-send"></i> </button> <button  type="button" name="send_chat"  class="send_chatemoji" id="'+to_user_id+'" uid="'+to_user_id+'"><i class="far fa-laugh"></i> </button></form></div>';
		//modal_content += fetch_is_type_status1(to_user_id);

		/*
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="submit" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';*/
		$('#user_model_details').append(modal_content);
	}
	
/* function myFunctionnew(){
  window.open("https://orangestate.ng/video-chat/index.php , height=510,width=660,toolbars=no,left=150,top=200");
  
} */

/* $(document).on('click', '.start_one', function(){
	var uid = $(this).attr('uid');
	alert(uid);
	$("[data-name='"+uid+"']").trigger("click");
	//$("#"+uid).trigger("click");
     // window.open("https://orangestate.ng/video-chat/index.php");
	// window.open("https://orangestate.ng/video-chat/index.php?uid="+uid);
});  */
	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		var to_user_email = $(this).data('touseremail');
		//alert(to_user_email);
    if($("#user_dialog_"+to_user_id).length){
      return false;
    }
		make_chat_dialog_box(to_user_id, to_user_name, to_user_email);
		 /* $("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:400
		});
		$('#user_dialog_'+to_user_id).dialog('open'); */

		$('#user_dialog_'+to_user_id).addClass('chatopenbox');
	});

	$(document).on('click', '.close-chat', function(){
		//var hello = $(this).closest('.chatopenbox').attr("id");
    $(this).closest('.chatopenbox').remove();
		// $(this).closest('.chatopenbox').removeClass("chatopenbox");



	});


	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var uid = $(this).attr('uid');

		var chat_message = $.trim($('#chat_message_'+to_user_id).val());

		if(chat_message != '')
		{
			$.ajax({
				url:"chat/insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{

					$('#chat_message_'+to_user_id).val('');
					//var element = $('#chat_message_'+to_user_id).emojioneArea();
					//element[0].emojioneArea.setText('');
				//	$('#chat_history_'+to_user_id).html(data);
        $('#chat_history_'+to_user_id+'> ul').append('<li id="scroll" style="" class="chat-listing1"><p><b class="text-success yournamechat">You</b> - '+chat_message+'<div class="chatmsgtime">- <small> Now</small></div></p></li>');
        var chatwindow    = $('#chat_history_'+to_user_id);
        var height = chatwindow[0].scrollHeight;
        $("#chat_message_"+to_user_id).text('');
        //chatwindow.scrollTop(height);
        chatwindow.stop().animate({ scrollTop: height}, 500);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});
$(document).on('keyup', '.chat_message', function(){
//$('.chat_message').keyup(function(event) {
    // enter has keyCode = 13, change it if you want to use another button
    if (event.keyCode == 13) {
	$('.send_chat').click();
      return false;
    }
  });



	function fetch_user_chat_history(to_user_id)
	{

		$.ajax({
			url:"chat/fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
				 $(".chat_history").stop().animate({ scrollTop: $(".chat_history")[0].scrollHeight}, 1000);
			}
		})
	}

  function fetch_user_chat_history_json(to_user_id)
  {

    $.ajax({
      url:"chat/fetch_user_chat_history_json.php",
      method:"POST",
      dataType:"JSON",
      data:{to_user_id:to_user_id},
      success:function(res){
        //var data = $.parseJSON(res);
        if(typeof res !== 'undefined'){
            console.log(res);
            $.each(res,function(id,response){
              //alert("yes working");
              $('#chat_history_'+to_user_id+'> ul').append('<li id="scroll" style="'+response.background+'" class="chat-listing1"><p>'+response.username+' - '+response.chat_message+'<div class="chatmsgtime">- <small> '+response.timestamp+'</small></div></p></li>')
              if(response.type=='emoji'){
                  var audio ='';
                  var audio = new Audio(response.sound);
                  audio.play();
                //  audio.pause();
              }
              var chatwindow    = $('#chat_history_'+to_user_id);
              var height = chatwindow[0].scrollHeight;
              $("#chat_message_"+to_user_id).text('');
              //chatwindow.scrollTop(height);
              chatwindow.stop().animate({ scrollTop: height}, 500);
            })
          }



      }
    })
  }

	function fetch_user_chat_history1(to_user_id)
	{
	//alert('zjhchjz');


		$.ajax({
			url:"emoji.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				//alert(data);
				//$('#chat_history_'+to_user_id).html(data);
				$('.heelo').html(data);
			}
		})
	}

	function fetch_is_type_status(to_user_id)
	{
		$.ajax({
			url:"chat/fetch_is_type_status.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		});

	}




	function fetch_is_type_status1(to_user_id){
		alert();
		 $('.chat_message').keyup(function(event) {
    // enter has keyCode = 13, change it if you want to use another button
    if (event.keyCode == 13) {
	$('.send_chat').click();
      return false;
    }
  });

	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}

  function update_chat_history_data_json(){
    $('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history_json(to_user_id);
		});
  }

function emoji()
	{


		/*var test=test;
		$.ajax({
			url:"emoji.php",
			method:"POST",
			data:{test:test},
			success:function(data){
				//alert(data);
				$('#emoji').html(data);
			}
		});*/

	}
	$(document).on('click', '.ui-button-icon', function(){
		//$('.user_dialog').dialog('destroy').remove();
		$('#is_active_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"chat/update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"chat/update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

/* $('#group_chat_dialog').dialog({
		autoOpen:false,
		width:400
	}); */


	$('#group_chat').click(function(){
		$('#group_chat_dialog').show();
		$('#group_chat_dialog').dialog('open');
		$('#is_active_group_chat_window').val('yes');
		fetch_group_chat_history();
	});

	$('#send_group_chat').click(function(){
		var chat_message = $.trim($('#group_chat_message').html());
		var action = 'insert_data';
		if(chat_message != '')
		{
			$.ajax({
				url:"chat/group_chat.php",
				method:"POST",
				data:{chat_message:chat_message, action:action},
				success:function(data){
					$('#group_chat_message').html('');
					$('#group_chat_history').html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_group_chat_history()
	{ //alert();
		var group_chat_dialog_active = $('#is_active_group_chat_window').val();
		//alert(group_chat_dialog_active);
		var action = "fetch_data";
		if(group_chat_dialog_active == 'yes')
		{
			$.ajax({
				url:"chat/group_chat.php",
				method:"POST",
				data:{action:action},
				success:function(data)
				{
					//alert(data);
					$('#group_chat_history').html(data);
				}
			})
		}
	}

	$('#uploadFile').on('change', function(){
		$('#uploadImage').ajaxSubmit({
			target: "#group_chat_message",
			resetForm: true
		});
	});

	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"chat/remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});

});

function enterchat(){
  $('.chat_message').keyup(function(event) {
    // enter has keyCode = 13, change it if you want to use another button
    if (event.keyCode == 13) {
	$('.send_chat').click();
      return false;
    }
  });
}

/* $(window).on("beforeunload", function() {
var action='action';
    $.ajax({
				url:"chat/logout.php",
				method:"POST",
				data:{action:action},
				success:function(data)
				{

				}
			})
}) */


	$(document).on('click', '#subscribeemail', function(){
		var subscribe1 = $("#subscribe").val();
		alert(subscribe1);
		Swal.fire({
				  title: 'Are you sure?',
				  text: "want to continue!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, Send it!'
				}).then((result) => {
				  if (result.value) {
			$.ajax({
				url:"subscribe.php",
				method:"POST",
				data:{subscribe:subscribe1},
				success:function(data)
				{
					Swal.fire({
						  type: 'success',
						  title: '',
						  text: data,
						   showConfirmButton: false,
						  timer: 1000

						});
				}
			})
		}
	});
	});
</script>

<?php /////////////////////////////////?>


		<div class="chatbox-list">
			<div id="user_model_details"></div>

			<!--<div class="chatbox">
				<div class="chat-mg">
					<a href="#" title=""><img src="images/resources/usr-img1.png" alt=""></a>
					<span>2</span>
				</div>
				<div class="conversation-box" style="opacity: 1;    visibility: visible;    z-index: 999999999;">
					<div class="con-title mg-3">
						<div class="chat-user-info">
							<img src="images/resources/us-img1.png" alt="">
							<h3>Uduak Umoh <span class="status-info"></span></h3>
						</div>
						<div class="st-icons">
							<a href="#" title=""><i class="la la-cog"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
						</div>
					</div>
					<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
						<div class="date-nd">
							<span>Sunday, August 24</span>
						</div>
						<div class="chat-msg st2">
							<p>Cras ultricies ligula.</p>
							<span>5 minutes ago</span>
						</div>
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>

					<div class="typing-msg">
						<form>
							<textarea placeholder="Type a message here"></textarea>
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div><!--chatbox-list end-->

	</div><!--theme-layout end-->

<style>
.chatfeature-leftbar {z-index: 99999999 !important;}
</style>
<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
     $url.= $_SERVER['REQUEST_URI'];    
       $url1=substr($url,0,40);
    //echo $url;  
	/* if($url!='https://orangestate.ng/get-started.php' or $url!='https://orangestate.ng/hotel-booking.php'){ */
  ?>   
	<?php //include('video-chat/video.php'); } ?>

<footer class="off-white-bg2 pt-95 bdr-top pt-sm-55 clear">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <!-- Signup Newsletter Start -->
                    <div class="row mb-60">
                         <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                            <div class="news-desc text-center mb-30">
                                 <h3>Sign Up For Newsletters</h3>
                                 <p>Be the First to Know. Sign up for newsletter today</p>
                             </div>
                             <div class="newsletter-box">
                                 <form action="#">
                                      <input class="subscribe" placeholder="your email address" name="semail" id="subscribe" type="text" required>
                                      <button type="button" id="subscribeemail" class="submit">subscribe!</button>
                                 </form>
                             </div>
                         </div>
                    </div>
                    <!-- Signup-Newsletter End -->
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Information</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="delivery_information.php">Delivery Information</a></li>
                                        <li><a href="privacy_poicy.php">Privacy Policy</a></li>
                                        <li><a href="term&condition.php">Terms &amp; Conditions</a></li>
                                        <li><a href="faq.php">FAQs</a></li>
                                        <li><a href="return_policy.php">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Customer Service</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">


                                        <li><a href="#">Order History</a></li>

                                        <li><a href="https://orangestate.ng/submitticket.php">Help</a></li>
										
										<li><a href="https://orangestate.ng/submitticket.php">Submit Tickets</a></li>
                                        <li><a href="#">Gift Certificates</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Extras</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="#">Brands</a></li>
                                        <li><a href="#">Gift Certificates</a></li>
                                        <li><a href="#">Affiliate</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Site Map</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact-us.php">Contact Us</a></li>

                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="wishlist.php">Wish List</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li><i class="lnr lnr-map-marker"></i> Address: 169-C, Technohub, Dubai Silicon Oasis.</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> mail Us: Support@orangestate.com </a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i> Phone: (+800) 123 456 789)
                                        </li>
                                    </ul>
                                    <div class="payment mt-25 bdr-top pt-30">
                                        <a href="#"><img class="img" src="img/1.png" alt="payment-image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>

            <!-- Footer Top End -->
            <!-- Footer Middle Start -->
            <div class="footer-middle text-center">
                <div class="container">
                    <div class="footer-middle-content pt-20 pb-30">
                            <ul class="social-footer">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><img src="img/social-img1.png" alt="google play"></a></li>
                                <li><a href="#"><img src="img/social-img2.png" alt="app store"></a></li>
                            </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
			<div id="autop"></div>
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">
                        <p>Copyright © 2019 <a target="_blank" href="orangestate.ng">OrangeState</a> All Rights Reserved.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>

  <!--
 <script type="text/javascript" src="js/jquery.min.js"></script>-->

<script type="text/javascript">
	$(".chatfeature-leftbar .open-chat-bttm").click(function(){
		$(".chatfeature-leftbar").toggleClass("open")
	});
</script>

<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<!--//<script src='js/video.js'></script>////-->


<!--//////////////-->
<script src="js/ui-elements.js"></script>
<script src="js/blockUI/jquery.blockUI.js"></script>
<script src="js/sweetalert2@8.js"></script>
<script src="js/media.js"></script>
<script src="js/profile.js"></script>

<!----    ---->

<script src="js/slick.js"></script>


<script>
$(document).ready(function(){
    $('.business_cat').slick({
        slidesToShow: 10,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>







<script src="https://apis.google.com/js/platform.js" async defer></script>
	
<script>
    function signOut() {
		
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
		 window.location = "logout.php/state=not_logged_in"; 
        
      });
    }

    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
  </script>
  
 <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</body>

</html>
