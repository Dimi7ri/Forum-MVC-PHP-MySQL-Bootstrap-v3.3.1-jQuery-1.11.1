<!DOCTYPE html>
<html>
	<head>
		<title>Report comment: <?=$this->commentinfo["comment_id"];?></title>
	    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		<link href = "static/css/bootstrap.css" rel = "stylesheet">
	</head>
	<body>
		<div class="container">
			<h1>Report comment:</h1>
			<h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br></br>
			<div class ="row">
				<table class="table">
					<tr><td>Post title: <?=$this->commentinfo['title'];?></td></td>
					<tr class="active"><td>Posted by: <?=$this->commentinfo['account']?></td></td>
					<tr class="active"><td class="text-info"><strong><?=nl2br($this->commentinfo['comment']);?></strong></td></td>
					<tr class="active"><td>Comment Date: <?=$this->commentinfo['comment_date']?></td></td>
					<tr><td></td>
				</table>
			</div>
		
			<form method="post" action="reportcomment=<?=$this->commentinfo['comment_id'];?>">	
				<?if(($_SESSION['account']) AND ($_SESSION['acesslevel']<2)){?>
					<p>Are you sure you want to report this comment as inappropriate?</p>
					<input type="submit" class="btn btn-primary" name="Report" value="Report" />
					<button type="button" class="btn btn-primary" onclick="location.href='seepost=<?=$this->commentinfo["post_id"];?>'">Return</button>
				<?}?>
				<?if($_SESSION['acesslevel']>=2){?>
				<p>Do you want to delete this comment?</p>
					<input type="submit" class="btn btn-primary" name="Delete" value="Delete" />
					<button type="button" class="btn btn-primary" onclick="location.href='seepost=<?=$this->commentinfo["post_id"];?>'">Return</button>
				<?}?>
				<input type="hidden" name="PostId" value="<?=$this->commentinfo["post_id"];?>"/>
			</form>
		</div>
	</body>
</html>	