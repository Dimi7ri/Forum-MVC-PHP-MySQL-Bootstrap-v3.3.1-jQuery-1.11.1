<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Main Panel</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		 
     </head>
	 <body>	 
	    <div class="container">
		<h1><span>Deleted posts list</span></h1>
		<h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		<?if($this->DeletedPosts){?>
			<table border="1" class="table table-hover">
					<tr>
					<th>Title</th>
					<th>Posted by</th>
					<th>Date</th>
					</tr>		
					<? foreach($this->DeletedPosts as $e) { ?>
						<tr>
						<td><a href="seepost=<?= $e['post_id']?>"><?= $e['title']?></a></td>
						<td><?= $e['account']?></td>
						<td><?= $e['post_date']?></td>
						</tr>
					<? } ?>	
			</table></br></br>
		<?}?>
		<?if(!$this->DeletedPosts){
		echo 'No results found';
		}?></br></br>
		 <button type="button" class="btn btn-primary" onclick="location.href='main'">Return</button>
	     </div>
	 </body>
</html>