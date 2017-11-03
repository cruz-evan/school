<?php 
	session_start();
	require_once('include/config.php');
	if(!isset($_SESSION['name']))
	{
		$_SESSION['HTTP_USER_AGENT']=$_SERVER['HTTP_USER_AGENT'];
	}
	else
	{
		if($_SESSION['HTTP_USER_AGENT']!=$_SERVER['HTTP_USER_AGENT'])
		{
			session_destroy();
			header('Location: index.php?logNotice=Session has been comprimised, Re-Log');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Lab5- veiw">

			<title>Lab 5 Database</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/basic.css">
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/bootstrap.min.js"></script> 
			
    </head>
    <body>
	    <div class="container">
			<h1 class="text-center">DATABASE VIEW</h1>
			<?php include('include/nav.php'); ?>
			</nav>
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Database query">
			  <span class="input-group-btn">
				<button class="btn btn-default" type="button">Search</button>
			  </span>
			</div>
			<table class="table table-hover">
				<thead>
				  <tr>
					<th>Data1</th>
					<th>Data2</th>
					<th>Data3</th>
					<th>Data4</th>
					<th>Data5</th>
					<th>Data6</th>
					<th>Data7</th>
					<th>Data8</th>
					<th>Data9</th>
					<th>Data10</th>
					<th>Data11</th>
					<th>Data12</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				  <tr>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
					<td>This</td>
					<td>Will</td>
					<td>Be</td>
					<td>DB</td>
					<td>Data</td>
					<td>Display</td>
				  </tr>
				</tbody>
			  </table>
		</div>
		<?php include ('include/footer.inc.php'); ?>
    </body>
</html>