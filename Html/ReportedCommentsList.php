<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Reported Comments List</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
     </head>
	 <body>
		 <div class="container">
		 <form name="EditAcc" action="userslist" method="post">
		 <h1><span>Reported Comments Management</span></h1>
		  <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
			<? foreach($this->RepList as $e) { ?>
			<div class ="row">
				<table class="table">
					<tr class="active">
						<td><strong><a href="seepost=<?=$e['post_id']?>"><?= $e['title']?></a></strong></td>
					</tr>
					<tr class="active">
						<td>Posted By: <?= $e['account']?></td>
					<tr class="active">
						<td>Date: <?= $e['comment_date']?></td>
					</tr>	
					<tr class="active">
						<td><strong><?=nl2br($e['comment'])?></strong></td>
					</tr>
					<tr class="danger">
						<td class="text-danger"><strong>This post was reported: <?= $e['times_reported']?> time(s).</strong>&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-primary" onclick="location.href='reportcomment=<?=$e["comment_id"];?>'">Inspect</button>
						</td>
					</tr></br>
				</table>
			</div>
			<? } ?>	
		 <button type="button" class="btn btn-primary" onclick="location.href='main'">Return</button>
         </form>		 
	     </div>
	 </body>
</html>