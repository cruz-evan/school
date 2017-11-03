<?php
	if(isset($_GET['Player']))
	{
		if($_SESSION['name'] != $_GET['userLog'])
		{
			$_SESSION['wins'] = 0;
			$_SESSION['loss'] = 0;
			$_SESSION['guess']=0;
			$_SESSION['name'] = $_GET['userLog'];
			$query = "SELECT * FROM hangusers WHERE Username = '".mysqli_real_escape_string($link, $_GET['userLog'])."'";
			$result = mysqli_query($link, $query);
			if (mysqli_num_rows($result) == 1) 
			{
				$notice = 'User loaded';
			}
			else if(mysqli_num_rows($result) == 0)
			{
				$query = "INSERT INTO hangusers SET ";
				$query .= "Username = '".mysqli_real_escape_string($link, $_GET['userLog'])."',";
				$query .= "Wins = '".mysqli_real_escape_string($link, 0)."',";
				$query .= "Losses = '".mysqli_real_escape_string($link, 1)."'";
				$result = mysqli_query($link, $query);
				if ($result) 
				{
					$notice = "User has been registered";
				}
			}
		}
		else
		{
			$_SESSION['name'] = $_GET['userLog'];
			$query = "SELECT Wins FROM hangusers WHERE Username = '".mysqli_real_escape_string($link, $_GET['userLog'])."'";
			$result1 = mysqli_query($link, $query);
			$_SESSION['wins'] = $result1;
			$query = "SELECT Wins FROM hangusers WHERE Username = '".mysqli_real_escape_string($link, $_GET['userLog'])."'";
			$result2 = mysqli_query($link, $query);
			$_SESSION['loss'] = $result2;
		}
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
	}
?>