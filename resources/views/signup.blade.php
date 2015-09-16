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
		<h1>Sign up</h1>
		
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif


		
		<form class="form" action="signupcontroller" method="post">
		    
			
			<input type="text" placeholder="Name" name="name">
			<input type="text" placeholder="Email" name="email">
			<input type="password" placeholder="Password" name="password">
			<input type="password" placeholder="Repeat Password" name="password_confirmation">
			<input id="" type="hidden" name="_token" value={{ csrf_token() }} >
			<button type="submit" id="login">Create Account</button>
		</form>
		
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
