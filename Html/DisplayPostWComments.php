<!DOCTYPE html>
<html>
	<head>
		<title><?=$this->postinfo["title"];?></title>
		<meta name = "viewport" content="width=device-width, initial-scale=1.0">
		<link href = "static/css/bootstrap.css" rel = "stylesheet">
		<link href = "static/css/styles.css" rel = "stylesheet">
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/displaypostswcomments.js"></script>			
	</head>
	<body>
		<div class="container">
		<h1><?=$this->postinfo["title"];?></h1>
		<?if(($_SESSION['account'])){?>
		<h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		<?}?>
		<p class="text-info">Posted by: <?=$this->postinfo["account"];?></p>
		<p class="text-info">Post date: <?=$this->postinfo["post_date"];?></p>
		<p class="text-info">Body: </p>
		<div class="container">
		<p class="active"><?=nl2br($this->postinfo["content"]);?></p>
		</div>
		<p class="text-info">Comments: </p>
		<div class="container">
		<div class ="row">
		<? foreach($this->comments as $e) { ?>
			<table class="table">
				<tr class="active"><td>Posted by: <?= $e['account']?></td></td>
				<tr class="active"><td class="text-info"><strong><?= nl2br($e['comment']);?></strong></td></td>
				<tr class="active"><td>Date: <?= $e['comment_date']?> <a href="reportcomment=<?= $e['comment_id']?>">Report</a></td></td>
				<tr><td></td>
			</table>
		<? } ?>	
		</div>
		</div>
		<?if(!isset($_SESSION['userid'])){?>
		<p>Log in to comment</p></br>
		<?}?>		
		<form id="submitcomment" method="post" action="seepost=<?=$this->postinfo["post_id"];?>">
			<?if(isset($_SESSION['userid'])){?>
				<textarea name="CommentData" class="form-control" cols="10" rows="5" maxlength="500"></textarea><br>
				<input type="submit" class="btn btn-primary" name="NewComm" value="Comment" />	
				<input type="hidden" name="PostId" value="<?=$this->postinfo["post_id"];?>"/>
				<?if(($_SESSION['account'] == $this->postinfo["account"]) OR ($_SESSION['acesslevel']>=2)){?>
					<button type="button" class="btn btn-primary" onclick="location.href='editpost=<?=$this->postinfo["post_id"];?>'">Edit post</button>
				<?}?>
			<?}?>		
		<button type="button" class="btn btn-primary" onclick="location.href='main'">Return Main Menu</button>
		<?if($_SESSION['acesslevel']>=2){?>
		<button type="button" class="btn btn-primary" onclick="location.href='unverifiedposts'">Return Unverified Posts</button>
		<?}?>			
		</form>
		</div>
	</body>
</html>	