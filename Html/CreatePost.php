<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>New Post Creation</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		 
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/createpost.js"></script>		 
     </head>
	 <body>	 
		 <div class="container">
	     <h1><span>Consider our rules before you create a new post.</span></h1>
		 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		 <form id="CreatePost" name="CreatePost" action="createpost"" method="post">
				<p>Topic:</p>
				 <select name="topic">
				 	<? foreach($this->topicslist as $e) { ?>
						<option value ="<?=$e['topic_id']?>"
						<?if($e['topic_id'] == $this->topicslist['name']){?>
						<?echo 'selected'?>
						<?}?>		
						><?=$e['name']?></option>	
					<? } ?>	
				 </select></br></br>
				 <p>Title:</p>
				 <textarea name="title" class="form-control" cols="90" rows="1" maxlength="90" ></textarea><br>
				 <p>Body:</p>
				 <textarea name="PostData" class="form-control" cols="90" rows="30 maxlength="8000" ></textarea><br>
				 </br>
				 <input type="submit" class="btn btn-primary" name="NewPost" value="Create" />	
				 <button type="button" class="btn btn-primary" onclick="location.href='main'">Cancel</button></br></br></br></br></br></br>				 
         </form>		 
	     </div>
	 </body>
</html>