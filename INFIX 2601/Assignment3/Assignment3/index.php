<?php
	session_start();
	require_once('config.php');
	date_default_timezone_set('Canada/Atlantic');
	if(isset($_GET['accessAlert']))
	{
		print '<script type="text/javascript">'; 
		print 'alert("Non logged-in users cannot access this page, redirected to login")'; 
		print '</script>';
	}
	else if(isset($_GET['logAlert']))
	{
		print '<script type="text/javascript">'; 
		print 'alert("User '.$_GET['logAlert'].' signed out")'; 
		print '</script>';
	}
	if (isset($_POST['Reg'])) {
		if(preg_match("/^[a-zA-Z0-9]*$/", $_POST[userReg]))
		{
			if(preg_match("/\w*[$#@!][$#@!]*\w*/", $_POST[passReg]))
			{
				if(strlen($_POST[userReg]) < 25 && strlen($_POST[passReg]) < 25)
				{
					$password = md5($_POST['passReg']);
					$t=time();
					$query = "INSERT INTO users SET ";
					$query .= "Username = '".mysqli_real_escape_string($link, $_POST['userReg'])."',";
					$query .= "Pass = '".mysqli_real_escape_string($link, $password)."',";
					$query .= "Date = '".mysqli_real_escape_string($link, date("D M j g:i:s Y",$t))."'";
					$result = mysqli_query($link, $query);

					if ($result) 
					{
						$notice = "User has been registered";
					}
				}
				else
				{
					$notice = "Username and password cannot be longer than 25 characters";
				}
			}
			else
			{
				$notice = "User could not be created ensure that the username contains only letters and numbers and password contains letters, numbers and at least one $, #, @, or !";
			}
		}
		else
		{
			$notice = "User could not be created ensure that the username contains only letters and numbers and password contains letters, numbers and at least one $, #, @, or !";
		}
	}
	if (isset($_GET['Log'])) 
	{	
		$password=md5($_GET['passLog']);
		echo $password;
		$query = "SELECT * FROM users WHERE Username = '".mysqli_real_escape_string($link, $_GET['userLog'])."' AND Pass = '".mysqli_real_escape_string($link, $password)."'";
		$result = mysqli_query($link, $query);
		
		if (mysqli_num_rows($result) == 1)
		{
			$_SESSION['user'] = mysqli_real_escape_string($link, $_GET['userLog']);
			$_SESSION['pass'] = mysqli_real_escape_string($link, $_GET['passLog']);
			header('Location: welcome.php');
		} 
		else 
		{
			$notice = "Either Username or Password is not registered";
		}
			
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Assignment 3 - Logins with SQL database">

			<title>Assignment 3</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			
    </head>
    <body>
	    <div class="container">
			<h1>Main Login</h1>
			<div class="panel panel-default">
				<div class="panel-heading">User Login</div>
				<div class="panel-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
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
			<div class="panel panel-default">
				<div class="panel-heading">User Register</div>
				<div class="panel-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
			<p>
				<?php
					echo $notice;
				?>
			</p>
		</div>
    </body>
</html>

<?php
	
	mysqli_close($link);

?>

