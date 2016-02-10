<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Account Settings</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		 
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/edituser.js"></script>			 
     </head>
	 <body>	 
	     <div class="container">
	     <h1><span>Personal info</span></h1>
		 <form id="EditAcc" name="EditAcc" action="updateuserinfo" method="post">
				 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
			  	 <p>Email address: <?=$this->userdata['email'];?></p>
				 <p>Name:</p>
				 <input type="text" name="name" value="<?=$this->userdata['name'];?>" maxlength="40">
				 <p>Last name:</p>
				 <input type="text" name="lastname" value="<?=$this->userdata['last_name'];?>" maxlength="40">
				 <p>Birth Date:</p>
				 <input type="date" name="birthdate" value="<?=$this->userdata['birth_date'];?>">
			     <p>Country:</p>
				 <select name="country">
					<? foreach($this->countrylist as $e) { ?>
						<option value ="<?=$e['Code']?>"
						<?if($e['Code'] == $this->userdata['country_code']){?>
						<?echo 'selected'?>
						<?}?>		
						><?=$e['Name']?></option>	
					<? } ?>	
				 </select>
				 </br></br>
				 <input type="submit" class="btn btn-primary" name="EditAccount" value="Save" />
				 <button type="button" class="btn btn-primary" onclick="location.href='main'">Cancel</button>
         </form>		 
	     </div>
	 </body>
</html>