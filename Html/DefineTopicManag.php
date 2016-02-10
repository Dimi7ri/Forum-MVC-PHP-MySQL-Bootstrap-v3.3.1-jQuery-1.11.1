<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Topic information: <?=$this->topicinfo['name'];?></title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
		 <link href = "static/css/styles.css" rel = "stylesheet">		 
		 <script type="text/javascript" src="static/js/jquery-1.11.1.js"></script>
	     <script type="text/javascript" src="static/js/jquery.validate.js"></script>
		 <script type="text/javascript" src="static/js/additional-methods.js"></script>
         <script type="text/javascript" src="static/js/edittopic.js"></script>			 
     </head>
	 <body>	 
		 <div class="container">
		 <form id="UpdateTopic" name="UpdateTopic" action="topic_id=<?=$this->topicinfo['topic_id'];?>" method="post">
		 <h1>Topic Information</h1>
		 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br>
		 <p>Topic's name:</p>
		 <input type="text" name="name" value="<?=$this->topicinfo['name'];?>"></br></br>
		 <p>Created by: <?=$this->topicinfo['account'];?></p></br>
		 <input type="submit" class="btn btn-primary" name="Update" value="Update"/>
		 <button type="button" class="btn btn-primary" onclick="location.href='definetopics'">Return</button>
         </form>		 
	     </div>
	 </body>
</html>