<?php
	if (isset($_GET['Letter']))
	{
		$letters=$_GET['Letter'];
		$_SESSION['letterGuess'] = $_SESSION['letterGuess']."".$letters;
		$wordCount = 0;
		$actualWords = str_split($_SESSION['wordG']);
		$underWords = str_split($_SESSION['under'], 3);
		$guess=0;
		while($wordCount < strlen($_SESSION['wordG']))
		{
			if(strtolower($letters) == strtolower($actualWords[$wordCount]))
			{
				$underWords[$wordCount]=$actualWords[$wordCount]."  ";
				$guess=1;
			}
			$wordCount=$wordCount+1;
		}
		$wordCounter = 0;
		$wordCount = count($underWords);
		$newUnder='';
		$win=1;
		while($wordCounter < $wordCount)
		{	
			if($underWords[$wordCounter] != '__ ')
			{
				$newUnder=$newUnder.''.$underWords[$wordCounter];
			}
			else
			{
				$newUnder=$newUnder.'__ ';
				$win=0;
			}
			$wordCounter=$wordCounter+1;
		}
		if($guess==0)
		{
			$_SESSION['guess']=$_SESSION['guess']+1;
		}
		if($win==0)
		{
			$_SESSION['under']=$newUnder;
		}
		else if($win==1)
		{
			$user = $_SESSION['name'];
			$_SESSION['wins']=$_SESSION['wins']+1;
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
			print '<script type="text/javascript">'; 
			print 'alert("YOU WIN, GAME WILL RESET")'; 
			print '</script>';
		}
	}
?>