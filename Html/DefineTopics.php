<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Define Topics</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		 
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/definetopics.js"></script>			 
     </head>
	 <body>	 
		 <div class="container">
	     <h1><span>Define Topics</span></h1>
		 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		 
			<table border="1" class="table table-hover">
		 	<tr>
			<th>Topic name:</th>
			<th>Created By:</th>
			</tr>
			<? foreach($this->AdminTopicsList as $e) { ?>
			<tr>
			<td><a href="topic_id=<?= $e['topic_id']?>"><?= $e['name']?></a></td>
			<td><?= $e['account']?></td>
			</tr>
			<? } ?>	
		 </table></br></br> 
		 
		 <form id="DefineTopics" name="DefineTopics" action="definetopics"" method="post">
				 <p>New Topic:</p>
				 <textarea name="topic" class="form-control" cols="90" rows="1" maxlength="90"></textarea><br>				 
				 </br>
				 <input type="submit" class="btn btn-primary" name="CreateTopic" value="Create" />	
				 <button type="button" class="btn btn-primary" onclick="location.href='main'">Return</button>				 
         </form>		 
	     </div>
	 </body>
</html>