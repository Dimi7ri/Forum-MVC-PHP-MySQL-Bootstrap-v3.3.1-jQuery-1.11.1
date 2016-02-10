<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Registration</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/createuser.js"></script>			 
     </head>
	 <body>	 
		 <div class="container">
	     <h1><span>Create your account</span></h1></br>
		 <form id="register" name="CreateAcc" action="register"" method="post">
				 <p>Name:</p>
				 <input type="text" name="name" value="<?=$this->userdata['name'];?>" />
				 <p>Last name:</p>
				 <input type="text" name="lastname" value="<?=$this->userdata['lastname'];?>" />				 
				 <p>Username:</p>
		 		 <input type="text" name="login" />
				 <p>Email address:</p>
				 <input type="text" placeholder="Enter email" id="email" name="email" value="<?=$this->userdata['email'];?>" />
				 <p>Confirm your Email:</p>
				 <input type="text" placeholder="Enter email" id="email2" name="email2" value="<?=$this->userdata['email'];?>" />
				 <p>Password:</p>
				 <input id="password1" name="password1" placeholder="Enter password" type="password" />			 
				 <p>Confirm your password:</p>
				 <input id="password2" name="password2" placeholder="Enter password" type="password" />
				 <p>Birth Date:</p>
				 <input type="date" id="birthdate" name="birthdate" value="<?=$this->userdata['birthdate'];?>" />
			     <p>Country:</p>
				 <select name="country">
				 	<? foreach($this->countrylist as $e) { ?>
						<option value ="<?=$e['Code']?>"
						<?if($e['Code'] == $this->userdata['country']){?>
						<?echo 'selected'?>
						<?}?>		
						><?=$e['Name']?></option>	
					<? } ?>	
				 </select>
				 </br></br>
				 <label class="checkbox-inline"><input type="checkbox" name="checkbox" value=""> I've read and accept the <a href="../rules">Rules</a> of this site:</label>
				 </br></br>	
				 <input type="submit" class="btn btn-primary" name="NewAccount" value="Create Account"/>	
				 <button type="button" class="btn btn-primary" onclick="location.href='login'">Cancel</button></br>			 
         </form>		 
	    </div>
	 </body>
</html>