<h1>RESULTS</h1>
<?php

//Prints the radio button result
echo nl2br("<p>You think that the <b>".$_POST['radio']."</b> will win the Super Bowl\n</p>");

//Prints the checkbox result
$numItems= count($_POST['mvps']);
$end=0;
$mvpFile="";
if ($numItems > 1)
{
	echo "<p>You want <b>";
	foreach($_POST['mvps'] as $mvp) 
	{
		$end++;
		if($end==$numItems)
		{
			echo $mvp."</b>";
			$mvpFile=$mvpFile.", ".$mvp;
		}
		else if($end==1)
		{
			echo $mvp."</b>, <b>";
			$mvpFile=$mvp;
		}
		else
		{
			echo $mvp."</b>, <b>";
			$mvpFile=$mvpFile.", ".$mvp;
		}
	}
	echo nl2br(" on your team\n</p>");
}

//Prints the text box result
echo nl2br("<p>Your favourite player is <b>".$_POST['playername']."</b>\n<p>");

//Prints the drop down box result
echo nl2br("<p>You think that the <b>".$_POST['best_div']." </b>is the best division in the NFL\n</p>");

//Prints the text area result
echo nl2br("<p>You got into football by:\n <b>".$_POST['footInfo']."</b>\n\n</p>");

//writes the file
$fileData= $_POST['radio']."\r\n".$mvpFile."\r\n".$_POST['playername']."\r\n".$_POST['best_div']."\r\n".$_POST['footInfo']."\r\n";
$file = fopen("result.txt","w");
fwrite($file, $fileData);
fclose($file);
echo nl2br("<p><b>File has been created</b>\n</p>");

if(!empty($_POST['email_name']) and !empty($_POST['mail']))
{
	$emailTo= $_POST['email_name'];
	$subject='Football form submission';
	$headers = "From: Evan Cruz <ev320892@dal.ca>";
	mail($emailTo, $subject, $fileData, $headers);
	echo nl2br("<p>Email sent to: <b>".$_POST['email_name']."</b></p>");
}
?>