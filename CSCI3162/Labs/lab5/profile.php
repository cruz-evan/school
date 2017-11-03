<?php 
	session_start();
	if(!isset($_SESSION['name']))
	{
		header('Location: index.php?accessAlert=true');
	}
	require_once('include/config.php');
	$salt = "$2y$10$".bin2hex(openssl_random_pseudo_bytes(22));
	function mysql_fix_string($string){
		if(get_magic_quotes_gpc()) $string=stripslashes($string);
		return mysql_real_escape_string($string);
	}
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
	if (isset($_POST['conEdit'])) 
	{
		if(empty($_POST['userReg']) || empty($_POST['emailReg']) || empty($_POST['addressReg']))
		{
        	$notice= 'Please fill out all fields.';
        }

		else if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['userReg']))
		{
			if(preg_match("/\w*@\w*.\w*/", $_POST['emailReg']))
			{
				if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['addressReg']))
				{
					if(strlen($_POST['userReg']) < 25 && strlen($_POST['emailReg']) && strlen($_POST['addressReg']))
					{
						$testname=htmlspecialchars($_POST['userReg']);
						$check = $pdo->prepare("SELECT * FROM users WHERE username=:testname");
						$check->bindParam(':testname',$testname, ENT_QUOTES);
    					$check->execute();
    					$user=$check->fetch();
    					$currName=$user['username'];

    					if($currName=$_SESSION['name'])
    					{
    						
				      		$stmt = $pdo->prepare("UPDATE users SET username=:newName, user_email=:email, user_address=:address WHERE username = :name");
							$stmt->bindParam(':newName', $newName);
							$stmt->bindParam(':email', $email);
							$stmt->bindParam(':address', $address);
							$stmt->bindParam(':name', $name);

							$newName=htmlentities(mysql_fix_string($_POST['userReg']), ENT_QUOTES);
							$name=$_SESSION['name'];
							$email=htmlentities(mysql_fix_string($_POST['emailReg']), ENT_QUOTES);
							$address=htmlentities(mysql_fix_string($_POST['addressReg']), ENT_QUOTES);

							$_SESSION['name']=$newName;
				      		$_SESSION['email']=$email;
				      		$_SESSION['address']=$address;

							if ($stmt->execute()) 
							{
								header('Location: profile.php?notice=User updated');
							}
							
						}
						else if($check->rowCount() > 0)
    					{
    						$notice = 'User exists';
    					}
						else
    					{
    						
				      		$stmt = $pdo->prepare("UPDATE users SET username=:newName, user_email=:email, user_address=:address WHERE username = :name");
							$stmt->bindParam(':newName', $newName);
							$stmt->bindParam(':email', $email);
							$stmt->bindParam(':address', $address);
							$stmt->bindParam(':name', $name);

							$newName=htmlentities(mysql_fix_string($_POST['userReg']), ENT_QUOTES);
							$name=$_SESSION['name'];
							$email=htmlentities(mysql_fix_string($_POST['emailReg']), ENT_QUOTES);
							$address=htmlentities(mysql_fix_string($_POST['addressReg']), ENT_QUOTES);

							$_SESSION['name']=$newName;
				      		$_SESSION['email']=$email;
				      		$_SESSION['address']=$address;

							if ($stmt->execute()) 
							{
								header('Location: index.php?notice=User updated');
							}
							
						}
					}
				}
				else
				{
					$notice = "Address cannot contain non-alpha numerical characters";
				}
			}
			else
			{
				$notice = "User could not be made ensure that a valid email address is entered";
			}
		}
		else
		{
			$notice = "User could not be created ensure that the username contains only letters and numbers and password contains letters, numbers and the characters $, #, @, or !";
		}
	}
	if(isset($_GET['cancel']))
	{
		$stmt = $pdo->prepare("DELETE FROM users WHERE username = :name");
		$stmt->bindParam(':name', $name);

		$name=$_SESSION['name'];

		if ($stmt->execute()) 
		{
			session_destroy();
			header('Location: index.php?logNotice=User Deleted');
		}
	}
	if(isset($_POST['conPass']))
	{
		if(empty($_POST['passReg']))
		{
        	$notice= 'Please fill out all fields.';
        }
		else if(preg_match("/^[a-zA-Z0-9@#$%]*$/", $_POST['passReg']))
		{
			if(strlen($_POST['passReg']) < 25)
			{
	      		$stmt = $pdo->prepare("UPDATE users SET user_pwd=:pwd WHERE username = :name");
	      		$stmt->bindParam(':pwd', $pwd);
				$stmt->bindParam(':name', $name);
				$pass=crypt($_POST['passReg'], $salt);

				$pwd=$pass;
				$name=$_SESSION['name'];

				if ($stmt->execute()) 
				{
					header('Location: profile.php?notice=Password updated');
				}	
			}
			else
			{
				$notice = "Password could not be updated, ensure that the password contains letters, numbers and the characters $, #, @, or !";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Lab5- profile page">

			<title>Lab 5 Profile</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/basic.css">
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			
    </head>
    <body>
	    <div class="container">
	    	<h1>MY ACCOUNT</h1>
			<?php include('include/nav.php'); ?>
			<div class="col-xs-12 col-sm-8">
				<?php 
				if(!isset($_GET['edit']) && !isset($_GET['change']))
				{
				?>
				<h3>Your Information</h3>
				<p><b>USERNAME:</b> <?php echo $_SESSION['name'] ?></p>
				<p><b>EMAIL:</b> <?php echo $_SESSION['email'] ?></p>
				<p><b>ADDRESS:</b> <?php echo $_SESSION['address'] ?></p>
				<form>
					<input type="submit" value="Edit" name="edit" class="btn btn-primary">
					<input type="submit" value="Change Password" name="change" class="btn btn-primary">
					<input type="submit" value="Delete Accout" name="cancel" class="btn btn-danger">
				</form>
				<?php
				}
				else if(isset($_GET['edit']))
				{
				?>
				<h3>Edit Your Information</h3>
				<form action="<?php echo htmlentities($_SERVER["PHP_SELF"], ENT_QUOTES); ?>" method="post">
					<div class="form-group">
						<input type="text" id="user" name="userReg" value=<?php echo $_SESSION['name'] ?> maxlength='25' required="required">
					</div>
					<div class="form-group">
						<input type="email" id="email" name="emailReg" value=<?php echo $_SESSION['email'] ?> maxlength='40' required="required">
					</div>
					<div class="form-group">
						<input type="text" id="address" name="addressReg" value=<?php echo $_SESSION['address'] ?> maxlength='40' required="required">
					</div>
					<input type="submit" value="Submit" name="conEdit" class="btn btn-success">
					<input type="button" name="quit" value="Cancel"  class="btn btn-danger" onclick="window.location='profile.php'" />
				</form>
				<?php
				}
				else if(isset($_GET['change']))
				{
				?>
				<h3>Change Your Password</h3>
				<form action="<?php echo htmlentities($_SERVER["PHP_SELF"], ENT_QUOTES); ?>" method="post">
					<div class="form-group">
						<input type="password" id="pass" name="passReg" placeholder='Password' maxlength='25' required="required">
					</div>
					<input type="submit" value="Submit" name="conPass" class="btn btn-success">
					<input type="button" name="quit" value="Cancel"  class="btn btn-danger" onclick="window.location='profile.php'" />
				</form>
				<?php
				}
				echo $notice;
				?>
			</div>
		</div>
		<?php include ('include/footer.inc.php'); ?>
    </body>
</html>