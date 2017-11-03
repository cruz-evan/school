<?php
	session_start();
	require_once('config.php');
	if(!isset($_SESSION['user']))
	{
		header('Location: index.php?accessAlert=true');
	}
	if (isset($_GET['delID'])) 
	{
		$query = "SELECT * FROM users WHERE UserID = ".mysqli_real_escape_string($link, $_GET['delID']);
		$query2 = "DELETE FROM users WHERE UserID = ".mysqli_real_escape_string($link, $_GET['delID']);
		$result = mysqli_query($link, $query);

		if ($result) 
		{
			while($row = mysqli_fetch_assoc($result))
			{ 
				if($row['Username']== $_SESSION['user'])
				{
					$user=$_SESSION['user'];
					session_destroy();
					header('Location: index.php?logAlert='.$user);
				}
			}
		}
		
		$result2 = mysqli_query($link, $query2);
		
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
			<meta name="description" content="Assignment 3 - Listing page with deletion functionality">

			<title>Assignment 3</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			
    </head>
    <body>
	    <div class="container">
			<h1>Listing of Users</h1>
			<a href='listing.php?logO=log'><button type ="button" class="btn">Logout</button></a>
			<div class="panel panel-default">
				<div class="panel-heading">Existing Records</div>
				<?php
					$query = "SELECT * FROM users";
					$result = mysqli_query($link, $query);
					echo "<table class='table'>";
					echo "<tr><th>Username</th><th>Creation Date</th><th>Actions</th></tr>";
					
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr style='border-bottom: 1px solid #ececec;'>";
						echo "<td>".$row['Username']."</td>";
						echo "<td>".$row['Date']."</td>";
						if($row['Username'] != 'admin' && isset($_SESSION['user']))
						{
							echo "<td><a href='listing.php?delID=".$row['UserID']."'>Delete</a></td>";	
						}
						else
						{
							echo "<td></td>";
						}
						echo "</tr>";
					
					}
					echo "</table>";
				?>
				</div>
			</div>
		</div>
    </body>
</html>
<?php
	
	mysqli_close($link);

?>