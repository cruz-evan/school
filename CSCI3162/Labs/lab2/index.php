<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Lab2">

			<title>Lab 2</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/basic.css">
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			
    </head>
    <body>
	    <div class="container">
			<h1 class="text-center">RESTFUL DATABASE API</h1>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="index.php">RESTFULDB</a>
				</div>
				<ul class="nav navbar-nav">
				  <li class="active"><a href="index.php">Home</a></li>
				  <li><a href="docu.html">DOCUMENTATION</a></li> 
				  <li><a href="dabview.html">DATABASE VIEW</a></li> 
				</ul>
				 <p class="nav navbar-text navbar-right">
				  Signed in as User
				 </p>
			  </div>
			</nav>
			<div class="panel panel-default">
				<div class="row">
					<div class="col-md-8">
						<div class="jumbotron">
							<img src="datab.png" class="center-block" alt="Logo" style="height:200px;">
							<p class="text-center"> Flashy logo </p>
							<button class="btn btn-primary center-block" type="button">Download</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">User Register</div>
							<div class="panel-body">
								<form>
									<div class="form-group">
										<input type="text" id="user" name="userReg" placeholder="Username" maxlength='25'>
									</div>
									<div class="form-group">
										<input type="password" id="pass" name="passReg" placeholder="Password" maxlength='25'>
									</div>
									<input type="submit" value="Submit" name="Reg" class="btn btn-success">
								</form>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">User Login</div>
							<div class="panel-body">
								<form>
									<div class="form-group">
										<input type="text" id="user" name="userLog" placeholder="Username">
									</div>
									<div class="form-group">
										<input type="password" id="pass" name="passLog" placeholder="Password">
									</div>
									<input type="submit" value="Submit" name="Log" class="btn btn-success">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container">
				<p>
					<a href="index.php">Home</a> | <a href="docu.html">DOCUMENTATION</a> | <a href="dabview.html">DATABASE VIEW</a>
				</p>
				<div class="footietext">
					<p>
						Group 7 Project
					</p>
				<p>
					A skelton page
				</p>
				</div>
			</div>
		</footer>
    </body>
</html>

