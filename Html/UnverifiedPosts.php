<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Unverified posts</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
     </head>
	<body>	 
		<div class="container">
		<h1><span>Unverified Posts</span></h1>
		<?if($_SESSION['account']){?>
			 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3>
		<?}?>
		</br>
		<?if($this->UnverifList){?>
			<p>Unverified Posts List:</p> 
			<table border="1" class="table table-hover">
				<tr>
				<th>Article</th>
				<th>Topic</th>
				<th>Posted by</th>
				<th>Date</th>
				</tr>
				<? foreach($this->UnverifList as $e) { ?>
					<tr>
					<td><a href="seepost=<?= $e['post_id']?>"><?= $e['title']?></a></td>
					<td><?= $e['name']?></td>
					<td><?= $e['account']?></td>
					<td><?= $e['post_date']?></td>
					</tr>
				<? } ?>	
			</table></br></br>
		<? } else {?>
			</br></br><p>Hooray, there are no posts waiting to be checked!<p></br></br></br></br>
		<? } ?>
		<button type="button" class="btn btn-primary" onclick="location.href='main'">Return</button>	
	    </div>
	</body>
</html>