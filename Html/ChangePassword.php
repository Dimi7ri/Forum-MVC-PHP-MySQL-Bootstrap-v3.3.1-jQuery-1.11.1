<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Change your password</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		 
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/changepass.js"></script>			 
     </head>
	 <body>	 
	   	 <div class="container">
	     <h1><span>Change your password</p></span></h1>
		 <form id="ChangePass" name="ChangePass" action="changepassword" method="post">
			<h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
			<p>Current password:</p>
			<input name="curpass" type="password" maxlength="40"/>			
			<p>New password:</p>
			<input id="newpass" name="newpass" type="password" maxlength="40"/>	
			<p>Re-enter password:</p>
			<input id="newpass2" name="newpass2" type="password" maxlength="40"/></br></br>
			<input type="submit" class="btn btn-primary" name="ChangePass" value="Save" />
			<button type="button" class="btn btn-primary" onclick="location.href='main'">Cancel</button>
		 </form>		 
	     </div>
	 </body>
</html>