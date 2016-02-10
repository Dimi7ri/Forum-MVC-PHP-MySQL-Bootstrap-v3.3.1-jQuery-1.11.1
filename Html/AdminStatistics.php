<!DOCTYPE html>
<html>
     <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>Statistics</title>
		 <meta name = "viewport" content="width=device-width, initial-scale=1.0">
		 <link href = "static/css/bootstrap.css" rel = "stylesheet">
     </head>
	 <body>	 
		 <div class="container">
	     <h1><span>Statistics Panel</span></h1>
		 <h3><span class="label label-info">Account: <?=$_SESSION['account'];?></span></h3></br></br>
		 <p><strong>User that posted the most: </strong></p>
		 <table border="1" class="table table-hover">
		 	<tr>
			<th>User name: </th>
			<th>Posts:</th>
			</tr>
			<tr>
			<td><?=$this->adminlist1['account']?></td>
			<td><?=$this->adminlist1['quant']?></td>
			</tr>
		 </table></br></br> 
		 
		 <p><strong>User that commented the most: </strong></p>
		 <table border="1" class="table table-hover">
		 	<tr>
			<th>User name: </th>
			<th>Comments:</th>
			</tr>
			<tr>
			<td><?=$this->adminlist2['account']?></td>
			<td><?=$this->adminlist2['quant']?></td>
			</tr>
		 </table></br></br> 
		 
		 <button type="button" class="btn btn-primary" onclick="location.href='main'">Return</button>				 	 
	     </div>
	 </body>
</html>