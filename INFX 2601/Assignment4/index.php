<?php
	session_start();
	require_once('config.php'); 
	include('player.php');
	if (isset($_GET['PlayerRes']))
	{
		$user = $_SESSION['name'];
		$_SESSION['loss']=$_SESSION['loss']+1;
		$query = "SELECT * FROM hangusers WHERE Username = '".mysqli_real_escape_string($link, $user)."'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$newWins=$row['Wins']+$_SESSION['wins'];
		$newLosses=$row['Losses']+$_SESSION['loss'];
		$query = "UPDATE hangusers SET ";
		$query .= " Wins = '".mysqli_real_escape_string($link, $newWins)."',";
		$query .= " Losses = '".mysqli_real_escape_string($link, $newLosses)."'";
		$query .= " WHERE Username = '".mysqli_real_escape_string($link, $user)."'";
		$result = mysqli_query($link, $query);
		$query = "SELECT * FROM hangwords";
		$result = mysqli_query($link, $query);
		$total= mysqli_num_rows($result);
		$wordSel=rand(1, $total);
		$query="SELECT HangWord FROM hangwords WHERE HangID=".$wordSel;
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$wordLength = strlen($row['HangWord']);
		$wordGame = $row['HangWord'];
		$underCount=2;
		while($underCount < $wordLength)
		{
			$underLines=$underLines."__ ";
			$underCount=$underCount+1;
		}
		$_SESSION['under']= $underLines;
		$_SESSION['wordG']= $wordGame;
		$_SESSION['guess']= 0;	
	}
	if (isset($_GET['PlayerOut']))
	{
		$user = $_SESSION['name'];
		if (isset($_GET['PlayerRes']))
		{
			$_SESSION['loss']=$_SESSION['loss'];
		}
		else
		{
			$_SESSION['loss']=$_SESSION['loss']+1;
		}
		$query = "SELECT * FROM hangusers WHERE Username = '".mysqli_real_escape_string($link, $user)."'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$newWins=$row['Wins']+$_SESSION['wins'];
		$newLosses=$row['Losses']+$_SESSION['loss'];
		$query = "UPDATE hangusers SET ";
		$query .= " Wins = '".mysqli_real_escape_string($link, $newWins)."',";
		$query .= " Losses = '".mysqli_real_escape_string($link, $newLosses)."'";
		$query .= " WHERE Username = '".mysqli_real_escape_string($link, $user)."'";
		$result = mysqli_query($link, $query);
		session_destroy();
		header('Location: index.php');
	}
	include('game.php');
	if($_SESSION['guess']==6)
	{
		header('Location: index.php?PlayerRes=res');
		print '<script type="text/javascript">'; 
		print 'alert("YOU LOSE, GAME WILL RESET")'; 
		print '</script>';
	}
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Assignment 4 - Hangman Game">

			<title>Assignment 4</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			
    </head>
    <body>
	    <div class="container">
			<h1>Hangman</h1>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Top Scores</div>
					<div class="panel-body">
					<?php
						$count=0;
						$query = "SELECT * FROM hangusers ORDER BY Wins DESC, Losses";
						$result = mysqli_query($link, $query);
						echo "<table class='table'>";
						echo "<tr><th>Username</th><th>Wins</th><th>Losses</th></tr>";
						while($count<10)
						{
							$row = mysqli_fetch_assoc($result);
							echo "<tr style='border-bottom: 1px solid #ececec;'>";
							echo "<td>".$row['Username']."</td>";
							echo "<td>".$row['Wins']."</td>";
							echo "<td>".$row['Losses']."</td>";
							echo "</tr>";
							$count++;
						}
						$query= "SELECT COUNT(Username) as userCount FROM hangusers";
						$result = mysqli_query($link, $query);
						$row = mysqli_fetch_assoc($result);
						echo "<td>Players: ".$row['userCount']."</td>";
						$query= "SELECT SUM(Wins) as winCount FROM hangusers";
						$result = mysqli_query($link, $query);
						$row = mysqli_fetch_assoc($result);
						echo "<td>Total Player Wins: ".$row['winCount']."</td>";
						$query= "SELECT SUM(Losses) as lossCount FROM hangusers";
						$result = mysqli_query($link, $query);
						$row = mysqli_fetch_assoc($result);
						echo "<td> Total Player Losses:".$row['lossCount']."</td>";
						echo "</table>";
					?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">User</div>
					<div class="panel-body">
					<?php if(!isset($_SESSION['name'])) { ?>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
							<div class="form-group">
								<input type="text" id="user" name="userLog" placeholder="Player">
							</div>
							<input type="submit" value="Play" name="Player" class="btn btn-success">								
						</form>
					<?php } ?>
					<?php if(isset($_SESSION['name'])){ ?>
						<p>Player: <?php echo $_SESSION['name']; ?> </p>
						<p>Wins: <?php echo $_SESSION['wins']; ?> Losses: <?php echo $_SESSION['loss']; ?> </p>
						
						<a href='index.php?PlayerOut=log'><button type ="button" class="btn">Quit</button></a>
						<a href='index.php?PlayerRes=res'><button type ="button" class="btn">Reset</button></a>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">File upload</div>
				<div class="panel-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
					<label for="uploadFile" class="control-label">Upload a text file</label>
					<input type="file" name="fileName" id="uploadFile">
					<input type="submit" name="submitFile" class="btn btn-default" value="Upload">
					<?php include('handler.php'); ?>
					<?php
						if($doProcess==1)
						{
							$user = $_SESSION['name'];
							if (isset($_GET['PlayerRes']))
							{
								$_SESSION['loss']=$_SESSION['loss'];
							}
							else
							{
								$_SESSION['loss']=$_SESSION['loss']+1;
							}
							$query = "SELECT * FROM hangusers WHERE Username = '".mysqli_real_escape_string($link, $user)."'";
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							$newWins=$row['Wins']+$_SESSION['wins'];
							$newLosses=$row['Losses']+$_SESSION['loss'];
							$query = "UPDATE hangusers SET ";
							$query .= " Wins = '".mysqli_real_escape_string($link, $newWins)."',";
							$query .= " Losses = '".mysqli_real_escape_string($link, $newLosses)."'";
							$query .= " WHERE Username = '".mysqli_real_escape_string($link, $user)."'";
							$result = mysqli_query($link, $query);
							$query = "TRUNCATE TABLE hangwords";
							$result = mysqli_query($link, $query);
							$fileData=file($_FILES['fileName']['tmp_name']);
							foreach($fileData as $line)
							{
								$query = "INSERT INTO hangwords SET ";
								$query .= "HangWord = '".mysqli_real_escape_string($link, $line)."'";
								$result = mysqli_query($link, $query);
							}
							header('Location: index.php?PlayerRes=res');
							print '<script type="text/javascript">'; 
							print 'alert("NEW FILE UPLOADED, GAME WILL RESET AND LOSS WILL BE LOGGED")'; 
							print '</script>';
						}
					?>
				</form>
				</div>
			</div>
			</div>
			<?php
			if (isset($_SESSION['name']))
			{
			?>
			<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">Game</div>
					<?php if($_SESSION['guess']==0){ ?>
						<img src="hang0.gif" alt="hangman0">
					<?php } ?>
					<?php if($_SESSION['guess']==1){ ?>
						<img src="hang1.gif" alt="hangman1">
					<?php } ?>
					<?php if($_SESSION['guess']==2){ ?>
						<img src="hang2.gif" alt="hangman2">
					<?php } ?>
					<?php if($_SESSION['guess']==3){ ?>
						<img src="hang4.gif" alt="hangman4">
					<?php } ?>
					<?php if($_SESSION['guess']==4){ ?>
						<img src="hang6.gif" alt="hangman6">
					<?php } ?>
					<?php if($_SESSION['guess']==5){ ?>
						<img src="hang8.gif" alt="hangman7">
					<?php } ?>
					<?php if($_SESSION['guess']==6){ ?>
						<img src="hang10.gif" alt="hangman8">
					<?php } ?>
					<?php 
						$guessLeft=6-$_SESSION['guess'];
						echo $_SESSION['under'];
						echo $_SESSION['wordG'];
						echo "<p>";
						echo "GUESSES LEFT: ".$guessLeft;
						echo "</p>";
					?>
				<div class="panel-body">
				</div>
			</div>
			</div>
			<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">Letters</div>
				<div class="panel-body">
					<a href='index.php?Letter=A'>A</a>
					<a href='index.php?Letter=B'>B</a>
					<a href='index.php?Letter=C'>C</a>
					<a href='index.php?Letter=D'>D</a>
					<a href='index.php?Letter=E'>E</a>
					<a href='index.php?Letter=F'>F</a>
					<a href='index.php?Letter=G'>G</a>
					<a href='index.php?Letter=H'>H</a>
					<a href='index.php?Letter=I'>I</a>
					<a href='index.php?Letter=J'>J</a>
					<a href='index.php?Letter=K'>K</a>
					<a href='index.php?Letter=L'>L</a>
					<a href='index.php?Letter=M'>M</a>
					<a href='index.php?Letter=N'>N</a>
					<a href='index.php?Letter=O'>O</a>
					<a href='index.php?Letter=P'>P</a>
					<a href='index.php?Letter=Q'>Q</a>
					<a href='index.php?Letter=R'>R</a>
					<a href='index.php?Letter=S'>S</a>
					<a href='index.php?Letter=T'>T</a>
					<a href='index.php?Letter=U'>U</a>
					<a href='index.php?Letter=V'>V</a>
					<a href='index.php?Letter=W'>W</a>
					<a href='index.php?Letter=X'>X</a>
					<a href='index.php?Letter=Y'>Y</a>
					<a href='index.php?Letter=Z'>Z</a>
				</div>
			</div>
			</div>
			<?php } ?>
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

