<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<h1>Sign In</h1>
		
		<form class="form" action="chat" method="post">
		    
			<input type="text" placeholder="Username" name="email">
			<input type="password" placeholder="Password" name="password">
			<input id="" type="hidden" name="_token" value={{ csrf_token() }} >
			<button type="submit" id="login">Login</button>
		</form>
		<h2>OR</h2>
		<a href="{!!URL::to('facebook')!!}">Login with Facebook</a> 
		<a href="{!!URL::to('google')!!}">Login with Google</a> 
		<a href="signup" style="text-decoration:none;color:white;"><h1>Sign Up</h1></a>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
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
