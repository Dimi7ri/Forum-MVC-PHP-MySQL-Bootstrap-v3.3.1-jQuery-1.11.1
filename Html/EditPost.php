<!DOCTYPE html>
<html>
	<head>
	  	 <title>Edit Post: <?=$this->postinfo["title"];?></title>
	     <meta name = "viewport" content="width=device-width, initial-scale=1.0">
	 	 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/editpost.js"></script>				
	</head>
	<body>
		<form id="editpost" method="post" action="editpost=<?=$this->postinfo["post_id"];?>">
			<div class="container">
			<h1>Edit post</h1>
			<h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
			<p>User: <?=$this->postinfo["account"];?></p>
			<p>Post date: <?=$this->postinfo["post_date"];?></p>

			<p>Topic:</p>
			<select name="topic_id">
				 	<? foreach($this->topicslist as $e) { ?>
						<option value ="<?=$e['topic_id']?>"
						<?if($e['topic_id'] == $this->postinfo['topic_id']){?>
						<?echo 'selected'?>
						<?}?>		
						><?=$e['name']?></option>	
					<? } ?>	
			</select></br></br>			
		    <p>Title:</p>
			<textarea name="title" class="form-control" cols="90" rows="1" maxlength="90" ><?=$this->postinfo["title"];?></textarea><br>
			<p>Body: </p>
			<textarea name="PostData" class="form-control" cols="90" rows="30" maxlength="8000" ><?=$this->postinfo["content"];?></textarea><br>		
			<input type="submit" class="btn btn-primary" name="EditPost" value="Save" />	
			<input type="hidden" name="PostId" value="<?=$this->postinfo["post_id"];?>"/>
			<?if(($_SESSION['account'] == $this->postinfo["account"]) OR ($_SESSION['acesslevel']>=2)){?>
				<?if(!$this->postinfo["deleted"]){?>
					<input type="submit" class="btn btn-primary" name="Delete" value="Delete" />
				<?}?>	
				<?if($this->postinfo["deleted"]){?>
					<input type="submit" class="btn btn-primary" name="Recover" value="Recover" />
				<?}?>	
					<input type="hidden" name="PostId" value="<?=$this->postinfo["post_id"];?>"/>
				<?if(($_SESSION['acesslevel']>=2)AND(!isset($this->postinfo["approved_by"]))){?>
					<input type="submit" class="btn btn-primary" name="Approve" value="Approve" />
				<?}?>	
			<?}?>	
			<button type="button" class="btn btn-primary" onclick="location.href='seepost=<?=$this->postinfo["post_id"];?>'">Return</button></br></br></br></br></br></br>	
			</div>
		</form>
	</body>
</html>	