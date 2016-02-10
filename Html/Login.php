<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Welcome</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/login.js"></script>
	 </head>
	 <body>	 
		 <div class="container">
	     <h1><span>Login</span></h1></br>
		 <form id="Login" name="Login" action="login" method="post">
				 <p>Username:</p>
				 <input type="text" name="username" maxlength="40">
				 <p>Password:</p>
				 <p><input type="password" name="password" maxlength="40"></br></br>
				 <input type="submit" class="btn btn-primary" name="LogAccount" value="Login"/>
				 <button type="button" class="btn btn-primary" onclick="location.href='register'">Sign up</button>	 
         </form>		 
	     </div>
	 </body>
</html>