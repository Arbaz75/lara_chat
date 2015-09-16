<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!--<script type="text/javascript">
		$(document).ready(function()
		{
				$("#adduser").submit(function (e)
				{
                    var postData = $("#adduser").serialize();
                    console.log(postData);
                    var formURL = $(this).attr("action");
                    $.ajax(
                    {
                    	type: "post",
                    	url: formURL,
                    	data: postData,
                        success: function (res)
                        {
                        	alert(res);
                        	//document.getElementById("arbaz").innerHTML = "success fully submitted Data : "+data+" Status : "+textStatus;
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                        //if fails     
                        console.log("fails");
                        }
                    });
                    e.preventDefault(); //STOP default action
                    $('#adduser').unbind(); //unbind. to stop multiple form submit.
                });
                 
               
});
</script>-->
</head>

<body>

	<div class="wrapper">
		<div class="container">
			<h2>Welcome {{session('user')->email}}</h2>

			<form class="form" action="addme" id="adduser" method="post">

				<input type="email" placeholder="Enter Friend Email" name="username">
				<input id="" type="hidden" name="_token" value={{ csrf_token() }} >
				<button type="submit" id="login">ADD USER</button>
				

			</form>
       

		</div>

		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>

		</ul>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/index.js"></script>




</body>
</html>
