<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Main Panel</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
     </head>
	 <body>	 
		<div class="container">
		<h1><span>Main Panel</span></h1>
		<?if($_SESSION['account']){?>
			 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3>
		<?}?>
		<?if(!$_SESSION['account']){?>
			 <h3><span class="label label-info">Welcome Guest</span></h3>
			 <p>Please <a href="login">Login</a> or <a href="register">Register</a>.</p>
		<?}?>
		</br>
		<p>News:</p> 
		<table border="1" class="table table-hover">
				<tr>
				<th>Article</th>
				<th>Topic</th>
				<th>Posted by</th>
				<th>Date</th>
				</tr>
				<? foreach($this->LastTenList as $e) { ?>
				<tr>
				<td><a href="seepost=<?= $e['post_id']?>"><?= $e['title']?></a></td>
				<td><?= $e['name']?></td>
				<td><?= $e['account']?></td>
				<td><?= $e['post_date']?></td>
				</tr>
		 <? } ?>	
		 </table></br></br>
		 
		 <?if($_SESSION['account']){?>
			<button type="button" class="btn btn-primary" onclick="location.href='createpost'">New post</button>
			<button type="button" class="btn btn-primary" onclick="location.href='updateuserinfo'">Edit personal info</button>
			<button type="button" class="btn btn-primary" onclick="location.href='changepassword'">Change password</button>
			 <?if($_SESSION['acesslevel']>=4){?>
				  <button type="button" class="btn btn-primary" onclick="location.href='deletedposts'">See deleted posts *</button>
			 <?}?> 
			 <?if($_SESSION['acesslevel']>=2){?>
				  <button type="button" class="btn btn-primary" onclick="location.href='unverifiedposts'">Unverified posts</button>
			 <?}?> 
			 <?if($_SESSION['acesslevel']>=2){?>
				  <button type="button" class="btn btn-primary" onclick="location.href='reportedcommentslist'">Reported comments</button>
			 <?}?> 
			 <?if($_SESSION['acesslevel']>=3){?>
				  <button type="button" class="btn btn-primary" onclick="location.href='userslist'">Users list</button>
			 <?}?>
			 <?if($_SESSION['acesslevel']>=3){?>
				  <button type="button" class="btn btn-primary" onclick="location.href='definetopics'">Define topics</button>
			 <?}?>
			 <?if($_SESSION['acesslevel']>=3){?>
				  <button type="button" class="btn btn-primary" onclick="location.href='statistics'">Statistics</button>
			 <?}?> 
			<button type="button" class="btn btn-primary" onclick="location.href='logout'">Logout</button>
		 <?}?>
	     </div>
	 </body>
</html>