<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Users Administration</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
     </head>
	 <body>	 
		 <div class="container">
		 <form name="EditAcc" action="userslist" method="post">
		 <h1><span>Users Management</span></h1>
		  <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		 <table border="1" class="table table-hover">
		 	<tr>
			<th>Account</th>
			<th>Access level</th>
			<th>Status</th>
			</tr>
			<? foreach($this->adminlist as $e) { ?>
			<tr>
			<td><a href="userinfo=<?= $e['user_id']?>"><?= $e['account']?></a></td>
			<td><?= $e['description']?></td>
			<td><? 
			if($e['blocked']){
				echo'<p class="text-danger"><strong>Blocked</strong></p>';
			}
			else{
				echo'<p class="text-info"><strong>Not Blocked</strong></p>';
			}
			?></td>
			</tr>
			<? } ?>	
		 </table></br></br>
		 <button type="button" class="btn btn-primary" onclick="location.href='main'">Return</button>
         </form>		 
	     </div>
	 </body>
</html>