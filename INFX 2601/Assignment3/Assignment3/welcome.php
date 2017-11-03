<?php
	session_start();
	require_once('config.php');
	if(!isset($_SESSION['user']))
	{
		header('Location: index.php?accessAlert=true');
	}
	if (isset($_POST['welcSub'])) {
		$query = "UPDATE welcome SET ";
		$query .= "welcData = '".mysqli_real_escape_string($link, $_POST['welcomeData'])."'";
		$result = mysqli_query($link, $query);

		if ($result) 
		{
			$notice = "Data has been inserted: <br>";
			$notice .= $query;
		}
	}
	$textArea = "SELECT * FROM welcome";
	$result = mysqli_query($link, $textArea);

	if ($result) 
	{
		while($row = mysqli_fetch_assoc($result))
		{ 
			$textData=$row['welcData'];
		}
	}
	if(isset($_GET[logO]))
	{
		$user=$_SESSION['user'];
		session_destroy();
		header('Location: index.php?logAlert='.$user);
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Assignment 3 - Welcome page">

			<title>Assignment 3</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			
    </head>
    <body>
	    <div class="container">
			<h1>Welcome</h1>
			<a href='welcome.php?logO=log'><button type ="button" class="btn">Logout</button></a>
			<div class="panel panel-default">
				<div class="panel-heading">Welcome Message</div>
				<div class="panel-body">
					<?php echo $textData; ?>
				</div>
			</div>
			<a href="listing.php"><button type="button" class ="btn btn-success">Continue</button></a>
			<?php
				if($_SESSION['user'] == 'admin')
				{		
				echo '<div class="panel panel-default">';
					echo '<div class="panel-heading">Admin Edit Welcome Message</div>';
					echo '<div class="panel-body">';
						echo '<form action="welcome.php"'; echo 'method="post">';
							echo '<textarea name="welcomeData" rows="3" cols="50"></textarea>';
							echo '<input type="submit" value="Submit" name="welcSub">';
						echo '</form>';
					echo '</div>';
				echo '</div>';
				}
			?>
		</div>
    </body>
</html>
<?php
	
	mysqli_close($link);

?>