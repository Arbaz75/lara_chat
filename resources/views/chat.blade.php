<?php
$myid =session('user')->uname;
$fid = session()->get('fid');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/livestamp.js"></script>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<style type="text/css">
  #back {background: #50a3a2;
  background: -webkit-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
}</style>
</head>

<body id="back">
    
	<div class="container">
	<p style="color:blue";>Welcome {{ $myid }}<br>Sending Msg To : {{$fid}}</p> 

      <div class="chat" id="chat">
        <div class="stream" id="cstream">

      </div>
      </div>
      <div class="msg">
          <form method="post" id="msenger" action="">
            <textarea name="msg" id="msg-min"></textarea>
            <input type="hidden" name="mid" value="<?php echo $myid;?>">
            <input type="hidden" name="fid" value="<?php echo $fid;?>">
            <input id="" type="hidden" name="_token" value={{ csrf_token() }} >
            <input type="submit" value="Send" id="sb-mt">
          </form>
      </div>
      <div id="dataHelper" last-id=""></div>
  </div>
</div>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

<script src="js/index.js"></script>
<script type="text/javascript">
$(document).keyup(function(e){
	if(e.keyCode == 13){
		if($('#msenger textarea').val().trim() == ""){
			$('#msenger textarea').val('');
		}else{
			$('#msenger textarea').attr('readonly', 'readonly');
			$('#sb-mt').attr('disabled', 'disabled');	// Disable submit button
			sendMsg();
		}		
	}
});	

$(document).ready(function() {
    $('#msg-min').focus();
	$('#msenger').submit(function(e){
		//$('#msenger textarea').attr('readonly', 'readonly');
		//$('#sb-mt').attr('disabled', 'disabled');	// Disable submit button
		sendMsg();
		e.preventDefault();	
	});
});

function sendMsg(){
	$.ajax({
		type: 'post',
		url: 'chatM/new',
		data: $('#msenger').serialize(),
		dataType: 'json',
		success: function(rsp){
			   $('#msenger textarea').removeAttr('readonly');
				$('#sb-mt').removeAttr('disabled');	// Enable submit button
				if(parseInt(rsp.status) == 0){
					alert(rsp.msg);
				}else if(parseInt(rsp.status) == 1){
					$('#msenger textarea').val('');
					$('#msenger textarea').focus();
					//$design = '<div>'+rsp.msg+'<span class="time-'+rsp.lid+'"></span></div>';
					$design = '<div class="float-fix">'+
									'<div class="m-rply">'+
										'<div class="msg-bg">'+
											'<div class="msgA">'+
												"Me: "+rsp.msg+
												'<div class="">'+
													'<div class="msg-time time-'+rsp.lid+' "></div>'+
													'<div class="myrply-i"></div>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';
					$('#cstream').append($design);
                    $('.time-'+rsp.lid).livestamp();
					$('#dataHelper').attr('last-id', rsp.lid);
					$('#chat').scrollTop($('#cstream').height());
				}
			},
		error: function(jqXHR){
                     console.log("error errorThrown");      
                            }
		});
}
function checkStatus(){
	$fid = '<?php echo $fid; ?>';
	$mid = '<?php echo $myid; ?>';
	$.ajax({
		type: 'post',
		url: 'chatM/msg',
		data: {fid: $fid, mid: $mid, lid: $('#dataHelper').attr('last-id')},
		dataType: 'json',
		cache: false,
		success: function(rsp){
			   if(parseInt(rsp.status) == 0){
					return false;
				}else if(parseInt(rsp.status) == 1){
					getMsg();
				}
			},
		error: function(jqXHR){
                     console.log("msg error errorThrown");      
                            }
		
		});	
}

// Check for latest message
setInterval(function(){checkStatus();}, 200);

function getMsg(){
	$fid = '<?php echo $fid; ?>';
	$mid = '<?php echo $myid; ?>';
	$.ajax({
		type: 'post',
		url: 'chatM/NewMsg',
		data:  {fid: $fid, mid: $mid},
		dataType: 'json',
		success: function(rsp){
				if(parseInt(rsp.status) == 0){
					//alert(rsp.msg);
				}else if(parseInt(rsp.status) == 1){
					$design = '<div class="float-fix">'+
									'<div class="f-rply">'+
										'<div class="msg-bgn">'+
											'<div class="msgA">'+
												rsp.from+": "+rsp.msg+
												'<div class="">'+
													'<div class="msg-time time-'+rsp.lid+'"></div>'+
													'<div class="myrply-f"></div>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';
					$('#cstream').append($design);
					$('#chat').scrollTop ($('#cstream').height());
					$('.time-'+rsp.lid).livestamp();
					$('#dataHelper').attr('last-id', rsp.lid);	
				}
			}
	});
}
</script>
</body>
</html>