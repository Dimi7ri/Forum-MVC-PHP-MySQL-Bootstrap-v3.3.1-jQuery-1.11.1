<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>See user: <?=$userinfo['account'];?></title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
     </head>
	 <body>	 
		 <div class="container">
		 <form name="EditAcc" action="userinfo=<?=$this->userinfo['user_id'];?>" method="post">
		 <h1><span>User Information</span></h1>
		 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		 <p>UserID: <?=$this->userinfo['user_id'];?></p>
		 <p><strong>Account: <?=$this->userinfo['account'];?></strong></p>
		 <p>Email: <?=$this->userinfo['email'];?></p>
		 <p>Name: <?=$this->userinfo['name'];?></p>
		 <p>Last Name: <?=$this->userinfo['last_name'];?></p>
		 <p>Birth Date: <?=$this->userinfo['birth_date'];?></p>
		 <p>Country: <?=$this->userinfo['Name'];?></p>
		 <p>Access Level: <?=$this->userinfo['description'];?></p>
		 <p><strong>Status: <?if($this->userinfo['blocked']){
						echo 'Blocked';
					  }
					  else
						echo 'Not Blocked';
					?></strong></p></br>
		 <button type="button" class="btn btn-primary" onclick="location.href='userslist'">Return</button>
		 <?if(!$this->userinfo['blocked']){?>
		 <input type="submit" class="btn btn-primary" name="BlockUser" value="Block" />
		 <?}?>
		 <?if($this->userinfo['blocked']){?>
		 <input type="submit" class="btn btn-primary" name="UnBlockUser" value="Unblock" />
		 <?}?>
         </form>		 
	     </div>
	 </body>
</html>