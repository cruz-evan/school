<?php 
	require_once('include/config.php');
	$logNotice='';
	$notice='';
	if (isset($_POST['Reg'])) 
	{
		if(empty($_POST['userReg']) || empty($_POST['passReg']) || empty($_POST['emailReg']) || empty($_POST['addressReg']))
		{
        	$notice= 'Please fill out all fields.';
        }

		else if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['userReg']))
		{
			if(preg_match("/^[a-zA-Z0-9@#$%]*$/", $_POST['passReg']))
			{
				if(preg_match("/\w*@\w*.\w*/", $_POST['emailReg']))
				{
					if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['userReg']))
					{
						if(strlen($_POST['userReg']) < 25 && strlen($_POST['passReg']) < 25 && strlen($_POST['emailReg']) && strlen($_POST['addressReg']))
						{
							$testname=htmlspecialchars($_POST['userReg']);
							$check = $pdo->prepare("SELECT * FROM users WHERE username=:testname");
							$check->bindParam(':testname',$testname, ENT_QUOTES);
	    					$check->execute();
	    					if($check->rowCount() > 0)
	    					{
	    						$notice = 'User exists';
	    					}

	    					else
	    					{
								$stmt = $pdo->prepare("INSERT INTO users (username, user_pwd, user_email, user_address) 
								VALUES (:name, :pwd, :email, :address)");
								$stmt->bindParam(':name', $name);
								$stmt->bindParam(':pwd', $pwd);
								$stmt->bindParam(':email', $email);
								$stmt->bindParam(':address', $address);
								$pass=crypt($_POST['passReg']);
								
								$name=htmlspecialchars($_POST['userReg'], ENT_QUOTES);
								$pwd = $pass;
								$email=htmlspecialchars($_POST['emailReg'], ENT_QUOTES);
								$address=htmlspecialchars($_POST['addressReg'], ENT_QUOTES);

								if ($stmt->execute()) 
								{
									$notice = "User has been registered";
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
		else
		{
			$notice = "User could not be created ensure that the username contains only letters and numbers and password contains letters, numbers and the characters $, #, @, or !";
		}
	}
	if(isset($_GET['Log']))
	{
		if(preg_match("/^[a-zA-Z0-9]*$/", $_GET['userLog']))
		{
			$name=htmlspecialchars($_GET['userLog']);
		    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:name");
		    $stmt->bindParam(':name',$name, ENT_QUOTES);
		    $stmt->execute();
		    if($stmt->rowCount() == 0)
			{
				$logNotice = 'User does not exist';
			}
			else
			{
			    $user=$stmt->fetch(PDO::FETCH_ASSOC);
		      	if (crypt($_GET['passLog'], $user['user_pwd']) == $user['user_pwd']) 
		      	{
					$logNotice= "Password verified!";
				}
				else
				{
					$logNotice= "Password wrong!";
				}
			}
		}
		else
		{
			$logNotice="Usernames only use letters and numbers";	
		}		   
	}
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Lab3 - PHP and SQL interaction">

			<title>Lab 3</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/basic.css">
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			
    </head>
    <body>
	    <div class="container">
			<h1 class="text-center">RESTFUL DATABASE API</h1>
			<?php include('include/nav.php'); ?>
			<div class="panel panel-default">
				<div class="row">
					<div class="col-md-8">
						<div class="jumbotron">
							<img src="images/datab.png" class="center-block" alt="Logo" style="height:200px;">
							<p class="text-center"> Flashy logo </p>
							<button class="btn btn-primary center-block" type="button">Download</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">User Register</div>
							<?php include ('include/signup.inc.php'); ?>
							<p>
								<?php
									echo $notice;
								?>
							</p>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">User Login</div>
							<?php include ('include/login.inc.php'); ?>
							<p>
								<?php
									echo $logNotice;
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include ('include/footer.inc.php'); ?>
    </body>
</html>
<?php
	
	$pdo = null;

?>

